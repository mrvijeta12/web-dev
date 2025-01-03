<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'services' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'services' AND blog_status = 'published'");
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service</title>
    <link rel="stylesheet" href="assests/css/service.css">
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
        <?php include('navbar.php'); ?>
        <div class="wrapper" data-aos="fade-right" data-aos-duration="1000">

            <!-- ##### HERO SECTION ########  -->
            <div class="hero">
                <h1 data-aos="fade-up" data-aos-duration="1500">Our Services</h1>
                <h2 data-aos="fade-up" data-aos-duration="1500">Comprehensive IT Solutions for Every Need</h2>
                <a href="#" class="reopenPopup" data-aos="fade-up" data-aos-duration="1500">Book Free Consultation</a>
            </div>

            <!-- ####### INTRO ######### -->

            <div class="intro-wrapper">

                <div class="intro-slide intro-1">
                    <h2 data-aos="fade-up" data-aos-duration="1000">Transform Your Vision into Dynamic Websites with Our Expert Web Development Team, Providing Tailored Solutions that Drive Your Success.</h2>
                    <p data-aos="fade-up" data-aos-duration="1000">Our team of expert web developers specializes in turning your ideas into dynamic and engaging websites. By leveraging the latest technologies and industry best practices, we create custom solutions tailored to your unique needs, ensuring a seamless user experience that drives engagement and business success.</p>
                    <p data-aos="fade-up" data-aos-duration="1000">With a focus on innovation and collaboration, we deliver results that exceed expectations. Partner with us to bring your vision to life and experience the difference our skilled developers can make for your online presence. </p>
                </div>



                <div class="intro-slide intro-2">
                    <img src="images/10.jpg" alt="" data-aos="fade-left" data-aos-duration="1500">
                </div>





            </div>





            <!-- ###### web dev services ########  -->



            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Transform Your Vision into Reality with Our Web Services</h1>

            </div>


            <div class="services" id="web-services">
                <div class="service_child" data-aos="fade-up" data-aos-duration="1000">
                    <img src="images/web-development.png" alt="">
                    <h1>CMS </h1>
                    <p>Content Management System</p>
                    <a href="./cms-service.php">View More</a>
                </div>
                <div class="service_child" data-aos="fade-up" data-aos-duration="1000">
                    <img src="images/e-commerce.png" alt="">
                    <h1>ERP </h1>
                    <p>Enterprise Resource Planning</p>
                    <a href="./erp-service.php">View More</a>
                </div>
                <div class="service_child" data-aos="fade-up" data-aos-duration="1000">
                    <img src="images/e-commerce.png" alt="">
                    <h1> CRM </h1>
                    <p>Customer Relationship Management</p>
                    <a href="./crm-service.php">View More</a>
                </div>
                <div class="service_child" data-aos="fade-up" data-aos-duration="1000">
                    <img src="images/e-commerce.png" alt="">
                    <h1>LMS</h1>
                    <p> Learning Management System</p>
                    <a href="./lms-service.php">View More</a>
                </div>
                <div class="service_child" data-aos="fade-up" data-aos-duration="1000">
                    <img src="images/e-commerce.png" alt="">
                    <h1>E-commerce</h1>
                    <p> Online stores and e-commerce businesses</p>
                    <a href="./e-commerce-service.php">View More</a>
                </div>
                <div class="service_child" data-aos="fade-up" data-aos-duration="1000">
                    <img src="images/e-commerce.png" alt="">
                    <h1>PIM </h1>
                    <p>Product Information Management</p>
                    <a href="./pim-service.php">View More</a>
                </div>
                <div class="service_child" data-aos="fade-up" data-aos-duration="1000">
                    <img src="images/e-commerce.png" alt="">
                    <h1> BPM </h1>
                    <p>Business Process Management</p>
                    <a href="./bpm-service.php">View More</a>
                </div>
                <div class="service_child" data-aos="fade-up" data-aos-duration="1000">
                    <img src="images/e-commerce.png" alt="">
                    <h1>SCM </h1>
                    <p>Supply Chain Management</p>
                    <a href="./scm-service.php">View More</a>
                </div>
                <div class="service_child" data-aos="fade-up" data-aos-duration="1000">
                    <img src="images/e-commerce.png" alt="">
                    <h1>HRM </h1>
                    <p>Human Resource Management</p>
                    <a href="./hrm-service.php">View More</a>
                </div>
                <div class="service_child" data-aos="fade-up" data-aos-duration="1000">
                    <img src="images/e-commerce.png" alt="">
                    <h1>DMS </h1>
                    <p>Document Management System</p>
                    <a href="./dms-service.php">View More</a>
                </div>
                <div class="service_child" data-aos="fade-up" data-aos-duration="1000">
                    <img src="images/e-commerce.png" alt="">
                    <h1> BI </h1>
                    <p>Business Intelligence</p>
                    <a href="./bi-service.php">View More</a>
                </div>
                <div class="service_child" data-aos="fade-up" data-aos-duration="1000">
                    <img src="images/e-commerce.png" alt="">
                    <h1>Web App Dev</h1>
                    <p>Custom, Scalable, and Dynamic Web Solutions</p>
                    <a href="./web-dev-app-service.php">View More</a>
                </div>
                <div class="service_child" data-aos="fade-up" data-aos-duration="1000">
                    <img src="images/e-commerce.png" alt="">
                    <h1>CXM </h1>
                    <p>Customer Experience Management</p>
                    <a href="./cxm-service.php">View More</a>
                </div>
                <div class="service_child" data-aos="fade-up" data-aos-duration="1000">
                    <img src="images/e-commerce.png" alt="">
                    <h1>Booking & Res Systems</h1>
                    <p> Bookings, appointments, and reservations.</p>
                    <a href="./booking&res-system-service.php">View More</a>
                </div>


            </div>



            <!-- ###### WHY CHOOSE US  #########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">From Discovery to Deployment, We Ensure Every Detail Matters</h1>

            </div>





            <div class="service_choose_us">
                <div class="services_container">
                    <!-- Service 1 - Banking Technology Expertise -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>We take time to thoroughly understand your unique business needs, goals, and technical requirements to provide personalized and effective financial technology solutions that align with your vision.</p>
                            <img src="images/consultation.png" alt="">
                            <h1>Discovery & Consultation</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Custom Fintech Solutions -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>Our team delivers visually appealing and user-friendly designs, ensuring an optimal customer experience that enhances engagement, usability, and satisfaction for every digital banking and financial service interface.</p>
                            <img src="images/ux.png" alt="">
                            <h1>Custom Design & UX</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Robust Security and Compliance -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>Utilizing an agile development approach, we ensure flexibility, speed, and continual improvements, enabling us to meet your business needs quickly while adapting to changing requirements seamlessly.</p>
                            <img src="images/development.png" alt="">
                            <h1>Agile Development</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Integrated Banking Solutions -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>Through rigorous testing procedures, we guarantee that your applications are bug-free, high-performance, and capable of meeting industry standards for quality, ensuring a reliable user experience.</p>
                            <img src="images/testing.png" alt="">
                            <h1>Testing & QA</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Innovative Banking Technologies -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>Our deployment service guarantees a seamless launch, ensuring that your website or application goes live smoothly, with minimal downtime, providing a strong start for your digital presence.</p>
                            <img src="images/deployment.png" alt="">
                            <h1>Deployment & Support</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - 24/7 Technical Support -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>We offer continuous monitoring, regular updates, and performance enhancements, ensuring your systems maintain top-notch efficiency and adapt smoothly to changing market conditions and user expectations.</p>
                            <img src="images/support.png" alt="">
                            <h1>Support & Optimization</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>
                </div>
            </div>







            <!-- ###### targeted industry ######## -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">From Startups to Enterprises, We Drive Industry-Specific Success</h1>

            </div>
            <div class="choose_container">
                <div class="choose_content">
                    <div class="choose_image">
                        <img src="images/service-retail.jpg" alt="choose us" data-aos="fade-right" data-aos-duration="1500">
                    </div>

                    <div class="choose_data">
                        <h1 data-aos="fade-up" data-aos-duration="1000"> Retail & eCommerce</h1>
                        <p data-aos="fade-up" data-aos-duration="1000">Our team is dedicated to delivering proven results, backed by over two years of experience in Salesforce development. We have a track record of implementing solutions that significantly enhance business processes and drive measurable success. By optimizing CRM systems and ensuring seamless integrations, we help businesses achieve their goals efficiently, consistently delivering outcomes that exceed expectations.</p>
                    </div>
                </div>

                <div class="choose_content content_2">

                    <div class="choose_data">
                        <h1 data-aos="fade-up" data-aos-duration="1000"> Finance & Banking</h1>
                        <p data-aos="fade-up" data-aos-duration="1000">Our team specializes in delivering customized solutions tailored to meet your unique business needs. With over two years of experience in Salesforce development, we excel in creating efficient, user-friendly, and scalable systems. We focus on optimizing your CRM to enhance productivity and drive growth, ensuring that our solutions align perfectly with your objectives and deliver measurable results.</p>
                    </div>
                    <div class="choose_image">
                        <img src="images/service-banking.jpg" alt="choose us" data-aos="fade-left" data-aos-duration="1500">
                    </div>
                </div>

                <div class="choose_content">
                    <div class="choose_image">
                        <img src="images/service-healthcare.jpg" alt="choose us" data-aos="fade-right" data-aos-duration="1500">
                    </div>

                    <div class="choose_data">
                        <h1 data-aos="fade-up" data-aos-duration="1000">Healthcare & Life Sciences</h1>
                        <p data-aos="fade-up" data-aos-duration="1000">Our team is dedicated to delivering proven results, backed by over two years of experience in Salesforce development. We have a track record of implementing solutions that significantly enhance business processes and drive measurable success. By optimizing CRM systems and ensuring seamless integrations, we help businesses achieve their goals efficiently, consistently delivering outcomes that exceed expectations.</p>
                    </div>
                </div>
                <div class="choose_content content_2">

                    <div class="choose_data">
                        <h1 data-aos="fade-up" data-aos-duration="1000">Energy & Utilities</h1>
                        <p data-aos="fade-up" data-aos-duration="1000">Our team specializes in delivering customized solutions tailored to meet your unique business needs. With over two years of experience in Salesforce development, we excel in creating efficient, user-friendly, and scalable systems. We focus on optimizing your CRM to enhance productivity and drive growth, ensuring that our solutions align perfectly with your objectives and deliver measurable results.</p>
                    </div>
                    <div class="choose_image">
                        <img src="images/service-energy.jpg" alt="choose us" data-aos="fade-left" data-aos-duration="1500">
                    </div>
                </div>
                <div class="choose_content">
                    <div class="choose_image">
                        <img src="images/service-real-estate.jpg" alt="choose us" data-aos="fade-right" data-aos-duration="1500">
                    </div>

                    <div class="choose_data">
                        <h1 data-aos="fade-up" data-aos-duration="1000">Real Estate</h1>
                        <p data-aos="fade-up" data-aos-duration="1000">Our team is dedicated to delivering proven results, backed by over two years of experience in Salesforce development. We have a track record of implementing solutions that significantly enhance business processes and drive measurable success. By optimizing CRM systems and ensuring seamless integrations, we help businesses achieve their goals efficiently, consistently delivering outcomes that exceed expectations.</p>
                    </div>
                </div>
                <div class="choose_content content_2">

                    <div class="choose_data">
                        <h1 data-aos="fade-up" data-aos-duration="1000">Education & E-Learning</h1>
                        <p data-aos="fade-up" data-aos-duration="1000">Our team specializes in delivering customized solutions tailored to meet your unique business needs. With over two years of experience in Salesforce development, we excel in creating efficient, user-friendly, and scalable systems. We focus on optimizing your CRM to enhance productivity and drive growth, ensuring that our solutions align perfectly with your objectives and deliver measurable results.</p>
                    </div>
                    <div class="choose_image">
                        <img src="images/service-education.jpg" alt="choose us" data-aos="fade-left" data-aos-duration="1500">
                    </div>
                </div>

            </div>



            <!-- ############## testimonial ############# -->

            <section class="testimonial_wrapper">
                <h1 data-aos="zoom-in" data-aos-duration="1000"><span><i class="fa-regular fa-comments"></i></span> What Our Clients Say</h1>



                <div class="testimonial_slider">
                    <div class="testimonial_item" data-aos="fade-up" data-aos-duration="1000">

                        <img src="images/10.jpg" alt="">
                        <img src="images/double-main.png" alt="" class="double">
                        <p>TekAlgo’s Salesforce expertise boosted our sales efficiency and team productivity. Their tailored solutions made a significant difference. Highly recommended!</p>
                        <h5>John Doe</h5>
                        <p>CEO, Company</p>
                    </div>
                    <div class="testimonial_item" data-aos="fade-up" data-aos-duration="1000">
                        <img src="images/10.jpg" alt="">
                        <img src="images/double-main.png" alt="" class="double">
                        <p>TekAlgo transformed our CRM with seamless Salesforce integration. Exceptional service, knowledgeable team, and tangible results. We’re extremely satisfied! </p>
                        <h5>John Doe</h5>
                        <p>CEO, Company</p>
                    </div>
                    <div class="testimonial_item" data-aos="fade-up" data-aos-duration="1000">

                        <img src="images/10.jpg" alt="">
                        <img src="images/double-main.png" alt="" class="double">
                        <p>TekAlgo’s Salesforce solutions enhanced our customer management. The team is responsive, professional, and delivered beyond our expectations. Outstanding experience! </p>
                        <h5>John Doe</h5>
                        <p>CEO, Company</p>
                    </div>
                </div>
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

            <!-- ###### FAQ'S ####  -->

            <div class="container" data-aos="zoom-in" data-aos-duration="1000">
                <h1> Frequently Asked Questions</h1>
            </div>

            <section class="faq-wrapper" data-aos="zoom-in" data-aos-duration="1000">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What types of web development services do you provide?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We offer comprehensive web development services, including custom web design, front-end and back-end development, e-commerce solutions, CMS integration, and API development to meet a wide range of needs.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can you help with website redesign and improvements?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Absolutely! We specialize in redesigning and upgrading existing websites to improve functionality, aesthetics, and user experience, ensuring your site remains competitive and modern.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Do you offer SEO services as part of web development?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we integrate SEO best practices in our web development process, optimizing your website for search engines and improving visibility to help attract organic traffic.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What is your approach to custom software and web applications?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We develop custom software and web applications tailored to your business requirements, focusing on scalability, security, and user-friendly design. We work closely with you to ensure the solution fits your exact needs.
                    </p>
                </section>
            </section>




        </div>
        <?php include('footer.php'); ?>

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init({
                once: true,
            });
        </script>


        <script src="swiper.js"></script>
        <script src="./blog.js"></script>
        <?php include('pop.php'); ?>
    </div>
















</body>

</html>