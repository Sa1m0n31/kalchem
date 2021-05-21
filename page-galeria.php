<?php get_header(); ?>

<!-- AKTUALNOSCI -->
<main class="galeriaPage">
    <h1 class="sectionHeader">
        Galeria
    </h1>

    <div class="maszynyInner aktualnosciPageInner galeriaPageInner">
        <?php
            $args = array(
                    'category_name' => 'Galeria'
            );

            $q = new WP_Query($args);

            if($q->have_posts()) {
                while($q->have_posts()) {
                    $q->the_post();
                    ?>

                    <a class="galeriaItem" href="<?php the_permalink(); ?>">
                        <span class="galeriaOverlay"></span>
                        <h2 class="galeriaTitle"><?php echo the_title(); ?></h2>
                        <img class="galeriaThumbnail" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo the_title(); ?>" />
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