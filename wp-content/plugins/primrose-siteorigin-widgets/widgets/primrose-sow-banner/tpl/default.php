<div class="primrose-sow-banner">
	<?php $image = wp_get_attachment_image( $instance['image'], 'full' );

	if ( ! empty( $image ) ) {
		printf( '<%s class="primrose-sow-banner">%s</%s>',
			empty( $instance['url'] ) ? 'div' : 'a href="' . sow_esc_url( $instance['url'] ) . '"',
			$image,
			empty( $instance['url'] ) ? 'div' : 'a'
		);
	} ?>
</div><!-- .primrose-sow-banner -->