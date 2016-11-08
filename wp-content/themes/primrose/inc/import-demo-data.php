<?php
/**
 * Import demo data functions.
 *
 * @package Primrose
 */

/**
 * Demo data list.
 */
function primrose_ocdi_import_files( $list ) {
	$list[] = array(
		'import_file_name'           => 'Demo Data v1.2',
		'import_file_url'            => PRIMROSE_DEMO . '/default/posts.xml',
		'import_widget_file_url'     => PRIMROSE_DEMO . '/default/widgets.json',
		'import_customizer_file_url' => PRIMROSE_DEMO . '/default/customizer.ser',
		'import_preview_image_url'   => PRIMROSE_DEMO . '/default/thumbnail.png',
	);
	return $list;
}
add_filter( 'pt-ocdi/import_files', 'primrose_ocdi_import_files' );

/**
 * Delete default posts.
 */
function primrose_ocdi_delete_defaults_posts() {
	wp_delete_post( 1, true ); // "Hello world!"
	wp_delete_post( 2, true ); // "Sample Page"
	wp_delete_post( 3, true ); // "(Auto Draft)"
	wp_delete_post( 4, true ); // "Contact Form 1"
}
add_action( 'import_start', 'primrose_ocdi_delete_defaults_posts', 99 );

/**
 * WooCommerce import compatibility for attribute taxonomies.
 */
function primrose_ocdi_woocommerce_attribute_taxonomies() {
	if ( class_exists( 'WooCommerce' ) ) {
		global $wpdb;
		$terms = array(
			'pa_finish' => array(
				'label' => 'Finish',
				'name'  => 'finish',
			),
		);

		// Snippet is taken with modification from: woocommerce/includes/admin/class-wc-admin-importer.php.
		foreach ( $terms as $taxonomy => $term ) {
			if ( strstr( $taxonomy, 'pa_' ) ) {
				if ( ! taxonomy_exists( $taxonomy ) ) {
					// Create the taxonomy.
					if ( ! in_array( $term['name'], wc_get_attribute_taxonomies() ) ) {
						$attribute = array(
							'attribute_label'   =>  $term['label'],
							'attribute_name'    =>  $term['name'],
							'attribute_type'    => 'select',
							'attribute_orderby' => 'menu_order',
							'attribute_public'  => 0
						);
						$wpdb->insert( $wpdb->prefix . 'woocommerce_attribute_taxonomies', $attribute );
						delete_transient( 'wc_attribute_taxonomies' );
					}

					// Register the taxonomy now so that the import works!
					register_taxonomy( $taxonomy, array( 'product' ), array(
						'hierarchical' => true,
						'show_ui'      => false,
						'query_var'    => true,
						'rewrite'      => false,
					) );
				}
			}
		}
	}
}
add_action( 'import_start', 'primrose_ocdi_woocommerce_attribute_taxonomies', 99 );

/**
 * Remove default widgets on sidebar.
 */
function primrose_ocdi_before_widgets_import( $selected_import ) {
	$sidebar_widgets = get_option( 'sidebars_widgets' );
	if ( isset( $sidebar_widgets['sidebar'] ) ) {
		$sidebar_widgets['sidebar'] = array();
		update_option( 'sidebars_widgets', $sidebar_widgets );
	}
}
add_action( 'pt-ocdi/before_widgets_import', 'primrose_ocdi_before_widgets_import' );

/**
 * Add intro text.
 */
function primrose_ocdi_plugin_intro_text( $default_text ) {
	$default_text .= '<div class="ocdi__intro-text"><p>' . esc_html__( 'Some images might be converted to blank gray images, due to a copyright policy from the original owner. It is normal, and you can easily change them to your own images.', 'primrose' ) . '</p></div>';

	return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'primrose_ocdi_plugin_intro_text' );

/**
 * Apply demo settings.
 */
