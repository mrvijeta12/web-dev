<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'travel' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'travel' AND blog_status = 'published'");
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
                        <span>T</span><span>r</span><span>a</span><span>v</span><span>e</span><span>l</span>
                        <span>S</span><span>o</span><span>f</span><span>t</span><span>w</span><span>a</span><span>r</span><span>e</span> <span>D</span><span>e</span><span>v</span><span>e</span><span>l</span><span>o</span><span>p</span><span>m</span><span>e</span><span>n</span><span>t</span> <span>S</span><span>e</span><span>r</span><span>v</span><span>i</span><span>c</span><span>e</span><span>s</span>
                    </h1>
                    <h3 data-aos="fade-up" data-aos-duration="1500">Empowering Travel Businesses Through Custom Software Development</h3>
                    <a href="#" class="reopenPopup">Get Free Quote</a>

                </div>
                <div class="child child2">
                    <img src="images/travel-hero.png" alt="" data-aos="fade-left" data-aos-duration="2500" />
                </div>
            </div>

            <!-- ####### INTRODUCTION  ####### -->

            <section class="intro">
                <h1>Redefining Travel Experiences with Our Innovative Software Development Solutions</h1>
                <p>Our travel software development services are designed to enhance the journey from planning to destination, making travel more personalized, efficient, and seamless. By leveraging cutting-edge technology, data insights, and intuitive design, we empower travel companies to deliver exceptional customer experiences, streamline operations, and adapt to the evolving needs of modern travelers.</p>
            </section>


            <!-- ####### details ####### -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">
                    Process We Follow To Develop Travel Software</h1>

            </div>

            <section class="detail">
                <section class="detail-title detail-child">
                    <p class="tab active-tab" onclick="toggleContent(1)">
                        <strong>01.</strong> Travel Software Consulting

                    </p>
                    <p class="tab" onclick="toggleContent(2)">
                        <strong>02.</strong> Custom Travel Software Development

                    </p>
                    <p class="tab" onclick="toggleContent(3)">
                        <strong>03.</strong> Travel Software Product Development

                    </p>
                    <p class="tab" onclick="toggleContent(4)">
                        <strong>04.</strong> Travel Software Integration

                    </p>
                    <p class="tab" onclick="toggleContent(5)">
                        <strong>05.</strong> Travel Software Testing and Quality Assurance

                    </p>
                    <p class="tab" onclick="toggleContent(6)">
                        <strong>06.</strong> Travel Software Modernization

                    </p>
                    <p class="tab" onclick="toggleContent(7)">
                        <strong>07.</strong> Travel Software Maintenance and Support

                    </p>
                </section>
                <section class="detail-description detail-child">
                    <section id="content1" class="content">
                        <div class="content-header">
                            <img src="images/consultation.png" alt="">
                            <h3>Travel Software Consulting</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We analyze your travel business needs and technological requirements, providing strategic guidance for developing customized software solutions. Our consulting services help identify growth opportunities, mitigate risks, and establish a solid foundation for successful software implementation.</p>
                    </section>
                    <section id="content2" class="content">
                        <div class="content-header">
                            <img src="images/software-development-process.png" alt="">
                            <h3>Custom Travel Software Development</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We specialize in developing tailored software solutions that cater to your travel agency's specific requirements. From initial coding to deploying unique features, our development process ensures your software meets both operational and customer service needs.</p>
                    </section>
                    <section id="content3" class="content">
                        <div class="content-header">
                            <img src="images/development.png" alt="">
                            <h3>Travel Software Product Development</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We focus on creating scalable, market-ready software products for the travel industry, transforming your innovative ideas into reality. Our product development services deliver solutions that enhance user experience, streamline operations, and drive revenue growth.</p>
                    </section>
                    <section id="content4" class="content">
                        <div class="content-header">
                            <img src="images/deployment.png" alt="">
                            <h3>Travel Software Integration</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>Our integration services ensure seamless connectivity between your new software and existing travel systems. We facilitate interoperability among platforms to enhance operational efficiency, reduce manual processes, and improve customer satisfaction.</p>
                    </section>
                    <section id="content5" class="content">
                        <div class="content-header">
                            <img src="images/project-analysis-health.png" alt="">
                            <h3>Travel Software Testing and Quality Assurance</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We conduct comprehensive testing of your travel software to identify bugs and vulnerabilities, ensuring it meets the highest standards of performance, security, and compliance with industry regulations. Our quality assurance practices guarantee a reliable user experience.</p>
                    </section>
                    <section id="content6" class="content">
                        <div class="content-header">
                            <img src="images/moderization-process.png" alt="">
                            <h3>Travel Software Modernization</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We upgrade legacy travel software to meet contemporary technological standards, enhancing its functionality and security. Our modernization services help your agency stay competitive by adopting advanced features that support evolving customer needs and operational demands.</p>
                    </section>
                    <section id="content7" class="content">
                        <div class="content-header">
                            <img src="images/support-process.png" alt="">
                            <h3>Travel Software Maintenance and Support</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>Our maintenance and support services provide ongoing software updates, troubleshooting, and enhancements to ensure optimal performance. We focus on resolving issues, improving functionality, and adapting the software to changing technology trends and travel industry requirements.</p>
                    </section>
                </section>
            </section>





            <!-- ######### Benefits ##########  -->
            <section class="benefits-wrapper">
                <h1>Sectors that can benefits from our Travel software development services</h1>

                <div class="benefits-sectors">
                    <ul>
                        <li>Travel Agencies</li>
                        <li>Tour Operators</li>
                        <li>Airlines</li>
                        <li>Hotels and Resorts</li>
                        <li>Car Rental Services</li>
                        <li>Travel Insurance Companies</li>
                    </ul>
                    <ul>
                        <li>Cruise Lines</li>
                        <li>Online Travel Platforms</li>
                        <li>Adventure Travel Companies</li>
                        <li>Destination Management Companies</li>
                        <li>Local Experience Providers</li>
                        <li>Travel Technology Solutions</li>
                    </ul>
                </div>
            </section>



            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Why Choose TekAlgo As Your Travel Software Development</h1>

            </div>


            <div class="service_choose_us">

                <div class="services_container">
                    <!-- Service 1 - Travel Technology Expertise -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Leading the way with innovative technology solutions tailored for the travel industry, enhancing booking processes, customer experiences, and operational efficiency.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Travel Technology Expertise</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Custom Travel App Development -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Designing intuitive and user-friendly travel apps for seamless bookings, itinerary management, and personalized travel experiences that cater to modern traveler needs.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Custom Travel App Development</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Data Security and Payment Protection -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Implementing advanced security measures to safeguard customer data and secure payment transactions across all travel booking platforms.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Data Security and Payment Protection</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Seamless Platform Integration -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Ensuring smooth integration of travel booking systems with third-party services, enhancing user experience with real-time updates and multiple booking options.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Seamless Platform Integration</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Scalable and Innovative Solutions -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Delivering cutting-edge technology that supports scalability and innovation, allowing your travel platform to grow with industry trends and customer demands.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Scalable and Innovative Solutions</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - 24/7 Support and Maintenance -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Providing continuous support and regular updates to ensure your travel technology platform operates smoothly and delivers an exceptional user experience.
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
                    Who Can Avail Our Travel Software Services</h1>

            </div>

            <div class="avail-section-wrapper">
                <div class="avail-section" id="scrollable-section">
                    <div class="avail-image-container" id="image-scroll">
                        <img src="images/travel1-primary.jpg" alt="Image on Left">
                    </div>

                    <div class="avail-content-container" id="scrollable-content">
                        <!-- Travel Industry Content -->
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Travel Agencies</h2>
                            </div>
                            <p>Travel agencies utilize software for booking management, customer relationship management,
                                and itinerary planning. These solutions streamline the booking process, enhance client
                                communication, and provide valuable insights into travel trends, improving overall service
                                quality and client satisfaction.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Airlines</h2>
                            </div>
                            <p>Airlines benefit from software for flight scheduling, ticketing, and customer service. These
                                systems improve operational efficiency, enable real-time updates for passengers, and enhance
                                loyalty program management, ensuring a smoother travel experience and better management
                                of resources.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Hotels and Lodging</h2>
                            </div>
                            <p>Hotels use software for reservation management, guest services, and revenue optimization.
                                These tools facilitate online bookings, improve customer engagement, and provide analytics for
                                pricing strategies, helping to enhance guest experiences and maximize occupancy rates.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Car Rental Services</h2>
                            </div>
                            <p>Car rental companies leverage software for fleet management, reservation systems,
                                and customer service. These solutions streamline operations, improve inventory tracking, and
                                enhance the rental process, ensuring efficient service delivery and a better overall experience for
                                customers.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Tour Operators</h2>
                            </div>
                            <p>Tour operators benefit from software that manages tour bookings, customer inquiries,
                                and itinerary customization. These tools facilitate efficient communication with clients, streamline
                                logistics, and provide valuable data insights, ensuring memorable travel experiences and
                                enhanced operational efficiency.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Travel Insurance Providers</h2>
                            </div>
                            <p>Travel insurance companies utilize software for policy management, claims processing, and
                                customer support. These systems improve efficiency, enhance customer communication, and
                                provide data analytics for risk assessment, ensuring timely service delivery and better
                                management of insurance products.</p>
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
                            <img src="images/travel-booking-software.png" alt="">
                        </div>
                        <h2>Travel Booking Software</h2>
                        <p>User-friendly platforms for booking flights and hotels.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/itinerary-management.png" alt="">
                        </div>
                        <h2>Itinerary Management Solutions</h2>
                        <p>Systems to manage and customize travel itineraries easily.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/travel-analytics-software.png" alt="">
                        </div>
                        <h2>Travel Analytics Tools</h2>
                        <p>Data insights into travel patterns for better decisions.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/loyalty-program-software.png" alt="">
                        </div>
                        <h2>Loyalty Program Development</h2>
                        <p>Customized programs to enhance customer retention and loyalty.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/mobile-app-development.png" alt="">
                        </div>
                        <h2>Mobile Travel Apps</h2>
                        <p>Apps to facilitate bookings and real-time travel updates.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/online-payment-solutions.png" alt="">
                        </div>
                        <h2>Online Payment Solutions</h2>
                        <p>Secure payment gateways for safe online booking experiences.</p>
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



            <!-- #### faq ######  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>Your Travel Web Development Questions, Answered</h1>
            </div>

            <section class="faq-wrapper">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What kind of websites do you develop for the travel industry?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We create websites for various travel businesses, including travel agencies, tour operators, hotels, airlines, and booking platforms. Each site is tailored to enhance the visitor experience, boost bookings, and showcase your unique offerings.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can you integrate booking systems and travel APIs?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we specialize in integrating booking engines and travel APIs, allowing real-time availability and pricing updates for flights, hotels, and tours. We ensure a seamless user experience that encourages customers to book directly on your site.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Do you offer multilingual and multi-currency support?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Absolutely! For a global reach, we provide multilingual support and multi-currency options, making it easy for international travelers to navigate and book in their preferred language and currency.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do you enhance the website's visual appeal for travel clients?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We use high-quality visuals, immersive design elements, and intuitive navigation to capture the spirit of travel and adventure. Our goal is to create an inspiring experience that encourages visitors to explore and book their next trip.
                    </p>
                </section>
            </section>





            <!-- ##### Book #######  -->

            <section class="section-book">
                <section class="book-image">
                    <img src="images/booking-industry.jpg" alt="">
                </section>
                <section class="book-data">



                    <h1 data-aos="zoom-in" data-aos-duration="2500">Travel Software Development Services</h1>
                    <p data-aos="zoom-in" data-aos-duration="2500">Comprehensive Solutions Designed to Support Travel Professionals</p>
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