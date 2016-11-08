<?php
/*
Widget Name: Primrose: Heading
Description: Section heading.
Author: SingleStroke
Author URI: https://singlestroke.io/
*/

class Primrose_SOW_Heading extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'primrose-sow-heading',
			esc_html__( 'Primrose: Heading', 'primrose' ),
			array(
				'description' => esc_html__( 'Section heading.', 'primrose' ),
				'panels_groups' => array( 'primrose' ),
			),
			array(
				
			),
			array(
				'text' => array(
					'type' => 'text',
					'label' => esc_html__( 'Heading text', 'primrose' ),
					'default' => esc_html__( 'This is Heading', 'primrose' ),
				),
				'level' => array(
					'type' => 'select',
					'label' => esc_html__( 'Heading level', 'primrose' ),
					'options' => array(
						'h2' => esc_html__( 'h2', 'primrose' ),
						'h3' => esc_html__( 'h3', 'primrose' ),
						'h4' => esc_html__( 'h4', 'primrose' ),
						'h5' => esc_html__( 'h5', 'primrose' ),
						'h6' => esc_html__( 'h6', 'primrose' ),
						'div' => esc_html__( 'normal text', 'primrose' ),
					),
					'default' => 'h2',
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
}

siteorigin_widget_register( 'primrose-sow-heading', __FILE__, 'Primrose_SOW_Heading' );