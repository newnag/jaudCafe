<body>
  <!-- Header Web Navbar -->
  <?php require_once "mains/navbar.php"; ?>

  <!-- Slide Banner -->
  <?php require_once "mains/slide.php"; ?>

  <!-- MAIN -->
  <div class="gallary container">
    <div class="head-text">
      <div class="title">
        <h1><?= $cate_gallery->title ?></h1>
      </div>
      <ul class="menu">
        <li><a href="" onclick="handleClickSelectCategory(event,'all')">ทั้งหมด</a></li>
        <li><a href="" onclick="handleClickSelectCategory(event,'atmosphere')"><?= $cate_atmosphere->title ?></a></li>
        <li><a href="" onclick="handleClickSelectCategory(event,'food')"><?= $cate_food->title ?></a></li>
        <li><a href="" onclick="handleClickSelectCategory(event,'review')"><?= $cate_review->title ?></a></li>
      </ul>
    </div>

    <div class="background"><img src="/img/BG1.jpg" alt=""></div>

    <div class="gallary-zone" id="gallary-zone">
    </div>

    <div class="showpic">
      <div class="bigpic">
        <figure><img src="/img/m5.jpg" alt=""></figure>
        <div class="close">
          <i class="fas fa-times"></i>
        </div>
      </div>
    </div>

    <div class="pagination">
      <ul>
        <li><a href=""><i class="fas fa-caret-left"></i></a></li>
        <li><a href="">1</a></li>
        <li><a href="">2</a></li>
        <li><a href="">3</a></li>
        <li><a href="">4</a></li>
        <li><a href="">5</a></li>
        <li><a href=""><i class="fas fa-caret-right"></i></a></li>
      </ul>
    </div>
  </div>

  <!-- Footer -->
  <?php require_once "mains/footer.php"; ?>


  <script>
    window.addEventListener('DOMContentLoaded',async  function(e) {
      let {images} = await getImages('all')
      document.querySelector(`#gallary-zone`).innerHTML = images
    })


    async function handleClickSelectCategory(e,action){
      e.preventDefault();
      let {images} = await getImages(`${action}`)
      document.querySelector(`#gallary-zone`).innerHTML = images
    }

    /**
     * request ดึงข้อมูลรูปภาพ
     * action => all , atmosphere , food , review
     */
    async function getImages(action){
      let response = await  axios.get(`/api/v1.0/gallerys/${action}`);
      return response.data
    }


    // คลิกรูป และโชว์ popup
    function handleClickShowImage(e){
      e.preventDefault();
      document.querySelector(`.showpic`).style.display = 'block';
      document.querySelector(`.showpic .bigpic figure img`).src = e.target.closest('figure').getAttribute('data-image')
    }
  </script>
</body>