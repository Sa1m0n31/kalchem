<?php
get_header();
?>

<!-- AKTUALNOSCI -->
<main class="aktualnosciPage">
    <h1 class="sectionHeader">
        Wiadomości
    </h1>

    <div class="wiadomosciPageInner">
    <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 10,
            'category_name' => 'Uncategorized'
        );

        $q = new WP_Query($args);

        if($q->have_posts()) {
            while($q->have_posts()) {
                $q->the_post(); ?>

                <div class="aktualnosciItem">
                    <h2 class="aktualnosciItemHeader">
                        <a href="<?php the_permalink(); ?>">
                            <?php echo the_title(); ?>
                        </a>
                    </h2>
                    <h3 class="aktualnosciItemDate">
                        <?php echo the_date(); ?>
                    </h3>

                    <p class="aktualnosciItemExcerpt">
                        <?php echo get_the_excerpt(); ?>
                    </p>

                    <button class="aktualnosciItemButton">
                        <a href="<?php the_permalink(); ?>">
                            Więcej
                            <img class="aktualnosciItemButtonImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/thin_long_02_right.svg'; ?>" alt="wiecej" />
                        </a>
                    </button>
                </div>

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
