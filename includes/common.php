<?php
error_reporting(0);
define("CACHE_FILE",0);
define('IN_CRONLITE', true);
date_default_timezone_set("PRC");
define('SYSTEM_ROOT', dirname(__FILE__).'/');
define('ROOT', dirname(SYSTEM_ROOT).'/');
define('TEMPLATE_ROOT',ROOT. '/template/');
$date = date('Y-m-d H:i:s');
if(is_file(SYSTEM_ROOT."360safe/360webscan.php")){
    require_once(SYSTEM_ROOT."360safe/360webscan.php");
}
session_start();

$scriptpath=str_replace('\\','/',$_SERVER['SCRIPT_NAME']);
$sitepath = substr($scriptpath, 0, strrpos($scriptpath, '/'));
$siteurl = ($_SERVER['SERVER_PORT']==443?'https://':'http://').$_SERVER['HTTP_HOST'].$sitepath.'/';

require SYSTEM_ROOT.'config.php';
require(SYSTEM_ROOT."version.php");

if(!defined('SQLITE') && (!$dbconfig['user']||!$dbconfig['pwd']||!$dbconfig['dbname']))//检测安装
{
header('Content-type:text/html;charset=utf-8');
echo '<html lang="zh">
<head>
<link rel="shortcut icon" href="assets/install/favicon.ico" />
<link rel="bookmark"href="assets/install/favicon.ico" />
<title> 安装页面 - 命运星辰授权系统</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8" />
<meta name="keywords" content="" />
<script>
	addEventListener("load", function () {
		setTimeout(hideURLbar, 0);
	}, false);

	function hideURLbar() {
		window.scrollTo(0, 1);
	}
</script>
<!-- //Meta tag Keywords -->
<!--/Style-CSS -->
<link rel="stylesheet" href="assets/install/css/style.css" type="text/css" media="all" />
<!--//Style-CSS -->
<!-- font-awesome-icons -->
<link href="assets/install/css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome-icons -->
</head>

<body>
<section class="w3l-error-61-install">
	<!-- /error-61-section -->
	<div class="error-61-mian">
		<div class="wrapper">
			<div class="errors-16-top">
				<div class="errors-16-info">
					<h3>Fatestars</h3>
					<p>您还未安装本程序~</p>
					<a href="https://jingyan.baidu.com/article/295430f102ebd44d7f00507d.html"><u><font color=	#B0C4DE>解决方法...</font></u></a>
					<form action="/install" method="post" class="d-flex error-page-form">
						<font style="color:#ffffff;font-size:21px;font-weight:bold;">&nbsp;&nbsp;◉◡◉&nbsp;&nbsp;安装:&nbsp</font></a>
						<button type="submit"><span class="fa fa-film" aria-hidden="true">&nbsp;点击安装系统</span></button>
						</form>
					<div class="social-coming-icons">
						<a href="https://www.fatestars.com/" title="命运星辰官网" class="footer-home"><span class="fa fa-home"
								aria-hidden="true"></span></a>
						<a href="http://wpa.qq.com/msgrd?v=3&uin=1594800175&site=qq&menu=yes" title="QQ" class="footer-qq"><span class="fa fa-qq"
								aria-hidden="true"></span></a>
						<a href="#" title="微信" class="footer-wx"><span class="fa fa-weixin"
								aria-hidden="true"></span></a>
						<a href="#" title="微博" class="footer-wb"><span class="fa fa-weibo"
								aria-hidden="true"></span></a>
					</div>
				
				</div>

			</div>
			<div class="copyright-footer">
				<div class="copy-right">
					<p>Copyright &copy;2020 <a href="https://www.fatestars.com/" target="_blank" title="404">命运星辰官网</a> All rights reserved.</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- //error-61-section -->
<audio autoplay="autoplay" src="https://mmkv.cn/163.php" onended="this.load();"></audio>
</body>

</html>';
exit(0);
}

//连接数据库
include_once(SYSTEM_ROOT."db.class.php");
$DB=new DB($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);

