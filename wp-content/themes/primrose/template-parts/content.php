<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Primrose
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta typography-meta">
				<?php primrose_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php if ( is_singular() ) {
			the_title( '<h1 class="entry-title typography-title">', '</h1>' );
		} else {
			the_title( sprintf( '<h2 class="entry-title typography-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		} ?>
	</header><!-- .entry-header -->

	<?php primrose_entry_featured_media( get_post_format() ); ?>

	<div class="entry-content">
		<?php
			the_content( primrose_get_theme_mod( 'blog_index_read_more_text' ) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'primrose' ),
				'after'  => '</div>',
			) );

			if ( is_singular() ) {
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', esc_html__( ' ', 'primrose' ) );
				if ( $tags_list ) {
					echo ( '<div class="tags-links tagcloud">' . $tags_list . '</div>' ); // WPCS: XSS OK.
				}
			}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php primrose_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
