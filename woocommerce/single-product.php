<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
<main class="padding-gap-1">
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
				<?php if (get_theme_mod('shop_sidebar_enable') ) : ?>
				<div class='col-md-9 col-sm-12 col-xs-12'>
					<?php else: ?>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<?php endif; ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php wc_get_template_part( 'content', 'single-product' ); ?>

						<?php endwhile; // end of the loop. ?>

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
