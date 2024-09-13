// ################ swipper ###############

var swiper = new Swiper(".mySwiper", {
  slidesPerView: 3, // Default number of slides for larger screens
  spaceBetween: 20,
  autoplay: {
    delay: 2500,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    // When the screen is <= 768px
    768: {
      slidesPerView: 3, // Show 2 slides for screens smaller than or equal to 768px
      spaceBetween: 20,
    },
    593: {
      slidesPerView: 2, // Show 2 slides for screens smaller than or equal to 768px
      spaceBetween: 20,
    },
    // When the screen is <= 480px
    0: {
      slidesPerView: 1, // Show 1 slide for screens smaller than or equal to 480px
      spaceBetween: 20,
    },
  },
});

// ############### animated counter ##############

const counters = document.querySelectorAll(".counter");

const animateCounter = (counter) => {
  const count = counter.querySelector(".count");

  const updateCounter = () => {
    const target = +counter.getAttribute("data-target");
    const current = +count.innerText;
    const increment = target / 200;

    if (current < target) {
      count.innerText = Math.ceil(current + increment);
      setTimeout(updateCounter, 1);
    } else {
      count.innerText = target;
    }
  };

  updateCounter();
};

const checkScroll = () => {
  const triggerHeight = window.innerHeight / 1.1; // Adjust to trigger earlier or later

  counters.forEach((counter) => {
    const top = counter.getBoundingClientRect().top;

    if (top < triggerHeight && !counter.classList.contains("visible")) {
      counter.classList.add("visible");
      animateCounter(counter);
    }
  });
};

window.addEventListener("scroll", checkScroll);
window.addEventListener("load", checkScroll); // Check on page load in case already in view

// ################ navbar ######################

const navLinks = document.querySelector(".nav-links");

menuToggle.addEventListener("click", () => {
  navLinks.classList.toggle("active");
});
