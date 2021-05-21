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

/* Slider mobile - swipe events */

if(document.querySelector(".landingPage") !== null) {
    document.querySelector(".landingPage").addEventListener('touchstart', handleTouchStart, false);
    document.querySelector(".landingPage").addEventListener('touchmove', handleTouchMove, false);
}

var xDown = null;
var yDown = null;

function getTouches(evt) {
    return evt.touches ||             // browser API
        evt.originalEvent.touches; // jQuery
}

function handleTouchStart(evt) {
    const firstTouch = getTouches(evt)[0];
    xDown = firstTouch.clientX;
    yDown = firstTouch.clientY;
}

function handleTouchMove(evt) {
    if (!xDown || !yDown) {
        return;
    }

    var xUp = evt.touches[0].clientX;
    var yUp = evt.touches[0].clientY;

    var xDiff = xDown - xUp;
    var yDiff = yDown - yUp;

    if (Math.abs(xDiff) > Math.abs(yDiff)) {/*most significant*/
        if (xDiff > 0) {
            /* left swipe */
            nextSlider(5);
        } else {
            /* right swipe */
            nextSlider(6);
        }
        /* reset values */
        xDown = null;
        yDown = null;
    }
}

const nextSlider = (n) => {
        /* Desktop next slider - opacity */

        /* Turn off all dots */
        dots.forEach((item) => {
            item.style.background = "#F3F3F3";
        });

        /* Mobile slider - arrows */
        if((n !== 5)&&(n !== 6)) {
            /* Turn on current dot */
            dots[n].style.background = "#B4C618";

            previousSlideNumber = actualSlideNumber;
            actualSlideNumber = n;
            if(previousSlideNumber !== actualSlideNumber) breakFlag = true;
        }
        else {
            previousSlideNumber = actualSlideNumber;
            if(n === 5) {
                if(actualSlideNumber < 3) actualSlideNumber++;
                else actualSlideNumber = 0;
                dots[actualSlideNumber].style.background = "#B4C618";

                breakFlag = true;
            }
            else {
                if(actualSlideNumber !== 0) actualSlideNumber--;
                else actualSlideNumber = 3;
                dots[actualSlideNumber].style.background = "#B4C618";

                breakFlag = true;
            }
        }
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
                progressBar.style.width = i + "%";
                i--;
                if(i === -1) {
                    clearInterval(gentleBack);
                }
            }, 2);

            /* Change slide */
            actualSlide = slides[previousSlideNumber];
            if(actualSlideNumber > 3) nextSlide = slides[0];
            else nextSlide = slides[actualSlideNumber];

            if(window.innerWidth > 900) {
                gsap.fromTo(actualSlide, { opacity: 1}, { opacity: 0, zIndex: 0, duration: 1 })
                gsap.fromTo(nextSlide, { opacity: 0 }, { opacity: 1, zIndex: 3, duration: 1 });
            }
            else {
                gsap.set(nextSlide, { opacity: 1 });
                console.log(previousSlideNumber + " " + actualSlideNumber);
                if((actualSlideNumber < previousSlideNumber)||((previousSlideNumber === 3)&&(actualSlideNumber === 0))) {
                    gsap.fromTo(actualSlide, { x: 0 }, { x: window.innerWidth, zIndex: 0, duration: 1 })
                    gsap.fromTo(nextSlide, { x: -window.innerWidth }, { x:0, zIndex: 3, duration: 1 });
                }
                else {
                    gsap.fromTo(actualSlide, { x: 0 }, { x: -window.innerWidth, zIndex: 0, duration: 1 })
                    gsap.fromTo(nextSlide, { x: window.innerWidth }, { x:0, zIndex: 3, duration: 1 });
                }
            }

            if(typeof InstallTrigger !== 'undefined') {
                /* Firefox */
                setTimeout(() => {
                    /* Invoke function again - next slide */
                    if(actualSlideNumber >= 3) startSlider(0);
                    else startSlider(actualSlideNumber+1);
                }, (1400 * i) / 100);
            }
            else {
                setTimeout(() => {
                    /* Invoke function again - next slide */
                    if(actualSlideNumber >= 3) startSlider(0);
                    else startSlider(actualSlideNumber+1);
                }, 200);
            }
        }
    }, 50);
}

