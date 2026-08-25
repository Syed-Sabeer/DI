(function () {
  
    "use strict";
    
    gsap.registerPlugin(ScrollTrigger);

    gsap.registerPlugin(SplitText);
    

    document.addEventListener("DOMContentLoaded", function(){

      const elements = document.querySelectorAll("[data-anime]");
      
      const observer = new IntersectionObserver((entries, observer)=>{
      
      entries.forEach((entry)=>{
      
      if(!entry.isIntersecting) return;
      
      const el = entry.target;
      
      let settings = {};
      
      try{
      settings = JSON.parse(el.getAttribute("data-anime")) || {};
      }catch(e){
      console.warn("Invalid JSON", el);
      return;
      }
      
      const targets = settings.el === "childs" ? el.children : el;
      
      let translateX = settings.translateX;
      let translateY = settings.translateY;
      let opacity = settings.opacity;
      let scale = settings.scale;
      let color;
      
      if(settings.effect === "slide"){
      
      const distance = settings.distance || 100;
      
      switch(settings.direction){
      
      case "lr":
      translateX = [-distance,0];
      break;
      
      case "rl":
      translateX = [distance,0];
      break;
      
      case "tb":
      translateY = [-distance,0];
      break;
      
      case "bt":
      translateY = [distance,0];
      break;
      
      }
      
      opacity = [0,1];
      
      }
      
      if(settings.effect === "scale"){
      scale = settings.scale || [0.8,1];
      opacity = settings.opacity || [0,1];
      }
      
      if(settings.effect === "fade"){
      opacity = settings.opacity || [0,1];
      }
      
      if(settings.color){
      color = [
      getComputedStyle(el).color,
      settings.color
      ];
      }
      
      const animationOptions = {
      targets: targets,
      duration: settings.duration || 600,
      easing: settings.easing || "easeOutQuad"
      };
      
      if(translateX) animationOptions.translateX = translateX;
      if(translateY) animationOptions.translateY = translateY;
      if(opacity) animationOptions.opacity = opacity;
      if(scale) animationOptions.scale = scale;
      if(color) animationOptions.color = color;
      
      if(settings.el === "childs"){
      animationOptions.delay = anime.stagger(settings.delay || 100);
      }else if(settings.delay){
      animationOptions.delay = settings.delay;
      }
      
      anime(animationOptions);
      
      observer.unobserve(el);
      
      });
      
      },{threshold:0.3});
      
      elements.forEach(el=>observer.observe(el));
      
      });
    
    // Right swipe animation
    document.querySelectorAll(".rightSwipeWrap").forEach((wrap, i) => {
        const swipeElements = wrap.querySelectorAll(".right-swipe");
    
        gsap.set(swipeElements, {
            transformPerspective: 1200,
            x: "10rem",
            rotateY: -20,
            opacity: 0,
            transformOrigin: "right center",
        });
    
        gsap.to(swipeElements, {
            transformPerspective: 1200,
            x: 0,
            rotateY: 0,
            opacity: 1,
            delay: 0.3,
            ease: "power3.out",
            scrollTrigger: {
                trigger: wrap,
                start: "top 80%",
                id: "rightSwipeWrap-" + i,
                toggleActions: "play none none none",
            },
        });
    });
    

    // Left swipe animation
    document.querySelectorAll(".leftSwipeWrap").forEach((wrap, i) => {
      const swipeElements = wrap.querySelectorAll(".left-swipe");

      gsap.set(swipeElements, {
          transformPerspective: 1200,
          x: "-10rem",   
          rotateY: 20,   
          opacity: 0,   
          transformOrigin: "left center", 
      });

      gsap.to(swipeElements, {
          transformPerspective: 1200,
          x: 0,         
          rotateY: 0,   
          opacity: 1,    
          delay: 0.4,    
          ease: "power3.out", 
          scrollTrigger: {
              trigger: wrap,     
              start: "top 80%",      
              id: "leftSwipeWrap-" + i,  
              toggleActions: "play none none none", 
          },
      });
    });

  //  Character Animation //
const elements = document.querySelectorAll('.title-char-animation');

if (elements.length > 0) {
    elements.forEach((splitTextLine) => {

        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: splitTextLine,
                start: 'top 90%',
                end: 'bottom 60%',
                scrub: false,
                markers: false,
                toggleActions: 'play none none none'
            }
        });

        const itemSplitted = new SplitText(splitTextLine, { type: "chars, words" });

        gsap.set(splitTextLine, { perspective: 300 });

        itemSplitted.split({ type: "chars, words" });

        tl.from(itemSplitted.chars, {
            duration: 1,
            delay: 0.5,
            x: 100,
            autoAlpha: 0,
            stagger: 0.05
        });

    });
}

