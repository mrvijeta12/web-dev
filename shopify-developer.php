<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'shopify-developer' AND blog_status = 'published' 
        ORDER BY id DESC 
        LIMIT $blogsPerPage OFFSET $offset";
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
    $contents[] = ["id" => 0, "slug" => "No content found.", "summary" => "", "social_sharing_image" => ""]; // Empty placeholder
}

// Count total blogs for pagination
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'shopify-developer' AND blog_status = 'published'");
$totalBlogs = $totalBlogsResult->fetch_assoc()['total'];
$totalPages = ceil($totalBlogs / $blogsPerPage); // Total number of pages

$conn->close();

// Check if it's an AJAX request to return only the blog wrapper and pagination
if (isset($_GET['ajax']) && $_GET['ajax'] === '1') {
    echo json_encode([
        'content' => renderBlogs($contents),
        'pagination' => renderPagination($currentPage, $totalPages)
    ]);
    exit();
}

// Helper function to render the blogs
function renderBlogs($blogs)
{
    $html = '';
    foreach ($blogs as $row) {
        $slug = htmlspecialchars($row['slug']);
        $summary = htmlspecialchars($row['summary']);
        $featureImage = !empty($row['social_sharing_image']) ? 'admin/' . htmlspecialchars($row['social_sharing_image']) : 'default-image.png';

        $html .= "<div class='content-container'>
                    <div class='image-container'>
                        <img src='{$featureImage}' alt='Feature Image'>
                    </div>
                    <div class='text-content'>
                        <h2>{$slug}</h2>
                        <a href='insights/{$slug}' class='read-more'>Read More <img src='images/right-arrow.svg' alt='' id='arrow'></a>
                    </div>
                </div>";
    }

    return $html;
}

// Helper function to render the pagination
function renderPagination($currentPage, $totalPages)
{
    $pagination = '';

    if ($currentPage > 1) {
        $pagination .= "<a href='#' class='prev' data-page='" . ($currentPage - 1) . "'>Previous</a>";
    }

    for ($i = 1; $i <= $totalPages; $i++) {
        $pagination .= "<a href='#' class='" . ($i === $currentPage ? 'active' : '') . "' data-page='{$i}'>{$i}</a>";
    }

    if ($currentPage < $totalPages) {
        $pagination .= "<a href='#' class='next' data-page='" . ($currentPage + 1) . "'>Next</a>";
    }

    return $pagination;
}

?>
<!DOCTYPE php>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="assests/css/offshore-experts.css">
    <link rel="stylesheet" href="assests/css/theme.css">
    <link rel="stylesheet" href="assests/css/navbar.css">
    <link rel="stylesheet" href="assests/css/footer.css">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <script src="https://kit.fontawesome.com/cdf9a174a4.js" crossorigin="anonymous"></script>



</head>

