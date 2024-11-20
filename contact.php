<?php

include_once 'db.php';


// Fetch all blog posts with slug, summary, and feature image
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs WHERE category = 'contact-us' ORDER BY id DESC";
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

                <!-- ###### Blogs #####  -->


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

                <!-- #### FAQ ###  -->

                <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                    <h1>Contact Us FAQs: Get in Touch</h1>
                </div>

                <section class="faq-wrapper">
                    <section class="faq-child">
                        <section class="faq-heading">
                            <h1>What is the best way to reach you?</h1>
                            <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                        </section>
                        <p>
                            You can reach us through our contact form on this page, via email, or by phone. We strive to respond to all inquiries within 24-48 hours.
                        </p>
                    </section>

                    <section class="faq-child">
                        <section class="faq-heading">
                            <h1>What are your hours of operation?</h1>
                            <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                        </section>
                        <p>
                            Our hours of operation are Monday to Friday, 9 AM to 6 PM (local time). We are closed on weekends and public holidays, but you can still reach out via email, and we’ll respond when we're back in the office.
                        </p>
                    </section>

                    <section class="faq-child">
                        <section class="faq-heading">
                            <h1>How long does it take to receive a response?</h1>
                            <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                        </section>
                        <p>
                            We typically respond within 24-48 hours during business days. For urgent matters, please indicate the priority in your message, and we’ll do our best to expedite our response.
                        </p>
                    </section>

                    <section class="faq-child">
                        <section class="faq-heading">
                            <h1>Can I schedule a meeting or consultation?</h1>
                            <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                        </section>
                        <p>
                            Yes, we offer virtual and in-person consultations. Please contact us to schedule a time that works for you, and we’ll set up a meeting to discuss your project or questions.
                        </p>
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







    <?php include('pop.php'); ?>
</body>

</html>