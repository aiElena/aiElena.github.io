<?php
/**
 * woo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package woo
 */

add_filter('show_admin_bar', '__return_false'); // отключить
//add_filter('show_admin_bar', '__return_true'); 

if ( ! function_exists( 'woo_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function woo_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on woo, use a find and replace
		 * to change 'woo' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'woo', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'woo' ),
			'menu-2' => esc_html__( 'Footer', 'woo' ),
			'menu-f1' => esc_html__( 'Footer1', 'woo' ),
			'menu-f2' => esc_html__( 'Footer2', 'woo' ),
			'menu-f3' => esc_html__( 'Footer3', 'woo' ),
			'menu-f4' => esc_html__( 'Footer4', 'woo' ),
		) );
                //menu bootstrap


// Include custom navwalker
require_once('bs4navwalker.php');

// Register WordPress nav menu
register_nav_menu('top', 'Top menu');


		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'woo_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'woo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function woo_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'woo_content_width', 640 );
}
add_action( 'after_setup_theme', 'woo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function woo_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'woo' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'woo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'woo_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function woo_scripts() {
	wp_enqueue_style( 'woo-style', get_stylesheet_uri() );

	wp_enqueue_script( 'woo-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'woo-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'woo_scripts' );

function theme_enqueue_scripts() {
	wp_enqueue_style( 'Font_Awesome', 'https://use.fontawesome.com/releases/v5.6.1/css/all.css' );
	wp_enqueue_style( 'Bootstrap_css', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
	wp_enqueue_style( 'MDB', get_template_directory_uri() . '/assets/css/mdb.min.css' );
	wp_enqueue_style( 'lightslider', get_template_directory_uri() . '/assets/lightslider-master/src/css/lightslider.css' );
	wp_enqueue_style( 'Style', get_template_directory_uri() . '/assets/css/style.css' );
	wp_enqueue_script( 'jQuery', get_template_directory_uri() . '/assets/js/jquery-3.4.1.min.js', array(), '3.4.1', true );
	wp_enqueue_script( 'Tether', get_template_directory_uri() . '/assets/js/popper.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'Bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'MDB', get_template_directory_uri() . '/assets/js/mdb.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'lightslider', get_template_directory_uri() . '/assets/lightslider-master/src/js/lightslider.js', array(), '1.0.0', true );
	wp_enqueue_script( 'lightslider1', get_template_directory_uri() . '/assets/lightslider-master/src/js/lightslider1.js', array(), '1.0.0', true );
	wp_enqueue_script( 'Script', get_template_directory_uri() . '/assets/js/scripts.js', array(), '5.3', true  );
	}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );
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

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

//========


add_action('form_search', 'header_form_search', 15);

function header_form_search() {
    get_template_part('woocommerce/product-searchform');
}

//acf maps
function my_acf_google_map_api( $api ){
	
	$api['key'] = 'AIzaSyDubzSKVlBye9tVxy2huOy046M2BOx1fR4';
	
	return $api;
	
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

///---
add_filter( 'woocommerce_product_tabs', 'sb_woo_remove_reviews_tab', 98);
function sb_woo_remove_reviews_tab($tabs) {
 
unset($tabs['reviews']);
 
return $tabs;
}
//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
add_action('woocommerce_before_main_content', 'woocommerce_template_single_title', 30);


//remove_action('woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20); // img

//--menu--
//add_action( 'admin_menu', 'myRenamedPlugin' );
//
//function myRenamedPlugin() {
//    global $menu;
//    print_r($menu);
//}
//function edit_admin_menus() {
//    global $menu;
//        global $submenu;
//// здесь будут пункты меню, которые нужно менять
//    $menu[26][0] = 'Объект недвижемости'; // Изменить название
//    $menu[26][1] = 'Объект'; // Изменить название
//    $submenu[26][1] = 'Все';
//}
//add_action( 'admin_menu', 'edit_admin_menus' );

add_filter('user_contactmethods', 'my_user_contactmethods');
 
function my_user_contactmethods($user_contactmethods){
 
  $user_contactmethods['phone_number'] = 'Номер телефона';
 
  return $user_contactmethods;
}

add_filter('gettext', 'translate_text');
add_filter('ngettext', 'translate_text');
 
function translate_text($translated) {
$translated = str_ireplace('Товаров', 'Объектов', $translated);
$translated = str_ireplace('Товары', 'Объекты', $translated);
$translated = str_ireplace('Категории товаров', 'Все объекты недвижимости', $translated);
$translated = str_ireplace('Метки товаров', 'Города', $translated);
return $translated;
}


function iconic_woo_product_price_shortcode( $atts ) {
	$atts = shortcode_atts( array(
		'id' => null
	), $atts, 'iconic_product_price' );
 
	if ( empty( $atts[ 'id' ] ) ) {
		return '';
	}
 
	$product = wc_get_product( $atts['id'] );
 
	if ( ! $product ) {
		return '';
	}
 
	return $product->get_price_html();
}
add_shortcode('iconic_product_price', 'iconic_woo_product_price_shortcode');