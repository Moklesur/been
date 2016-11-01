<?php
/**
 * ThemeTim Brand
 */
class Brand_Widget extends WP_Widget {
    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'Brand_Widget',
            __( 'ThemeTim Brand', 'text_domain' ),
            array( 'description' => __( 'Brand', 'text_domain' ), )
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
        $title = '';
        if ( ! empty( $instance['title'] ) ) {
            $title = '<h2 class="page-header">'. apply_filters( 'widget_title', $instance['title'] ).'</h2>';
        }
        $product_limit = apply_filters( 'widget_title', $instance['product_limit'] );
        ?>
        <?php
        /**
         * ThemeTim Testimonial Slider
         */
        $brand_slider_var = array( 'post_type' => 'brand','posts_per_page'	  => $product_limit);
        $slider_query = new WP_Query( $brand_slider_var );
        ?>
        <div class="brand row position-relative">
           <div class="col-md-12">
               <?php echo $title; ?>
           </div>
            <div class="brand-carousel overflow">
                <?php if ( $slider_query->have_posts() ) : ?>
                    <?php while ( $slider_query->have_posts() ) : $slider_query->the_post(); ?>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <?php if ( has_post_thumbnail() ) { ?>
                                <div class="brand-thumb">
                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="" class="img-responsive center-block">
                                </div>
                            <?php } ?>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else:  ?>
                <?php endif; ?>
            </div>
            <?php if ($product_limit > 5) { ?>
            <div class="olw-next-prev full-width">
                <span class="prev text-center display-inline-b pull-left"><i class="fa fa-angle-left fa-2x"></i></span>
                <span class="next text-center display-inline-b pull-right"><i class="fa fa-angle-right fa-2x"></i></span>
            </div>
            <?php } ?>
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
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Brand', 'text_domain' );
        $product_limit = ! empty( $instance['product_limit'] ) ? $instance['product_limit'] : __( '8', 'text_domain' );
        ?>
        <div class="widget-area">
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'product_limit' ); ?>"><?php _e( 'Limit:' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'product_limit' ); ?>" name="<?php echo $this->get_field_name( 'product_limit' ); ?>" type="number" value="<?php echo esc_attr( $product_limit ); ?>">
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
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['product_limit'] = ( ! empty( $new_instance['product_limit'] ) ) ? strip_tags( $new_instance['product_limit'] ) : '';

        return $instance;
    }

} // class Brand_Widget

// register Brand_Widget widget
function regsiter_Brand_Widget() {
    register_widget( 'Brand_Widget' );
}
add_action( 'widgets_init', 'regsiter_Brand_Widget' );