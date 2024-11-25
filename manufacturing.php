<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'manufacturing' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'manufacturing' AND blog_status = 'published'");
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
        <div class="wrapper" data-aos="fade-right" data-aos-duration="1500">

            <!-- ################################# HERO SECTION ##################################  -->
            <div class="hero">
                <div class="child child1">
                    <h1 class="animated-heading">
                        <span>M</span><span>a</span><span>n</span><span>u</span><span>f</span><span>a</span><span>c</span><span>t</span><span>u</span><span>r</span><span>i</span><span>n</span><span>g</span>

                        <span>S</span><span>o</span><span>f</span><span>t</span><span>w</span><span>a</span><span>r</span><span>e</span> <span>D</span><span>e</span><span>v</span><span>e</span><span>l</span><span>o</span><span>p</span><span>m</span><span>e</span><span>n</span><span>t</span> <span>S</span><span>e</span><span>r</span><span>v</span><span>i</span><span>c</span><span>e</span><span>s</span>
                    </h1>
                    <h3 data-aos="fade-up" data-aos-duration="1500">Streamlining Production Processes with Custom Software Solutions</h3>
                    <a href="#" class="reopenPopup">Get Free Quote</a>

                </div>
                <div class="child child2">
                    <img src="images/manufacture-hero.png" alt="" data-aos="fade-left" data-aos-duration="2500" />
                </div>
            </div>

            <!-- ####### INTRODUCTION  ####### -->

            <section class="intro">
                <h1>Enhancing Manufacturing Efficiency with Our Innovative Software Development Solutions</h1>
                <p>Our software development services for the manufacturing industry are designed to optimize production processes, improve quality control, and enhance supply chain management. By leveraging advanced technology, IoT integration, and data analytics, we empower manufacturers to streamline operations, reduce downtime, and achieve greater operational efficiency in a competitive market.</p>
            </section>

            <!-- ####### details ####### -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">
                    Process We Follow To Develop Manufacturing Software</h1>

            </div>


            <section class="detail">
                <section class="detail-title detail-child">
                    <p class="tab active-tab" onclick="toggleContent(1)">
                        <strong>01.</strong> Manufacturing Software Consulting

                    </p>
                    <p class="tab" onclick="toggleContent(2)">
                        <strong>02.</strong> Custom Manufacturing Software Development

                    </p>
                    <p class="tab" onclick="toggleContent(3)">
                        <strong>03.</strong> Manufacturing Software Product Development

                    </p>
                    <p class="tab" onclick="toggleContent(4)">
                        <strong>04.</strong> Manufacturing Software Integration

                    </p>
                    <p class="tab" onclick="toggleContent(5)">
                        <strong>05.</strong> Manufacturing Software Testing and Quality Assurance

                    </p>
                    <p class="tab" onclick="toggleContent(6)">
                        <strong>06.</strong> Manufacturing Software Modernization

                    </p>
                    <p class="tab" onclick="toggleContent(7)">
                        <strong>07.</strong> Manufacturing Software Maintenance and Support

                    </p>
                </section>
                <section class="detail-description detail-child">
                    <section id="content1" class="content">
                        <div class="content-header">
                            <img src="images/consultation.png" alt="">
                            <h3>Manufacturing Software Consulting</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We assess your manufacturing operations and technological needs, providing strategic guidance for developing customized software solutions. Our consulting services help identify opportunities for improving efficiency, optimizing production processes, and reducing costs.</p>
                    </section>
                    <section id="content2" class="content">
                        <div class="content-header">
                            <img src="images/software-development-process.png" alt="">
                            <h3>Custom Manufacturing Software Development</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We specialize in developing tailored manufacturing software solutions that meet your specific requirements. From initial coding to deploying unique features, our development process ensures your software enhances operations and supports lean manufacturing practices.</p>
                    </section>
                    <section id="content3" class="content">
                        <div class="content-header">
                            <img src="images/development.png" alt="">
                            <h3>Manufacturing Software Product Development</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We focus on creating scalable, market-ready manufacturing software products that cater to various sectors. Our product development services deliver solutions that enhance inventory management, streamline production scheduling, and drive operational excellence.</p>
                    </section>
                    <section id="content4" class="content">
                        <div class="content-header">
                            <img src="images/deployment.png" alt="">
                            <h3>Manufacturing Software Integration</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>Our integration services ensure seamless connectivity between your manufacturing software and existing systems. We facilitate interoperability among platforms to enhance data flow, reduce manual processes, and improve decision-making in manufacturing operations.</p>
                    </section>
                    <section id="content5" class="content">
                        <div class="content-header">
                            <img src="images/project-analysis-health.png" alt="">
                            <h3>Manufacturing Software Testing and Quality Assurance</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We conduct thorough testing of your manufacturing software to identify bugs and vulnerabilities, ensuring it meets the highest standards of performance, security, and user satisfaction. Our quality assurance practices guarantee a reliable experience for manufacturers.</p>
                    </section>
                    <section id="content6" class="content">
                        <div class="content-header">
                            <img src="images/moderization-process.png" alt="">
                            <h3>Manufacturing Software Modernization</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We upgrade legacy manufacturing software to meet contemporary technological standards, enhancing functionality and security. Our modernization services help your organization remain competitive by integrating advanced features that support evolving manufacturing practices.</p>
                    </section>
                    <section id="content7" class="content">
                        <div class="content-header">
                            <img src="images/support-process.png" alt="">
                            <h3>Manufacturing Software Maintenance and Support</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>Our maintenance and support services provide ongoing software updates, troubleshooting, and enhancements to ensure optimal performance. We focus on resolving issues, improving functionality, and adapting software to the changing landscape of the manufacturing industry.</p>
                    </section>
                </section>
            </section>






            <!-- ######### Benefits ##########  -->
            <section class="benefits-wrapper">
                <h1>Sectors that can benefits from our manufacturing software development services</h1>

                <div class="benefits-sectors">
                    <ul>
                        <li>Automobile Manufacturing</li>
                        <li>Consumer Electronics Production</li>
                        <li>Textile Manufacturing</li>
                        <li>Food and Beverage Processing</li>
                        <li>Aerospace Manufacturing</li>
                        <li>Pharmaceutical Manufacturing</li>
                    </ul>
                    <ul>
                        <li>Machinery and Equipment Manufacturing</li>
                        <li>Furniture Production</li>
                        <li>Plastics and Rubber Manufacturing</li>
                        <li>Metal Fabrication</li>
                        <li>Construction Materials Manufacturing</li>
                        <li>Renewable Energy Equipment Production</li>
                    </ul>
                </div>
            </section>



            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Why Choose TekAlgo As Your Manufacturing Software Development</h1>

            </div>


            <div class="service_choose_us">

                <div class="services_container">
                    <!-- Service 1 - Manufacturing Technology Expertise -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Providing innovative technological solutions that enhance manufacturing processes, improve production efficiency, and reduce operational costs across various industries.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Manufacturing Technology Expertise</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Custom Manufacturing Software Development -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Developing tailored software solutions for inventory management, production scheduling, and quality control to streamline manufacturing operations and meet the needs of modern factories.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Custom Manufacturing Software Development</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Data Security and Compliance -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Ensuring the protection of sensitive manufacturing data and compliance with industry standards and regulations, fostering trust and secure operations across production facilities.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Data Security and Compliance</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Seamless System Integration -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Integrating advanced machinery, IoT sensors, and data analytics platforms to monitor manufacturing processes in real-time, optimizing production efficiency, and reducing downtime.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Seamless System Integration</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Innovative and Sustainable Manufacturing Solutions -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Offering innovative solutions that promote sustainable manufacturing practices, reduce waste, improve resource efficiency, and reduce environmental impact across the production cycle.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Innovative and Sustainable Manufacturing Solutions</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - 24/7 Support and Maintenance -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Providing round-the-clock support and system maintenance to ensure that manufacturing systems are always operational, reducing downtime and maximizing production capabilities.
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
                <h1 data-aos="zoom-in" data-aos-duration="1500">
                    Who Can Avail Our Manufacturing Software Services</h1>

            </div>

            <div class="avail-section-wrapper">
                <div class="avail-section" id="scrollable-section">
                    <div class="avail-image-container" id="image-scroll">
                        <img src="images/manufacturing-primary.jpg" alt="Image on Left">
                    </div>


                    <div class="avail-content-container" id="scrollable-content">
                        <!-- Manufacturing Industry Content -->
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Collaboration and Innovation</h2>
                            </div>
                            <p>Social networking platforms can facilitate collaboration among manufacturers, allowing
                                them to share ideas, best practices, and innovations. This fosters a culture of creativity
                                and problem-solving, leading to improved processes, products, and overall efficiency
                                within the industry.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Supply Chain Management</h2>
                            </div>
                            <p>Manufacturers can utilize social networks to enhance communication with suppliers and
                                logistics partners. Real-time information sharing improves coordination, reduces delays,
                                and optimizes inventory management, ultimately streamlining the supply chain and
                                increasing operational efficiency.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Employee Engagement</h2>
                            </div>
                            <p>Social platforms can boost employee engagement by providing a space for feedback,
                                recognition, and collaboration. This strengthens team dynamics, improves morale,
                                and fosters a positive workplace culture, leading to increased productivity and
                                employee retention in manufacturing settings.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Training and Development</h2>
                            </div>
                            <p>Manufacturing companies can leverage social networks for training purposes,
                                sharing resources, tutorials, and best practices. This encourages continuous
                                learning and skill development, helping employees stay updated with industry
                                advancements and enhancing overall workforce competency.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Market Insights</h2>
                            </div>
                            <p>Social networking tools enable manufacturers to gather valuable market feedback
                                and consumer trends. By analyzing discussions and interactions, companies can adapt
                                their products and strategies, ensuring they remain competitive and responsive to
                                market demands.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Quality Control</h2>
                            </div>
                            <p>Manufacturers can use social platforms to discuss quality control practices and
                                share experiences. This fosters collaboration on challenges and solutions, ultimately
                                leading to improved product quality and consistency through collective knowledge and
                                shared best practices.</p>
                        </div>
                    </div>

                </div>
            </div>



            <!-- ######### Process ##########  -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">
                    Process We Follow To Develop Heathcare Software</h1>

            </div>

            <div class="swiper mySwiper">

                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/manufacturing-software-development.png" alt="">
                        </div>
                        <h2>Manufacturing Software Development</h2>
                        <p>Custom solutions to enhance production efficiency and manage workflows.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/supply-chain-management.png" alt="">
                        </div>
                        <h2>Supply Chain Management Solutions</h2>
                        <p>Optimizing inventory, managing suppliers, and improving logistics.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/quality-control-systems.png" alt="">
                        </div>
                        <h2>Quality Control Systems</h2>
                        <p>Real-time monitoring and compliance tools to ensure product quality.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/production-scheduling-software.png" alt="">
                        </div>
                        <h2>Production Scheduling Software</h2>
                        <p>Advanced scheduling tools to enhance productivity and reduce downtime.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/maintenance-management-software.png" alt="">
                        </div>
                        <h2>Maintenance Management Software</h2>
                        <p>Predictive maintenance systems for equipment tracking and reliability.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/data-analytics-in-manufacturing.png" alt="">
                        </div>
                        <h2>Data Analytics in Manufacturing</h2>
                        <p>Insights and tools to improve operational efficiency and inform decisions.</p>
                    </div>
                </div>


                <div class="swiper-pagination"></div>
            </div>
            <!-- ####### blog #####  -->

            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>Exploring Industry Trends, Ideas, and Real-World Solutions</h1>

            </div>

            <div class="blog-wrapper" id="blog-wrapper">
                <!-- Blog content will be injected dynamically -->
                <?php echo renderBlogs($contents); ?>
            </div>

            <!-- Pagination Links -->
            <div class="pagination" id="pagination">
                <?php echo renderPagination($currentPage, $totalPages); ?>
            </div>

            <!-- ##### faq #######  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>Manufacturing Website Development FAQs</h1>
            </div>

            <section class="faq-wrapper">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What types of websites do you develop for the manufacturing industry ?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We develop various types of manufacturing websites, including corporate websites, product catalogs, e-commerce platforms for industrial goods, and custom management systems. Our designs aim to enhance visibility and streamline operations for manufacturers.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can you integrate supply chain management and inventory tracking features?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we can integrate supply chain management systems and inventory tracking features to help manufacturers manage their production processes efficiently. This includes real-time tracking of materials, products, and shipments.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do you ensure the website is optimized for B2B interactions ?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We focus on creating user-friendly interfaces that facilitate B2B interactions, including features for customer portals, online quotes, and lead generation forms. This enhances communication and engagement with business clients.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Do you provide features for showcasing products and services effectively?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we incorporate features for showcasing products and services, including high-quality images, detailed descriptions, technical specifications, and downloadable brochures. This helps manufacturers present their offerings professionally and attractively.
                    </p>
                </section>
            </section>





            <!-- ##### Book #######  -->

            <section class="section-book">
                <section class="book-image">
                    <img src="images/booking-industry.jpg" alt="">
                </section>
                <section class="book-data">



                    <h1 data-aos="zoom-in" data-aos-duration="2500">Manufacturing Software Development Services</h1>
                    <p data-aos="zoom-in" data-aos-duration="2500">Comprehensive Solutions Designed to Support Manufacturing Professionals</p>
                    <a href="#" class="reopenPopup">Connect With Us</a>
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