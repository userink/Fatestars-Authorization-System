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
<script type="text/javascript" src="js/jquery.icheck.min.js"></script>
<script>
$(document).ready(function(){
  $('input[type="radio"]').on('ifChecked', function(event){
    if(this.id == 'radio-0'){
            $('.select-module').show();
        }else{
            $('.select-module').hide();
        }
  });
    $('#next').click(function(){
		lightyear.loading('show');
		$('#install_form').submit();
        /*if ($('#cms').attr('checked') && $('#shop').attr('checked')){
            $('#install_form').submit();
        }else{
            alert('商城与CMS必须安装');
        }*/
    });
});
</script>
</head>

<body>
<?php ECHO $html_header;?>
<div class="container-fluid">      
        <div class="row">
          <div class="col-sm-12 col-lg-12">
		  
		  <div class="step-box" id="step2">
            <div class="card">
              <div class="card-header bg-primary">
                <h4>Step.2</h4>
                <ul class="card-actions">
                  <li>
                    <button type="button"><i class="mdi mdi-more"></i></button>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <p><h4>选择安装方式</h4>
      <h5>根据需要选择系统模块完全或手动安装</h5></p>
              </div>
            </div>
          </div>

  
  <form method="get" id="install_form" action="index.php">
  <input type="hidden" value="3" name="step">
    <div class="select-install">
      <label class="lyear-radio radio-primary m-t-10">
      <input type="radio" name="iCheck" value="full" id="radio-1" class="green-radio" checked >
      <span>完全安装 fatestars</span>
      </label>
    </div>
	
	<div class="col-md-12">
  <br><br>
</div>
    <div class="btn-box"><a href="index.php?step=1" class="btn btn-primary">上一步</a> &nbsp;&nbsp;&nbsp;&nbsp;<a id="next" href="javascript:void(0);" class="btn btn-primary">下一步</a></div>
  
  </form>
</div></div></div>
<?php echo $html_footer;?>
</body>
</html>
