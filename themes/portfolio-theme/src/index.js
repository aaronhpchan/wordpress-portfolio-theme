window.addEventListener("load", () => {
  new Loader();
  new TextAnimation(".banner-role__text", [
    "Web Developer",
    "WordPress Developer"
  ]);
});

window.addEventListener("DOMContentLoaded", () => {
  new MobileNavbar();
  new ObserverAnimation();
});

// Loading dots animation
class Loader {
  constructor() {
    const loader = document.querySelector(".loader");

    if (loader) {
      loader.classList.add("loader-hidden");
  
      loader.addEventListener("transitionend", () => {
        loader.remove();
      });
    }
  }
}

// Mobile navbar 
class MobileNavbar {
  constructor() {
    const navbarBtn = document.querySelector(".navbar-btn");
    const navbarMobile = document.querySelector(".navbar-mobile");
    const navbarLink = document.querySelectorAll(".navbar-mobile a");

    window.addEventListener("resize", resize);
    if (navbarBtn && navbarMobile) {
      navbarBtn.addEventListener("click", btnTrigger);
      navbarLink.forEach(link => link.addEventListener("click", closeNav));
    }

    function btnTrigger() {
      navbarBtn.classList.toggle("fa-bars");
      navbarBtn.classList.toggle("fa-xmark");
      navbarMobile.classList.toggle("hidden");
      navbarMobile.classList.toggle("navbar-show");
      navbarBtn.setAttribute("aria-expanded", !navbarMobile.classList.contains("hidden"));
      navbarMobile.setAttribute("aria-hidden", navbarMobile.classList.contains("hidden"));
    }

    function closeNav() {
      navbarMobile.classList.replace("navbar-show", "hidden");
      navbarBtn.classList.replace("fa-xmark", "fa-bars");
      navbarBtn.setAttribute("aria-expanded", "false");
      navbarMobile.setAttribute("aria-hidden", "true");
    }

    function resize() {
      if (window.innerWidth > 768) {
        closeNav();
      } else {
        navbarBtn.setAttribute("aria-hidden", "false");
      }
    }
  }
}

// Text animation 
class TextAnimation {
  constructor(elementSelector, texts, typingSpeed = 120, pauseTime = 750) {
    this.element = document.querySelector(elementSelector);
    if (!this.element) return;

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