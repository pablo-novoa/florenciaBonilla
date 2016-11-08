<?php
/*
Widget Name: Primrose: WooCommerce Add to Cart Button
Description: WooCommerce add to cart button.
Author: SingleStroke
Author URI: https://singlestroke.io/
*/

class Primrose_SOW_WooCommerce_Add_to_Cart_Button extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'primrose-sow-woocommerce-add-to-cart-button',
			esc_html__( 'Primrose: WooCommerce Add to Cart Button', 'primrose' ),
			array(
				'description' => esc_html__( 'WooCommerce add to cart button.', 'primrose' ),
				'panels_groups' => array( 'primrose' ),
			),
			array(
				
			),
			array(
				'product_id' => array(
					'type' => 'number',
					'label' => esc_html__( 'Product ID / Variation ID', 'primrose' ),
					'description' => esc_html__( 'If your product has variations, please fill this option with the variation ID, instead of the product ID. Variation ID can be found on the product info tabs > Variations.', 'primrose' ),
				),
				'button' => array(
					'type' => 'section',
					'label' => esc_html__( 'Button', 'primrose' ),
					'fields' => array(
						'text' => array(
							'type' => 'text',
							'label' => esc_html__( 'Button text', 'primrose' ),
							'default' => esc_html__( 'Purchase Now', 'primrose' ),
						),
						'bg_color' => array(
							'type' => 'color',
							'label' => esc_html__( 'Button BG color', 'primrose' ),
							'default' => '#000000',
						),
						'border_color' => array(
							'type' => 'color',
							'label' => esc_html__( 'Button border color', 'primrose' ),
							'default' => '#000000',
						),
						'text_color' => array(
							'type' => 'color',
							'label' => esc_html__( 'Button text color', 'primrose' ),
							'default' => '#ffffff',
						),
						'hover_bg_color' => array(
							'type' => 'color',
							'label' => esc_html__( 'Button BG color (hover)', 'primrose' ),
							'default' => '#333333',
						),
						'hover_border_color' => array(
							'type' => 'color',
							'label' => esc_html__( 'Button border color (hover)', 'primrose' ),
							'default' => '#333333',
						),
						'hover_text_color' => array(
							'type' => 'color',
							'label' => esc_html__( 'Button text color (hover)', 'primrose' ),
							'default' => '#ffffff',
						),
					),
				),
				'alignment' => array(
					'type' => 'select',
					'label' => esc_html__( 'Alignment', 'primrose' ),
					'options' => array(
						'left' => esc_html__( 'left', 'primrose' ),
						'center' => esc_html__( 'center', 'primrose' ),
						'right' => esc_html__( 'right', 'primrose' ),
					),
					'default' => 'center',
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
			'button_bg_color' => $instance['button']['bg_color'],
			'button_border_color' => $instance['button']['border_color'],
			'button_text_color' => $instance['button']['text_color'],
			'button_hover_bg_color' => $instance['button']['hover_bg_color'],
			'button_hover_border_color' => $instance['button']['hover_border_color'],
			'button_hover_text_color' => $instance['button']['hover_text_color'],
		);
	}
}

if ( class_exists( 'WooCommerce' ) ) {
	siteorigin_widget_register( 'primrose-sow-woocommerce-add-to-cart-button', __FILE__, 'Primrose_SOW_WooCommerce_Add_to_Cart_Button' );
}