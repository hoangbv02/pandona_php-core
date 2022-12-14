var setSlidesPerView = 0;
var setSpaceBetween = 0;
if (window.innerWidth > 1024) {
    setSlidesPerView = 4;
    setSpaceBetween = 30;
} else if (window.innerWidth > 768) {
    setSlidesPerView = 2;
    setSpaceBetween = 30;
} else {
    setSlidesPerView = 1;
    setSpaceBetween = 0;
}
var swiper = new Swiper(".mySwiper", {
    slidesPerView: setSlidesPerView,
    spaceBetween: setSpaceBetween,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
var swiperProdAuto = new Swiper(".mySwiperProdAuto", {
    slidesPerView: setSlidesPerView,
    spaceBetween: setSpaceBetween,
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});
window.onscroll = function () {
    if (this.pageYOffset > 400) {
        document.querySelector(".btn-top").style.bottom = "50px";
    } else {
        document.querySelector(".btn-top").style.bottom = "-100%";
    }
};

function search(e) {
    $("#search__box").load("view/xu_ly_tim_kiem.php?q=" + e);
}

function setValue(e) {
    const input = document.querySelector('input[name="tim_kiem"]');
    input.value = e.innerText;
}
