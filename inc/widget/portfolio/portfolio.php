<?php
/**
 * ThemeTim Portfolio
 */
class Portfolio_Widget extends WP_Widget {
    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'Portfolio_Widget',
            __( 'ThemeTim Portfolio', 'text_domain' ),
            array( 'description' => __( 'Portfolio', 'text_domain' ), )
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
        ?>
        <?php
        /**
         * ThemeTim Portfolio
         */
        $portfolio_slider_var = array( 'post_type' => 'portfolio','posts_per_page'	  => -1);
        $portfolio_query = new WP_Query( $portfolio_slider_var );
        ?>
        <div class="portfolio row">
            <div class="col-md-12">
                <?php echo $title; ?>
            </div>
            <?php if ( $portfolio_query->have_posts() ) : ?>
                <?php while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post();

                    $heading = get_post_meta( get_the_ID(), 'portfolio-heading', true );
                    $text = get_post_meta( get_the_ID(), 'portfolio-text', true );
                    $link_title = get_post_meta( get_the_ID(), 'portfolio-link-title', true );
                    $link = get_post_meta( get_the_ID(), 'portfolio-link', true ); ?>
                    <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                        <?php if ( has_post_thumbnail() ) { ?>
                            <div class="portfolio-thumb">
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="" class="img-responsive center-block">
                            </div>
                        <?php } ?>
                        <h4 class="text-uppercase "><?php the_title(); ?></h4>
                        <?php if($heading != '') : ?>
                            <h5 class="text-uppercase"><?php echo $heading;?></h5>
                        <?php endif; ?>
                        <?php if($text != ''): ?>
                            <p><?php echo $text; ?></p>
                        <?php endif; ?>
                        <?php if($link != '' ||  $link_title != ''): ?>
                            <a href="<?php echo $link;?>" class="btn btn-default text-uppercase"><?php echo $link_title;?></a>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else:  ?>
            <?php endif; ?>
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
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Portfolio', 'text_domain' );
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

} // class Portfolio_Widget

// register Portfolio_Widget widget
function regsiter_Portfolio_Widget() {
    register_widget( 'Portfolio_Widget' );
}
add_action( 'widgets_init', 'regsiter_Portfolio_Widget' );