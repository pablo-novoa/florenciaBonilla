<?php
/*
Widget Name: Primrose: Feature
Description: Block containing feature description and icon.
Author: SingleStroke
Author URI: https://singlestroke.io/
*/

class Primrose_SOW_Feature extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'primrose-sow-feature',
			esc_html__( 'Primrose: Feature', 'primrose' ),
			array(
				'description' => esc_html__( 'Block containing feature description and icon.', 'primrose' ),
				'panels_groups' => array( 'primrose' ),
			),
			array(
				
			),
			array(
				'heading' => array(
					'type' => 'text',
					'label' => esc_html__( 'Heading', 'primrose' ),
					'default' => esc_html__( 'Feature heading', 'primrose' ),
				),
				'heading_level' => array(
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
					'default' => 'h4',
				),
				'heading_color' => array(
					'type' => 'color',
					'label' => esc_html__( 'Heading color', 'primrose' ),
					'default' => '#333333',
				),
				'icon' => array(
					'type' => 'select',
					'label' => esc_html__( 'Icon mode', 'primrose' ),
					'options' => array(
						'disabled' => esc_html__( 'Disabled', 'primrose' ),
						'font' => esc_html__( 'Icon font', 'primrose' ),
						'image' => esc_html__( 'Image', 'primrose' ),
					),
					'default' => 'disabled',
					'state_emitter' => array(
						'callback' => 'select',
						'args' => array( 'icon' ),
					),
				),
				'icon_font' => array(
					'type' => 'icon',
					'label' => esc_html__( 'Icon font character', 'primrose' ),
					'state_handler' => array(
						'icon[font]' => array( 'show' ),
						'_else[icon]' => array( 'hide' ),
					),
				),
				'icon_size' => array(
					'type' => 'text',
					'label' => esc_html__( 'Icon font size', 'primrose' ),
					'description' => esc_html__( 'in em / rem / px / %.', 'primrose' ),
					'default' => '32px',
					'state_handler' => array(
						'icon[font]' => array( 'show' ),
						'_else[icon]' => array( 'hide' ),
					),
				),
				'icon_color' => array(
					'type' => 'color',
					'label' => esc_html__( 'Icon color', 'primrose' ),
					'default' => '#cccccc',
					'state_handler' => array(
						'icon[font]' => array( 'show' ),
						'_else[icon]' => array( 'hide' ),
					),
				),
				'icon_image' => array(
					'type' => 'media',
					'label' => esc_html__( 'Icon (image)', 'primrose' ),
					'description' => esc_html__( 'Set this options will override the selected icon font.', 'primrose' ),
					'library' => 'image',
					'state_handler' => array(
						'icon[image]' => array( 'show' ),
						'_else[icon]' => array( 'hide' ),
					),
				),
				'description' => array(
					'type' => 'tinymce',
					'label' => esc_html__( 'Description', 'primrose' ),
					'rows' => 3,
				),
			),
			plugin_dir_path( __FILE__ )
		);
	}

	function initialize() {
		$this->register_frontend_styles( array(
			array( 'sow-simple-line-icons', PRIMROSE_SOW_CSS . '/sow-simple-line-icons.css', array(), '20151108' ),
			array( 'primrose-siteorigin-widgets', PRIMROSE_SOW_CSS . '/main.css', array(), PRIMROSE_SOW_VERSION ),
		) );
	}
}

siteorigin_widget_register( 'primrose-sow-feature', __FILE__, 'Primrose_SOW_Feature' );