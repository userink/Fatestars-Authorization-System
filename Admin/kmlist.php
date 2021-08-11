<?php
/**
 * 盗版站点
**/
include("../includes/common.php");
$title='卡密管理';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">卡密生成</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">卡密生成</li>
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
          <h3 class="mb-0">卡密生成</h3>
        </div>
                <!-- Card body -->
        <div class="card-body">
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="card-body">
<div class="form-group">
<label for="web_site_title">生成数量</label>
<input class="form-control" type="text" id="count" name="count" value="<?=@$_POST['count']?>" placeholder="请输入数量">
</div>
<div class="form-group">
<button type="button" onclick="km();" class="btn btn-primary m-r-5">确 定</button>
</div>
</div>
</div>
</div>
</div>

<?php
$gls=$DB->count("SELECT count(*) from auth_km WHERE 1");
$ok=$DB->count("SELECT count(*) from auth_km WHERE state=0");
$no=$DB->count("SELECT count(*) from auth_km WHERE state=1");
$sql=" 1";
$con='<div class="row"><div class="col-lg-12"><div class="card"><div class="card-header">卡密列表</div><div class="card-body">';

$pagesize=10;
if (!isset($_GET['page'])) {
	$page = 1;
	$pageu = $page - 1;
} else {
	$page = $_GET['page'];
	$pageu = ($page - 1) * $pagesize;
}
echo '<div class="row"><div class="col-lg-12"><div class="card"><div class="card-header"><h4>卡密数据</h4></div><div class="card-body">系统共有 <b>'.$gls.'</b> 张卡密</p>其中为使用<b> '.$ok.' </b>张卡密</p>其中已使用<b> '.$no.' </b>张卡密<br/></p><br/>功能选项：<a onclick="delrm()"><button type="button" class="btn btn-danger">清空所有卡密</button></a> <a onclick="dels()"><button type="button" class="btn btn-success">清空已使用卡密</button></a></div></div></div></div>';
echo $con;
?>
<div class="table-responsive">
<table class="table align-items-center table-flush">
<thead class="thead-light">
<tr>
<th scope="col" class="sort" data-sort="ID">ID</th>
<th scope="col" class="sort" data-sort="km">卡密</th>
<th scope="col" class="sort" data-sort="status">状态</th>
<th scope="col" class="sort" data-sort="action">操作</th>
</tr>
</thead>
<tbody>
<?php
$rs=$DB->query("SELECT * FROM auth_km WHERE{$sql} order by id desc limit $pageu,$pagesize");
while($res = $DB->fetch($rs))
{
echo '<tr><td><button type="button" class="btn btn-outline-info">'.$res['id'].'</button></td><td><button type="button" class="btn btn-secondary">'.$res['km'].'</button></td>';
if($res['state'] == '0')
{
echo '<td><button type="button" class="btn btn-success">未使用</button></td>';
}
elseif($res['state'] == '1')
{
echo '<td><button type="button" class="btn btn-danger">已使用</button></td>';
}
echo '<td> <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"" onclick="del('.$res['id'].')"><i class="layui-icon layui-icon-delete"></i><button type="button" class="btn btn-outline-danger">删除</button></a></td></tr>';
}
?>
</td>
</tr>
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
echo '<li><a href="kmlist.php?page='.$first.$link.'"><button type="button" class="btn btn-primary">首页</button></a></li>';
echo '<li><a href="kmlist.php?page='.$prev.$link.'"><button type="button" class="btn btn-secondary">&laquo;</button></a></li>';
} else {
echo '<li class="disabled"><a><button type="button" class="btn btn-primary">首页</button></a></li>';
echo '<li class="disabled"><a><button type="button" class="btn btn-secondary">&laquo;</button></a></li>';
}
for ($i=1;$i<$page;$i++)
echo '<li><a href="kmlist.php?page='.$i.$link.'"><button type="button" class="btn btn-default">'.$i .'</button></a></li>';
echo '<li class="disabled"><a><button type="button" class="btn btn-info active">'.$page.'</button></a></li>';
for ($i=$page+1;$i<=$s;$i++)
echo '<li><a href="kmlist.php?page='.$i.$link.'"><button type="button" class="btn btn-default">'.$i .'</button></a></li>';
echo '';
if ($page<$s)
{
echo '<li><a href="kmlist.php?page='.$next.$link.'"><button type="button" class="btn btn-secondary">&raquo;</button></a></li>';
echo '<li><a href="kmlist.php?page='.$last.$link.'"><button type="button" class="btn btn-danger">尾页</button></a></li>';
} else {
echo '<li class="disabled"><a><button type="button" class="btn btn-secondary">&raquo;</button></a></li>';
echo '<li class="disabled"><a><button type="button" class="btn btn-danger">尾页</button></a></li>';
}
echo'</ul>';
#分页
?>
</div>
</div>
</div>
  <script type="text/javascript" src="../assets/js/auth.js"></script>
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