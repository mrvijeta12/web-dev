<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="../assests/css/contact.css">
    <link rel="stylesheet" href="../assests/css/theme.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


</head>

<body>
    <div>
        <?php include('navbar.php'); ?>
        <div class="wrapper" data-aos="fade-right" data-aos-duration="1500">
            <div class="about">
                <h1>Get in Touch</h1>
                <h2>Let’s connect. We’re just a message away</h2>
            </div>

            <div class="contact_wrapper">
                <div class="contact_child">
                    <div class="services_container">
                        <div class="services_child" data-aos="zoom-in" data-aos-duration="1500">
                            <img src="../images/homegif.gif" alt="">
                            <h3>OUR MAIN OFFICE</h3>
                            <p>Saket, New Delhi, India</p>
                        </div>
                        <div class="services_child" data-aos="zoom-in" data-aos-duration="1500">
                            <img src="../images/email.gif" alt="">
                            <h3>EMAIL</h3>
                            <p>sales@tekalgo.com</p>
                        </div>
                        <div class="services_child" data-aos="zoom-in" data-aos-duration="1500">
                            <img src="../images/call.gif" alt="">
                            <h3>PHONE NUMBER</h3>
                            <p>+91 9118618111</p>
                        </div>
                    </div>
                </div>

                <div class="contact_data">
                    <div class="contact_data_item" data-aos="zoom-in" data-aos-duration="1500">
                        <h1>Connect with Us: We’re here to answer your questions, provide support, and assist with all your inquiries and needs.</h1>
                        <p>Reach out to us for any questions, support, or inquiries you may have. Our dedicated team is here to provide timely and helpful responses, ensuring you receive the assistance you need. Whether you’re seeking information or need technical support, we’re committed to making your experience seamless and efficient.</p>
                        <img src="../images/krakenimages-376KN_ISplE-unsplash.jpg" alt="">
                    </div>
                    <div class="contact_data_item" data-aos="fade-up-left" data-aos-duration="1500">
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



    <?php include('footer.php'); ?>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="../swiper.js"></script>


    <?php include('../sendMail.php'); ?>








</body>

</html>