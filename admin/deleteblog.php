<?php
include_once "session.php";
check_login();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Management</title>
    <link rel="stylesheet" href="assets/css/deleteblog.css">
    <script>
        // Function to fetch blogs dynamically based on the selected category
        function fetchBlogs(category) {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `fetch_blogs.php?category=${encodeURIComponent(category)}`, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    const blogs = JSON.parse(xhr.responseText);
                    renderBlogs(blogs);
                }
            };
            xhr.send();
        }



        function renderBlogs(blogs) {
            const container = document.getElementById('blog-container');
            container.innerHTML = ''; // Clear existing content

            if (blogs.length === 0) {
                container.innerHTML = '<p>No blogs found for this category.</p>';
                return;
            }

            // Create a table element
            const table = document.createElement('table');
            table.className = 'blog-table';

            // Create the table header
            table.innerHTML = `
        <thead>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody></tbody>
    `;

            const tbody = table.querySelector('tbody');

            // Append each blog as a row inside the table body
            blogs.forEach((blog, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
            <td>${index + 1}</td>
            <td>${blog.slug}</td>
            <td>${blog.category}</td>
            <td>
                <form method="POST" action="deletebloglogic.php" class="delete-form">
                    <input type="hidden" name="delete-id" value="${blog.id}">
                    <button type="submit" class="delete-button">Delete</button>
                </form>
            </td>
        `;
                tbody.appendChild(row);
            });

            // Append the table to the container
            container.appendChild(table);
        }


        // Event listener for category selection
        document.addEventListener('DOMContentLoaded', () => {
            const categorySelect = document.getElementById('category');

            // Fetch blogs for the default "blog" category on load
            fetchBlogs('blog');

            // Fetch blogs for the selected category on change
            categorySelect.addEventListener('change', () => {
                const selectedCategory = categorySelect.value;
                fetchBlogs(selectedCategory);
            });
        });
    </script>
</head>

<body>
    <?php include "navbar.php"; ?>

    <!-- Blog Pages -->
    <div class="wrapper">
        <div class="child child1">


            <?php include "sidebar.php"; ?>

        </div>

        <div class="child child2">
            <div class="form-group">
                <label for="category">Choose Category:-</label>
                <select id="category" name="category" class="category">
                    <optgroup label="Main Page">
                        <option value="home">Home</option>
                        <option value="services">Services</option>
                        <option value="blog" selected>Blog</option>
                        <option value="contact-us">Contact Us</option>

                    </optgroup>
                    <optgroup label="Industries">
                        <option value="on-demand">On Demand</option>
                        <option value="healthcare">Healthcare</option>
                        <option value="restaurant">Restaurant</option>
                        <option value="entertainment">Entertainment</option>
                        <option value="travel">Travel</option>
                        <option value="oil-and-gas">Oil and Gas</option>
                        <option value="telecom">Telecom</option>
                        <option value="construction">Construction</option>
                        <option value="ecommerce">eCommerce</option>
                        <option value="saas">SaaS</option>
                        <option value="finance">Finance</option>
                        <option value="social-networking">Social Networking</option>
                        <option value="banking">Banking</option>
                        <option value="insurance">Insurance</option>
                        <option value="retail">Retail</option>
                        <option value="real-estate">Real Estate</option>
                        <option value="education">Education</option>
                        <option value="news">News</option>
                        <option value="logistics">Logistics</option>
                        <option value="agriculture">Agriculture</option>
                        <option value="manufacturing">Manufacturing</option>
                    </optgroup>
                    <optgroup label="Offshore Experts">

                        <option value="html-developer">HTML Developer</option>
                        <option value="javascript-developer">JavaScript Developer</option>
                        <option value="angularjs-developer">AngularJS Developer</option>
                        <option value="reactjs-developer">ReactJS Developer</option>
                        <option value="vuejs-developer">VueJS Developer</option>
                        <option value="wordpress-developer">WordPress</option>
                        <option value="drupal-developer">Drupal</option>
                        <option value="joomla-developer">Joomla</option>
                        <option value="magneto-developer">Magneto</option>
                        <option value="shopify-developer">Shopify</option>
                        <option value="prestashop-developer">PrestaShop</option>
                        <option value="php-developer">PHP</option>
                        <option value="codeigniter-developer">CodeIgniter</option>
                        <option value="laravel-developer">Laravel</option>
                        <option value="nodejs-developer">NodeJS</option>
                        <option value="web-developer">Web Developer</option>

                    </optgroup>

                    <optgroup label="Our Expertise">
                        <option value="frontend-development">Frontend Development</option>
                        <option value="angularjs">Angular.js</option>
                        <option value="reactjs">React.js</option>
                        <option value="javascript">JavaScript</option>
                        <option value="vuejs">Vue.js</option>
                        <option value="wordpress">WordPress</option>
                        <option value="drupal">Drupal</option>
                        <option value="joomla">Joomla</option>
                        <option value="php">PHP</option>
                        <option value="codeigniter">CodeIgniter</option>
                        <option value="laravel">Laravel</option>
                        <option value="nodejs">NodeJS</option>
                        <option value="pwa">PWA</option>
                        <option value="jquery">jQuery</option>
                        <option value="python">Python</option>
                        <option value="mern-stack">MERN Stack</option>
                        <option value="mean-stack">MEAN Stack</option>
                        <option value="magneto">Magneto</option>
                        <option value="shopify">Shopify</option>
                        <option value="prestashop">PrestaShop</option>


                    </optgroup>


                    <optgroup label="Web Services">
                        <option value="cms">CMS</option>
                        <option value="erp">ERP</option>
                        <option value="crm">CRM</option>
                        <option value="lms">LMS</option>
                        <option value="e-commerce">E-COMMERCE</option>
                        <option value="pim">PIM</option>
                        <option value="bpm">BPM</option>
                        <option value="scm">SCM</option>
                        <option value="hrm">HRM</option>
                        <option value="dms">DMS</option>
                        <option value="bi">BI</option>
                        <option value="web-app-dev">Web App Dev</option>
                        <option value="cxm">CXM</option>
                        <option value="booking-and-reservation">Booking & Reservation</option>



                    </optgroup>
                </select>

                <!-- Blog Content -->
                <div id="blog-container"></div>
            </div>

        </div>
    </div>


</body>

</html>