// Split title animation
const splitTitles = document.querySelectorAll(".split-title");

if (splitTitles.length) {
    splitTitles.forEach((title) => {

        const split = new SplitText(title, { type: "words, chars" });

        // Add class to each word
        split.words.forEach((word) => {
            word.classList.add("word");
        });

        // Add class to each character
        split.chars.forEach((char) => {
            char.classList.add("char");
        });

        gsap.to(split.chars, {
            scrollTrigger: {
                trigger: title,
                start: "top 80%",
            },
            duration: 0.8,
            clipPath: "inset(0% 0% 0% 0%)",
            x: 0,
            opacity: 1,
            ease: "power4.out",
            stagger: 0.03
        });
    });
}

// fixed-title-wrap
let pc = gsap.matchMedia();

pc.add("(min-width: 1200px)", () => {

    const fixedTitleWrap = document.querySelector(".fixed-title-wrap");

    if (fixedTitleWrap) {
        let project_text = gsap.timeline({
            scrollTrigger: {
                trigger: ".fixed-title-wrap",
                start: "top center-=350",
                end: "bottom 63%",
                pin: ".fixed-title",
                markers: false,
                pinSpacing: false,
                scrub: 1,
            }
        });
    }

});


  /* ------------- Gsap registration Js -------------*/
  function initGsapSmoothScroll() {
    if (typeof gsap === "undefined") return;
  
    try {
      if (typeof ScrollTrigger !== "undefined") gsap.registerPlugin(ScrollTrigger);
      if (typeof ScrollSmoother !== "undefined") gsap.registerPlugin(ScrollSmoother);
      if (typeof ScrollToPlugin !== "undefined") gsap.registerPlugin(ScrollToPlugin);
    } catch (e) {}
  
    const wrapper = document.getElementById("scroll-shell");
    const content = document.getElementById("scroll-stage");
  
    if (!wrapper || !content || typeof ScrollSmoother === "undefined") return;
  
    gsap.config({ nullTargetWarn: false });
  
    try {
      const existing = ScrollSmoother.get && ScrollSmoother.get();
      if (existing) existing.kill();
    } catch (e) {}
  
    ScrollSmoother.create({
      wrapper: "#scroll-shell",
      content: "#scroll-stage",
      smooth: 1.5,
      effects: true,
      smoothTouch: 0.1,
      ignoreMobileResize: true,
    });
  }
  
  // Run after DOM ready
  document.addEventListener("DOMContentLoaded", initGsapSmoothScroll);


 // marquee section//
 document.addEventListener("DOMContentLoaded", function () {

  const marqueeEl = document.querySelector(".marquee-section");

  if (marqueeEl) {

      const marquee = new Swiper(".marquee-section", {
          slidesPerView: "auto",
          spaceBetween: 0,
          freemode: true,
          centeredSlides: true,
          loop: true,
          speed: 4000,
          allowTouchMove: false,
          autoplay: {
            delay: 1,
            disableOnInteraction: true,
          },
      });

  }

});

//video image section//

gsap.registerPlugin(ScrollTrigger);

const section = document.querySelector(".video-section");
const wrapper = document.querySelector(".video-wrapper");
const image = document.querySelector(".video-image");

const mm = gsap.matchMedia();

