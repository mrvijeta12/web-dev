<?php

include_once 'db.php';


// Fetch all blog posts with slug, summary, and feature image
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs WHERE category = 'vuejs' ORDER BY id DESC";
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
                        Dynamic Vue.js Development
                    </h1>
                    <p>
                        Crafting responsive, high-performance apps with Vue.js.
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
                <h1 data-aos="zoom-in" data-aos-duration="1500">Mastering Vue.js for Dynamic User Experiences</h1>
            </div>
            <section class="expertise">
                <div class="expertise-child">
                    <h1>Dynamic Component Development</h1>
                    <p>We specialize in developing dynamic components using Vue.js, enabling the creation of highly interactive and modular user interfaces. By leveraging Vue's reactivity system, we ensure that our applications respond fluidly to user interactions, enhancing overall engagement.</p>
                </div>
                <div class="expertise-child">
                    <h1>State Management with Vuex</h1>
                    <p>Our team effectively utilizes Vuex for state management, allowing us to maintain a centralized store for all application data. This approach promotes predictable state changes and simplifies debugging, leading to a more robust and maintainable codebase.</p>
                </div>
                <div class="expertise-child">
                    <h1>Routing with Vue Router</h1>
                    <p>We implement Vue Router to create seamless navigation within our applications. This enables the development of single-page applications (SPAs) with efficient routing, ensuring smooth transitions between views and enhancing user experience.</p>
                </div>
                <div class="expertise-child">
                    <h1>Integration with RESTful APIs</h1>
                    <p>Our proficiency in integrating Vue.js applications with RESTful APIs allows us to fetch and manipulate data efficiently. We follow best practices for asynchronous communication, ensuring a responsive application that meets user demands in real time.</p>
                </div>
                <div class="expertise-child">
                    <h1>Testing and Quality Assurance</h1>
                    <p>We prioritize quality assurance through rigorous testing of Vue.js applications. Utilizing tools like Jest and Vue Test Utils, we conduct unit and integration tests to ensure functionality and performance, delivering a reliable user experience.</p>
                </div>
                <div class="expertise-child">
                    <h1>Collaborative Development Practices</h1>
                    <p>Our team embraces collaborative development practices using tools like Git and GitHub. By maintaining comprehensive documentation and following agile methodologies, we foster teamwork and streamline project workflows, ensuring timely delivery of high-quality applications.</p>
                </div>
            </section>




            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Transforming Industries with Advanced Vue.js Solutions</h1>
            </div>

            <!-- <div class="service_choose_us">
                <div class="services_container">
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/web-application-vue.png" alt="">
                        <h1>Retail</h1>
                        <p>Leveraging Vue.js to create innovative retail applications that enhance customer shopping experiences and streamline inventory management.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/mobile-app-vue.png" alt="">
                        <h1>Real Estate</h1>
                        <p>Developing dynamic real estate platforms using Vue.js, providing users with seamless property searches and virtual tours for better engagement.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/finance-vue.png" alt="">
                        <h1>Telecommunications</h1>
                        <p>Building robust telecommunications applications with Vue.js that offer real-time service management and customer support features.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/education-vue.png" alt="">
                        <h1>Gaming</h1>
                        <p>Creating interactive gaming platforms using Vue.js, enhancing user engagement with real-time updates and smooth gameplay experiences.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/travel-vue.png" alt="">
                        <h1>Logistics</h1>
                        <p>Utilizing Vue.js to develop logistics management systems that streamline operations and improve real-time tracking of shipments.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/social-media-vue.png" alt="">
                        <h1>Entertainment</h1>
                        <p>Building engaging entertainment platforms with Vue.js, facilitating content streaming and user interactions for a rich experience.</p>
                    </div>
                </div>
            </div> -->
            <div class="service_choose_us">
                <div class="services_container">

                    <!-- Service 1 - Retail -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Leveraging Vue.js to create innovative retail applications that enhance customer shopping experiences and streamline inventory management.
                            </p>
                            <img src="images/web-application-vue.png" alt="" />
                            <h1>Retail</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Real Estate -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Developing dynamic real estate platforms using Vue.js, providing users with seamless property searches and virtual tours for better engagement.
                            </p>
                            <img src="images/mobile-app-vue.png" alt="" />
                            <h1>Real Estate</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Healthcare -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Developing cutting-edge healthcare applications with Vue.js that provide real-time patient management, appointment scheduling, and telemedicine features.
                            </p>
                            <img src="images/healthcare-vue.png" alt="" />
                            <h1>Healthcare</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>


                    <!-- Service 4 - Gaming -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Creating interactive gaming platforms using Vue.js, enhancing user engagement with real-time updates and smooth gameplay experiences.
                            </p>
                            <img src="images/education-vue.png" alt="" />
                            <h1>Gaming</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Logistics -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Utilizing Vue.js to develop logistics management systems that streamline operations and improve real-time tracking of shipments.
                            </p>
                            <img src="images/travel-vue.png" alt="" />
                            <h1>Logistics</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - Entertainment -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Building engaging entertainment platforms with Vue.js, facilitating content streaming and user interactions for a rich experience.
                            </p>
                            <img src="images/social-media-vue.png" alt="" />
                            <h1>Entertainment</h1>
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
            <h1>Unlocking the Power of Vue.js</h1>
        </div>
        <section class="work-wrapper">
            <section class="work-wrapper-child">
                <section class="work-child">
                    <h2>Effortless State Management</h2>
                    <p>Vue.js provides intuitive state management capabilities, allowing developers to manage application data efficiently and maintain a clear flow of information.</p>
                </section>
                <section class="work-child">
                    <h2>Declarative Rendering</h2>
                    <p>With Vue.js, developers can easily create dynamic interfaces using declarative rendering, simplifying the process of building complex user interfaces.</p>
                </section>
                <section class="work-child">
                    <h2>Robust Community Resources</h2>
                    <p>The Vue.js community is active and supportive, offering a wealth of resources, including tutorials, plugins, and forums to help developers at all levels.</p>
                </section>
                <section class="work-child">
                    <h2>Custom Directives</h2>
                    <p>Vue.js allows developers to create custom directives, providing enhanced functionality and making it easier to encapsulate reusable code for specific tasks.</p>
                </section>
                <section class="work-child">
                    <h2>Comprehensive Documentation</h2>
                    <p>Vue.js is known for its thorough and well-organized documentation, making it simple for developers to understand concepts and implement best practices.</p>
                </section>
                <section class="work-child">
                    <h2>Support for TypeScript</h2>
                    <p>Vue.js offers excellent support for TypeScript, enabling developers to leverage strong typing for improved code quality and better tooling integration.</p>
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


        <!-- #### faq ####  -->
        <div class="container" data-aos="zoom-in" data-aos-duration="1500">
            <h1>Expert Vue.js Development: Frequently Asked Questions</h1>
        </div>

        <section class="faq-wrapper">
            <section class="faq-child">
                <section class="faq-heading">
                    <h1>Why choose Vue.js for your web applications?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    Vue.js is a powerful and flexible JavaScript framework, perfect for building user-friendly, responsive applications. Our team uses Vue.js to create seamless, highly interactive user experiences. Its component-based architecture also ensures code reusability, faster development, and easy maintenance, making it an excellent choice for both small and large-scale projects.
                </p>
            </section>

            <section class="faq-child">
                <section class="faq-heading">
                    <h1>What types of projects are best suited for Vue.js?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    Vue.js is ideal for single-page applications (SPAs), dynamic dashboards, real-time applications, and any project requiring rich interactivity. Its flexibility makes it suitable for projects of varying complexity, from small business sites to complex enterprise applications, and our team tailors Vue.js solutions to meet specific client needs.
                </p>
            </section>

            <section class="faq-child">
                <section class="faq-heading">
                    <h1>How does your team handle state management in Vue.js?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    We use Vuex, the official state management library for Vue.js, to handle complex application states effectively. Vuex enables us to create a structured, predictable state flow, which is crucial for building responsive applications that need to manage dynamic data and interactivity. Our approach ensures smooth, efficient performance across the application.
                </p>
            </section>

            <section class="faq-child">
                <section class="faq-heading">
                    <h1>What performance optimizations do you implement in Vue.js projects?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    We apply a range of optimizations, such as lazy loading components, code splitting, and efficient reactivity management, to ensure fast and responsive Vue.js applications. By minimizing bundle sizes and optimizing rendering, we make sure that your Vue.js application provides a smooth experience for end users.
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