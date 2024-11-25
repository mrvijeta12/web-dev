<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'codeigniter-developer' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'codeigniter-developer' AND blog_status = 'published'");
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
    <link rel="stylesheet" href="assests/css/theme.css">

    <script src="https://kit.fontawesome.com/cdf9a174a4.js" crossorigin="anonymous"></script>



</head>

<body>
    <div>
        <?php
        include('navbar.php');
        ?>
        <div class="wrapper" data-aos="fade-right" data-aos-duration="1500">

            <!-- ####### HERO SECTION ####### -->
            <div class="hero">
                <div class="child child1">
                    <h1 data-aos="zoom-in" data-aos-duration="2500">Transform Your Ideas with Our Skilled CodeIgniter Developers</h1>
                    <h2 data-aos="zoom-in" data-aos-duration="2500">Custom CodeIgniter Solutions Tailored to Bring Your Vision to Life</h2>
                    <a href="#" class="reopenPopup">Consult Our Experts</a>
                </div>
                <div class="child child2">
                    <img src="images/codeigniter-developer.jpg" alt="">
                </div>
            </div>




            <!-- ####### INTRO ######### -->

            <div class="intro-wrapper">

                <div class="intro-slide intro-1" data-aos="fade-up" data-aos-duration="1500">
                    <h2>Accelerate Your Web Development with Our Expert CodeIgniter Developers, Delivering Custom Solutions for Your Business.</h2>
                    <p>Our proficient CodeIgniter developers specialize in crafting high-performance web applications that are tailored to meet your unique business requirements. Leveraging CodeIgniter’s lightweight framework, we build scalable solutions that ensure efficient performance and rapid development.</p>
                    <p>With a focus on best practices and clean code, we guarantee that your applications are not only robust but also easy to maintain. Partner with us to harness the power of CodeIgniter and propel your online presence to new heights.</p>
                </div>




                <div class="intro-slide intro-2" data-aos="fade-down" data-aos-duration="1500">
                    <img src="images/developer-primary.jpg" alt="">
                </div>





            </div>



            <!-- ######### Team ######  -->

            <div class="swiper mySwiper">
                <h1>Engage Performance-Oriented CodeIgniter Professionals for Maximum ROI</h1>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/we-1.jpg" alt="">

                        </div>
                        <div class="swiper-slide-data">
                            <h2>Adrian</h2>
                            <p>CodeIgniter Developer</p>
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
                            <p>CodeIgniter Developer</p>
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
                            <p>CodeIgniter Developer</p>
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
                            <p>CodeIgniter Developer</p>
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
                            <p>CodeIgniter Developer</p>
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
                            <p>CodeIgniter Developer</p>
                            <strong>Experience <i class="fa-solid fa-angles-right"></i> 5+ Years</strong>
                            <p>Avability <i class="fa-solid fa-angles-right"></i> Full-Time</p>
                            <a href="#" class="reopenPopup">Hire Now </a>


                        </div>
                    </div>

                </div>
                <div class="swiper-pagination"></div>
            </div>



            <!-- ####### WORKING WITH US ######  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>Explore the Range of Services Provided by CodeIgniter Developers</h1>

            </div>
            <section class="work-wrapper">

                <section class="work-wrapper-child">
                    <section class="work-child">
                        <h2> Custom CodeIgniter Development</h2>
                        <p>CodeIgniter developers create tailored web applications to meet specific business requirements.
                            They utilize the framework's lightweight architecture to design and implement unique functionalities,
                            ensuring fast performance and an excellent user experience.</p>
                    </section>
                    <section class="work-child">
                        <h2> CodeIgniter MVC Architecture</h2>
                        <p>Developers leverage CodeIgniter's Model-View-Controller (MVC) architecture to build structured
                            and maintainable applications. This approach enhances code organization, allowing for better
                            collaboration and easier updates throughout the development process.</p>
                    </section>
                    <section class="work-child">
                        <h2>API Development and Integration</h2>
                        <p>CodeIgniter developers specialize in creating and integrating APIs for various applications.
                            They facilitate seamless communication between systems, enabling businesses to expand
                            functionality and improve user experiences through third-party integrations.</p>
                    </section>
                    <section class="work-child">
                        <h2>Custom Module Development</h2>
                        <p>Creating custom modules is essential for enhancing application functionality. CodeIgniter
                            developers build modules tailored to specific business needs, allowing for greater flexibility
                            and improved performance of web applications.</p>
                    </section>
                    <section class="work-child">
                        <h2>Ongoing Maintenance and Support</h2>
                        <p>Regular maintenance is crucial for CodeIgniter applications. Developers provide updates,
                            security enhancements, and troubleshooting services, ensuring optimal performance while
                            helping businesses stay current with the latest CodeIgniter features.</p>
                    </section>
                    <section class="work-child">
                        <h2> Performance Optimization Services</h2>
                        <p>To enhance application speed and responsiveness, CodeIgniter developers implement performance
                            optimization strategies. They analyze code efficiency and server configurations, ensuring a
                            smoother user experience and improved application performance.</p>
                    </section>

                </section>

            </section>



            <!-- ####### why choose us ########  -->
            <div class="about_container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Why Hire CodeIgniter Developers From TekAlgo?</h1>

            </div>


            <div class="service_choose_us">

                <div class="services_container">
                    <!-- Service 1 - Expert Knowledge -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Our team is composed of highly skilled CodeIgniter developers who deliver robust, scalable, and secure web applications, ensuring each solution is tailored to your specific business needs and goals.</p>
                            <img src="images/star.png" alt="">
                            <h1>Expert Knowledge</h1>
                        </div>
                        <button class="read-more-btn">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Custom Solutions -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>We specialize in creating custom CodeIgniter solutions that are fully aligned with your business objectives, providing scalable and efficient applications that enhance performance and user experience.</p>
                            <img src="images/star.png" alt="">
                            <h1>Custom Solutions</h1>
                        </div>
                        <button class="read-more-btn">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Timely Delivery -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Our team is committed to delivering high-quality CodeIgniter applications on time, ensuring that each project is completed within deadlines without compromising on functionality or quality.</p>
                            <img src="images/star.png" alt="">
                            <h1>Timely Delivery</h1>
                        </div>
                        <button class="read-more-btn">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Ongoing Support -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>We offer ongoing support and maintenance for your CodeIgniter applications, ensuring your website remains up-to-date, secure, and continues to operate efficiently, even as technologies evolve.</p>
                            <img src="images/star.png" alt="">
                            <h1>Ongoing Support</h1>
                        </div>
                        <button class="read-more-btn">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Competitive Pricing -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Our CodeIgniter development services are offered at competitive rates, giving you access to top-tier development expertise while ensuring your project remains cost-effective and within your budget.</p>
                            <img src="images/star.png" alt="">
                            <h1>Competitive Pricing</h1>
                        </div>
                        <button class="read-more-btn">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - Proven Track Record -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>We have a proven track record of delivering successful CodeIgniter projects for a wide range of clients, helping businesses scale and succeed with robust, high-performing web applications.</p>
                            <img src="images/star.png" alt="">
                            <h1>Proven Track Record</h1>
                        </div>
                        <button class="read-more-btn">
                            Read More
                        </button>
                    </div>

                </div>

            </div>


            <!-- ##### why hire from us #####  -->
            <div class="about_container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">
                    Experience Numerous Advantages When You Hire Our CodeIgniter Experts</h1>

            </div>

            <div class="avail-section-wrapper">
                <div class="avail-section" id="scrollable-section">
                    <div class="avail-image-container" id="image-scroll">
                        <img src="images/web-developer-experts-benefits.jpg" alt="Image on Left">
                    </div>


                    <div class="avail-content-container" id="scrollable-content">
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Expert CodeIgniter Developers</h2>
                            </div>
                            <p>Our CodeIgniter developers bring extensive experience in building dynamic web applications. They leverage the framework's powerful capabilities to deliver high-performance solutions that align with your business goals.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Customized Web Applications</h2>
                            </div>
                            <p>We create tailored CodeIgniter applications that suit your unique business requirements. Our team works closely with you to develop features that enhance user experience and align perfectly with your operational needs.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Rapid Development Cycle</h2>
                            </div>
                            <p>Our expertise in CodeIgniter allows for a fast development process, reducing time to market. We utilize the framework’s built-in tools to streamline coding and quickly implement scalable solutions, keeping your project on schedule.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Robust Code Architecture</h2>
                            </div>
                            <p>We focus on creating a solid code structure for your CodeIgniter applications. Our developers follow best coding practices to ensure your project is maintainable and can easily evolve with your business needs.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Security Best Practices</h2>
                            </div>
                            <p>Our CodeIgniter experts implement the latest security measures to protect your web applications. From data encryption to input validation, we prioritize safeguarding your system against vulnerabilities and cyber threats.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Performance Optimization</h2>
                            </div>
                            <p>We employ performance optimization techniques to ensure your CodeIgniter applications run smoothly. By fine-tuning database queries and implementing caching strategies, we deliver a faster and more responsive user experience.</p>
                        </div>
                    </div>

                </div>
            </div>









            <!-- ######## collaboration #####  -->
            <section class="collaboration-wrapper">r
                <section class="collaboration-header">
                    <h1>Simple Steps to Begin Your Journey with Our CodeIgniter Team</h1>
                </section>
                <section class="collaboration-child-wrapper">
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

            <!-- ############### faq ############  -->

            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>CodeIgniter Development Services FAQs</h1>
            </div>

            <section class="faq-wrapper">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What types of applications can CodeIgniter developers create?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        CodeIgniter developers can create a variety of web applications, including content management systems (CMS), e-commerce platforms, customer relationship management (CRM) systems, and web services. CodeIgniter’s lightweight framework allows for the rapid development of robust applications tailored to specific business needs.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do CodeIgniter developers ensure application security?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        CodeIgniter developers prioritize security by implementing built-in security features, such as XSS filtering, CSRF protection, and input validation. They follow best practices in securing application access and database interactions to protect sensitive user data and prevent common vulnerabilities.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can CodeIgniter developers integrate third-party libraries and APIs?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, CodeIgniter developers can seamlessly integrate third-party libraries and APIs to enhance application functionality. They utilize CodeIgniter’s flexible structure to incorporate services like payment gateways, social media integrations, and various RESTful APIs to provide additional features.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do CodeIgniter developers handle database management?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        CodeIgniter developers manage databases using its built-in Active Record class, which simplifies database interactions through an easy-to-use interface. They work with popular databases such as MySQL, PostgreSQL, and SQLite to execute efficient queries and ensure data integrity.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What are some best practices for CodeIgniter development?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Best practices for CodeIgniter development include adhering to MVC (Model-View-Controller) architecture, utilizing libraries for reusable code, writing clean and organized code, and maintaining proper documentation. Developers also ensure that they regularly update the framework to the latest version for security and performance improvements.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do CodeIgniter developers ensure application performance?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        CodeIgniter developers enhance application performance by optimizing database queries, enabling caching mechanisms, and minimizing code execution times. They also utilize profiling tools to analyze application performance and identify areas for improvement to ensure a fast and efficient user experience.
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