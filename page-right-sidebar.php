<?php 
/**
 * Template Name: Right Sidebar
 *
 * @package ThemeTim
 * @subpackage ThemeTim
 * @since ThemeTim 1.0
 */
get_header(); ?>
    <main class="ride-sidebar-page">
        <?php if(is_front_page()) :
            require get_template_directory() . '/template-parts/main-slider.php';
        endif; ?>
        <section>
            <div class="container">
                <div class="row">
                    <?php get_sidebar(); ?>
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
                </div>
            </div>
        </section>
    </main><!-- #main -->

<?php

get_footer();