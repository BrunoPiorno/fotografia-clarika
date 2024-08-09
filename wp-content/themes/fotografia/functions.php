<?php
/**
 * fotografia functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fotografia
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fotografia_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on fotografia, use a find and replace
		* to change 'fotografia' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'fotografia', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'fotografia' ),
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
			'fotografia_custom_background_args',
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
add_action( 'after_setup_theme', 'fotografia_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fotografia_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fotografia_content_width', 640 );
}
add_action( 'after_setup_theme', 'fotografia_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function fotografia_scripts()
{
	wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_enqueue_script('swiper', get_template_directory_uri() . '/js/vendor/swiper.js', array('jquery-core'), '', true);
	wp_enqueue_script('theme-functions', get_template_directory_uri() . '/js/theme.min.js', array('jquery-core', 'swiper'), _S_VERSION, true);
	wp_localize_script('theme-functions', 'WP', array('ajaxurl' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'fotografia_scripts');

add_action('admin_enqueue_scripts', function () {
	wp_enqueue_script('swiper', get_template_directory_uri() . '/js/vendor/swiper.js', array('jquery-core'), '', true);
});

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/theme.php';
require get_template_directory() . '/inc/posttypes.php';
require get_template_directory() . '/inc/acf-fields.php';
require get_template_directory() . '/inc/blocks.php';

require_once get_template_directory() . '/inc/custom-contact.php';