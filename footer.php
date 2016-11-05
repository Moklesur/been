<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ThemeTim_WordPress_Framework
 */

?>
<footer class="footer-main">
	<!--------------- Footer Top ---------------->
	<section class="footer-top padding-gap-2">
		<div class="container">
			<div class="row margin-top-40">
				<?php
				if(get_theme_mod('middle_footer_text_enable','1')) :
					do_action('themetim_middle_footer_description');
				endif;
				if(get_theme_mod('middle_footer_nav_1_enable','1')) :
					do_action('themetim_middle_footer_nav_1');
				endif;
				if(get_theme_mod('middle_footer_nav_2_enable','1')) :
					do_action('themetim_middle_footer_nav_2');
				endif;
				?>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<?php do_action('themetim_footer_newsletter'); ?>
				</div>
			</div>
		</div>
	</section>
	<!--------------- Footer bottom ---------------->
	<section class="footer-bottom text-center padding-bottom-20 margin-top-30">
		<div class="container">
			<div class="row">
				<?php
				if(get_theme_mod('bottom_footer_copyright_enable','1')) :
					do_action('themetim_bottom_footer_copyright');
				endif;
				?>
			</div>
		</div>
	</section>
</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
