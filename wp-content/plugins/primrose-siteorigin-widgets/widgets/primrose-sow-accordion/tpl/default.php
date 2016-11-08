<?php if ( count( $instance['items'] ) > 0 ) : ?>
	<div class="primrose-sow-accordion" data-multiple_active="<?php echo esc_attr( $instance['multiple_active'] ); ?>">
		<?php foreach ( $instance['items'] as $item ) : ?>
			<div class="primrose-sow-accordion-item <?php echo $item['active'] ? 'active' : ''; ?>">
				<div class="primrose-sow-accordion-item-title"><?php echo ( $item['title'] ); ?></div>
				<div class="primrose-sow-accordion-item-description"><?php echo ( $item['description'] ); ?></div>
			</div><!-- .primrose-sow-accordion-item -->
		<?php endforeach; ?>
	</div><!-- .primrose-sow-accordion -->
<?php endif; ?>