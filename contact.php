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


</head>

<body>
    <div>
        <?php include('navbar.php'); ?>
        <div class="wrapper" data-aos="fade-right" data-aos-duration="1500">
            <div class="about">
                <h1 data-aos="zoom-in" data-aos-duration="2500">Get in Touch with Us</h1>
                <h2 data-aos="zoom-in" data-aos-duration="2500">We’re Here to Help You with All Your IT Needs</h2>
                <a href="https://calendly.com/salesfocesclouds/30min" class="btn" data-aos="zoom-in" data-aos-duration="2500">Book Free Consultation</a>
            </div>

            <div class="contact_wrapper">
                <div class="contact_child">
                    <div class="services_container">
                        <div class="services_child" data-aos="zoom-in" data-aos-duration="1500">
                            <img src="images/go-straight.png" alt="">
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