<?php
/**
 * Primrose SiteOrigin functions and definitions.
 *
 * @package Primrose
 */

/**
 * Set recommended widgets.
 */
function primrose_siteorigin_widgets_groups( $widgets ) {
	$widgets['SiteOrigin_Widget_Editor_Widget']['groups'][] = 'primrose';
	$widgets['SiteOrigin_Widget_Image_Widget']['groups'][] = 'primrose';
	$widgets['SiteOrigin_Panels_Widgets_Layout']['groups'][] = 'primrose';
	return $widgets;
}
add_filter( 'siteorigin_panels_widgets', 'primrose_siteorigin_widgets_groups', 20 );

/**
 * Force activate the custom widgets.
 */
function primrose_siteorigin_widgets_bundle_active_widgets( $widgets ) {
	$widgets['sow-editor'] = true;
	$widgets['sow-image'] = true;

	return $widgets;
}
add_filter( 'siteorigin_widgets_active_widgets', 'primrose_siteorigin_widgets_bundle_active_widgets' );

/**
 * Set panels setting (FORCE CONFIGURATION).
 */
function primrose_siteorigin_panels_settings() {
	$configurations = get_option( 'siteorigin_panels_settings' );

	$configurations['responsive'] = true;
	$configurations['mobile-width'] = 767;
	$configurations['margin-bottom'] = 40;
	$configurations['margin-sides'] = 40;

	// Save changes.
	update_option( 'siteorigin_panels_settings', $configurations );
}
add_action( 'init', 'primrose_siteorigin_panels_settings', 1 );

/**
 * Empty cell class.
 */
function primrose_siteorigin_panels_render( $html, $post_id, $post ) {
	$html = preg_replace( '/>&nbsp;<\/(.*?)>/', '></$1>', $html );

	return $html;
}
add_filter( 'siteorigin_panels_render', 'primrose_siteorigin_panels_render', 10, 3 );