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
<script>
$(document).ready(function(){
    $('#next').on('click',function(){
		lightyear.loading('show');
        if (typeof($('.no').html()) == 'undefined'){
            $(this).attr('href','index.php?step=2');
        }else{
            alert($('.no').eq(0).parent().parent().find('td:first').html()+' 未通过检测!');
            $(this).attr('href','###');
        }
    });
});
</script>
</head>
<body>
<?php echo $html_header;?>
<div class="container-fluid">
        
        <div class="row">
          <div class="col-lg-12">
		  <div class="step-box" id="step1">
            <div class="card">
              <div class="card-header bg-primary">
                <h4>Step.1</h4>
                <ul class="card-actions">
                  <li>
                    <button type="button"><i class="mdi mdi-more"></i></button>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <p><h4>环境监测</h4>
      <h5>检测服务器环境及文件目录权限</h5></p>
              </div>
            </div>
          </div>
            <div class="card">
              
              <div class="card-body">

  <div class="card-body">
    <table  class="table">
	<caption>
      环境检查
      </caption>
		<tr>
		  <th width="25%">项目</th>
		  <th width="25%">程序所需</th>
		  <th width="25%">最佳配置推荐</th>
		  <th width="25%">当前服务器</th>
		</tr>
	  <tbody>	  
      <?php foreach($env_items as $v){?>
      <tr class="<?php echo $v['status'] ? 'success' : 'danger';?>">
        <td scope="row"><?php echo $v['name'];?></td>
        <td><?php echo $v['min'];?></td>
        <td><?php echo $v['good'];?></td>
        <td><?php echo $v['cur'];?></td>
      </tr>
      <?php }?>
	  </tbody>
    </table>
	<table  class="table">
      <caption>
      目录、文件权限检查
      </caption>
      <tr>
        <th scope="col">目录文件</th>
        <th width="25%">所需状态</th>
        <th width="25%">当前状态</th>
      </tr>
	  <tbody>	
      <?php foreach($dirfile_items as $k => $v){?>
      <tr class="<?php echo $v['status'] == 1 ? 'success' : 'danger';?>">
        <td><?php echo $v['path'];?> </td>
        <td><span>可写</span></td>
        <td><?php echo $v['status'] == 1 ? '可写' : '不可写';?></td>
      </tr>
      <?php }?>
	  </tbody>
    </table>
    <table  class="table">
      <caption>
      函数检查
      </caption>
      <tr>
        <th scope="col">目录文件</th>
        <th width="25%">所需状态</th>
        <th width="25%">当前状态</th>
      </tr>
	  <tbody>	
      <?php foreach($func_items as $k =>$v){?>
      <tr class="<?php echo $v['status'] == 1 ? 'success' : 'danger';?>">
        <td><?php echo $v['name'];?>()</td>
        <td><span>支持</span></td>
        <td><?php echo $v['status'] == 1 ? '支持' : '不支持';?></td>
      </tr>
      <?php }?>
	  </tbody>
    </table>
	
    
  </div>
  
  </div>
            </div>
          </div>
        </div>
        
      </div>
	  
  <div class="col-md-12">
  <div class="btn-box"><a href="index.php" class="btn btn-primary">上一步</a> &nbsp;&nbsp;&nbsp;&nbsp;<a href='###' id="next" class="btn btn-primary">下一步</a></div>
</div>
<div class="col-md-12">
  <br><br><br><br>
</div>
<?php echo $html_footer;?>
</body>
</html>
