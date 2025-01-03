<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'agriculture' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'agriculture' AND blog_status = 'published'");
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
    <link rel="stylesheet" href="assests/css/theme.css">

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
                        <span>A</span><span>g</span><span>r</span><span>i</span><span>c</span><span>u</span><span>l</span><span>t</span><span>u</span><span>r</span><span>e</span>

                        <span>S</span><span>o</span><span>f</span><span>t</span><span>w</span><span>a</span><span>r</span><span>e</span> <span>D</span><span>e</span><span>v</span><span>e</span><span>l</span><span>o</span><span>p</span><span>m</span><span>e</span><span>n</span><span>t</span> <span>S</span><span>e</span><span>r</span><span>v</span><span>i</span><span>c</span><span>e</span><span>s</span>
                    </h1>
                    <h3>Innovative Solutions for Modern Agricultural Management</h3>
                    <a href="#" class="reopenPopup">Get Free Quote</a>

                </div>
                <div class="child child2">
                    <img src="images/agriculture-hero.png" alt="" data-aos="fade-left" data-aos-duration="1000" />
                </div>
            </div>
            <!-- ####### INTRODUCTION  ####### -->

            <section class="intro">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Empowering Agricultural Innovation with Our Comprehensive Software Development Solutions</h1>
                <p data-aos="fade-up" data-aos-duration="1000">Our software development services for the agriculture industry are designed to enhance farm management, improve sustainability, and increase productivity. By utilizing advanced technology, precision agriculture tools, and real-time data analytics, we enable farmers and agribusinesses to make informed decisions, optimize supply chains, and maximize crop yields in a rapidly evolving agricultural landscape.</p>
            </section>


            <!-- ####### details ####### -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">
                    Process We Follow To Develop Agriculture Software</h1>

            </div>
            <section class="detail" data-aos="fade-up" data-aos-duration="1000">
                <section class="detail-title detail-child">
                    <p class="tab active-tab" onclick="toggleContent(1)">
                        <strong>01.</strong> Agriculture Software Consulting

                    </p>
                    <p class="tab" onclick="toggleContent(2)">
                        <strong>02.</strong> Custom Agriculture Software Development

                    </p>
                    <p class="tab" onclick="toggleContent(3)">
                        <strong>03.</strong> Agriculture Software Product Development

                    </p>
                    <p class="tab" onclick="toggleContent(4)">
                        <strong>04.</strong> Agriculture Software Integration

                    </p>
                    <p class="tab" onclick="toggleContent(5)">
                        <strong>05.</strong> Agriculture Software Testing and Quality Assurance

                    </p>
                    <p class="tab" onclick="toggleContent(6)">
                        <strong>06.</strong> Agriculture Software Modernization

                    </p>
                    <p class="tab" onclick="toggleContent(7)">
                        <strong>07.</strong> Agriculture Software Maintenance and Support

                    </p>
                </section>
                <section class="detail-description detail-child">
                    <section id="content1" class="content">
                        <div class="content-header">
                            <img src="images/consultation.png" alt="">
                            <h3>Agriculture Software Consulting</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We assess your agricultural operations and technological needs, providing strategic guidance for developing customized software solutions. Our consulting services help identify opportunities for enhancing productivity, improving resource management, and optimizing yield.</p>
                    </section>
                    <section id="content2" class="content">
                        <div class="content-header">
                            <img src="images/software-development-process.png" alt="">
                            <h3>Custom Agriculture Software Development</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We specialize in developing tailored agriculture software solutions that meet your specific requirements. From initial coding to deploying unique features, our development process ensures your software enhances farm management and supports precision agriculture practices.</p>
                    </section>
                    <section id="content3" class="content">
                        <div class="content-header">
                            <img src="images/development.png" alt="">
                            <h3>Agriculture Software Product Development</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We focus on creating scalable, market-ready agriculture software products that cater to farmers and agribusinesses. Our product development services deliver solutions that enhance crop monitoring, facilitate data analysis, and drive overall operational efficiency.</p>
                    </section>
                    <section id="content4" class="content">
                        <div class="content-header">
                            <img src="images/deployment.png" alt="">
                            <h3>Agriculture Software Integration</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>Our integration services ensure seamless connectivity between your agriculture software and existing systems. We facilitate interoperability among platforms to enhance data flow, reduce manual processes, and improve decision-making in your agricultural operations.</p>
                    </section>
                    <section id="content5" class="content">
                        <div class="content-header">
                            <img src="images/project-analysis-health.png" alt="">
                            <h3>Agriculture Software Testing and Quality Assurance</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We conduct thorough testing of your agriculture software to identify bugs and vulnerabilities, ensuring it meets the highest standards of performance, security, and user satisfaction. Our quality assurance practices guarantee a reliable experience for farmers and agribusinesses.</p>
                    </section>
                    <section id="content6" class="content">
                        <div class="content-header">
                            <img src="images/moderization-process.png" alt="">
                            <h3>Agriculture Software Modernization</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We upgrade legacy agriculture software to meet contemporary technological standards, enhancing functionality and security. Our modernization services help your organization remain competitive by integrating advanced features that support evolving agricultural practices.</p>
                    </section>
                    <section id="content7" class="content">
                        <div class="content-header">
                            <img src="images/support-process.png" alt="">
                            <h3>Agriculture Software Maintenance and Support</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>Our maintenance and support services provide ongoing software updates, troubleshooting, and enhancements to ensure optimal performance. We focus on resolving issues, improving functionality, and adapting software to the changing landscape of the agriculture industry.</p>
                    </section>
                </section>
            </section>







            <!-- ######### Benefits ##########  -->
            <section class="benefits-wrapper">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Sectors that can benefits from our agriculture software development services</h1>



                <div class="benefits-sectors">
                    <ul data-aos="fade-right" data-aos-duration="1000">
                        <li>Crop Production</li>
                        <li>Livestock Farming</li>
                        <li>Agricultural Equipment Manufacturers</li>
                        <li>Seed and Fertilizer Suppliers</li>
                        <li>Agronomy Services</li>
                        <li>Organic Farming</li>
                    </ul>
                    <ul data-aos="fade-left" data-aos-duration="1000">
                        <li>Agricultural Technology (AgTech) Companies</li>
                        <li>Irrigation and Water Management Services</li>
                        <li>Food Processing Firms</li>
                        <li>Supply Chain Management in Agriculture</li>
                        <li>Agricultural Research Institutions</li>
                        <li>Export and Import Companies</li>
                    </ul>
                </div>
            </section>



            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Why Choose TekAlgo As Your Agriculture Software Development</h1>

            </div>

            <div class="service_choose_us">

                <div class="services_container">
                    <!-- Service 1 - Agriculture Technology Expertise -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Providing innovative technological solutions that enhance agricultural productivity, sustainability, and efficiency across various farming operations.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Agriculture Technology Expertise</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Custom Agricultural Software Development -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Developing tailored software solutions for precision farming, crop management, and supply chain optimization to meet the specific needs of modern agriculture.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Custom Agricultural Software Development</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Data Security and Compliance -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Ensuring the protection of sensitive agricultural data and compliance with industry regulations to foster trust and secure operations.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Data Security and Compliance</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Seamless System Integration -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Integrating IoT devices, sensors, and data analytics platforms for real-time monitoring and decision-making in agricultural practices.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Seamless System Integration</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Innovative and Sustainable Solutions -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Offering advanced technologies and practices that promote sustainable farming, reducing waste, and improving resource management.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Innovative and Sustainable Solutions</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - 24/7 Support and Maintenance -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Delivering continuous support and regular updates to ensure agricultural systems run smoothly, maximizing productivity and minimizing downtime.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>24/7 Support and Maintenance</h1>
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
                    Who Can Avail Our Agriculture Software Services</h1>

            </div>

            <div class="avail-section-wrapper">
                <div class="avail-section" id="scrollable-section">
                    <div class="avail-image-container" id="image-scroll">
                        <img src="images/agriculture-primary.jpg" alt="Image on Left" data-aos="fade-right" data-aos-duration="1000">
                    </div>


                    <div class="avail-content-container" id="scrollable-content" data-aos="fade-left" data-aos-duration="1000">
                        <!-- Agricultural Industry Content -->
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Farmer Networking</h2>
                            </div>
                            <p>Social networking platforms can connect farmers, allowing them to share experiences,
                                advice, and best practices. This collaboration fosters community support, encourages
                                knowledge exchange, and enhances farming techniques, ultimately leading to improved
                                productivity and sustainability.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Market Access</h2>
                            </div>
                            <p>Agricultural producers can use social networks to showcase their products and connect
                                directly with consumers and retailers. This increases market visibility, helps farmers
                                reach new customers, and fosters direct sales, enhancing profitability and reducing
                                reliance on intermediaries.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Education and Training</h2>
                            </div>
                            <p>Social networking tools can facilitate online training and educational resources for
                                farmers. By sharing tutorials, webinars, and articles, agricultural organizations can
                                enhance farmers' skills and knowledge, promoting innovation and improved farming practices
                                across the industry.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Sustainability Practices</h2>
                            </div>
                            <p>Farmers can engage in discussions about sustainable farming practices on social networks.
                                Sharing successes and challenges fosters collaboration and encourages the adoption of environmentally
                                friendly techniques, contributing to long-term sustainability in agriculture.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Weather Updates</h2>
                            </div>
                            <p>Social platforms can be used to share real-time weather updates and forecasts,
                                helping farmers make informed decisions about planting, harvesting, and resource
                                management. This timely information enhances productivity and minimizes risks
                                associated with adverse weather conditions.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Supply Chain Transparency</h2>
                            </div>
                            <p>Agricultural producers can use social networking tools to improve transparency in
                                the supply chain. By sharing information about sourcing, production practices, and
                                distribution, they build trust with consumers and promote accountability in food
                                production and distribution.</p>
                        </div>
                    </div>

                </div>
            </div>



            <!-- ######### Process ##########  -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">
                    Process We Follow To Develop Heathcare Software</h1>

            </div>

            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/agriculture-software-development.png" alt="">
                        </div>
                        <h2>Agricultural Software Development</h2>
                        <p>Tailored solutions for farm management and livestock tracking.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/precision-agriculture.png" alt="">
                        </div>
                        <h2>Precision Agriculture Solutions</h2>
                        <p>IoT and drone technologies for enhanced crop management.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/supply-chain-management.png" alt="">
                        </div>
                        <h2>Supply Chain Management</h2>
                        <p>Streamlining the agricultural supply chain to reduce waste.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/soil-analysis-tools.png" alt="">
                        </div>
                        <h2>Soil Analysis and Management</h2>
                        <p>Tools for monitoring soil health and optimizing conditions.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/marketplace-platforms.png" alt="">
                        </div>
                        <h2>Agricultural Marketplace Platforms</h2>
                        <p>Connecting farmers with buyers through online marketplaces.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/financial-management-solutions.png" alt="">
                        </div>
                        <h2>Financial Management Solutions</h2>
                        <p>Financial software for budgeting and managing operational costs.</p>
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


            <!-- ##### faq #######  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1000">
                <h1>Agriculture Website Development FAQs</h1>
            </div>

            <section class="faq-wrapper" data-aos="zoom-in" data-aos-duration="1000">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What types of agriculture websites do you develop?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We develop various types of agriculture websites, including farm management platforms, agricultural product sales sites, information portals for farmers, and community-based agriculture websites. Our designs are tailored to meet the needs of the agricultural sector.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can you integrate e-commerce features for selling agricultural products?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we can integrate e-commerce functionalities that allow farmers and suppliers to sell their products online. This includes product listings, shopping cart systems, and secure payment gateways to facilitate online transactions.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do you ensure the website is optimized for mobile users in rural areas?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We use responsive design techniques to ensure your agriculture website is accessible and functional on various devices, including smartphones and tablets. This is crucial for reaching users in rural areas who may rely on mobile devices for internet access.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Do you provide features for farm management and data tracking?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we offer features for farm management and data tracking, including tools for monitoring crop growth, tracking livestock health, and managing equipment. These features help farmers optimize their operations and improve productivity.
                    </p>
                </section>
            </section>




            <!-- ##### Book #######  -->

            <section class="section-book">
                <section class="book-image">
                    <img src="images/booking-industry.jpg" alt="">
                </section>
                <section class="book-data">



                    <h1 data-aos="fade-down" data-aos-duration="1000">Agriculture Software Development Services</h1>
                    <p data-aos="fade-down" data-aos-duration="1000">Comprehensive Solutions Designed to Support Agriculture Professionals</p>
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