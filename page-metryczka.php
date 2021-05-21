<?php
get_header();
?>

<main class="aktualnosciPage">
<h1 class="sectionHeader">
    <?php echo the_title(); ?>
</h1>

    <div class="footerPageMain">
        <?php
            the_content();
        ?>
    </div>

</main>

<?php
get_footer();
?>
