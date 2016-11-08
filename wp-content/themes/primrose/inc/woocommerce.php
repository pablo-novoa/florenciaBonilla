<?php
/**
 * WooCommerce Compatibility File.
 *
 * @link https://woothemes.com/wocommerce/
 *
 * @package Primrose
 */

/**
 * Mobile screen breakpoint.
 */
function primrose_woocommerce_style_smallscreen_breakpoint( $px ) {
	$px = '767px';
	return $px;
}
add_filter( 'woocommerce_style_smallscreen_breakpoint','primrose_woocommerce_style_smallscreen_breakpoint' );

/**
 * Before main container.
 */
function primrose_woocommerce_before_main_content() {
	global $post;
	$primary = 'full-width';

	if ( is_shop() || is_product_category() || is_product_tag() ) {
		// Shop home or archive.
		$primary = primrose_get_theme_mod( 'shop_home_page_template' );
	} elseif ( is_product() ) {
		// Single Product.
		$primary = primrose_get_theme_mod( 'shop_single_page_template' );

		$custom_page_id = get_post_meta( $post->ID, '_primrose_woocommerce_product_page', true );
		if ( ! empty( $custom_page_id ) ) {
			$page_template = get_page_template_slug( $custom_page_id );
			if ( ! empty( $page_template ) ) {
				$primary .= ' ' . str_replace( '.php', '', str_replace( 'page-templates/', '', $page_template ) );
			}
		}
	} ?>
	<div id="primary" class="content-area woocommerce-content <?php echo esc_attr( $primary ); ?>">
		<main id="main" class="site-main" role="main">
	<?php
}
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
add_action( 'woocommerce_before_main_content', 'primrose_woocommerce_before_main_content', 10 );

/**
 * After main container.
 */
function primrose_woocommerce_after_main_content() {
	?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php
}
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
add_action( 'woocommerce_after_main_content', 'primrose_woocommerce_after_main_content', 10 );

/**
 * Review form options.
 */
function primrose_woocommerce_product_review_comment_form_args( $args ) {
	$args['title_reply'] = esc_html__( 'Add a review', 'primrose' );

	return $args;
}
add_filter( 'woocommerce_product_review_comment_form_args', 'primrose_woocommerce_product_review_comment_form_args', 10 );

/**
 * Review gravatar size.
 */
function primrose_woocommerce_review_gravatar_size( $size ) {
	return 40;
}
add_filter( 'woocommerce_review_gravatar_size', 'primrose_woocommerce_review_gravatar_size' );

/**
 * Remove sidebar.
 */
function primrose_woocommerce_sidebar() {
	if ( 'default' != primrose_get_theme_mod( is_product() ? 'shop_single_page_template' : 'shop_home_page_template' ) ) {
		remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
	}
}
add_action( 'template_redirect', 'primrose_woocommerce_sidebar' );

/**
 * Topbar shopping cart count.
 */
function primrose_woocommerce_topbar_cart_menu_count( $items, $menu, $args ) {
	$cart_page_id = get_option( 'woocommerce_cart_page_id' );

	foreach ( $items as &$item ) {
		if ( 'page' == $item->object && $cart_page_id == $item->object_id ) {
			// Shopping cart menu
			$item->title .= ' <span class="cart-count">(' . WC()->cart->cart_contents_count . ')</span>';
		}
	}

	return $items;
}
add_filter( 'wp_get_nav_menu_items', 'primrose_woocommerce_topbar_cart_menu_count', 10, 3 );

/**
 * AJAX update header cart.
 */
function primrose_woocommerce_header_cart_update( $fragments ) {
	ob_start();
	?>
	<span class="header-cart-text">
		<?php if ( WC()->cart->cart_contents_count > 0 ) : ?>
			<strong class="header-cart-count"><?php echo ( WC()->cart->cart_contents_count ); // WPCS: XSS OK. ?></strong>
		<?php endif; ?>
	</span>
	<?php
	$fragments['.header-cart-text'] = ob_get_clean();

	$fragments['.cart-count'] = '<span class="cart-count">(' . WC()->cart->cart_contents_count . ')</span>';
	
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'primrose_woocommerce_header_cart_update' );

/**
 * AJAX woocommerce_add_cart_item.
 *
 * Needed for custom AJAX add to cart button that only supplies "data-product_id".
 * If the product_id supplied is a variation ID, this filter will automatically fill the "variation" array which was empty.
 */
