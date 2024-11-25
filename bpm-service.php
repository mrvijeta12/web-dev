<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'bpm' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'bpm' AND blog_status = 'published'");
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
                    <img src="images/bpm-hero.jpg" alt="">
                </div>
                <div class="hero-data">
                    <h1 data-aos="zoom-in" data-aos-duration="2500">Optimize Your Operations with BPM Solutions</h1>
                    <h2 data-aos="zoom-in" data-aos-duration="2500">Enhance efficiency, automate tasks, and improve workflows.</h2>
                    <a href="#" class="reopenPopup">Get Professional Advice</a>
                </div>
            </div>


            <!-- ####### INTRODUCTION  ####### -->

            <section class="intro">
                <h1>Optimize Your Operations with Comprehensive Business Process Management</h1>
                <p>Our robust Business Process Management (BPM) solution empowers organizations to analyze, model, and improve their business processes seamlessly. By providing a centralized platform for process visualization and automation, it enhances operational efficiency, reduces costs, and accelerates decision-making. Designed for adaptability, our BPM solution allows you to respond swiftly to market changes, ensuring that your processes are always aligned with your business goals. Transform your operational workflows and drive sustainable growth with our innovative BPM approach.</p>
            </section>




            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Core Features of BPM Solutions</h1>
            </div>
            <div class="service_choose_us">
                <div class="services_container">
                    <!-- Service 1 - Process Mapping -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Visualizes business processes to provide a comprehensive understanding and in-depth analysis of workflows, enabling teams to identify inefficiencies and optimize their operations.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Process Mapping</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Workflow Automation -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Automates repetitive tasks across business operations, streamlining workflows to reduce manual errors, increase efficiency, and allow employees to focus on higher-value tasks.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Workflow Automation</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Performance Analytics -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Tracks key performance indicators (KPIs) and analyzes critical metrics to uncover trends, identify areas for improvement, and empower teams to make data-driven decisions.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Performance Analytics</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Compliance Management -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Ensures that business workflows remain compliant with regulatory standards and internal company policies by monitoring processes and ensuring proper governance across the organization.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Compliance Management</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Process Optimization -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Continuously analyzes and refines business workflows, eliminating inefficiencies and maximizing resource utilization to improve productivity and enhance overall operational effectiveness.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Process Optimization</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>
                </div>
            </div>








            <!-- ######### Benefits ##########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Key Benefits of Implementing BPM Systems</h1>

            </div>


            <section class="benefits-wrapper">


                <div class="benefits-sectors">
                    <ul>
                        <li>Improved operational efficiency through process automation.</li>
                        <li>Enhanced visibility into business processes for better monitoring.</li>
                        <li>Streamlined workflows for increased productivity.</li>
                        <li>Data-driven insights for informed decision-making.</li>
                        <li>Reduced process inefficiencies and bottlenecks.</li>
                    </ul>
                    <ul>
                        <li>Support for continuous process improvement initiatives.</li>
                        <li>Integration with existing systems for seamless operations.</li>
                        <li>Flexibility to adapt processes to changing business needs.</li>
                        <li>Real-time analytics for performance tracking.</li>
                        <li>Enhanced compliance with industry standards and regulations.</li>
                    </ul>
                </div>

            </section>

            <!-- ####### WORKING WITH US ######  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>Streamlining Operations with Business Process Management (BPM) Systems</h1>
                <p>Business Process Management (BPM) systems are essential for organizations seeking to optimize their workflows and enhance operational efficiency. This article explores the key features and benefits of BPM systems:</p>
            </div>
            <section class="work-wrapper">
                <section class="work-wrapper-child">
                    <section class="work-child">
                        <h2>
                            <span>1.</span>Process Mapping and Visualization:
                        </h2>
                        <p>BPM systems enable organizations to map and visualize their business processes, providing a clear overview of workflows. This visualization helps identify inefficiencies and areas for improvement.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>2.</span>Automated Workflow Management:
                        </h2>
                        <p>By automating routine tasks, BPM systems reduce manual effort and streamline operations. Automation minimizes errors and ensures that processes are executed consistently and efficiently.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>3.</span>Real-Time Monitoring and Analytics:
                        </h2>
                        <p>BPM systems provide real-time monitoring of processes, allowing organizations to track performance metrics and identify bottlenecks. Analytics tools help organizations make informed decisions based on data-driven insights.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>4.</span>Collaboration and Communication:
                        </h2>
                        <p>With BPM systems, teams can collaborate more effectively through shared platforms. Enhanced communication ensures that everyone involved in a process is aligned and informed about their roles and responsibilities.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>5.</span>Compliance and Risk Management:
                        </h2>
                        <p>BPM systems help organizations adhere to regulatory requirements by providing tools for documentation and compliance tracking. This capability minimizes risks and ensures that processes meet industry standards.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>6.</span>Continuous Improvement Initiatives:
                        </h2>
                        <p>By regularly analyzing and optimizing processes, BPM systems promote a culture of continuous improvement. Organizations can implement changes based on feedback and performance metrics to enhance efficiency.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>7.</span>Flexibility and Scalability:
                        </h2>
                        <p>BPM systems are designed to be flexible and scalable, allowing organizations to adapt their processes as business needs evolve. This adaptability ensures that BPM solutions remain effective over time.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>8.</span>Integration with Existing Systems:
                        </h2>
                        <p>Many BPM platforms integrate seamlessly with other business applications, such as ERP and CRM systems. This integration facilitates smooth data flow and enhances overall operational efficiency.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>9.</span>User-Friendly Interfaces:
                        </h2>
                        <p>Modern BPM systems feature intuitive user interfaces that make it easy for employees to engage with the platform. This user-friendliness encourages adoption and effective use across the organization.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>10.</span>Enhanced Customer Satisfaction:
                        </h2>
                        <p>By optimizing internal processes and improving response times, BPM systems ultimately lead to enhanced customer satisfaction. Efficient workflows ensure that customer needs are met promptly and effectively.</p>
                    </section>
                </section>
            </section>













            <!-- ######### Process ##########  -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">
                    Industries Benefiting from BPM</h1>

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
                <h1 data-aos="zoom-in" data-aos-duration="1500">Key BPM Modules and Their Functions</h1>
            </div>
            <div class="service_choose_us">
                <div class="services_container">
                    <!-- Service 1 - Process Modeling -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Visualizes and designs business processes to enhance understanding, ensuring clear communication of workflows and providing a structured approach to process improvement and optimization efforts.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Process Modeling</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Workflow Automation -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Automates repetitive tasks and processes, reducing manual effort, minimizing human error, and increasing productivity by enabling teams to focus on higher-value activities and strategic goals.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Workflow Automation</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Performance Monitoring -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Monitors process performance in real-time, identifying bottlenecks and inefficiencies, enabling quick decision-making and process optimization to improve overall business operations and outcomes.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Performance Monitoring</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Collaboration Tools -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Facilitates effective communication and collaboration among team members, ensuring seamless information sharing, task delegation, and real-time collaboration for better decision-making and project execution.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Collaboration Tools</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Compliance Management -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Ensures that business processes and operations comply with industry regulations and standards, reducing the risk of non-compliance, legal issues, and financial penalties while ensuring a smooth workflow.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Compliance Management</h1>
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
                <h1>Business Process Management (BPM) FAQs</h1>
            </div>

            <section class="faq-wrapper">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What is Business Process Management (BPM)?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Business Process Management (BPM) is a methodology that focuses on improving and optimizing an organization's business processes. It involves the design, execution, monitoring, and continuous improvement of processes to increase efficiency, reduce costs, and enhance customer satisfaction.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How does BPM improve operational efficiency?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        BPM improves operational efficiency by streamlining workflows, automating tasks, and eliminating bottlenecks. It ensures that resources are used effectively, reducing waste and improving the speed and quality of business processes.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can BPM integrate with other business systems?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, BPM can integrate with other business systems such as ERP, CRM, and HR software. This integration ensures that data flows seamlessly between systems, providing a unified platform for managing and optimizing business processes.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How does BPM improve decision-making?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        BPM provides real-time data and analytics on business processes, enabling better decision-making. By tracking process performance and identifying inefficiencies, BPM helps leaders make informed decisions that drive improvement and growth.
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