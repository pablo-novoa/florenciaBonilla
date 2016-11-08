<?php
/**
 * Procedures which run automatically for version migrating
 *
 * @package Primrose
 */

/**
 * Create version option key.
 */
if ( ! get_option( PRIMROSE_VERSION_OPTION_KEY ) ) {
	add_option( PRIMROSE_VERSION_OPTION_KEY, '1.0.0' );
}

/**
 * Migrate to v1.1.0
 */
if ( version_compare( '1.1.0', get_option( PRIMROSE_VERSION_OPTION_KEY ) ) > 0 ) {
	/**
	 * New options structure.
	 */
	$old = get_theme_mods();

	// Check if there is existing data.
	if ( ! empty( $old ) ) {
		// Define new values array.
		$new = array();

		// Must filled values (for WPML string translation).
		$new['footer_instagram_link_text'] = primrose_get_theme_mod( 'footer_instagram_link_text' );
		$new['footer_copyright_text'] = primrose_get_theme_mod( 'footer_copyright_text' );
		$new['blog_index_read_more_text'] = primrose_get_theme_mod( 'blog_index_read_more_text' );

		// Join the array.
		$join = array_merge( $old, $new );

		// Save new options.
		update_option( PRIMROSE_CUSTOMIZER_OPTION_KEY, $join );
	}

	/**
	 * Update migration status.
	 */
	update_option( PRIMROSE_VERSION_OPTION_KEY, '1.1.0' );
}

/**
 * Migrate to v1.2.0
 */
if ( version_compare( '1.2.0', get_option( PRIMROSE_VERSION_OPTION_KEY ) ) > 0 ) {
	/**
	 * Migrate Customizer options.
	 */
	$customizer = get_option( PRIMROSE_CUSTOMIZER_OPTION_KEY, array() );

	// Check if there is existing data.
	if ( ! empty( $customizer ) ) {
		// Footer widgets area columns.
		if ( array_key_exists( 'footer_widgets', $customizer ) ) {
			// If footer widgets is activated, create the new option model.
			if ( ! empty( $customizer['footer_widgets'] ) ) {
				$customizer['footer_widgets_area_columns'] = array(
					array( 'width' => 33.33 ),
					array( 'width' => 33.33 ),
					array( 'width' => 33.33 ),
				);
			}
		}

		// Save new options.
		update_option( PRIMROSE_CUSTOMIZER_OPTION_KEY, $customizer );
	}

	/**
	 * Update migration status.
	 */
	update_option( PRIMROSE_VERSION_OPTION_KEY, '1.2.0' );
}