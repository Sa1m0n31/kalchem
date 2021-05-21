<?php
get_header();
?>

<!-- AKTUALNOSCI -->
<main class="aktualnosciPage">
    <h1 class="sectionHeader">
        Kontakt
    </h1>

    <div class="wiadomosciPageInner kontaktPageInner">
        <label for="position">
            <select id="position" name="<?php echo site_url() ?>/wp-admin/admin-ajax.php" onchange="filterEmployees(this)">
                <option value="Wszyscy">Wszyscy</option>
                <option value="Właściciel">Właściciel</option>
                <option value="Dyrektor handlowy">Dyrektor handlowy</option>
                <option value="Sprzedaż maszyn">Sprzedaż maszyn</option>
                <option value="Biuro">Biuro</option>
                <option value="Części zamienne">Części zamienne</option>
                <option value="Serwis">Serwis</option>
                <option value="Logistyka">Logistyka</option>
                <option value="Księgowość">Księgowość</option>
                <option value="Oddział Wiktoryn">Oddział Wiktoryn</option>
                <option value="Oddział Żurominek">Oddział Żurominek</option>
            </select>
        </label>

        <div class="zespolInner">

        <?php
        $args = array(
            'post_type' => 'Pracownik',
            'posts_per_page' => 200,
			'orderby' => 'publish_date',
			'order' => 'ASC'
        );

        $query = new WP_Query($args);

        if($query->have_posts()) {
            while($query->have_posts()) {
                $query->the_post();
                $classes = "";
                for($i=0; $i<sizeof(get_field('kategorie')); $i++) {
                    $classes .= 'c_';
                    $classes .= strtolower(str_replace(' ', '_', get_field('kategorie')[$i]));
                    $classes .= ' ';
                }
                $id = strtolower(str_replace(' ', '_', get_field('kategoria')));
                ?>

                <div class="pracownik <?php echo $classes; ?>" id="<?php echo $id; ?>">
                    <img class="pracownikImg" src="<?php echo get_field('zdjecie'); ?>" alt="profilowe" />

                    <h3 class="pracownikName">
                        <?php echo get_field('imie_i_nazwisko'); ?>
                    </h3>
                    <h4 class="pracownikFunction">
                        <?php echo get_field('funkcja'); ?>
                    </h4>

                    <?php
                        if(get_field('telefon')) {
                            ?>

                            <div class="pracownikContact">
                                <img class="pracownikContactIcon" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/phone.svg';?>" alt="telefon" />
                                <h5 class="pracownikContactText">
                                    <a href="tel:<?php echo get_field('telefon'); ?>">
                                        <?php echo get_field('telefon'); ?>
                                    </a>
                                </h5>
                            </div>


                                <?php
                        }
                    ?>
                    <?php
                        if(get_field('komorka')) {
                            ?>
                            <div class="pracownikContact">
                                <img class="pracownikContactIcon" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/mobile.svg'; ?>" alt="komorka" />
                                <h5 class="pracownikContactText">
                                    <a href="tel:+<?php echo get_field('komorka'); ?>">
                                        <?php echo get_field('komorka'); ?>
                                    </a>
                                </h5>
                            </div>

                                <?php
                        }
                    ?>
                    <?php
                        if(get_field('adres_email')) {
                            ?>

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
                    ?>
                </div>

                <?php
            }
        }
        ?>
        </div>
    </div>
</main>

<?php
get_footer();
?>
