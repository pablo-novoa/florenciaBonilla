<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Primrose
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-search' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="entry-thumbnail">
			<?php the_post_thumbnail( 'medium' ); ?>
		</div>
	<?php endif; ?>

	<div class="entry-search-content">
		<header class="entry-header">
			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta typography-meta">
				<?php primrose_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>

			<?php the_title( sprintf( '<h2 class="entry-title typography-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-summary entry-content">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	</div>
</article><!-- #post-## -->
