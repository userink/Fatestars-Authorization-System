<?php
@header('Content-Type: text/html; charset=UTF-8');
$title="正版查询";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title><?php echo $conf['title']?> -  <?php echo $title ?></title>
<link rel="icon" href="./assets/LightYear/favicon.ico" type="image/ico">
<meta name="keywords" content="<?php echo $_POST['keywords']; ?>"/>
<meta name="description" content="<?php echo $conf['description']?>">
<meta name="author" content="fatestars">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<!-- Vendor CSS Files -->
<link href="assets/main/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/main/vendor/icofont/icofont.min.css" rel="stylesheet">
<link href="assets/main/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="//at.alicdn.com/t/font_1886590_v6zxjghcwli.css" rel="stylesheet">
<link href="assets/main/vendor/animate.css/animate.min.css" rel="stylesheet">
<link href="assets/main/vendor/owl.carousel/assets/main/owl.carousel.min.css" rel="stylesheet">
<link href="assets/main/vendor/venobox/venobox.css" rel="stylesheet">
<!-- Template Main CSS File -->
<link href="assets/main/css/style.css" rel="stylesheet">
<script src="//lib.baomitu.com/jquery/1.12.4/jquery.min.js"></script>
<script src="//lib.baomitu.com/layer/2.3/layer.js"></script>
<link href="assets/static/css/main.css" rel="stylesheet">
<link href="assets/static/css/fontawesome-all.min.css" rel="stylesheet">
</head>
<body>
<!-- ======= Hero Section ======= -->

<section id="hero">
<div class="hero-container">
  <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators" id="hero-carousel-indicators">
    </ol>
    <div class="carousel-inner" role="listbox">
      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-background">
          <img src="assets/main/img/background.png" alt="background">
        </div>
        <div class="carousel-container">
          <div class="carousel-content">
            <h2 class="animate__animated animate__fadeInDown"><span><?php echo $conf['title']?>
            </span></h2>
            <p class="animate__animated animate__fadeInUp">
              <?php echo $conf['Index_Slide1']?>
            </p>
            <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Get Started</a>
          
        </div>
      </div>
      </div>
      <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="carousel-background">
          <img src="assets/main/img/background.png" alt="background">
        </div>
        <div class="carousel-container">
          <div class="carousel-content">
            <h2 class="animate__animated animate__fadeInDown">正版查询</h2>
            <p class="animate__animated animate__fadeInUp">
              <?php echo $conf['Index_Slide2']?>
            </p>
            <a href="genuine.php" target="_blank" id="GQuery" class="btn-get-started animate__animated animate__fadeInUp scrollto">Genuine Query</a>
          </div>
        </div>
      </div>
      <!-- Slide 3 -->
      <div class="carousel-item">
        <div class="carousel-background">
          <img src="assets/main/img/background.png" alt="background">
        </div>
        <div class="carousel-container">
          <div class="carousel-content">
            <h2 class="animate__animated animate__fadeInDown">权限查询</h2>
            <p class="animate__animated animate__fadeInUp">
              <?php echo $conf['Index_Slide3']?>
            </p>
            <a href="javascript:void(0)" onclick="dail()"  class="btn-get-started animate__animated animate__fadeInUp scrollto">Permission Query</a>
          </div>
        </div>
      </div>
       <!-- Slide 4 -->
      <div class="carousel-item">
        <div class="carousel-background">
          <img src="assets/main/img/background.png" alt="background">
        </div>
        <div class="carousel-container">
          <div class="carousel-content">
            <h2 class="animate__animated animate__fadeInDown">源码下载</h2>
            <p class="animate__animated animate__fadeInUp">
              <?php echo $conf['Index_Slide4']?>
            </p>
            <a href="downfile.php" target="_blank"  id="Download" class="btn-get-started animate__animated animate__fadeInUp scrollto">Source download</a>
          </div>
        </div>
      </div>
       <!-- Slide 5 -->
      <div class="carousel-item">
        <div class="carousel-background">
          <img src="assets/main/img/background.png" alt="background">
        </div>
        <div class="carousel-container">
          <div class="carousel-content">
            <h2 class="animate__animated animate__fadeInDown">卡密授权</h2>
            <p class="animate__animated animate__fadeInUp">
              <?php echo $conf['Index_Slide5']?>
            </p>
            <a href="secret.php"  target="_blank" id="Secret" class="btn-get-started animate__animated animate__fadeInUp scrollto">Secret authorization</a>
          </div>
        </div>
      </div>
      
    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon icofont-thin-double-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon icofont-thin-double-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
