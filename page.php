<?php
get_header();
?>

<main class="aktualnosciPage">
    <h1 class="sectionHeader">
        <?php echo the_title(); ?>
    </h1>

    <div class="maszynyClaasInner">
        <?php
            $args = array(
                    'post_type' => 'Claas',
                    'meta_key' => 'Kategoria',
                    'meta_value' => get_the_title()
            );
            $q = new WP_Query($args);

            if($q->have_posts()) {
                while($q->have_posts()) {
                    $q->the_post(); ?>

                    <a class="maszynyClaasItem" href="<?php echo get_field('link'); ?>">
                        <div class="maszynyOverlay">
                            <img class="maszynyOverlayImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/plus.png'; ?>" alt="plus" />
                        </div>
                        <img class="maszynyClaasItemImg" src="<?php echo get_field('zdjecie'); ?>" alt="maszyny-claas" />
                        <h2 class="maszynyClaasItemHeader">
                            <?php echo the_title(); ?>
                        </h2>
                    </a>

                        <?php
                }
                wp_reset_postdata();
            }

        ?>
    </div>

</main>

<?php
get_footer();
?>