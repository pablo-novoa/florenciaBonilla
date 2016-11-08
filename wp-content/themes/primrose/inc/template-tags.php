<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Primrose
 */

if ( ! function_exists( 'primrose_topbar' ) ) :
	/**
	 * Prints HTML for topbar section.
	 */
	function primrose_topbar() {
		if ( primrose_get_theme_mod( 'topbar' ) ) : ?>
			<div id="topbar" class="topbar-section topbar-layout-<?php echo esc_attr( primrose_get_theme_mod( 'topbar_layout' ) ); ?>">
				<div class="wrapper">
					<?php $topbar_text = primrose_get_theme_mod( 'topbar_text' ); ?>
					<?php if ( ! empty( $topbar_text ) ) : ?>
						<div class="topbar-text">
							<?php echo html_entity_decode( $topbar_text ); ?>
						</div><!-- .topbar-text -->
					<?php endif; ?>

					<?php if ( has_nav_menu( 'topbar' ) ) : ?>
						<div class="topbar-navigation">
							<?php wp_nav_menu( array( 'theme_location' => 'topbar', 'menu_id' => 'topbar-menu', 'depth' => -1 ) ); ?>
						</div><!-- .topbar-navigation -->
					<?php endif; ?>
				</div><!-- .wrapper -->
			</div><!-- #topbar -->
		<?php endif;
	}
endif;

if ( ! function_exists( 'primrose_header' ) ) :
	/**
	 * Prints HTML for header section.
	 */
	function primrose_header() {
		$logo_url = primrose_get_theme_mod( 'logo_url' );
		if ( empty( $logo_url ) ) $logo_url = home_url( '/' );

		$logo = primrose_get_theme_mod( 'header_logo' );
		$logo = ( is_integer( $logo ) ) ? $logo : primrose_get_attachment_id_from_url( $logo );
		?>
		<header id="masthead" class="header-section site-header" role="banner">
			<div class="wrapper">
				<?php printf( '<%s id="logo" class="header-logo site-title">', ( is_front_page() && is_home() ) ? 'h1' : 'p' ); ?>
				<a href="<?php echo esc_url( $logo_url ); ?>" rel="home">
					<?php if ( ! empty( $logo ) ) {
						echo wp_get_attachment_image( $logo , 'full', 0, array( 'alt' => esc_attr( get_bloginfo( 'name' ) ) ) );
					} else {
						bloginfo( 'name' );
					} ?>
				</a>
				<?php printf( '</%s>', ( is_front_page() && is_home() ) ? 'h1' : 'p' ); ?><!-- .site-title -->
			</div><!-- .wrapper -->
		</header><!-- #masthead -->
		<?php
	}
endif;

if ( ! function_exists( 'primrose_header_navigation' ) ) :
	/**
	 * Prints HTML for header navigation section.
	 */
	function primrose_header_navigation() {
		?>
		<div id="navigation" class="navigation-anchor">
			<div class="navigation-section navigation-floating navigation-layout-<?php echo esc_attr( primrose_get_theme_mod( 'header_navigation_layout' ) ); ?>">
				<div class="wrapper">
					<div class="header-content">
						<nav id="header-navigation" class="header-navigation main-navigation typography-menu" role="navigation">
							<button class="header-navigation-toggle toggle"><i class="icon icon-menu"></i><span><?php esc_html_e( 'Menu', 'primrose' ); ?></span></button>
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
						</nav><!-- #header-navigation -->

						<?php if ( primrose_get_theme_mod( 'header_floating_logo' ) ) : ?>
							<div id="header-floating-logo" class="header-floating-logo">	
								<?php
								$logo_url = primrose_get_theme_mod( 'logo_url' );
								if ( empty( $logo_url ) ) $logo_url = home_url( '/' );
								
								$logo = primrose_get_theme_mod( 'header_floating_logo' );
								$logo = ( is_integer( $logo ) ) ? $logo : primrose_get_attachment_id_from_url( $logo );

								if ( ! empty( $logo ) ) : ?>
									<a href="<?php echo esc_url( $logo_url ); ?>">
										<?php echo wp_get_attachment_image( $logo , 'full', 0, array( 'alt' => esc_attr( get_bloginfo( 'name' ) ) ) ); ?>
									</a>
								<?php endif;
								?>
							</div>
						<?php endif; ?>

						<?php if ( primrose_get_theme_mod( 'header_search' ) ) : ?>
							<div id="header-search" class="header-search">
								<button class="header-search-toggle toggle">
									<span class="screen-reader-text"><?php esc_html_e( 'Search', 'primrose' ); ?></span>
									<i class="icon icon-magnifier"></i>
									<i class="close"></i>
								</button>
								<div class="header-search-widget">
									<?php
									add_filter( 'get_search_form', 'primrose_header_get_search_form' );
									echo get_search_form();
									remove_filter( 'get_search_form', 'primrose_header_get_search_form' );
									?>
								</div>
							</div><!-- #header-search -->
						<?php endif; ?>

						<?php if ( class_exists( 'WooCommerce' ) && primrose_get_theme_mod( 'header_cart' ) ) : ?>
							<div id="header-cart" class="header-cart">
								<?php if ( primrose_get_theme_mod( 'header_cart_widget' ) ) : ?>
									<button class="header-cart-link header-cart-toggle toggle">
										<i class="icon icon-<?php echo esc_attr( primrose_get_theme_mod( 'header_cart_icon' ) ); ?>"></i>
										<span class="screen-reader-text"><?php esc_html_e( 'Cart', 'primrose' ); ?></span>
										<span class="header-cart-text">
											<?php if ( WC()->cart->cart_contents_count > 0 ) : ?>
												<strong class="header-cart-count"><?php echo ( WC()->cart->cart_contents_count ); // WPCS: XSS OK. ?></strong>
											<?php endif; ?>
										</span>
									</button>
									<div class="header-cart-widget">
										<?php the_widget( 'WC_Widget_Cart', array(
											'title' => '',
											'hide_if_empty' => false,
										) ); ?>
									</div>
								<?php else : ?>
									<a href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" class="header-cart-link">
										<i class="icon icon-<?php echo esc_attr( primrose_get_theme_mod( 'header_cart_icon' ) ); ?>"></i>
										<span class="screen-reader-text"><?php esc_html_e( 'Cart', 'primrose' ); ?></span>
										<span class="header-cart-text">
											<?php if ( WC()->cart->cart_contents_count > 0 ) : ?>
												<strong class="header-cart-count"><?php echo ( WC()->cart->cart_contents_count ); // WPCS: XSS OK. ?></strong>
											<?php endif; ?>
										</span>
									</a>
								<?php endif; ?>
							</div><!-- #header-cart -->
						<?php endif; ?>

						<?php if ( 'wrapped' == primrose_get_theme_mod( 'header_border_bottom' ) ) : ?>
							<div class="header-border-bottom"></div>
						<?php endif; ?>
					</div><!-- .header-content -->
				</div>

				<?php if ( 'full-width' == primrose_get_theme_mod( 'header_border_bottom' ) ) : ?>
					<div class="header-border-bottom"></div>
				<?php endif; ?>
			</div><!-- .navigation-section -->
		</div><!-- #navigation -->
		<?php
	}
