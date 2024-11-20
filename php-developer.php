<?php

include_once 'db.php';


// Fetch all blog posts with slug, summary, and feature image
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs WHERE category = 'php-developer' ORDER BY id DESC";
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
    <link rel="stylesheet" href="assests/css/offshore-experts.css">

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

            <!-- ####### HERO SECTION ####### -->
            <div class="hero">
                <div class="child child1">
                    <h1 data-aos="zoom-in" data-aos-duration="2500">Transform Your Ideas with Our Skilled PHP Developers</h1>
                    <h2 data-aos="zoom-in" data-aos-duration="2500">Custom PHP Solutions Tailored to Bring Your Vision to Life</h2>
                    <a href="https://calendly.com/salesfocesclouds/30min" data-aos="zoom-in" data-aos-duration="2500">Consult Our Experts</a>
                </div>
                <div class="child child2">
                    <img src="./images/php-developer.jpg" alt="">
                </div>
            </div>




            <!-- ####### INTRO ######### -->

            <div class="intro-wrapper">

                <div class="intro-slide intro-1" data-aos="fade-up" data-aos-duration="1500">
                    <h2>Transform Your Ideas into Reality with Our Experienced PHP Developers, Delivering Custom Solutions for Your Business.</h2>
                    <p>Our skilled PHP developers are dedicated to building dynamic and robust web applications that align with your specific business objectives. By leveraging PHP's flexibility and power, we create custom solutions that enhance functionality and user experience.</p>
                    <p>With a strong emphasis on code quality and performance optimization, we ensure your PHP applications are scalable and maintainable, allowing your business to grow seamlessly. Collaborate with us to elevate your online presence and achieve your goals.</p>
                </div>




                <div class="intro-slide intro-2" data-aos="fade-down" data-aos-duration="1500">
                    <img src="./images/developer-primary.jpg" alt="">
                </div>





            </div>



            <!-- ######### Team ######  -->

            <div class="swiper mySwiper">
                <h1>Engage Performance-Oriented Php Professionals for Maximum ROI</h1>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/we-1.jpg" alt="">

                        </div>
                        <div class="swiper-slide-data">
                            <h2>Adrian</h2>
                            <p>php Developer</p>
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
                            <p>php Developer</p>
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
                            <p>php Developer</p>
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
                            <p>php Developer</p>
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
                            <p>php Developer</p>
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
                            <p>php Developer</p>
                            <strong>Experience <i class="fa-solid fa-angles-right"></i> 5+ Years</strong>
                            <p>Avability <i class="fa-solid fa-angles-right"></i> Full-Time</p>
                            <a href="#" class="reopenPopup">Hire Now </a>


                        </div>
                    </div>

                </div>
                <div class="swiper-pagination"></div>
            </div>



            <!-- ####### WORKING WITH US ######  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>Explore the Range of Services Provided by Php Developers</h1>

            </div>
            <section class="work-wrapper">

                <section class="work-wrapper-child">
                    <section class="work-child">
                        <h2>Custom PHP Development</h2>
                        <p>PHP developers create tailored web applications to meet specific business needs.
                            They leverage PHP’s versatility to design and implement unique functionalities,
                            ensuring robust performance and a seamless user experience.</p>
                    </section>
                    <section class="work-child">
                        <h2>PHP Framework Development</h2>
                        <p>Developers utilize popular PHP frameworks, such as Laravel and Symfony, to build
                            scalable and maintainable applications. Framework development enhances code efficiency
                            and security while speeding up the development process for complex projects.</p>
                    </section>
                    <section class="work-child">
                        <h2> PHP CMS Development</h2>
                        <p>Creating custom content management systems (CMS) is a key service. PHP developers build
                            user-friendly CMS solutions that allow businesses to manage their content easily while
                            providing flexibility and customization according to their requirements.</p>
                    </section>
                    <section class="work-child">
                        <h2>API Development and Integration</h2>
                        <p>PHP developers specialize in creating and integrating APIs for various applications.
                            They enable seamless communication between systems, allowing businesses to enhance
                            functionality and improve user experiences through third-party integrations.</p>
                    </section>
                    <section class="work-child">
                        <h2> Ongoing Maintenance and Support</h2>
                        <p>Regular maintenance is vital for PHP applications. Developers provide updates,
                            security patches, and troubleshooting services, ensuring optimal performance and
                            helping businesses stay current with the latest PHP advancements.</p>
                    </section>
                    <section class="work-child">
                        <h2>Performance Optimization Services</h2>
                        <p>To improve application performance, PHP developers implement optimization strategies.
                            They analyze code efficiency, database queries, and server configurations to enhance
                            speed and responsiveness, ensuring a better user experience overall.</p>
                    </section>

                </section>

            </section>



            <!-- ####### why choose us ########  -->
            <div class="about_container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Why Hire Php Developers From TekAlgo?</h1>

            </div>

            <div class="service_choose_us">

                <div class="services_container">
                    <!-- Service 1 - PHP Gurus -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Experienced PHP developers who specialize in handling complex challenges and delivering scalable solutions tailored to meet your business needs with robust coding practices.</p>
                            <img src="images/star.png" alt="">
                            <h1>PHP Gurus</h1>
                        </div>
                        <button class="read-more-btn">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Dynamic Web Solutions -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>We create interactive and user-friendly websites, combining the latest technologies with intuitive design to deliver a seamless experience across all devices and platforms.</p>
                            <img src="images/star.png" alt="">
                            <h1>Dynamic Web Solutions</h1>
                        </div>
                        <button class="read-more-btn">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Customized Development -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Our development solutions are tailored to your specific business requirements, ensuring that your project reflects your vision and drives success for your company.</p>
                            <img src="images/star.png" alt="">
                            <h1>Customized Development</h1>
                        </div>
                        <button class="read-more-btn">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Rigorous Testing -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>We conduct thorough testing to ensure that your application runs flawlessly, identifying potential issues early and delivering a high-quality, bug-free product.</p>
                            <img src="images/star.png" alt="">
                            <h1>Rigorous Testing</h1>
                        </div>
                        <button class="read-more-btn">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Budget-Friendly Options -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>We provide high-quality PHP development services that are cost-effective, ensuring you get the best value for your investment without compromising on quality.</p>
                            <img src="images/star.png" alt="">
                            <h1>Budget-Friendly Options</h1>
                        </div>
                        <button class="read-more-btn">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - Expert Guidance -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>We offer ongoing support and consultation to guide your projects from conception to completion, ensuring you make informed decisions every step of the way.</p>
                            <img src="images/star.png" alt="">
                            <h1>Expert Guidance</h1>
                        </div>
                        <button class="read-more-btn">
                            Read More
                        </button>
                    </div>

                </div>

            </div>


            <!-- ##### why hire from us #####  -->
            <div class="about_container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">
                    Experience Numerous Advantages When You Hire Our Php Experts</h1>

            </div>

            <div class="avail-section-wrapper">
                <div class="avail-section" id="scrollable-section">
                    <div class="avail-image-container" id="image-scroll">
                        <img src="./images/web-developer-experts-benefits.jpg" alt="Image on Left">
                    </div>


                    <div class="avail-content-container" id="scrollable-content">
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>Hire PHP Experts</h2>
                            </div>
                            <p>Bringing in experienced PHP developers ensures your project benefits from their extensive knowledge and skills. Their ability to quickly troubleshoot issues and implement solutions streamlines development processes, saving you time and resources while delivering a high-quality product.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>Custom Solutions</h2>
                            </div>
                            <p>PHP experts create tailored applications that align with your unique business requirements. They work closely with you to understand your vision, enabling them to develop customized features and functionalities that enhance user engagement and drive your business goals forward.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>Up-to-Date Knowledge</h2>
                            </div>
                            <p>Staying current with the latest PHP frameworks, tools, and best practices, our experts ensure your application is built with modern standards. This knowledge not only improves performance but also positions your project competitively in a fast-evolving digital landscape.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>Code Quality and Maintenance</h2>
                            </div>
                            <p>Our developers prioritize clean, maintainable code, which simplifies future updates and scaling. With a focus on best coding practices, they ensure that your application remains robust, making it easier for your team to manage and enhance over time.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>Security Best Practices</h2>
                            </div>
                            <p>Hiring PHP experts means prioritizing security. They are well-versed in the latest security measures and practices, ensuring your application is safeguarded against vulnerabilities and threats, protecting both your data and your users.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>Performance Optimization</h2>
                            </div>
                            <p>Expert developers know how to optimize PHP applications for speed and efficiency. They employ techniques to enhance load times and overall performance, resulting in a smoother user experience and improved satisfaction.</p>
                        </div>
                    </div>

                </div>
            </div>









            <!-- ######## collaboration #####  -->
            <section class="collaboration-wrapper">r
                <section class="collaboration-header">
                    <h1>Simple Steps to Begin Your Journey with Our Php Team</h1>
                </section>
                <section class="collaboration-child-wrapper">
                    <section class="collaboration-child" id="collaboration-child-1">
                        <section class="collaboration-child-image">
                            <img src="./images/requirement.png" alt="">
                        </section>
                        <section class="collaboration-child-data">
                            <h2>Provide Your Requirements <span><i class="fa-solid fa-right-long"></i></span> </h2>
                            <p>Clearly outline your project specifications and expectations. This allows us to understand your needs better and ensures we find the right candidates who align with your objectives.</p>

                        </section>

                    </section>
                    <section class="collaboration-child" id="collaboration-child-2">
                        <section class="collaboration-child-image">
                            <img src="./images/project-evaluation.png" alt="">
                        </section>
                        <section class="collaboration-child-data">
                            <h2>Select Candidates for Review <span><i class="fa-solid fa-right-long"></i></span></h2>
                            <p>After gathering requirements, we will curate a list of qualified candidates for your review. You can assess their skills, experience, and fit for your project’s unique demands.</p>

                        </section>
                    </section>
                    <section class="collaboration-child" id="collaboration-child-3">
                        <section class="collaboration-child-image">
                            <img src="./images/nda.png" alt="">
                        </section>
                        <section class="collaboration-child-data">
                            <h2>Identify the Ideal Candidate<span><i class="fa-solid fa-right-long"></i></span></h2>
                            <p>Evaluate the shortlisted candidates based on their qualifications and your criteria. Conduct interviews to gain insights into their expertise, ensuring you select the best match for your needs.</p>

                        </section>
                    </section>
                    <section class="collaboration-child" id="collaboration-child-4">
                        <section class="collaboration-child-image">
                            <img src="./images/interview.png" alt="">
                        </section>
                        <section class="collaboration-child-data">
                            <h2> Begin the Onboarding Process <span><i class="fa-solid fa-right-long"></i></span></h2>
                            <p>Once you’ve chosen the right candidate, we’ll initiate the onboarding process. This includes introducing them to your team, sharing project details, and ensuring they have all necessary resources.</p>

                        </section>
                    </section>
                </section>
            </section>

            <!-- ###### Blogs #####  -->


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

            <!-- ############### faq ############  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>PHP Development Services FAQs</h1>
            </div>

            <section class="faq-wrapper">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What types of applications can PHP developers create?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        PHP developers can create a variety of applications, including dynamic websites, web applications, content management systems (CMS), e-commerce platforms, and RESTful APIs. PHP's versatility allows for building anything from small personal blogs to large-scale enterprise applications.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do PHP developers ensure application security?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        PHP developers prioritize security by following best practices such as input validation, output sanitization, using prepared statements for database interactions, and implementing proper session management. They also stay updated on common vulnerabilities like SQL injection and XSS to mitigate risks.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can PHP developers integrate third-party services?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, PHP developers can easily integrate third-party services, such as payment gateways, social media APIs, and analytics tools. They utilize various PHP libraries and frameworks to connect these services, enhancing application functionality and user experience.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do PHP developers handle database management?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        PHP developers use database management systems like MySQL, PostgreSQL, and SQLite to handle data storage and retrieval. They write efficient SQL queries and utilize PHP's PDO or MySQLi extensions to manage database connections and ensure data integrity.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What are some best practices for PHP development?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Best practices for PHP development include following the MVC (Model-View-Controller) architecture, using frameworks like Laravel or Symfony for robust application structure, writing clean and maintainable code, and implementing unit testing to ensure code quality and reliability.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do PHP developers ensure application performance?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        PHP developers enhance application performance by optimizing code, using caching mechanisms like OPcache or Memcached, and minimizing database queries. They also analyze and monitor application performance using profiling tools to identify bottlenecks and improve speed.
                    </p>
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
    <?php include('pop.php'); ?>

</body>

</html>