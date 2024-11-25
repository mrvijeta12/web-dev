<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'crm' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'crm' AND blog_status = 'published'");
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
                    <img src="images/crm-hero.jpg" alt="">
                </div>
                <div class="hero-data">
                    <h1 data-aos="zoom-in" data-aos-duration="2500">Elevate Your Customer Relationships with CRM Solutions</h1>
                    <h2 data-aos="zoom-in" data-aos-duration="2500">Enhance customer engagement, streamline communication, and boost satisfaction with our advanced CRM software.</h2>
                    <a href="#" class="reopenPopup">Get Professional Advice</a>
                </div>
            </div>


            <!-- ####### INTRODUCTION  ####### -->

            <section class="intro">
                <h1>Comprehensive CRM Solutions for Enhanced Customer Engagement and Growth</h1>
                <p>Our powerful CRM solutions streamline customer interactions and relationships, enabling businesses to foster loyalty and drive growth. Designed to centralize customer data, it empowers your team with real-time insights, personalized communication, and efficient sales tracking. With features like automation, analytics, and seamless integration with existing tools, our CRM helps you transform every customer interaction into a valuable opportunity for success.</p>
            </section>




            <!-- #######  core features ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Core Features of CRM Solutions</h1>
            </div>

            <div class="service_choose_us">
                <div class="services_container">
                    <!-- Service 1 - Contact Management -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Keep all customer and lead information in one centralized database that’s easily accessible from any location, ensuring organized data management and enhanced collaboration for your team.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Contact Management</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Sales Tracking -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Gain a real-time view of sales activities, pipelines, and performance metrics. Track progress accurately, helping teams focus on priority leads and refine sales strategies effectively.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Sales Tracking</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Customer Support -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Provide better customer service with integrated tools for ticketing, real-time support, and tracking resolutions, enabling a seamless and efficient customer support experience for users.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Customer Support</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Marketing Automation -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Automate marketing campaigns to reach the right audience at the right time, boosting engagement and conversion rates while minimizing manual effort for your marketing team.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Marketing Automation</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Reporting & Analytics -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Access custom reports and valuable insights into sales and customer interactions, allowing you to refine strategies based on data-driven analytics and improve decision-making.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Reporting & Analytics</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>
                </div>
            </div>







            <!-- ######### Benefits ##########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Key Benefits of Implementing CRM Systems</h1>

            </div>


            <section class="benefits-wrapper">


                <div class="benefits-sectors">
                    <ul>
                        <li>Improved customer relationship management and engagement.</li>
                        <li>Centralized customer information for personalized communication.</li>
                        <li>Enhanced sales forecasting and tracking.</li>
                        <li>Automated marketing campaigns for targeted outreach.</li>
                        <li>Streamlined lead management and follow-up processes.</li>
                    </ul>
                    <ul>
                        <li>Real-time insights into customer behavior and preferences.</li>
                        <li>Improved collaboration between sales and marketing teams.</li>
                        <li>Increased customer satisfaction through timely responses.</li>
                        <li>Integration with other business applications for seamless workflows.</li>
                        <li>Scalability to grow with your business needs.</li>
                    </ul>
                </div>

            </section>

            <!-- ####### WORKING WITH US ######  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>Maximizing Business Potential with Customer Relationship Management (CRM) Systems</h1>
                <p>Customer Relationship Management (CRM) systems play a critical role in modern business strategies, helping organizations cultivate strong relationships with their customers. This article explores the essential features and advantages of implementing a CRM system:</p>
            </div>
            <section class="work-wrapper">
                <section class="work-wrapper-child">
                    <section class="work-child">
                        <h2>
                            <span>1.</span>Holistic Customer Insights:
                        </h2>
                        <p>CRM systems gather and analyze data from various touchpoints, providing a holistic view of customer interactions. This insight enables businesses to understand customer preferences and behavior more deeply.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>2.</span>Personalized Marketing Campaigns:
                        </h2>
                        <p>With detailed customer profiles, CRM systems facilitate targeted marketing efforts. Businesses can create personalized campaigns based on specific interests and past interactions, leading to higher engagement rates.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>3.</span>Streamlined Sales Processes:
                        </h2>
                        <p>CRM platforms automate key sales processes, from lead scoring to follow-ups. This streamlining reduces the administrative burden on sales teams, allowing them to focus on building relationships and closing deals.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>4.</span>Comprehensive Customer Support:
                        </h2>
                        <p>CRM systems enhance customer support by providing support teams with all relevant customer information. This access allows representatives to resolve issues quickly and effectively, improving overall customer satisfaction.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>5.</span>Data-Driven Decision Making:
                        </h2>
                        <p>Advanced analytics tools within CRM systems empower businesses to make informed decisions based on real-time data. By analyzing trends and performance metrics, organizations can adjust their strategies for better outcomes.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>6.</span>Improved Customer Retention:
                        </h2>
                        <p>By nurturing customer relationships through consistent engagement and personalized communication, CRM systems help businesses improve customer retention rates and foster long-term loyalty.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>7.</span>Collaboration Across Teams:
                        </h2>
                        <p>CRM systems enhance collaboration by providing a shared platform for sales, marketing, and customer service teams. This collaboration ensures everyone is aligned and working towards common customer-focused goals.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>8.</span>Automation of Customer Outreach:
                        </h2>
                        <p>Many CRM systems feature automation tools for customer outreach, such as email marketing campaigns and follow-up reminders. This automation saves time and ensures consistent communication with customers.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>9.</span>Accessibility and Mobility:
                        </h2>
                        <p>Modern CRM solutions often offer cloud-based access, allowing teams to retrieve customer information and manage relationships from anywhere. This mobility enhances productivity, especially for remote teams.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>10.</span>Long-Term Strategic Planning:
                        </h2>
                        <p>By analyzing customer data and market trends, CRM systems aid in long-term strategic planning. Organizations can identify growth opportunities and adapt their offerings to meet evolving customer needs.</p>
                    </section>
                </section>
            </section>












            <!-- ######### Process ##########  -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">
                    Industries Benefiting from CRM</h1>

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
                <h1 data-aos="zoom-in" data-aos-duration="1500">Key CRM Modules and Their Functions</h1>
            </div>


            <div class="service_choose_us">
                <div class="services_container">
                    <!-- Service 1 - Lead Management -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Effectively tracks and manages sales leads from initial contact to closing, improving lead nurturing and ensuring timely follow-ups to drive higher conversion rates.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Lead Management</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Contact Management -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Stores, organizes, and updates customer contact information, ensuring quick access to key details to enhance communication and relationship-building throughout the sales process.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Contact Management</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Sales Forecasting -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Utilizes historical sales data and advanced analytics to predict future sales trends, helping businesses make informed decisions and optimize their sales strategies.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Sales Forecasting</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Customer Support -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Streamlines customer service by managing support tickets and tracking customer inquiries, ensuring timely and effective responses to resolve issues and maintain satisfaction.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Customer Support</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Reporting and Analytics -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Provides comprehensive data insights on sales performance, customer interactions, and marketing efforts, helping businesses make data-driven decisions and optimize strategies for growth.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Reporting and Analytics</h1>
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

            <!-- ##### faq ####  -->


            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>CRM Website Development FAQs</h1>
            </div>

            <section class="faq-wrapper">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What types of CRM systems do you build?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We build custom CRM systems tailored for businesses across various industries, including retail, real estate, healthcare, and finance. Our systems are designed to improve customer relationships, streamline communication, and enhance data management.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can you integrate CRM with other business tools?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we offer seamless integration with various business tools such as marketing automation platforms, email marketing services, and customer support software. This ensures a unified approach to customer relationship management and improved operational efficiency.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do you ensure data security in CRM systems?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We prioritize data security in CRM systems by implementing strong encryption protocols, access controls, and regular security audits. Our solutions are designed to protect sensitive customer data and ensure compliance with industry standards such as GDPR and HIPAA.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can you provide CRM mobile app development?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we offer CRM mobile app development to provide your team with on-the-go access to customer data and real-time updates. Our apps are designed to ensure smooth usability, responsiveness, and security on both iOS and Android platforms.
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