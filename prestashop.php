<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'prestashop' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'prestashop' AND blog_status = 'published'");
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
                <img src="images/prestashop-development-hero.jpg"></img>
            </div>



            <!-- ####### core area of expertise ######  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Unlocking E-Commerce Potential with PrestaShop</h1>
            </div>
            <section class="expertise" data-aos="fade-up" data-aos-duration="1000">
                <div class="expertise-child">
                    <h1>Customizable E-Commerce Solutions</h1>
                    <p>We create fully customizable PrestaShop stores that cater to your specific business needs, ensuring a unique online shopping experience for your customers.</p>
                </div>
                <div class="expertise-child">
                    <h1>Enhanced User Experience Design</h1>
                    <p>Our designs prioritize user experience, focusing on intuitive navigation and layout that keep customers engaged and facilitate easier shopping.</p>
                </div>
                <div class="expertise-child">
                    <h1>Integrated Payment Gateways</h1>
                    <p>We seamlessly integrate a variety of secure payment gateways into your PrestaShop store, providing customers with flexible and secure transaction options.</p>
                </div>
                <div class="expertise-child">
                    <h1>Comprehensive Product Management</h1>
                    <p>We implement robust product management solutions that allow you to efficiently organize, track, and manage your inventory within PrestaShop.</p>
                </div>
                <div class="expertise-child">
                    <h1>Effective SEO Implementation</h1>
                    <p>Our team applies effective SEO practices tailored for PrestaShop, enhancing your online visibility and driving organic traffic to your store.</p>
                </div>
                <div class="expertise-child">
                    <h1>Ongoing Support and Maintenance</h1>
                    <p>We provide continuous support and maintenance services to ensure your PrestaShop store remains updated, secure, and optimized for performance.</p>
                </div>
            </section>






            <!-- ####### why choose us ########  -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Transforming Industries with Advanced PrestaShop Solutions</h1>
            </div>

            <div class="service_choose_us">
                <div class="services_container">

                    <!-- Service 1 - Fashion & Apparel -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Building stylish and user-friendly e-commerce sites on PrestaShop, enabling seamless browsing and purchasing experiences for fashion enthusiasts.
                            </p>
                            <img src="images/web-application-prestashop.png" alt="" />
                            <h1>Fashion & Apparel</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Beauty & Cosmetics -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Creating visually appealing PrestaShop stores tailored for beauty products, focusing on engaging layouts and intuitive shopping experiences.
                            </p>
                            <img src="images/mobile-app-prestashop.png" alt="" />
                            <h1>Beauty & Cosmetics</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Electronics -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Developing robust e-commerce platforms for electronics, offering features like product comparisons, user reviews, and secure payment options.
                            </p>
                            <img src="images/ecommerce-prestashop.png" alt="" />
                            <h1>Electronics</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Home & Garden -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Building PrestaShop sites that highlight home and garden products, featuring intuitive navigation and personalized recommendations for customers.
                            </p>
                            <img src="images/real-time-prestashop.png" alt="" />
                            <h1>Home & Garden</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Health & Wellness -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Creating e-commerce solutions in the health sector using PrestaShop, ensuring a smooth shopping experience with detailed product information.
                            </p>
                            <img src="images/pwa-prestashop.png" alt="" />
                            <h1>Health & Wellness</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - Food & Beverage -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Developing engaging PrestaShop stores for food and beverage businesses, focusing on user-friendly interfaces and efficient order management systems.
                            </p>
                            <img src="images/game-development-prestashop.png" alt="" />
                            <h1>Food & Beverage</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                </div>
            </div>




            <!-- ########## TECHNOLOGIES  #######  -->

            <div class="container" data-aos="zoom-in" data-aos-duration="1000">
                <h1>Discover the Benefits of Using PrestaShop for E-Commerce</h1>
            </div>
            <section class="work-wrapper">
                <section class="work-wrapper-child">
                    <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                        <h2>User-Friendly Dashboard</h2>
                        <p>PrestaShop features a streamlined dashboard that simplifies the management of your store, allowing you to track orders, manage inventory, and analyze performance at a glance.</p>
                    </section>
                    <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                        <h2>Strong Community Resources</h2>
                        <p>The PrestaShop community is vibrant and active, providing extensive forums, user guides, and tutorials that help users troubleshoot issues and enhance their skills.</p>
                    </section>
                    <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                        <h2>Localization and Language Support</h2>
                        <p>PrestaShop supports multiple languages and currencies, making it an ideal choice for businesses aiming to reach a global audience and cater to diverse customer needs.</p>
                    </section>
                    <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                        <h2>Seamless Integration with Shipping Carriers</h2>
                        <p>The platform offers easy integration with various shipping carriers, enabling automatic shipping calculations and tracking, which enhances the customer experience.</p>
                    </section>
                    <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                        <h2>Robust Security Features</h2>
                        <p>PrestaShop includes built-in security measures to protect customer data and transactions, ensuring that your online store remains safe and trustworthy.</p>
                    </section>
                    <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                        <h2>Mobile-First Approach</h2>
                        <p>PrestaShop themes are designed with a mobile-first approach, ensuring that your e-commerce site provides an optimal shopping experience for mobile users.</p>
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



            <!-- ##### faq #######  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1000">
                <h1>PrestaShop Development: Frequently Asked Questions</h1>
            </div>

            <section class="faq-wrapper" data-aos="zoom-in" data-aos-duration="1000">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What is PrestaShop and what makes it a popular e-commerce platform?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        PrestaShop is an open-source e-commerce platform that enables businesses to create and manage their online stores. It is popular for its flexibility, a wide range of customizable themes, and an extensive selection of modules and add-ons that enhance functionality. PrestaShop supports multiple languages and currencies, making it an ideal choice for international businesses looking to reach a global audience.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How can you customize PrestaShop stores to fit my business needs?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We offer comprehensive customization services for PrestaShop stores, including bespoke theme development, custom module creation, and user interface enhancements. Our team works closely with you to understand your brand identity and business goals, ensuring that your online store is tailored to meet your specific requirements while providing a seamless shopping experience for your customers.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What are the best practices for SEO optimization on PrestaShop?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Our SEO optimization practices for PrestaShop include optimizing product descriptions and meta tags, using clean URLs, and implementing structured data to enhance search visibility. We also focus on improving site speed, mobile responsiveness, and utilizing content marketing strategies to drive organic traffic to your store and increase conversion rates.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can you help with migrating my store to PrestaShop?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we provide professional migration services to transition your existing e-commerce store to PrestaShop. Our team ensures that all data, including products, categories, customers, and orders, are transferred accurately and securely. We also optimize your new PrestaShop store for performance and usability to ensure a smooth launch and enhanced user experience.
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