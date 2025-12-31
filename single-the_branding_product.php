<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php
// ==============================
// META DATA
// ==============================
$year   = get_post_meta(get_the_ID(), '_product_year', true);
$brand  = get_post_meta(get_the_ID(), '_product_brand', true);
$mockup = get_post_meta(get_the_ID(), '_product_mockup', true);

// Featured Image
$featured_id = get_post_thumbnail_id(get_the_ID());

// Custom Gallery
$gallery = get_post_meta(get_the_ID(), '_branding_gallery', true);
$gallery = is_array($gallery) ? $gallery : [];

// ==============================
// FINAL IMAGE ARRAY
// Featured image first (like product)
// ==============================
$images = [];

if ($featured_id) {
    $images[] = $featured_id;
}

foreach ($gallery as $img_id) {
    if ($img_id != $featured_id) {
        $images[] = $img_id;
    }
}
?>

<main class="tb-single">

    <section class="tb-container">

        <!-- =========================
             PRODUCT GALLERY
        ========================== -->
        <div class="tb-gallery">

            <!-- Thumbnails -->
            <div class="tb-thumbs">
                <?php foreach ($images as $i => $image_id) : ?>
                    <img
                        src="<?php echo esc_url(wp_get_attachment_image_url($image_id, 'thumbnail')); ?>"
                        data-full="<?php echo esc_url(wp_get_attachment_image_url($image_id, 'large')); ?>"
                        class="tb-thumb <?php echo $i === 0 ? 'active' : ''; ?>"
                    >

                <?php endforeach; ?>
            </div>

            <!-- Main Image -->
            <div class="tb-main-image">
                <?php if (!empty($images)) : ?>
                    <?php echo wp_get_attachment_image(
                        $images[0],
                        'large',
                        false,
                        [
                            'class' => 'tb-main-img',
                            'id'    => 'tbMainImage'
                        ]
                    ); ?>
                <?php endif; ?>
            </div>


        </div>

        <!-- =========================
             PRODUCT INFO
        ========================== -->
        <div class="tb-info">

            <h1 class="tb-title"><?php the_title(); ?></h1>

            <div class="tb-desc">
                <?php the_content(); ?>
            </div>

            <?php if ($brand) : ?>
                <p><strong>Branding By:</strong> <?php echo esc_html($brand); ?></p>
            <?php endif; ?>

            <?php if ($mockup) : ?>
                <p><strong>Mockups By:</strong> <?php echo esc_html($mockup); ?></p>
            <?php endif; ?>

            <?php if ($year) : ?>
                <p><strong>Year:</strong> <?php echo esc_html($year); ?></p>
            <?php endif; ?>

            <a href="#" class="tb-download-btn">Download Mockups</a>

        </div>

    </section>

</main>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
