<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'angularjs-developer' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'angularjs-developer' AND blog_status = 'published'");
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
    <link rel="stylesheet" href="assests/css/offshore-experts.css">
    <link rel="stylesheet" href="assests/css/theme.css">
    <link rel="stylesheet" href="assests/css/navbar.css">
    <link rel="stylesheet" href="assests/css/footer.css">

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
        <div class="wrapper" data-aos="fade-right" data-aos-duration="1000">

            <!-- ####### HERO SECTION ####### -->
            <div class="hero">
                <div class="child child1" data-aos="fade-right" data-aos-duration="1000">
                    <h1>Transform Your Ideas with Our Skilled Angular Developers</h1>
                    <h2>Custom Angular Solutions Tailored to Bring Your Vision to Life</h2>
                    <a href="#" class="reopenPopup">Consult Our Experts</a>
                </div>
                <div class="child child2" data-aos="fade-left" data-aos-duration="1000">
                    <img src="images/angular-developer.jpg" alt="">
                </div>
            </div>




            <!-- ####### INTRO ######### -->

            <div class="intro-wrapper">

                <div class="intro-slide intro-1" data-aos="fade-left" data-aos-duration="1000">
                    <h2>Empower Your Applications with Our Skilled Angular.JS Developers, Delivering Scalable Solutions for Enhanced User Experiences.</h2>
                    <p>Our team of expert Angular.JS developers is dedicated to creating responsive and feature-rich web applications. By leveraging the full potential of Angular.JS, we build tailored solutions that provide seamless performance and dynamic user interactions, perfectly aligned with your business goals.</p>
                    <p>Focusing on scalability and innovation, we transform your ideas into robust applications that grow with your business needs. Partner with us to experience the difference our talented Angular.JS developers can make in enhancing your digital projects.</p>
                </div>




                <div class="intro-slide intro-2">
                    <img src="images/developer-primary.jpg" alt="" data-aos="fade-right" data-aos-duration="1500">
                </div>





            </div>



            <!-- ######### Team ######  -->

            <div class="swiper mySwiper">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Engage Performance-Oriented Angular Professionals for Maximum ROI</h1>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/we-1.jpg" alt="">

                        </div>
                        <div class="swiper-slide-data">
                            <h2>Adrian</h2>
                            <p>Angular Developer</p>
                            <strong>Experience <i class="fa-solid fa-angles-right"></i> 5+ Years</strong>
                            <p>Avability <i class="fa-solid fa-angles-right"></i> Full-Time</p>
                            <a href="#" class="reopenPopup">Hire Now </a>

                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/we-2.jpg" alt="">

                        </div>
                        <div class="swiper-slide-data">
                            <h2>Adrian</h2>
                            <p>Angular Developer</p>
                            <strong>Experience <i class="fa-solid fa-angles-right"></i> 5+ Years</strong>
                            <p>Avability <i class="fa-solid fa-angles-right"></i> Full-Time</p>
                            <a href="#" class="reopenPopup">Hire Now </a>

                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/we-3.jpg" alt="">

                        </div>
                        <div class="swiper-slide-data">
                            <h2>Adrian</h2>
                            <p>Angular Developer</p>
                            <strong>Experience <i class="fa-solid fa-angles-right"></i> 5+ Years</strong>
                            <p>Avability <i class="fa-solid fa-angles-right"></i> Full-Time</p>
                            <a href="#" class="reopenPopup">Hire Now </a>

                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/we-4.jpg" alt="">

                        </div>
                        <div class="swiper-slide-data">
                            <h2>Adrian</h2>
                            <p>Angular Developer</p>
                            <strong>Experience <i class="fa-solid fa-angles-right"></i> 5+ Years</strong>
                            <p>Avability <i class="fa-solid fa-angles-right"></i> Full-Time</p>
                            <a href="#" class="reopenPopup">Hire Now </a>

                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/we-5.jpg" alt="">

                        </div>
                        <div class="swiper-slide-data">
                            <h2>Adrian</h2>
                            <p>Angular Developer</p>
                            <strong>Experience <i class="fa-solid fa-angles-right"></i> 5+ Years</strong>
                            <p>Avability <i class="fa-solid fa-angles-right"></i> Full-Time</p>
                            <a href="#" class="reopenPopup">Hire Now </a>

                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/we-6.jpg" alt="">

                        </div>
                        <div class="swiper-slide-data">
                            <h2>Adrian</h2>
                            <p>Angular Developer</p>
                            <strong>Experience <i class="fa-solid fa-angles-right"></i> 5+ Years</strong>
                            <p>Avability <i class="fa-solid fa-angles-right"></i> Full-Time</p>
                            <a href="#" class="reopenPopup">Hire Now </a>

                        </div>
                    </div>

                </div>
                <div class="swiper-pagination"></div>
            </div>



            <!-- ####### WORKING WITH US ######  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1000">
                <h1>Explore the Range of Services Provided by Angular Developers</h1>

            </div>
            <section class="work-wrapper">

                <section class="work-wrapper-child">
                    <section class="work-child" data-aos="fade-right" data-aos-duration="1000">
                        <h2>Single-Page Application Development</h2>
                        <p>AngularJS developers specialize in building single-page applications (SPAs) that deliver a
                            smooth user experience. By leveraging AngularJS’s data binding and routing capabilities, they
                            create responsive interfaces that load content dynamically without refreshing the entire page,
                            enhancing performance and user satisfaction.</p>
                    </section>
                    <section class="work-child" data-aos="fade-left" data-aos-duration="1000">
                        <h2>Component-Based Architecture</h2>
                        <p>AngularJS promotes a component-based architecture, and developers utilize this to create reusable
                            components. This modular approach simplifies development and maintenance, allowing for better
                            organization of code. By breaking applications into manageable components, developers can easily
                            update or replace parts of the application as needed.</p>
                    </section>
                    <section class="work-child" data-aos="fade-right" data-aos-duration="1000">
                        <h2>Two-Way Data Binding</h2>
                        <p>One of AngularJS's standout features is two-way data binding, allowing real-time synchronization between
                            the model and the view. AngularJS developers implement this feature to ensure that changes in the user
                            interface automatically reflect in the data model, improving interactivity and user engagement
                            in applications.</p>
                    </section>
                    <section class="work-child" data-aos="fade-left" data-aos-duration="1000">
                        <h2>RESTful API Integration</h2>
                        <p>Integrating RESTful APIs is crucial for AngularJS developers to enhance application functionality.
                            They connect front-end components with back-end services, enabling data retrieval and manipulation.
                            This integration allows developers to create dynamic applications that respond to user actions and
                            update content seamlessly.
                        </p>
                    </section>
                    <section class="work-child" data-aos="fade-right" data-aos-duration="1000">
                        <h2>Testing and Quality Assurance</h2>
                        <p>AngularJS developers prioritize testing and quality assurance to ensure application reliability.
                            They utilize testing frameworks like Jasmine and Protractor to conduct unit and end-to-end tests.
                            This rigorous approach helps identify issues early, ensuring robust applications that meet user
                            expectations and perform reliably.</p>
                    </section>
                    <section class="work-child" data-aos="fade-left" data-aos-duration="1000">
                        <h2>Performance Optimization Techniques</h2>
                        <p>Optimizing AngularJS applications for performance is essential for user satisfaction.
                            evelopers focus on strategies like lazy loading, optimizing digest cycles, and minimizing
                            the number of watchers. By improving application speed and responsiveness, they enhance
                            user experience and reduce bounce rates.</p>
                    </section>

                </section>

            </section>



            <!-- ####### why choose us ########  -->
            <div class="about_container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Why Hire Angular Developers From TekAlgo?</h1>

            </div>


            <div class="service_choose_us">

                <div class="services_container">

                    <!-- Service 1 - Angular Application Development -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>Building scalable and robust Angular applications, ensuring seamless performance across different platforms, while enhancing the user experience with advanced features and responsive design integration.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Angular Application Development</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Component-Based Architecture -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>Designing reusable and maintainable components for better modularity, enhancing code reusability, and ensuring efficient application structure for large-scale, complex Angular projects.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Component-Based Architecture</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Dynamic Routing Solutions -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>Implementing dynamic and flexible routing solutions in Angular applications, ensuring smooth navigation and an optimized user experience, regardless of the application’s complexity or structure.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Dynamic Routing Solutions</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - State Management Strategies -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>Utilizing NgRx for efficient state management in Angular applications, ensuring smooth data flow, better state handling, and improved scalability while reducing complexity in large projects.</p>
                            <img src="images/star.png" alt="" />
                            <h1>State Management Strategies</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Performance Optimization Techniques -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>Optimizing Angular application performance using techniques like lazy loading, Ahead of Time (AOT) compilation, and efficient resource management, leading to faster load times and improved performance.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Performance Optimization Techniques</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - Testing and Quality Assurance -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>Conducting comprehensive testing for Angular applications using various tools and methodologies to ensure high-quality, bug-free code and deliver scalable applications that meet all requirements.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Testing and Quality Assurance</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                </div>

            </div>



            <!-- ##### why hire from us #####  -->
            <div class="about_container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">
                    Experience Numerous Advantages When You Hire Our Angular Experts</h1>

            </div>

            <div class="avail-section-wrapper">
                <div class="avail-section" id="scrollable-section">
                    <div class="avail-image-container" id="image-scroll">
                        <img src="images/web-developer-experts-benefits.jpg" alt="Image on Left" data-aos="fade-right" data-aos-duration="1000">
                    </div>


                    <div class="avail-content-container" id="scrollable-content" data-aos="fade-left" data-aos-duration="1000">
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Proficient Developers</h2>
                            </div>
                            <p>Our AngularJS developers are highly proficient in crafting responsive and feature-rich applications. Their expertise ensures your project utilizes the latest advancements in AngularJS for a seamless user experience.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Tailored Development</h2>
                            </div>
                            <p>We offer customized AngularJS solutions tailored to your specific needs. By collaborating closely with you, we create applications that align with your business goals and enhance overall functionality.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>On-Time Delivery</h2>
                            </div>
                            <p>We understand the importance of deadlines, and our team is dedicated to delivering your AngularJS projects on time. Our efficient development process ensures that you can launch your application as scheduled.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Scalability Focus</h2>
                            </div>
                            <p>Our AngularJS applications are designed with scalability in mind. This allows your project to grow and adapt easily as your business needs change, providing long-term value and flexibility.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Enhanced User Engagement</h2>
                            </div>
                            <p>With a focus on interactive design, our AngularJS solutions boost user engagement. We implement features that keep users interested and encourage them to explore your application further.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Comprehensive Maintenance</h2>
                            </div>
                            <p>After your application goes live, we provide thorough maintenance and support. Our team is always available to troubleshoot issues, implement updates, and ensure your AngularJS solution runs smoothly over time.</p>
                        </div>
                    </div>

                </div>
            </div>









            <!-- ######## collaboration #####  -->
            <section class="collaboration-wrapper">r
                <section class="collaboration-header" data-aos="zoom-in" data-aos-duration="1000">
                    <h1>Simple Steps to Begin Your Journey with Our Angular Team</h1>
                </section>
                <section class="collaboration-child-wrapper" data-aos="fade-up" data-aos-duration="1000">
                    <section class="collaboration-child" id="collaboration-child-1">
                        <section class="collaboration-child-image">
                            <img src="images/requirement.png" alt="">
                        </section>
                        <section class="collaboration-child-data">
                            <h2>Provide Your Requirements <span><i class="fa-solid fa-right-long"></i></span> </h2>
                            <p>Clearly outline your project specifications and expectations. This allows us to understand your needs better and ensures we find the right candidates who align with your objectives.</p>

                        </section>

                    </section>
                    <section class="collaboration-child" id="collaboration-child-2">
                        <section class="collaboration-child-image">
                            <img src="images/project-evaluation.png" alt="">
                        </section>
                        <section class="collaboration-child-data">
                            <h2>Select Candidates for Review <span><i class="fa-solid fa-right-long"></i></span></h2>
                            <p>After gathering requirements, we will curate a list of qualified candidates for your review. You can assess their skills, experience, and fit for your project’s unique demands.</p>

                        </section>
                    </section>
                    <section class="collaboration-child" id="collaboration-child-3">
                        <section class="collaboration-child-image">
                            <img src="images/nda.png" alt="">
                        </section>
                        <section class="collaboration-child-data">
                            <h2>Identify the Ideal Candidate<span><i class="fa-solid fa-right-long"></i></span></h2>
                            <p>Evaluate the shortlisted candidates based on their qualifications and your criteria. Conduct interviews to gain insights into their expertise, ensuring you select the best match for your needs.</p>

                        </section>
                    </section>
                    <section class="collaboration-child" id="collaboration-child-4">
                        <section class="collaboration-child-image">
                            <img src="images/interview.png" alt="">
                        </section>
                        <section class="collaboration-child-data">
                            <h2> Begin the Onboarding Process <span><i class="fa-solid fa-right-long"></i></span></h2>
                            <p>Once you’ve chosen the right candidate, we’ll initiate the onboarding process. This includes introducing them to your team, sharing project details, and ensuring they have all necessary resources.</p>

                        </section>
                    </section>
                </section>
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

            <!-- ############## faq ############  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1000">
                <h1>Angular Development Services FAQs</h1>
            </div>

            <section class="faq-wrapper" data-aos="zoom-in" data-aos-duration="1000">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What types of projects are best suited for Angular developers?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Angular developers are ideal for building dynamic single-page applications, complex enterprise solutions, and applications requiring robust data handling. They specialize in developing scalable, modular web applications that offer a seamless user experience.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How does Angular help with building scalable applications?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Angular's modular structure, component-based architecture, and dependency injection make it easier to scale applications as they grow. Angular developers can add new features and modules without impacting the existing code, ensuring maintainability and scalability.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Do Angular developers handle front-end and back-end integration?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, Angular developers are skilled at integrating front-end interfaces with back-end APIs. They use services and HTTP client modules within Angular to communicate with back-end systems, enabling real-time data synchronization and seamless user interactions.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do Angular developers ensure performance optimization?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Angular developers optimize performance through lazy loading, Ahead-of-Time (AOT) compilation, and efficient change detection. These techniques reduce load times and ensure that applications run smoothly, even with large amounts of data.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What role does Angular play in building responsive applications?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Angular developers use Angular Material, CSS Flexbox, and media queries to build responsive applications. These tools allow them to create layouts that adapt to any device, ensuring a consistent user experience on desktops, tablets, and mobile phones.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do Angular developers handle security in applications?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Angular developers prioritize security by implementing built-in Angular features like DOM sanitization and HTTP interceptors to protect against XSS attacks and CSRF vulnerabilities. They follow best practices to safeguard sensitive data and ensure secure application interactions.
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