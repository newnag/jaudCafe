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