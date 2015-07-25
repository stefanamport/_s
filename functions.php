<?php
/**
 * _s functions and definitions
 *
 * @package _s
 */

if ( ! function_exists( '_s_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function _s_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _s, use a find and replace
	 * to change '_s' to the name of your theme in all the template files
	 */
	load_theme_textdomain( '_s', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', '_s' ),
	) );

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

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( '_s_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // _s_setup
add_action( 'after_setup_theme', '_s_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _s_content_width() {
	$GLOBALS['content_width'] = apply_filters( '_s_content_width', 640 );
}
add_action( 'after_setup_theme', '_s_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function _s_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', '_s' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', '_s_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function _s_scripts() {
	wp_enqueue_style( '_s-style', get_stylesheet_uri() );

	wp_enqueue_script( '_s-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( '_s-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	      	// Eigenes Jquery
        	wp_deregister_script('jquery');
        	wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.js');
        	wp_enqueue_script('jquery');

        	//Flexslider
        	wp_enqueue_script( 'js-flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array( 'jquery' ),false,true);
        	
        	//modernizr
        	wp_enqueue_script( 'js-modernizr', get_template_directory_uri() . '/js/modernizr.js', array( 'jquery' ));
        	
        	//Doubletap to go
        	//wp_enqueue_script( 'js-doubletaptogo', get_template_directory_uri() . '/js/doubletaptogo.min.js', array( 'jquery' ));
        	
        	// Fancybox
        	wp_enqueue_script( 'js-fancybox', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.pack.js', array( 'jquery'));
        	//wp_enqueue_style( 'style-fancybox', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.css' );
        	
            //wp_enqueue_script( 'js-fancybox-thumbs', get_template_directory_uri() . '/js/fancybox/helpers/jquery.fancybox-thumbs.js', array( 'jquery'));
            //wp_enqueue_style( 'style-fancybox-thumbs', get_template_directory_uri() . '/js/fancybox/helpers/jquery.fancybox-thumbs.css' );
            
            // Jquer UI
            //wp_enqueue_script( 'js-jqui', get_template_directory_uri() . '/js/jquery-ui/jquery-ui.min.js', array( 'jquery'));
            //wp_enqueue_style( 'style-jqui', get_template_directory_uri() . '/js/jquery-ui/jquery-ui.min.css' );
            //wp_enqueue_script( 'js-jquitouchpunch', get_template_directory_uri() . '/js/jquery-ui/jquery.ui.touch-punch.min.js', array( 'jquery'));

            
			
			//wp_enqueue_script( 'js-parallax', get_template_directory_uri() . '/js/jquery.parallax.min.js', array( 'jquery'),false ,true);
        	//wp_enqueue_script( 'js-skrollr', get_template_directory_uri() . '/js/skrollr.min.js', array( 'jquery'),false ,true);
			//wp_enqueue_script( 'js-tweenmax', get_template_directory_uri() . '/js/tweenmax.js', array( 'jquery'),false ,false);
			//wp_enqueue_script( 'js-scrollmagic', get_template_directory_uri() . '/js/jquery.scrollmagic.min.js', array( 'jquery'),false ,false);
			
        	//wp_enqueue_script( 'js-scrollto', get_template_directory_uri() . '/js/jquery.scrollTo.min.js', array( 'jquery'),false ,true);
        	//wp_enqueue_script( 'js-localscroll', get_template_directory_uri() . '/js/jquery.localScroll.min.js', array( 'jquery'),false ,true);
        	
        	
        	// Google Maps
        	//wp_enqueue_script( 'js-gmapsapi', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCctNzu3goNsUn9RLKeINXFiaXrzquQewo&sensor=false',false,false ,true);
        	//wp_enqueue_script( 'js-gmaps', get_template_directory_uri() . '/js/gMap.js', array( 'jquery'),false ,true);
        	
        	// JS Isotope
        	//wp_enqueue_script( 'js-imagesloaded', get_template_directory_uri() . '/js/imagesloaded.js', array( 'jquery'),false ,true);
        	//wp_enqueue_script( 'js-isotope', get_template_directory_uri() . '/js/isotope.js', array( 'jquery'),false ,true);
        	
        	
            // Jqeruy Waypoints
            //wp_enqueue_script( 'js-waypoints', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array( 'jquery'),false ,true);


        	// JS scripts.js
        	wp_enqueue_script( 'js-ini', get_template_directory_uri() . '/js/init.js', array( 'jquery'),false ,true);
        	
            // CSS Files
        	wp_enqueue_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Alegreya+Sans:100,100italic,300,400,500,700,300italic,400italic,500italic,700italic');


}
add_action( 'wp_enqueue_scripts', '_s_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


// Allgemeine Template Einstellungen
    require_once('includes/eigene-funktionen/wp-head.php');

    require_once('includes/eigene-funktionen/image-sizes.php');
    
    require_once('includes/eigene-funktionen/menu-walkers.php');
    
    require_once('includes/eigene-funktionen/no-rss-feed.php');


// Standard Funktionen laden
    require_once('includes/eigene-funktionen/function-make-image.php');
    require_once('includes/eigene-funktionen/meta-description.php');
    require_once('includes/eigene-funktionen/sublevel-menu.php');
    require_once('includes/eigene-funktionen/function-ultimateParent.php');
    
// Post Types
	require_once('includes/eigene-funktionen/post-types.php');

// Wordpress Design Anpassen & Backend Restriktionen
    require_once('includes/eigene-funktionen/function-make-image.php');


// Backend- & Designanpassungen
    require_once('includes/eigene-funktionen/backend-restriktionen-allg.php');
    require_once('includes/eigene-funktionen/backend-restriktionen-noAdmin.php');
    
    require_once('includes/eigene-funktionen/backend-template-hinzkunz.php');

// Tiny MCE Classes
	require_once('includes/eigene-funktionen/tinyMce-Styles.php');


// Helper Functions
    // require_once('includes/list-hooked-functions.php');

    // Wordpress Generator Tag entfernen
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'locale_stylesheet');
        remove_action('wp_head', 'rel_canonical');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'wp_shortlink_wp_head');
        remove_action('wp_head', 'rsd_link');
