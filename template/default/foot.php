<!-- ======= Footer ======= -->
<footer id="footer">
<div class="footer-top">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6 footer-info">
        <h3><?php echo $conf['title']?></h3>
        <p>
            
    <br>
          <strong>QQ:</strong><?php echo $conf['qq']?><br>
          <strong>Q群:</strong><?php echo $conf['qq_qun']?><br>
          <strong>邮箱:</strong><?php echo $conf['mail_user']?><br>
        </p>
        <div class="social-links mt-3">
            <a href="https://wpa.qq.com/msgrd?v=3&uin=<?php echo $conf['qq']?>&site=qq&menu=yes" class="QQ"><i class="NanFeng Icon-QQ" style="font-size: 24px;"></i></a>
            <a href="https://jq.qq.com/?_wv=1027&k=JHnKxOS8" class="weixin"><i class="NanFeng Icon-QQ" style="font-size: 24px;"></i></a>
            <a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=<?php echo $conf['mail_user']?>" class="youxiang"><i class="NanFeng Icon-youxiang" style="font-size: 24px;"></i></a>
        </div>
      </div>
      <div class="col-lg-2 col-md-6 footer-links">
        <h4>网站导航</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i><a href="#header">首页</a></li>
          <li><i class="bx bx-chevron-right"></i><a href="#about">关于</a></li>
          <li><i class="bx bx-chevron-right"></i><a href="#services">服务</a></li>
          <li><i class="bx bx-chevron-right"></i><a href="#portfolio">项目</a></li>
          <li><i class="bx bx-chevron-right"></i><a href="#contact">联系</a></li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-6 footer-links">
        <h4>友情链接</h4>
        <ul>
           <?php echo $conf['links']?>
        </ul>
      </div>
      <div class="col-lg-4 col-md-6 footer-newsletter">
        <h4>新闻订阅</h4>
        <p>
          不善看邮箱者，请勿订阅！<br>订阅成功后将会发送一封邮件至您的邮箱！
        </p>
        <form>
          <input type="email" name="email1"><input type="submit" id="submit1" value="订阅">
        </form>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="copyright">
        Copyright &copy; 2021-2022
    <strong><span><?php echo $conf['title']?></span></strong>. All Rights Reserved
  </div>
  <div class="credits">
        Designed by 
    <a href="http://www.fatestars.com/"><?php echo $conf['title']?></a>
  </div>
</div>
</footer><!-- End Footer --><a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a><!-- Vendor JS Files -->
<script src="assets/main/vendor/jquery/jquery.min.js"></script>
<script src="assets/main/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/main/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/main/vendor/php-email-form/validate.js"></script>
<script src="assets/main/vendor/jquery-sticky/jquery.sticky.js"></script>
<script src="assets/main/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/main/vendor/counterup/counterup.min.js"></script>
<script src="assets/main/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/main/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/main/vendor/venobox/venobox.min.js"></script>
<!-- Template Main JS File -->
<script src="assets/main/js/main.js"></script>
<script src="assets/main/layer/layer.js"></script>
<script>
var vaptcha_open = 0;
$(document).ready(function(){
  if($("#vaptchaContainer").length>0) vaptcha_open=1;
  $("#submit1").click(function(){
    var email1=$("input[name='email1']").val();
    var data = {email:email1};
    var dy = $("button[type='submit']");
    if(email1==''){layer.msg('邮箱不能为空哦！');return false;}
    if(vaptcha_open==1){
      var token = obj.getToken();
      if(token == ""){
        layer.msg('请先完成人机验证！'); return false;
      }
      var adddata = {token:token};
    }
    dy.attr('disabled', 'true');
    layer.msg('正在提交中，请稍后...');
    $.ajax({
      type: "POST",
      url: "Ajax.php?act=subscribe",
      data: Object.assign(data, adddata),
      dataType: "json",
      success: function (data) {
        if (data.code == 1) {
          layer.alert(data.msg, {icon: 1}, function(){window.location.reload()});
        }else{
          dy.removeAttr('disabled');
          layer.alert(data.msg, {icon: 2});
          obj.reset();
        }
      },
    });
    return false;
  });
  
});
</script>
</body>
</html>