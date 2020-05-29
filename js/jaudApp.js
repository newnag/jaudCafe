// ------------------------- @slide ------------------------- //
$('.slideHead').owlCarousel({
  loop: true,
  margin: 10,
  nav: false,
  dots: true,
  autoplay: true,
  responsiveClass: true,
  items: 1,
});
$('.slider').owlCarousel({
  loop: true,
  margin: 50,
  nav: false,
  dots: true,
  autoplay: true,
  responsiveClass: true,
  items: 3,
  responsive: {
    0: {
      items: 1,
    },
    768: {
      items: 2,
    },
    1024: {
      items: 3,
    }
  }
});
//////////////////////////////////////////////////////////////////

// ------------------------- @datepick ----------------------- //
$('.booking-zone .book-top .input-zone .inputBox .dateSelect').flatpickr({
  enableTime: false,
  dateFormat: "d-m-Y",
  disableMobile: "true",
  minDate: new Date().fp_incr(1)//"today",
});

// เมื่อกดเลือกวันที่แล้วlog
$('.booking-zone .book-top .input-zone .inputBox .dateSelect').change(function () {
  console.log($('.booking-zone .book-top .input-zone .inputBox .dateSelect').val());
});
/////////////////////////////////////////////////////////////////////////////////////////

// ------------------------- @menuMobile ----------------------- //
$('.head-nav .right .hamburger').on('click', function () {
  $('.head-nav .right .menu').slideDown();
});
$('.head-nav .right .menu .closemenu').on('click', function () {
  $(this).closest('.menu').slideUp();
});

$('.book-top .selectType .button-mobile span').on('click', function () {
  if ($(this).hasClass('table')) {
    $('.book-top .selectType .button-mobile span').removeClass('active');
    $(this).addClass('active');
    $('.selectType .button-mobile .activeB').css('transform', 'translateX(50%)');
    alert(1)
  }
  else if ($(this).hasClass('arch')) {
    $('.book-top .selectType .button-mobile span').removeClass('active');
    $(this).addClass('active');
    $('.selectType .button-mobile .activeB').css('transform', 'translateX(-50%)');
    alert(2)
  }
});
//////////////////////////////////////////////////////////////////////////////////////////////

// ---------------------------- เปิดช่องกรอกข้อมูลเมื่อทำตามเงื่อนไขแล้ว -------------------------- //
$('.inputBox .input .dateSelect').change(function () {
  $('#time').prop('disabled', false);
});

$('#time').change(function () {
  $('#arch').attr('multiple', 'multiple');
  $('#arch').prop('disabled', false);
  $('#arch option').prop('disabled', false);
  $('#arch').multiSelect({
    'noneText': 'กรุณาเลือกซุ้ม',
  });
  $('#numPeople').prop('disabled', false);
  $('.display-box figure .pre-select').hide();
});

// คลายล็อกจำนวนคนใช้บริการ เมื่อมีการเพิ่มโต๊ะ
$('#arch').change(function () {
  $('#numPeople').prop('max', false);
});
$('#archT').change(function () {
  $('#numPeopleT').prop('max', false);
});

$('#numPeople').on("input", function () {
  $('.inputBox .input input').prop('disabled', false);
  $('.inputBox .input select').prop('disabled', false);

  let countpeople = $(this).val();
  let archSize = $('#arch').val();
  let counter = new countPeople(this, countpeople, archSize);
  counter.doCount();
});

$('.formBook .Table .input .dateSelect').change(function () {
  $('#timeT').prop('disabled', false);
});

$('#timeT').change(function () {
  $('#archT').attr('multiple', 'multiple');
  $('#archT').prop('disabled', false);
  $('#archT option').prop('disabled', false);
  $('#archT').multiSelect({
    'noneText': 'กรุณาเลือกซุ้มหรือโต๊ะ',
  });
  $('#numPeopleT').prop('disabled', false);
  $('.display-box figure .pre-select').hide();
});

$('#numPeopleT').on("input", function () {
  $('.inputBox .input input').prop('disabled', false);
  $('.inputBox .input select').prop('disabled', false);

  let countP = $(this).val();
  let archSize = $('#archT').val();
  let counter = new countPeopleT(this, countP, archSize);
  counter.doCount();
});

/////////////////////////////////////////////////////////////////////////////////////////

// ----------------------------- สไลด์ตอนHoverเลือกซุ้ม ----------------------------- //
$('.slide-hover').owlCarousel({
  loop: true,
  margin: 10,
  nav: false,
  dots: false,
  autoplay: true,
  responsiveClass: true,
  items: 1,
});
///////////////////////////////////////////////////////////////////////////////////

// ------------------------------- ฟังก์ชั่นกดจองโต๊ะ ------------------------------ //
var test = $('#arch').val()
class bookingTable {
  constructor(that) {
    this.ele = that;
    // console.log(that)
  }

