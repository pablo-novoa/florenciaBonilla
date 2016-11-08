<?php
/**
 * Primrose Child theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Primrose
 */

/**
 * Load Child Theme styles.
 */
function primrose_child_scripts() {
	$theme_data = wp_get_theme();
	wp_enqueue_style( 'primrose-child', get_stylesheet_uri(), array( 'primrose' ), $theme_data->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'primrose_child_scripts', 20 );


/**
 * Load Child Theme languages.
 */
function primrose_child_after_setup_theme() {
	load_child_theme_textdomain( 'primrose', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'primrose_child_after_setup_theme' );


/**
 * Add new Social Icons.
 */
function primrose_child_social_media( $links ) {
	// Add your new social media links
	// All social media icons available here: http://fontawesome.io/icons/#brand
	// Copy paste the icon slug without "fa-", e.g. "fa-skype" -> "skype"
	// Add it to the $links array

	// $links['skype'] = __( 'Skype', 'primrose' );
	// $links['vk'] = __( 'VKontakte', 'primrose' );

	return $links;
}
add_filter( 'primrose_user_links', 'primrose_child_social_media' );
add_filter( 'primrose_social_media', 'primrose_child_social_media' );
add_filter( 'singlestroke_social_media', 'primrose_child_social_media' );