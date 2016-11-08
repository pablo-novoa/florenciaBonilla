<?php
/*
Widget Name: Primrose: Progress Bars
Description: Set of animating progress bars.
Author: SingleStroke
Author URI: https://singlestroke.io/
*/

class Primrose_SOW_Progress_Bars extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'primrose-sow-progress-bars',
			esc_html__( 'Primrose: Progress Bars', 'primrose' ),
			array(
				'description' => esc_html__( 'Set of animating progress bars.', 'primrose' ),
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
						),
						'percentage' => array(
							'type' => 'slider',
							'label' => esc_html__( 'Progress percentage (%)', 'primrose' ),
							'min' => 0,
							'max' => 100,
							'default' => 85,
						),
						'track_color' => array(
							'type' => 'color',
							'label' => esc_html__( 'Track color', 'primrose' ),
							'default' => '#f3f3f3',
						),
						'bar_color' => array(
							'type' => 'color',
							'label' => esc_html__( 'Bars color', 'primrose' ),
							'default' => '#000000',
						),
					),
				),
				'display_percentage' => array(
					'type' => 'checkbox',
					'label' => esc_html__( 'Display percentage', 'primrose' ),
					'default' => true,
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

siteorigin_widget_register( 'primrose-sow-progress-bars', __FILE__, 'Primrose_SOW_Progress_Bars' );