  doBook() {
    if ($(this.ele).hasClass('arch')) {
      $(this.ele).toggleClass('selectedA');
      $(this.ele).find('.num-table').toggle();
      // ส่วนการกดDisplayซุ้ม แล้วแสดงที่Select
      let t = $(this.ele).attr('data-archid');
      // console.log(t)
      // $(`#_${t - 1}`).click();
      $(`.multi-select-menuitem input[value=${t}]`).click()
    }
    else if ($(this.ele).hasClass('table')) {
      $(this.ele).toggleClass('selectedT');
      $(this.ele).find('.num-table').toggle();
      // ส่วนการกดDisplayโต๊ะ แล้วแสดงที่Select
      let t = $(this.ele).attr('data-tableid');
      // console.log(t)
      // $(`#_${t - 1}`).click();
      $(`.multi-select-menuitem input[value=${t}]`).click()
    }

  }
}

// ของพี่นิว
// $('.book-display .display-box figure .item').on('click', function () {
//   if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
//     if (screen.width >= 1366) {
//       if (!$(this).hasClass('disableA') && !$(this).hasClass('disableT') && !$(this).hasClass('confirmA') && !$(this).hasClass('confirmT')) {
//         let Book = new bookingTable(this);
//         Book.doBook();
//       }
//     }
//   }
// });

// ของก๊อต เขียนมาใหม่
function handleClickDoBook(e){
  e.preventDefault();
  let _this = e.target.closest('.item')
  if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    if (screen.width >= 1366) {
      if (
          !_this.classList.contains('disableA') && 
          !_this.classList.contains('disableT') && 
          !_this.classList.contains('confirmA') && 
          !_this.classList.contains('confirmT')
        ) {
        let Book = new bookingTable(_this);
        Book.doBook();
      }
    }
  }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////

// ------------------------------- กดเลือกประเภทโต๊ะในการจอง เพื่อเปลี่ยนinput ------------------------------ //
class swicthTable {
  constructor(compass) {
    this.ele1 = $('.selectType .box-button .bgEffect');
    this.ele2 = $('.selectType .button-mobile .activeB');
    this.com = compass;
  }

  slideEffect(mode) {
    if (mode === 'PC') {
      if (this.com === 'L') {
        $('.book-top .formBook .Table').hide();
        $('.book-top .formBook .Arch').css('display', 'grid');
        $('.display-box figure .table').addClass('disableT')
        $('.display-box figure .arch').removeClass('disableA')
        $('.book-top .head-text h2').text("การจองแบบ ซุ้ม");

        $('.book-top .formBook .Arch').attr('data-action','active')
        $('.book-top .formBook .Table').attr('data-action', '');


        if (screen.width >= 1366 && screen.width < 1600) {
          $(this.ele1).css('transform', 'translateX(-103%)');
        }
        else {
          $(this.ele1).css('transform', 'translateX(-100%)');
        }
      }
      else if (this.com === 'R') {
        $('.book-top .formBook .Arch').hide();
        $('.book-top .formBook .Table').css('display', 'grid');
        $('.display-box figure .arch').addClass('disableA')
        $('.display-box figure .table').removeClass('disableT')
        $('.book-top .head-text h2').text("การจองแบบ โต๊ะ");

        $('.book-top .formBook .Arch').attr('data-action','')
        $('.book-top .formBook .Table').attr('data-action', 'active');

        if (screen.width >= 1366 && screen.width < 1600) {
          $(this.ele1).css('transform', 'translateX(19%)');
        }
        else {
          $(this.ele1).css('transform', 'translateX(0%)');
        }
      }
    }
    else if (mode === 'mobile') {
      if (this.com === 'L') {
        $(this.ele2).css('transform', 'translateX(-53%)');
        $('.book-top .formBook .Table').hide();
        $('.book-top .formBook .Arch').css('display', 'grid');
        $('.display-box figure .table').addClass('disableT');
        $('.display-box figure .arch').removeClass('disableA');
        $('.book-top .head-text h2').text("การจองแบบ ซุ้ม");

        $('.book-top .formBook .Arch').attr('data-action','active')
        $('.book-top .formBook .Table').attr('data-action', '');
      }
      else if (this.com === 'R') {
        $(this.ele2).css('transform', 'translateX(41%)');
        $('.book-top .formBook .Arch').hide();
        $('.book-top .formBook .Table').css('display', 'grid');
        $('.display-box figure .arch').addClass('disableA');
        $('.display-box figure .table').removeClass('disableT');
        $('.book-top .head-text h2').text("การจองแบบ โต๊ะ");

        $('.book-top .formBook .Arch').attr('data-action','')
        $('.book-top .formBook .Table').attr('data-action', 'active');
      }
    }
  }
}
$('.selectType .box-button .button').on('click', function () {
  if ($(this).hasClass('buttonArch')) {
    let sw = new swicthTable("L");
    sw.slideEffect("PC");
  }
  else {
    let sw = new swicthTable("R");
    sw.slideEffect("PC");
  }
});

