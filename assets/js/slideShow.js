var slideItems = document.querySelectorAll(".slide__item");
var btnPrev = document.querySelector(".btn__prev");
var btnNext = document.querySelector(".btn__next");

var slideItemWidth = slideItems[0].offsetWidth;
let positionX = 0;
let index = 0;

//slider
// function removeActive(arr) {
//     arr.forEach((item) => item.classList.remove("active"));
// }
// [...dotItems].forEach((dotItem) => {
//     dotItem.onclick = (e) => {
//         const dotIndex = e.target.dataset.item;
//         positionX = productItemWidth * dotIndex;
//         for (let i = 0; i <= productItems.length - 1; i++) {
//             productItems[i].style.transform = `translateX(-${positionX}px)`;
//         }
//         removeActive([...dotItems]);
//         e.target.classList.add("active");
//     };
// });

function changeSlide(direction, elements, itemWidth) {
    if (direction === "next") {
        index++;
        if (index >= elements.length) {
            index = 0;
        }
    } else if (direction === "prev") {
        index--;
        if (index < 0) {
            index = elements.length - 1;
        }
    }
    positionX = itemWidth * index;
    for (let i = 0; i <= elements.length - 1; i++) {
        elements[i].style.transform = `translateX(-${positionX}px)`;
    }
}
btnNext.addEventListener("click", () => {
    changeSlide("next", slideItems, slideItemWidth);
});
btnPrev.addEventListener("click", () => {
    changeSlide("prev", slideItems, slideItemWidth);
});
function autoSlideShow() {
    setInterval(() => {
        index++;
        if (index >= slideItems.length) {
            index = 0;
        }
        positionX = slideItemWidth * index;
        for (let i = 0; i <= slideItems.length - 1; i++) {
            slideItems[i].style.transform = `translateX(-${positionX}px)`;
        }
    }, 7000);
}
// autoSlideShow();
