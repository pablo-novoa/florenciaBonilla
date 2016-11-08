<?php
/*
Widget Name: Primrose: Buttons
Description: Pre-styled buttons.
Author: SingleStroke
Author URI: https://singlestroke.io/
*/

class Primrose_SOW_Buttons extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'primrose-sow-buttons',
			esc_html__( 'Primrose: Buttons', 'primrose' ),
			array(
				'description' => esc_html__( 'Pre-styled buttons.', 'primrose' ),
				'panels_groups' => array( 'primrose' ),
			),
			array(

			),
			array(
				'buttons' => array(
					'type' => 'repeater',
					'label' => esc_html__( 'Buttons', 'primrose' ),
					'item_name' => esc_html__( 'Button', 'primrose' ),
					'item_label' => array(
						'selector' => "[id*='text']",
						'update_event' => 'change',
						'value_method' => 'val',
					),
					'fields' => array(
						'text' => array(
							'type' => 'text',
							'label' => esc_html__( 'Button text', 'primrose' ),
						),
						'url' => array(
							'type' => 'link',
							'label' => esc_html__( 'Destination URL', 'primrose' ),
						),
						'new_window' => array(
							'type' => 'checkbox',
							'label' => esc_html__( 'Open in a new window', 'primrose' ),
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
		$this->register_frontend_styles( array(
			array( 'primrose-siteorigin-widgets', PRIMROSE_SOW_CSS . '/main.css', array(), PRIMROSE_SOW_VERSION ),
		) );
	}

	function get_less_variables( $instance ) {
		if ( count( $instance['buttons'] ) > 0 ) {
			$ids = array();
			$button_bg_colors = array();
			$button_border_colors = array();
			$button_text_colors = array();
			$button_hover_bg_colors = array();
			$button_hover_border_colors = array();
			$button_hover_text_colors = array();
			
			foreach ( $instance['buttons'] as $i => $button ) {
				$ids[] = $i;
				$button_bg_colors[] = ! empty( $button['bg_color'] ) ? $button['bg_color'] : 'transparent';
				$button_border_colors[] = ! empty( $button['border_color'] ) ? $button['border_color'] : 'transparent';
				$button_text_colors[] = ! empty( $button['text_color'] ) ? $button['text_color'] : 'transparent';
				$button_hover_bg_colors[] = ! empty( $button['hover_bg_color'] ) ? $button['hover_bg_color'] : 'transparent';
				$button_hover_border_colors[] = ! empty( $button['hover_border_color'] ) ? $button['hover_border_color'] : 'transparent';
				$button_hover_text_colors[] = ! empty( $button['hover_text_color'] ) ? $button['hover_text_color'] : 'transparent';
			}

			$args['ids'] = implode( ', ', $ids );
			$args['button_bg_colors'] = implode( ', ', $button_bg_colors );
			$args['button_border_colors'] = implode( ', ', $button_border_colors );
			$args['button_text_colors'] = implode( ', ', $button_text_colors );
			$args['button_hover_bg_colors'] = implode( ', ', $button_hover_bg_colors );
			$args['button_hover_border_colors'] = implode( ', ', $button_hover_border_colors );
			$args['button_hover_text_colors'] = implode( ', ', $button_hover_text_colors );
		}

		return $args;
	}
}

siteorigin_widget_register( 'primrose-sow-buttons', __FILE__, 'Primrose_SOW_Buttons' );