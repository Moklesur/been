<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ThemeTim_WordPress_Framework
 */

get_header(); ?>

	<main class="default-page">
		<?php if(is_front_page()) :
			require get_template_directory() . '/template-parts/main-slider.php';
		 endif; ?>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-9 col-sm-8 col-xs-12 padding-gap-1 padding-gap-4">
						<?php
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>
					</div>
					<?php get_sidebar(); ?>
				</div>
			</div>
		</section>
	</main><!-- #main -->

<?php

get_footer();
