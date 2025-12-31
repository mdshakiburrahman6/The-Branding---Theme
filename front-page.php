<?php
    get_header();
?>

<main>
    <section class="content-area">
        <div class="products">

            <?php
            
            $products = new WP_Query([
                'post_type'      => 'the_branding_product',
                'posts_per_page' => -1, // ALL posts
                'post_status'    => 'publish',
            ]);

             if ($products->have_posts()) :
                while ($products->have_posts()) :
                    $products->the_post();

                    $year   = get_post_meta(get_the_ID(), '_product_year', true);
                    $brand  = get_post_meta(get_the_ID(), '_product_brand', true);
                    $mockup = get_post_meta(get_the_ID(), '_product_mockup', true);

                ?>
                
                <!-- Show Products -->
                <div class="product-card">
                    <div class="product-img">
                        <?php if(has_post_thumbnail()): ?>
                            <a href="<?php echo the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                        <?php endif ?>
                    </div>
                    <div class="product-details">
                        <h4 class="product-title"><?php the_title(); ?></h4>
                        <p class="product-year"><?php echo esc_html($year); ?></p>
                    </div>
                </div>
            <?php 
                    endwhile;
                else :
                    echo '<p>No products found.</p>';
                endif;
            ?>    
        </div>
    </section>
</main>

<?php
    get_footer();
?>