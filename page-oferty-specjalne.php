<?php
get_header();
?>

<main class="uslugiMain">
    <h1 class="sectionHeader">
        <?php echo the_title(); ?>
    </h1>
    <div class="ofertaSpecjalnaInner">
        <a class="ofertaSpecjalnaItem" href="https://www.claas.pl/service/aftersales_offers" target="_blank" rel="nofollow">
            <div class="maszynyOverlay">
                <div class="maszynyOverlayText">
                    <img class="maszynyOverlayImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/plus.png'; ?>" alt="plus" />
                </div>
            </div>
            <img class="ofertaSpecjalnaImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/oferta-1.jpg'; ?>" alt="oferta-specjalna" />

            <h2 class="ofertaSpecjalnaHeader">
                Atrakcyjne oferty specjalne na usługi serwisowe i części zamienne
            </h2>
        </a>

        <a class="ofertaSpecjalnaItem" href="https://www.claas.pl/zakup-finansowanie/promocje-sprzedazy/maszyny-first-claas" target="_blank" rel="noreferrer">
            <div class="maszynyOverlay">
                <div class="maszynyOverlayText">
                    <img class="maszynyOverlayImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/plus.png'; ?>" alt="plus" />
                </div>
            </div>
            <img class="ofertaSpecjalnaImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/oferta-2.jpg'; ?>" alt="oferta-specjalna" />

            <h2 class="ofertaSpecjalnaHeader">
                Maszyny w wersji First Claas
            </h2>
        </a>
    </div>
</main>

<?php
get_footer();
?>
