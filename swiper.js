//! #### swipper #####

var swiper = new Swiper(".mySwiper", {
  slidesPerView: 3,
  spaceBetween: 20,
  // autoplay: {
  //   delay: 2500,
  // },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    950: {
      slidesPerView: 3,
    },
    768: {
      slidesPerView: 2,
    },

    0: {
      slidesPerView: 1,
    },
  },
});

// #### FAQ #######

// Function to toggle FAQ expansion
function toggleFAQEventListener(isMobile) {
  // Select all faq-child elements
  const faqChildren = document.querySelectorAll(".faq-child");

  faqChildren.forEach((child) => {
    const faqIcon = child.querySelector(".faq-icon");
    const paragraph = child.querySelector("p");

    // Remove any previously added event listeners to avoid conflicts
    faqIcon.replaceWith(faqIcon.cloneNode(true));
    const newFaqIcon = child.querySelector(".faq-icon");

    if (isMobile) {
      // For mobile screens (below 768px), toggle content on click
      newFaqIcon.addEventListener("click", () => {
        if (child.classList.contains("expanded")) {
          paragraph.style.height = "0px";
          child.classList.remove("expanded");
        } else {
          paragraph.style.height = paragraph.scrollHeight + "px";
          child.classList.add("expanded");
        }
      });
    } else {
      // For larger screens, toggle content on hover
      newFaqIcon.addEventListener("mouseover", () => {
        paragraph.style.height = paragraph.scrollHeight + "px"; // Set height dynamically
        child.classList.add("expanded");
      });

      newFaqIcon.addEventListener("mouseout", () => {
        paragraph.style.height = "0px"; // Collapse to 0px
        child.classList.remove("expanded");
      });
    }
  });
}

// Function to detect screen size and apply appropriate event listener
function applyResponsiveFAQ() {
  const isMobile = window.matchMedia("(max-width: 768px)").matches;
  toggleFAQEventListener(isMobile);
}

// Call the function on initial load
applyResponsiveFAQ();

// Call the function again when the window is resized
window.addEventListener("resize", applyResponsiveFAQ);

//! ### pop up #####
// document.addEventListener("DOMContentLoaded", function () {
//   // Check if popup was previously closed
//   const popupClosed = localStorage.getItem("popupClosed");

//   if (!popupClosed) {
//     console.log("Popup will show after 10 seconds"); // Debug message

//     // Show the popup after 10 seconds
//     setTimeout(() => {
//       const popup = document.getElementById("contactPopup");
//       if (popup) {
//         popup.style.display = "flex";
//         console.log("Popup displayed");
//       } else {
//         console.log("Popup element not found");
//       }
//     }, 10000); // 10 seconds
//   } else {
//     console.log("Popup was previously closed, not displaying again");
//   }

//   // Close the popup when the close button is clicked
//   const closeButton = document.getElementById("closePopup");
//   if (closeButton) {
//     closeButton.addEventListener("click", function () {
//       document.getElementById("contactPopup").style.display = "none";
//       // Store popup closed state in local storage
//       localStorage.setItem("popupClosed", "true");
//       console.log("Popup closed and localStorage updated");
//     });
//   } else {
//     console.log("Close button not found");
//   }
// });

//! ##### animated counter ####

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

//! cards
// Simulate redirect behavior (for demo purposes)
window.onload = function () {
  if (window.location.href.indexOf("cards-page.html") > -1) {
    document.getElementById("cards-page").classList.remove("hidden");
  }
};

//! ## home page flipcart ###
// // Select all work-child elements
// const workChildren = document.querySelectorAll(".collaboration-child");
// // console.log(workChildren);

// // Add hover event listeners to each work-child
// workChildren.forEach((child) => {
//   child.addEventListener("mouseenter", () => {
//     const paragraph = child.querySelector("p");
//     paragraph.style.display = "block";
//     child.classList.add("expanded");
//   });

//   child.addEventListener("mouseleave", () => {
//     const paragraph = child.querySelector("p");
//     // paragraph.style.display = "none";
//     child.classList.remove("expanded");
//   });
// });

const workChildren = document.querySelectorAll(".collaboration-child");