if (section && wrapper) {

    mm.add("(min-width:1200px)", () => {

        // Start smaller
        gsap.set(wrapper, {
            scaleX: 0.8,
            borderRadius: "10px",
            transformOrigin: "center center"
        });

        // Expand to full
        gsap.to(wrapper, {
            scrollTrigger: {
                borderRadius: "10px",
                trigger: section,
                scrub: 0.3,
                start: "top 80%",
                end: "bottom 20%",
            },
            scaleX: 1,
            borderRadius: "0px",
            ease: "none"
        });

    });
}

if (section && image) {

    mm.add("(min-width:1200px)", () => {

        // Start rounded
        gsap.set(image, {
            transformOrigin: "center center"
        });

        // Smoothly flatten while expanding
        gsap.to(image, {
            scrollTrigger: {
                trigger: section,
                scrub: 0.3,
                start: "top 80%",
                end: "bottom 20%",
            },
            borderRadius: "0px",
            ease: "none"
        });

    });
}

//right swipe//

//image animation//
document.addEventListener("DOMContentLoaded", () => {
  gsap.utils.toArray(".clip-anim").forEach(card => {
    const image = card.querySelector(".anim-img[data-animate='true']");
    if (!image) return;

    const imgUrl = image.src;
    const rows = 6;
    const cols = 8;

    card.querySelectorAll(".piece").forEach(piece => piece.remove());

    gsap.set(card, {
      position: "relative",
      overflow: "hidden"
    });

    // Keep original image visible always
    gsap.set(image, {
      opacity: 1,
      visibility: "visible"
    });

    for (let row = 0; row < rows; row++) {
      for (let col = 0; col < cols; col++) {
        const piece = document.createElement("div");
        piece.className = "piece";

        const w = 100 / cols;
        const h = 100 / rows;

        Object.assign(piece.style, {
          position: "absolute",
          width: `calc(${w}% + 1px)`,
          height: `calc(${h}% + 1px)`,
          left: `${col * w}%`,
          top: `${row * h}%`,
          backgroundImage: `url(${imgUrl})`,
          backgroundSize: `${cols * 100}% ${rows * 100}%`,
          backgroundPosition: `${(col / (cols - 1)) * 100}% ${(row / (rows - 1)) * 100}%`,
          backgroundRepeat: "no-repeat",
          pointerEvents: "none",
          zIndex: "2",
          transformOrigin: col % 2 === 0 ? "top center" : "bottom center",
          transform: "translateZ(0)"
        });

        card.appendChild(piece);
      }
    }

    const pieces = card.querySelectorAll(".piece");

    gsap.set(pieces, {
      scaleY: 0,
      opacity: 1,
      force3D: true
    });

    gsap.to(pieces, {
      scaleY: 1,
      duration: 0.9,
      ease: "power4.out",
      stagger: {
        amount: 0.7,
        grid: [rows, cols],
        from: "edges"
      },
      scrollTrigger: {
        trigger: card,
        start: "top 75%",
        once: true
      },
      onComplete: () => {
        gsap.set(pieces, {
          clearProps: "transform"
        });
      }
    });
  });
});

//our testimonials//
document.addEventListener("DOMContentLoaded", function () {
    const sliderR1 = document.querySelector(".feedback-slider");
  
    if (sliderR1) {
      new Swiper(".feedback-slider", {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        speed: 1500,
        autoplay: {
            delay: 5000,
        },
        breakpoints: {
          0: {
            slidesPerView: 1,
            spaceBetween: 15,
          },
          580: {
            slidesPerView: 1,
            spaceBetween: 20,
          },
          992: {
            slidesPerView: 2,
            spaceBetween: 20,
          },
          1500: {
            slidesPerView: 2,
            spaceBetween: 30,
          },
        },
        navigation: {
            nextEl: ".nav-next",
            prevEl: ".nav-prev",
        },
      });
    }
  });
//our testimonials//

// Image Slider //

