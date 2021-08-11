<?php
include("../includes/common.php");
$title='系统管理';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
echo'
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">系统管理</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">系统管理</a></li>
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
    </div>';

$mod=isset($_GET['mod'])?$_GET["mod"]:NULL;
if($mod=="site_n" && $_POST["do"] == "submit"){
	if($_POST['title'] == NULL && $_POST['qq'] == NULL){
		exit("<script type='text/javascript'>layer.alert('必填项不能为空！',{icon:5},function(){history.go(-1)});</script>");
    }
    saveSetting('title',$_POST['title']);
    saveSetting('qq',$_POST['qq']);
    saveSetting('keywords',$_POST['keywords']);
    saveSetting('description',$_POST['description']);
    saveSetting('sizekb',$_POST['sizekb']);
    saveSetting('repair',$_POST['repair']);
	$ad=$CACHE->clear();
	if($ad)
		exit("<script type='text/javascript'>layer.alert('修改成功',{icon:6},function(){window.location.href='./set.php?mod=site'});</script>");
	else
		exit("<script type='text/javascript'>layer.alert('修改失败".$DB->error()."',{icon:5},function(){window.location.href='./set.php?mod=site'});</script>");
}elseif($mod=="site"){
?>
<div class="container-fluid mt--6">
      <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
          <h3 class="mb-0">网站设置</h3>
        </div>
                <!-- Card body -->
        <div class="card-body">
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="card-body">
<form action="./set.php?mod=site_n" method="post" class="form-horizontal" role="form">
<input type="hidden" name="do" value="submit">

<div class="input-group">
<span class="input-group-addon">网站标题&nbsp;&nbsp;</span>
<input type="text" name="title" class="form-control" placeholder="网站主要标题" value="<?=$conf['title']?>">
</div><br/>

<div class="input-group">
<span class="input-group-addon">站长QQ&nbsp;&nbsp;&nbsp;&nbsp;</span>
<input type="text" name="qq" class="form-control" placeholder="网站站长QQ号" value="<?=$conf['qq']?>">
</div><br/>

<div class="input-group">
<span class="input-group-addon">网站词字&nbsp;&nbsp;</span>
<input type="text" name="keywords" class="form-control" value="<?=$conf['keywords']?>">
</div><br/>

<div class="input-group">
<span class="input-group-addon">网站信息&nbsp;&nbsp;</span>
<input type="text" name="description" class="form-control" value="<?=$conf['description']?>">
</div><br/>

<div class="input-group">
<span class="input-group-addon">文件限制&nbsp;&nbsp;</span>
<input type="text" name="sizekb" class="form-control" placeholder="前台加密文件大小限制" value="<?=$conf['sizekb']?>">
</div><br/>

<div class="input-group">
<span class="input-group-addon">全站维护 ( 后台不维护 )&nbsp;&nbsp;</span>
<select name="repair" class="form-control" default="<?=$conf['repair']?>">
<option value="1">关闭</option><option value="0">开启</option>
</select>
</div><br/>

<div class="form-group">
<div class="col-sm-12"><button class="btn btn-primary form-control" type="submit">确认保存</button></div>
</div>

</form>
</div>
</div>
</div>
</div>
</div>
<?php
}elseif($mod == "pass"){
?>
<div class="container-fluid mt--6">
      <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
          <h3 class="mb-0">密码修改</h3>
        </div>
                <!-- Card body -->
        <div class="card-body">
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="card-body">

<div class="form-group">
<label for="nickname">新密码</label>
<input type="text" id="pass" maxlength="16" value="" name="pass" placeholder="不修改请留空" class="form-control"  autocomplete="off" />
</div>

<button onclick="pass();" name="submit" class="btn btn-primary btn-block btn-round">确定更改</button>
</div>
</div>
</div>
</div>
</div>
<?php
}elseif($mod=="mail_n" && $_POST["do"] == "submit"){
    
	if($_POST['mail_smtp'] == NULL && $_POST['mail_post'] == NULL){
		exit("<script type='text/javascript'>layer.alert('必填项不能为空！',{icon:5},function(){history.go(-1)});</script>");
    }
    saveSetting('mail_smtp',$_POST['mail_smtp']);
    saveSetting('mail_post',$_POST['mail_post']);
    saveSetting('mail_user',$_POST['mail_user']);
    saveSetting('mail_pass',$_POST['mail_pass']);
    saveSetting('mail_time',$_POST['mail_time']);
	$ad=$CACHE->clear();
	if($ad)
		exit("<script type='text/javascript'>layer.alert('修改成功',{icon:6},function(){window.location.href='./set.php?mod=mail'});</script>");
	else
		exit("<script type='text/javascript'>layer.alert('修改失败".$DB->error()."',{icon:5},function(){window.location.href='./set.php?mod=mail'});</script>");
}elseif($mod=="mail"){
?>
<div class="container-fluid mt--6">
      <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
          <h3 class="mb-0">邮箱配置</h3>
        </div>
                <!-- Card body -->
        <div class="card-body">
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="card-body">
<form action="./set.php?mod=mail_n" method="post" class="form-horizontal" role="form">
<input type="hidden" name="do" value="submit">

<div class="input-group">
<span class="input-group-addon">邮箱服务器&nbsp;&nbsp;</span>
<input type="text" name="mail_smtp" id="mail_smtp" class="form-control" value="<?=$conf['mail_smtp']?>">
</div><br/>

<div class="input-group">
<span class="input-group-addon">邮箱端口号&nbsp;&nbsp;</span>
<input type="text" name="mail_post" id="mail_post" class="form-control" value="<?=$conf['mail_post']?>">
</div><br/>

<div class="input-group">
<span class="input-group-addon">邮箱用户名&nbsp;&nbsp;</span>
<input type="text" name="mail_user" id="mail_user" class="form-control" value="<?=$conf['mail_user']?>">
</div><br/>

<div class="input-group">
<span class="input-group-addon">邮箱授权码&nbsp;&nbsp;</span>
<input type="text" name="mail_pass" id="mail_pass" class="form-control" value="<?=$conf['mail_pass']?>">
<a href="https://service.mail.qq.com/cgi-bin/help?id=28&no=1001256&subtype=1"><button type="button" class="btn btn-primary btn-sm">点击查看</button></a></div><br/>


<div class="input-group">
<span class="input-group-addon">发送验证码间隔&nbsp;&nbsp;</span><br/>

<input type="text" name="mail_time" id="mail_time" class="form-control" value="<?=$conf['mail_time']?>">
</div><small class="help-block">以秒为单位：&nbsp;&nbsp;<code>1分钟=60秒</code></small><hr/>

<div class="form-group">
<div class="col-sm-12"><button class="btn btn-primary form-control" type="submit">确认保存</button></div>
</div>

</form>
</div>
</div>
</div>
</div>
</div>
<?php
}elseif($mod=="check_n" && $_POST["do"] == "submit"){ 
    
	saveSetting('content',$_POST['content']);
	saveSetting('switch',$_POST['switch']);
	saveSetting('ipauth',$_POST['ipauth']);
	saveSetting('addblock',$_POST['addblock']);
	saveSetting('uplog',$_POST['uplog']);
	saveSetting('update',$_POST['update']);
	saveSetting('ver',$_POST['ver']);
	saveSetting('version',$_POST['version']);
	saveSetting('authfile',$_POST['authfile']);
	$ad=$CACHE->clear();
	if($ad)
		exit("<script type='text/javascript'>layer.alert('修改成功',{icon:6},function(){window.location.href='./set.php?mod=check'});</script>");
	else
		exit("<script type='text/javascript'>layer.alert('修改失败".$DB->error()."',{icon:5},function(){window.location.href='./set.php?mod=check'});</script>");
}elseif($mod=="check"){
?>
<div class="container-fluid mt--6">
      <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
          <h3 class="mb-0">授权配置</h3>
        </div>
                <!-- Card body -->
        <div class="card-body">
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="card-body">
<form action="./set.php?mod=check_n" method="post" class="form-horizontal" role="form">
<input type="hidden" name="do" value="submit">

<div class="input-group">
<span class="input-group-addon">盗版站点信息&nbsp;&nbsp;</span>
<input type="text" name="content" class="form-control" value="<?=$conf['content']?>">
</div><br/>

<div class="input-group">
<span class="input-group-addon">开启验证授权&nbsp;&nbsp;</span>
<select name="switch" class="form-control" default="<?=$conf['switch']?>">
<option value="1">开启</option><option value="0">关闭</option>
</select>
</div><br/>

<div class="input-group">
<span class="input-group-addon">同时验证IP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<select name="ipauth" class="form-control" default="<?=$conf['ipauth']?>">
<option value="1">开启</option><option value="0">关闭</option>
</select>
</div><br/>

<div class="input-group">
<span class="input-group-addon">记录盗版域名&nbsp;&nbsp;</span>
<select name="addblock" class="form-control" default="<?=$conf['addblock']?>">
<option value="1">开启</option><option value="0">关闭</option>
</select>
</div><br/>

<div class="input-group">
<span class="input-group-addon">更新提示信息&nbsp;&nbsp;</span>
<textarea class="form-control" name="uplog" rows="4"><?php echo htmlspecialchars($conf['uplog']); ?></textarea>
</div><br/>

<div class="input-group">
<span class="input-group-addon">是否开启更新&nbsp;&nbsp;</span>
<select name="update" class="form-control" default="<?=$conf['update']?>">
<option value="1">开启</option><option value="0">关闭</option>
</select>
</div><br/>

<div class="input-group">
<span class="input-group-addon">最新版本序号 ( 显示用 ) &nbsp;&nbsp;</span>
<input type="text" name="ver" class="form-control" placeholder="比如：V1.01等于1001版本" value="<?=$conf['ver']?>">
</div><br/>

<div class="input-group">
<span class="input-group-addon">最新版本序号 ( 判断用 ) &nbsp;&nbsp;</span>
<input type="text" name="version" class="form-control" placeholder="比如：1001等于1.0.1版本" value="<?=$conf['version']?>">
</div><br/>

<div class="input-group">
<span class="input-group-addon">网站授权码位置&nbsp;&nbsp;</span>
<input type="text" name="authfile" class="form-control" value="<?=$conf['authfile']?>">
</div><br/>

<div class="form-group">
<div class="col-sm-12"><button class="btn btn-primary form-control" type="submit">确认保存</button></div>
</div>

</form>
</div>
</div>
</div>
</div>
</div>
<?php	
}elseif ($mod == 'template_n' && $_POST['do'] == 'submit') {
                            $template = $_POST['template'];
                            $cdnserver = $_POST['cdnserver'];
                            if (Template::exists($template) == false) {
                                temmsg('该模板首页文件不存在！', 3);
                            }
                            saveSetting('template', $template);
                            saveSetting('cdnserver', $cdnserver);
                            $ad = $CACHE->clear();
                            if ($ad) {
                                temmsg('修改成功！', 1);
                            } else {
                                temmsg('修改失败！<br/>' . $DB->error(), 4);
                            }
                        }
                      	
elseif ($mod == 'template') {
$mblist = Template::getList();
echo '<div class="container-fluid mt--6">
      <div class="card mb-4">
        <!-- Card header -->
        <div class="card-header">
          <h3 class="mb-0">模板配置</h3>
        </div>
                <!-- Card body -->
        <div class="card-body">
          <!-- Form groups used in grid -->
          <div class="row">
            <div class="card-body">

<div>

 <form action="./set.php?mod=template_n" method="post" class="form-horizontal" role="form"><input type="hidden" name="do" value="submit"/>

   <div class="form-group">

      <label class="form-control-label" for="exampleFormControlSelect1">选择模板</label>
	 <div class="col-sm-10"><select class="form-control" name="template" default="';
                                echo $conf['template'];
                                echo '">

	 ';
                                foreach ($mblist as $row) {
                                    echo '<option value="' . $row . '">' . $row . '</option>';
                                }
                                echo '	 </select></div>

	</div><br/>
	<div class="form-group">
	 <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>

	</div>

	</div>

 </form>

</div>

</div>

';
}
?>
<script>
var items = $("select[default]");
for (i = 0; i < items.length; i++) {
$(items[i]).val($(items[i]).attr("default")||0);
}
</script>

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