<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'laravel-developer' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'laravel-developer' AND blog_status = 'published'");
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
    <link rel="stylesheet" href="assests/css/offshore-experts.css">
    <link rel="stylesheet" href="assests/css/theme.css">
    <link rel="stylesheet" href="assests/css/navbar.css">
    <link rel="stylesheet" href="assests/css/footer.css">

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

            <!-- ####### HERO SECTION ####### -->
            <div class="hero">
                <div class="child child1" data-aos="fade-right" data-aos-duration="1000">
                    <h1>Transform Your Ideas with Our Skilled Laravel Developers</h1>
                    <h2>Custom Laravel Solutions Tailored to Bring Your Vision to Life</h2>
                    <a href="#" class="reopenPopup">Consult Our Experts</a>
                </div>
                <div class="child child2" data-aos="fade-right" data-aos-duration="1000">
                    <img src="images/laravel-developer.jpg" alt="">
                </div>
            </div>




            <!-- ####### INTRO ######### -->

            <div class="intro-wrapper">

                <div class="intro-slide intro-1" data-aos="fade-left" data-aos-duration="1000">
                    <h2>Transform Your Ideas into Reality with Our Expert Laravel Developers, Offering Tailored Solutions for Your Projects.</h2>
                    <p>Our skilled Laravel developers are dedicated to creating feature-rich web applications that align with your specific business goals. By leveraging the powerful capabilities of the Laravel framework, we build secure, efficient, and scalable solutions that enhance user experience and streamline operations.</p>
                    <p>With a commitment to innovation and best practices, we ensure your Laravel applications are optimized for performance and maintainability. Partner with us to unlock the full potential of Laravel and elevate your online presence to the next level.</p>
                </div>




                <div class="intro-slide intro-2">
                    <img src="images/developer-primary.jpg" alt="" data-aos="fade-right" data-aos-duration="1500">
                </div>





            </div>



            <!-- ######### Team ######  -->

            <div class="swiper mySwiper">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Engage Performance-Oriented Laravel Professionals for Maximum ROI</h1>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/we-1.jpg" alt="">

                        </div>
                        <div class="swiper-slide-data">
                            <h2>Adrian</h2>
                            <p>Laravel Developer</p>
                            <strong>Experience <i class="fa-solid fa-angles-right"></i> 5+ Years</strong>
                            <p>Avability <i class="fa-solid fa-angles-right"></i> Full-Time</p>
                            <a href="#" class="reopenPopup">Hire Now </a>


                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/we-2.jpg" alt="">

                        </div>
                        <div class="swiper-slide-data">
                            <h2>Adrian</h2>
                            <p>Laravel Developer</p>
                            <strong>Experience <i class="fa-solid fa-angles-right"></i> 5+ Years</strong>
                            <p>Avability <i class="fa-solid fa-angles-right"></i> Full-Time</p>
                            <a href="#" class="reopenPopup">Hire Now </a>


                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/we-3.jpg" alt="">

                        </div>
                        <div class="swiper-slide-data">
                            <h2>Adrian</h2>
                            <p>Laravel Developer</p>
                            <strong>Experience <i class="fa-solid fa-angles-right"></i> 5+ Years</strong>
                            <p>Avability <i class="fa-solid fa-angles-right"></i> Full-Time</p>
                            <a href="#" class="reopenPopup">Hire Now </a>


                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/we-4.jpg" alt="">

                        </div>
                        <div class="swiper-slide-data">
                            <h2>Adrian</h2>
                            <p>Laravel Developer</p>
                            <strong>Experience <i class="fa-solid fa-angles-right"></i> 5+ Years</strong>
                            <p>Avability <i class="fa-solid fa-angles-right"></i> Full-Time</p>
                            <a href="#" class="reopenPopup">Hire Now </a>


                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/we-5.jpg" alt="">

                        </div>
                        <div class="swiper-slide-data">
                            <h2>Adrian</h2>
                            <p>Laravel Developer</p>
                            <strong>Experience <i class="fa-solid fa-angles-right"></i> 5+ Years</strong>
                            <p>Avability <i class="fa-solid fa-angles-right"></i> Full-Time</p>
                            <a href="#" class="reopenPopup">Hire Now </a>


                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/we-6.jpg" alt="">

                        </div>
                        <div class="swiper-slide-data">
                            <h2>Adrian</h2>
                            <p>Laravel Developer</p>
                            <strong>Experience <i class="fa-solid fa-angles-right"></i> 5+ Years</strong>
                            <p>Avability <i class="fa-solid fa-angles-right"></i> Full-Time</p>
                            <a href="#" class="reopenPopup">Hire Now </a>


                        </div>
                    </div>

                </div>
                <div class="swiper-pagination"></div>
            </div>



            <!-- ####### WORKING WITH US ######  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1000">
                <h1>Explore the Range of Services Provided by Laravel Developers</h1>

            </div>
            <section class="work-wrapper">

                <section class="work-wrapper-child">
                    <section class="work-child" data-aos="fade-right" data-aos-duration="1000">
                        <h2>Custom Laravel Development</h2>
                        <p>Laravel developers create tailored web applications to meet specific business needs.
                            They leverage Laravel’s elegant framework to design and implement unique functionalities,
                            ensuring robust performance and a seamless user experience.</p>
                    </section>
                    <section class="work-child" data-aos="fade-left" data-aos-duration="1000">
                        <h2>Laravel MVC Architecture</h2>
                        <p>Utilizing Laravel’s Model-View-Controller (MVC) architecture, developers build structured
                            applications that enhance code organization. This approach improves maintainability and
                            collaboration, making updates easier throughout the development process.</p>
                    </section>
                    <section class="work-child" data-aos="fade-right" data-aos-duration="1000">
                        <h2>API Development and Integration</h2>
                        <p>Laravel developers specialize in creating and integrating APIs for various applications.
                            They facilitate seamless communication between systems, enhancing functionality and improving
                            user experiences through effective third-party integrations.</p>
                    </section>
                    <section class="work-child" data-aos="fade-left" data-aos-duration="1000">
                        <h2>Custom Package Development</h2>
                        <p>Building custom packages is essential for extending application capabilities. Laravel developers
                            create tailored packages to meet specific business requirements, allowing for greater flexibility
                            and enhanced performance in web applications.</p>
                    </section>
                    <section class="work-child" data-aos="fade-right" data-aos-duration="1000">
                        <h2>Ongoing Maintenance and Support</h2>
                        <p>Regular maintenance is crucial for Laravel applications. Developers provide updates, security
                            enhancements, and troubleshooting services, ensuring optimal performance while helping businesses
                            stay current with the latest Laravel features.</p>
                    </section>
                    <section class="work-child" data-aos="fade-left" data-aos-duration="1000">
                        <h2>Performance Optimization Services</h2>
                        <p>To improve application speed and responsiveness, Laravel developers implement performance
                            optimization strategies. They analyze code efficiency and server configurations, ensuring a
                            smoother user experience and better overall application performance.</p>
                    </section>

                </section>

            </section>



            <!-- ####### why choose us ########  -->
            <div class="about_container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Why Hire Laravel Developers From TekAlgo?</h1>

            </div>


            <div class="service_choose_us">

                <div class="services_container">
                    <!-- Service 1 - Laravel Specialists -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>Our team consists of expert Laravel developers specializing in advanced web applications, delivering high-performance solutions that are scalable, reliable, and built to meet your business needs effectively.</p>
                            <img src="images/star.png" alt="">
                            <h1>Laravel Specialists</h1>
                        </div>
                        <button class="read-more-btn">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Modern Solutions -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>We leverage Laravel's cutting-edge features and tools to develop modern, efficient, and secure applications that are both user-friendly and scalable to fit the unique needs of your business.</p>
                            <img src="images/star.png" alt="">
                            <h1>Modern Solutions</h1>
                        </div>
                        <button class="read-more-btn">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Flexible Architecture -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>We create flexible and adaptable application architectures using Laravel, ensuring that your project is ready to scale, evolve, and integrate with new technologies as your business grows.</p>
                            <img src="images/star.png" alt="">
                            <h1>Flexible Architecture</h1>
                        </div>
                        <button class="read-more-btn">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Thorough Quality Assurance -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>Our quality assurance process ensures that every Laravel project is thoroughly tested for reliability, performance, and security, delivering a seamless user experience with no compromises in quality.</p>
                            <img src="images/star.png" alt="">
                            <h1>Thorough Quality Assurance</h1>
                        </div>
                        <button class="read-more-btn">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Value-Driven Services -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>We offer value-driven Laravel development services, providing you with high-quality, efficient, and reliable solutions while respecting your budget and ensuring a great return on investment.</p>
                            <img src="images/star.png" alt="">
                            <h1>Value-Driven Services</h1>
                        </div>
                        <button class="read-more-btn">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - Comprehensive Support -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>We provide comprehensive support throughout the lifecycle of your Laravel project, ensuring that you receive timely assistance, updates, and maintenance for ongoing success and growth.</p>
                            <img src="images/star.png" alt="">
                            <h1>Comprehensive Support</h1>
                        </div>
                        <button class="read-more-btn">
                            Read More
                        </button>
                    </div>

                </div>

            </div>


            <!-- ##### why hire from us #####  -->
            <div class="about_container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">
                    Experience Numerous Advantages When You Hire Our Laravel Experts</h1>

            </div>

            <div class="avail-section-wrapper">
                <div class="avail-section" id="scrollable-section">
                    <div class="avail-image-container" id="image-scroll">
                        <img src="images/web-developer-experts-benefits.jpg" alt="Image on Left" data-aos="fade-right" data-aos-duration="1000">
                    </div>


                    <div class="avail-content-container" id="scrollable-content" data-aos="fade-left" data-aos-duration="1000">
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Leverage Laravel Expertise</h2>
                            </div>
                            <p>Hiring Laravel experts allows you to accelerate your development cycle. Their familiarity with the framework's features enables them to quickly implement functionalities and resolve issues, helping you launch your application faster and more efficiently.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Customized Application Development</h2>
                            </div>
                            <p>Laravel professionals specialize in crafting applications that meet your specific business requirements. They collaborate closely with you to understand your goals, ensuring the final product enhances user engagement and aligns with your operational needs.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Advanced Framework Features</h2>
                            </div>
                            <p>Our Laravel developers utilize the framework’s built-in tools, such as Eloquent ORM and Blade templating, to streamline development. These features reduce coding time and help create robust, high-quality applications efficiently.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Scalable Architecture</h2>
                            </div>
                            <p>With a focus on scalability, Laravel experts design applications that can grow alongside your business. Their approach to modular architecture allows for easy expansion and updates, accommodating increasing user demands seamlessly.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Comprehensive Security Practices</h2>
                            </div>
                            <p>Laravel developers are well-versed in implementing security best practices within the framework. They safeguard your application against threats like SQL injection and cross-site scripting, ensuring the safety of your data and users.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Performance Optimization Techniques</h2>
                            </div>
                            <p>Our Laravel experts specialize in performance tuning. They employ caching strategies, optimize database queries, and implement best practices to ensure your application runs efficiently and provides a smooth user experience.</p>
                        </div>
                    </div>

                </div>
            </div>









            <!-- ######## collaboration #####  -->
            <section class="collaboration-wrapper">
                <section class="collaboration-header" data-aos="zoom-in" data-aos-duration="1000">
                    <h1>Simple Steps to Begin Your Journey with Our Laravel Team</h1>
                </section>
                <section class="collaboration-child-wrapper" data-aos="fade-up" data-aos-duration="1000">
                    <section class="collaboration-child" id="collaboration-child-1">
                        <section class="collaboration-child-image">
                            <img src="images/requirement.png" alt="">
                        </section>
                        <section class="collaboration-child-data">
                            <h2>Provide Your Requirements <span><i class="fa-solid fa-right-long"></i></span> </h2>
                            <p>Clearly outline your project specifications and expectations. This allows us to understand your needs better and ensures we find the right candidates who align with your objectives.</p>

                        </section>

                    </section>
                    <section class="collaboration-child" id="collaboration-child-2">
                        <section class="collaboration-child-image">
                            <img src="images/project-evaluation.png" alt="">
                        </section>
                        <section class="collaboration-child-data">
                            <h2>Select Candidates for Review <span><i class="fa-solid fa-right-long"></i></span></h2>
                            <p>After gathering requirements, we will curate a list of qualified candidates for your review. You can assess their skills, experience, and fit for your project’s unique demands.</p>

                        </section>
                    </section>
                    <section class="collaboration-child" id="collaboration-child-3">
                        <section class="collaboration-child-image">
                            <img src="images/nda.png" alt="">
                        </section>
                        <section class="collaboration-child-data">
                            <h2>Identify the Ideal Candidate<span><i class="fa-solid fa-right-long"></i></span></h2>
                            <p>Evaluate the shortlisted candidates based on their qualifications and your criteria. Conduct interviews to gain insights into their expertise, ensuring you select the best match for your needs.</p>

                        </section>
                    </section>
                    <section class="collaboration-child" id="collaboration-child-4">
                        <section class="collaboration-child-image">
                            <img src="images/interview.png" alt="">
                        </section>
                        <section class="collaboration-child-data">
                            <h2> Begin the Onboarding Process <span><i class="fa-solid fa-right-long"></i></span></h2>
                            <p>Once you’ve chosen the right candidate, we’ll initiate the onboarding process. This includes introducing them to your team, sharing project details, and ensuring they have all necessary resources.</p>

                        </section>
                    </section>
                </section>
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

            <!-- ############### faq ############  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1000">
                <h1>Laravel Development Services FAQs</h1>
            </div>

            <section class="faq-wrapper" data-aos="zoom-in" data-aos-duration="1000">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What types of applications can Laravel developers create?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Laravel developers can create a wide range of applications, including enterprise-level web applications, content management systems (CMS), e-commerce platforms, and RESTful APIs. The framework's elegant syntax and extensive features allow for scalable and maintainable applications tailored to specific business needs.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do Laravel developers ensure application security?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Laravel developers prioritize security by utilizing built-in security features such as CSRF protection, password hashing, and input validation. They also follow best practices to safeguard against common vulnerabilities like SQL injection and XSS, ensuring that applications remain secure and data is protected.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can Laravel developers integrate third-party services and APIs?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, Laravel developers can seamlessly integrate various third-party services and APIs, such as payment gateways, email services, and social media platforms. They leverage Laravel's extensive ecosystem and tools like Laravel Cashier and Passport to enhance application functionality and streamline development.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do Laravel developers handle database management?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Laravel developers use Eloquent ORM for database management, allowing for an elegant and intuitive way to interact with databases. They work with various database systems like MySQL, PostgreSQL, and SQLite, utilizing migrations and seeders to manage database schema and data effectively.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What are some best practices for Laravel development?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Best practices for Laravel development include following the MVC (Model-View-Controller) architecture, using version control systems, writing clean and modular code, and implementing automated testing. Developers also ensure proper documentation and adhere to coding standards for maintainability.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do Laravel developers ensure application performance?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Laravel developers enhance application performance by optimizing queries, utilizing caching mechanisms like Redis and Memcached, and employing Laravel's built-in tools for performance monitoring. They also follow best practices in code optimization and utilize tools like Laravel Telescope to identify performance bottlenecks.
                    </p>
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