(function () {
  const COLS = 4; // number of square pieces horizontally
  const ROWS = 4; // number of square pieces vertically
  const PART_DELAY = 0.05;
  const AUTO_SLIDE_DURATION = 1500;

  const createSplitParts = (container) => {
      const image = container.querySelector("img");
      if (!image) return;

      const containerWidth = container.offsetWidth;
      const containerHeight = container.offsetHeight;
      const imageSource = image.src;

      const partWidth = containerWidth / COLS;
      const partHeight = containerHeight / ROWS;

      for (let row = 0; row < ROWS; row++) {
          for (let col = 0; col < COLS; col++) {
              const layer = document.createElement("span");
              const xOffset = col * partWidth;
              const yOffset = row * partHeight;
              const partIndex = row * COLS + col;

              layer.className = "sub-split";
              layer.style.cssText = `
                  position: absolute;
                  top: ${yOffset}px;
                  left: ${xOffset}px;
                  width: ${partWidth}px;
                  height: ${partHeight}px;
                  background-image: url("${imageSource}");
                  background-position: -${xOffset}px -${yOffset}px;
                  background-size: ${containerWidth}px ${containerHeight}px;
                  background-repeat: no-repeat;
                  transition-delay: ${partIndex * PART_DELAY}s;
              `;

              container.appendChild(layer);
          }
      }
  };

  const initializeSplitImages = () => {
      document.querySelectorAll(".image-split").forEach((container) => {
          if (!container.querySelector(".sub-split")) {
              createSplitParts(container);
          }
      });
  };

  const initializeAutoSlider = () => {
      const frames = document.querySelectorAll(".banner-image-split .image-split");
      if (!frames.length) return;

      let activeIndex = 0;
      frames[activeIndex].classList.add("active");

      setInterval(() => {
          frames[activeIndex].classList.remove("active");
          activeIndex = (activeIndex + 1) % frames.length;
          frames[activeIndex].classList.add("active");
      }, AUTO_SLIDE_DURATION);
  };

  window.addEventListener("load", () => {
      initializeSplitImages();
      initializeAutoSlider();
  });
})();

// Image Slider //

