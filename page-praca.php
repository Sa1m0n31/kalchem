<?php
get_header();
?>

<main class="aktualnosciPage">
    <h1 class="sectionHeader">
        <?php echo the_title(); ?>
    </h1>

    <div class="ofertyPracyInner">
        <div class="ofertyPracyIntro">
            <h2 class="ofertyPracyHeader">
                Kalchem sp. z o.o. - stabilne zatrudnienie z gwarancją rozwoju i udanej kariery
            </h2>
            <p class="ofertyPracyIntro">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vel augue vitae dui condimentum posuere sed non est. Quisque non nulla justo. Duis condimentum, sapien in posuere iaculis, mauris ex porttitor augue, at convallis est tellus nec felis. Etiam finibus arcu eu eros vulputate, sit amet consectetur erat fringilla. In congue ac lorem eget euismod. Cras nec tortor sit amet nisi tempus rhoncus id non urna. In vulputate arcu ac magna sodales volutpat.
            </p>
        </div>

        <h2 class="ofertyPracyHeader">
            Aktualne oferty pracy
        </h2>

        <div class="ofertaPracyItem">
            <h3 class="ofertaPracyItemHeader">
                Specjalista ds marketingu
            </h3>
            <button class="ofertaPracyItemBtn" onclick="ofertaPracyShowMore(0)">
            </button>
            <p class="ofertaPracyItemDescription">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vel augue vitae dui condimentum posuere sed non est. Quisque non nulla justo. Duis condimentum, sapien in posuere iaculis, mauris ex porttitor augue, at convallis est tellus nec felis. Etiam finibus arcu eu eros vulputate, sit amet consectetur erat fringilla. In congue ac lorem eget euismod. Cras nec tortor sit amet nisi tempus rhoncus id non urna. In vulputate arcu ac magna sodales volutpat.
            </p>
        </div>
        <div class="ofertaPracyItem">
            <h3 class="ofertaPracyItemHeader">
                Specjalista ds marketingu
            </h3>
            <button class="ofertaPracyItemBtn" onclick="ofertaPracyShowMore(1)">
            </button>
            <p class="ofertaPracyItemDescription">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vel augue vitae dui condimentum posuere sed non est. Quisque non nulla justo. Duis condimentum, sapien in posuere iaculis, mauris ex porttitor augue, at convallis est tellus nec felis. Etiam finibus arcu eu eros vulputate, sit amet consectetur erat fringilla. In congue ac lorem eget euismod. Cras nec tortor sit amet nisi tempus rhoncus id non urna. In vulputate arcu ac magna sodales volutpat.
            </p>
        </div>
        <div class="ofertaPracyItem">
            <h3 class="ofertaPracyItemHeader">
                Specjalista ds marketingu
            </h3>
            <button class="ofertaPracyItemBtn" onclick="ofertaPracyShowMore(2)">
            </button>
            <p class="ofertaPracyItemDescription">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vel augue vitae dui condimentum posuere sed non est. Quisque non nulla justo. Duis condimentum, sapien in posuere iaculis, mauris ex porttitor augue, at convallis est tellus nec felis. Etiam finibus arcu eu eros vulputate, sit amet consectetur erat fringilla. In congue ac lorem eget euismod. Cras nec tortor sit amet nisi tempus rhoncus id non urna. In vulputate arcu ac magna sodales volutpat.
            </p>
        </div>
    </div>

    <!-- OSOBY KONTAKTOWE -->
    <section class="osobyKontaktowe">
        <h1 class="sectionHeader">
            Kontakt w sprawie rekrutacji
        </h1>

        <div class="osobyKontaktoweInner">
            <div class="pracownik">
                <h2 class="pracownikExtraHeader">
                    Dział kadr
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
                    Rekruter
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

</main>

<?php
get_footer();
?>
