<?php

include_once 'db.php';


// Fetch all blog posts with slug, summary, and feature image
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs WHERE category = 'dms' ORDER BY id DESC";
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
    <link rel="stylesheet" href="assests/css/web-services.css">
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
                <div class="hero-image">
                    <img src="./images/dms-hero.jpg" alt="">
                </div>
                <div class="hero-data">
                    <h1 data-aos="zoom-in" data-aos-duration="2500">Simplify Document Management with DMS Solutions</h1>
                    <h2 data-aos="zoom-in" data-aos-duration="2500">Organize, secure, and streamline document workflows efficiently.</h2>
                    <a href="#" class="reopenPopup">Get Professional Advice</a>
                </div>
            </div>


            <!-- ####### INTRODUCTION  ####### -->

            <section class="intro">
                <h1>Streamline Your Document Management with Our Advanced DMS Solution</h1>
                <p>Our Document Management System (DMS) revolutionizes the way organizations create, store, and manage documents. With a user-friendly interface and robust features, our DMS centralizes all documents in a secure environment, facilitating easy access and collaboration. Enhance efficiency by automating workflows, ensuring compliance, and reducing the risk of document loss. Empower your team with quick retrieval, version control, and seamless integration into your existing systems, driving productivity and improving decision-making across your organization.</p>
            </section>




            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Core Features of DMS Solutions</h1>
            </div>
            <div class="service_choose_us">
                <div class="services_container">
                    <!-- Service 1 - Document Storage -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Centralized repository for storing and organizing all organizational documents, ensuring easy access, retrieval, and secure management of files across various departments and teams.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Document Storage</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Version Control -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Tracks all changes made to documents, ensuring that users always have access to the most up-to-date version while maintaining a complete history of edits and revisions.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Version Control</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Access Control -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Restricts document access to authorized users only, ensuring sensitive information is protected, and only the right individuals can view, edit, or share files within the system.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Access Control</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Search Functionality -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Enables quick and efficient document retrieval through advanced search features, making it easy to locate specific files, keywords, or documents within large organizational archives.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Search Functionality</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Audit Trails -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Provides detailed logs of document access and modifications, creating a secure trail of actions taken to support compliance with internal policies and external regulations.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Audit Trails</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>
                </div>
            </div>








            <!-- ######### Benefits ##########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Key Benefits of Implementing DMS Systems</h1>

            </div>


            <section class="benefits-wrapper">


                <div class="benefits-sectors">
                    <ul>
                        <li>Centralized storage for easy access to documents and files.</li>
                        <li>Improved collaboration through document sharing and version control.</li>
                        <li>Enhanced security for sensitive documents and data.</li>
                        <li>Streamlined compliance with industry regulations.</li>
                        <li>Reduced physical storage space and costs.</li>
                    </ul>
                    <ul>
                        <li>Real-time tracking of document changes and approvals.</li>
                        <li>Automated workflows for document review and approval processes.</li>
                        <li>Integration with other business applications for seamless operations.</li>
                        <li>Enhanced search capabilities for quick retrieval of documents.</li>
                        <li>Scalability to accommodate growing document repositories.</li>
                    </ul>
                </div>

            </section>

            <!-- ####### WORKING WITH US ######  -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <h1>Exploring the Functionality of Document Management Systems</h1>
                <p>Document Management Systems (DMS) play a crucial role in organizing, storing, and managing documents electronically. This overview highlights the essential functionalities and advantages of DMS:</p>
            </div>
            <section class="work-wrapper">
                <section class="work-wrapper-child">
                    <section class="work-child">
                        <h2>
                            <span>1.</span>Streamlined Document Capture:
                        </h2>
                        <p>DMS enable organizations to capture documents in various formats, including scanned images, PDFs, and digital files. This streamlined capture process allows users to digitize paper documents quickly and efficiently, facilitating a transition to a paperless environment.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>2.</span>Enhanced Document Retrieval:
                        </h2>
                        <p>With robust indexing capabilities, DMS improve document retrieval times significantly. Users can search for documents using specific keywords, phrases, or tags, allowing for quick access to critical information when needed.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>3.</span>Centralized Document Storage:
                        </h2>
                        <p>By providing a centralized location for all documents, DMS eliminate the confusion of multiple storage sites. This centralization not only enhances organization but also simplifies backup and recovery processes, ensuring document safety.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>4.</span>Document Security and Encryption:
                        </h2>
                        <p>Security is paramount in DMS. These systems employ encryption methods and access controls to protect sensitive documents from unauthorized access. Users can assign permissions based on roles, ensuring that only the right people can view or modify documents.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>5.</span>Automated Document Routing:
                        </h2>
                        <p>DMS can automate the routing of documents for approval, review, or other processes. This automation reduces manual handling, speeds up workflows, and ensures that documents reach the appropriate personnel without delays.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>6.</span>Collaboration Features:
                        </h2>
                        <p>Document Management Systems often come equipped with collaboration tools, allowing multiple users to work on documents simultaneously. Features like shared access, comments, and version tracking enhance teamwork and productivity.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>7.</span>Regulatory Compliance Management:
                        </h2>
                        <p>DMS help organizations maintain compliance with industry regulations by providing features for document retention, version history, and audit trails. This functionality ensures that organizations can demonstrate compliance during audits or inspections.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>8.</span>Customizable Workflows:
                        </h2>
                        <p>Many DMS solutions offer customizable workflows tailored to an organization's specific needs. This flexibility allows businesses to define their document handling processes, ensuring that every step is optimized for efficiency.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>9.</span>Disaster Recovery and Backup:
                        </h2>
                        <p>Document Management Systems provide essential backup and disaster recovery options, ensuring that documents are protected against data loss. Regular backups and cloud storage solutions help safeguard vital information.</p>
                    </section>
                    <section class="work-child">
                        <h2>
                            <span>10.</span>Cost-Effective Document Management:
                        </h2>
                        <p>Implementing a DMS can significantly reduce costs associated with paper storage, printing, and manual document handling. By increasing efficiency and productivity, organizations can achieve a better return on investment over time.</p>
                    </section>
                </section>
            </section>













            <!-- ######### Process ##########  -->

            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">
                    Industries Benefiting from DMS</h1>

            </div>

            <div class="swiper mySwiper">



                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/healthcare-service.png" alt="">
                        </div>
                        <h2>Manufacturing</h2>
                        <!-- <p>Guiding providers to enhance efficiency with strategic IT solutions.</p> -->
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/healthcare-service.png" alt="">
                        </div>
                        <h2>Retail</h2>

                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/healthcare-service.png" alt="">
                        </div>
                        <h2>Healthcare</h2>

                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/healthcare-service.png" alt="">
                        </div>
                        <h2>Construction</h2>

                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/healthcare-service.png" alt="">
                        </div>
                        <h2>Finance</h2>

                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-slide-image">
                            <img src="images/healthcare-service.png" alt="">
                        </div>
                        <h2>Logistics</h2>

                    </div>
                </div>






                <div class="swiper-pagination"></div>
            </div>




            <!-- ####### why choose us ########  -->
            <div class="container">
                <h1 data-aos="zoom-in" data-aos-duration="1500">Key DMS Modules and Their Functions</h1>
            </div>
            <div class="service_choose_us">
                <div class="services_container">
                    <!-- Service 1 - Document Storage -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Centralizes and securely stores all organizational documents, making it easy to access and manage important files, ensuring data integrity and compliance with regulations.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Document Storage</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 2 - Version Control -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Tracks changes to documents over time, manages different versions, and ensures that the most up-to-date content is always accessible for team collaboration and reference.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Version Control</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 3 - Access Control -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Manages and controls user permissions to ensure that only authorized individuals can access, edit, or share sensitive documents, safeguarding your organization’s information.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Access Control</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 4 - Collaboration Tools -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Facilitates seamless document sharing, real-time collaboration, and communication among teams, ensuring everyone stays on the same page and can contribute to projects efficiently.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Collaboration Tools</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>

                    <!-- Service 5 - Search and Retrieval -->
                    <div class="services_child" data-aos="fade-up" data-aos-duration="1500">
                        <div class="content-wrapper">
                            <p>Provides fast and efficient search functionality, allowing users to easily retrieve documents by keywords, tags, or metadata, saving time and improving document management.</p>
                            <img src="images/star.png" alt="" />
                            <h1>Search and Retrieval</h1>
                        </div>
                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                            Read More
                        </button>
                    </div>
                </div>
            </div>

            <!-- ##### blog ###  -->
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
                <h1>Document Management System (DMS) FAQs</h1>
            </div>

            <section class="faq-wrapper">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What is a Document Management System (DMS)?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        A Document Management System (DMS) is a software solution designed to capture, store, organize, manage, and track electronic documents and images of paper-based documents. It ensures efficient document retrieval and security.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How can a DMS improve business efficiency?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        A DMS streamlines document storage and retrieval processes, allowing for faster access to important files, improved collaboration among teams, and reduced time spent searching for documents, ultimately boosting productivity.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What security features does a DMS offer?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        DMS solutions offer robust security features such as role-based access control, encryption, audit trails, and regular backups to ensure that sensitive information is protected and only authorized personnel have access to certain documents.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Can a DMS be integrated with other systems?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Yes, most Document Management Systems are designed to integrate seamlessly with other business systems such as Customer Relationship Management (CRM), Enterprise Resource Planning (ERP), and email systems to streamline workflows.
                    </p>
                </section>
            </section>



            <!-- ##### Book #######  -->

            <section class="section-book">
                <section class="book-image">
                    <img src="./images/booking-industry.jpg" alt="">
                </section>
                <section class="book-data">



                    <h1 data-aos="zoom-in" data-aos-duration="2500">Healthcare Software Development Services</h1>
                    <p data-aos="zoom-in" data-aos-duration="2500">Comprehensive Solutions Designed to Support Healthcare Professionals</p>
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

</body>

</html>