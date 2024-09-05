<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="assests/css/index.css">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="./assests/css/theme.css">



</head>

<body>
    <div>
        <?php include('navbar.php'); ?>
        <div class="wrapper" data-aos="fade-right" data-aos-duration="1500">

            <!-- ################################# HERO SECTION ##################################  -->
            <div class="hero">
                <h1>Transform Your Business with Expert Salesforce Solutions</h1>
                <h2>Empowered by a Team of Industry Leaders from Top MNCs</h2>
            </div>

            <!-- ######################################## OUR SERVICES ########################################  -->



            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h2>Our Services</h2>
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
                        <div class=" swiper-slide-image">
                            <img src="./assests/images/3.jpg" alt="">

                        </div>
                        <p>Sales Cloud</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="./assests/images/10.jpg" alt="">

                        </div>
                        <p>Service Cloud</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="./assests/images/5.jpg" alt="">

                        </div>
                        <p>Marketing Cloud</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="./assests/images/9.jpg" alt="">

                        </div>
                        <p>Experience Cloud</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="./assests/images/7.jpg" alt="">

                        </div>
                        <p>Analytic Cloud</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="./assests/images/8.jpg" alt="">

                        </div>
                        <p>Commerce Cloud</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="./assests/images/4.jpg" alt="">

                        </div>
                        <p>Healthcare Cloud</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="./assests/images/6.jpg" alt="">

                        </div>
                        <p>AI Cloud</p>
                    </div>

                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="./assests/images/11.jpg" alt="">

                        </div>
                        <p> Education Cloud</p>
                    </div>








                </div>
                <div class="swiper-pagination"></div>
            </div>



            <!-- ############################################# WHY CHOOSE US IMAGE ######################################  -->

            <div class=" hero choose_us" data-aos="flip-down" data-aos-duration="2000">
                <!-- <div class=" hero choose_us"> -->

                <h1>Why Choose Us ??</h1>
            </div>

            <!-- ########################################## WHY CHOOSE US CONTENT ######################################### -->

            <div class="choose_container">
                <div class="choose_content check">
                    <div class="choose_image" data-aos="fade-up-right" data-aos-duration="1500">
                        <img src="./assests/images/team2.jpg" alt="choose us">
                    </div>

                    <div class="choose_data check" data-aos="zoom-in" data-aos-duration="1500">
                        <h1>Experienced Teams</h1>
                        <p>Our team brings a wealth of experience in Salesforce development, with over two years of hands-on expertise in crafting customized solutions that drive business success. We excel in optimizing CRM platforms, implementing seamless integrations, and delivering user-friendly interfaces. Our commitment to innovation and client satisfaction ensures that we consistently exceed expectations, helping businesses achieve their goals efficiently and effectively.</p>
                    </div>
                </div>

                <div class="choose_content content_2">

                    <div class="choose_data" data-aos="zoom-in" data-aos-duration="1500">
                        <h1>Customized Solutions</h1>
                        <p>Our team specializes in delivering customized solutions tailored to meet your unique business needs. With over two years of experience in Salesforce development, we excel in creating efficient, user-friendly, and scalable systems. We focus on optimizing your CRM to enhance productivity and drive growth, ensuring that our solutions align perfectly with your objectives and deliver measurable results.</p>
                    </div>
                    <div class="choose_image" data-aos="fade-up-left" data-aos-duration="1500">
                        <img src="./assests/images/customize.jpg" alt="choose us">
                    </div>
                </div>

                <div class="choose_content">
                    <div class="choose_image" data-aos="fade-up-right" data-aos-duration="1500">
                        <img src="./assests/images/result.jpg" alt="choose us">
                    </div>

                    <div class="choose_data" data-aos="zoom-in" data-aos-duration="1500">
                        <h1>Proven Results</h1>
                        <p>Our team is dedicated to delivering proven results, backed by over two years of experience in Salesforce development. We have a track record of implementing solutions that significantly enhance business processes and drive measurable success. By optimizing CRM systems and ensuring seamless integrations, we help businesses achieve their goals efficiently, consistently delivering outcomes that exceed expectations.</p>
                    </div>
                </div>
            </div>


            <!-- ##################################### animated Counter #########################  -->

            <div class="counter_wrapper" data-aos="flip-up" data-aos-duration="2000">
                <div class="counter" data-target="150">
                    <span class="count">0</span>+
                    <div>
                        <span class="counter-text">Projects Completed</span>
                    </div>
                </div>
                <div class="counter" data-target="250">
                    <span class="count">0</span>+
                    <div>
                        <span class="counter-text">Happy Clients</span>
                    </div>
                </div>
                <div class="counter" data-target="300">
                    <span class="count">0</span>+

                    <div>
                        <span class="counter-text">Members</span>
                    </div>
                </div>
            </div>






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