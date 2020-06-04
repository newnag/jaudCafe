// fetch load data
window.addEventListener("load", async function () {
  localStorage.clear();

  // รอบเวลา
  if (!localStorage.getItem('timeRoundArch') || localStorage.getItem('timeRoundArch') == "null" || localStorage.getItem('timeRoundArch') == "undefined") {
    // ถ้าไม่มีข้อมูลในเครื่อง ให้ load ข้อมูลจาก server
    let res = await requestAPI_Timeround();
    localStorage.setItem('timeRoundArch', res.data.timeround_arch);
    localStorage.setItem('timeRoundTable', res.data.timeround_table);
  }
  document.querySelector('.space-timeround-arch').insertAdjacentHTML('afterbegin', localStorage.getItem('timeRoundArch'))
  document.querySelector('.space-timeround-table').insertAdjacentHTML('afterbegin', localStorage.getItem('timeRoundTable'))

  //หมายเลขซุ้ม
  if (!localStorage.getItem('numberPositionArch') || localStorage.getItem('numberPositionArch') == "null" || localStorage.getItem('numberPositionArch') == "undefined") {
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
  if (!localStorage.getItem('province') || localStorage.getItem('province') == "null" || localStorage.getItem('province') == "undefined") {
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
    return await axios.get(`/api/v1.0/timeround`, {
      headers: {
        'token-csrf-timeround': `csrf ${csrf}`
      }
    });
  } catch (error) {
    console.error('Error')
  }
}
// request จังหวัด
let requestAPI_Province = async () => {
  try {
    let csrf = document.querySelector('#token-csrf-province').value
    return await axios.get('/api/v1.0/province', {
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
    return await axios.get('/api/v1.0/positionArchAndTable', {
      headers: {
        'token-csrf-position-arch-table': `csrf ${csrf}`
      }
    });
  } catch (err) {
    console.error('Error')
  }
}



// clear position arch
function clearPositionArch() {
  document.querySelectorAll(`.booking-zone .book-display .display-box figure .arch`).forEach(x => {
    // ลบ class 
    x.classList.remove('confirmA', 'selectedA', 'disableA');
    // โชว์หมายเลขซุ้ม
    x.querySelector(`.num-table`).style.display = ""
  })
  // วนลูปทำให้ทุกซุ้มเป็นค่าว่าง
  document.querySelector(`.space-position-arch`).closest('.input').querySelectorAll('.multi-select-menuitem').forEach(x => x.style.display = "")
}
// disable position arch
function disablePositionArch() {
  document.querySelectorAll(`.booking-zone .book-display .display-box figure .arch`).forEach(x => {
    // ลบ class 
    x.classList.remove('confirmA', 'selectedA');
    x.classList.add('disableA');
    // โชว์หมายเลขซุ้ม
    x.querySelector(`.num-table`).style.display = ""
  })
}

// clear position table
function clearPositionTable() {
  document.querySelectorAll(`.booking-zone .book-display .display-box figure .table`).forEach(x => {
    // ลบ class 
    x.classList.remove('confirmT', 'selectedT', 'disableT');
    // โชว์หมายเลขโต๊ะ
    x.querySelector(`.num-table`).style.display = ""
  })
  // วนลูปทำให้โต๊ะเป็นค่าว่าง
  document.querySelector(`.space-position-table`).closest('.input').querySelectorAll('.multi-select-menuitem').forEach(x => x.style.display = "")
}
// disable position arch
function disablePositionTable() {
  document.querySelectorAll(`.booking-zone .book-display .display-box figure .table`).forEach(x => {
    // ลบ class 
    x.classList.remove('confirmT', 'selectedT');
    x.classList.add('disableT');
    // โชว์หมายเลขซุ้ม
    x.querySelector(`.num-table`).style.display = ""
  })
}


// เมื่อคลิก (tab) จองซุ้มริมน้ำ
document.querySelector('.buttonArch').addEventListener('click', function () {

  let timeround = document.querySelector('.space-timeround-arch').value;
  let date_arch = document.querySelector('.date-booking-arch').value.trim()

  clearPositionArch()
  disablePositionTable()

  if (timeround && date_arch) {
    // ดึงข้อมูลซุ้มที่จองไปแล้ว
    getDataBooking("arch", date_arch, timeround);
  }

});

// เมื่อคลิก (tab) จองโต๊ะเทอเรส
document.querySelector('.buttonTable').addEventListener('click', function () {
  let timeround = document.querySelector('.space-timeround-table').value;
  let date_table = document.querySelector('.date-booking-table').value.trim()

  // clearPositionTable()
  // disablePositionArch()

  if (timeround && date_table) {
    // ดึงข้อมูลซุ้มที่จองไปแล้ว
    getDataBooking("table", date_table, timeround);
  }
})


// เมื่อลูกค้าทำการเลือก รอบเวลา (ซุ้ม) (time round)
document.querySelector('.space-timeround-arch').addEventListener('change', function (e) {
  if (e.target.value) {
    let timeround = e.target.value
    let date_arch = document.querySelector('.date-booking-arch').value.trim()

    // clear position arch
    clearPositionArch()

    // ดึงข้อมูลซุ้มที่จองไปแล้ว
    getDataBooking("arch", date_arch, timeround);

    setTimeout(() =>
      $('.slide-hover').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: false,
        autoplay: true,
        responsiveClass: true,
        items: 1,
      }), 50
    )
  }
});

// เมื่อลูกค้าทำการเลือก รอบเวลา (โต๊ะ) (time round)
document.querySelector('.space-timeround-table').addEventListener('change', function (e) {
  if (e.target.value) {
    let timeround = e.target.value
    let date_table = document.querySelector('.date-booking-table').value.trim()

    // clear position arch
    clearPositionTable()

    // ดึงข้อมูลซุ้มที่จองไปแล้ว
    getDataBooking("table", date_table, timeround);

    $('.slide-hover').owlCarousel({
      loop: true,
      margin: 10,
      nav: false,
      dots: false,
      autoplay: true,
      autoplayTimeout: 3000,
      responsiveClass: true,
      items: 1,
    });
  }
});


// ดึงข้อมูลซุ้มที่จองไปแล้ว (request)
function getDataBooking(type, date_, timeround) {
  try {
    if (type == "arch") {

      // [*]ซุ้ม----------------------------------------

      let csrf = document.querySelector('#token-csrf-timeround-arch').value
      axios.post('/api/v1.0/positionArchWithTimeround', {
        "date": date_,
        "timeround": timeround
      }, {
        headers: { 'token-csrf': `csrf ${csrf}` },
      }).then(res => {
        if (res.data.status_) {

          // วนลูปข้อมูลซุ้มที่ถูกจองไปแล้ว
          res.data.res.forEach(x => {
            if (x.status == 'pending') {
              // รอคอนเฟริม
              document.querySelector(`.booking-zone .book-display .display-box figure .arch[data-archid="${x.position_num}"]`).classList.add('confirmA')
              // ซ่อนหมายเลขซุ้มที่ถูกจองไปแล้ว
              document.querySelector(`.booking-zone .book-display .display-box figure .arch[data-archid="${x.position_num}"] .num-table`).style.display = 'none'
            } else if (x.status == 'booking') {
              // จองไปแล้ว
              document.querySelector(`.booking-zone .book-display .display-box figure .arch[data-archid="${x.position_num}"]`).classList.add('disableA')
            }
            // ซ่อน input checkbox ซุ้มที่ถูกจองไปแล้ว
            document.querySelector(`.multi-select-menuitem input[value="${x.position_num}"]`).closest('.multi-select-menuitem').style.display = "none"
          })

        } else {

          if (res.data.message == "Token_CSRF_Invalid") {
            window.location.reload()
          }

        }
      });
    } else {

      // [*]โต๊ะ------------------------------------------

      let csrf = document.querySelector('#token-csrf-timeround-table').value
      axios.post('/api/v1.0/positionTableWithTimeround', {
        "date": date_,
        "timeround": timeround
      }, {
        headers: { 'token-csrf': `csrf ${csrf}` },
      }).then(res => {
        // ถ้า status เป็น true
        if (res.data.status_) {
          // วนลูปข้อมูลโต๊ะที่ถูกจองไปแล้ว
          res.data.res.forEach(x => {
            if (x.status == 'pending') {
              // รอคอนเฟริม
              document.querySelector(`.booking-zone .book-display .display-box figure .table[data-tableid="${x.position_num}"]`).classList.add('confirmT')
              // ซ่อนหมายเลขโต๊ะที่ถูกจองไปแล้ว
              document.querySelector(`.booking-zone .book-display .display-box figure .table[data-tableid="${x.position_num}"] .num-table`).style.display = 'none'
            } else if (x.status == 'booking') {
              // จองไปแล้ว
              document.querySelector(`.booking-zone .book-display .display-box figure .table[data-tableid="${x.position_num}"]`).classList.add('disableT')
            }
            // ซ่อน input checkbox โต๊ะที่ถูกจองไปแล้ว
            document.querySelector(`.multi-select-menuitem input[value="${x.position_num}"]`).closest('.multi-select-menuitem').style.display = "none"
          })
        }
      });
    }
  } catch (err) {
    console.error(err)
  }
}

//เมื่อลูกค้า กดจอง (click)
document.querySelector('#booking-button-submit').addEventListener('click', async function () {
  let action = Array.from(document.querySelectorAll('.book-top .formBook .input-zone')).find(ex => ex.getAttribute('data-action') === "active");
  let type = action.getAttribute('data-type');

  if (type == "arch") {

    let date_arch = document.querySelector('.date-booking-arch').value.trim()
    let time_arch = document.querySelector('.space-timeround-arch').value.trim()
    let time_arch_name = document.querySelector('.space-timeround-arch option:checked').textContent.trim()
    let numpeople_arch = document.querySelector('#numPeople').value.trim()
    let name_arch = document.querySelector('.name-arch').value.trim()
    let phone_arch = document.querySelector('.phone-arch').value.trim()
    let line_arch = document.querySelector('.line-arch').value.trim()
    let province_arch = document.querySelector('.space-province-arch').value.trim()
    let province_name = document.querySelector('.space-province-arch option:checked').textContent.trim()

    // ตรวจสอบวันที่
    if (!date_arch) {
      Swal.fire({
        title: "แจ้งเตือน!!!",
        text: "กรุณากรอกวันที่ด้วยครับ",
        icon: "warning",
        confirmButtonText: "OK"
      });
      return false;
    }

    // ตรวจสอบเวลา/รอบ
    if (!time_arch) {
      Swal.fire({
        title: "แจ้งเตือน!!!",
        text: "กรุณาเลือก เวลา/รอบ ด้วยครับ",
        icon: "warning",
        confirmButtonText: "OK"
      });
      return false;
    }

    // ตรวจสอบหมายเลขซุ้ม
    let numberArch = Array.from(document.querySelectorAll(`.formBook .Arch .inputBox .input 
          .multi-select-container .multi-select-menu .multi-select-menuitems .multi-select-menuitem input[type=checkbox]`)
    ).filter(el => el.checked == true).map(x => x.value)
    if (!numberArch.length) {
      Swal.fire({
        title: "แจ้งเตือน!!!",
        text: "กรุณาเลือกที่นั่งซุ้มด้วยครับ",
        icon: "warning",
        confirmButtonText: "OK"
      });
      return false;
    }

    // ตรวจสอบจำนวนคน
    if (!numpeople_arch) {
      Swal.fire({
        title: "แจ้งเตือน!!!",
        text: "กรุณากรอกจำนวนคนด้วยครับ",
        icon: "warning",
        confirmButtonText: "OK"
      });
      return false;
    } else {
      // จำนวนคนเกิน limit หรือไม่
      if (numpeople_arch > (numberArch.length * 15)) {
        Swal.fire({
          title: 'จำนวนคนถึงขีดจำกัด!',
          text: 'ซุ้มจำกัด 15 คนต่อซุ้ม กรุณาเลือกซุ้มเพิ่ม',
          icon: 'warning',
          confirmButtonText: "OK"
        }); return false;
      }
    }

    // ตรวจสอบชื่อที่จอง
    if (!name_arch) {
      Swal.fire({
        title: "แจ้งเตือน!!!",
        text: "กรุณากรอกชื่อผู้จองด้วยครับ",
        icon: "warning",
        confirmButtonText: "OK"
      });
      return false;
    }

    // ตรวจสอบเบอร์โทรศัพ (วันหนึ่งจองได้1ครั้งเด้อ)
    if (!phone_arch) {
      Swal.fire({
        title: "แจ้งเตือน!!!",
        text: "กรุณากรอกเบอร์โทรศัพท์ด้วยครับ",
        icon: "warning",
        confirmButtonText: "OK"
      });
      return false;
    }
    else if (phone_arch.length < 10) {
      Swal.fire({
        title: "แจ้งเตือน!!!",
        text: "กรุณากรอกเบอร์โทรศัพท์ให้ครบ10หลักด้วยครับ",
        icon: "warning",
        confirmButtonText: "OK"
      });
      return false;
    }

    // ตรวจสอบไลน์ไอดี
    if (!line_arch) {
      Swal.fire({
        title: "แจ้งเตือน!!!",
        text: "กรุณากรอกไลน์ไอดีด้วยครับ",
        icon: "warning",
        confirmButtonText: "OK"
      });
      return false;
    }

    // ตรวจสอบจังหวัด
    if (!province_arch) {
      Swal.fire({
        title: "แจ้งเตือน!!!",
        text: "กรุณาเลือกจังหวัดของท่านด้วยครับ",
        icon: "warning",
        confirmButtonText: "OK"
      });
      return false;
    }

    // เปิดหน้า dialog confirm
    document.querySelector(`.dialog-confirm`).classList.add('active');

    // เก็บข้อมูลไว้ใน localStorage
    localStorage.setItem('booking-arch-date', date_arch)
    localStorage.setItem('booking-arch-time', time_arch)
    localStorage.setItem('booking-arch-arch', numberArch)
    localStorage.setItem('booking-arch-people', numpeople_arch)
    localStorage.setItem('booking-arch-name', name_arch)
    localStorage.setItem('booking-arch-phone', phone_arch)
    localStorage.setItem('booking-arch-line', line_arch)
    localStorage.setItem('booking-arch-province', province_arch)
    localStorage.setItem('booking-arch-province-name', province_name)
    localStorage.setItem('booking-type', 'arch')
    localStorage.setItem('booking-arch-type-name', 'จองซุ้มริมน้ำ')


    // โชว์ข้อมูลที่ dialog-confirm
    document.querySelector(`#booking-type`).innerHTML = `${localStorage.getItem('booking-arch-type-name')}`
    document.querySelector(`#booking-name`).innerHTML = `${localStorage.getItem('booking-arch-name')}`
    document.querySelector(`#booking-phone`).innerHTML = `${localStorage.getItem('booking-arch-phone')}`
    document.querySelector(`#booking-line`).innerHTML = `${localStorage.getItem('booking-arch-line')}`
    document.querySelector(`#booking-province-name`).innerHTML = `${localStorage.getItem('booking-arch-province-name')}`
    document.querySelector(`#booking-date`).innerHTML = `${localStorage.getItem('booking-arch-date')}`
    document.querySelector(`#booking-time`).innerHTML = `${localStorage.getItem('booking-arch-time')} ( ${time_arch_name}) `
    document.querySelector(`#booking-table-name`).innerHTML = `หมายเลขซุ้ม :`
    document.querySelector(`#booking-table-number`).innerHTML = `${localStorage.getItem('booking-arch-arch')}`
    document.querySelector(`#booking-people`).innerHTML = `${localStorage.getItem('booking-arch-people')}`


  } else if (type == "table") {

    let date_table = document.querySelector('.date-booking-table').value.trim();
    let time_table = document.querySelector('.space-timeround-table').value.trim();
    let time_table_name = document.querySelector('.space-timeround-table option:checked').textContent.trim()
    let numpeople_table = document.querySelector('#numPeopleT').value.trim();
    let name_table = document.querySelector('.name-table').value.trim();
    let phone_table = document.querySelector('.phone-table').value.trim();
    let line_table = document.querySelector('.line-table').value.trim();
    let province_table = document.querySelector('.space-province-table').value.trim();
    let province_name = document.querySelector('.space-province-table option:checked').textContent.trim()

    // ตรวจสอบวันที่
    if (!date_table) {
      Swal.fire({
        title: "แจ้งเตือน!!!",
        text: "กรุณากรอกวันที่ด้วยครับ",
        icon: "warning",
        confirmButtonText: "OK"
      });
      return false;
    }

    // ตรวจสอบเวลา/รอบ
    if (!time_table) {
      Swal.fire({
        title: "แจ้งเตือน!!!",
        text: "กรุณาเลือก เวลา/รอบ ด้วยครับ",
        icon: "warning",
        confirmButtonText: "OK"
      });
      return false;
    }

    // ตรวจสอบหมายเลขโต๊ะ
    let numberTable = Array.from(document.querySelectorAll(`.formBook .Table .inputBox .input 
          .multi-select-container .multi-select-menu .multi-select-menuitems .multi-select-menuitem input[type=checkbox]`)
    ).filter(el => el.checked == true).map(x => x.value)
    if (!numberTable.length) {
      Swal.fire({
        title: "แจ้งเตือน!!!",
        text: "กรุณาเลือกที่โต๊ะที่นั่งด้วยครับ",
        icon: "warning",
        confirmButtonText: "OK"
      });
      return false;
    }

    // ตรวจสอบจำนวนคน
    if (!numpeople_table) {
      Swal.fire({
        title: "แจ้งเตือน!!!",
        text: "กรุณากรอกจำนวนคนด้วยครับ",
        icon: "warning",
        confirmButtonText: "OK"
      });
      return false;
    } else {
      // จำนวนคนเกิน limit หรือไม่
      if (numpeople_table > (numberTable.length * 5)) {
        Swal.fire({
          title: 'จำนวนคนถึงขีดจำกัด!',
          text: 'ซุ้มจำกัด 5 คนต่อซุ้ม กรุณาเลือกซุ้มเพิ่ม',
          icon: 'warning',
          confirmButtonText: "OK"
        }); return false;
      }
    }

    // ตรวจสอบชื่อที่จอง
    if (!name_table) {
      Swal.fire({
        title: "แจ้งเตือน!!!",
        text: "กรุณากรอกชื่อผู้จองด้วยครับ",
        icon: "warning",
        confirmButtonText: "OK"
      });
      return false;
    }

    // ตรวจสอบเบอร์โทรศัพ (วันหนึ่งจองได้1ครั้งเด้อ)
    if (!phone_table) {
      Swal.fire({
        title: "แจ้งเตือน!!!",
        text: "กรุณากรอกเบอร์โทรศัพท์ด้วยครับ",
        icon: "warning",
        confirmButtonText: "OK"
      });
      return false;
    }

    // ตรวจสอบไลน์ไอดี
    if (!line_table) {
      Swal.fire({
        title: "แจ้งเตือน!!!",
        text: "กรุณากรอกไลน์ไอดีด้วยครับ",
        icon: "warning",
        confirmButtonText: "OK"
      });
      return false;
    }

    // ตรวจสอบจังหวัด
    if (!province_table) {
      Swal.fire({
        title: "แจ้งเตือน!!!",
        text: "กรุณาเลือกจังหวัดของท่านด้วยครับ",
        icon: "warning",
        confirmButtonText: "OK"
      });
      return false;
    }


    // เปิดหน้า dialog confirm
    document.querySelector(`.dialog-confirm`).classList.add('active');

    // เก็บข้อมูลไว้ใน localStorage
    localStorage.setItem('booking-table-date', date_table)
    localStorage.setItem('booking-table-time', time_table)
    localStorage.setItem('booking-table-arch', numberTable)
    localStorage.setItem('booking-table-people', numpeople_table)
    localStorage.setItem('booking-table-name', name_table)
    localStorage.setItem('booking-table-phone', phone_table)
    localStorage.setItem('booking-table-line', line_table)
    localStorage.setItem('booking-table-province', province_table)
    localStorage.setItem('booking-table-province-name', province_name)
    localStorage.setItem('booking-type', 'table')
    localStorage.setItem('booking-table-type-name', 'จองโต๊ะเทอเรส')

    // โชว์ข้อมูลที่ dialog-confirm
    document.querySelector(`#booking-type`).innerHTML = `${localStorage.getItem('booking-table-type-name')}`
    document.querySelector(`#booking-name`).innerHTML = `${localStorage.getItem('booking-table-name')}`
    document.querySelector(`#booking-phone`).innerHTML = `${localStorage.getItem('booking-table-phone')}`
    document.querySelector(`#booking-line`).innerHTML = `${localStorage.getItem('booking-table-line')}`
    document.querySelector(`#booking-province-name`).innerHTML = `${localStorage.getItem('booking-table-province-name')}`
    document.querySelector(`#booking-date`).innerHTML = `${localStorage.getItem('booking-table-date')}`
    document.querySelector(`#booking-time`).innerHTML = `${localStorage.getItem('booking-table-time')} ( ${time_table_name}) `
    document.querySelector(`#booking-table-name`).innerHTML = `หมายเลขโต๊ะ :`
    document.querySelector(`#booking-table-number`).innerHTML = `${localStorage.getItem('booking-table-arch')}`
    document.querySelector(`#booking-people`).innerHTML = `${localStorage.getItem('booking-table-people')}`

  }
});

// เมื่อคลิ๊ก ปิด dialog-confirm
document.querySelector(`.dialog-confirm .dialog .close-button`).addEventListener('click', function (e) {
  e.preventDefault();
  document.querySelector('.dialog-confirm').classList.remove('active')
});

// กดปุ่มแก้ไขใน dialog-confirm
document.querySelector(`#edit`).addEventListener('click', function (e) {
  e.preventDefault();
  document.querySelector('.dialog-confirm').classList.remove('active')
})

// กดปุ่ม คอนเฟิร์มใน dialog-confirm 
document.querySelector(`#confirm`).addEventListener('click', async function (e) {
  e.preventDefault();
  let res = "";

  if (localStorage.getItem('booking-type') == "arch") {
    res = await saveBooking({
      "action": "arch",
      "date": localStorage.getItem('booking-arch-date'),
      "time": localStorage.getItem('booking-arch-time'),
      "table": localStorage.getItem('booking-arch-arch'),
      "people": localStorage.getItem('booking-arch-people'),
      "name": localStorage.getItem('booking-arch-name'),
      "phone": localStorage.getItem('booking-arch-phone'),
      "line": localStorage.getItem('booking-arch-line'),
      "province": localStorage.getItem('booking-arch-province')
    });
  } else if (localStorage.getItem('booking-type') == "table") {
    res = await saveBooking({
      "action": "table",
      "date": localStorage.getItem('booking-table-date'),
      "time": localStorage.getItem('booking-table-time'),
      "table": localStorage.getItem('booking-table-arch'),
      "people": localStorage.getItem('booking-table-people'),
      "name": localStorage.getItem('booking-table-name'),
      "phone": localStorage.getItem('booking-table-phone'),
      "line": localStorage.getItem('booking-table-line'),
      "province": localStorage.getItem('booking-table-province')
    });
  }
})

// ฟังก์ชั่นบันทึกข้อมูลการจองคิว (save)
async function saveBooking({ ...data }) {
  try {
    let csrf = "";
    if (data.action == "arch") {
      csrf = document.querySelector(`#token-csrf-booking-arch`).value.trim()
    } else {
      csrf = document.querySelector(`#token-csrf-booking-table`).value.trim()
    }
    axios.post(`/api/v1.0/booking/${data.action}`, data, {
      headers: {
        'Authorization': `Bearer ${csrf}`
      }
    }).then(res => {

      if (!res.data.status_) {
        if (res.data.message == "position_booking") {
          Swal.fire({
            title: "แจ้งเตือน!!!",
            text: `${res.data.detail}`,
            icon: "warning",
            confirmButtonText: "OK",
          }).then(x => {
            // ปิดหน้า dialog confirm
            document.querySelector(`.dialog-confirm`).classList.remove('active')

            // clear position
            if (res.data.type == "arch") {
              clearPositionArch()
              disablePositionTable()

              // clear ซุ้มที่เลือกใน input checkbox
              let numberArch = Array.from(document.querySelectorAll(`.formBook .Arch .inputBox .input 
                .multi-select-container .multi-select-menu .multi-select-menuitems .multi-select-menuitem input[type=checkbox]`)
              ).filter(el => el.checked == true && el.click())
            }
            else if (res.data.type == "table") {
              clearPositionTable()
              disablePositionArch()

              // clear ซุ้มที่เลือกใน input checkbox
              let numberArch = Array.from(document.querySelectorAll(`.formBook .Table .inputBox .input 
                .multi-select-container .multi-select-menu .multi-select-menuitems .multi-select-menuitem input[type=checkbox]`)
              ).filter(el => el.checked == true && el.click())
            }

            // โหลดข้อมูลโต๊ะใหม่
            getDataBooking(res.data.type, res.data.date, res.data.timeround);
          });
          return false;
        }
        if (res.data.message == "Token_CSRF_Invalid") {
          window.location.reload()
        }
        if (res.data.message == "phone_booked") {
          Swal.fire({
            title: "แจ้งเตือน!!!",
            html: `ไม่สามารถจองคิวได้ <br> 
                  *เบอร์นี้ (${res.data.phone}) ได้ทำการจองคิวไปแล้ว <br>
                  *1เบอร์สามารถจองคิวได้1ครั้ง/วัน
                  `,
            icon: "warning",
            confirmButtonText: "OK",
          });
        }
      } else {
        
        clearLocalStorage()

        // success
        Swal.fire({
          title: "สำเร็จ!!!",
          text: "บันทึกข้อมูลสำเร็จ กรุณากด OK เพื่อไปยังหน้าชำระการจอง",
          icon: "success",
          confirmButtonText: "OK"
        }).then(() => {

          window.location = `${res.data.url}`
        });

      }
    })
  } catch (err) {
    console.error(err)
  }
}

// ลบค่า localstorage
function clearLocalStorage() {
  localStorage.removeItem('booking-arch-date')
  localStorage.removeItem('booking-arch-time')
  localStorage.removeItem('booking-arch-arch')
  localStorage.removeItem('booking-arch-people')
  localStorage.removeItem('booking-arch-name')
  localStorage.removeItem('booking-arch-phone')
  localStorage.removeItem('booking-arch-line')
  localStorage.removeItem('booking-arch-province')
  localStorage.removeItem('booking-arch-province-name')
  localStorage.removeItem('booking-type')
  localStorage.removeItem('booking-arch-type-name')
  localStorage.removeItem('booking-table-date')
  localStorage.removeItem('booking-table-time')
  localStorage.removeItem('booking-table-arch')
  localStorage.removeItem('booking-table-people')
  localStorage.removeItem('booking-table-name')
  localStorage.removeItem('booking-table-phone')
  localStorage.removeItem('booking-table-line')
  localStorage.removeItem('booking-table-province')
  localStorage.removeItem('booking-table-province-name')
  localStorage.removeItem('booking-table-type-name')
}
