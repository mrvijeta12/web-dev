<?php

include_once 'db.php';


// Fetch all blog posts with slug, summary, and feature image
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs WHERE category = 'drupal' ORDER BY id DESC";
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
                <h1 data-aos="zoom-in" data-aos-duration="1500">Expertise in Drupal for Robust and Scalable Solutions</h1>
            </div>
            <section class="expertise">
                <div class="expertise-child">
                    <h1>Custom Module Development</h1>
                    <p>We specialize in developing custom modules for Drupal, allowing us to tailor functionality to meet your specific business needs. Our approach ensures that your site remains flexible and can adapt to evolving requirements.</p>
                </div>
                <div class="expertise-child">
                    <h1>Theming and Frontend Integration</h1>
                    <p>Our team excels in Drupal theming, creating visually appealing and user-friendly interfaces. We integrate frontend technologies to enhance the user experience while ensuring compliance with Drupal’s best practices.</p>
                </div>
                <div class="expertise-child">
                    <h1>Site Building and Configuration</h1>
                    <p>We provide comprehensive site-building services, leveraging Drupal’s powerful features to configure content types, views, and workflows. Our meticulous approach ensures your site is optimized for both performance and usability.</p>
                </div>
                <div class="expertise-child">
                    <h1>Content Migration Services</h1>
                    <p>Our content migration services ensure a smooth transition to Drupal from other platforms. We handle data mapping, transformation, and validation, preserving SEO value and content integrity throughout the process.</p>
                </div>
                <div class="expertise-child">
                    <h1>Performance Optimization</h1>
                    <p>We implement performance optimization techniques specific to Drupal, including caching strategies and database tuning. Our goal is to enhance site speed and responsiveness, providing an excellent user experience.</p>
                </div>
                <div class="expertise-child">
                    <h1>Security and Compliance Management</h1>
                    <p>We prioritize security by following Drupal’s security best practices and implementing regular updates. Our proactive approach ensures that your site remains secure against vulnerabilities and compliant with industry standards.</p>
                </div>
            </section>



            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Transforming Industries with Advanced Drupal Solutions</h1>
            </div>

            <!-- <div class="service_choose_us">
                <div class="services_container">
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/healthcare-drupal.png" alt="">
                        <h1>Healthcare</h1>
                        <p>Implementing secure and user-friendly healthcare platforms with Drupal, improving patient engagement and streamlining health services management.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/ecommerce-drupal.png" alt="">
                        <h1>E-commerce</h1>
                        <p>Creating robust e-commerce websites using Drupal that provide seamless navigation, personalized experiences, and secure transactions for customers.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/education-drupal.png" alt="">
                        <h1>Education</h1>
                        <p>Developing interactive educational platforms with Drupal that enhance learning through engaging content, online courses, and student tracking.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/government-drupal.png" alt="">
                        <h1>Government</h1>
                        <p>Building secure and accessible government websites using Drupal, ensuring transparency, citizen engagement, and efficient service delivery.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/travel-drupal.png" alt="">
                        <h1>Travel and Hospitality</h1>
                        <p>Creating intuitive travel booking systems with Drupal that provide users with real-time availability, personalized recommendations, and easy reservations.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/nonprofit-drupal.png" alt="">
                        <h1>Non-Profit Organizations</h1>
                        <p>Developing impactful websites for non-profits with Drupal, enhancing outreach, donations, and community engagement through powerful content management.</p>
                    </div>
                </div>
            </div> -->
            <div class="service_choose_us">
                <div class="services_container">

                    <!-- Service 1 - Healthcare -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Implementing secure and user-friendly healthcare platforms with Drupal, improving patient engagement and streamlining health services management.
                            </p>
                            <img src="images/healthcare-drupal.png" alt="" />
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
                                Creating robust e-commerce websites using Drupal that provide seamless navigation, personalized experiences, and secure transactions for customers.
                            </p>
                            <img src="images/ecommerce-drupal.png" alt="" />
                            <h1>E-commerce</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Education -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Developing interactive educational platforms with Drupal that enhance learning through engaging content, online courses, and student tracking.
                            </p>
                            <img src="images/education-drupal.png" alt="" />
                            <h1>Education</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Government -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Building secure and accessible government websites using Drupal, ensuring transparency, citizen engagement, and efficient service delivery.
                            </p>
                            <img src="images/government-drupal.png" alt="" />
                            <h1>Government</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Travel and Hospitality -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Creating intuitive travel booking systems with Drupal that provide users with real-time availability, personalized recommendations, and easy reservations.
                            </p>
                            <img src="images/travel-drupal.png" alt="" />
                            <h1>Travel and Hospitality</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - Non-Profit Organizations -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Developing impactful websites for non-profits with Drupal, enhancing outreach, donations, and community engagement through powerful content management.
                            </p>
                            <img src="images/nonprofit-drupal.png" alt="" />
                            <h1>Non-Profit Organizations</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                </div>
            </div>



        </div>
        <!-- ########## TECHNOLOGIES  #######  -->

        <div class="container" data-aos="zoom-in" data-aos-duration="1500">
            <h1>The Advantages of Using Drupal</h1>
        </div>
        <section class="work-wrapper">
            <section class="work-wrapper-child">
                <section class="work-child">
                    <h2>Flexible Content Architecture</h2>
                    <p>Drupal allows for a highly flexible content architecture, enabling developers to create complex data structures that can adapt to diverse project needs.</p>
                </section>
                <section class="work-child">
                    <h2>Built for Performance</h2>
                    <p>With built-in caching mechanisms and optimization tools, Drupal ensures high performance and fast load times, even for content-heavy websites.</p>
                </section>
                <section class="work-child">
                    <h2>Customizable User Experience</h2>
                    <p>Drupal provides powerful theming capabilities that allow developers to create a unique user experience tailored to specific audiences and branding requirements.</p>
                </section>
                <section class="work-child">
                    <h2>Comprehensive API Integration</h2>
                    <p>Drupal offers robust API capabilities, enabling seamless integration with third-party services and applications, enhancing functionality and user engagement.</p>
                </section>
                <section class="work-child">
                    <h2>Extensive Module Ecosystem</h2>
                    <p>With thousands of contributed modules available, Drupal empowers developers to extend core functionality, allowing for rapid development of complex features.</p>
                </section>
                <section class="work-child">
                    <h2>Strong Governance and Roadmap</h2>
                    <p>Drupal's open-source nature is backed by a solid governance model and a clear roadmap, ensuring long-term support and regular updates for users.</p>
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


        <!-- ##### faq #####  -->
        <div class="container" data-aos="zoom-in" data-aos-duration="1500">
            <h1>Advanced Drupal Development: Frequently Asked Questions</h1>
        </div>

        <section class="faq-wrapper">
            <section class="faq-child">
                <section class="faq-heading">
                    <h1>What types of projects are best suited for Drupal?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    Drupal is ideal for complex, content-heavy websites and applications that require high customization and scalability, such as enterprise websites, government portals, and educational platforms. Our team leverages Drupal’s powerful content management features to create secure, flexible, and high-performing sites tailored to meet the specific needs of larger organizations.
                </p>
            </section>

            <section class="faq-child">
                <section class="faq-heading">
                    <h1>How does your team handle custom module development in Drupal?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    Our Drupal experts build custom modules to extend functionality beyond standard features, ensuring that each site has the precise tools and features it needs. We follow best practices in module development, from clean code to rigorous testing, making sure each module integrates seamlessly with Drupal’s core.
                </p>
            </section>

            <section class="faq-child">
                <section class="faq-heading">
                    <h1>How do you ensure security and performance in Drupal websites?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    Security is a priority in our Drupal projects, and we implement strict security measures, including regular updates, access controls, secure coding practices, and database encryption. Additionally, we optimize performance by using caching, minimizing database queries, and optimizing assets, ensuring a fast and secure user experience.
                </p>
            </section>

            <section class="faq-child">
                <section class="faq-heading">
                    <h1>Can you integrate third-party systems with Drupal?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    Yes, we have extensive experience integrating Drupal with various third-party systems such as CRMs, payment gateways, and marketing platforms. By using Drupal’s API-first architecture and custom modules, we seamlessly connect your website with external services, enhancing functionality and streamlining workflows.
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