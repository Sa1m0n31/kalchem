<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kalchem
 */

get_header();
?>

    <!-- LANDING PAGE -->
    <main class="landingPage">
        <img class="arrowMobile arrowMobileLeft" onclick="nextSlider(6)" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/arrow-white.png'; ?>" alt="lewo" />


        <img class="arrowMobile arrowMobileRight" onclick="nextSlider(5)" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/arrow-white.png'; ?>" alt="prawo" />
        <?php
            $args = array(
                    'post_type' => 'Slider',
                'posts_per_page' => 4
            );

            $i = 0;
            $query = new WP_Query($args);

            if($query->have_posts()) {
                while($query->have_posts()) {
                    $query->the_post();
                    $i++;
                    $slideId = "slide" . $i;
                    ?>

                    <a class="slide <?php if($i==1) echo 'slideActive'; ?>" id="<?php echo $slideId; ?>"
                        href="<?php if(get_field('link')) { echo get_field('link'); } else { the_permalink(); }  ?>"
                    >
                        <span class="mobileDark"></span>
                        <img class="landingPageImage" src="<?php echo get_field('zdjecie') ?>" alt="<?php echo get_field('pierwszy_naglowek'); ?>" />

                        <div class="slideLinkWrapper">
                            <h2 class="slideHeaderPrimary slideHeaderPrimary1">
                                    <?php echo get_field('pierwszy_naglowek'); ?>
                            </h2>

                            <h3 class="slideHeaderSecondary">
                                <?php echo get_field('drugi_naglowek'); ?>
                            </h3>

                            <button class="slideHeaderButton">
                                    Więcej
                            </button>
                        </div>
                    </a>

                        <?php
                }
                wp_reset_postdata();
            }
        ?>

        <div class="dots">
            <button class="dot dotActive" id="dot1" onclick="nextSlider(0)"></button>
            <button class="dot" id="dot2" onclick="nextSlider(1)"></button>
            <button class="dot" id="dot3" onclick="nextSlider(2)"></button>
            <button class="dot" id="dot4" onclick="nextSlider(3)"></button>
        </div>

        <div class="progressBar">
            <span class="progressBarProgress"></span>
        </div>
    </main>

    <!-- AKTUALNOSCI -->
    <section class="aktualnosci">
        <h2 class="sectionHeader sectionHeaderFront" id="sectionHeader1">
            Aktualności
		</h2>
        <main class="aktualnosciInner">
            <span class="trigger1" id="aktualnosciTrigger"></span>
            <div class="aktualnosciLeft">
                <!-- Aktualnosci loop -->
                <?php
                    $args = array(
                            'posts_per_page' => 4,
                            'category_name' => 'Uncategorized'
                    );

                    $query = new WP_Query($args);

                    if($query->have_posts()) {
                        while($query->have_posts()) {
                            $query->the_post();
                            ?>
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

            <div class="aktualnosciRight">
                <div class="aktualnosciRightTop">
                    <div class="aktualnosciRightTopLeft">
                        <h2>PHZ Kalchem Sp. z o.o.</h2>
                        <h3>Wielki Głęboczek 150</h3>
                        <h3>87-313 Brzozie</h3>
                        <h3>Polska</h3>

                        <h4 class="contact contactFirst">
                            <img class="contactIcon" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/phone.svg'; ?>" alt="telefon" />
                            <a href="tel:+48564935840">
                                564 935 840
                            </a>
                        </h4>
                        <h4 class="contact">
                            <img class="contactIcon" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/mail.svg'; ?>" alt="mail" />
                            <a href="mailto:biuro@kalchem.com.pl">
                                biuro@kalchem.com.pl
                            </a>
                        </h4>
                    </div>
                    <div class="aktualnosciRightTopRight">
                        <img class="kalchemLogoSmall" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/kalchem-logo.png'; ?>" alt="kalchem-logo" />
                        <h3 class="aktualnosciRightTopHint">
                            ODWIEDŹ OSOBIŚCIE JEDEN Z NASZYCH ODDZIAŁÓW
                        </h3>

                        <button class="aktualnosciRightTopRightButton">
                            <a href="<?php echo get_page_link(get_page_by_title('O nas')->ID) . '/#oddzialyMapa'; ?>">
                                SPRAWDŹ MAPĘ NASZYCH PUNKTÓW
                            </a>
                        </button>
                    </div>

                </div>
                <div class="aktualnosciRightTopBottom">
                    <?php get_sidebar(); ?>

                    <button class="aktualnosciRightTopRightButton poprzednieWydarzeniaBtn">
                        <a href="<?php echo get_page_link(get_page_by_title('Kalendarz')->ID); ?>">
                            ZOBACZ PEŁNY KALENDARZ
                        </a>
                    </button>
                </div>
            </div>
        </main>
    </section>

    <!-- MARKI -->
    <section class="marki">
        <h1 class="sectionHeader sectionHeaderFront" id="markiHeader">
            Marki w naszej ofercie
        </h1>

        <main class="markiInner">
            <span class="trigger1" id="markiTrigger"></span>
            <button class="markiArrow markiLeft" onclick="moveMarkiLeft()">
                <img class="arrow arrowLeft" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/chevron_big_left.svg'; ?>" alt="left" />
            </button>

            <div class="markiTrack">
                <?php
                    $args = array(
                        'post_type' => 'Dostawca',
                        'posts_per_page' => 15
                    );

                    $query = new WP_Query($args);

                    if($query->have_posts()) {
                        while($query->have_posts()) {
                            $query->the_post(); ?>
                            <div class="markiInnerItem">
                                <img class="markiInnerItemImg" src="<?php echo get_field('logo'); ?>" alt="<?php echo the_title(); ?>" />
                            </div>
                                <?php
                        }
                        wp_reset_postdata();
                    }
                ?>


            </div>

            <button class="markiArrow markiRight" onclick="moveMarkiRight()">
                <img class="arrow arrowRight" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/chevron_big_right.svg'; ?>" alt="right" />
            </button>
        </main>
    </section>

    <!-- MASZYNY -->
    <section class="maszyny">
        <span class="trigger1" id="maszynyTrigger"></span>
        <h2 class="sectionHeader sectionHeaderFront" id="maszynyHeader">
            Maszyny rolnicze Class
        </h2>

        <img class="siteHeaderTopClass" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/claas-logo.png'; ?>" alt="class-logo" />

        <h3 class="classHint">
            Zapoznaj się z naszą ofertą i odwiedź jeden z wybranych punktów.
        </h3>

        <main class="maszynyInner maszynyInnerFront">
            <a class="maszynyInnerItem" href="<?php echo get_page_link(get_page_by_title('Ciągniki')->ID); ?>">
                <span class="maszynyTrigger" id="maszynyTrigger1"></span>
                <div class="maszynyOverlay">
                    <div class="maszynyOverlayText">
                        <img class="maszynyOverlayImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/plus.png'; ?>" alt="plus" />
                    </div>
                </div>
                <img class="maszynyInnerItemImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/ciagniki.png'; ?>" alt="ciagniki" />
                <h3 class="maszynyInnerItemHeader">
                    Ciągniki
                </h3>
            </a>

            <a class="maszynyInnerItem" href="<?php echo get_page_link(get_page_by_title('Kombajny')->ID); ?>">
                <span class="maszynyTrigger" id="maszynyTrigger2"></span>
                <div class="maszynyOverlay">
                    <div class="maszynyOverlayText">
                        <img class="maszynyOverlayImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/plus.png'; ?>" alt="plus" />
                    </div>
                </div>
                <img class="maszynyInnerItemImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/kombajny.png'; ?>" alt="ciagniki" />
                <h3 class="maszynyInnerItemHeader">
                    Kombajny
                </h3>
            </a>

            <a class="maszynyInnerItem" href="<?php echo get_page_link(get_page_by_title("Sieczkarnie polowe")->ID); ?>">
                <span class="maszynyTrigger" id="maszynyTrigger3"></span>
                <div class="maszynyOverlay">
                    <div class="maszynyOverlayText">
                        <img class="maszynyOverlayImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/plus.png'; ?>" alt="plus" />
                    </div>
                </div>
                <img class="maszynyInnerItemImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/sieczarkie.png'; ?>" alt="ciagniki" />
                <h3 class="maszynyInnerItemHeader">
                    Sieczkarnie polowe
                </h3>
            </a>

            <a class="maszynyInnerItem" href="<?php echo get_page_link(get_page_by_title('Ładowarki kołowe')->ID); ?>">
                <span class="maszynyTrigger" id="maszynyTrigger4"></span>
                <div class="maszynyOverlay">
                    <div class="maszynyOverlayText">
                        <img class="maszynyOverlayImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/plus.png'; ?>" alt="plus" />
                    </div>
                </div>
                <img class="maszynyInnerItemImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/ladowarki-kolowe.png'; ?>" alt="ciagniki" />
                <h3 class="maszynyInnerItemHeader">
                    Ładowarki kołowe
                </h3>
            </a>


            <a class="maszynyInnerItem" href="<?php echo get_page_link(get_page_by_title('Ładowarki teleskopowe')->ID); ?>">
                <span class="maszynyTrigger" id="maszynyTrigger5"></span>
                <div class="maszynyOverlay">
                    <div class="maszynyOverlayText">
                        <img class="maszynyOverlayImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/plus.png'; ?>" alt="plus" />
                    </div>
                </div>
                <img class="maszynyInnerItemImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/ladowarki-teleskopwoe.png'; ?>" alt="ciagniki" />
                <h3 class="maszynyInnerItemHeader">
                    Ładowarki teleskopowe
                </h3>
            </a>

            <a class="maszynyInnerItem" href="<?php echo get_page_link(get_page_by_title('Maszyny do zbioru pasz')->ID); ?>">
                <span class="maszynyTrigger" id="maszynyTrigger6"></span>
                <div class="maszynyOverlay">
                    <div class="maszynyOverlayText">
                        <img class="maszynyOverlayImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/plus.png'; ?>" alt="plus" />
                    </div>
                </div>
                <img class="maszynyInnerItemImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/zbior-pasz.png'; ?>" alt="ciagniki" />
                <h3 class="maszynyInnerItemHeader">
                    Maszyny do zbioru pasz
                </h3>
            </a>

            <a class="maszynyInnerItem" href="<?php echo get_page_link(get_page_by_title('Prasy')->ID); ?>">
                <span class="maszynyTrigger" id="maszynyTrigger7"></span>
                <div class="maszynyOverlay">
                    <div class="maszynyOverlayText">
                        <img class="maszynyOverlayImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/plus.png'; ?>" alt="plus" />
                    </div>
                </div>
                <img class="maszynyInnerItemImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/prasy.png'; ?>" alt="ciagniki" />
                <h3 class="maszynyInnerItemHeader">
                    Prasy
                </h3>
            </a>


            <a class="maszynyInnerItem" href="<?php echo get_page_link(get_page_by_title('EASY – Efficient Agriculture Systems')->ID); ?>">
                <span class="maszynyTrigger" id="maszynyTrigger8"></span>
                <div class="maszynyOverlay">
                    <div class="maszynyOverlayText">
                        <img class="maszynyOverlayImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/plus.png'; ?>" alt="plus" />
                    </div>
                </div>
                <img class="maszynyInnerItemImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/easy.png'; ?>" alt="ciagniki" />
                <h3 class="maszynyInnerItemHeader">
                    EASY – Efficient Agriculture Systems
                </h3>
            </a>

            <a class="maszynyInnerItem" href="<?php echo get_page_link(get_page_by_title('Technologie')->ID); ?>">
                <span class="maszynyTrigger" id="maszynyTrigger9"></span>
                <div class="maszynyOverlay">
                    <div class="maszynyOverlayText">
                        <img class="maszynyOverlayImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/plus.png'; ?>" alt="plus" />
                    </div>
                </div>
                <img class="maszynyInnerItemImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/technologie.png'; ?>" alt="ciagniki" />
                <h3 class="maszynyInnerItemHeader">
                    Technologie
                </h3>
            </a>

        </main>
    </section>

    <!-- NASZE USLUGI -->
    <section class="uslugi">
        <span class="trigger1" id="uslugiTrigger"></span>
        <h2 class="sectionHeader sectionHeaderFront" id="uslugiHeader">
            Nasze usługi
        </h2>

        <main class="uslugiInner">
            <div class="uslugiItem">
                <span class="maszynyTrigger" id="uslugiTrigger1"></span>
                <div class="uslugiItemImgWrapper">
                    <img class="uslugiItemImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/parts.svg'; ?>" alt="czesci" />
                </div>
                <div>
                    <h2 class="uslugiItemHeader">
                        Części
                    </h2>
                    <p class="uslugiItemDescription">
                        Zapraszamy do zapoznania się z szeroką ofertą naszej firmy na części zamienne do maszyn rolniczych.
                    </p>
                </div>
            </div>

            <div class="uslugiItem">
                <span class="maszynyTrigger" id="uslugiTrigger2"></span>
                <div class="uslugiItemImgWrapper">
                    <img class="uslugiItemImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/kalkulator.svg'; ?>" alt="czesci" />
                </div>
                <div>
                    <h2 class="uslugiItemHeader">
                        Finansowanie
                    </h2>
                    <p class="uslugiItemDescription">
                        Nasi eksperci doradzą najlepszą ofertę finansowania zakupu maszyn rolniczych.
                    </p>
                </div>
            </div>

            <div class="uslugiItem">
                <span class="maszynyTrigger" id="uslugiTrigger3"></span>
                <div class="uslugiItemImgWrapper">
                    <img class="uslugiItemImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/mobilny-serwis.svg'; ?>" alt="czesci" />
                </div>
                <div>
                    <h2 class="uslugiItemHeader">
                        Serwis
                    </h2>
                    <p class="uslugiItemDescription">
                        Serwis stworzony, aby być bliżej naszych Klientów.
                    </p>
                </div>
            </div>

            <div class="uslugiItem">
                <span class="maszynyTrigger" id="uslugiTrigger4"></span>
                <div class="uslugiItemImgWrapper">
                    <img class="uslugiItemImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/opona.svg'; ?>" alt="czesci" />
                </div>
                <div>
                    <h2 class="uslugiItemHeader">
                        Serwis opon
                    </h2>
                    <p class="uslugiItemDescription">
                        Zapraszamy do zapoznania się z naszą ofertą na serwis opon.
                    </p>
                </div>
            </div>

            <div class="uslugiItem">
                <span class="maszynyTrigger" id="uslugiTrigger5"></span>
                <div class="uslugiItemImgWrapper">
                    <img class="uslugiItemImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/parts.svg'; ?>" alt="czesci" />
                </div>
                <div>
                    <h2 class="uslugiItemHeader">
                        Autoryzowany serwis
                    </h2>
                    <p class="uslugiItemDescription">
                        Jesteśmy Autoryzowanym Serwisem marki CLAAS.
                    </p>
                </div>
            </div>

            <div class="uslugiItem">
                <span class="maszynyTrigger" id="uslugiTrigger6"></span>
                <div class="uslugiItemImgWrapper">
                    <img class="uslugiItemImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/sklep.svg'; ?>" alt="czesci" />
                </div>
                <div>
                    <h2 class="uslugiItemHeader">
                        Sklep
                    </h2>
                    <p class="uslugiItemDescription">
                        Odwiedź nasz sklep internetowy już dziś.
                    </p>
                </div>
            </div>

            <div class="uslugiItem">
                <span class="maszynyTrigger" id="uslugiTrigger7"></span>
                <div class="uslugiItemImgWrapper">
                    <img class="uslugiItemImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/lakiernia.svg'; ?>" alt="czesci" />
                </div>
                <div>
                    <h2 class="uslugiItemHeader">
                        Lakiernia
                    </h2>
                    <p class="uslugiItemDescription">
                        Zapraszamy do zapoznania się z naszą ofertą na serwis opon.
                    </p>
                </div>
            </div>

            <div class="uslugiItem">
                <span class="maszynyTrigger" id="uslugiTrigger8"></span>
                <div class="uslugiItemImgWrapper">
                    <img class="uslugiItemImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/silnik.svg'; ?>" alt="czesci" />
                </div>
                <div>
                    <h2 class="uslugiItemHeader">
                        Serwis silników
                    </h2>
                    <p class="uslugiItemDescription">
                        Nasi eksperci zadbają o stan silników w Państwa maszynach.
                    </p>
                </div>
            </div>

            <div class="uslugiItem">
                <span class="maszynyTrigger" id="uslugiTrigger9"></span>
                <div class="uslugiItemImgWrapper">
                    <img class="uslugiItemImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/szkolenia.svg'; ?>" alt="czesci" />
                </div>
                <div>
                    <h2 class="uslugiItemHeader">
                        Szkolenia operatorów
                    </h2>
                    <p class="uslugiItemDescription">
                        Oferujemy szkolenie operatorów przeprowadzany przez nasz wykwalifikowany zespół.
                    </p>
                </div>
            </div>
        </main>
    </section>

<?php
get_footer();
