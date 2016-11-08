<?php if ( ! empty( $instance['product_id'] ) ) : ?>
	<?php
	$button = do_shortcode( '[add_to_cart id="' . $instance['product_id'] . '" show_price="false" style="" class="primrose-sow-woocommerce-add-to-cart-button primrose-sow-alignment-' . $instance['alignment'] . '"]' );

	// Replace text, there is no hook available for this.
	$button = preg_replace( '/<([\w]+[^>]*)>(.*?)<\/([\w]+)>/', '<$1>' . $instance['button']['text'] . '</$3>', $button );

	// Allow AJAX add to cart mode.
	$button = str_replace( 'product_type_variation', 'product_type_variation ajax_add_to_cart', $button );

	// Print button.
	echo ( $button );
	?>
<?php endif; ?>