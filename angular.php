<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'angularjs' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'angularjs' AND blog_status = 'published'");
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
    <link rel="stylesheet" href="assests/css/theme.css">

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
                    <!-- <img src="images/freepik__background__74942.png" alt="" data-aos="zoom-in" data-aos-duration="1500" /> -->
                    <h1 class="animated-heading">
                        Advanced Angular.JS Solutions
                    </h1>
                    <p>
                        Transforming user experiences with responsive, high-performance applications built on Angular.
                    </p>
                    <a href="#" class="reopenPopup">Consult Our Experts</a>
                </div>
            </div>

            <!-- Image Wrapper with Full Image Section Inside -->
            <div class="image-wrapper">
                <img src="images/angularjs-development-hero.jpg"></img>
            </div>






            <!-- ####### core area of expertise ######  -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Comprehensive Expertise in AngularJS Development for Modern Applications</h1>



            </div>
            <section class="expertise">
                <div class="expertise-child">
                    <h1>User-Centric Design Principles</h1>
                    <p>We focus on user-centric design principles to create intuitive interfaces that prioritize user experience. By conducting thorough user research and usability testing, we ensure that our AngularJS applications meet the needs and expectations of users, leading to increased satisfaction and engagement.</p>
                </div>
                <div class="expertise-child">
                    <h1>AngularJS Framework Mastery</h1>
                    <p>Our team excels in AngularJS, leveraging its powerful features like two-way data binding, dependency injection, and directives to build dynamic and responsive web applications. With a deep understanding of the framework, we create scalable solutions that enhance user interaction.</p>
                </div>
                <div class="expertise-child">
                    <h1>Cross-Browser Compatibility</h1>
                    <p>We ensure that our AngularJS applications function seamlessly across all major browsers. Through rigorous testing and the use of polyfills and fallbacks, we deliver consistent user experiences regardless of the user's choice of browser, improving overall accessibility and user retention.</p>
                </div>
                <div class="expertise-child">
                    <h1>Performance Optimization Techniques</h1>
                    <p>Our AngularJS development practices include performance optimization techniques such as lazy loading, ahead-of-time (AOT) compilation, and minimizing watch cycles. By implementing these strategies, we enhance application loading times and responsiveness, resulting in a smoother experience for end-users.</p>
                </div>
                <div class="expertise-child">
                    <h1>Component-Based Architecture</h1>
                    <p>We utilize AngularJS's component-based architecture to build reusable and maintainable components. This approach not only improves code organization but also allows for better scalability and collaboration across development teams.</p>
                </div>
                <div class="expertise-child">
                    <h1>Version Control and Collaboration</h1>
                    <p>Our team employs version control systems like Git to streamline collaboration and code management. By maintaining clear documentation and following branching strategies, we ensure smooth workflows, enabling teams to work together efficiently and effectively on AngularJS projects.</p>
                </div>
            </section>





            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Transforming Industries with Advanced Angular Solutions</h1>
            </div>

            <!-- <div class="service_choose_us">
                <div class="services_container">
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Utilizing Angular to build dynamic, responsive web applications that enhance user engagement and streamline workflows with modular architecture.
                            </p>
                            <img src="images/web-application-angular.png" alt="" />
                            <h2>Technology</h2>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Creating powerful cross-platform mobile applications using Angular with Ionic, ensuring a native-like experience on both iOS and Android.
                            </p>
                            <img src="images/mobile-app-angular.png" alt="" />
                            <h2>Mobile Development</h2>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Developing feature-rich e-commerce platforms with Angular, offering seamless user experiences, secure transactions, and real-time inventory management.
                            </p>
                            <img src="images/ecommerce-angular.png" alt="" />
                            <h2>E-commerce</h2>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Building real-time applications with Angular that provide instant data updates and enhance user interaction in various sectors.
                            </p>
                            <img src="images/real-time-angular.png" alt="" />
                            <h2>Finance</h2>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Creating Progressive Web Apps with Angular that deliver the best of web and mobile experiences, ensuring fast performance and offline support.
                            </p>
                            <img src="images/pwa-angular.png" alt="" />
                            <h2>Retail</h2>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Developing interactive games using Angular, integrating engaging user interfaces and powerful libraries to captivate players.
                            </p>
                            <img src="images/game-development-angular.png" alt="" />
                            <h2>Gaming</h2>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>
                </div>
            </div> -->
            <div class="service_choose_us">
                <div class="services_container">

                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Utilizing Angular to build dynamic, responsive web applications that enhance user engagement and streamline workflows with modular architecture.
                            </p>
                            <img src="images/web-application-angular.png" alt="" />
                            <h1>Technology</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Creating powerful cross-platform mobile applications using Angular with Ionic, ensuring a native-like experience on both iOS and Android.
                            </p>
                            <img src="images/mobile-app-angular.png" alt="" />
                            <h1>Mobile Development</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Developing feature-rich e-commerce platforms with Angular, offering seamless user experiences, secure transactions, and real-time inventory management.
                            </p>
                            <img src="images/ecommerce-angular.png" alt="" />
                            <h1>E-commerce</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Building real-time applications with Angular that provide instant data updates and enhance user interaction in various sectors.
                            </p>
                            <img src="images/real-time-angular.png" alt="" />
                            <h1>Finance</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Creating Progressive Web Apps with Angular that deliver the best of web and mobile experiences, ensuring fast performance and offline support.
                            </p>
                            <img src="images/pwa-angular.png" alt="" />
                            <h1>Retail</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Developing interactive games using Angular, integrating engaging user interfaces and powerful libraries to captivate players.
                            </p>
                            <img src="images/game-development-angular.png" alt="" />
                            <h1>Gaming</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                </div>
            </div>



            <!-- ####### choose language ######  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>Why Angular.js Stands Out</h1>
            </div>
            <section class="work-wrapper">
                <section class="work-wrapper-child">
                    <section class="work-child">
                        <h2>Dynamic Web Applications</h2>
                        <p>Angular.js empowers developers to build dynamic web applications that are both fast and responsive, enhancing user engagement and satisfaction.</p>
                    </section>
                    <section class="work-child">
                        <h2>Declarative UI</h2>
                        <p>With Angular.js, developers can define user interfaces declaratively, allowing for clearer, more intuitive code that simplifies application logic and enhances readability.</p>
                    </section>
                    <section class="work-child">
                        <h2>Built-In Directives</h2>
                        <p>Angular.js offers a set of built-in directives that streamline DOM manipulation and enhance functionality, enabling developers to create interactive features with minimal effort.</p>
                    </section>
                    <section class="work-child">
                        <h2>Optimized Performance</h2>
                        <p>Angular.js optimizes performance through lazy loading and efficient change detection, ensuring that applications run smoothly even with complex functionalities.</p>
                    </section>
                    <section class="work-child">
                        <h2>Cross-Platform Development</h2>
                        <p>Angular.js supports cross-platform development, allowing developers to create applications that work seamlessly on both web and mobile environments, increasing reach and accessibility.</p>
                    </section>
                    <section class="work-child">
                        <h2>Rich Ecosystem</h2>
                        <p>The rich ecosystem of Angular.js provides a wide array of third-party libraries and tools, enhancing the development process and enabling the creation of feature-rich applications.</p>
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

            <!-- #### faq #######  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>Advanced Angular.js Development: Frequently Asked Questions</h1>
            </div>

            <section class="faq-wrapper">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Why choose your team for Angular.js development?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Our team has extensive experience building robust, scalable applications with Angular.js. We follow best practices in modular design and component-driven architecture, which allow us to deliver high-performance, maintainable applications suited for complex projects like enterprise applications and dynamic user interfaces.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What types of applications are best suited for Angular.js?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Angular.js is ideal for building single-page applications (SPAs), enterprise-level applications, dashboards, and interactive web applications that require complex data binding, real-time updates, and dynamic content. Its MVC (Model-View-Controller) architecture makes it well-suited for large-scale applications that need structured and maintainable code.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How does your team handle state management in Angular.js applications?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Our team uses advanced state management solutions in Angular.js, such as RxJS and NgRx, to manage complex application states efficiently. This allows us to create reactive and predictable data flows, making the application responsive and enhancing the user experience even in applications with high interactivity.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What performance optimizations do you implement in Angular.js projects?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We use various performance optimization techniques, such as lazy loading modules, AOT (Ahead-of-Time) compilation, and efficient change detection strategies, to ensure Angular.js applications are fast and responsive. Additionally, we utilize code splitting and caching strategies to enhance load times and overall application speed.
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