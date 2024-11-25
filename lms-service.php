<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'lms' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'lms' AND blog_status = 'published'");
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
                    <img src="images/lms-hero.jpg" alt="">
                </div>
                <div class="hero-data">
                    <h1 data-aos="zoom-in" data-aos-duration="2500">Empower Learning with Our LMS Solutions</h1>
                    <h2 data-aos="zoom-in" data-aos-duration="2500">Streamline training, development, and course management.</h2>
                    <a href="#" class="reopenPopup">Get Professional Advice</a>
                </div>
            </div>


            <!-- ####### INTRODUCTION  ####### -->

            <section class="intro">
                <h1>Innovative LMS Solutions for Enhanced Learning and Development</h1>
                <p>Our cutting-edge Learning Management System (LMS) revolutionizes the educational experience by providing a centralized platform for course management, content delivery, and learner engagement. Designed for both educators and learners, it offers interactive features, personalized learning paths, and comprehensive analytics to track progress and outcomes. Empower your organization with tools for seamless collaboration, skill development, and continuous improvement, ensuring a future-ready workforce.</p>
            </section>




            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Core Features of LMS Solutions</h1>
            </div>
            <div class="service_choose_us">
                <div class="services_container">
                    <!-- Service 1 - Course Management -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Provides powerful tools to create, manage, and deliver engaging and interactive learning content, ensuring an effective educational experience for both instructors and learners alike.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Course Management</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Assessment Tools -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Offers automated testing, grading, and feedback tools to simplify the evaluation process, helping instructors provide timely and personalized feedback to students.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Assessment Tools</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Progress Tracking -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Enables real-time tracking of student progress and performance, allowing instructors to monitor learning outcomes and identify areas where additional support is needed.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Progress Tracking</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Collaboration -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Fosters interactive learning experiences through discussion forums and collaborative sessions, encouraging students to engage and share knowledge in a supportive environment.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Collaboration</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Mobile Accessibility -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Designed for easy access across devices, allowing users to participate in learning activities and access content anytime, anywhere, making education truly mobile.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Mobile Accessibility</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>
                </div>
            </div>








            <!-- ######### Benefits ##########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Key Benefits of Implementing LMS Systems</h1>

            </div>


            <section class="benefits-wrapper">


                <div class="benefits-sectors">
                    <ul>
                        <li>Centralized platform for managing training and educational resources.</li>
                        <li>Improved learner engagement with interactive content.</li>
                        <li>Streamlined course creation and management processes.</li>
                        <li>Real-time tracking of learner progress and performance.</li>
                        <li>Customizable learning paths to meet diverse needs.</li>
                    </ul>
                    <ul>
                        <li>Enhanced collaboration and communication among learners and instructors.</li>
                        <li>Access to a wide range of resources and materials.</li>
                        <li>Integration with other tools for a comprehensive learning experience.</li>
                        <li>Data-driven insights for continuous improvement of programs.</li>
                        <li>Scalability to accommodate more users and courses.</li>
                    </ul>
                </div>

            </section>

            <!-- ####### WORKING WITH US ######  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>Transforming Education with Learning Management Systems (LMS)</h1>
                <p>Learning Management Systems (LMS) are essential platforms that facilitate the delivery, tracking, and management of educational courses and training programs. This article delves into the key features and benefits of using an LMS:</p>
            </div>
            <section class="work-wrapper">
                <section class="work-wrapper-child">
                    <section class="work-child">
                        <h2>
                            <span>1.</span>Centralized Learning Environment:
                        </h2>
                        <p>An LMS provides a centralized platform where learners can access all course materials, resources, and assessments. This centralized approach simplifies the learning process and enhances user experience.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>2.</span>Flexible Learning Paths:
                        </h2>
                        <p>With an LMS, educators can create personalized learning paths that cater to individual student needs. This flexibility allows learners to progress at their own pace, accommodating different learning styles.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>3.</span>Interactive Learning Features:
                        </h2>
                        <p>Modern LMS platforms include interactive features such as quizzes, discussion forums, and multimedia content. These elements engage learners and promote active participation, making the learning experience more enjoyable.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>4.</span>Comprehensive Analytics and Reporting:
                        </h2>
                        <p>An LMS provides robust analytics tools that allow educators to track student progress and engagement. Detailed reports help identify areas for improvement and inform instructional strategies.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>5.</span>Scalable Training Solutions:
                        </h2>
                        <p>As organizations grow, an LMS can easily scale to accommodate more users and courses. This scalability ensures that training solutions remain effective regardless of the size of the organization.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>6.</span>Cost-Effective Training:
                        </h2>
                        <p>By utilizing an LMS, organizations can reduce training costs associated with traditional in-person learning. Online training eliminates travel expenses and allows for efficient resource allocation.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>7.</span>Easy Content Updates:
                        </h2>
                        <p>With an LMS, course content can be updated easily and quickly. This ensures that learners always have access to the most current information and resources, enhancing the relevance of the training.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>8.</span>Mobile Learning Opportunities:
                        </h2>
                        <p>Many LMS platforms offer mobile accessibility, enabling learners to engage with course materials anytime, anywhere. This flexibility supports on-the-go learning and enhances overall accessibility.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>9.</span>Community and Collaboration:
                        </h2>
                        <p>An LMS fosters a sense of community among learners through discussion boards and collaborative projects. This social aspect enriches the learning experience and encourages knowledge sharing.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>10.</span>Certification and Compliance Tracking:
                        </h2>
                        <p>For organizations requiring certifications, an LMS simplifies tracking compliance and certification completion. Automated reminders and reporting ensure that all necessary credentials are up to date.</p>
                    </section>
                </section>
            </section>













            <!-- ######### Process ##########  -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">
                    Industries Benefiting from LMS</h1>

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
                <h1 data-aos="zoom-in" data-aos-duration="1500">Key LMS Modules and Their Functions</h1>
            </div>
            <div class="service_choose_us">
                <div class="services_container">
                    <!-- Service 1 - Course Management -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Creates and organizes online courses and learning materials, allowing instructors to develop structured lessons, modules, and multimedia content for students to access and complete.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Course Management</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Assessment Tools -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Facilitates quizzes, tests, and other assessment tools that enable instructors to evaluate learner comprehension, track progress, and provide instant feedback for improvement.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Assessment Tools</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Tracking and Reporting -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Monitors learner progress and generates detailed performance reports, offering insights into areas of strength and improvement, helping instructors personalize the learning experience.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Tracking and Reporting</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Certification Management -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Issues and manages certificates for completed courses, ensuring that learners receive official recognition for their achievements, while automating certificate distribution upon course completion.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Certification Management</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Collaboration Tools -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Encourages interaction between learners and instructors through discussion forums, group chats, and collaborative assignments, fostering a dynamic and engaging learning environment.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Collaboration Tools</h1>
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
                <h1>LMS Software Development FAQs</h1>
            </div>

            <section class="faq-wrapper">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What is an LMS and how does it work?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        An LMS (Learning Management System) is a software platform used to manage and deliver online courses and training programs. It allows instructors to create content, track learner progress, and administer assessments, all in one centralized system.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can LMS platforms be used for corporate training?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, LMS platforms are widely used for corporate training. They allow businesses to deliver training programs, track employee progress, and ensure compliance with industry standards. Corporate LMS solutions can be tailored to specific training needs and goals.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can I track learner progress in an LMS?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Absolutely! LMS platforms come with robust tracking and reporting features. You can monitor learner progress, assess performance through quizzes and exams, and get detailed reports on completion rates, scores, and engagement levels.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Is it possible to customize an LMS?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, LMS platforms can be customized to meet specific needs. Whether it’s the course structure, branding, or integrating third-party tools, many LMS solutions offer flexible options to tailor the system to your organization's requirements.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How secure is an LMS?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        LMS platforms are designed with robust security measures, including user authentication, encrypted data transfer, and secure content storage. Regular updates and backups ensure that the system stays secure, protecting both learner data and course materials.
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