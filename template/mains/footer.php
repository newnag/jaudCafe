<? /** OK */ ?>
<div class="contact">
  <div class="box-contact">
    <figure><img src="<?= SITE_URL . $CONTACT_WEB->image_footer ?>" alt="<?= $CONTACT_WEB->name ?>"></figure>
    <div class="head">
      <h1>ติดต่อ <?= $CONTACT_WEB->name ?></h1>
    </div>
    <div class="text">
      <p>สามารถติดต่อร้านจ้วดคาเฟ่ได้ตามเบอร์โทร Line, facebook, twitter ด้านล่างนี้</p>
    </div>
    <div class="tel"><span>โทร: <?= $CONTACT_WEB->phone; ?></span></div>
    <div class="social">
      <a href="https://line.me/ti/p/~<?= $CONTACT_WEB->ig ?>"><i class="fab fa-line"></i></a>
      <a href="<?= $CONTACT_WEB->facebook ?>"><i class="fab fa-facebook-f"></i></a>
      <a href="<?= $CONTACT_WEB->twitter ?>"><i class="fab fa-twitter"></i></a>
    </div>
  </div>
</div>

<footer>
  <div class="footer">
    <p>&copy; 2020 <a href="https://wynnsoft-solution.com">Wynnsoft Solution.com</a></p>
  </div>
</footer>



<script src="/plugin/OwlCarousel/dist/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="/plugin/selectMulti/jquery.multi-select.min.js"></script>
<script src="/js/jaudApp.js?v=<?= time() ?>"></script>