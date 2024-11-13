<?php

include_once 'db.php';


// Fetch all blog posts with slug, summary, and feature image
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs WHERE page_type = 'magneto-developer' ORDER BY id DESC";
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
                    <h1 data-aos="zoom-in" data-aos-duration="2500">Transform Your Ideas with Our Skilled Magento Developers</h1>
                    <h2 data-aos="zoom-in" data-aos-duration="2500">Custom Magento Solutions Tailored to Bring Your Vision to Life</h2>
                    <a href="https://calendly.com/salesfocesclouds/30min" data-aos="zoom-in" data-aos-duration="2500">Consult Our Experts</a>
                </div>
                <div class="child child2">
                    <img src="./images/magneto-developer.jpg" alt="">
                </div>
            </div>




            <!-- ####### INTRO ######### -->

            <div class="intro-wrapper">
                <div class="intro-slide intro-1" data-aos="fade-up" data-aos-duration="1500">
                    <h2>Maximize Your E-Commerce Success with Our Skilled Magento Developers, Providing Customized Solutions for Your Business Needs.</h2>
                    <p>Our experienced Magento developers specialize in creating powerful and flexible e-commerce platforms tailored to your unique business goals. By harnessing Magento's comprehensive capabilities, we build online stores that improve user interaction and enhance the overall shopping experience.</p>
                    <p>Dedicated to delivering excellence, we optimize your Magento site for speed and performance, ensuring it stands out in a competitive market. Partner with us to transform your online store and drive higher sales and customer satisfaction.</p>
                </div>




                <div class="intro-slide intro-2" data-aos="fade-down" data-aos-duration="1500">
                    <img src="./images/developer-primary.jpg" alt="">
                </div>





            </div>



            <!-- ######### Team ######  -->

            <div class="swiper mySwiper">
                <h1>Engage Performance-Oriented Magneto Professionals for Maximum ROI</h1>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/we-1.jpg" alt="">

                        </div>
                        <div class="swiper-slide-data">
                            <h2>Adrian</h2>
                            <p>Magneto Developer</p>
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
                            <p>Magneto Developer</p>
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
                            <p>Magneto Developer</p>
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
                            <p>Magneto Developer</p>
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
                            <p>Magneto Developer</p>
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
                            <p>Magneto Developer</p>
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
                <h1>Explore the Range of Services Provided by Magneto Developers</h1>

            </div>
            <section class="work-wrapper">

                <section class="work-wrapper-child">
                    <section class="work-child">
                        <h2>Custom Magento Development</h2>
                        <p>Magento developers create bespoke eCommerce solutions tailored to specific business needs.
                            They leverage Magento's robust framework to design and implement unique features, ensuring a
                            seamless shopping experience that aligns with the brand's identity.</p>
                    </section>
                    <section class="work-child">
                        <h2>Magento Theme Design</h2>
                        <p>Professional theme design is essential for an appealing online store. Magento developers
                            reate custom, responsive themes that reflect the brand's aesthetics, ensuring optimal performance
                            across devices while enhancing user engagement and retention.</p>
                    </section>
                    <section class="work-child">
                        <h2>Magento Extension Development</h2>
                        <p>Magento developers craft custom extensions to enhance eCommerce functionality. These extensions
                            can add unique features, integrations, or improvements, enabling businesses to meet specific
                            requirements and provide a better user experience.</p>
                    </section>
                    <section class="work-child">
                        <h2>Smooth Website Migration</h2>
                        <p>Migrating to Magento requires expertise to ensure a seamless transition. Developers manage
                            data transfer, configuration, and testing, ensuring that the website remains functional and
                            optimized while minimizing downtime during the migration process.</p>
                    </section>
                    <section class="work-child">
                        <h2>Ongoing Maintenance and Support</h2>
                        <p>Regular maintenance is crucial for Magento sites. Developers offer updates, security
                            enhancements, and troubleshooting services, ensuring optimal performance and security
                            while helping businesses stay up-to-date with the latest Magento features.</p>
                    </section>
                    <section class="work-child">
                        <h2> SEO and Performance Optimization</h2>
                        <p>To enhance search visibility, Magento developers implement effective SEO strategies
                            tailored for eCommerce. They optimize site structure, content, and loading speeds,
                            ensuring that the store not only ranks well but also provides an excellent user
                            experience.</p>
                    </section>

                </section>

            </section>



            <!-- ####### why choose us ########  -->
            <div class="about_container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Why Hire Magneto Developers From TekAlgo?</h1>

            </div>


            <div class="service_choose_us">

                <div class="services_container">

                    <!-- Service 1 - eCommerce Innovators -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>We design innovative solutions that elevate your online store, enhancing its functionality, user experience, and performance to create a seamless shopping experience for your customers.</p>
                            <img src="images/star.png" alt="" />
                            <h1>eCommerce Innovators</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Custom User Experiences -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>We enhance customer journeys through customized design, focusing on intuitive navigation, personalized interactions, and engaging features that drive satisfaction and repeat business for your store.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Custom User Experiences</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Robust Application Development -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Our team builds scalable Magento applications for businesses of all sizes, ensuring your online store is equipped with powerful features, robust security, and seamless integrations for growth.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Robust Application Development</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Reliable Performance Testing -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>We ensure that your Magento store operates flawlessly under pressure through rigorous performance testing, identifying potential issues, and optimizing your site’s speed and responsiveness.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Reliable Performance Testing</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Swift Setup and Launch -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>We ensure fast and efficient deployment for your Magento store, offering a seamless setup that gets your eCommerce platform up and running quickly without compromising quality.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Swift Setup and Launch</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - Dedicated Maintenance -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>We provide ongoing support and maintenance to ensure that your Magento store continues to perform at its best, addressing issues quickly and keeping your store updated with the latest features.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Dedicated Maintenance</h1>
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
                    Experience Numerous Advantages When You Hire Our Magneto Experts</h1>

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
                                <h2>Custom Extensions</h2>
                            </div>
                            <p>Our Magento developers are skilled in creating custom extensions that enhance your store's functionality. These tailored solutions allow you to add unique features and integrations specific to your business needs.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>User-Centric Design</h2>
                            </div>
                            <p>We focus on user-centric design principles to create intuitive navigation and a seamless shopping experience. By prioritizing usability, we help maximize customer satisfaction and increase conversion rates.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>Scalable Solutions</h2>
                            </div>
                            <p>Our Magento development is designed for scalability, ensuring your online store can grow with your business. Whether you're expanding your product range or increasing traffic, our solutions can adapt to meet your evolving needs.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>Advanced Analytics</h2>
                            </div>
                            <p>We implement advanced analytics tools that provide insights into customer behavior and sales trends. This data helps you make informed decisions to optimize your marketing strategies and improve overall performance.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>Mobile Optimization</h2>
                            </div>
                            <p>Our Magento stores are built with mobile optimization in mind, ensuring a responsive design that looks great on all devices. This approach enhances user experience and captures mobile shoppers effectively.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>Security Best Practices</h2>
                            </div>
                            <p>We prioritize security in our Magento development, implementing best practices to protect your store from vulnerabilities. Regular security updates and audits help safeguard customer data and maintain trust.</p>
                        </div>
                    </div>

                </div>
            </div>









            <!-- ######## collaboration #####  -->
            <section class="collaboration-wrapper">r
                <section class="collaboration-header">
                    <h1>Simple Steps to Begin Your Journey with Our Magneto Team</h1>
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
                <h1>Magento Development Services FAQs</h1>
            </div>

            <section class="faq-wrapper">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What types of e-commerce websites can Magento developers create?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Magento developers can create a wide range of e-commerce websites, from small online stores to large-scale enterprise-level platforms. They specialize in building customized, feature-rich websites that cater to specific business needs, including B2B and B2C solutions.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do Magento developers ensure website security?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Magento developers prioritize security by following best practices such as regular updates to the Magento core and extensions, implementing SSL certificates, and using security patches. They also configure user roles and permissions to prevent unauthorized access to sensitive data.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can Magento developers customize themes and modules?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, Magento developers can create custom themes and modify existing modules to enhance the functionality and design of the website. They utilize PHP, HTML, CSS, and JavaScript to tailor the user experience and ensure the site aligns with branding requirements.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do Magento developers handle SEO optimization?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Magento developers implement SEO best practices by optimizing site structure, meta tags, and URLs. They also use SEO-friendly extensions to improve product visibility and enhance search engine rankings, helping to drive organic traffic to the online store.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What are some best practices for Magento development?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Best practices for Magento development include following coding standards, optimizing performance through caching and indexing, and regularly backing up the website. Developers should also ensure compliance with Magento's guidelines for a seamless and efficient deployment.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do Magento developers ensure website performance?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Magento developers enhance website performance through techniques such as enabling full-page caching, optimizing images, and utilizing a content delivery network (CDN). They also regularly monitor site speed and performance metrics to ensure a fast and reliable shopping experience for users.
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