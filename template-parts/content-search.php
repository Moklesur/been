<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ThemeTim_WordPress_Framework
 */
$margin[] = 'padding-gap-6 overflow';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($margin); ?>>
	<header class="entry-header  margin-bottom-20">
		<?php the_title( sprintf( '<h3 class="entry-title page-header"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta margin-top-10">
			<?php themetim_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php
		if(has_post_thumbnail()){
			?>
			<a href="<?php the_permalink(); ?>"><img src="<?php echo $post_thumbnail_id = get_the_post_thumbnail_url(); ?>" class="img-responsive margin-top-20 margin-bottom-20" alt="" /></a>
			<?php
		}
		the_excerpt();
		?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php if(!is_single()) : ?>
			<div class="pull-left">
				<a href="<?php the_permalink(); ?>" class="btn btn-default margin-top-10">Continue Reading</a>
			</div>
		<?php endif; ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
