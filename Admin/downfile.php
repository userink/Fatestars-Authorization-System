<?php
include("../includes/common.php");
$title='获取下载';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
if(isset($_GET['url'])) {
$url=daddslashes($_GET['url']);
$row=$DB->get_row("SELECT * FROM auth_site WHERE url='{$url}' limit 1");
if($row=='')exit("<script language='javascript'>alert('授权平台不存在该域名！');history.go(-1);</script>");
if($row['active']==0)exit("<script language='javascript'>alert('此域名授权已被封禁！');history.go(-1);</script>");
$authcode=$row['authcode'];
$uid=$row['uid'];
$sign=$row['sign'];
?>
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">源码下载</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">源码下载</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>
          </div>
        </div>
      </div>
    </div>
 <div class="container-fluid mt--6">
      <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
          <h3 class="mb-0">源码下载</h3>
        </div>
                <!-- Card body -->
        <div class="card-body">
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="card-body">
<li class="list-group-item"><span class="ni ni-circle-08"></span> <b>授权ＱＱ：</b> <b>  <?=$uid?></b></li>
<li class="list-group-item"><span class="ni ni-world-2"></span> <b>授权域名：</b> <b>  <?=$url?></b></li>
<li class="list-group-item"><span class="ni ni-atom"></span> <b>授权代码：</b> <b>  <?=$authcode?></b></li>
<li class="list-group-item"><span class="ni ni-ui-04"></span> <b>特征代码：</b> <b>  <?=$sign?></b></li>
<li class="list-group-item"><span class="ni ni-cloud-download-95"></span> <b>下载类型：</b> 
<a href="../includes/downfile.php?my=installer&authcode=<?=$authcode?>&sign=<?=$sign?>&r=<?=time()?>" class="btn btn-xs btn-success"><?=$name?>安装包</a>&nbsp;
<a href="../includes/downfile.php?my=updater&authcode=<?=$authcode?>&sign=<?=$sign?>&r=<?=time()?>" class="btn btn-xs btn-primary"><?=$name?>更新包</a>
</li>
</ul>
</br>
<div class="panel-footer">
<span class="ni ni-air-baloon"></span> 新购用户请下载完整安装包！
</div>
</div>
</div>
</div>
</div>
</div>
<?php }else{?>
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">源码下载</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">源码下载</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>
          </div>
        </div>
      </div>
    </div>
 <div class="container-fluid mt--6">
      <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
          <h3 class="mb-0">源码下载</h3>
        </div>
                <!-- Card body -->
        <div class="card-body">
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="card-body">
<ul class="nav nav-tabs page-tabs"><li> 
<li class="active"> <a href="#!">源码下载</a> </li>
</ul>
<div class="tab-content">
<div class="tab-pane active">
<form action="./downfile.php" method="GET" role="form">
	
<div class="form-group">
<label for="web_site_title">授权域名</label>
<input type="text" name="url" value="<?=@$_GET['url']?>" class="form-control" placeholder="授权的域名" autocomplete="off" autofocus="autofocus" required/>
</div>

<div class="form-group">
<button type="submit" class="btn btn-effect-ripple btn-primary">获取</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<?php }?>
  <script src="/assets/manage/vendor/jquery/dist/jquery.min.js"></script>
  <script src="/assets/manage/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/manage/vendor/js-cookie/js.cookie.js"></script>
  <script src="/assets/manage/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="/assets/manage/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="/assets/manage/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="/assets/manage/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="/assets/manage/js/argon.js?v=1.1.0"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="/assets/manage/js/demo.min.js"></script>
</body>
</html>