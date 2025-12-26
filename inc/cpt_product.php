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


// 2. Add Custom Meta Filed
function add_fields_for_the_branding_product(){
    add_meta_box(
        'the_branding_product_id',
        'More About Product',
        'the_branding_product_meta_callback',
        'the_branding_product',
        'normal',
        'low',
    );

}
add_action('add_meta_boxes', 'add_fields_for_the_branding_product');


// 3. Callback Function 
function the_branding_product_meta_callback($post){

    wp_nonce_field('the_branding_product_nonce', 'the_branding_product_nonce_field');

    $product_brand = get_post_meta($post->ID, '_product_brand', true);
    $product_mockup = get_post_meta($post->ID, '_product_mockup', true);

    ?>
        <div class="admin_product_more" style="display: flex; gap:20px">
            <div class="admin_product_brand" style="width:50%">
                <label for="product_brand" style="font-family: 'Inter', sans-serif;">Branding By</label>
                <input type="text" name="product_brand" value="<?php echo esc_attr( $product_brand ); ?>" id="product_brand" placeholder="Brand Name" style="width:100%;  margin-top:5px">
            </div>

            <div class="admin_product_mockup" style="width:50%">
                <label for="product_mockup" style="font-family: 'Inter', sans-serif;">Mockup By</label>
                <input type="text" name="product_mockup" value="<?php echo esc_attr( $product_mockup ); ?>" id="product_mockup" placeholder="Mockup designer name" style="width:100%; margin-top:5px">
            </div>
        </div>
    <?php

}


// 4. Save Meta
function the_branding_meta_save($post_id){
    
    //a. Chech exists nonch
    if(!isset($_POST['the_branding_product_nonce_field']) && !wp_verify_nonce($_POST['the_branding_product_nonce_field'], 'the_branding_product_nonce')) return;
    
    //b. Prevent autosave
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    //c. Check user permission
    if(!current_user_can('edit_post', $post_id)) return;

    //d. Save Meta
    if(isset($_POST['product_brand'])){
        update_post_meta($post_id, '_product_brand', sanitize_text_field( $_POST['product_brand'] )) ;
    }
    if(isset($_POST['product_mockup'])){
        update_post_meta($post_id, '_product_mockup', sanitize_text_field( $_POST['product_mockup'] )) ;
    }
}   
add_action('save_post', 'the_branding_meta_save');
