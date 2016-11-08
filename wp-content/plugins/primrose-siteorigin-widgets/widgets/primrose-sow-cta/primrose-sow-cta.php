<?php
/*
Widget Name: Primrose: CTA
Description: Call to Action text with buttons.
Author: SingleStroke
Author URI: https://singlestroke.io/
*/

class Primrose_SOW_CTA extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'primrose-sow-cta',
			esc_html__( 'Primrose: CTA', 'primrose' ),
			array(
				'description' => esc_html__( 'Call to Action text with buttons.', 'primrose' ),
				'panels_groups' => array( 'primrose' ),
			),
			array(
				
			),
			array(
				'text' => array(
					'type' => 'text',
					'label' => esc_html__( 'Quote text', 'primrose' ),
					'default' => esc_html__( 'This is call to action line, ready to take action?', 'primrose' )
				),
				'buttons' => array(
					'type' => 'widget',
					'label' => esc_html__( 'Action Buttons', 'primrose' ),
					'class' => 'Primrose_SOW_Buttons',
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
}

siteorigin_widget_register( 'primrose-sow-cta', __FILE__, 'Primrose_SOW_CTA' );