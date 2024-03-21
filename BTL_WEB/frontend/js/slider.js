//------------------------------SLIDER
const imgItem = document.querySelectorAll(".aspect-ratio-169 img")
const imgItemContainer = document.querySelector(".aspect-ratio-169")
const dotItem = document.querySelectorAll(".dot")
let index = 0;
let imgLeng = imgItem.length
imgItem.forEach(function (image, index) {
    image.style.left = index * 100 + "%"
    dotItem[index].addEventListener("click", function () {
        slideRun(index)
    })
})
function slider() {
    index++;
    if (index >= imgLeng) {
        index = 0;

    }
    slideRun(index)
}
function slideRun(index) {
    imgItemContainer.style.left = "-" + index * 100 + "%"
    let dotActive = document.querySelector(".active")
    dotActive.classList.remove("active")
    dotItem[index].classList.add("active");
}

setInterval(slider, 5000)