function primrose_ocdi_after_import( $selected_import ) {
	/**
	 * Front page settings.
	 */
	update_option( 'show_on_front', 'page', true );

	$page_on_front = get_page_by_path( 'home-image-slider' );
	if ( $page_on_front ) {
		update_option( 'page_on_front', $page_on_front->ID );
	}

	$page_for_posts = get_page_by_path( 'blog' );
	if ( $page_for_posts ) {
		update_option( 'page_for_posts', $page_for_posts->ID );
	}

	/**
	 * Assign images on customizer options.
	 */
	$customizer = get_option( PRIMROSE_CUSTOMIZER_OPTION_KEY );

	// Header logo.
	$header_logo = primrose_get_attachment_by_slug( 'logo' );
	if ( $header_logo ) {
		$customizer['header_logo'] = wp_get_attachment_url( $header_logo->ID );
	}

	// Header floating logo.
	$footer_logo = primrose_get_attachment_by_slug( 'floating-logo' );
	if ( $footer_logo ) {
		$customizer['header_floating_logo'] = wp_get_attachment_url( $footer_logo->ID );
	}

	update_option( PRIMROSE_CUSTOMIZER_OPTION_KEY, $customizer );

	/**
	 * Assign menu location.
	 */
	$primary_menu = wp_get_nav_menu_object( 'primary' );
	if ( $primary_menu ) {
		$nav_menu_locations = get_theme_mod( 'nav_menu_locations', array() );
		$nav_menu_locations['primary'] = $primary_menu->term_id;
		set_theme_mod( 'nav_menu_locations', $nav_menu_locations );
	}

	$topbar_menu = wp_get_nav_menu_object( 'topbar' );
	if ( $topbar_menu ) {
		$nav_menu_locations = get_theme_mod( 'nav_menu_locations', array() );
		$nav_menu_locations['topbar'] = $topbar_menu->term_id;
		set_theme_mod( 'nav_menu_locations', $nav_menu_locations );
	}

	/**
	 * Widgets.
	 */
	$widget_nav_menu = get_option( 'widget_nav_menu' );

	// Footer sitemap.
	$footer_sitemap = wp_get_nav_menu_object( 'footer-sitemap' );
	if ( $footer_sitemap ) {
		$widget_nav_menu[1]['nav_menu'] = $footer_sitemap->term_id;
	}

	// Footer products.
	$footer_products = wp_get_nav_menu_object( 'footer-products' );
	if ( $footer_products ) {
		$widget_nav_menu[2]['nav_menu'] = $footer_products->term_id;
	}

	// Footer policy.
	$footer_policy = wp_get_nav_menu_object( 'footer-policy' );
	if ( $footer_policy ) {
		$widget_nav_menu[3]['nav_menu'] = $footer_policy->term_id;
	}

	// Apply changes.
	update_option( 'widget_nav_menu', $widget_nav_menu );

	// Move inactive widgets on footer widgets 5 (weird).
	$sidebar_widgets = get_option( 'sidebars_widgets' );
	$move = $sidebar_widgets['wp_inactive_widgets'];
	$sidebar_widgets['wp_inactive_widgets'] = array();
	$sidebar_widgets['footer-widgets-5'] = $move;
	update_option( 'sidebars_widgets', $sidebar_widgets );

	/**
	 * Mailchimp for WordPress setup.
	 */
	$mc4wp_forms = get_posts( array(
		'post_type' => 'mc4wp-form',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'name' => 'primrose',
	) );
	update_option( 'mc4wp_default_form_id', $mc4wp_forms[0]->ID );

	/**
	 * WooCommerce setup.
	 */
	// Shop page.
	$woocommerce_shop_page_id = get_page_by_path( 'shop' );
	if ( $woocommerce_shop_page_id ) {
		update_option( 'woocommerce_shop_page_id', $woocommerce_shop_page_id->ID );
	}
	
	// Cart page.
	$woocommerce_cart_page_id = get_page_by_path( 'cart' );
	if ( $woocommerce_cart_page_id ) {
		update_option( 'woocommerce_cart_page_id', $woocommerce_cart_page_id->ID );
	}

	// Checkout page.
	$woocommerce_checkout_page_id = get_page_by_path( 'checkout' );
	if ( $woocommerce_checkout_page_id ) {
		update_option( 'woocommerce_checkout_page_id', $woocommerce_checkout_page_id->ID );
	}

	// My Account page.
	$woocommerce_myaccount_page_id = get_page_by_path( 'my-account' );
	if ( $woocommerce_myaccount_page_id ) {
		update_option( 'woocommerce_myaccount_page_id', $woocommerce_myaccount_page_id->ID );
	}
}
add_action( 'pt-ocdi/after_import', 'primrose_ocdi_after_import' );