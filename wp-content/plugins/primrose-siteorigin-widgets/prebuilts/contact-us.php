<?php
return array (
	'name' => esc_html__( 'Contact Us', 'primrose' ),
	'description' => esc_html__( 'Contact us page with addresses and contact form.', 'primrose' ),
	'screenshot' => PRIMROSE_SOW_IMG . '/contact-us.png',
	'widgets' => 
	array (
		0 => 
		array (
			'text' => 'Contact Us',
			'level' => 'h2',
			'alignment' => 'left',
			'_sow_form_id' => '56b1ad8adb8d2',
			'panels_info' => 
			array (
				'class' => 'Primrose_SOW_Heading',
				'raw' => false,
				'grid' => 0,
				'cell' => 0,
				'id' => 0,
				'style' => 
				array (
					'background_display' => 'tile',
				),
			),
		),
		1 => 
		array (
			'title' => '',
			'text' => '<p><strong>Workshop Store</strong><br />SingleStroke Street 168A,<br />Kuta, Bali,<br />Indonesia, 65141.</p><p>+62 (01) 23456789<br />email@primrose.theme</p><p><strong>Business Inquiries</strong><br />For business inquiries, please write to business@primrose.theme,<br />We will get back to you shortly.</p>',
			'text_selected_editor' => 'tinymce',
			'autop' => true,
			'_sow_form_id' => '56b1ad44176eb',
			'panels_info' => 
			array (
				'class' => 'SiteOrigin_Widget_Editor_Widget',
				'grid' => 0,
				'cell' => 0,
				'id' => 1,
				'style' => 
				array (
					'background_image_attachment' => false,
					'background_display' => 'tile',
				),
			),
		),
		2 => 
		array (
			'title' => '',
			'text' => '<p>[contact-form-7 id="19" title="Contact Form"]</p>',
			'text_selected_editor' => 'tinymce',
			'autop' => true,
			'_sow_form_id' => '56b1ad6e4de0e',
			'panels_info' => 
			array (
				'class' => 'SiteOrigin_Widget_Editor_Widget',
				'raw' => false,
				'grid' => 0,
				'cell' => 1,
				'id' => 2,
				'style' => 
				array (
					'background_display' => 'tile',
				),
			),
		),
	),
	'grids' => 
	array (
		0 => 
		array (
			'cells' => 2,
			'style' => 
			array (
				'bottom_margin' => '0px',
				'padding' => '100px 0px',
				'background_display' => 'tile',
			),
		),
	),
	'grid_cells' => 
	array (
		0 => 
		array (
			'grid' => 0,
			'weight' => 0.5,
		),
		1 => 
		array (
			'grid' => 0,
			'weight' => 0.5,
		),
	),
);