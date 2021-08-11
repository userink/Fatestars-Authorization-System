<?php
include("../includes/common.php");
if($islogins==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
@header("content-Type:text/json;charset=utf-8");
if(isset($_GET['act'])) {
	$act = $_GET['act'];
} else {
	$act = $_POST['act'];
}
switch($act) {
	case 'pass':
			if(isset($_POST['pass'])) {
			$row=$DB->get_row("select * from auth_daili where uid='{$udata['uid']}' limit 1");
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
			if($DB->query("update `auth_daili` set pass='$pass' where `uid`='{$udata['uid']}'")) {
				exit('{"code":1,"msg":"修改密码成功！"}');
			} else {
				exit('{"code":-1,"msg":"修改密码失败！'.$DB->error().'"}');
			}
		}
	break;
}
?>