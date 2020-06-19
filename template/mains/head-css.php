<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
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

  <?php /*
  <link rel="stylesheet" href="/css/style.min.css?v=<?=time()?>">
  */ ?>

  <?php /*
  <link rel="preload" as="style" onload="this.rel='stylesheet'" rels="stylesheet" href="/css/style.min.css?v=<?= time() ?>">
  */ ?>

  <?php /*
  <!-- backup -->
  <!-- <link rel="stylesheet" href="/css/jaudStyle.min.css?v=1.1.1.2<?=time()?>"> -->
  <!-- <link rel="stylesheet" href="/plugin/OwlCarousel/dist/assets/owl.carousel.min.css"> -->
  <!-- <link rel="stylesheet" href="/plugin/OwlCarousel/dist/assets/owl.theme.default.min.css"> -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> -->
  <!-- <link rel="stylesheet" href="/css/selectMulti.css?v=1.0.0"> -->
  <!-- <link rel="stylesheet" href="/css/cssDisplayTable.min.css"> -->
  */ ?>

  <?php 
  require_once DOC_ROOT . '/classes/browserDetect.class.php';
  $browser = new Browser();
  if($browser->getBrowser() == Browser::BROWSER_CHROME && empty($_SERVER['HTTP_REFERER'])){
  ?>
    <link rel="preload" as="style" onload="this.rel='stylesheet'" href="/css/jaudStyle.min.css?v=1.1.2.1">
    <link rel="preload" as="style" onload="this.rel='stylesheet'" href="/plugin/OwlCarousel/dist/assets/owl.carousel.min.css">
    <link rel="preload" as="style" onload="this.rel='stylesheet'" href="/plugin/OwlCarousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="preload" as="style" onload="this.rel='stylesheet'" href="/css/selectMulti.css?v=1.0.0">
    <link rel="preload" as="style" onload="this.rel='stylesheet'" href="/css/cssDisplayTable.min.css">

  <?php }else{ ?>
    <link rel="stylesheet" href="/css/jaudStyle.min.css?v=1.1.2.0">
    <link rel="stylesheet" href="/plugin/OwlCarousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/plugin/OwlCarousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="/css/selectMulti.css?v=1.0.0">
    <link rel="stylesheet" href="/css/cssDisplayTable.min.css">

  <?php } ?>


  

  
  <script async src="/js/jquery/jquery-3.5.1.min.js"></script>
  <script async defer src="/plugin/fontawesome/all.min.js"></script>
  <script async defer src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script async defer src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>