endif;

if ( ! function_exists( 'primrose_footer_instagram' ) ) :
	/**
	 * Prints HTML for footer Instagram feeds block.
	 */
	function primrose_footer_instagram() {
		if ( class_exists( 'null_instagram_widget' ) && primrose_get_theme_mod( 'footer_instagram' ) && '' !== primrose_get_theme_mod( 'footer_instagram_username' ) ) {
			the_widget(
				'null_instagram_widget',
				array(
					'username' => primrose_get_theme_mod( 'footer_instagram_username' ),
					'number' => 8,
					'size' => 'small',
					'target' => primrose_get_theme_mod( 'footer_instagram_link_target' ),
					'link' => primrose_get_theme_mod( 'footer_instagram_link_text' ),
				),
				array(
					'before_widget' => '<div id="footer-instagram" class="footer-instagram-section">' . ( 'wrapped' == primrose_get_theme_mod( 'footer_instagram_layout' ) ? '<div class="wrapper">' : '' ),
					'after_widget'  => '</div>' . ( 'wrapped' == primrose_get_theme_mod( 'footer_instagram_layout' ) ? '</div>' : '' ),
					'before_title'  => '<h3 class="instagram-title">',
					'after_title'   => '</h3>',
				)
			);
		}
	}
endif;

if ( ! function_exists( 'primrose_footer' ) ) :
	/**
	 * Prints HTML for footer elements.
	 */
	function primrose_footer() {
		?>
		<footer id="colophon" class="footer-section site-footer" role="contentinfo">
			<?php if ( 'full-width' == primrose_get_theme_mod( 'footer_border_top' ) ) : ?>
				<div class="footer-border-top"></div>
			<?php endif; ?>

			<div class="wrapper">
				<div class="footer-content">
					<?php if ( 'wrapped' == primrose_get_theme_mod( 'footer_border_top' ) ) : ?>
						<div class="footer-border-top"></div>
					<?php endif; ?>

					<?php $columns = primrose_get_theme_mod( 'footer_widgets_area_columns' ); if ( count( $columns ) > 0 ) : ?>
						<div id="footer-widgets" class="footer-widgets footer-widgets-title-<?php echo esc_attr( primrose_get_theme_mod( 'footer_widgets_title' ) ); ?>">
							<div class="footer-widgets-row clear">
								<?php for ( $i = 1; $i <= count( $columns ); $i++ ) : ?>
									<div class="footer-widgets-col footer-widgets-col-<?php echo esc_attr( $i ); ?> align-<?php echo esc_attr( $columns[ $i - 1 ]['align'] ); ?>" style="width: <?php echo esc_attr( $columns[ $i - 1 ]['width'] ); ?>%">
										<?php if ( is_active_sidebar( 'footer-widgets-' . $i ) ) dynamic_sidebar( 'footer-widgets-' . $i ); ?>
									</div><!-- .footer-widgets-col -->
								<?php endfor; ?>
							</div><!-- .footer-widgets-row -->
						</div><!-- #footer-widgets -->
					<?php endif; ?>

					<div class="footer-separator"></div>

					<?php if ( primrose_get_theme_mod( 'footer_social_media' ) ) : ?>
						<div id="footer-social-media" class="footer-social-media social-media-links">
							<?php foreach ( primrose_get_theme_mod( 'social_media_links' ) as $link ) : ?>
								<?php if ( empty( $link['link_url'] ) ) continue; ?>
								<?php if ( empty( $link['link_target'] ) ) $link['link_target'] = 'self'; ?>
								<a href="<?php echo esc_url( $link['link_url'] ); ?>" class="footer-social-media-link" target="_<?php echo esc_attr( $link['link_target'] ); ?>">
									<i class="fa fa-<?php echo esc_attr( $link['link_type'] ); ?>"></i><span class="screen-reader-text"></span>
								</a>
							<?php endforeach; ?>
						</div><!-- #footer-widgets -->
					<?php endif; ?>

					<div class="footer-copyright site-info">
						<?php echo html_entity_decode( primrose_get_theme_mod( 'footer_copyright_text' ) ); ?>
					</div><!-- .site-info -->
				</div>
			</div><!-- .wrapper -->

		</footer><!-- #colophon -->
		<?php
	}
