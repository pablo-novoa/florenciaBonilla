<?php
/*
Widget Name: Primrose: WooCommerce Price Box
Description: Price box with action button.
Author: SingleStroke
Author URI: https://singlestroke.io/
*/

class Primrose_SOW_WooCommerce_Price_Box extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'primrose-sow-woocommerce-price-box',
			esc_html__( 'Primrose: WooCommerce Price Box', 'primrose' ),
			array(
				'description' => esc_html__( 'Price box with action button.', 'primrose' ),
				'panels_groups' => array( 'primrose' ),
			),
			array(
				
			),
			array(
				'name' => array(
					'type' => 'text',
					'label' => esc_html__( 'Package name', 'primrose' ),
					'default' => esc_html__( 'Package', 'primrose' ),
				),
				'price' => array(
					'type' => 'text',
					'label' => esc_html__( 'Price', 'primrose' ),
					'default' => '$50',
				),
				'period' => array(
					'type' => 'text',
					'label' => esc_html__( 'Price period (e.g. "monthly", or "/year")', 'primrose' ),
				),
				'features' => array(
					'type' => 'repeater',
					'label' => esc_html__( 'Features list', 'primrose' ),
					'item_name' => esc_html__( 'Feature', 'primrose' ),
					'item_label' => array(
						'selector' => '[id*="name"]',
						'update_event' => 'change',
						'value_method' => 'val',
					),
					'fields' => array(
						'name' => array(
							'type' => 'text',
						),
					),
				),
				'features_border_color' => array(
					'type' => 'color',
					'label' => esc_html__( 'Features item border color', 'primrose' ),
					'default' => '#eeeeee',
				),
				'button' => array(
					'type' => 'widget',
					'label' => esc_html__( 'Add to Cart Button', 'primrose' ),
					'class' => 'Primrose_SOW_WooCommerce_Add_to_Cart_Button',
				),
			),
			plugin_dir_path( __FILE__ )
		);
	}
	
	function initialize() {
		$this->register_frontend_styles( array(
			array( 'primrose-siteorigin-widgets', PRIMROSE_SOW_CSS . '/main.css', array(), PRIMROSE_SOW_VERSION ),
		) );
	}

	function get_less_variables( $instance ) {
		return array(
			'features_border_color' => $instance['features_border_color'],
		);
	}
}

if ( class_exists( 'WooCommerce' ) ) {
	siteorigin_widget_register( 'primrose-sow-woocommerce-price-box', __FILE__, 'Primrose_SOW_WooCommerce_Price_Box' );
}