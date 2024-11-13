<?php

include_once 'db.php';


// Fetch all blog posts with slug, summary, and feature image
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs WHERE page_type = 'magneto' ORDER BY id DESC";
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
                <h1 data-aos="zoom-in" data-aos-duration="1500">Transforming Online Retail with Magento Expertise</h1>
            </div>
            <section class="expertise">
                <div class="expertise-child">
                    <h1>Tailored E-Commerce Platforms</h1>
                    <p>We create custom e-commerce platforms with Magento that are designed to meet the unique requirements of your business, enhancing your online presence and customer engagement.</p>
                </div>
                <div class="expertise-child">
                    <h1>Intuitive User Experience Design</h1>
                    <p>Our focus is on delivering intuitive user experience designs that guide customers seamlessly through the purchasing process, increasing conversion rates and customer loyalty.</p>
                </div>
                <div class="expertise-child">
                    <h1>Advanced Inventory Management</h1>
                    <p>We implement advanced inventory management solutions in Magento, allowing you to efficiently track stock levels, manage orders, and streamline fulfillment processes.</p>
                </div>
                <div class="expertise-child">
                    <h1>Multi-Channel Integration</h1>
                    <p>We integrate your Magento store with multiple sales channels, enabling you to reach customers across various platforms while maintaining consistent branding and inventory management.</p>
                </div>
                <div class="expertise-child">
                    <h1>Enhanced Security Measures</h1>
                    <p>We prioritize security in your Magento store by implementing the latest security measures and best practices, ensuring that customer data is protected and transactions are secure.</p>
                </div>
                <div class="expertise-child">
                    <h1>Comprehensive Training and Support</h1>
                    <p>We provide comprehensive training and ongoing support for your team, ensuring they are equipped to manage and optimize your Magento store effectively.</p>
                </div>
            </section>





            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Transforming Industries with Advanced Magento Solutions</h1>
            </div>

            <div class="service_choose_us">
                <div class="services_container">

                    <!-- Service 1 - Retail -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Building robust retail solutions with Magento, enabling personalized shopping experiences, real-time inventory updates, and secure transactions.
                            </p>
                            <img src="images/ecommerce-magento.png" alt="" />
                            <h1>Retail</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Healthcare -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Developing specialized e-commerce platforms for healthcare products, ensuring compliance with regulations and enhancing patient access to medical supplies.
                            </p>
                            <img src="images/healthcare-magento.png" alt="" />
                            <h1>Healthcare</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Education -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Creating e-learning solutions with Magento that offer courses, digital content, and subscription management to enhance learning experiences.
                            </p>
                            <img src="images/education-magento.png" alt="" />
                            <h1>Education</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Fashion -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Designing visually stunning fashion e-commerce sites with Magento, focusing on user experience, trend updates, and seamless product showcases.
                            </p>
                            <img src="images/fashion-magento.png" alt="" />
                            <h1>Fashion</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Automotive -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Building comprehensive e-commerce solutions for automotive parts and accessories, providing detailed product information and secure payment options.
                            </p>
                            <img src="images/automotive-magento.png" alt="" />
                            <h1>Automotive</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - Food and Beverage -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Creating efficient e-commerce platforms for food and beverage industries, enabling easy ordering, subscription services, and delivery tracking.
                            </p>
                            <img src="images/food-beverage-magento.png" alt="" />
                            <h1>Food and Beverage</h1>
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
            <h1>Why Magento is the Go-To Platform for E-Commerce</h1>
        </div>
        <section class="work-wrapper">
            <section class="work-wrapper-child">
                <section class="work-child">
                    <h2>Robust E-Commerce Features</h2>
                    <p>Magento offers a comprehensive set of e-commerce features, including product management, order processing, and customer segmentation, tailored for businesses of all sizes.</p>
                </section>
                <section class="work-child">
                    <h2>Highly Customizable</h2>
                    <p>The platform provides extensive customization options, allowing developers to create unique storefronts that reflect brand identity and meet specific business needs.</p>
                </section>
                <section class="work-child">
                    <h2>Scalability for Growth</h2>
                    <p>Magento is designed to scale effortlessly, accommodating increasing traffic and sales volume as businesses grow, making it ideal for rapidly expanding e-commerce operations.</p>
                </section>
                <section class="work-child">
                    <h2>SEO-Friendly Architecture</h2>
                    <p>Magento’s built-in SEO features, such as customizable URLs and meta tags, help improve search engine visibility, driving organic traffic to online stores.</p>
                </section>
                <section class="work-child">
                    <h2>Robust Community Support</h2>
                    <p>The Magento community is active and resourceful, providing access to forums, documentation, and third-party extensions that enhance functionality.</p>
                </section>
                <section class="work-child">
                    <h2>Mobile-Optimized Experience</h2>
                    <p>Magento supports responsive design, ensuring that online stores are optimized for mobile devices, which is crucial for reaching a broader audience.</p>
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


        <!-- ###### faq ######  -->
        <div class="container" data-aos="zoom-in" data-aos-duration="1500">
            <h1>Magento Development: Frequently Asked Questions</h1>
        </div>

        <section class="faq-wrapper">
            <section class="faq-child">
                <section class="faq-heading">
                    <h1>What is Magento and what are its key features?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    Magento is a powerful open-source e-commerce platform known for its flexibility and scalability. Key features include a customizable product catalog, multiple payment gateways, robust SEO capabilities, and support for multiple languages and currencies. Magento also offers a wide range of extensions to enhance functionality, making it suitable for businesses of all sizes.
                </p>
            </section>

            <section class="faq-child">
                <section class="faq-heading">
                    <h1>How do you ensure the security of Magento e-commerce sites?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    We prioritize security in Magento e-commerce sites by implementing best practices such as regular software updates, using strong passwords, and applying SSL certificates for secure transactions. Our team also conducts regular security audits, and we utilize security extensions to protect against vulnerabilities like cross-site scripting and SQL injection.
                </p>
            </section>

            <section class="faq-child">
                <section class="faq-heading">
                    <h1>Can you integrate third-party services with Magento?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    Yes, we can seamlessly integrate third-party services with Magento, including payment processors, shipping providers, and CRM systems. This integration enhances the overall functionality of your e-commerce platform, allowing for a more streamlined operation and improved user experience.
                </p>
            </section>

            <section class="faq-child">
                <section class="faq-heading">
                    <h1>How do you handle performance optimization for Magento stores?</h1>
                    <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                </section>
                <p>
                    We optimize the performance of Magento stores by employing various strategies, such as optimizing images, implementing caching techniques, and minimizing the use of heavy scripts. We also configure the server environment for optimal performance and regularly monitor site speed to ensure a smooth user experience, especially during peak traffic times.
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