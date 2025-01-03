<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'home' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'home' AND blog_status = 'published'");
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
    <link rel="stylesheet" href="assests/css/home.css">
    <link rel="stylesheet" href="assests/css/theme.css">
    <link rel="stylesheet" href="assests/css/navbar.css">
    <link rel="stylesheet" href="assests/css/footer.css">





    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <script src="https://kit.fontawesome.com/cdf9a174a4.js" crossorigin="anonymous"></script>



</head>

<body>
    <div>
        <?php include('navbar.php'); ?>
        <div class="wrapper" data-aos="fade-right" data-aos-duration="1000">

            <!-- ######### HERO SECTION #######  -->
            <div class="hero">
                <h1 data-aos="fade-up" data-aos-duration="1500">Innovative IT Solutions for the Digital Era</h1>
                <h2 data-aos="fade-up" data-aos-duration="1500">Empowering businesses with cutting-edge technology and tailored software solutions</h2>
                <a href="#" class="reopenPopup" data-aos="fade-up" data-aos-duration="1500">Book Free Consultation</a>
            </div>

            <!-- ######## Intro ########  -->



            <div class="container" data-aos="zoom-in" data-aos-duration="1000">
                <h1>Delivering Innovative Services to Propel Your Success Forward</h1>

            </div>

            <!-- ############ services ############  -->




            <div class="swiper">
                <div class="swiper-wrapper">

                    <div class="swiper-slide slide-1" data-aos="fade-up-right" data-aos-duration="1000">
                        <a href="web-development.php">
                            <div class="swiper-slide-image">
                                <img src="images/web.png" alt="">
                            </div>
                            <div class="swiper-slide-text">
                                <h3>WEB DEVELOPMENT</h3>

                            </div>

                            <div class="swiper-slide-text-details">
                                <p><span><i class="fa-solid fa-angles-right"></i></span>MERN </p>
                                <p><span><i class="fa-solid fa-angles-right"></i></span> PHP</p>
                                <p><span><i class="fa-solid fa-angles-right"></i></span> JAMstack</p>
                                <p><span><i class="fa-solid fa-angles-right"></i></span> Django Stack</p>
                                <p><span><i class="fa-solid fa-angles-right"></i></span> Wordpress</p>

                            </div>




                        </a>
                    </div>



                    <div class="swiper-slide slide-2" data-aos="fade-up-left" data-aos-duration="1000">
                        <a href="custom-software.php">
                            <div class="swiper-slide-image">
                                <img src="images/web.png" alt="">
                            </div>
                            <div class="swiper-slide-text">
                                <h3>CRM Development</h3>

                            </div>

                            <div class="swiper-slide-text-details">
                                <p><span><i class="fa-solid fa-angles-right"></i></span> Lorem, ipsum dolor.</p>
                                <p><span><i class="fa-solid fa-angles-right"></i></span> Lorem, ipsum dolor.</p>
                                <p><span><i class="fa-solid fa-angles-right"></i></span> Lorem, ipsum dolor.</p>
                                <p><span><i class="fa-solid fa-angles-right"></i></span> Lorem, ipsum dolor.</p>
                                <p><span><i class="fa-solid fa-angles-right"></i></span> Lorem, ipsum dolor.</p>

                            </div>



                        </a>
                    </div>





                </div>
                <!-- <div class="swiper-pagination"></div> -->
            </div>



            <!-- ########## TECHNOLOGIES  #######  -->

            <div class="container" data-aos="zoom-in" data-aos-duration="1000">
                <h1>Innovative Technologies Powering Our Web Development Services</h1>

            </div>
            <div class="service_choose_us">



                <div class="services_container">
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <img src="images/html.png" alt="">
                        <h2>HTML</h2>
                        <!-- <p>Comprehensive Salesforce services for custom CRM solutions and seamless implementation.</p> -->
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <img src="images/css-3.png" alt="">
                        <h2>CSS</h2>
                        <!-- <p>Comprehensive Salesforce services for custom CRM solutions and seamless implementation.</p> -->
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <img src="images/bootstrap1.png" alt="">
                        <h2>BootStrap</h2>
                        <!-- <p>Comprehensive Salesforce services for custom CRM solutions and seamless implementation.</p> -->
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <img src="images/react.png" alt="">
                        <h2>React</h2>
                        <!-- <p>Comprehensive Salesforce services for custom CRM solutions and seamless implementation.</p> -->
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <img src="images/next.webp" alt="">
                        <h2>Next.js</h2>
                        <!-- <p>Customized Salesforce solutions to enhance CRM functionality and business processes.</p> -->
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <img src="images/Angular_full_color_logo.svg.png" alt="">
                        <h2>Angular</h2>
                        <!-- <p>Seamless Salesforce integration services to unify systems and boost productivity.</p> -->
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <img src="images/node.js.png" alt="">
                        <h2>Node.js</h2>
                        <!-- <p>Advanced Salesforce CRM analytics services for data-driven insights and growth.</p> -->
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <img src="images/php.png" alt="">
                        <h2>PhP</h2>
                        <!-- <p>Salesforce AI solutions for smarter insights, automation, and business growth.</p> -->
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <img src="images/wordpress.png" alt="">
                        <h2>Wordpress</h2>
                        <!-- <p>Salesforce AI solutions for smarter insights, automation, and business growth.</p> -->
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <img src="images/js.png" alt="">
                        <h2>JavaScript</h2>
                        <!-- <p>Advanced Salesforce Data Cloud services for secure, scalable data management solutions.</p> -->
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <img src="images/java.png" alt="">
                        <h2>Java</h2>
                        <!-- <p>Advanced Salesforce Data Cloud services for secure, scalable data management solutions.</p> -->
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <img src="images/python.png" alt="">
                        <h2>Python</h2>
                        <!-- <p>Advanced Salesforce Data Cloud services for secure, scalable data management solutions.</p> -->
                    </div>


                </div>

            </div>


            <!-- ####### WORKING WITH US ######  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1000">
                <h1>Unlock Your Potential by Collaborating with Tekalgo Team</h1>
            </div>
            <section class="work-wrapper">

                <section class="work-wrapper-child">
                    <section class="work-child" data-aos="fade-right" data-aos-duration="1000">
                        <h2>Performance-Driven and Customer-Focused</h2>
                        <p>We prioritize delivering high-impact results while keeping the customer’s needs front and center. Our goal is to transform challenges into opportunities, enhancing customer satisfaction and fueling business growth.</p>
                    </section>
                    <section class="work-child" data-aos="fade-left" data-aos-duration="1000">
                        <h2>Reliable, Prompt, and Highly Respected</h2>
                        <p>We are committed to delivering dependable solutions with speed and precision. Our reputation for excellence is built on trust, timely execution, and the recognition we earn from clients and industry leaders alike.</p>
                    </section>
                    <section class="work-child" data-aos="fade-right" data-aos-duration="1000">
                        <h2>Skilled and Knowledgeable Experts</h2>
                        <p>Our team consists of highly skilled professionals with deep expertise. We bring a wealth of knowledge and innovative thinking to every project, ensuring exceptional results and value for our clients.</p>
                    </section>
                    <section class="work-child" data-aos="fade-left" data-aos-duration="1000">
                        <h2>Collaborative, Open, and Engaging</h2>
                        <p>We foster a culture of teamwork, openness, and clear communication. Our focus on collaboration ensures that every voice is heard, and we maintain transparency to build trust and drive collective success.</p>
                    </section>

                </section>

            </section>


            <!-- #### collaboration #####  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1000">
                <h1> Easy Steps to Follow to Start Collaboration With Us</h1>
            </div>
            <section class="collaboration-wrapper">

                <section class="collaboration-child-wrapper">
                    <section class="collaboration-child" id="collaboration-child-1">
                        <section class="collaboration-child-image">
                            <img src="images/requirement.png" alt="">
                        </section>
                        <section class="collaboration-child-data">
                            <h2>Share your Requirement <span><i class="fa-solid fa-right-long"></i></span> </h2>
                            <p>Define your project goals and needs with our team. We'll gather your requirements and present a customized proposal, outlining the scope, deliverables, timeline, and cost estimates.</p>

                        </section>

                    </section>
                    <section class="collaboration-child" id="collaboration-child-2">
                        <section class="collaboration-child-image">
                            <img src="images/project-evaluation.png" alt="">
                        </section>
                        <section class="collaboration-child-data">
                            <h2>Project Evaluation <span><i class="fa-solid fa-right-long"></i></span></h2>
                            <p>Assess project feasibility and resource needs. We'll develop a detailed action plan, addressing potential risks and setting clear milestones to ensure smooth execution and measurable progress.</p>

                        </section>
                    </section>
                    <section class="collaboration-child" id="collaboration-child-3">
                        <section class="collaboration-child-image">
                            <img src="images/nda.png" alt="">
                        </section>
                        <section class="collaboration-child-data">
                            <h2>NDA <span><i class="fa-solid fa-right-long"></i></span></h2>
                            <p>Protect sensitive information with a customized NDA. We ensure confidentiality, data security, and mutual agreement to safeguard your intellectual property throughout the project collaboration.</p>

                        </section>
                    </section>
                    <section class="collaboration-child" id="collaboration-child-4">
                        <section class="collaboration-child-image">
                            <img src="images/interview.png" alt="">
                        </section>
                        <section class="collaboration-child-data">
                            <h2>Interview with an Expert <span><i class="fa-solid fa-right-long"></i></span></h2>
                            <p>Connect with our top experts for a tailored discussion. Evaluate their skills, industry knowledge, and alignment with your project goals to make an informed decision on the best fit.</p>

                        </section>
                    </section>
                </section>
            </section>

            <!-- ############### HOW WE WORK Roadmap ############  -->
            <section class="workflow-wrapper">
                <section class="workflow-data">
                    <h1 data-aos="zoom-in" data-aos-duration="1000">How Tekalgo Experts Elevate Your Online Business Success</h1>
                    <img src="images/Roadmap image.png" alt="" data-aos="fade-up" data-aos-duration="1000">
                </section>



            </section>


            <!-- ########## animated Counter ####### -->

            <div class="container" data-aos="zoom-in" data-aos-duration="1000">
                <h1> Reasons to Choose Our Web Development</h1>
            </div>
            <div class="counter_wrapper" data-aos="flip-up" data-aos-duration="2000">
                <div class="counter" data-target="150">
                    <div class="counter-image">

                        <img src="images/projects.png" alt="">
                    </div>
                    <div class="counter-data">
                        <span class="count">0</span>+
                        <div>
                            <span id="counter-text">Projects Completed</span>
                        </div>

                    </div>
                </div>
                <div class="counter" data-target="250">
                    <div class="counter-image">

                        <img src="images/custumer.png" alt="">
                    </div>
                    <div class="counter-data">
                        <span class="count">0</span>+
                        <div>
                            <span id="counter-text">Happy Clients</span>
                        </div>

                    </div>

                </div>
                <div class="counter" data-target="300">
                    <div class="counter-image">

                        <img src="images/member.png" alt="">
                    </div>
                    <div class="counter-data">
                        <span class="count">0</span>+

                        <div>
                            <span id="counter-text">Members</span>
                        </div>

                    </div>
                </div>
            </div>



            <!-- ###### blogs ####  -->

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
                        <h1>What services do you offer for web development?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We offer a range of web development services, including front-end and back-end development, custom website design, responsive web development, and e-commerce solutions.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How long does it take to build a website?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        The time required depends on the project’s complexity and scope. A simple website might take 1-2 weeks, while more complex projects could take several months.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Will my website be mobile-friendly?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we ensure that all websites are fully responsive and optimized for mobile devices, providing an excellent user experience across different screen sizes.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Do you provide ongoing maintenance and support?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we offer ongoing maintenance and support to ensure your website stays updated, secure, and performs at its best. Our support includes updates, troubleshooting, and performance optimization.
                    </p>
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