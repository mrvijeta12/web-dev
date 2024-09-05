<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all content with ID
$sql = "SELECT id, content FROM content_table ORDER BY id DESC";
$result = $conn->query($sql);

$contents = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $contents[] = $row;
    }
} else {
    $contents[] = ["id" => 0, "content" => "No content found."];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="./assests/css/blog.css">
    <link rel="stylesheet" href="./assests/css/theme.css">
    <link rel="stylesheet" href="./assests/css/navbar.css">
    <link rel="stylesheet" href="./assests/css/footer.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


</head>

<body>
    <div>
        <?php include('navbar.php'); ?>
        <div class="wrapper" data-aos="fade-right" data-aos-duration="1500">
            <div class="about">
                <h1> Building Smarter on Salesforce</h1>
                <h2>Explore Powerful Development Techniques, Solutions, and Industry Insights</h2>
            </div>

            <div class="about_container" data-aos="zoom-in" data-aos-duration="1500">
                <h2>Our Blog</h2>
                <div class="circle-container">
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                </div>
            </div>



            <?php foreach ($contents as $row): ?>
                <?php
                $content = $row['content'];
                $id = $row['id'];

                // Load HTML content and remove images
                $doc = new DOMDocument();
                libxml_use_internal_errors(true);
                $content = mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8');
                @$doc->loadHTML($content);
                libxml_clear_errors();

                $xpath = new DOMXPath($doc);
                $images = $xpath->query('//img');

                // Extract and display images separately
                $imageHtml = '';
                if ($images->length > 0) {
                    $img = $images->item(0); // Get the first image
                    $src = $img->getAttribute('src');

                    // If the src doesn't already start with '.', add './admin/' prefix
                    if (strpos($src, './') !== 0) {
                        $src = './admin/' . ltrim($src, '/');
                    }

                    $alt = htmlspecialchars($img->getAttribute('alt'));
                    $imageHtml .= "<img src='{$src}' alt='{$alt}'>";
                }

                // Remove images from content
                foreach ($images as $img) {
                    $img->parentNode->removeChild($img);
                }

                // Get the cleaned content
                $textContent = $doc->saveHTML();

                // Create a "Read More" link
                $readMoreLink = "<a href='blogDetail.php?id={$id}' class='read-more'>Read More</a>";
                ?>



                <div class='content-container' onclick='handleContainerClick(event, <?= $id ?>)' data-aos="zoom-in" data-aos-duration="1500">

                    <!-- Image Container -->
                    <div class='image-container'>
                        <?php echo $imageHtml; ?>
                    </div>

                    <!-- Text Content -->
                    <div class='text-content'>
                        <?php echo $textContent; ?>
                        <!-- Read More Button -->

                    </div>
                    <div class='read-more-container'>
                        <?php echo $readMoreLink; ?>
                    </div>

                </div>

            <?php endforeach; ?>


            <?php
            include "./footer.php"
            ?>

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