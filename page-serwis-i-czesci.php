<?php
get_header();
?>

<!-- SERWIS I CZESCI -->
<main class="serwisICzesci">
    <h1 class="sectionHeader">
        Serwis i części
    </h1>
    <div class="serwisInner">
        <div class="serwis">
            <img class="serwisImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/serwis-claas.png'; ?>" alt="serwis" />
            <h2 class="serwisHeader">Serwis</h2>
            <div class="serwisItemWrapper">
                <h3 class="serwisItem" id="serwisH1" onclick="serwis(1)">
                    <span class="number">01</span>
                    Pełna dokumentacja - jasna sytuacja
                </h3>
                <p class="serwisPopup" id="serwis1">
                    Dokumentacja techniczna zapewnia, że wszystkie materiały dotyczące palety produktów są aktualne, kompletne i dostępne w każdym języku.
                </p>
            </div>
            <div class="serwisItemWrapper">
                <h3 class="serwisItem" id="serwisH2" onclick="serwis(2)">
                    <span class="number">02</span>
                    Wyposażenie High Tech – wsparcie skrojone na miarę
                </h3>
                <p class="serwisPopup" id="serwis2">
                    Bardzo nowoczesne warsztaty wyposażone w najnowszą technikę diagnostyczną umożliwiają dokładne diagnozowanie błędów oraz szybką kalkulację kosztów naprawy.
                    W takim przypadku nasz partner serwisowy CLAAS ma do do dyspozycji narzędzia specjalne pozwalające wykonać naprawę szybko i niedrogo.
                </p>
            </div>
            <div class="serwisItemWrapper">
                <h3 class="serwisItem" id="serwisH3" onclick="serwis(3)">
                    <span class="number">03</span>
                    Szybkość - w każdym czasie na miejscu.
                </h3>
                <p class="serwisPopup" id="serwis3">
                    Gęsta sieć serwisowa i osobisty partner do rozmów gwarantują stały dostęp do nas – czy to do partnera handlowego, doradcy technicznego lub serwisu. Gdy nas potrzebujesz jesteśmy na miejscu. Zawsze. Szybko. Niezawodnie.
                    W razie potrzeby partnerzy CLAAS zawsze mają do dyspozycji aktualne informacje online, pozwalające na szybkie reakcje i optymalne rozwiązania.
                </p>
            </div>
            <div class="serwisItemWrapper">
                <h3 class="serwisItem" id="serwisH4" onclick="serwis(4)">
                    <span class="number">04</span>
                    Zdalna diagnoza CLAAS
                </h3>
                <p class="serwisPopup" id="serwis4">
                    CLAAS TELEMATICS w maszynach żniwnych oferuje nie tylko korzyści ekonomiczne w czasie pracy, ale również szybką pomoc techniczną w oparciu o informacje uzyskiwane z bezprzewodowego połączenia z mechanikiem serwisu CLAAS. Technologia telefonii komórkowej oraz internetu pozwala przesyłać dane konkretnego pojazdu bezpośrednio do przyrządów diagnostycznych albo komputera mechanika. Może on wtedy z każdego miejsca postawić prawidłową diagnozę i dojechać z niezbędnymi częściami zamiennymi. Oszczędzony czas można wykorzystać na pracę maszyną.
                </p>
            </div>
        </div>
        <span class="divider"></span>
        <div class="czesci">
            <img class="serwisImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/czesci.png'; ?>" alt="czesci" />
            <h2 class="serwisHeader">Części</h2>
            <div class="serwisItemWrapper">
                <h3 class="serwisItem" id="czesciH1" onclick="czesci(1)">
                    <span class="number">01</span>
                    ORYGINALNE części CLAAS
                </h3>
                <p class="serwisPopup" id="czesci1">
                    Części dają więcej niż tylko idealnie dopasowane wymiary. Stosowane materiały i ich odpowiednia obróbka są ważną podstawą niezawodnego i długoletniego użytkowania maszyn.

                    Części wykonano z pełnowartościowych materiałów dokładnie według specyfikacji CLAAS i zgodnie ze sprawdzoną wiedzą CLAAS. Każda pojedyncza część jest optymalnie dostosowana do systemów funkcjonujących w maszynie.
                </p>
            </div>
            <div class="serwisItemWrapper">
                <h3 class="serwisItem" id="czesciH2" onclick="czesci(2)">
                    <span class="number">02</span>
                    PREMIUM LINE - części wyjątkowo odporne na ścieranie
                </h3>
                <p class="serwisPopup" id="czesci2">
                    Części PREMIUM LINE stanowią prawidłowy wybór dla ekstremalnych warunków pracy i szczególnego obciążenia maszyny. Wyróżnia je wyjątkowo wysoka odporność na ścieranie i korozję. Obszerną ofertę części  PREMIUM LINE proponujemy dla przepływu materiału w sieczkarniach polowych CLAAS JAGUAR.
                </p>
            </div>
            <div class="serwisItemWrapper">
                <h3 class="serwisItem" id="czesciH3" onclick="czesci(3)">
                    <span class="number">03</span>
                    Środki smarne CLAAS ORIGINAL
                </h3>
                <p class="serwisPopup" id="czesci3">
                    Chroniące i wydajne: środki smarne CLAAS ORIGINA są precyzyjne dostosowane do rosnących wymagań wielu części maszyn.

                    Środki smarne CLAAS są sprawdzone oraz dozwolone do stosowania przez dział rozwoju technicznego i odpowiadają wszystkim wymaganiom technicznym. Spełniają stale rosnące potrzeby przekładni, osi, hydrauliki i mokrych układów hamulcowych.
                </p>
            </div>
            <div class="serwisItemWrapper">
                <h3 class="serwisItem" id="czesciH4" onclick="czesci(4)">
                    <span class="number">04</span>
                    Opakowania do kiszonki i balotów CLAAS ORIGINAL
                </h3>
                <p class="serwisPopup" id="czesci4">
                    Siatka, sznurek i folia do owijania bel spełniają wysokie wymogi jakościowe CLAAS. Zostały wypróbowane w polu i są maksymalnie ekonomiczne. Poddano je szeroko zakrojonym testom, które potwierdziły, że produkty te odpowiadają za płynny przebieg procesów roboczych. Wszystkie testowane wyroby zostały bez wyjątku zatwierdzone przez specjalistów produktowych CLAAS. Nasze wydajne siatki do owijania czy wysokiej jakości sznurki są zaawansowanymi materiałami eksploatacyjnymi, których ekonomiczność i pewność działania są stale optymalizowana.
                </p>
            </div>
            <div class="serwisItemWrapper">
                <h3 class="serwisItem" id="czesciH5" onclick="czesci(5)">
                    <span class="number">05</span>
                    Obciążniki przednie CLAAS
                </h3>
                <p class="serwisPopup" id="czesci5">
                    Także w kwestiach odpowiedniego obciążenia CLAAS oferuje szeroki asortyment produktów. Do każdego zastosowania i każdego typu maszyny istnieje odpowiedni obciążnik przedni CLAAS. Ciągniki są eksploatowane przez cały rok i służą do rozmaitych zadań roboczych. Zarówno na polu, jak i przy uprawie roli odpowiednie obciążenie umożliwia efektywną, ekonomiczną i łagodniejszą dla podłoża pracę.
                </p>
            </div>

        </div>
    </div>
