<?php

include_once 'db.php';


// Fetch all blog posts with slug, summary, and feature image
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs WHERE category = 'frontend-development' ORDER BY id DESC";
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
        <div class="wrapper">





            <!-- new added  -->
            <!-- Hero Section with Centered Text -->
            <!-- <div class="hero-section">
                <div class="hero-content" data-aos="zoom-in" data-aos-duration="2500">
                    <h1 class="animated-heading">
                        Cutting-Edge Frontend Development
                    </h1>
                    <p>
                        Creating visually stunning, user-friendly web interfaces.
                    </p>
                    <a href="#" class="reopenPopup">Consult Our Experts</a>
                </div>
            </div>

           
            <div class="image-wrapper">
                <div class="full-image-section"></div>
            </div> -->



            <!-- Hero Section with Centered Text -->
            <div class="hero-section">
                <div class="hero-content">
                    <!-- <img src="./images/freepik__background__74942.png" alt="" data-aos="zoom-in" data-aos-duration="1500" /> -->
                    <h1 class="animated-heading" data-aos="fade-up" data-aos-duration="1500">
                        Innovative React.Js Development
                    </h1>
                    <p data-aos="fade-up" data-aos-duration="1500">
                        Empowering businesses with fast, efficient, and maintainable web
                        solutions
                    </p>
                    <a href="#" class="reopenPopup">Consult Our Experts</a>

                </div>
            </div>

            <!-- Image Wrapper with Full Image Section Inside -->
            <div class="image-wrapper">
                <img src="./images/frontend-developement-hero.jpg" alt="" />
            </div>





            <!-- ####### core area of expertise ######  -->


            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Comprehensive Expertise in React.js for Modern Applications</h1>

            </div>

            <section class="expertise">
                <div class="expertise-child">
                    <h1>Component-Based Architecture</h1>
                    <p>Our expertise in component-based architecture enables developers to build applications with reusable, self-contained components. This approach not only simplifies code management but also enhances collaboration among team members, ensuring that changes can be made efficiently without affecting the overall application structure, resulting in faster development cycles and improved scalability.</p>
                </div>
                <div class="expertise-child">
                    <h1>State Management Solutions</h1>
                    <p>We specialize in implementing effective state management solutions tailored to the needs of your application. By utilizing advanced libraries such as Redux, MobX, or the Context API, we ensure that your application's state is predictable, maintainable, and efficient, resulting in a seamless user experience and reduced bugs during development.</p>
                </div>
                <div class="expertise-child">
                    <h1>Performance Optimization Techniques</h1>
                    <p>Our team is well-versed in advanced performance optimization techniques that enhance the speed and responsiveness of React.js applications. By employing strategies like code splitting, memoization, and lazy loading, we deliver applications that perform optimally under varying loads, significantly improving user engagement and satisfaction through fast, smooth interactions.</p>
                </div>
                <div class="expertise-child">
                    <h1>Integration with APIs</h1>
                    <p>We excel in integrating React.js applications with various APIs, including RESTful and GraphQL. Our developers ensure seamless data flow and effective communication between your frontend and backend systems, enabling dynamic content updates. This capability allows for rich user experiences and interactions, ultimately driving higher engagement and satisfaction for end-users.</p>
                </div>
                <div class="expertise-child">
                    <h1>Testing and Quality Assurance</h1>
                    <p>Our comprehensive testing and quality assurance practices include automated and manual testing strategies to ensure the reliability of your React.js applications. By using industry-standard tools like Jest and React Testing Library, we rigorously test components and functionalities, minimizing bugs and enhancing application performance for an overall higher quality product.</p>
                </div>
                <div class="expertise-child">
                    <h1>Responsive Design Implementation</h1>
                    <p>We prioritize responsive design in our React.js development process, ensuring that applications adapt seamlessly to various devices and screen sizes. By employing flexible layouts and CSS frameworks, we enhance accessibility and usability, guaranteeing that users have a consistent and engaging experience, whether they are on a desktop, tablet, or smartphone.</p>
                </div>
            </section>




            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Proven Expertise Across Multiple Industries Using React.js</h1>

            </div>


            <div class="service_choose_us">
                <div class="services_container">
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Develop user-friendly healthcare applications, improving patient
                                engagement and streamlining processes like appointment scheduling,
                                telehealth, and electronic health records management.
                            </p>
                            <img src="images/consultation.png" alt="" />
                            <h1>Healthcare</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Create dynamic e-commerce platforms with seamless navigation,
                                personalized user experiences, and real-time updates to boost
                                sales and customer satisfaction.
                            </p>
                            <img src="images/ux.png" alt="" />
                            <h1>E-commerce</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Build secure online banking solutions and financial management
                                tools, ensuring real-time data visualization and user-friendly
                                interfaces for clients’ financial needs.
                            </p>
                            <img src="images/development.png" alt="" />
                            <h1>Finance and Banking</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Develop interactive educational platforms that enhance learning
                                through engaging user experiences, offering features like online
                                courses, quizzes, and progress tracking.
                            </p>
                            <img src="images/testing.png" alt="" />
                            <h1>Education</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Create intuitive travel booking websites and management systems,
                                providing users with real-time availability, personalized
                                recommendations, and streamlined reservation processes.
                            </p>
                            <img src="images/deployment.png" alt="" />
                            <h1>Travel and Hospitality</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Build engaging social networking platforms that facilitate
                                real-time interactions, dynamic content sharing, and personalized
                                user experiences to foster community connections.
                            </p>
                            <img src="images/support.png" alt="" />
                            <h1>Social Media</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>
                </div>
            </div>

            <!-- ####### choose language ######  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>Top Reasons to Choose React for Your Project</h1>
            </div>

            <section class="work-wrapper">
                <section class="work-wrapper-child">
                    <section class="work-child">
                        <h2>Blazing-Fast Performance</h2>
                        <p>React's Virtual DOM enables rapid updates and rendering, dramatically improving performance and load times, delivering a smooth user experience that keeps visitors engaged on your site.</p>
                    </section>

                    <section class="work-child">
                        <h2>Scalable Architecture Design</h2>
                        <p>With its modular, component-based architecture, React simplifies development, making it easy to build scalable applications that grow effortlessly alongside your business needs.</p>
                    </section>

                    <section class="work-child">
                        <h2>Enhanced User Experience</h2>
                        <p>React creates highly dynamic, responsive interfaces that instantly adapt to user actions, ensuring a seamless and interactive experience across both web and mobile platforms.</p>
                    </section>

                    <section class="work-child">
                        <h2>SEO-Friendly Framework</h2>
                        <p>Server-side rendering boosts React's SEO capabilities, improving search engine rankings, reducing load times, and driving increased organic traffic to your website.</p>
                    </section>

                    <section class="work-child">
                        <h2>Thriving Developer Community</h2>
                        <p>Supported by a large developer community, React offers extensive resources, ready-made solutions, and continuous updates to help developers build innovative and robust applications faster.</p>
                    </section>

                    <section class="work-child">
                        <h2>Future-Proof Technology</h2>
                        <p>React's regular updates and widespread adoption by tech giants ensure your web projects remain at the cutting edge, evolving with industry trends and technological advances.</p>
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
                <h1>Expert Frontend Development: Common Questions Answered</h1>
            </div>

            <section class="faq-wrapper">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What makes your team experts in frontend development?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Our team specializes in creating responsive, visually engaging, and user-friendly interfaces using the latest frontend technologies like HTML, CSS, JavaScript, and frameworks such as React.js, Angular, and Vue.js. We follow best practices in UI/UX design and adhere to performance and accessibility standards to deliver a high-quality user experience.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do you ensure responsive and cross-browser compatibility?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We design and test our frontend projects across various devices and browsers to ensure a consistent experience for all users. By using responsive design principles, CSS media queries, and modern frameworks, we make sure that websites look and perform well on any screen size or browser.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do you optimize frontend performance?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Performance is a priority in all our frontend projects. We employ techniques like minifying code, optimizing images, lazy loading content, and leveraging browser caching. Additionally, we use tools like Lighthouse and Google PageSpeed Insights to identify and address any performance bottlenecks.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How does your team approach UI/UX in frontend development?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Our frontend developers work closely with UI/UX designers to create intuitive and visually appealing interfaces. We prioritize usability, accessibility, and interactivity, ensuring each element serves a purpose and enhances the user experience. We also conduct usability testing to refine and perfect the design.
                    </p>
                </section>
            </section>





            <!-- ##### Book #######  -->

            <section class="book">
                <h1>Let’s Begin Your Project Together!</h1>
                <a href="#" class="reopenPopup">Contact us</a>
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