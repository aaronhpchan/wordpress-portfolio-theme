// Mobile navbar 
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

// Text animation 
class TextAnimation {
  constructor(elementSelector, texts, typingSpeed = 120, pauseTime = 750) {
    this.element = document.querySelector(elementSelector);
    this.texts = texts;
    this.typingSpeed = typingSpeed;
    this.pauseTime = pauseTime;
    this.currentIndex = 0;
    this.start();
  }

  async start() {
    while (true) {
      const text = this.texts[this.currentIndex];
      await this.typeText(text);
      await this.wait(this.pauseTime);
      await this.deleteText();
      this.currentIndex = (this.currentIndex + 1) % this.texts.length;
    }
  }

  async typeText(text) {
    for (let i = 0; i <= text.length; i++) {
      this.element.textContent = text.slice(0, i);
      await this.wait(this.typingSpeed);
    }
  }

  async deleteText() {
    let text = this.element.textContent;
    for (let i = text.length; i >= 0; i--) {
      this.element.textContent = text.slice(0, i);
      await this.wait(this.typingSpeed / 1.5);
    }
  }

  wait(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
  }
}
const textAnimation = new TextAnimation(".banner-role__text", [
  "Web Developer",
  "WordPress Developer"
]);

// Intersection observer animation 
class ObserverAnimation {
  constructor() {
    const faders = document.querySelectorAll(".fade-in");
    const sliders = document.querySelectorAll(".slide-in");

    const appearOptions = {
      threshold: 0,
      rootMargin: "0px 0px -200px 0px"
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