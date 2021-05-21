<?php
get_header();
?>
<div class="searchContainer">
    <h1 class="sectionHeader">
        Wyniki wyszukiwania
    </h1>
    <div class="wiadomosciPageInner">
<?php
if(have_posts()) {
    while(have_posts()) {
        the_post(); ?>
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
}
?>
    </div>
</div>

<?php
get_footer();
?>