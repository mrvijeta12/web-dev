<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'resturant' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'resturant' AND blog_status = 'published'");
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
                        <span>R</span><span>e</span><span>s</span><span>t</span><span>u</span><span>r</span><span>a</span><span>n</span><span>t</span>
                        <span>S</span><span>o</span><span>f</span><span>t</span><span>w</span><span>a</span><span>r</span><span>e</span> <span>D</span><span>e</span><span>v</span><span>e</span><span>l</span><span>o</span><span>p</span><span>m</span><span>e</span><span>n</span><span>t</span> <span>S</span><span>e</span><span>r</span><span>v</span><span>i</span><span>c</span><span>e</span><span>s</span>
                    </h1>
                    <h3 data-aos="fade-up" data-aos-duration="1500">Custom Solutions for Efficient Restaurant Management</h3>
                    <a href="#" class="reopenPopup">Get Free Quote</a>

                </div>
                <div class="child child2">
                    <img src="images/resturant-hero.png" alt="" data-aos="fade-left" data-aos-duration="2500" />
                </div>
            </div>

            <!-- ####### INTRODUCTION  ####### -->

            <section class="intro">
                <h1>Transforming Restaurant Operations with Our Innovative Software Development Services</h1>
                <p>Our restaurant software development services are crafted to elevate dining experiences, optimize restaurant operations, and boost overall business efficiency. By utilizing the latest technology, data analytics, and user-friendly design, we empower restaurant owners to meet their customers' evolving preferences, ensuring streamlined, secure, and accessible solutions for all dining needs.</p>
            </section>

            <!-- ####### details ####### -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">
                    Process We Follow To Develop Resturant Software</h1>

            </div>

            <!-- <section class="detail">
                <section class="detail-title detail-child">
                    <p class="tab active-tab" onclick="toggleContent(1)"><strong>01.</strong> Resturant Software Consulting</p>
                    <p class="tab" onclick="toggleContent(2)"><strong>02.</strong> Custom Heathcare Software Development</p>
                    <p class="tab" onclick="toggleContent(3)"><strong>03.</strong> Heathcare Software Moderization</p>
                    <p class="tab" onclick="toggleContent(4)"><strong>04.</strong> Heathcare Software Integration</p>
                    <p class="tab" onclick="toggleContent(5)"><strong>05.</strong> Heathcare eCommerce Development</p>
                    <p class="tab" onclick="toggleContent(6)"><strong>06.</strong> Heathcare Software Product Development</p>
                </section>

                <section class="detail-description detail-child">
                    <section id="content1" class="content">
                        <div class="content-header">
                            <img src="images/project-analysis-health.png" alt="">
                            <h3>Resturant Software Consulting </h3>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam sapiente, sint iure deleniti sunt voluptates. Recusandae, reprehenderit rerum. Ab vel inventore quaerat qui esse dolore sapiente fugiat non explicabo iusto.</p>
                    </section>
                    <section id="content2" class="content">
                        <div class="content-header">
                            <img src="images/project-analysis-health.png" alt="">
                            <h3>Custom Heathcare Software Development </h3>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam sapiente, sint iure deleniti sunt voluptates. Recusandae, reprehenderit rerum. Ab vel inventore quaerat qui esse dolore sapiente fugiat non explicabo iusto.</p>
                    </section>
                    <section id="content3" class="content">
                        <div class="content-header">
                            <img src="images/project-analysis-health.png" alt="">
                            <h3>Heathcare Software Moderization </h3>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam sapiente, sint iure deleniti sunt voluptates. Recusandae, reprehenderit rerum. Ab vel inventore quaerat qui esse dolore sapiente fugiat non explicabo iusto.</p>
                    </section>
                    <section id="content4" class="content">
                        <div class="content-header">
                            <img src="images/project-analysis-health.png" alt="">
                            <h3>Heathcare Software Integration </h3>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam sapiente, sint iure deleniti sunt voluptates. Recusandae, reprehenderit rerum. Ab vel inventore quaerat qui esse dolore sapiente fugiat non explicabo iusto.</p>
                    </section>
                    <section id="content5" class="content">
                        <div class="content-header">
                            <img src="images/project-analysis-health.png" alt="">
                            <h3>Heathcare eCommerce Development</h3>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam sapiente, sint iure deleniti sunt voluptates. Recusandae, reprehenderit rerum. Ab vel inventore quaerat qui esse dolore sapiente fugiat non explicabo iusto.</p>
                    </section>
                    <section id="content6" class="content">
                        <div class="content-header">
                            <img src="images/project-analysis-health.png" alt="">
                            <h3>Heathcare Software Product Development</h3>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam sapiente, sint iure deleniti sunt voluptates. Recusandae, reprehenderit rerum. Ab vel inventore quaerat qui esse dolore sapiente fugiat non explicabo iusto.</p>
                    </section>
                </section>
            </section> -->

            <section class="detail">
                <section class="detail-title detail-child">
                    <p class="tab active-tab" onclick="toggleContent(1)">
                        <strong>01.</strong> Restaurant Software Consulting
                    </p>
                    <p class="tab" onclick="toggleContent(2)">
                        <strong>02.</strong> Custom Restaurant Software Development
                    </p>
                    <p class="tab" onclick="toggleContent(3)">
                        <strong>03.</strong> Restaurant Software Product Development
                    </p>
                    <p class="tab" onclick="toggleContent(4)">
                        <strong>04.</strong> Restaurant Software Integration
                    </p>
                    <p class="tab" onclick="toggleContent(5)">
                        <strong>05.</strong> Restaurant Software Testing and Quality Assurance
                    </p>
                    <p class="tab" onclick="toggleContent(6)">
                        <strong>06.</strong> Restaurant Software Modernization
                    </p>
                    <p class="tab" onclick="toggleContent(7)">
                        <strong>07.</strong> Restaurant Software Maintenance and Support
                    </p>
                </section>
                <section class="detail-description detail-child">
                    <section id="content1" class="content">
                        <div class="content-header">
                            <img src="images/consultation.png" alt="">
                            <h3>Restaurant Software Consulting</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We evaluate your restaurant’s needs and technological requirements, providing strategic guidance for developing customized software solutions. Our consulting services help identify opportunities for growth, mitigate risks, and establish a solid foundation for successful software implementation.</p>
                    </section>
                    <section id="content2" class="content">
                        <div class="content-header">
                            <img src="images/software-development-process.png" alt="">
                            <h3>Custom Restaurant Software Development</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We specialize in developing tailored software solutions that cater to your restaurant's specific requirements. From initial coding to deploying unique features, our development process ensures your software meets the operational and customer service needs of your establishment.</p>
                    </section>
                    <section id="content3" class="content">
                        <div class="content-header">
                            <img src="images/development.png" alt="">
                            <h3>Restaurant Software Product Development</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We focus on creating scalable, market-ready software products for the restaurant industry, turning your innovative ideas into reality. Our product development services deliver solutions that enhance customer experience, streamline operations, and drive revenue growth.</p>
                    </section>
                    <section id="content4" class="content">
                        <div class="content-header">
                            <img src="images/deployment.png" alt="">
                            <h3>Restaurant Software Integration</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>Our integration services ensure seamless connectivity between your new software and existing restaurant systems. We facilitate interoperability among platforms to enhance operational efficiency, reduce manual processes, and improve service delivery for better customer satisfaction.</p>
                    </section>
                    <section id="content5" class="content">
                        <div class="content-header">
                            <img src="images/project-analysis-health.png" alt="">
                            <h3>Restaurant Software Testing and Quality Assurance</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We conduct thorough testing of your restaurant software to identify bugs and vulnerabilities, ensuring it meets the highest standards of performance, security, and compliance with industry regulations. Our quality assurance practices guarantee a reliable customer experience.</p>
                    </section>
                    <section id="content6" class="content">
                        <div class="content-header">
                            <img src="images/moderization-process.png" alt="">
                            <h3>Restaurant Software Modernization</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We upgrade legacy restaurant software to meet contemporary technological standards, enhancing its functionality and security. Our modernization services help your establishment remain competitive by adopting advanced features that support evolving customer needs and operational demands.</p>
                    </section>
                    <section id="content7" class="content">
                        <div class="content-header">
                            <img src="images/support-process.png" alt="">
                            <h3>Restaurant Software Maintenance and Support</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>Our maintenance and support services provide ongoing software updates, troubleshooting, and enhancements to ensure optimal performance. We focus on resolving issues, improving functionality, and adapting the software to changing technology trends and restaurant industry requirements.</p>
                    </section>
                </section>
            </section>






            <!-- ######### Benefits ##########  -->
            <section class="benefits-wrapper">
                <h1>Sectors That Can Benefit from Our Restaurant Software Development Services</h1>


                <div class="benefits-sectors">
                    <ul>
                        <li>Full-Service Restaurants</li>
                        <li>Fast Food Chains</li>
                        <li>Cafés and Coffee Shops</li>
                        <li>Food Trucks</li>
                        <li>Catering Services</li>
                        <li>Bars and Pubs</li>
                    </ul>
                    <ul>
                        <li>Fine Dining Establishments</li>
                        <li>Buffets</li>
                        <li>Delivery and Takeout Services</li>
                        <li>Casual Dining Restaurants</li>
                        <li>Bakery and Dessert Shops</li>
                        <li>Meal Prep Companies</li>
                    </ul>
                </div>
            </section>




            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Why Choose TekAlgo As Your Restaurant Software Development</h1>

            </div>




            <!-- <div class="service_choose_us">

                <div class="services_container">
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/star.png" alt="">
                        <h1>Restaurant Technology Expertise</h1>
                        <p>Specializing in innovative technology solutions tailored to the unique needs of the restaurant industry to enhance operations and customer engagement.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/star.png" alt="">
                        <h1>Custom Restaurant Software Development</h1>
                        <p>Creating bespoke software solutions to streamline restaurant processes, including order management, kitchen display systems, and online reservations.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/star.png" alt="">
                        <h1>Data Security and Compliance</h1>
                        <p>Ensuring your restaurant’s customer data and payment information are protected with the highest security standards and compliance with regulations.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/star.png" alt="">
                        <h1>Seamless POS Integration</h1>
                        <p>Implementing cutting-edge Point-of-Sale systems that integrate effortlessly with your current setup, enhancing efficiency and customer service.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/star.png" alt="">
                        <h1>Innovative Restaurant Solutions</h1>
                        <p>Bringing the latest technological innovations to your restaurant, from AI-driven menu recommendations to data analytics for business insights.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/star.png" alt="">
                        <h1>24/7 Support and Maintenance</h1>
                        <p>Providing continuous support and regular software updates to ensure that your restaurant operations run smoothly without interruptions.</p>
                    </div>
                </div>

            </div> -->

            <div class="service_choose_us">
                <div class="services_container">

                    <!-- Service 1 - Restaurant Technology Expertise -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Specializing in innovative technology solutions tailored to the unique needs of the restaurant industry to enhance operations and customer engagement.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Restaurant Technology Expertise</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Custom Restaurant Software Development -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Creating bespoke software solutions to streamline restaurant processes, including order management, kitchen display systems, and online reservations.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Custom Restaurant Software Development</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Data Security and Compliance -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Ensuring your restaurant’s customer data and payment information are protected with the highest security standards and compliance with regulations.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Data Security and Compliance</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Seamless POS Integration -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Implementing cutting-edge Point-of-Sale systems that integrate effortlessly with your current setup, enhancing efficiency and customer service.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Seamless POS Integration</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Innovative Restaurant Solutions -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Bringing the latest technological innovations to your restaurant, from AI-driven menu recommendations to data analytics for business insights.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Innovative Restaurant Solutions</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - 24/7 Support and Maintenance -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Providing continuous support and regular software updates to ensure that your restaurant operations run smoothly without interruptions.
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
                    Who Can Avail Our Resturant Software Services</h1>

            </div>

            <div class="avail-section-wrapper">
                <div class="avail-section" id="scrollable-section">
                    <div class="avail-image-container" id="image-scroll">
                        <img src="images/resturant-primary.jpg" alt="Image on Left">
                    </div>


                    <div class="avail-content-container" id="scrollable-content">

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Fine Dining Restaurants</h2>
                            </div>
                            <p>Fine dining establishments can enhance guest experience through reservation management,
                                menu customization, and staff scheduling software. These solutions streamline operations,
                                improve customer service, and facilitate effective communication, ensuring a memorable dining
                                experience that meets high standards of quality and service.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Fast Casual Restaurants</h2>
                            </div>
                            <p>Fast casual restaurants benefit from software that manages orders, payments, and inventory.
                                These systems enable quick service, efficient kitchen operations, and real-time data analytics,
                                helping to optimize menus and enhance customer satisfaction while maintaining speed and
                                quality.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Food Trucks</h2>
                            </div>
                            <p>Food trucks utilize mobile software solutions for order tracking, payment processing, and
                                inventory management. These tools help streamline operations, monitor sales in real-time, and
                                improve customer engagement, making it easier to manage a dynamic and often mobile
                                business environment.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Cafés</h2>
                            </div>
                            <p>Cafés can enhance customer experience with software for point-of-sale systems, loyalty
                                programs, and online ordering. These services simplify transactions, foster customer retention,
                                and provide valuable insights into purchasing habits, ultimately improving sales and operational
                                efficiency.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Catering Services</h2>
                            </div>
                            <p>Catering businesses can benefit from software that manages event bookings, menu planning,
                                and staff assignments. These solutions facilitate effective communication with clients, streamline
                                logistics, and ensure timely delivery of services, enhancing overall event execution and customer
                                satisfaction.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Restaurant Chains</h2>
                            </div>
                            <p>Restaurant chains utilize integrated software for centralized management of multiple locations,
                                including inventory control, sales analytics, and employee scheduling. This comprehensive
                                approach ensures consistency in operations, enhances data-driven decision-making, and
                                improves overall brand performance across all outlets.</p>
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
                            <img src="images/table-management-restaurant.png" alt="">
                        </div>
                        <h2>Table Management</h2>
                        <p>Optimizing seating and reducing wait times efficiently.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/customer-loyalty-programs.png" alt="">
                        </div>
                        <h2>Loyalty Programs</h2>
                        <p>Boosting retention and revenue with tailored programs.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/restaurant-marketing-software.png" alt="">
                        </div>
                        <h2>Marketing Software</h2>
                        <p>Managing campaigns to enhance customer engagement.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/inventory-management-restaurant.png" alt="">
                        </div>
                        <h2>Inventory Management</h2>
                        <p>Streamlining stock control and reducing costs.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/employee-scheduling-restaurant.png" alt="">
                        </div>
                        <h2>Employee Scheduling</h2>
                        <p>Managing schedules and payroll for efficiency.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/feedback-and-reviews-system.png" alt="">
                        </div>
                        <h2>Feedback Systems</h2>
                        <p>Collecting feedback to enhance restaurant ratings.</p>
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


            <!-- ##### FAQ #####  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>Restaurant Website Development FAQs</h1>
            </div>

            <section class="faq-wrapper">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What features are essential for a restaurant website?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Key features include an online menu, reservation system, online ordering, location and contact information, customer reviews, and social media integration. These elements help attract new customers and make it easy for them to engage with your restaurant.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can you integrate online ordering and delivery services?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we can integrate popular online ordering platforms like Grubhub, UberEats, or DoorDash, or create a custom ordering system. This helps streamline the ordering process directly from your website, improving customer convenience and sales.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How can my restaurant website help increase reservations?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We can integrate a reservation booking system directly into your website, allowing customers to book tables seamlessly. This can be combined with Google Calendar or OpenTable for better management of reservations.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Will my restaurant website be optimized for mobile users?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Absolutely! We ensure all restaurant websites are fully responsive and optimized for mobile devices, which is essential since many customers browse restaurant websites on their phones.
                    </p>
                </section>
            </section>





            <!-- ##### Book #######  -->

            <section class="section-book">
                <section class="book-image">
                    <img src="images/booking-industry.jpg" alt="">
                </section>
                <section class="book-data">



                    <h1 data-aos="zoom-in" data-aos-duration="2500">Resturant Software Development Services</h1>
                    <p data-aos="zoom-in" data-aos-duration="2500">Comprehensive Solutions Designed to Support Resturant Professionals</p>
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