// Marquee slider (vanilla JS)
document.addEventListener("DOMContentLoaded", () => {
  const sliders = document.querySelectorAll(".js-marquee");
  if (!sliders.length) return;

  sliders.forEach((el) => {
    new Swiper(el, {
      slidesPerView: "auto",
      spaceBetween: 30,
      loop: true,
      speed: 5000,
      breakpoints: {
        768: { spaceBetween: 35 },
        1024: { spaceBetween: 50 },
      },
      allowTouchMove: false,
      autoplay: {
        delay: 1,
        disableOnInteraction: false,
      },
    });
  });
});


   document.addEventListener("DOMContentLoaded", function () {
    const sliderEl = document.querySelector(".project01-swiper");
  
    if (sliderEl) {
      new Swiper(".project01-swiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        speed: 1000,
        arrow: false,
  
        autoplay: {
          delay: 5000
        },
  
        navigation: {
          nextEl: ".nav-next",
          prevEl: ".nav-prev",
        },
  
        breakpoints: {
          992: {
            slidesPerView: 3,
            spaceBetween: 30
          }
        }
      });
    }
  });


  
  //service04 section//

  document.addEventListener("DOMContentLoaded", function () {
    const sliderEl = document.querySelector(".services04-swiper");
  
    if (sliderEl) {
      new Swiper(".services04-swiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        speed: 1000,
        arrow: false,
  
        autoplay: {
          delay: 5000
        },
  
        pagination: {
          el: ".project-pagination",
          clickable: true
        },
  
        breakpoints: {
          992: {
            slidesPerView: 3,
            spaceBetween: 30
          },
          1200: {
            slidesPerView: 4,
            spaceBetween: 30
          }
        }
      });
    }
  });

    //project04 section//
    document.addEventListener("DOMContentLoaded", function () {
      const sliderEl = document.querySelector(".portpolio04-swiper");
    
      if (sliderEl) {
        new Swiper(".portpolio04-swiper", {
          slidesPerView: 1,
          spaceBetween: 20,
          loop: true,
          speed: 1000,
          arrow: false,
    
          autoplay: {
            delay: 5000
          },
    
          navigation: {
            nextEl: ".slider-next",
            prevEl: ".slider-prev",
          },
    
          breakpoints: {
            992: {
              slidesPerView: 3,
              spaceBetween: 30
            }
          }
        });
      }
    });

  //project04 section//

  //testimonial04 section//
  document.addEventListener("DOMContentLoaded", function () {
    const sliderEl = document.querySelector(".testimonial04__slider");
  
    if (sliderEl) {
      new Swiper(".testimonial04__slider", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        speed: 1000,
        arrow: false,
  
        autoplay: {
          delay: 5000
        },

        navigation: {
          nextEl: ".nav-next",
          prevEl: ".nav-prev",
        },
  
        pagination: {
          el: ".project-pagination",
          clickable: true
        },
  
        breakpoints: {
          992: {
            slidesPerView: 1,
            spaceBetween: 30
          }
        }
      });
    }
  });

  //terelated services swiper section//
  document.addEventListener("DOMContentLoaded", function () {
    const sliderEl = document.querySelector(".related-services-swiper");
  
    if (sliderEl) {
      new Swiper(".related-services-swiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        speed: 1000,
        arrow: false,
  
        autoplay: {
          delay: 5000
        },

        navigation: {
          nextEl: ".nav-next",
          prevEl: ".nav-prev",
        },
  
        pagination: {
          el: ".project-pagination",
          clickable: true
        },
  
        breakpoints: {
          992: {
            slidesPerView: 2,
            spaceBetween: 30
          }
        }
      });
    }
  });

  document.addEventListener("DOMContentLoaded", function () {
    const sliderEl = document.querySelector(".project-slider");
  
    if (sliderEl) {
      new Swiper(".project-slider", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        speed: 1000,
        arrow: false,
  
        autoplay: {
          delay: 5000
        },
  
        pagination: {
          el: ".project-pagination",
          clickable: true
        },
  
        breakpoints: {
          992: {
            slidesPerView: 2,
            spaceBetween: 30
          }
        }
      });
    }
  });
  
  //team slider//
  document.addEventListener("DOMContentLoaded", function () {
    const sliderEl = document.querySelector(".team-slider");
  
    if (sliderEl) {
      new Swiper(".team-slider", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        speed: 1000,
        arrow: false,
  
        autoplay: {
          delay: 5000
        },
  
        breakpoints: {
          992: {
            slidesPerView: 3,
            spaceBetween: 30
          }
        }
      });
    }
  });

  //testimonials section//
  document.addEventListener("DOMContentLoaded", function () {
    const sliderEl = document.querySelector(".testimonials-slider");
  
    if (sliderEl) {
      new Swiper(".testimonials-slider", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        speed: 1000,
        arrow: false,
  
        autoplay: {
          delay: 5000
        },
  
        pagination: {
          el: ".testimonials-pagination1",
          clickable: true,
          renderBullet: function (index, className) {
            return '<div class="' + className + '"><img src="../assets/images/profile/' + (index + 1) + '.jpg" alt="Testimonial ' + (index + 1) + '"></div>';
          },
        },
  
        breakpoints: {
          992: {
            slidesPerView: 1,
            spaceBetween: 30
          }
        }
      });
    }
  });

   // common variable and funtion
   let mediaMatch = gsap.matchMedia();
   function rtlValue(value) {
     const isRTL = document.documentElement.dir === "rtl";
     return isRTL ? -value : value;
   }
     // common variable and funtion

  /* Service js (updated for new HTML structure) */
const serviceStackCards = gsap.utils.toArray(".svc-card--stack");

if (serviceStackCards.length > 0) {
  mediaMatch.add("(min-width: 992px)", () => {
    serviceStackCards.forEach((card) => {
      gsap.to(card, {
        opacity: 0,
        scale: 0.9,
        y: 50,
        scrollTrigger: {
          trigger: card,
          scrub: true,
          start: "top top",
          pin: true,
          pinSpacing: false,
          markers: false,
          invalidateOnRefresh: true,
        },
      });
    });
  });
}


