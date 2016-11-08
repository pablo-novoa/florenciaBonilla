<?php if ( ! empty( $instance['number'] ) ) : ?>
	<div class="primrose-sow-counter primrose-sow-alignment-<?php echo esc_attr( $instance['alignment'] ); ?>" data-duration="<?php echo esc_attr( $instance['duration'] ); ?>">
		<div class="primrose-sow-counter-number" style="color: <?php echo esc_attr( $instance['number_color'] ); ?>">
			<?php echo ( $instance['prefix'] ); ?><span class="counter-up"><?php echo ( $instance['number'] ); ?></span><?php echo ( $instance['suffix'] ); ?>
		</div><!-- .primrose-sow-counter-number -->
		<div class="primrose-sow-counter-caption"><?php echo ( $instance['caption'] ); ?></div>
	</div><!-- .primrose-sow-counter -->
<?php endif; ?>