// ------------------------- @slide ------------------------- //
$('.slideHead').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots:true,
    responsiveClass:true,
    items:1,
});
//////////////////////////////////////////////////////////////////

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
/////////////////////////////////////////////////////////////////////////////////////////

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
//////////////////////////////////////////////////////////////////////////////////////////////

// ---------------------------- เปิดช่องกรอกข้อมูลเมื่อทำตามเงื่อนไขแล้ว -------------------------- //
$('.inputBox .input .dateSelect').change(function(){
    $('#time').prop('disabled',false);
});

$('#time').change(function(){
    $('#arch').attr('multiple','multiple');
    $('#arch').prop('disabled',false);
    $('#arch option').prop('disabled',false);
    $('#arch').multiSelect({
        'noneText':'กรุณาเลือกซุ้ม',
    });
    $('#numPeople').prop('disabled',false);
});

$('#arch').change(function(){
    $('#numPeople').prop('max',false);
});
$('#archT').change(function(){
    $('#numPeopleT').prop('max',false);
});

$('#numPeople').on("input",function(){
    $('.inputBox .input input').prop('disabled',false);
    $('.inputBox .input select').prop('disabled',false);

    let countpeople = $(this).val();
    let archSize = $('#arch').val();
    let counter = new countPeople(this,countpeople,archSize);
    counter.doCount();
});

$('.formBook .Table .input .dateSelect').change(function(){
    $('#archT').attr('multiple','multiple');
    $('#archT').prop('disabled',false);
    $('#archT option').prop('disabled',false);
    $('#archT').multiSelect({
        'noneText':'กรุณาเลือกซุ้ม',
    });
    $('#numPeopleT').prop('disabled',false);
});

$('#numPeopleT').on("input",function(){
    $('.inputBox .input input').prop('disabled',false);
    $('.inputBox .input select').prop('disabled',false);

    let countP = $(this).val();
    let archSize = $('#archT').val();
    let counter = new countPeopleT(this,countP,archSize);
    counter.doCount();
});

/////////////////////////////////////////////////////////////////////////////////////////

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
///////////////////////////////////////////////////////////////////////////////////

// ------------------------------- ฟังก์ชั่นกดจองโต๊ะ ------------------------------ //
var test = $('#arch').val()
class bookingTable{
    constructor(that){
        this.ele = that;
    }

    doBook(){
        if($(this.ele).hasClass('arch')){
            $(this.ele).toggleClass('selectedA');
            $(this.ele).find('.num-table').toggle();
            // ส่วนการกดDisplay แล้วแสดงที่Select
            let t =  $(this.ele).attr('data-archid');
            $(`#_${t-1}`).click();

        }
        else if($(this.ele).hasClass('table')){
            $(this.ele).toggleClass('selectedT');
            $(this.ele).find('.num-table').toggle(); 
        }
        
    }
}

$('.book-display .display-box figure .item').on('click',function(){
    if( !/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        if(screen.width >= 1366){
            if(!$(this).hasClass('disableA') && !$(this).hasClass('disableT')){
                let Book = new bookingTable(this);
                Book.doBook();
            }
        } 
    }
});
//////////////////////////////////////////////////////////////////////////////////////////////////////////

// ------------------------------- กดเลือกประเภทโต๊ะในการจอง เพื่อเปลี่ยนinput ------------------------------ //
class swicthTable{
    constructor(compass){
        this.ele1 = $('.selectType .box-button .bgEffect');
        this.ele2 = $('.selectType .button-mobile .activeB');
        this.com = compass;
    }

    slideEffect(mode){
        if(mode === 'PC'){
            if(this.com === 'L'){
                $(this.ele1).css('transform','translateX(-100%)');
                $('.book-top .formBook .Table').hide();
                $('.book-top .formBook .Arch').css('display','grid');
                $('.display-box figure .table').addClass('disableT')
                $('.display-box figure .arch').removeClass('disableA')
            }
            else if(this.com === 'R'){
                $(this.ele1).css('transform','translateX(0%)');
                $('.book-top .formBook .Arch').hide();
                $('.book-top .formBook .Table').css('display','grid');
                $('.display-box figure .arch').addClass('disableA')
                $('.display-box figure .table').removeClass('disableT')
            }
        }
        else if(mode === 'mobile'){
            if(this.com === 'L'){
                $(this.ele2).css('transform','translateX(-80%)');
                $('.book-top .formBook .Table').hide();
                $('.book-top .formBook .Arch').css('display','grid');
                $('.display-box figure .table').addClass('disableT')
                $('.display-box figure .arch').removeClass('disableA')
            }
            else if(this.com === 'R'){
                $(this.ele2).css('transform','translateX(68%)');
                $('.book-top .formBook .Arch').hide();
                $('.book-top .formBook .Table').css('display','grid');
                $('.display-box figure .arch').addClass('disableA')
                $('.display-box figure .table').removeClass('disableT') 
            }
        }
    }
}
$('.selectType .box-button .button').on('click',function(){
    if($(this).hasClass('buttonArch')){
        let sw = new swicthTable("L");
        sw.slideEffect("PC");
    }
    else{
        let sw = new swicthTable("R");
        sw.slideEffect("PC");
    }
});

// แบบมือถือ
$('.button-mobile div').on('click',function(){
    if($(this).hasClass('arch')){
        let sw = new swicthTable("L")
        sw.slideEffect("mobile");
    }
    else{
        let sw = new swicthTable("R")
        sw.slideEffect("mobile");
    }
});
//////////////////////////////////////////////////////////////////////////////////////////////////////////

// -------------------------- ฟังก์ชั่นตรวจนับจำนวนคนต่อซุ้ม -------------------------- //
class countPeople{
    constructor(that,people,archSize){
        this.ele = that;
        this.max = 15;
        this.people = people;
        this.aSize = archSize;
    }

    doCount(){
        for(i=1;i<=10;i++){
            if(this.people >= this.max*i && this.aSize.length <= i){
                $(this.ele).attr('max',this.max*i);
                alert("คนเยอะเกิน");
            }
        }
    }
}
/////////////////////////////////////////////////////////////////////////////////////

// ---------------------------- ฟังก์ชั่นนับจำนวนคนต่อโต๊ะ ------------------------------ //
class countPeopleT extends countPeople{
    constructor(that,people,archSize){
        super(that,people,archSize);
        this.max = 5; 
    }
}

///////////////////////////////////////////////////////////////////////////////////////

// --------------------------------- ฟังก์ชั่นกดจองโต๊ะแล้วแสดงทั้ง select และ display ----------------------------------- //
// ด้าน select
$('#arch').change(function(){
    let archNo = $(this).val();
    //console.log(this);

    if($('.multi-select-container .multi-select-menu .multi-select-menuitems label input').is(":checked")){
        console.log("Add");
    }
    else{
        console.log("Remove")
    }

    $('.book-display .display-box figure .item').removeClass('selectedA');
    $('.book-display .display-box figure .item .num-table').show();
    
    archNo.forEach(element => {
        //console.log(element);
        Ele = $(`.book-display .display-box figure .item[data-archid=${element}]`);
        Ele.addClass('selectedA');
        Ele.find('.num-table').hide()
    });
})

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// ------------------------------------ disable ซุ้มและโต๊ะในครั้งแรก -------------------------------------- //
$('.display-box figure .table').addClass('disableT')