</section>
<!-- End Hero -->

<!-- ======= Header ======= -->
<header id="header">
<div class="container d-flex">
  <div class="logo mr-auto">
    <h1 class="text-light"><a href="index.php"><span><?php echo $conf['title']?>
    </span></a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.php"><img src="assets/main/img/logo.png" alt="" class="img-fluid"></a>-->
  </div>
  <nav class="nav-menu d-none d-lg-block">
  <ul>
    <li class="active"><a href="#header">首页</a></li>
    <li><a href="#about">关于</a></li>
    <li><a href="#services">服务</a></li>
    <li><a href="#portfolio">项目</a></li>
    <li><a href="#footer">联系</a></li>
  </ul>
  </nav><!-- .nav-menu -->
</div>
</header>

<!-- End Header -->

<main id="main">

<!-- ======= About Us Section ======= -->


<section id="about" class="about">
<div class="container">
  <div class="section-title">
    <h2>About Us</h2>
    <p>
      <?php echo $conf['description']?>
    </p>
  </div>
</div>
</section><!-- End About Us Section -->

<!-- ======= Our Services Section ======= -->


<section id="services" class="services">
<div class="container">
  <div class="section-title">
    <h2>Services</h2>
  </div>
  <div class="row">
   <?php
$rs=$DB->query("SELECT * FROM auth_box  order by id ");
while($res = $DB->fetch($rs))
{
echo'<div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 ">
      <div class="icon-box">
        <div class="icon">
          <i class="bx bx-world"></i>
        </div>
        <h4 class="title"><a target="_blank"  href="// '.$res['url'].' ">'.$res['title'].' </a></h4>
        <p class="description">
          '.$res['description'].'
        </p>
      </div>
    </div>'; 
}
        ?> 

  </div>
  
</div>
</section><!-- End Our Services Section -->

<!-- ======= Cta Section ======= -->



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
<!-- End Cta Section -->


		<section class="padding-40-0">
			<div class="container">
				<div class="row  mr-tp-70">


  <?php
$rs=$DB->query("SELECT * FROM auth_procedure  order by id ");
while($res = $DB->fetch($rs))
{
echo'	<div class="col-md-4 reseller-hosting-features">
						<a href="#fhelp" class="btn-get-started animate__animated animate__fadeInUp scrollto">
							<div class="reseller-hosting-features-icon">
								<i class="fas fa-check"></i>
							</div>
							<div class="reseller-hosting-features-comments">
								<span class="reseller-hosting-features-title">'.$res['title'].' </span>
								<span class="reseller-hosting-features-text">'.$res['description'].' </span>
							</div>
						</a>
					</div>'; 
                    }     ?> 
		</div>
			</div>
		</section>

<!-- ======= Our Portfolio Section ======= -->

<section id="portfolio" class="second-items-home" style="margin-top: 50px;padding-top:0;margin-bottom: 40px;">
    		    <div class="section-title">
    <h2>Portfolio</h2>
  </div>
			<div class="container">
				<div class="row justify-content-center">


 <?php
