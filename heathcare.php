<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'healthcare' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'healthcare' AND blog_status = 'published'");
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
        include('./navbar.php');
        ?>
        <div class="wrapper">



            <div class="hero">
                <div class="child child1">
                    <h1 class="animated-heading">
                        <span>H</span><span>e</span><span>a</span><span>l</span><span>t</span><span>h</span><span>c</span><span>a</span><span>r</span><span>e</span>
                        <span>S</span><span>o</span><span>f</span><span>t</span><span>w</span><span>a</span><span>r</span><span>e</span> <span>D</span><span>e</span><span>v</span><span>e</span><span>l</span><span>o</span><span>p</span><span>m</span><span>e</span><span>n</span><span>t</span> <span>S</span><span>e</span><span>r</span><span>v</span><span>i</span><span>c</span><span>e</span><span>s</span>
                    </h1>
                    <h3 data-aos="fade-up" data-aos-duration="1500">Transforming Healthcare Through Custom Software Solutions</h3>
                    <a href="#" class="reopenPopup">Get Free Quote</a>

                </div>
                <div class="child child2">
                    <img src="images/freepik__background__74942.png" alt="" data-aos="fade-left" data-aos-duration="2500" />
                </div>
            </div>

            <!-- ####### INTRODUCTION  ####### -->

            <section class="intro">
                <h1>Revolutionizing Healthcare Delivery with Our Comprehensive Software Development Services</h1>
                <p>Our healthcare software development services are designed to enhance patient care, streamline operations, and improve overall healthcare delivery. By leveraging cutting-edge technology, data analytics, and user-centric design, we empower healthcare providers to meet the evolving needs of their patients, ensuring efficient, secure, and accessible healthcare solutions for all.</p>
            </section>


            <!-- ####### details ####### -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">
                    Process We Follow To Develop Healthcare Software</h1>

            </div>
            <section class="detail">
                <section class="detail-title detail-child">
                    <p class="tab active-tab" onclick="toggleContent(1)"><strong>01.</strong> Healthcare Software Consulting</p>
                    <p class="tab" onclick="toggleContent(2)"><strong>02.</strong> Custom Heathcare Software Development</p>
                    <p class="tab" onclick="toggleContent(3)"><strong>03.</strong> Healthcare Software Product Development</p>
                    <p class="tab" onclick="toggleContent(4)"><strong>04.</strong> Heathcare Software Integration</p>
                    <p class="tab" onclick="toggleContent(5)"><strong>05.</strong> Healthcare Software Testing and Quality Assurance</p>
                    <p class="tab" onclick="toggleContent(6)"><strong>06.</strong> Healthcare Software Modernization</p>
                    <p class="tab" onclick="toggleContent(7)"><strong>07.</strong> Healthcare Software Maintenance and Support</p>

                </section>

                <section class="detail-description detail-child">
                    <section id="content1" class="content">
                        <div class="content-header">
                            <img src="images/consultation.png" alt="">
                            <h3>Healthcare Software Consulting </h3>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                        </div>
                        <p>We analyze your healthcare organization's needs, assess technological requirements, and provide strategic guidance to develop customized software solutions. Our consulting services help identify opportunities, mitigate risks, and design the blueprint for a successful software implementation.</p>
                    </section>
                    <section id="content2" class="content">
                        <div class="content-header">
                            <img src="images/software-development-process.png" alt="">
                            <h3>Custom Heathcare Software Development </h3>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                        </div>
                        <p>We specialize in building tailored software solutions designed to meet your healthcare organization's specific needs. From initial coding to deploying unique functionalities, our development process ensures that your software aligns perfectly with your clinical, operational, and administrative requirements.</p>
                    </section>
                    <section id="content3" class="content">
                        <div class="content-header">
                            <img src="images/development.png" alt="">
                            <h3>Healthcare Software Product Development</h3>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                        </div>
                        <p>Focused on creating scalable and market-ready healthcare software products, we turn your ideas into reality. Our product development services deliver innovative solutions that address industry needs, enhance patient care, and streamline operations for healthcare providers and organizations.</p>

                    </section>
                    <section id="content4" class="content">
                        <div class="content-header">
                            <img src="images/deployment.png" alt="">
                            <h3>Heathcare Software Integration </h3>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                        </div>
                        <p>Our integration services ensure seamless connectivity between your new software and existing healthcare systems. We bridge data silos, enabling interoperability among platforms to enhance efficiency, reduce manual effort, and improve decision-making for better patient outcomes.</p>
                    </section>
                    <section id="content5" class="content">
                        <div class="content-header">
                            <img src="images/project-analysis-health.png" alt="">
                            <h3>Healthcare Software Testing and Quality Assurance</h3>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                        </div>
                        <p>We rigorously test your healthcare software to identify bugs, vulnerabilities, and areas for improvement. Our quality assurance practices guarantee that your solution meets the highest standards for performance, security, and compliance with healthcare industry regulations.</p>
                    </section>
                    <section id="content6" class="content">
                        <div class="content-header">
                            <img src="images/moderization-process.png" alt="">
                            <h3>Healthcare Software Modernization</h3>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                        </div>
                        <p>We upgrade legacy healthcare software to meet modern technological standards, enhancing its functionality, performance, and security. Our modernization services help your organization stay competitive by adopting advanced features that support evolving industry needs and regulatory requirements.</p>
                    </section>
                    <section id="content7" class="content">
                        <div class="content-header">
                            <img src="images/support-process.png" alt="">
                            <h3>Healthcare Software Maintenance and Support</h3>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                        </div>
                        <p>Our maintenance and support services provide continuous software updates, troubleshooting, and enhancements to ensure optimal performance. We focus on fixing issues, improving functionality, and adapting the software to changing technology trends and healthcare industry demands.</p>
                    </section>
                </section>
            </section>







            <!-- ######### Benefits ##########  -->
            <section class="benefits-wrapper">
                <h1>Sectors that can benefits from our healthcare software development services</h1>


                <div class="benefits-sectors">
                    <ul>
                        <li>Hospitals and Clinic</li>
                        <li>Pharmaceutical Companies</li>
                        <li>Medical Device Manufacture</li>
                        <li>Diagonostic Laboratories</li>
                        <li>Heathcare NGOs</li>
                        <li>Rehabilitation Centers</li>

                    </ul>
                    <ul>
                        <li>Telemedicine Providers</li>
                        <li>Long Term Care Facilities</li>
                        <li>Mental Health Facilities</li>
                        <li>Specialty Care Clinic</li>
                        <li>Hospice Care Providers</li>
                        <li>Goverment Heath Department</li>

                    </ul>

                </div>
            </section>



            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Why Choose TekAlgo As Your Healthcare Software Development</h1>

            </div>


            <div class="service_choose_us">
                <div class="services_container">

                    <!-- Service 1 - Healthcare Technology Expertise -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Specializing in innovative healthcare technology solutions tailored to the unique needs of the healthcare industry, enhancing patient care and operational efficiency.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Healthcare Technology Expertise</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Custom Healthcare Software Development -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Developing custom healthcare software solutions that streamline patient management, electronic health records (EHR), and telemedicine platforms.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Custom Healthcare Software Development</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Data Security and Compliance -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Ensuring your healthcare organization’s data, including patient information and medical records, are protected with the highest security standards and regulatory compliance.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Data Security and Compliance</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Seamless Healthcare System Integration -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Implementing seamless integrations across various healthcare systems, including Electronic Health Records (EHR), Patient Portals, and Billing Systems to enhance workflow and data exchange.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Seamless Healthcare System Integration</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Innovative Healthcare Solutions -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Bringing the latest healthcare technology innovations, including AI-driven diagnostic tools, telemedicine, and health analytics to improve patient outcomes and operational efficiency.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Innovative Healthcare Solutions</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - 24/7 Healthcare Support and Maintenance -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Providing round-the-clock support and regular software updates to ensure the smooth operation of your healthcare systems and uninterrupted service delivery.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>24/7 Healthcare Support and Maintenance</h1>
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
                    Who Can Avail Our Healthcare Software Services</h1>

            </div>

            <div class="avail-section-wrapper">
                <div class="avail-section" id="scrollable-section">
                    <div class="avail-image-container" id="image-scroll">
                        <img src="images/healthcare-primary.jpg" alt="Image on Left">
                    </div>
                    <div class="avail-content-container" id="scrollable-content">
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2> Hospitals and Clinics</h2>
                            </div>
                            <p>Hospitals and clinics are the largest adopters of healthcare software. They use solutions like Electronic Health Records (EHR) and Hospital Information Systems (HIS) to manage patient data, streamline administrative tasks, improve diagnosis accuracy, and ensure smooth coordination between different departments. Software solutions also assist in scheduling, billing, inventory management, and data analytics, making day-to-day operations more efficient.</p>

                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2> Telemedicine Providers</h2>
                            </div>
                            <p>With the rise of remote healthcare, telemedicine has become a crucial field that relies heavily on healthcare software. These platforms enable virtual consultations, secure video conferencing, online appointment scheduling, and electronic prescription management. Telemedicine software helps patients receive medical advice and treatment from the comfort of their homes while providing doctors with tools to monitor patient health in real-time.</p>


                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Pharmaceutical Companies </h2>
                            </div>
                            <p>Pharmaceutical companies use specialized software for drug research, clinical trials, supply chain management, and regulatory compliance. Healthcare software helps these companies manage drug inventory, streamline distribution channels, and track medication effectiveness. This technology also supports data analysis in research and development, enabling faster innovation and bringing new drugs to the market more efficiently.</p>


                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Health Insurance Companies </h2>
                            </div>
                            <p>Health insurance companies use healthcare software to manage claims processing, policy administration, customer service, and data analytics. This software enables insurers to automate claim approvals, detect fraudulent activities, and analyze patient treatment data to make better decisions on coverage plans. Advanced data analysis tools also help in pricing models and managing risk, improving the overall efficiency of the insurance process.</p>


                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Laboratories and Diagnostic Centers </h2>
                            </div>
                            <p>Laboratories and diagnostic centers benefit from healthcare software that handles test scheduling, sample tracking, result analysis, and report generation. These tools help in efficiently managing patient data, maintaining accuracy in test results, and integrating seamlessly with hospital systems or EHR platforms. Diagnostic software reduces human error and speeds up the process of delivering accurate results to healthcare providers and patients.</p>


                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Nursing Homes and Long-Term Care Facilities</h2>
                            </div>
                            <p>Nursing homes and long-term care facilities rely on healthcare software to enhance patient care and manage daily operations. These solutions provide tools for creating personalized care plans, tracking medication schedules, monitoring patient health conditions, and ensuring proper communication among caregivers. This software plays a vital role in improving the quality of life for residents by ensuring they receive timely and personalized attention.</p>


                        </div>
                    </div>
                </div>
            </div>



            <!-- ######### Process ##########  -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">
                    Services Offered in Healthcare Software Development</h1>

            </div>

            <div class="swiper mySwiper">



                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/healthcare-service.png" alt="">
                        </div>
                        <h2>Healthcare IT Consulting</h2>
                        <p>Guiding providers to enhance efficiency with strategic IT solutions.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/healthcare-service.png" alt="">
                        </div>
                        <h2>Patient Management Software</h2>
                        <p>Streamlining appointments and billing for better patient engagement.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/healthcare-service.png" alt="">
                        </div>
                        <h2>Telemedicine Software Solutions</h2>
                        <p>Enabling virtual healthcare with video consultations and e-prescriptions.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/healthcare-service.png" alt="">
                        </div>
                        <h2>Healthcare Data Management</h2>
                        <p>Transforming medical data into insights for decision-making.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/healthcare-service.png" alt="">
                        </div>
                        <h2>Custom LIMS Development</h2>
                        <p>Automating workflows and ensuring compliance with lab standards.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/healthcare-service.png" alt="">
                        </div>
                        <h2>Regulatory Compliance Solutions</h2>
                        <p>Ensuring software compliance with HIPAA and GDPR standards.</p>
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

            <!-- #### FAQ ###  -->

            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>Healthcare Web Development FAQs</h1>
            </div>

            <section class="faq-wrapper">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What features are essential for a healthcare website?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Essential features for a healthcare website include secure patient portals, appointment scheduling, telemedicine integration, HIPAA-compliant data handling, and easy navigation. We prioritize these elements to ensure both functionality and regulatory compliance.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do you ensure HIPAA compliance in web development?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Our team follows strict HIPAA guidelines to secure patient information, including encryption protocols, secure data storage, and privacy measures for any health-related information collected or stored on the site.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can you integrate telemedicine or appointment scheduling tools?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we specialize in integrating telemedicine solutions, online appointment scheduling, and patient management systems to make it easy for patients to access services and for providers to manage their workflows.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do you make healthcare websites accessible and user-friendly?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We follow accessibility standards (like WCAG) to ensure the website is usable by people with disabilities. This includes features like screen reader compatibility, easy navigation, and text readability, all while maintaining a clean, user-friendly design.
                    </p>
                </section>
            </section>

            <!-- ##### Book #######  -->

            <section class="section-book">
                <section class="book-image">
                    <img src="images/booking-industry2.jpg" alt="">
                </section>
                <section class="book-data">



                    <h1 data-aos="zoom-in" data-aos-duration="2500">Healthcare Software Development Services</h1>
                    <p data-aos="zoom-in" data-aos-duration="2500">Comprehensive Solutions Designed to Support Healthcare Professionals</p>
                    <a href="#" class="reopenPopup" data-aos="zoom-in" data-aos-duration="2500">Connect With Us</a>
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