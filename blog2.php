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
    <title>Dynamic Content Layout</title>
    <!-- <link rel="stylesheet" href="./assests/css/navbar.css"> -->

    <link rel="stylesheet" href="./assests/css/blog.css">
</head>

<body>
    <?php include "navbar.php"; ?>
    <div class="wrapper">



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



            <div class='content-container' onclick='handleContainerClick(event, <?= $id ?>)'>

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


    <script src="./swiper.js"></script>

</body>

</html>

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


</head>

<body>
    <div>
        <?php include('navbar.php'); ?>
        <div class="wrapper">



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



                <div class='content-container' onclick='handleContainerClick(event, <?= $id ?>)'>

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


        <?php include('footer.php'); ?>

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

<!-- // new  -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the ID from the URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    // Fetch the full content for the specific blog post
    $sql = "SELECT content FROM content_table WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $content = $row['content'];
    } else {
        $content = "Content not found.";
    }
} else {
    $content = "Invalid content ID.";
}

$conn->close();

// Load HTML content and separate images and text
$doc = new DOMDocument();
libxml_use_internal_errors(true);
$content = mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8');
@$doc->loadHTML($content);
libxml_clear_errors();

$xpath = new DOMXPath($doc);
$images = $xpath->query('//img');

$imageHtml = '';
$textHtml = '';

// Separate images and text content
foreach ($images as $img) {
    $src = $img->getAttribute('src');
    if (strpos($src, './admin/') !== 0) {
        $src = './admin/' . ltrim($src, '/');
    }
    $alt = htmlspecialchars($img->getAttribute('alt'));
    $imageHtml .= "<img src='{$src}' alt='{$alt}'>";
    $img->parentNode->removeChild($img);
}

// Get the text content
$textHtml = $doc->saveHTML();

// Output the separated content
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Detail</title>
    <link rel="stylesheet" href="./assests/css/blogDetail.css">
    <link rel="stylesheet" href="./assests/css/navbar.css">
    <link rel="stylesheet" href="./assests/css/footer.css">

</head>

<body>
    <?php include "navbar.php"; ?>

    <div class="container">
        <!-- Image Container -->
        <div class="image-container">
            <?php echo $imageHtml; ?>
        </div>

        <!-- Text Content -->
        <div class="text-content">
            <?php echo $textHtml; ?>
        </div>
        <!-- Back Button -->
        <a href="blog.php" class="back-button">Back to Blog</a>
    </div>

    <?php include "./footer.php" ?>

    <script src="./swiper.js"></script>
</body>

</html>