</main>

<!-- OSOBY KONTAKTOWE -->
<section class="osobyKontaktowe">
    <h1 class="sectionHeader">
        Twoje osoby kontaktowe
    </h1>

    <div class="osobyKontaktoweInner">
        <div class="pracownik">
            <h2 class="pracownikExtraHeader">
                Serwis
            </h2>

            <?php
                $args = array(
                        'post_type' => 'Pracownik',
                        'meta_key' => 'osoba_kontaktowa',
                        'meta_value' => 'Serwis',
                        'posts_per_page' => 1
                );

                $query = new WP_Query($args);

                if($query->have_posts()) {
                    while($query->have_posts()) {
                        $query->the_post();
                        ?>
                        <img class="pracownikImg" src="<?php echo get_field('zdjecie'); ?>" alt="profilowe" />

                        <h3 class="pracownikName">
                            <?php echo get_field('imie_i_nazwisko'); ?>
                        </h3>
                        <h4 class="pracownikFunction">
                            <?php echo get_field('funkcja'); ?>
                        </h4>

                        <div class="pracownikContact">
                            <img class="pracownikContactIcon" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/phone.svg';?>" alt="telefon" />
                            <h5 class="pracownikContactText">
                                <a href="tel:<?php echo get_field('telefon'); ?>">
                                    <?php echo get_field('telefon'); ?>
                                </a>
                            </h5>
                        </div>
                        <div class="pracownikContact">
                            <img class="pracownikContactIcon" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/mobile.svg'; ?>" alt="komorka" />
                            <h5 class="pracownikContactText">
                                <a href="tel:+<?php echo get_field('komorka'); ?>">
                                    <?php echo get_field('komorka'); ?>
                                </a>
                            </h5>
                        </div>
                        <div class="pracownikContact">
                            <img class="pracownikContactIcon" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/mail.svg'; ?>" alt="mail" />
                            <h5 class="pracownikContactText">
                                <a href="mailto: <?php echo get_field('adres_email'); ?>">
                                    <?php echo get_field('adres_email'); ?>
                                </a>
                            </h5>
                        </div>
            <?php
                    }
                    wp_reset_postdata();
                }

            ?>
        </div>

        <span class="divider divider2"></span>

        <div class="pracownik">
            <h2 class="pracownikExtraHeader">
                Części
            </h2>

            <?php
            $args = array(
                'post_type' => 'Pracownik',
                'meta_key' => 'osoba_kontaktowa',
                'meta_value' => 'Części',
                'posts_per_page' => 1
            );

            $query = new WP_Query($args);

            if($query->have_posts()) {
                while($query->have_posts()) {
                    $query->the_post();
                    ?>
                    <img class="pracownikImg" src="<?php echo get_field('zdjecie'); ?>" alt="profilowe" />

                    <h3 class="pracownikName">
                        <?php echo get_field('imie_i_nazwisko'); ?>
                    </h3>
                    <h4 class="pracownikFunction">
                        <?php echo get_field('funkcja'); ?>
                    </h4>

                    <div class="pracownikContact">
                        <img class="pracownikContactIcon" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/phone.svg';?>" alt="telefon" />
                        <h5 class="pracownikContactText">
                            <a href="tel:<?php echo get_field('telefon'); ?>">
                                <?php echo get_field('telefon'); ?>
                            </a>
                        </h5>
                    </div>
                    <div class="pracownikContact">
                        <img class="pracownikContactIcon" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/mobile.svg'; ?>" alt="komorka" />
                        <h5 class="pracownikContactText">
                            <a href="tel:+<?php echo get_field('komorka'); ?>">
                                <?php echo get_field('komorka'); ?>
                            </a>
                        </h5>
                    </div>
                    <div class="pracownikContact">
                        <img class="pracownikContactIcon" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/mail.svg'; ?>" alt="mail" />
                        <h5 class="pracownikContactText">
                            <a href="mailto: <?php echo get_field('adres_email'); ?>">
                                <?php echo get_field('adres_email'); ?>
                            </a>
                        </h5>
                    </div>
                    <?php
                }
                wp_reset_postdata();
            }

            ?>
        </div>
    </div>
</section>

<?php
get_footer();
?>
