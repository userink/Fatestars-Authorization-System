<?php
error_reporting(E_ALL & ~E_NOTICE);  //显示全部错误
define('ROOT_PATH', dirname(dirname(__FILE__)));  //定义根目录
define('DBCHARSET','UTF8');   //设置数据库默认编码
if(function_exists('date_default_timezone_set')){
	date_default_timezone_set('Asia/Shanghai');
}
input($_GET);
input($_POST);
function input(&$data){
	foreach ((array)$data as $key => $value) {
		if(is_string($value)){
			if(!get_magic_quotes_gpc()){
				$value = htmlentities($value, ENT_NOQUOTES);
                $value = addslashes(trim($value));
			}
		}else{
			$data[$key] = input($value);
		}
	}
}
//判断是否安装过程序
if(is_file('install.lock') && $_GET['step'] != 5){
	@header("Content-type: text/html; charset=UTF-8");
    echo "系统已经安装过了，如果要重新安装，那么请删除install目录下的install.lock文件";
    exit;
}

$html_title = '命运星辰授权系统 - 安装';
$html_header = <<<EOF
<div class="lyear-layout-web">
  <div class="lyear-layout-container">
    <!--左侧导航-->
    <aside class="lyear-layout-sidebar">
       
      <!-- logo -->
      <div id="logo" class="sidebar-header">
        <a href="index.html"><img src="../assets/data/images/logo-sidebar.png" title="LightYear" alt="LightYear" /></a>
      </div>
      <div class="lyear-layout-sidebar-scroll">
        
        <nav class="sidebar-main">
          <ul class="nav nav-drawer">
            <li class="nav-item active"> <a href="#"><i class="mdi mdi-home"></i> 安装</a> </li>
            <li class="nav-item nav-item-has-subnav">
              <a href="javascript:void(0)"><i class="mdi mdi-palette"></i> 项目</a>
              <ul class="nav nav-subnav">
                <li> <a href="https://www.fatestars.com/" target="_blank">命运星辰官网</a> </li>

              </ul>
            </li>
          </ul>
        </nav>
        
        <div class="sidebar-footer">
          <p class="copyright">Copyright &copy; 2020. <a target="_blank" href="http://fatestarsx.cn">fatestars</a> All rights reserved.</p>
        </div>
      </div>
      
    </aside>
    <!--End 左侧导航-->
    
    <!--头部信息-->
    <header class="lyear-layout-header">
      
      <nav class="navbar navbar-default">
        <div class="topbar">
          
          <div class="topbar-left">
            <div class="lyear-aside-toggler">
              <span class="lyear-toggler-bar"></span>
              <span class="lyear-toggler-bar"></span>
              <span class="lyear-toggler-bar"></span>
            </div>
            <span class="navbar-page-title"> 安装 </span>
          </div>
          
          
          
        </div>
      </nav>
      
    </header>
    <!--End 头部信息-->
	<!--页面主要内容-->
    <main class="lyear-layout-content">
EOF;

$html_footer2 = <<<EOF
</main>
    <!--End 页面主要内容-->
	  </div>
</div>
<!--消息提示-->
<script src="../assets/data/js/bootstrap-notify.min.js"></script>
<script type="text/javascript" src="../assets/data/js/lightyear.js"></script>
<script type="text/javascript" src="../assets/data/js/main.min.js"></script>

EOF;
$html_footer = <<<EOF
</main>
    <!--End 页面主要内容-->
	  </div>
</div>
<script type="text/javascript" src="../assets/data/js/jquery.min.js"></script>
<script type="text/javascript" src="../assets/data/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/data/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="../assets/data/js/main.min.js"></script>
<!--消息提示-->
<script src="../assets/data/js/bootstrap-notify.min.js"></script>
<script type="text/javascript" src="../assets/data/js/lightyear.js"></script>
EOF;

