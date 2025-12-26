<?php
/* Template Name: for theme all Enqueues */

function the_branding_enqueues(){

    /* ===========
         CSS
    ============*/ 

    // Enqueue Default Css
    wp_enqueue_style('the_branding_default', get_stylesheet_uri(), array(), '1.0.0', 'all');

    // Custom CSS
    wp_register_style('the_branding_custom', get_template_directory_uri() . '/assets/css/custom.css',  array(), '1.0.0', 'all');
    wp_enqueue_style('the_branding_custom');

    // Bootstrap CSS
    wp_register_style('the_branding_bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css');
    wp_enqueue_style('the_branding_bootstrap');


    /* ===========
          JS
    ============*/ 


    // Default JQuerry
    wp_enqueue_script('jquery');

    // Main JS
    wp_register_script('the_branding_main', get_template_directory_uri() . '/assets/js/main.js');
    wp_enqueue_script('the_branding_main');

    // Bootstrap JS
    wp_register_script('the_branding_bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js');
    wp_enqueue_script('the_branding_bootstrap');
    
    
    /* ====================
    Fonts && Icons     
    =====================*/ 
    wp_register_style('the_branding_icons', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css');
    wp_enqueue_style('the_branding_icons');

    wp_register_script('the_branding_icons', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/js/all.min.js');
    wp_enqueue_script('the_branding_icons');

}
add_action('wp_enqueue_scripts', 'the_branding_enqueues');