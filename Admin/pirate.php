<?php
/**
 * 盗版站点
**/
include("../includes/common.php");
$title='站点列表';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">授权列表</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">盗版管理</a></li>
                  <li class="breadcrumb-item active" aria-current="page">站点列表</li>
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
          <h3 class="mb-0">站点列表</h3>
        </div>
                <!-- Card body -->
        <div class="card-body">
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="card-body">
<?php
$gls=$DB->count("SELECT count(*) from auth_block WHERE 1");
$pagesize=30;
if (!isset($_GET['page'])) {
	$page = 1;
	$pageu = $page - 1;
} else {
	$page = $_GET['page'];
	$pageu = ($page - 1) * $pagesize;
}

if(isset($_POST['qq']) && isset($_POST['url'])){

} ?>
<div class="table-responsive">
<table class="table align-items-center table-flush">
<thead class="thead-light">
<tr><th scope="col" class="sort" data-sort="domain">域名</th><th scope="col" class="sort" data-sort="time">时间</th><th scope="col" class="sort" data-sort="status">状态</th><th scope="col" class="sort" data-sort="action">操作</th></tr></thead>
<tbody>
<?php
$rs=$DB->query("SELECT * FROM auth_block order by date desc limit $pageu,$pagesize");
while($res = $DB->fetch($rs))
{
$type='<font color="orange">正常</font>';
$url=urlencode($res['url']);
echo '<tr><td><a href="/jump.php?url='.urlencode('http://'.$res['url'].'/').'" target="_blank">'.$res['url'].'</a>&nbsp;<a href="/jump.php?url='.urlencode('http://'.$res['url'].'/api.php?my=siteinfo').'" target="_blank">[*]</a></td><td>'.$res['date'].'</td><td onclick="alert(\'授权码：'.$res['authcode'].'\')">'.$type.'</td><td><a href="./getpwd.php?url='.$url.'&m=1" class="btn btn-xs btn-info">查看信息</a> <a href="./edit.php?my=delpirate&url='.$res['url'].'" class="btn btn-xs btn-danger" onclick="return confirm(\'你确实要删除此条记录吗？\');">删除</a></td></tr>';
}
?>
</tbody>
</table>
</div>
<center>
<?php
echo'<ul class="pagination">';
$s = ceil($gls / $pagesize);
$first=1;
$prev=$page-1;
$next=$page+1;
$last=$s;
if ($page>1)
{
echo '<li><a href="pirate.php?page='.$first.$link.'"><button type="button" class="btn btn-primary">首页</button></a></li>';
echo '<li><a href="pirate.php?page='.$prev.$link.'"><button type="button" class="btn btn-secondary">&laquo;</button></a></li>';
} else {
echo '<li class="disabled"><a><button type="button" class="btn btn-primary">首页</button></a></li>';
echo '<li class="disabled"><a><button type="button" class="btn btn-secondary">&laquo;</button></a></li>';
}
for ($i=1;$i<$page;$i++)
echo '<li><a href="pirate.php?page='.$i.$link.'"><button type="button" class="btn btn-info">'.$i .'</button></a></li>';
echo '<li class="disabled"><a><button type="button" class="btn btn-info active">'.$page.'</button></a></li>';
for ($i=$page+1;$i<=$s;$i++)
echo '<li><a href="pirate.php?page='.$i.$link.'"><button type="button" class="btn btn-default">'.$i .'</button></a></li>';
echo '';
if ($page<$s)
{
echo '<li><a href="pirate.php?page='.$next.$link.'"><button type="button" class="btn btn-secondary">&raquo;</button></a></li>';
echo '<li><a href="pirate.php?page='.$last.$link.'"><button type="button" class="btn btn-danger">尾页</button></a></li>';
} else {
echo '<li class="disabled"><a><button type="button" class="btn btn-secondary">&raquo;</button></a></li>';
echo '<li class="disabled"><a><button type="button" class="btn btn-danger">尾页</button></a></li>';
}
echo'</ul>';
#分页
?>
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