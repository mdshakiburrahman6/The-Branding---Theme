<?php
/* Template Name: Theme Header Customizer */

// Menu Register
function the_branding_menu(){
    register_nav_menu('main_menu', __('Primary Menu', 'srs_the_branding'));
}
add_action('after_setup_theme', 'the_branding_menu');

function the_branding_header_customizer(){
    // Logo
}
add_action('customize_register', 'the_branding_header_customizer');