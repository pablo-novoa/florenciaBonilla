<?php
/*
Widget Name: Primrose: Accordion
Description: Accordion block.
Author: SingleStroke
Author URI: https://singlestroke.io/
*/

class Primrose_SOW_Accordion extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'primrose-sow-accordion',
			esc_html__( 'Primrose: Accordion', 'primrose' ),
			array(
				'description' => esc_html__( 'Accordion block.', 'primrose' ),
				'panels_groups' => array( 'primrose' ),
			),
			array(
				
			),
			array(
				'items' => array(
					'type' => 'repeater',
					'label' => esc_html__( 'Items', 'primrose' ),
					'item_name' => esc_html__( 'Item', 'primrose' ),
					'item_label' => array(
						'selector' => '[id*="title"]',
						'update_event' => 'change',
						'value_method' => 'val',
					),
					'fields' => array(
						'title' => array(
							'type' => 'text',
							'label' => esc_html__( 'Title', 'primrose' ),
							'default' => esc_html__( 'Accordion Item Title', 'primrose' ),
						),
						'description' => array(
							'type' => 'tinymce',
							'label' => esc_html__( 'Description', 'primrose' ),
							'rows' => 3,
						),
						'active' => array(
							'type' => 'checkbox',
							'label' => esc_html__( 'Active by default', 'primrose' ),
							'default' => false,
						),
					),
				),
				'mutiple_active' => array(
					'type' => 'checkbox',
					'label' => esc_html__( 'Allow multiple active items', 'primrose' ),
					'default' => false,
				),
			),
			plugin_dir_path( __FILE__ )
		);
	}

	function initialize() {
		$this->register_frontend_scripts( array(
			array( 'primrose-siteorigin-widgets', PRIMROSE_SOW_JS . '/main.js', array( 'jquery' ), PRIMROSE_SOW_VERSION, true ),
		) );
		
		$this->register_frontend_styles( array(
			array( 'primrose-siteorigin-widgets', PRIMROSE_SOW_CSS . '/main.css', array(), PRIMROSE_SOW_VERSION ),
		) );
	}
}

siteorigin_widget_register( 'primrose-sow-accordion', __FILE__, 'Primrose_SOW_Accordion' );