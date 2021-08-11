<?php
@header('Content-Type: text/html; charset=UTF-8');
$title="卡密授权";
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
              <h6 class="h2 text-white d-inline-block mb-0">卡密授权</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">卡密授权</li>
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
          <h3 class="mb-0">卡密授权</h3>
        </div>
                <!-- Card body -->
        <div class="card-body">
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="card-body">
	
<div class="form-group">
<label for="web_site_title">授权 Q Q</label>
<input type="text" id="qq" name="qq" value="" class="form-control" placeholder="输入的QQ！" autocomplete="off" autofocus="autofocus" required/>
</div>
<div class="form-group">
<label for="web_site_title">授权域名</label>
<input type="text" id="url" name="url" value="" class="form-control" placeholder="授权的域名！" autocomplete="off" autofocus="autofocus" required/>
</div>
<div class="form-group">
<label for="web_site_title">授权卡密</label>
<input type="text" id="km" name="km" value="" class="form-control" placeholder="请输入卡密！" autocomplete="off" autofocus="autofocus" required/>
</div>
<div class="form-group">
<button type="submit" onclick="kmsq();" class="btn btn-effect-ripple btn-primary">确认授权</button>
</div>
</div>
</div>
</div>
</div>

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
<div class="card-body">
购买卡密后按照要求填写即可。
</p>
</div>
</div>
</div>
</div>
</div>
<script src="assets/main/main/layer/layer.js"></script>
<script src="/assets/LightYear/layui.js"></script>