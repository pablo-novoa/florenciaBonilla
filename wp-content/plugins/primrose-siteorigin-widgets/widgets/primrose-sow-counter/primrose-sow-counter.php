<?php
/*
Widget Name: Primrose: Counter
Description: Counting number.
Author: SingleStroke
Author URI: https://singlestroke.io/
*/

class Primrose_SOW_Counter extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'primrose-sow-counter',
			esc_html__( 'Primrose: Counter', 'primrose' ),
			array(
				'description' => esc_html__( 'Counting number.', 'primrose' ),
				'panels_groups' => array( 'primrose' ),
			),
			array(
				
			),
			array(
				'number' => array(
					'type' => 'text',
					'label' => esc_html__( 'Number', 'primrose' ),
					'description' => esc_html__( 'The target number with optional decimal or thousands separator, etc. e.g. "1,024" or "12.75".', 'primrose' ),
					'default' => '1,024',
				),
				'prefix' => array(
					'type' => 'text',
					'label' => esc_html__( 'Prefix (string before the number)', 'primrose' ),
				),
				'suffix' => array(
					'type' => 'text',
					'label' => esc_html__( 'Suffix (string after the number)', 'primrose' ),
				),
				'number_color' => array(
					'type' => 'color',
					'label' => esc_html__( 'Number color', 'primrose' ),
					'default' => '#666666',
				),
				'duration' =>  array(
					'type' => 'number',
					'label' => esc_html__( 'Counter duration (miliseconds)', 'primrose' ),
					'description' => esc_html__( '0 means no animation.', 'primrose' ),
					'default' => 1000,
				),
				'caption' => array(
					'type' => 'text',
					'label' => esc_html__( 'Caption', 'primrose' ),
					'default' => esc_html__( 'Caption text', 'primrose' ),
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
		$this->register_frontend_scripts( array(
			array( 'counterup', PRIMROSE_SOW_JS . '/jquery.counterup.min.js', array( 'jquery', 'inview' ), '1.0.0', true ),
			array( 'primrose-siteorigin-widgets', PRIMROSE_SOW_JS . '/main.js', array( 'jquery' ), PRIMROSE_SOW_VERSION, true ),
		) );

		$this->register_frontend_styles( array(
			array( 'primrose-siteorigin-widgets', PRIMROSE_SOW_CSS . '/main.css', array(), PRIMROSE_SOW_VERSION ),
		) );
	}
}

siteorigin_widget_register( 'primrose-sow-counter', __FILE__, 'Primrose_SOW_Counter' );