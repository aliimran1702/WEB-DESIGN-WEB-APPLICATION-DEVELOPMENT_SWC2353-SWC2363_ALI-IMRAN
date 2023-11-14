

document.addEventListener("DOMContentLoaded", function () {
    const slideContainer = document.querySelector(".carousel-slide");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    let slideIndex = 0;

    function moveToSlide(index) {
        if (index < 0) {
            index = slideContainer.children.length - 1;
        } else if (index >= slideContainer.children.length) {
            index = 0;
        }

        slideContainer.style.transform = `translateX(-${index * 100}%)`;
        slideIndex = index;
    }

    prevBtn.addEventListener("click", () => {
        moveToSlide(slideIndex - 1);
    });

    nextBtn.addEventListener("click", () => {
        moveToSlide(slideIndex + 1);
    });

    moveToSlide(slideIndex);
});
