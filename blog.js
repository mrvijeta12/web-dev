document.addEventListener("DOMContentLoaded", function () {
  const pagination = document.querySelector(".pagination");
  const blogWrapper = document.getElementById("blog-wrapper");

  // Handle pagination click events
  pagination.addEventListener("click", function (e) {
    e.preventDefault(); // Prevent default anchor behavior

    if (e.target.tagName === "A" && e.target.dataset.page) {
      const page = parseInt(e.target.dataset.page, 10);
      loadBlogs(page); // Load new page content via AJAX
    }
  });

  // Function to load blogs via AJAX
  function loadBlogs(page) {
    fetch("?page=" + page + "&ajax=1") // Send the request to the same page with the new page number, and include the AJAX flag
      .then((response) => response.json()) // Get the response as JSON
      .then((data) => {
        // Update the blog wrapper with new content
        blogWrapper.innerHTML = data.content;

        // Update the pagination dynamically
        updatePagination(data.pagination);

        // Update the browser URL (without reloading the page)
        history.pushState(null, "", "?page=" + page);
      })
      .catch((error) => console.error("Error loading blogs:", error));
  }

  // Function to update the pagination links dynamically
  function updatePagination(paginationHtml) {
    pagination.innerHTML = paginationHtml;

    // Re-bind click events to the updated pagination links
    bindPaginationClickEvents();
  }

  // Function to bind click events to pagination links
  function bindPaginationClickEvents() {
    const paginationLinks = pagination.querySelectorAll("a");

    paginationLinks.forEach((link) => {
      link.addEventListener("click", function (e) {
        e.preventDefault(); // Prevent default anchor behavior
        const page = parseInt(this.dataset.page, 10); // Get the page number
        if (!isNaN(page)) {
          loadBlogs(page); // Load the new page content via AJAX
        }
      });
    });
  }

  // Initial load for the current page (either from the URL or default to page 1)
  const currentPage = parseInt(
    new URLSearchParams(window.location.search).get("page") || "1"
  );
  loadBlogs(currentPage);
});
