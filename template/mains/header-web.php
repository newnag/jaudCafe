<header class="header-web">
  <div class="header-top container">

    <marquee class="text-slider" onmouseover="this.scrollAmount=2" onmouseout="this.scrollAmount=4" scrollamount="4" behavior="left" scrolldelay="5">
      <span class="text-white"><?= htmlspecialchars($App->getTextSlideByID(1)) ?></span>
    </marquee>

    <h1 class="logo-web">
      <figure>
        <?php $logo_web = $App->getImageWebHeader(11); ?>
        <a href="<?= SITE_URL ?>">
          <img src="<?= SITE_URL . $logo_web->ad_image ?>" alt="<?= $logo_web->ad_title ?>">
        </a>
      </figure>
      <span class="hide"><?= $CATEGORY->title ?></span>
    </h1>
    <?php
    if ($App->isLogin(true)) {
      $cate_information = $App->getCateObjectByCateID(14);
      $cate_boxchat = $App->getCateObjectByCateID(15);
      $cate_buyrecord = $App->getCateObjectByCateID(36);
      $cate_salerecord = $App->getCateObjectByCateID(37);
      $cate_logout = $App->getCateObjectByCateID(16);
    ?>
      <div class="profile-h-w ">
        <p class="n-user">
          <span>ยินดีต้อนรับ,</span>
          <a href="#" onclick="activeMenuProfile(event)">
            <?= $_SESSION['member']['name'] ?>
            <i class="fas fa-caret-down"></i>
          </a>
        </p>
        <img src="<?= SITE_URL . $_SESSION['member']['image_profile'] ?>" class="profile-img" alt="" onclick="window.location='<?= SITE_URL . $App->getCateObjectByCateID(14)->url ?>'">
        <i class="fas fa-times" onclick="hdlClickCloseProfileMobile(event)"></i>
        <ul class="profile-menu " id="profile-menu">
          <li class="profile-item">
            <a href="<?= SITE_URL . $cate_information->url ?>"><?= $cate_information->cate_name ?></a>
          </li>
          <li class="profile-item">
            <a href="<?= SITE_URL . $cate_boxchat->url ?>"><?= $cate_boxchat->cate_name ?> <span id="notification-header-web"></span></a>
          </li>
          <li class="profile-item">
            <a href="<?= SITE_URL . $cate_buyrecord->url ?>"><?= $cate_buyrecord->cate_name ?> <span id="notification-header-web"></span></a>
          </li>
          <li class="profile-item">
            <a href="<?= SITE_URL . $cate_salerecord->url ?>"><?= $cate_salerecord->cate_name ?> <span id="notification-header-web"></span></a>
          </li>
          <li class="profile-item">
            <a href="<?= SITE_URL . $cate_logout->url ?>"><?= $cate_logout->cate_name ?></a>
          </li>
        </ul>
      </div>
    <?php } else if ($App->isLogin(false)) { ?>
      <form class="form-login" id="form-login">
        <i class="fas fa-times close-form-login desktop-hide" onclick="handleCloseFormLogin(event)"></i>
        <div class="flex justify-center align-center desktop"><a href="" class="text-white">ลืมรหัสผ่าน?</a>
        </div>
        <div class="flex justify-center align-center desktop-hide">
          <h2 class="text-white _title">ลงชื่อเข้าใช้</h2>
        </div>
        <div class="login-box">
          <div class="group-input">
            <div class="left">
              <i class="fas fa-user"></i>
            </div>
            <div class="right">
              <input type="text" class="input" placeholder="อีเมล หรือ username" id="loginEmail">
            </div>
          </div>
          <div class="group-input">
            <div class="left">
              <i class="fas fa-unlock-alt"></i>
            </div>
            <div class="right">
              <input type="password" class="input" placeholder="รหัสผ่าน" id="loginPassword">
            </div>
          </div>
          <button class="btn-login">เข้าสู่ระบบ</button>
          <div class="flex justify-space-between mt-1 desktop-hide">
            <a href="" class="text-white">ลืมรหัสผ่าน?</a>
            <a href="" class="text-white">สมัครสมาชิก</a>
          </div>
        </div>
      </form>
    <?php } ?>



    <div class="hamburger-user">
      <?php if ($App->isLogin(true)) { ?>
        <!-- ถ้า login แล้ว จะโชว์รูปภาพ -->
        <img src="<?= SITE_URL . $_SESSION['member']['image_profile'] ?>" alt="" onclick="activeMenuProfile(event)">
      <?php } else if ($App->isLogin(false)) { ?>
        <!-- ยังไม่ได้ login -->
        <i class="fas fa-sign-in-alt desktop-hide" style="cursor:pointer" onclick="handleOpenFormLogin(event)"></i>
      <?php } ?>

      <i class="fas fa-bars desktop-hide" onclick="handleOpenNavbarMobile(event)"></i>
    </div>
  </div>

  <!-- Navbar -->
  <?php require_once "navbar.php"; ?>
  <!-- Navbar -->
