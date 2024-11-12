<?php

include_once 'db.php';


// Fetch all blog posts with slug, summary, and feature image
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs WHERE page_type = 'news' ORDER BY id DESC";
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
    <link rel="stylesheet" href="assests/css/industry.css">
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
                <div class="child child1">
                    <h1 class="animated-heading">
                        <span>N</span><span>e</span><span>w</span><span>s</span>
                        <span>S</span><span>o</span><span>f</span><span>t</span><span>w</span><span>a</span><span>r</span><span>e</span> <span>D</span><span>e</span><span>v</span><span>e</span><span>l</span><span>o</span><span>p</span><span>m</span><span>e</span><span>n</span><span>t</span> <span>S</span><span>e</span><span>r</span><span>v</span><span>i</span><span>c</span><span>e</span><span>s</span>
                    </h1>
                    <h3 data-aos="fade-up" data-aos-duration="1500">Transforming News Reporting Through Tailored Software Solutions</h3>
                    <a href="" data-aos="fade-up" data-aos-duration="1500">Get Free Quote</a>

                </div>
                <div class="child child2">
                    <img src="./images/news-hero.png" alt="" data-aos="fade-left" data-aos-duration="2500" />
                </div>
            </div>

            <!-- ####### INTRODUCTION  ####### -->

            <section class="intro">
                <h1>Empowering Journalism with Our Advanced Software Development Solutions</h1>
                <p>Our software development services for the news industry are crafted to enhance reporting efficiency, improve content accessibility, and foster audience interaction. By utilizing innovative technology, data analytics, and user-centric platforms, we enable news organizations to create compelling stories, optimize workflows, and engage readers across multiple channels in an ever-evolving digital landscape.</p>
            </section>


            <!-- ####### details ####### -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">
                    Process We Follow To Develop News Software</h1>

            </div>

            <section class="detail">
                <section class="detail-title detail-child">
                    <p class="tab active-tab" onclick="toggleContent(1)">
                        <strong>01.</strong> News Software Consulting

                    </p>
                    <p class="tab" onclick="toggleContent(2)">
                        <strong>02.</strong> Custom News Software Development

                    </p>
                    <p class="tab" onclick="toggleContent(3)">
                        <strong>03.</strong> News Software Product Development

                    </p>
                    <p class="tab" onclick="toggleContent(4)">
                        <strong>04.</strong> News Software Integration

                    </p>
                    <p class="tab" onclick="toggleContent(5)">
                        <strong>05.</strong> News Software Testing and Quality Assurance

                    </p>
                    <p class="tab" onclick="toggleContent(6)">
                        <strong>06.</strong> News Software Modernization

                    </p>
                    <p class="tab" onclick="toggleContent(7)">
                        <strong>07.</strong> News Software Maintenance and Support

                    </p>
                </section>
                <section class="detail-description detail-child">
                    <section id="content1" class="content">
                        <div class="content-header">
                            <img src="./images/consultation.png" alt="">
                            <h3>News Software Consulting</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We evaluate your news organization’s operations and technological needs, providing strategic guidance for developing customized software solutions. Our consulting services help identify opportunities for enhancing content delivery, improving audience engagement, and optimizing workflows.</p>
                    </section>
                    <section id="content2" class="content">
                        <div class="content-header">
                            <img src="./images/software-development-process.png" alt="">
                            <h3>Custom News Software Development</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We specialize in developing tailored news software solutions that meet your specific requirements. From initial coding to deploying unique features, our development process ensures your software enhances content management and supports real-time news delivery.</p>
                    </section>
                    <section id="content3" class="content">
                        <div class="content-header">
                            <img src="./images/development.png" alt="">
                            <h3>News Software Product Development</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We focus on creating scalable, market-ready news software products that cater to both publishers and consumers. Our product development services deliver solutions that streamline editorial processes, enhance user experiences, and drive audience growth.</p>
                    </section>
                    <section id="content4" class="content">
                        <div class="content-header">
                            <img src="./images/deployment.png" alt="">
                            <h3>News Software Integration</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>Our integration services ensure seamless connectivity between your news software and existing systems. We facilitate interoperability among platforms to enhance operational efficiency, reduce manual processes, and improve content distribution.</p>
                    </section>
                    <section id="content5" class="content">
                        <div class="content-header">
                            <img src="./images/project-analysis-health.png" alt="">
                            <h3>News Software Testing and Quality Assurance</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We conduct thorough testing of your news software to identify bugs and vulnerabilities, ensuring it meets the highest standards of performance, security, and user satisfaction. Our quality assurance practices guarantee a reliable experience for your audience.</p>
                    </section>
                    <section id="content6" class="content">
                        <div class="content-header">
                            <img src="./images/moderization-process.png" alt="">
                            <h3>News Software Modernization</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>We upgrade legacy news software to meet contemporary technological standards, enhancing functionality and security. Our modernization services help your organization remain competitive by integrating advanced features that support evolving media consumption habits.</p>
                    </section>
                    <section id="content7" class="content">
                        <div class="content-header">
                            <img src="./images/support-process.png" alt="">
                            <h3>News Software Maintenance and Support</h3>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                        </div>
                        <p>Our maintenance and support services provide ongoing software updates, troubleshooting, and enhancements to ensure optimal performance. We focus on resolving issues, improving functionality, and adapting software to the changing landscape of the news industry.</p>
                    </section>
                </section>
            </section>




            <!-- ######### Benefits ##########  -->
            <section class="benefits-wrapper">
                <h1>Sectors that can benefits from our news software development services</h1>


                <div class="benefits-sectors">
                    <ul>
                        <li>Newspapers</li>
                        <li>Television News Channels</li>
                        <li>Online News Websites</li>
                        <li>News Magazines</li>
                        <li>Radio News Stations</li>
                        <li>News Aggregator Platforms</li>
                    </ul>
                    <ul>
                        <li>Investigative Journalism Organizations</li>
                        <li>Broadcasting Networks</li>
                        <li>Social Media News Outlets</li>
                        <li>Podcast News Programs</li>
                        <li>Mobile News Apps</li>
                        <li>Press Release Distribution Services</li>
                    </ul>
                </div>
            </section>



            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Why Choose TekAlgo As Your News Software Development</h1>

            </div>

            <div class="service_choose_us">

                <div class="services_container">
                    <!-- Service 1 - News Technology Expertise -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Providing innovative solutions tailored for the news industry, enhancing content delivery, audience engagement, and data analytics for better reporting.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>News Technology Expertise</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Custom News Application Development -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Building user-friendly applications that provide real-time news updates, personalized feeds, and seamless navigation to keep your audience informed.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Custom News Application Development</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Data Security and Integrity -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Implementing robust security protocols to protect sensitive data and maintain the integrity of news content against misinformation and cyber threats.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Data Security and Integrity</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Multi-Platform Integration -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Ensuring seamless integration of news distribution channels across multiple platforms, enhancing accessibility and improving audience reach.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Multi-Platform Integration</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Advanced Analytics and Insights -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Leveraging data analytics to gain insights into audience behavior, optimize content strategies, and drive engagement with targeted reporting.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>Advanced Analytics and Insights</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 6 - 24/7 Support and Maintenance -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>
                                Offering continuous support and timely updates to ensure your news platform remains operational, efficient, and ready to deliver breaking news.
                            </p>
                            <img src="images/star.png" alt="" />
                            <h1>24/7 Support and Maintenance</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>
                </div>

            </div>


            <!-- ######### who can avail ###### -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">
                    Who Can Avail Our News Software Services</h1>

            </div>

            <div class="avail-section-wrapper">
                <div class="avail-section" id="scrollable-section">
                    <div class="avail-image-container" id="image-scroll">
                        <img src="./images/news-primary.jpg" alt="Image on Left">
                    </div>


                    <div class="avail-content-container" id="scrollable-content">
                        <!-- News Industry Content -->
                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>Audience Engagement</h2>
                            </div>
                            <p>News organizations can use social networking platforms to interact with their audience,
                                encouraging discussions and feedback. This fosters a sense of community, allowing readers
                                to share opinions, ask questions, and engage directly with journalists, enhancing the
                                overall news experience.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>Breaking News Updates</h2>
                            </div>
                            <p>Social networks enable real-time sharing of breaking news, allowing organizations
                                to reach audiences instantly. By leveraging these platforms, news outlets can disseminate
                                urgent information quickly, ensuring that the public stays informed and engaged with
                                current events.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>User-Generated Content</h2>
                            </div>
                            <p>News organizations can invite audiences to contribute stories, photos, and videos,
                                fostering community involvement. This enriches content diversity, encourages citizen
                                journalism, and builds trust as audiences see their perspectives reflected in the
                                news coverage.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>Targeted Advertising</h2>
                            </div>
                            <p>Social networking tools allow news outlets to deliver targeted advertisements based
                                on user interests and demographics. This increases ad relevance, enhances user experience,
                                and boosts revenue for news organizations while supporting local businesses and
                                advertisers.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>Brand Loyalty</h2>
                            </div>
                            <p>By creating interactive social platforms, news organizations can build brand
                                loyalty through engaging content and community participation. Regular updates, polls,
                                and discussions encourage followers to stay connected, leading to increased
                                readership and stronger audience relationships.</p>
                        </div>

                        <div class="avail-content">
                            <div class="avail-content-header">
                                <img src="./images/progress.png" alt="Image on Left">
                                <h2>Media Literacy</h2>
                            </div>
                            <p>News organizations can use social networks to promote media literacy campaigns,
                                educating audiences about fact-checking, bias, and reliable sources. This empowers
                                readers to critically analyze news, enhancing public understanding and fostering
                                informed communities in an age of misinformation.</p>
                        </div>
                    </div>

                </div>
            </div>



            <!-- ######### Process ##########  -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">
                    Process We Follow To Develop Heathcare Software</h1>

            </div>

            <div class="swiper mySwiper">

                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/news-content-management.png" alt="">
                        </div>
                        <h2>Content Management Systems</h2>
                        <p>Robust platforms for news publishing and content organization.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/news-analytics.png" alt="">
                        </div>
                        <h2>News Analytics Solutions</h2>
                        <p>Analytics tools to measure engagement and optimize strategies.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/multi-platform-distribution.png" alt="">
                        </div>
                        <h2>Multi-Platform Distribution</h2>
                        <p>Seamless news distribution across websites and social media.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/audience-engagement-tools.png" alt="">
                        </div>
                        <h2>Audience Engagement Tools</h2>
                        <p>Interactive tools to enhance reader interaction and feedback.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/multimedia-production.png" alt="">
                        </div>
                        <h2>Multimedia Production Services</h2>
                        <p>High-quality video and audio content for engaging storytelling.</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/news-automation-tools.png" alt="">
                        </div>
                        <h2>News Automation Tools</h2>
                        <p>Automation for content curation and real-time updates.</p>
                    </div>
                </div>


                <div class="swiper-pagination"></div>
            </div>

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
                <h1>News Website Development FAQs</h1>
            </div>

            <section class="faq-wrapper">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What types of news websites do you develop?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We develop a variety of news websites, including online newspapers, digital magazines, and niche news portals. Our designs focus on providing a seamless reading experience while showcasing articles, multimedia content, and breaking news updates.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can you integrate content management systems (CMS) for easy publishing?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we integrate user-friendly content management systems (CMS) that allow journalists and editors to publish, edit, and manage content easily. This ensures that your news team can keep the website updated with the latest news and articles.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How do you ensure the website is optimized for mobile users?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We utilize responsive design techniques to ensure your news website provides an optimal viewing experience across all devices, including smartphones and tablets. This enhances accessibility and engagement with your audience on the go.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Do you provide features for multimedia content and social sharing?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, we incorporate features for multimedia content, such as videos, podcasts, and image galleries, to enrich the news experience. We also enable social sharing options to allow readers to easily share articles across various social media platforms.
                    </p>
                </section>
            </section>




            <!-- ##### Book #######  -->

            <section class="section-book">
                <section class="book-image">
                    <img src="./images/booking-industry.jpg" alt="">
                </section>
                <section class="book-data">



                    <h1 data-aos="zoom-in" data-aos-duration="2500">News Software Development Services</h1>
                    <p data-aos="zoom-in" data-aos-duration="2500">Comprehensive Solutions Designed to Support News Professionals</p>
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
    <?php include('pop.php'); ?>

</body>

</html>