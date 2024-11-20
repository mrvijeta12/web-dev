<?php

include_once 'db.php';


// Fetch all blog posts with slug, summary, and feature image
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs WHERE category = 'e-commerce' ORDER BY id DESC";
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
    $contents[] = ["id" => 0, "slug" => "No content found.", "summary" => "", "social_sharing_image" => ""];
}

$conn->close();
?>
<!DOCTYPE php>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="assests/css/web-services.css">
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
                    <img src="./images/e-commerce-hero.jpg" alt="">
                </div>
                <div class="hero-data">
                    <h1 data-aos="zoom-in" data-aos-duration="2500">Boost Your Online Sales with E-commerce Solutions</h1>
                    <h2 data-aos="zoom-in" data-aos-duration="2500">Enhance shopping experiences and drive conversions.</h2>
                    <a href="#" class="reopenPopup">Get Professional Advice</a>
                </div>
            </div>

            <!-- ####### INTRODUCTION  ####### -->

            <section class="intro">
                <h1>Comprehensive E-commerce Solutions for Seamless Online Shopping</h1>
                <p>Our robust E-commerce platform empowers businesses to create and manage online stores with ease. Designed to enhance customer experiences, it integrates user-friendly interfaces, secure payment gateways, and efficient inventory management. With advanced analytics and marketing tools, you can drive sales, optimize product offerings, and personalize customer interactions. Transform your business with our all-in-one E-commerce solution, enabling you to thrive in the competitive online marketplace.</p>
            </section>




            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Core Features of E-commerce Solutions</h1>
            </div>
            <div class="service_choose_us">
                <div class="services_container">
                    <!-- Service 1 - Product Management -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Organizes and displays product catalog with detailed descriptions, images, and pricing information, ensuring an informative and user-friendly browsing experience for all customers.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Product Management</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Shopping Cart -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Provides a secure, user-friendly shopping cart experience, ensuring smooth checkout and minimizing friction for customers during the purchase process.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Shopping Cart</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Payment Gateway Integration -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Integrates multiple payment options, supporting a wide range of currencies and payment methods for easy, secure, and globally accessible transactions.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Payment Gateway Integration</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Order Tracking -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Provides customers with real-time order tracking, allowing them to monitor delivery progress, boosting transparency, and enhancing overall satisfaction.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Order Tracking</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Customer Reviews -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Encourages customers to leave reviews and ratings on products, improving credibility, building trust, and helping others make informed purchasing decisions.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Customer Reviews</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>
                </div>
            </div>







            <!-- ######### Benefits ##########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Key Benefits of Implementing E-COMMERCE Systems</h1>

            </div>


            <section class="benefits-wrapper">


                <div class="benefits-sectors">
                    <ul>
                        <li>Enhanced customer shopping experience with easy navigation.</li>
                        <li>Real-time inventory management to reduce stockouts.</li>
                        <li>Streamlined payment processing and order fulfillment.</li>
                        <li>Improved marketing strategies with customer insights.</li>
                        <li>24/7 availability to cater to global customers.</li>
                    </ul>
                    <ul>
                        <li>Personalized shopping experiences through data analytics.</li>
                        <li>Scalable solutions to handle increased traffic and sales.</li>
                        <li>Integrated customer support for better service.</li>
                        <li>Customizable storefronts to enhance branding.</li>
                        <li>Automated marketing campaigns for targeted outreach.</li>
                    </ul>
                </div>

            </section>

            <!-- ####### WORKING WITH US ######  -->

            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>Unlocking Business Potential with E-commerce Systems</h1>
                <p>E-commerce systems provide businesses with the tools to conduct online transactions and manage digital storefronts effectively. This article explores the essential features and advantages of e-commerce platforms:</p>
            </div>
            <section class="work-wrapper">
                <section class="work-wrapper-child">
                    <section class="work-child">
                        <h2>
                            <span>1.</span>User-Friendly Interface:
                        </h2>
                        <p>E-commerce systems are designed with user-friendly interfaces that enhance the shopping experience. Intuitive navigation and search functionalities make it easy for customers to find products and make purchases.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>2.</span>Secure Payment Processing:
                        </h2>
                        <p>Robust e-commerce platforms offer secure payment gateways that protect customer information during transactions. This security builds trust and encourages customers to shop confidently online.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>3.</span>Inventory Management:
                        </h2>
                        <p>Integrated inventory management tools help businesses track stock levels in real-time. This functionality ensures that products are available when customers want to purchase, minimizing the risk of stockouts.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>4.</span>Customizable Product Listings:
                        </h2>
                        <p>E-commerce systems allow businesses to create detailed product listings with images, descriptions, and specifications. This customization helps attract customers and provides them with the information they need to make informed decisions.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>5.</span>Responsive Design:
                        </h2>
                        <p>Modern e-commerce platforms are built with responsive design, ensuring that websites function seamlessly across all devices. This adaptability enhances user experience for mobile shoppers and desktop users alike.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>6.</span>Marketing and SEO Tools:
                        </h2>
                        <p>E-commerce systems often include built-in marketing and SEO tools that help businesses optimize their online presence. These features enable companies to drive traffic to their stores through targeted campaigns and improved search visibility.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>7.</span>Customer Reviews and Feedback:
                        </h2>
                        <p>Integrating customer review features into e-commerce platforms allows shoppers to read feedback from other buyers. Positive reviews can significantly influence purchasing decisions and build brand credibility.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>8.</span>Analytics and Reporting:
                        </h2>
                        <p>Comprehensive analytics tools provide insights into sales performance, customer behavior, and inventory trends. Businesses can leverage this data to refine their strategies and make data-driven decisions.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>9.</span>Customer Relationship Management:
                        </h2>
                        <p>E-commerce platforms often integrate CRM features that help businesses manage customer relationships effectively. By tracking customer interactions, companies can tailor their marketing and enhance customer satisfaction.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>10.</span>Global Reach:
                        </h2>
                        <p>With e-commerce systems, businesses can reach customers worldwide, breaking geographical barriers. This global reach opens new markets and opportunities for growth, expanding the customer base significantly.</p>
                    </section>
                </section>
            </section>














            <!-- ######### Process ##########  -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">
                    Industries Benefiting from E-COMMERCE</h1>

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
                <h1 data-aos="zoom-in" data-aos-duration="1500">Key ERP Modules and Their Functions</h1>

            </div>


            <div class="service_choose_us">
                <div class="services_container">
                    <!-- Service 1 - Finance -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Manages accounting, financial reporting, budgeting, and financial analysis to ensure efficient resource allocation, timely decision-making, and adherence to industry standards and regulations.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Finance</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Human Resources (HR) -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Employee management, payroll processing, recruitment, and employee benefits management, ensuring smooth operations and compliance with labor laws and company policies.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Human Resources (HR)</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Customer Relationship Management (CRM) -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Handles customer interactions, tracks sales processes, and ensures personalized customer experiences, leading to higher satisfaction and retention rates through effective communication and service delivery.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Customer Relationship Management (CRM)</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Inventory Management -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Tracks inventory levels, manages orders, deliveries, and stock replenishment, ensuring timely availability of products and efficient supply chain management for smooth business operations.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Inventory Management</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Supply Chain Management -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Optimizes logistics, warehousing, and distribution strategies to improve efficiency, reduce costs, and ensure timely delivery of goods, enhancing overall supply chain performance and customer satisfaction.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Supply Chain Management</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>
                </div>
            </div>

            <!-- ##### blog ###  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>Exploring Industry Trends, Ideas, and Real-World Solutions</h1>

            </div>

            <div class="blog-wrapper">
                <?php foreach ($contents as $row): ?>
                    <?php
                    $slug = htmlspecialchars($row['slug']);
                    $summary = htmlspecialchars($row['summary']);
                    $id = $row['id'];
                    $featureImage = !empty($row['social_sharing_image']) ? 'admin/' . htmlspecialchars($row['social_sharing_image']) : 'default-image.png';
                    ?>


                    <div class='content-container' data-aos="zoom-in" data-aos-duration="1500">
                        <!-- Image Container -->
                        <div class='image-container'>
                            <img src='<?= $featureImage ?>' alt='Feature Image'>
                        </div>

                        <!-- Text Content -->
                        <div class='text-content'>
                            <h2><?= $slug ?></h2> <!-- Displaying the slug as meta_title -->
                            <p><?= $summary ?></p>
                            <a href="insights/<?= $slug ?>" class="read-more">Read More <img src="images/right-arrow.svg" alt="" id="arrow"></a>
                        </div>

                    </div>

                <?php endforeach; ?>
            </div>



            <!-- ##### faq #######  -->

            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>E-Commerce Website Development FAQs</h1>
            </div>

            <section class="faq-wrapper">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What features are included in an e-commerce website?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        E-commerce websites typically include product catalogs, secure payment gateways, shopping carts, order management, customer accounts, and mobile compatibility. We ensure your website is user-friendly and optimized for conversions.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can I integrate payment gateways with my e-commerce site?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we integrate popular payment gateways like PayPal, Stripe, and credit card processing systems to facilitate secure online transactions. This ensures a smooth and trusted payment experience for your customers.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do you ensure the security of my e-commerce website?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We implement SSL certificates, secure payment systems, and robust encryption techniques to safeguard your customers’ sensitive information. Regular security audits are conducted to maintain a secure environment for all transactions.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can you integrate inventory management with my e-commerce website?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Absolutely! We can integrate inventory management tools to automatically update stock levels, track sales, and manage product availability. This helps to prevent overselling and ensures smooth operations for your online store.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How can you improve the user experience on my e-commerce website?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We focus on intuitive design, fast loading speeds, mobile responsiveness, easy navigation, and seamless checkout processes. Our goal is to create an enjoyable shopping experience that drives customer satisfaction and conversions.
                    </p>
                </section>
            </section>



            <!-- ##### Book #######  -->

            <section class="section-book">
                <section class="book-image">
                    <img src="./images/booking-industry.jpg" alt="">
                </section>
                <section class="book-data">



                    <h1 data-aos="zoom-in" data-aos-duration="2500">Healthcare Software Development Services</h1>
                    <p data-aos="zoom-in" data-aos-duration="2500">Comprehensive Solutions Designed to Support Healthcare Professionals</p>
                    <a href="https://calendly.com/salesfocesclouds/30min" data-aos="zoom-in" data-aos-duration="2500">Connect With Us</a>
                </section>


            </section>

















        </div>

        <?php include('footer.php'); ?>
    </div>



    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="./swiper.js"></script>

</body>

</html>