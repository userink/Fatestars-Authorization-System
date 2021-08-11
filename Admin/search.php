<?php
/**
 * 搜索授权
**/
include("../includes/common.php");
$title='授权搜索';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>

<?php
if(isset($_POST['kw']) && isset($_POST['type'])){
	exit("<script language='javascript'>window.location.href='./list.php?type=".$_POST['type']."&kw=".urlencode(base64_encode($_POST['kw']))."&method=".$_POST['method']."';</script>");
}
?>
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">授权搜索</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">授权搜索</li>
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
          <h3 class="mb-0">授权搜索</h3>
        </div>
                <!-- Card body -->
        <div class="card-body">
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="card-body">
          <form action="./search.php" method="post" class="form-inline" role="form">
            <div class="form-group">
              <label>类别&nbsp&nbsp</label>
              <select name="type" class="form-control">
			    <option value="0">全部</option>
                <option value="1">QQ</option>
                <option value="2">域名</option>
                <option value="3">授权码</option>
                <option value="4">特征码</option>
              </select>
            </div>
            <div class="form-group">
              <label>&nbsp&nbsp内容&nbsp&nbsp</label>
              <input type="text" name="kw" value="" class="form-control" autocomplete="off" required/>
            </div>
			<div class="form-group">&nbsp&nbsp
              <select name="method" class="form-control">
                <option value="0">精确搜索</option>
                <option value="1">模糊搜索</option>
              </select>&nbsp&nbsp
            </div>
            <input type="submit" value="查询" class="btn btn-primary form-control"/>
          </form>
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