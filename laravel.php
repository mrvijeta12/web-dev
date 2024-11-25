<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'laravel' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'laravel' AND blog_status = 'published'");
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
        <div class="wrapper" data-aos="fade-right" data-aos-duration="1500">

            <!-- ######### HERO SECTION ##########  -->
            <div class="hero-section">
                <div class="hero-content" data-aos="zoom-in" data-aos-duration="2500">
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
                <img src="images/laravel-development-hero.jpg"></img>
            </div>



            <!-- ####### core area of expertise ######  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Harnessing Laravel for Innovative Web Solutions</h1>
            </div>
            <section class="expertise">
                <div class="expertise-child">
                    <h1>Advanced MVC Architecture</h1>
                    <p>We utilize Laravel’s advanced MVC architecture to build clean and organized web applications. This structure promotes separation of concerns, making our applications more maintainable and scalable.</p>
                </div>
                <div class="expertise-child">
                    <h1>Elegant Routing and Middleware</h1>
                    <p>Our team leverages Laravel’s elegant routing system and middleware capabilities to create efficient and secure application routes. This allows for better control over request handling and user authentication.</p>
                </div>
                <div class="expertise-child">
                    <h1>Robust ORM with Eloquent</h1>
                    <p>We take advantage of Laravel’s Eloquent ORM to interact with databases efficiently. This simplifies data management and allows us to focus on building powerful features without worrying about SQL queries.</p>
                </div>
                <div class="expertise-child">
                    <h1>Task Scheduling and Queues</h1>
                    <p>Our expertise includes implementing task scheduling and queues in Laravel, which enhances application performance by managing background tasks efficiently and improving user experience.</p>
                </div>
                <div class="expertise-child">
                    <h1>Secure Authentication and Authorization</h1>
                    <p>We implement secure authentication and authorization systems using Laravel’s built-in features. This ensures that user data is protected and access control is managed effectively throughout your application.</p>
                </div>
                <div class="expertise-child">
                    <h1>Comprehensive Testing Strategies</h1>
                    <p>We employ comprehensive testing strategies in Laravel, utilizing PHPUnit and Laravel’s testing tools to ensure the reliability and performance of your applications before deployment.</p>
                </div>
            </section>




            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Transforming Industries with Advanced Laravel Solutions</h1>
            </div>

            <div class="service_choose_us">
                <div class="services_container">

                    <!-- Service 1 - Retail -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Utilizing Laravel to build seamless retail applications that enhance customer engagement and streamline inventory management processes.
                            </p>
                            <img src="images/web-application-laravel.png" alt="" />
                            <h1>Retail</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Real Estate -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Developing powerful real estate platforms with Laravel, featuring property listings, virtual tours, and efficient client management tools.
                            </p>
                            <img src="images/ecommerce-laravel.png" alt="" />
                            <h1>Real Estate</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Logistics -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Creating dynamic logistics management systems using Laravel, optimizing supply chain operations and real-time tracking for efficiency.
                            </p>
                            <img src="images/education-laravel.png" alt="" />
                            <h1>Logistics</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Entertainment -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Building engaging entertainment applications with Laravel, providing streaming services, user management, and interactive features.
                            </p>
                            <img src="images/finance-laravel.png" alt="" />
                            <h1>Entertainment</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Non-Profit Organizations -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Developing comprehensive platforms for non-profit organizations using Laravel, enabling donation management and volunteer coordination.
                            </p>
                            <img src="images/travel-laravel.png" alt="" />
                            <h1>Non-Profit Organizations</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - Construction -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Creating construction management applications with Laravel, facilitating project tracking, team collaboration, and budget management.
                            </p>
                            <img src="images/social-media-laravel.png" alt="" />
                            <h1>Construction</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                </div>
            </div>



        </div>
        <!-- ########## TECHNOLOGIES  #######  -->

        <div class="container" data-aos="zoom-in" data-aos-duration="1500">
            <h1>Discover the Key Features of Laravel Framework</h1>
        </div>
        <section class="work-wrapper">
            <section class="work-wrapper-child">
                <section class="work-child">
                    <h2>Intuitive Routing System</h2>
                    <p>Laravel’s routing system is straightforward and expressive, allowing developers to easily define application routes and manage URL patterns with clarity.</p>
                </section>
                <section class="work-child">
                    <h2>Rich Ecosystem of Packages</h2>
                    <p>Laravel has a rich ecosystem of third-party packages available through Composer, making it simple to extend functionality and add features without reinventing the wheel.</p>
                </section>
                <section class="work-child">
                    <h2>Robust Queue Management</h2>
                    <p>Laravel provides a robust queue management system that helps manage tasks efficiently, allowing for deferred processing of time-consuming tasks to improve application performance.</p>
                </section>
                <section class="work-child">
                    <h2>Localization Support</h2>
                    <p>With built-in localization features, Laravel makes it easy to create multilingual applications, allowing developers to manage translations and adapt content for various regions.</p>
                </section>
                <section class="work-child">
                    <h2>Seamless Database Migration</h2>
                    <p>Laravel's database migration system facilitates seamless transitions between different database schemas, making it easier to maintain and share changes among developers.</p>
                </section>
                <section class="work-child">
                    <h2>Integrated Dependency Injection</h2>
                    <p>Laravel’s dependency injection container simplifies the management of class dependencies, enhancing code organization and making applications easier to test and maintain.</p>
                </section>
            </section>
        </section>





        <!-- ######### Process ##########  -->

        <div class="container">
            <h1 data-aos="zoom-in" data-aos-duration="1500">
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
            <h1 data-aos="fade-down" data-aos-duration="1500"><span><i class="fa-regular fa-comments"></i></span> Hear From Our Valued Clients</h1>



            <div class="testimonial_slider" data-aos="fade-up" data-aos-duration="2500">
                <div class="testimonial_item">

                    <img src="images/9.jpg" alt="">
                    <img src="images/double-main.png" alt="" class="double">
                    <p>TekAlgo’s Salesforce expertise boosted our sales efficiency and team productivity. Their tailored solutions made a significant difference. Highly recommended!</p>
                    <h5>John Doe</h5>
                    <p>CEO, Company</p>
                </div>
                <div class="testimonial_item">
                    <img src="images/2.jpg" alt="">
                    <img src="images/double-main.png" alt="" class="double">
                    <p>TekAlgo transformed our CRM with seamless Salesforce integration. Exceptional service, knowledgeable team, and tangible results. We’re extremely satisfied! </p>
                    <h5>John Doe</h5>
                    <p>CEO, Company</p>
                </div>
                <div class="testimonial_item">

                    <img src="images/4.jpg" alt="">
                    <img src="images/double-main.png" alt="" class="double">
                    <p>TekAlgo’s Salesforce solutions enhanced our customer management. The team is responsive, professional, and delivered beyond our expectations. Outstanding experience! </p>
                    <h5>John Doe</h5>
                    <p>CEO, Company</p>
                </div>
            </div>
        </section>

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



        <!-- #### faq #####  -->
        <div class="container" data-aos="zoom-in" data-aos-duration="1500">
            <h1>Laravel Development: Frequently Asked Questions</h1>
        </div>

        <section class="faq-wrapper">
            <section class="faq-child">
                <section class="faq-heading">
                    <h1>What are the key features of Laravel?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    Laravel is renowned for its elegant syntax and robust features. Key features include an expressive ORM (Eloquent), built-in authentication and authorization, a powerful routing system, and tools for task scheduling and queue management. These features streamline the development process and enhance application performance.
                </p>
            </section>

            <section class="faq-child">
                <section class="faq-heading">
                    <h1>How do you ensure the scalability of Laravel applications?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    Scalability is essential for any web application, and Laravel makes it achievable through its modular packaging system and service container. Our team employs best practices such as caching, database optimization, and load balancing to ensure that your application can handle increasing traffic and grow with your business.
                </p>
            </section>

            <section class="faq-child">
                <section class="faq-heading">
                    <h1>Can Laravel applications be integrated with third-party services?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    Yes, Laravel offers excellent support for integrating with third-party services and APIs. Our team can seamlessly connect your application with payment gateways, social media platforms, and external databases, enhancing functionality and providing a more comprehensive user experience.
                </p>
            </section>

            <section class="faq-child">
                <section class="faq-heading">
                    <h1>What types of projects are best suited for Laravel?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    Laravel is well-suited for a wide range of projects, including complex web applications, RESTful APIs, e-commerce platforms, and content management systems. Its flexibility and extensive ecosystem make it an ideal choice for projects that require rapid development and robust features.
                </p>
            </section>
        </section>




        <!-- ##### Book #######  -->

        <section class="book">
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