$rs=$DB->query("SELECT * FROM auth_combo  order by id ");
while($res = $DB->fetch($rs))
{
echo'                       <div class="col-md-3">
						<!-- tree steps hosting plan -->
						<div class="tree-steps-hosting-plans first">
						<span class="tree-steps-hosting-plans-best">'.$res['tag'].' </span>
							<div class="tree-steps-hosting-plans-header">
								<i class="fas fa-fire tree-steps-hosting-plans-icon"></i>
								<h5 class="tree-steps-hosting-plans-title">'.$res['title'].' <small>'.$res['description'].'</small>
								</h5>
								<!-- steps hosting plan title -->
								<span class="tree-steps-hosting-plans-price monthly">
									<!-- steps hosting plan price -->
									<b class="monthly">'.$res['money'].'¥<small>/永久</small></b>
								</span>
								<!-- steps hosting plan price -->
							</div>

							<div id="'.$res['order'].'-plan-hosting-steps-content" class="tree-steps-hosting-plans-body first-plan-hosting-steps">
								<!-- steps hosting plan body -->
								<div class="loader-tree-steps-hosting-plans-body">
									<!-- steps hosting plan loader -->
									<i class="fas fa-circle-notch rotate360icon"></i>
								</div>
								<!-- end steps hosting plan loader -->
								<ul class="tree-steps-hosting-plans-list">
									<!-- steps hosting plan features list -->
								       	'.$res['html'].'

								</ul>
							
								<!-- end steps hosting plan features list -->

								<div class="tree-steps-hosting-plans-payment">
									<!-- steps hosting plan login form -->

									<!-- back to previous steps button -->
									<span onclick="resetTid()" id="'.$res['once'].'-plan-hosting" data-toggle="tooltip" data-placement="bottom" title="" class="tree-steps-hosting-plans-footer-btn-back step-two-hosting"
									 data-original-title="关闭">
									</span>
									<!-- end back to previous steps button -->

								</div>
								<!-- end steps hosting plan login form -->

							</div>
							<!-- end steps hosting plan body -->

							<div class="tree-steps-hosting-plans-footer text-center">
								<!-- start steps hosting plan footer -->
                      	
								
									<!-- go to previous next step button -->
										<a target="_blank" href="//'.$res['url'].'">
								<button type="button" class="btn btn-outline-primary">点击购买</button></a>
									
									<!-- end login button -->
							

							</div>
							 
							<!-- end steps hosting plan footer -->

						</div>
					</div>      
';           
                    }     ?> 
  
  
</div>
</div>
</section>
<!-- End Our Portfolio Section -->
  
  </main>
  
  <!-- End #main -->

<!-- ======= Contact Us Section ======= -->
<section class="padding-90-0-100 gray-background position-relative overflow-hidden" id="fhelp">
			<span class="section-with-moon-back-under"></span>
			<span class="section-with-moon-men-quastions-under"></span>
			<div class="container">
				<div class="tittle-simple-one">
					<h5>还有些疑问？<span>如果您还是对搭建有问题，可以在这检索有无您的问题并点击知悉.</span>
					</h5>
				</div>

				<div class="row justify-content-left mr-tp-50">
					<div class="col-md-6">
						<div class="nuhost-filter-container">
							<!-- start q&a filter -->
							<i class="fas fa-search"></i>
							<input type="text" id="nuhost-filter-input" onkeyup="FilterListSection()" placeholder="搜索相关问题..">
							<!-- q&a filter input -->
						</div>
						<div class="nuhost-filter-list-container">
							<!-- q&a filter list container -->


                                <?php
                                        $rs=$DB->query("SELECT * FROM auth_qa  order by id ");
                                             while($res = $DB->fetch($rs))
                                                   {
                                                          echo'<div class="filter-content-box" id="go-to-qst-'.$res['id'].'-content"><h5>'.$res['title'].'</h5></div>'; 
                                                                                     }    ?> 

                    <ul id="nuhost-filter-list"> <!-- start q&a filter item list -->
                      <?php
                   $rs=$DB->query("SELECT * FROM auth_qa  order by id ");
                      while($res = $DB->fetch($rs))
                        {
                       echo'<li><a href="'.$res['url'].'" id="go-to-qst-'.$res['id'].'" target="_blank" >'.$res['title'].'<i class="fas fa-angle-right"></i></a></li>'; 
                                  }    ?> 
                        
							</ul> <!-- end q&a filter item list -->
						</div> <!-- end q&a filter -->
					</div>
				</div>

			</div>
		</section>
  <!-- End Contact Us Section -->

<script src="assets/LightYear/layui.js"></script>
<script src="assets/static/js/scripts.js"></script>
<script src="assets/main/js/main.js"></script>
<script src="assets/main/layer/layer.js"></script>
<?php require 'foot.php';?>
</body>
</html>