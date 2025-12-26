<?php
/* Template Name: Product CPT */

// 1. Register CPT- Product
function the_branding_cpt_product(){
    $labels = array(
        'name'          => __('Products', 'srs_the_branding'),
        'singular_name' => __('Product', 'srs_the_branding'),
        'menu_name'     => __('Products', 'srs_the_branding'),
        'add_new_item'  => __('Add New Product', 'srs_the_branding'),
        'edit_item'     => __('Edit Product', 'srs_the_branding'),
        'not_found'     => __('No products found', 'srs_the_branding'),
    );

    $args = array(
        'labels'             => $labels,
        'menu_icon'          => 'dashicons-cart',
        'public'             => true,
        'publicly_queryable' => true,
        'has_archive'        => true,
        'hierarchical'       => false,
        'show_ui'            => true,
        'exclude_from_search'=> false,
        'rewrite'            => array('slug' => 'products'),
        'supports'           => array('title', 'editor', 'thumbnail'),
    );
    register_post_type('the_branding_product', $args);
}
add_action('init', 'the_branding_cpt_product');


