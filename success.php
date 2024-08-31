<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./assests/css/success.css">

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
            <div class="success_hero">
                <h1>Turning Vision into Reality</h1>
                <h2>Discover how we’ve turned challenges into opportunities and dreams into success stories</h2>
            </div>

            <!-- ######################################## success projects ########################################  -->

            <div class="service_choose_us">
                <!-- <h5>WHY CHOOSE US</h5> -->
                <h2 data-aos="zoom-in" data-aos-duration="1500">Our Successful Projects</h2>

                <div class="services_container">
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="./assests/images/7.jpg" alt="">
                        <h1>Global CRM Implementation</h1>
                        <p>

                            Successfully deployed Salesforce CRM across multiple international offices.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="./assests/images/2.jpg" alt="">
                        <h1>Salesforce Lightning Migration</h1>
                        <p>Upgraded from Classic to Lightning, enhancing user experience.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="./assests/images/4.jpg" alt="">
                        <h1>Custom API Integration</h1>
                        <p>Integrated third-party applications with Salesforce for seamless operations.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="./assests/images/9.jpg" alt="">
                        <h1>Automated Workflow Solutions</h1>
                        <p>Developed custom workflows to automate business processes efficiently.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="./assests/images/5.jpg" alt="">
                        <h1>Salesforce Community Portal</h1>
                        <p>Built a customer portal to enhance self-service and engagement.</p>
                    </div>
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <img src="./assests/images/6.jpg" alt="">
                        <h1>Data Cleanup and Optimization</h1>
                        <p>Executed data cleansing and optimization for better reporting and accuracy.</p>
                    </div>


                </div>

            </div>


            <!-- ########################################## WHY CHOOSE US CONTENT ######################################### -->

            <div class="choose_container">
                <div class="choose_content check">
                    <div class="choose_image" data-aos="fade-up-right" data-aos-duration="1500">
                        <img src="./assests/images/team2.jpg" alt="choose us">
                    </div>

                    <div class="choose_data check" data-aos="zoom-in" data-aos-duration="1500">
                        <h1>Custom Partner Portal Development</h1>
                        <p>We developed a custom Salesforce Partner Portal for a manufacturing client, enabling seamless collaboration with distributors and resellers. The portal provided real-time access to sales data, order tracking, and marketing resources. This solution enhanced partner engagement, streamlined communication, and increased sales by 25% within the first quarter of implementation.</p>
                    </div>
                </div>

                <div class="choose_content content_2">

                    <div class="choose_data" data-aos="zoom-in" data-aos-duration="1500">
                        <h1>Salesforce Einstein Analytics Integration</h1>
                        <p>We integrated Salesforce Einstein Analytics to empower a client with advanced data insights and predictive analytics. The solution provided a comprehensive view of key performance metrics, enabling data-driven decision-making. With customized dashboards and AI-driven insights, the client achieved a 30% improvement in sales forecasting accuracy and strategic planning.</p>
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
                        <h1>Salesforce CPQ Implementation</h1>
                        <p>We successfully implemented Salesforce CPQ (Configure, Price, Quote) to streamline the quoting process for a client. By automating product configurations and pricing, we reduced quote generation time by 50% and improved accuracy. The solution also provided real-time insights, enabling the sales team to close deals faster and with greater confidence.</p>
                    </div>
                </div>
            </div>


            <!-- ##################################### animated Counter #########################  -->







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