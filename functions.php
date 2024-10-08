<?php
/**
 * School Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package School_Theme
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
function school_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on School Theme, use a find and replace
		* to change 'school-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'school-theme', get_template_directory() . '/languages' );

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
	// custom crop size
	add_image_size( 'custom', 300, 200, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'header-nav' => esc_html__( 'Menu 1', 'school-theme' ),
			'footer-nav' => esc_html__('Footer Navigation', 'school-theme'),
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
			'school_theme_custom_background_args',
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

	add_theme_support( 'align-wide' );
	add_theme_support( 'align-full' );

	// enqueue Font Open Sans
	wp_enqueue_style (
		'open-sans-font', // unique handle
		'https://fonts.googleapis.com/css2?family=New+Amsterdam&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap', // url to the CSS file
		array(), // Dependencies
		null, // Version Number, for google fonts always set to null
	);

}
add_action( 'after_setup_theme', 'school_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function school_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'school_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'school_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function school_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'school-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'school-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'school_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function school_theme_scripts() {
	wp_enqueue_style( 'school-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'school-theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'school-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'school_theme_scripts' );

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



// Removing all title prefix
add_filter( 'get_the_archive_title_prefix', '__return_empty_string' );

// Add, Remove, or Edit Custom Comment Form Fields
function custom_comment_form_fields( $default_fields ) {
	$default_fields['logged_in_as'] = 	"<p class='comment-notes'>
											<span id='email-notes'>Your email address will not be published.</span>
											<span class='required-field-message'>Required fields are marked <span class='required'>*</span></span>
										</p>";
	$default_fields['comment_field'] .= "<p class='comment-form-author'>
											<label for='author'>
												Name 
												<span class='required'>*</span>
											</label>
											<input id='author' name='author' type='text' required/>
										</p>";
	$default_fields['comment_field'] .= "<p class='comment-form-email'>
											<label for='email'>
												Email 
												<span class='required'>*</span>
											</label>
											<input id='email' name='email' type='email' required/>
										</p>";
	$default_fields['comment_field'] .= "<p class='comment-form-url'>
											<label for='url'>Website </label>
											<input id='url' name='url' type='url'/>
										</p>";

	return $default_fields;
}

add_filter('comment_form_defaults', 'custom_comment_form_fields');

/**
 * Custom Post Types and Taxonomies.
 */
require get_template_directory() . '/inc/cpt-taxonomy.php';

// Use this to switch from Block editor to Classic Editor
// function fwd_post_filter( $use_block_editor, $post ) {
//     // Add IDs to the array
//     $page_ids = array( 61, 68 );
//     if ( in_array( $post->ID, $page_ids ) ) {
//         return false;
//     } else {
//         return $use_block_editor;
//     }
// }
// add_filter( 'use_block_editor_for_post', 'fwd_post_filter', 10, 2 );


// Change Default Title in Staff CPT to Custom Title
function change_default_title( $title ) {
	$screen = get_current_screen();
	if ( 'sc-staff' === $screen->post_type ) {
		$title = "Add Staff Name";
	}
	return $title;
}

add_filter('enter_title_here', 'change_default_title');

// Adding custom logo (for the footer)
add_theme_support( 'custom-logo' );

function school_theme_custom_logo_setup() {
	$defaults = array(
		'height' 				=> 240,
		'width' 				=> 240,
		'flex-height'		    => true,
		'flex-width' 			=> true,
	);
	add_theme_support( 'custom-logo' );
}

add_action('after_setup_theme', 'school_theme_custom_logo_setup');

// AOS
function add_aos_library() {

	if (is_home()) {
		wp_enqueue_style( 
			'aos-css', 
			'https://unpkg.com/aos@2.3.1/dist/aos.css',
			 array(), 
			'2.3.1',);
		
		wp_enqueue_script( 
			'aos-js', 
			'https://unpkg.com/aos@2.3.1/dist/aos.js', 
			array(), 
			'2.3.1', 
			true );
	
		wp_add_inline_script( 'aos-js', 'AOS.init();' );
	}
}
add_action( 'wp_enqueue_scripts', 'add_aos_library' );

// Mobile Nav Menu Toggle

function toggle_mobile_menu() {

	wp_enqueue_script( 
		'toggle-menu-js', 
		get_template_directory_uri() . '/js/toggle-menu.js', 
		array(), 
		'1.0.0', 
		true );

}
add_action( 'wp_enqueue_scripts', 'toggle_mobile_menu' );