function primrose_woocommerce_add_cart_item( $data, $key ) {
	if ( ! empty( $data['variation_id'] ) && empty( $data['variation'] ) ) {
		// get parents for checking.
		$parents = get_post_ancestors( $data['variation_id'] );

		// check if product_variation_id is direct child of product_id.
		if ( $data['product_id'] == $parents[0] ) {
			// get post meta from the variation.
			$post_meta = get_post_meta( $data['variation_id'], '', true );

			// attributes pool array.
			$attr = array();
			foreach ( $post_meta as $key => $value ) {
				// check if it's an attribute.
				if ( false !== strpos( $key, 'attribute_' ) ) {
					$attr[$key] = $value[0];
				}
			}

			$data['variation'] = $attr;
		}
	}

	return $data;
}
add_filter( 'woocommerce_add_cart_item', 'primrose_woocommerce_add_cart_item', 10, 2 );


/**
 * Set default configuration for product image sizes.
 */
function primrose_woocommerce_product_settings( $settings ) {
	$catalog = array_search( 'shop_catalog_image_size', array_column( $settings, 'id' ) );
	if ( false !== $catalog ) {
		$settings[ $catalog ]['default'] = array(
			'width'  => '480',
			'height' => '',
			'crop'   => false,
		);
	}

	$single = array_search( 'shop_single_image_size', array_column( $settings, 'id' ) );
	if ( false !== $single ) {
		$settings[ $single ]['default'] = array(
			'width'  => '1080',
			'height' => '',
			'crop'   => false,
		);
	}

	$thumbnail = array_search( 'shop_thumbnail_image_size', array_column( $settings, 'id' ) );
	if ( false !== $thumbnail ) {
		$settings[ $thumbnail ]['default'] = array(
			'width'  => '150',
			'height' => '150',
			'crop'   => true,
		);
	}

	return $settings;
}
add_filter( 'woocommerce_product_settings', 'primrose_woocommerce_product_settings' );

/**
 * Set breadcrumb "home" text.
 */
function primrose_woocommerce_breadcrumb_home_text( $defaults ) {
	$home = primrose_get_theme_mod( 'shop_breadcrumb_home_text' );
	if ( ! empty( $home ) ) {
    $defaults['home'] = $home;
  }

	return $defaults;
}
add_filter( 'woocommerce_breadcrumb_defaults', 'primrose_woocommerce_breadcrumb_home_text' );

/**
 * Set breadcrumb "home" URL.
 */
function primrose_woocommerce_breadrumb_home_url() {
	$home = primrose_get_theme_mod( 'shop_breadcrumb_home_url' );
	if ( empty( $home ) ) $home = get_permalink( get_option( 'woocommerce_shop_page_id' ) );

	return $home;
}
add_filter( 'woocommerce_breadcrumb_home_url', 'primrose_woocommerce_breadrumb_home_url' );

/**
 * Set breadcrumb delimeter.
 */
function primrose_woocommerce_breadcrumb_delimiter( $defaults ) {
	$defaults['delimiter'] = ' <span class="ss-woo-breadcrumb-delimiter">&raquo;</span> ';
	return $defaults;
}
add_filter( 'woocommerce_breadcrumb_defaults', 'primrose_woocommerce_breadcrumb_delimiter' );

/**
 * Show/hide breadcrumb
 */
function primrose_woocommerce_breadcrumb() {
	if ( ! primrose_get_theme_mod( 'shop_breadcrumb' ) ) {
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	}
}
add_action( 'template_redirect', 'primrose_woocommerce_breadcrumb' );

/**
 * Show/hide add to cart button from products loop.
 */
function primrose_woocommerce_products_add_to_cart_button() {
	if ( ! primrose_get_theme_mod( 'shop_products_add_to_cart' ) ) {
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	}
}
add_action( 'template_redirect', 'primrose_woocommerce_products_add_to_cart_button' );

/**
 * Add products loop filter.
 */
