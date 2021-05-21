<?php
get_header();
?>

<main class="singleArticle">
    <?php
        if(have_posts()) {
            while(have_posts()) {
                the_post();
                ?>
                <h1 class="sectionHeader">
                    <?php echo the_title(); ?>
                </h1>
                <div class="singleArticleImgWrapper">
                    <img class="singleArticleImg" src="<?php echo get_field('zdjecie'); ?>"
                </div>
                <div class="singleContent">
                    <?php echo the_content(); ?>
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
