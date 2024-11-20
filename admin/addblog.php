<?php
include_once "session.php";
check_login();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TinyMCE Blog Post Editor</title>
    <link rel="stylesheet" href="assets/css/addblog.css">
    <script src="./tinymce/tinymce.min.js"></script>

    <!-- Initialize TinyMCE Editor with Image Upload Support -->
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
            menu: {
                favs: {
                    meta_title: 'menu',
                    items: 'code visualaid | searchreplace | emoticons'
                }
            },
            menubar: 'favs file edit view insert format tools table',
            content_style: 'body{font-family:Helvetica,Arial,sans-serif; font-size:16px}',
            images_upload_url: 'upload.php', // Your server-side upload script
            images_upload_handler: image_upload_handler_callback
        });
    </script>
</head>

<body>
    <?php include "navbar.php" ?>

    <div class="wrapper">
        <div class="child child1">
            <!-- <p>Lorem ipsum dolor sit amet.</p> -->
            <?php include 'sidebar.php' ?>






        </div>

        <div class="child child2">

            <section class="form-section">
                <form method="POST" action="postblog.php" enctype="multipart/form-data" class="form">

                    <h1>Add Blog</h1>

                    <!-- meta_title Field (Required) -->
                    <div class="form-group">
                        <label for="meta_title">meta_title *</label>
                        <input type="text" id="meta_title" name="meta_title" required>
                    </div>

                    <!-- summary Field (Required) -->
                    <div class="form-group">
                        <label for="summary">summary *</label>
                        <textarea id="summary" name="summary" rows="5" required></textarea>
                    </div>

                    <!-- Feature Image Upload (Required) -->
                    <div class="form-group">
                        <label for="featureImage">Feature Image *</label>
                        <input type="file" id="featureImage" name="social_sharing_image" accept="image/*" required>
                    </div>

                    <!-- Blog Categories -->
                    <div class="form-group">
                        <label for="category">Choose Category:-</label>
                        <select id="category" name="category">
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

                    <!-- Blog content (TinyMCE Editor) -->
                    <div class="form-group">
                        <label for="editor">Blog content *</label>
                        <textarea id="editor" name="editorContent"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="button">
                        <input type="submit" name="addToDraft" value="Add To Draft" class="action-btn">
                        <input type="submit" name="create" value="Publish Blog" class="action-btn">


                    </div>
                </form>
            </section>

        </div>

    </div>


</body>

</html>