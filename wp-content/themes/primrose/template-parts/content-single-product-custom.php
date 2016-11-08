<?php
/**
 * The template for displaying WooCommerce custom product page in default layout (with sidebar).
 *
 * @package Primrose
 */

$custom_page_id = get_post_meta( $post->ID, '_primrose_woocommerce_product_page', true );
global $product;

?>
<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class( 'primrose-woocommerce-custom-product-page' ); ?>>
	<div class="entry-content">
		<div class="custom-product-page-meta screen-reader-text">
			<?php
			woocommerce_template_single_title();
			woocommerce_template_single_rating();
			woocommerce_template_single_price();
			woocommerce_template_single_excerpt();
			?>
		</div>

		<?php
		ob_start(); wc_print_notices(); $notices = ob_get_clean();
		if ( ! empty( $notices ) ) : ?>
			<div class="ss-woo-custom-product-page-notices">
				<?php echo ( $notices ); ?>
			</div>
		<?php endif;
		?>

		<?php
			$siteorigin = get_post_meta( $custom_page_id, 'panels_data', true );

			if ( ! empty( $siteorigin ) && function_exists( 'siteorigin_panels_render' ) ) {
				$content = siteorigin_panels_render( $custom_page_id );
			} else {
				$custom_page = get_post( $custom_page_id );
				$content = $custom_page->post_content;
				$content = apply_filters( 'the_content', $content );
				$content = str_replace( ']]>', ']]&gt;', $content );
			}

			echo ( $content );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'primrose' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<meta itemprop="url" content="<?php the_permalink(); ?>" />
</div><!-- #product-<?php the_ID(); ?> -->