//freelancer estimonials//

document.addEventListener("DOMContentLoaded", function () {
  const sliderEl = document.querySelector(".freelancer-testimonials-slider");

  if (sliderEl) {
    new Swiper(".freelancer-testimonials-slider", {
      slidesPerView: 1,
      spaceBetween: 20,
      loop: true,
      speed: 1000,
      arrow: false,

      autoplay: {
        delay: 5000
      },

      breakpoints: {
        992: {
          slidesPerView: 3,
          spaceBetween: 30
        }
      }
    });
  }
});


 //clinet slider//
 document.addEventListener("DOMContentLoaded", function () {
  const sliderEl = document.querySelector(".client-swiper");

  if (sliderEl) {
    const swiper = new Swiper(".client-swiper", {
      slidesPerView: 1,
      spaceBetween: 10,
      loop: true,
      speed: 1000,
      // Remove `arrow: false` - not a valid config
      autoplay: {
        delay: 2000,
        disableOnInteraction: false // keeps autoplay running after interaction
      },

      breakpoints: {
        745: {
          slidesPerView: 3,
          spaceBetween: 30
        },
        992: {
          slidesPerView: 4,
          spaceBetween: 30
        },
        1200: {
          slidesPerView: 6,
          spaceBetween: 30
        }
      }
    });
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const sliderE2 = document.querySelector(".client-home04-swiper");

  if (sliderE2) {
    new Swiper(".client-home04-swiper", {
      loop: true,
      speed: 1000,
      spaceBetween: 24,
      centeredSlides: false,

      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
      },

      breakpoints: {
        0: {
          slidesPerView: 1,
          spaceBetween: 16,
        },
        576: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 24,
        },
        992: {
          slidesPerView: 4,
          spaceBetween: 24,
        },
        1200: {
          slidesPerView: 4,
          spaceBetween: 30,
        },
        1400: {
          slidesPerView: 5,
          spaceBetween: 30,
        },
      },
    });
  }
});


if (typeof Swiper === "undefined") return;

// Helpers
const has = (selector) => document.querySelector(selector) !== null;

let thumbSwiper; // must be in outer scope so hero can reference it

  // Thumb slider
  if (has(".heroThumbs")) {
    thumbSwiper = new Swiper(".heroThumbs", {
      loop: false,
      spaceBetween: 15,
      slidesPerView: 3,
      freeMode: true,
      watchSlidesProgress: true,
    });
  }

  // Main hero slider
  if (has(".heroCarousel")) {
    new Swiper(".heroCarousel", {
      slidesPerView: 1,
      spaceBetween: 0,
      effect: "fade",
      loop: true,
      speed: 1400,
      autoplay: {
        delay: 5000,
      },
      navigation: {
        nextEl: ".slider-next",
        prevEl: ".slider-prev",
      },
      // Only attach thumbs if thumbSwiper exists
      thumbs: thumbSwiper ? { swiper: thumbSwiper } : undefined,
    });
  }
  

  // Element check
  const target = document.querySelector(".title-highlight");
  if (!target) return;

  // Library checks
  if (typeof gsap === "undefined") return;
  if (typeof ScrollTrigger === "undefined") return;
  if (typeof SplitText === "undefined") return;

  // Register ScrollTrigger if not already registered (safe)
  try {
    gsap.registerPlugin(ScrollTrigger);
  } catch (e) {}

  // Split into lines
  const highlightText = new SplitText(".title-highlight", {
    type: "lines",
    linesClass: "line",
  });

  // Animate CSS variable on each line with scroll
  const tl = gsap.timeline({
    scrollTrigger: {
      trigger: ".title-highlight",
      scrub: 1,
      start: "top 80%",
      end: "bottom center",
    },
  });

  tl.to(".line", {
    "--highlight-offset": "100%",
    stagger: 0.4,
  });
 // Animate CSS variable on each line with scroll

 function rtlValue(value) {
   const isRTL = document.documentElement.dir === "rtl";
   return isRTL ? -value : value;
 }



})();