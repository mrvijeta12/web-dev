<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'nodejs-developer' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'nodejs-developer' AND blog_status = 'published'");
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
        <div class="wrapper" data-aos="fade-right" data-aos-duration="1500">

            <!-- ####### HERO SECTION ####### -->
            <div class="hero">
                <div class="child child1">
                    <h1 data-aos="zoom-in" data-aos-duration="2500">Transform Your Ideas with Our Skilled Node.JS Developers</h1>
                    <h2 data-aos="zoom-in" data-aos-duration="2500">Custom Node.JS Solutions Tailored to Bring Your Vision to Life</h2>
                    <a href="#" class="reopenPopup">Consult Our Experts</a>
                </div>
                <div class="child child2">
                    <img src="images/node-developer.jpg" alt="">
                </div>
            </div>




            <!-- ####### INTRO ######### -->

            <div class="intro-wrapper">

                <div class="intro-slide intro-1" data-aos="fade-up" data-aos-duration="1500">
                    <h2>Empower Your Applications with Our Skilled Node.js Developers, Delivering Customized Solutions for Your Business.</h2>
                    <p>Our expert Node.js developers specialize in building high-performance, scalable applications that cater to your unique business needs. By leveraging Node.js’s powerful features and non-blocking architecture, we create solutions that enhance real-time interactions and improve overall user experience.</p>
                    <p>With a strong focus on efficiency and innovation, we ensure your Node.js applications are optimized for speed and reliability. Collaborate with us to harness the power of Node.js and elevate your digital presence in today’s competitive market.</p>
                </div>




                <div class="intro-slide intro-2" data-aos="fade-down" data-aos-duration="1500">
                    <img src="images/developer-primary.jpg" alt="">
                </div>





            </div>



            <!-- ######### Team ######  -->

            <div class="swiper mySwiper">
                <h1>Engage Performance-Oriented Node.JS Professionals for Maximum ROI</h1>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/we-1.jpg" alt="">

                        </div>
                        <div class="swiper-slide-data">
                            <h2>Adrian</h2>
                            <p>Node.JS Developer</p>
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
                            <p>Node.JS Developer</p>
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
                            <p>Node.JS Developer</p>
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
                            <p>Node.JS Developer</p>
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
                            <p>Node.JS Developer</p>
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
                            <p>Node.JS Developer</p>
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
                <h1>Explore the Range of Services Provided by Node.JS Developers</h1>

            </div>
            <section class="work-wrapper">

                <section class="work-wrapper-child">
                    <section class="work-child">
                        <h2>Custom Node.js Development</h2>
                        <p>Node.js developers create tailored applications to meet specific business needs. They leverage
                            Node.js’s event-driven architecture to design and implement unique functionalities, ensuring high
                            performance and responsiveness.</p>
                    </section>
                    <section class="work-child">
                        <h2>API Development and Integration</h2>
                        <p>Node.js developers specialize in building and integrating APIs for various applications. They
                            enable seamless communication between systems, enhancing functionality and improving user
                            experiences through efficient third-party integrations.</p>
                    </section>
                    <section class="work-child">
                        <h2> Real-Time Application Development</h2>
                        <p>Developers utilize Node.js to create real-time applications, such as chat apps and collaboration
                            tools. The non-blocking architecture allows for instant data exchange, providing users with a
                            dynamic and interactive experience.</p>
                    </section>
                    <section class="work-child">
                        <h2>Custom Module Development</h2>
                        <p>Building custom modules is essential for extending application capabilities. Node.js developers
                            create tailored modules to meet specific business requirements, allowing for greater flexibility
                            and improved performance in web applications.</p>
                    </section>
                    <section class="work-child">
                        <h2>Ongoing Maintenance and Support</h2>
                        <p>Regular maintenance is crucial for Node.js applications. Developers provide updates, security
                            enhancements, and troubleshooting services, ensuring optimal performance and helping businesses
                            stay current with the latest Node.js features.</p>
                    </section>
                    <section class="work-child">
                        <h2>Performance Optimization Services</h2>
                        <p>To enhance application speed and efficiency, Node.js developers implement performance optimization
                            trategies. They analyze code execution and server configurations, ensuring a smoother user experience
                            and better overall application performance.</p>
                    </section>

                </section>

            </section>



            <!-- ####### why choose us ########  -->
            <div class="about_container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Why Hire Node.JS Developers From TekAlgo?</h1>

            </div>


            <div class="service_choose_us">

                <div class="services_container">
                    <!-- Service 1 - Expert Knowledge -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Our highly skilled developers have extensive experience working with Node.js, building high-performance and scalable web applications that meet your business objectives effectively and efficiently.</p>
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
                            <p>We offer custom Node.js development solutions designed to meet your unique business needs, ensuring the delivery of efficient, reliable, and scalable applications tailored to your goals.</p>
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
                            <p>We are committed to delivering Node.js projects on time, ensuring deadlines are met without compromising quality, and focusing on achieving your business goals efficiently and reliably.</p>
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
                            <p>We provide ongoing support and maintenance services for Node.js applications, ensuring your web solutions continue to run smoothly, evolve with your business, and deliver long-term success.</p>
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
                            <p>Our Node.js development services are competitively priced, offering high-quality solutions that provide excellent value for your investment, ensuring your business gets the best return on its budget.</p>
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
                            <p>With a proven track record of successful Node.js projects, we have built a reputation for delivering reliable, high-quality solutions to clients worldwide, ensuring satisfaction and business growth.</p>
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
                    Experience Numerous Advantages When You Hire Our Node.JS Experts</h1>

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
                                <h2>Expert Developers</h2>
                            </div>
                            <p>Our Node.js experts bring extensive experience and specialized skills to your projects, ensuring the implementation of industry best practices. With their deep understanding of the framework, they deliver efficient, high-performance applications tailored to your business needs.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Cost Efficiency</h2>
                            </div>
                            <p>Hiring our Node.js professionals reduces operational costs while maximizing output. By optimizing resource allocation and improving development workflows, we help you achieve significant savings without compromising on quality or performance, making your investment worthwhile.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Fast Turnaround</h2>
                            </div>
                            <p>Experience quicker project completion with our skilled Node.js team. Their expertise allows for streamlined development processes, ensuring that your applications are built efficiently and delivered on time, helping you stay ahead in today’s fast-paced market.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Scalable Solutions</h2>
                            </div>
                            <p>Our Node.js experts design applications that are not only robust but also scalable. This flexibility allows your software to grow alongside your business, accommodating increasing demands and user traffic without sacrificing performance or reliability.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Ongoing Support</h2>
                            </div>
                            <p>With our Node.js specialists, you gain continuous support for your applications. Our team is dedicated to ensuring smooth operations through regular maintenance and prompt issue resolution, providing peace of mind and allowing you to focus on your core business activities.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Innovative Strategies</h2>
                            </div>
                            <p>Leverage the creative solutions offered by our Node.js experts. They employ innovative approaches to tackle complex challenges, ensuring your applications stand out in a competitive landscape and effectively meet the evolving needs of your users.</p>
                        </div>
                    </div>

                </div>
            </div>









            <!-- ######## collaboration #####  -->
            <section class="collaboration-wrapper">r
                <section class="collaboration-header">
                    <h1>Simple Steps to Begin Your Journey with Our Node.JS Team</h1>
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
                <h1>Node.js Development Services FAQs</h1>
            </div>

            <section class="faq-wrapper">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What types of applications can Node.js developers create?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Node.js developers can create a variety of applications, including real-time applications like chat applications and online gaming, RESTful APIs, single-page applications (SPAs), microservices, and server-side applications. Its non-blocking architecture makes it suitable for handling multiple connections simultaneously.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do Node.js developers ensure application security?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Node.js developers prioritize security by implementing measures such as input validation, using secure dependencies, and managing sensitive data properly. They follow best practices for authentication and authorization, employing frameworks like Passport.js and tools like Helmet.js to protect against common vulnerabilities.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can Node.js developers integrate third-party services and APIs?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, Node.js developers can easily integrate a wide range of third-party services and APIs, including payment gateways, social media platforms, and cloud services. They leverage libraries like Axios or Node-fetch for seamless API communication, enhancing application functionality and user experience.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do Node.js developers handle database management?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Node.js developers use various database management systems, including NoSQL databases like MongoDB and relational databases like MySQL or PostgreSQL. They often utilize ORMs like Mongoose for MongoDB or Sequelize for SQL databases to facilitate smooth database interactions and manage data efficiently.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What are some best practices for Node.js development?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Best practices for Node.js development include modular code organization, using asynchronous programming patterns, error handling, and following coding standards. Developers also utilize environment variables for configuration management and version control systems like Git for collaborative development.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do Node.js developers ensure application performance?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Node.js developers enhance application performance by optimizing event-driven architecture, using clustering to handle multiple CPU cores, and implementing caching strategies with tools like Redis. They also employ monitoring and profiling tools to identify performance bottlenecks and improve response times.
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