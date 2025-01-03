<?php

include_once 'db.php';

// Pagination settings
$blogsPerPage = 3; // Number of blogs per page
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($currentPage - 1) * $blogsPerPage; // Offset calculation

// Fetch blogs with pagination
$sql = "SELECT id, slug, summary, social_sharing_image FROM webdev_blogs 
        WHERE category = 'blog' AND blog_status = 'published' 
        ORDER BY id DESC 
        LIMIT $blogsPerPage OFFSET $offset";
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
    $contents[] = ["id" => 0, "slug" => "No content found.", "summary" => "", "social_sharing_image" => ""]; // Empty placeholder
}

// Count total blogs for pagination
$totalBlogsResult = $conn->query("SELECT COUNT(*) AS total FROM webdev_blogs WHERE category = 'blog' AND blog_status = 'published'");
$totalBlogs = $totalBlogsResult->fetch_assoc()['total'];
$totalPages = ceil($totalBlogs / $blogsPerPage); // Total number of pages

$conn->close();

// Check if it's an AJAX request to return only the blog wrapper and pagination
if (isset($_GET['ajax']) && $_GET['ajax'] === '1') {
    echo json_encode([
        'content' => renderBlogs($contents),
        'pagination' => renderPagination($currentPage, $totalPages)
    ]);
    exit();
}

// Helper function to render the blogs
function renderBlogs($blogs)
{
    $html = '';
    foreach ($blogs as $row) {
        $slug = htmlspecialchars($row['slug']);
        $summary = htmlspecialchars($row['summary']);
        $featureImage = !empty($row['social_sharing_image']) ? 'admin/' . htmlspecialchars($row['social_sharing_image']) : 'default-image.png';

        $html .= "<div class='content-container'>
                    <div class='image-container'>
                        <img src='{$featureImage}' alt='Feature Image'>
                    </div>
                    <div class='text-content'>
                        <h2>{$slug}</h2>
                        <a href='insights/{$slug}' class='read-more'>Read More <img src='images/right-arrow.svg' alt='' id='arrow'></a>
                    </div>
                </div>";
    }

    return $html;
}

// Helper function to render the pagination
function renderPagination($currentPage, $totalPages)
{
    $pagination = '';

    if ($currentPage > 1) {
        $pagination .= "<a href='#' class='prev' data-page='" . ($currentPage - 1) . "'>Previous</a>";
    }

    for ($i = 1; $i <= $totalPages; $i++) {
        $pagination .= "<a href='#' class='" . ($i === $currentPage ? 'active' : '') . "' data-page='{$i}'>{$i}</a>";
    }

    if ($currentPage < $totalPages) {
        $pagination .= "<a href='#' class='next' data-page='" . ($currentPage + 1) . "'>Next</a>";
    }

    return $pagination;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="assests/css/blog.css">
    <link rel="stylesheet" href="assests/css/theme.css">
    <link rel="stylesheet" href="assests/css/navbar.css">
    <link rel="stylesheet" href="assests/css/footer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cdf9a174a4.js" crossorigin="anonymous"></script>
</head>

<body>
    <div>
        <?php include('./navbar.php'); ?>
        <div class="wrapper" data-aos="fade-right" data-aos-duration="1000">
            <!-- Hero section -->
            <div class="hero">
                <h1 data-aos="fade-up" data-aos-duration="1500">Innovative IT Solutions for the Digital Era</h1>
                <h2 data-aos="fade-up" data-aos-duration="1500">Empowering businesses with cutting-edge technology and tailored software solutions</h2>
                <a href="https://calendly.com/salesfocesclouds/30min" data-aos="fade-up" data-aos-duration="1500">Book Free Consultation</a>
            </div>

            <!-- Blog section -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1000">
                <h1>Exploring Industry Trends, Ideas, and Real-World Solutions</h1>
            </div>
            <div class="blog-wrapper" id="blog-wrapper" data-aos="zoom-in" data-aos-duration="1000">
                <!-- Blog content will be injected dynamically -->
                <?php echo renderBlogs($contents); ?>
            </div>

            <!-- Pagination Links -->
            <div class="pagination" id="pagination">
                <?php echo renderPagination($currentPage, $totalPages); ?>
            </div>

            <!-- FAQ section -->
            <div class="container" data-aos="zoom-in" data-aos-duration="1000">
                <h1>Blog FAQs: Your Questions Answered</h1>
            </div>

            <section class="faq-wrapper" data-aos="zoom-in" data-aos-duration="1000">
                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Why Choose Us for Your Web Development Needs?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        We specialize in crafting tailored web solutions that align with your business goals. From intuitive user interfaces to robust backend systems, our team ensures every project delivers exceptional performance and scalability. Let us help you bring your ideas to life with cutting-edge technologies and a client-focused approach.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>What Services Do We Offer?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Our expertise spans a wide range of web development services, including responsive website design, custom web application development, e-commerce solutions, and CMS implementation. Whether you're a startup or an established business, we provide solutions tailored to your unique requirements.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>How Do We Ensure Quality in Our Projects?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        Quality is at the heart of everything we do. Our team follows industry best practices, employs rigorous testing methodologies, and utilizes the latest tools to ensure your web solutions are secure, efficient, and user-friendly. We’re committed to delivering results that exceed expectations.
                    </p>
                </section>

                <section class="faq-child">
                    <section class="faq-heading">
                        <h1>Why Is Web Development Crucial for Your Business?</h1>
                        <span><i class="fa-solid fa-angle-down faq-icon"></i></span>
                    </section>
                    <p>
                        In today’s digital age, your website is often the first impression customers have of your business. A well-developed website not only enhances your online presence but also helps drive engagement, build trust, and increase conversions. Investing in professional web development can make all the difference in staying competitive.
                    </p>
                </section>
            </section>


        </div>

        <?php include "footer.php"; ?>
        <?php include('pop.php'); ?>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init({
                once: true,
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="swiper.js"></script>
        <script src="./blog.js"></script>
    </div>

</body>

</html>