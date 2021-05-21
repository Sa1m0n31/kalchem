</div> <!-- End of page container -->

<!-- FOOTER -->
<footer class="footer">
    <ul class="footerFirst">
        <li><a href="<?php echo get_page_link(get_page_by_title('Metryczka')->ID); ?>">Metryczka</a></li>
        <li><a href="<?php echo get_page_link(get_page_by_title('Ochrona danych osobowych')->ID); ?>">Ochrona danych</a></li>
        <li><a href="<?php echo get_page_link(get_page_by_title('Ogólne warunki handlowe')->ID); ?>">Ogólne warunki handlowe</a></li>
    </ul>
    <div class="footerSecond">
        <h3>Znajdź nas na Facebooku</h3>
        <a href="https://www.facebook.com/kalchem" rel="noreferrer" target="_blank">
            <img class="facebook" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/facebook.svg'; ?>" alt="facebook" />
        </a>
    </div>

    <div class="footerThird">
        Wszystkie prawa zastrzeżone &copy; Kalchem sp. z.o.o
    </div>
    <div class="footerFourth">
        Projekt i wykonanie <a href="https://skylo.pl" rel="noreferrer" target="_blank">skylo.pl</a>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
