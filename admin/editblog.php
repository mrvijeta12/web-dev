<?php
include_once "./session.php";
check_login();
include_once 'database.php';

// Fetch content by slug
$slug = isset($_GET['slug']) ? $_GET['slug'] : '';
$meta_title = $summary = $social_sharing_image = $content = "";

if ($slug) {
    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT meta_title, summary, social_sharing_image, content FROM webdev_blogs WHERE slug = ?");

    if ($stmt === false) {
        die('MySQL prepare error: ' . htmlspecialchars($conn->error));
    }

    // Bind parameters
    $stmt->bind_param("s", $slug);

    // Execute the statement
    if (!$stmt->execute()) {
        die('MySQL execute error: ' . htmlspecialchars($stmt->error));
    }

    // Bind the result variables
    $stmt->bind_result($meta_title, $summary, $social_sharing_image, $content);

    // Fetch the data
    if (!$stmt->fetch()) {
        echo "No content found for this slug.";
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Slug not provided.";
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>
    <link rel="stylesheet" href="./assets/css/addblog.css">
    <link rel="stylesheet" href="./assets/css/editblog.css">

    <script src="./tinymce/tinymce.min.js"></script>
    <script>
        const image_upload_handler_callback = (blobInfo, progress) => new Promise((resolve, reject) => {
            const xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', 'upload.php');

            xhr.upload.onprogress = (e) => {
                progress(e.loaded / e.total * 100);
            };

            xhr.onload = () => {
                if (xhr.status === 403) {
                    reject({
                        message: 'HTTP Error: ' + xhr.status,
                        remove: true
                    });
                    return;
                }

                if (xhr.status < 200 || xhr.status >= 300) {
                    reject('HTTP Error: ' + xhr.status);
                    return;
                }

                const json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    reject('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                resolve(json.location);
            };

            xhr.onerror = () => {
                reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
            };

            const formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        });

        tinymce.init({
            selector: '#editor',
            plugins: [
                'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
                'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media',
                'table', 'emoticons', 'template', 'codesample'
            ],
            toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |' +
                'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
                'forecolor backcolor emoticons',
            menubar: 'favs file edit view insert format tools table',
            content_style: 'body{font-family:Helvetica,Arial,sans-serif; font-size:16px}',
            images_upload_url: 'upload.php',
            images_upload_handler: image_upload_handler_callback
        });
    </script>
</head>

<body>
    <?php include "./navbar.php"; ?>
    <div class="wrapper">
        <div class="child child1">


            <?php include "sidebar.php"; ?>

        </div>

        <div class="child child2">

            <section class="form-section">
                <form method="POST" action="saveEditContent.php" enctype="multipart/form-data" class="form">
                    <h1>Edit Blog</h1>

                    <!-- meta_title Field (Required) -->
                    <div class="form-group">
                        <label for="meta_title">Meta Title *</label>
                        <input type="text" id="meta_title" name="meta_title" value="<?php echo htmlspecialchars($meta_title, ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>

                    <!-- Summary Field (Required) -->
                    <div class="form-group">
                        <label for="summary">Summary *</label>
                        <textarea id="summary" name="summary" rows="5" required><?php echo htmlspecialchars($summary, ENT_QUOTES, 'UTF-8'); ?></textarea>
                    </div>

                    <!-- Feature Image Field (Optional) -->
                    <div class="form-group">
                        <label for="featureImage">Feature Image (Current: <?php echo htmlspecialchars($social_sharing_image, ENT_QUOTES, 'UTF-8'); ?>)</label>
                        <input type="file" id="featureImage" name="social_sharing_image" accept="image/*">
                    </div>
                    <!-- Blog Pages -->
                    <div class="form-group">
                        <label for="category">Choose Category:-</label>
                        <select id="category" name="category" class="page-type">
                            <optgroup label="Main Page">
                                <option value="home">Home</option>
                                <option value="services">Services</option>
                                <option value="blog">Blog</option>
                                <option value="contact-us">Contact Us</option>

                            </optgroup>
                            <optgroup label="Industries">
                                <option value="on-demand">On Demand</option>
                                <option value="healthcare">Healthcare</option>
                                <option value="restaurant">Restaurant</option>
                                <option value="entertainment">Entertainment</option>
                                <option value="travel">Travel</option>
                                <option value="oil-and-gas">Oil and Gas</option>
                                <option value="telecom">Telecom</option>
                                <option value="construction">Construction</option>
                                <option value="ecommerce">eCommerce</option>
                                <option value="saas">SaaS</option>
                                <option value="finance">Finance</option>
                                <option value="social-networking">Social Networking</option>
                                <option value="banking">Banking</option>
                                <option value="insurance">Insurance</option>
                                <option value="retail">Retail</option>
                                <option value="real-estate">Real Estate</option>
                                <option value="education">Education</option>
                                <option value="news">News</option>
                                <option value="logistics">Logistics</option>
                                <option value="agriculture">Agriculture</option>
                                <option value="manufacturing">Manufacturing</option>
                            </optgroup>
                            <optgroup label="Offshore Experts">

                                <option value="html-developer">HTML Developer</option>
                                <option value="javascript-developer">JavaScript Developer</option>
                                <option value="angularjs-developer">AngularJS Developer</option>
                                <option value="reactjs-developer">ReactJS Developer</option>
                                <option value="vuejs-developer">VueJS Developer</option>
                                <option value="wordpress-developer">WordPress</option>
                                <option value="drupal-developer">Drupal</option>
                                <option value="joomla-developer">Joomla</option>
                                <option value="magneto-developer">Magneto</option>
                                <option value="shopify-developer">Shopify</option>
                                <option value="prestashop-developer">PrestaShop</option>
                                <option value="php-developer">PHP</option>
                                <option value="codeigniter-developer">CodeIgniter</option>
                                <option value="laravel-developer">Laravel</option>
                                <option value="nodejs-developer">NodeJS</option>
                                <option value="web-developer">Web Developer</option>

                            </optgroup>

                            <optgroup label="Our Expertise">
                                <option value="frontend-development">Frontend Development</option>
                                <option value="angularjs">Angular.js</option>
                                <option value="reactjs">React.js</option>
                                <option value="javascript">JavaScript</option>
                                <option value="vuejs">Vue.js</option>
                                <option value="wordpress">WordPress</option>
                                <option value="drupal">Drupal</option>
                                <option value="joomla">Joomla</option>
                                <option value="php">PHP</option>
                                <option value="codeigniter">CodeIgniter</option>
                                <option value="laravel">Laravel</option>
                                <option value="nodejs">NodeJS</option>
                                <option value="pwa">PWA</option>
                                <option value="jquery">jQuery</option>
                                <option value="python">Python</option>
                                <option value="mern-stack">MERN Stack</option>
                                <option value="mean-stack">MEAN Stack</option>
                                <option value="magneto">Magneto</option>
                                <option value="shopify">Shopify</option>
                                <option value="prestashop">PrestaShop</option>


                            </optgroup>


                            <optgroup label="Web Services">
                                <option value="cms">CMS</option>
                                <option value="erp">ERP</option>
                                <option value="crm">CRM</option>
                                <option value="lms">LMS</option>
                                <option value="e-commerce">E-COMMERCE</option>
                                <option value="pim">PIM</option>
                                <option value="bpm">BPM</option>
                                <option value="scm">SCM</option>
                                <option value="hrm">HRM</option>
                                <option value="dms">DMS</option>
                                <option value="bi">BI</option>
                                <option value="web-app-dev">Web App Dev</option>
                                <option value="cxm">CXM</option>
                                <option value="booking-and-reservation">Booking & Reservation</option>



                            </optgroup>
                        </select>

                    </div>

                    <!-- Blog Content (TinyMCE Editor) -->
                    <div class="form-group">
                        <label for="editor">Blog Content *</label>
                        <textarea id="editor" name="editorContent"><?php echo htmlspecialchars($content, ENT_QUOTES, 'UTF-8'); ?></textarea>
                    </div>

                    <input type="hidden" name="slug" value="<?php echo htmlspecialchars($slug, ENT_QUOTES, 'UTF-8'); ?>">
                    <input type="submit" name="update" value="Update">

                </form>


            </section>
        </div>
    </div>
</body>

</html>