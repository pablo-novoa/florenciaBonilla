<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Primrose
 */

get_header(); ?>

	<div id="primary" class="content-area <?php echo esc_attr( primrose_get_theme_mod( 'blog_home_page_template' ) ); ?>">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			/*
			 * Include the Post-Format-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
			get_template_part( 'template-parts/content', get_post_format() );

			if ( primrose_get_theme_mod( 'blog_single_navigation' ) ) {
				the_post_navigation();
			}

			if ( primrose_get_theme_mod( 'blog_single_author_bio' ) && get_the_author_meta( 'description' ) ) : ?>
				<div class="entry-author">
					<div class="entry-author-inner">
						<div class="entry-author-name vcard">
							<?php echo get_avatar( get_the_author_meta( 'ID' ), 70 , '', get_the_author_meta( 'display_name' ) ); ?>
							<b class="fn"><?php the_author_posts_link(); ?></b>
						</div>
						<div class="entry-author-content">
							<?php echo wpautop( get_the_author_meta( 'description' ) ); ?>
						</div>
						<div class="entry-author-links social-media-links">
							<?php global $primrose_data;

							foreach ( $primrose_data['user_links'] as $key => $value ) :
								$link = get_the_author_meta( $key );

								if ( empty( $link ) ) continue; ?>
								<a href="<?php echo esc_url( $link ); ?>">
									<i class="fa fa-<?php echo esc_attr( $key ); ?>"></i><span class="screen-reader-text"><?php echo ( $value ); // WPCS: XSS OK. ?></span>
								</a>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			<?php endif;

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if ( 'default' == primrose_get_theme_mod( 'blog_home_page_template' ) ) get_sidebar();
get_footer();
