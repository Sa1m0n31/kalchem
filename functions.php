<?php
/**
 * Kalchem functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Kalchem
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'kalchem_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function kalchem_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Kalchem, use a find and replace
		 * to change 'kalchem' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'kalchem', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'kalchem' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'kalchem_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'kalchem_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kalchem_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kalchem_content_width', 640 );
}
add_action( 'after_setup_theme', 'kalchem_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kalchem_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'kalchem' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'kalchem' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'kalchem_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kalchem_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css?n=8', array(), _S_VERSION );
	wp_enqueue_style('mobile', get_stylesheet_directory_uri() . '/mobile.css?n=8', array(), 1.0);

	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js?n=1', array('siema', 'gsap', 'google-maps', 'jquery'), _S_VERSION, true );
	wp_enqueue_script( 'siema', get_template_directory_uri() . '/js/siema.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/gsap.min.js', array(), _S_VERSION, true );
    wp_enqueue_script("google-maps", "https://maps.googleapis.com/maps/api/js?key=AIzaSyApCLw41Ys5mGI9Na62DRNnJc5IZS2zAeo&callback=initMap", array(), "1.0", true);
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.js', array(), _S_VERSION, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kalchem_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Add pracownik post type
function kalchem_add_pracownik_post_type() {
    $supports = array(
        'title',
    );

    $labels = array(
        'name' => 'Pracownicy'
    );

    $args = array(
        'labels'               => $labels,
        'supports'             => $supports,
        'public'               => true,
        'capability_type'      => 'post',
        'rewrite'              => array( 'slug' => 'events' ),
        'has_archive'          => true,
        'menu_position'        => 30,
        'menu_icon'            => 'dashicons-universal-access'
    );

    register_post_type("Pracownik", $args);
}

add_action("init", "kalchem_add_pracownik_post_type");

// Add dostawca post type
function kalchem_add_dostawca_post_type() {
    $supports = array(
        'title',
    );

    $labels = array(
        'name' => 'Producenci'
    );

    $args = array(
        'labels'               => $labels,
        'supports'             => $supports,
        'public'               => true,
        'capability_type'      => 'post',
        'rewrite'              => array( 'slug' => 'producenci' ),
        'has_archive'          => true,
        'menu_position'        => 30,
        'menu_icon'            => 'dashicons-performance'
    );

    register_post_type("Dostawca", $args);
}

add_action("init", "kalchem_add_dostawca_post_type");

// Add slider post type
function kalchem_add_slider_post_type() {
    $supports = array(
        'title',
        'editor',
        'date'
    );

    $labels = array(
        'name' => 'Slider'
    );

    $args = array(
        'labels'               => $labels,
        'supports'             => $supports,
        'public'               => true,
        'capability_type'      => 'post',
        'rewrite'              => array( 'slug' => '' ),
        'has_archive'          => true,
        'menu_position'        => 30,
        'menu_icon'            => 'dashicons-welcome-view-site'
    );

    register_post_type("Slider", $args);
}

add_action("init", "kalchem_add_slider_post_type");

// Add maszyny claas post type
function kalchem_add_claas_post_type() {
    $supports = array(
        'title'
    );

    $labels = array(
        'name' => 'Maszyny Claas'
    );

    $args = array(
        'labels'               => $labels,
        'supports'             => $supports,
        'public'               => true,
        'capability_type'      => 'post',
        'rewrite'              => array( 'slug' => '' ),
        'has_archive'          => true,
        'menu_position'        => 30,
        'menu_icon'            => 'dashicons-car'
    );

    register_post_type("Claas", $args);
}

add_action("init", "kalchem_add_claas_post_type");

/* Ajax request for employees */

add_action('wp_ajax_get_emplyees', 'kalchem_get_emplyees');
add_action('wp_ajax_nopriv_get_emplyees', 'kalchem_get_emplyees');
