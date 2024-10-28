<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Mega Menu | CodingNepal</title>
    <link rel="stylesheet" href="./assests/css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <?php
    $current_page = basename($_SERVER['PHP_SELF']);
    ?>
    <nav id="navbar">
        <div class="wrapper">
            <div class="logo"><a href="./index.php">TekAlgo</a></div>
            <input type="radio" name="slider" id="menu-btn">
            <input type="radio" name="slider" id="close-btn">
            <ul class="nav-links">
                <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
                <li><a href="./index.php" class=" <?php echo ($current_page == 'index.php') ? 'current' : ''; ?>">Home</a></li>
                <li><a href="./services.php" class=" <?php echo ($current_page == 'services.php') ? 'current' : ''; ?>">Services</a></li>

                <li>
                    <a href="#" class="desktop-item">Industries</a>
                    <input type="checkbox" id="showMegaIndustries">
                    <label for="showMegaIndustries" class="mobile-item">Industries</label>
                    <div class="mega-box">
                        <div class="content">

                            <div class="row industry-row">
                                <header>Industries</header>
                                <ul class="mega-links industries">
                                    <div class="industry-child">
                                        <li><a href="./ondemand.php"> <span><i class="fa-solid fa-rainbow"></i></span> on demand </a></li>
                                        <li><a href="./heathcare.php"> <span><i class="fa-solid fa-notes-medical"></i></span> heathcare </a></li>
                                        <li><a href="./resturant.php"> <span><i class="fa-solid fa-utensils"></i></span> resturant</a></li>
                                        <li><a href="./entertainment.php"> <span><i class="fa-solid fa-video"></i></span> entertainment</a></li>
                                        <li><a href="./travel.php"> <span><i class="fa-solid fa-plane-departure"></i></span>travel</a></li>
                                        <li><a href="./oil&gas.php"> <span><i class="fa-solid fa-oil-well"></i></span>oil and gas</a></li>
                                    </div>
                                    <div class="industry-child">
                                        <li><a href="./telecom.php"> <span><i class="fa-solid fa-tower-cell"></i></span>telecom</a></li>
                                        <li><a href="./construction.php"> <span><i class="fa-solid fa-house"></i></span>construction</a></li>
                                        <li><a href="./ecommerce.php"> <span><i class="fa-solid fa-cart-shopping"></i></span>eCommerce</a></li>
                                        <li><a href="./saas.php"> <span><i class="fa-solid fa-cloud"></i></span>SaaS</a></li>

                                        <li><a href="./finance.php"> <span><i class="fa-solid fa-sack-dollar"></i></span>Finance</a></li>
                                    </div>
                                    <div class="industry-child">
                                        <li><a href="./social-networking.php"> <span><i class="fa-solid fa-thumbs-up"></i></span>Social Networking </a></li>
                                        <li><a href="./banking.php"> <span><i class="fa-solid fa-building-columns"></i></span>Banking</a></li>
                                        <li><a href="./insurance.php"> <span><i class="fa-solid fa-car-burst"></i></span>Insurance</a></li>
                                        <li><a href="./retail.php"> <span><i class="fa-solid fa-bag-shopping"></i></span>Retail</a></li>
                                        <li><a href="./real-estate.php"> <span><i class="fa-solid fa-gopuram"></i></span>Real Estate</a></li>
                                        <li><a href="./education.php"> <span><i class="fa-solid fa-graduation-cap"></i></span>Education</a></li>
                                    </div>
                                    <div class="industry-child">

                                        <li><a href="./news.php"> <span><i class="fa-regular fa-newspaper"></i></span>News</a></li>
                                        <li><a href="./logistics.php"> <span><i class="fa-solid fa-truck-fast"></i></span>Logistics</a></li>
                                        <li><a href="./agriculture.php"> <span><i class="fa-solid fa-wheat-awn"></i></span>Agriculture</a></li>

                                        <li><a href="./manufacturing.php"> <span><i class="fa-solid fa-industry"></i></span>Manufacturing</a></li>







                                </ul>
                            </div>

                        </div>
                    </div>
                </li>


                <li>
                    <a href="#" class="desktop-item">Offshore Experts</a>
                    <input type="checkbox" id="showMega">
                    <label for="showMega" class="mobile-item">Offshore Experts</label>
                    <div class="mega-box">
                        <div class="content">

                            <div class="row">
                                <header>Front-End Developer</header>
                                <ul class="mega-links">
                                    <li><a href="./html-developer.php"> <span><i class="fa-brands fa-html5"></i></span> HTML Developer </a></li>

                                    <li><a href="./javascript-developer.php"> <span><i class="fa-brands fa-js"></i></span> Javascript Developer </a></li>
                                    <li><a href="./angular-developer.php"> <span><i class="fa-brands fa-angular"></i></span> AngularJS Developer</a></li>
                                    <li><a href="./react-developer.php"> <span><i class="fa-brands fa-react"></i></span> ReactJS Developer</a></li>
                                    <li><a href="./vue-developer.php"> <span><i class="fa-brands fa-vuejs"></i></span> VueJS Developer</a></li>
                                </ul>
                            </div>
                            <div class="row">
                                <header>CMS</header>
                                <ul class="mega-links">
                                    <li><a href="./wordpress-developer.php"> <span><i class="fa-brands fa-wordpress"></i></span> WordPress</a></li>
                                    <li><a href="./drupal-developer.php"> <span><i class="fa-brands fa-drupal"></i></span> Drupal</a></li>
                                    <li><a href="./joomla-developer.php"> <span><i class="fa-solid fa-link-slash"></i></span> Joomla</a></li>

                                </ul>
                            </div>
                            <div class="row">
                                <header>Ecommerce</header>
                                <ul class="mega-links">
                                    <li><a href="./magneto-developer.php"> <span><i class="fa-solid fa-magnet"></i></span> Magento</a></li>
                                    <li><a href="./shopify-developer.php"> <span><i class="fa-brands fa-shopify"></i></span> Shopify</a></li>
                                    <li><a href="./prestashop-developer.php"> <span><i class="fa-solid fa-shop"></i></span> Prestashop</a></li>

                                </ul>
                            </div>
                            <div class="row">
                                <header>Web Developer</header>
                                <ul class="mega-links">
                                    <li><a href="./php-developer.php"> <span><i class="fa-brands fa-php"></i></span> PHP</a></li>
                                    <li><a href="./codeigniter-developer.php"> <span><i class="fa-solid fa-fire"></i></span> Codeigniter</a></li>

                                    <li><a href="./laravel-developer.php"> <span><i class="fa-brands fa-laravel"></i></span> Laravel</a></li>

                                    <li><a href="./nodejs-developer.php"> <span><i class="fa-brands fa-node-js"></i></span> NodeJS</a></li>
                                    <li><a href="./web-developer.php"> <span><i class="fa-solid fa-code"></i></span> Web Developer</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>


                <li>
                    <a href="#" class="desktop-item">Our Expertise</a>
                    <input type="checkbox" id="showMegaExpertise">
                    <label for="showMegaExpertise" class="mobile-item">Our Expertise</label>
                    <div class="mega-box">
                        <div class="content">

                            <div class="row">
                                <header>Front End </header>
                                <ul class="mega-links">
                                    <li><a href="./frontend-development.php"> <span><i class="fa-brands fa-html5"></i></span>Frontend Development </a></li>
                                    <li><a href="./angular.php"> <span><i class="fa-brands fa-js"></i></span> Angular.js </a></li>
                                    <li><a href="./react.php"> <span><i class="fa-brands fa-angular"></i></span> React.js</a></li>
                                    <li><a href="./javascript.php"> <span><i class="fa-brands fa-angular"></i></span> JavaScript</a></li>
                                    <li><a href="./vue.php"> <span><i class="fa-brands fa-vuejs"></i></span> Vue.js</a></li>
                                </ul>
                                <header>CMS and Migration Service</header>
                                <ul class="mega-links">
                                    <li><a href="./wordpress.php"> <span><i class="fa-brands fa-wordpress"></i></span> WordPress</a></li>
                                    <li><a href="./drupal.php"> <span><i class="fa-brands fa-drupal"></i></span> Drupal</a></li>
                                    <li><a href="./joomla.php"> <span><i class="fa-brands fa-drupal"></i></span> Joomla</a></li>

                                </ul>
                            </div>


                            <div class="row">
                                <header>Web Developer</header>
                                <ul class="mega-links web-dev-experts">
                                    <div class="web-dev-links">
                                        <li><a href="./php.php"> <span><i class="fa-solid fa-shop"></i></span> PHP</a></li>
                                        <li><a href="./codeigniter.php"> <span><i class="fa-solid fa-fire"></i></span> Codeigniter</a></li>

                                        <li><a href="./laravel.php"> <span><i class="fa-solid fa-c"></i></span> Laravel</a></li>

                                        <li><a href="./nodejs.php"> <span><i class="fa-brands fa-node-js"></i></span> NodeJS</a></li>

                                        <li><a href="./pwa.php"> <span><i class="fa-brands fa-square-web-awesome"></i></span> PWA</a></li>
                                        <li><a href="./jquery.php"> <span><i class="fa-brands fa-square-web-awesome"></i></span> jquery</a></li>
                                        <li><a href="./python.php"> <span><i class="fa-brands fa-square-web-awesome"></i></span> Python</a></li>
                                        <li><a href="./mern-stack.php"> <span><i class="fa-brands fa-square-web-awesome"></i></span> MERN Stack</a></li>
                                        <li><a href="./mean-stack.php"> <span><i class="fa-brands fa-square-web-awesome"></i></span> MEAN Stack</a></li>
                                    </div>

                                </ul>
                            </div>
                            <div class="row">
                                <header>Ecommerce</header>
                                <ul class="mega-links">
                                    <li><a href="./magneto.php"> <span><i class="fa-solid fa-magnet"></i></span> Magento</a></li>
                                    <li><a href="./shopify.php"> <span><i class="fa-solid fa-magnet"></i></span> Shopify</a></li>
                                    <li><a href="./prestashop.php"> <span><i class="fa-solid fa-shop"></i></span> Prestashop</a></li>








                                </ul>
                            </div>
                        </div>
                    </div>
                </li>


                <li><a href="./blog.php" class=" <?php echo ($current_page == 'blog.php') ? 'current' : ''; ?>">blog</a></li>
                <li><a href="./contact.php" class="contact">contact us</a></li>

            </ul>
            <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
        </div>
    </nav>



</body>

</html>