</header>


<script>
  function activeMenuProfile(e) {
    e.preventDefault();

    if (!$('.profile-h-w').hasClass('active')) {
      $('.profile-h-w').addClass('active')
      $('#profile-menu').addClass('active')
      document.querySelector('.profile-h-w').insertAdjacentHTML('afterend', `<div class="shadow-profile-mobile" onclick="hdlClickCloseProfileMobile(event)"></div>`)
    } else {
      $('.profile-h-w').removeClass('active')
      $('#profile-menu').removeClass('active')
      $('.shadow-profile-mobile').remove();
    }
  }

  function hdlClickCloseProfileMobile(event) {
    $('.profile-h-w').removeClass('active')
    $('#profile-menu').removeClass('active')
    $('.shadow-profile-mobile').remove();
  }
</script>


<?php if ($App->isLogin(false)) { ?>
  <div class="login-csrf-space"><?= WebSecurity::generateCSRF('tokencsrf-login') ?></div>
  <script>
    document.querySelector('#form-login').onsubmit = function(e) {
      e.preventDefault();
      fetchLogin()
    }

    let fetchLogin = async () => {
      let username = document.querySelector('#loginEmail').value.trim();
      let password = document.querySelector('#loginPassword').value.trim();
      let csrf = document.querySelector('#tokencsrf-login').value;

      if (username.length < 1) {
        Swal.fire({
          title: 'แจ้งเตือน!',
          text: 'กรุณากรอกชื่อผู้ใช้',
          icon: 'warning',
          confirmButtonText: 'OK'
        })
        return false;
      }
      if (password.length < 1) {
        Swal.fire({
          title: 'แจ้งเตือน!',
          text: 'กรุณากรอกรหัสผ่าน',
          icon: 'warning',
          confirmButtonText: 'OK'
        })
        return false;
      }

      try {
        let response = await fetch(`/api/v1.0/login/`, {
          method: "POST",
          headers: {
            'Content-type': 'Application/json',
            'Authorization': `Bearer ${csrf}`
          },
          mode: "same-origin",
          credentials: "same-origin",
          body: JSON.stringify({
            "username": username,
            "password": password,
            "csrf": csrf
          })
        });
        let resJson = await response.json()
        if (resJson.status_login) {
          Swal.fire({
            title: 'สำเร็จ!',
            text: 'ยินดีต้อนรับเข้าสู่เว็บไชต์',
            icon: 'success',
            timer: 2000
          }).then(() => {
            // window.location = '<?= SITE_URL ?>';
            window.location.reload();
          })
        } else {

          if (resJson.message == "csrf_invalid") {
            document.querySelector('.login-csrf-space').innerHTML = atob(resJson.newcsrf)
          }

          if (resJson.res.message == "ip_has_blocked") {
            Swal.fire({
              title: 'แจ้งเตือน!',
              text: 'ip address ของคุณโดนบล็อค เนื่องจากคุณกรอกรหัสผ่านผิดหลายครั้ง',
              icon: 'error',
              confirmButtonText: 'OK'
            });
            return false;
          } else {
            Swal.fire({
              title: 'แจ้งเตือน!',
              text: 'ชื่อผู้ใช้ หรือ รหัสผ่าน ไม่ถูกต้อง',
              icon: 'warning',
              confirmButtonText: 'OK'
            });
            return false;
          }
        }
      } catch {
        console.error('fetch error derr')
      }
    }
  </script>
<?php } ?>

