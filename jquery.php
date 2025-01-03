<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'jquery' AND blog_status = 'published' 
        ORDER BY id DESC 
        LIMIT $blogsPerPage OFFSET $offset";
$result = $conn->query($sql);

// Check if the query was successful
if ($result === false) {
    die("SQL Error: " . $conn->error); // Output the error message
}

$contents = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $contents[] = $row;
    }
} else {
    $contents[] = ["id" => 0, "slug" => "No content found.", "summary" => "", "social_sharing_image" => ""]; // Empty placeholder
}

// Count total blogs for pagination
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'jquery' AND blog_status = 'published'");
$totalBlogs = $totalBlogsResult->fetch_assoc()['total'];
$totalPages = ceil($totalBlogs / $blogsPerPage); // Total number of pages

$conn->close();

// Check if it's an AJAX request to return only the blog wrapper and pagination
if (isset($_GET['ajax']) && $_GET['ajax'] === '1') {
    echo json_encode([
        'content' => renderBlogs($contents),
        'pagination' => renderPagination($currentPage, $totalPages)
    ]);
    exit();
}

// Helper function to render the blogs
function renderBlogs($blogs)
{
    $html = '';
    foreach ($blogs as $row) {
        $slug = htmlspecialchars($row['slug']);
        $summary = htmlspecialchars($row['summary']);
        $featureImage = !empty($row['social_sharing_image']) ? 'admin/' . htmlspecialchars($row['social_sharing_image']) : 'default-image.png';

        $html .= "<div class='content-container'>
                    <div class='image-container'>
                        <img src='{$featureImage}' alt='Feature Image'>
                    </div>
                    <div class='text-content'>
                        <h2>{$slug}</h2>
                        <a href='insights/{$slug}' class='read-more'>Read More <img src='images/right-arrow.svg' alt='' id='arrow'></a>
                    </div>
                </div>";
    }

    return $html;
}

// Helper function to render the pagination
function renderPagination($currentPage, $totalPages)
{
    $pagination = '';

    if ($currentPage > 1) {
        $pagination .= "<a href='#' class='prev' data-page='" . ($currentPage - 1) . "'>Previous</a>";
    }

    for ($i = 1; $i <= $totalPages; $i++) {
        $pagination .= "<a href='#' class='" . ($i === $currentPage ? 'active' : '') . "' data-page='{$i}'>{$i}</a>";
    }

    if ($currentPage < $totalPages) {
        $pagination .= "<a href='#' class='next' data-page='" . ($currentPage + 1) . "'>Next</a>";
    }

    return $pagination;
}

?>
<!DOCTYPE php>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="assests/css/expertise.css">
    <link rel="stylesheet" href="assests/css/theme.css">
    <link rel="stylesheet" href="assests/css/navbar.css">
    <link rel="stylesheet" href="assests/css/footer.css">
    <!-- Swiper CSS CDN for carousel/slider functionality -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <script src="https://kit.fontawesome.com/cdf9a174a4.js" crossorigin="anonymous"></script>



</head>

