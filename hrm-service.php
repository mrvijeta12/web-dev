<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'hrm' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'hrm' AND blog_status = 'published'");
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
                    <img src="images/hrm-hero.jpg" alt="">
                </div>
                <div class="hero-data">
                    <h1 data-aos="zoom-in" data-aos-duration="2500">Transform Your Workforce with HRM Solutions</h1>
                    <h2 data-aos="zoom-in" data-aos-duration="2500">Streamline recruitment, improve performance, and enhance engagement.</h2>
                    <a href="#" class="reopenPopup">Get Professional Advice</a>
                </div>
            </div>


            <!-- ####### INTRODUCTION  ####### -->

            <section class="intro">
                <h1>Transform Your Workforce with Innovative Human Resource Management</h1>
                <p>Our comprehensive Human Resource Management (HRM) solution empowers organizations to effectively manage their most valuable asset—people. From recruitment and onboarding to performance management and employee development, our HRM platform streamlines all HR processes in one centralized system. By utilizing data-driven insights, it enhances workforce engagement, optimizes talent acquisition, and fosters a culture of continuous improvement. Equip your organization with the tools needed to attract, retain, and nurture top talent for sustained growth and success.</p>
            </section>




            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Core Features of HRM Solutions</h1>
            </div>
            <div class="service_choose_us">
                <div class="services_container">
                    <!-- Service 1 - Employee Database -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Centralized storage for employee records, making it easy to access, manage, and update important employee information, ensuring accurate data across the organization.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Employee Database</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Payroll Processing -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Automates payroll calculations, including tax deductions, benefits, and overtime, ensuring that employees receive timely and accurate payments while simplifying HR workflows.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Payroll Processing</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Recruitment Tools -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Supports recruitment efforts with applicant tracking systems, interview scheduling, and seamless hiring workflows, making the hiring process more efficient and organized.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Recruitment Tools</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Performance Management -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Enables tracking of employee performance through regular assessments, feedback, and reviews, supporting appraisal processes and identifying areas for professional growth and improvement.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Performance Management</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Time & Attendance Tracking -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Monitors employee attendance, tracks leave balances, and records work hours to streamline workforce management, ensure compliance, and improve payroll accuracy.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Time & Attendance Tracking</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>
                </div>
            </div>








            <!-- ######### Benefits ##########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Key Benefits of Implementing HRM Systems</h1>

            </div>


            <section class="benefits-wrapper">


                <div class="benefits-sectors">
                    <ul>
                        <li>Centralized employee information for easy access and management.</li>
                        <li>Streamlined recruitment and onboarding processes.</li>
                        <li>Improved employee engagement and satisfaction.</li>
                        <li>Automated performance evaluations and feedback processes.</li>
                        <li>Enhanced compliance with labor laws and regulations.</li>
                    </ul>
                    <ul>
                        <li>Real-time analytics for workforce planning and optimization.</li>
                        <li>Support for employee training and development initiatives.</li>
                        <li>Flexible payroll and benefits management.</li>
                        <li>Enhanced communication and collaboration among teams.</li>
                        <li>Scalability to support organizational growth.</li>
                    </ul>
                </div>

            </section>

            <!-- ####### WORKING WITH US ######  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>Understanding How HRM Systems Function</h1>
                <p>Human Resource Management (HRM) systems are designed to optimize and manage an organization’s human resources effectively. Here’s an in-depth look at how HRM systems operate:</p>
            </div>
            <section class="work-wrapper">
                <section class="work-wrapper-child">
                    <section class="work-child">
                        <h2>
                            <span>1.</span>Centralized Employee Database:
                        </h2>
                        <p>HRM systems feature a centralized database that stores all employee information, including personal details, performance records, and payroll data. This consolidation minimizes data silos and ensures that HR teams have access to accurate, up-to-date information for decision-making and reporting.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>2.</span>Modular Capabilities:
                        </h2>
                        <p>HRM systems often consist of modular components, each addressing specific HR functions such as recruitment, onboarding, training, performance management, and payroll. Organizations can customize their systems by selecting modules that fit their needs while retaining the option to add more functionalities as required.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>3.</span>Real-Time Employee Data Processing:
                        </h2>
                        <p>HRM systems enable real-time processing of employee data, allowing for immediate updates to personnel records and other related functions. This feature helps HR professionals to make timely decisions, manage workforce changes efficiently, and maintain compliance with regulations.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>4.</span>Automation of HR Processes:
                        </h2>
                        <p>Automation is a fundamental feature of HRM systems that streamlines repetitive tasks such as payroll processing, leave management, and employee evaluations. By automating these processes, HR teams can reduce administrative burdens and focus more on strategic initiatives.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>5.</span>Integrated Recruitment Management:
                        </h2>
                        <p>HRM systems facilitate integrated recruitment workflows, from job posting to applicant tracking and onboarding. This integration ensures a seamless hiring process, enabling HR teams to collaborate effectively and reduce the time it takes to fill positions.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>6.</span>Performance Management and Analytics:
                        </h2>
                        <p>Advanced HRM systems include performance management tools that help track employee performance, set objectives, and conduct evaluations. Data analytics features allow organizations to gain insights into employee productivity and identify areas for improvement, aiding in talent development.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>7.</span>Scalability and Adaptability:
                        </h2>
                        <p>HRM systems are designed to be scalable and adaptable to meet the evolving demands of the workforce. As organizations grow, these systems can incorporate new features, user roles, and compliance requirements, ensuring they remain effective at any size.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>8.</span>Enhanced Communication and Collaboration:
                        </h2>
                        <p>HRM systems foster improved communication and collaboration among employees and management. By providing a platform for sharing information and resources, these systems facilitate teamwork and help align employees with organizational goals.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>9.</span>Security and Compliance Features:
                        </h2>
                        <p>HRM systems incorporate strong security measures to protect sensitive employee data. Features like role-based access control, data encryption, and compliance tracking ensure that organizations adhere to legal requirements while maintaining data privacy.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>10.</span>Cloud-Based Solutions:
                        </h2>
                        <p>Modern HRM systems are increasingly available as cloud-based solutions, providing businesses with benefits like remote access, reduced IT costs, and simplified software updates. Cloud-based HRM solutions allow organizations to manage their workforce effectively from anywhere.</p>
                    </section>
                </section>
            </section>













            <!-- ######### Process ##########  -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">
                    Industries Benefiting from HRM</h1>

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
                <h1 data-aos="zoom-in" data-aos-duration="1500">Key HRM Modules and Their Functions</h1>
            </div>
            <div class="service_choose_us">
                <div class="services_container">
                    <!-- Service 1 - Recruitment Management -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Streamlines the hiring process by managing job postings, tracking candidates, and facilitating communication, ensuring a smooth recruitment workflow from start to finish.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Recruitment Management</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Employee Onboarding -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Facilitates a smooth and efficient onboarding process for new hires by providing all necessary documents, training materials, and access to resources on day one.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Employee Onboarding</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Performance Management -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Monitors and evaluates employee performance through regular reviews, feedback sessions, and goal tracking to ensure continuous improvement and professional growth.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Performance Management</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Payroll Management -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Automates payroll processes, including salary calculations, tax deductions, and compliance with local regulations, ensuring accurate and timely payments to employees.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Payroll Management</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Training and Development -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Provides employees with resources for continuous learning, skill development, and career growth through training programs, workshops, and development opportunities.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Training and Development</h1>
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
                <h1>Human Resource Management (HRM) FAQs</h1>
            </div>

            <section class="faq-wrapper">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What is Human Resource Management (HRM)?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Human Resource Management (HRM) refers to the process of managing people in an organization. It involves recruiting, hiring, training, managing employee relations, and ensuring compliance with labor laws.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How can HRM improve employee performance?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        HRM improves employee performance by implementing effective training programs, setting clear performance expectations, offering regular feedback, and providing incentives for high performance and growth.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How does HRM help in employee retention?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        HRM helps retain employees by fostering a positive work culture, offering career development opportunities, providing competitive compensation, and addressing employee needs through recognition and benefits programs.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can HRM assist with legal compliance?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, HRM ensures compliance with labor laws, employee rights, and regulations related to hiring, firing, benefits, and workplace safety, minimizing the risk of legal issues for the company.
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