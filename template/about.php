<body>
  <!-- Header Web Navbar -->
  <?php require_once "mains/navbar.php"; ?>

  <!-- Slide Banner -->
  <?php require_once "mains/slide.php"; ?>

  <div class="content-about container">
    <div class="head-text">
      <div class="title">
        <h1><?=$CATEGORY->title?></h1>
      </div>
      <div class="description">
        <p><?=$CONTACT_WEB->desc_2?></p>
      </div>
    </div>

    <div class="background"><img src="/img/BG1.jpg" alt=""></div>

    <div class="content">
      <div class="ck">
        <?=$postAboutus[0]['content']?>
      </div>
    </div>

    <div class="infomation">
      <div class="address"><i class="fas fa-home"></i>
        <p><?=$CONTACT_WEB->address?></p>
      </div>
      <div class="tel"><i class="fas fa-phone"></i>
        <p><?=$CONTACT_WEB->phone?></p>
      </div>
      <div class="email"><i class="fas fa-envelope"></i>
        <p><?=$CONTACT_WEB->email?></p>
      </div>
      <div class="line"><i class="fab fa-line"></i>
        <p><?=$CONTACT_WEB->line?></p>
      </div>
      <div class="facebook"><i class="fab fa-facebook-f"></i>
        <p><?=$CONTACT_WEB->facebook_name?></p>
      </div>
      <div class="open"><i class="fas fa-store"></i>
        <p><?=$CONTACT_WEB->desc_1?></p>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php require_once "mains/footer.php"; ?>

</body>