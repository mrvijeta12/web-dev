<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'education' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'education' AND blog_status = 'published'");
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
        include('navbar.php');
        ?>
        <div class="wrapper" data-aos="fade-right" data-aos-duration="1000">

            <!-- ##### HERO SECTION ######  -->
            <div class="hero">
                <div class="child child1">
                    <h1 class="animated-heading">
                        <span>E</span><span>d</span><span>u</span><span>c</span><span>a</span><span>t</span><span>i</span><span>o</span><span>n</span>

                        <span>S</span><span>o</span><span>f</span><span>t</span><span>w</span><span>a</span><span>r</span><span>e</span> <span>D</span><span>e</span><span>v</span><span>e</span><span>l</span><span>o</span><span>p</span><span>m</span><span>e</span><span>n</span><span>t</span> <span>S</span><span>e</span><span>r</span><span>v</span><span>i</span><span>c</span><span>e</span><span>s</span>
                    </h1>
                    <h3>Streamlining Administration with Advanced Educational Management Solutions</h3>
                    <a href="#" class="reopenPopup">Get Free Quote</a>

                </div>
                <div class="child child2">
                    <img src="images/education-hero.png" alt="" data-aos="fade-left" data-aos-duration="1000" />
                </div>
            </div>

            <!-- ####### INTRODUCTION  ####### -->

            <section class="intro">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Empowering Learning with Our Comprehensive Software Development Solutions</h1>
                <p data-aos="fade-up" data-aos-duration="1000">Our software development services for the education sector are designed to improve curriculum delivery, enhance communication, and facilitate student success. By utilizing cutting-edge technology, data-driven insights, and engaging platforms, we enable educational institutions to create interactive learning environments, streamline administrative processes, and foster collaboration among students and educators in an increasingly digital world.</p>
            </section>


            <!-- ####### details ####### -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">
                    Process We Follow To Develop Education Software</h1>

            </div>

            <section class="detail" data-aos="fade-up" data-aos-duration="1000">
                <section class="detail-title detail-child">
                    <p class="tab active-tab" onclick="toggleContent(1)">
                        <strong>01.</strong> Education Software Consulting

                    </p>
                    <p class="tab" onclick="toggleContent(2)">
                        <strong>02.</strong> Custom Education Software Development

                    </p>
                    <p class="tab" onclick="toggleContent(3)">
                        <strong>03.</strong> Education Software Product Development

                    </p>
                    <p class="tab" onclick="toggleContent(4)">
                        <strong>04.</strong> Education Software Integration

                    </p>
                    <p class="tab" onclick="toggleContent(5)">
                        <strong>05.</strong> Education Software Testing and Quality Assurance

                    </p>
                    <p class="tab" onclick="toggleContent(6)">
                        <strong>06.</strong> Education Software Modernization

                    </p>
                    <p class="tab" onclick="toggleContent(7)">
                        <strong>07.</strong> Education Software Maintenance and Support

                    </p>
                </section>
                <section class="detail-description detail-child">
                    <section id="content1" class="content">
                        <div class="content-header">
                            <img src="images/consultation.png" alt="">
                            <h3>Education Software Consulting</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We assess your educational institution's operations and technological requirements, providing strategic guidance for developing customized software solutions. Our consulting services help identify opportunities for enhancing learning outcomes, improving administrative efficiency, and fostering student engagement.</p>
                    </section>
                    <section id="content2" class="content">
                        <div class="content-header">
                            <img src="images/software-development-process.png" alt="">
                            <h3>Custom Education Software Development</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We specialize in developing tailored education software solutions that meet your specific needs. From initial coding to deploying unique features, our development process ensures your software enhances curriculum delivery and supports diverse learning styles.</p>
                    </section>
                    <section id="content3" class="content">
                        <div class="content-header">
                            <img src="images/development.png" alt="">
                            <h3>Education Software Product Development</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We focus on creating scalable, market-ready education software products that cater to schools, universities, and online learning platforms. Our product development services deliver solutions that streamline course management, improve student tracking, and enhance the overall learning experience.</p>
                    </section>
                    <section id="content4" class="content">
                        <div class="content-header">
                            <img src="images/deployment.png" alt="">
                            <h3>Education Software Integration</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>Our integration services ensure seamless connectivity between your education software and existing systems. We facilitate interoperability among platforms to enhance operational efficiency, reduce manual processes, and improve service delivery for students and educators.</p>
                    </section>
                    <section id="content5" class="content">
                        <div class="content-header">
                            <img src="images/project-analysis-health.png" alt="">
                            <h3>Education Software Testing and Quality Assurance</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We conduct thorough testing of your education software to identify bugs and vulnerabilities, ensuring it meets the highest standards of performance, security, and user satisfaction. Our quality assurance practices guarantee a reliable experience for students and educators alike.</p>
                    </section>
                    <section id="content6" class="content">
                        <div class="content-header">
                            <img src="images/moderization-process.png" alt="">
                            <h3>Education Software Modernization</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We upgrade legacy education software to meet contemporary technological standards, enhancing functionality and security. Our modernization services help educational institutions remain competitive by integrating advanced features that support evolving teaching and learning needs.</p>
                    </section>
                    <section id="content7" class="content">
                        <div class="content-header">
                            <img src="images/support-process.png" alt="">
                            <h3>Education Software Maintenance and Support</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>Our maintenance and support services provide ongoing software updates, troubleshooting, and enhancements to ensure optimal performance. We focus on resolving issues, improving functionality, and adapting software to the changing landscape of the education sector.</p>
                    </section>
                </section>
            </section>




            <!-- ######### Benefits ##########  -->
            <section class="benefits-wrapper">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Sectors that can benefits from our education software development services</h1>


                <div class="benefits-sectors">
                    <ul data-aos="fade-right" data-aos-duration="1000">
                        <li>Public Schools</li>
                        <li>Private Schools</li>
                        <li>Universities and Colleges</li>
                        <li>Vocational Training Institutions</li>
                        <li>Online Learning Platforms</li>
                        <li>Educational NGOs</li>
                    </ul>
                    <ul data-aos="fade-left" data-aos-duration="1000">
                        <li>Corporate Training Providers</li>
                        <li>Tutoring Services</li>
                        <li>Early Childhood Education Centers</li>
                        <li>Language Schools</li>
                        <li>EdTech Companies</li>
                        <li>Continuing Education Programs</li>
                    </ul>
                </div>
            </section>



            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Why Choose TekAlgo As Your Education Software Development</h1>

            </div>


            <div class="service_choose_us">

                <div class="services_container">
                    <!-- Service 1 - Education Technology Expertise -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Providing cutting-edge technology solutions tailored for the education sector, enhancing learning experiences, administrative efficiency, and student engagement.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Education Technology Expertise</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Custom Learning Management Systems -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Developing personalized learning platforms that facilitate interactive and engaging educational experiences, tailored to meet diverse learning needs.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Custom Learning Management Systems</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Data Privacy and Compliance -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Implementing stringent data security measures to protect student information and ensure compliance with educational regulations and standards.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Data Privacy and Compliance</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Seamless Integration of Tools -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Integrating various educational tools and platforms to create a cohesive learning environment that enhances collaboration and resource accessibility.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Seamless Integration of Tools</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Innovative and Scalable Solutions -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Delivering scalable and innovative educational solutions that adapt to evolving pedagogical approaches and support diverse learning methods.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Innovative and Scalable Solutions</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - Comprehensive Support and Maintenance -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Offering ongoing support and regular updates to ensure educational platforms run smoothly and effectively, enhancing the overall user experience.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Comprehensive Support and Maintenance</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>
                </div>

            </div>


            <!-- ######### who can avail ###### -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">
                    Who Can Avail Our Education Software Services</h1>

            </div>

            <div class="avail-section-wrapper">
                <div class="avail-section" id="scrollable-section">
                    <div class="avail-image-container" id="image-scroll">
                        <img src="images/education-primary.jpg" alt="Image on Left" data-aos="fade-right" data-aos-duration="1000">
                    </div>


                    <div class="avail-content-container" id="scrollable-content" data-aos="fade-left" data-aos-duration="1000">
                        <!-- Education Industry Content -->
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Student Engagement</h2>
                            </div>
                            <p>Educational institutions can create social networking platforms for students to connect,
                                collaborate on projects, and share resources. This fosters a sense of community, encourages
                                peer learning, and enhances overall engagement in academic activities, leading to improved
                                student outcomes.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Teacher Collaboration</h2>
                            </div>
                            <p>Educators can utilize social networks to share best practices, resources, and teaching
                                strategies. This collaborative environment promotes professional development, allows
                                for mentorship opportunities, and ultimately enhances the quality of education by
                                enabling teachers to learn from one another.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Parental Involvement</h2>
                            </div>
                            <p>Schools can engage parents through social networking tools, providing updates on events,
                                student progress, and opportunities for involvement. This fosters strong home-school connections,
                                encouraging parental support and collaboration, which positively impacts student achievement
                                and well-being.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Online Learning</h2>
                            </div>
                            <p>Social networking platforms can facilitate online courses and discussions, allowing students
                                to interact with instructors and peers. This enhances the learning experience by promoting
                                collaboration, networking, and knowledge sharing, making education more accessible and
                                engaging.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Extracurricular Activities</h2>
                            </div>
                            <p>Schools can use social networks to promote clubs, sports, and events, encouraging student
                                participation. This helps build a vibrant school community, fosters friendships, and enriches
                                the educational experience by providing opportunities for personal growth outside the
                                classroom.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Resource Sharing</h2>
                            </div>
                            <p>Educational institutions can create platforms for sharing teaching materials, research,
                                and study resources. This encourages collaboration among students and educators, improves
                                access to valuable information, and supports a culture of continuous learning and knowledge
                                sharing within the educational community.</p>
                        </div>
                    </div>

                </div>
            </div>



            <!-- ######### Process ##########  -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">
                    Process We Follow To Develop Heathcare Software</h1>

            </div>

            <div class="swiper mySwiper">

                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/learning-management-systems.png" alt="">
                        </div>
                        <h2>Learning Management Systems</h2>
                        <p>Comprehensive platforms for course management and online learning.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/e-learning-development.png" alt="">
                        </div>
                        <h2>E-Learning Solutions</h2>
                        <p>Interactive modules that enhance engagement and retention.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/student-information-systems.png" alt="">
                        </div>
                        <h2>Student Information Systems</h2>
                        <p>Streamlining administration and tracking student data.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/virtual-classroom-software.png" alt="">
                        </div>
                        <h2>Virtual Classroom Software</h2>
                        <p>Real-time online classes with collaborative tools.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/assessment-and-evaluation-tools.png" alt="">
                        </div>
                        <h2>Assessment Tools</h2>
                        <p>Tools for quizzes, assignments, and performance tracking.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/educational-apps-development.png" alt="">
                        </div>
                        <h2>Educational Apps Development</h2>
                        <p>Mobile apps to support learning on-the-go.</p>
                    </div>
                </div>

                <div class="swiper-pagination"></div>
            </div>

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


            <!-- ##### faq #######  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1000">
                <h1>Education Website Development FAQs</h1>
            </div>

            <section class="faq-wrapper" data-aos="zoom-in" data-aos-duration="1000">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What types of education websites do you develop?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We develop a range of education websites, including online learning platforms, school and university websites, e-learning course providers, and educational resource sites. Our designs cater to both traditional and non-traditional learning environments.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can you integrate learning management systems (LMS)?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we can integrate robust learning management systems (LMS) to facilitate online courses, track student progress, and manage assessments. This allows educational institutions to provide a comprehensive learning experience to their students.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do you ensure a user-friendly experience for students and educators?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We focus on creating intuitive user interfaces with easy navigation and clear layouts. Features such as search functionality, course categorization, and accessible resources are integrated to enhance the user experience for both students and educators.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Do you offer features for student registration and payment processing?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we offer features for student registration, account management, and secure payment processing. This makes it easy for students to enroll in courses and manage their payments directly through the website.
                    </p>
                </section>
            </section>




            <!-- ##### Book #######  -->

            <section class="section-book">
                <section class="book-image">
                    <img src="images/booking-industry.jpg" alt="">
                </section>
                <section class="book-data">



                    <h1 data-aos="fade-down" data-aos-duration="1000">Education Software Development Services</h1>
                    <p data-aos="fade-down" data-aos-duration="1000">Comprehensive Solutions Designed to Support Education Professionals</p>
                    <a href="#" class="reopenPopup" data-aos="fade-down" data-aos-duration="1000">Connect With Us</a>
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