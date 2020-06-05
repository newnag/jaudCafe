// เมื่อพิมที่ช่อง กรอกเบอร์ที่จอง (keyup)
document.querySelector('#searchBer').addEventListener('keyup', function (e) {
  e.preventDefault();
  // เมื่อกด Enter
  if (e.keyCode === 13 || e.which === 13 || e.key == "Enter") {
    // statement
    let phone = e.target.value;
    getMyListBooking(phone);
  }
});

// คลิกค้นหา (click)
document.querySelector('.search-ber .button button').addEventListener('click', function (e) {
  e.preventDefault();

  let phone = document.querySelector('#searchBer').value.trim();

  // ดึงข้อมูลที่เราจอง
  getMyListBooking(phone);
});

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
    axios.get('/api/v1.0/myListBooking', {
      headers: {
        "token-csrf": `csrf ${csrf}`,
        "phone": `phone ${phone}`
      }
    }).then(res => {
      document.querySelector(`#listBookingLoad`).innerHTML = res.data.html

      // โชว์ รายการที่เราจอง
      document.querySelector(`.info-book`).style.display = "grid";
      // ซ่อน
      document.querySelector(`.confirm-payment`).style.display = "none";
      document.querySelector(`.payment`).style.display = "none";
    })
  } catch (err) {
    console.error(err)
  }
}

// เมื่อกดปุ่ม ยืนยัน (click)
function handleClickConfirm(e) {
  e.preventDefault();
  // ซ่อน
  document.querySelector(`.info-book`).style.display = "none";
  // โชว์
  document.querySelector(`.confirm-payment`).style.display = "grid";
  document.querySelector(`.payment`).style.display = "grid";

  // แสดงข้อมูล
  let self = e.target.closest('.grid');
  document.querySelector(`#booking-info-phone`).innerHTML = `เบอร์ ${self.getAttribute('data-phone')}`
  document.querySelector(`#booking-info-name`).innerHTML = self.getAttribute('data-name')
  document.querySelector(`#booking-info-type`).innerHTML = self.getAttribute('data-type')
  document.querySelector(`#booking-info-book-id-name`).innerHTML = self.getAttribute('data-idname')
  document.querySelector(`#booking-info-line`).innerHTML = self.getAttribute('data-line')
  document.querySelector(`#booking-info-province`).innerHTML = self.getAttribute('data-province')
  document.querySelector(`#booking-info-date`).innerHTML = self.getAttribute('data-date')
  document.querySelector(`#booking-info-time`).innerHTML = self.getAttribute('data-time')
  document.querySelector(`#booking-info-position`).innerHTML = self.getAttribute('data-position')
  document.querySelector(`#booking-info-people`).innerHTML = self.getAttribute('data-people')
  document.querySelector(`#booking-info-typename`).innerHTML = self.getAttribute('data-typename')

  // โชว์เงิน
  document.querySelector(`#booking-info-price-show`).innerHTML = `${self.getAttribute('data-price')} บาท`
  // ยอดที่ชำระ
  document.querySelector(`.confirm-payment-price`).value = `${self.getAttribute('data-price')}`

  // เก็บหมายเลขซุ้มหรือโต๊ะ ไว้ใน localstore
  localStorage.setItem('confirm-payment-position', self.getAttribute('data-position'))
  localStorage.setItem('confirm-payment-booking-id', self.getAttribute('data-id'))
}

// เมื่อกดปุ่ม ลบ (click)
function handleClickDelete(e) {
  e.preventDefault();
  Swal.fire({
    title:"ยืนยันการลบ",
    text:"คุณต้องการลบการจองนี้ใช่หรือไม่",
    icon:"warning",
    confirmButtonText:"OK",
    showCancelButton:true,
    cancelButtonText:"Cancel"
  }).then(x => {
    if(x.value){
      let csrf = document.querySelector('#token-csrf-booking-delete').value
      axios.delete(`/api/v1.0/Booking`,{
        data:{
          booking_id:e.target.closest('.grid').getAttribute(`data-id`),
        },
        headers:{
          'token-csrf':`csrf ${csrf}`
        }
      }).then(res => {
        if(res.data.message == "success"){
          Swal.fire({
            title:"ลบข้อมูลสำเร็จ",
            text:"ลบข้อมูลการจองสำเร็จ",
            icon:"success",
            confirmButtonText:"OK",
          }).then(() => {
            e.target.closest('.grid').remove()
          })
        }else{
          Swal.fire({
            title:"ลบข้อมูลไม่สำเร็จ",
            text:"ลบข้อมูลการจองไม่สำเร็จ",
            icon:"error",
            confirmButtonText:"OK",
          }).then(() => {
            
          })
        }
      })
    }
  });
}




