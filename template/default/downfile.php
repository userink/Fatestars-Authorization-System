<?php
@header('Content-Type: text/html; charset=UTF-8');
$title="源码下载";
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
<body>
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
    
<?php
if(isset($_GET['qq']) && isset($_GET['code']) ) {
$qq=daddslashes($_GET['qq']);
$code=intval($_GET['code']);
$row2=$DB->get_row("SELECT * FROM auth_site WHERE uid='{$qq}' order by id desc limit 1");
if($row2=='')exit("<script language='javascript'>alert('授权平台不存在该QQ！');history.go(-1);</script>");
if($row2['active']==0)exit("<script language='javascript'>alert('此域名授权已被封禁！');history.go(-1);</script>");
if(md5($code) != $_COOKIE['authcode'])exit("<script type='text/javascript'>layer.alert('验证码错误，请重新获取！',{icon:5},function(){history.go(-1)});</script>");
$authcode=$row2['authcode'];
$uid=$row2['uid'];
$sign=$row2['sign'];
?>

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
<a href="./includes/downfile.php?my=installer&authcode=<?=$authcode?>&sign=<?=$sign?>&r=<?=time()?>" class="btn btn-xs btn-success"><?=$name?>安装包</a>&nbsp;
<a href="./includes/downfile.php?my=updater&authcode=<?=$authcode?>&sign=<?=$sign?>&r=<?=time()?>" class="btn btn-xs btn-primary"><?=$name?>更新包</a>
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

<?php }else{?>

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
<form action="downfile.php" method="GET" role="form">
	
<div class="form-group">
<label for="web_site_title">授权QQ</label>
<input type="text" id="qq" name="qq" class="form-control" placeholder="授权QQ账号！" >
</div>
<div class="input-group m-b-10">
<input type="text" class="form-control" id="code" name="code" placeholder="邮箱验证码" aria-describedby="basic-addon2">
 &nbsp&nbsp<span class="input-group-addon" id="send"><button type="button" class="btn btn-success">发送验证码</button></span>
</div></br>
                  
<div class="form-group">
<button type="submit" class="btn btn-effect-ripple btn-primary">获取</button>
</div>
</div>
</div>
</div>
</div>
</form>



      <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
          <h3 class="mb-0">使用教程</h3>
          </div>
                <!-- Card body -->
        <div class="card-body">
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="card-body">
</p>
1、如果需要全新搭建或之前未搭建过，请下载完整安装包；如果之前搭建过，请下载更新包直接覆盖，数据不会丢失。</p>
2、输入您的购买授权的QQ来获取下载即可，通过验证后即可下载更新包&安装包，或者你也可以联系客服获取源码。</p>
</div>
</div>
</div>
</div>


<?php }?>
<script src="/assets/LightYear/layui.js"></script>
</body>
</html>