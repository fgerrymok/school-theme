<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package School_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function school_theme_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'school_theme_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function school_theme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'school_theme_pingback_header' );


// Change placeholder of title on the CPT student 
// function change_default_title( $title ){

// 	$screen = get_current_screen();
	
// 	if ( 'sc-student' == $screen->post_type ){
// 	$title = 'Add student name';
// 	}
	
// 	return $title;
// }
	
// add_filter( 'custom_placeholder_students', 'change_default_title' );


// Change Excerpt Length to 20 words
function sc_excerpt_length( $length ) {
	if ( get_post_type() ==  'sc-student'  ) {
        return 25; 
    }
}

add_filter( 'excerpt_length', 'sc_excerpt_length', 999 );

// Change Excerpt more
function sc_excerpt_more( $more ) {
	$more = '<a class="read-more" href="'.esc_url(get_permalink()).'">' . __('Read more about the student...', 'sc') . '</a>';
	return $more;
}
add_filter( 'excerpt_more', 'sc_excerpt_more', 999);


