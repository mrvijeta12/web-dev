<?php

include_once 'db.php';


// Fetch all blog posts with slug, summary, and feature image
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs WHERE page_type = 'joomla-developer' ORDER BY id DESC";
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
                    <h1 data-aos="zoom-in" data-aos-duration="2500">Transform Your Ideas with Our Skilled Joomla Developers</h1>
                    <h2 data-aos="zoom-in" data-aos-duration="2500">Custom Joomla Solutions Tailored to Bring Your Vision to Life</h2>
                    <a href="https://calendly.com/salesfocesclouds/30min" data-aos="zoom-in" data-aos-duration="2500">Consult Our Experts</a>
                </div>
                <div class="child child2">
                    <img src="./images/joomla-developer.jpg" alt="">
                </div>
            </div>




            <!-- ####### INTRO ######### -->

            <div class="intro-wrapper">

                <div class="intro-slide intro-1" data-aos="fade-up" data-aos-duration="1500">
                    <h2>Elevate Your Online Presence with Our Skilled Joomla Developers, Delivering Tailored Solutions for Your Business.</h2>
                    <p>Our expert Joomla developers excel at creating user-friendly and dynamic websites that align with your specific needs. By leveraging Joomla's powerful features, we build customized solutions that enhance your content management experience and engage your audience effectively.</p>
                    <p>With a commitment to quality and performance, we ensure your Joomla site is optimized for both users and search engines. Partner with us to bring your vision to life and see how our dedicated team can transform your online presence.</p>
                </div>




                <div class="intro-slide intro-2" data-aos="fade-down" data-aos-duration="1500">
                    <img src="./images/developer-primary.jpg" alt="">
                </div>





            </div>



            <!-- ######### Team ######  -->

            <div class="swiper mySwiper">
                <h1>Engage Performance-Oriented Joomla Professionals for Maximum ROI</h1>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/we-1.jpg" alt="">

                        </div>
                        <div class="swiper-slide-data">
                            <h2>Adrian</h2>
                            <p>Joomla Developer</p>
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
                            <p>Joomla Developer</p>
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
                            <p>Joomla Developer</p>
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
                            <p>Joomla Developer</p>
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
                            <p>Joomla Developer</p>
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
                            <p>Joomla Developer</p>
                            <strong>Experience <i class="fa-solid fa-angles-right"></i> 5+ Years</strong>
                            <p>Avability <i class="fa-solid fa-angles-right"></i> Full-Time</p>
                            <button>Hire Now </button>

                        </div>
                    </div>

                </div>
                <div class="swiper-pagination"></div>
            </div>



            <!-- ####### WORKING WITH US ######  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>Explore the Range of Services Provided by Joomla Developers</h1>

            </div>
            <section class="work-wrapper">

                <section class="work-wrapper-child">
                    <section class="work-child">
                        <h2>Custom Joomla Development Services</h2>
                        <p>Joomla developers create personalized websites tailored to specific business needs.
                            They leverage the platform's flexibility to design unique features and functionality,
                            ensuring a seamless user experience that aligns with the brand's identity.</p>
                    </section>
                    <section class="work-child">
                        <h2>Professional Template Design</h2>
                        <p>Creating custom templates is a crucial service offered by Joomla developers. They
                            design visually appealing and responsive templates that reflect the brand's aesthetics,
                            ensuring compatibility with all devices while enhancing user engagement.</p>
                    </section>
                    <section class="work-child">
                        <h2>Tailored Extension Development</h2>
                        <p>Joomla developers craft custom extensions to enhance website functionality. These
                            extensions, including components and modules, add tailored features that meet
                            specific business requirements, allowing for greater interactivity and improved
                            user experience.</p>
                    </section>
                    <section class="work-child">
                        <h2>Seamless Website Migration</h2>
                        <p>Joomla developers facilitate seamless migration from other platforms to Joomla.
                            They manage data transfer, configuration, and testing to ensure that the website
                            remains functional and optimized, minimizing downtime and maintaining user accessibility
                            throughout the process.</p>
                    </section>
                    <section class="work-child">
                        <h2>Ongoing Maintenance and Support</h2>
                        <p>Regular maintenance and support are vital for Joomla websites. Developers provide
                            updates, security enhancements, and troubleshooting services to ensure optimal performance,
                            helping businesses protect their online presence while staying up-to-date with Joomla
                            advancements.</p>
                    </section>
                    <section class="work-child">
                        <h2>SEO and Performance Optimization</h2>
                        <p>To improve search visibility, Joomla developers implement effective SEO strategies tailored
                            for Joomla sites. They optimize site architecture, content, and loading speeds, ensuring that
                            the website not only ranks well but also offers an excellent user experience.</p>
                    </section>

                </section>

            </section>



            <!-- ####### why choose us ########  -->
            <div class="about_container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Why Hire Joomla Developers From TekAlgo?</h1>

            </div>


            <div class="service_choose_us">

                <div class="services_container">

                    <!-- Service 1 - Joomla Professionals -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Our expert developers specialize in Joomla, offering highly efficient solutions tailored to your project’s needs, ensuring that your website performs optimally and supports your business goals effectively.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Joomla Professionals</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Dynamic Designs -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>We create custom, engaging designs that captivate users, offering visually appealing layouts combined with optimal functionality to enhance user experience and drive long-term engagement.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Dynamic Designs</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Efficient Solutions -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Our development process is designed for efficiency, ensuring that your Joomla projects are delivered quickly without compromising quality, allowing your business to achieve faster time-to-market and success.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Efficient Solutions</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Thorough Testing -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>We conduct comprehensive testing throughout the development process, ensuring your Joomla website is flawless, functional, and secure, providing a seamless user experience across all devices.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Thorough Testing</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Value-Driven Services -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Our services are designed to offer exceptional value, ensuring high-quality Joomla solutions that fit within your budget, helping you achieve optimal performance without overspending.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Value-Driven Services</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - Client-Centric Approach -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Our client-centric approach places your satisfaction at the core of every project, ensuring we align our efforts with your specific needs, providing tailored Joomla solutions to exceed expectations.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Client-Centric Approach</h1>
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
                    Experience Numerous Advantages When You Hire Our Joomla Experts</h1>

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
                                <h2>Custom Templates</h2>
                            </div>
                            <p>Our Joomla developers excel in creating custom templates that reflect your brand identity. These unique designs enhance user engagement while providing a seamless browsing experience tailored to your audience.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>User Management</h2>
                            </div>
                            <p>We leverage Joomla’s robust user management system to create tailored user roles and permissions. This ensures that your site is secure while providing the right access levels for different users.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>Multilingual Capabilities</h2>
                            </div>
                            <p>Our team specializes in building multilingual Joomla sites, allowing you to reach a global audience. We implement language packs and features that enhance accessibility and user experience for diverse demographics.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>Extension Integration</h2>
                            </div>
                            <p>We are proficient in integrating various Joomla extensions to enhance functionality. Whether you need e-commerce solutions or social media tools, we can seamlessly incorporate them into your website.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>Performance Optimization</h2>
                            </div>
                            <p>Our Joomla development focuses on performance optimization techniques, ensuring your website loads quickly and efficiently. We implement caching, image optimization, and other strategies to enhance user experience.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>Continuous Support</h2>
                            </div>
                            <p>After launching your Joomla site, we provide ongoing support and maintenance. Our dedicated team is always available to address issues, perform updates, and ensure your website runs smoothly over time.</p>
                        </div>
                    </div>

                </div>
            </div>









            <!-- ######## collaboration #####  -->
            <section class="collaboration-wrapper">r
                <section class="collaboration-header">
                    <h1>Simple Steps to Begin Your Journey with Our Joomla Team</h1>
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
                <h1>Joomla Development Services FAQs</h1>
            </div>

            <section class="faq-wrapper">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What types of websites can Joomla developers create?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Joomla developers can create a diverse range of websites, including blogs, e-commerce platforms, corporate websites, and community portals. Joomla's flexibility and powerful content management system make it suitable for both simple and complex projects that require user management and extensive content organization.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do Joomla developers ensure website security?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Joomla developers prioritize security by regularly updating the Joomla core and extensions, applying security patches, and using security plugins. They implement strong user access controls and follow best practices to mitigate risks such as SQL injection and cross-site scripting (XSS) attacks.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can Joomla developers customize templates and extensions?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, Joomla developers can customize existing templates and create custom extensions to enhance functionality and tailor the website’s design to meet specific business needs. They use PHP, HTML, CSS, and JavaScript to deliver personalized solutions that align with branding and user requirements.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do Joomla developers handle content management and SEO?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Joomla developers leverage built-in content management features to organize and manage website content effectively. They implement SEO best practices, such as optimizing meta tags, URLs, and using SEO extensions to enhance visibility in search engines and improve organic traffic.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What are some best practices for Joomla development?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Best practices for Joomla development include maintaining updated backups, optimizing website performance by minimizing extensions, and adhering to Joomla coding standards. Regular updates and security audits are essential for ensuring the stability and security of the website.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do Joomla developers ensure website performance?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Joomla developers enhance website performance through techniques such as caching, image optimization, and using content delivery networks (CDNs). They monitor site speed and make necessary adjustments to ensure a fast and responsive user experience.
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