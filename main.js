/* Slider */
const progressBar = document.querySelector(".progressBarProgress");

const dot1 = document.querySelector("#dot1");
const dot2 = document.querySelector("#dot2");
const dot3 = document.querySelector("#dot3");
const dot4 = document.querySelector("#dot4");

const slide1 = document.querySelector("#slide1");
const slide2 = document.querySelector("#slide2");
const slide3 = document.querySelector("#slide3");
const slide4 = document.querySelector("#slide4");

const slides = [slide1, slide2, slide3, slide4];
const dots = [dot1, dot2, dot3, dot4];

let breakFlag = false;

const nextSlide = (n) => {
    /* Turn off all dots */
    dots.forEach((item) => {
        item.style.background = "#F3F3F3";
    });
    /* Turn on current dot */
    dots[n].style.background = "#B4C618";

    breakFlag = true;
}

const startSlider = (n = 0) => {
    /* Variables */
    let i = 0, j = 100;
    let actualSlide, nextSlide;

    /* Set progressBar load */
    let progressLoad = setInterval(() => {
        progressBar.style.width = i + "%";
        i++;
        if((i === 101)||(breakFlag)) {
            if(breakFlag) breakFlag = false;
            clearInterval(progressLoad);
            /* Gentle back */
            let gentleBack = setInterval(() => {
                progressBar.style.width = j + "%";
                j--;
                if(j === -1) {
                    clearInterval(gentleBack);
                }
            }, 2);

            setTimeout(() => {
                /* Invoke function again - next slide */
                if(n === 3) startSlider(0);
                else startSlider(n+1);
            }, 200);
        }
    }, 50);


    /* Change slide */
    actualSlide = slides[n];
    if(n === 3) nextSlide = slides[0];
    else nextSlide = slides[n+1];

    gsap.fromTo(actualSlide, {opacity: 1}, { opacity: 0, duration: 1 })
    gsap.fromTo(nextSlide, { opacity: 0 }, { opacity: 1, duration: 1 });
}

startSlider(0); // Start slider when page load

const resetSlider = () => {

}

/* Marki w naszej ofercie */
const markiLeft = document.querySelector(".markiLeft");
const markiRight = document.querySelector(".markiRight");
const markiTrack = document.querySelector(".markiTrack");

const moveMarkiLeft = () => {
    const sliderWidth = Math.round(markiTrack.clientWidth / 3);
    markiTrack.scrollBy({
       left: -sliderWidth,
       behavior: "smooth"
    });
}

const moveMarkiRight = () => {
    const sliderWidth = Math.round(markiTrack.clientWidth / 3);
    markiTrack.scrollBy({
        left: sliderWidth,
        behavior: "smooth"
    });
}

/* Maszyny nowe - set progress bars on scroll */
if(document.querySelector(".maszynyNoweContainer") !== null) {
    const progressBar1 = document.querySelector("#maszynyNoweProgressBar1");
    const progressBar2 = document.querySelector("#maszynyNoweProgressBar2");

    window.addEventListener("scroll", () => {
        let rect = progressBar1.getBoundingClientRect(), val;
        if(rect.top - window.innerHeight < 0) {
            val = Math.abs((rect.top - window.innerHeight) * 0.12);
            if(val <= 100) progressBar1.style.width = Math.abs((rect.top - window.innerHeight) * 0.12) + "%";
        }

            let rect2 = progressBar2.getBoundingClientRect(), val2;
            if(rect2.top - window.innerHeight < 0) {
                val2 = Math.abs((rect2.top - window.innerHeight) * 0.12);
                if(val2 <= 100) progressBar2.style.width = Math.abs((rect2.top - window.innerHeight) * 0.12) + "%";
            }
    }
    );
}

/* Sticky menu */
const topMenu = document.querySelector(".siteHeaderMenu");
const menuLeft = document.querySelector(".siteMenuLeft");
const menuRight = document.querySelector(".siteMenuRight");
let savedValue = topMenu.getBoundingClientRect().top;
let sticky = false;

window.addEventListener("scroll", () => {
    const topMenuRect = topMenu.getBoundingClientRect();

    if(!sticky) {
        if(topMenuRect.top < 1) {
            console.log("STICKY START");
            gsap.set(topMenu, { position: "fixed", marginTop: 0, left: "50%", transform: "translateX(-50%)" });
            gsap.to(menuLeft, { position: "fixed", transform: "scaleX(1) translateX(-100%)", duration: .5 });
            gsap.to(menuRight, { position: "fixed", transform: "scaleX(1) translateX(100%)", duration: .5 });
            sticky = true;
        }
    }
    else {
        if(window.pageYOffset < savedValue) {
            console.log("sticky end");
            gsap.set(topMenu, { position: "relative", marginTop: "auto" });
            gsap.to(menuLeft, { transform: "scaleX(0) translateX(-100%)", duration: .5 });
            gsap.to(menuRight, {transform: "scaleX(0) translateX(100%)", duration: .5 })
                .then(() => {

                });
            sticky = false;
        }
    }

    /* Sticky in */
    if(topMenuRect.top < 1) {

    }

    /* Sticky out */
    if(window.pageYOffset < 212) {
        let valPx = savedValue + "px";
    }


});
