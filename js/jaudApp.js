// ------------------------- @slide ------------------------- //
$('.slideHead').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots:true,
    responsiveClass:true,
    items:1,
});

// ------------------------- @datepick ----------------------- //
$('.booking-zone .book-top .input-zone .inputBox .dateSelect').flatpickr({
    enableTime: false,
    dateFormat: "d-m-Y",
    disableMobile: "true"
});

// เมื่อกดเลือกวันที่แล้วlog
$('.booking-zone .book-top .input-zone .inputBox .dateSelect').change(function(){
    console.log($('.booking-zone .book-top .input-zone .inputBox .dateSelect').val());
});

// ------------------------- @menuMobile ----------------------- //
$('.head-nav .right .hamburger').on('click',function(){
    $('.head-nav .right .menu').slideDown();
});
$('.head-nav .right .menu .closemenu').on('click',function(){
    $(this).closest('.menu').slideUp();
});

$('.book-top .selectType .button-mobile span').on('click',function(){
    if($(this).hasClass('table')){
        $('.book-top .selectType .button-mobile span').removeClass('active');
        $(this).addClass('active');
        $('.selectType .button-mobile .activeB').css('transform','translateX(50%)');
    }
    else if($(this).hasClass('arch')){
        $('.book-top .selectType .button-mobile span').removeClass('active');
        $(this).addClass('active');
        $('.selectType .button-mobile .activeB').css('transform','translateX(-50%)');
    }
});


// ---------------------------- ตัวเลือกซุ้มหลายcheckbox -------------------------- //
$('#arch').multiSelect({
    'noneText':'กรุณาเลือกซุ้ม',
});

// ----------------------------- สไลด์ตอนHoverเลือกซุ้ม ----------------------------- //
$('.slide-hover').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots:false,
    autoplay:true,
    responsiveClass:true,
    items:1,
});

// ------------------------------- ฟังก์ชั่นกดจองโต๊ะ ------------------------------ //
class bookingTable{
    constructor(that){
        this.ele = that;
    }

    doBook(){
        if($(this.ele).hasClass('arch')){
            $(this.ele).toggleClass('selectedA');
            $(this.ele).find('.num-table').toggle();
        }
        else if($(this.ele).hasClass('table')){
            $(this.ele).toggleClass('selectedT');
            $(this.ele).find('.num-table').toggle(); 
        }
        
    }
}

$('.book-display .display-box figure .item').on('click',function(){
    if(screen.width > 1366){
        let Book = new bookingTable(this);
        Book.doBook();
    }
});