<?php
include("../includes/common.php");
$title='日志&公告';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
    <!--页面主要内容-->
      <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">日志&公告</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">日志&公告</li>
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
              <h3 class="mb-0">更新日志</h3>
            </div>
            <div class="card-body">
              <div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed">
                 
                  <?php
$rs=$DB->query("SELECT * FROM auth_gx  order by id desc ");
while($res = $DB->fetch($rs))
{
echo'<div class="timeline-block">
                  <span class="timeline-step badge-success">
                    <i class="ni ni-bell-55"></i>
                  </span>
                  <div class="timeline-content">
                    <small class="text-muted font-weight-bold"> '.$res['time'].' </small>
                    <h5 class=" mt-3 mb-0">'.$res['title'].' </h5>
                    <p class=" text-sm mt-1 mb-0"> '.$res['content'].'</p>
                    <div class="mt-3"> 
                    <span class="badge badge-pill badge-success">'.$res['tag'].'</span>
                    </div>
                  </div>
                </div>'; 
}
        ?> 


            </div> 
         
     </div>
        </div>  
</div>  

        <div class="col-lg-6">
          <div class="card bg-gradient-default shadow">
            <div class="card-header bg-transparent">
              <h3 class="mb-0 text-white">管理公告</h3>
            </div>
            <div class="card-body">
              <div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed">
                  <?php
$rs=$DB->query("SELECT * FROM auth_gg  order by id desc");
while($res = $DB->fetch($rs))
{
echo'
                <div class="timeline-block">
                  <span class="timeline-step badge-success">
                    <i class="ni ni-bell-55"></i>
                  </span>
                  <div class="timeline-content">
                    <small class="text-light font-weight-bold"> '.$res['time'].' </small>
                    <h5 class="text-white mt-3 mb-0">'.$res['title'].'</h5>
                    <p class="text-light text-sm mt-1 mb-0">'.$res['content'].'</p>
                    <div class="mt-3">
                      <span class="badge badge-pill badge-success">'.$res['tag'].'</span>
                    </div>
                  </div>
                </div>'; 
}
        ?> 


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