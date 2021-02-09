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
let actualSlide, nextSlide, actualSlideNumber = 0, previousSlideNumber = 0;

const nextSlider = (n) => {
    /* Turn off all dots */
    dots.forEach((item) => {
        item.style.background = "#F3F3F3";
    });
    /* Turn on current dot */
    dots[n].style.background = "#B4C618";

    previousSlideNumber = actualSlideNumber;
    actualSlideNumber = n;
    if(previousSlideNumber !== actualSlideNumber) breakFlag = true;
}

const startSlider = (n = 0) => {
    /* Variables */
    let i = 0, j = 100;

    /* Set progressBar load */
    let progressLoad = setInterval(() => {
        progressBar.style.width = i + "%";
        i++;
        if((i === 101)||(breakFlag)) {
            if(breakFlag) {
                /* User click slide dot */
                breakFlag = false;
            }
            else {
                /* Next slide */
                previousSlideNumber = actualSlideNumber;
                if(actualSlideNumber < 3) actualSlideNumber++;
                else actualSlideNumber = 0;

                /* Turn off all dots */
                dots.forEach((item) => {
                    item.style.background = "#F3F3F3";
                });
                /* Turn on current dot */
                dots[actualSlideNumber].style.background = "#B4C618";
            }
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
                /* Change slide */
                actualSlide = slides[previousSlideNumber];
                if(actualSlideNumber > 3) nextSlide = slides[0];
                else nextSlide = slides[actualSlideNumber];

                gsap.fromTo(actualSlide, { opacity: 1}, { opacity: 0, duration: 1 })
                gsap.fromTo(nextSlide, { opacity: 0 }, { opacity: 1, duration: 1 });

                /* Invoke function again - next slide */
                if(actualSlideNumber >= 3) startSlider(0);
                else startSlider(actualSlideNumber+1);
            }, 200);
        }
    }, 50);
}

if(progressBar !== null) startSlider(0); // Start slider when page load

/* Marki w naszej ofercie */
const markiLeft = document.querySelector(".markiLeft");
const markiRight = document.querySelector(".markiRight");
const markiTrack = document.querySelector(".markiTrack");

const moveMarkiLeft = () => {
    let sliderWidth;
    if(window.innerWidth > 1400) sliderWidth = Math.round(markiTrack.clientWidth / 3);
    else if(window.innerWidth > 1000) sliderWidth = Math.round(markiTrack.clientWidth / 2);
    else sliderWidth = Math.round(markiTrack.clientWidth);
    markiTrack.scrollBy({
       left: -sliderWidth,
       behavior: "smooth"
    });
}

const moveMarkiRight = () => {
    let sliderWidth;
    if(window.innerWidth > 1400) sliderWidth = Math.round(markiTrack.clientWidth / 3);
    else if(window.innerWidth > 1000) sliderWidth = Math.round(markiTrack.clientWidth / 2);
    else sliderWidth = Math.round(markiTrack.clientWidth);
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

/* RWD adjustments with JS */
const landingSlide = document.querySelector(".slide");
const dotsContainer = document.querySelector(".dots");
const frontPageMain = document.querySelector(".landingPage");

if((window.innerWidth <= 1500)&&(progressBar !== null)) {
    dotsContainer.style.top = (landingSlide.clientHeight - 80) + "px";
    frontPageMain.style.height = landingSlide.clientHeight + "px";
}

if(progressBar !== null) {
    window.addEventListener("resize", () => {
        if(window.innerWidth <= 1500) {
            dotsContainer.style.top = (landingSlide.clientHeight - 80) + "px";
            frontPageMain.style.height = landingSlide.clientHeight + "px";
        }
    });
}

/* Siema carousel for Marki on the top of Maszyny Nowe page */
let topCarousel;
const checkCarousel = () => {
    if(window.innerWidth < 500) {
        topCarousel = new Siema({
            selector: ".maszynyNoweList",
            duration: 200,
            easing: 'ease-out',
            perPage: 2,
            startIndex: 0,
            draggable: true,
            multipleDrag: true,
            threshold: 20,
            loop: true,
            rtl: false,
            onInit: () => {},
            onChange: () => {},
        });

        setInterval(() => {
            topCarousel.next();
        }, 2000);
    }
    else if(window.innerWidth < 900) {
        topCarousel = new Siema({
            selector: ".maszynyNoweList",
            duration: 200,
            easing: 'ease-out',
            perPage: 3,
            startIndex: 0,
            draggable: true,
            multipleDrag: true,
            threshold: 20,
            loop: true,
            rtl: false,
            onInit: () => {},
            onChange: () => {},
        });

        setInterval(() => {
            topCarousel.next();
        }, 2000);
    }
};

if(document.querySelector(".maszynyNoweList") !== null) {
    checkCarousel();
    window.addEventListener("resize", () => {
        checkCarousel();
    });
}

/* Uslugi buttons */
const ubezpieczenieBtn = document.querySelector("#ubezpieczenieBtn");
const finansowanieBtn = document.querySelector("#finansowanieBtn");

const ubezpieczenieInfo = document.querySelector("#ubezpieczenieInfo");
const finansowanieInfo = document.querySelector("#finansowanieInfo");

const ubezpieczenieWrapper = document.querySelector(".uslugiInfoWrapper1");
const finansowanieWrapper = document.querySelector(".uslugiInfoWrapper2");

const ubezpieczenieArrow = document.querySelector("#ubezpieczenieArrow");
const finansowanieArrow = document.querySelector("#finansowanieArrow");

let ubezpieczenie = false, finansowanie = false;

const ubezpieczenieClick = () => {
    if(!ubezpieczenie) {
        /* Open */
        ubezpieczenie = true;
        gsap.set(ubezpieczenieArrow, { transform: 'rotate(0)' });
        gsap.to(ubezpieczenieWrapper, { height: 200, duration: .4 })
            .then(() => {
                gsap.to(ubezpieczenieInfo, { opacity: 1, duration: .2 });
            });
    }
    else {
        /* Close */
        ubezpieczenie = false;
        gsap.set(ubezpieczenieArrow, { transform: 'rotate(180deg)' });
        gsap.to(ubezpieczenieInfo, { opacity: 0, duration: .2 })
            .then(() => {
                gsap.to(ubezpieczenieWrapper, { height: 0, duration: .4 });
            });
    }
}
const finansowanieClick = () => {
    if(!finansowanie) {
        /* Open */
        finansowanie = true;
        gsap.set(finansowanieArrow, { transform: 'rotate(0)' });
        gsap.to(finansowanieWrapper, { height: 200, duration: .4 })
            .then(() => {
                gsap.to(finansowanieInfo, { opacity: 1, duration: .2 });
            });
    }
    else {
        /* Close */
        finansowanie = false;
        gsap.set(finansowanieArrow, { transform: 'rotate(180deg)' });
        gsap.to(finansowanieInfo, { opacity: 0, duration: .2 })
            .then(() => {
                gsap.to(finansowanieWrapper, { height: 0, duration: .4 });
            });
    }
}