<body>
    <div>
        <?php
        include('navbar.php');
        ?>
        <div class="wrapper">

            <!-- ######### HERO SECTION ##########  -->
            <div class="hero-section">
                <div class="hero-content" data-aos="fade-down" data-aos-duration="1000">
                    <h1 class="animated-heading">
                        Innovative React.JS Development
                    </h1>
                    <p>
                        Empowering businesses with fast, efficient, and maintainable web
                        solutions
                    </p>
                    <a href="#" class="reopenPopup">Consult Our Experts</a>
                </div>
            </div>

            <!-- Image Wrapper with Full Image Section Inside -->
            <div class="image-wrapper">
                <img src="images/jquery-development-hero.jpg"></img>
            </div>



            <!-- ####### core area of expertise ######  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Enhancing Web Interactivity with jQuery</h1>
            </div>
            <section class="expertise" data-aos="fade-up" data-aos-duration="1000">
                <div class="expertise-child">
                    <h1>Simplified DOM Manipulation</h1>
                    <p>We leverage jQuery's powerful features to simplify DOM manipulation, making it easy to create dynamic and interactive web applications that respond to user interactions seamlessly.</p>
                </div>
                <div class="expertise-child">
                    <h1>Effortless Event Handling</h1>
                    <p>Our team utilizes jQuery to streamline event handling, allowing us to easily manage user interactions such as clicks, hovers, and form submissions, resulting in a more engaging user experience.</p>
                </div>
                <div class="expertise-child">
                    <h1>AJAX Integration for Dynamic Content</h1>
                    <p>We implement AJAX techniques using jQuery to load content dynamically without refreshing the page. This enhances user experience by providing smoother interactions and faster data retrieval.</p>
                </div>
                <div class="expertise-child">
                    <h1>Animation and Effects</h1>
                    <p>Our expertise includes creating visually appealing animations and effects with jQuery, enhancing the overall look and feel of your web application and captivating users' attention.</p>
                </div>
                <div class="expertise-child">
                    <h1>Cross-Browser Compatibility</h1>
                    <p>We ensure that our jQuery implementations maintain cross-browser compatibility, providing a consistent user experience across different browsers and devices, thereby maximizing reach.</p>
                </div>
                <div class="expertise-child">
                    <h1>Plugin Development and Customization</h1>
                    <p>We specialize in developing and customizing jQuery plugins to extend functionality tailored to your needs, enabling you to leverage the full potential of jQuery in your applications.</p>
                </div>
            </section>






            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Innovative Solutions Across Industries Using jQuery</h1>
            </div>

            <div class="service_choose_us">
                <div class="services_container">

                    <!-- Service 1 - Retail -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Enhancing customer shopping experiences with interactive retail websites, simplifying product browsing and checkout processes using jQuery.
                            </p>
                            <img src="images/web-development-jquery.png" alt="" />
                            <h1>Retail</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Real Estate -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Developing dynamic real estate platforms that utilize jQuery for interactive listings, property comparisons, and user-friendly navigation.
                            </p>
                            <img src="images/ecommerce-jquery.png" alt="" />
                            <h1>Real Estate</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Insurance -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Creating user-friendly insurance portals using jQuery for policy management, claim submissions, and real-time updates for clients.
                            </p>
                            <img src="images/finance-jquery.png" alt="" />
                            <h1>Insurance</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Entertainment -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Building interactive entertainment websites that leverage jQuery for ticket bookings, event schedules, and user reviews.
                            </p>
                            <img src="images/travel-jquery.png" alt="" />
                            <h1>Entertainment</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Non-Profit -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Developing engaging non-profit platforms using jQuery to facilitate donations, event management, and volunteer sign-ups with ease.
                            </p>
                            <img src="images/social-media-jquery.png" alt="" />
                            <h1>Non-Profit</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - Fitness -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Creating interactive fitness applications with jQuery to enhance user engagement through workout tracking, progress visualization, and community features.
                            </p>
                            <img src="images/gaming-jquery.png" alt="" />
                            <h1>Fitness</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                </div>
            </div>



        </div>
        <!-- ########## TECHNOLOGIES  #######  -->

        <div class="container" data-aos="zoom-in" data-aos-duration="1000">
            <h1>Why jQuery Remains Essential for Web Development</h1>
        </div>
        <section class="work-wrapper">
            <section class="work-wrapper-child">
                <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                    <h2>Simplified DOM Manipulation</h2>
                    <p>jQuery streamlines the process of selecting and manipulating DOM elements, allowing developers to create dynamic web pages with minimal code.</p>
                </section>
                <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                    <h2>Cross-Browser Compatibility</h2>
                    <p>jQuery handles many cross-browser inconsistencies, ensuring that applications function correctly on different browsers without extra effort from developers.</p>
                </section>
                <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                    <h2>Efficient Event Handling</h2>
                    <p>With jQuery, attaching event handlers becomes straightforward, enabling developers to create interactive features like animations and user feedback easily.</p>
                </section>
                <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                    <h2>Rich Plugin Ecosystem</h2>
                    <p>jQuery has a vast ecosystem of plugins that extend its functionality, allowing developers to implement features like sliders, modals, and form validation effortlessly.</p>
                </section>
                <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                    <h2>AJAX Simplified</h2>
                    <p>jQuery simplifies AJAX calls, making it easier to send and receive data asynchronously, which enhances user experience by loading content dynamically.</p>
                </section>
                <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                    <h2>Active Community and Resources</h2>
                    <p>The jQuery community is large and supportive, providing ample resources, tutorials, and forums to help developers solve problems and learn new techniques.</p>
                </section>
            </section>
        </section>




        <!-- ######### Process ##########  -->

        <div class="container">
            <h1 data-aos="zoom-in" data-aos-duration="1000">
                Our Methodology for Building High-Quality React.js Websites</h1>

        </div>

        <div class="swiper mySwiper">

            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="swiper-slide-image">
                        <img src="images/project-analysis-health.png" alt="">

                    </div>
                    <h2>Project analysis</h2>
                    <p>In-depth analysis of requirements and goals to ensure successful project outcomes and stakeholder satisfaction.</p>
                </div>
                <div class="swiper-slide">
                    <div class="swiper-slide-image">
                        <img src="images/design-health.png" alt="">

                    </div>
                    <h2>Design</h2>
                    <p>Creating intuitive and engaging designs that enhance user experience and reflect brand identity effectively.</p>
                </div>
                <div class="swiper-slide">
                    <div class="swiper-slide-image">
                        <img src="images/development-health.png" alt="">

                    </div>
                    <h2>Development</h2>
                    <p>Implementing robust front-end and back-end solutions to deliver a seamless, functional, and responsive website.</p>
                </div>
                <div class="swiper-slide">
                    <div class="swiper-slide-image">
                        <img src="images/testing-health.png" alt="">

                    </div>
                    <h2>Testing</h2>
                    <p>Conducting comprehensive testing to identify and resolve issues, ensuring high-quality performance and user satisfaction.</p>
                </div>
                <div class="swiper-slide">
                    <div class="swiper-slide-image">
                        <img src="images/project-launch-health.png" alt="">

                    </div>
                    <h2>Project Launch</h2>
                    <p>Coordinating all launch activities to ensure a successful website debut and positive initial user experience.</p>
                </div>
                <div class="swiper-slide">
                    <div class="swiper-slide-image">
                        <img src="images/maintance-and-support-health.png" alt="">

                    </div>
                    <h2>Maintanace and Support</h2>
                    <p>Providing ongoing support and updates to enhance performance, security, and user satisfaction post-launch.</p>
                </div>















            </div>
            <div class="swiper-pagination"></div>


        </div>


        <!-- ######## testimonial######## -->


        <section class="testimonial_wrapper">
            <h1 data-aos="zoom-in" data-aos-duration="1000"><span><i class="fa-regular fa-comments"></i></span> Hear From Our Valued Clients</h1>



            <div class="testimonial_slider">
                <div class="testimonial_item" data-aos="fade-up" data-aos-duration="1000">

                    <img src="images/9.jpg" alt="">
                    <img src="images/double-main.png" alt="" class="double">
                    <p>TekAlgo’s Salesforce expertise boosted our sales efficiency and team productivity. Their tailored solutions made a significant difference. Highly recommended!</p>
                    <h5>John Doe</h5>
                    <p>CEO, Company</p>
                </div>
                <div class="testimonial_item" data-aos="fade-up" data-aos-duration="1000">
                    <img src="images/2.jpg" alt="">
                    <img src="images/double-main.png" alt="" class="double">
                    <p>TekAlgo transformed our CRM with seamless Salesforce integration. Exceptional service, knowledgeable team, and tangible results. We’re extremely satisfied! </p>
                    <h5>John Doe</h5>
                    <p>CEO, Company</p>
                </div>
                <div class="testimonial_item" data-aos="fade-up" data-aos-duration="1000">

                    <img src="images/4.jpg" alt="">
                    <img src="images/double-main.png" alt="" class="double">
                    <p>TekAlgo’s Salesforce solutions enhanced our customer management. The team is responsive, professional, and delivered beyond our expectations. Outstanding experience! </p>
                    <h5>John Doe</h5>
                    <p>CEO, Company</p>
                </div>
            </div>
        </section>

        <!-- ####### blog #####  -->

        <div class="container" data-aos="zoom-in" data-aos-duration="1000">
            <h1>Exploring Industry Trends, Ideas, and Real-World Solutions</h1>

        </div>

        <div class="blog-wrapper" id="blog-wrapper" data-aos="fade-up" data-aos-duration="1000">
            <!-- Blog content will be injected dynamically -->
            <?php echo renderBlogs($contents); ?>
        </div>

        <!-- Pagination Links -->
        <div class="pagination" id="pagination">
            <?php echo renderPagination($currentPage, $totalPages); ?>
        </div>

        <!-- ##### faq ####  -->
        <div class="container" data-aos="zoom-in" data-aos-duration="1000">
            <h1>jQuery Development: Frequently Asked Questions</h1>
        </div>

        <section class="faq-wrapper" data-aos="zoom-in" data-aos-duration="1000">
            <section class="faq-child">
                <section class="faq-heading">
                    <h1>What is jQuery and why is it used?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    jQuery is a fast, small, and feature-rich JavaScript library that simplifies HTML document traversing, event handling, and animation. It is widely used for simplifying JavaScript coding, making it easier to manipulate the DOM, handle events, and create animations, ultimately enhancing user experience on web pages.
                </p>
            </section>

            <section class="faq-child">
                <section class="faq-heading">
                    <h1>What are the advantages of using jQuery in web development?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    jQuery offers several advantages, including cross-browser compatibility, reduced code complexity, and a large ecosystem of plugins. It allows developers to write less code to accomplish common tasks, which can significantly speed up development time and improve productivity while ensuring consistent behavior across different browsers.
                </p>
            </section>

            <section class="faq-child">
                <section class="faq-heading">
                    <h1>How does jQuery improve website performance?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    jQuery improves website performance by allowing developers to efficiently handle DOM manipulations and events, which can lead to faster loading times and smoother user interactions. Additionally, by utilizing jQuery’s built-in methods for AJAX requests, developers can load data asynchronously without refreshing the page, enhancing the overall user experience.
                </p>
            </section>

            <section class="faq-child">
                <section class="faq-heading">
                    <h1>Can jQuery be integrated with other JavaScript frameworks?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    Yes, jQuery can be integrated with other JavaScript frameworks like Angular, React, and Vue.js. While these frameworks handle DOM manipulation in their own ways, jQuery can be used for specific tasks that may require simpler syntax or when working with legacy code. Our team ensures smooth integration while maintaining best practices for performance and maintainability.
                </p>
            </section>
        </section>





        <!-- ##### Book #######  -->

        <section class="book" data-aos="fade-up" data-aos-duration="1000">
            <h1>Let’s Begin Your Project Together!</h1>
            <a href="./contact.php">Contact us</a>
        </section>




















    </div>
    <?php include('footer.php'); ?>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="./swiper.js"></script>
    <script src="./blog.js"></script>
    <?php include('pop.php'); ?>
    </div>




</body>

</html>