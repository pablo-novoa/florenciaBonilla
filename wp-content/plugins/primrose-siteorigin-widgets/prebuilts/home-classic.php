<?php
return array (
	'name' => esc_html__( 'Home - Classic', 'primrose' ),
	'description' => esc_html__( 'Homepage layout with classic banners and products grid.', 'primrose' ),
	'screenshot' => PRIMROSE_SOW_IMG . '/home-classic.png',
	'widgets' => 
	array (
		0 => 
		array (
			'slides' => 
			array (
				0 => 
				array (
					'title' => 'Welcome to Primrose',
					'background' => 'image',
					'bg_color' => '#f3f3f3',
					'video' => 0,
					'video_poster' => 0,
					'video_pattern' => 'disabled',
					'image' => 378,
					'overlay_color' => 'rgba(0,0,0,0)',
					'title_color' => '#ffffff',
					'buttons' => 
					array (
						'buttons' => 
						array (
							0 => 
							array (
								'text' => 'Browse Our Collection',
								'url' => 'post: 5',
								'bg_color' => '#000000',
								'border_color' => '#000000',
								'text_color' => '#ffffff',
								'hover_bg_color' => '#333333',
								'hover_border_color' => '#333333',
								'hover_text_color' => '#ffffff',
								'new_window' => false,
							),
						),
						'alignment' => 'center',
					),
				),
				1 => 
				array (
					'title' => 'Made for Any Creative Brands',
					'background' => 'image',
					'bg_color' => '#f3f3f3',
					'video' => 0,
					'video_poster' => 0,
					'video_pattern' => 'disabled',
					'image' => 358,
					'overlay_color' => 'rgba(0,0,0,0)',
					'title_color' => '#ffffff',
					'buttons' => 
					array (
						'buttons' => 
						array (
							0 => 
							array (
								'text' => 'Shop Now',
								'url' => 'post: 5',
								'bg_color' => '#000000',
								'border_color' => '#000000',
								'text_color' => '#ffffff',
								'hover_bg_color' => '#333333',
								'hover_border_color' => '#333333',
								'hover_text_color' => '#ffffff',
								'new_window' => false,
							),
						),
						'alignment' => 'center',
					),
				),
			),
			'autoplay' => 5000,
			'desktop_layout' => 
			array (
				'height' => '640px',
				'so_field_container_state' => 'open',
			),
			'normal_layout' => 
			array (
				'height' => '560px',
				'so_field_container_state' => 'open',
			),
			'tablet_layout' => 
			array (
				'height' => '420px',
				'so_field_container_state' => 'open',
			),
			'mobile_layout' => 
			array (
				'height' => '300px',
				'so_field_container_state' => 'open',
			),
			'mobile_small_layout' => 
			array (
				'height' => '180px',
				'so_field_container_state' => 'open',
			),
			'_sow_form_id' => '56b9c629c9a4e',
			'parallax' => false,
			'panels_info' => 
			array (
				'class' => 'Primrose_SOW_Hero_Slider',
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
			'image' => 365,
			'url' => 'post: 5',
			'_sow_form_id' => '56b9bba021bf8',
			'panels_info' => 
			array (
				'class' => 'Primrose_SOW_Banner',
				'raw' => false,
				'grid' => 1,
				'cell' => 0,
				'id' => 1,
				'style' => 
				array (
					'background_display' => 'tile',
				),
			),
		),
		2 => 
		array (
			'image' => 363,
			'url' => 'post: 33',
			'_sow_form_id' => '56b9d76106f67',
			'panels_info' => 
			array (
				'class' => 'Primrose_SOW_Banner',
				'raw' => false,
				'grid' => 1,
				'cell' => 1,
				'id' => 2,
				'style' => 
				array (
					'background_display' => 'tile',
				),
			),
		),
		3 => 
		array (
			'image' => 364,
			'url' => '#',
			'_sow_form_id' => '56b9d77e522c4',
			'panels_info' => 
			array (
				'class' => 'Primrose_SOW_Banner',
				'raw' => false,
				'grid' => 1,
				'cell' => 2,
				'id' => 3,
				'style' => 
				array (
					'background_display' => 'tile',
				),
			),
		),
		4 => 
		array (
			'text' => 'Shop by Categories',
			'level' => 'h2',
			'alignment' => 'center',
			'_sow_form_id' => '56b9bffb44359',
			'panels_info' => 
			array (
				'class' => 'Primrose_SOW_Heading',
				'raw' => false,
				'grid' => 2,
				'cell' => 0,
				'id' => 4,
				'style' => 
				array (
					'background_display' => 'tile',
				),
			),
		),
		5 => 
		array (
			'query' => 'categories',
			'category_slug' => 'candle-holders',
			'attribute' => '',
			'filter' => '',
			'category_ids' => 
			array (
				0 => '13',
				1 => '12',
				2 => '15',
				3 => '11',
			),
			'parent_category_id' => false,
			'orderby' => 'date',
			'order' => 'desc',
			'per_page' => 4,
			'columns' => 4,
			'_sow_form_id' => '56b9c017f4224',
			'product_ids' => false,
			'panels_info' => 
			array (
				'class' => 'Primrose_SOW_WooCommerce_Posts_Grid',
				'raw' => false,
				'grid' => 2,
				'cell' => 0,
				'id' => 5,
				'style' => 
				array (
					'background_display' => 'tile',
				),
			),
		),
		6 => 
		array (
			'text' => 'Recent Products',
			'level' => 'h2',
			'alignment' => 'center',
			'_sow_form_id' => '56b9c1ec57f0f',
			'panels_info' => 
			array (
				'class' => 'Primrose_SOW_Heading',
				'raw' => false,
				'grid' => 2,
				'cell' => 0,
				'id' => 6,
				'style' => 
				array (
					'background_display' => 'tile',
				),
			),
		),
		7 => 
		array (
			'query' => 'recent',
			'category_slug' => 'candle-holders',
			'attribute' => '',
			'filter' => '',
			'category_ids' => 
			array (
				0 => '13',
				1 => '12',
				2 => '15',
				3 => '11',
			),
			'parent_category_id' => '13',
			'orderby' => 'date',
			'order' => 'desc',
			'per_page' => 3,
			'columns' => 3,
			'_sow_form_id' => '56b9c1fe347d0',
			'product_ids' => false,
			'panels_info' => 
			array (
				'class' => 'Primrose_SOW_WooCommerce_Posts_Grid',
				'raw' => false,
				'grid' => 2,
				'cell' => 0,
				'id' => 7,
				'style' => 
				array (
					'background_display' => 'tile',
				),
			),
		),
		8 => 
		array (
			'text' => 'Our Best Sellers',
			'level' => 'h2',
			'alignment' => 'center',
			'_sow_form_id' => '56b9c22da315c',
			'panels_info' => 
			array (
				'class' => 'Primrose_SOW_Heading',
				'raw' => false,
				'grid' => 2,
				'cell' => 0,
				'id' => 8,
				'style' => 
				array (
					'background_display' => 'tile',
				),
			),
		),
		9 => 
		array (
			'query' => 'best-selling',
			'category_slug' => 'candle-holders',
			'attribute' => '',
			'filter' => '',
			'category_ids' => 
			array (
				0 => '13',
				1 => '12',
				2 => '15',
				3 => '11',
			),
			'parent_category_id' => '13',
			'orderby' => 'date',
			'order' => 'desc',
			'per_page' => 3,
			'columns' => 3,
			'_sow_form_id' => '56b9c24113873',
			'product_ids' => false,
			'panels_info' => 
			array (
				'class' => 'Primrose_SOW_WooCommerce_Posts_Grid',
				'raw' => false,
				'grid' => 2,
				'cell' => 0,
				'id' => 9,
				'style' => 
				array (
					'background_display' => 'tile',
				),
			),
		),
		10 => 
		array (
			'_sow_form_id' => '56b9d9140e9ac',
			'panels_info' => 
			array (
				'class' => 'Primrose_SOW_Divider',
				'raw' => false,
				'grid' => 2,
				'cell' => 0,
				'id' => 10,
			),
		),
		11 => 
		array (
			'text' => 'Subscribe our weekly newsletter for latest promos and new products info',
			'buttons' => 
			array (
				'buttons' => 
				array (
					0 => 
					array (
						'text' => 'Subscribe',
						'url' => '#',
						'bg_color' => '#000000',
						'border_color' => '#000000',
						'text_color' => '#ffffff',
						'hover_bg_color' => '#333333',
						'hover_border_color' => '#333333',
						'hover_text_color' => '#ffffff',
						'new_window' => false,
					),
				),
				'alignment' => 'center',
			),
			'_sow_form_id' => '56b9d8b1f30d9',
			'panels_info' => 
			array (
				'class' => 'Primrose_SOW_CTA',
				'raw' => false,
				'grid' => 2,
				'cell' => 0,
				'id' => 11,
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
			'cells' => 1,
			'style' => 
			array (
			),
		),
		1 => 
		array (
			'cells' => 3,
			'style' => 
			array (
			),
		),
		2 => 
		array (
			'cells' => 1,
			'style' => 
			array (
				'padding' => '40px 0px 100px',
				'background_image_attachment' => false,
				'background_display' => 'tile',
			),
		),
	),
	'grid_cells' => 
	array (
		0 => 
		array (
			'grid' => 0,
			'weight' => 1,
		),
		1 => 
		array (
			'grid' => 1,
			'weight' => 0.33333333333333331,
		),
		2 => 
		array (
			'grid' => 1,
			'weight' => 0.33333333333333331,
		),
		3 => 
		array (
			'grid' => 1,
			'weight' => 0.33333333333333331,
		),
		4 => 
		array (
			'grid' => 2,
			'weight' => 1,
		),
	),
);