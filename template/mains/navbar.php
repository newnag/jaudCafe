<nav class="container">
  <!-- เมนูNavหัวเว็บ -->
  <div class="head-nav">
    <!-- เมนูด้านซ้ายเป็นโลโก้ -->
    <div class="left">
      <div class="logo">
        <?php 
          global  $MOBILE_DETECT;
          if( $MOBILE_DETECT->isMobile()){
        ?>    
            <a href='/'><figure><img src="<?= SITE_THUMBGEN.'?src='. SITE_URL . $App->getImageWebHeader(11)->ad_image ?>&size=x100" alt="<?= $App->getImageWebHeader(11)->ad_title ?>"></figure></a>
        <?php }else{ ?>
            <a href='/'><figure><img src="<?= SITE_URL . $App->getImageWebHeader(11)->ad_image ?>" alt="<?= $App->getImageWebHeader(11)->ad_title ?>"></figure></a>
        <?php } ?>
      </div>
    </div>

    <!-- เมนูด้านขวาเป็นเมนูและช่องค้นหาด้วยเบอร์ -->
    <div class="right">
      <div class="menu">
        <ul>
          <?php /*
            <li><a href="" class="selected">หน้าแรก</a></li>
            <li><a href="">แกลอรี่</a></li>
            <li><a href="">ยืนยันการจอง</a></li>
            <li><a href="">เกี่ยวกับเรา</a></li>
            <li><a href="">ติดต่อเรา</a></li>
            <li class="closemenu"><i class="fas fa-times"></i></li>
            */
          echo $App->getNavbarMenu();
          ?>

          <div class="contact-nav">
            <div class="tel"><span>โทร: <?= $CONTACT_WEB->phone ?></span></div>
            <div class="social-icon">
              <a href="<?= $CONTACT_WEB->line ?>"><i class="fab fa-line"></i></a>
              <a href="<?= $CONTACT_WEB->facebook ?>"><i class="fab fa-facebook-f"></i></a>
              <a href="<?= $CONTACT_WEB->twiier ?>"><i class="fab fa-twitter"></i></a>
            </div>
          </div>
        </ul>
        <div class="bottomline"></div>
      </div>

      <div class="searchq">
        <div class="box-search">
          <input type="tel" maxlength="10" id="searchq" name="searchq" placeholder="ค้นหาการจองด้วย เบอร์">
          <i class="fas fa-book-open" id="btn-searchq" onclick="handleClickSearch(event)"></i>
        </div>
        <div class="token-csrf-searchq-space"><?= WebSec::generateCSRF('token-csrf-searchq') ?></div>
      </div>

      <div class="hamburger"><i class="fas fa-bars"></i></div>
    </div>

    <!-- เบอร์ติดต่อและโซเชียวด้านบนเมนู -->
    <div class="tel-social">
      <div class="tel"><span>โทร: <?= $CONTACT_WEB->phone ?></span></div>
      <div class="social">
        <a href="https://line.me/ti/p/~<?= $CONTACT_WEB->line ?>"><i class="fab fa-line"></i></a>
        <a href="<?= $CONTACT_WEB->facebook ?>"><i class="fab fa-facebook-f"></i></a>
        <a href="<?= $CONTACT_WEB->twitter ?>"><i class="fab fa-twitter"></i></a>
      </div>
    </div>
  </div>
</nav>


<script>

  // fix input searchq number only
  document.querySelector('#searchq').addEventListener('keypress', e => {
    if((e.keyCode >= 48 && e.keyCode <= 57) || (e.which >= 48 && e.which <= 57)){
      return true;
    }else{
      e.preventDefault();
      return false;
    }
  });

  // ค้นหาการจองด้วยเบอร์ 
  document.querySelector('#searchq').addEventListener('keyup', function(e) {
    e.preventDefault();

    if (e.code == "Enter" || e.key == "Enter" || e.keyCode == 13 || e.which == 13) {
      // ฟังชั่นค้นหาการจองด้วยเบอร์
      searchQWithPhone(e.target.value.trim())
    }

  });

  // เมื่อคลิก ค้นหาการจองด้วยเบอร์ (search) (click)
  function handleClickSearch(e) {
    e.preventDefault();
    // ฟังชั่นค้นหาการจองด้วยเบอร์
    searchQWithPhone(document.querySelector('#searchq').value.trim())
  }

  // ฟังชั่นค้นหาการจองด้วยเบอร์
  function searchQWithPhone(phone) {
    // ตรวจสอบเบอร์
    if (phone.length == 0) {
      Swal.fire({
        title: "แจ้งเตือน!!!",
        text: "กรุณากรอกเบอร์โทรศัพท์ด้วยครับ",
        icon: "warning",
        confirmButtonText: "OK",
      });
      return false;
    } else if (phone.length != 10) {
      Swal.fire({
        title: "แจ้งเตือน!!!",
        text: "กรุณากรอกเบอร์โทรศัพท์ให้ครบ 10 ตัว ด้วยครับ",
        icon: "warning",
        confirmButtonText: "OK",
      });
      return false;
    }

    axios.post(`/api/v1.0/searchq/phone/${phone}`, {
      'token_csrf_searchq': `csrf ${document.querySelector('#token-csrf-searchq').value}`
    }).then(res => {
      if (res.data.status_) {
        localStorage.setItem('phone', res.data.phone)
        window.location = `${res.data.url_redirect}`
      } else {
        Swal.fire({
          title: "แจ้งเตือน",
          text: `ไม่มีเบอร์ ${phone} นี้ในระบบ`,
          icon: "error",
          confirmButtonText: "OK",
          timer: 2000
        })
      }
    })
  }
</script>