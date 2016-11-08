<?php
/*
Widget Name: Primrose: Banner
Description: Banner image with link.
Author: SingleStroke
Author URI: https://singlestroke.io/
*/

class Primrose_SOW_Banner extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'primrose-sow-banner',
			esc_html__( 'Primrose: Banner', 'primrose' ),
			array(
				'description' => esc_html__( 'Banner image with link.', 'primrose' ),
				'panels_groups' => array( 'primrose' ),
			),
			array(
				
			),
			array(
				'image' => array(
					'type' => 'media',
					'label' => esc_html__( 'Banner image', 'primrose' ),
					'library' => 'image',
				),
				'url' => array(
					'type' => 'link',
					'label' => esc_html__( 'Link URL', 'primrose' ),
					'description' => esc_html__( 'Leave if blank to disable banner link.', 'primrose' ),
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

siteorigin_widget_register( 'primrose-sow-banner', __FILE__, 'Primrose_SOW_Banner' );