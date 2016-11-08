<?php if ( count( $instance['slides'] ) > 0 ) : if ( $instance['parallax'] ) wp_enqueue_script( 'stellar' ); ?>
	<div class="primrose-sow-hero-slider slick" data-autoplay="<?php echo esc_attr( $instance['autoplay'] ); ?>">
		<?php foreach ( $instance['slides'] as $key => $slide ) : ?>
			<div class="primrose-sow-hero-slide primrose-sow-hero-slide-<?php echo esc_attr( $key ); ?>" style="background-color: <?php echo esc_attr( $slide['bg_color'] ); ?>;">
				<div class="primrose-sow-hero-slide-background primrose-sow-background-cover <?php echo $instance['parallax'] ? 'primrose-sow-parallax-background' : ''; ?>">
					
					<?php if ( 'image' == $slide['background'] && ! empty( $slide['image'] ) ) :

						$url = wp_get_attachment_url( $slide['image'] );
						
						if ( ! empty( $url ) ) :
							$meta = wp_get_attachment_metadata( $slide['image'] );
						?>
							<img class="primrose-sow-hero-slide-background-image" alt=""
								src="<?php echo esc_attr( $url ); ?>"
								height="<?php echo esc_attr( $meta['height'] ); ?>"
								width="<?php echo esc_attr( $meta['width'] ); ?>"
								<?php echo $instance['parallax'] ? 'data-stellar-ratio="0.5"' : ''; ?>>
						<?php endif; ?>

					<?php elseif ( 'video' == $slide['background'] && ! empty( $slide['video'] ) ) :

						$url = wp_get_attachment_url( $slide['video'] );

						if ( ! empty( $url ) ) :
							$ext = pathinfo( $url, PATHINFO_EXTENSION );
							$meta = wp_get_attachment_metadata( $slide['video'] );
							$url_no_ext = str_replace( basename( $url ), basename( $url, '.' . $ext ), $url );
						?>

							<?php if ( ! empty( $slide['video_poster'] ) ) : ?>
								<?php $poster_meta = wp_get_attachment_metadata( $slide['video_poster'] ); ?>
								<img class="primrose-sow-hero-slide-background-image primrose-sow-hero-slide-background-video-poster" alt=""
									src="<?php echo esc_url( wp_get_attachment_url( $slide['video_poster'] ) ); ?>"
									height="<?php echo esc_attr( $poster_meta['height'] ); ?>"
									width="<?php echo esc_attr( $poster_meta['width'] ); ?>"
									<?php echo $instance['parallax'] ? 'data-stellar-ratio="0.5"' : ''; ?>>
							<?php endif; ?>

							<video class="primrose-sow-hero-slide-background-video" autoplay loop muted
								height="<?php echo esc_attr( $meta['height'] ); ?>"
								width="<?php echo esc_attr( $meta['width'] ); ?>"
								<?php echo $instance['parallax'] ? 'data-stellar-ratio="0.5"' : ''; ?>>

								<source type="video/mp4" src="<?php echo esc_attr( $url_no_ext ); ?>.mp4">
								<source type="video/ogg" src="<?php echo esc_attr( $url_no_ext ); ?>.ogv">
								<source type="video/webm" src="<?php echo esc_attr( $url_no_ext ); ?>.webm">
							</video>
							<div class="primrose-sow-hero-slide-background-video-pattern-<?php echo esc_attr( $slide['video_pattern'] ); ?>"></div>
						<?php endif; ?>

					<?php endif; ?>

				</div><!-- .primrose-sow-hero-slide-background -->

				<div class="primrose-sow-hero-slide-overlay" style="background-color: <?php echo esc_attr( $slide['overlay_color'] ); ?>;"></div>

				<div class="primrose-sow-hero-slide-content">
					<div class="primrose-sow-hero-slide-content-inner">
						<?php if ( ! empty( $slide['title'] ) ) : ?>
							<div class="primrose-sow-hero-slide-title"><?php echo ( $slide['title'] ); ?></div>
						<?php endif; ?>

						<?php $this->sub_widget( 'Primrose_SOW_Buttons', $args, $slide['buttons'] ); ?>
					</div>
				</div><!-- .primrose-sow-hero-slide-content -->
				
			</div><!-- .primrose-sow-hero-slide -->
		<?php endforeach; ?>
	</div><!-- .primrose-sow-hero-slider -->
<?php endif; ?>