<body>
    <div>
        <?php
        include('navbar.php');
        ?>
        <div class="wrapper">

            <!-- ####### HERO SECTION ####### -->
            <div class="hero">
                <div class="child child1" data-aos="fade-right" data-aos-duration="1000">
                    <h1>Transform Your Ideas with Our Skilled Shopify Developers</h1>
                    <h2>Custom Shopify Solutions Tailored to Bring Your Vision to Life</h2>
                    <a href="#" class="reopenPopup">Consult Our Experts</a>
                </div>
                <div class="child child2" data-aos="fade-left" data-aos-duration="1000">
                    <img src="images/shopify-developer.jpg" alt="">
                </div>
            </div>




            <!-- ####### INTRO ######### -->

            <div class="intro-wrapper">

                <div class="intro-slide intro-1" data-aos="fade-left" data-aos-duration="1000">
                    <h2>Transform Your Online Store with Our Expert Shopify Developers, Delivering Custom Solutions for Maximum Impact.</h2>
                    <p>Our dedicated Shopify developers are passionate about building engaging and high-performing e-commerce websites tailored to your brand. By leveraging Shopify’s extensive features, we create user-friendly stores that enhance the shopping experience and boost customer retention.</p>
                    <p>With a strong focus on responsive design and performance optimization, we ensure your Shopify site not only looks great but also operates seamlessly across all devices. Collaborate with us to elevate your online presence and achieve your business goals effectively.</p>
                </div>




                <div class="intro-slide intro-2">
                    <img src="images/developer-primary.jpg" alt="" data-aos="fade-right" data-aos-duration="1500">
                </div>





            </div>



            <!-- ######### Team ######  -->

            <div class="swiper mySwiper">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Engage Performance-Oriented Shopify Professionals for Maximum ROI</h1>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/we-1.jpg" alt="">

                        </div>
                        <div class="swiper-slide-data">
                            <h2>Adrian</h2>
                            <p>Shopify Developer</p>
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
                            <p>Shopify Developer</p>
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
                            <p>Shopify Developer</p>
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
                            <p>Shopify Developer</p>
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
                            <p>Shopify Developer</p>
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
                            <p>Shopify Developer</p>
                            <strong>Experience <i class="fa-solid fa-angles-right"></i> 5+ Years</strong>
                            <p>Avability <i class="fa-solid fa-angles-right"></i> Full-Time</p>
                            <a href="#" class="reopenPopup">Hire Now </a>


                        </div>
                    </div>

                </div>
                <div class="swiper-pagination"></div>
            </div>



            <!-- ####### WORKING WITH US ######  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1000">
                <h1>Explore the Range of Services Provided by Shopify Developers</h1>

            </div>
            <section class="work-wrapper">

                <section class="work-wrapper-child">
                    <section class="work-child" data-aos="fade-right" data-aos-duration="1000">
                        <h2>Custom Shopify Development</h2>
                        <p>Shopify developers create tailored eCommerce solutions to meet specific business needs. They utilize
                            Shopify’s powerful features to design and implement unique functionalities, ensuring an intuitive
                            shopping experience that aligns with the brand's identity.</p>
                    </section>
                    <section class="work-child" data-aos="fade-left" data-aos-duration="1000">
                        <h2>Shopify Theme Design</h2>
                        <p>Professional theme design is essential for a compelling online store. Shopify developers craft custom,
                            responsive themes that reflect the brand’s aesthetics, ensuring optimal performance across devices
                            while enhancing user engagement and retention.</p>
                    </section>
                    <section class="work-child" data-aos="fade-right" data-aos-duration="1000">
                        <h2>Shopify App Development</h2>
                        <p>Shopify developers build custom apps to extend store functionality. These apps can add unique
                            features, integrations, or improvements, enabling businesses to enhance their online presence
                            and provide a better shopping experience.</p>
                    </section>
                    <section class="work-child" data-aos="fade-left" data-aos-duration="1000">
                        <h2>Seamless Store Migration</h2>
                        <p>Migrating to Shopify requires expertise for a smooth transition. Developers manage data transfer,
                            configuration, and testing to ensure that the store remains functional and optimized, minimizing
                            downtime during the migration process.</p>
                    </section>
                    <section class="work-child" data-aos="fade-right" data-aos-duration="1000">
                        <h2>Ongoing Maintenance and Support</h2>
                        <p>Regular maintenance is crucial for Shopify sites. Developers provide updates, security enhancements,
                            and troubleshooting services, ensuring optimal performance while helping businesses stay current with
                            the latest Shopify features and best practices.</p>
                    </section>
                    <section class="work-child" data-aos="fade-left" data-aos-duration="1000">
                        <h2>SEO and Performance Optimization</h2>
                        <p>To improve search visibility, Shopify developers implement effective SEO strategies tailored for
                            eCommerce. They optimize site structure, content, and loading speeds, ensuring that the store not
                            only ranks well but also delivers an exceptional user experience.</p>
                    </section>

                </section>

            </section>



            <!-- ####### why choose us ########  -->
            <div class="about_container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Why Hire Shopify Developers From TekAlgo?</h1>

            </div>

            <div class="service_choose_us">

                <div class="services_container">

                    <!-- Service 1 - Skilled Team -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>Our team of Shopify experts specializes in creating high-performance, customizable online stores, ensuring that every solution is designed to meet your specific business goals and objectives.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Skilled Team</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Tailored Services -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>We provide Shopify solutions tailored to your brand, ensuring that each eCommerce store is uniquely designed to reflect your identity and meet your business objectives seamlessly.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Tailored Services</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - On-Time Delivery -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>Our team is dedicated to delivering Shopify stores on time, ensuring that all key milestones are met while maintaining the highest quality standards, focusing on your business success.</p>
                            <img src="images/star.png" alt="" />
                            <h1>On-Time Delivery</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Continuous Support -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>We offer continuous support for your Shopify store, ensuring that you have the assistance needed to maintain optimal performance, adapt to changes, and drive business growth.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Continuous Support</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Affordable Solutions -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>We offer competitive pricing for our Shopify development services, ensuring that you get high-quality, cost-effective solutions that drive your eCommerce business forward without breaking your budget.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Affordable Solutions</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - Trusted Partners -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>We have established ourselves as trusted Shopify partners, delivering innovative and high-quality solutions that help businesses grow and achieve success in the competitive eCommerce market.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Trusted Partners</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                </div>

            </div>




            <!-- ##### why hire from us #####  -->
            <div class="about_container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">
                    Experience Numerous Advantages When You Hire Our Shopify Experts</h1>

            </div>

            <div class="avail-section-wrapper">
                <div class="avail-section" id="scrollable-section">
                    <div class="avail-image-container" id="image-scroll">
                        <img src="images/web-developer-experts-benefits.jpg" alt="Image on Left" data-aos="fade-right" data-aos-duration="1000">
                    </div>

                    <div class="avail-content-container" id="scrollable-content" data-aos="fade-left" data-aos-duration="1000">
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Custom Store Design</h2>
                            </div>
                            <p>Our Shopify developers create custom store designs that reflect your brand’s identity. We focus on visually appealing layouts and user-friendly navigation to enhance the shopping experience.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>App Integration</h2>
                            </div>
                            <p>We specialize in integrating various Shopify apps to extend your store's functionality. Whether you need marketing tools, inventory management, or customer support, we seamlessly incorporate solutions tailored to your business.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Mobile-First Approach</h2>
                            </div>
                            <p>Our Shopify stores are built with a mobile-first approach, ensuring optimal performance on all devices. This responsiveness improves user experience and helps capture the growing number of mobile shoppers.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Payment Gateway Setup</h2>
                            </div>
                            <p>We offer expert assistance in setting up multiple payment gateways, ensuring secure and smooth transactions for your customers. Our integration process enhances the checkout experience and boosts conversion rates.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>SEO Best Practices</h2>
                            </div>
                            <p>We implement SEO best practices in your Shopify store to improve visibility on search engines. Our strategies focus on optimizing product descriptions, images, and site structure to drive organic traffic.</p>
                        </div>
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Ongoing Support and Training</h2>
                            </div>
                            <p>After launch, we provide ongoing support and training for your Shopify store. Our dedicated team is available to assist with any issues and offer guidance to help you manage and grow your online business effectively.</p>
                        </div>
                    </div>

                </div>
            </div>









            <!-- ######## collaboration #####  -->
            <section class="collaboration-wrapper">
                <section class="collaboration-header" data-aos="zoom-in" data-aos-duration="1000">
                    <h1>Simple Steps to Begin Your Journey with Our Shopify Team</h1>
                </section>
                <section class="collaboration-child-wrapper" data-aos="fade-up" data-aos-duration="1000">
                    <section class="collaboration-child" id="collaboration-child-1">
                        <section class="collaboration-child-image">
                            <img src="images/requirement.png" alt="">
                        </section>
                        <section class="collaboration-child-data">
                            <h2>Provide Your Requirements <span><i class="fa-solid fa-right-long"></i></span> </h2>
                            <p>Clearly outline your project specifications and expectations. This allows us to understand your needs better and ensures we find the right candidates who align with your objectives.</p>

                        </section>

                    </section>
                    <section class="collaboration-child" id="collaboration-child-2">
                        <section class="collaboration-child-image">
                            <img src="images/project-evaluation.png" alt="">
                        </section>
                        <section class="collaboration-child-data">
                            <h2>Select Candidates for Review <span><i class="fa-solid fa-right-long"></i></span></h2>
                            <p>After gathering requirements, we will curate a list of qualified candidates for your review. You can assess their skills, experience, and fit for your project’s unique demands.</p>

                        </section>
                    </section>
                    <section class="collaboration-child" id="collaboration-child-3">
                        <section class="collaboration-child-image">
                            <img src="images/nda.png" alt="">
                        </section>
                        <section class="collaboration-child-data">
                            <h2>Identify the Ideal Candidate<span><i class="fa-solid fa-right-long"></i></span></h2>
                            <p>Evaluate the shortlisted candidates based on their qualifications and your criteria. Conduct interviews to gain insights into their expertise, ensuring you select the best match for your needs.</p>

                        </section>
                    </section>
                    <section class="collaboration-child" id="collaboration-child-4">
                        <section class="collaboration-child-image">
                            <img src="images/interview.png" alt="">
                        </section>
                        <section class="collaboration-child-data">
                            <h2> Begin the Onboarding Process <span><i class="fa-solid fa-right-long"></i></span></h2>
                            <p>Once you’ve chosen the right candidate, we’ll initiate the onboarding process. This includes introducing them to your team, sharing project details, and ensuring they have all necessary resources.</p>

                        </section>
                    </section>
                </section>
            </section>

            <!-- ####### blog #####  -->

            <div class="container" data-aos="zoom-in" data-aos-duration="1000">
                <h1>Exploring Industry Trends, Ideas, and Real-World Solutions</h1>

            </div>

            <div class="blog-wrapper" id="blog-wrapper" data-aos="fade-up" data-aos-duration="1000">
                <!-- Blog content will be injected dynamically -->
                <?php echo renderBlogs($contents); ?>
            </div>

            <!-- Pagination Links -->
            <div class="pagination" id="pagination">
                <?php echo renderPagination($currentPage, $totalPages); ?>
            </div>

            <!-- ############### faq ############  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1000">
                <h1>Shopify Development Services FAQs</h1>
            </div>

            <section class="faq-wrapper" data-aos="zoom-in" data-aos-duration="1000">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What types of e-commerce websites can Shopify developers create?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Shopify developers can create a variety of e-commerce websites, including small business stores, large online retailers, subscription services, and niche market platforms. They specialize in building user-friendly and visually appealing online stores that cater to diverse business models.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do Shopify developers ensure website security?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Shopify developers prioritize security by utilizing Shopify’s built-in security features, such as SSL certificates, secure payment gateways, and compliance with PCI DSS. They also ensure regular updates and implement security best practices to protect customer data and transactions.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can Shopify developers customize themes and apps?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, Shopify developers can customize existing themes and create custom apps to enhance the functionality of the online store. They use Liquid, HTML, CSS, and JavaScript to tailor the design and features, ensuring the site aligns with branding and user experience needs.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do Shopify developers handle SEO optimization?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Shopify developers implement SEO best practices by optimizing product pages, meta tags, URLs, and image alt attributes. They also leverage Shopify apps and tools to enhance on-page SEO, improve site speed, and boost visibility in search engine results.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What are some best practices for Shopify development?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Best practices for Shopify development include using responsive design principles, optimizing site speed, keeping apps and themes updated, and conducting regular backups. Developers should also ensure compliance with Shopify guidelines to maintain a smooth and efficient store operation.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do Shopify developers ensure website performance?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Shopify developers enhance website performance by optimizing images, minimizing app usage, and utilizing Shopify’s built-in performance tools. They regularly monitor site speed and make adjustments to ensure a fast and seamless shopping experience for customers.
                    </p>
                </section>
            </section>














        </div>
        <?php include('footer.php'); ?>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init({
                once: true,
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <script src="./swiper.js"></script>
        <script src="./blog.js"></script>
        <?php include('pop.php'); ?>

    </div>



</body>

</html>