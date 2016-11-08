<?php
/*
Widget Name: Primrose: Masonry Grid
Description: Masonry grid layout.
Author: SingleStroke
Author URI: https://singlestroke.io/
*/

class Primrose_SOW_Masonry_Grid extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'primrose-sow-masonry-grid',
			esc_html__( 'Primrose: Masonry Grid', 'primrose' ),
			array(
				'description' => esc_html__( 'Masonry grid layout.', 'primrose' ),
				'panels_groups' => array( 'primrose' ),
			),
			array(
				
			),
			array(
				'items' => array(
					'type' => 'repeater',
					'label' => esc_html__( 'Items', 'primrose' ),
					'item_label' => array(
						'selector'     => '[id*="title"]',
						'update_event' => 'change',
						'value_method' => 'val',
					),
					'fields' => array(
						'bg_color' => array(
							'type' => 'color',
							'label' => esc_html__( 'Background color', 'primrose' ),
						),
						'image' => array(
							'type' => 'media',
							'label' => esc_html__( 'Background image', 'primrose' ),
						),
						'overlay_color' => array(
							'type' => 'text',
							'label' => esc_html__( 'Background overlay (rgba colors)', 'primrose' ),
							'default' => 'rgba(0,0,0,0)',
						),
						'column_span' => array(
							'type' => 'slider',
							'label' => esc_html__( 'Column span', 'primrose' ),
							'description' => esc_html__( 'Number of columns this item should span. (Limited to number of columns selected in Layout section below.)', 'primrose' ),
							'min' => 1,
							'max' => apply_filters( 'primrose_siteorigin_widgets_masonry_span_max', 10 ),
							'default' => 1
						),
						'row_span' => array(
							'type' => 'slider',
							'label' => esc_html__( 'Row span', 'primrose' ),
							'description' => esc_html__( 'Number of rows this item should span. (Limited to number of columns selected in Layout section below.)', 'primrose' ),
							'min' => 1,
							'max' => apply_filters( 'primrose_siteorigin_widgets_masonry_span_max', 10 ),
							'default' => 1
						),
						'title' => array(
							'type' => 'text',
							'label' => esc_html__( 'Title', 'primrose' ),
						),
						'title_color' => array(
							'type' => 'color',
							'label' => esc_html__( 'Title color', 'primrose' ),
							'default' => '#ffffff',
						),
						'subtitle' => array(
							'type' => 'text',
							'label' => esc_html__( 'Description', 'primrose' ),
						),
						'subtitle_color' => array(
							'type' => 'color',
							'label' => esc_html__( 'Description color', 'primrose' ),
							'default' => '#ffffff',
						),
						'url' => array(
							'type' => 'link',
							'label' => esc_html__( 'Destination URL', 'primrose' ),
							'description' => esc_html__( 'Leave blank to disable link.', 'primrose' ),
						),
						'new_window' => array(
							'type' => 'checkbox',
							'default' => false,
							'label' => esc_html__( 'Open in a new window', 'primrose' ),
						),
						'zoom_effect' => array(
							'type' => 'checkbox',
							'default' => true,
							'label' => esc_html__( 'Image zoom effect on hover', 'primrose' ),
						),
					)
				),
				'desktop_layout' => array(
					'type' => 'section',
					'label' => esc_html__( 'Wide screen layout (min width 1200px, wrapper 1080px)', 'primrose' ),
					'fields' => array(
						'columns' => array(
							'type' => 'slider',
							'label' => esc_html__( 'Number of columns', 'primrose' ),
							'min' => 1,
							'max' => apply_filters( 'primrose_siteorigin_widgets_masonry_span_max', 10 ),
							'default' => 3,
						),
						'row_height' => array(
							'type' => 'text',
							'label' => esc_html__( 'Row height (px or %)', 'primrose' ),
							'description' => esc_html__( 'Leave blank to match calculated column width.', 'primrose' ),
						),
						'gutter' => array(
							'type' => 'text',
							'label' => esc_html__( 'Gutter (px or %)', 'primrose' ),
							'description' => esc_html__( 'Space between masonry items.', 'primrose' ),
							'default' => '40px',
						)
					)
				),
				'normal_layout' => array(
					'type' => 'section',
					'label' => esc_html__( 'Normal layout (wrapper 940px)', 'primrose' ),
					'fields' => array(
						'columns' => array(
							'type' => 'slider',
							'label' => esc_html__( 'Number of columns', 'primrose' ),
							'min' => 1,
							'max' => apply_filters( 'primrose_siteorigin_widgets_masonry_span_max', 10 ),
							'default' => 3,
						),
						'row_height' => array(
							'type' => 'text',
							'label' => esc_html__( 'Row height (px or %)', 'primrose' ),
							'description' => esc_html__( 'Leave blank to match calculated column width.', 'primrose' ),
						),
						'gutter' => array(
							'type' => 'text',
							'label' => esc_html__( 'Gutter (px or %)', 'primrose' ),
							'description' => esc_html__( 'Space between masonry items.', 'primrose' ),
							'default' => '40px',
						)
					)
				),
				'tablet_layout' => array(
					'type' => 'section',
					'label' => esc_html__( 'Tablet layout (max-width: 1023px, wrapper 730px)', 'primrose' ),
					'fields' => array(
						'columns' => array(
							'type' => 'slider',
							'label' => esc_html__( 'Number of columns', 'primrose' ),
							'min' => 1,
							'max' => apply_filters( 'primrose_siteorigin_widgets_masonry_span_max', 10 ),
							'default' => 2,
						),
						'row_height' => array(
							'type' => 'text',
							'label' => esc_html__( 'Row height (px or %)', 'primrose' ),
							'description' => esc_html__( 'Leave blank to match calculated column width.', 'primrose' ),
						),
						'gutter' => array(
							'type' => 'text',
							'label' => esc_html__( 'Gutter (px or %)', 'primrose' ),
							'description' => esc_html__( 'Space between masonry items.', 'primrose' ),
							'default' => '40px',
						)
					)
				),
				'mobile_layout' => array(
					'type' => 'section',
					'label' => esc_html__( 'Mobile layout (max-width: 767px, wrapper 480px)', 'primrose' ),
					'fields' => array(
						'columns' => array(
							'type' => 'slider',
							'label' => esc_html__( 'Number of columns', 'primrose' ),
							'min' => 1,
							'max' => apply_filters( 'primrose_siteorigin_widgets_masonry_span_max', 10 ),
							'default' => 1,
						),
						'row_height' => array(
							'type' => 'text',
							'label' => esc_html__( 'Row height (px or %)', 'primrose' ),
							'description' => esc_html__( 'Leave blank to match calculated column width.', 'primrose' ),
						),
						'gutter' => array(
							'type' => 'text',
							'label' => esc_html__( 'Gutter (px or %)', 'primrose' ),
							'description' => esc_html__( 'Space between masonry items.', 'primrose' ),
							'default' => '40px',
						)
					)
				),
				'mobile_small_layout' => array(
					'type' => 'section',
					'label' => esc_html__( 'Mobile Small layout (max-width: 519px, wrapper 300px)', 'primrose' ),
					'fields' => array(
						'columns' => array(
							'type' => 'slider',
							'label' => esc_html__( 'Number of columns', 'primrose' ),
							'min' => 1,
							'max' => apply_filters( 'primrose_siteorigin_widgets_masonry_span_max', 10 ),
							'default' => 1,
						),
						'row_height' => array(
							'type' => 'text',
							'label' => esc_html__( 'Row height (px or %)', 'primrose' ),
							'description' => esc_html__( 'Leave blank to match calculated column width.', 'primrose' ),
						),
						'gutter' => array(
							'type' => 'text',
							'label' => esc_html__( 'Gutter (px or %)', 'primrose' ),
							'description' => esc_html__( 'Space between masonry items.', 'primrose' ),
							'default' => '40px',
						)
					)
				),
			),
			plugin_dir_path( __FILE__ )
		);
	}

	function initialize() {
		$this->register_frontend_scripts( array(
			array( 'packery', PRIMROSE_SOW_JS . '/packery.pkgd.min.js', array( 'jquery' ), '2.1.1', true ),
			array( 'imagesloaded', PRIMROSE_SOW_JS . '/imagesloaded.pkgd.min.js', array( 'jquery' ), '4.1.0', true ),
			array( 'primrose-siteorigin-widgets', PRIMROSE_SOW_JS . '/main.js', array( 'jquery' ), PRIMROSE_SOW_VERSION, true ),
		) );

		$this->register_frontend_styles( array(
			array( 'primrose-siteorigin-widgets', PRIMROSE_SOW_CSS . '/main.css', array(), PRIMROSE_SOW_VERSION ),
		) );
	}
}

siteorigin_widget_register( 'primrose-sow-masonry-grid', __FILE__, 'Primrose_SOW_Masonry_Grid' );