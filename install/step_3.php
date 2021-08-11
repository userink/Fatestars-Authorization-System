<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $html_title;?></title>
<link rel="icon" href="../favicon.ico" type="image/ico">
<meta name="keywords" content="fatestars,命运星辰,命运星辰官网">
<meta name="description" content="fatestars（fatestars），中文意为：命运星辰，是一个拥有丰富应用的网站！">
<meta name="author" content="fatestars">
<link href="../assets/data/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/data/css/materialdesignicons.min.css" rel="stylesheet">
<link href="../assets/data/css/style.min.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.validation.min.js"></script>
<script type="text/javascript" src="js/jquery.icheck.min.js"></script>

<script>
$(document).ready(function(){
 
});

$(function(){

    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[^:%,'\*\"\s\<\>\&]+$/i.test(value);
    }, "不得含有特殊字符");
    $("#install_form").validate({
        errorElement: "font",
		
    rules : {
        db_host : {required: true},
        db_name : {required: true},
        db_user : {required: true},
		db_pwd : {required: true},
		db_prefix : {required: true},
        db_port : {required: true, digits: true},
        admin : {required: true, lettersonly: true},
		email : {required:true, email: true, maxlength: 30}, 
        password : {required : true, minlength: 6},
        rpassword : {required : true, equalTo: '#password'},
      }
    });

    jQuery.extend(jQuery.validator.messages, {
      required: "未输入",
      digits: "格式错误",
      lettersonly: "不能含有特殊字符",
	  email: "邮箱格式错误",
      equalTo: "两次密码不一致",
	  maxlength: "邮箱最多30位",
      minlength: "密码至少6位"
    });

    $('#next').click(function(){
		//lightyear.loading('show');
        $('#install_form').submit();
		
    });

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
                <h4>Step.3</h4>
                <ul class="card-actions">
                  <li>
                    <button type="button"><i class="mdi mdi-more"></i></button>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <p><h4>创建数据库</h4>
      <h5>填写数据库及站点相关信息</h5></p>
              </div>
            </div>
          </div>
		  
  <form action="" id="install_form" method="post">
    <input type="hidden" value="submit" name="submitform">
    <input type="hidden" value="<?php echo $install_recover;?>" name="install_recover">
	<div class="form-box control-group">
      <div class="card">
	  <fieldset>
              <div class="card-header"><h4>数据库信息</h4></div>
              <div class="card-body">
                
               <div class="form-group">
                    <label for="example-text-input">数据库服务器</label>
                    <input class="form-control" type="text" name="db_host" placeholder="数据库服务器地址，一般为localhost" value="<?php echo $_POST['db_host'] ? $_POST['db_host'] : 'localhost';?>">
                  </div>
				  <div class="form-group">
                    <label for="example-text-input">数据库名</label>
                    <input class="form-control" type="text" name="db_name" value="<?php echo $_POST['db_name'] ? $_POST['db_name'] : '';?>">
                  </div>
				  <div class="form-group">
                    <label for="example-text-input">数据库用户名</label>
                    <input class="form-control" type="text" name="db_user" value="<?php echo $_POST['db_user'] ? $_POST['db_user'] : '';?>">
                  </div>
                  <div class="form-group">
                    <label for="example-nf-password">数据库密码</label>
                    <input class="form-control" type="password" name="db_pwd" value="<?php echo $_POST['db_pwd'] ? $_POST['db_pwd'] : '';?>">
                  </div>
				  <div class="form-group">
                    <label for="example-text-input">数据库服务器</label>
                    <input class="form-control" type="text" name="db_port" value="<?php echo $_POST['db_port'] ? $_POST['db_port'] : '3306';?>">
                  </div>
        <?php if ($install_error != ''){?>
		<div class="alert alert-danger" role="alert"><?php echo $install_error;?></div>


        <?php }?>
                
              </div>
            </div>
			</fieldset>
    </div>
    <div class="btn-box"><a href="index.php?step=2" class="btn btn-primary">上一步</a> &nbsp;&nbsp;&nbsp;&nbsp;<a id="next" href="javascript:void(0);" class="btn btn-primary">下一步</a></div>
  </form>
</div></div></div>
<?php echo $html_footer2;?>
</body>
</html>
