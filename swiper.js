// ################ swipper ###############

var swiper = new Swiper(".mySwiper", {
  slidesPerView: 3, // Default number of slides for larger screens
  spaceBetween: 20,
  // autoplay: {
  //   delay: 2500,
  // },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    // When the screen is <= 768px
    800: {
      slidesPerView: 3, // Show 2 slides for screens smaller than or equal to 768px
      // spaceBetween: 20,
    },
    593: {
      slidesPerView: 2, // Show 2 slides for screens smaller than or equal to 768px
      // spaceBetween: 20,
    },
    // When the screen is <= 480px
    0: {
      slidesPerView: 1, // Show 1 slide for screens smaller than or equal to 480px
      // spaceBetween: 20,
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

// const navLinks = document.querySelector(".nav-links");

// menuToggle.addEventListener("click", () => {
//   navLinks.classList.toggle("active");
// });

// cards
// Simulate redirect behavior (for demo purposes)
window.onload = function () {
  if (window.location.href.indexOf("cards-page.html") > -1) {
    document.getElementById("cards-page").classList.remove("hidden");
  }
};

// function showContent(cardNumber) {

//   document
//     .querySelectorAll(".card")
//     .forEach((card) => card.classList.remove("active"));

//   document
//     .querySelector(`.card-container a:nth-child(${cardNumber}) .card`)
//     .classList.add("active");

//   document
//     .querySelectorAll(".content-container")
//     .forEach((content) => content.classList.add("hidden"));

//   document.getElementById(`content-${cardNumber}`).classList.remove("hidden");
// }

//scroll
// JavaScript for scroll functionality
// const topDiv = document.getElementById("top-div");
// const bottomDiv = document.getElementById("bottom-div");

// topDiv.addEventListener("click", function () {
//   bottomDiv.scrollIntoView({ behavior: "smooth" });
// });

// ########### home page flipcart ###########

// Select all work-child elements
const workChildren = document.querySelectorAll(".collaboration-child");
console.log(workChildren);

// Add hover event listeners to each work-child
workChildren.forEach((child) => {
  child.addEventListener("mouseenter", () => {
    const paragraph = child.querySelector("p");
    paragraph.style.display = "block";
    child.classList.add("expanded");
  });

  child.addEventListener("mouseleave", () => {
    const paragraph = child.querySelector("p");
    // paragraph.style.display = "none";
    child.classList.remove("expanded");
  });
});

// ########## industry details #############

function toggleContent(active) {
  // Hide all content
  const contents = document.querySelectorAll(".content");
  contents.forEach((content) => {
    content.classList.remove("active");
  });

  // Remove active class from all tabs
  const tabs = document.querySelectorAll(".tab");
  tabs.forEach((tab) => {
    tab.classList.remove("active-tab");
  });

  // Show the selected content
  document.getElementById("content" + active).classList.add("active");
  // Add active class to the clicked tab
  document.querySelectorAll(".tab")[active - 1].classList.add("active-tab");
}

// Ensure the first tab is active on page load
document.addEventListener("DOMContentLoaded", () => {
  toggleContent(1); // Activate the first tab
});

// ####### who can avail ######
// JavaScript to handle scrolling synchronization
const contentContainer = document.getElementById("scrollable-content");
const imageContainer = document.getElementById("image-scroll");

// Speed multiplier to adjust scroll speed
const scrollSpeed = 1; // Increase this value to make the scroll faster

// Function to handle scroll events on both containers
function handleScroll(event) {
  const isAtTop = contentContainer.scrollTop === 0;
  const isAtBottom =
    contentContainer.scrollHeight - contentContainer.scrollTop ===
    contentContainer.clientHeight;

  if ((event.deltaY < 0 && !isAtTop) || (event.deltaY > 0 && !isAtBottom)) {
    // If not at the top or bottom, scroll the content container
    event.preventDefault();
    contentContainer.scrollBy({
      top: event.deltaY * scrollSpeed, // Adjust scroll speed by multiplying deltaY
      behavior: "auto", // Use "auto" to make the scroll faster and smoother
    });
  } else {
    // Allow page scroll only when the content is fully scrolled
    event.stopPropagation();
  }
}

// Attach the scroll event listener to both the image and content containers
imageContainer.addEventListener("wheel", handleScroll);
contentContainer.addEventListener("wheel", handleScroll);
