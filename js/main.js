/**
 * เมื่อกด hamburger จะโชว์ navbar
 * Mobile Only
 */
function handleOpenNavbarMobile(e){
  e.preventDefault();
  e.target.closest('.header-web').insertAdjacentHTML('beforeend',`
    <div class="navbar-shadow" onclick="handleCloseNavbarMobile(event)"></div>
  `)
  e.target.closest('.header-web').querySelector('.navbar').classList.add('active')
}

/**
 * เมื่อกดปิด Navbar จะทำการซ่อน Navbar
 * Mobile Only
 */
function handleCloseNavbarMobile(e){
  e.target.closest('.header-web').querySelector('.navbar').classList.remove('active')
  let shadow = e.target.closest('.header-web').querySelector('.navbar-shadow')
  shadow.parentNode.removeChild(shadow)
}

/**
 * เมื่อกด จะโชว์ฟอร์ม login
 * ยังไม่ได้ login
 * Mobile Only
 */
function handleOpenFormLogin(e) {
  e.preventDefault();
  $('#form-login').addClass('active')
  document.querySelector('#form-login').insertAdjacentHTML('afterend',`
    <div class="fl-shadow" onclick="handleCloseFormLogin(event)"></div>
  `)
}

/**
 * เมื่อกดจะปิด form login
 * ยังไม่ได้ login
 * Mobile Only
 */
function handleCloseFormLogin(e){
  e.preventDefault();
  $('#form-login').removeClass('active')
  $('.fl-shadow').remove();
}

/**
 * 
 * @param {*} e 
 */
function closeAds(e){
  e.preventDefault();
  let self = e.target.closest('.ads')
  console.log(self.parentNode.removeChild(self))
}

/**
 * ปิดโฆษณา C1 C2 C3 C4 
 */
function closeAds(e){
  e.preventDefault();
  if(window.innerWidth < 768){
    let ads = e.target.closest('.ads_c-all');
    ads.parentNode.removeChild(ads)
  }else{
    let ads = e.target.closest('.ads-float');
    ads.parentNode.removeChild(ads)
  }
}

$(() => {
  $('.slide-banner-img').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    items:1,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:false,
    singleItem: true,
    smartSpeed: 1000,
  });
  $('#article-popular').owlCarousel({
    loop:false,
    margin:10,
    nav:false,
    items:2,
    stagePadding: 5,
    responsive: {
      0:{
        items: 2,
        dots:true,
        nav:false
      },
      767:{
        items: 3,
        dots:true,
      }
    }
  });
  $('#article-popular-home').owlCarousel({
    loop:false,
    margin:10,
    nav:false,
    items:1,
    stagePadding: 5,
    responsive: {
      0:{
        items: 1,
        dots:true,
        nav:false
      },
      640:{
        items: 2,
        dots:true,
      }
    }
  });
})