// Function to add hover and click event listeners based on screen size
function applyEvents() {
  const isMobile = window.matchMedia("(max-width: 768px)").matches;

  workChildren.forEach((child) => {
    const icon = child.querySelector("h2 span"); // Select the icon inside the heading
    const paragraph = child.querySelector("p");

    if (isMobile) {
      // If on mobile, add click event listener to the icon
      icon.addEventListener("click", () => {
        // Check if this child is already shown
        const isShown = child.classList.contains("shown");

        // Collapse all children first
        workChildren.forEach((c) => {
          c.classList.remove("shown");
          c.querySelector("p").style.display = "none"; // Hide all paragraphs
        });

        // If this child wasn't shown, activate it
        if (!isShown) {
          child.classList.add("shown");
          paragraph.style.display = "block"; // Show the paragraph of the clicked child
        }
      });

      // Ensure paragraph is hidden initially
      paragraph.style.display = "none";
    } else {
      // If on larger screens, add mouseenter and mouseleave events
      child.addEventListener("mouseenter", () => {
        paragraph.style.display = "block";
        child.classList.add("shown");
      });

      child.addEventListener("mouseleave", () => {
        paragraph.style.display = "none";
        child.classList.remove("shown");
      });
    }
  });
}

// Call the function on initial load
applyEvents();

// Call the function again when the window is resized
window.addEventListener("resize", applyEvents);

//! #### industry hierarchy section ####

function toggleContent(active) {
  // Get all content sections
  const contents = document.querySelectorAll(".content");
  const activeContent = document.getElementById("content" + active);

  // Hide all content and reset height
  contents.forEach((content) => {
    if (content === activeContent) {
      // If it is already active, collapse it
      if (content.classList.contains("active")) {
        content.classList.remove("active");
      } else {
        content.classList.add("active");
      }
    } else {
      // Collapse other contents
      content.classList.remove("active");
    }
  });

  // Remove active class from all tabs
  const tabs = document.querySelectorAll(".tab");
  tabs.forEach((tab) => {
    tab.classList.remove("active-tab");
  });

  // Add active class to the clicked tab
  tabs[active - 1].classList.add("active-tab");
}

// Ensure that no content is open by default on mobile view
document.addEventListener("DOMContentLoaded", () => {
  const contents = document.querySelectorAll(".content");
  const tabs = document.querySelectorAll(".tab");

  if (window.innerWidth < 768) {
    contents.forEach((content) => {
      content.classList.remove("active"); // Remove active class
    });
    tabs.forEach((tab) => {
      tab.classList.remove("active-tab"); // Remove active class from tabs
    });
  } else {
    toggleContent(1); // Activate the first tab only on larger screens
  }
});

// Add click event to each content header to handle expanding and collapsing
const contentHeaders = document.querySelectorAll(
  ".content-header .fa-angle-right"
);
contentHeaders.forEach((icon, index) => {
  icon.addEventListener("click", (event) => {
    // Prevent the event from bubbling up to the parent elements
    event.stopPropagation();

    // Only toggle if the clicked icon's content is not already active
    const content = document.getElementById("content" + (index + 1));
    if (!content.classList.contains("active")) {
      toggleContent(index + 1);
    } else {
      content.classList.remove("active"); // Toggle off the active content if it's already open
    }
  });
});

//! ####### who can avail scroll ######

const contentContainer = document.getElementById("scrollable-content");
const imageContainer = document.getElementById("image-scroll");

// Speed multiplier to adjust scroll speed
const scrollSpeed = 0.75;

// Function to handle scroll events on the content container
function handleScroll(event) {
  const isAtTop = contentContainer.scrollTop === 0;
  const isAtBottom =
    contentContainer.scrollTop + contentContainer.clientHeight >=
    contentContainer.scrollHeight - 1;

  if (!isAtTop && !isAtBottom) {
    // If not at the top or bottom, scroll the content container
    event.preventDefault();
    contentContainer.scrollBy({
      top: event.deltaY * scrollSpeed, // Adjust scroll speed by multiplying deltaY
      behavior: "auto", // Use "auto" to make the scroll faster and smoother
    });
  } else {
    // If at the top or bottom, allow the page to scroll naturally
    if ((isAtTop && event.deltaY < 0) || (isAtBottom && event.deltaY > 0)) {
      // Allow the main page to scroll only when we reach the top or bottom
      event.stopPropagation();
    } else {
      // Prevent page scroll when not at the boundaries
      event.preventDefault();
      contentContainer.scrollBy({
        top: event.deltaY * scrollSpeed,
        behavior: "auto",
      });
    }
  }
}

// Function to add or remove the scroll event listeners based on screen width
function updateScrollBehavior() {
  if (window.innerWidth > 650) {
    // Add scroll event listeners for screens above 650px
    imageContainer.addEventListener("wheel", handleScroll);
    contentContainer.addEventListener("wheel", handleScroll);
  } else {
    // Remove scroll event listeners for screens below 650px
    imageContainer.removeEventListener("wheel", handleScroll);
    contentContainer.removeEventListener("wheel", handleScroll);
  }
}

updateScrollBehavior();
window.addEventListener("resize", updateScrollBehavior);
