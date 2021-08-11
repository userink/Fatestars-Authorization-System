<?php
/**
 * 代理管理
**/
include("../includes/common.php");
$title='修改密码';
include './head.php';
if($islogins==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
<main class="lyear-layout-content">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">

<div class="form-group">
<label for="username">UID</label>
<input type="text" class="form-control" value="<?php echo $udata['uid']?>" disabled="disabled" />
</div>

<div class="form-group">
<label for="nickname">用户名</label>
<input type="text" class="form-control" value="<?php echo $udata['user']?>" placeholder="您的用户名" disabled="disabled" >
</div>

<div class="form-group">
<label for="nickname">用户QQ</label>
<input type="text" class="form-control" value="<?php echo $udata['qq']?>" placeholder="您的QQ账号" disabled="disabled" >
</div>

<div class="form-group">
<label for="nickname">新密码</label>
<input type="text" id="pass" maxlength="16" value="" name="pass" placeholder="不修改请留空" class="form-control"  autocomplete="off" />
</div>

<button onclick="submit();" name="submit" class="btn btn-primary btn-block btn-round">确定更改</button>
</div>
</div>
</div>
<script type="text/javascript" src="../assets/js/auth.js"></script>
<script type="text/javascript" src="../assets/LightYear/js/jquery.min.js"></script>
<script type="text/javascript" src="../assets/LightYear/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/LightYear/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="../assets/LightYear/js/main.min.js"></script>
</body>
</html>