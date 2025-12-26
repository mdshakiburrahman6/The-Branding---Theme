<?php
/* Template Name: Main Theme index file */
?>

<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>
    <div class="main-area">
        <header>
            <section class="header-area font-primary">
                <div class="logo-area"> 
                    <p class="logo"><a href="#">The-Branding</a></p>
                    <p class="text">The world's best branding mockups and resources in one place.</p>
                </div>
                <div class="category-area">
                    <ul>
                        <li><a href="#">category</a></li>
                        <li><a href="#">category</a></li>
                        <li><a href="#">category</a></li>
                        <li><a href="#">category</a></li>
                        <li><a href="#">category</a></li>
                    </ul>
                </div>
                <div class="menu-area">
                    <div class="nav" id="nav">
                        <?php 
                            wp_nav_menu(array(
                                'theme_location' => 'main_menu',
                                'menu_id' => 'nav',
                            ));
                        ?>
                    </div>
                </div>
                <div class="social-area">
                    <ul>
                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </section>
        </header>