require('./include/function.php');
if(!in_array($_GET['step'], array(1,2,3,4,5))){
	$_GET['step'] = 0;
}
switch ($_GET['step']) {
	case 1:
		require('./include/var.php');
		env_check($env_items);
        dirfile_check($dirfile_items);
        function_check($func_items);
		break;
	case 3:
		$install_error = '';
        $install_recover = '';
        //$demo_data =  file_exists('./includes/utf8_add.sql') ? true : false;
        step3($install_error,$install_recover);
        break;
	case 4:
		
		break;
	case 5:
		$sitepath = strtolower(substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')));
        $sitepath = str_replace('install',"",$sitepath);
        $auto_site_url = strtolower('http://'.$_SERVER['HTTP_HOST'].$sitepath);
		break;
	default:
		# code...
		break;
}

include ("step_{$_GET['step']}.php");

function step3(&$install_error,&$install_recover){
    global $html_title,$html_header,$html_footer;
    if ($_POST['submitform'] != 'submit') return;
   $db_host=isset($_POST['db_host'])?$_POST['db_host']:NULL;
	$db_port=isset($_POST['db_port'])?$_POST['db_port']:NULL;
	$db_user=isset($_POST['db_user'])?$_POST['db_user']:NULL;
	$db_pwd=isset($_POST['db_pwd'])?$_POST['db_pwd']:NULL;
	$db_name=isset($_POST['db_name'])?$_POST['db_name']:NULL;
    if (!$db_host || !$db_port || !$db_user || !$db_pwd || !$db_name){
        $install_error = '输入不完整，请检查';
    }
    
	if ($install_error != '') reutrn;
        $mysqli = @ new mysqli($db_host, $db_user, $db_pwd, '', $db_port);
        if($mysqli->connect_error) {
            $install_error = '数据库连接失败';return;
        }

    if($mysqli->get_server_info()> '5.0') {
        $mysqli->query("CREATE DATABASE IF NOT EXISTS `$db_name` DEFAULT CHARACTER SET ".DBCHARSET);
    } else {
        $install_error = '数据库必须为MySQL5.0版本以上';return;
    }
    if($mysqli->error) {
        $install_error = $mysqli->error;return ;
    }
   
    require ('step_4.php');
    $sitepath = strtolower(substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')));
    $sitepath = str_replace('install',"",$sitepath);
    $auto_site_url = strtolower('http://'.$_SERVER['HTTP_HOST'].$sitepath);
    write_config($auto_site_url);

    //判断是否安装测试数据
    /*if ($_POST['demo_data'] == '1'){
        $sql .= file_get_contents("includes/{$_charset}_add.sql");
    }*/

    //新增一个标识文件，用来屏蔽重新安装
    $fp = @fopen('install.lock','wb+');
    @fclose($fp);
    exit("<script type=\"text/javascript\">document.getElementById('install_process').innerHTML = '安装完成，下一步...';document.getElementById('install_process').href='index.php?step=5&username={$username}&password={$password}';</script>");
    exit();
}

//execute sql
if(defined("SAE_ACCESSKEY"))include_once '../includes/sae.php';
else include_once '../includes/config.php';
if(!$dbconfig['user']||!$dbconfig['pwd']||!$dbconfig['dbname']) {
	echo '<div class="alert alert-danger">请先填写好数据库并保存后再安装！<hr/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
} else {
	require './db.class.php';
	$sql=file_get_contents("install.sql");
	$sql=explode(';</explode>',$sql);
	$cn = DB::connect($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);
	if (!$cn) die('err:'.DB::connect_error());
	DB::query("set sql_mode = ''");
	DB::query("set names utf8");
	$t=0; $e=0; $error='';
	for($i=0;$i<count($sql);$i++) {
		if ($sql[$i]=='')continue;
		if(DB::query($sql[$i])) {
			++$t;
		} else {
			++$e;
			$error.=DB::error().'<br/>';
		}
	}
}

//抛出JS信息
function showjsmessage($message) {
    echo '<script type="text/javascript">showmessage(\''.addslashes($message).' \');</script>'."\r\n";
    flush();
    ob_flush();
}
//写入config文件
function write_config($url) {
    extract($GLOBALS, EXTR_SKIP);
    $db_host=isset($_POST['db_host'])?$_POST['db_host']:NULL;
	$db_port=isset($_POST['db_port'])?$_POST['db_port']:NULL;
	$db_user=isset($_POST['db_user'])?$_POST['db_user']:NULL;
	$db_pwd=isset($_POST['db_pwd'])?$_POST['db_pwd']:NULL;
	$db_name=isset($_POST['db_name'])?$_POST['db_name']:NULL;
    $config="<?php
/*数据库配置*/
\$dbconfig=array(
	'host' => '{$db_host}', //数据库服务器
	'port' => {$db_port}, //数据库端口
	'user' => '{$db_user}', //数据库用户名
	'pwd' => '{$db_pwd}', //数据库密码
	'dbname' => '{$db_name}' //数据库名
);
?>";

    @file_put_contents('../includes/config.php',$config);
}