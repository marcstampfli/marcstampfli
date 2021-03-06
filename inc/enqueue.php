<?php
/**
 * UnderStrap enqueue scripts
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function understrap_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.min.css' );
		wp_enqueue_style( 'understrap-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version );

		wp_enqueue_script( 'jquery' );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );
		wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_enqueue_style( 'animate-css', get_stylesheet_directory_uri() . '/css/animate.css' );
    	wp_enqueue_script( 'wow-js', get_template_directory_uri() . '/js/wow.min.js', array(), '1.0.0', true );

		wp_enqueue_script( 'typed-js', get_template_directory_uri() . '/js/typed.min.js', array(), '2.0.12', true );

		wp_enqueue_script( 'isotope-js', 'https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js', array(), '2.1.11', true );
		wp_enqueue_script( 'imagesloaded-js', 'https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js', array(), '4.1.4', true );

		wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom.js', array(), '1.0.0', true );
	}
} // End of if function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );
