<body>
  <!-- Header Web Navbar -->
  <?php require_once "mains/navbar.php"; ?>

  <!-- Slide Banner -->
  <?php require_once "mains/slide.php"; ?>

  <!-- MAIN -->
  <div class="confirm-page container">
    <div class="head-text">
      <div class="title">
        <h1><?=$CATEGORY->title?></h1>
      </div>
      <div class="description">
        <p><?=$CONTACT_WEB->desc_2?></p>
      </div>
    </div>

    <div class="background"><img src="/img/BG1.jpg" alt=""></div>

    <div class="search-ber">
      <div class="input-box">
        <label>กรอกเบอร์ที่จอง : </label>
        <input type="tel" name="searchBer" id="searchBer" maxlength="10" value="">
      </div>
      <div class="button">
        <button><i class="fas fa-search"></i>ค้นหา</button>
      </div>
    </div>

    <div class="info-book" style="display:grid">
      <div class="grid-head">
        <span>ชื่อผู้จอง</span>
        <span>วันที่</span>
        <span>เวลา</span>
        <span>ที่นั่ง</span>
      </div>

      <div class="grid-data" id="listBookingLoad">

        <?php /*
        <!-- fetch data here!!! -->

        <div class="grid" data-idConF="00001">
          <span id="name-conBook">น้องอีฟ คนสวยน่ารัก</span>
          <span>16/6/2563</span>
          <span>11.00-13.00 น.</span>
          <span>ซุ้ม 5</span>
          <div class="button">
            <button class="confirm">ยืนยัน</button>
            <button class="delete">ลบ</button>
          </div>
        </div>
        */
        ?>
      </div>
    </div>

    <div class="confirm-payment">
      <div class="title">
        <div class="ber"><span id="booking-info-phone">เบอร์ 0123456789</span></div>
        <div class="name"><span id="booking-info-name">น้องอีฟ คนสวยน่ารัก งามแท้ๆ</span></div>
      </div>

      <div class="data">

        <div class="item">
          <label>BookID :</label>
          <span id="booking-info-book-id-name"></span>
        </div>

        <div class="item">
          <label>จองแบบ :</label>
          <span id="booking-info-type">จองซุ้มริมน้ำ</span>
        </div>

        <div class="item" id="line-payment">
          <label>Line ID :</label>
          <span id="booking-info-line">Efefefefef</span>
        </div>

        <div class="item">
          <label>จังหวัด :</label>
          <span id="booking-info-province">มหาสารคาม</span>
        </div>

        <div class="item">
          <label>วันที่ :</label>
          <span id="booking-info-date">16/6/2563</span>
        </div>

        <div class="item">
          <label>รอบที่จอง :</label>
          <span id="booking-info-time">11.00 - 13.00 น.</span>
        </div>

        <div class="item">
          <label id="booking-info-typename"></label>
          <span id="booking-info-position">6</span>
        </div>

        <div class="item">
          <label>จำนวนคน :</label>
          <span id="booking-info-people">8</span>
        </div>
      </div>

      <div class="total">
        <div class="box">
          <span>ยอดการจอง</span>
          <span class="price" id="booking-info-price-show"></span>
        </div>
      </div>
    </div>

    <div class="payment">
      <div class="title">
        <h2>แจ้งชำระเงิน</h2>
      </div>

      <div class="grid-bank">
        <?= $App->renderBankInfo() ?>

      </div>

      <div class="input-data">
        <div class="input">
          <label>ธนาคาร :</label>
          <select name="bank" id="bank" class="confirm-payment-bank">
            <option value="" data-name="">กรุณาเลือก ธนาคาร</option>
            <?php foreach ($App->getBanks() as $key => $res) { ?>
              <option value="<?= $res['id'] ?>" data-name="<?= $res['name'] ?>"><?= $res['bank_name'] ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="input">
          <label>ชื่อบัญชี :</label>
          <input type="text" class="confirm-payment-name">
        </div>

        <div class="input">
          <label>ยอดที่ชำระ :</label>
          <input type="number" pattern="/^-?\d+\.?\d*$/" class="confirm-payment-price" value="" onKeyPress="if(this.value.length==6) return false;" />
        </div>

        <div class="input">
          <label>วันที่ชำระ :</label>
          <input type="date" id="date-payment" class="dateSelect confirm-payment-date" placeholder="กรอกวันที่">
        </div>

        <div class="upload-slip">
          <span>อัพโหลดรูปภาพสลิป (ไฟล์ jpg,jpeg,png เท่านั้น)</span>
          <label for="slip-upload" id="inputfile" style="display:flex;justify-content:center;align-items:center;">
            <figure data-id="5" class="cursor-pointer">
              <input type="file" accept="image/*" class="inputFileImg" name="inputFileImg" onchange="imgOnChange(event,'.img-handle-upload-image')" style="display:none;">
              <img onclick="selectImage(event,'inputFileImg')" class="img-handle-upload-image confirm-payment-img" data-image="" src="/img/image-default.jpg" style="border: 1px solid rgba(0,0,0,0.2);width:100%;height:100%;max-width:200px;max-height:100%;object-fit:cover;">
            </figure>
          </label>

        </div>
      </div>

      <div class="button"><button>ยืนยันการจอง</button></div>
    </div>
  </div>


  <!-- Footer -->
  <?php require_once "mains/footer.php"; ?>

  <div class="token-csrf-listbooking-space"><?= $CSRF_LISTBOOKING ?></div>
  <div class="token-csrf-upload-space"><?= $CSRF_UPLOAD_IMG ?></div>
  <div class="token-csrf-booking-space"><?= $CSRF_BOOKING_PAYMENT ?></div>
  <div class="token-csrf-booking-delete-space"><?= $CSRF_BOOKING_DELETE ?></div>


  <script src="/js/confirm-booking.js?v=<?= time() ?>"></script>
  <script src="/js/upload.js?v=<?= time() ?>"></script>
</body>