<?php

// Theme header

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>
    <div class="main-area" id="fuck">
        <header>
            <!-- Desktop Header -->
            <div class="desktop-header">
                <section class="header-area font-primary">
                    <div class="logo-area"> 
                        <p class="logo"><a href="<?php echo esc_url(home_url()); ?>"><?php echo get_theme_mod('the_branding_logo'); ?></a></p>
                        <p class="text"><?php echo get_theme_mod('the_branding_desc') ?></p>
                    </div>
                    <div class="category-area">
                        <ul>
                            <?php 
                                $terms = get_terms(array(
                                    'taxonomy' => 'product_category',
                                    'hide_empty' => true,
                                ));

                                if(!empty($terms) && !is_wp_error($terms)){
                                    foreach ($terms as $term){
                                        ?>
                                            <li><a href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo esc_html( $term->name ); ?></a></li>
                                        <?php
                                    }
                                }
                            ?>
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
                        <?php 
                            wp_nav_menu(array(
                                'theme_location' => 'social_menu',
                                'menu_id' => 'social-menu'
                            ));
                        ?>
                    </div>
                </section>
            </div>

            <!-- Mobile Header -->
            <div class="mobile-header">
                <nav class="navbar bg-light fixed-top">
                    <div class="container-fluid">
                        <div class="logo-area"> 
                            <p class="logo"><a href="<?php echo esc_url(home_url()); ?>"><?php echo get_theme_mod('the_branding_logo'); ?></a></p>
                        </div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <div class="logo-area"> 
                                <p class="logo"><a href="<?php echo esc_url(home_url()); ?>"><?php echo get_theme_mod('the_branding_logo'); ?></a></p>
                                <p class="text"><?php echo get_theme_mod('the_branding_desc') ?></p>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
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
                            <!-- Category -->
                             <div class="category-area">
                                <ul>
                                    <?php 
                                        $terms = get_terms(array(
                                            'taxonomy' => 'product_category',
                                            'hide_empty' => true,
                                        ));

                                        if(!empty($terms) && !is_wp_error($terms)){
                                            foreach ($terms as $term){
                                                ?>
                                                    <li><a href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo esc_html( $term->name ); ?></a></li>
                                                <?php
                                            }
                                        }
                                    ?>
                                </ul>
                            </div>

                            <!-- Social Link -->
                             <div class="social-area">
                                <?php 
                                    wp_nav_menu(array(
                                        'theme_location' => 'social_menu',
                                        'menu_id' => 'social-menu'
                                    ));
                                ?>
                            </div>
                        </div>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- Botstrap Offcanvas -->
             
                        </header>