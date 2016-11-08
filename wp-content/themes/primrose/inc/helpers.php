<?php
/**
 * Custom helper functions to process data.
 *
 * @package Primrose
 */

/**
 * Increment number generator for unique ID.
 */
function primrose_increment_number() {
	global $primrose_data;
	if ( empty( $primrose_data['increment'] ) ) $primrose_data['increment'] = 0;
	return ++$primrose_data['increment'];
}

/**
 * Generate Google Fonts URL.
 */
function primrose_generate_google_fonts_url() {
	global $primrose_data;

	$filtered_fonts = array();
	$fonts = array();
	$types = array_keys( $primrose_data['typography_types'] );
	
	foreach ( $types as $type ) {
		$family = primrose_get_theme_mod( 'typography_' . $type . '_font_family' );
		
		$variant = '';
		for ( $weight = 100; $weight <= 900; $weight += 100 ) {
			$variant .= $weight . ',' . $weight . 'italic';
			if ( $weight < 900 ) {
				$variant .= ',';
			}
		}

		// Skip Standard Font.
		if ( in_array( $family, array( 'serif', 'sans-serif', 'monospace' ) ) ) continue;

		// Add / Create Font Family.
		if ( ! array_key_exists( $family, $filtered_fonts ) ) $filtered_fonts[ $family ] = array();

		// Add / Create Font Variants.
		if ( ! in_array( $variant, $filtered_fonts[ $family ] ) ) $filtered_fonts[ $family ][] = $variant;
	}

	// Fonts.
	foreach ( $filtered_fonts as $key => $value ) {
		$fonts[] = str_replace( ' ', '+', $key ) . ':' . implode( ',', $value );
	}
	if ( empty( $fonts ) ) return '';

	// Subsets.
	$subsets = primrose_get_theme_mod( 'typography_subsets' );
	if ( is_serialized( $subsets ) ) $subsets = unserialize( $subsets );
	$subsets = (array) $subsets;

	// Generate URL.
	$url = '//fonts.googleapis.com/css?family=' . implode( '|', $fonts ) . '&subset=' . implode( ',', $subsets );

	return $url;
}

/**
 * Format fonts for CSS.
 */
function primrose_format_font_family_css( $value ) {
	switch ( $value ) {
		case 'serif':
			return 'Georgia,Times,"Times New Roman",serif';
			break;

		case 'sans-serif':
			return '"Helvetica Neue",Helvetica,Arial,sans-serif';
			break;

		case 'monospace':
			return 'Monaco,"Lucida Sans Typewriter","Lucida Typewriter","Courier New",Courier,monospace';
			break;
		
		default:
			return '"' . $value . '"';
			break;
	}
}

/**
 * Get attachment post object by slug (post name).
 */
function primrose_get_attachment_by_slug( $slug ) {
	$attachment = get_posts( array(
		'post_type' => 'attachment',
		'name' => sanitize_title ($slug ),
		'posts_per_page' => 1,
		'post_status' => 'inherit',
	) );
	return $attachment ? array_pop( $attachment ) : false;
}

/**
 * Find attachment ID from given URL.
 */
function primrose_get_attachment_id_from_url( $url ) {
	$post_id = attachment_url_to_postid( $url );

	if ( ! $post_id ) {
		$dir = wp_upload_dir();
		$path = $url;
		if ( 0 === strpos( $path, $dir['baseurl'] . '/' ) ) {
			$path = substr( $path, strlen( $dir['baseurl'] . '/' ) );
		}

		if ( preg_match( '/^(.*)(\-\d*x\d*)(\.\w{1,})/i', $path, $matches ) ) {
			$url = $dir['baseurl'] . '/' . $matches[1] . $matches[3];
			$post_id = attachment_url_to_postid( $url );
		}
	}

	return (int) $post_id;
}

/**
 * Get customizer option's value.
 */
function primrose_get_theme_mod( $key ) {
	return apply_filters( 'theme_mod_' . $key, SingleStroke_Kirki::get_option( 'primrose', $key ) );
}

/**
 * Custom Sanitize Callback, return RAW.
 */
function primrose_unfiltered_sanitize( $value ) {
	return $value;
}

/**
 * Return dataset array of subset choices.
 */
function primrose_font_subsets() {
	if ( class_exists( 'Kirki' ) && class_exists( 'Kirki_Fonts' ) ) {
		$subsets_available = Kirki_Fonts::get_google_font_subsets();
		unset( $subsets_available['all'] );
		return $subsets_available;
	} else {
		return array();
	}
}

/**
 * Return dataset array of font choices.
 */
function primrose_font_choices() {
	$defaults = array(
		'serif' => 'serif',
		'sans-serif' => 'sans-serif',
		'monospace' => 'monospace',
	);
	$fonts = array();

	if ( class_exists( 'Kirki' ) && class_exists( 'Kirki_Fonts' ) ) {
		$fonts = Kirki_Fonts::get_font_choices();
		ksort( $fonts );
		foreach ( $defaults as $key => $value ) {
			unset( $fonts[ $key ] );
		}
		$fonts = $defaults + $fonts;
	} else {
		$fonts = $defaults;
	}

	return $fonts;
}

/**
 * Return dataset array of category choices.
 */
function primrose_category_choices() {
	$cats = array();
	$cats['0'] = esc_html__( '-- none --', 'primrose' );
	foreach ( get_categories() as $key => $obj ) {
		$cats[ $obj->term_id ] = $obj->name;
	}
	return $cats;
}