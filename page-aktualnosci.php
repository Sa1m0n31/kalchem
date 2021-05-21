<?php get_header(); ?>

<!-- AKTUALNOSCI -->
<main class="aktualnosciPage">
    <h1 class="sectionHeader">
        Aktualności
    </h1>

    <div class="maszynyInner aktualnosciPageInner">
        <a class="maszynyInnerItem" href="<?php echo get_page_link(get_page_by_title('Wiadomości')->ID); ?>">
            <div class="maszynyOverlay">
                <div class="maszynyOverlayText">
                    <img class="maszynyOverlayImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/plus.png'; ?>" alt="plus" />
                </div>
            </div>
            <img class="maszynyInnerItemImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/aktualnosci.png'; ?>" alt="aktualnosci" />
            <h3 class="maszynyInnerItemHeader">
                Wiadomości
            </h3>
        </a>

        <a class="maszynyInnerItem" href="<?php echo get_page_link(get_page_by_title('Galeria')->ID); ?>">
            <div class="maszynyOverlay">
                <div class="maszynyOverlayText">
                    <img class="maszynyOverlayImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/plus.png'; ?>" alt="plus" />
                </div>
            </div>
            <img class="maszynyInnerItemImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/galeria.png'; ?>" alt="galeria" />
            <h3 class="maszynyInnerItemHeader">
                Galeria
            </h3>
        </a>

        <a class="maszynyInnerItem" href="<?php echo get_page_link(get_page_by_title('Video')->ID); ?>">
            <div class="maszynyOverlay">
                <div class="maszynyOverlayText">
                    <img class="maszynyOverlayImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/plus.png'; ?>" alt="plus" />
                </div>
            </div>
            <img class="maszynyInnerItemImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/wydarzenia.png'; ?>" alt="wydarzenia" />
            <h3 class="maszynyInnerItemHeader">
                Video
            </h3>
        </a>
    </div>
</main>

<?php
get_footer();
?>