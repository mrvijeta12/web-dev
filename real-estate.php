<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'real-estate' AND blog_status = 'published' 
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
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'real-estate' AND blog_status = 'published'");
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
    <link rel="stylesheet" href="assests/css/industry.css">
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
        <div class="wrapper" data-aos="fade-right" data-aos-duration="1000">

            <!-- ################################# HERO SECTION ##################################  -->
            <div class="hero">
                <div class="child child1">
                    <h1 class="animated-heading">
                        <span>R</span><span>e</span><span>a</span><span>l</span>
                        <span>E</span><span>s</span><span>t</span><span>a</span><span>t</span><span>e</span>

                        <span>S</span><span>o</span><span>f</span><span>t</span><span>w</span><span>a</span><span>r</span><span>e</span> <span>D</span><span>e</span><span>v</span><span>e</span><span>l</span><span>o</span><span>p</span><span>m</span><span>e</span><span>n</span><span>t</span> <span>S</span><span>e</span><span>r</span><span>v</span><span>i</span><span>c</span><span>e</span><span>s</span>
                    </h1>
                    <h3>Enhancing Property Management Through Smart Software Development</h3>
                    <a href="#" class="reopenPopup">Get Free Quote</a>

                </div>
                <div class="child child2">
                    <img src="images/real-estate-hero.png" alt="" data-aos="fade-left" data-aos-duration="1000" />
                </div>
            </div>

            <!-- ####### INTRODUCTION  ####### -->

            <section class="intro">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Empowering Real Estate Solutions with Our Comprehensive Software Development Services</h1>
                <p data-aos="fade-up" data-aos-duration="1000">Our software development services for the real estate industry are designed to optimize workflows, enhance market analysis, and improve user experience. By harnessing cutting-edge technology, data visualization, and intuitive design, we empower real estate agents and developers to make informed decisions, manage properties efficiently, and deliver exceptional value to clients in an ever-changing market.</p>
            </section>


            <!-- ####### details ####### -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">
                    Process We Follow To Develop Real Estate Software</h1>

            </div>

            <section class="detail" data-aos="fade-up" data-aos-duration="1000">
                <section class="detail-title detail-child">
                    <p class="tab active-tab" onclick="toggleContent(1)">
                        <strong>01.</strong> Real Estate Software Consulting

                    </p>
                    <p class="tab" onclick="toggleContent(2)">
                        <strong>02.</strong> Custom Real Estate Software Development

                    </p>
                    <p class="tab" onclick="toggleContent(3)">
                        <strong>03.</strong> Real Estate Software Product Development

                    </p>
                    <p class="tab" onclick="toggleContent(4)">
                        <strong>04.</strong> Real Estate Software Integration

                    </p>
                    <p class="tab" onclick="toggleContent(5)">
                        <strong>05.</strong> Real Estate Software Testing and Quality Assurance

                    </p>
                    <p class="tab" onclick="toggleContent(6)">
                        <strong>06.</strong> Real Estate Software Modernization

                    </p>
                    <p class="tab" onclick="toggleContent(7)">
                        <strong>07.</strong> Real Estate Software Maintenance and Support

                    </p>
                </section>
                <section class="detail-description detail-child">
                    <section id="content1" class="content">
                        <div class="content-header">
                            <img src="images/consultation.png" alt="">
                            <h3>Real Estate Software Consulting</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We assess your real estate operations and technological requirements, providing strategic guidance for developing customized software solutions. Our consulting services help identify opportunities for growth, enhance customer engagement, and optimize property management.</p>
                    </section>
                    <section id="content2" class="content">
                        <div class="content-header">
                            <img src="images/software-development-process.png" alt="">
                            <h3>Custom Real Estate Software Development</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We specialize in developing tailored real estate software solutions that meet your specific needs. From initial coding to deploying unique features, our development process ensures your software enhances listings, client interactions, and transaction management.</p>
                    </section>
                    <section id="content3" class="content">
                        <div class="content-header">
                            <img src="images/development.png" alt="">
                            <h3>Real Estate Software Product Development</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We focus on creating scalable, market-ready real estate software products that cater to both agents and clients. Our product development services deliver solutions that streamline operations, improve user experience, and drive business growth.</p>
                    </section>
                    <section id="content4" class="content">
                        <div class="content-header">
                            <img src="images/deployment.png" alt="">
                            <h3>Real Estate Software Integration</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>Our integration services ensure seamless connectivity between your real estate software and existing systems. We facilitate interoperability among platforms to enhance operational efficiency, reduce manual processes, and improve service delivery.</p>
                    </section>
                    <section id="content5" class="content">
                        <div class="content-header">
                            <img src="images/project-analysis-health.png" alt="">
                            <h3>Real Estate Software Testing and Quality Assurance</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We conduct thorough testing of your real estate software to identify bugs and vulnerabilities, ensuring it meets the highest standards of performance, security, and user satisfaction. Our quality assurance practices guarantee a reliable experience for your clients.</p>
                    </section>
                    <section id="content6" class="content">
                        <div class="content-header">
                            <img src="images/moderization-process.png" alt="">
                            <h3>Real Estate Software Modernization</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We upgrade legacy real estate software to meet contemporary technological standards, enhancing functionality and security. Our modernization services help your business remain competitive by integrating advanced features that support evolving market demands.</p>
                    </section>
                    <section id="content7" class="content">
                        <div class="content-header">
                            <img src="images/support-process.png" alt="">
                            <h3>Real Estate Software Maintenance and Support</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>Our maintenance and support services provide ongoing software updates, troubleshooting, and enhancements to ensure optimal performance. We focus on resolving issues, improving functionality, and adapting software to the changing landscape of the real estate industry.</p>
                    </section>
                </section>
            </section>




            <!-- ######### Benefits ##########  -->
            <section class="benefits-wrapper">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Sectors that can benefits from our real estate software development services</h1>


                <div class="benefits-sectors">
                    <ul data-aos="fade-right" data-aos-duration="1000">
                        <li>Residential Real Estate</li>
                        <li>Commercial Real Estate</li>
                        <li>Real Estate Investment Trusts (REITs)</li>
                        <li>Property Management Companies</li>
                        <li>Real Estate Development Firms</li>
                        <li>Real Estate Brokerage Firms</li>
                    </ul>
                    <ul data-aos="fade-left" data-aos-duration="1000">
                        <li>Luxury Real Estate Agencies</li>
                        <li>Vacation Rental Services</li>
                        <li>Land Development Companies</li>
                        <li>Real Estate Consulting Firms</li>
                        <li>Title and Escrow Services</li>
                        <li>Home Inspection Services</li>
                    </ul>
                </div>
            </section>



            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">Why Choose TekAlgo As Your Real Estate Software Development</h1>

            </div>


            <div class="service_choose_us">

                <div class="services_container">
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <img src="images/star.png" alt="">
                        <h1>Real Estate Technology Expertise</h1>
                        <p>Providing cutting-edge technology solutions that transform real estate operations, improve client interactions, and enhance property management efficiency.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <img src="images/star.png" alt="">
                        <h1>Custom Real Estate Web Development</h1>
                        <p>Designing bespoke websites with user-friendly interfaces that showcase properties and streamline the buying or renting process for potential clients.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <img src="images/star.png" alt="">
                        <h1>Data Analytics and Market Insights</h1>
                        <p>Utilizing advanced data analytics to provide actionable insights, helping real estate professionals make informed decisions based on market trends.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <img src="images/star.png" alt="">
                        <h1>Mobile App Development for Real Estate</h1>
                        <p>Creating innovative mobile applications that enable clients to search for properties, schedule viewings, and communicate with agents on the go.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <img src="images/star.png" alt="">
                        <h1>Seamless CRM and Software Integration</h1>
                        <p>Integrating Customer Relationship Management (CRM) systems with real estate platforms for enhanced client management and streamlined communication.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1000">
                        <img src="images/star.png" alt="">
                        <h1>24/7 Support and Maintenance</h1>
                        <p>Offering continuous support and maintenance to ensure your real estate technology operates smoothly, providing a reliable service for your clients.</p>
                    </div>
                </div>

            </div>

            <!-- ######### who can avail ###### -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">
                    Who Can Avail Our Real Estate Software Services</h1>

            </div>

            <div class="avail-section-wrapper">
                <div class="avail-section" id="scrollable-section">
                    <div class="avail-image-container" id="image-scroll">
                        <img src="images/real-estate-primary.jpg" alt="Image on Left" data-aos="fade-right" data-aos-duration="1000">
                    </div>


                    <div class="avail-content-container" id="scrollable-content" data-aos="fade-left" data-aos-duration="1000">
                        <!-- Real Estate Content -->
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Property Listings</h2>
                            </div>
                            <p>Real estate agencies can utilize social networking platforms to showcase property listings through engaging
                                visuals and detailed descriptions. This enhances visibility, attracts potential buyers, and allows for direct
                                engagement with interested clients.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Virtual Tours</h2>
                            </div>
                            <p>Social networks can facilitate the sharing of virtual property tours, providing prospective buyers with an
                                immersive experience. By showcasing properties online, agents can reach a wider audience and generate more
                                interest without the need for physical viewings.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Market Insights</h2>
                            </div>
                            <p>Real estate professionals can leverage social media to share market trends, neighborhood statistics, and
                                investment insights. By educating potential buyers and investors, they establish authority and build trust
                                within the community.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Client Testimonials</h2>
                            </div>
                            <p>Real estate agents can encourage satisfied clients to share their experiences on social platforms.
                                Highlighting testimonials and success stories builds credibility and encourages referrals, making it easier to
                                attract new clients.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Community Engagement</h2>
                            </div>
                            <p>Real estate firms can foster community engagement by promoting local events, charities, and initiatives.
                                By being active participants in their communities, agents can enhance their brand image and strengthen client
                                relationships.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="images/progress.png" alt="Image on Left">
                                <h2>Educational Content</h2>
                            </div>
                            <p>Social networking platforms are effective for sharing educational content related to buying, selling,
                                and investing in real estate. By providing valuable tips and resources, agents can empower clients and
                                position themselves as knowledgeable industry experts.</p>
                        </div>
                    </div>

                </div>
            </div>



            <!-- ######### Process ##########  -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1000">
                    Process We Follow To Develop Heathcare Software</h1>

            </div>

            <div class="swiper mySwiper">

                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/real-estate-management-software.png" alt="">
                        </div>
                        <h2>Real Estate Software</h2>
                        <p>Comprehensive solutions for property and tenant management.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/property-listing-platforms.png" alt="">
                        </div>
                        <h2>Listing Platforms</h2>
                        <p>User-friendly platforms for listing and browsing properties.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/virtual-tour-technology.png" alt="">
                        </div>
                        <h2>Virtual Tours</h2>
                        <p>Immersive VR solutions for enhanced property tours.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/real-estate-analytics.png" alt="">
                        </div>
                        <h2>Analytics Tools</h2>
                        <p>Assessing market trends and investment opportunities.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/tenant-management-systems.png" alt="">
                        </div>
                        <h2>Tenant Management</h2>
                        <p>Streamlined systems for applications and maintenance requests.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/real-estate-marketing-solutions.png" alt="">
                        </div>
                        <h2>Marketing Solutions</h2>
                        <p>Targeted strategies to promote properties effectively.</p>
                    </div>
                </div>


                <div class="swiper-pagination"></div>
            </div>

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
                <h1>Real Estate Website Development FAQs</h1>
            </div>

            <section class="faq-wrapper" data-aos="zoom-in" data-aos-duration="1000">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What types of websites do you build for the real estate industry?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We create various types of real estate websites, including property listing sites, real estate agency platforms, and IDX/MLS integrated websites. Our designs focus on showcasing properties effectively while providing essential tools for buyers and sellers.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can you integrate property search and filtering features?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we can integrate advanced property search features with filtering options based on location, price range, property type, and more. This functionality helps users quickly find properties that match their criteria.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do you ensure the website is optimized for mobile users?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We use responsive design techniques to ensure that your real estate website provides an optimal viewing experience on all devices, including smartphones and tablets. This includes easy navigation and quick access to property listings from mobile devices.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Do you provide lead generation and CRM integration for real estate websites?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we integrate lead generation forms and CRM systems to help you capture and manage potential leads efficiently. This allows you to follow up with interested clients and streamline your sales process.
                    </p>
                </section>
            </section>




            <!-- ##### Book #######  -->

            <section class="section-book">
                <section class="book-image">
                    <img src="images/booking-industry.jpg" alt="">
                </section>
                <section class="book-data">



                    <h1 data-aos="fade-down" data-aos-duration="1000">Real Estate Software Development Services</h1>
                    <p data-aos="fade-down" data-aos-duration="1000">Comprehensive Solutions Designed to Support Real Estate Professionals</p>
                    <a href="#" class="reopenPopup" data-aos="fade-down" data-aos-duration="1000">Connect With Us</a>
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