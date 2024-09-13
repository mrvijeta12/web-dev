<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service</title>
    <link rel="stylesheet" href="../assests/css/service.css">
    <link rel="stylesheet" href="./assests/css/theme.css">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


</head>

<body>
    <div>
        <?php include('navbar.php'); ?>
        <div class="wrapper" data-aos="fade-right" data-aos-duration="1500">

            <!-- ################################# HERO SECTION ##################################  -->
            <div class="about">
                <h1>Comprehensive Salesforce Services Tailored for Your Business</h1>
                <h2>Unlock the Full Potential of Salesforce with Our Expertise</h2>
            </div>

            <!-- ########################## service animated counter ###################### -->
            <div class="serive_counter_wrapper" data-aos="zoom-in" data-aos-duration="1500">
                <div class="service_counter_child service_content ">
                    <h1>Innovative Services Designed to Elevate and Transform Your Business Success</h1>
                    <p>Our comprehensive range of services is crafted to meet your unique business needs. We combine innovation with expertise to deliver solutions that drive growth, enhance efficiency, and create lasting impact. Whether you’re looking to optimize processes or innovate new strategies, we’re here to help you achieve your goals.</p>
                </div>
                <div class="service_counter_child service_counter ">
                    <div class="counter_wrapper_service">
                        <div class="counter " data-target="150">
                            <span class="count">0</span>+
                            <div>
                                <span id="counter-text">Projects Completed</span>
                            </div>
                        </div>
                        <div class="counter" data-target="250">
                            <span class="count">0</span>+
                            <div>
                                <span id="counter-text">Happy Clients</span>
                            </div>
                        </div>
                        <div class="counter" data-target="300">
                            <span class="count">0</span>+

                            <div>
                                <span id="counter-text">Members</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <!-- ######################################## OUR SERVICES ########################################  -->



            <div class="about_container">
                <h2 data-aos="zoom-in" data-aos-duration="1500">Our Expertise</h2>
                <div class="circle-container">
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                </div>
            </div>

            <!-- ########################################## swipper #################################  -->

            <div class="swiper mySwiper">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <a href="../servicePages/sales-cloud.php">
                            <div class="swiper-slide-image">
                                <img src="../images/3.jpg" alt="">
                            </div>
                            <p>Salesforce Sales Cloud</p>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <a href="../servicePages/service-cloud.php">
                            <div class="swiper-slide-image">
                                <img src="../images/10.jpg" alt="">
                            </div>
                            <p>Salesforce Service Cloud</p>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <a href="../servicePages/marketing-cloud.php">
                            <div class="swiper-slide-image">
                                <img src="../images/marketing.jpg" alt="">
                            </div>
                            <p>Salesforce Marketing Cloud</p>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <a href="../servicePages/commerce-cloud.php">
                            <div class="swiper-slide-image">
                                <img src="../images/commerce.jpg" alt="">
                            </div>
                            <p>Salesforce Commerce Cloud</p>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <a href="../servicePages/experience-cloud.php">
                            <div class="swiper-slide-image">
                                <img src="../images/9.jpg" alt="">
                            </div>
                            <p>Salesforce Experience Cloud</p>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <a href="../servicePages/financial-cloud.php">
                            <div class="swiper-slide-image">
                                <img src="../images/7.jpg" alt="">
                            </div>
                            <p>Salesforce Financial Cloud</p>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <a href="../servicePages/community-cloud.php">
                            <div class="swiper-slide-image">
                                <img src="../images/community-cloud.jpg" alt="">
                            </div>
                            <p>Salesforce Community Cloud</p>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <a href="../servicePages/healthcare-cloud.php">
                            <div class="swiper-slide-image">
                                <img src="../images/healthcare.jpg" alt="">
                            </div>
                            <p>Salesforce Healthcare Cloud</p>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <a href="../servicePages/education-cloud.php">
                            <div class="swiper-slide-image">
                                <img src="../images/education.jpg" alt="">
                            </div>
                            <p>Salesforce Education Cloud</p>
                        </a>
                    </div>

                    <div class="swiper-slide">
                        <a href="../servicePages/public-cloud.php">
                            <div class="swiper-slide-image">
                                <img src="../images/public.jpg" alt="">
                            </div>
                            <p>Salesforce Public Cloud</p>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="../servicePages/analytic-cloud.php">
                            <div class="swiper-slide-image">
                                <img src="../images/anlaytic-service.jpg" alt="">
                            </div>
                            <p>Salesforce Analytic Cloud</p>
                        </a>
                    </div>

                </div>
                <div class="swiper-pagination"></div>
            </div>

            <!-- ############################################# WHY CHOOSE US IMAGE ######################################  -->

            <div class="service_choose_us">
                <h1 data-aos="zoom-in" data-aos-duration="1500">WHY CHOOSE US</h1>


                <div class="services_container">
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="../images/s-app.gif" alt="">
                        <h1>Salesforce Application</h1>
                        <p>Comprehensive Salesforce services for custom CRM solutions and seamless implementation.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="../images/s-customsation.gif" alt="">
                        <h1>Salesforce Customisation Services</h1>
                        <p>Customized Salesforce solutions to enhance CRM functionality and business processes.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="../images/s-integration.gif" alt="">
                        <h1>Salesforce Integration Services</h1>
                        <p>Seamless Salesforce integration services to unify systems and boost productivity.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="../images/s-analytic.gif" alt="">
                        <h1> Salesforce CRM Analytics Services</h1>
                        <p>Advanced Salesforce CRM analytics services for data-driven insights and growth.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="../images/s-ai.gif" alt="">
                        <h1>Salesforce AI Solutions</h1>
                        <p>Salesforce AI solutions for smarter insights, automation, and business growth.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="../images/s-data-cloud.gif" alt="">
                        <h1>Salesforce Data Cloud</h1>
                        <p>Advanced Salesforce Data Cloud services for secure, scalable data management solutions.</p>
                    </div>


                </div>

            </div>



            <!-- ############## testimonial ############# -->

            <section class="testimonial_wrapper">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Testimonials</h1>
                <div class="testimonial_slider" data-aos="zoom-in" data-aos-duration="2500">
                    <div class="testimonial_item">
                        <img src="../images/9.jpg" alt="">
                        <p>TekAlgo’s Salesforce expertise boosted our sales efficiency and team productivity. Their tailored solutions made a significant difference. Highly recommended!</p>
                        <h5>John Doe</h5>
                        <p>CEO, Company</p>
                    </div>
                    <div class="testimonial_item">
                        <img src="../images/2.jpg" alt="">
                        <p>TekAlgo transformed our CRM with seamless Salesforce integration. Exceptional service, knowledgeable team, and tangible results. We’re extremely satisfied! </p>
                        <h5>John Doe</h5>
                        <p>CEO, Company</p>
                    </div>
                    <div class="testimonial_item">
                        <img src="../images/4.jpg" alt="">
                        <p>TekAlgo’s Salesforce solutions enhanced our customer management. The team is responsive, professional, and delivered beyond our expectations. Outstanding experience! </p>
                        <h5>John Doe</h5>
                        <p>CEO, Company</p>
                    </div>
                </div>
            </section>


        </div>



    </div>














    <?php include('footer.php'); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
        });
    </script>


    <script src="../swiper.js"></script>

</body>

</html>