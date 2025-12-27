<?php

// Theme Support
function the_brand_theme_support(){
    // For title
    add_theme_support('title-tag');

    // For theme
    add_theme_support('post-thumbnails', ['post', 'the_branding_product',]);

}
add_action('after_setup_theme', 'the_brand_theme_support');