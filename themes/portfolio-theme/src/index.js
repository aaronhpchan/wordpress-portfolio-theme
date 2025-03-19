/* Mobile navbar */
class MobileNavbar {
  constructor() {
    const navbarBtn = document.querySelector(".navbar-btn");
    const navbarMobile = document.querySelector(".navbar-mobile");
    const navbarLink = document.querySelectorAll(".navbar-mobile a");

    window.addEventListener("resize", resize);
    navbarBtn.addEventListener("click", btnTrigger);
    for (let i = 0; i < navbarLink.length; i++) {
      navbarLink[i].addEventListener("click", closeNav);
    }

    function btnTrigger() {
      navbarBtn.classList.toggle("fa-bars");
      navbarBtn.classList.toggle("fa-xmark");
      navbarMobile.classList.toggle("hidden");
      navbarMobile.classList.toggle("navbar-show");
    }

    function closeNav() {
      navbarMobile.classList.add("hidden");
      navbarMobile.classList.remove("navbar-show");
      navbarBtn.classList.remove("fa-xmark");
      navbarBtn.classList.add("fa-bars");
    }

    function resize() {
      if (window.innerWidth > 768) {
        closeNav();
      }
    }
  }
}
const mobileNavbar = new MobileNavbar();

/* Text animation */
class TextAnimation {
  constructor() {
    const movingText = document.querySelector(".banner-role__text");

    const textLoad = () => {
      setTimeout(() => {
        movingText.textContent = "Web Developer"; //13 characters
      }, 0);
      setTimeout(() => {
        movingText.textContent = "WordPress Developer"; //19 characters
      }, 4000);
    }
    textLoad();
    setInterval(textLoad, 8000);
  }
}
const textAnimation = new TextAnimation();

/* Intersection observer animation */
class ObserverAnimation {
  constructor() {
    const faders = document.querySelectorAll(".fade-in");
    const sliders = document.querySelectorAll(".slide-in");

    const appearOptions = {
      threshold: 0,
      rootMargin: "0px 0px -250px 0px"
    };

    const appearOnScroll = new IntersectionObserver((entries, appearOnScroll) => {
      entries.forEach(entry => {
        if (!entry.isIntersecting) {
          return;
        } else {
          entry.target.classList.add("appear");
          appearOnScroll.unobserve(entry.target);
        }
      })
    }, appearOptions);

    faders.forEach(fader => {
      appearOnScroll.observe(fader);
    });
    sliders.forEach(slider => {
      appearOnScroll.observe(slider);
    });
  }
}
const observerAnimation = new ObserverAnimation();