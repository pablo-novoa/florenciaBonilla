<?php if ( count( $instance['items'] ) > 0 ) : ?>
	<div class="primrose-sow-progress-bars <?php echo esc_attr( $instance['display_percentage'] ? 'primrose-sow-progress-bars-display-percentage' : '' ); ?>">
		<?php foreach ( $instance['items'] as $item ) : ?>
			<div class="primrose-sow-progress-bar" data-progress-value="<?php echo esc_attr( $item['percentage'] ); ?>">

				<?php if ( ! empty( $item['title'] ) ) : ?>
					<div class="primrose-sow-progress-bar-title"><?php echo ( $item['title'] ); ?></div>
				<?php endif; ?>

				<div class="primrose-sow-progress-bar-track" style="background-color: <?php echo esc_attr( $item['track_color'] ); ?>;">
					<div class="primrose-sow-progress-bar-block" style="width: 0%; background-color: <?php echo esc_attr( $item['bar_color'] ); ?>;">
						<div class="primrose-sow-progress-bar-percentage"><?php echo $item['percentage']; ?></div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>