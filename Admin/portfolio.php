<?php
/**
 * 项目管理
**/
include("../includes/common.php");
$title='项目管理';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">项目管理</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">项目管理</li>
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
          <h3 class="mb-0">项目管理</h3>
        </div>
                <!-- Card body -->
        <div class="card-body">
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="card-body">
<?php

$my=isset($_GET['my'])?$_GET['my']:null;

if($my=='add')
{
echo '<form action="./portfolio.php?my=add_submit" method="POST">
<div class="form-group">
<label>域名:</label><br>
<input type="text" class="form-control" name="url" value="" required>
</div>
<div class="form-group">
<label>标题:</label><br>
<input type="text" class="form-control" name="title" value="" required>
</div>
<div class="form-group">
<label>描述:</label><br>
<input type="text" class="form-control" name="description" value="">
</div>
<div class="form-group">
<label>标签:</label>
<input type="text" class="form-control" name="tag" value="">
</div>
<div class="form-group">
<label>价格:</label>
<input type="text" class="form-control" name="money" value="">
</div>
<div class="form-group">
<label>介绍:</label>
<input type="text" class="form-control" name="html" value="">
</div>
<div class="form-group">
<label>once:</label>
<input type="text" class="form-control" name="once" value="">
</div>
<input type="submit" class="btn btn-primary btn-block" value="确定添加"></form>';
echo '<br/><a href="./portfolio.php"><button type="button" class="btn btn-secondary btn-sm">>>返回项目列表</button></a>';
echo '</div></div>';
}
elseif($my=='edit')
{
$id=intval($_GET['id']);
$row=$DB->get_row("select * from auth_combo where id='$id' limit 1");
echo '<form action="./portfolio.php?my=edit_submit&id='.$id.'" method="POST">
<div class="form-group">
<label>域名:</label><br>
<input type="text" class="form-control" name="url" value="'.$row['url'].'" required>
</div>
<div class="form-group">
<label>标题:</label><br>
<input type="text" class="form-control" name="title" value="'.$row['title'].'" required>
</div>
<div class="form-group">
<label>内容:</label><br>
<input type="text" class="form-control" name="description" value="'.$row['description'].'">
</div>
<div class="form-group">
<label>标签:</label><br>
<input type="text" class="form-control" name="tag" value="'.$row['tag'].'">
</div>
<div class="form-group">
<label>价格:</label><br>
<input type="text" class="form-control" name="money" value="'.$row['money'].'">
</div>
<div class="form-group">
<label>介绍:</label><br>
<input type="text" class="form-control" name="html" value="'.htmlspecialchars($row['html']).'">
</div>
<div class="form-group">
<label>once:</label><br>
<input type="text" class="form-control" name="once" value="'.$row['once'].'">
</div>
<input type="submit" class="btn btn-primary btn-block" value="确定修改"></form>';
echo '<br/><a href="./portfolio.php"><button type="button" class="btn btn-secondary btn-sm">>>返回项目列表</button></a>';
echo '</div></div>';
}
elseif($my=='add_submit')
{
$url=$_POST['url'];
$title=$_POST['title'];
$description=$_POST['description'];
$tag=$_POST['tag'];
$money=$_POST['money'];
$html=$_POST['html'];
$once=$_POST['once'];
if($url==NULL or $title==NULL or  $description==NULL or $money==NULL or $html==NULL or $once==NULL){
showmsg('保存错误,请确保必填项都不为空!',3);
} else {
$rows=$DB->get_row("select * from auth_combo where url='$url' limit 1");
if($rows)
exit("<script language='javascript'>alert('该域名已存在！');window.location.href='portfolio.php?my=add';</script>");
$sql="insert into `auth_combo` (`url`,`title`,`description`,`tag`,`money`,`html`,`once`) values ('".$url."','".$title."','".$description."','".$tag."','".$money."','".$html."','".$once."')";
if($DB->query($sql)){
	showmsg('添加项目成功！<br/><br/><a href="./portfolio.php"><button type="button" class="btn btn-secondary btn-sm">>>返回项目列表</button></a>',1);
}else
	showmsg('添加项目失败！'.$DB->error(),4);
}
}
elseif($my=='edit_submit')
{
$id=intval($_GET['id']);
$rows=$DB->get_row("select * from auth_combo where id='$id' limit 1");
if(!$rows)
	showmsg('当前记录不存在！',3);
$url=$_POST['url'];
$title=$_POST['title'];
$description=$_POST['description'];
$tag=$_POST['tag'];
$money=$_POST['money'];
$html=$_POST['html'];
$once=$_POST['once'];
if($url==NULL or $title==NULL or  $description==NULL or $money==NULL or $html==NULL or $once==NULL){
showmsg('保存错误,请确保必填项都不为空!',3);
} else {
if($DB->query("update auth_combo set url='$url',title='$title',description='$description',tag='$tag',money='$money',html='$html',once='$once' where id='{$id}'"))
	showmsg('修改项目成功！<br/><br/><a href="./portfolio.php"><button type="button" class="btn btn-secondary btn-sm">>>返回项目列表</button></a>',1);
else
	showmsg('修改项目失败！'.$DB->error(),4);
}
}
elseif($my=='delete')
{
$id=intval($_GET['id']);
$sql="DELETE FROM auth_combo WHERE id='$id'";
if($DB->query($sql))
	showmsg('删除成功！<br/><br/><a href="./portfolio.php"><button type="button" class="btn btn-secondary btn-sm">>>返回项目列表</button></a>',1);
else
	showmsg('删除失败！'.$DB->error(),4);
}
else
{

$numrows=$DB->count("SELECT count(*) from auth_combo");
if(isset($_GET['id'])){
	$sql = " id={$_GET['id']}";
}elseif(isset($_GET['kw'])){
	$sql = " user='{$_GET['kw']}' or qq='{$_GET['kw']}'";
}else{
	$sql = " 1";
}
$con='系统共有 <b>'.$numrows.'</b> 个管理项目<br/></br><a href="./portfolio.php?my=add" class="btn btn-primary">添加项目</a>';

echo '<div>';
echo $con;
echo '</div></br>';

?>
      <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
          <tr><th scope="col" class="sort" data-sort="id">id</th><th scope="col" class="sort" data-sort="url">域名</th><th scope="col" class="sort" data-sort="title">标题</th><th scope="col" class="sort" data-sort="description">内容</th><th scope="col" class="sort" data-sort="tag">标签</th><th scope="col" class="sort" data-sort="money">价格</th><th scope="col" class="sort" data-sort="html">介绍</th><th scope="col" class="sort" data-sort="once">once</th><th scope="col" class="sort" data-sort="action">操作</th></tr></thead>
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

$rs=$DB->query("SELECT * FROM auth_combo WHERE{$sql} order by id desc limit $offset,$pagesize");
while($res = $DB->fetch($rs))
{
echo '<tr> <td><b>'.$res['id'].'</b></td> 
      <td>'.$res['url'].'</td>
      <td>'.$res['title'].'</td>
      <td>'.$res['description'].'</td>
      <td>'.$res['tag'].'</td>
      <td>'.$res['money'].'</td>
      <td>'.$res['html'].'</td>
      <td>'.$res['once'].'</td>
      <td><a href="./portfolio.php?my=edit&id='.$res['id'].'" class="btn btn-info btn-xs">编辑</a>&nbsp;<a href="./portfolio.php?my=delete&id='.$res['id'].'" class="btn btn-xs btn-danger" onclick="return confirm(\'你确实要删除此管理项目吗？\');">删除</a></td></tr>';
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
echo '<li><a href="portfolio.php?page='.$first.$link.'"><button type="button" class="btn btn-primary">首页</button></a></li>';
echo '<li><a href="portfolio.php?page='.$prev.$link.'"><button type="button" class="btn btn-secondary">&laquo;</button></a></li>';
} else {
echo '<li class="disabled"><a><button type="button" class="btn btn-primary">首页</button></a></li>';
echo '<li class="disabled"><a><button type="button" class="btn btn-secondary">&laquo;</button></a></li>';
}
for ($i=1;$i<$page;$i++)
echo '<li><a href="portfolio.php?page='.$i.$link.'"><button type="button" class="btn btn-info">'.$i .'</button></a></li>';
echo '<li class="disabled"><a><button type="button" class="btn btn-info active">'.$page.'</button></a></li>';
if($pages>=10)$pages=10;
for ($i=$page+1;$i<=$pages;$i++)
echo '<li><a href="portfolio.php?page='.$i.$link.'"><button type="button" class="btn btn-info">'.$i .'</button></a></li>';
echo '';
if ($page<$pages)
{
echo '<li><a href="portfolio.php?page='.$next.$link.'"><button type="button" class="btn btn-secondary">&raquo;</button></a></li>';
echo '<li><a href="portfolio.php?page='.$last.$link.'"><button type="button" class="btn btn-danger">尾页</button></a></li>';
} else {
echo '<li class="disabled"><a><button type="button" class="btn btn-secondary">&raquo;</button></a></li>';
echo '<li class="disabled"><a><button type="button" class="btn btn-danger">尾页</button></a></li>';
}
echo'</ul>';
#分页
}
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