<?php if ($App->isLogin(true)) { ?>
  <!-- notofication chat -->
  <script>
    window.addEventListener('load', async function() {
      await setInterval(async () => {
        await getCountNotification()
      }, 3000)
    })
    async function getCountNotification() {
      let response = await fetch(`/api/v1.0/chat/getnotificationcount`);
      let resJson = await response.json()
      document.querySelector('#notification-header-web').textContent = `(${resJson.res})`
      try {
        document.querySelector('#notification-information-aside').textContent = `${resJson.res}`
      } catch {

      }

    }
  </script>
<?php } ?>

<!-- orders ----------------------------------------------------------------------- -->

<div class="cart-float" style="display:<?= (!empty($_SESSION['orders']['id']) ? "flex" : "none") ?>;" onclick="handleClickToPayPage(event)">
  <img src="<?= SITE_URL . 'images/online-store.svg' ?>" class="cart-float-img" alt="">
  <div class="num"><?= $_SESSION['orders']['qty'] ?></div>
</div>
<style>
  *:focus {
  outline: 0;
  outline: none;
  }
  .cart-float {
    position: fixed;
    top: 10%;
    right: 10%;
    z-index: 9999999;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    width: 70px;
    height: 70px;
    background-color: rgba(10, 22, 40, 1);
    cursor: pointer;
    opacity: 0.7;
    transition: 0.3s ease;
  }

  @media screen and (min-width:768px) {
    .cart-float {
      top: 24%;
      right: 12%;
      width: 120px;
      height: 120px;
    }
  }

  .cart-float:focus {
    outline: 0;
  }

  .cart-float:hover {
    opacity: 1;
    box-shadow: 0px 0px 10px 5px rgba(0, 0, 0, 0.5);
  }

  .cart-float>.cart-float-img {
    width: 40px;
    height: 40px;
  }

  @media screen and (min-width:768px) {
    .cart-float>.cart-float-img {
      width: 60px;
      height: 60px;
    }
  }

  .cart-float>.num {
    color: red;
    position: absolute;
    top: 50px;
    right: 0px;
    font-size: 2rem;
    font-weight: 700;
    background: rgba(255, 255, 255, 1);
    width: 30px;
    height: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
  }

  @media screen and (min-width: 768px) {
    .cart-float>.num {
      top: 69px;
      right: 23px;
      font-size: 2.5rem;
      width: 35px;
      height: 35px;
    }
  }
</style>
<script>
  <?php if ($App->isLogin(true)) { ?>
    window.addEventListener('load', async function() {
      await setTimeout(async () => {
        await getOrders();
      }, 1000)
    });
  <?php } ?>

  async function handleClickToPayPage(e) {
    let response = await fetch(`/api/v1.0/geturl/ordersdetail`);
    let resJson = await response.json();
    if (resJson.status_order == true) {
      window.location = `<?= SITE_URL ?>${resJson.url}`
    } else {
      document.querySelector('.cart-float').style.display = 'none';
    }
  }
  async function getOrders() {
    let response = await fetch(`/api/v1.0/getorders`);
    let resJson = await response.json();
    if (resJson.res.status_order == true) {
      document.querySelector('.cart-float').style.display = 'flex'
      document.querySelector('.cart-float > .num').innerHTML = resJson.res.qty
    } else {
      document.querySelector('.cart-float').style.display = 'none'
      document.querySelector('.cart-float > .num').innerHTML = '0'
    }

  }
</script>
<!-- orders end----------------------------------------------------------------------- -->

<!-- <img  src="https://sweetalert2.github.io/images/nyan-cat.gif" class="catwalk catwalk1" alt="" style=""> -->
<style>
  .catwalk {
    position: fixed;
    /* left: 9%; */
    z-index: 9999999;
    animation: mymove 30s infinite;
  }

  .catwalk1 {
    top: 0%;
  }

  @keyframes mymove {
    from {
      left: 0%;
    }

    to {
      left: 100%;
    }
  }
</style>