function primrose_woocommerce_subcategories() {
	if ( ! is_shop() && ! is_product_category() ) return;

	if ( ! primrose_get_theme_mod( 'shop_subcategories' ) ) return;

	$args = array(
		'taxonomy' => 'product_cat',
		'parent' => 0,
	);

	if ( is_product_category() && ! is_shop() ) {
		$cat = get_queried_object();
		$args['parent'] = $cat->term_id;
	}

	$args = apply_filters( 'primrose_woocommerce_subcategories', $args );

	$categories = get_categories( $args ); ?>
	<ul class="ss-woo-categories">
		<?php if ( is_product_category() || is_search() ) : ?>
			<li>
				<a href="<?php echo esc_url( get_permalink( woocommerce_get_page_id( 'shop' ) ) ); ?>"><?php esc_html_e( '&larr; All Products', 'primrose' ); ?></a>
			</li>

			<?php if ( is_product_category() ) :
				$ancestors = get_ancestors( $cat->term_id, $cat->taxonomy );
				foreach ( $ancestors as $key => $ancestor ) : $anc = get_category( $ancestor ); ?>
					<li>
						<a href="<?php echo esc_url( get_category_link( $ancestor ) ); ?>"><?php echo ( '&larr; ' . $anc->name ); // WPCS: XSS OK. ?></a>
					</li>
				<?php
				endforeach;
			endif; ?>
		<?php endif; ?>

		<?php if ( ! empty( $categories ) ) : foreach ( $categories as $category ) : ?>
			<li>
				<a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo ( $category->name ); // WPCS: XSS OK. ?></a>
			</li>
		<?php endforeach; endif; ?>
	</ul><!-- .ss-woo-categories -->
	<?php
}
add_action( 'woocommerce_before_shop_loop', 'primrose_woocommerce_subcategories', 9 );

/**
 * Show/hide products loop filter.
 */
function primrose_woocommerce_products_filter() {
	if ( ! primrose_get_theme_mod( 'shop_products_filter' ) ) {
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
	}
}
add_action( 'template_redirect', 'primrose_woocommerce_products_filter' );

/**
 * Set products loop columns.
 */
function primrose_woocommerce_loop_columns() {
	global $woocommerce;

	// Default Value also used for categories and sub_categories.
	$columns = primrose_get_theme_mod( 'shop_products_grid_columns' );

	// Products in a category.
	if ( is_product_category() ) :
		$columns = primrose_get_theme_mod( 'shop_products_grid_columns' );
	endif;

	// Products in a tag.
	if ( is_product_tag() ) :
		$columns = primrose_get_theme_mod( 'shop_products_grid_columns' );
	endif;

	// Related Products.
	if ( is_product() ) :
		$columns = primrose_get_theme_mod( 'shop_products_grid_columns' );
	endif;

	// Cross Sells.
	if ( is_checkout() ) :
		$columns = primrose_get_theme_mod( 'shop_products_grid_columns' );
	endif;

	return $columns;
}
add_filter( 'loop_shop_columns', 'primrose_woocommerce_loop_columns' );

/**
 * Set related products maximum posts.
 */
function primrose_woocommerce_related_products_maximum_posts( $args ) {
	$args['posts_per_page'] = primrose_get_theme_mod( 'shop_related_products_grid_posts' );
	$args['columns'] = primrose_get_theme_mod( 'shop_related_products_grid_columns' );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'primrose_woocommerce_related_products_maximum_posts' );

/**
 * Change lightbox library.
 */
function primrose_woocommerce_disable_prettyphoto() {
	// Styles
	wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
	
	// Scripts
	wp_dequeue_script( 'prettyPhoto' );
	wp_dequeue_script( 'prettyPhoto-init' );
	wp_dequeue_script( 'fancybox' );
	wp_dequeue_script( 'enable-lightbox' );
}
add_action( 'wp_enqueue_scripts', 'primrose_woocommerce_disable_prettyphoto', 99 );

/**
 * Remove prettyPhoto attribute
 */
function primrose_woocommerce_enable_lightgallery( $html ) {
	$html = str_replace( 'data-rel="prettyPhoto[product-gallery]', '', $html );

	return $html;
}
add_filter( 'woocommerce_single_product_image_html', 'primrose_woocommerce_enable_lightgallery', 99, 1 ); // single image
add_filter( 'woocommerce_single_product_image_thumbnail_html', 'primrose_woocommerce_enable_lightgallery', 99, 1 ); // thumbnails

/**
 * Setup product gallery
 */
