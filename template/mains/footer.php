<?php 
$footer_info = $App->getFooterInfoByID(1);

?>
<footer class="footer">
  <div class="footer-wrapper-top">
    <ul class="container ft-menu">
      <?=$App->getNavbarFooterMenu()?>
    </ul>
  </div>
  <div class="footer-wrapper-middle">
    <ul class="fm-menu container">
      <li class="fm-item">
        <div class="left wm">
          <p class="tt text-gray">ติดต่อ</p>
          <p class="tb text-gray">คอลเซนเตอร์</p>
        </div>
        <div class="right">
          <span class="text-blue-light ber"><?=$CONTACT_WEB->phone?></span>
        </div>
      </li>
      <li class="fm-item">
        <div class="left w ">
          <p class="tt text-gray">ติดต่อผ่านไลน์</p>
          <p class="tb text-gray">ID:<?=$CONTACT_WEB->line?></p>
        </div>
        <div class="right">
          <a href="https://line.me/ti/p/~<?=$CONTACT_WEB->line?>"><img src="/icon/line-icon-45x44px.png" alt=""></a>
        </div>
      </li>
      <li class="fm-item">
        <div class="left w">
          <p class="tt text-gray">กรอกแบบฟอร์มติดต่อ</p>
          <p class="tb text-gray">ทีมงานทีเด็ดไก่ชน</p>
        </div>
        <div class="right">
          <a href="<?=SITE_URL.$App->getURLByCateID(12)?>" ><img src="/icon/icon-from-42x42px.png" alt=""></a>
        </div>
      </li>
      <li class="fm-item">
        <div class="social-w">
          <a href="<?=$CONTACT_WEB->facebook?>" class="circle"><i class="fab fa-facebook-f"></i></a>
          <a href="<?=$CONTACT_WEB->twitter?>" class="circle"><i class="fab fa-twitter"></i></a>
          <a href="<?=$CONTACT_WEB->ig?>" class="circle"><i class="fab fa-instagram"></i></a>
          <a href="<?=$CONTACT_WEB->youtube?>" class="circle"><i class="fab fa-youtube"></i></a>
        </div>
      </li>
    </ul>
  </div>
  <div class="footer-wrapper-bottom">
    <div class="container fm-w">
      <p class="fm-desc text-gray"><strong class="text-blue-light fm-title"><?=$footer_info->title?></strong> <?=$footer_info->description?> </p>
    </div>
  </div>
  <div class="ft-copyright">
    <a href="#" class="text-white">&copy; 2020 ALL RIGHT RESERVED BY TEEDEDKAICHON.COM</a>
  </div>
</footer>