<?php
/* Template Name: Theme Header Customizer */

// Menu Register
function the_branding_menu(){
    register_nav_menus(array(
        'main_menu' => __('Primary Menu', 'srs_the_branding'),
        'social_menu' => __('Social Menu', 'srs_the_branding'),
    ));
}
add_action('after_setup_theme', 'the_branding_menu');

function the_branding_header_customizer($wp_customizer){
    // Logo
    $wp_customizer->add_section('the_branding_header', array(
        'title' => 'Header',
        'description' => 'You can change the style of "The Branding" theme header',
    ));
    $wp_customizer->add_setting('the_branding_logo', array(
        'default' => 'The-Branding',
    ));
    $wp_customizer->add_control('the_branding_logo', array(
        'label' => 'Header Logo',
        // 'description' => 'You can change the logo form here.',
        'section' => 'the_branding_header',
        'setting' => 'the_branding_logo',
        'type' => 'text',
    )); 

    // Description
    $wp_customizer->add_setting('the_branding_desc', array(
        'default' => "The world's best branding mockups and resources in one place.",
    ));
    $wp_customizer->add_control('the_branding_desc', array(
        'label' => 'Header Description',
        // 'description' => 'You can change the description form here.',
        'section' => 'the_branding_header',
        'setting' => 'the_branding_desc',
        'type' => 'text',
    )); 

    // Social

}
add_action('customize_register', 'the_branding_header_customizer');