document.addEventListener("DOMContentLoaded", () => {
    if(progressBar !== null) startSlider(0);
});

/* Hamburger menu */
const mobileMenu = document.querySelector(".mobileMenuList");
const mobileMenuUl = document.querySelector(".mobileMenuList>div>ul");
const closeMobileMenuBtn = document.querySelector(".closeMenuBtn");
const kalchemMobileLogo = document.querySelector("#mobileMenuTopImg");
const container = document.querySelector("body");

const hamburgerMenu = () => {
    gsap.set(container, { height: "100vh", overflowY: "hidden" });
    gsap.to(mobileMenu, { width: window.innerWidth + "px", opacity: 1, duration: .4 })
        .then(() => {
            gsap.set(mobileMenuUl, { display: "block" });
            gsap.to([mobileMenuUl, closeMobileMenuBtn, kalchemMobileLogo], { opacity: 1, duration: .2 });
        });
}

const closeHamburger = () => {
    gsap.set(container, { height: "auto", overflowY: "auto" });
    gsap.to([mobileMenuUl, closeMobileMenuBtn, kalchemMobileLogo], { opacity: 0, duration: .2 })
        .then(() => {
            gsap.set(mobileMenuUl, { display: "none" });
            gsap.to(mobileMenu, { width: 0, duration: .4 });
        });
}


/* Producenci carousel */
const producenciLeftBtn = document.querySelector(".producenciLeft");

let producenciCarousel;
if(producenciLeftBtn !== null) {
    producenciCarousel = new Siema({
        selector: '.producenciSliderInner',
        perPage: 1,
        loop: true
    });
}

const producenciLeft = () => {
    console.log("next");
    producenciCarousel.next();
}

