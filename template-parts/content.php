<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ThemeTim_WordPress_Framework
 */

$margin[] = 'padding-gap-6 overflow';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($margin); ?>>
	<header class="entry-header margin-bottom-20">
		<?php
		if ( is_single() ) {
			the_title( '<h4 class="entry-title text-capitalize margin-null">', '</h4>' );
		} else {
			the_title( '<h4 class="entry-title margin-null text-capitalize"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
		}

		if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta  margin-top-10">
				<?php themetim_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php

		if(has_post_thumbnail()):
			if(is_single()) { ?>
				<img src="<?php echo $post_thumbnail_id = get_the_post_thumbnail_url(); ?>"
					 class="img-responsive margin-top-20 margin-bottom-20" alt=""/>
				<?php } else { ?>
				<a href="<?php the_permalink(); ?>"><img
						src="<?php echo $post_thumbnail_id = get_the_post_thumbnail_url(); ?>"
						class="img-responsive margin-top-20 margin-bottom-20" alt=""/></a>
				<?php
			}
		endif;

		if(is_single()) :
			the_content();
		else:
			$excerpt = get_theme_mod('excerpt_lenght', '55');
			//return $excerpt;
			the_excerpt();
		endif;

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'themetim' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer overflow">
		<?php if(!is_single()) : ?>
		<div class="pull-left">
			<a href="<?php the_permalink(); ?>" class="btn btn-default margin-top-10">Continue Reading</a>
		</div>
		<?php endif; ?>
		<?php if (get_theme_mod('blog_social_sharing_enable', '1')) : ?>
		<div class="pull-right margin-top-10">
			<?php themetim_social_sharing(); ?>
		</div>
		<?php endif; ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
