<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'entertainment' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'entertainment' AND blog_status = 'published'");
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
                        <span>E</span><span>n</span><span>t</span><span>e</span><span>r</span><span>t</span><span>a</span><span>i</span><span>n</span><span>m</span><span>e</span><span>n</span><span>t</span>
                        <span>S</span><span>o</span><span>f</span><span>t</span><span>w</span><span>a</span><span>r</span><span>e</span> <span>D</span><span>e</span><span>v</span><span>e</span><span>l</span><span>o</span><span>p</span><span>m</span><span>e</span><span>n</span><span>t</span> <span>S</span><span>e</span><span>r</span><span>v</span><span>i</span><span>c</span><span>e</span><span>s</span>
                    </h1>
                    <h3 data-aos="fade-up" data-aos-duration="1500">Empowering Entertainment with Cutting-Edge Software Solutions</h3>
                    <a href="#" class="reopenPopup">Get Free Quote</a>

                </div>
                <div class="child child2">
                    <img src="images/entertainment-hero.png" alt="" data-aos="fade-left" data-aos-duration="2500" />
                </div>
            </div>

            <!-- ####### INTRODUCTION  ####### -->

            <section class="intro">
                <h1>Elevating Entertainment with Our Advanced Software Development Solutions</h1>
                <p>Our software development services for the entertainment industry are crafted to transform how content is created, distributed, and experienced. By integrating state-of-the-art technology, real-time data analysis, and interactive design, we empower entertainment companies to deliver unforgettable experiences, optimize their operations, and keep audiences engaged like never before.</p>
            </section>


            <!-- ####### details ####### -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">
                    Process We Follow To Develop Entertainment Software</h1>

            </div>

            <section class="detail">
                <section class="detail-title detail-child">
                    <p class="tab active-tab" onclick="toggleContent(1)">
                        <strong>01.</strong> Entertainment Software Consulting

                    </p>
                    <p class="tab" onclick="toggleContent(2)">
                        <strong>02.</strong> Custom Entertainment Software Development

                    </p>
                    <p class="tab" onclick="toggleContent(3)">
                        <strong>03.</strong> Entertainment Software Product Development

                    </p>
                    <p class="tab" onclick="toggleContent(4)">
                        <strong>04.</strong> Entertainment Software Integration

                    </p>
                    <p class="tab" onclick="toggleContent(5)">
                        <strong>05.</strong> Entertainment Software Testing and Quality Assurance

                    </p>
                    <p class="tab" onclick="toggleContent(6)">
                        <strong>06.</strong> Entertainment Software Modernization

                    </p>
                    <p class="tab" onclick="toggleContent(7)">
                        <strong>07.</strong> Entertainment Software Maintenance and Support

                    </p>
                </section>
                <section class="detail-description detail-child">
                    <section id="content1" class="content">
                        <div class="content-header">
                            <img src="images/consultation.png" alt="">
                            <h3>Entertainment Software Consulting</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We assess your entertainment business's needs and technological landscape, providing strategic insights to develop customized software solutions. Our consulting services identify growth opportunities, mitigate risks, and lay the groundwork for effective software implementation.</p>
                    </section>
                    <section id="content2" class="content">
                        <div class="content-header">
                            <img src="images/software-development-process.png" alt="">
                            <h3>Custom Entertainment Software Development</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We excel in creating tailored software solutions that meet the unique needs of your entertainment business. From coding to deploying specialized features, our development process ensures your software enhances both operational efficiency and audience engagement.</p>
                    </section>
                    <section id="content3" class="content">
                        <div class="content-header">
                            <img src="images/development.png" alt="">
                            <h3>Entertainment Software Product Development</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We specialize in developing scalable, market-ready software products for the entertainment industry, turning your creative concepts into reality. Our product development services aim to enhance user experience, streamline operations, and boost revenue potential.</p>
                    </section>
                    <section id="content4" class="content">
                        <div class="content-header">
                            <img src="images/deployment.png" alt="">
                            <h3>Entertainment Software Integration</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>Our integration services ensure seamless connectivity between new software and existing entertainment systems. We facilitate interoperability among platforms to enhance operational efficiency, reduce manual workflows, and improve user experience.</p>
                    </section>
                    <section id="content5" class="content">
                        <div class="content-header">
                            <img src="images/project-analysis-health.png" alt="">
                            <h3>Entertainment Software Testing and Quality Assurance</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We perform rigorous testing of your entertainment software to identify bugs and security vulnerabilities, ensuring compliance with industry standards. Our quality assurance processes guarantee a reliable and enjoyable user experience.</p>
                    </section>
                    <section id="content6" class="content">
                        <div class="content-header">
                            <img src="images/moderization-process.png" alt="">
                            <h3>Entertainment Software Modernization</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We upgrade legacy entertainment software to meet current technological standards, enhancing functionality and security. Our modernization services help your business stay competitive by integrating advanced features that adapt to evolving audience needs.</p>
                    </section>
                    <section id="content7" class="content">
                        <div class="content-header">
                            <img src="images/support-process.png" alt="">
                            <h3>Entertainment Software Maintenance and Support</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>Our maintenance and support services provide ongoing updates, troubleshooting, and enhancements to ensure optimal software performance. We focus on resolving issues, improving functionality, and adapting software to meet the changing landscape of the entertainment industry.</p>
                    </section>
                </section>
            </section>





            <!-- ######### Benefits ##########  -->
            <section class="benefits-wrapper">
                <h1>Sectors that can benefits from our Entertainment software development services</h1>


                <div class="benefits-sectors">
                    <ul>
                        <li>Movie Theaters</li>
                        <li>Concert Venues</li>
                        <li>Amusement Parks</li>
                        <li>Event Planning Companies</li>
                        <li>Streaming Services</li>
                        <li>Gaming Companies</li>
                    </ul>
                    <ul>
                        <li>Live Performance Theaters</li>
                        <li>Sports Franchises</li>
                        <li>Art Galleries</li>
                        <li>Museums</li>
                        <li>Escape Rooms</li>
                        <li>Virtual Reality Experiences</li>
                    </ul>
                </div>
            </section>



            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Why Choose TekAlgo As Your Entertainment Software Development</h1>

            </div>


            <div class="service_choose_us">

                <div class="services_container">
                    <!-- Service 1 - Entertainment Technology Expertise -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Leading the way with innovative technology solutions tailored for the entertainment industry, enhancing content delivery, audience engagement, and digital experiences.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Entertainment Technology Expertise</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Custom Entertainment App Development -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Creating immersive and engaging apps for streaming, live events, and interactive content that cater to the evolving preferences of your audience.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Custom Entertainment App Development</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Data Security and DRM Protection -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Implementing robust security protocols and Digital Rights Management (DRM) to protect your content from piracy and unauthorized access.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Data Security and DRM Protection</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Seamless Platform Integration -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Ensuring smooth integration of your entertainment platform with existing systems, enhancing content delivery and providing a unified viewing experience.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Seamless Platform Integration</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Interactive and Scalable Solutions -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Leveraging cutting-edge technology to deliver interactive experiences, scalable for growing audiences and evolving content trends in the entertainment industry.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Interactive and Scalable Solutions</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - 24/7 Support and Maintenance -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Providing continuous support and timely updates to ensure uninterrupted content streaming and seamless user experiences across your entertainment platform.
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
                    Who Can Avail Our Entertainment Software Services</h1>

            </div>

            <div class="avail-section-wrapper">
                <div class="avail-section" id="scrollable-section">
                    <div class="avail-image-container" id="image-scroll">
                        <img src="images/entertainment-primary1.jpg" alt="Image on Left">
                    </div>
                    <div class="avail-content-container" id="scrollable-content">
                        <!-- New Entertainment Industry Content -->
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Film Production</h2>
                            </div>
                            <p>Film production companies can utilize software for project management, scriptwriting, and
                                budgeting. These tools streamline collaboration among teams, enhance scheduling, and provide
                                real-time financial tracking, ensuring that projects are completed on time and within budget
                                while fostering creativity.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Music Industry</h2>
                            </div>
                            <p>The music industry benefits from software for digital distribution, marketing, and rights
                                management. These solutions help artists manage their catalogs, promote their work effectively,
                                and monitor sales, enabling better engagement with fans and maximizing revenue streams
                                across platforms.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Event Management</h2>
                            </div>
                            <p>Event management companies can use software for ticketing, attendee tracking, and logistics
                                planning. These tools facilitate seamless coordination of events, improve communication
                                with stakeholders, and enhance attendee experiences, ensuring successful execution of concerts,
                                festivals, and corporate events.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Gaming</h2>
                            </div>
                            <p>The gaming industry leverages software for game development, player analytics, and
                                community engagement. These solutions help developers create immersive experiences,
                                monitor player behavior, and facilitate multiplayer interactions, driving engagement and
                                improving overall game quality and player satisfaction.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Theater and Performing Arts</h2>
                            </div>
                            <p>Theater companies can utilize software for ticket sales, audience engagement, and production
                                scheduling. These tools streamline box office operations, enhance marketing efforts, and
                                improve communication among cast and crew, ensuring successful performances and increased
                                audience attendance.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Broadcast Media</h2>
                            </div>
                            <p>Broadcast media organizations benefit from software for content management, scheduling, and
                                audience analytics. These systems enhance workflow efficiency, enable targeted programming,
                                and provide insights into viewer preferences, ultimately improving content delivery and
                                increasing viewer engagement across channels.</p>
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
                            <img src="images/event-management-software.png" alt="">
                        </div>
                        <h2>Event Management Software</h2>
                        <p>Creating platforms to manage events, ticket sales, and engagement.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/media-content-management.png" alt="">
                        </div>
                        <h2>Media Management Systems</h2>
                        <p>Developing solutions to organize and distribute media assets efficiently.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/streaming-platform-development.png" alt="">
                        </div>
                        <h2>Streaming Platform Development</h2>
                        <p>Building customized streaming solutions for live events and content.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/ticketing-systems.png" alt="">
                        </div>
                        <h2>Ticketing and Reservations</h2>
                        <p>Implementing secure solutions for ticket sales and event registrations.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/virtual-reality-experiences.png" alt="">
                        </div>
                        <h2>VR and AR Experiences</h2>
                        <p>Creating immersive VR and AR applications for unique engagement.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/artist-management-software.png" alt="">
                        </div>
                        <h2>Artist Management Software</h2>
                        <p>Streamlining management, bookings, contracts, and communication for artists.</p>
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
                <h1>Entertainment Industry Website Development FAQs</h1>
            </div>

            <section class="faq-wrapper">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What type of websites do you develop for the entertainment industry?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We develop a variety of entertainment websites, including sites for film studios, music labels, event venues, artist portfolios, streaming services, and media platforms. Each site is designed to engage audiences and showcase creative content effectively.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can you integrate streaming and multimedia on our website?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Absolutely! We specialize in integrating multimedia features, including live streaming, video and audio galleries, and interactive media. These tools allow your audience to access content easily and enhance their online experience.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do you ensure a visually engaging website?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Our design team uses the latest trends in web design, including dynamic layouts, high-quality visuals, and animations, to create an engaging user experience. We focus on capturing the unique brand and personality of each client to make a lasting impression.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Do you offer SEO services tailored to the entertainment industry?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we provide SEO strategies specifically tailored for the entertainment industry. This includes optimizing content for search engines, improving visibility on video and media platforms, and driving organic traffic to your site.
                    </p>
                </section>
            </section>





            <!-- ##### Book #######  -->

            <section class="section-book">
                <section class="book-image">
                    <img src="images/booking-industry.jpg" alt="">
                </section>
                <section class="book-data">



                    <h1 data-aos="zoom-in" data-aos-duration="2500">Entertainment Software Development Services</h1>
                    <p data-aos="zoom-in" data-aos-duration="2500">Comprehensive Solutions Designed to Support Entertainment Professionals</p>
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