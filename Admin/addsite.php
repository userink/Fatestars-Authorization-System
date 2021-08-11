<?php
/**
 * 添加站点
**/
include("../includes/common.php");
$title='添加站点';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
<?php

if(isset($_POST['qq']) && isset($_POST['url'])){
$qq=daddslashes($_POST['qq']);
$url=daddslashes($_POST['url']);
$row=$DB->get_row("SELECT * FROM auth_site WHERE uid='{$qq}' limit 1");
if($row=='')exit("<script language='javascript'>alert('授权平台不存在该QQ！');history.go(-1);</script>");
if($row['active']==0)exit("<script language='javascript'>alert('此QQ的授权已被封禁！');history.go(-1);</script>");
$url=str_replace('，',',',$url);
$url_arr=explode(',',$url);
$re='';
foreach($url_arr as $val) {
	$row1=$DB->get_row("SELECT * FROM auth_site WHERE url='{$val}' limit 1");
	if($row1!='')continue;
	$sql="insert into `auth_site` (`uid`,`url`,`date`,`authcode`,`active`,`sign`) values ('".$qq."','".trim($val)."','".$date."','".$row['authcode']."','1','".$row['sign']."')";
	$DB->query($sql);
	$re.=$val.',';
}
if($re){
$city=get_ip_city($clientip);
$DB->query("insert into `auth_log` (`uid`,`type`,`date`,`city`,`data`) values ('".$user."','添加站点','".$date."','".$city."','".$qq."|".$re."')");
exit("<script language='javascript'>alert('{$re}添加成功！');history.go(-1);</script>");
}else
exit("<script language='javascript'>alert('添加失败，可能域名已存在！');history.go(-1);</script>");
} ?>
 <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">添加站点</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">授权管理</a></li>
                  <li class="breadcrumb-item active" aria-current="page">添加站点</li>
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
          <h3 class="mb-0">添加站点</h3>
        </div>
        <!-- Card body -->
        <div class="card-body">
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="card-body">
          <form action="./addsite.php" method="post" class="form-horizontal" role="form">
            <div class="input-group">
              <span class="input-group-addon">QQ&nbsp;&nbsp;&nbsp;&nbsp;</span>
              <input type="text" name="qq" value="<?=@$_POST['qq']?>" class="form-control" placeholder="购买授权的QQ" autocomplete="off" required/>
            </div><br/>
            <div class="input-group">
              <span class="input-group-addon">域名&nbsp;&nbsp;</span>
              <input type="text" name="url" value="<?=@$_POST['url']?>" class="form-control" placeholder="www.fatestars.com,fatestars.com 添多个域名请用英文逗号 , 隔开！" autocomplete="off" required/>
            </div><br/>
            <div class="form-group">
              <div class="col-sm-12"><input type="submit" value="添加" class="btn btn-primary form-control"/></div>
            </div>
          </form>
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