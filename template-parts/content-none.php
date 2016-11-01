<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ThemeTim_WordPress_Framework
 */

?>

<div class="no-results not-found">
	<header>
		<h3 class="page-title page-header"><?php esc_html_e( 'Nothing Found', 'themetim' ); ?></h3>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'themetim' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'themetim' ); ?></p>

			<form role="search" method="get" class="search-form form-inline margin-top-20" action="<?php echo home_url( '/' ); ?>">
				<input type="search" class="search-field form-control"
					   placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
					   value="<?php echo get_search_query() ?>" name="s"
					   title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />

				<input type="submit" class="search-submit btn btn-default"
					   value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
			</form>
			<?php
		//get_search_form();

		else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'themetim' ); ?></p>
			<form role="search" method="get" class="search-form form-inline margin-top-20" action="<?php echo home_url( '/' ); ?>">
				<input type="search" class="search-field form-control"
					   placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
					   value="<?php echo get_search_query() ?>" name="s"
					   title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />

				<input type="submit" class="search-submit btn btn-default"
					   value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
			</form>
			<?php
			//get_search_form();

		endif; ?>
	</div><!-- .page-content -->
</div><!-- .no-results -->