const producenciRight = () => {
    producenciCarousel.prev();
    console.log("prev");
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

/* Check position on load */
const checkPosition = () => {
    if(window.pageYOffset > 150) {
        gsap.to([menuLeft, menuRight], { opacity: 1, duration: .5 });
        gsap.set(menuLeft, { xPercent: -100 });
        gsap.set(menuRight, { xPercent: 100 });
        gsap.set(topMenu, { position: "fixed" });
    }
    else {
        gsap.to([menuLeft, menuRight], { opacity: 0, duration: .5 });
        gsap.set(menuLeft, { xPercent: 0 });
        gsap.set(menuRight, { xPercent: 0 });
        gsap.set(topMenu, { position: "relative" });
    }
}
checkPosition();

window.addEventListener("scroll", () => {
    checkPosition();
});

/* RWD adjustments with JS */
document.addEventListener("DOMContentLoaded", () => {
    const landingSlide = document.querySelector(".slide");
    const dotsContainer = document.querySelector(".dots");
    const frontPageMain = document.querySelector(".landingPage");

    if((window.innerWidth <= 1500)&&(progressBar !== null)) {
        dotsContainer.style.top = (landingSlide.clientHeight - 80) + "px";
        frontPageMain.style.height = landingSlide.clientHeight + "px";

        setTimeout(() => {
            frontPageMain.style.height = landingSlide.clientHeight + "px";
        }, 1000);
    }

    if(progressBar !== null) {
        window.addEventListener("resize", () => {
            if(window.innerWidth <= 1500) {
                dotsContainer.style.top = (landingSlide.clientHeight - 80) + "px";
                frontPageMain.style.height = landingSlide.clientHeight + "px";
            }
            else {
                dotsContainer.style.top = "520px";
            }
        });
    }
});

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
        if(window.innerWidth > 500) offset = 200;
        else offset = 300;
        gsap.set(finansowanieArrow, { transform: 'rotate(0)' });
            gsap.to(finansowanieWrapper, { height: offset, duration: .4 })
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

/* Open and close serwis i czesci contents */
let popupsSerwis = [false, false, false, false];
let popupsCzesci = [false, false, false, false, false];

const serwis1 = document.querySelector("#serwis1");
const serwis2 = document.querySelector("#serwis2");
const serwis3 = document.querySelector("#serwis3");
const serwis4 = document.querySelector("#serwis4");
const serwisH1 = document.querySelector("#serwisH1");
const serwisH2 = document.querySelector("#serwisH2");
const serwisH3 = document.querySelector("#serwisH3");
const serwisH4 = document.querySelector("#serwisH4");

const czesci1 = document.querySelector("#czesci1");
const czesci2 = document.querySelector("#czesci2");
const czesci3 = document.querySelector("#czesci3");
const czesci4 = document.querySelector("#czesci4");
const czesci5 = document.querySelector("#czesci5");
const czesciH1 = document.querySelector("#czesciH1");
const czesciH2 = document.querySelector("#czesciH2");
const czesciH3 = document.querySelector("#czesciH3");
const czesciH4 = document.querySelector("#czesciH4");
const czesciH5 = document.querySelector("#czesciH5");

const over1500Heights = ["30px", "80px", "80px", "80px", "90px", "90px", "90px", "140px", "140px"];
const over1000Heights = ["40px", "90px", "110px", "80px", "130px", "90px", "140px", "190px", "140px"];
const over700Heights = ["70px", "140px", "190px", "110px", "190px", "150px", "200px", "290px", "150px"];
let heights;

const serwis = (n, e) => {
    if(window.innerWidth > 1500) {
        heights = over1500Heights;
    }
    else if(window.innerWidth > 1000) {
        heights = over1000Heights;
    }
    else {
        heights = over700Heights;
    }

    if(n === 1) {
        if(!popupsSerwis[0]) {
            serwisH1.style.color = "#B4C618";
            popupsSerwis[0] = true;
            gsap.to(serwis1, { height: heights[0], duration: .3 })
                .then(() => {
                    gsap.to(serwis1, { opacity: 1, duration: .3 });
                });
        }
        else {
            serwisH1.style.color = "#1B1C20";
            popupsSerwis[0] = false;
            gsap.to(serwis1, { opacity: 0, duration: .3 })
                .then(() => {
                    gsap.to(serwis1, { height: 0, duration: .3 });
                });
        }
    }
    else if(n === 2) {
        if(!popupsSerwis[1]) {
            serwisH2.style.color = "#B4C618";
            popupsSerwis[1] = true;
            gsap.to(serwis2, { height: heights[1], duration: .3 })
                .then(() => {
                    gsap.to(serwis2, { opacity: 1, duration: .3 });
                });
        }
        else {
            serwisH2.style.color = "#1B1C20";
            popupsSerwis[1] = false;
            gsap.to(serwis2, { opacity: 0, duration: .3 })
                .then(() => {
                    gsap.to(serwis2, { height: 0, duration: .3 });
                });
        }
    }
    else if(n === 3) {
        if(!popupsSerwis[2]) {
            serwisH3.style.color = "#B4C618";
            popupsSerwis[2] = true;
            gsap.to(serwis3, { height: heights[2], duration: .3 })
                .then(() => {
                    gsap.to(serwis3, { opacity: 1, duration: .3 });
                });
        }
        else {
            serwisH3.style.color = "#1B1C20";
            popupsSerwis[2] = false;
            gsap.to(serwis3, { opacity: 0, duration: .3 })
                .then(() => {
                    gsap.to(serwis3, { height: 0, duration: .3 });
                });
        }
    }
    else {
        if(!popupsSerwis[3]) {
            serwisH4.style.color = "#B4C618";
            popupsSerwis[3] = true;
            gsap.to(serwis4, { height: heights[3], duration: .3 })
                .then(() => {
                    gsap.to(serwis4, { opacity: 1, duration: .3 });
                });
        }
        else {
            serwisH4.style.color = "#1B1C20";
            popupsSerwis[3] = false;
            gsap.to(serwis4, { opacity: 0, duration: .3 })
                .then(() => {
                    gsap.to(serwis4, { height: 0, duration: .3 });
                });
        }
    }
}

const czesci = (n) => {
    if(window.innerWidth > 1500) {
        heights = over1500Heights;
    }
    else if(window.innerWidth > 1000) {
        heights = over1000Heights;
    }
    else {
        heights = over700Heights;
    }

    if(n === 1) {
        if(!popupsCzesci[0]) {
            czesciH1.style.color = "#B4C618";
            popupsCzesci[0] = true;
            gsap.to(czesci1, { height: heights[4], duration: .3 })
                .then(() => {
                    gsap.to(czesci1, { opacity: 1, duration: .3 });
                });
        }
        else {
            czesciH1.style.color = "#1B1C20";
            popupsCzesci[0] = false;
            gsap.to(czesci1, { opacity: 0, duration: .3 })
                .then(() => {
                    gsap.to(czesci1, { height: 0, duration: .3 });
                });
        }
    }
    else if(n === 2) {
        if(!popupsCzesci[1]) {
            czesciH2.style.color = "#B4C618";
            popupsCzesci[1] = true;
            gsap.to(czesci2, { height: heights[5], duration: .3 })
                .then(() => {
                    gsap.to(czesci2, { opacity: 1, duration: .3 });
                });
        }
        else {
            czesciH2.style.color = "#1B1C20";
            popupsCzesci[1] = false;
            gsap.to(czesci2, { opacity: 0, duration: .3 })
                .then(() => {
                    gsap.to(czesci2, { height: 0, duration: .3 });
                });
        }
    }
    else if(n === 3) {
        if(!popupsCzesci[2]) {
            czesciH3.style.color = "#B4C618";
            popupsCzesci[2] = true;
            gsap.to(czesci3, { height: heights[6], duration: .3 })
                .then(() => {
                    gsap.to(czesci3, { opacity: 1, duration: .3 });
                });
        }
        else {
            czesciH3.style.color = "#1B1C20";
            popupsCzesci[2] = false;
            gsap.to(czesci3, { opacity: 0, duration: .3 })
                .then(() => {
                    gsap.to(czesci3, { height: 0, duration: .3 });
                });
        }
    }
    else if(n === 4) {
        if(!popupsCzesci[3]) {
            czesciH4.style.color = "#B4C618";
            popupsCzesci[3] = true;
            gsap.to(czesci4, { height: heights[7], duration: .3 })
                .then(() => {
                    gsap.to(czesci4, { opacity: 1, duration: .3 });
                });
        }
        else {
            czesciH4.style.color = "#1B1C20";
            popupsCzesci[3] = false;
            gsap.to(czesci4, { opacity: 0, duration: .3 })
                .then(() => {
                    gsap.to(czesci4, { height: 0, duration: .3 });
                });
        }
    }
    else {
        if(!popupsCzesci[4]) {
            czesciH5.style.color = "#B4C618";
            popupsCzesci[4] = true;
            gsap.to(czesci5, { height: heights[8], duration: .3 })
                .then(() => {
                    gsap.to(czesci5, { opacity: 1, duration: .3 });
                });
        }
        else {
            czesciH5.style.color = "#1B1C20";
            popupsCzesci[4] = false;
            gsap.to(czesci5, { opacity: 0, duration: .3 })
                .then(() => {
                    gsap.to(czesci5, { height: 0, duration: .3 });
                });
        }
    }
}

/* On scroll animations - front page */
const sectionHeader1 = document.querySelector("#sectionHeader1");
const markiHeader = document.querySelector("#markiHeader");
const maszynyHeader = document.querySelector("#maszynyHeader");
const uslugiHeader = document.querySelector("#uslugiHeader");

const aktualnosciTrigger = document.querySelector("#aktualnosciTrigger");
const markiTrigger = document.querySelector("#markiTrigger");
const maszynyTrigger = document.querySelector("#maszynyTrigger");
const uslugiTrigger = document.querySelector("#uslugiTrigger");

const aktualnosciSection = document.querySelector(".aktualnosciInner");
const markiSection = document.querySelector(".markiInner");
const maszynyLogo = document.querySelector(".maszyny>.siteHeaderTopClass");
const maszynyHint = document.querySelector(".classHint");
const maszynySection = document.querySelector(".maszynyInner");
const uslugiSection = document.querySelector(".uslugiInner");

const maszynyTrigger1 = document.getElementById("maszynyTrigger1");
const maszynyTrigger2 = document.getElementById("maszynyTrigger2");
const maszynyTrigger3 = document.getElementById("maszynyTrigger3");
const maszynyTrigger4 = document.getElementById("maszynyTrigger4");
const maszynyTrigger5 = document.getElementById("maszynyTrigger5");
const maszynyTrigger6 = document.getElementById("maszynyTrigger6");
const maszynyTrigger7 = document.getElementById("maszynyTrigger7");
const maszynyTrigger8 = document.getElementById("maszynyTrigger8");
const maszynyTrigger9 = document.getElementById("maszynyTrigger9");

const maszyny1 = document.querySelector(".maszynyInnerItem:nth-of-type(1)");
const maszyny2 = document.querySelector(".maszynyInnerItem:nth-of-type(2)");
const maszyny3 = document.querySelector(".maszynyInnerItem:nth-of-type(3)");
const maszyny4 = document.querySelector(".maszynyInnerItem:nth-of-type(4)");
const maszyny5 = document.querySelector(".maszynyInnerItem:nth-of-type(5)");
const maszyny6 = document.querySelector(".maszynyInnerItem:nth-of-type(6)");
const maszyny7 = document.querySelector(".maszynyInnerItem:nth-of-type(7)");
const maszyny8 = document.querySelector(".maszynyInnerItem:nth-of-type(8)");
const maszyny9 = document.querySelector(".maszynyInnerItem:nth-of-type(9)");

const uslugiTrigger1 = document.querySelector("#uslugiTrigger1");
const uslugiTrigger2 = document.querySelector("#uslugiTrigger2");
const uslugiTrigger3 = document.querySelector("#uslugiTrigger3");
const uslugiTrigger4 = document.querySelector("#uslugiTrigger4");
const uslugiTrigger5 = document.querySelector("#uslugiTrigger5");
const uslugiTrigger6 = document.querySelector("#uslugiTrigger6");
const uslugiTrigger7 = document.querySelector("#uslugiTrigger7");
const uslugiTrigger8 = document.querySelector("#uslugiTrigger8");
const uslugiTrigger9 = document.querySelector("#uslugiTrigger9");

const uslugi1 = document.querySelector(".uslugiItem:nth-of-type(1)");
const uslugi2 = document.querySelector(".uslugiItem:nth-of-type(2)");
const uslugi3 = document.querySelector(".uslugiItem:nth-of-type(3)");
const uslugi4 = document.querySelector(".uslugiItem:nth-of-type(4)");
const uslugi5 = document.querySelector(".uslugiItem:nth-of-type(5)");
const uslugi6 = document.querySelector(".uslugiItem:nth-of-type(6)");
const uslugi7 = document.querySelector(".uslugiItem:nth-of-type(7)");
const uslugi8 = document.querySelector(".uslugiItem:nth-of-type(8)");
const uslugi9 = document.querySelector(".uslugiItem:nth-of-type(9)");

let onPage = [false, false, false, false, false];
let maszynyOnPage = [false, false, false, false, false, false, false, false, false];
let uslugiOnPage = [false, false, false, false, false, false, false, false, false];

gsap.fromTo(sectionHeader1, { width: "100px" }, { width: "100%", duration: 1 });

let options = {
    root: null,
    margin: "0px",
    threshold: 1
};

let observer1 = new IntersectionObserver((entries) => {
    for (const entry of entries) {
        if (entry.isIntersecting) {
            if((entry.target.id === 'aktualnosciTrigger')&&(!onPage[0])) {
                onPage[0] = true;
                gsap.fromTo(aktualnosciSection, {y: 500, opacity: 0}, {y: 0, opacity: 1, duration: .5});
            }
            else if((entry.target.id === 'markiTrigger')&&(!onPage[1])) {
                onPage[1] = true;
                gsap.fromTo(markiHeader, { width: "300px" }, { width: "100%", duration: .5 });
                gsap.fromTo(markiSection, { y: 500, opacity: 0 }, { y: 0, opacity: 1, duration: .5 });
            }
            else if((entry.target.id === 'maszynyTrigger')&&(!onPage[2])) {
                onPage[2] = true;
                gsap.fromTo(maszynyHeader, { width: "300px" }, { width: "100%", duration: .5 });
                gsap.fromTo([maszynyLogo, maszynyHint], { y: 500, opacity: 0 }, { y: 0, opacity: 1, duration: .5 });
            }
            else if((entry.target.id === 'uslugiTrigger')&&(!onPage[3])) {
                onPage[3] = true;
                gsap.fromTo(uslugiHeader, { width: "300px" }, { width: "100%", duration: .5 });
                //gsap.fromTo(uslugiSection, { y: 500, opacity: 0 }, { y: 0, opacity: 1, duration: .5 });
            }
            /* Maszyny */
            else if((entry.target.id === 'maszynyTrigger1')&&(!maszynyOnPage[0])) {
                maszynyOnPage[0] = true;
                console.log("heden");
                gsap.fromTo(maszyny1, { scale: 0 }, { scale: 1, duration: .5 });
            }
            else if((entry.target.id === 'maszynyTrigger2')&&(!maszynyOnPage[1])) {
                maszynyOnPage[1] = true;
                gsap.fromTo(maszyny2, { scale: 0 }, { scale: 1, duration: .5 });
            }
            else if((entry.target.id === 'maszynyTrigger3')&&(!maszynyOnPage[3])) {
                maszynyOnPage[2] = true;
                gsap.fromTo(maszyny3, { scale: 0 }, { scale: 1, duration: .5 });
            }
            else if((entry.target.id === 'maszynyTrigger4')&&(!maszynyOnPage[3])) {
                maszynyOnPage[3] = true;
                gsap.fromTo(maszyny4, { scale: 0 }, { scale: 1, duration: .5 });
            }
            else if((entry.target.id === 'maszynyTrigger5')&&(!maszynyOnPage[4])) {
                maszynyOnPage[4] = true;
                gsap.fromTo(maszyny5, { scale: 0 }, { scale: 1, duration: .5 });
            }
            else if((entry.target.id === 'maszynyTrigger6')&&(!maszynyOnPage[5])) {
                maszynyOnPage[5] = true;
                gsap.fromTo(maszyny6, { scale: 0 }, { scale: 1, duration: .5 });
            }
            else if((entry.target.id === 'maszynyTrigger7')&&(!maszynyOnPage[6])) {
                maszynyOnPage[6] = true;
                gsap.fromTo(maszyny7, { scale: 0 }, { scale: 1, duration: .5 });
            }
            else if((entry.target.id === 'maszynyTrigger8')&&(!maszynyOnPage[7])) {
                maszynyOnPage[7] = true;
                gsap.fromTo(maszyny8, { scale: 0 }, { scale: 1, duration: .5 });
            }
            else if((entry.target.id === 'maszynyTrigger9')&&(!maszynyOnPage[8])) {
                maszynyOnPage[8] = true;
                gsap.fromTo(maszyny9, { scale: 0 }, { scale: 1, duration: .5 });
            }
            /* Uslugi */
            else if((entry.target.id === 'uslugiTrigger1')&&(!uslugiOnPage[0])) {
                uslugiOnPage[0] = true;
                gsap.fromTo(uslugi1, { opacity: 0 }, { opacity: 1, duration: .5 });
            }
            else if((entry.target.id === 'uslugiTrigger2')&&(!uslugiOnPage[1])) {
                uslugiOnPage[1] = true;
                gsap.fromTo(uslugi2, { opacity: 0 }, { opacity: 1, duration: .5 });
            }
            else if((entry.target.id === 'uslugiTrigger3')&&(!uslugiOnPage[2])) {
                uslugiOnPage[2] = true;
                gsap.fromTo(uslugi3, { opacity: 0 }, { opacity: 1, duration: .5 });
            }
            else if((entry.target.id === 'uslugiTrigger4')&&(!uslugiOnPage[3])) {
                uslugiOnPage[3] = true;
                gsap.fromTo(uslugi4, { opacity: 0 }, { opacity: 1, duration: .5 });
            }
            else if((entry.target.id === 'uslugiTrigger5')&&(!uslugiOnPage[4])) {
                uslugiOnPage[4] = true;
                gsap.fromTo(uslugi5, { opacity: 0 }, { opacity: 1, duration: .5 });
            }
            else if((entry.target.id === 'uslugiTrigger6')&&(!uslugiOnPage[5])) {
                uslugiOnPage[5] = true;
                gsap.fromTo(uslugi6, { opacity: 0 }, { opacity: 1, duration: .5 });
            }
            else if((entry.target.id === 'uslugiTrigger7')&&(!uslugiOnPage[6])) {
                uslugiOnPage[6] = true;
                gsap.fromTo(uslugi7, { opacity: 0 }, { opacity: 1, duration: .5 });
            }
            else if((entry.target.id === 'uslugiTrigger8')&&(!uslugiOnPage[7])) {
                uslugiOnPage[7] = true;
                gsap.fromTo(uslugi8, { opacity: 0 }, { opacity: 1, duration: .5 });
            }
            else if((entry.target.id === 'uslugiTrigger9')&&(!uslugiOnPage[8])) {
                uslugiOnPage[8] = true;
                gsap.fromTo(uslugi9, { opacity: 0 }, { opacity: 1, duration: .5 });
            }
        }
    }
}, options);

if(aktualnosciTrigger !== null) {
    observer1.observe(aktualnosciTrigger);
    observer1.observe(markiTrigger);
    observer1.observe(maszynyTrigger);
    observer1.observe(uslugiTrigger);

    observer1.observe(maszynyTrigger1);
    observer1.observe(maszynyTrigger2);
    observer1.observe(maszynyTrigger3);
    observer1.observe(maszynyTrigger4);
    observer1.observe(maszynyTrigger5);
    observer1.observe(maszynyTrigger6);
    observer1.observe(maszynyTrigger7);
    observer1.observe(maszynyTrigger8);
    observer1.observe(maszynyTrigger9);

    observer1.observe(uslugiTrigger1);
    observer1.observe(uslugiTrigger2);
    observer1.observe(uslugiTrigger3);
    observer1.observe(uslugiTrigger4);
    observer1.observe(uslugiTrigger5);
    observer1.observe(uslugiTrigger6);
    observer1.observe(uslugiTrigger7);
    observer1.observe(uslugiTrigger8);
    observer1.observe(uslugiTrigger9);
}

/* Google Maps */
let myPosition = {lat: 53.33057882215416, lng: 19.551343410224714};
let wiktoryn = { lat: 52.801806509173026, lng: 18.824304247285777 };
let zurominek = { lat: 52.98941978885998, lng: 20.32410889848498 };

let wielkiGleboczekMarker, wiktorynMarker, zurominekMarker, map;
let infoWindowGleboczek, infoWindowWiktoryn, infoWindowZurominek;

if(document.getElementById('map') !== null) {
    map = new google.maps.Map(document.getElementById('map'), {
        center: myPosition,
        zoom: 7.5
    });

    wielkiGleboczekMarker = new google.maps.Marker({
        position: myPosition,
        map: map,
        title: "Kalchem",
        animation: google.maps.Animation.BOUNCE
    });

    wiktorynMarker = new google.maps.Marker({
        position: wiktoryn,
        map: map,
        title: "Wiktoryn",
        animation: google.maps.Animation.BOUNCE
    });

    zurominekMarker = new google.maps.Marker({
        position: zurominek,
        map: map,
        title: "Zurominek",
        animation: google.maps.Animation.BOUNCE
    });

    infoWindowGleboczek = new google.maps.InfoWindow({
        content: document.querySelector("#contentWielkiGleboczek")
    });
    infoWindowZurominek = new google.maps.InfoWindow({
        content: document.querySelector("#contentZurominek")
    });
    infoWindowWiktoryn = new google.maps.InfoWindow({
        content: document.querySelector("#contentWiktoryn")
    });

    wielkiGleboczekMarker.addListener("click", () => {
        infoWindowZurominek.close(map, zurominekMarker);
        infoWindowWiktoryn.close(map, wiktorynMarker);
        infoWindowGleboczek.open(map, wielkiGleboczekMarker);
    });
    zurominekMarker.addListener("click", () => {
        infoWindowGleboczek.close(map, wielkiGleboczekMarker);
        infoWindowWiktoryn.close(map, wiktorynMarker);
        infoWindowZurominek.open(map, zurominekMarker);
    });
    wiktorynMarker.addListener("click", () => {
        infoWindowZurominek.close(map, zurominekMarker);
        infoWindowGleboczek.close(map, wielkiGleboczekMarker);
        infoWindowWiktoryn.open(map, wiktorynMarker);
    });

    wielkiGleboczekMarker.setAnimation(google.maps.Animation.BOUNCE);
    wiktorynMarker.setAnimation(google.maps.Animation.BOUNCE);

    // wielkiGleboczek.addListener("click", () => {
    //     map.setZoom(13);
    //     map.setCenter(wielkiGleboczek.getPosition());
    // });
}

const trasa = async (n) => {
    const directionsService = new google.maps.DirectionsService();
    let directionsDisplay = new google.maps.DirectionsRenderer();
    let myLat, myLng;

    /* Get current geolocation */
    if(navigator.geolocation) {
        await navigator.geolocation.getCurrentPosition(async (position) => {
            let currentMarker;
            switch(n) {
                case 1:
                    currentMarker = wielkiGleboczekMarker;
                    break;
                case 2:
                    currentMarker = wiktorynMarker;
                    break;
                default:
                    currentMarker = zurominekMarker;
                    break;
            }

            /* Clear */
            infoWindowGleboczek.close();
            infoWindowZurominek.close();
            infoWindowWiktoryn.close();

            myLat = position.coords.latitude;
            myLng = position.coords.longitude;

            await directionsService.route({
                // origin: document.getElementById('start').value,
                origin: {
                    lat: myLat,
                    lng: myLng
                },
                // destination: marker.getPosition(),
                destination: {
                    lat: currentMarker.getPosition().lat(),
                    lng: currentMarker.getPosition().lng()
                },
                travelMode: 'DRIVING'
            }, function(response, status) {
                if (status === 'OK') {
                    // Clear past routes
                    directionsDisplay.setMap(null);
                    directionsDisplay = null;
                    directionsDisplay = new google.maps.DirectionsRenderer();

                    directionsDisplay.setMap(map);
                    directionsDisplay.setDirections(response);
                    directionsDisplay.setOptions( { suppressMarkers: true } );
                } else {
                    window.alert('Directions request failed due to ' + status);
                }
            });
        });
    }

}

/* Animate every 3 seconds */
let markiSiema;

let markiLeft = document.querySelector(".markiLeft");

if(markiLeft !== null) {
    setInterval(() => {
        markiSiema.next();
    }, 3000);

        markiSiema = new Siema({
            selector: ".markiTrack",
            perPage: {
                1200: 4,
                900: 2,
                100: 1
            },
            loop: true
        });
}

const moveMarkiLeft = () => {
    markiSiema.prev();
}

const moveMarkiRight = () => {
    markiSiema.next();
}

/* AJAX request for emplyees */

const filterEmployees = (e) => {
    let allEmployees = document.querySelectorAll(".pracownik");
    let elements;
    switch(e.value) {
        case 'Wszyscy':
            elements = document.querySelectorAll('.pracownik');
            break;
        case 'Właściciel':
            elements = document.querySelectorAll(".c_właściciel");
            break;
        case 'Dyrektor handlowy':
            elements = document.querySelectorAll('.c_dyrektor_handlowy');
            break;
        case 'Sprzedaż maszyn':
            elements = document.querySelectorAll(".c_sprzedaż_maszyn");
            break;
        case 'Biuro':
            elements = document.querySelectorAll('.c_biuro');
            break;
        case 'Części zamienne':
            elements = document.querySelectorAll('.c_części_zamienne');
            break;
        case 'Serwis':
            elements = document.querySelectorAll(".c_serwis");
            break;
        case 'Logistyka':
            elements = document.querySelectorAll('.c_logistyka');
            break;
        case 'Księgowość':
            elements = document.querySelectorAll('.c_księgowość');
            break;
        case 'Oddział Wiktoryn':
            elements = document.querySelectorAll('.c_oddział_wiktoryn');
            break;
        default:
            elements = document.querySelectorAll('.c_oddział_Żurominek');
            break;
    }

    allEmployees.forEach(item => {
        item.style.display = "none";
    });

    elements.forEach(item => {
        item.style.display = "block";
    });
}

/* More about job */
const ofertyPracy = document.querySelectorAll(".ofertaPracyItemDescription");
const ofertyButtons = document.querySelectorAll(".ofertaPracyItemBtn");
const ofertaPracyShowMore = (n) => {
    const computedStyle = window.getComputedStyle(ofertyPracy[n]);
    if(computedStyle.getPropertyValue('opacity') == "0") {
        ofertyPracy[n].style.opacity = "1";
        ofertyPracy[n].style.maxHeight = "500px";
        ofertyPracy[n].style.padding = "20px 0 0 0";
        ofertyButtons[n].style.transform = "rotate(180deg)";
    }
    else {
        ofertyPracy[n].style.opacity = "0";
        ofertyPracy[n].style.maxHeight = "0";
        ofertyPracy[n].style.padding = "0 0 0 0";
        ofertyButtons[n].style.transform = "rotate(0)";
    }
}
