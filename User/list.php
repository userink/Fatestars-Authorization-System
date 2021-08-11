<?php
/**
 * 授权列表
**/
include("../includes/common.php");
$title='授权列表';
include './head.php';
if($islogins==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
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
                  <li class="breadcrumb-item"><a href="#">授权管理</a></li>
                  <li class="breadcrumb-item active" aria-current="page">授权列表</li>
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
if(isset($_GET['kw'])) {
	$kw = daddslashes(base64_decode($_GET['kw']));
	if($_GET['type']==1)
		$sql=($_GET['method']==1)?" `uid` LIKE '%{$kw}%'":" `uid`='{$kw}'";
	elseif($_GET['type']==2)
		$sql=($_GET['method']==1)?" `url` LIKE '%{$kw}%'":" `url`='{$kw}'";
	elseif($_GET['type']==3)
		$sql=($_GET['method']==1)?" `authcode` LIKE '%{$kw}%'":" `authcode`='{$kw}'";
	elseif($_GET['type']==4)
		$sql=($_GET['method']==1)?" `sign` LIKE '%{$kw}%'":" `sign`='{$kw}'";
	else{
		if(is_numeric($kw))$column='uid';
		elseif(strpos($kw,'.')!==false)$column='url';
		else $column='authcode';
		$sql=($_GET['method']==1)?" `{$column}` LIKE '%{$kw}%'":" `{$column}`='{$kw}'";
	}
	$gls=$DB->count("SELECT count(*) from auth_site WHERE{$sql} and daili='{$daili_id}'");
	$con='
<div class="container-fluid mt--6">
      <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
          <h3 class="mb-0"> '.$kw.' 的共有 <b>'.$gls.'</b> 个域名</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="card-body">';
	$link='&kw='.$_GET['kw'];
}elseif(isset($_GET['qq'])) {
	$qq=daddslashes($_GET['qq']);
	$sql=" `uid`='{$qq}'";
	$gls=$DB->count("SELECT count(*) from auth_site WHERE{$sql} and daili='{$daili_id}'");
	$con='
<div class="container-fluid mt--6">
      <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
          <h3 class="mb-0">
QQ '.$_GET['qq'].' 共有 <b>'.$gls.'</b> 个域名</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="card-body">';
	$link='&qq='.$_GET['qq'];
}else{
	$gls=$DB->count("SELECT count(*) from auth_site WHERE daili='{$daili_id}'");
	$sql=" 1";
	$con='
<div class="container-fluid mt--6">
      <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
          <h3 class="mb-0">
授权平台代理用户(UID:'.$daili_id.')共有 <b>'.$gls.'</b> 个域名
</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="card-body">';
}

$pagesize=10;
if (!isset($_GET['page'])) {
	$page = 1;
	$pageu = $page - 1;
} else {
	$page = $_GET['page'];
	$pageu = ($page - 1) * $pagesize;
}

echo $con;
?>
<div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr><th scope="col" class="sort" data-sort="ID">ID</th><th scope="col" class="sort" data-sort="QQ">QQ</th><th scope="col" class="sort" data-sort="domain">域名</th><th scope="col" class="sort" data-sort="time">时间</th><th scope="col" class="sort" data-sort="status">状态</th><th scope="col" class="sort" data-sort="action">操作</th></tr></thead>
          <tbody>
<?php
$rs=$DB->query("SELECT * FROM auth_site WHERE{$sql} and daili='{$daili_id}' order by id desc limit $pageu,$pagesize");
while($res = $DB->fetch($rs))
{
echo '
                          <tr>
                          <td>
                            '.$res['id'].'
                          </td>
                          <td>
                           <a href="list.php?qq='.$res['uid'].'">'.$res['uid'].'</a>&nbsp;<a href="tencent://message/?uin='.$res['uid'].'&Site=%E6%8E%88%E6%9D%83%E5%B9%B3%E5%8F%B0&Menu=yes"><img src="http://pub.idqqimg.com/wpa/images/counseling_style_51.png?>:1"
                          </td>
                          <td>
                           <a href="/jump.php?url='.urlencode(base64_encode('http://'.$res['url'].'/')).'" target="_blank">'.$res['url'].'
                          </td>
                          <td>
                           '.$res['date'].'</td><td onclick="alert(\'授权码：'.$res['authcode'].'\n\r特征码：'.$res['sign'].'\')">'.$res['active'].'
                          </td>
                          <td>
                           <a href="./edit.php?my=edit&id='.$res['id'].'" class="btn btn-xs btn-info">编辑</a> <a href="./edit.php?my=del&id='.$res['id'].'" class="btn btn-xs btn-danger" onclick="return confirm(\'你确实要删除此条授权记录吗？\');">删除</a>
                          </td>
                          <td>
                           </div>
                          </td>
                        </tr>
												';
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
echo '<li><a href="list.php?page='.$first.$link.'"><button type="button" class="btn btn-primary">首页</button></a></li>';
echo '<li><a href="list.php?page='.$prev.$link.'"><button type="button" class="btn btn-secondary">&laquo;</button></a></li>';
} else {
echo '<li class="disabled"><a><button type="button" class="btn btn-primary">首页</button></a></li>';
echo '<li class="disabled"><a><button type="button" class="btn btn-secondary">&laquo;</button></a></li>';
}
for ($i=1;$i<$page;$i++)
echo '<li><a href="list.php?page='.$i.$link.'"><button type="button" class="btn btn-info">'.$i .'</button></a></li>';
echo '<li class="disabled"><a><button type="button" class="btn btn-info active">'.$page.'</button></a></li>';
for ($i=$page+1;$i<=$s;$i++)
echo '<li><a href="list.php?page='.$i.$link.'"><button type="button" class="btn btn-default">'.$i .'</button></a></li>';
echo '';
if ($page<$s)
{
echo '<li><a href="list.php?page='.$next.$link.'"><button type="button" class="btn btn-secondary">&raquo;</button></a></li>';
echo '<li><a href="list.php?page='.$last.$link.'"><button type="button" class="btn btn-danger">尾页</button></a></li>';
} else {
echo '<li class="disabled"><a><button type="button" class="btn btn-secondary">&raquo;</button></a></li>';
echo '<li class="disabled"><a><button type="button" class="btn btn-danger">尾页</button></a></li>';
}
echo'</ul>';
#分页
?>
</center>
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