<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kalchem
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Mobile menu -->
<div class="mobileMenuList">
    <button class="closeMenuBtn" onclick="closeHamburger()">
        <img class="closeMenuBtnImg" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/close.png'; ?>" alt="exit" />
    </button>

<!--    <a href="--><?php //echo home_url(); ?><!--">-->
<!--        <img id="mobileMenuTopImg" class="siteHeaderTopKalchem" src="--><?php //echo get_bloginfo('stylesheet_directory') . '/img/kalchem-logo.png'; ?><!--" alt="kalchem" />-->
<!--    </a>-->

    <?php
    wp_nav_menu(array(
        'theme_location' => 'menu-1'
    ));
    ?>
</div>
<div class="container">
    <!-- HEADER -->
    <header class="siteHeader">
        <div class="siteHeaderTop">
            <a href="<?php echo home_url(); ?>">
                <img class="siteHeaderTopClass" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/claas-logo.png'; ?>" alt="class" />
            </a>

            <a href="<?php echo home_url(); ?>">
                <img class="siteHeaderTopKalchem" src="<?php echo get_bloginfo('stylesheet_directory') . '/img/kalchem-logo.png'; ?>" alt="kalchem" />
            </a>

            <?php get_search_form(); ?>
        </div>
        <menu class="siteHeaderMenu">
            <span class="siteMenuLeft"></span>
            <span class="siteMenuRight"></span>
                <!-- Desktop menu (>900px) -->
                <span class="desktopMenu">
                <?php
                    wp_nav_menu(array(
                            'theme_location' => 'menu-1'
                    ));
                ?>
                </span>
                <!-- Mobile menu (<900px) -->
                <div class="mobileMenu">
                    <a class="mobileMenuHomeBtn" href="<?php echo home_url(); ?>">
                        <img class='mobileMenuHomeImg' src="<?php echo get_bloginfo("stylesheet_directory") . '/img/home.svg'; ?>" alt="home" />
                    </a>

                    <button class="hamburgerMenu" onclick="hamburgerMenu()">
                        <span class="hamburgerLine"></span>
                        <span class="hamburgerLine"></span>
                        <span class="hamburgerLine"></span>
                    </button>

                    <!--<div class="siteHeaderSearchInputMobileWrapper">
                        <?php get_search_form(); ?>
                    </div>-->
                </div>
        </menu>
    </header>