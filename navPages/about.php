<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="../assests/css/about.css">
    <link rel="stylesheet" href="../assests/css/navbar.css">



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
            <div class="about">
                <h1>Who We Are</h1>
                <h2>A Dedicated Team Committed to Your Success</h2>
            </div>

            <!-- ########################## our mission ###################### -->

            <div class=" about_choose_container">
                <div class="about_choose_content ">
                    <div class="about_choose_image" data-aos="fade-up-right" data-aos-duration="1500">
                        <img src="../images/our-mission.jpg" alt="choose us">
                    </div>

                    <div class="about_choose_data" data-aos="zoom-in" data-aos-duration="1500">
                        <h1>Our Mission</h1>
                        <p>Our mission is to empower businesses through innovative solutions, driving growth and success with integrity, commitment, and excellence. We strive to create value for our clients, employees, and communities, focusing on delivering exceptional service, fostering a collaborative culture, and continually evolving to meet the challenges of tomorrow.</p>
                    </div>
                </div>


            </div>

            <!-- ######################################## OUR SERVICES ########################################  -->



            <div class="about_container" data-aos="zoom-in" data-aos-duration="1500">
                <h2>Our Team</h2>
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
                        <div class="swiper-slide-image">
                            <img src="../images/t10.jpg" alt="">

                        </div>
                        <p>Tony</p>
                        <p>Salesforce Developer</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="../images/t8.jpg" alt="">

                        </div>
                        <p>Tony</p>
                        <p>Salesforce Developer</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="../images/t1.jpg" alt="">

                        </div>
                        <p>Tony</p>
                        <p>Salesforce Developer</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="../images/t5.jpg" alt="">

                        </div>
                        <p>Tony</p>
                        <p>Salesforce Developer</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="../images/t9.jpg" alt="">

                        </div>
                        <p>Tony</p>
                        <p>Salesforce Developer</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="../images/t4.jpg" alt="">

                        </div>
                        <p>Tony</p>
                        <p>Salesforce Developer</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="../images/t3.jpg" alt="">

                        </div>
                        <p>Tony</p>
                        <p>Salesforce Developer</p>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="../images/t6.jpg" alt="">

                        </div>
                        <p>Tony</p>
                        <p>Salesforce Developer</p>
                    </div>









                </div>
                <div class="swiper-pagination"></div>
            </div>


            <!-- ############################################# WHY CHOOSE US IMAGE ######################################  -->

            <div class="hero choose_us" style="margin-bottom: 0px;" data-aos="flip-down" data-aos-duration="2000">
                <h1>Why TekAlgo??</h1>
            </div>

            <!-- ########################################## WHY CHOOSE US CONTENT ######################################### -->

            <div class=" about_choose_container about_choose_bottom_container">
                <div class="about_choose_content about_choose_bottom_content ">


                    <div class="about_choose_data about_choose_bottom_data " data-aos="zoom-in" data-aos-duration="1500">
                        <h1>Expert Team</h1>
                        <p>Our team is made up of highly skilled professionals with years of experience in the industry, ensuring top-notch service and support.</p>
                        <h1>Quality Assurance</h1>
                        <p>We are committed to delivering high-quality products and services that exceed your expectations every time.</p>
                        <h1>Customer Satisfaction</h1>
                        <p>Your satisfaction is our priority. We work closely with you to understand your needs and provide personalized solutions.</p>
                    </div>
                    <div class="about_choose_image about_choose_bottom_image" data-aos="fade-up-left" data-aos-duration="1500">
                        <img src="../images/about-choose.jpg" alt="choose us">
                    </div>
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

    <script src="../swiper.js"></script>

</body>

</html>