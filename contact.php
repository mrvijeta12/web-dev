<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="assests/css/contact.css">
    <link rel="stylesheet" href="assests/css/theme.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/cdf9a174a4.js" crossorigin="anonymous"></script>


</head>

<body>
    <div>
        <?php include('navbar.php'); ?>
        <!-- ##### HERO #####  -->
        <div class="wrapper" data-aos="fade-right" data-aos-duration="1500">
            <div class="hero">
                <h1 data-aos="zoom-in" data-aos-duration="2500">Get in Touch with Us</h1>
                <h2 data-aos="zoom-in" data-aos-duration="2500">We’re Here to Help You with All Your IT Needs</h2>
                <a href="https://calendly.com/salesfocesclouds/30min" data-aos="zoom-in" data-aos-duration="2500">Book Free Consultation</a>
            </div>

            <!-- ########### contact details #######  -->

            <div class="contact_wrapper">
                <div class="contact_child">
                    <div class="services_container">
                        <div class="services_child" data-aos="zoom-in" data-aos-duration="1500">
                            <img src="images/location.png" alt="">
                            <h3>OUR MAIN OFFICE</h3>
                            <p>Saket, New Delhi, India</p>
                        </div>
                        <div class="services_child" data-aos="zoom-in" data-aos-duration="1500">
                            <img src="images/mail.png" alt="">
                            <h3>EMAIL</h3>
                            <p>sales@tekalgo.com</p>
                        </div>
                        <div class="services_child" data-aos="zoom-in" data-aos-duration="1500">
                            <img src="images/telephone.png" alt="">
                            <h3>PHONE NUMBER</h3>
                            <p>+91 9118618111</p>
                        </div>
                    </div>
                </div>
                <!-- ######## CONTACT FORM #######  -->
                <div class="contact-data-wrapper">

                    <div class="contact_data">
                        <div class="contact_data_item" data-aos="fade-up" data-aos-duration="1500">

                            <img src="images/contact.jpg" alt="">
                        </div>
                        <div class="contact_data_item" data-aos="fade-down" data-aos-duration="1500">
                            <div>
                                <form id="contactForm" method="post">
                                    <label for="name">Name:</label>
                                    <input type="text" id="name" name="name" placeholder="Enter Your Name" required>

                                    <label for="email">Email:</label>
                                    <input type="email" id="email" name="email" placeholder="Enter Your Email" required>

                                    <label for="message">Message:</label>
                                    <textarea name="message" id="message" placeholder="Enter Your Message"></textarea>

                                    <input type="submit" value="Submit" name="submit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- ######### CONTACT PERSON ######## -->

                <section class="contact-person-wrapper">
                    <section class="contact-person-child child1">
                        <h1>Ready to transform your ideas into future-ready web solutions?</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, nihil. Lorem ipsum dolor sit amet consectetur adipisicing elit. Non voluptas voluptatem, illum facilis ipsum vel maiores sint deserunt debitis placeat?</p>
                        <a href="" class="">Book Free Consultation</a>
                    </section>
                    <section class="contact-person-child child2">
                        <div class="contact-person-image">
                            <img src="./images/contact-person2.jpg" alt="">
                        </div>
                        <div class="contact-person-data">
                            <h1>Aston Martin</h1>
                            <h3>Head of Sales</h3>
                            <a href=""><span><i class="fa-solid fa-envelope-open-text"></i></span>sales@tekalgo.com</a>
                            <a href=""><span><i class="fa-brands fa-square-whatsapp"></i></span>+91 xxxxxxxxxx</a>
                            <a href=""><span><i class="fa-brands fa-square-x-twitter"></i></span>salesforce@.com</a>

                        </div>
                    </section>

                </section>
            </div>
        </div>
    </div>



    <?php include('footer.php'); ?>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="swiper.js"></script>


    <?php include('sendMail.php'); ?>








</body>

</html>