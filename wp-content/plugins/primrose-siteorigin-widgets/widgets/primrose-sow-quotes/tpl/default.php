<?php if ( count( $instance['quotes'] ) > 0 ) : ?>
	<div class="primrose-sow-quotes align-<?php echo esc_attr( $instance['alignment'] ); ?> slick">
		<?php foreach ( $instance['quotes'] as $quote ) : ?>
			<div class="primrose-sow-quote">
				<div class="primrose-sow-quote-text"><?php echo ( $quote['text'] ); ?></div>
				<?php if ( ! empty( $quote['name'] ) ) : ?>
					<div class="primrose-sow-quote-name"><?php echo ( $quote['name'] ); ?></div>
				<?php endif; ?>
			</div><!-- .primrose-sow-quotes-item -->
		<?php endforeach; ?>
	</div><!-- .primrose-sow-quotes -->
<?php endif; ?>