if($DB->query("select * from auth_user where 1")==FALSE)//检测安装2
{
header('Content-type:text/html;charset=utf-8');
echo '<html lang="zh">
<head>
<link rel="shortcut icon" href="assets/install/favicon.ico" />
<link rel="bookmark"href="assets/install/favicon.ico" />
<title> 安装页面 - 命运星辰授权系统</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8" />
<meta name="keywords" content="" />
<script>
	addEventListener("load", function () {
		setTimeout(hideURLbar, 0);
	}, false);

	function hideURLbar() {
		window.scrollTo(0, 1);
	}
</script>
<!-- //Meta tag Keywords -->
<!--/Style-CSS -->
<link rel="stylesheet" href="assets/install/css/style.css" type="text/css" media="all" />
<!--//Style-CSS -->
<!-- font-awesome-icons -->
<link href="assets/install/css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome-icons -->
</head>

<body>
<section class="w3l-error-61-install">
	<!-- /error-61-section -->
	<div class="error-61-mian">
		<div class="wrapper">
			<div class="errors-16-top">
				<div class="errors-16-info">
					<h3>Fatestars</h3>
					<p>您还未安装本程序~</p>
					<a href="https://jingyan.baidu.com/article/295430f102ebd44d7f00507d.html"><u><font color=	#B0C4DE>解决方法...</font></u></a>
					<form action="/install" method="post" class="d-flex error-page-form">
						<font style="color:#ffffff;font-size:21px;font-weight:bold;">&nbsp;&nbsp;◉◡◉&nbsp;&nbsp;安装:&nbsp</font></a>
						<button type="submit"><span class="fa fa-film" aria-hidden="true">&nbsp;点击安装系统</span></button>
						</form>
					<div class="social-coming-icons">
						<a href="https://www.fatestars.com/" title="命运星辰官网" class="footer-home"><span class="fa fa-home"
								aria-hidden="true"></span></a>
						<a href="http://wpa.qq.com/msgrd?v=3&uin=1594800175&site=qq&menu=yes" title="QQ" class="footer-qq"><span class="fa fa-qq"
								aria-hidden="true"></span></a>
						<a href="#" title="微信" class="footer-wx"><span class="fa fa-weixin"
								aria-hidden="true"></span></a>
						<a href="#" title="微博" class="footer-wb"><span class="fa fa-weibo"
								aria-hidden="true"></span></a>
					</div>
				
				</div>

			</div>
			<div class="copyright-footer">
				<div class="copy-right">
					<p>Copyright &copy;2020 <a href="https://www.fatestars.com/" target="_blank" title="404">命运星辰官网</a> All rights reserved.</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- //error-61-section -->
<audio autoplay="autoplay" src="https://mmkv.cn/163.php" onended="this.load();"></audio>
</body>

</html>';
exit(0);
}

include(SYSTEM_ROOT."cache.class.php");
$CACHE = new CACHE();
$conf = $CACHE->pre_fetch();

if($conf['qqjump'] == 1 && (!strpos($_SERVER['HTTP_USER_AGENT'],'QQ/') === false || !strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger')===false)){
    if($_GET['open'] == 1 && !strpos($_SERVER['HTTP_USER_AGENT'],'MicroMessenger')===false){
        header('Content-Disposition: attachment; filename="load.doc"');
        header('Content-Type: application/vnd.ms-word;charset=utf-8');
    }else{
        header('Content-type:text/html;charset=utf-8');
    }
    include SYSTEM_ROOT."jump.php";
    exit(0);
}

$password_hash='!@#%!s!0';
include SYSTEM_ROOT."SecretUtilTools.php";
include_once(SYSTEM_ROOT.'template.class.php');
include SYSTEM_ROOT."function.php";
include SYSTEM_ROOT."member.php";

if(!file_exists(ROOT."install/install.lock") && file_exists(ROOT."install/index.php")) {
	sysmsg("<h3>检测到无 install.lock 文件</h3></br><h3>点击重新安装<a href=\"./install/\"> (重新安装) </a><h3>", true);
}


?>