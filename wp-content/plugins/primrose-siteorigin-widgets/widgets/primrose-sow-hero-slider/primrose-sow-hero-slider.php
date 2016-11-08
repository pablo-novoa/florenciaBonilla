<?php
/*
Widget Name: Primrose: Hero Slider
Description: Hero image slider.
Author: SingleStroke
Author URI: https://singlestroke.io/
*/

class Primrose_SOW_Hero_Slider extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'primrose-sow-hero-slider',
			esc_html__( 'Primrose: Hero Slider', 'primrose' ),
			array(
				'description' => esc_html__( 'Hero image slider.', 'primrose' ),
				'panels_groups' => array( 'primrose' ),
			),
			array(
				
			),
			array(
				'slides' => array(
					'type' => 'repeater',
					'label' => esc_html__( 'Slides', 'primrose' ),
					'item_name' => esc_html__( 'Slide', 'primrose' ),
					'item_label' => array(
						'selector' => '[id*="title"]',
						'update_event' => 'change',
						'value_method' => 'val',
					),
					'fields' => array(
						'title' => array(
							'type' => 'text',
							'label' => esc_html__( 'Title', 'primrose' ),
							'description' => esc_html__( 'Leave if blank to hide title.', 'primrose' ),
							'default' => esc_html__( 'Slide Title', 'primrose' ),
						),
						'background' => array(
							'type' => 'select',
							'label' => esc_html__( 'Background media', 'primrose' ),
							'options' => array(
								'image' => esc_html__( 'Image', 'primrose' ),
								'video' => esc_html__( 'Video', 'primrose' ),
							),
							'default' => 'image',
							'state_emitter' => array(
								'callback' => 'select',
								'args' => array( 'background' ),
							),
						),
						'bg_color' => array(
							'type' => 'color',
							'label' => esc_html__( 'Background color', 'primrose' ),
						),
						'video' => array(
							'type' => 'media',
							'label' => esc_html__( 'Background video', 'primrose' ),
							'description' => esc_html__( 'Please upload 3 formats: "mp4", "ogv", and "webm" with the same filename. BUT choose only one of them in this option (e.g. mp4), the theme will automatically call the other formats when it\'s displayed on the page.', 'primrose' ),
							'library' => 'video',
							'state_handler' => array(
								'background[video]' => array( 'show' ),
								'_else[background]' => array( 'hide' ),
							),
						),
						'video_poster' => array(
							'type' => 'media',
							'label' => esc_html__( 'Video poster image', 'primrose' ),
							'description' => esc_html__( 'Fallback image used on devices which doesn\'t support background video OR will be displayed when video is still being loaded by the browser.', 'primrose' ),
							'library' => 'image',
							'state_handler' => array(
								'background[video]' => array( 'show' ),
								'_else[background]' => array( 'hide' ),
							),
						),
						'video_pattern' => array(
							'type' => 'select',
							'label' => esc_html__( 'Video pattern overlay', 'primrose' ),
							'options' => array(
								'disabled' => esc_html__( 'disabled', 'primrose' ),
								'dot-1-3' => esc_html__( 'dot 1 / 3px', 'primrose' ),
							),
							'default' => 'disabled',
							'state_handler' => array(
								'background[video]' => array( 'show' ),
								'_else[background]' => array( 'hide' ),
							),
						),
						'image' => array(
							'type' => 'media',
							'label' => esc_html__( 'Background image', 'primrose' ),
							'library' => 'image',
							'state_handler' => array(
								'background[image]' => array( 'show' ),
								'_else[background]' => array( 'hide' ),
							),
						),
						'overlay_color' => array(
							'type' => 'text',
							'label' => esc_html__( 'Background overlay (rgba colors)', 'primrose' ),
							'default' => 'rgba(0,0,0,0)',
						),
						'title_color' => array(
							'type' => 'color',
							'label' => esc_html__( 'Title color', 'primrose' ),
							'default' => '#ffffff',
						),
						'buttons' => array(
							'type' => 'widget',
							'label' => esc_html__( 'Action Buttons', 'primrose' ),
							'class' => 'Primrose_SOW_Buttons',
						),
					),
				),
				'parallax' => array(
					'type' => 'checkbox',
					'label' => esc_html__( 'Enable Primrose Parallax Scrolling effect', 'primrose' ),
					'default' => true,
				),
				'autoplay' => array(
					'type' => 'number',
					'label' => esc_html__( 'Autoslide (miliseconds)', 'primrose' ),
					'description' => esc_html__( '0 means no autoslide.', 'primrose' ),
					'default' => 5000,
				),
				'desktop_layout' => array(
					'type' => 'section',
					'label' => esc_html__( 'Wide screen layout (min width 1200px, wrapper 1080px)', 'primrose' ),
					'fields' => array(
						'height' => array(
							'type' => 'text',
							'label' => esc_html__( 'Height ( px / em / rem / % / vw / vh )', 'primrose' ),
							'default' => '640px',
						),
					),
				),
				'normal_layout' => array(
					'type' => 'section',
					'label' => esc_html__( 'Normal layout (wrapper 940px)', 'primrose' ),
					'fields' => array(
						'height' => array(
							'type' => 'text',
							'label' => esc_html__( 'Height ( px / em / rem / % / vw / vh )', 'primrose' ),
							'default' => '560px',
						),
					),
				),
				'tablet_layout' => array(
					'type' => 'section',
					'label' => esc_html__( 'Tablet layout (max-width: 1023px, wrapper 730px)', 'primrose' ),
					'fields' => array(
						'height' => array(
							'type' => 'text',
							'label' => esc_html__( 'Height ( px / em / rem / % / vw / vh )', 'primrose' ),
							'default' => '420px',
						),
					),
				),
				'mobile_layout' => array(
					'type' => 'section',
					'label' => esc_html__( 'Mobile layout (max-width: 767px, wrapper 480px)', 'primrose' ),
					'fields' => array(
						'height' => array(
							'type' => 'text',
							'label' => esc_html__( 'Height ( px / em / rem / % / vw / vh )', 'primrose' ),
							'default' => '300px',
						),
					),
				),
				'mobile_small_layout' => array(
					'type' => 'section',
					'label' => esc_html__( 'Mobile Small layout (max-width: 519px, wrapper 300px)', 'primrose' ),
					'fields' => array(
						'height' => array(
							'type' => 'text',
							'label' => esc_html__( 'Height ( px / em / rem / % / vw / vh )', 'primrose' ),
							'default' => '180px',
						),
					),
				),
			),
			plugin_dir_path( __FILE__ )
		);
	}

	function initialize() {
		$this->register_frontend_scripts( array(
			array( 'slick', PRIMROSE_SOW_JS . '/slick.min.js', array( 'jquery' ), '1.6.0', true ),
			array( 'imagesloaded', PRIMROSE_SOW_JS . '/imagesloaded.pkgd.min.js', array( 'jquery' ), '4.1.0', true ),
			array( 'primrose-siteorigin-widgets', PRIMROSE_SOW_JS . '/main.js', array( 'jquery' ), PRIMROSE_SOW_VERSION, true ),
		) );

		$this->register_frontend_styles( array(
			array( 'slick', PRIMROSE_SOW_CSS . '/slick.css', array(), '1.6.0' ),
			array( 'primrose-siteorigin-widgets', PRIMROSE_SOW_CSS . '/main.css', array(), PRIMROSE_SOW_VERSION ),
		) );
	}

	function get_less_variables( $instance ) {
		$args = array(
			'desktop_layout_height' => ! empty( $instance['desktop_layout']['height'] ) ? $instance['desktop_layout']['height'] : '640px',
			'normal_layout_height' => ! empty( $instance['normal_layout']['height'] ) ? $instance['normal_layout']['height'] : '560px',
			'tablet_layout_height' => ! empty( $instance['tablet_layout']['height'] ) ? $instance['tablet_layout']['height'] : '420px',
			'mobile_layout_height' => ! empty( $instance['mobile_layout']['height'] ) ? $instance['mobile_layout']['height'] : '300px',
			'mobile_small_layout_height' => ! empty( $instance['mobile_small_layout']['height'] ) ? $instance['mobile_small_layout']['height'] : '180px',
		);

		if ( count( $instance['slides'] ) > 0 ) {
			$ids = array();
			$title_colors = array();
			
			foreach ( $instance['slides'] as $i => $slide ) {
				$ids[] = $i;
				$title_colors[] = ! empty( $slide['title_color'] ) ? $slide['title_color'] : 'transparent';
			}

			$args['ids'] = implode( ', ', $ids );
			$args['title_colors'] = implode( ', ', $title_colors );
		}

		return $args;
	}
}

siteorigin_widget_register( 'primrose-sow-hero-slider', __FILE__, 'Primrose_SOW_Hero_Slider' );