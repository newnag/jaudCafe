<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" href="<?= SITE_URL . $App->get_icon_fab_logo(14) ?>" type="image/x-icon">

  <meta name='description' content="<?= $head['description'] ?>">
  <meta name='keywords' content="<?= $head['keyword'] ?>">
  <meta property='og:image:type' content='image/jpeg'>
  <meta property='og:type' content='website'>
  <meta property='og:title' content="<?= $head['title'] ?>">
  <meta property='og:url' content="<?= SITE_URL . $head['url'] ?>">
  <meta property='og:description' content="<?= $head['description'] ?>">
  <meta property='og:image' content="<?= SITE_URL . $head['thumbnail'] ?>">
  <title><?= $head['title'] ?></title>

  <?php
  require_once DOC_ROOT . '/classes/browserDetect.class.php';
  $browser = new Browser();
  // if ($browser->getBrowser() == Browser::BROWSER_CHROME && empty($_SERVER['HTTP_REFERER']) && false) {
  ?>

  <?php if ($_SESSION['visit']) { ?>
  <link rel="stylesheet" href="/css/jaudStyle.min.css?v=1.1.3">
  <link rel="stylesheet" href="/plugin/OwlCarousel/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="/plugin/OwlCarousel/dist/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" href="/css/selectMulti.css?v=1.0.0">
  <link rel="stylesheet" href="/css/cssDisplayTable.min.css">
  <?php }?>

  <script>
  <?php if(!$_SESSION['visit']) { ?>
    window.addEventListener('DOMContentLoaded',function(){
      document.body.insertAdjacentHTML('afterbegin',`
        <div  class="preloadDerr" 
              style="
                display:flex;
                justify-content:center;
                align-items:center;
                height:100vh;
                position:fixed;
                top:0px;
                left:0px;
                z-index:9999999;
                width:${(window.outerWidth < 768)?window.outerWidth+'px':'100%'};
                background-image: radial-gradient(circle, #152849 0%, #091525 100%);
                opacity:1;
              "
        >
          <div style="display:flex;flex-direction:column;align-items:center;">
            <img src="https://juad.ktdev.site/img/logo/logo.png">
            <p style="color:white;text-align:center;font-size:1.5rem;">ร้านจ้วดคาเฟ่พร้อมเปิดบริการทุกวัน เวลา 11.00 - 22.00 น. อาหารอร่อย บรรยากาศดี มีดนตรีสด โซนใหม่ ซุ้มใหม่ เพียงพอต่อการรับบริการแล้ว ไม่ต้องรอนาน กว่า 50 ซุ้ม</p>
           </div>
        </div>
      `)
    });
    window.addEventListener('load',function(){
      document.body.style.opacity = '1';
      setTimeout(()=>{
        document.querySelector('.preloadDerr').style.transition = 'opacity 1000ms';
      },100);
      setTimeout(()=>{
        document.head.insertAdjacentHTML('beforeend',`<link rel="stylesheet" href="/css/jaudStyle.min.css?v=1.1.3">`);
        document.head.insertAdjacentHTML('beforeend',`<link rel="stylesheet" href="/plugin/OwlCarousel/dist/assets/owl.carousel.min.css">`);
        document.head.insertAdjacentHTML('beforeend',`<link rel="stylesheet" href="/plugin/OwlCarousel/dist/assets/owl.theme.default.min.css">`);
        document.head.insertAdjacentHTML('beforeend',`<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">`);
        document.head.insertAdjacentHTML('beforeend',`<link rel="stylesheet" href="/css/selectMulti.css?v=1.0.0">`);
        document.head.insertAdjacentHTML('beforeend',`<link rel="stylesheet" href="/css/cssDisplayTable.min.css">`);

        document.querySelector('.preloadDerr').style.opacity = '0';
        document.querySelector('.preloadDerr').addEventListener('transitionend',e => {
          document.querySelector('.preloadDerr').remove();
        });

        var lazyLoadInstance = new LazyLoad({
          elements_selector: ".lazy"
        });
        lazyLoadInstance.update();
      },2000)
    });
  <?php }else{ ?>
    window.addEventListener('DOMContentLoaded',function(){
    });
    window.addEventListener('load',function(){
      document.body.style.transition = 'opacity 1000ms';
      document.body.style.opacity = '1';
      var lazyLoadInstance = new LazyLoad({elements_selector: ".lazy"});
      lazyLoadInstance.update();
      setTimeout(()=>{ lazyLoadInstance.update();},100);
      setTimeout(()=>{ lazyLoadInstance.update();},300);
      setTimeout(()=>{ lazyLoadInstance.update();},500);
    });
  <?php } ?>
  </script>


  <script src="/js/jquery/jquery-3.5.1.min.js"></script>
  <script async src="/plugin/fontawesome/all.min.js"></script>
  <script async src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script async src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script async src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@16.1.0/dist/lazyload.min.js"></script>
  <script async src="/plugin/OwlCarousel/dist/owl.carousel.min.js"></script>
  <script async src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script async src="/plugin/selectMulti/jquery.multi-select.min.js"></script>
  <script async defer src="/js/jaudApp.js?v=1.0.2.11"></script>

  <?php if(!$_SESSION['visit']) { 
    $_SESSION['visit'] = true; 
    $_SESSION['visit_time'] = time(); 
  } ?>
</head>