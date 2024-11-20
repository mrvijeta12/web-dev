<?php

include_once 'db.php';


// Fetch all blog posts with slug, summary, and feature image
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs WHERE category = 'prestashop-developer' ORDER BY id DESC";
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
                    <h1 data-aos="zoom-in" data-aos-duration="2500">Transform Your Ideas with Our Skilled PrestaShop Developers</h1>
                    <h2 data-aos="zoom-in" data-aos-duration="2500">Custom PrestaShop Solutions Tailored to Bring Your Vision to Life</h2>
                    <a href="https://calendly.com/salesfocesclouds/30min" data-aos="zoom-in" data-aos-duration="2500">Consult Our Experts</a>
                </div>
                <div class="child child2">
                    <img src="./images/prestashop-developer.jpg" alt="">
                </div>
            </div>




            <!-- ####### INTRO ######### -->

            <div class="intro-wrapper">

                <div class="intro-slide intro-1" data-aos="fade-up" data-aos-duration="1500">
                    <h2>Enhance Your E-Commerce Experience with Our Skilled PrestaShop Developers, Delivering Tailored Solutions for Your Business Needs.</h2>
                    <p>Our expert PrestaShop developers are committed to creating powerful and flexible online stores that cater to your unique requirements. By utilizing PrestaShop's robust features, we design custom e-commerce solutions that engage customers and streamline the buying process.</p>
                    <p>With a focus on performance and user experience, we ensure your PrestaShop site is optimized for speed and functionality, driving higher conversion rates. Partner with us to unlock your store's potential and watch your online business thrive.</p>
                </div>




                <div class="intro-slide intro-2" data-aos="fade-down" data-aos-duration="1500">
                    <img src="./images/developer-primary.jpg" alt="">
                </div>





            </div>



            <!-- ######### Team ######  -->

            <div class="swiper mySwiper">
                <h1>Engage Performance-Oriented PrestaShop Professionals for Maximum ROI</h1>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/we-1.jpg" alt="">

                        </div>
                        <div class="swiper-slide-data">
                            <h2>Adrian</h2>
                            <p>PrestaShop Developer</p>
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
                            <p>PrestaShop Developer</p>
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
                            <p>PrestaShop Developer</p>
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
                            <p>PrestaShop Developer</p>
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
                            <p>PrestaShop Developer</p>
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
                            <p>PrestaShop Developer</p>
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
                <h1>Explore the Range of Services Provided by PrestaShop Developers</h1>

            </div>
            <section class="work-wrapper">

                <section class="work-wrapper-child">
                    <section class="work-child">
                        <h2>Custom PrestaShop Development</h2>
                        <p>PrestaShop developers create tailored eCommerce solutions to meet unique business requirements.
                            They leverage PrestaShop's extensive features to design and implement custom functionalities,
                            ensuring a smooth shopping experience that aligns with the brand's vision.</p>
                    </section>
                    <section class="work-child">
                        <h2>PrestaShop Theme Design</h2>
                        <p>Professional theme design is vital for an attractive online store. PrestaShop developers craft
                            custom, responsive themes that reflect the brand’s identity, ensuring optimal performance across
                            all devices while enhancing user engagement.</p>
                    </section>
                    <section class="work-child">
                        <h2>PrestaShop Module Development</h2>
                        <p>Developers build custom modules to enhance store functionality. These modules can introduce
                            unique features or integrations, allowing businesses to optimize their online presence and
                            improve the overall shopping experience.</p>
                    </section>
                    <section class="work-child">
                        <h2>Seamless Store Migration</h2>
                        <p>Migrating to PrestaShop requires expertise for a hassle-free transition. Developers manage data
                            transfer, configuration, and testing to ensure the store remains functional and optimized,
                            minimizing downtime during the migration process.</p>
                    </section>
                    <section class="work-child">
                        <h2>Ongoing Maintenance and Support</h2>
                        <p>Regular maintenance is crucial for PrestaShop sites. Developers offer updates, security enhancements,
                            and troubleshooting services, ensuring optimal performance and helping businesses stay current with
                            the latest PrestaShop features.</p>
                    </section>
                    <section class="work-child">
                        <h2>SEO and Performance Optimization</h2>
                        <p>To enhance search visibility, PrestaShop developers implement effective SEO strategies tailored
                            for eCommerce. They optimize site structure, content, and loading speeds, ensuring the store ranks
                            well and provides an exceptional user experience.</p>
                    </section>

                </section>

            </section>



            <!-- ####### why choose us ########  -->
            <div class="about_container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Why Hire PrestaShop Developers From TekAlgo?</h1>

            </div>


            <div class="service_choose_us">

                <div class="services_container">

                    <!-- Service 1 - Proficient Team -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Our team of PrestaShop specialists brings advanced technical skills and expertise to build scalable, high-performance online stores that are tailored to your business requirements and growth goals.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Proficient Team</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Personalized Solutions -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>We offer personalized strategies for your online store, ensuring that every solution is perfectly aligned with your brand’s identity, customer needs, and business objectives for long-term success.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Personalized Solutions</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Efficient Processes -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Our development processes are designed for maximum efficiency, ensuring that your PrestaShop store is completed on time, with the highest standards of quality, and without any delays in delivery.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Efficient Processes</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Comprehensive Support -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>We provide continuous support throughout the entire lifecycle of your PrestaShop project, ensuring that your store remains fully operational, up-to-date, and optimized for success at all times.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Comprehensive Support</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Value Pricing -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>We offer competitive, value-driven pricing for all PrestaShop services, ensuring you get high-quality development, design, and support at a price that suits your business budget and goals.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Value Pricing</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - Reliable Expertise -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Our proven expertise in PrestaShop development has helped clients across the globe build successful, scalable eCommerce platforms, resulting in satisfied customers and lasting business partnerships.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Reliable Expertise</h1>
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
                    Experience Numerous Advantages When You Hire Our PrestaShop Experts</h1>

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
                                <h2>Dynamic Product Displays</h2>
                            </div>
                            <p>Our PrestaShop developers create dynamic product displays that showcase your items effectively. Utilizing features like zoom effects and image sliders, we enhance visual appeal and encourage customer interaction.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>Custom Checkout Solutions</h2>
                            </div>
                            <p>We design custom checkout processes tailored to your business model, simplifying the purchasing journey. This streamlined approach reduces friction and improves conversion rates by making it easier for customers to complete their purchases.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>Advanced Marketing Tools</h2>
                            </div>
                            <p>We integrate advanced marketing tools, including email campaigns and promotional modules, to help you reach your audience effectively. These features enable targeted marketing efforts that drive traffic and boost sales.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>Mobile Optimization</h2>
                            </div>
                            <p>Our PrestaShop solutions prioritize mobile optimization, ensuring your store is fully responsi

                        </div>
                    </div>

                </div>
            </div>











            <!-- ######## collaboration #####  -->
            <section class="collaboration-wrapper">r
                <section class="collaboration-header">
                    <h1>Simple Steps to Begin Your Journey with Our PrestaShop Team</h1>
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
                <h1>PrestaShop Development Services FAQs</h1>
            </div>

            <section class="faq-wrapper">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What types of e-commerce websites can PrestaShop developers create?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        PrestaShop developers can create a wide range of e-commerce websites, including small retail shops, large-scale online stores, and multi-vendor marketplaces. They specialize in developing customizable, scalable, and feature-rich e-commerce solutions tailored to meet specific business needs.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do PrestaShop developers ensure website security?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        PrestaShop developers prioritize security by regularly updating the PrestaShop core and modules, implementing SSL certificates, and utilizing secure payment gateways. They also apply best practices in coding and configuration to protect against vulnerabilities such as SQL injection and XSS attacks.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can PrestaShop developers customize themes and modules?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, PrestaShop developers can customize existing themes and create new modules to enhance the functionality and aesthetics of the online store. They use HTML, CSS, JavaScript, and PHP to deliver tailored solutions that align with business branding and operational requirements.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do PrestaShop developers handle SEO optimization?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        PrestaShop developers implement SEO best practices by optimizing product pages, meta tags, URLs, and image attributes. They also use various SEO modules and tools to improve site visibility and search rankings, ensuring that the online store attracts organic traffic.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What are some best practices for PrestaShop development?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Best practices for PrestaShop development include maintaining regular backups, optimizing site performance through caching and CDN usage, and ensuring the use of responsive design principles. Developers should also follow PrestaShop coding standards for seamless updates and compatibility.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do PrestaShop developers ensure website performance?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        PrestaShop developers enhance website performance by optimizing images, leveraging caching mechanisms, and reducing the number of requests made to the server. They regularly monitor the site's speed and performance metrics to ensure a fast and efficient shopping experience for users.
                    </p>
                </section>
            </section>
















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