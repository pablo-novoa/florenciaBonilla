<?php
$handle = 'recent_products';
$attr = '';

switch( $instance['query'] ) {
	default:
		$handle = 'recent_products';
		break;

	case 'featured':
		$handle = 'featured_products';
		break;

	case 'sale':
		$handle = 'sale_products';
		break;

	case 'best-selling':
		$handle = 'best_selling_products';
		break;

	case 'top-rated':
		$handle = 'top_rated_products';
		break;

	case 'product-category':
		$handle = 'product_category';
		$attr .= ' category="' . $instance['category_slug'] . '"';
		break;

	case 'products':
	case 'selected-products':
		$handle = 'products';
		$attr .= ' ids="' . implode( ', ', $instance['product_ids'] ) . '"';
		break;

	case 'attribute':
		$handle = 'product_attribute';
		$attr .= ' attribute="' . $instance['attribute'] . '"';
		$attr .= ' filter="' . $instance['filter'] . '"';
		break;

	case 'related':
		$handle = 'related_products';
		break;

	case 'categories':
		if ( 'menu_order' == $instance['orderby'] ) {
			$instance['orderby'] = 'include';
		}
		$handle = 'product_categories';
		$attr .= ' parent="' . $instance['parent_category_id'] . '"';
		break;

	case 'selected-categories':
		if ( 'menu_order' == $instance['orderby'] ) {
			$instance['orderby'] = 'include';
		}
		$handle = 'product_categories';
		$attr .= ' ids="' . implode( ', ', $instance['category_ids'] ) . '"';
		break;
}

if ( ! empty( $instance['per_page'] ) ) {
	$attr .= ' per_page="' . $instance['per_page'] . '"';
}

if ( ! empty( $instance['columns'] ) ) {
	$attr .= ' columns="' . $instance['columns'] . '"';
}

if ( ! empty( $instance['orderby'] ) ) {
	$attr .= ' orderby="' . $instance['orderby'] . '"';
}

if ( ! empty( $instance['order'] ) ) {
	$attr .= ' order="' . $instance['order'] . '"';
}

$shortcode = '[' . $handle . $attr . ']';

?>
<div class="primrose-sow-woocommerce-posts-grid">
	<?php echo '<!-- ' . $shortcode . ' -->'; ?>
	<?php echo do_shortcode( $shortcode ); ?>
</div>