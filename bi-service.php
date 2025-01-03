<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'bi' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'bi' AND blog_status = 'published'");
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
    <link rel="stylesheet" href="assests/css/web-services.css">
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
                <div class="hero-image">
                    <img src="images/bi-hero.jpg" alt="">
                </div>
                <div class="hero-data">
                    <h1 data-aos="zoom-in" data-aos-duration="2500">Unlock Data Insights with Business Intelligence</h1>
                    <h2 data-aos="zoom-in" data-aos-duration="2500">Transform data into actionable insights for growth.</h2>
                    <a href="#" class="reopenPopup">Get Professional Advice</a>
                </div>
            </div>


            <!-- ####### INTRODUCTION  ####### -->

            <section class="intro">
                <h1>Transform Your Data into Actionable Insights with Our Business Intelligence Solutions</h1>
                <p>Our Business Intelligence (BI) solutions empower organizations to make informed decisions by transforming data into actionable insights. With advanced analytics and reporting tools, our BI platform centralizes and visualizes key performance metrics, enabling you to identify trends, optimize operations, and drive strategic growth. Harness the power of real-time data analysis, interactive dashboards, and intuitive visualizations to uncover hidden opportunities and enhance collaboration across your teams. Elevate your business with data-driven strategies that foster innovation and improve overall performance.</p>
            </section>




            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Core Features of BI Solutions</h1>
            </div>
            <div class="service_choose_us">
                <div class="services_container">
                    <!-- Service 1 - Data Visualization -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Transforms data into visual insights such as charts, graphs, and dashboards, making complex data easier to understand and enabling quick decision-making for businesses.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Data Visualization</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Predictive Analytics -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Uses statistical algorithms and machine learning to predict future trends, customer behavior, and business outcomes, helping organizations to take proactive actions based on forecasts.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Predictive Analytics</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Data Integration -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Aggregates data from multiple sources into a unified system, enabling consistent and accurate insights across all business functions for better decision-making and improved efficiency.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Data Integration</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Ad-hoc Reporting -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Generates custom reports on demand, enabling businesses to create tailored insights based on specific needs and metrics, which can drive faster, data-informed decision-making.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Ad-hoc Reporting</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Real-Time Analysis -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Provides instant, real-time analysis of data, ensuring that decision-makers have up-to-date insights, allowing them to respond quickly to market changes or business needs.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Real-Time Analysis</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>
                </div>
            </div>








            <!-- ######### Benefits ##########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Key Benefits of Implementing BI Systems</h1>

            </div>


            <section class="benefits-wrapper">


                <div class="benefits-sectors">
                    <ul>
                        <li>Enhanced decision-making with data-driven insights.</li>
                        <li>Improved visibility into key performance metrics.</li>
                        <li>Streamlined reporting processes for timely information.</li>
                        <li>Integration of data from various sources for a holistic view.</li>
                        <li>Increased efficiency in data analysis and reporting.</li>
                    </ul>
                    <ul>
                        <li>Real-time dashboards for monitoring business performance.</li>
                        <li>Customizable reports to fit organizational needs.</li>
                        <li>Enhanced collaboration through shared insights and analytics.</li>
                        <li>Support for predictive analytics for future planning.</li>
                        <li>Scalability to grow with your business intelligence needs.</li>
                    </ul>
                </div>

            </section>

            <!-- ####### WORKING WITH US ######  -->

            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>Understanding the Dynamics of Business Intelligence Systems</h1>
                <p>Business Intelligence (BI) systems are essential for organizations seeking to transform raw data into actionable insights. This overview explores the core functionalities and advantages of BI systems:</p>
            </div>
            <section class="work-wrapper">
                <section class="work-wrapper-child">
                    <section class="work-child">
                        <h2>
                            <span>1.</span>Data Integration:
                        </h2>
                        <p>BI systems excel in integrating data from various sources, including databases, spreadsheets, and cloud services. This consolidation provides a comprehensive view of business operations, enabling better decision-making.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>2.</span>Data Warehousing:
                        </h2>
                        <p>BI solutions often include a data warehousing component, where historical data is stored and organized. This centralized repository allows users to analyze trends over time, supporting strategic planning and forecasting.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>3.</span>Advanced Analytics:
                        </h2>
                        <p>With advanced analytics capabilities, BI systems enable organizations to perform complex data analyses, such as predictive modeling and statistical analysis. These insights help in identifying trends and potential opportunities for growth.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>4.</span>Interactive Dashboards:
                        </h2>
                        <p>BI systems provide interactive dashboards that visualize data through charts, graphs, and other visual aids. These dashboards allow users to monitor key performance indicators (KPIs) in real-time, making it easier to track progress and identify issues quickly.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>5.</span>Self-Service Reporting:
                        </h2>
                        <p>Many BI solutions empower users with self-service reporting tools. This feature enables non-technical users to generate their own reports and insights without relying on IT, promoting a data-driven culture throughout the organization.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>6.</span>Collaboration Tools:
                        </h2>
                        <p>BI systems often include collaboration features that allow teams to share insights and reports easily. This promotes communication across departments, ensuring that everyone is aligned with the organization’s goals and data-driven strategies.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>7.</span>Real-Time Data Access:
                        </h2>
                        <p>Access to real-time data is a hallmark of BI systems. By providing immediate insights into current operations, organizations can respond quickly to market changes and make informed decisions based on the latest information.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>8.</span>Mobile BI:
                        </h2>
                        <p>Modern BI solutions often support mobile access, allowing users to access data and reports from smartphones and tablets. This flexibility enables decision-makers to stay informed and make timely decisions while on the go.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>9.</span>Data Governance:
                        </h2>
                        <p>Effective BI systems implement data governance practices that ensure data quality and integrity. By establishing clear data management policies, organizations can trust the accuracy of their insights and maintain compliance with regulations.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>10.</span>Enhanced Strategic Planning:
                        </h2>
                        <p>Ultimately, BI systems support enhanced strategic planning by providing the insights needed to formulate data-driven strategies. Organizations can leverage historical and predictive data to align their objectives with market realities, driving better business outcomes.</p>
                    </section>
                </section>
            </section>













            <!-- ######### Process ##########  -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">
                    Industries Benefiting from BI</h1>

            </div>

            <div class="swiper mySwiper">



                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/healthcare-service.png" alt="">
                        </div>
                        <h2>Manufacturing</h2>
                        <!-- <p>Guiding providers to enhance efficiency with strategic IT solutions.</p> -->
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/healthcare-service.png" alt="">
                        </div>
                        <h2>Retail</h2>

                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/healthcare-service.png" alt="">
                        </div>
                        <h2>Healthcare</h2>

                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/healthcare-service.png" alt="">
                        </div>
                        <h2>Construction</h2>

                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/healthcare-service.png" alt="">
                        </div>
                        <h2>Finance</h2>

                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/healthcare-service.png" alt="">
                        </div>
                        <h2>Logistics</h2>

                    </div>
                </div>






                <div class="swiper-pagination"></div>
            </div>




            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Key BI Modules and Their Functions</h1>
            </div>
            <div class="service_choose_us">
                <div class="services_container">
                    <!-- Service 1 - Data Warehousing -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Consolidates data from various internal and external sources into a centralized repository, making it easier for businesses to access, analyze, and derive actionable insights from their data.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Data Warehousing</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Data Visualization -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Transforms complex datasets into visually appealing and easy-to-understand charts, graphs, and dashboards, helping businesses quickly interpret data and make informed decisions.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Data Visualization</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Reporting Tools -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Generates in-depth, customizable reports on business performance, financial metrics, and other key indicators, providing stakeholders with clear and actionable insights for decision-making.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Reporting Tools</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Predictive Analytics -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Uses advanced statistical models and machine learning algorithms to analyze historical data and forecast future trends, empowering businesses to make proactive, data-driven decisions.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Predictive Analytics</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Dashboards -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Provides real-time monitoring of key performance indicators (KPIs), displaying crucial business metrics and insights in a dynamic, interactive format for easy tracking and decision-making.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Dashboards</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>
                </div>
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





            <!-- ##### faq #######  -->

            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>Business Intelligence (BI) FAQs</h1>
            </div>

            <section class="faq-wrapper">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What is Business Intelligence (BI)?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Business Intelligence (BI) refers to the technologies, strategies, and practices used to collect, analyze, and present business data. BI systems help businesses make data-driven decisions by providing insights into key metrics and trends.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How does BI help in decision-making?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        BI enables decision-makers to access real-time, accurate, and actionable data, allowing them to identify trends, patterns, and opportunities that can guide strategic business decisions and improve overall performance.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What tools are used in BI?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        BI tools include data visualization platforms, dashboards, reporting tools, and data warehousing solutions. Some popular BI tools include Tableau, Microsoft Power BI, and Google Data Studio, which help analyze and visualize business data.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Is BI suitable for small businesses?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, BI is suitable for businesses of all sizes. Many BI tools are scalable and offer affordable options for small businesses, helping them gain insights, improve processes, and make informed decisions to drive growth.
                    </p>
                </section>
            </section>



            <!-- ##### Book #######  -->

            <section class="section-book">
                <section class="book-image">
                    <img src="images/booking-industry.jpg" alt="">
                </section>
                <section class="book-data">



                    <h1 data-aos="zoom-in" data-aos-duration="2500">Healthcare Software Development Services</h1>
                    <p data-aos="zoom-in" data-aos-duration="2500">Comprehensive Solutions Designed to Support Healthcare Professionals</p>
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