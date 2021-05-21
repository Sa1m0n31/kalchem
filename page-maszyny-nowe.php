<?php
get_header();
?>

<!-- WYBIERZ PRODUCENTA -->
<section class="maszynyNoweContainer">
    <div class="mapContents">
        <div id="contentWielkiGleboczek">
            <img class="contentImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/kalchem-logo.png'?>" alt="wielki-gleboczek" />
            <div class="contentText">
                <h2 class="contentHeader">Wielki Głęboczek</h2>
                <h3 class="contentAdress">Wielki Głęboczek 150</h3>
                <h3 class="contentAdress">87-313 Brzozie</h3>
            </div>
            <button class="contentBtn" onclick="trasa(1)">
                Pokaż trasę
            </button>
        </div>
        <div id="contentZurominek">
            <img class="contentImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/kalchem-logo.png'?>" alt="wielki-gleboczek" />
            <div class="contentText">
                <h2 class="contentHeader">Żurominek</h2>
                <h3 class="contentAdress">Żurominek 150</h3>
                <h3 class="contentAdress">06-522 Żurominek</h3>
            </div>
            <button class="contentBtn" onclick="trasa(3)">
                Pokaż trasę
            </button>
        </div>
        <div id="contentWiktoryn">
            <img class="contentImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/kalchem-logo.png'?>" alt="wielki-gleboczek" />
            <div class="contentText">
                <h2 class="contentHeader">Wiktoryn</h2>
                <h3 class="contentAdress">Wiktoryn 5a</h3>
                <h3 class="contentAdress">87-731 Wiktoryn</h3>
            </div>
            <button class="contentBtn" onclick="trasa(2)">
                Pokaż trasę
            </button>
        </div>
    </div>

    <h1 class="sectionHeader">
        Maszyny nowe
    </h1>
    <div class="maszynyNoweList">
        <?php
        $args = array(
            'post_type' => 'Dostawca',
            'posts_per_page' => 15
        );

        $query = new WP_Query($args);

        if($query->have_posts()) {
            while($query->have_posts()) {
                $query->the_post(); ?>

                <div class="maszynyNoweListImgWrapper">
                    <a href="<?php echo get_field('link'); ?>" target="_blank">
                        <img class="maszynyNoweListImg" src="<?php echo get_field('logo'); ?>" alt="<?php echo get_field('logo'); ?>" />
                    </a>
                </div>
                <?php
            }
        }
        ?>
    </div>

    <h2 class="greenHeader">
        Wybierz producenta i dowiedz się więcej o ofercie
    </h2>
    <div class="producenciSlider">
        <button class="producenciArrow producenciLeft" onclick="producenciLeft()">
            <img class="producenciArrowImg producenciArrowLeftImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/chevron_duo_left.svg'; ?>" alt="left" />
        </button>

        <div class="producenciSliderInner">
            <?php
                $args = array(
                        'post_type' => 'Dostawca'
                );

                $query = new WP_Query($args);

                if($query->have_posts()) {
                    while($query->have_posts()) {
                        $query->the_post(); ?>

                        <div class="producenciSliderInnerItem">
                            <a href="<?php echo get_field('link'); ?>" target="_blank">
                                <img class="producenciSliderInnerItemImg" src="<?php echo get_field('logo'); ?>" alt="<?php echo get_field('logo'); ?>" />
                            </a>
                        </div>
            <?php
                    }
                }

            ?>
        </div>

        <button class="producenciArrow producenciRight" onclick="producenciRight()">
            <img class="producenciArrowImg producenciArrowLeftImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/chevron_duo_right.svg'; ?>" alt="right" />
        </button>
    </div>
</section>

<!-- SLOGANS -->
<section class="maszynyNoweSlogans">
    <div class="maszynyNoweSlogansPart">
        <div class="maszynyNoweImgWrapper">
            <span class="maszynyNoweProgressBar" id="maszynyNoweProgressBar1"></span>
            <img class="maszynyNoweSlogansImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/claas-czlowiek.png'; ?>" alt="zaufany-dealer" />
        </div>
        <div class="maszynyNoweSlogansPartText">
            <h3 class="maszynyNoweSlogansPartHeader">
                Postaw na zaufanego dealera
            </h3>
            <p class="maszynyNoweSlogansPartDescription">
                Tysiące zadowolonych klientów, setki sprzedanych maszyn. Budujemy swoją pozycję na rynku już od wielu lat. Jesteśmy zaufanym i sprawdzonym partnerem biznesowym dla światowych marek, takich jak m.in. Claas.
            </p>
        </div>
    </div>

    <div class="maszynyNoweSlogansPart">
        <div class="maszynyNoweImgWrapper">
            <span class="maszynyNoweProgressBar" id="maszynyNoweProgressBar2"></span>
            <img class="maszynyNoweSlogansImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/finansowanie.png'; ?>" alt="finansowanie" />
        </div>
        <div class="maszynyNoweSlogansPartText">
            <h3 class="maszynyNoweSlogansPartHeader">
                Atrakcyjne warunki finansowania
            </h3>
            <p class="maszynyNoweSlogansPartDescription">
                Dla nas najważniejszy jest Klient. Wychodząc naprzeciw oczekiwaniom wszystkich konsumentów, oferujemy atrakcyjne warunki finansowania zakupu nowych maszyn od czołowych producentów, z którymi współpracujemy.
            </p>
        </div>
    </div>
</section>

<!-- MAPA -->
<section class="maszynyNoweMapaContainer">
    <h2 class="greenHeader">
        Zainteresowany? Odwiedź jeden z naszych oddziałów
    </h2>

    <div id="map">

    </div>
</section>

<?php
get_footer();
?>
