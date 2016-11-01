<?php
/**
 * ThemeTim Testimonial Slider
 */
class TestimonialSlider_Widget extends WP_Widget {
    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'TestimonialSlider_Widget',
            __( 'ThemeTim Testimonial Slider', 'text_domain' ),
            array( 'description' => __( 'Testimonial Slider', 'text_domain' ), )
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
            $title = '<h2 class="page-header margin-bottom-30">'. apply_filters( 'widget_title', $instance['title'] ).'</h2>';
        }
        ?>
        <?php
        /**
         * ThemeTim Testimonial Slider
         */
        $testimonial_slider_var = array( 'post_type' => 'testimonial','posts_per_page'	  => 3);
        $slider_query = new WP_Query( $testimonial_slider_var );
        ?>
       <div class="testimonial">
           <div id="testimonial-slider" class="carousel slide" data-ride="carousel">
               <?php echo $title; ?>
               <!-- Wrapper for slides -->
               <div class="carousel-inner testimonial-slider text-center" role="listbox">
                   <?php if ( $slider_query->have_posts() ) : ?>
                       <?php while ( $slider_query->have_posts() ) : $slider_query->the_post(); ?>
                           <div class="item">
                               <?php if ( has_post_thumbnail() ) { ?>
                                   <div class="testimonial-thumb">
                                       <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="" class="img-responsive center-block">
                                   </div>
                               <?php } ?>
                               <div class="testimonial-text margin-bottom-30">
                                   <h3 class="margin-top-40 margin-bottom-20 text-capitalize"><?php the_title(); ?></h3>
                                   <div class="testimonial-content center-block">
                                       <?php the_content(); ?>
                                   </div>
                               </div>
                           </div>
                       <?php endwhile; ?>
                       <?php wp_reset_postdata(); ?>
                   <?php else:  ?>
                   <?php endif; ?>
               </div>
           </div>
       </div>
        <script>
            jQuery( window ).load(function() {
                /*******************************************************************************
                 * Carousel Slider
                 *******************************************************************************/
                if(jQuery('.testimonial-slider').length){
                    jQuery('.testimonial-slider .item:first').addClass('active');
                    <!-- auto-generate carousel indicator html -->
                    var myCarousel = jQuery(".carousel");
                    myCarousel.append("<ol class='carousel-indicators'></ol>");
                    var indicators = jQuery(".carousel-indicators");
                    myCarousel.find(".carousel-inner").children(".item").each(function(index) {
                        (index === 0) ?
                            indicators.append("<li data-target='#testimonial-slider' data-slide-to='"+index+"' class='active'></li>") :
                            indicators.append("<li data-target='#testimonial-slider' data-slide-to='"+index+"'></li>");
                    });
                }
            });
        </script>
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
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Testimonial Slider', 'text_domain' );
        ?>
        <div class="widget-area">
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
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

        return $instance;
    }

} // class TestimonialSlider_Widget

// register TestimonialSlider_Widget widget
function regsiter_testimonialslider_Widget() {
    register_widget( 'TestimonialSlider_Widget' );
}
add_action( 'widgets_init', 'regsiter_testimonialslider_Widget' );