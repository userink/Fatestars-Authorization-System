 <?php
include("../includes/common.php");
$title='模板设置';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
                                $mblist = Template::getList();
?>
<html>  
<body>

<!--页面主要内容-->
 <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">模板设置</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">模板设置</li>
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
      <div class="row">
<div class="col-lg-6">
          <div class="card">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">模板设置</h3>
            </div>
            <div class="card-body">
                
                    <form action="./template.php" method="post" class="form-horizontal" role="form"><input
                                type="hidden" name="do" value="submit"/>
                       <div class="form-group">
                    <label class="form-control-label" for="exampleFormControlSelect">Example select</label>
                    <div class="col-sm-10">
                    <select class="form-control" id="exampleFormControlSelect" name="template" default="<?php echo $conf['template']; ?>">


                                foreach ($mblist as $row) {
                                    <option value="'.$row.'">'.$row .'</option>
                                }          
                                
                           
                                	 </select>
                                	 
                                	 </div>  

	</div><br/>

	<div class="form-group">

	 <label class="col-sm-2 control-label">静态资源CDN</label>

	 <div class="col-sm-10"><select class="form-control" name="cdnserver" default="<?php echo $conf['cdnserver']; ?>">

	 <option value="0">关闭</option>

	 <option value="1">彩虹CDN一号</option>

	 </select></div>

	</div><br/>

	<div class="form-group">

	 <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>

	</div>

	</div>

 </form>

</div>

<div class="panel-footer">

<span class="glyphicon glyphicon-info-sign"></span>

网站模板对应template目录里面的名称，会自动获取

</div>
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