<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'wordpress-developer' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'wordpress-developer' AND blog_status = 'published'");
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
                    <h1>Transform Your Ideas with Our Skilled WordPress Developers</h1>
                    <h2>Custom WordPress Solutions Tailored to Bring Your Vision to Life</h2>
                    <a href="#" class="reopenPopup">Consult Our Experts</a>
                </div>
                <div class="child child2" data-aos="fade-left" data-aos-duration="1000">
                    <img src="images/wordpress-developer.jpg" alt="">
                </div>
            </div>



            <!-- ####### INTRO ######### -->

            <div class="intro-wrapper">

                <div class="intro-slide intro-1" data-aos="fade-left" data-aos-duration="1000">
                    <h2>Unlock the Potential of Your Website with Our Skilled WordPress Developers, Delivering Customized Solutions for Growth.</h2>
                    <p>Our dedicated WordPress developers excel at building responsive and feature-rich websites tailored to your specific needs. By utilizing the flexibility of WordPress, we create unique solutions that not only enhance functionality but also engage your audience effectively.</p>
                    <p>With a commitment to quality and innovation, we strive to provide you with a platform that stands out. Collaborate with us to transform your online presence and discover how our expert team can make a significant impact on your business.</p>
                </div>




                <div class="intro-slide intro-2">
                    <img src="images/developer-primary.jpg" alt="" data-aos="fade-right" data-aos-duration="1500">
                </div>





            </div>



            <!-- ######### Team ######  -->

            <div class="swiper mySwiper">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Engage Performance-Oriented WordPress Professionals for Maximum ROI</h1>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/we-1.jpg" alt="">

                        </div>
                        <div class="swiper-slide-data">
                            <h2>Adrian</h2>
                            <p>Wordpress Developer</p>
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
                            <p>Wordpress Developer</p>
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
                            <p>Wordpress Developer</p>
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
                            <p>Wordpress Developer</p>
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
                            <p>Wordpress Developer</p>
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
                            <p>Wordpress Developer</p>
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
                <h1>Explore the Range of Services Provided by WordPress Developers</h1>

            </div>
            <section class="work-wrapper">

                <section class="work-wrapper-child">
                    <section class="work-child" data-aos="fade-right" data-aos-duration="1000">
                        <h2>Custom Theme Development</h2>
                        <p>WordPress developers create bespoke themes that reflect your brand's identity. By utilizing the latest design trends and technologies, they ensure your website stands out and provides an exceptional user experience.</p>
                    </section>
                    <section class="work-child" data-aos="fade-left" data-aos-duration="1000">
                        <h2>Plugin Development and Integration</h2>
                        <p>Developers build and integrate custom plugins to extend the functionality of your WordPress site. Whether you need e-commerce capabilities or unique features, they ensure seamless integration and optimal performance.</p>
                    </section>
                    <section class="work-child" data-aos="fade-right" data-aos-duration="1000">
                        <h2>Website Migration Services</h2>
                        <p>WordPress developers facilitate the migration of your existing website to the WordPress platform. They ensure a smooth transition, preserving SEO rankings, content integrity, and minimizing downtime during the process.</p>
                    </section>
                    <section class="work-child" data-aos="fade-left" data-aos-duration="1000">
                        <h2>Performance Optimization</h2>
                        <p>To enhance user experience, developers optimize your WordPress site for speed and performance. They implement best practices, including image optimization, caching strategies, and database cleaning, ensuring quick load times.</p>
                    </section>
                    <section class="work-child" data-aos="fade-right" data-aos-duration="1000">
                        <h2>Ongoing Maintenance and Support</h2>
                        <p>Developers provide ongoing maintenance and support to keep your WordPress site updated and secure. This includes regular backups, security checks, plugin updates, and troubleshooting any issues that arise.</p>
                    </section>
                    <section class="work-child" data-aos="fade-left" data-aos-duration="1000">
                        <h2>SEO and Digital Marketing Services</h2>
                        <p>WordPress developers offer SEO optimization and digital marketing strategies to improve your website's visibility. They utilize best practices to enhance your search engine rankings and drive targeted traffic to your site.</p>
                    </section>

                </section>

            </section>



            <!-- ####### why choose us ########  -->
            <div class="about_container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Why Hire WordPress Developers From TekAlgo?</h1>

            </div>


            <div class="service_choose_us">
                <div class="services_container">

                    <!-- Service 1 - WordPress Experts -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>Our team consists of skilled WordPress experts with extensive experience in developing dynamic, feature-rich websites tailored to meet your specific business and user experience needs.</p>
                            <img src="images/star.png" alt="" />
                            <h1>WordPress Experts</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Custom Themes -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>We design and develop fully customized WordPress themes that reflect your brand identity, ensuring that your website not only looks great but also functions smoothly across devices.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Custom Themes</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Fast Implementation -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>We ensure a fast and efficient WordPress setup, delivering quality websites within your project timelines while maintaining high standards for performance, functionality, and user experience.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Fast Implementation</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Ongoing Maintenance -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>We provide reliable ongoing maintenance to ensure your WordPress website runs smoothly, addressing potential issues and making updates that keep your site current and secure over time.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Ongoing Maintenance</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Affordable Solutions -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>We offer affordable WordPress solutions that don’t compromise on quality, ensuring that your website delivers exceptional performance and value while keeping costs within your budget.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Affordable Solutions</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - Proven Success -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>We have a proven track record of delivering successful WordPress projects, with many satisfied clients and a portfolio of websites that deliver lasting results and exceed expectations.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Proven Success</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                </div>
            </div>


            <!-- ##### why hire from us #####  -->
            <div class="about_container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">
                    Experience Numerous Advantages When You Hire Our WordPress Experts</h1>

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
                                <h2> Customized Solutions</h2>
                            </div>
                            <p>Our WordPress experts create tailored solutions that align with your specific business goals and target audience. By understanding your unique requirements, they develop custom themes and plugins that enhance your website's functionality, ensuring a distinct online presence that resonates with your users.</p>

                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2> Enhanced Performance</h2>
                            </div>
                            <p>When you hire our WordPress experts, you can expect improved website performance. They optimize your site for speed and efficiency through caching strategies, image compression, and clean coding practices, which not only enhance user experience but also positively impact your search engine rankings.</p>


                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2> Ongoing Maintenance </h2>
                            </div>
                            <p>Our team provides continuous support and maintenance, ensuring your WordPress site remains up-to-date, secure, and running smoothly. Regular updates, backups, and security checks protect your website from vulnerabilities and help maintain optimal performance, giving you peace of mind to focus on your business.</p>


                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>SEO Expertise </h2>
                            </div>
                            <p>With our WordPress experts, you gain access to proven SEO strategies that enhance your website's visibility. They implement on-page optimization, keyword research, and quality content strategies to improve your search engine rankings, driving more organic traffic to your site and increasing your online presence.</p>


                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Cost Efficiency </h2>
                            </div>
                            <p>Hiring our WordPress experts is a cost-effective solution for your web development needs. With their experience and expertise, they deliver high-quality work efficiently, reducing the likelihood of costly mistakes. This allows you to allocate resources effectively and achieve your business goals without overspending.</p>


                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Timely Project Delivery</h2>
                            </div>
                            <p>Our WordPress experts prioritize timely project delivery while maintaining high-quality standards. They adhere to agreed-upon timelines and milestones, ensuring that your project progresses smoothly and is completed on schedule. This reliability helps you stay on track with your business objectives and launch plans.</p>


                        </div>
                    </div>
                </div>
            </div>









            <!-- ######## collaboration #####  -->
            <section class="collaboration-wrapper">r
                <section class="collaboration-header">
                    <h1>Simple Steps to Begin Your Journey with Our WordPress Team</h1>
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
                <h1>WordPress Development Services FAQs</h1>
            </div>

            <section class="faq-wrapper" data-aos="zoom-in" data-aos-duration="1000">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What types of websites can WordPress developers create?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        WordPress developers can create a wide range of websites, including blogs, e-commerce sites, portfolios, corporate websites, and membership platforms. They leverage WordPress’s flexibility to tailor solutions that meet specific business needs and goals.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do WordPress developers ensure website security?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        WordPress developers implement various security measures, such as keeping plugins and themes updated, using secure hosting environments, and implementing security plugins. They also follow best practices like using strong passwords and configuring SSL certificates to protect user data.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can WordPress developers customize themes and plugins?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, WordPress developers can create custom themes and plugins to enhance functionality and tailor the website’s appearance to match branding. They are skilled in PHP, HTML, CSS, and JavaScript, enabling them to customize existing solutions or develop new features from scratch.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do WordPress developers handle SEO optimization?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        WordPress developers utilize SEO best practices by optimizing meta tags, headers, and URLs. They may also use SEO plugins like Yoast or All in One SEO to help manage on-page SEO and improve website visibility on search engines.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What are some best practices for WordPress development?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Best practices for WordPress development include maintaining updated backups, optimizing website speed through caching, minimizing plugin usage, and adhering to coding standards. These practices help ensure a robust, efficient, and maintainable website.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do WordPress developers ensure website performance?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        WordPress developers enhance website performance by optimizing images, using caching solutions, and minimizing the use of heavy plugins. They also leverage Content Delivery Networks (CDNs) to improve load times and provide a smoother user experience.
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