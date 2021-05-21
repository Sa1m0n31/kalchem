<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div class="siteHeaderSearchWrapper">
        <input class="siteHeaderSearchInput" type="text" value="" name="s" id="s" placeholder="Szukaj..." />
        <span class="lupa">
            <img class="lupaImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/search_small.svg'; ?>" alt="szukaj" />
        </span>
    </div>
</form>