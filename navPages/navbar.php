<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hamburger Menu</title>
    <link rel="stylesheet" href="../assests/css/navbar.css" />
    <link rel="stylesheet" href="../assests/css/theme.css">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
</head>

<body>
    <?php

    $current_page = basename($_SERVER['PHP_SELF']);
    ?>
    <header>
        <nav>

            <ul class="nav-bar">
                <div class="logo-wrapper">
                    <li class="logo">
                        <a href="../navPages/index.php"><img src="../images/salesforce2.jpg" alt=""></a>
                    </li>
                    <li class="logo-text">
                        <a href="../navPages/index.php">BY TEKALGO TECkNOLOGIES</a>
                    </li>

                </div>

                <input type="checkbox" id="check" />
                <span class="menu">
                    <li>
                        <a
                            href="../navPages/index.php"
                            class="nav-link <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">Home</a>
                    </li>
                    <li>
                        <a
                            href="../navPages/about.php"
                            class="nav-link <?php echo ($current_page == 'about.php') ? 'active' : ''; ?>">About</a>
                    </li>
                    <li class="dropdown">
                        <a href="../navPages/services.php"
                            class="nav-link <?php echo ($current_page == 'services.php') ? 'active' : ''; ?>">Services
                            <!-- <img src="../images/down-chevron_9144316.png" alt="dropdown" class="dropdown-icon"> -->
                            <picture>
                                <source media="(max-width: 960px)" srcset="../images/dropdown-white.svg">
                                <img src="../images/dropdown.svg" alt="dropdown" class="dropdown-icon">
                            </picture>
                        </a>
                        <!-- Dropdown Menu -->
                        <ul class="dropdown-menu">
                            <li><a href="../servicePages/sales-cloud.php">Salesforce Sales Cloud</a></li>
                            <li><a href="../servicePages/service-cloud.php">Salesforce Service Cloud</a></li>
                            <li><a href="../servicePages/marketing-cloud.php">Salesforce Marketing Cloud</a></li>
                            <li><a href="../servicePages/commerce-cloud.php">Salesforce Commerce Cloud</a></li>
                            <li><a href="../servicePages/experience-cloud.php">Salesforce Experience Cloud</a></li>
                            <li><a href="../servicePages/financial-cloud.php">Salesforce Financial Cloud</a></li>
                            <li><a href="../servicePages/community-cloud.php">Salesforce Community Cloud</a></li>
                            <li><a href="../servicePages/healthcare-cloud.php">Salesforce Healthcare Cloud</a></li>
                            <li><a href="../servicePages/education-cloud.php">Salesforce Education Cloud</a></li>
                            <li><a href="../servicePages/public-cloud.php">Salesforce Public Cloud</a></li>
                            <li><a href="../servicePages/analytic-cloud.php">Salesforce Analytic Cloud</a></li>


                        </ul>
                    </li>

                    <li>
                        <a
                            href="../navPages/contact.php"
                            class="nav-link <?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>">Contact</a>
                    </li>
                    <li>
                        <a
                            href="../navPages/blog.php"
                            class="nav-link <?php echo ($current_page == 'blog.php') ? 'active' : ''; ?>">Blog</a>
                    </li>
                    <li>
                        <a
                            href="../navPages/success.php"
                            class="nav-link <?php echo ($current_page == 'success.php') ? 'active' : ''; ?>">Success</a>
                    </li>
                    <label for="check" class="close-menu"><i class="fas fa-times"></i></label>
                </span>
                <label for="check" class="open-menu"><i class="fas fa-bars"></i></label>
            </ul>
        </nav>


    </header>

</body>

</html>