// แบบมือถือ
$('.button-mobile div').on('click', function () {
  if ($(this).hasClass('arch')) {
    let sw = new swicthTable("L")
    sw.slideEffect("mobile");
  }
  else {
    let sw = new swicthTable("R")
    sw.slideEffect("mobile");
  }
});
//////////////////////////////////////////////////////////////////////////////////////////////////////////

// -------------------------- ฟังก์ชั่นตรวจนับจำนวนคนต่อซุ้ม -------------------------- //
class countPeople {
  constructor(that, people, archSize) {
    this.ele = that;
    this.max = 15;
    this.people = people;
    this.aSize = archSize;
  }

  doCount() {
    for (let i = 1; i <= 10; i++) {
      if (this.people >= this.max * i && this.aSize.length <= i) {
        $(this.ele).attr('max', this.max * i);
        Swal.fire(
          'จำนวนคนถึงขีดจำกัด!',
          'ซุ้มจำกัด 15 คนต่อซุ้ม กรุณาเลือกซุ้มเพิ่ม',
          'warning'
        )
      }
    }
  }
}
/////////////////////////////////////////////////////////////////////////////////////

// ---------------------------- ฟังก์ชั่นนับจำนวนคนต่อโต๊ะ ------------------------------ //
class countPeopleT extends countPeople {
  constructor(that, people, archSize) {
    super(that, people, archSize);
    this.max = 5;
  }

  doCount() {
    for (let i = 1; i <= 10; i++) {
      if (this.people >= this.max * i && this.aSize.length <= i) {
        $(this.ele).attr('max', this.max * i);
        Swal.fire(
          'จำนวนคนถึงขีดจำกัด!',
          'โต๊ะจำกัด 5 คนต่อโต๊ะ กรุณาเลือกโต๊ะเพิ่ม',
          'warning'
        )
      }
    }
  }
}

///////////////////////////////////////////////////////////////////////////////////////

// --------------------------------- ฟังก์ชั่นกดจองโต๊ะแล้วแสดงทั้ง select และ display ----------------------------------- //
// ด้าน select ซุ้ม
$('#arch').change(function () {
  let archNo = $(this).val();
  console.log(archNo)
  $('.book-display .display-box figure .item').removeClass('selectedA');
  $('.book-display .display-box figure .item .num-table').show();

  archNo.forEach(element => {
    let Ele = $(`.book-display .display-box figure .item[data-archid=${element}]`);
    Ele.addClass('selectedA');
    Ele.find('.num-table').hide()
  });

});

//ด้าน select โต๊ะ
$('#archT').change(function () {
  let tableNo = $(this).val();
  $('.book-display .display-box figure .item').removeClass('selectedT');
  $('.book-display .display-box figure .item .num-table').show();

  tableNo.forEach(element => {
    let EleT = $(`.book-display .display-box figure .item[data-tableid=${element}]`);
    EleT.addClass('selectedT');
    EleT.find('.num-table').hide()
  });
});

// ------------------------------------ disable ซุ้มและโต๊ะในครั้งแรก -------------------------------------- //
$('.display-box figure .table').addClass('disableT')

// ------------------------- เมื่อรอconfirm ให้แสดงคลาส confirm และฟังก์ชั่นนี้ ----------------------- //
// กรณีรอคอนเฟิร์มจากหลังบ้าน class .item ซุ้มจะมีคลาส confirmA และโต๊ะ จะมีคลาส confirmT
if ($('.display-box figure .item').hasClass('confirmA') || $('.display-box figure .item').hasClass('confirmT')) {
  $('.display-box figure .item.confirmA').find('.num-table').hide();
  $('.display-box figure .item.confirmT').find('.num-table').hide();
}

// --------------------------------- ฟังก์ชั่นในหน้าติดต่อเรา ---------------------------------- //
// เคลียร์ข้อความ
$('.contact-me .form-Contact .button-box #clear').on('click',function(){
  $(this).closest('.form-Contact').find('.input-box input').val("");
  $(this).closest('.form-Contact').find('.input-box textarea').val("");
});

// --------------------------------- ฟังก์ชั่นหน้าแกลอรี่ ---------------------------------- //
$('.gallary .gallary-zone figure img').on('click',function(){
  let img = $(this).attr('src');
  let showgal = new showGallary(img,this);
  showgal.showPic();
});
//ปุ่มปิด
$('.showpic .bigpic .close').on('click',function(){
  $('body').css('position','unset');
  $(this).closest('.showpic').hide();
});

class showGallary{
  constructor(img,that){
    this.img = img;
    this.that = that;
  }

  showPic(){
    $('body').css('position','fixed');
    let ele = $(this.that).closest('.gallary-zone').next();
    ele.show();
    let linkImg = $(ele).find('img');
    linkImg.attr('src',this.img);
  }
}

//--------------------------------- ฟังก์ชั่นหน้าจอคอนเฟิร์มหลังจากการกดจอง ------------------------------ //
$('.dialog-confirm .dialog .close-button').on('click',function(){
  $(this).closest('.dialog-confirm').hide();
});