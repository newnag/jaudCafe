<body>
  <!-- Header Web Navbar -->
  <?php require_once "mains/navbar.php"; ?>

  <!-- Slide Banner -->
  <?php require_once "mains/slide.php"; ?>

  <div class="confirm-page container">
    <div class="head-text">
      <div class="title">
        <h1><?= $CATEGORY->title ?></h1>
      </div>
      <div class="description">
        <p><?= $CONTACT_WEB->desc_2 ?></p>
      </div>
    </div>

    <div class="background"><img src="/img/BG1.jpg" alt=""></div>

    <div class="search-ber">
      <div class="input-box">
        <label>กรอกเบอร์ที่จอง : </label>
        <input type="tel" name="searchBer" id="searchBer" value="" maxlength="10">
      </div>
      <div class="button">
        <button><i class="fas fa-search"></i>ค้นหา</button>
      </div>
      <div class="token-csrf"><?= $CSRF_LISTBOOKING ?></div>
    </div>

    <div class="info-book">
      <div class="grid-head">
        <span>ชื่อผู้จอง</span>
        <span>วันที่</span>
        <span>เวลา</span>
        <span>ที่นั่ง</span>
      </div>

      <div class="grid-data" id="listBookingLoad">
        <?/** fetch data here!!!*/ ?>
      </div>
    </div>
  </div>

  <!-- ส่วนแสดงหลังจากเลือกการค้นหาจากเบอร์ -->
  <div class="dialog-confirm">
    <div class="dialog">
      <div class="title">
        <h2>ข้อมูลการจอง</h2>
      </div>

      <div class="info">
        <div id="type" class="info-data">
          <label>จองแบบ :</label>
          <span id="booking-search-type">จองซุ้มน้ำ</span>
        </div>
        <div id="name-info" class="info-data">
          <label>ชื่อ-สกุล :</label>
          <span id="booking-search-name">น้องอีฟ คนสวย งามแท้ๆ</span>
        </div>
        <div id="tel-info" class="info-data">
          <label>เบอร์โทร :</label>
          <span id="booking-search-phone">0123456789</span>
        </div>
        <div id="line-info" class="info-data">
          <label>Line ID :</label>
          <span id="booking-search-line">Efefefefef</span>
        </div>
        <div id="province-info" class="info-data">
          <label>จังหวัด :</label>
          <span id="booking-search-province">มหาสารคาม</span>
        </div>
        <div id="date-info" class="info-data">
          <label>วันที่ :</label>
          <span id="booking-search-date">16/6/2563</span>
        </div>
        <div id="time-info" class="info-data">
          <label>รอบที่จอง :</label>
          <span id="booking-search-timeround">11:00-13:00</span>
        </div>
        <div id="num-info" class="info-data">
          <label id="booking-search-typename">หมายเลขซุ้ม :</label>
          <span id="booking-search-position">5</span>
        </div>
        <div id="people-info" class="info-data">
          <label>จำนวนคน :</label>
          <span id="booking-search-people">8</span>
        </div>
        <div id="people-info" class="info-data">
          <label>สถานะ :</label>
          <span id="booking-search-status">8</span>
        </div>
      </div>

      <div class="ps">
        <div class="left"><span>หมายเหตุ</span></div>
        <div class="right">
          <p>- ลูกค้ามาช้าเกิน 15 นาทีขออนุญาตตัดสิทธิ์ ให้ลูกค้าท่านต่อไป</p>
        </div>
      </div>

      <div class="close-button">
        <i class="fas fa-times"></i>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php require_once "mains/footer.php"; ?>

  <script>
    // เมื่อloaded page
    window.addEventListener('load', function() {
      let phone = `<?= $_SESSION['phone'] ?>`;
      if (phone.length === 10) {
        document.querySelector(`#searchBer`).value = phone;

        // ดึงข้อมูลที่เราจอง
        getMyListBooking(phone);
      }
    });



    // เมื่อพิมที่ช่อง กรอกเบอร์ที่จอง (keyup)
    document.querySelector('#searchBer').addEventListener('keyup', function(e) {
      e.preventDefault();
      // เมื่อกด Enter
      if (e.keyCode === 13 || e.which === 13 || e.key == "Enter") {
        // statement
        let phone = e.target.value;
        getMyListBooking(phone);
      }
    });

    // คลิกค้นหา (click)
    document.querySelector('.search-ber .button button').addEventListener('click', function(e) {
      e.preventDefault();

      let phone = document.querySelector('#searchBer').value.trim();

      // ดึงข้อมูลที่เราจอง
      getMyListBooking(phone);
    });


    // โชว์ข้อมูลที่จอง
    function showBooking(e) {
      e.preventDefault();
      let parent_ = e.target.closest('.grid')
      // โชว์
      document.querySelector(`.dialog-confirm`).classList.add('active')


      document.querySelector(`#booking-search-phone`).innerHTML = `เบอร์ ${parent_.getAttribute('data-phone')}`
      document.querySelector(`#booking-search-name`).innerHTML = `${parent_.getAttribute('data-name')}`
      document.querySelector(`#booking-search-type`).innerHTML = `${parent_.getAttribute('data-type')}`
      document.querySelector(`#booking-search-line`).innerHTML = `${parent_.getAttribute('data-line')}`
      document.querySelector(`#booking-search-province`).innerHTML = `${parent_.getAttribute('data-province')}`
      document.querySelector(`#booking-search-date`).innerHTML = `${parent_.getAttribute('data-date')}`
      document.querySelector(`#booking-search-timeround`).innerHTML = `${parent_.getAttribute('data-time')}`
      document.querySelector(`#booking-search-typename`).innerHTML = `${parent_.getAttribute('data-typename')}`
      document.querySelector(`#booking-search-position`).innerHTML = `${parent_.getAttribute('data-position')}`
      document.querySelector(`#booking-search-people`).innerHTML = `${parent_.getAttribute('data-people')}`

      if (parent_.getAttribute('data-bookingstatus') == "pending" && parent_.getAttribute('data-paymentstatus') == "") {
        document.querySelector(`#booking-search-status`).innerHTML = `ยังไม่ได้ยืนยันการจอง`
        document.querySelector(`#booking-search-status`).style.color = `red`
      } else if (parent_.getAttribute('data-bookingstatus') == "pending" && parent_.getAttribute('data-paymentstatus') == "pending") {
        document.querySelector(`#booking-search-status`).innerHTML = `รอการตรวจสอบยอดเงินที่โอน`
        document.querySelector(`#booking-search-status`).style.color = `orange`
      } else if (parent_.getAttribute('data-bookingstatus') == "success" && parent_.getAttribute('data-paymentstatus') == "success") {
        document.querySelector(`#booking-search-status`).innerHTML = `จองสำเร็จ`
        document.querySelector(`#booking-search-status`).style.color = `mediumseagreen`
      }

    }

    // ดึงข้อมูลที่เราจอง
    function getMyListBooking(phone) {

      if (phone.length < 1) {
        // กรุณากรอกเบอร์โทรศัพท์ที่จอง
        Swal.fire({
          title: "แจ้งเตือน!!!",
          text: "กรุณากรอกเบอร์โทรศัพท์ที่จองด้วยครับ",
          icon: "warning",
          confirmButtonText: "OK"
        });
        return false;
      }

      if (phone.length < 10) {
        // กรุณากรอกเบอร์โทรศัพท์ที่จอง
        Swal.fire({
          title: "แจ้งเตือน!!!",
          text: "กรุณากรอกเบอร์โทรศัพท์ที่จองให้ครบ 10 หลัก ด้วยครับ",
          icon: "warning",
          confirmButtonText: "OK"
        });
        return false;
      }

      try {
        let csrf = document.querySelector('#token-csrf-listbooking').value
        axios.get('/api/v1.0/myListBooking/search', {
          headers: {
            "token-csrf": `csrf ${csrf}`,
            "phone": `phone ${phone}`
          }
        }).then(res => {
          document.querySelector(`#listBookingLoad`).innerHTML = res.data.html

          // โชว์ รายการที่เราจอง
          document.querySelector(`.info-book`).style.display = "grid";
          // ซ่อน
          document.querySelector(`.dialog-confirm`).classList.remove('active')
        })
      } catch (err) {
        console.error(err)
      }
    }


    // เมื่อกด ปิด dialog confirm
    document.querySelector('.close-button').addEventListener('click', function() {
      document.querySelector(`.dialog-confirm`).classList.remove('active')
    });
  </script>
</body>