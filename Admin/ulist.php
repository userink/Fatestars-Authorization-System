<?php
/**
 * 代理管理
**/
include("../includes/common.php");
$title='代理管理';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">代理管理</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">代理管理</li>
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
          <h3 class="mb-0">代理管理</h3>
        </div>
                <!-- Card body -->
        <div class="card-body">
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="card-body">
                
<div class="modal fade" align="left" id="search" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <div class="card-header">
          <h3 class="mb-0">代理搜索</h3>
        </div>
      <div class="modal-body">
      <form action="ulist.php" method="GET">
<input type="text" class="form-control" name="kw" placeholder="请输入用户名或QQ"><br/>
<input type="submit" class="btn btn-primary btn-block" value="搜索"></form>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php

$my=isset($_GET['my'])?$_GET['my']:null;

if($my=='add')
{
echo '<form action="./ulist.php?my=add_submit" method="POST">
<div class="form-group">
<label>用户名:</label><br>
<input type="text" class="form-control" name="user" value="" required>
</div>
<div class="form-group">
<label>密码:</label><br>
<input type="text" class="form-control" name="pwd" value="" required>
</div>
<div class="form-group">
<label>联系QQ:</label><br>
<input type="text" class="form-control" name="qq" value="">
</div>
<div class="form-group">
<label>用户权限:</label>
<select name="per_tj" class="form-control" default="'.$row['per_tj'].'"><option value="1">授权商</option><option value="0">合作商</option></select>
</div>
<div class="form-group">
<label>用户状态:</label>
<select name="active" class="form-control"><option value="1">1_激活</option><option value="0">0_封禁</option></select>
</div>
<input type="submit" class="btn btn-primary btn-block" value="确定添加"></form>';
echo '<br/><a href="./ulist.php"><button type="button" class="btn btn-secondary btn-sm">>>返回代理列表</button></a>';
echo '</div></div>';
}
elseif($my=='edit')
{
$id=intval($_GET['id']);
$row=$DB->get_row("select * from auth_daili where uid='$id' limit 1");
echo '<form action="./ulist.php?my=edit_submit&id='.$id.'" method="POST">
<div class="form-group">
<label>用户名:</label><br>
<input type="text" class="form-control" name="user" value="'.$row['user'].'" required>
</div>
<div class="form-group">
<label>密码:</label><br>
<input type="text" class="form-control" name="pwd" value="'.$row['pass'].'" required>
</div>
<div class="form-group">
<label>联系QQ:</label><br>
<input type="text" class="form-control" name="qq" value="'.$row['qq'].'">
</div>
<div class="form-group">
<label>常用登陆地:</label><br>
<input type="text" class="form-control" name="citylist" value="'.$row['citylist'].'" placeholder="多个登录地用,隔开">
</div>
<div class="form-group">
<label>用户权限:</label>
<select name="per_tj" class="form-control" default="'.$row['per_tj'].'"><option value="1">授权商</option><option value="0">合作商</option></select>
</div>
<div class="form-group">
<label>用户状态:</label>
<select name="active" class="form-control" default="'.$row['active'].'"><option value="1">1_激活</option><option value="0">0_封禁</option></select>
</div>
<input type="submit" class="btn btn-primary btn-block" value="确定修改"></form>';
echo '<br/><a href="./ulist.php"><button type="button" class="btn btn-secondary btn-sm">>>返回代理列表</button></a>';
echo '</div></div>';
}
elseif($my=='add_submit')
{
$user=$_POST['user'];
$pwd=$_POST['pwd'];
$qq=$_POST['qq'];
$per_tj=$_POST['per_tj'];
$active=$_POST['active'];
if($per_tj=="0") {
	$per_tj=0;
} elseif($per_tj=="1") {
	$per_tj=1;
}
if($per_tj=="0") {
	$qx = "合作商";
} elseif($per_tj=="1") {
	$qx = "授权商";
}
if($user==NULL or $pwd==NULL or  $qq==NULL or $active==NULL){
showmsg('保存错误,请确保每项都不为空!',3);
} else {
$rows=$DB->get_row("select * from auth_daili where user='$user' limit 1");
if($rows)
exit("<script language='javascript'>alert('用户名已存在！');window.location.href='ulist.php?my=add';</script>");
$sql="insert into `auth_daili` (`user`,`pass`,`qq`,`per_tj`,`active`,`boss`) values ('".$user."','".$pwd."','".$qq."','".$per_tj."','".$active."','".$admin_user."')";
if($DB->query($sql)){
	$email = $qq . '@qq.com';
$sub = ''.$conf['title'].' - 代理购买信息';
$msg = '代理权限 : ' . $qx . ' <br>代理账号 : ' . $user . ' <br>代理密码 : ' . $pwd . ' <br>代理 Q Q : ' . $qq . '';
send_mail($email, $sub, $msg);
	showmsg('添加代理成功！<br/><br/><a href="./ulist.php"><button type="button" class="btn btn-secondary btn-sm">>>返回代理列表</button></a>',1);
}else
	showmsg('添加代理失败！'.$DB->error(),4);
}
}
elseif($my=='edit_submit')
{
$id=intval($_GET['id']);
$rows=$DB->get_row("select * from auth_daili where uid='$id' limit 1");
if(!$rows)
	showmsg('当前记录不存在！',3);
$user=$_POST['user'];
$pwd=$_POST['pwd'];
$qq=$_POST['qq'];
$per_tj=$_POST['per_tj'];
$citylist=$_POST['citylist'];
$active=$_POST['active'];
if($user==NULL or $pwd==NULL or $active==NULL){
showmsg('保存错误,请确保每项都不为空!',3);
} else {
if($DB->query("update auth_daili set user='$user',pass='$pwd',qq='$qq',per_tj='$per_tj',citylist='$citylist',active='$active' where uid='{$id}'"))
	showmsg('修改代理成功！<br/><br/><a href="./ulist.php"><button type="button" class="btn btn-secondary btn-sm">>>返回代理列表</button></a>',1);
else
	showmsg('修改代理失败！'.$DB->error(),4);
}
}
elseif($my=='delete')
{
$id=intval($_GET['id']);
$sql="DELETE FROM auth_daili WHERE uid='$id'";
if($DB->query($sql))
	showmsg('删除成功！<br/><br/><a href="./ulist.php"><button type="button" class="btn btn-secondary btn-sm">>>返回代理列表</button></a>',1);
else
	showmsg('删除失败！'.$DB->error(),4);
}
else
{

$numrows=$DB->count("SELECT count(*) from auth_daili");
if(isset($_GET['id'])){
	$sql = " uid={$_GET['id']}";
}elseif(isset($_GET['kw'])){
	$sql = " user='{$_GET['kw']}' or qq='{$_GET['kw']}'";
}else{
	$sql = " 1";
}
$con='系统共有 <b>'.$numrows.'</b> 个代理用户<br/></br><a href="./ulist.php?my=add" class="btn btn-primary">添加用户</a>&nbsp;<a href="#" data-toggle="modal" data-target="#search" id="search" class="btn btn-success">搜索</a>';

echo '<div>';
echo $con;
echo '</div></br>';

?>
      <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
          <tr><th scope="col" class="sort" data-sort="UID">UID</th><th scope="col" class="sort" data-sort="username">用户名</th><th scope="col" class="sort" data-sort="QQ">QQ</th><th scope="col" class="sort" data-sort="time">上次登录</th><th scope="col" class="sort" data-sort="power">用户等级</th><th scope="col" class="sort" data-sort="status">用户状态</th><th scope="col" class="sort" data-sort="action">操作</th></tr></thead>
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

$rs=$DB->query("SELECT * FROM auth_daili WHERE{$sql} order by uid desc limit $offset,$pagesize");
while($res = $DB->fetch($rs))
{
if($res['active']==0){$q="封禁";}elseif($res['active']==1){$q="正常";}
if($res['per_tj']==1){$p="授权商";}elseif($res['per_tj']==0){$p="合作商";}
echo '<tr><td><b>'.$res['uid'].'</b></td><td>'.$res['user'].'</td><td><a href="tencent://message/?uin='.$res['qq'].'&amp;Site=qq&amp;Menu=yes">'.$res['qq'].'</a></td><td>'.$res['last'].'</td><td>'.$p.'</td><td>'.$q.'</td><td><a href="./ulist.php?my=edit&id='.$res['uid'].'" class="btn btn-info btn-xs">编辑</a>&nbsp;<a href="./list.php?uid='.$res['uid'].'" class="btn btn-warning btn-xs">域名</a>&nbsp;<a href="./log.php?my=search&column=uid&value='.$res['user'].'" class="btn btn-success btn-xs">日志</a>&nbsp;<a href="./ulist.php?my=delete&id='.$res['uid'].'" class="btn btn-xs btn-danger" onclick="return confirm(\'你确实要删除此代理用户吗？\');">删除</a></td></tr>';
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
echo '<li><a href="ulist.php?page='.$first.$link.'"><button type="button" class="btn btn-primary">首页</button></a></li>';
echo '<li><a href="ulist.php?page='.$prev.$link.'"><button type="button" class="btn btn-secondary">&laquo;</button></a></li>';
} else {
echo '<li class="disabled"><a><button type="button" class="btn btn-primary">首页</button></a></li>';
echo '<li class="disabled"><a><button type="button" class="btn btn-secondary">&laquo;</button></a></li>';
}
for ($i=1;$i<$page;$i++)
echo '<li><a href="ulist.php?page='.$i.$link.'"><button type="button" class="btn btn-info">'.$i .'</button></a></li>';
echo '<li class="disabled"><a><button type="button" class="btn btn-info active">'.$page.'</button></a></li>';
if($pages>=10)$pages=10;
for ($i=$page+1;$i<=$pages;$i++)
echo '<li><a href="ulist.php?page='.$i.$link.'"><button type="button" class="btn btn-info">'.$i .'</button></a></li>';
echo '';
if ($page<$pages)
{
echo '<li><a href="ulist.php?page='.$next.$link.'"><button type="button" class="btn btn-secondary">&raquo;</button></a></li>';
echo '<li><a href="ulist.php?page='.$last.$link.'"><button type="button" class="btn btn-danger">尾页</button></a></li>';
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