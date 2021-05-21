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
                <?php
                    $post_id = get_the_ID(); // or use the post id if you already have it
                    $category_object = get_the_category($post_id);
                    $category_name = $category_object[0]->name;

                    if($category_name != 'Galeria') {
                        ?>
                        <div class="singleArticleImgWrapper">
                            <img class="singleArticleImg" src="<?php echo get_field('zdjecie_wpisu'); ?>"
                        </div>
                            <?php
                    }
                ?>
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
