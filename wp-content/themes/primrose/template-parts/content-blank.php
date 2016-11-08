<?php
/**
 * Template part for displaying page content in "blank" page template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Primrose
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header screen-reader-text">
		<?php the_title( '<h1 class="entry-title typography-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php primrose_entry_featured_media(); ?>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'primrose' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
