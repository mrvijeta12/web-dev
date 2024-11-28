<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'ecommerce' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'ecommerce' AND blog_status = 'published'");
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
    <link rel="stylesheet" href="assests/css/industry.css">
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
        <div class="wrapper" data-aos="fade-right" data-aos-duration="1000">

            <!-- ################################# HERO SECTION ##################################  -->
            <div class="hero">
                <div class="child child1">
                    <h1 class="animated-heading">
                        <span>E</span><span>-</span><span>C</span><span>o</span><span>m</span><span>m</span><span>e</span><span>r</span><span>c</span><span>e</span>

                        <span>S</span><span>o</span><span>f</span><span>t</span><span>w</span><span>a</span><span>r</span><span>e</span> <span>D</span><span>e</span><span>v</span><span>e</span><span>l</span><span>o</span><span>p</span><span>m</span><span>e</span><span>n</span><span>t</span> <span>S</span><span>e</span><span>r</span><span>v</span><span>i</span><span>c</span><span>e</span><span>s</span>
                    </h1>
                    <h3>Driving Sales with Innovative E-Commerce Software Solutions</h3>
                    <a href="#" class="reopenPopup">Get Free Quote</a>

                </div>
                <div class="child child2">
                    <img src="images/e-commerce-hero.png" alt="" data-aos="fade-left" data-aos-duration="1000" />
                </div>
            </div>

            <!-- ####### INTRODUCTION  ####### -->

            <section class="intro">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Revolutionizing Online Retail with Our E-commerce Software Development Solutions</h1>
                <p data-aos="fade-up" data-aos-duration="1000">Our software development services for the e-commerce industry are designed to enhance customer experiences, streamline operations, and boost sales growth. By leveraging the latest technology, data analytics, and user-centric design, we empower online retailers to create seamless shopping experiences, optimize their digital platforms, and stay ahead in the competitive world of e-commerce.</p>
            </section>


            <!-- ####### details ####### -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">
                    Process We Follow To Develop E-Commerce Software</h1>

            </div>
            <section class="detail" data-aos="fade-up" data-aos-duration="1000">
                <section class="detail-title detail-child">
                    <p class="tab active-tab" onclick="toggleContent(1)">
                        <strong>01.</strong> eCommerce Software Consulting

                    </p>
                    <p class="tab" onclick="toggleContent(2)">
                        <strong>02.</strong> Custom eCommerce Software Development

                    </p>
                    <p class="tab" onclick="toggleContent(3)">
                        <strong>03.</strong> eCommerce Software Product Development

                    </p>
                    <p class="tab" onclick="toggleContent(4)">
                        <strong>04.</strong> eCommerce Software Integration

                    </p>
                    <p class="tab" onclick="toggleContent(5)">
                        <strong>05.</strong> eCommerce Software Testing and Quality Assurance

                    </p>
                    <p class="tab" onclick="toggleContent(6)">
                        <strong>06.</strong> eCommerce Software Modernization

                    </p>
                    <p class="tab" onclick="toggleContent(7)">
                        <strong>07.</strong> eCommerce Software Maintenance and Support

                    </p>
                </section>
                <section class="detail-description detail-child">
                    <section id="content1" class="content">
                        <div class="content-header">
                            <img src="images/consultation.png" alt="">
                            <h3>eCommerce Software Consulting</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We assess your eCommerce business model and technological needs, providing strategic guidance for developing customized software solutions. Our consulting services identify opportunities for growth, optimize operations, and establish a solid foundation for successful software implementation.</p>
                    </section>
                    <section id="content2" class="content">
                        <div class="content-header">
                            <img src="images/software-development-process.png" alt="">
                            <h3>Custom eCommerce Software Development</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We specialize in developing tailored software solutions that meet the specific requirements of your eCommerce platform. From initial coding to deploying unique features, our development process ensures your software enhances user experience and boosts sales.</p>
                    </section>
                    <section id="content3" class="content">
                        <div class="content-header">
                            <img src="images/development.png" alt="">
                            <h3>eCommerce Software Product Development</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We focus on creating scalable, market-ready software products for the eCommerce industry, turning your innovative ideas into reality. Our product development services deliver solutions that enhance customer engagement, streamline operations, and drive revenue growth.</p>
                    </section>
                    <section id="content4" class="content">
                        <div class="content-header">
                            <img src="images/deployment.png" alt="">
                            <h3>eCommerce Software Integration</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>Our integration services ensure seamless connectivity between your new software and existing eCommerce systems. We facilitate interoperability among platforms to enhance operational efficiency, reduce manual processes, and improve customer service.</p>
                    </section>
                    <section id="content5" class="content">
                        <div class="content-header">
                            <img src="images/project-analysis-health.png" alt="">
                            <h3>eCommerce Software Testing and Quality Assurance</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We conduct thorough testing of your eCommerce software to identify bugs and vulnerabilities, ensuring it meets the highest standards of performance, security, and compliance with industry regulations. Our quality assurance practices guarantee a reliable customer experience.</p>
                    </section>
                    <section id="content6" class="content">
                        <div class="content-header">
                            <img src="images/moderization-process.png" alt="">
                            <h3>eCommerce Software Modernization</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We upgrade legacy eCommerce software to meet contemporary technological standards, enhancing functionality and security. Our modernization services help your business stay competitive by integrating advanced features that support evolving customer needs and market trends.</p>
                    </section>
                    <section id="content7" class="content">
                        <div class="content-header">
                            <img src="images/support-process.png" alt="">
                            <h3>eCommerce Software Maintenance and Support</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>Our maintenance and support services provide ongoing software updates, troubleshooting, and enhancements to ensure optimal performance. We focus on resolving issues, improving functionality, and adapting software to the changing landscape of the eCommerce industry.</p>
                    </section>
                </section>
            </section>





            <!-- ######### Benefits ##########  -->
            <section class="benefits-wrapper">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Sectors that can benefits from our e-commerce software development services</h1>


                <div class="benefits-sectors">
                    <ul data-aos="fade-right" data-aos-duration="1000">
                        <li>Online Retailers</li>
                        <li>Marketplaces</li>
                        <li>Subscription Box Services</li>
                        <li>Digital Goods Providers</li>
                        <li>Wholesale eCommerce Platforms</li>
                        <li>Cross-Border eCommerce Companies</li>
                    </ul>
                    <ul data-aos="fade-left" data-aos-duration="1000">
                        <li>Payment Gateway Providers</li>
                        <li>Logistics and Shipping Services</li>
                        <li>eCommerce Platform Developers</li>
                        <li>Marketing and SEO Agencies</li>
                        <li>Customer Service Solutions</li>
                        <li>Data Analytics Firms</li>
                    </ul>
                </div>
            </section>



            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Why Choose TekAlgo As Your E-Commerce Software Development</h1>

            </div>

            <div class="service_choose_us">

                <div class="services_container">
                    <!-- Service 1 - E-commerce Technology Expertise -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Empowering online businesses with advanced e-commerce technology solutions that drive growth, improve customer experience, and streamline operations.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>E-commerce Technology Expertise</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Custom Online Store Development -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Building tailor-made e-commerce platforms that offer user-friendly interfaces, seamless navigation, and optimized shopping experiences for your customers.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Custom Online Store Development</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Data Security and Fraud Prevention -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Implementing robust security measures and fraud detection tools to protect sensitive customer data and secure online transactions on your e-commerce site.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Data Security and Fraud Prevention</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Seamless Payment Gateway Integration -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Integrating multiple payment gateways to provide a smooth checkout process, enabling a wide range of secure payment options for customers.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Seamless Payment Gateway Integration</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Scalable and Innovative Solutions -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Delivering flexible e-commerce solutions that scale with your business, incorporating cutting-edge technology to enhance performance and user engagement.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Scalable and Innovative Solutions</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - Continuous Support and Optimization -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Offering ongoing support, regular updates, and optimization strategies to ensure your e-commerce platform remains competitive and up-to-date.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Continuous Support and Optimization</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>
                </div>

            </div>




            <!-- ######### who can avail ###### -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">
                    Who Can Avail Our E-Commerce Software Services</h1>

            </div>

            <div class="avail-section-wrapper">
                <div class="avail-section" id="scrollable-section">
                    <div class="avail-image-container" id="image-scroll">
                        <img src="images/ecomm-primary.jpg" alt="Image on Left" data-aos="fade-right" data-aos-duration="1000">
                    </div>

                    <div class="avail-content-container" id="scrollable-content" data-aos="fade-left" data-aos-duration="1000">
                        <!-- eCommerce Industry Content -->
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Online Retailers</h2>
                            </div>
                            <p>Online retailers utilize eCommerce software for inventory management, order processing,
                                and payment gateways. These tools streamline operations, enhance customer experiences, and
                                provide real-time analytics, ensuring efficient management of sales and inventory
                                while maximizing profitability.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Marketplace Platforms</h2>
                            </div>
                            <p>Marketplace platforms benefit from software that manages vendor onboarding, product listings,
                                and transaction processing. These solutions facilitate seamless interactions between buyers
                                and sellers, enhance marketplace scalability, and provide robust analytics for performance tracking
                                and decision-making.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Subscription Services</h2>
                            </div>
                            <p>Subscription-based businesses leverage eCommerce software for customer management, recurring billing,
                                and content delivery. These tools enhance user engagement, streamline subscription renewals, and provide
                                insights into customer behavior, ensuring improved retention rates
                                and tailored offerings.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Mobile Commerce</h2>
                            </div>
                            <p>Mobile commerce companies utilize software for app development, mobile payment processing,
                                and user experience optimization. These solutions enhance accessibility, streamline transactions,
                                and improve customer engagement, ensuring a smooth shopping experience across
                                mobile devices.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Wholesale Distributors</h2>
                            </div>
                            <p>Wholesale distributors benefit from eCommerce software for bulk order management,
                                customer relationship management, and logistics tracking. These tools streamline order
                                processing, enhance communication with retailers, and provide insights into market trends,
                                optimizing distribution operations.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Digital Marketing</h2>
                            </div>
                            <p>Digital marketing agencies use eCommerce software for campaign management, analytics,
                                and customer segmentation. These solutions enhance targeted marketing efforts, optimize
                                ad spend, and provide actionable insights, ultimately driving traffic and increasing
                                sales for eCommerce businesses.</p>
                        </div>
                    </div>


                </div>
            </div>



            <!-- ######### Process ##########  -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">
                    Process We Follow To Develop E-commerce Software</h1>

            </div>

            <div class="swiper mySwiper">

                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/ecommerce-platform-development.png" alt="">
                        </div>
                        <h2>E-commerce Development</h2>
                        <p>Building custom platforms to streamline online shopping.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/payment-gateway-integration.png" alt="">
                        </div>
                        <h2>Payment Integration</h2>
                        <p>Integrating secure solutions for seamless transactions.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/ecommerce-analytics.png" alt="">
                        </div>
                        <h2>E-commerce Analytics</h2>
                        <p>Assessing customer behavior and performance for decisions.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/digital-marketing.png" alt="">
                        </div>
                        <h2>Digital Marketing</h2>
                        <p>Boosting visibility with SEO, SEM, and social media.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/inventory-management.png" alt="">
                        </div>
                        <h2>Inventory Systems</h2>
                        <p>Optimizing stock levels to reduce overhead costs.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/customer-support.png" alt="">
                        </div>
                        <h2>Customer Support</h2>
                        <p>Enhancing service with AI chatbots for 24/7 assistance.</p>
                    </div>
                </div>

                <div class="swiper-pagination"></div>
            </div>

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
                <h1>E-commerce Web Development FAQs</h1>
            </div>

            <section class="faq-wrapper" data-aos="zoom-in" data-aos-duration="1000">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What types of e-commerce websites do you develop?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We build e-commerce websites for a range of business models, including B2C and B2B stores, subscription services, and marketplaces. Our designs are customized to support diverse products, streamline shopping experiences, and maximize conversions.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can you integrate payment gateways and checkout systems?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we integrate secure payment gateways and checkout systems to provide seamless transactions. We work with popular gateways like Stripe, PayPal, and others, ensuring your customers have multiple payment options and a safe checkout process.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Do you provide inventory and order management solutions?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Absolutely! We integrate inventory management and order tracking systems that allow you to monitor stock levels, process orders efficiently, and provide customers with updates on their purchases. These systems streamline back-end management.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do you ensure the site is optimized for search engines and mobile devices?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We use e-commerce-specific SEO strategies and mobile-responsive design to ensure your site ranks well on search engines and performs smoothly on all devices. From on-page SEO to mobile speed optimization, we make sure your site attracts and retains traffic.
                    </p>
                </section>
            </section>





            <!-- ##### Book #######  -->

            <section class="section-book">
                <section class="book-image">
                    <img src="images/booking-industry.jpg" alt="">
                </section>
                <section class="book-data">



                    <h1 data-aos="fade-down" data-aos-duration="1000">E-Commerce Software Development Services</h1>
                    <p data-aos="fade-down" data-aos-duration="1000">Comprehensive Solutions Designed to Support e-commerce Professionals</p>
                    <a href="#" class="reopenPopup" data-aos="fade-down" data-aos-duration="1000">Connect With Us</a>
                </section>


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