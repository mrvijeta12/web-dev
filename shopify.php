<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'shopify' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'shopify' AND blog_status = 'published'");
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
            <div class="hero-section">
                <div class="hero-content" data-aos="fade-down" data-aos-duration="1000">
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
                <img src="images/shopify-development-hero.jpg"></img>
            </div>


            <!-- ####### core area of expertise ######  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Unlocking E-Commerce Potential with Shopify</h1>
            </div>
            <section class="expertise" data-aos="fade-up" data-aos-duration="1000">
                <div class="expertise-child">
                    <h1>Personalized E-Commerce Experiences</h1>
                    <p>We design personalized e-commerce experiences that cater to your customers' preferences, enhancing engagement and driving sales through tailored recommendations.</p>
                </div>
                <div class="expertise-child">
                    <h1>Streamlined Product Management</h1>
                    <p>Our team optimizes product management on Shopify, making it easy to add, update, and categorize products, ensuring your store is always organized and up to date.</p>
                </div>
                <div class="expertise-child">
                    <h1>Integrated Marketing Tools</h1>
                    <p>We implement integrated marketing tools within your Shopify store, enabling effective email campaigns, social media integration, and targeted promotions to boost visibility.</p>
                </div>
                <div class="expertise-child">
                    <h1>Advanced Analytics and Reporting</h1>
                    <p>Our solutions include advanced analytics and reporting features that provide insights into customer behavior, sales trends, and inventory management, helping you make data-driven decisions.</p>
                </div>
                <div class="expertise-child">
                    <h1>Robust Security Features</h1>
                    <p>We prioritize your store’s security by implementing robust measures, including SSL certificates and secure payment gateways, to protect customer data and transactions.</p>
                </div>
                <div class="expertise-child">
                    <h1>Expert Training and Resources</h1>
                    <p>We offer expert training and resources for your team, ensuring they are well-equipped to manage and optimize your Shopify store for ongoing success.</p>
                </div>
            </section>






            <!-- ####### why choose us ########  -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Transforming Industries with Advanced Shopify Solutions</h1>
            </div>

            <div class="service_choose_us">
                <div class="services_container">

                    <!-- Service 1 - E-commerce -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Building robust online stores with Shopify that deliver seamless shopping experiences, efficient inventory management, and secure transactions.
                            </p>
                            <img src="images/ecommerce-shopify.png" alt="" />
                            <h1>E-commerce</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Fashion & Apparel -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Creating stylish and responsive fashion websites on Shopify that showcase products beautifully and enhance customer engagement.
                            </p>
                            <img src="images/fashion-shopify.png" alt="" />
                            <h1>Fashion & Apparel</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Food & Beverage -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Developing Shopify stores for food and beverage brands that streamline online ordering and provide engaging user experiences.
                            </p>
                            <img src="images/food-beverage-shopify.png" alt="" />
                            <h1>Food & Beverage</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Home & Garden -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Designing Shopify solutions for home and garden retailers, offering a user-friendly interface for customers to explore products effortlessly.
                            </p>
                            <img src="images/home-garden-shopify.png" alt="" />
                            <h1>Home & Garden</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Health & Beauty -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Creating captivating Shopify stores for health and beauty products, ensuring smooth navigation and secure transactions for customers.
                            </p>
                            <img src="images/health-beauty-shopify.png" alt="" />
                            <h1>Health & Beauty</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - Sports & Fitness -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <div class="content-wrapper">
                            <p>
                                Building engaging Shopify sites for sports and fitness brands that promote products effectively and foster a loyal customer base.
                            </p>
                            <img src="images/sports-shopify.png" alt="" />
                            <h1>Sports & Fitness</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                </div>
            </div>





            <!-- ########## TECHNOLOGIES  #######  -->

            <div class="container" data-aos="zoom-in" data-aos-duration="1000">
                <h1>The Benefits of Choosing Shopify for Your Online Store</h1>
            </div>
            <section class="work-wrapper">
                <section class="work-wrapper-child">
                    <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                        <h2>User-Friendly Interface</h2>
                        <p>Shopify offers an intuitive and user-friendly interface, making it easy for anyone, regardless of technical skill, to set up and manage an online store.</p>
                    </section>
                    <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                        <h2>Comprehensive E-Commerce Features</h2>
                        <p>The platform provides a wide range of built-in e-commerce features, including payment processing, inventory management, and marketing tools to help businesses succeed.</p>
                    </section>
                    <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                        <h2>Mobile Responsiveness</h2>
                        <p>Shopify themes are fully responsive, ensuring that your online store looks great and functions smoothly on any device, which is vital for capturing mobile traffic.</p>
                    </section>
                    <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                        <h2>Secure and Reliable Hosting</h2>
                        <p>Shopify offers secure, PCI-compliant hosting with 99.9% uptime, ensuring that your online store is always accessible and safe for customers.</p>
                    </section>
                    <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                        <h2>Extensive App Ecosystem</h2>
                        <p>With access to a vast app marketplace, Shopify allows you to easily extend the functionality of your store with integrations for shipping, marketing, and more.</p>
                    </section>
                    <section class="work-child" data-aos="fade-up" data-aos-duration="1000">
                        <h2>24/7 Customer Support</h2>
                        <p>Shopify provides round-the-clock customer support through various channels, ensuring that help is always available when you need it.</p>
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


            <!-- ###### faq ######  -->

            <div class="container" data-aos="zoom-in" data-aos-duration="1000">
                <h1>Shopify Development: Frequently Asked Questions</h1>
            </div>

            <section class="faq-wrapper" data-aos="zoom-in" data-aos-duration="1000">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What is Shopify and what are its main features?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Shopify is a leading e-commerce platform that allows businesses to create and manage their online stores easily. Key features include a user-friendly interface, customizable themes, a variety of payment gateways, built-in SEO tools, and powerful inventory management capabilities. Shopify also offers a range of apps to extend functionality, making it ideal for businesses of all sizes.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How can you help with customizing Shopify stores?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We specialize in customizing Shopify stores to meet the unique needs of your business. This includes designing bespoke themes, developing custom features, and integrating third-party applications. Our goal is to enhance the user experience and functionality of your online store while aligning it with your brand identity.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What strategies do you use for Shopify SEO optimization?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We implement comprehensive SEO strategies for Shopify stores, including optimizing page titles and meta descriptions, creating SEO-friendly URLs, and ensuring fast loading times. We also focus on content marketing, keyword optimization, and building backlinks to improve your store's visibility in search engine results, driving organic traffic to your website.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can you assist with migrating to Shopify from another platform?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we provide comprehensive migration services to help you transition smoothly to Shopify from other e-commerce platforms. Our team ensures that all your data, including products, customer information, and order history, is transferred securely and accurately. We also optimize your new Shopify store for better performance and usability during the migration process.
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