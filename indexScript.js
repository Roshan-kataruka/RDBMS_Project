
AOS.init({
    duration: 1200,
    })
let a = document.getElementById('nav-link');
function showMenu()
{
    a.style.right = "0"
    a.style.display="block"
}
function hideMenu()
{
    a.style.right = "-250px"
    a.style.display="inline-block"
}

 

// <!-- Initialize Swiper -->
var swiper = new Swiper(".mySwiper", {
  loop:true,
  keyboard: {
    enabled: true,
  },
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    type: "progressbar",
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
