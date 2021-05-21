<?php
get_header();
?>

<main class="singleDostawca">
    <?php
        if(have_posts()) {
            while(have_posts()) {
                the_post();
                ?>
                <h1 class="sectionHeader">
                    <?php echo the_title(); ?>
                </h1>
                <div class="singleContent">
                    <?php echo get_field('opis') ?>
                </div>
    <?php
            }
            wp_reset_postdata();
        }
    ?>
</main>

<?php
get_footer();
?>
