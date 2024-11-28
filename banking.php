<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'banking' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'banking' AND blog_status = 'published'");
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
        <div class="wrapper" data-aos="fade-right" data-aos-duration="1000">

            <!-- ################################# HERO SECTION ##################################  -->
            <div class="hero">
                <div class="child child1">
                    <h1 class="animated-heading">
                        <span>B</span><span>a</span><span>n</span><span>k</span><span>i</span><span>n</span><span>g</span>

                        <span>S</span><span>o</span><span>f</span><span>t</span><span>w</span><span>a</span><span>r</span><span>e</span> <span>D</span><span>e</span><span>v</span><span>e</span><span>l</span><span>o</span><span>p</span><span>m</span><span>e</span><span>n</span><span>t</span> <span>S</span><span>e</span><span>r</span><span>v</span><span>i</span><span>c</span><span>e</span><span>s</span>
                    </h1>
                    <h3>Streamlining Banking Services with Advanced Technology Solutions</h3>
                    <a href="#" class="reopenPopup">Get Free Quote</a>

                </div>
                <div class="child child2">
                    <img src="images/banking-hero.png" alt="" data-aos="fade-left" data-aos-duration="1000" />
                </div>
            </div>
            <!-- ####### INTRODUCTION  ####### -->

            <section class="intro">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Innovating Banking Solutions with Our Advanced Software Development Services</h1>
                <p data-aos="fade-up" data-aos-duration="1000">Our software development services for the banking industry are designed to enhance security, improve customer service, and streamline financial operations. By leveraging cutting-edge technology, data analytics, and regulatory compliance, we empower banks to offer seamless digital experiences, optimize their workflows, and adapt to the evolving needs of their customers in a competitive financial landscape.</p>
            </section>


            <!-- ####### details ####### -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">
                    Process We Follow To Develop Banking Software</h1>

            </div>

            <section class="detail" data-aos="fade-up" data-aos-duration="1000">
                <section class="detail-title detail-child">
                    <p class="tab active-tab" onclick="toggleContent(1)">
                        <strong>01.</strong> Banking Software Consulting

                    </p>
                    <p class="tab" onclick="toggleContent(2)">
                        <strong>02.</strong> Custom Banking Software Development

                    </p>
                    <p class="tab" onclick="toggleContent(3)">
                        <strong>03.</strong> Banking Software Product Development

                    </p>
                    <p class="tab" onclick="toggleContent(4)">
                        <strong>04.</strong> Banking Software Integration

                    </p>
                    <p class="tab" onclick="toggleContent(5)">
                        <strong>05.</strong> Banking Software Testing and Quality Assurance

                    </p>
                    <p class="tab" onclick="toggleContent(6)">
                        <strong>06.</strong> Banking Software Modernization

                    </p>
                    <p class="tab" onclick="toggleContent(7)">
                        <strong>07.</strong> Banking Software Maintenance and Support

                    </p>
                </section>
                <section class="detail-description detail-child">
                    <section id="content1" class="content">
                        <div class="content-header">
                            <img src="images/consultation.png" alt="">
                            <h3>Banking Software Consulting</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We assess your banking operations and technological requirements, providing strategic guidance for developing customized banking software solutions. Our consulting services help identify opportunities for efficiency, ensure compliance, and establish a robust foundation for successful software implementation.</p>
                    </section>
                    <section id="content2" class="content">
                        <div class="content-header">
                            <img src="images/software-development-process.png" alt="">
                            <h3>Custom Banking Software Development</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We specialize in developing tailored banking software solutions that meet your specific requirements. From initial coding to deploying unique features, our development process ensures your software enhances financial services and customer engagement.</p>
                    </section>
                    <section id="content3" class="content">
                        <div class="content-header">
                            <img src="images/development.png" alt="">
                            <h3>Banking Software Product Development</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We focus on creating scalable, market-ready banking software products that address customer needs and regulatory requirements. Our product development services deliver solutions that enhance user experience, streamline transactions, and promote financial growth.</p>
                    </section>
                    <section id="content4" class="content">
                        <div class="content-header">
                            <img src="images/deployment.png" alt="">
                            <h3>Banking Software Integration</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>Our integration services ensure seamless connectivity between your banking software and existing systems. We facilitate interoperability among platforms to enhance operational efficiency, reduce manual processes, and improve service delivery.</p>
                    </section>
                    <section id="content5" class="content">
                        <div class="content-header">
                            <img src="images/project-analysis-health.png" alt="">
                            <h3>Banking Software Testing and Quality Assurance</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We conduct thorough testing of your banking software to identify bugs and vulnerabilities, ensuring it meets the highest standards of performance, security, and compliance with financial regulations. Our quality assurance practices guarantee a reliable user experience.</p>
                    </section>
                    <section id="content6" class="content">
                        <div class="content-header">
                            <img src="images/moderization-process.png" alt="">
                            <h3>Banking Software Modernization</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We upgrade legacy banking software to meet contemporary technological standards, enhancing functionality and security. Our modernization services help your bank remain competitive by integrating advanced features that support evolving customer needs and compliance mandates.</p>
                    </section>
                    <section id="content7" class="content">
                        <div class="content-header">
                            <img src="images/support-process.png" alt="">
                            <h3>Banking Software Maintenance and Support</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>Our maintenance and support services provide ongoing software updates, troubleshooting, and enhancements to ensure optimal performance. We focus on resolving issues, improving functionality, and adapting software to the changing landscape of the banking industry.</p>
                    </section>
                </section>
            </section>




            <!-- ######### Benefits ##########  -->
            <section class="benefits-wrapper">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Sectors that can benefits from our banking software development services</h1>

                <div class="benefits-sectors">
                    <ul data-aos="fade-right" data-aos-duration="1000">
                        <li>Retail Banks</li>
                        <li>Commercial Banks</li>
                        <li>Investment Banks</li>
                        <li>Credit Unions</li>
                        <li>Online Banks</li>
                        <li>Private Banks</li>
                    </ul>
                    <ul data-aos="fade-left" data-aos-duration="1000">
                        <li>Mortgage Lenders</li>
                        <li>Wealth Management Firms</li>
                        <li>Payment Processing Companies</li>
                        <li>Financial Advisory Services</li>
                        <li>Regulatory Agencies</li>
                        <li>Banking Technology Providers</li>
                    </ul>
                </div>
            </section>



            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Why Choose TekAlgo As Your Banking Software Development</h1>

            </div>


            <div class="service_choose_us">

                <div class="services_container">
                    <!-- Service 1 - Banking Technology Expertise -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Providing cutting-edge technology solutions for the banking sector, enhancing operational efficiency, security, and customer satisfaction in an ever-evolving financial landscape.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Banking Technology Expertise</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Custom Fintech Solutions -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Developing tailored fintech applications designed to streamline banking processes, improve user experiences, and drive innovation across services.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Custom Fintech Solutions</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Robust Security and Compliance -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Implementing advanced security frameworks and compliance measures to protect customer data and ensure adherence to regulatory standards.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Robust Security and Compliance</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Integrated Banking Solutions -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Seamlessly integrating various banking systems and services to enhance efficiency, data sharing, and operational transparency.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Integrated Banking Solutions</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Innovative Banking Technologies -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Empowering banks with innovative solutions like AI, blockchain, and analytics to transform operations and provide better customer service.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Innovative Banking Technologies</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - 24/7 Technical Support -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Offering round-the-clock support and maintenance to ensure uninterrupted banking services and address any technical issues promptly.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>24/7 Technical Support</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>
                </div>

            </div>


            <!-- ######### who can avail ###### -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">
                    Who Can Avail Our Banking Software Services</h1>

            </div>

            <div class="avail-section-wrapper">
                <div class="avail-section" id="scrollable-section">
                    <div class="avail-image-container" id="image-scroll">
                        <img src="images/banking-primary.jpg" alt="Image on Left" data-aos="fade-right" data-aos-duration="1000">
                    </div>


                    <div class="avail-content-container" id="scrollable-content" data-aos="fade-left" data-aos-duration="1000">
                        <!-- Banking Content -->
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Digital Banking Solutions</h2>
                            </div>
                            <p>Banking institutions can leverage social networking platforms to promote their digital banking solutions,
                                highlighting features like mobile apps, online banking services, and contactless payments. This not only
                                informs customers about the convenience offered but also encourages adoption of digital channels.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Fraud Awareness</h2>
                            </div>
                            <p>Banks can utilize social media to raise awareness about fraud prevention and cybersecurity. By sharing
                                tips, alerts, and educational content, they empower customers to protect their financial information and
                                mitigate risks associated with online banking.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Loan and Mortgage Education</h2>
                            </div>
                            <p>Through social networking platforms, banks can provide educational resources on loans and mortgages,
                                helping customers understand their options. This transparency fosters trust and assists clients in making
                                informed financial decisions.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Customer Testimonials</h2>
                            </div>
                            <p>Banks can encourage customers to share their positive experiences on social media. Showcasing testimonials
                                not only builds credibility but also attracts potential customers looking for reliable financial services.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Product Promotions</h2>
                            </div>
                            <p>Social media is an effective channel for banks to promote new financial products and services. By
                                engaging users with targeted ads and creative campaigns, banks can drive interest and encourage inquiries,
                                ultimately boosting sales.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Corporate Social Responsibility</h2>
                            </div>
                            <p>Banks can showcase their corporate social responsibility initiatives on social networking platforms. By
                                highlighting community involvement and charitable efforts, they enhance their public image and demonstrate
                                commitment to societal well-being, fostering a positive perception among customers.</p>
                        </div>
                    </div>

                </div>
            </div>



            <!-- ######### Process ##########  -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">
                    Process We Follow To Develop Heathcare Software</h1>

            </div>

            <div class="swiper mySwiper">

                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/banking-software-development.png" alt="">
                        </div>
                        <h2>Banking Software</h2>
                        <p>Building secure solutions to enhance operations and experiences.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/mobile-banking-apps.png" alt="">
                        </div>
                        <h2>Mobile Banking Apps</h2>
                        <p>User-friendly apps for convenient banking access anytime.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/online-banking-solutions.png" alt="">
                        </div>
                        <h2>Online Banking</h2>
                        <p>Comprehensive platforms for secure transactions and management.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/financial-analytics-tools.png" alt="">
                        </div>
                        <h2>Financial Analytics</h2>
                        <p>Advanced tools for real-time insights and reporting.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/risk-management-solutions.png" alt="">
                        </div>
                        <h2>Risk Management</h2>
                        <p>Solutions to identify and mitigate financial risks.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/cybersecurity-banking.png" alt="">
                        </div>
                        <h2>Cybersecurity</h2>
                        <p>Robust measures to protect sensitive banking data.</p>
                    </div>
                </div>


                <div class="swiper-pagination"></div>
            </div>



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
            <!-- ##### faq ####  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1000">
                <h1>Banking Website Development FAQs</h1>
            </div>

            <section class="faq-wrapper" data-aos="zoom-in" data-aos-duration="1000">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What types of websites do you build for the banking sector?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We create websites for various banking institutions, including retail banks, credit unions, investment banks, and online banking platforms. Our designs focus on user-friendly interfaces, security, and providing easy access to banking services and information.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can you integrate online banking features and account management?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we can integrate comprehensive online banking features, including account management, transaction history, fund transfers, and bill payments. Our solutions ensure that users can manage their finances conveniently and securely from any device.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do you ensure compliance with banking regulations?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We prioritize compliance with industry regulations such as GDPR, PSD2, and anti-money laundering (AML) laws. Our team works closely with you to implement necessary protocols to protect customer data and maintain regulatory adherence in all aspects of the website.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Do you offer security features for banking websites?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Absolutely! We implement advanced security features, including encryption, two-factor authentication, and regular security audits to protect sensitive financial data. Our focus is on creating a secure environment for both the bank and its customers.
                    </p>
                </section>
            </section>





            <!-- ##### Book #######  -->

            <section class="section-book">
                <section class="book-image">
                    <img src="images/booking-industry.jpg" alt="">
                </section>
                <section class="book-data">



                    <h1 data-aos="fade-down" data-aos-duration="1000">Banking Software Development Services</h1>
                    <p data-aos="fade-down" data-aos-duration="1000">Comprehensive Solutions Designed to Support Banking Professionals</p>
                    <a href="#" class="reopenPopup" data-aos="fade-down" data-aos-duration="1000">Connect With Us</a>
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