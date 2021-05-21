<?php
get_header();
?>

<main class="kalendarzPage">
    <h1 class="sectionHeader">
        Kalendarz wydarzeń
    </h1>

    <div class="kalendarzPageInner">
        <?php
           the_content();
        ?>
    </div>
</main>


<?php
get_footer();
?>