endif;

if ( ! function_exists( 'primrose_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function primrose_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated screen-reader-text" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		echo '<a href="' . get_permalink() . '" class="posted-on">' . $time_string . '</a>'; // WPCS: XSS OK.
	}
endif;

if ( ! function_exists( 'primrose_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function primrose_entry_footer() {
		?>
		<div class="entry-footer-meta typography-meta">
		<?php 
			// Hide category and tag text for pages.
			if ( 'post' === get_post_type() ) {
				/* translators: by line */
				printf(
					'<span class="byline">' . esc_html_x( 'by %s', 'post author', 'primrose' ) . '</span>',
					'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
				);

				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( esc_html__( ', ', 'primrose' ) );
				if ( $categories_list && primrose_categorized_blog() ) {
					echo '<span class="cat-links">' . $categories_list . '</span>'; // WPCS: XSS OK.
				}
			}

			if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<span class="comments-link">';
				comments_popup_link( esc_html__( 'Leave a comment', 'primrose' ), esc_html__( '1 Comment', 'primrose' ), esc_html__( '% Comments', 'primrose' ) );
				echo '</span>';
			}
		?>
		</div><!-- .entry-footer-meta -->
		<?php
	}
endif;

if ( ! function_exists( 'primrose_entry_featured_media' ) ) :
	/**
	 * Prints HTML for post-format-specific featured media.
	 */
	function primrose_entry_featured_media( $format = null ) {
		if ( empty( $format ) ) {
			$format = false;
		}

		switch ( $format ) {
			case 'audio':
				$audio = get_post_meta( get_the_ID(), '_format_audio_embed', true );

				if ( ! empty( $audio ) ) : ?>
					<div class="entry-audio-embed entry-thumbnail">
						<?php if ( wp_oembed_get( $audio ) ) {
							echo wp_oembed_get( $audio );
						} else {
							echo ( $audio ); // WPCS: XSS OK.
						} ?>
					</div>
				<?php endif;

				break;

			case 'gallery':
				$images = get_post_meta( get_the_ID(), '_format_gallery_images', true );
				
				if ( ! empty( $images ) ) : wp_enqueue_script( 'slick' ); ?>
					<div class="entry-gallery entry-thumbnail slick">
						<?php foreach ( $images as $id ) : ?>
							<div class="entry-gallery-item">
								<?php echo wp_get_attachment_image( $id, 'content' ); ?>
								<?php $caption = get_post_field( 'post_excerpt', $id );
								if ( ! empty( $caption ) ) : ?>
									<span class="entry-gallery-caption"><?php echo ( $caption ); ?></span>
								<?php endif; ?>
							</div class="entry-gallery-item">
						<?php endforeach; ?>
					</div>
				<?php endif;

				break;

			case 'video':
				$video = get_post_meta( get_the_ID(), '_format_video_embed', true );

				if ( ! empty( $video ) ) : ?>
					<div class="entry-video-embed entry-thumbnail">
						<?php if ( wp_oembed_get( $video ) ) {
							echo wp_oembed_get( $video );
						} else {
							echo ( $video ); // WPCS: XSS OK.
						} ?>
					</div>
				<?php endif;

				break;

			default:
				if ( has_post_thumbnail() ) {
					printf(
						'<%s class="entry-thumbnail">%s</%s>',
						is_singular() ? 'div' : 'a href="' . get_the_permalink() . '"',
						get_the_post_thumbnail( get_the_ID(), 'content' ),
						is_singular() ? 'div' : 'a'
					);
				}
				break;
		}
	}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function primrose_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'primrose_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'primrose_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so primrose_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so primrose_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in primrose_categorized_blog.
 */
function primrose_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'primrose_categories' );
}
add_action( 'edit_category', 'primrose_category_transient_flusher' );
add_action( 'save_post',     'primrose_category_transient_flusher' );
