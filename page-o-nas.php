<?php
get_header();
?>

<!-- O NAS -->
<main class="oNas">
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
            <img class="contentImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/kalchem-logo.png'?>" alt="zurominek" />
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
            <img class="contentImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/kalchem-logo.png'?>" alt="wiktoryn" />
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
        O nas
    </h1>

    <div class="oNasInner">
        <img class="firmaImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/Firma.png'; ?>" alt="kalchem" />
        <h2 class="firmaTitle">
            PHZ Kalchem Sp. z o.o.
        </h2>
        <p class="firmaDescription">
            Od momentu powstania CLAAS Polska SP. z o.o., autoryzowanym dealerem CLAAS na części województw kujawsko-pomorskiego, warmińsko-mazurskiego i mazowieckiego jest firma PHZ KALCHEM Sp. z o.o.
        </p>
        <p class="firmaDescription">
            Podstawę oferty firmy tworzy cały program maszyn CLAAS wraz ze sprzedażą oryginalnych części zamiennych i pełną obsługą serwisową.
        </p>
        <p class="firmaDescription">
            Ofertę tę uzupełniają maszyny towarzyszące wiodących europejskich producentów: Horsch, Hardi, Kongskilde, Maschio Gaspardo, Umega, Pichon i innych.
        </p>
        <p class="firmaDescription">
            CLAAS jest niemiecką firmą rodzinną oraz wiodącym światowym producentem maszyn rolniczych, który zatrudnia ponad 9000 pracowników przy rocznych obrotach przekraczających trzy miliardy euro. Liczne spółki zależne, w tym od listopada 2009 r. także spółka handlowa w Polsce o nazwie CLAAS Polska Sp. z o.o. oraz 14 zakładów produkcyjnych na całym świecie, gwarantują wszystkim klientom bezpośredni kontakt z firmą. Kombajny zbożowe CLAAS zdobyły wiodącą pozycję na rynku europejskim, a sieczkarnie polowe CLAAS zajmują pierwsze miejsce w skali światowej. Paleta produktów obejmuje także ciągniki, prasy kostkujące i rolujące, maszyny do zbioru użytków zielonych, ładowacze teleskopowe i najnowszą technologię informacyjną w dziedzinie rolnictwa.
        </p>
    </div>

    <!-- MAPA ODDZIALOW -->
    <div class="mapa">
        <span id="oddzialyMapa"></span>
        <h2 class="greenHeader">
            Oddziały
        </h2>

        <div id="map">

        </div>
    </div>

    <!-- ZESPOL -->
    <div class="zespol">
        <h2 class="greenHeader">
            Zespół
        </h2>
        <img class="zespolImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/zespol.png'; ?>" alt="kalchem-zespol" />

        </div>
    </div>
</main>

<?php
get_footer();
?>
