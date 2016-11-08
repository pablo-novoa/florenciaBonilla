<?php if ( count( $instance['buttons'] ) ) : ?>
	<div class="primrose-sow-buttons primrose-sow-alignment-<?php echo esc_attr( $instance['alignment'] ); ?>">
		<?php foreach ( $instance['buttons'] as $key => $button ) : ?>
			<a href="<?php echo sow_esc_url( $button['url'] ); ?>"
				class="primrose-sow-button primrose-sow-button-<?php echo esc_attr( $key ); ?> button anchor-link"
				<?php echo ( $button['new_window'] ) ? ' target="_blank"' : ''; ?>>
				<?php echo ( $button['text'] ); ?>
			</a>
		<?php endforeach; ?>
	</div><!-- .primrose-sow-buttons -->
<?php endif; ?>