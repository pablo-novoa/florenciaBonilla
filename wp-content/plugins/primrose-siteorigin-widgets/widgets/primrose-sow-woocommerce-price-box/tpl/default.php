<div class="primrose-sow-woocommerce-price-box">
	<?php if ( ! empty( $instance['name'] ) ) : ?>
		<div class="primrose-sow-woocommerce-price-box-name"><?php echo ( $instance['name'] ); ?></div>
	<?php endif; ?>
	
	<?php if ( ! empty( $instance['price'] ) ) : ?>
		<div class="primrose-sow-woocommerce-price-box-price"><?php echo ( $instance['price'] ); ?></div>
	<?php endif; ?>
	
	<?php if ( ! empty( $instance['period'] ) ) : ?>
		<div class="primrose-sow-woocommerce-price-box-period"><?php echo ( $instance['period'] ); ?></div>
	<?php endif; ?>

	<?php if ( ! empty( $instance['features'] ) ) : ?>
		<ul class="primrose-sow-woocommerce-price-box-features">
			<?php foreach ( $instance['features'] as $feature ) : ?>
				<li><?php echo ( $feature['name'] ); ?></li>
			<?php endforeach; ?>
		</ul><!-- .primrose-sow-woocommerce-price-box-features -->
	<?php endif; ?>

	<?php $this->sub_widget( 'Primrose_SOW_WooCommerce_Add_to_Cart_Button', $args, $instance['button'] ); ?>
</div><!-- .primrose-sow-woocommerce-price-box -->