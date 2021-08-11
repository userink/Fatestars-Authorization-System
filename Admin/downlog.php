<?php
/**
 * 系统日志
**/
include("../includes/common.php");
$title='系统日志';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>

<?php
$my=isset($_GET['my'])?$_GET['my']:null;

echo '
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">添加授权</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">系统日志</li>
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
          <h3 class="mb-0">系统日志</h3>
        </div>
                <!-- Card body -->
        <div class="card-body">
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="card-body">
<form action="log.php" method="GET" class="form-inline"><input type="hidden" name="my" value="search">
  <div class="form-group">
    <label>搜索&nbsp&nbsp</label>
	<select name="column" class="form-control"><option value="id">操作ID</option><option value="type">操作类型</option><option value="data">操作数据</option></select>
  </div>&nbsp&nbsp
  <div class="form-group">
    <input type="text" class="form-control" name="value" placeholder="搜索内容">
  </div>&nbsp&nbsp
  <button type="submit" class="btn btn-primary">搜索</button>
</form></br>';

if($my=='search') {
	if($_GET['column']=='data'){
		$sql=" `data` LIKE '%{$_GET['value']}%'";
	}else{
		$sql=" `{$_GET['column']}`='{$_GET['value']}'";
	}
	$numrows=$DB->count("SELECT count(*) from auth_down WHERE{$sql}");
	$con='包含 '.$_GET['value'].' 的共有 <b>'.$numrows.'</b> 条记录';
	$link='&my=search&column='.$_GET['column'].'&value='.$_GET['value'];
}else{
	$numrows=$DB->count("SELECT count(*) from auth_down");
	$sql=" 1";
	$con='共有 <b>'.$numrows.'</b> 条记录';
}
echo $con;

?>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr><th scope="col" class="sort" data-sort="ID">ID</th><th scope="col" class="sort" data-sort="type">操作类型</th><th scope="col" class="sort" data-sort="code">授权码</th><th scope="col" class="sort" data-sort="domain">域名</th><th scope="col" class="sort" data-sort="IP">IP</th><th scope="col" class="sort" data-sort="time">时间</th><th></thead>
          <tbody>
<?php
$pagesize=30;
$pages=intval($numrows/$pagesize);
if ($numrows%$pagesize)
{
 $pages++;
 }
if (isset($_GET['page'])){
$page=intval($_GET['page']);
}
else{
$page=1;
}
$offset=$pagesize*($page - 1);
$rs=$DB->query("SELECT * FROM auth_down WHERE{$sql} order by date desc limit $offset,$pagesize");
while($res = $DB->fetch($rs))
{
echo '<tr><td><b>'.$res['id'].'</b></td><td>'.$res['type'].'</td><td>'.$res['authcode'].'</td><td>'.$res['sign'].'</td><td>'.$res['ip'].'</td><td>'.$res['date'].'</td></tr>';
}
?>
          </tbody>
        </table>
      </div>
<?php
echo'</br><ul class="pagination">';
$first=1;
$prev=$page-1;
$next=$page+1;
$last=$pages;
if ($page>1)
{
echo '<li><a href="downlog.php?page='.$first.$link.'"><button type="button" class="btn btn-primary">首页</button></a></li>';
echo '<li><a href="downlog.php?page='.$prev.$link.'"><button type="button" class="btn btn-secondary">&laquo;</button></a></li>';
} else {
echo '<li class="disabled"><a><button type="button" class="btn btn-primary">首页</button></a></li>';
echo '<li class="disabled"><a><button type="button" class="btn btn-secondary">&laquo;</button></a></li>';
}
for ($i=1;$i<$page;$i++)
echo '<li><a href="downlog.php?page='.$i.$link.'"><button type="button" class="btn btn-info">'.$i .'</button></a></li>';
echo '<li class="disabled"><a><button type="button" class="btn btn-info active">'.$page.'</button></a></li>';
if($pages>=10)$pages=10;
for ($i=$page+1;$i<=$pages;$i++)
echo '<li><a href="downlog.php?page='.$i.$link.'"><button type="button" class="btn btn-info">'.$i .'</button></a></li>';
echo '';
if ($page<$pages)
{
echo '<li><a href="downlog.php?page='.$next.$link.'"><button type="button" class="btn btn-secondary">&raquo;</button></a></li>';
echo '<li><a href="downlog.php?page='.$last.$link.'"><button type="button" class="btn btn-danger">尾页</button></a></li>';
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