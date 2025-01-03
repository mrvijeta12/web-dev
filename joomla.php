<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'joomla' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'joomla' AND blog_status = 'published'");
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
                <img src="images/joomla-development-hero.jpg"></img>
            </div>



            <!-- ####### core area of expertise ######  -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Empowering Your Website with Joomla Excellence</h1>
            </div>
            <section class="expertise" data-aos="fade-up" data-aos-duration="1000">
                <div class="expertise-child">
                    <h1>Tailored Joomla Solutions</h1>
                    <p>We craft tailored Joomla solutions to meet the diverse needs of your business. Our approach focuses on customizing features and functionalities that align perfectly with your objectives.</p>
                </div>
                <div class="expertise-child">
                    <h1>User-Friendly Interface Design</h1>
                    <p>Our team designs intuitive and user-friendly interfaces for Joomla sites. We prioritize ease of navigation and accessibility, ensuring a pleasant experience for your visitors.</p>
                </div>
                <div class="expertise-child">
                    <h1>Effective Content Structuring</h1>
                    <p>We implement effective content structuring strategies to help you organize your information efficiently. This enhances user engagement and makes it easier for visitors to find what they need.</p>
                </div>
                <div class="expertise-child">
                    <h1>Seamless Migration Processes</h1>
                    <p>Our seamless migration processes ensure that your transition to Joomla is smooth and hassle-free. We handle all aspects of data transfer while maintaining content integrity and SEO value.</p>
                </div>
                <div class="expertise-child">
                    <h1>Comprehensive Analytics Integration</h1>
                    <p>We integrate comprehensive analytics solutions into your Joomla site, providing valuable insights into user behavior and site performance. This data-driven approach helps in making informed decisions.</p>
                </div>
                <div class="expertise-child">
                    <h1>Reliable Maintenance and Updates</h1>
                    <p>We offer reliable maintenance and updates for your Joomla website, ensuring it runs smoothly and securely. Our team is dedicated to keeping your site current and performing at its best.</p>
                </div>
            </section>




            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Transforming Industries with Advanced Joomla Solutions</h1>
            </div>

            <div class="service_choose_us">
                <div class="services_container">

                    <!-- Service 1 - Retail -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Creating user-friendly retail websites using Joomla, enhancing customer experience with features like inventory management and promotions.
                            </p>
                            <img src="images/web-development-joomla.png" alt="" />
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
                                Developing comprehensive real estate websites with Joomla, providing easy property listings, virtual tours, and client inquiry forms.
                            </p>
                            <img src="images/ecommerce-joomla.png" alt="" />
                            <h1>Real Estate</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Non-Profit -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Building impactful non-profit websites using Joomla, facilitating donations, event registrations, and community outreach programs.
                            </p>
                            <img src="images/education-joomla.png" alt="" />
                            <h1>Non-Profit</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Technology -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Developing innovative tech company websites with Joomla, showcasing products and services while offering customer support and insights.
                            </p>
                            <img src="images/finance-joomla.png" alt="" />
                            <h1>Technology</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Events -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Creating engaging event websites using Joomla, allowing users to register, view schedules, and get updates on upcoming events.
                            </p>
                            <img src="images/travel-joomla.png" alt="" />
                            <h1>Events</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - Food and Beverage -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Building visually appealing restaurant websites with Joomla, showcasing menus, online reservations, and customer reviews.
                            </p>
                            <img src="images/social-media-joomla.png" alt="" />
                            <h1>Food and Beverage</h1>
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
            <h1>Why Joomla is a Leading CMS Choice</h1>
        </div>
        <section class="work-wrapper">
            <section class="work-wrapper-child">
                <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                    <h2>Easy-to-Use Interface</h2>
                    <p>Joomla offers a user-friendly interface that simplifies content management, making it accessible for users with varying levels of technical expertise.</p>
                </section>
                <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                    <h2>Powerful Content Management</h2>
                    <p>With robust content management capabilities, Joomla allows for the organization of content into categories and articles, facilitating easy navigation and updates.</p>
                </section>
                <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                    <h2>Extensive Extension Library</h2>
                    <p>Joomla boasts a wide range of extensions and plugins, enabling users to enhance their website’s functionality with tools for SEO, social media, e-commerce, and more.</p>
                </section>
                <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                    <h2>Multilingual Support Built-In</h2>
                    <p>Joomla has built-in multilingual support, allowing developers to create websites that cater to diverse audiences and easily manage content in multiple languages.</p>
                </section>
                <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                    <h2>Strong Community and Resources</h2>
                    <p>The Joomla community is active and supportive, providing extensive documentation, forums, and tutorials to help users troubleshoot and optimize their websites.</p>
                </section>
                <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                    <h2>Robust User Access Control</h2>
                    <p>Joomla provides advanced user access control options, enabling site administrators to manage user roles and permissions for enhanced security and content management.</p>
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



        <!-- ##### faq #####  -->
        <div class="container" data-aos="zoom-in" data-aos-duration="1000">
            <h1>Expert Joomla Development: Frequently Asked Questions</h1>
        </div>

        <section class="faq-wrapper" data-aos="zoom-in" data-aos-duration="1000">
            <section class="faq-child">
                <section class="faq-heading">
                    <h1>What types of websites can be built with Joomla?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    Joomla is a versatile content management system that can be used to create various types of websites, including corporate sites, online magazines, e-commerce platforms, community portals, and more. Our team specializes in customizing Joomla to meet the specific needs of our clients, ensuring a tailored and effective online presence.
                </p>
            </section>

            <section class="faq-child">
                <section class="faq-heading">
                    <h1>Do you provide custom Joomla template and extension development?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    Yes, we offer custom Joomla template and extension development services. Our designers create visually appealing, responsive templates, while our developers build custom extensions to enhance functionality and meet unique business requirements, ensuring that your Joomla site stands out and operates smoothly.
                </p>
            </section>

            <section class="faq-child">
                <section class="faq-heading">
                    <h1>How do you ensure the security of Joomla websites?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    Security is a top priority for our Joomla development team. We implement best practices, including regular updates, using secure hosting environments, and applying security extensions. Additionally, we perform security audits and vulnerability assessments to protect your website from potential threats and ensure a safe browsing experience for your users.
                </p>
            </section>

            <section class="faq-child">
                <section class="faq-heading">
                    <h1>Can Joomla be integrated with other platforms and services?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    Yes, Joomla can easily be integrated with various third-party platforms and services, including CRM systems, social media, and e-commerce solutions. Our team utilizes Joomla's API capabilities and custom extensions to ensure seamless connections, enhancing your site’s functionality and user experience.
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