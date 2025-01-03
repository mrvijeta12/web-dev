<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'wordpress' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'wordpress' AND blog_status = 'published'");
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
    <link rel="stylesheet" href="assests/css/expertise.css">
    <link rel="stylesheet" href="assests/css/theme.css">
    <link rel="stylesheet" href="assests/css/navbar.css">
    <link rel="stylesheet" href="assests/css/footer.css">
    <!-- Swiper CSS CDN for carousel/slider functionality -->
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

            <!-- ######### HERO SECTION ##########  -->
            <div class="hero-section" data-aos="fade-up" data-aos-duration="1000">
                <div class="hero-content">
                    <h1 class="animated-heading">
                        Expert WordPress Development
                    </h1>
                    <p>
                        Building customizable, scalable, and secure WordPress websites.
                    </p>
                    <a href="#" class="reopenPopup">Consult Our Experts</a>
                </div>
            </div>

            <!-- Image Wrapper with Full Image Section Inside -->
            <div class="image-wrapper">
                <img src="images/wordpress-development-hero.jpg"></img>
            </div>




            <!-- ####### core area of expertise ######  -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Harnessing WordPress for Powerful Content Management</h1>
            </div>
            <section class="expertise" data-aos="fade-up" data-aos-duration="1000">
                <div class="expertise-child">
                    <h1>Custom Theme Development</h1>
                    <p>We excel in custom WordPress theme development, crafting unique and visually appealing designs that align with your brand identity. Our themes are responsive, ensuring a seamless experience across all devices while maintaining best practices in coding.</p>
                </div>
                <div class="expertise-child">
                    <h1>Plugin Integration and Development</h1>
                    <p>Our team is skilled in integrating and developing WordPress plugins that extend functionality and enhance user experience. Whether it’s custom solutions or popular plugins, we ensure compatibility and optimal performance within your site.</p>
                </div>
                <div class="expertise-child">
                    <h1>SEO Optimization Strategies</h1>
                    <p>We implement effective SEO optimization strategies tailored for WordPress, ensuring your site ranks well in search engines. Our practices include optimizing site speed, metadata, and content structure, helping you reach a broader audience.</p>
                </div>
                <div class="expertise-child">
                    <h1>Content Migration and Management</h1>
                    <p>Our team offers seamless content migration services, ensuring that your existing content transitions smoothly to WordPress. We manage the entire process, preserving SEO value and maintaining content integrity throughout.</p>
                </div>
                <div class="expertise-child">
                    <h1>Security Best Practices</h1>
                    <p>We prioritize the security of your WordPress site by implementing best practices such as regular updates, strong password policies, and security plugins. Our proactive approach minimizes vulnerabilities and keeps your site safe from threats.</p>
                </div>
                <div class="expertise-child">
                    <h1>Ongoing Support and Maintenance</h1>
                    <p>We provide ongoing support and maintenance services for WordPress sites, ensuring they remain updated, secure, and optimized. Our team is dedicated to resolving issues promptly and providing enhancements as your needs evolve.</p>
                </div>
            </section>




            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Transforming Industries with Advanced WordPress Solutions</h1>
            </div>


            <div class="service_choose_us">
                <div class="services_container">

                    <!-- Service 1 - Blogging -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Creating engaging and user-friendly blogs using WordPress, enabling writers to share their thoughts and connect with audiences seamlessly.
                            </p>
                            <img src="images/blog-wordpress.png" alt="" />
                            <h1>Blogging</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - E-commerce -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Developing robust online stores with WordPress and WooCommerce, offering secure transactions, inventory management, and customizable shopping experiences.
                            </p>
                            <img src="images/ecommerce-wordpress.png" alt="" />
                            <h1>E-commerce</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Portfolio -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Designing stunning portfolio websites for creatives to showcase their work, utilizing WordPress's flexibility and variety of themes.
                            </p>
                            <img src="images/portfolio-wordpress.png" alt="" />
                            <h1>Portfolio</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Education -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Creating comprehensive educational platforms using WordPress, featuring course management, quizzes, and student progress tracking.
                            </p>
                            <img src="images/education-wordpress.png" alt="" />
                            <h1>Education</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Real Estate -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Building interactive real estate websites with WordPress, allowing agents to display listings, manage inquiries, and connect with buyers.
                            </p>
                            <img src="images/real-estate-wordpress.png" alt="" />
                            <h1>Real Estate</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - Community -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Establishing community-focused websites on WordPress, facilitating discussions, events, and member interactions through forums and plugins.
                            </p>
                            <img src="images/community-wordpress.png" alt="" />
                            <h1>Community</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                </div>
            </div>




            <!-- ########## TECHNOLOGIES  #######  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1000">
                <h1>Why WordPress is the Go-To CMS</h1>
            </div>
            <section class="work-wrapper">
                <section class="work-wrapper-child" data-aos="fade-up" data-aos-duration="1000">
                    <section class="work-child">
                        <h2>User-Friendly Interface</h2>
                        <p>WordPress features an intuitive user interface that makes it easy for anyone to create and manage content, regardless of technical expertise.</p>
                    </section>
                    <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                        <h2>Flexible Themes and Plugins</h2>
                        <p>With thousands of themes and plugins available, WordPress allows users to customize their sites extensively, adding functionality and unique designs effortlessly.</p>
                    </section>
                    <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                        <h2>SEO-Friendly Features</h2>
                        <p>WordPress is built with SEO in mind, offering features like customizable permalinks, metadata management, and a variety of SEO plugins to enhance visibility.</p>
                    </section>
                    <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                        <h2>Strong Community Support</h2>
                        <p>The WordPress community is vast and active, providing extensive documentation, forums, and resources to help users troubleshoot and optimize their sites.</p>
                    </section>
                    <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                        <h2>Security and Updates</h2>
                        <p>WordPress regularly updates its software to address security vulnerabilities, ensuring that users can maintain a safe and secure online presence.</p>
                    </section>
                    <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                        <h2>Multilingual Capabilities</h2>
                        <p>With multilingual plugins available, WordPress makes it easy to create websites in multiple languages, reaching a wider audience and improving accessibility.</p>
                    </section>
                </section>
            </section>




            <!-- ######### Process ##########  -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">
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
                            <img src="images/project-launch-health.png" alt="">

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
                <h1 data-aos="zoom-in" data-aos-duration="1000"><span><i class="fa-regular fa-comments"></i></span> Hear From Our Valued Clients</h1>



                <div class="testimonial_slider">
                    <div class="testimonial_item" data-aos="fade-up" data-aos-duration="1000">

                        <img src="images/9.jpg" alt="">
                        <img src="images/double-main.png" alt="" class="double">
                        <p>TekAlgo’s Salesforce expertise boosted our sales efficiency and team productivity. Their tailored solutions made a significant difference. Highly recommended!</p>
                        <h5>John Doe</h5>
                        <p>CEO, Company</p>
                    </div>
                    <div class="testimonial_item" data-aos="fade-up" data-aos-duration="1000">
                        <img src="images/2.jpg" alt="">
                        <img src="images/double-main.png" alt="" class="double">
                        <p>TekAlgo transformed our CRM with seamless Salesforce integration. Exceptional service, knowledgeable team, and tangible results. We’re extremely satisfied! </p>
                        <h5>John Doe</h5>
                        <p>CEO, Company</p>
                    </div>
                    <div class="testimonial_item" data-aos="fade-up" data-aos-duration="1000">

                        <img src="images/4.jpg" alt="">
                        <img src="images/double-main.png" alt="" class="double">
                        <p>TekAlgo’s Salesforce solutions enhanced our customer management. The team is responsive, professional, and delivered beyond our expectations. Outstanding experience! </p>
                        <h5>John Doe</h5>
                        <p>CEO, Company</p>
                    </div>
                </div>
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


            <!-- #### faq ####  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1000">
                <h1>Professional WordPress Development: Frequently Asked Questions</h1>
            </div>

            <section class="faq-wrapper" data-aos="zoom-in" data-aos-duration="1000">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What types of websites can you build with WordPress?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        WordPress is versatile and can be used to create a wide range of websites, including blogs, e-commerce sites, business websites, membership sites, and more. Our team customizes WordPress to meet the specific needs of each client, whether it's a simple site or a complex, feature-rich platform.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Do you offer custom theme and plugin development for WordPress?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we specialize in creating custom themes and plugins to extend WordPress functionality according to your unique requirements. Our custom solutions ensure your website stands out with unique designs, and specific features tailored to your audience, which are also scalable as your business grows.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do you ensure WordPress websites are secure and optimized?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We follow industry best practices to secure WordPress sites, such as using strong authentication, secure hosting, regular updates, and security plugins. Additionally, we optimize site performance by minimizing code, compressing images, and implementing caching strategies to ensure fast loading times and a smooth user experience.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can you integrate third-party services and e-commerce with WordPress?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Absolutely. We frequently integrate third-party services such as CRM systems, payment gateways, and email marketing tools. For e-commerce, we use WooCommerce, the leading e-commerce solution for WordPress, to create fully-functional, secure online stores with all necessary features for sales, inventory, and customer management.
                    </p>
                </section>
            </section>





            <!-- ##### Book #######  -->

            <section class="book" data-aos="fade-up" data-aos-duration="1000">
                <h1>Let’s Begin Your Project Together!</h1>
                <a href="./contact.php">Contact us</a>
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