// เมื่อกดยืนยันการจอง
document.querySelector('.payment .button button').addEventListener('click', function (e) {
  e.preventDefault();
  let book_id = localStorage.getItem('confirm-payment-booking-id');
  let bank = document.querySelector('.confirm-payment-bank').value.trim();
  let name = document.querySelector('.confirm-payment-name').value.trim();
  let price = document.querySelector('.confirm-payment-price').value.trim();
  let date = document.querySelector('.confirm-payment-date').value.trim();
  let image = document.querySelector('.confirm-payment-img').getAttribute('data-image');
  let position = localStorage.getItem('confirm-payment-position');
  let csrf = document.querySelector('#token-csrf-booking').value;


  // ตรวจสอบข้อมูล ธนาคาร
  if (!bank) {
    Swal.fire({
      title: "แจ้งเตือน!!!",
      text: "กรุณาเลือกธนาคารที่ท่านโอนเงินด้วยครับ",
      icon: "warning",
      confirmButtonText: "OK"
    }); return false;
  }

  // ตรวจสอบข้อมูล ชื่อบัญชีของคนโอน
  if (!name) {
    Swal.fire({
      title: "แจ้งเตือน!!!",
      text: "กรุณากรอกชื่อบัญชีของท่านด้วยครับ",
      icon: "warning",
      confirmButtonText: "OK"
    }); return false;
  }

  // ตรวจสอบข้อมูล ยอดชำระ
  if (!price) {
    Swal.fire({
      title: "แจ้งเตือน!!!",
      text: "กรุณากรอกจำนวนเงินที่ท่านโอนด้วยครับ",
      icon: "warning",
      confirmButtonText: "OK"
    }); return false;
  }

  // ตรวจสอบข้อมูล วันที่ชำระ
  if (!date) {
    Swal.fire({
      title: "แจ้งเตือน!!!",
      text: "กรุณาเลือกวันที่ที่ท่านโอนด้วยครับ",
      icon: "warning",
      confirmButtonText: "OK"
    }); return false;
  }

  // ตรวจสอบข้อมูล อัพโหลดรูปภาพ
  if (!image) {
    Swal.fire({
      title: "แจ้งเตือน!!!",
      text: "กรุณาอัพโหลดรูปภาพสลิปด้วยครับ",
      icon: "warning",
      confirmButtonText: "OK"
    }); return false;
  }


  Swal.fire({
    title: "ยืนยันการจอง",
    html: "กดปุ่มOK เพื่อยืนยันการจอง",
    icon: "warning",
    confirmButtonText: "OK",
    showCancelButton: true,
    cancelButtonText: "Cancel"
  }).then(x => {
    if (x.isConfirmed) {


      axios.post('/api/v1.0/Booking', {
        book_id, bank, name, price, date, image, position
      }, {
        headers: {
          'token-csrf-booking': `csrf ${csrf}`
        }
      }).then(res => {
        if(res.data.status_){
          Swal.fire({
            title:"แจ้งชำระเงินสำเร็จ",
            html:"กรุณารอทีมงานตรวจสอบข้อมูลการโอนเงินของท่านครับ <br> ระบบจะแจ้งไปทางไลน์นะครับ",
            icon:"success",
            confirmButtonText:"OK"
          }).then(() => {
            window.location.reload();
          });
        }else{
          Swal.fire({
            title:"แจ้งชำระเงินไม่สำเร็จ",
            html:"เกิดข้อผิดพลาดบางอย่างกรุณาทำรายการใหม่อีกครั้งครับ",
            icon:"error",
            confirmButtonText:"OK"
          }).then(() => {
            window.location.reload();
          });
        }
      })
    }
  })
});