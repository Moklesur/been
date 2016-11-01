<?php
/**
 * ThemeTim Camera Slider
 */
$slider_var = array( 'post_type' => 'slider','posts_per_page'	  => 5);
$slider_query = new WP_Query( $slider_var );
?>

<?php if ( $slider_query->have_posts() ) : ?>
    <div class="main-slider position-relative">
        <?php while ( $slider_query->have_posts() ) : $slider_query->the_post();

            $heading = get_post_meta( get_the_ID(), 'slider-heading', true );
            $text = get_post_meta( get_the_ID(), 'slider-text', true );
            $link_title = get_post_meta( get_the_ID(), 'slider-link-title', true );
            $link = get_post_meta( get_the_ID(), 'slider-link', true );
            ?>
            <div data-thumb="<?php if ( has_post_thumbnail() ) {  the_post_thumbnail_url('thumbnail'); } ?>" data-src="<?php if ( has_post_thumbnail() ) {  the_post_thumbnail_url(); } ?>">
                <div class="slider-inner text-center">
                    <div class="slider-wrap">
                        <h1 class="text-uppercase animated fadeInDown"><?php the_title(); ?></h1>
                        <?php if($heading != '') : ?>
                        <h2 class="text-uppercase animated fadeIn"><?php echo $heading;?></h2>
                        <?php endif; ?>
                        <?php if($text != ''): ?>
                            <p class=" animated fadeInUp"><?php echo $text; ?></p>
                        <?php endif; ?>
                        <?php if($link != '' ||  $link_title != ''): ?>
                            <a href="<?php echo $link;?>" class="btn btn-default btn-lg text-uppercase  animated fadeInDown"><?php echo $link_title;?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </div>
<?php else:
endif;
