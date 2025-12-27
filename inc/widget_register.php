<?php
// Theme widget 

function the_branding_widget(){
    register_sidebar( array(
        'name' => __('Header Category', 'srs_the_branding'),
        'id'   => 'blog_sidebar_1',
        'description' => __('You can change the sidebar area from here', 'srs_the_branding'),
        'before_widget' => '<div class="child_sidebar">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="sidebar_title">',
        'after_title' => '</h4>',
    ) );
}
add_action('widgets_init', 'the_branding_widget');