<?php
/**
 * ThemeTim Recent Blog News
 */
class RecentBlogNews_Widget extends WP_Widget {
    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'RecentBlogNews_Widget',
            __( 'ThemeTim Recent Blog News', 'text_domain' ),
            array( 'description' => __( 'Blog News', 'text_domain' ), )
        );
    }
    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args  Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        $latest_news_limit = apply_filters( 'widget_text', $instance['latest_news_limit'] );
        $latest_news_social_enable = apply_filters( 'widget_text', $instance['latest_news_social_enable'] );

        $product_carousel_enable = apply_filters( 'widget_text', $instance['product_carousel_enable'] );
        $date_time_enable = apply_filters( 'widget_text', $instance['date_time_enable'] );

        $carousel_class= '';
        if ( $product_carousel_enable ==  '1' ) {
            $carousel_class = 'recent-blog-news-carousel';
        }
        $title = '';
        if ( ! empty( $instance['title'] ) ) {
            $title = '<h2 class="page-header margin-null">'. apply_filters( 'widget_title', $instance['title'] ).'</h2>';
        }

        $query_latest_blog = new WP_Query( array(
            'post_status'         => 'publish',
            'posts_per_page'	  => $latest_news_limit
        ) );

        ?>
        <div class="latest-blog-post row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <?php echo $title;?>
            </div>
            <div class="latest-blog-post-widget">
                <?php
                if ($query_latest_blog->have_posts()) :
                    while ( $query_latest_blog->have_posts() ) : $query_latest_blog->the_post(); ?>
                        <div class="col-md-4 col-sm-6 col-xs-12 margin-top-30 overflow">
                            <div class="latest-blog position-relative">
                                <?php the_title( sprintf( '<h4 class="entry-title text-capitalize margin-null"><a href="%s">', esc_url( get_permalink() ) ), '</a></h4>' );
                                if ( 'post' === get_post_type() ) : ?>
                                    <?php if($date_time_enable == '1') : ?>
                                        <div class="entry-meta margin-bottom-20 margin-top-10">
                                            <?php themetim_posted_on(); ?>
                                        </div><!-- .entry-meta -->
                                    <?php endif; ?>
                                    <?php
                                endif; ?>
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="entry-thumb margin-top-20 overflow latest-blog-thumb position-relative">
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-responsive" alt="" />
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <?php
                                if ($latest_news_social_enable == '1') : ?>
                                    <div class="latest-blog-share full-width text-center">
                                        <?php themetim_social_sharing(); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                    <?php endwhile;
                    wp_reset_postdata();
                endif;
                ?>
                <script>
                    jQuery(function(){
                        /*******************************************************************************
                         * Carousel Slider
                         *******************************************************************************/
                        if(jQuery('.recent-blog-news-carousel').length){
                            jQuery('.recent-blog-news-carousel').owlCarousel({
                                loop:true,
                                margin:30,
                                responsiveClass:true,
                                items:3,
                                autoplay:true
                            });
                        }
                    });
                </script>
            </div>
        </div>
        <?php
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Latest News', 'text_domain' );
        $latest_news_limit= ! empty( $instance['latest_news_limit'] ) ? $instance['latest_news_limit'] : __( '3', 'text_domain' );
        ?>
        <div class="widget-area">
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
            </p>
            <h2>Advance Option</h2>
            <p>
                <label for="<?php echo $this->get_field_id( 'latest_news_limit' ); ?>"><?php _e( 'Latest News:' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'latest_news_limit' ); ?>" name="<?php echo $this->get_field_name( 'latest_news_limit' ); ?>" type="text" value="<?php echo esc_attr( $latest_news_limit ); ?>">
            </p>
            <p>
                <input class="widefat" id="<?php echo $this->get_field_id('product_carousel_enable'); ?>" name="<?php echo $this->get_field_name('product_carousel_enable'); ?>" type="checkbox" value="1" <?php checked( $instance['product_carousel_enable'], '1'); ?>  />
                <label for="<?php echo $this->get_field_id('product_carousel_enable'); ?>"><?php _e('Enable Slider'); ?></label>
                <br/><small>## if enable slider then please make Product Column 1.</small>
            </p>
            <p>
                <input class="widefat" id="<?php echo $this->get_field_id('latest_news_social_enable'); ?>" name="<?php echo $this->get_field_name('latest_news_social_enable'); ?>" type="checkbox" value="1" <?php checked( $instance['latest_news_social_enable'], '1'); ?>  />
                <label for="<?php echo $this->get_field_id('latest_news_social_enable'); ?>"><?php _e('Enable Social'); ?></label>
            </p>

            <p>
                <input class="widefat" id="<?php echo $this->get_field_id('date_time_enable'); ?>" name="<?php echo $this->get_field_name('date_time_enable'); ?>" type="checkbox" value="1" <?php checked( $instance['date_time_enable'], '1'); ?>  />
                <label for="<?php echo $this->get_field_id('date_time_enable'); ?>"><?php _e('Enable Date Time'); ?></label>
            </p>
        </div>

        <?php
    }
    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();

        $instance['product_carousel_enable'] = ( ! empty( $new_instance['product_carousel_enable'] ) ) ? strip_tags( $new_instance['product_carousel_enable'] ) : '';

        $instance['latest_news_social_enable'] = ( ! empty( $new_instance['latest_news_social_enable'] ) ) ? strip_tags( $new_instance['latest_news_social_enable'] ) : '';
        $instance['date_time_enable'] = ( ! empty( $new_instance['date_time_enable'] ) ) ? strip_tags( $new_instance['date_time_enable'] ) : '';

        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['latest_news_limit'] = ( ! empty( $new_instance['latest_news_limit'] ) ) ? strip_tags( $new_instance['latest_news_limit'] ) : '';
        return $instance;
    }

} // class RecentBlogNews_Widget

// register RecentBlogNews_Widget widget
function regsiter_RecentBlogNews_widget() {
    register_widget( 'RecentBlogNews_Widget' );
}
add_action( 'widgets_init', 'regsiter_RecentBlogNews_widget' );