<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'cxm' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'cxm' AND blog_status = 'published'");
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
                    <img src="images/cxm-hero.jpg" alt="">
                </div>
                <div class="hero-data">
                    <h1 data-aos="zoom-in" data-aos-duration="2500">Enhance Customer Experience with CX Management</h1>
                    <h2 data-aos="zoom-in" data-aos-duration="2500">Deliver personalized experiences and drive loyalty.</h2>
                    <a href="#" class="reopenPopup">Get Professional Advice</a>
                </div>
            </div>

            <!-- ####### INTRODUCTION  ####### -->

            <section class="intro">
                <h1>Transform Your Customer Engagement with Our Customer Experience Management Solutions</h1>
                <p>Our Customer Experience Management (CXM) solutions are designed to enhance every interaction your customers have with your brand. By integrating data analytics and customer feedback, we empower businesses to create personalized experiences that resonate with their audience. Our platform helps streamline customer journeys, improve satisfaction, and foster loyalty, ensuring that each touchpoint is meaningful and impactful. With our CXM tools, you can gain valuable insights, drive customer-centric strategies, and build lasting relationships that propel your business forward.</p>
            </section>




            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Core Features of CXM Solutions</h1>
            </div>
            <div class="service_choose_us">
                <div class="services_container">
                    <!-- Service 1 - Customer Journey Mapping -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Tracks every customer interaction across multiple touchpoints, providing a holistic view of their experience with your brand, from awareness to purchase.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Customer Journey Mapping</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Feedback Collection -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Gathers valuable customer feedback through surveys, reviews, and direct interactions, enabling businesses to continually improve services and customer support.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Feedback Collection</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Omnichannel Engagement -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Provides a seamless and consistent customer experience across multiple channels, ensuring that customers receive the same quality of service no matter where they interact.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Omnichannel Engagement</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Personalization -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Delivers personalized experiences for customers by leveraging their behavior, preferences, and interactions to create targeted messages, offers, and services.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Personalization</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Real-Time Analytics -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Offers real-time insights into customer interactions and behaviors, allowing businesses to make immediate data-driven decisions and optimize customer experiences in the moment.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Real-Time Analytics</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>
                </div>
            </div>






            <!-- ######### Benefits ##########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Key Benefits of Implementing CXM Systems</h1>

            </div>


            <section class="benefits-wrapper">


                <div class="benefits-sectors">
                    <ul>
                        <li>Personalized customer journeys to boost engagement and loyalty.</li>
                        <li>Real-time insights into customer behavior and preferences.</li>
                        <li>Seamless integration with CRM, marketing, and sales tools.</li>
                        <li>Enhanced customer service through proactive support channels.</li>
                        <li>Increased brand consistency across all customer touchpoints.</li>
                    </ul>
                    <ul>
                        <li>Automated workflows for efficient customer communication.</li>
                        <li>Data-driven strategies to refine marketing and sales efforts.</li>
                        <li>Improved customer retention through targeted experiences.</li>
                        <li>Streamlined multi-channel management to reach customers anywhere.</li>
                        <li>Scalability to support growing customer engagement needs.</li>
                    </ul>
                </div>

            </section>

            <!-- ####### WORKING WITH US ######  -->

            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>Understanding the Principles of Customer Experience Management</h1>
                <p>Customer Experience Management (CXM) is a strategic approach focused on optimizing interactions between a business and its customers. This overview highlights the key elements and benefits of CXM:</p>
            </div>
            <section class="work-wrapper">
                <section class="work-wrapper-child">
                    <section class="work-child">
                        <h2>
                            <span>1.</span>Customer Journey Mapping:
                        </h2>
                        <p>Customer journey mapping involves visualizing the steps customers take when interacting with a brand. This process helps identify touchpoints, pain points, and opportunities for improvement, ensuring a seamless customer experience.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>2.</span>Personalization Strategies:
                        </h2>
                        <p>CXM emphasizes the importance of personalization in creating memorable experiences. By leveraging data analytics, businesses can tailor their offerings, communications, and recommendations to meet individual customer preferences.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>3.</span>Multi-Channel Engagement:
                        </h2>
                        <p>Effective CXM requires engaging customers across multiple channels, including social media, email, and in-person interactions. Consistent messaging and branding across these platforms enhance customer trust and loyalty.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>4.</span>Customer Feedback Mechanisms:
                        </h2>
                        <p>Implementing feedback mechanisms, such as surveys and reviews, allows businesses to gather insights directly from customers. This feedback is invaluable for understanding customer satisfaction and identifying areas for improvement.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>5.</span>Data-Driven Decision Making:
                        </h2>
                        <p>CXM relies on data analytics to inform decision-making. By analyzing customer data, businesses can identify trends, preferences, and behaviors that guide strategy and enhance the overall customer experience.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>6.</span>Employee Training and Empowerment:
                        </h2>
                        <p>Employees play a crucial role in delivering exceptional customer experiences. CXM involves training and empowering staff to engage with customers effectively, ensuring they have the tools and knowledge to provide excellent service.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>7.</span>Consistency Across Touchpoints:
                        </h2>
                        <p>Consistency in messaging and service delivery across all customer touchpoints is essential for building trust. CXM strategies focus on ensuring that customers receive the same quality of experience regardless of how they interact with the brand.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>8.</span>Omnichannel Strategy:
                        </h2>
                        <p>An omnichannel approach integrates various customer interaction channels to provide a seamless experience. This strategy ensures that customers can transition smoothly between channels, enhancing their overall journey with the brand.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>9.</span>Measuring Customer Experience:
                        </h2>
                        <p>Regularly measuring customer experience through metrics such as Net Promoter Score (NPS) and Customer Satisfaction Score (CSAT) helps organizations gauge the effectiveness of their CXM strategies and make data-driven adjustments as needed.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>10.</span>Long-Term Relationship Building:
                        </h2>
                        <p>CXM is not just about immediate interactions; it’s about building long-term relationships with customers. By prioritizing customer satisfaction and loyalty, businesses can foster repeat business and enhance lifetime customer value.</p>
                    </section>
                </section>
            </section>













            <!-- ######### Process ##########  -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">
                    Industries Benefiting from CXM</h1>

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
                <h1 data-aos="zoom-in" data-aos-duration="1500">Key CXM Modules and Their Functions</h1>
            </div>
            <div class="service_choose_us">
                <div class="services_container">
                    <!-- Service 1 - Customer Feedback -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Collects and analyzes customer feedback across various platforms to identify areas for improvement, enabling businesses to enhance their products, services, and overall customer satisfaction.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Customer Feedback</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Personalization -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Customizes customer experiences by leveraging data and preferences to create tailored interactions, enhancing engagement and satisfaction, while fostering customer loyalty and long-term relationships.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Personalization</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Customer Journey Mapping -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Visualizes the complete customer journey from initial contact to post-purchase, identifying key touchpoints and pain points to improve engagement, optimize experiences, and drive conversions.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Customer Journey Mapping</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Multi-Channel Engagement -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Facilitates customer interactions across multiple channels, such as email, social media, and live chat, ensuring consistent messaging, engagement, and a seamless experience across all touchpoints.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Multi-Channel Engagement</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Performance Metrics -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Tracks key customer experience metrics such as satisfaction, loyalty, and Net Promoter Scores (NPS), providing actionable insights that drive continuous improvement and higher customer retention.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Performance Metrics</h1>
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
                <h1>Customer Experience Management (CXM) FAQs</h1>
            </div>

            <section class="faq-wrapper">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What is Customer Experience Management (CXM)?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Customer Experience Management (CXM) is the practice of managing and improving the interactions between a company and its customers. It aims to enhance the overall customer experience, ensuring satisfaction and fostering long-term relationships.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Why is CXM important for businesses?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        CXM is crucial because it helps businesses understand customer needs, expectations, and pain points. By improving customer experiences, companies can drive customer loyalty, enhance brand reputation, and increase revenue through repeat business.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What are the key components of CXM?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        The key components of CXM include customer feedback and insights, personalized experiences, customer journey mapping, omnichannel support, and continuous improvement strategies that ensure consistency and satisfaction across all touchpoints.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How can CXM enhance customer loyalty?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        By personalizing interactions, addressing customer concerns promptly, and continuously improving the customer journey, CXM helps build trust and loyalty. Satisfied customers are more likely to return, recommend your business, and become brand advocates.
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