function primrose_woocommerce_single_product_images() {
	global $post;

	$gallery_mode = primrose_get_theme_mod( 'shop_single_gallery' );
	$post_meta = get_post_meta( $post->ID, '_primrose_woocommerce_gallery_mode', true );

	if ( $post_meta ) $gallery_mode = $post_meta;

	switch ( $gallery_mode ) {
		case 'slider':
			/**
			 * Image slider.
			 */
			wp_enqueue_script( 'slick' );

			remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
			function primrose_woocommerce_single_product_slider() {
				global $post, $product, $woocommerce;

				// Images IDs.
				$ids = array_merge(
					has_post_thumbnail() ? array( get_post_thumbnail_id() ) : array(),
					$product->get_gallery_attachment_ids()
				); ?>

				<div class="images">
					<?php if ( count( $ids ) > 0 ) : ?>
						<div class="ss-woo-single-product-slider">
							<div class="ss-woo-single-product-slider-main slick">
								<?php foreach ( $ids as $id ) : ?>
									<?php $props = wc_get_product_attachment_props( $id, $post );
									
									echo wp_get_attachment_image( $id, apply_filters( 'single_product_small_thumbnail_size', 'shop_single' ), false, $props ); ?>
								<?php endforeach; ?>
							</div>

							<div class="thumbnails ss-woo-single-product-slider-nav slick">
								<?php foreach ( $ids as $id ) : ?>
									<?php $props = wc_get_product_attachment_props( $id, $post );
									
									echo '<span>' . wp_get_attachment_image( $id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ), false, $props ) . '</span>'; ?>
								<?php endforeach; ?>
							</div>
						</div>
					<?php else : ?>
						<?php echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'woocommerce' ) ), $post->ID ); ?>
					<?php endif; ?>
				</div>
				<?php
			}
			add_action( 'woocommerce_before_single_product_summary', 'primrose_woocommerce_single_product_slider', 20 );
			break;

		case 'stacked':
			/**
			 * Stacked images.
			 */
			function primrose_woocommerce_single_product_small_thumbnail_size( $size ) {
				return 'shop_single';
			}
			add_filter( 'single_product_small_thumbnail_size', 'primrose_woocommerce_single_product_small_thumbnail_size' );

			function primrose_woocommerce_woocommerce_product_thumbnails_columns( $columns ) {
				return 1;
			}
			add_filter( 'woocommerce_product_thumbnails_columns', 'primrose_woocommerce_woocommerce_product_thumbnails_columns' );
			break;
		
		default:
			/**
			 * Change lighbot module to lightgallery.
			 */
			if ( 'yes' == get_option( 'woocommerce_enable_lightbox' ) ) {
				function primrose_woocommerce_enqueue_scripts_lightgallery() {
					wp_enqueue_style( 'lightgallery' );
					wp_enqueue_script( 'lightgallery' );
				}
				add_action( 'wp_enqueue_scripts', 'primrose_woocommerce_enqueue_scripts_lightgallery' );
			}
			break;
	}
}
add_action( 'template_redirect', 'primrose_woocommerce_single_product_images' );

/**
 * Add metaboxes to Edit page.
 */
function primrose_woocommerce_add_meta_boxes() {
	// Single product gallery mode
	add_meta_box(
		'primrose_woocommerce_gallery_mode',
		esc_html__( 'Gallery Mode', 'primrose' ),
		'primrose_woocommerce_gallery_mode_meta_box',
		'product',
		'side'
	);

	// Custom product page.
	add_meta_box(
		'primrose_woocommerce_product_page',
		esc_html__( 'Custom Product Page', 'primrose' ),
		'primrose_woocommerce_product_page_meta_box',
		'product',
		'side'
	);
}
add_action( 'add_meta_boxes', 'primrose_woocommerce_add_meta_boxes' );

/**
 * Print Gallery Mode meta box content.
 */
function primrose_woocommerce_gallery_mode_meta_box( $post ) {
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'primrose_woocommerce_gallery_mode_meta_box_save', 'primrose_woocommerce_gallery_mode_nonce' );

	$value = get_post_meta( $post->ID, '_primrose_woocommerce_gallery_mode', true );
	?>
	<label for="primrose_woocommerce_gallery_mode"><?php esc_html_e( 'This could override the Customizer settings on Appearance > Customize > Shop > Product images gallery model. This only works if the Custom Product Page mode is not active.', 'primrose' ); ?></label><br>
	<p>
		<select id="primrose_woocommerce_gallery_mode" name="primrose_woocommerce_gallery_mode">
			<option value="false" <?php selected( $value, false ); ?>><?php esc_html_e( '-- Use Customizer settings --', 'primrose' ); ?></option>
			<option value="default" <?php selected( $value, 'default' ); ?>><?php esc_html_e( 'Default (WooCommerce lightbox)', 'primrose' ); ?></option>
			<option value="slider" <?php selected( $value, 'slider' ); ?>><?php esc_html_e( 'Image slider', 'primrose' ); ?></option>
			<option value="stacked" <?php selected( $value, 'stacked' ); ?>><?php esc_html_e( 'Stacked images', 'primrose' ); ?></option>
		</select>
	</p>
	<?php
}

