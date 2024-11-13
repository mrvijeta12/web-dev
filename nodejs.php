<?php

include_once 'db.php';


// Fetch all blog posts with slug, summary, and feature image
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs WHERE page_type = 'nodejs' ORDER BY id DESC";
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
                <h1 data-aos="zoom-in" data-aos-duration="1500">Unlocking Potential with Node.js Development</h1>
            </div>
            <section class="expertise">
                <div class="expertise-child">
                    <h1>Asynchronous Event-Driven Architecture</h1>
                    <p>We leverage Node.js’s asynchronous event-driven architecture to build high-performance applications that handle multiple requests efficiently. This approach enhances scalability and responsiveness.</p>
                </div>
                <div class="expertise-child">
                    <h1>RESTful API Development</h1>
                    <p>Our team specializes in developing RESTful APIs with Node.js, enabling seamless communication between clients and servers. We ensure that APIs are robust, secure, and easy to integrate with various platforms.</p>
                </div>
                <div class="expertise-child">
                    <h1>Real-Time Application Solutions</h1>
                    <p>We create real-time applications using Node.js, utilizing technologies like WebSockets to provide instant communication and updates. This is ideal for chat applications, live notifications, and collaborative tools.</p>
                </div>
                <div class="expertise-child">
                    <h1>Microservices Architecture</h1>
                    <p>Our expertise includes implementing microservices architecture with Node.js, allowing for modular development and easier maintenance of applications. This approach promotes agility and scalability.</p>
                </div>
                <div class="expertise-child">
                    <h1>Data Streaming and Processing</h1>
                    <p>We harness Node.js for efficient data streaming and processing, making it suitable for applications that require handling large volumes of data in real-time, such as video streaming and analytics platforms.</p>
                </div>
                <div class="expertise-child">
                    <h1>Comprehensive Testing and Debugging</h1>
                    <p>We implement comprehensive testing and debugging practices in Node.js applications using tools like Mocha and Chai, ensuring high reliability and performance before deployment.</p>
                </div>
            </section>




            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Transforming Industries with Advanced Node.js Solutions</h1>
            </div>

            <div class="service_choose_us">
                <div class="services_container">

                    <!-- Service 1 - Transportation -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Developing real-time logistics and transportation management systems using Node.js for efficient tracking and route optimization.
                            </p>
                            <img src="images/transportation-node.png" alt="" />
                            <h1>Transportation</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Real Estate -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Creating powerful property management platforms with Node.js that enhance user experience through real-time listings and analytics.
                            </p>
                            <img src="images/real-estate-node.png" alt="" />
                            <h1>Real Estate</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Travel and Tourism -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Building dynamic travel booking applications with Node.js that provide real-time availability and personalized travel recommendations.
                            </p>
                            <img src="images/travel-node.png" alt="" />
                            <h1>Travel and Tourism</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Manufacturing -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Implementing inventory management and production tracking systems with Node.js for increased efficiency and data-driven decision-making.
                            </p>
                            <img src="images/manufacturing-node.png" alt="" />
                            <h1>Manufacturing</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Fashion and Retail -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Creating e-commerce solutions for the fashion industry using Node.js, enabling personalized shopping experiences and real-time inventory updates.
                            </p>
                            <img src="images/fashion-node.png" alt="" />
                            <h1>Fashion and Retail</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - Sports and Fitness -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Developing interactive fitness applications with Node.js that track performance metrics and offer personalized training plans in real-time.
                            </p>
                            <img src="images/sports-node.png" alt="" />
                            <h1>Sports and Fitness</h1>
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
            <h1>Key Advantages of Using Node.js for Web Development</h1>
        </div>
        <section class="work-wrapper">
            <section class="work-wrapper-child">
                <section class="work-child">
                    <h2>High Concurrency Handling</h2>
                    <p>Node.js is designed to handle many connections simultaneously, making it ideal for applications that require high concurrency without compromising performance.</p>
                </section>
                <section class="work-child">
                    <h2>Asynchronous Programming Model</h2>
                    <p>The asynchronous programming model of Node.js allows developers to write non-blocking code, which enhances application responsiveness and improves user experience.</p>
                </section>
                <section class="work-child">
                    <h2>Seamless API Development</h2>
                    <p>Node.js simplifies the creation of RESTful APIs, enabling developers to build scalable and efficient web services that can be easily consumed by various clients.</p>
                </section>
                <section class="work-child">
                    <h2>Cross-Platform Development</h2>
                    <p>Node.js enables cross-platform development, allowing developers to build applications that run on multiple operating systems without significant modifications.</p>
                </section>
                <section class="work-child">
                    <h2>Integrated Debugging Tools</h2>
                    <p>Node.js offers integrated debugging tools that simplify the troubleshooting process, helping developers identify and resolve issues quickly during development.</p>
                </section>
                <section class="work-child">
                    <h2>Growing Adoption in Industry</h2>
                    <p>Node.js is increasingly adopted by leading tech companies for its performance and scalability, making it a valuable skill for developers in today’s job market.</p>
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


        <!-- ### faq ######  -->
        <div class="container" data-aos="zoom-in" data-aos-duration="1500">
            <h1>Node.js Development: Frequently Asked Questions</h1>
        </div>

        <section class="faq-wrapper">
            <section class="faq-child">
                <section class="faq-heading">
                    <h1>What are the benefits of using Node.js for web development?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    Node.js is known for its non-blocking, event-driven architecture, which allows for high concurrency and scalability. This makes it ideal for building fast, real-time applications like chat applications, online gaming, and streaming services. Additionally, Node.js uses JavaScript, enabling full-stack development with a single language.
                </p>
            </section>

            <section class="faq-child">
                <section class="faq-heading">
                    <h1>How do you ensure the performance of Node.js applications?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    We focus on optimizing Node.js applications through efficient coding practices, utilizing asynchronous programming, and leveraging built-in caching mechanisms. Our team also monitors application performance using various tools to identify bottlenecks and ensure smooth user experiences.
                </p>
            </section>

            <section class="faq-child">
                <section class="faq-heading">
                    <h1>Can you integrate Node.js applications with databases?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    Yes, Node.js can be easily integrated with various databases, both SQL (like MySQL and PostgreSQL) and NoSQL (like MongoDB and Redis). Our developers use ORM tools and query builders to facilitate efficient data interaction, ensuring your application can handle data operations smoothly and effectively.
                </p>
            </section>

            <section class="faq-child">
                <section class="faq-heading">
                    <h1>What types of applications are best suited for Node.js?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    Node.js is particularly well-suited for applications that require real-time interaction, such as chat applications, collaborative tools, and gaming platforms. It is also a great choice for building RESTful APIs and microservices, where its lightweight nature and speed can greatly enhance performance and scalability.
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