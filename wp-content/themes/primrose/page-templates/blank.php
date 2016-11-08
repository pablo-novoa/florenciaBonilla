<?php
/**
 * Template Name: Blank
 *
 * The template for displaying pages without the default top padding and page-title.
 * Suits for using the page builder.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Primrose
 */

get_header(); ?>

	<div id="primary" class="content-area blank">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'blank' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
