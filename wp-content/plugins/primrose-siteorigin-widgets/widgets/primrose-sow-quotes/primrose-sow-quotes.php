<?php
/*
Widget Name: Primrose: Quotes
Description: Blockquote with citation.
Author: SingleStroke
Author URI: https://singlestroke.io/
*/

class Primrose_SOW_Quotes extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'primrose-sow-quotes',
			esc_html__( 'Primrose: Quotes', 'primrose' ),
			array(
				'description' => esc_html__( 'Blockquote with citation.', 'primrose' ),
				'panels_groups' => array( 'primrose' ),
			),
			array(
				
			),
			array(
				'quotes' => array(
					'type' => 'repeater',
					'label' => esc_html__( 'Quotes', 'primrose' ),
					'item_name' => esc_html__( 'Quote', 'primrose' ),
					'item_label' => array(
						'selector' => '[id*="text"]',
						'update_event' => 'change',
						'value_method' => 'val',
					),
					'fields' => array(
						'text' => array(
							'type' => 'textarea',
							'label' => esc_html__( 'Quote text', 'primrose' ),
						),
						'name' => array(
							'type' => 'text',
							'label' => esc_html__( 'Name', 'primrose' ),
						),
					),
				),
				'alignment' => array(
					'type' => 'select',
					'label' => esc_html__( 'Alignment', 'primrose' ),
					'options' => array(
						'left' => esc_html__( 'Left', 'primrose' ),
						'center' => esc_html__( 'Center', 'primrose' ),
						'right' => esc_html__( 'Right', 'primrose' ),
					),
					'default' => 'center',
				),
			),
			plugin_dir_path( __FILE__ )
		);
	}

	function initialize() {
		$this->register_frontend_scripts( array(
			array( 'slick', PRIMROSE_SOW_JS . '/slick.min.js', array( 'jquery' ), '1.6.0', true ),
			array( 'primrose-siteorigin-widgets', PRIMROSE_SOW_JS . '/main.js', array( 'jquery' ), PRIMROSE_SOW_VERSION, true ),
		) );

		$this->register_frontend_styles( array(
			array( 'slick', PRIMROSE_SOW_CSS . '/slick.css', array(), '1.6.0' ),
			array( 'primrose-siteorigin-widgets', PRIMROSE_SOW_CSS . '/main.css', array(), PRIMROSE_SOW_VERSION ),
		) );
	}
}

siteorigin_widget_register( 'primrose-sow-quotes', __FILE__, 'Primrose_SOW_Quotes' );