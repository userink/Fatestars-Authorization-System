<?php
/**
 * 授权平台
**/
include("../includes/common.php");
include './head.php';
$numrows=$DB->count("SELECT count(*) from auth_daili");
$sites=$DB->count("SELECT count(*) from auth_site WHERE 1");
$blocks=$DB->count("SELECT count(*) from auth_block WHERE 1");
$kms=$DB->count("SELECT count(*) from auth_km WHERE 1");
?>
  <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0"><?php echo $title ?></h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>
          </div>
          <!-- Card stats -->
          <div class="row">
              
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">正版授权</h5>
                      <span class="h2 font-weight-bold mb-0">已有<?php echo $sites ?>个</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2">
                      <a href="list.php">查看详细</a> </span>
                    <span class="text-nowrap">Real-time recording</span>
                  </p>
                  </div>
              </div>
            </div>
            
            
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">盗版站点</h5>
                      <span class="h2 font-weight-bold mb-0">存在<?php echo $blocks ?>个</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2">
                      <a href="pirate.php">查看详细</a> </span>
                    <span class="text-nowrap">Real-time recording</span>
                  </p>
                 </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">用户数量</h5>
                      <span class="h2 font-weight-bold mb-0">拥有<?php echo $numrows ?>位</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2">
                      <a href="ulist.php">查看详细</a> </span>
                    <span class="text-nowrap">Real-time recording</span>
                  </p>
                  </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">卡密数量</h5>
                      <span class="h2 font-weight-bold mb-0">现存<?php echo $kms ?>张</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2">
                      <a href="kmlist.php">查看详细</a> </span>
                    <span class="text-nowrap">Real-time recording</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    
    
     <div class="container-fluid mt--6">
      <div class="row card-wrapper">
        <div class="col-lg-4">
          <!-- Basic with list group -->

           
    
  <div class="card card-profile">
            <img src="/assets/manage/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="//q4.qlogo.cn/headimg_dl?dst_uin=<?php echo $conf['qq']?>&amp;spec=100" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="https://wpa.qq.com/msgrd?v=3&uin=1594800175&site=qq&menu=yes" class="btn btn-sm btn-info mr-4">联系作者</a>
                <a href="#" class="btn btn-sm btn-default float-right">超级管理</a>
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                    <div>
                      <span class="heading"><?php echo $numrows ?></span>
                      <span class="description">全站用户</span>
                    </div>
                    <div>
                      <span class="heading"><?php echo $sites ?></span>
                      <span class="description">正版授权</span>
                    </div>
                    <div>
                      <span class="heading"><?php echo $kms ?></span>
                      <span class="description">卡密数量</span>
                    </div>
                  </div>
                </div>
                        </div>
                       <section class="cta">
                            <div class="container">
                             <div class="text-center">
                                <h3>Hitokoto</h3>
                                    <p id="hitokoto">
                                        :D 获取中...
                                                   </p>
                                       <script src="https://v1.hitokoto.cn/?encode=js&amp;select=%23hitokoto" defer=""></script>
                             </div>
                            </div>
                       </section>
              </div>
            </div>
          </div>
        
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">系统公告</h3>
            </div>
            <div class="card-body">
              <div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed">
                 
                  <?php
$rs=$DB->query("SELECT * FROM auth_gg  order by id desc limit 2");
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
         
<a href="./gg.php" class="dropdown-item text-center text-primary font-weight-bold py-3">查看全部</a>
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