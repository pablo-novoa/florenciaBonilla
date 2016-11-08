<?php
/**
 * Generated CSS from customizer options.
 *
 * @package Primrose
 */

?>
body,
.typography-meta,
.comment-metadata,
.widget_recent_entries .post-date,
.widget_rss .rss-date,
.singlestroke_widget_posts .ss-date,
.woocommerce #reviews #comments ol.commentlist li .comment-text p.meta time {
	font-family: <?php echo primrose_format_font_family_css( esc_attr( primrose_get_theme_mod( 'typography_body_font_family' ) ) ); ?>;
}


h1, h2, h3, h4, h5, h6,
.primrose-sow-feature-heading {
	font-family: <?php echo primrose_format_font_family_css( esc_attr( primrose_get_theme_mod( 'typography_headings_font_family' ) ) ); ?>;
}

.typography-menu,
.button,
button,
input[type="button"],
input[type="reset"],
input[type="submit"],
.nav-links,
.widget-title,
.footer-instagram-section .instagram-pics + p a,
.woocommerce span.onsale,
.woocommerce div.product .woocommerce-tabs ul.tabs,
.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt {
	font-family: <?php echo primrose_format_font_family_css( esc_attr( primrose_get_theme_mod( 'typography_menu_font_family' ) ) ); ?>;
}

.typography-title,
.typography-heading,
.comment-reply-title,
.comments-title,
.singlestroke_widget_about_me .ss-heading,
.woocommerce div.product .product_title,
.woocommerce .page-title,
.related.products h2,
.primrose-sow-counter-caption,
.primrose-sow-heading,
.primrose-sow-hero-slide-title,
.primrose-sow-masonry-grid-item-title,
.primrose-sow-woocommerce-price-box-name {
	font-family: <?php echo primrose_format_font_family_css( esc_attr( primrose_get_theme_mod( 'typography_title_font_family' ) ) ); ?>;
}

.woocommerce ul.products li.product {
	width: <?php echo esc_attr( floor( 100 / primrose_get_theme_mod( 'shop_products_grid_columns' ) * 100 ) / 100 . '%' ); ?>;
}
@media screen and ( max-width: 1023px ) {
	<?php if ( 4 == primrose_get_theme_mod( 'shop_products_grid_columns' ) ) : ?>
		.woocommerce ul.products li.product {
			width: 50%;
		}
	<?php endif; ?>
}
.woocommerce .products ul, .woocommerce ul.products {
	margin: 0 -<?php echo esc_attr( primrose_get_theme_mod( 'shop_products_grid_gutter' ) / 2 . 'px' ); ?>;
}
.woocommerce ul.products li.product, .woocommerce-page ul.products li.product {
	padding: 0 <?php echo esc_attr( primrose_get_theme_mod( 'shop_products_grid_gutter' ) / 2 . 'px' ); ?>;
}

.woocommerce .related ul.products li.product {
	width: <?php echo esc_attr( floor( 100 / primrose_get_theme_mod( 'shop_related_products_grid_columns' ) * 100 ) / 100 . '%' ); ?>;
}
@media screen and ( max-width: 1023px ) {
	<?php if ( 4 == primrose_get_theme_mod( 'shop_related_products_grid_columns' ) ) : ?>
		.woocommerce .related ul.products li.product {
			width: 50%;
		}
	<?php endif; ?>
}