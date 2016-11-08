<?php $layouts = array(
	'desktop' => array(
		'numColumns' => $instance['desktop_layout']['columns'],
		'rowHeight' => empty( $instance['desktop_layout']['row_height'] ) ? 0: $instance['desktop_layout']['row_height'],
		'gutter' => empty( $instance['desktop_layout']['gutter'] ) ? 0: $instance['desktop_layout']['gutter'],
	),
	'normal' => array(
		'numColumns' => $instance['normal_layout']['columns'],
		'rowHeight' => empty( $instance['normal_layout']['row_height'] ) ? 0: $instance['normal_layout']['row_height'],
		'gutter' => empty( $instance['normal_layout']['gutter'] ) ? 0: $instance['normal_layout']['gutter'],
	),
	'tablet' => array(
		'numColumns' => $instance['tablet_layout']['columns'],
		'rowHeight' => empty( $instance['tablet_layout']['row_height'] ) ? 0: $instance['tablet_layout']['row_height'],
		'gutter' => empty( $instance['tablet_layout']['gutter'] ) ? 0: $instance['tablet_layout']['gutter'],
	),
	'mobile' => array(
		'numColumns' => $instance['mobile_layout']['columns'],
		'rowHeight' => empty( $instance['mobile_layout']['row_height'] ) ? 0: $instance['mobile_layout']['row_height'],
		'gutter' => empty( $instance['mobile_layout']['gutter'] ) ? 0: $instance['mobile_layout']['gutter'],
	),
	'mobileSmall' => array(
		'numColumns' => $instance['mobile_small_layout']['columns'],
		'rowHeight' => empty( $instance['mobile_small_layout']['row_height'] ) ? 0: $instance['mobile_small_layout']['row_height'],
		'gutter' => empty( $instance['mobile_small_layout']['gutter'] ) ? 0: $instance['mobile_small_layout']['gutter'],
	),
); ?>
<div class="primrose-sow-masonry-grid" data-layouts="<?php echo esc_attr( json_encode( $layouts ) ); ?>">
	<div class="primrose-sow-masonry-grid-sizer-width"></div>
	<div class="primrose-sow-masonry-grid-sizer-height" style="width: 0;"></div>
	<div class="primrose-sow-masonry-grid-sizer-gutter"></div>

	<?php foreach ( $instance['items'] as $item ) {
		$image_src = wp_get_attachment_url( $item['image'] );

		printf(
			'<div class="primrose-sow-masonry-grid-item %s" data-col-span="%s" data-row-span="%s">
				<%s class="primrose-sow-masonry-grid-item-inner" %s>
					<div class="primrose-sow-masonry-grid-item-background" style="background-color: %s; background-image: url(%s);"></div>

					<div class="primrose-sow-masonry-grid-item-overlay" style="background-color: %s;"></div>

					<div class="primrose-sow-masonry-grid-item-content">
						<div class="primrose-sow-masonry-grid-item-content-inner">
							%s
							%s
						</div>
					</div>
				</%s>
			</div>',
			empty( $item['zoom_effect'] ) ? '' : 'primrose-sow-masonry-grid-item-zoom-effect', // zoom effect
			esc_attr( $item['column_span'] ),                                                  // col span
			esc_attr( $item['row_span'] ),                                                     // row span
			empty( $item['url'] ) ? 'div' : 'a href="' . sow_esc_url( $item['url'] ) .'"',     // item inner
			empty( $item['new_window'] ) ? '' : 'target="_blank"',                             // new window
			esc_attr( $item['bg_color'] ),                                                     // background color
			$image_src,                                                                        // background image
			esc_attr( $item['overlay_color'] ),                                                // overlay color

			// title
			( ! empty( $item['title'] ) ? '<div class="primrose-sow-masonry-grid-item-title" style="color: ' . esc_attr( $item['title_color'] ) . ';">' . $item['title'] . '</div>' : '' ),

			// subtitle
			( ! empty( $item['subtitle'] ) ? '<div class="primrose-sow-masonry-grid-item-subtitle" style="color: ' . esc_attr( $item['subtitle_color'] ) . ';">' . $item['subtitle'] . '</div>' : '' ),

			empty( $item['url'] ) ? 'div' : 'a'                                                // closing tag
		);
	} ?>
</div><!-- .primrose-sow-masonry-grid -->
