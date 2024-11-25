<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'mean-stack' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'mean-stack' AND blog_status = 'published'");
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
                <img src="images/mean-stack-development-hero.jpg"></img>
            </div>



            <!-- ####### core area of expertise ######  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Harnessing the Power of MEAN Stack for Dynamic Web Applications</h1>
            </div>
            <section class="expertise">
                <div class="expertise-child">
                    <h1>Comprehensive Full-Stack Development</h1>
                    <p>We specialize in comprehensive full-stack development using the MEAN stack, ensuring seamless integration between the front end and back end for a cohesive application experience.</p>
                </div>
                <div class="expertise-child">
                    <h1>Angular for Rich User Interfaces</h1>
                    <p>Our team harnesses Angular to build rich, interactive user interfaces that enhance user engagement and streamline navigation across web applications.</p>
                </div>
                <div class="expertise-child">
                    <h1>Node.js and Express for Efficient Back-End Services</h1>
                    <p>We utilize Node.js and Express to develop efficient and scalable back-end services, creating RESTful APIs that facilitate smooth communication between client and server.</p>
                </div>
                <div class="expertise-child">
                    <h1>MongoDB for Flexible Data Management</h1>
                    <p>We implement MongoDB as a NoSQL database to manage data flexibly and efficiently, designing schemas that optimize performance and facilitate quick data access.</p>
                </div>
                <div class="expertise-child">
                    <h1>Real-Time Application Features</h1>
                    <p>Our MEAN stack applications incorporate real-time features using WebSockets, enabling live data updates and interactive functionalities for users, such as notifications and chat systems.</p>
                </div>
                <div class="expertise-child">
                    <h1>Deployment and Monitoring Solutions</h1>
                    <p>We implement robust deployment and monitoring solutions for MEAN stack applications, utilizing tools like Docker and cloud services to ensure reliable and efficient operation.</p>
                </div>
            </section>



            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Transforming Industries with Innovative MEAN Stack Solutions</h1>
            </div>

            <div class="service_choose_us">
                <div class="services_container">

                    <!-- Service 1 - Retail -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Leveraging MEAN stack technologies to develop efficient retail applications that enhance customer experience and streamline inventory management.
                            </p>
                            <img src="images/web-application-mean.png" alt="" />
                            <h1>Retail</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Logistics -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Building robust logistics management systems with MEAN stack, ensuring real-time tracking, optimized routes, and efficient fleet management.
                            </p>
                            <img src="images/ecommerce-mean.png" alt="" />
                            <h1>Logistics</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Real Estate -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Creating comprehensive real estate applications using MEAN stack, providing users with property listings, virtual tours, and efficient communication tools.
                            </p>
                            <img src="images/finance-mean.png" alt="" />
                            <h1>Real Estate</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Entertainment -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Developing interactive entertainment platforms with MEAN stack, enabling features like streaming, user reviews, and personalized recommendations.
                            </p>
                            <img src="images/education-mean.png" alt="" />
                            <h1>Entertainment</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Sports -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Creating engaging sports applications using MEAN stack, providing real-time scores, player stats, and social features for fans.
                            </p>
                            <img src="images/travel-mean.png" alt="" />
                            <h1>Sports</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - Non-Profit -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Building impactful non-profit management systems with MEAN stack to facilitate donations, volunteer management, and community engagement.
                            </p>
                            <img src="images/social-media-mean.png" alt="" />
                            <h1>Non-Profit</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                </div>
            </div>




            <!-- ########## TECHNOLOGIES  #######  -->

            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>Unlocking the Potential of the MEAN Stack for Web Applications</h1>
            </div>
            <section class="work-wrapper">
                <section class="work-wrapper-child">
                    <section class="work-child">
                        <h2>Full-Stack JavaScript Framework</h2>
                        <p>The MEAN stack utilizes JavaScript throughout the entire development process, from client-side to server-side, allowing for a more cohesive coding experience.</p>
                    </section>
                    <section class="work-child">
                        <h2>Dynamic Web Applications</h2>
                        <p>Angular, a core component of the MEAN stack, enables developers to build dynamic, single-page applications with rich user interfaces and seamless user experiences.</p>
                    </section>
                    <section class="work-child">
                        <h2>Scalable and Flexible Database</h2>
                        <p>MongoDB's document-oriented database allows for scalable data storage and flexibility in data structures, making it ideal for modern web applications.</p>
                    </section>
                    <section class="work-child">
                        <h2>Powerful Server-Side Logic</h2>
                        <p>Node.js and Express provide a robust environment for building server-side logic, facilitating the creation of APIs and handling multiple requests efficiently.</p>
                    </section>
                    <section class="work-child">
                        <h2>Rapid Development and Prototyping</h2>
                        <p>The MEAN stack allows for rapid development cycles, enabling teams to prototype applications quickly and adapt to changing requirements seamlessly.</p>
                    </section>
                    <section class="work-child">
                        <h2>Strong Community and Resources</h2>
                        <p>The MEAN stack has a vibrant community, offering extensive documentation, tutorials, and libraries that support developers at every level.</p>
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
                <h1>MEAN Stack Development: Frequently Asked Questions</h1>
            </div>

            <section class="faq-wrapper">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What is the MEAN stack and what technologies does it comprise?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        The MEAN stack is a powerful JavaScript-based technology stack used for building dynamic web applications. It consists of MongoDB (a NoSQL database), Express.js (a web application framework for Node.js), Angular (a front-end web application framework), and Node.js (a JavaScript runtime environment). This stack allows developers to create robust applications with a unified language across both client-side and server-side development.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What are the key benefits of using the MEAN stack for application development?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        The MEAN stack provides numerous benefits, including full-stack JavaScript development, which simplifies the development process and improves code maintainability. The stack's components work seamlessly together, allowing for rapid development cycles. Additionally, MEAN's scalability enables applications to handle high traffic with ease, making it ideal for both startups and large enterprises.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do you ensure performance and scalability in MEAN stack applications?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We ensure performance and scalability in MEAN stack applications through techniques like optimizing database queries, implementing efficient caching strategies, and using load balancers to distribute traffic. Our team focuses on writing clean, modular code that can be easily maintained and scaled as the application grows, allowing for seamless updates and feature enhancements.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can MEAN stack applications be deployed in cloud environments?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Absolutely! MEAN stack applications are well-suited for deployment in cloud environments, such as AWS, Azure, or Google Cloud. The stack’s architecture allows for easy scaling and management in the cloud, enabling businesses to take advantage of cloud services like databases, storage, and load balancing for improved performance and availability.
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