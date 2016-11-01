<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
<main class="themetim-archive-product padding-gap-1">
	<section>
		<div class='container'>
			<div class='row'>
				<?php
				/**
				 * woocommerce_before_main_content hook.
				 *
				 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
				 * @hooked woocommerce_breadcrumb - 20
				 */
				do_action( 'woocommerce_before_main_content' );
				?>
				<div class='col-md-12 col-sm-12 col-xs-12 cat-description'>
					<div class='text-center'>
						<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

							<h2 class="page-header"><?php woocommerce_page_title(); ?></h2>

						<?php endif; ?>
					</div>
					<?php
					/**
					 * woocommerce_archive_description hook.
					 *
					 * @hooked woocommerce_taxonomy_archive_description - 10
					 * @hooked woocommerce_product_archive_description - 10
					 */
					do_action( 'woocommerce_archive_description' );
					?>
				</div>
				<?php if (get_theme_mod('shop_sidebar_enable','1') ) : ?>
				<div class='col-md-9 col-sm-12 col-xs-12'>
					<?php else: ?>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<?php endif; ?>
						<?php if ( have_posts() ) : ?>

							<?php
							/**
							 * woocommerce_before_shop_loop hook.
							 *
							 * @hooked woocommerce_result_count - 20
							 * @hooked woocommerce_catalog_ordering - 30
							 */
							do_action( 'woocommerce_before_shop_loop' );
							?>

							<?php woocommerce_product_loop_start(); ?>

							<?php woocommerce_product_subcategories(); ?>

							<?php while ( have_posts() ) : the_post(); ?>

								<?php wc_get_template_part( 'content', 'product' ); ?>

							<?php endwhile; // end of the loop. ?>

							<?php woocommerce_product_loop_end(); ?>

							<?php
							/**
							 * woocommerce_after_shop_loop hook.
							 *
							 * @hooked woocommerce_pagination - 10
							 */
							do_action( 'woocommerce_after_shop_loop' );
							?>

						<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

							<?php wc_get_template( 'loop/no-products-found.php' ); ?>

						<?php endif; ?>

						<?php
						/**
						 * woocommerce_after_main_content hook.
						 *
						 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
						 */
						do_action( 'woocommerce_after_main_content' );
						?>
					</div>
					<?php
					/**
					 * woocommerce_sidebar hook.
					 *
					 * @hooked woocommerce_get_sidebar - 10
					 */
					if (get_theme_mod('shop_sidebar_enable') ) :
						?><aside id="secondary" class="widget-area col-md-3 col-sm-12 col-xs-12 padding-gap-1" role="complementary"><?php
						dynamic_sidebar( 'shop-product' );
						?></aside><?php
					endif;
					?>
				</div>
			</div>
	</section>
</main>
<?php get_footer( 'shop' ); ?>
