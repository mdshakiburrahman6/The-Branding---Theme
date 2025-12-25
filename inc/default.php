<?php
/* Template Name: Theme deafult file */

// Theme Support
function the_brand_theme_support(){
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'the_brand_theme_support');