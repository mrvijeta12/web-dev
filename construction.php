<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'construction' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'construction' AND blog_status = 'published'");
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
    <link rel="stylesheet" href="assests/css/theme.css">

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
                        <span>C</span><span>o</span><span>n</span><span>s</span><span>t</span><span>r</span><span>u</span><span>c</span><span>t</span><span>i</span><span>o</span><span>n</span>
                        <span>S</span><span>o</span><span>f</span><span>t</span><span>w</span><span>a</span><span>r</span><span>e</span> <span>D</span><span>e</span><span>v</span><span>e</span><span>l</span><span>o</span><span>p</span><span>m</span><span>e</span><span>n</span><span>t</span> <span>S</span><span>e</span><span>r</span><span>v</span><span>i</span><span>c</span><span>e</span><span>s</span>
                    </h1>
                    <h3 data-aos="fade-up" data-aos-duration="1500">Empowering Construction Businesses with Smart Software Development</h3>
                    <a href="" class="reopenPopup" data-aos="fade-up" data-aos-duration="1500">Get Free Quote</a>

                </div>
                <div class="child child2">
                    <img src="images/construction-hero.png" alt="" data-aos="fade-left" data-aos-duration="2500" />
                </div>
            </div>

            <!-- ####### INTRODUCTION  ####### -->

            <section class="intro">
                <h1>Building the Future with Our Construction Software Development Solutions</h1>
                <p>Our software development services for the construction industry are designed to streamline project management, enhance collaboration, and improve on-site efficiency. By utilizing innovative technology, data-driven insights, and intuitive tools, we empower construction companies to optimize their workflows, reduce costs, and deliver projects on time while adapting to the evolving demands of the industry.</p>
            </section>

            <!-- ####### details ####### -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">
                    Process We Follow To Develop Construction Software</h1>

            </div>

            <section class="detail">
                <section class="detail-title detail-child">
                    <p class="tab active-tab" onclick="toggleContent(1)">
                        <strong>01.</strong> Construction Software Consulting

                    </p>
                    <p class="tab" onclick="toggleContent(2)">
                        <strong>02.</strong> Custom Construction Software Development

                    </p>
                    <p class="tab" onclick="toggleContent(3)">
                        <strong>03.</strong> Construction Software Product Development

                    </p>
                    <p class="tab" onclick="toggleContent(4)">
                        <strong>04.</strong> Construction Software Integration

                    </p>
                    <p class="tab" onclick="toggleContent(5)">
                        <strong>05.</strong> Construction Software Testing and Quality Assurance

                    </p>
                    <p class="tab" onclick="toggleContent(6)">
                        <strong>06.</strong> Construction Software Modernization

                    </p>
                    <p class="tab" onclick="toggleContent(7)">
                        <strong>07.</strong> Construction Software Maintenance and Support

                    </p>
                </section>
                <section class="detail-description detail-child">
                    <section id="content1" class="content">
                        <div class="content-header">
                            <img src="images/consultation.png" alt="">
                            <h3>Construction Software Consulting</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We evaluate your construction operations and technological needs, providing strategic guidance for developing customized software solutions. Our consulting services identify opportunities for efficiency, mitigate risks, and establish a strong foundation for successful software implementation.</p>
                    </section>
                    <section id="content2" class="content">
                        <div class="content-header">
                            <img src="images/software-development-process.png" alt="">
                            <h3>Custom Construction Software Development</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We specialize in developing tailored software solutions that meet the specific requirements of your construction projects. From initial coding to deploying unique features, our development process ensures your software enhances productivity and project management.</p>
                    </section>
                    <section id="content3" class="content">
                        <div class="content-header">
                            <img src="images/development.png" alt="">
                            <h3>Construction Software Product Development</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We focus on creating scalable, market-ready software products for the construction industry, turning your innovative ideas into reality. Our product development services deliver solutions that enhance project oversight, streamline operations, and drive profitability.</p>
                    </section>
                    <section id="content4" class="content">
                        <div class="content-header">
                            <img src="images/deployment.png" alt="">
                            <h3>Construction Software Integration</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>Our integration services ensure seamless connectivity between your new software and existing construction systems. We facilitate interoperability among platforms to enhance operational efficiency, reduce manual processes, and improve collaboration across teams.</p>
                    </section>
                    <section id="content5" class="content">
                        <div class="content-header">
                            <img src="images/project-analysis-health.png" alt="">
                            <h3>Construction Software Testing and Quality Assurance</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We conduct comprehensive testing of your construction software to identify bugs and vulnerabilities, ensuring it meets the highest standards of performance, security, and compliance with industry regulations. Our quality assurance practices guarantee a reliable user experience.</p>
                    </section>
                    <section id="content6" class="content">
                        <div class="content-header">
                            <img src="images/moderization-process.png" alt="">
                            <h3>Construction Software Modernization</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We upgrade legacy construction software to meet contemporary technological standards, enhancing functionality and security. Our modernization services help your projects stay competitive by integrating advanced features that support evolving industry needs.</p>
                    </section>
                    <section id="content7" class="content">
                        <div class="content-header">
                            <img src="images/support-process.png" alt="">
                            <h3>Construction Software Maintenance and Support</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>Our maintenance and support services provide ongoing software updates, troubleshooting, and enhancements to ensure optimal performance. We focus on resolving issues, improving functionality, and adapting software to the changing landscape of the construction industry.</p>
                    </section>
                </section>
            </section>





            <!-- ######### Benefits ##########  -->
            <section class="benefits-wrapper">
                <h1>Sectors that can benefits from our construction software development services</h1>


                <div class="benefits-sectors">
                    <ul>
                        <li>General Contractors</li>
                        <li>Residential Builders</li>
                        <li>Commercial Construction Firms</li>
                        <li>Civil Engineering Companies</li>
                        <li>Specialty Trade Contractors</li>
                        <li>Project Management Firms</li>
                    </ul>
                    <ul>
                        <li>Construction Materials Suppliers</li>
                        <li>Architectural Firms</li>
                        <li>Structural Engineering Consultants</li>
                        <li>Construction Equipment Rental Services</li>
                        <li>Sustainability Consultants</li>
                        <li>Regulatory Agencies</li>
                    </ul>
                </div>

            </section>



            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Why Choose TekAlgo As Your Construction Software Development</h1>

            </div>


            <div class="service_choose_us">

                <div class="services_container">
                    <!-- Service 1 - Construction Technology Expertise -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Providing advanced technology solutions to streamline construction project management, enhance site safety, and boost overall productivity.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Construction Technology Expertise</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Custom Construction Software Development -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Developing tailored software to automate processes, manage resources, and improve collaboration across construction projects of all sizes.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Custom Construction Software Development</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Data Security and Compliance -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Ensuring the highest standards of data security and compliance to protect sensitive project information and client details from cyber threats.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Data Security and Compliance</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Integrated Construction Management Systems -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Seamlessly integrating multiple construction tools and platforms, providing a unified system to monitor project timelines, budgets, and resources.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Integrated Construction Management Systems</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Scalable and Innovative Solutions -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Offering scalable software solutions designed to grow with your business, incorporating the latest innovations to enhance construction efficiency.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Scalable and Innovative Solutions</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - Ongoing Support and Maintenance -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Delivering reliable support and continuous updates to ensure that your construction technology solutions remain effective and up-to-date.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Ongoing Support and Maintenance</h1>
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
                    Who Can Avail Our Construction Software Services</h1>

            </div>

            <div class="avail-section-wrapper">
                <div class="avail-section" id="scrollable-section">
                    <div class="avail-image-container" id="image-scroll">
                        <img src="images/construction-primary.jpg" alt="Image on Left">
                    </div>


                    <div class="avail-content-container" id="scrollable-content">
                        <!-- Construction Industry Content -->
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Project Management</h2>
                            </div>
                            <p>Construction project management companies utilize software for scheduling, resource
                                allocation, and progress tracking. These tools enhance collaboration among teams, streamline
                                workflows, and ensure projects are completed on time and within budget, improving overall
                                project efficiency.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Cost Estimation</h2>
                            </div>
                            <p>Cost estimation firms benefit from software that automates bidding, budgeting, and expense
                                tracking. These solutions improve accuracy in cost projections, enhance financial planning,
                                and facilitate competitive bidding processes, ensuring more profitable project outcomes for
                                construction companies.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Building Information Modeling (BIM)</h2>
                            </div>
                            <p>BIM companies use software for 3D modeling, design visualization, and collaboration.
                                These tools enhance communication among stakeholders, improve design accuracy, and reduce errors
                                during construction, leading to more efficient project execution and better building
                                performance.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Field Operations</h2>
                            </div>
                            <p>Field operations teams leverage software for site management, workforce scheduling, and
                                equipment tracking. These solutions improve on-site communication, enhance productivity,
                                and ensure compliance with safety regulations, optimizing overall construction site
                                operations.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Safety Management</h2>
                            </div>
                            <p>Construction safety management firms use software for incident reporting, compliance tracking,
                                and training management. These tools help monitor safety protocols, improve risk assessments, and
                                ensure regulatory compliance, promoting a safer working environment on construction
                                sites.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Subcontractor Management</h2>
                            </div>
                            <p>Subcontractor management companies benefit from software that facilitates contract management,
                                performance tracking, and payment processing. These solutions enhance communication with
                                subcontractors, streamline workflows, and ensure timely payments, improving collaboration
                                and project efficiency.</p>
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
                            <img src="images/project-management.png" alt="">
                        </div>
                        <h2>Construction Project Solutions</h2>
                        <p>Software to streamline project planning and resource management.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/budgeting-software.png" alt="">
                        </div>
                        <h2>Budgeting and Cost Control</h2>
                        <p>Tools to manage budgets and track expenses effectively.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/safety-management.png" alt="">
                        </div>
                        <h2>Safety Management Solutions</h2>
                        <p>Systems to enhance safety protocols and risk management.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/quality-control.png" alt="">
                        </div>
                        <h2>Quality Control Software</h2>
                        <p>Solutions to ensure compliance and high quality standards.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/design-collaboration.png" alt="">
                        </div>
                        <h2>BIM Collaboration Tools</h2>
                        <p>Enhancing collaboration between architects and contractors effectively.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/field-management.png" alt="">
                        </div>
                        <h2>Field Management Tools</h2>
                        <p>Mobile solutions for real-time communication on construction sites.</p>
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

            <!-- ##### faq ######  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>Construction Industry Web Development FAQs</h1>
            </div>

            <section class="faq-wrapper">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What types of websites do you build for the construction industry?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We create websites for general contractors, builders, architecture firms, engineering companies, and suppliers. Our sites are tailored to showcase project portfolios, provide service details, and build trust with clients through a professional online presence.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can you integrate project management tools and client portals?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we can integrate project management tools and client portals to facilitate communication, document sharing, and project tracking. This helps streamline processes and keeps clients updated on project progress directly through the website.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do you highlight completed projects on the website?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We create visually engaging project portfolios with high-quality images, videos, and project descriptions. Interactive galleries, case studies, and testimonials help showcase your expertise and completed projects effectively.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Do you offer SEO tailored to the construction industry?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, our SEO services focus on construction-related keywords and local SEO to attract clients in your target areas. We optimize content to help potential clients find your business when searching for construction services.
                    </p>
                </section>
            </section>






            <!-- ##### Book #######  -->

            <section class="section-book">
                <section class="book-image">
                    <img src="images/booking-industry.jpg" alt="">
                </section>
                <section class="book-data">



                    <h1 data-aos="zoom-in" data-aos-duration="2500">Construction Software Development Services</h1>
                    <p data-aos="zoom-in" data-aos-duration="2500">Comprehensive Solutions Designed to Support Construction Professionals</p>
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