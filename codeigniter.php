<?php

include_once 'db.php';


// Fetch all blog posts with slug, summary, and feature image
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs WHERE page_type = 'codeigniter' ORDER BY id DESC";
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
                <h1 data-aos="zoom-in" data-aos-duration="1500">Elevating Development with CodeIgniter Framework</h1>
            </div>
            <section class="expertise">
                <div class="expertise-child">
                    <h1>Rapid Application Development</h1>
                    <p>We leverage CodeIgniter's simplicity and speed to accelerate the development of web applications. Our focus is on delivering high-quality solutions in a timely manner without compromising functionality.</p>
                </div>
                <div class="expertise-child">
                    <h1>Modular Architecture Implementation</h1>
                    <p>Our team excels in implementing modular architecture in CodeIgniter, allowing for easy maintenance and scalability of applications. This approach enhances code organization and reusability across projects.</p>
                </div>
                <div class="expertise-child">
                    <h1>Custom Library and Helper Development</h1>
                    <p>We create custom libraries and helpers in CodeIgniter to extend functionality tailored to your needs. This enhances the application’s capabilities and streamlines common tasks.</p>
                </div>
                <div class="expertise-child">
                    <h1>Integration with Frontend Technologies</h1>
                    <p>Our expertise includes seamless integration of CodeIgniter with popular frontend technologies such as Angular, React, and Vue.js, providing a comprehensive solution for dynamic web applications.</p>
                </div>
                <div class="expertise-child">
                    <h1>Data Security and Validation</h1>
                    <p>We prioritize data security by implementing strict validation rules and security measures within CodeIgniter applications. Our approach safeguards against common vulnerabilities and ensures data integrity.</p>
                </div>
                <div class="expertise-child">
                    <h1>Ongoing Support and Upgrades</h1>
                    <p>We offer ongoing support and upgrades for your CodeIgniter applications, ensuring they remain up-to-date with the latest features and security patches. Our dedicated team is here to assist you whenever needed.</p>
                </div>
            </section>





            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Transforming Industries with Advanced CodeIgniter Solutions</h1>
            </div>

            <div class="service_choose_us">
                <div class="services_container">

                    <!-- Service 1 - Real Estate -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Creating efficient real estate management systems with CodeIgniter, enabling property listings, client management, and transaction tracking.
                            </p>
                            <img src="images/real-estate-codeigniter.png" alt="" />
                            <h1>Real Estate</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Telemedicine -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Building telemedicine platforms using CodeIgniter, connecting patients with healthcare professionals through secure video consultations and health monitoring.
                            </p>
                            <img src="images/healthcare-codeigniter.png" alt="" />
                            <h1>Telemedicine</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Event Management -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Developing event management applications with CodeIgniter, simplifying registration, ticketing, and attendee engagement for various events.
                            </p>
                            <img src="images/event-management-codeigniter.png" alt="" />
                            <h1>Event Management</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Blogging Platforms -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Creating dynamic blogging platforms using CodeIgniter, offering user-friendly interfaces for content creation, management, and community interaction.
                            </p>
                            <img src="images/blogging-codeigniter.png" alt="" />
                            <h1>Blogging Platforms</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Non-Profit Organizations -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Building web applications for non-profit organizations with CodeIgniter, enhancing donor management, event planning, and volunteer coordination.
                            </p>
                            <img src="images/non-profit-codeigniter.png" alt="" />
                            <h1>Non-Profit Organizations</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - Fitness and Wellness -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Developing fitness and wellness applications using CodeIgniter, offering features like class scheduling, nutrition tracking, and community engagement.
                            </p>
                            <img src="images/fitness-codeigniter.png" alt="" />
                            <h1>Fitness and Wellness</h1>
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
            <h1>Why CodeIgniter is a Preferred PHP Framework</h1>
        </div>
        <section class="work-wrapper">
            <section class="work-wrapper-child">
                <section class="work-child">
                    <h2>Lightweight Framework</h2>
                    <p>CodeIgniter is known for its lightweight structure, which results in fast performance and reduced overhead, making it ideal for high-speed applications.</p>
                </section>
                <section class="work-child">
                    <h2>Simplified Development Process</h2>
                    <p>With its clear documentation and straightforward setup, CodeIgniter simplifies the development process, allowing developers to focus on building features rather than configuration.</p>
                </section>
                <section class="work-child">
                    <h2>Built-In Security Features</h2>
                    <p>CodeIgniter comes with built-in security features like XSS filtering and CSRF protection, helping developers create secure applications without extensive additional coding.</p>
                </section>
                <section class="work-child">
                    <h2>Flexible Routing System</h2>
                    <p>The flexible routing system in CodeIgniter allows developers to create clean and user-friendly URLs, enhancing both SEO and user experience.</p>
                </section>
                <section class="work-child">
                    <h2>Extensive Library Support</h2>
                    <p>CodeIgniter provides a comprehensive set of libraries, making it easy to integrate functionalities such as database management, email handling, and form validation.</p>
                </section>
                <section class="work-child">
                    <h2>Strong Community and Resources</h2>
                    <p>The CodeIgniter community is active and supportive, providing a wealth of resources, forums, and third-party extensions to assist developers in their projects.</p>
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


        <!-- #### faq ######  -->
        <div class="container" data-aos="zoom-in" data-aos-duration="1500">
            <h1>CodeIgniter Development: Frequently Asked Questions</h1>
        </div>

        <section class="faq-wrapper">
            <section class="faq-child">
                <section class="faq-heading">
                    <h1>What are the advantages of using CodeIgniter for web development?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    CodeIgniter is known for its lightweight framework and speed, making it ideal for developing dynamic web applications. It offers a simple and elegant toolkit for building full-featured web applications, with minimal configuration and an extensive library of built-in functions, which accelerates the development process.
                </p>
            </section>

            <section class="faq-child">
                <section class="faq-heading">
                    <h1>Can you customize CodeIgniter applications to fit specific needs?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    Yes, we can customize CodeIgniter applications to meet your specific business requirements. Our team can develop custom modules, libraries, and functionalities tailored to your project, ensuring a solution that aligns perfectly with your objectives and enhances user experience.
                </p>
            </section>

            <section class="faq-child">
                <section class="faq-heading">
                    <h1>How do you handle security in CodeIgniter applications?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    Security is a key focus in our CodeIgniter development process. We implement best practices such as data validation, encryption, and session management to safeguard applications against common vulnerabilities. Additionally, we regularly update CodeIgniter to leverage the latest security features and fixes.
                </p>
            </section>

            <section class="faq-child">
                <section class="faq-heading">
                    <h1>What types of projects are best suited for CodeIgniter?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    CodeIgniter is particularly well-suited for projects requiring rapid development and deployment, such as small to medium-sized applications, RESTful APIs, and websites that need straightforward CRUD functionalities. Its ease of use makes it a preferred choice for startups and businesses looking to launch quickly without compromising quality.
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