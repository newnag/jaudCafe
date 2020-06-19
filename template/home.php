
<body>

  <!-- Header Web Navbar -->
  <?php require_once "mains/navbar.php"; ?>

  <!-- Slide Banner -->
  <?php require_once "mains/slide.php"; ?>


  <!-- MAIN -->

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
              <input type="date" class="dateSelect date-booking-arch" 
                placeholder="กรอกวันที่">
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
              <input type="number" pattern="[0-9]*" id="numPeople" disabled placeholder="กรอกจำนวนคน">
              <i class="fas fa-user-alt"></i>
            </div>
          </div>

          <div class="inputBox">
            <label>*ชื่อที่จอง</label>
            <div class="input">
              <input type="text" name="name" class="name-arch" disabled placeholder="กรอกชื่อผู้ที่จอง">
            </div>
          </div>

          <div class="inputBox">
            <label>*เบอร์โทรศัพท์</label>
            <div class="input">
              <input type="tel" name="phone" class="phone-arch" disabled placeholder="กรอกเบอร์โทรศัพท์" maxlength="10">
            </div>
          </div>

          <div class="inputBox">
            <label>*ID : LINE</label>
            <div class="input">
              <input type="text" class="line-arch" disabled placeholder="กรอกไลน์ไอดี">
            </div>
          </div>

          <div class="inputBox">
            <label>*จังหวัด</label>
            <div class="input">
              <select name=""   class="space-province-arch" disabled="disabled">
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
              <input type="number" pattern="[0-9]*" id="numPeopleT" disabled placeholder="กรอกจำนวนคน">
              <i class="fas fa-user-alt"></i>
            </div>
          </div>

          <div class="inputBox">
            <label>*ชื่อที่จอง</label>
            <div class="input">
              <input type="text" name="name" class="name-table" disabled placeholder="กรอกชื่อผู้ที่จอง">
            </div>
          </div>

          <div class="inputBox">
            <label>*เบอร์โทรศัพท์</label>
            <div class="input">
              <input type="tel" name="phone" class="phone-table" disabled placeholder="กรอกเบอร์โทรศัพท์" maxlength="10">
            </div>
          </div>

          <div class="inputBox">
            <label>*ID : LINE</label>
            <div class="input">
              <input type="text" class="line-table" disabled placeholder="กรอกไลน์ไอดี">
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
          <img src="/img/display/mapv2.png?v=1.1" alt="">
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
    <div class="background"><img class="lazy" data-src="/img/BG1.jpg?v=1.0" alt=""></div>
    <div class="grid-box">
      <?php  echo $App->getJuadProperty(); ?>
    </div>
  </div>


  <div class="slide-gallary">
    <div class="content container">
      <div class="head-text">
        <h1><?= $goodAtmosphere->title ?></h1>
      </div>
      <div class="text">
        <p><?= $goodAtmosphere->description ?></p>
      </div>

      <div class="slider owl-carousel owl-theme owl-loaded">
        <!-- Gallery -->
        <?php echo $App->getPostImagesWithCateID(); ?>
      </div>
    </div>
  </div>



  <div class="about-me container">
    <div class="background"><img class="lazy" data-src="/img/BG2.jpg" alt=""></div>

    <div class="grid-content">
      <figure>
        <img class="lazy" data-src="<?= SITE_URL . $aboutus->thumbnail ?>" alt="<?= $aboutus->title ?>">
      </figure>
      <div class="content">
        <div class="head">
          <h1><?= $aboutus->title ?></h1>
        </div>
        <div class="text">
          <p><?= $aboutus->description ?></p>
        </div>
      </div>
    </div>
  </div>
  <!-- MAIN -->

  <!-- dialog confirm -->
  <div class="dialog-confirm">
    <div class="dialog">
      <div class="title">
        <h2>ข้อมูลการจอง</h2>
      </div>

      <div class="info">
        <div id="type" class="info-data">
          <label>จองแบบ :</label>
          <span id="booking-type"></span>
        </div>
        <div id="name-info" class="info-data">
          <label>ชื่อ-สกุล :</label>
          <span id="booking-name"></span>
        </div>
        <div id="tel-info" class="info-data">
          <label>เบอร์โทร :</label>
          <span id="booking-phone"></span>
        </div>
        <div id="line-info" class="info-data">
          <label>Line ID :</label>
          <span id="booking-line"></span>
        </div>
        <div id="province-info" class="info-data">
          <label>จังหวัด :</label>
          <span id="booking-province-name"></span>
        </div>
        <div id="date-info" class="info-data">
          <label>วันที่ :</label>
          <span id="booking-date"></span>
        </div>
        <div id="time-info" class="info-data">
          <label>รอบที่จอง :</label>
          <span id="booking-time"></span>
        </div>
        <div id="num-info" class="info-data">
          <label id="booking-table-name">หมายเลขซุ้ม :</label>
          <span id="booking-table-number"></span>
        </div>
        <div id="people-info" class="info-data">
          <label>จำนวนคน :</label>
          <span id="booking-people"></span>
        </div>

        <div class="lineAdd">
          <label>กรุณาเพิ่มเพื่อนไลน์ ร้านจ้วด เพื่อรับข่าวสารและการแจ้งเตือนในการใช้บริการของคุณ</label>
          <a href="https://lin.ee/zI9aiGa"><img src="https://qr-official.line.me/sid/M/895mojav.png"></a>
        </div>
      </div>

      <div class="button-box">
        <button id="edit">แก้ไข</button>
        <button id="confirm">คอนเฟิร์ม</button>
      </div>

      <div class="ps">
        <div class="left"><span>หมายเหตุ</span></div>
        <div class="right">
          <p>- ลูกค้ามาช้าเกิน 15 นาทีขออนุญาตตัดสิทธิ์ ให้ลูกค้าท่านต่อไป</p>
          <p>- ชำระการจอง 200 บาท ภายใน 6 ชั่วโมงหลังจากคอนเฟิร์ม</p>
        </div>
      </div>

      <div class="close-button">
        <i class="fas fa-times"></i>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php require_once "mains/footer.php"; ?>


  <div class="csrf-space-timeround"><?= $CSRF_TIMERROUND ?></div>
  <div class="csrf-space-province"><?= $CSRF_PROVINCE ?></div>
  <div class="csrf-space-position-arch-table"><?= $CSRF_POSITION_ARCH_TABLE ?></div>
  <div class="csrf-space-timeround-arch"><?= $CSRF_TIMEROUND_ARCH ?></div>
  <div class="csrf-space-timeround-table"><?= $CSRF_TIMEROUND_TABLE ?></div>
  <div class="csrf-space-booking-arch"><?= $CSRF_BOOKING_ARCH ?></div>
  <div class="csrf-space-booking-table"><?= $CSRF_BOOKING_TABLE ?></div>


  <script async defer src="/js/home.js?v=1.0.0.8"></script>
</body>