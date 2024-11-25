<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'booking-and-reservation' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'booking-and-reservation' AND blog_status = 'published'");
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
                    <img src="images/booking-and-reservation-hero.jpg" alt="">
                </div>
                <div class="hero-data">
                    <h1 data-aos="zoom-in" data-aos-duration="2500">Streamline Your Booking and Reservations</h1>
                    <h2 data-aos="zoom-in" data-aos-duration="2500">Simplify bookings and enhance customer convenience.</h2>
                    <a href="#" class="reopenPopup">Get Professional Advice</a>
                </div>
            </div>


            <!-- ####### INTRODUCTION  ####### -->

            <section class="intro">
                <h1>Streamline Your Operations with Our Booking and Reservation System</h1>
                <p>Our Booking and Reservation System is designed to simplify the process of managing appointments, reservations, and bookings across various industries. With a user-friendly interface and robust features, our solution enables businesses to effortlessly handle customer inquiries, schedule services, and manage availability in real-time. Enhance your operational efficiency, reduce no-shows, and improve customer satisfaction by providing a seamless booking experience. Empower your business with the tools to optimize reservations, maximize occupancy, and drive revenue growth while ensuring your customers enjoy a hassle-free experience.</p>
            </section>




            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Core Features of Booking & Reservation Solutions</h1>
            </div>
            <div class="service_choose_us">
                <div class="services_container">
                    <!-- Service 1 - Real-Time Availability -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Displays real-time availability to prevent double bookings and errors, ensuring smooth and efficient scheduling of services or appointments.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Real-Time Availability</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Automated Confirmation -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Automates booking confirmations by sending instant notifications to both customers and staff, ensuring everyone is informed and up-to-date.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Automated Confirmation</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Payment Integration -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Supports various payment methods, including credit cards and digital wallets, to offer customers a seamless and secure transaction process.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Payment Integration</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Cancellation Management -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Handles cancellations and modifications efficiently, allowing resources to be freed up promptly and preventing overbooking or scheduling conflicts.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Cancellation Management</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Calendar Sync -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Syncs with popular calendar systems to ensure all appointments and schedules are organized, with automated reminders sent to customers and staff.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Calendar Sync</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>
                </div>
            </div>








            <!-- ######### Benefits ##########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Key Benefits of Implementing Booking and Reservation Systems</h1>

            </div>


            <section class="benefits-wrapper">


                <div class="benefits-sectors">
                    <ul>
                        <li>Real-time booking and availability management for seamless scheduling.</li>
                        <li>Automated confirmations and reminders to reduce no-shows.</li>
                        <li>Efficient resource management, optimizing time and space.</li>
                        <li>Enhanced customer experience with self-service options.</li>
                        <li>Integration with payment gateways for secure, immediate transactions.</li>
                    </ul>
                    <ul>
                        <li>Centralized booking data for better analytics and insights.</li>
                        <li>Customizable booking workflows to fit unique business needs.</li>
                        <li>Reduced administrative tasks with automated booking processes.</li>
                        <li>Improved customer communication through automated notifications.</li>
                        <li>Scalability to manage increased demand and seasonal bookings.</li>
                    </ul>
                </div>

            </section>

            <!-- ####### WORKING WITH US ######  -->

            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>Exploring the Benefits of Booking and Reservation Systems</h1>
                <p>Booking and reservation systems are vital tools that simplify the management of appointments, rentals, and event registrations across various sectors. This overview delves into their essential features and advantages:</p>
            </div>
            <section class="work-wrapper">
                <section class="work-wrapper-child">
                    <section class="work-child">
                        <h2>
                            <span>1.</span>Efficient Resource Management:
                        </h2>
                        <p>These systems help businesses manage resources more effectively by tracking availability and preventing overbooking. This efficiency ensures optimal use of facilities, rooms, or services offered.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>2.</span>Intuitive Booking Experience:
                        </h2>
                        <p>An intuitive interface allows customers to book services effortlessly. Clear navigation and streamlined processes reduce confusion, leading to higher customer satisfaction and increased bookings.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>3.</span>Instant Access to Services:
                        </h2>
                        <p>With online booking capabilities, customers can access services anytime, anywhere. This convenience caters to modern consumers' needs and encourages more spontaneous bookings.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>4.</span>Cancellation and Rescheduling Flexibility:
                        </h2>
                        <p>Many systems offer easy cancellation and rescheduling options, allowing customers to adjust their plans without hassle. This flexibility improves customer loyalty and reduces frustration.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>5.</span>Streamlined Communication:
                        </h2>
                        <p>Automated notifications and reminders keep customers informed about their bookings, reducing the likelihood of no-shows. This proactive approach fosters a positive relationship with customers.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>6.</span>Customizable Booking Forms:
                        </h2>
                        <p>Booking systems often allow for customizable forms tailored to specific services. This personalization helps capture necessary information efficiently, enhancing the service delivery process.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>7.</span>Advanced Security Features:
                        </h2>
                        <p>With sensitive customer data involved, these systems prioritize security. Features like encryption and secure payment gateways ensure customer information is protected during transactions.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>8.</span>Multi-Language and Currency Support:
                        </h2>
                        <p>To cater to a global audience, many booking systems offer multi-language and multi-currency options. This inclusivity expands the customer base and enhances user experience across different regions.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>9.</span>Performance Tracking and Reporting:
                        </h2>
                        <p>Integrated reporting tools allow businesses to analyze booking trends and customer behavior. This data-driven approach enables informed decision-making and strategy adjustments for better performance.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>10.</span>Building Customer Loyalty:
                        </h2>
                        <p>By providing a seamless booking experience and excellent service, businesses can cultivate customer loyalty. Repeat customers are crucial for long-term success and can lead to positive word-of-mouth referrals.</p>
                    </section>
                </section>
            </section>













            <!-- ######### Process ##########  -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">
                    Industries Benefiting from Booking And Reservation</h1>

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
                <h1 data-aos="zoom-in" data-aos-duration="1500">Key Modules of Booking and Reservation Systems</h1>
            </div>
            <div class="service_choose_us">
                <div class="services_container">
                    <!-- Service 1 - Booking Management -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Manages reservations by tracking real-time availability and customer bookings, ensuring efficient scheduling and seamless coordination of bookings for businesses and their customers.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Booking Management</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Payment Processing -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Handles secure online payments, facilitating seamless transactions for bookings. Supports multiple payment methods and ensures a smooth, secure checkout process for customers.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Payment Processing</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Customer Notifications -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Automates notifications for booking confirmations, reminders, and updates, ensuring customers are informed at every stage of their booking process for a better experience.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Customer Notifications</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Cancellation Management -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Facilitates easy modifications and cancellations for customer bookings, ensuring flexible policies and offering a seamless experience for customers needing to change or cancel their plans.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Cancellation Management</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Reporting and Analytics -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Generates detailed reports on booking trends, customer preferences, and business performance, providing valuable insights for data-driven decisions and improved operational efficiency.</p>
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






            <!-- ##### faq #######  -->

            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>Booking and Reservations FAQs</h1>
            </div>

            <section class="faq-wrapper">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What types of booking and reservation systems do you offer?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We offer customizable booking systems for hotels, restaurants, airlines, event venues, and car rentals. Our systems handle real-time availability, secure payment processing, and customer notifications to streamline the booking process.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can I manage bookings through a mobile app?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we provide mobile-friendly booking solutions that allow users to make, modify, and cancel bookings directly from their smartphones. Our mobile apps are designed for convenience and are fully integrated with your reservation system.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do you ensure the security of customer information?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Our booking systems utilize secure encryption protocols, SSL certificates, and payment gateways to protect sensitive customer data. We comply with data protection regulations to ensure privacy and security throughout the booking process.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can customers modify or cancel their bookings?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, our system allows customers to easily modify or cancel their bookings based on your business policies. You can set cancellation fees, time frames, and other conditions to manage booking changes effectively.
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