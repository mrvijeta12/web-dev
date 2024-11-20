<?php

include_once 'db.php';


// Fetch all blog posts with slug, summary, and feature image
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs WHERE category = 'cms' ORDER BY id DESC";
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
    <link rel="stylesheet" href="assests/css/web-services.css">
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

            <!-- ################################# HERO SECTION ##################################  -->
            <div class="hero">
                <div class="hero-image">
                    <img src="./images/cms-hero.jpg" alt="">
                </div>
                <div class="hero-data">
                    <h1 data-aos="zoom-in" data-aos-duration="2500">Manage Your Content Seamlessly with CMS</h1>
                    <h2 data-aos="zoom-in" data-aos-duration="2500">Easily create, manage, and optimize your content.</h2>
                    <a href="#" class="reopenPopup">Get Professional Advice</a>
                </div>
            </div>


            <!-- ####### INTRODUCTION  ####### -->

            <section class="intro">
                <h1>Dynamic CMS Solutions for Effortless Content Management and Collaboration</h1>
                <p>Our advanced CMS solutions simplify the creation, management, and distribution of digital content across multiple channels. Designed to enhance collaboration and streamline workflows, it empowers your team to efficiently publish and update content in real-time. With intuitive interfaces, robust editing tools, and seamless integration, our CMS ensures that your content strategy is executed flawlessly, driving engagement and growth.</p>
            </section>




            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Core Features of CMS Solutions</h1>
            </div>
            <div class="service_choose_us">
                <div class="services_container">
                    <!-- Service 1 - Content Creation -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Intuitive tools simplify the creation, editing, and organization of digital content, making it easier for teams to manage and produce high-quality materials efficiently.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Content Creation</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - SEO Management -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Enhance visibility with built-in SEO tools, improving content rankings in search engines, and making it easier for audiences to discover your site and engage with content.</p>
                            <img src="images/star.png" alt="" />
                            <h1>SEO Management</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Content Scheduling -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Efficiently schedule content publication with automation features that streamline deployment and help maintain a consistent publishing cadence, ensuring timely updates for your audience.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Content Scheduling</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Customizable Templates -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Access flexible templates that can be customized to match branding, functional needs, and user preferences, ensuring your content aligns with organizational standards.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Customizable Templates</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - User Permissions -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Manage user access levels with customizable permissions, enhancing content security and integrity by ensuring that only authorized personnel can make critical edits or updates.</p>
                            <img src="images/star.png" alt="" />
                            <h1>User Permissions</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>
                </div>
            </div>









            <!-- ######### Benefits ##########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Key Benefits of Implementing CMS Systems</h1>

            </div>


            <section class="benefits-wrapper">


                <div class="benefits-sectors">
                    <ul>
                        <li>User-friendly interface for easy content creation and management.</li>
                        <li>Improved collaboration between content creators and editors.</li>
                        <li>Faster time-to-market for new content.</li>
                        <li>Streamlined content updates and version control.</li>
                        <li>Enhanced SEO capabilities for better online visibility.</li>
                    </ul>
                    <ul>
                        <li>Centralized content storage for easy access and retrieval.</li>
                        <li>Support for multimedia content and responsive design.</li>
                        <li>Integration with other marketing tools and platforms.</li>
                        <li>Customizable templates for branding consistency.</li>
                        <li>Analytics for tracking content performance and user engagement.</li>
                    </ul>
                </div>

            </section>

            <!-- ####### WORKING WITH US ######  -->

            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>The Importance of Content Management Systems in Today’s Digital Landscape</h1>
                <p>Content Management Systems (CMS) are essential tools that empower businesses to manage their digital content efficiently. This article explores the core features and advantages of using a CMS:</p>
            </div>
            <section class="work-wrapper">
                <section class="work-wrapper-child">
                    <section class="work-child">
                        <h2>
                            <span>1.</span>Streamlined Content Workflow:
                        </h2>
                        <p>A CMS facilitates a structured workflow for content creation, review, and publishing. This organization helps teams collaborate more effectively, ensuring that content is delivered on time and meets quality standards.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>2.</span>Enhanced Collaboration Tools:
                        </h2>
                        <p>Modern CMS platforms provide tools that enhance collaboration among team members. Features like commenting, version history, and user notifications enable seamless communication during the content creation process.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>3.</span>Multi-User Support:
                        </h2>
                        <p>CMSs support multiple users with varying permission levels, allowing for efficient delegation of tasks. This ensures that content can be created and managed by different team members based on their expertise and roles.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>4.</span>Content Scheduling:
                        </h2>
                        <p>Many CMS platforms allow users to schedule content for future publication. This feature is particularly useful for managing campaigns and ensuring that content is released at optimal times for engagement.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>5.</span>Rich Media Integration:
                        </h2>
                        <p>CMSs enable the easy integration of various media types, including images, videos, and audio. This capability enhances content richness, making it more engaging and appealing to users.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>6.</span>Customizable User Experience:
                        </h2>
                        <p>CMS platforms often allow for customization, enabling businesses to tailor the user experience according to their brand identity. This adaptability helps maintain a consistent look and feel across all content.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>7.</span>Security Features:
                        </h2>
                        <p>Security is paramount in managing content. CMSs typically offer security features such as SSL support, user authentication, and regular updates, safeguarding sensitive information from potential threats.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>8.</span>Easy Integration with Other Tools:
                        </h2>
                        <p>Many CMS platforms integrate easily with third-party tools such as CRM systems, email marketing platforms, and social media. This interoperability enhances functionality and helps create a more cohesive digital strategy.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>9.</span>Localization and Multilingual Support:
                        </h2>
                        <p>For businesses operating globally, CMSs often offer localization features, allowing users to create content in multiple languages. This support helps reach diverse audiences and enhances global engagement.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>10.</span>Future-Proofing Content Strategy:
                        </h2>
                        <p>By utilizing a CMS, organizations can adapt to changing digital trends and user preferences more quickly. The scalability and flexibility of CMS platforms ensure that businesses can evolve their content strategies as needed.</p>
                    </section>
                </section>
            </section>













            <!-- ######### Process ##########  -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">
                    Industries Benefiting from CMS</h1>

            </div>

            <div class="swiper mySwiper">



                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/healthcare-service.png" alt="">
                        </div>
                        <h2>Manufacturing</h2>
                        <!-- <p>Guiding providers to enhance efficiency with strategic IT solutions.</p> -->
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/healthcare-service.png" alt="">
                        </div>
                        <h2>Retail</h2>

                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/healthcare-service.png" alt="">
                        </div>
                        <h2>Healthcare</h2>

                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/healthcare-service.png" alt="">
                        </div>
                        <h2>Construction</h2>

                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/healthcare-service.png" alt="">
                        </div>
                        <h2>Finance</h2>

                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/healthcare-service.png" alt="">
                        </div>
                        <h2>Logistics</h2>

                    </div>
                </div>






                <div class="swiper-pagination"></div>
            </div>




            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Key CMS Modules and Their Functions</h1>
            </div>
            <div class="service_choose_us">
                <div class="services_container">
                    <!-- Service 1 - Content Creation -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Facilitates the creation and editing of digital content, providing the tools and resources needed to produce high-quality written, visual, and multimedia materials for various platforms.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Content Creation</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Content Management -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Organizes and stores digital assets such as images, videos, and documents, enabling easy retrieval, editing, and management to ensure streamlined workflows and content accessibility.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Content Management</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - User Management -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Handles user roles, permissions, and authentication, ensuring that only authorized individuals have access to specific content and functionalities while maintaining system security.</p>
                            <img src="images/star.png" alt="" />
                            <h1>User Management</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - SEO Tools -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Optimizes content for search engines by providing tools and strategies to improve website ranking, enhance visibility, and drive more organic traffic to your digital platforms.</p>
                            <img src="images/star.png" alt="" />
                            <h1>SEO Tools</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Analytics and Reporting -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Provides insights into content performance, tracking user engagement, and identifying trends to improve content strategy, optimize marketing efforts, and measure ROI effectively.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Analytics and Reporting</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>
                </div>
            </div>

            <!-- ##### blog ###  -->
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


            <!-- ##### faq #######  -->

            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>CMS Software Development FAQs</h1>
            </div>

            <section class="faq-wrapper">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What is a CMS and how does it work?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        A CMS (Content Management System) allows users to create, manage, and modify digital content on websites without needing specialized technical skills. It provides an intuitive interface for editing content, managing images, and updating website features.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can CMS handle e-commerce functionality?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, many modern CMS platforms offer built-in e-commerce functionality or integrations with e-commerce plugins. You can manage products, process orders, and handle payments through a CMS, making it ideal for businesses with online stores.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Is it easy to update and manage content?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Absolutely! CMS platforms are designed to be user-friendly, with WYSIWYG (What You See Is What You Get) editors that allow non-technical users to create and manage content with ease. You can update text, images, and videos without coding knowledge.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can a CMS be customized to suit my needs?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, CMS platforms are highly customizable. You can modify the design, functionality, and features of your website using themes, plugins, and custom code. This flexibility ensures that your CMS can grow with your business needs.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How secure is a CMS?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        CMS platforms offer a variety of security features, including user role management, SSL encryption, and regular software updates. With proper configuration and regular maintenance, a CMS can be a secure platform for managing your website’s content.
                    </p>
                </section>
            </section>






            <!-- ##### Book #######  -->

            <section class="section-book">
                <section class="book-image">
                    <img src="./images/booking-industry.jpg" alt="">
                </section>
                <section class="book-data">



                    <h1 data-aos="zoom-in" data-aos-duration="2500">Healthcare Software Development Services</h1>
                    <p data-aos="zoom-in" data-aos-duration="2500">Comprehensive Solutions Designed to Support Healthcare Professionals</p>
                    <a href="https://calendly.com/salesfocesclouds/30min" data-aos="zoom-in" data-aos-duration="2500">Connect With Us</a>
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

</body>

</html>