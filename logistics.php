<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'logistice' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'logistics' AND blog_status = 'published'");
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
                        <span>L</span><span>o</span><span>g</span><span>i</span><span>s</span><span>t</span><span>i</span><span>c</span><span>s</span>

                        <span>S</span><span>o</span><span>f</span><span>t</span><span>w</span><span>a</span><span>r</span><span>e</span> <span>D</span><span>e</span><span>v</span><span>e</span><span>l</span><span>o</span><span>p</span><span>m</span><span>e</span><span>n</span><span>t</span> <span>S</span><span>e</span><span>r</span><span>v</span><span>i</span><span>c</span><span>e</span><span>s</span>
                    </h1>
                    <h3>Driving Performance in Supply Chain Through Tailored Software</h3>
                    <a href="#" class="reopenPopup">Get Free Quote</a>

                </div>
                <div class="child child2">
                    <img src="images/logistice-hero.png" alt="" data-aos="fade-left" data-aos-duration="1000" />
                </div>
            </div>

            <!-- ####### INTRODUCTION  ####### -->
            <section class="intro">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Optimizing Supply Chain Management with Our Innovative Software Development Solutions</h1>
                <p data-aos="fade-up" data-aos-duration="1000">Our software development services for the logistics industry are designed to enhance operational efficiency, streamline transportation management, and improve real-time tracking. By leveraging advanced technology, data analytics, and automation, we empower logistics companies to optimize their supply chain processes, reduce costs, and deliver exceptional service in a competitive marketplace.</p>
            </section>




            <!-- ####### details ####### -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">
                    Process We Follow To Develop Logistics Software</h1>

            </div>
            <section class="detail" data-aos="fade-up" data-aos-duration="1000">
                <section class="detail-title detail-child">
                    <p class="tab active-tab" onclick="toggleContent(1)">
                        <strong>01.</strong> Logistics Software Consulting

                    </p>
                    <p class="tab" onclick="toggleContent(2)">
                        <strong>02.</strong> Custom Logistics Software Development

                    </p>
                    <p class="tab" onclick="toggleContent(3)">
                        <strong>03.</strong> Logistics Software Product Development

                    </p>
                    <p class="tab" onclick="toggleContent(4)">
                        <strong>04.</strong> Logistics Software Integration

                    </p>
                    <p class="tab" onclick="toggleContent(5)">
                        <strong>05.</strong> Logistics Software Testing and Quality Assurance

                    </p>
                    <p class="tab" onclick="toggleContent(6)">
                        <strong>06.</strong> Logistics Software Modernization

                    </p>
                    <p class="tab" onclick="toggleContent(7)">
                        <strong>07.</strong> Logistics Software Maintenance and Support

                    </p>
                </section>
                <section class="detail-description detail-child">
                    <section id="content1" class="content">
                        <div class="content-header">
                            <img src="images/consultation.png" alt="">
                            <h3>Logistics Software Consulting</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We evaluate your logistics operations and technological needs, providing strategic guidance for developing customized software solutions. Our consulting services help identify opportunities for optimizing supply chain management, improving efficiency, and reducing costs.</p>
                    </section>
                    <section id="content2" class="content">
                        <div class="content-header">
                            <img src="images/software-development-process.png" alt="">
                            <h3>Custom Logistics Software Development</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We specialize in developing tailored logistics software solutions that meet your specific requirements. From initial coding to deploying unique features, our development process ensures your software enhances inventory management and streamlines transportation logistics.</p>
                    </section>
                    <section id="content3" class="content">
                        <div class="content-header">
                            <img src="images/development.png" alt="">
                            <h3>Logistics Software Product Development</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We focus on creating scalable, market-ready logistics software products that cater to transportation and supply chain businesses. Our product development services deliver solutions that enhance route planning, freight tracking, and overall operational efficiency.</p>
                    </section>
                    <section id="content4" class="content">
                        <div class="content-header">
                            <img src="images/deployment.png" alt="">
                            <h3>Logistics Software Integration</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>Our integration services ensure seamless connectivity between your logistics software and existing systems. We facilitate interoperability among platforms to enhance data flow, reduce manual processes, and improve decision-making capabilities.</p>
                    </section>
                    <section id="content5" class="content">
                        <div class="content-header">
                            <img src="images/project-analysis-health.png" alt="">
                            <h3>Logistics Software Testing and Quality Assurance</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We conduct thorough testing of your logistics software to identify bugs and vulnerabilities, ensuring it meets the highest standards of performance, security, and user satisfaction. Our quality assurance practices guarantee a reliable experience for your logistics operations.</p>
                    </section>
                    <section id="content6" class="content">
                        <div class="content-header">
                            <img src="images/moderization-process.png" alt="">
                            <h3>Logistics Software Modernization</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We upgrade legacy logistics software to meet contemporary technological standards, enhancing functionality and security. Our modernization services help your organization remain competitive by integrating advanced features that support evolving logistics demands.</p>
                    </section>
                    <section id="content7" class="content">
                        <div class="content-header">
                            <img src="images/support-process.png" alt="">
                            <h3>Logistics Software Maintenance and Support</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>Our maintenance and support services provide ongoing software updates, troubleshooting, and enhancements to ensure optimal performance. We focus on resolving issues, improving functionality, and adapting software to the changing landscape of the logistics industry.</p>
                    </section>
                </section>
            </section>




            <!-- ######### Benefits ##########  -->
            <section class="benefits-wrapper">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Sectors that can benefits from our logistics software development services</h1>


                <div class="benefits-sectors">
                    <ul data-aos="fade-right" data-aos-duration="1000">
                        <li>Freight Forwarding Companies</li>
                        <li>Third-Party Logistics (3PL) Providers</li>
                        <li>Warehousing Services</li>
                        <li>Shipping and Courier Services</li>
                        <li>Supply Chain Management Firms</li>
                        <li>Transportation Services</li>
                    </ul>
                    <ul data-aos="fade-left" data-aos-duration="1000">
                        <li>Inventory Management Solutions</li>
                        <li>Customs Brokerage Services</li>
                        <li>Last-Mile Delivery Providers</li>
                        <li>Logistics Technology Companies</li>
                        <li>Cold Chain Logistics</li>
                        <li>Freight Brokerage Firms</li>
                    </ul>
                </div>
            </section>



            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Why Choose TekAlgo As Your Logistics Software Development</h1>

            </div>


            <div class="service_choose_us">

                <div class="services_container">
                    <!-- Service 1 - Logistics Technology Expertise -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Delivering comprehensive technology solutions for the logistics industry, optimizing supply chain operations, improving efficiency, and enhancing customer satisfaction.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Logistics Technology Expertise</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Custom Logistics Software Development -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Creating tailored software solutions that streamline warehousing, inventory management, and transportation processes for greater operational efficiency.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Custom Logistics Software Development</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Data Analytics and Reporting -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Utilizing advanced analytics to provide actionable insights into logistics operations, enabling better decision-making and performance optimization.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Data Analytics and Reporting</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Seamless System Integration -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Integrating existing logistics systems with new technologies for improved data flow, real-time tracking, and enhanced operational transparency.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Seamless System Integration</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Innovative and Scalable Solutions -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Developing innovative solutions that scale with your logistics needs, ensuring adaptability to market changes and growth opportunities.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Innovative and Scalable Solutions</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - 24/7 Support and Maintenance -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Offering round-the-clock support and regular system maintenance to ensure uninterrupted logistics operations and optimal performance.
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
                    Who Can Avail Our Logistics Software Services</h1>

            </div>

            <div class="avail-section-wrapper">
                <div class="avail-section" id="scrollable-section">
                    <div class="avail-image-container" id="image-scroll">
                        <img src="images/logistics-primary.jpg" alt="Image on Left" data-aos="fade-right" data-aos-duration="1000">
                    </div>


                    <div class="avail-content-container" id="scrollable-content" data-aos="fade-left" data-aos-duration="1000">
                        <!-- Logistics Industry Content -->
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Supply Chain Collaboration</h2>
                            </div>
                            <p>Logistics companies can utilize social networking platforms to connect with
                                suppliers and partners, enhancing communication and collaboration. This fosters
                                real-time information sharing, streamlining operations, and improving overall
                                efficiency in supply chain management.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Customer Engagement</h2>
                            </div>
                            <p>Social networks allow logistics firms to interact with customers, providing updates
                                on shipments and addressing inquiries. This direct engagement improves customer
                                satisfaction, builds trust, and fosters loyalty by keeping clients informed
                                throughout the delivery process.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Employee Training</h2>
                            </div>
                            <p>Logistics organizations can leverage social platforms for employee training and
                                knowledge sharing. By facilitating discussions, sharing best practices, and providing
                                resources, companies enhance workforce skills and promote a culture of continuous
                                learning within the industry.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Market Insights</h2>
                            </div>
                            <p>Social networking tools enable logistics companies to gather market trends and
                                customer feedback. This valuable information helps organizations adapt to changing
                                demands, optimize services, and stay competitive in an evolving market landscape.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Networking Opportunities</h2>
                            </div>
                            <p>Logistics professionals can connect through social networks, fostering relationships
                                and collaboration. These platforms provide opportunities for networking, knowledge exchange,
                                and potential partnerships, driving innovation and growth within the logistics
                                industry.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Sustainability Initiatives</h2>
                            </div>
                            <p>Logistics companies can promote sustainability efforts through social networks,
                                sharing practices and successes in reducing environmental impact. By engaging
                                stakeholders and customers in these initiatives, firms enhance their brand
                                reputation and encourage responsible practices within the industry.</p>
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
                            <img src="images/logistics-software-development.png" alt="">
                        </div>
                        <h2>Logistics Software Development</h2>
                        <p>Customized solutions for optimizing supply chain management.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/fleet-management-solutions.png" alt="">
                        </div>
                        <h2>Fleet Management Solutions</h2>
                        <p>Real-time tracking and route optimization tools for logistics fleets.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/inventory-tracking-systems.png" alt="">
                        </div>
                        <h2>Inventory Tracking Systems</h2>
                        <p>Systems for monitoring stock levels and streamlining warehouse operations.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/shipping-and-distribution-solutions.png" alt="">
                        </div>
                        <h2>Shipping and Distribution Solutions</h2>
                        <p>Optimizing logistics for efficient shipping and last-mile delivery.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/route-optimization-tools.png" alt="">
                        </div>
                        <h2>Route Optimization Tools</h2>
                        <p>Advanced tools for planning routes to reduce delivery times.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/analytics-and-reporting.png" alt="">
                        </div>
                        <h2>Logistics Analytics and Reporting</h2>
                        <p>Insights through analytics to enhance decision-making and performance.</p>
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
                <h1>Logistics Website Development FAQs</h1>
            </div>

            <section class="faq-wrapper" data-aos="zoom-in" data-aos-duration="1000">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What types of logistics websites do you develop?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We develop various logistics websites, including freight forwarding platforms, supply chain management systems, transportation management solutions, and logistics service provider websites. Our designs focus on efficiency and usability to enhance operations.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can you integrate tracking and inventory management features?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we can integrate real-time tracking features and inventory management systems to help businesses monitor shipments, manage stock levels, and optimize their supply chain processes effectively.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do you ensure the website is secure for handling sensitive data?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We prioritize security by implementing robust encryption methods, secure user authentication, and regular security audits. This ensures that sensitive data, such as shipping details and customer information, is protected from unauthorized access.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Do you provide features for customer support and communication?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we offer features for customer support, including live chat, ticketing systems, and FAQ sections. This helps logistics companies maintain effective communication with their clients and resolve issues promptly.
                    </p>
                </section>
            </section>



            <!-- ##### Book #######  -->

            <section class="section-book">
                <section class="book-image">
                    <img src="images/booking-industry.jpg" alt="">
                </section>
                <section class="book-data">



                    <h1 data-aos="fade-down" data-aos-duration="1000">Logistics Software Development Services</h1>
                    <p data-aos="fade-down" data-aos-duration="1000">Comprehensive Solutions Designed to Support Logistics Professionals</p>
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