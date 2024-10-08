<!DOCTYPE php>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="assests/css/index.css">

    <!-- <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /> -->

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
                <h1 data-aos="zoom-in" data-aos-duration="2500">Innovative IT Solutions for the Digital Era</h1>
                <h2 data-aos="zoom-in" data-aos-duration="2500">Empowering businesses with cutting-edge technology and tailored software solutions</h2>
                <a href="https://calendly.com/salesfocesclouds/30min" data-aos="zoom-in" data-aos-duration="2500">Book Free Consultation</a>
            </div>

            <!-- ######################################## OUR SERVICES ########################################  -->



            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h2>Delivering Innovative Services to Propel Your Success Forward</h2>
                <!-- <div class="circle-container">
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                </div> -->
            </div>

            <!-- ########################################## swipper #################################  -->




            <div class="swiper mySwiper">
                <div class="swiper-wrapper">

                    <div class="swiper-slide slide-1" data-aos="fade-up" data-aos-duration="1500">
                        <a href="web-development.php">
                            <div class="swiper-slide-image">
                                <img src="images/web.png" alt="">
                            </div>
                            <div class="swiper-slide-text">
                                <h3>WEB DEVELOPMENT</h3>

                            </div>

                            <div class="swiper-slide-text-details">
                                <p><span><i class="fa-solid fa-angles-right"></i></span>MERN </p>
                                <p><span><i class="fa-solid fa-angles-right"></i></span> PHP</p>
                                <p><span><i class="fa-solid fa-angles-right"></i></span> JAMstack</p>
                                <p><span><i class="fa-solid fa-angles-right"></i></span> Django Stack</p>
                                <p><span><i class="fa-solid fa-angles-right"></i></span> Wordpress</p>

                            </div>

                            <button class="btn">Discover More </button>



                        </a>
                    </div>



                    <div class="swiper-slide slide-2" data-aos="fade-down" data-aos-duration="1500">
                        <a href="custom-software.php">
                            <div class="swiper-slide-image">
                                <img src="images/web.png" alt="">
                            </div>
                            <div class="swiper-slide-text">
                                <h3>CRM Development</h3>

                            </div>

                            <div class="swiper-slide-text-details">
                                <p><span><i class="fa-solid fa-angles-right"></i></span> Lorem, ipsum dolor.</p>
                                <p><span><i class="fa-solid fa-angles-right"></i></span> Lorem, ipsum dolor.</p>
                                <p><span><i class="fa-solid fa-angles-right"></i></span> Lorem, ipsum dolor.</p>
                                <p><span><i class="fa-solid fa-angles-right"></i></span> Lorem, ipsum dolor.</p>
                                <p><span><i class="fa-solid fa-angles-right"></i></span> Lorem, ipsum dolor.</p>

                            </div>

                            <button class="btn">Discover More </button>

                        </a>
                    </div>





                </div>
                <div class="swiper-pagination"></div>
            </div>

            <!-- ######################################## OUR PROJECTS ########################################  -->



            <!-- <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h2>Our Projects</h2>
                <div class="circle-container">
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                </div>
            </div> -->



            <!-- ############################################# WHY CHOOSE US IMAGE ######################################  -->

            <!-- <div class=" hero choose_us" data-aos="flip-down" data-aos-duration="2000">
              

                <h1>Why Choose Us ??</h1>
            </div> -->

            <!-- ########################################## OUR PROJECTS DETAILS ######################################### -->

            <!-- <div class="choose_container">
                <div class="choose_content">
                    <div class="choose_image">
                        <img src="images/smartbank.jpg" alt="choose us" data-aos="fade-up" data-aos-duration="1500">
                    </div>

                    <div class="choose_data">
                        <h1 data-aos="fade-down" data-aos-duration="1500">SmartBank - Digital Banking Transformation</h1>
                        <p>We developed and implemented SmartBank, a secure and user-friendly online banking platform for a regional bank. The platform included features such as secure login, real-time account tracking, fund transfers, bill payments, and a mobile banking app. Leveraging the latest in fintech, the solution was built with robust security features, including two-factor authentication (2FA) and end-to-end encryption.</p>
                    </div>
                </div>

                <div class="choose_content content_2">

                    <div class="choose_data">
                        <h1 data-aos="fade-down" data-aos-duration="1500">MediCare Connect - Telemedicine Platform</h1>
                        <p>MediCare Connect is a telemedicine platform designed to facilitate virtual consultations between doctors and patients. The platform includes appointment scheduling, video consultations, e-prescriptions, and a secure portal for patient data management. Integrated with the provider’s existing health records system, it ensured seamless data transfer while complying with HIPAA regulations.</p>
                    </div>
                    <div class="choose_image">
                        <img src="images/medicare.jpg" alt="choose us" data-aos="fade-up" data-aos-duration="1500">
                    </div>
                </div>

                <div class="choose_content">
                    <div class="choose_image">
                        <img src="images/educloud.jpg" alt="choose us" data-aos="fade-up" data-aos-duration="1500">
                    </div>

                    <div class="choose_data">
                        <h1 data-aos="fade-down" data-aos-duration="1500">EduCloud - Virtual Learning Platform</h1>
                        <p>EduCloud was built for a national education provider to deliver an integrated learning management system (LMS) that supports online classes, quizzes, assessments, and real-time student-teacher interaction. The platform was designed to accommodate remote learning for students, with built-in video conferencing, discussion boards, and personalized learning pathways. It also featured a mobile app for students on-the-go.</p>
                    </div>
                </div>
            </div> -->


            <!-- ############################## TECHNOLOGIES USED ##########################  -->

            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h2>Innovative Technologies Powering Our Web Development Services</h2>
                <!-- <div class="circle-container">
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                </div> -->
            </div>
            <div class="service_choose_us">
                <!-- <h3 data-aos="zoom-in" data-aos-duration="1500">TECHNOLOGIES USED</h3> -->


                <div class="services_container">
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/html.png" alt="">
                        <h2>HTML</h2>
                        <!-- <p>Comprehensive Salesforce services for custom CRM solutions and seamless implementation.</p> -->
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/css-3.png" alt="">
                        <h2>CSS</h2>
                        <!-- <p>Comprehensive Salesforce services for custom CRM solutions and seamless implementation.</p> -->
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/bootstrap1.png" alt="">
                        <h2>BootStrap</h2>
                        <!-- <p>Comprehensive Salesforce services for custom CRM solutions and seamless implementation.</p> -->
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/react.png" alt="">
                        <h2>React</h2>
                        <!-- <p>Comprehensive Salesforce services for custom CRM solutions and seamless implementation.</p> -->
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/next.webp" alt="">
                        <h2>Next.js</h2>
                        <!-- <p>Customized Salesforce solutions to enhance CRM functionality and business processes.</p> -->
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/Angular_full_color_logo.svg.png" alt="">
                        <h2>Angular</h2>
                        <!-- <p>Seamless Salesforce integration services to unify systems and boost productivity.</p> -->
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/node.js.png" alt="">
                        <h2>Node.js</h2>
                        <!-- <p>Advanced Salesforce CRM analytics services for data-driven insights and growth.</p> -->
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/php.png" alt="">
                        <h2>PhP</h2>
                        <!-- <p>Salesforce AI solutions for smarter insights, automation, and business growth.</p> -->
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/wordpress.png" alt="">
                        <h2>Wordpress</h2>
                        <!-- <p>Salesforce AI solutions for smarter insights, automation, and business growth.</p> -->
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/js.png" alt="">
                        <h2>JavaScript</h2>
                        <!-- <p>Advanced Salesforce Data Cloud services for secure, scalable data management solutions.</p> -->
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/java.png" alt="">
                        <h2>Java</h2>
                        <!-- <p>Advanced Salesforce Data Cloud services for secure, scalable data management solutions.</p> -->
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="images/python.png" alt="">
                        <h2>Python</h2>
                        <!-- <p>Advanced Salesforce Data Cloud services for secure, scalable data management solutions.</p> -->
                    </div>


                </div>

            </div>


            <!-- ################# WORKING WITH US ##################  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h2>Unlock Your Potential by Collaborating with Tekalgo Team</h2>
                <!-- <div class="circle-container">
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                </div> -->
            </div>
            <section class="work-wrapper">

                <section class="work-wrapper-child">
                    <section class="work-child">
                        <h2>Results-Oriented and Customer-Centric</h2>
                        <p>With our years of experience, we help businesses solve real-world problems and make strategic opportunities. Our primary focus is always on enhancing the customer’s experience and generating tangible business results.</p>
                    </section>
                    <section class="work-child">
                        <h2>Results-Oriented and Customer-Centric</h2>
                        <p>With our years of experience, we help businesses solve real-world problems and make strategic opportunities. Our primary focus is always on enhancing the customer’s experience and generating tangible business results.</p>
                    </section>
                    <section class="work-child">
                        <h2>Results-Oriented and Customer-Centric</h2>
                        <p>With our years of experience, we help businesses solve real-world problems and make strategic opportunities. Our primary focus is always on enhancing the customer’s experience and generating tangible business results.</p>
                    </section>
                    <section class="work-child">
                        <h2>Results-Oriented and Customer-Centric</h2>
                        <p>With our years of experience, we help businesses solve real-world problems and make strategic opportunities. Our primary focus is always on enhancing the customer’s experience and generating tangible business results.</p>
                    </section>

                </section>

            </section>

            <!-- ##################### collaboration #############  -->
            <section class="collaboration-wrapper">r
                <section class="collaboration-header">
                    <h1>Easy Steps to Follow to Start Collaboration With Us</h1>
                </section>
                <section class="collaboration-child-wrapper">
                    <section class="collaboration-child" id="collaboration-child-1">
                        <section class="collaboration-child-image">
                            <img src="./images/requirement.png" alt="">
                        </section>
                        <section class="collaboration-child-data">
                            <h2>Share your Requirement <span><i class="fa-solid fa-right-long"></i></span> </h2>
                            <p>Start by sharing your project requirements with us. Complete our Contact Us form and enter the required details to start the process. Drop the link to any requisite attachment (a document containing all you need for your project) for better understanding.</p>

                        </section>

                    </section>
                    <section class="collaboration-child" id="collaboration-child-2">
                        <section class="collaboration-child-image">
                            <img src="./images/project-evaluation.png" alt="">
                        </section>
                        <section class="collaboration-child-data">
                            <h2>Project Evaluation <span><i class="fa-solid fa-right-long"></i></span></h2>
                            <p>Start by sharing your project requirements with us. Complete our Contact Us form and enter the required details to start the process. Drop the link to any requisite attachment (a document containing all you need for your project) for better understanding.</p>

                        </section>
                    </section>
                    <section class="collaboration-child" id="collaboration-child-3">
                        <section class="collaboration-child-image">
                            <img src="./images/nda.png" alt="">
                        </section>
                        <section class="collaboration-child-data">
                            <h2>NDA <span><i class="fa-solid fa-right-long"></i></span></h2>
                            <p>Start by sharing your project requirements with us. Complete our Contact Us form and enter the required details to start the process. Drop the link to any requisite attachment (a document containing all you need for your project) for better understanding.</p>

                        </section>
                    </section>
                    <section class="collaboration-child" id="collaboration-child-4">
                        <section class="collaboration-child-image">
                            <img src="./images/interview.png" alt="">
                        </section>
                        <section class="collaboration-child-data">
                            <h2>Interview with an Expert <span><i class="fa-solid fa-right-long"></i></span></h2>
                            <p>Start by sharing your project requirements with us. Complete our Contact Us form and enter the required details to start the process. Drop the link to any requisite attachment (a document containing all you need for your project) for better understanding.</p>

                        </section>
                    </section>
                </section>
            </section>

            <!-- ############### HOW WE WORK ############  -->
            <section class="workflow-wrapper">
                <section class="workflow-data">
                    <h1>How Tekalgo Experts Elevate Your Online Business Success</h1>
                    <img src="images/Roadmap image.png" alt="">
                </section>



            </section>


            <!-- ##################################### animated Counter #########################  -->

            <h1>Why Our Web Development Stands Out</h1>
            <div class="counter_wrapper" data-aos="flip-up" data-aos-duration="2000">
                <div class="counter" data-target="150">
                    <div class="counter-image">

                        <img src="./images/projects.png" alt="">
                    </div>
                    <div class="counter-data">
                        <span class="count">0</span>+
                        <div>
                            <span id="counter-text">Projects Completed</span>
                        </div>

                    </div>
                </div>
                <div class="counter" data-target="250">
                    <div class="counter-image">

                        <img src="./images/custumer.png" alt="">
                    </div>
                    <div class="counter-data">
                        <span class="count">0</span>+
                        <div>
                            <span id="counter-text">Happy Clients</span>
                        </div>

                    </div>

                </div>
                <div class="counter" data-target="300">
                    <div class="counter-image">

                        <img src="./images/member.png" alt="">
                    </div>
                    <div class="counter-data">
                        <span class="count">0</span>+

                        <div>
                            <span id="counter-text">Members</span>
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

    <script src="./swiper.js"></script>

</body>

</html>