/**
 * Save Custom Product Page metabox data.
 */
function primrose_woocommerce_gallery_mode_meta_box_save( $post_id ) {
	// Check if our nonce is set.
	if ( ! isset( $_POST['primrose_woocommerce_gallery_mode_nonce'] ) ) return;

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['primrose_woocommerce_gallery_mode_nonce'], 'primrose_woocommerce_gallery_mode_meta_box_save' ) ) return;

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'product' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) return;
	} else {
		if ( ! current_user_can( 'edit_post', $post_id ) ) return;
	}
	
	// Make sure that it is set.
	if ( ! isset( $_POST['primrose_woocommerce_gallery_mode'] ) ) return;

	// Update the meta field in the database.
	update_post_meta( $post_id, '_primrose_woocommerce_gallery_mode', sanitize_text_field( $_POST['primrose_woocommerce_gallery_mode'] ) );
}
add_action( 'save_post', 'primrose_woocommerce_gallery_mode_meta_box_save' );

/**
 * Print Custom Produt Page meta box content.
 */
function primrose_woocommerce_product_page_meta_box( $post ) {
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'primrose_woocommerce_product_page_meta_box_save', 'primrose_woocommerce_product_page_nonce' );

	$value = get_post_meta( $post->ID, '_primrose_woocommerce_product_page', true );
	?>
	<label for="primrose_woocommerce_product_page"><?php esc_html_e( 'Select Page to override the WooCommerce standard content.', 'primrose' ); ?></label><br>
	<p>
		<select id="primrose_woocommerce_product_page" name="primrose_woocommerce_product_page">
			<option value="false" <?php selected( $value, false ); ?>><?php esc_html_e( '-- Use standard content --', 'primrose' ); ?></option>
			<?php $pages = get_pages();
			foreach ( $pages as $page ) {
				echo '<option value="' . $page->ID . '" ' . selected( $value, $page->ID ) . '>' . $page->post_title . '</option>';
			} ?>
		</select>
	</p>
	<?php
}

/**
 * Save Custom Product Page metabox data.
 */
function primrose_woocommerce_product_page_meta_box_save( $post_id ) {
	// Check if our nonce is set.
	if ( ! isset( $_POST['primrose_woocommerce_product_page_nonce'] ) ) return;

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['primrose_woocommerce_product_page_nonce'], 'primrose_woocommerce_product_page_meta_box_save' ) ) return;

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'product' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) return;
	} else {
		if ( ! current_user_can( 'edit_post', $post_id ) ) return;
	}
	
	// Make sure that it is set.
	if ( ! isset( $_POST['primrose_woocommerce_product_page'] ) ) return;

	// Update the meta field in the database.
	update_post_meta( $post_id, '_primrose_woocommerce_product_page', sanitize_text_field( $_POST['primrose_woocommerce_product_page'] ) );
}
add_action( 'save_post', 'primrose_woocommerce_product_page_meta_box_save' );

/**
 * Override template.
 */
function primrose_woocommerce_override_product_page_template( $template, $slug, $name ) {
	global $post;

	if ( is_singular( 'product' ) && 'single-product' == $name ) {
		// Check if product is using custom product page.
		$custom_page_id = get_post_meta( $post->ID, '_primrose_woocommerce_product_page', true );
		if ( empty( $custom_page_id ) ) return $template;

		// Check if custom product page exists.
		$custom_page = get_post( $custom_page_id );
		if ( empty( $custom_page ) ) return $template;
			
		$new_template = locate_template( 'template-parts/content-single-product-custom.php' );
		if ( ! empty( $new_template ) ) $template = $new_template;
	}

	return $template;
}
add_filter( 'wc_get_template_part', 'primrose_woocommerce_override_product_page_template', 10, 3 );