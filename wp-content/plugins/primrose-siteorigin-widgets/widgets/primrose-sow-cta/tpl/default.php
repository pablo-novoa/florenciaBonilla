<div class="primrose-sow-cta primrose-sow-cta-<?php echo esc_attr( $instance['layout'] ); ?>">
	<?php if ( ! empty( $instance['text'] ) ) : ?>
		<div class="primrose-sow-cta-text"><?php echo ( $instance['text'] ); ?></div>
	<?php endif; ?>

	<?php $this->sub_widget( 'Primrose_SOW_Buttons', $args, $instance['buttons'] ); ?>
</div><!-- .primrose-sow-cta -->