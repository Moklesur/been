<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ThemeTim_WordPress_Framework
 */

get_header(); ?>

	<main class="home-page woocommerce">
		<section>
			<div class="container">
				<div class="row">
					<?php if (get_theme_mod('blog_sidebar_enable','1') ) : ?>
					<div class="col-md-9 col-sm-8 col-xs-12 padding-gap-1 padding-gap-4">
						<?php else: ?>
						<div class="col-md-12 col-sm-12 col-xs-12 padding-gap-1 padding-gap-4">
							<?php endif; ?>
							<?php
							if ( have_posts() ) :
								if ( is_home() && ! is_front_page() ) : ?>
									<header>
										<h1 class="page-header screen-reader-text"><?php single_post_title(); ?></h1>
									</header>
									<?php
								endif;

								/* Start the Loop */
								while ( have_posts() ) : the_post();

									/*
                                     * Include the Post-Format-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                     */
									get_template_part( 'template-parts/content', get_post_format() );

								endwhile;
								if ( class_exists( 'WooCommerce' ) ) :
									woocommerce_pagination();
								else:
									the_posts_navigation();
								endif;
							else :

								get_template_part( 'template-parts/content', 'none' );
							endif;

							?>
						</div>
						<?php
						if (get_theme_mod('blog_sidebar_enable','1') ) :
							get_sidebar();
						endif;
						?>
					</div>
				</div>
		</section>
	</main><!-- #main -->

<?php
get_footer();