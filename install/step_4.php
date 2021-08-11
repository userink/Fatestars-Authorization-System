<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $html_title;?></title>
<link rel="icon" href="../favicon.ico" type="image/ico">
<meta name="keywords" content="LightYear,光年,后台模板,后台管理系统,光年HTML模板">
<meta name="description" content="LightYear是一个基于Bootstrap v3.3.7的后台管理系统的HTML模板。">
<meta name="author" content="yinqi">
<link href="../assets/data/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/data/css/materialdesignicons.min.css" rel="stylesheet">
<link href="../assets/data/css/style.min.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
<script type="text/javascript">

var scroll_height = 0;
function showmessage(message) {
    document.getElementById('license').innerHTML += message+"<br/>";
    document.getElementById("text-box").scrollTop = 500+scroll_height;
    scroll_height += 40;
}
$(document).ready(function(){
   lightyear.notify('安装成功！', 'success', 3000, 'mdi mdi-emoticon-happy', 'top', 'center');
});
</script>
</head>

<body>
<?php echo $html_header;?>
<div class="container-fluid">      
	<div class="row">
	  <div class="col-sm-12 col-lg-12">

<div class="step-box" id="step3">
            <div class="card">
              <div class="card-header bg-primary">
                <h4>Step.4</h4>
                <ul class="card-actions">
                  <li>
                    <button type="button"><i class="mdi mdi-more"></i></button>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <p><h4>安装数据库</h4>
      <h5>执行数据库安装……</h5></p>
              </div>
            </div>
          </div>

<div class="card"><div class="card-header"><h4>安装记录</h4></div>
<div class="card-body">
  <div class="card-header" id="text-box">
    <div class="license" id="license"></div>
  </div></div></div>
  <div class="btn-box"><a href="javascript:void(0);" id="install_process" class="btn btn-primary">正在安装 ...</a></div>
</div></div></div>
<?php echo $html_footer;?>
</body>
</html>
