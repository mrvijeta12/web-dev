<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'pwa' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'pwa' AND blog_status = 'published'");
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
                <img src="images/pwa-developemnt-hero.jpg"></img>
            </div>



            <!-- ####### core area of expertise ######  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Transforming User Experiences with Progressive Web Apps</h1>
            </div>
            <section class="expertise" data-aos="fade-up" data-aos-duration="1000">
                <div class="expertise-child">
                    <h1>Responsive and Adaptive Design</h1>
                    <p>We create PWAs with responsive and adaptive design principles, ensuring a seamless user experience across all devices and screen sizes. Our approach prioritizes usability and accessibility for all users.</p>
                </div>
                <div class="expertise-child">
                    <h1>Offline Functionality and Caching</h1>
                    <p>Our team implements robust offline functionality in PWAs using service workers and caching strategies. This allows users to access content and features even without an internet connection, enhancing engagement.</p>
                </div>
                <div class="expertise-child">
                    <h1>Fast Loading Times and Performance</h1>
                    <p>We optimize PWAs for speed and performance, ensuring fast loading times through techniques like lazy loading and efficient resource management. This leads to improved user satisfaction and retention.</p>
                </div>
                <div class="expertise-child">
                    <h1>App-like User Experience</h1>
                    <p>Our PWAs provide an app-like experience, utilizing features such as push notifications and home screen installation. This bridges the gap between web and native applications, encouraging user engagement.</p>
                </div>
                <div class="expertise-child">
                    <h1>SEO and Discoverability</h1>
                    <p>We implement best practices for SEO in PWAs, ensuring that your application is discoverable and ranks well in search engines. This drives traffic and improves visibility for your brand.</p>
                </div>
                <div class="expertise-child">
                    <h1>Continuous Integration and Deployment</h1>
                    <p>We utilize continuous integration and deployment (CI/CD) practices for PWAs, streamlining the development process and ensuring that updates and new features are delivered seamlessly to users.</p>
                </div>
            </section>







            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Transforming Industries with Advanced Progressive Web App Solutions</h1>
            </div>

            <div class="service_choose_us">
                <div class="services_container">

                    <!-- Service 1 - Healthcare -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Developing PWAs that provide patients with easy access to health information, appointment scheduling, and telehealth services.
                            </p>
                            <img src="images/web-application-pwa.png" alt="" />
                            <h1>Healthcare</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - E-commerce -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Creating PWAs that deliver fast, engaging shopping experiences, with offline access, push notifications, and seamless navigation.
                            </p>
                            <img src="images/ecommerce-pwa.png" alt="" />
                            <h1>E-commerce</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Education -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Building educational PWAs that facilitate interactive learning experiences, online courses, and resource access, even offline.
                            </p>
                            <img src="images/education-pwa.png" alt="" />
                            <h1>Education</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Travel -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Developing PWAs for travel companies, providing users with real-time booking, itinerary management, and travel updates.
                            </p>
                            <img src="images/travel-pwa.png" alt="" />
                            <h1>Travel</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - News and Media -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Creating PWAs for news organizations, enabling users to access articles, videos, and notifications even without an internet connection.
                            </p>
                            <img src="images/news-pwa.png" alt="" />
                            <h1>News and Media</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - Social Media -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Building social networking PWAs that enhance user interactions, enable content sharing, and offer offline capabilities for engagement.
                            </p>
                            <img src="images/social-media-pwa.png" alt="" />
                            <h1>Social Media</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                </div>
            </div>





            <!-- ########## TECHNOLOGIES  #######  -->

            <div class="container" data-aos="zoom-in" data-aos-duration="1000">
                <h1>Why Progressive Web Apps are the Future of Web Development</h1>
            </div>
            <section class="work-wrapper">
                <section class="work-wrapper-child">
                    <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                        <h2>Enhanced User Engagement</h2>
                        <p>PWAs provide a native app-like experience, engaging users with smooth animations, offline capabilities, and push notifications that keep them coming back.</p>
                    </section>
                    <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                        <h2>Cross-Platform Compatibility</h2>
                        <p>Progressive Web Apps work seamlessly across different devices and platforms, ensuring a consistent user experience whether accessed from mobile or desktop.</p>
                    </section>
                    <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                        <h2>Improved Performance</h2>
                        <p>PWAs leverage caching and service workers to load quickly, even in poor network conditions, resulting in faster page loads and reduced bounce rates.</p>
                    </section>
                    <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                        <h2>Cost-Effective Development</h2>
                        <p>Building a PWA can be more cost-effective than developing separate native apps for multiple platforms, reducing both development time and maintenance costs.</p>
                    </section>
                    <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                        <h2>Easy Installation and Updates</h2>
                        <p>Users can install PWAs directly from their browsers without the need for app stores, and updates are seamless, ensuring users always have the latest version.</p>
                    </section>
                    <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                        <h2>Increased Discoverability</h2>
                        <p>Since PWAs are built using standard web technologies, they are easily indexed by search engines, improving discoverability and driving organic traffic.</p>
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
                <h1>Progressive Web Apps: Frequently Asked Questions</h1>
            </div>

            <section class="faq-wrapper" data-aos="zoom-in" data-aos-duration="1000">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What is a Progressive Web App (PWA)?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        A Progressive Web App (PWA) is a type of application software delivered through the web, built using common web technologies like HTML, CSS, and JavaScript. PWAs aim to deliver a user experience comparable to native apps, including features such as offline access, push notifications, and fast load times, making them reliable and engaging.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What are the benefits of using PWAs for businesses?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        PWAs offer numerous benefits for businesses, including improved performance, higher user engagement, and increased conversion rates. They combine the best features of web and mobile apps, allowing users to install them directly from the browser without going through app stores. Additionally, PWAs are cost-effective, as they require a single codebase for multiple platforms.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do you ensure the performance and reliability of a PWA?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We ensure the performance and reliability of a PWA through various strategies, such as implementing service workers for offline functionality, optimizing assets for faster loading times, and conducting rigorous testing across different devices and browsers. Our focus is on delivering a seamless user experience, regardless of network conditions.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can you integrate PWAs with existing websites?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, PWAs can be integrated with existing websites to enhance their functionality and user experience. Our team can transform your current web application into a PWA by adding service workers, implementing a web app manifest, and optimizing your site for mobile use, ensuring a smooth transition that enhances your existing digital presence.
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

        <?php include('pop.php'); ?>
        <script src="./swiper.js"></script>
        <script src="./blog.js"></script>

    </div>



</body>

</html>