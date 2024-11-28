<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<nav id="navbar">
    <div class="wrapper">
        <div class="logo"><a href="/webdev/home">TekAlgo</a></div>
        <input type="radio" name="slider" id="menu-btn">
        <input type="radio" name="slider" id="close-btn">
        <ul class="nav-links">
            <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
            <li><a href="/webdev/home" class=" <?php echo ($current_page == 'home.php') ? 'current' : ''; ?>">Home</a></li>
            <li><a href="/webdev/services" class=" <?php echo ($current_page == 'services.php') ? 'current' : ''; ?>">Services</a></li>

            <li>
                <a href="#" class="desktop-item">Industries</a>
                <input type="checkbox" id="showMegaIndustries">
                <label for="showMegaIndustries" class="mobile-item">Industries</label>
                <div class="mega-box">
                    <div class="content">

                        <div class="row industry-row" id="industry">
                            <header>Industries</header>
                            <ul class="mega-links industries">
                                <div class="industry-child">
                                    <li><a href="/webdev/ondemand"> <span><i class="fa-solid fa-rainbow"></i></span> on demand </a></li>
                                    <li><a href="/webdev/heathcare"> <span><i class="fa-solid fa-notes-medical"></i></span> heathcare </a></li>
                                    <li><a href="/webdev/resturant"> <span><i class="fa-solid fa-utensils"></i></span> resturant</a></li>
                                    <li><a href="/webdev/entertainment"> <span><i class="fa-solid fa-video"></i></span> entertainment</a></li>
                                    <li><a href="/webdev/travel"> <span><i class="fa-solid fa-plane-departure"></i></span>travel</a></li>
                                    <li><a href="/webdev/oil&gas"> <span><i class="fa-solid fa-oil-well"></i></span>oil and gas</a></li>
                                </div>
                                <div class="industry-child">
                                    <li><a href="/webdev/telecom"> <span><i class="fa-solid fa-tower-cell"></i></span>telecom</a></li>
                                    <li><a href="/webdev/construction"> <span><i class="fa-solid fa-house"></i></span>construction</a></li>
                                    <li><a href="/webdev/ecommerce"> <span><i class="fa-solid fa-cart-shopping"></i></span>eCommerce</a></li>
                                    <li><a href="/webdev/saas"> <span><i class="fa-solid fa-cloud"></i></span>SaaS</a></li>

                                    <li><a href="/webdev/finance"> <span><i class="fa-solid fa-sack-dollar"></i></span>Finance</a></li>
                                </div>
                                <div class="industry-child">
                                    <li><a href="/webdev/social-networking"> <span><i class="fa-solid fa-thumbs-up"></i></span>Social Networking </a></li>
                                    <li><a href="/webdev/banking"> <span><i class="fa-solid fa-building-columns"></i></span>Banking</a></li>
                                    <li><a href="/webdev/insurance"> <span><i class="fa-solid fa-car-burst"></i></span>Insurance</a></li>
                                    <li><a href="/webdev/retail"> <span><i class="fa-solid fa-bag-shopping"></i></span>Retail</a></li>
                                    <li><a href="/webdev/real-estate"> <span><i class="fa-solid fa-gopuram"></i></span>Real Estate</a></li>
                                    <li><a href="/webdev/education"> <span><i class="fa-solid fa-graduation-cap"></i></span>Education</a></li>
                                </div>
                                <div class="industry-child">

                                    <li><a href="/webdev/news"> <span><i class="fa-regular fa-newspaper"></i></span>News</a></li>
                                    <li><a href="/webdev/logistics"> <span><i class="fa-solid fa-truck-fast"></i></span>Logistics</a></li>
                                    <li><a href="/webdev/agriculture"> <span><i class="fa-solid fa-wheat-awn"></i></span>Agriculture</a></li>

                                    <li><a href="/webdev/manufacturing"> <span><i class="fa-solid fa-industry"></i></span>Manufacturing</a></li>







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
                                <li><a href="/webdev/html-developer"> <span><i class="fa-brands fa-html5"></i></span> HTML Developer </a></li>

                                <li><a href="/webdev/javascript-developer"> <span><i class="fa-brands fa-js"></i></span> Javascript Developer </a></li>
                                <li><a href="/webdev/angular-developer"> <span><i class="fa-brands fa-angular"></i></span> AngularJS Developer</a></li>
                                <li><a href="/webdev/react-developer"> <span><i class="fa-brands fa-react"></i></span> ReactJS Developer</a></li>
                                <li><a href="/webdev/vue-developer"> <span><i class="fa-brands fa-vuejs"></i></span> VueJS Developer</a></li>
                            </ul>
                        </div>
                        <div class="row">
                            <header>CMS</header>
                            <ul class="mega-links">
                                <li><a href="/webdev/wordpress-developer"> <span><i class="fa-brands fa-wordpress"></i></span> WordPress</a></li>
                                <li><a href="/webdev/drupal-developer"> <span><i class="fa-brands fa-drupal"></i></span> Drupal</a></li>
                                <li><a href="/webdev/joomla-developer"> <span><i class="fa-solid fa-link-slash"></i></span> Joomla</a></li>

                            </ul>
                        </div>
                        <div class="row">
                            <header>Ecommerce</header>
                            <ul class="mega-links">
                                <li><a href="/webdev/magneto-developer"> <span><i class="fa-solid fa-magnet"></i></span> Magneto</a></li>
                                <li><a href="/webdev/shopify-developer"> <span><i class="fa-brands fa-shopify"></i></span> Shopify</a></li>
                                <li><a href="/webdev/prestashop-developer"> <span><i class="fa-solid fa-shop"></i></span> Prestashop</a></li>

                            </ul>
                        </div>
                        <div class="row">
                            <header>Web Developer</header>
                            <ul class="mega-links">
                                <li><a href="/webdev/php-developer"> <span><i class="fa-brands fa-php"></i></span> PHP</a></li>
                                <li><a href="/webdev/codeigniter-developer"> <span><i class="fa-solid fa-fire"></i></span> Codeigniter</a></li>

                                <li><a href="/webdev/laravel-developer"> <span><i class="fa-brands fa-laravel"></i></span> Laravel</a></li>

                                <li><a href="/webdev/nodejs-developer"> <span><i class="fa-brands fa-node-js"></i></span> NodeJS</a></li>
                                <li><a href="/webdev/web-developer"> <span><i class="fa-solid fa-code"></i></span> Web Developer</a></li>
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
                                <li><a href="/webdev/frontend-development"> <span><i class="fa-brands fa-html5"></i></span>Frontend Development </a></li>
                                <li><a href="/webdev/angular"> <span><i class="fa-brands fa-js"></i></span> Angular.js </a></li>
                                <li><a href="/webdev/react"> <span><i class="fa-brands fa-angular"></i></span> React.js</a></li>
                                <li><a href="/webdev/javascript"> <span><i class="fa-brands fa-angular"></i></span> JavaScript</a></li>
                                <li><a href="/webdev/vue"> <span><i class="fa-brands fa-vuejs"></i></span> Vue.js</a></li>
                            </ul>
                            <header>CMS and Migration Service</header>
                            <ul class="mega-links">
                                <li><a href="/webdev/wordpress"> <span><i class="fa-brands fa-wordpress"></i></span> WordPress</a></li>
                                <li><a href="/webdev/drupal"> <span><i class="fa-brands fa-drupal"></i></span> Drupal</a></li>
                                <li><a href="/webdev/joomla"> <span><i class="fa-brands fa-drupal"></i></span> Joomla</a></li>

                            </ul>
                        </div>


                        <div class="row">
                            <header>Web Developer</header>
                            <ul class="mega-links web-dev-experts">
                                <div class="web-dev-links">
                                    <li><a href="/webdev/php"> <span><i class="fa-solid fa-shop"></i></span> PHP</a></li>
                                    <li><a href="/webdev/codeigniter"> <span><i class="fa-solid fa-fire"></i></span> Codeigniter</a></li>

                                    <li><a href="/webdev/laravel"> <span><i class="fa-solid fa-c"></i></span> Laravel</a></li>

                                    <li><a href="/webdev/nodejs"> <span><i class="fa-brands fa-node-js"></i></span> NodeJS</a></li>

                                    <li><a href="/webdev/pwa"> <span><i class="fa-brands fa-square-web-awesome"></i></span> PWA</a></li>
                                    <li><a href="/webdev/jquery"> <span><i class="fa-brands fa-square-web-awesome"></i></span> jquery</a></li>
                                    <li><a href="/webdev/python"> <span><i class="fa-brands fa-square-web-awesome"></i></span> Python</a></li>
                                    <li><a href="/webdev/mern-stack"> <span><i class="fa-brands fa-square-web-awesome"></i></span> MERN Stack</a></li>
                                    <li><a href="/webdev/mean-stack"> <span><i class="fa-brands fa-square-web-awesome"></i></span> MEAN Stack</a></li>
                                </div>

                            </ul>
                        </div>
                        <div class="row">
                            <header>Ecommerce</header>
                            <ul class="mega-links">
                                <li><a href="/webdev/magneto"> <span><i class="fa-solid fa-magnet"></i></span> Magento</a></li>
                                <li><a href="/webdev/shopify"> <span><i class="fa-solid fa-magnet"></i></span> Shopify</a></li>
                                <li><a href="/webdev/prestashop"> <span><i class="fa-solid fa-shop"></i></span> Prestashop</a></li>








                            </ul>
                        </div>
                    </div>
                </div>
            </li>


            <li><a href="/webdev/blog" class=" <?php echo ($current_page == 'blog.php') ? 'current' : ''; ?>">blog</a></li>
            <li><a href="/webdev/contact" class="contact">contact us</a></li>

        </ul>
        <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
    </div>
</nav>