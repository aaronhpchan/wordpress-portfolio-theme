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