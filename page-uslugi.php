<?php
get_header();
?>

<!-- WYBIERZ PRODUCENTA -->
<main class="uslugiMain">
    <h1 class="sectionHeader">
        Usługi
    </h1>
    <div class="uslugiMainContent">
        <div class="uslugiMainContentItem">
            <img class="uslugiIcon" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/ubezpieczenie.svg'; ?>" alt="ubezpieczenie" />
            <button class="uslugiBtn" id="ubezpieczenieBtn" onclick="ubezpieczenieClick()">
                <span class="uslugiBtnText">Ubezpieczenie</span>
                <img class="arrowDown" id="ubezpieczenieArrow" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/arrow_down.svg'; ?>" alt="arrow" />
            </button>
            <div class="uslugiInfoWrapper1">
                <div class="uslugiInfo" id="ubezpieczenieInfo">
                    Nasza firma świadczy również usługi z zakresu ubezpieczeń- jesteśmy agentem ubezpieczeniowym. Nasz klient po zakupie maszyny nie musi szukać sobie firmy ubezpieczeniowej, u nas może od razu wykupić polisę. Ubezpieczamy maszyny rolnicze, jak również plony.
                </div>
            </div>
        </div>

        <div class="uslugiMainContentItem">
            <img class="uslugiIcon" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/finansowanie.svg'; ?>" alt="finansowanie" />
            <button class="uslugiBtn" id="finansowanieBtn" onclick="finansowanieClick()">
                <span class="uslugiBtnText">Finansowanie</span>
                <img class="arrowDown" id="finansowanieArrow" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/arrow_down.svg'; ?>" alt="arrow" />
            </button>
            <div class="uslugiInfoWrapper2">
                <div class="uslugiInfo" id="finansowanieInfo">
                    Dla nas najważniejszy jest klient. Wychodząc naprzeciw oczekiwaniom wszystkich konsumentów, oferujemy atrakcyjne warunki finansowania zakupu nowych maszyn od czołowych producentów, z którymi współpracujemy.
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
?>
