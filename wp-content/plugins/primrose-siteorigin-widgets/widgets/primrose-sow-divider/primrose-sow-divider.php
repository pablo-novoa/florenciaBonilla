<?php
/*
Widget Name: Primrose: Divider
Description: Section divider, just like &lt;hr&gt;.
Author: SingleStroke
Author URI: https://singlestroke.io/
*/

class Primrose_SOW_Divider extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'primrose-sow-divider',
			esc_html__( 'Primrose: Divider', 'primrose' ),
			array(
				'description' => esc_html__( 'Section divider, using &lt;hr&gt;.', 'primrose' ),
				'panels_groups' => array( 'primrose' ),
			),
			array(
				
			),
			array(
				
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

siteorigin_widget_register( 'primrose-sow-divider', __FILE__, 'Primrose_SOW_Divider' );