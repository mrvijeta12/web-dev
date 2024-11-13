<?php

include_once 'db.php';


// Fetch all blog posts with slug, summary, and feature image
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs WHERE page_type = 'php' ORDER BY id DESC";
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
    <link rel="stylesheet" href="assests/css/expertise.css">
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

            <!-- ######### HERO SECTION ##########  -->
            <div class="hero-section">
                <div class="hero-content" data-aos="zoom-in" data-aos-duration="2500">
                    <h1 class="animated-heading">
                        Innovative React.JS Development
                    </h1>
                    <p>
                        Empowering businesses with fast, efficient, and maintainable web
                        solutions
                    </p>
                    <a href="#" class="reopenPopup">Consult Our Experts</a>
                </div>
            </div>

            <!-- Image Wrapper with Full Image Section Inside -->
            <div class="image-wrapper">
                <div class="full-image-section"></div>
            </div>



            <!-- ####### core area of expertise ######  -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Mastering PHP for Powerful Web Development</h1>
            </div>
            <section class="expertise">
                <div class="expertise-child">
                    <h1>Custom Web Application Development</h1>
                    <p>We specialize in developing custom web applications using PHP, tailored to meet your specific business requirements. Our solutions are robust, scalable, and designed for optimal performance.</p>
                </div>
                <div class="expertise-child">
                    <h1>API Development and Integration</h1>
                    <p>Our team excels in creating and integrating RESTful APIs with PHP, enabling seamless communication between applications. This enhances functionality and allows for the integration of third-party services.</p>
                </div>
                <div class="expertise-child">
                    <h1>Database Management Solutions</h1>
                    <p>We implement effective database management solutions using PHP and MySQL, ensuring efficient data handling, storage, and retrieval. Our focus is on optimizing performance and security.</p>
                </div>
                <div class="expertise-child">
                    <h1>Framework Expertise</h1>
                    <p>Our expertise extends to popular PHP frameworks like Laravel, Symfony, and CodeIgniter. We leverage these frameworks to streamline development processes and enhance the quality of your applications.</p>
                </div>
                <div class="expertise-child">
                    <h1>Security Best Practices</h1>
                    <p>We prioritize security in all our PHP applications by implementing best practices, including input validation and data encryption. Our proactive approach helps protect your applications from vulnerabilities.</p>
                </div>
                <div class="expertise-child">
                    <h1>Performance Optimization Techniques</h1>
                    <p>We employ various performance optimization techniques in PHP, including caching, code refactoring, and profiling. This ensures that your applications run efficiently and deliver a smooth user experience.</p>
                </div>
            </section>




            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Transforming Industries with Advanced PHP Solutions</h1>
            </div>

            <div class="service_choose_us">
                <div class="services_container">

                    <!-- Service 1 - Healthcare -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Building secure healthcare applications using PHP to manage patient records, appointment scheduling, and telehealth services efficiently.
                            </p>
                            <img src="images/web-development-php.png" alt="" />
                            <h1>Healthcare</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - E-commerce -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Developing robust e-commerce solutions with PHP, ensuring seamless transactions, personalized shopping experiences, and efficient inventory management.
                            </p>
                            <img src="images/ecommerce-php.png" alt="" />
                            <h1>E-commerce</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Finance -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Creating secure financial applications using PHP that provide real-time data analytics, account management, and secure payment processing.
                            </p>
                            <img src="images/finance-php.png" alt="" />
                            <h1>Finance</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Education -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Developing interactive e-learning platforms with PHP that facilitate online courses, assessments, and student progress tracking.
                            </p>
                            <img src="images/education-php.png" alt="" />
                            <h1>Education</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Travel -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Creating travel booking systems using PHP that allow users to search for, book, and manage travel itineraries seamlessly.
                            </p>
                            <img src="images/travel-php.png" alt="" />
                            <h1>Travel</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - Social Media -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Building engaging social media platforms with PHP, enabling user interactions, content sharing, and real-time communication features.
                            </p>
                            <img src="images/social-media-php.png" alt="" />
                            <h1>Social Media</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                </div>
            </div>


            <!-- ########## TECHNOLOGIES  #######  -->

            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>The Benefits of Using PHP for Development</h1>
            </div>
            <section class="work-wrapper">
                <section class="work-wrapper-child">
                    <section class="work-child">
                        <h2>Dynamic Web Applications</h2>
                        <p>PHP excels at creating dynamic web applications, allowing developers to generate content in real-time based on user interactions and data input.</p>
                    </section>
                    <section class="work-child">
                        <h2>Rapid Development Cycle</h2>
                        <p>With its straightforward syntax and rich set of built-in functions, PHP enables rapid development cycles, making it easier to prototype and iterate on projects.</p>
                    </section>
                    <section class="work-child">
                        <h2>Strong Security Features</h2>
                        <p>PHP offers various built-in security features, such as data encryption and user authentication mechanisms, which help protect applications from common vulnerabilities.</p>
                    </section>
                    <section class="work-child">
                        <h2>Vast Hosting Options</h2>
                        <p>PHP is supported by nearly all web hosting providers, giving developers a wide range of options for hosting their applications without compatibility issues.</p>
                    </section>
                    <section class="work-child">
                        <h2>Extensive Learning Resources</h2>
                        <p>The abundance of tutorials, courses, and documentation available online makes learning PHP accessible for beginners and helps experienced developers enhance their skills.</p>
                    </section>
                    <section class="work-child">
                        <h2>Flexible and Versatile</h2>
                        <p>PHP can be used for a variety of applications, from simple websites to complex content management systems, making it a versatile tool in any developer's toolkit.</p>
                    </section>
                </section>
            </section>





            <!-- ######### Process ##########  -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">
                    Our Methodology for Building High-Quality React.js Websites</h1>

            </div>

            <div class="swiper mySwiper">

                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/project-analysis-health.png" alt="">

                        </div>
                        <h2>Project analysis</h2>
                        <p>In-depth analysis of requirements and goals to ensure successful project outcomes and stakeholder satisfaction.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/design-health.png" alt="">

                        </div>
                        <h2>Design</h2>
                        <p>Creating intuitive and engaging designs that enhance user experience and reflect brand identity effectively.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/development-health.png" alt="">

                        </div>
                        <h2>Development</h2>
                        <p>Implementing robust front-end and back-end solutions to deliver a seamless, functional, and responsive website.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/testing-health.png" alt="">

                        </div>
                        <h2>Testing</h2>
                        <p>Conducting comprehensive testing to identify and resolve issues, ensuring high-quality performance and user satisfaction.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="./images/project-launch-health.png" alt="">

                        </div>
                        <h2>Project Launch</h2>
                        <p>Coordinating all launch activities to ensure a successful website debut and positive initial user experience.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/maintance-and-support-health.png" alt="">

                        </div>
                        <h2>Maintanace and Support</h2>
                        <p>Providing ongoing support and updates to enhance performance, security, and user satisfaction post-launch.</p>
                    </div>















                </div>
                <div class="swiper-pagination"></div>


            </div>


            <!-- ######## testimonial######## -->


            <section class="testimonial_wrapper">
                <h1 data-aos="fade-down" data-aos-duration="1500"><span><i class="fa-regular fa-comments"></i></span> Hear From Our Valued Clients</h1>



                <div class="testimonial_slider" data-aos="fade-up" data-aos-duration="2500">
                    <div class="testimonial_item">

                        <img src="images/9.jpg" alt="">
                        <img src="images/double-main.png" alt="" class="double">
                        <p>TekAlgo’s Salesforce expertise boosted our sales efficiency and team productivity. Their tailored solutions made a significant difference. Highly recommended!</p>
                        <h5>John Doe</h5>
                        <p>CEO, Company</p>
                    </div>
                    <div class="testimonial_item">
                        <img src="images/2.jpg" alt="">
                        <img src="images/double-main.png" alt="" class="double">
                        <p>TekAlgo transformed our CRM with seamless Salesforce integration. Exceptional service, knowledgeable team, and tangible results. We’re extremely satisfied! </p>
                        <h5>John Doe</h5>
                        <p>CEO, Company</p>
                    </div>
                    <div class="testimonial_item">

                        <img src="images/4.jpg" alt="">
                        <img src="images/double-main.png" alt="" class="double">
                        <p>TekAlgo’s Salesforce solutions enhanced our customer management. The team is responsive, professional, and delivered beyond our expectations. Outstanding experience! </p>
                        <h5>John Doe</h5>
                        <p>CEO, Company</p>
                    </div>
                </div>
            </section>

            <!-- #### blog ######  -->

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


            <!-- #### faq ###  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>Professional PHP Development: Frequently Asked Questions</h1>
            </div>

            <section class="faq-wrapper">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What types of applications can be built with PHP?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        PHP is a versatile server-side scripting language suitable for developing a wide range of applications. We specialize in creating dynamic websites, content management systems, e-commerce platforms, and RESTful APIs, tailored to meet the specific requirements of your business.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do you ensure the security of PHP applications?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Security is a top priority in our PHP development process. We implement robust security measures such as data sanitization, input validation, and secure session management. Our team also conducts regular security audits and utilizes best practices to protect your applications from vulnerabilities.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can you integrate PHP with other technologies?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we have extensive experience integrating PHP applications with various technologies. This includes working with different database systems, connecting to external APIs, and integrating with front-end frameworks like React or Angular to create cohesive and powerful web solutions.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What frameworks do you use for PHP development?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Our team is proficient in several PHP frameworks, including Laravel, Symfony, and CodeIgniter. These frameworks provide robust tools for rapid development, enhanced security features, and maintainability, allowing us to deliver high-quality applications efficiently.
                    </p>
                </section>
            </section>





            <!-- ##### Book #######  -->

            <section class="book">
                <h1>Let’s Begin Your Project Together!</h1>
                <a href="./contact.php">Contact us</a>
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