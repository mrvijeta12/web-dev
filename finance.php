<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'finance' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'finance' AND blog_status = 'published'");
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
                        <span>F</span><span>i</span><span>n</span><span>a</span><span>n</span><span>c</span><span>e</span>

                        <span>S</span><span>o</span><span>f</span><span>t</span><span>w</span><span>a</span><span>r</span><span>e</span> <span>D</span><span>e</span><span>v</span><span>e</span><span>l</span><span>o</span><span>p</span><span>m</span><span>e</span><span>n</span><span>t</span> <span>S</span><span>e</span><span>r</span><span>v</span><span>i</span><span>c</span><span>e</span><span>s</span>
                    </h1>
                    <h3 data-aos="fade-up" data-aos-duration="1500">Optimizing Finance Workflows with Tailored Software Solutions</h3>
                    <a href="#" class="reopenPopup">Get Free Quote</a>

                </div>
                <div class="child child2">
                    <img src="images/finance-hero.png" alt="" data-aos="fade-left" data-aos-duration="2500" />
                </div>
            </div>

            <!-- ####### INTRODUCTION  ####### -->

            <section class="intro">
                <h1>Transforming Financial Services with Our Fintech Software Development Solutions</h1>
                <p>Our software development services for the finance industry are designed to enhance security, streamline operations, and drive digital innovation. By leveraging advanced technology, data analytics, and regulatory compliance, we empower financial institutions to deliver seamless customer experiences, optimize their processes, and adapt to the evolving demands of the modern financial landscape.</p>
            </section>


            <!-- ####### details ####### -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">
                    Process We Follow To Develop Finance Software</h1>

            </div>

            <section class="detail">
                <section class="detail-title detail-child">
                    <p class="tab active-tab" onclick="toggleContent(1)">
                        <strong>01.</strong> Finance Software Consulting

                    </p>
                    <p class="tab" onclick="toggleContent(2)">
                        <strong>02.</strong> Custom Finance Software Development

                    </p>
                    <p class="tab" onclick="toggleContent(3)">
                        <strong>03.</strong> Finance Software Product Development

                    </p>
                    <p class="tab" onclick="toggleContent(4)">
                        <strong>04.</strong> Finance Software Integration

                    </p>
                    <p class="tab" onclick="toggleContent(5)">
                        <strong>05.</strong> Finance Software Testing and Quality Assurance

                    </p>
                    <p class="tab" onclick="toggleContent(6)">
                        <strong>06.</strong> Finance Software Modernization

                    </p>
                    <p class="tab" onclick="toggleContent(7)">
                        <strong>07.</strong> Finance Software Maintenance and Support

                    </p>
                </section>
                <section class="detail-description detail-child">
                    <section id="content1" class="content">
                        <div class="content-header">
                            <img src="images/consultation.png" alt="">
                            <h3>Finance Software Consulting</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We assess your financial operations and technological requirements, providing strategic guidance for developing customized finance software solutions. Our consulting services identify opportunities for efficiency, ensure compliance, and establish a solid foundation for successful software implementation.</p>
                    </section>
                    <section id="content2" class="content">
                        <div class="content-header">
                            <img src="images/software-development-process.png" alt="">
                            <h3>Custom Finance Software Development</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We specialize in developing tailored finance software solutions that meet the specific requirements of your business. From initial coding to deploying unique features, our development process ensures your software enhances financial management and reporting.</p>
                    </section>
                    <section id="content3" class="content">
                        <div class="content-header">
                            <img src="images/development.png" alt="">
                            <h3>Finance Software Product Development</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We focus on creating scalable, market-ready finance software products that solve real-world problems, turning your innovative ideas into reality. Our product development services deliver solutions that enhance user experience, streamline operations, and drive profitability.</p>
                    </section>
                    <section id="content4" class="content">
                        <div class="content-header">
                            <img src="images/deployment.png" alt="">
                            <h3>Finance Software Integration</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>Our integration services ensure seamless connectivity between your finance software and existing systems. We facilitate interoperability among platforms to enhance operational efficiency, reduce manual processes, and improve financial reporting.</p>
                    </section>
                    <section id="content5" class="content">
                        <div class="content-header">
                            <img src="images/project-analysis-health.png" alt="">
                            <h3>Finance Software Testing and Quality Assurance</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We conduct thorough testing of your finance software to identify bugs and vulnerabilities, ensuring it meets the highest standards of performance, security, and compliance with financial regulations. Our quality assurance practices guarantee a reliable user experience.</p>
                    </section>
                    <section id="content6" class="content">
                        <div class="content-header">
                            <img src="images/moderization-process.png" alt="">
                            <h3>Finance Software Modernization</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We upgrade legacy finance software to meet contemporary technological standards, enhancing functionality and security. Our modernization services help your business stay competitive by integrating advanced features that support evolving financial needs and compliance requirements.</p>
                    </section>
                    <section id="content7" class="content">
                        <div class="content-header">
                            <img src="images/support-process.png" alt="">
                            <h3>Finance Software Maintenance and Support</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>Our maintenance and support services provide ongoing software updates, troubleshooting, and enhancements to ensure optimal performance. We focus on resolving issues, improving functionality, and adapting software to the changing landscape of the finance industry.</p>
                    </section>
                </section>
            </section>






            <!-- ######### Benefits ##########  -->
            <section class="benefits-wrapper">
                <h1>Sectors that can benefits from our finance software development services</h1>



                <div class="benefits-sectors">
                    <ul>
                        <li>Banking Institutions</li>
                        <li>Investment Firms</li>
                        <li>Insurance Companies</li>
                        <li>Fintech Startups</li>
                        <li>Accounting Firms</li>
                        <li>Wealth Management Services</li>
                    </ul>
                    <ul>
                        <li>Credit Unions</li>
                        <li>Payment Processing Companies</li>
                        <li>Mortgage Brokers</li>
                        <li>Financial Advisors</li>
                        <li>Regulatory Agencies</li>
                        <li>Tax Preparation Services</li>
                    </ul>
                </div>
            </section>



            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Why Choose TekAlgo As Your Finance Software Development</h1>

            </div>
            <div class="service_choose_us">

                <div class="services_container">
                    <!-- Service 1 - Financial Technology Expertise -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Specializing in cutting-edge fintech solutions that drive innovation, enhance customer engagement, and improve operational efficiency across the financial services sector.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Financial Technology Expertise</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Custom Financial Software Development -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Developing tailored software solutions that streamline financial operations, from wealth management to payment processing and regulatory compliance.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Custom Financial Software Development</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Data Security and Risk Management -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Implementing robust security measures to safeguard sensitive financial data, ensuring compliance with industry regulations and protecting against cyber threats.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Data Security and Risk Management</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Seamless Integration with Legacy Systems -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Facilitating the integration of modern fintech solutions with existing legacy systems, allowing for improved data flow and operational efficiency.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Seamless Integration with Legacy Systems</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Advanced Analytics and Reporting -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Providing sophisticated analytics tools that empower financial institutions to make data-driven decisions and enhance their strategic planning efforts.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Advanced Analytics and Reporting</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - 24/7 Technical Support and Maintenance -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Offering around-the-clock technical support and regular software updates to ensure optimal performance and reliability of financial applications.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>24/7 Technical Support and Maintenance</h1>
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
                    Who Can Avail Our Finance Software Services</h1>

            </div>

            <div class="avail-section-wrapper">
                <div class="avail-section" id="scrollable-section">
                    <div class="avail-image-container" id="image-scroll">
                        <img src="images/finance-primary.jpg" alt="Image on Left">
                    </div>


                    <div class="avail-content-container" id="scrollable-content">
                        <!-- Finance and Investment Industry Content -->
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Investment Management</h2>
                            </div>
                            <p>Investment management firms utilize software for portfolio tracking, risk assessment,
                                and performance analysis. These tools enhance decision-making, streamline reporting, and
                                provide real-time insights, helping managers optimize investment strategies and improve
                                client outcomes.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Personal Finance</h2>
                            </div>
                            <p>Personal finance software assists individuals in budgeting, expense tracking, and goal setting.
                                These tools provide users with insights into spending habits, facilitate savings, and help manage
                                investments, promoting better financial health and informed
                                decision-making.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Accounting Firms</h2>
                            </div>
                            <p>Accounting firms benefit from software that automates bookkeeping, tax preparation,
                                and financial reporting. These solutions improve accuracy, reduce manual labor, and
                                enhance client communication, allowing firms to provide timely and efficient
                                financial services.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Credit Unions and Banks</h2>
                            </div>
                            <p>Credit unions and banks utilize software for loan management, customer relationship management,
                                and compliance tracking. These tools enhance operational efficiency, improve customer service, and
                                ensure regulatory adherence, leading to better financial products and
                                services.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Risk Management</h2>
                            </div>
                            <p>Risk management companies use software for assessing financial risks, compliance monitoring,
                                and reporting. These tools help organizations identify potential risks, implement mitigation
                                strategies, and ensure adherence to regulations, safeguarding assets and
                                promoting stability.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Financial Planning and Analysis</h2>
                            </div>
                            <p>Financial planning software assists businesses in budgeting, forecasting, and scenario analysis.
                                These tools provide insights into financial performance, enhance strategic planning, and
                                facilitate informed decision-making, ultimately driving business growth and
                                sustainability.</p>
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
                            <img src="images/financial-software-development.png" alt="">
                        </div>
                        <h2>Financial Software</h2>
                        <p>Creating applications to enhance operational efficiency in finance.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/fintech-solutions.png" alt="">
                        </div>
                        <h2>Fintech Solutions</h2>
                        <p>Innovative solutions for payment processing and wealth management.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/financial-analytics.png" alt="">
                        </div>
                        <h2>Financial Analytics</h2>
                        <p>Advanced tools for insights, forecasts, and reporting.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/compliance-solutions.png" alt="">
                        </div>
                        <h2>Compliance Solutions</h2>
                        <p>Ensuring adherence to regulations with risk management software.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/cybersecurity-finance.png" alt="">
                        </div>
                        <h2>Cybersecurity Solutions</h2>
                        <p>Robust measures to protect sensitive financial data.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/financial-planning.png" alt="">
                        </div>
                        <h2>Financial Planning</h2>
                        <p>Expert advisory services for investment strategies and planning.</p>
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


            <!-- #### faq #####  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>Finance Industry Web Development FAQs</h1>
            </div>

            <section class="faq-wrapper">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What types of websites do you build for the finance industry?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We create websites for a range of financial services, including banks, investment firms, insurance companies, and financial advisors. Our sites are designed to establish credibility, provide essential information, and facilitate customer engagement.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can you integrate financial tools and calculators on the website?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we can integrate various financial tools and calculators to help users make informed decisions. This can include mortgage calculators, investment estimators, and budgeting tools that enhance user experience and engagement on your site.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do you ensure compliance with financial regulations?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We ensure compliance with financial regulations, including GDPR, CCPA, and specific industry standards such as PCI DSS for payment processing. Our team works closely with you to implement necessary measures to protect customer data and ensure regulatory adherence.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Do you provide SEO services tailored to the finance sector?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, our SEO strategies are tailored for the finance sector, focusing on key financial terms and local search optimization. We aim to improve your visibility in search engines, attracting potential clients looking for financial services.
                    </p>
                </section>
            </section>





            <!-- ##### Book #######  -->

            <section class="section-book">
                <section class="book-image">
                    <img src="images/booking-industry.jpg" alt="">
                </section>
                <section class="book-data">



                    <h1 data-aos="zoom-in" data-aos-duration="2500">Finance Software Development Services</h1>
                    <p data-aos="zoom-in" data-aos-duration="2500">Comprehensive Solutions Designed to Support Finance Professionals</p>
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