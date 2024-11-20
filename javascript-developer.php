<?php

include_once 'db.php';


// Fetch all blog posts with slug, summary, and feature image
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs WHERE category = 'javascript-developer' ORDER BY id DESC";
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
            <!-- <div class="hero">
                <h1 data-aos="zoom-in" data-aos-duration="2500">Transform Your Ideas with Our Skilled JavaScript Developers</h1>
                <h2 data-aos="zoom-in" data-aos-duration="2500">Custom JavaScript Solutions Tailored to Bring Your Vision to Life</h2>
                <a href="https://calendly.com/salesfocesclouds/30min" data-aos="zoom-in" data-aos-duration="2500">Book Free Consultation</a>
            </div> -->

            <div class="hero">
                <div class="child child1">
                    <h1 data-aos="zoom-in" data-aos-duration="2500">Transform Your Ideas with Our Skilled JavaScript Developers</h1>
                    <h2 data-aos="zoom-in" data-aos-duration="2500">Custom JavaScript Solutions Tailored to Bring Your Vision to Life</h2>
                    <a href="https://calendly.com/salesfocesclouds/30min" data-aos="zoom-in" data-aos-duration="2500">Consult Our Experts</a>
                </div>
                <div class="child child2">
                    <img src="./images/javascript-developer.jpg" alt="">
                </div>
            </div>




            <!-- ####### INTRO ######### -->

            <div class="intro-wrapper">



                <div class="intro-slide intro-1" data-aos="fade-up" data-aos-duration="1500">
                    <h2>Unlock Interactive Web Experiences with Our Expert JavaScript Developers, Building Dynamic Solutions That Engage and Delight.</h2>
                    <p>Our team of expert JavaScript developers specializes in creating interactive and engaging web applications. By harnessing the power of JavaScript and employing the latest frameworks, we build custom solutions that provide dynamic user experiences, driving engagement and enhancing your online presence.</p>
                    <p>With a strong focus on innovation and technical excellence, we deliver results that transform your web projects into captivating experiences. Partner with us to bring your ideas to life and see how our skilled JavaScript developers can elevate your digital presence.</p>
                </div>




                <div class="intro-slide intro-2" data-aos="fade-down" data-aos-duration="1500">
                    <img src="./images/developer-primary.jpg" alt="">
                </div>





            </div>



            <!-- ######### Team ######  -->

            <div class="swiper mySwiper">
                <h1>Engage Performance-Oriented JavaScript Professionals for Maximum ROI</h1>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/we-1.jpg" alt="">

                        </div>
                        <div class="swiper-slide-data">
                            <h2>Adrian</h2>
                            <p>JavaScript Developer</p>
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
                            <p>JavaScript Developer</p>
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
                            <p>JavaScript Developer</p>
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
                            <p>JavaScript Developer</p>
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
                            <p>JavaScript Developer</p>
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
                            <p>JavaScript Developer</p>
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
                <h1>Explore the Range of Services Provided by JavaScript Developers</h1>

            </div>
            <section class="work-wrapper">

                <section class="work-wrapper-child">
                    <section class="work-child">
                        <h2>Dynamic Web Applications</h2>
                        <p>JavaScript developers specialize in creating dynamic web applications that enhance interactivity
                            and user engagement. Utilizing frameworks like React, Angular, and Vue.js, they build responsive
                            interfaces that update in real-time. This interactivity improves user experience, making websites
                            more appealing and functional.</p>
                    </section>
                    <section class="work-child">
                        <h2>Server-Side Programming</h2>
                        <p>JavaScript developers also work on server-side programming using Node.js. This enables them to create
                            scalable applications that handle multiple requests efficiently. By leveraging JavaScript on both the
                            client and server sides, they streamline development and ensure a seamless flow of data between the
                            front-end and back-end.</p>
                    </section>
                    <section class="work-child">
                        <h2>API Integration Services</h2>
                        <p>Integrating third-party APIs is a key service offered by JavaScript developers. They enable seamless
                            communication between applications and external services, enhancing functionality. This integration
                            allows developers to incorporate features like payment processing, data retrieval, and social media
                            sharing, enriching the overall user experience.</p>
                    </section>
                    <section class="work-child">
                        <h2>Front-End Framework Implementation</h2>
                        <p>JavaScript developers are adept at implementing front-end frameworks to accelerate development.
                            By using libraries such as jQuery or frameworks like React, they can quickly create interactive
                            components and manage state effectively. This speeds up the development process and leads to cleaner,
                            more maintainable code.</p>
                    </section>
                    <section class="work-child">
                        <h2>Performance Optimization Techniques</h2>
                        <p>Optimizing the performance of web applications is essential for user satisfaction. JavaScript developers
                            focus on minimizing load times and improving responsiveness. They employ techniques like code splitting,
                            lazy loading, and caching strategies to enhance application speed and ensure a smooth user
                            experience.</p>
                    </section>
                    <section class="work-child">
                        <h2>Testing and Debugging Services</h2>
                        <p>JavaScript developers prioritize testing and debugging to ensure application reliability.
                            They utilize tools like Jest and Mocha for unit testing, as well as browser developer tools for
                            debugging. This rigorous approach helps identify and resolve issues early, leading to more robust
                            and stable applications.</p>
                    </section>

                </section>

            </section>



            <!-- ####### why choose us ########  -->
            <div class="about_container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Why Hire JavaScript Developers From TekAlgo?</h1>

            </div>

            <div class="service_choose_us">

                <div class="services_container">

                    <!-- Service 1 - JavaScript Experts -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Highly skilled developers with deep JavaScript knowledge, providing innovative solutions to enhance web applications, improve performance, and offer seamless user experiences across multiple devices and platforms.</p>
                            <img src="images/star.png" alt="" />
                            <h1>JavaScript Experts</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Innovative Solutions -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Custom strategies and creative approaches are developed to elevate your web applications, ensuring top-tier user experiences, optimal functionality, and cutting-edge solutions that meet your business goals and objectives.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Innovative Solutions</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Fast Turnaround -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>We focus on delivering projects on time and within budget while maintaining the highest standards of quality, ensuring attention to detail, and meeting the specific requirements of each project.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Fast Turnaround</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Reliable Support -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Providing ongoing assistance to ensure your applications run smoothly and efficiently, with proactive measures in place to address any issues promptly, guaranteeing continuous peak performance and customer satisfaction.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Reliable Support</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Value for Money -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Offering affordable services that do not compromise on quality, delivering high-value solutions that are tailored to your business needs, ensuring the best possible return on investment for your projects.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Value for Money</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - Successful Projects -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>With a proven track record of delivering successful projects across multiple industries, we focus on quality, innovation, and client satisfaction, ensuring the best possible outcome for every project we undertake.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Successful Projects</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                </div>

            </div>




            <!-- ##### why hire from us #####  -->
            <div class="about_container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">
                    Experience Numerous Advantages When You Hire Our JavaScript Experts</h1>

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
                                <h2>Skilled Developers</h2>
                            </div>
                            <p>Our JavaScript developers possess deep knowledge and experience in crafting dynamic web applications. Their expertise ensures that your project incorporates the latest technologies and best practices, providing robust solutions tailored to your business needs.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>Tailored Solutions</h2>
                            </div>
                            <p>We deliver customized JavaScript solutions designed specifically for your requirements. By understanding your objectives, our developers create interactive features and functionalities that enhance user engagement and align with your overall vision.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>Timely Delivery</h2>
                            </div>
                            <p>We value your time and ensure that projects are completed on schedule. Our team is committed to maintaining high standards while delivering your JavaScript applications promptly, allowing you to meet critical deadlines.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>Enhanced Interactivity</h2>
                            </div>
                            <p>Our focus on JavaScript enables us to create highly interactive user experiences. By implementing advanced features and animations, we keep users engaged, improving overall satisfaction and encouraging longer site visits.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>Cross-Browser Compatibility</h2>
                            </div>
                            <p>We prioritize cross-browser compatibility in our JavaScript development, ensuring that your web applications function seamlessly across all popular browsers. This approach enhances accessibility and broadens your audience reach, leading to better engagement.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>Ongoing Maintenance</h2>
                            </div>
                            <p>Post-launch, we provide continuous support and maintenance for your JavaScript applications. Our dedicated team is available to address any issues, ensuring your web solutions remain up-to-date, secure, and performing optimally at all times.</p>
                        </div>
                    </div>

                </div>
            </div>









            <!-- ######## collaboration #####  -->
            <section class="collaboration-wrapper">r
                <section class="collaboration-header">
                    <h1>Simple Steps to Begin Your Journey with Our JavaScript Team</h1>
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
                <h1>JavaScript Development Services FAQs</h1>
            </div>

            <section class="faq-wrapper">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What types of applications do JavaScript developers build?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        JavaScript developers build a range of applications, including single-page applications (SPAs), progressive web apps (PWAs), e-commerce sites, and dynamic front-end components. They also develop complex web applications with rich interactivity and real-time features.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What frameworks do JavaScript developers use?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        JavaScript developers commonly use frameworks and libraries like React, Angular, and Vue for front-end development. For back-end development, they often work with Node.js, enabling full-stack development using JavaScript across the application.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can JavaScript developers handle front-end and back-end tasks?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, many JavaScript developers are full-stack developers skilled in both front-end and back-end. With Node.js, they can build back-end server logic, while also handling front-end interfaces using frameworks like React or Vue.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do JavaScript developers optimize website performance?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        JavaScript developers optimize performance by using techniques like code-splitting, lazy loading, and caching. They also use minified code, reduce unused JavaScript, and optimize API calls to ensure fast loading times and smooth interactions.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What is the role of JavaScript developers in enhancing user experience?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        JavaScript developers enhance user experience by adding interactivity, animations, and real-time updates. They build responsive, intuitive interfaces that adapt to user actions, creating an engaging experience on both desktop and mobile devices.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can JavaScript developers integrate third-party APIs?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, JavaScript developers frequently integrate third-party APIs such as payment gateways, social media APIs, and mapping services. This allows for added functionality like user authentication, location services, and secure payments, enhancing the application’s overall features.
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