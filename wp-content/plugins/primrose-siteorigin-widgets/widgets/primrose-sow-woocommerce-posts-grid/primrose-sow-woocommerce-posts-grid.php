<?php
/*
Widget Name: Primrose: WooCommerce Posts Grid
Description: WooCommerce posts grid.
Author: SingleStroke
Author URI: https://singlestroke.io/
*/

class Primrose_SOW_WooCommerce_Posts_Grid extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'primrose-sow-woocommerce-posts-grid',
			esc_html__( 'Primrose: WooCommerce Posts Grid', 'primrose' ),
			array(
				'description' => esc_html__( 'WooCommerce posts grid.', 'primrose' ),
				'panels_groups' => array( 'primrose' ),
			),
			array(
				
			),
			array(
				'query' => array(
					'type' => 'select',
					'label' => esc_html__( 'Query type', 'primrose' ),
					'options' => array(
						'recent' => esc_html__( 'Recent products', 'primrose' ),
						'featured' => esc_html__( 'Featured products', 'primrose' ),
						'sale' => esc_html__( 'On sale products', 'primrose' ),
						'best-selling' => esc_html__( 'Best selling products', 'primrose' ),
						'top-rated' => esc_html__( 'Top rated products', 'primrose' ),
						'product-category' => esc_html__( 'Products in a category', 'primrose' ),
						'selected-products' => esc_html__( 'Selected products', 'primrose' ),
						'attribute' => esc_html__( 'Products with a specific attribute value', 'primrose' ),
						'related' => esc_html__( 'Related products', 'primrose' ),
						'categories' => esc_html__( 'Top level categories / subcategories', 'primrose' ),
						'selected-categories' => esc_html__( 'Selected categories', 'primrose' ),
					),
					'default' => 'recent',
					'state_emitter' => array(
						'callback' => 'select',
						'args' => array( 'query' ),
					),
				),

				// Products in a category.
				'category_slug' => array(
					'type' => 'select',
					'label' => esc_html__( 'Category', 'primrose' ),
					'state_handler' => array(
						'query[product-category]' => array( 'show' ),
						'_else[query]' => array( 'hide' ),
					),
				),

				// Selected products.
				'product_ids' => array(
					'type' => 'select',
					'label' => esc_html__( 'Select products', 'primrose' ),
					'description' => esc_html__( 'Show only the selected products.', 'primrose' ),
					'multiple' => true,
					'state_handler' => array(
						'query[products]' => array( 'show' ),
						'_else[query]' => array( 'hide' ),
					),
				),

				// Products with a specific attribute value.
				'attribute' => array(
					'type' => 'text',
					'label' => esc_html__( 'Attribute name (slug)', 'primrose' ),
					'state_handler' => array(
						'query[attribute]' => array( 'show' ),
						'_else[query]' => array( 'hide' ),
					),
				),
				'filter' => array(
					'type' => 'text',
					'label' => esc_html__( 'Attribute value (slug)', 'primrose' ),
					'state_handler' => array(
						'query[attribute]' => array( 'show' ),
						'_else[query]' => array( 'hide' ),
					),
				),
				
				// Categories / subcategories.
				'parent_category_id' => array(
					'type' => 'select',
					'label' => esc_html__( 'Show (sub)categories under ...', 'primrose' ),
					'state_handler' => array(
						'query[categories]' => array( 'show' ),
						'_else[query]' => array( 'hide' ),
					),
				),

				// Selected categories.
				'category_ids' => array(
					'type' => 'select',
					'label' => esc_html__( 'Display only these selected categories', 'primrose' ),
					'multiple' => true,
					'state_handler' => array(
						'query[selected-categories]' => array( 'show' ),
						'_else[query]' => array( 'hide' ),
					),
				),

				'orderby' => array(
					'type' => 'select',
					'label' => esc_html__( 'Order by type', 'primrose' ),
					'options' => array(
						'menu_order' => esc_html__( 'Menu order', 'primrose' ),
						'title' => esc_html__( 'Title', 'primrose' ),
						'date' => esc_html__( 'Date', 'primrose' ),
						'id' => esc_html__( 'ID', 'primrose' ),
						'rand' => esc_html__( 'Random', 'primrose' ),
					),
					'default' => 'date',
					'state_handler' => array(
						'query[best-selling]' => array( 'hide' ),
						'_else[query]' => array( 'show' ),
					),
				),
				'order' => array(
					'type' => 'select',
					'label' => esc_html__( 'Order', 'primrose' ),
					'options' => array(
						'asc' => esc_html__( 'Ascending', 'primrose' ),
						'desc' => esc_html__( 'Descending', 'primrose' ),
					),
					'default' => 'desc',
					'state_handler' => array(
						'query[best-selling]' => array( 'hide' ),
						'_else[query]' => array( 'show' ),
					),
				),
				'per_page' => array(
					'type' => 'number',
					'label' => esc_html__( 'Posts per page', 'primrose' ),
					'default' => 6,
				),
				'columns' => array(
					'type' => 'slider',
					'label' => esc_html__( 'Grid columns', 'primrose' ),
					'min' => 1,
					'max' => 6,
					'default' => 3,
				),
			),
			plugin_dir_path( __FILE__ )
		);
	}

	function initialize() {
		$this->register_frontend_styles( array(
			array( 'primrose-siteorigin-widgets', PRIMROSE_SOW_CSS . '/main.css', array(), PRIMROSE_SOW_VERSION ),
		) );
	}

	function modify_form( $form ) {
		$cats = get_terms( array(
			'taxonomy' => 'product_cat',
			'hide_empty' => false,
		) );

		$products = get_posts( array(
			'post_type' => 'product',
			'orderby' => 'title',
			'order' => 'asc',
			'posts_per_page' => -1,
		) );

		$cat_slugs = array(
			'0' => esc_html__( '--- None selected ---', 'primrose' ),
		);
		$cat_ids = array(
			'0' => esc_html__( '--- None selected ---', 'primrose' ),
		);
		$parent_cat_ids = array(
			'0' => esc_html__( '--- Show all top level categories', 'primrose' ),
		);
		$product_ids = array();

		foreach ( $cats as $cat ) {
			$cat_slugs[ $cat->slug ] = $cat->name;
			$cat_ids[ $cat->term_id ] = $cat->name;
			$parent_cat_ids[ $cat->term_id ] = $cat->name;
		}

		foreach ( $products as $product ) {
			$product_ids[ $product->ID ] = $product->post_title;
		}

		$form['category_slug']['options'] = $cat_slugs;

		$form['category_ids']['options'] = $cat_ids;
		$form['parent_category_id']['options'] = $parent_cat_ids;

		$form['product_ids']['options'] = $product_ids;

		return $form;
	}

	function modify_instance( $instance ) {
		/**
		 * Separate query type: categories and selected-categories
		 * @since 1.2.0
		 */
		if ( 'products' == $instance['query'] ) {
			$instance['query'] = 'selected-products';
		}
		if ( 'categories' == $instance['query'] ) {
			if ( ! empty( $instance['category_ids'] ) ) {
				// change to selected-categories
				$instance['query'] = 'selected-categories';
			}
		}

		return $instance;
	}
}

if ( class_exists( 'WooCommerce' ) ) {
	siteorigin_widget_register( 'primrose-sow-woocommerce-posts-grid', __FILE__, 'Primrose_SOW_WooCommerce_Posts_Grid' );
}