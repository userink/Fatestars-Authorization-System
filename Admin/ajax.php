<?php
include '../includes/common.php';
$act=isset($_GET['act'])?daddslashes($_GET['act']):null;
@header('Content-Type: application/json; charset=UTF-8');
switch($act) {
	case 'km':
	function randomkeys($length) {
		$pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		for ($i=0;$i<$length;$i++) {
			$key .= $pattern {
				mt_rand(0,35)
			}
			;
		}
		return $key;
	}
	$kms = randomkeys(10);
	if(isset($_POST['count'])) {
		$count=intval($_POST['count']);
		if(!$count) {
			exit('{"code":-1,"msg":"数量输入不能为空哟！"}');
		}
		if($count > 5) {
			exit('{"code":-1,"msg":"一次性生成不能超过五个哟！"}');
		}
		$row=$DB->get_row("SELECT * FROM auth_km WHERE km='{$km}' limit 1");
		if($row!='') {
			exit('{"code":-1,"msg":"！"}');
		}
		for ($i=0; $i < $count; $i++) {
			$kami[$i]=randomkeys(10);
		}
		foreach ($kami as $value) {
			$sql="insert into `auth_km` (`km`,`state`) values ('$value','0')";
			$DB->query($sql);
		}
		exit('{"code":1,"msg":"恭喜你生成卡密成功！"}');
	}
	break;
	case 'delkm':
	if($_GET['my']=='rm') {
		$rs=$DB->query("SELECT * FROM auth_km WHERE 1");
		while($res = $DB->fetch($rs)) {
			$id = $res['id'];
			$sql="DELETE FROM auth_km WHERE id='$id' limit 1";
			$DB->query($sql);
		}
		exit('{"code":1,"msg":"已清除全部卡密！"}');
	}
	if($_GET['my']=='s') {
		$rs=$DB->query("SELECT * FROM auth_km WHERE state=1");
		while($res = $DB->fetch($rs)) {
			$id = $res['id'];
			$sql="DELETE FROM auth_km WHERE id='$id' limit 1";
			$DB->query($sql);
		}
		exit('{"code":1,"msg":"清空所有已使用卡密完成！"}');
	}
	if($_GET['my']=='del') {
		$id=intval($_GET['id']);
		$sql="DELETE FROM auth_km WHERE id='$id' limit 1";
		if($DB->query($sql)) {
			exit('{"code":1,"msg":"删除完成！"}');
		}
	}
	break;
	case 'pwd':
		if(isset($_POST['pass'])) {
		$row=$DB->get_row("select * from auth_user where uid='{$udata['uid']}' limit 1");
		$pass=daddslashes($_POST['pass']);
		if(empty($pass)) {
			exit('{"code":-1,"msg":"密码输入不能为空！"}');
		}
		if($pass==$udata['pass']) {
			exit('{"code":-1,"msg":"数据未发生变化！"}');
		}
		if($udata['user']==$pass) {
			exit('{"code":-1,"msg":"账号密码不能相同！"}');
		}
		if($_POST['pass']=="") {
			$pass=$row['pass'];
		} else {
			$pass=daddslashes($_POST['pass']);
		}
		if($DB->query("update `auth_user` set pass='$pass' where `uid`='{$udata['uid']}'")) {
			exit('{"code":1,"msg":"修改密码成功！"}');
		} else {
			exit('{"code":-1,"msg":"修改密码失败！'.$DB->error().'"}');
		}
	}
	break;
	default:
			    exit('{"code":-4,"msg":"No Act"}');
	break;
}