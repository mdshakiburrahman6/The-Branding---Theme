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
                        <!-- <li><a href="#">category</a></li>
                        <li><a href="#">category</a></li>
                        <li><a href="#">category</a></li>
                        <li><a href="#">category</a></li> -->
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
        </header>