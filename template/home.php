<body>

  <!-- Header Web -->
  <?php //require_once "mains/header-web.php"; 
  ?>
  <!-- Header Web -->

  <!-- Slide Banner -->
  <?php //require_once "mains/slide.php"; 
  ?>
  <!-- Slide Banner -->


  <!-- MAIN -->
  <nav class="container">
    <!-- เมนูNavหัวเว็บ -->
    <div class="head-nav">
      <!-- เมนูด้านซ้ายเป็นโลโก้ -->
      <div class="left">
        <div class="logo">
          <figure><img src="/img/logo/logo.png" alt=""></figure>
        </div>
      </div>

      <!-- เมนูด้านขวาเป็นเมนูและช่องค้นหาด้วยเบอร์ -->
      <div class="right">
        <div class="menu">
          <ul>
            <li><a href="" class="selected">หน้าแรก</a></li>
            <li><a href="">แกลอรี่</a></li>
            <li><a href="">ยืนยันการจอง</a></li>
            <li><a href="">เกี่ยวกับเรา</a></li>
            <li><a href="">ติดต่อเรา</a></li>
            <li class="closemenu"><i class="fas fa-times"></i></li>

            <div class="contact-nav">
              <div class="tel"><span>โทร: 091-0634589</span></div>
              <div class="social-icon">
                <i class="fab fa-line"></i>
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-twitter"></i>
              </div>
            </div>
          </ul>
          <div class="bottomline"></div>
        </div>

        <div class="searchq">
          <div class="box-search">
            <input type="tel" maxlength="10" id="searchq" name="searchq" placeholder="ค้นหาการจองด้วย เบอร์">
            <i class="fas fa-book-open"></i>
          </div>
        </div>

        <div class="hamburger"><i class="fas fa-bars"></i></div>
      </div>

      <!-- เบอร์ติดต่อและโซเชียวด้านบนเมนู -->
      <div class="tel-social">
        <div class="tel"><span>โทร: 091-0634589</span></div>
        <div class="social">
          <a href=""><i class="fab fa-line"></i></a>
          <a href=""><i class="fab fa-facebook-f"></i></a>
          <a href=""><i class="fab fa-twitter"></i></a>
        </div>
      </div>
    </div>
  </nav>

  <header>
    <!-- สไลด์หัวเว็บ -->
    <div class="slideHead owl-carousel owl-theme owl-loaded">
      <img src="/img/slide1.jpg" alt="">
      <img src="/img/slide2.jpg" alt="">
      <img src="/img/slide3.jpg" alt="">
      <img src="/img/slide4.jpg" alt="">
      <img src="/img/slide5.jpg" alt="">
    </div>
  </header>

  <!-- ส่วนของการจองโต๊ะและซุ้ม ด้านบนจะเป็นการกรอกข้อมูล ด้านล่างจะเป็นแผนผังโต๊ะ -->
  <div class="booking-zone container">
    <!-- โซนกรอกข้อมูลการจอง หากเลือกโต๊ะบนโซนนี้รูปแผนผังจะมีการเปลี่ยนแปลง -->
    <div class="book-top">
      <div class="selectType">
        <div class="button-mobile">
          <label>จองซุ้มริมน้ำ</label>
          <div class="arch active">
            <img src="/img/icon/icon4-02.svg" alt="">
          </div>
          <div class="table">
            <img src="/img/icon/icon-table3.svg" alt="">
          </div>
          <label>จองโต๊ะเทอเรส</label>
          <div class="activeB"></div>
        </div>

        <div class="box-button">
          <div class="arch">
            <div class="button buttonArch">
              <img src="/img/icon/icon4-02.svg" alt="">
              <button>จองซุ้มริมน้ำ</button>
            </div>
          </div>
          <div class="table">
            <div class="button buttonTable">
              <img src="/img/icon/icon-table3.svg" alt="">
              <button>จองโต๊ะเทอเรส</button>
            </div>
          </div>

          <div class="bgEffect"></div>
        </div>
      </div>

      <div class="head-text">
        <h2>การจองแบบ ซุ้ม</h2>
      </div>

      <!-- โซนกรอกข้อมูลจะแบ่งเป็นแบบซู้มและแบบโต๊ะ -->
      <div class="formBook">
        <div class="input-zone Arch" data-type="arch" data-action="active">
          <div class="inputBox">
            <label>วัน/เดือน/ปี</label>
            <div class="input">
              <input type="date" class="dateSelect date-booking-arch" placeholder="กรอกวันที่">
              <i class="far fa-calendar-alt"></i>
            </div>
          </div>

          <div class="inputBox">
            <label>เวลา/รอบ</label>
            <div class="input">
              <select name="" id="time" class="time space-timeround-arch" disabled>
                <?php /** fetch data here!!! */ ?>
              </select>
              <i class="fas fa-clock"></i>
            </div>
          </div>

          <div class="inputBox">
            <label>หมายเลขซุ้ม</label>
            <div class="input">
              <select name="" id="arch" class="space-position-arch" disabled>
                <?php /** fetch data here!!! */ ?>
              </select>
              <img src="/img/display/icon3-02.svg" alt="">
            </div>
          </div>

          <div class="inputBox">
            <label>จำนวนคน</label>
            <div class="input">
              <input type="number" id="numPeople" disabled>
              <i class="fas fa-user-alt"></i>
            </div>
          </div>

          <div class="inputBox">
            <label>*ชื่อที่จอง</label>
            <div class="input">
              <input type="text" name="name" class="name-arch" disabled>
            </div>
          </div>

          <div class="inputBox">
            <label>*เบอร์โทรศัพท์</label>
            <div class="input">
              <input type="tel" name="phone" class="phone-arch" disabled>
            </div>
          </div>

          <div class="inputBox">
            <label>*ID : LINE</label>
            <div class="input">
              <input type="text" class="line-arch" disabled>
            </div>
          </div>

          <div class="inputBox">
            <label>*จังหวัด</label>
            <div class="input">
              <select name="" id="" class="space-province-arch" disabled="disabled">
                <? /** fetch data here!!! */ ?>
              </select>
            </div>
          </div>
        </div>
        <!-- end input-zone Arch -->

        <div class="input-zone Table" data-type="table" data-action="">
          <div class="inputBox">
            <label>วัน/เดือน/ปี</label>
            <div class="input">
              <input type="date" class="dateSelect date-booking-table" placeholder="กรอกวันที่">
              <i class="far fa-calendar-alt"></i>
            </div>
          </div>

          <div class="inputBox">
            <label>เวลา/รอบ</label>
            <div class="input">
              <select name="" id="timeT" class="time space-timeround-table" disabled>
                <? /** fetch data here!!! */ ?>
              </select>
              <i class="fas fa-clock"></i>
            </div>
          </div>

          <div class="inputBox">
            <label>หมายเลขโต๊ะ</label>
            <div class="input">
              <select name="" id="archT" class="space-position-table" disabled>
                <? /** fetch data here !!! */ ?>
              </select>
              <img src="/img/display/icon-table2-02.svg" alt="">
            </div>
          </div>

          <div class="inputBox">
            <label>จำนวนคน</label>
            <div class="input">
              <input type="number" id="numPeopleT" disabled>
              <i class="fas fa-user-alt"></i>
            </div>
          </div>

          <div class="inputBox">
            <label>*ชื่อที่จอง</label>
            <div class="input">
              <input type="text" name="name" class="name-table" disabled>
            </div>
          </div>

          <div class="inputBox">
            <label>*เบอร์โทรศัพท์</label>
            <div class="input">
              <input type="tel" name="phone" class="phone-table" disabled>
            </div>
          </div>

          <div class="inputBox">
            <label>*ID : LINE</label>
            <div class="input">
              <input type="text" class="line-table" disabled>
            </div>
          </div>

          <div class="inputBox">
            <label>*จังหวัด</label>
            <div class="input">
              <select name="" id="" class="space-province-table" disabled="disabled">
                <? /** fetch data here!!! */ ?>
              </select>
            </div>
          </div>
        </div>

        <div class="submit-button">
          <button id="booking-button-submit">กดจอง</button>
        </div>
      </div>

      <div class="ps">
        <p>***หมายเหตุ ลูกค้ามาช้าเกิน 15 นาที ขออนุญาตตัดสิทธิ์ ให้ลูกค้าท่านต่อไป</p>
      </div>
    </div>

    <!-- โซนกดจองโต๊ะและซุ้ม -->
    <div class="book-display">
      <div class="display-box">
        <figure id="space-position-handleclick">
          <!-- รูปภาพแผนผัง -->
          <img src="/img/display/mapv2.png" alt="">
          <div class="pre-select"></div>
          <!-- ที่นั่งภายในรูป -->
          <? /** fetch data here!!! */ ?>
        </figure>
      </div>

      <div class="description">
        <div class="box-icon">
          <div class="box">
            <img src="/img/display/icon1-02.svg" alt="">
            <span>วอคอิน</span>
          </div>

          <div class="box">
            <img src="/img/display/icon-table-1.svg" alt="">
            <span>โต๊ะว่าง</span>
          </div>

          <div class="box">
            <img src="/img/display/icon-table2-02.svg" alt="">
            <span>จองแล้ว</span>
          </div>

          <div class="box">
            <img src="/img/display/check-icon.svg" alt="">
            <span>ที่คุณเลือก</span>
          </div>

          <div class="box">
            <img src="/img/display/comfirm-02.svg" alt="">
            <span>รอคอนเฟิร์ม</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="_3column container">
    <div class="background"><img src="/img/BG1.jpg" alt=""></div>
    <div class="grid-box">
      <div class="box">
        <div class="icon"><img src="/img/icon/music-solid.svg" alt=""></div>
        <div class="head">
          <h2>เพลงเพราะ/ดนตรีสด</h2>
        </div>
        <div class="text">
          <p>
            ฟังเพลงเพราะตอนเย็นที่ร้าน จ้วดคาเฟ่ และดนตรีสดที่ไพเราะ
            ศิลปินคุณภาพ ผลัดเปลี่ยนหมุนเวียนกันมาในแต่ละวัน
          </p>
        </div>
      </div>

      <div class="box">
        <div class="icon"><img src="/img/icon/utensils-solid.svg" alt=""></div>
        <div class="head">
          <h2>อาหารอร่อย</h2>
        </div>
        <div class="text">
          <p>
            อาหารอร่อย รสชาติเฉพาะที่ทางร้านจ้วดคาเฟ่เท่านั้น มีให้คุณได้เลือกสั่งกว่า 500 เมนู
            ทั้งอาหาร อิสาน,อาหารไทย,อาหารต่างประเทศและของหวานรสชาติชื่นใจ
          </p>
        </div>
      </div>

      <div class="box">
        <div class="icon"><img src="/img/icon/cloud-moon-solid.svg" alt=""></div>
        <div class="head">
          <h2>บรรยากาศดี</h2>
        </div>
        <div class="text">
          <p>
            ดื่มด่ำกับบรรยากาศ ธรรมชาติ สระน้ำสีฟ้าสวย ทุ่งนาเขียวขจี
            อากาศบริสุทธิ์พร้อมวิวถ่ายรูปสวยๆ ให้ทุกท่านได้เก็บความประทับใจ
          </p>
        </div>
      </div>
      
    </div>
  </div>

  <div class="slide-gallary">
    <div class="content container">
      <div class="head-text">
        <h1>บรรยากาศดี/อาหารอร่อย</h1>
      </div>
      <div class="text">
        <p>
          ข้อความตัวอย่างข้อความตัวอย่างข้อความตัวอย่างข้อความตัวอย่างข้อความตัวอย่างข้อความตัวอย่างข้อความตัวอย่าง
          ข้อความตัวอย่างข้อความตัวอย่างข้อความตัวอย่างข้อความตัวอย่าง
      </div>

      <div class="slider owl-carousel owl-theme owl-loaded">
        <img src="/img/slidemini1.jpg" alt="">
        <img src="/img/slidemini2.jpg" alt="">
        <img src="/img/slidemini3.jpg" alt="">
        <img src="/img/slidemini1.jpg" alt="">
        <img src="/img/slidemini2.jpg" alt="">
        <img src="/img/slidemini3.jpg" alt="">
      </div>
    </div>
  </div>

  <div class="about-me container">
    <div class="background"><img src="/img/BG2.jpg" alt=""></div>

    <div class="grid-content">
      <figure><img src="/img/image-about.jpg" alt=""></figure>
      <div class="content">
        <div class="head">
          <h1>เกี่ยวกับเรา</h1>
        </div>
        <div class="text">
          <p>
            ร้านจ้วดคาเฟ่พร้อมเปิดบริการทุกวัน เวลา 11.00 - 22.00 น.
            อาหารอร่อย บรรยากาศดี มีดนตรีสด โซนใหม่ ซุ้มใหม่ เพียงพอต่อการรับบริการแล้ว
            ไม่ต้องรอนาน กว่า 50 ซุ้ม
          </p>
        </div>
      </div>
    </div>
  </div>

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
        <a href="<?= $CONTACT_WEB->ig ?>"><i class="fab fa-line"></i></a>
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
  <!-- MAIN -->



  <!-- Footer -->
  <?php //require_once "mains/footer.php"; 
  ?>
  <!-- Footer -->


  <!-- carousel -->
  <?php /*$csrf
  <script>
    $('#subimage-thread-sale').owlCarousel({
      loop: false,
      margin: 10,
      dots: false,
      responsiveClass: true,
      responsive: {
        0: {
          items: 4,
        },
        768: {
          items: 4,
        }
      }
    });
    $('#forumPop').owlCarousel({
      loop: false,
      margin: 10,
      dots: true,
      responsiveClass: true,
      responsive: {
        0: {
          items: 2,
        },
        768: {
          items: 4,
          margin: 15
        },
        1024: {
          items: 5,
          margin: 20
        },
        1280: {
          items: 6,
          margin: 25
        },

      }
    });

    function hdlclickPrev(e) {
      e.preventDefault();
      $('.owl-subimg-wrapper .owl-prev').click()
    }

    function hdlclickNext(e) {
      e.preventDefault();
      $('.owl-subimg-wrapper .owl-next').click()
    }

    function hdlClickChangeSubImgToMainImg(e) {
      e.preventDefault();
      e.target.closest('.webboard-sale').querySelector('.left > .main-img > img').src = e.target.src
    }
  </script>
  */ ?>
  <!-- carousel -->


  <div class="csrf-space-timeround"><?= $CSRF_TIMERROUND ?></div>
  <div class="csrf-space-province"><?= $CSRF_PROVINCE ?></div>
  <div class="csrf-space-position-arch-table"><?= $CSRF_POSITION_ARCH_TABLE ?></div>

  <!-- fetch load data -->
  <script>
    window.addEventListener("load", async function() {
      // localStorage.clear();

      // รอบเวลา
      if (!localStorage.getItem('timeRoundArch')) {
        // ถ้าไม่มีข้อมูลในเครื่อง ให้ load ข้อมูลจาก server
        let res = await requestAPI_Timeround();
        localStorage.setItem('timeRoundArch', res.data.timeround_arch);
        localStorage.setItem('timeRoundTable', res.data.timeround_table);
      }
      document.querySelector('.space-timeround-arch').insertAdjacentHTML('afterbegin', localStorage.getItem('timeRoundArch'))
      document.querySelector('.space-timeround-table').insertAdjacentHTML('afterbegin', localStorage.getItem('timeRoundTable'))

      //หมายเลขซุ้ม
      if (!localStorage.getItem('numberPositionArch')) {
        // ถ้าไม่มีข้อมูลในเครื่อง ให้ load ข้อมูลจาก server
        let res = await requestAPI_PositionArchAndTable();
        localStorage.setItem('numberPositionArch', res.data.positionArch);
        localStorage.setItem('numberPositionTable', res.data.positionTable);
        localStorage.setItem('numberhdlclickPositionArch', res.data.hdlClickpositionArch);
        localStorage.setItem('numberhdlclickPositionTable', res.data.hdlClickpositionTable);
      }
      document.querySelector('.space-position-arch').innerHTML = localStorage.getItem('numberPositionArch')
      document.querySelector('.space-position-table').innerHTML = localStorage.getItem('numberPositionTable')
      document.querySelector('#space-position-handleclick').insertAdjacentHTML('beforeend', localStorage.getItem('numberhdlclickPositionArch'))
      document.querySelector('#space-position-handleclick').insertAdjacentHTML('beforeend', localStorage.getItem('numberhdlclickPositionTable'))


      // จังหวัด
      if (!localStorage.getItem('province')) {
        // ถ้าไม่มีข้อมูลในเครื่อง ให้ load ข้อมูลจาก server
        let res = await requestAPI_Province();
        localStorage.setItem('province', res.data.province)
      }
      document.querySelector('.space-province-arch').innerHTML = localStorage.getItem('province')
      document.querySelector('.space-province-table').innerHTML = localStorage.getItem('province')


    });

    // request รอบเวลา
    let requestAPI_Timeround = async () => {
      try {
        let csrf = document.querySelector('#token-csrf-timeround').value
        return await axios.get(`/api/v1.0/getTimeRound`, {
          headers: {
            'token-csrf-timeround': `csrf ${csrf}`
          }
        });
      } catch (error) {
        console.log(error)
      }
    }

    // request จังหวัด
    let requestAPI_Province = async () => {
      try {
        let csrf = document.querySelector('#token-csrf-province').value
        return await axios.get('/api/v1.0/getProvince', {
          headers: {
            'token-csrf-province': `csrf ${csrf}`
          }
        })
      } catch (err) {
        console.error('Error')
      }
    }

    // request ตำแหน่งซุ้ม และโต๊ะ
    let requestAPI_PositionArchAndTable = async () => {
      try {
        let csrf = document.querySelector('#token-csrf-position-arch-table').value
        return await axios.get('/api/v1.0/getPositionArchAndTable', {
          headers: {
            'token-csrf-position-arch-table': `csrf ${csrf}`
          }
        });
      } catch (err) {
        console.error(err)
      }
    }


    // เมื่อลูกค้าทำการเลือกรอบเวลา


    //เมื่อลูกค้า กดจอง
    document.querySelector('#booking-button-submit').addEventListener('click', function() {
      let action = Array.from(document.querySelectorAll('.book-top .formBook .input-zone')).find(ex => ex.getAttribute('data-action') === "active");
      let type = action.getAttribute('data-type');

      if (type === "arch") {

        let date_arch = document.querySelector('.date-booking-arch')
        let time_arch = document.querySelector('.space-timeround-arch')
        let position_arch = document.querySelector('.space-position-arch')
        let numpeople_arch = document.querySelector('#numPeople')
        let name_arch = document.querySelector('.name-arch')
        let phone_arch = document.querySelector('.phone-arch')
        let line_arch = document.querySelector('.line-arch')
        let province_arch = document.querySelector('.space-province-arch')

        // ตรวจสอบวันที่
        // ตรวจสอบเวลา/รอบ
        // ตรวจสอบหมสยเลขโต๊ะ
        // ตรวจสอบจำนวนคน
        // ตรวจสอบชื่อที่จอง
        // ตรวจสอบเบอร์โทรศัพ (วันหนึ่งจองได้1ครั้งเด้อ)
        // ตรวจสอบไลน์ไอดี
        // ตรวจสอบจังหวัด

      } else if (type === "table") {

        let date_arch = document.querySelector('.date-booking-arch')
        let time_arch = document.querySelector('.space-timeround-table')
        let position_arch = document.querySelector('.space-position-table')
        let numpeople_arch = document.querySelector('#numPeopleT')
        let name_arch = document.querySelector('.name-table')
        let phone_arch = document.querySelector('.phone-table')
        let line_arch = document.querySelector('.line-table')
        let province_arch = document.querySelector('.space-province-table')


        // ตรวจสอบวันที่
        // ตรวจสอบเวลา/รอบ
        // ตรวจสอบหมสยเลขโต๊ะ
        // ตรวจสอบจำนวนคน
        // ตรวจสอบชื่อที่จอง
        // ตรวจสอบเบอร์โทรศัพ (วันหนึ่งจองได้1ครั้งเด้อ)
        // ตรวจสอบไลน์ไอดี
        // ตรวจสอบจังหวัด
      }




    });
  </script>
</body>