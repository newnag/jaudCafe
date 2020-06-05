<body>
  <!-- Header Web Navbar -->
  <?php require_once "mains/navbar.php"; ?>

  <!-- Slide Banner -->
  <?php require_once "mains/slide.php"; ?>


  <!-- MAIN -->
  <div class="contact-me container">
    <div class="head-text">
      <div class="title">
        <h1><?=$CATEGORY->title?></h1>
      </div>
      <div class="description">
        <p><?=$CONTACT_WEB->desc_2?></p>
      </div>
    </div>

    <div class="background"><img src="/img/BG1.jpg" alt=""></div>

    <div class="box-border">
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
          <p><?=$CONTACT_WEB->name?></p>
        </div>
        <div class="facebook"><i class="fab fa-facebook-f"></i>
          <p><?=$CONTACT_WEB->facebook_name?></p>
        </div>
        <div class="open"><i class="fas fa-store"></i>
          <p><?=$CONTACT_WEB->desc_1?></p>
        </div>
      </div>

      <div class="form-Contact">
        <div class="title">
          <h2>ติดต่อสอบถาม</h2>
        </div>

        <div class="input-box">
          <div class="info">
            <div class="input">
              <label for="Fname">ชื่อ: </label>
              <input type="text" name="Fname" id="Fname" value="">
            </div>

            <div class="input">
              <label for="Lname">สกุล : </label>
              <input type="text" name="Lname" id="Lname" value="">
            </div>

            <div class="input">
              <label for="Tel">เบอร์โทร : </label>
              <input type="tel" name="Tel" id="Tel" value="">
            </div>

            <div class="input">
              <label for="line">Line ID : </label>
              <input type="text" name="line" id="line" value="">
            </div>
          </div>

          <div class="topic">
            <label for="topic">หัวข้อ : </label>
            <input type="text" name="topic" id="topic" value="">
          </div>

          <div class="detail">
            <label for="">เนื้อหา : </label>
            <textarea name="" id="description" cols="30" rows="2"></textarea>
          </div>
        </div>

        <div class="button-box">
          <button id="clear"><i class="fas fa-trash-alt"></i><span>เคลียร์</span></button>
          <button id="confirm"><i class="fas fa-paper-plane"></i><span>ส่ง</span></button>
        </div>
      </div>
    </div>
  </div>

  <?php /*
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d47199.71574832185!2d102.85478864428622!3d16.493062337305954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31228b45a80faac1%3A0x81aff64c2debc635!2z4LiI4LmJ4Lin4LiU4LiE4Liy4LmA4Lif4LmIIOC4o-C5ieC4suC4meC4reC4suC4q-C4suC4o-C4muC4o-C4o-C4ouC4suC4geC4suC4qOC4quC4uOC4lOC4iuC4tOC4pSDguILguK3guJnguYHguIHguYjguJk!5e0!3m2!1sth!2sth!4v1591001553875!5m2!1sth!2sth" width="100%" height="650" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  */ ?>
  <?=$CONTACT_WEB->map?>

  <!-- Footer -->
  <?php require_once "mains/footer.php"; ?>

  <div class="token-csrf-space"><?=$CSRF_CONTACT?></div>
  <script>

    // เมื่อกดคลิกส่ง (click) (ติดต่อสอบถาม)
    document.querySelector('#confirm').addEventListener('click',function(){
      let fname = document.querySelector('#Fname').value.trim()
      let lname = document.querySelector('#Lname').value.trim()
      let phone = document.querySelector('#Tel').value.trim()
      let line = document.querySelector('#line').value.trim()
      let topic = document.querySelector('#topic').value.trim()
      let description = document.querySelector('#description').value.trim()

      if(fname.length < 1){
        Swal.fire({
          title:"แจ้งเตือน!!!",
          text:"กรุณากรอก ชื่อ ด้วยครับ",
          icon:"warning",
          confirmButtonText:"OK",
        }); return false;
      }
      if(lname.length < 1){
        Swal.fire({
          title:"แจ้งเตือน!!!",
          text:"กรุณากรอก นามสกุล ด้วยครับ",
          icon:"warning",
          confirmButtonText:"OK",
        }); return false;
      }
      if(phone.length < 1){
        Swal.fire({
          title:"แจ้งเตือน!!!",
          text:"กรุณากรอก เบอร์โทรศัพท์ ด้วยครับ",
          icon:"warning",
          confirmButtonText:"OK",
        }); return false;
      }
      if(line.length < 1){
        Swal.fire({
          title:"แจ้งเตือน!!!",
          text:"กรุณากรอก Line ID ด้วยครับ",
          icon:"warning",
          confirmButtonText:"OK",
        }); return false;
      }
      if(topic.length < 1){
        Swal.fire({
          title:"แจ้งเตือน!!!",
          text:"กรุณากรอก หัวข้อ ด้วยครับ",
          icon:"warning",
          confirmButtonText:"OK",
        }); return false;
      }
      if(description.length < 1){
        Swal.fire({
          title:"แจ้งเตือน!!!",
          text:"กรุณากรอก เนื้อหา ด้วยครับ",
          icon:"warning",
          confirmButtonText:"OK",
        }); return false;
      }

      saveContact({fname,lname,phone,line,topic,description})

    });

    // บันทึก ติดต่อสอบถาม
    function saveContact(data){
      try{
        let csrf = document.querySelector('#token-csrf-contact').value
        axios.post('/api/v1.0/contactweb',data,{
          headers:{'token-csrf':`csrf ${csrf}`}
        }).then(res => {

          if(res.data.status_){
            Swal.fire({
              title:"ส่งข้อมูลสำเร็จ",
              text:"ส่งข้อมูลสำเร็จครับ ระบบจะทำการ reload อัตโนมัติ",
              icon:"success",
              confirmButtonText:"OK",
              timer:2000
            }).then(() => {
              window.location.reload()
            })
          }else{
            Swal.fire({
              title:"เกิดข้อผิดพลาดบางอย่าง!!!",
              text:"ส่งข้อมูลไม่สำเร็จครับ ระบบจะทำการ reload อัตโนมัติ",
              icon:"error",
              confirmButtonText:"OK",
              timer:2000
            }).then(() => {
              window.location.reload()
            });
          }

          
        })
      }catch(err){
        console.error(err)
      }
    }

  </script>
</body>