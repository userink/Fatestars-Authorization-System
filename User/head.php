<?php
@header('Content-Type: text/html; charset=UTF-8');
if($islogins==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
$title='管理后台';
$t=$conf['title'];
?>
<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <title><?php echo $conf['title']?> -  <?=$title?></title>
 <link rel="icon" href="../assets/LightYear/favicon.ico" type="image/ico">
  <meta name="keywords" content="<?php echo $_POST['keywords']; ?>"/>
  <meta name="description" content="<?php echo $_POST['description']; ?>"/>
 <meta name="author" content="fatestars">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="/assets/manage/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="/assets/manage/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="/assets/manage/css/argon.css?v=1.1.0" type="text/css">

<script src="//lib.baomitu.com/jquery/1.12.4/jquery.min.js"></script>
<script src="//lib.baomitu.com/layer/2.3/layer.js"></script>
</head>
<script language="javascript">
function logout(){
if( confirm("你确实要退出吗？")){
window.parent.location.href="login.php?logout";
}
else{
return;
}
}
</script>  
    <body>
   <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="./pages/dashboards/dashboard.html">
          <img src="/assets/manage/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
        <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php" >
                <i class="ni ni-shop text-primary"></i>
                <span class="nav-link-text">主页</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                <i class="ni ni-ungroup text-orange"></i>
                <span class="nav-link-text">授权管理</span>
              </a>
              <div class="collapse" id="navbar-examples">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="add.php" class="nav-link">添加授权</a>
                  </li>
                  <li class="nav-item">
                    <a href="addsite.php" class="nav-link">添加站点</a>
                  </li>
                  <li class="nav-item">
                    <a href="list.php" class="nav-link">授权列表</a>
                  </li>
                </ul>
              </div>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="downfile.php" >
                <i class="ni ni-map-big text-primary"></i>
                <span class="nav-link-text">源码下载</span>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="search.php" >
                <i class="ni ni-align-left-2 text-default"></i>
                <span class="nav-link-text">搜索授权</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ulist.php">
                <i class="ni ni-chart-pie-35 text-info"></i>
                <span class="nav-link-text">添加用户</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="gglist.php">
                <i class="ni ni-calendar-grid-58 text-red"></i>
                <span class="nav-link-text">日志&公告</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
    <!--End 左侧导航-->
    
    <!--头部信息-->
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center ml-md-auto">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i>
              </a>
              
              <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden">
                <!-- Dropdown header -->
                <div class="px-3 py-3">
                  <h6 class="text-sm text-muted m-0">您有 <strong class="text-primary">1</strong> 条消息。</h6>
                </div>
                <!-- List group -->
                <div class="list-group list-group-flush">
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="https://tenapi.cn/qqimg/?qq=<?php echo $udata['qq']?>" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm"><?=$t?> Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2021-7-29</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">授权系统目前1.2版本。</p>
                      </div>
                    </div>
                  </a>
                </div>
                
                <!-- View all -->
                <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-ungroup"></i>
              </a>
              
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default dropdown-menu-right">
                <div class="row shortcuts px-4">
                  <a href="//<?php echo $conf['web']?>" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                      <i class="ni ni-istanbul"></i>
                    </span>
                    <small>官网</small>
                  </a>
                  <a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=<?php echo $conf['mail_user']?>" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                      <i class="ni ni-email-83"></i>
                    </span>
                    <small>邮箱</small>
                  </a>
                  <a href="https://wpa.qq.com/msgrd?v=3&uin=<?php echo $conf['qq']?>&site=qq&menu=yes" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                      <i class="ni ni-single-02"></i>
                    </span>
                    <small>QQ</small>
                  </a>
                  <a href="<?php echo $conf['qg']?>" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                      <i class="ni ni-circle-08"></i>
                    </span>
                    <small>Q群</small>
                  </a>
                  <a href="<?php echo $conf['back']?>" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                      <i class="ni ni-spaceship"></i>
                    </span>
                    <small>反馈</small>
                  </a>
                  <a href="//<?php echo $conf['shop_url']?>" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                      <i class="ni ni-basket"></i>
                    </span>
                    <small>商城</small>
                  </a>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center ml-auto ml-md-0">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="https://tenapi.cn/qqimg/?qq=<?php echo $udata['qq']?>">
                  </span>
                  <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">More</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="index.php" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>我的信息</span>
                </a>
                <a href="set.php?mod=pass" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>账户设置</span>
                </a>
                <a href="<?php echo $conf['qg']?>" class="dropdown-item">
                  <i class="ni ni-atom"></i>
                  <span>交流活动</span>
                </a>
                <a href="<?php echo $conf['back']?>" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>技术反馈</span>
                </a>
                 <a href="javascript:void(0)" class="dropdown-item">
                  <i class="ni ni-box-2"></i>
                  <span>清除缓存</span>
                </a> 
                <div class="dropdown-divider"></div>
                <a href="javascript:logout()" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>退出登录</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>