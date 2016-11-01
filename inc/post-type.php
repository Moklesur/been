<?php
/**
 * ThemeTim Main Slider
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
add_action( 'init', 'themetim_main_slider' );
function themetim_main_slider() {
    $slider_labels = array(
        'name'               => _x( 'Slider', 'post type general name', 'themetim' ),
        'singular_name'      => _x( 'Slider', 'post type singular name', 'themetim' ),
        'menu_name'          => _x( 'Slider', 'admin menu', 'themetim' ),
        'name_admin_bar'     => _x( 'Slider', 'add new on admin bar', 'themetim' ),
        'add_new'            => _x( 'Add New', 'Slider', 'themetim' ),
        'add_new_item'       => __( 'Add New Slider', 'themetim' ),
        'new_item'           => __( 'New Slider', 'themetim' ),
        'edit_item'          => __( 'Edit Slider', 'themetim' ),
        'view_item'          => __( 'View Slider', 'themetim' ),
        'all_items'          => __( 'All Slider', 'themetim' ),
        'search_items'       => __( 'Search Slider', 'themetim' ),
        'parent_item_colon'  => __( 'Parent Slider:', 'themetim' ),
        'not_found'          => __( 'No Slider found.', 'themetim' ),
        'not_found_in_trash' => __( 'No Slider found in Trash.', 'themetim' )
    );

    $slider_args = array(
        'labels'             => $slider_labels,
        'description'        => __( 'Description.', 'themetim' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'Slider' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'author', 'thumbnail'),
        'themetim_slider_meta_boxes' => 'themetim_slider_display_callback',
        'page'          => array( 'setting' ),

    );

    register_post_type( 'slider', $slider_args );
}
/**
 * ThemeTim Main Slider Meta Box
 */
function themetim_slider_meta_boxes() {
    add_meta_box( 'themetim-main-slider-id', __( 'Slider Text', 'themetim' ), 'themetim_slider_display_callback', 'slider','normal', 'high');
}
add_action( 'add_meta_boxes', 'themetim_slider_meta_boxes' );

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function themetim_slider_display_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );
    ?>

    <div>
        <h4 class="prfx-row-title"><?php _e( 'Heading', 'text-domain' )?></h4>
        <input type="text" name="slider-heading" id="heading" class="widefat" value="<?php if ( isset ( $prfx_stored_meta['slider-heading'] ) ) echo $prfx_stored_meta['slider-heading'][0]; ?>" />
        <h4 class="prfx-row-title"><?php _e( 'Text', 'text-domain' )?></h4>
        <textarea name="slider-text" class="widefat" rows="6"><?php if ( isset ( $prfx_stored_meta['slider-text'] ) ) echo $prfx_stored_meta['slider-text'][0]; ?></textarea>

        <h4 class="prfx-row-title"><?php _e( 'Link', 'text-domain' )?></h4>
        <input type="text" name="slider-link-title" id="heading" class="widefat" value="<?php if ( isset ( $prfx_stored_meta['slider-link-title'] ) ) echo $prfx_stored_meta['slider-link-title'][0]; ?>" placeholder="Button Title" />

        <input type="text" name="slider-link" id="heading" class="widefat" value="<?php if ( isset ( $prfx_stored_meta['slider-link'] ) ) echo $prfx_stored_meta['slider-link'][0]; ?>" placeholder="Button Link" style="margin-top: 15px" />
    </div>

    <?php
}

/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function themetim_slider_save_meta_box( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'slider-heading' ] ) ) {
        update_post_meta( $post_id, 'slider-heading', sanitize_text_field( $_POST[ 'slider-heading' ] ) );
    }

    if( isset( $_POST[ 'slider-text' ] ) ) {
        update_post_meta( $post_id, 'slider-text', sanitize_text_field( $_POST[ 'slider-text' ] ) );
    }
    if( isset( $_POST[ 'slider-link' ] ) ) {
        update_post_meta( $post_id, 'slider-link', sanitize_text_field( $_POST[ 'slider-link' ] ) );
    }
    if( isset( $_POST[ 'slider-link-title' ] ) ) {
        update_post_meta( $post_id, 'slider-link-title', sanitize_text_field( $_POST[ 'slider-link-title' ] ) );
    }
    // Retrieves the stored value from the database
    $meta_value = get_post_meta( get_the_ID(), 'slider-heading', true );
    $meta_value .= get_post_meta( get_the_ID(), 'slider-text', true );
    $meta_value .= get_post_meta( get_the_ID(), 'slider-link', true );
    $meta_value .= get_post_meta( get_the_ID(), 'slider-link-title', true );

    // Checks and displays the retrieved value
    if( !empty( $meta_value ) ) {
        echo $meta_value;
    }
}
add_action( 'save_post', 'themetim_slider_save_meta_box' );

/**
 * ThemeTim Testimonial Slider
 *
 */
add_action( 'init', 'testimonial_slider' );
function testimonial_slider() {
    $testimonial_labels = array(
        'name'               => _x( 'Testimonial', 'post type general name', 'themetim' ),
        'singular_name'      => _x( 'Testimonial', 'post type singular name', 'themetim' ),
        'menu_name'          => _x( 'Testimonial', 'admin menu', 'themetim' ),
        'name_admin_bar'     => _x( 'Testimonial', 'add new on admin bar', 'themetim' ),
        'add_new'            => _x( 'Add New', 'Testimonial', 'themetim' ),
        'add_new_item'       => __( 'Add New Testimonial', 'themetim' ),
        'new_item'           => __( 'New Testimonial', 'themetim' ),
        'edit_item'          => __( 'Edit Testimonial', 'themetim' ),
        'view_item'          => __( 'View Testimonial', 'themetim' ),
        'all_items'          => __( 'All Testimonial', 'themetim' ),
        'search_items'       => __( 'Search Testimonial', 'themetim' ),
        'parent_item_colon'  => __( 'Parent Testimonial:', 'themetim' ),
        'not_found'          => __( 'No Testimonial found.', 'themetim' ),
        'not_found_in_trash' => __( 'No Testimonial found in Trash.', 'themetim' )
    );

    $testimonial_args = array(
        'labels'             => $testimonial_labels,
        'description'        => __( 'Description.', 'themetim' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'Testimonial' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail'),
        'taxonomies'          => array( 'category' ),
        'page'          => array( 'setting' ),

    );

    register_post_type( 'testimonial', $testimonial_args );
}

/**
 * ThemeTim Our Brand Slider
 *
 */
add_action( 'init', 'brand_slider' );
function brand_slider() {
    $brand_labels = array(
        'name'               => _x( 'Brand', 'post type general name', 'themetim' ),
        'singular_name'      => _x( 'Brand', 'post type singular name', 'themetim' ),
        'menu_name'          => _x( 'Brand', 'admin menu', 'themetim' ),
        'name_admin_bar'     => _x( 'Brand', 'add new on admin bar', 'themetim' ),
        'add_new'            => _x( 'Add New', 'Brand', 'themetim' ),
        'add_new_item'       => __( 'Add New Brand', 'themetim' ),
        'new_item'           => __( 'New Brand', 'themetim' ),
        'edit_item'          => __( 'Edit Brand', 'themetim' ),
        'view_item'          => __( 'View Brand', 'themetim' ),
        'all_items'          => __( 'All Brand', 'themetim' ),
        'search_items'       => __( 'Search Brand', 'themetim' ),
        'parent_item_colon'  => __( 'Parent Brand:', 'themetim' ),
        'not_found'          => __( 'No Brand found.', 'themetim' ),
        'not_found_in_trash' => __( 'No Brand found in Trash.', 'themetim' )
    );

    $brand_args = array(
        'labels'             => $brand_labels,
        'description'        => __( 'Description.', 'themetim' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'Brand' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title','thumbnail'),
        'page'          => array( 'setting' ),

    );

    register_post_type( 'brand', $brand_args );
}

/**
 * ThemeTim Portfolio
 *
 */
add_action( 'init', 'themetim_portfolio' );
function themetim_portfolio() {
    $portfolio_labels = array(
        'name'               => _x( 'Portfolio', 'post type general name', 'themetim' ),
        'singular_name'      => _x( 'Portfolio', 'post type singular name', 'themetim' ),
        'menu_name'          => _x( 'Portfolio', 'admin menu', 'themetim' ),
        'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'themetim' ),
        'add_new'            => _x( 'Add New', 'Portfolio', 'themetim' ),
        'add_new_item'       => __( 'Add New Portfolio', 'themetim' ),
        'new_item'           => __( 'New Portfolio', 'themetim' ),
        'edit_item'          => __( 'Edit Portfolio', 'themetim' ),
        'view_item'          => __( 'View Portfolio', 'themetim' ),
        'all_items'          => __( 'All Portfolio', 'themetim' ),
        'search_items'       => __( 'Search Portfolio', 'themetim' ),
        'parent_item_colon'  => __( 'Parent Portfolio:', 'themetim' ),
        'not_found'          => __( 'No Portfolio found.', 'themetim' ),
        'not_found_in_trash' => __( 'No Portfolio found in Trash.', 'themetim' )
    );

    $portfolio_args = array(
        'labels'             => $portfolio_labels,
        'description'        => __( 'Description.', 'themetim' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'portfolio' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'author', 'thumbnail'),
        'themetim_portfolio_meta_boxes' => 'themetim_portfolio_display_callback',
        'page'          => array( 'setting' ),

    );

    register_post_type( 'portfolio', $portfolio_args );
}
/**
 * ThemeTim portfolio Meta Box
 */
function themetim_portfolio_meta_boxes() {
    add_meta_box( 'themetim-portfolio-id', __( 'Portfolio Text', 'themetim' ), 'themetim_portfolio_display_callback', 'portfolio','normal', 'high');
}
add_action( 'add_meta_boxes', 'themetim_portfolio_meta_boxes' );

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function themetim_portfolio_display_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );
    ?>

    <div>
        <h4 class="prfx-row-title"><?php _e( 'Heading', 'text-domain' )?></h4>
        <input type="text" name="portfolio-heading" id="heading" class="widefat" value="<?php if ( isset ( $prfx_stored_meta['portfolio-heading'] ) ) echo $prfx_stored_meta['portfolio-heading'][0]; ?>" />
        <h4 class="prfx-row-title"><?php _e( 'Text', 'text-domain' )?></h4>
        <textarea name="portfolio-text" class="widefat" rows="6"><?php if ( isset ( $prfx_stored_meta['portfolio-text'] ) ) echo $prfx_stored_meta['portfolio-text'][0]; ?></textarea>

        <h4 class="prfx-row-title"><?php _e( 'Link', 'text-domain' )?></h4>
        <input type="text" name="portfolio-link-title" id="heading" class="widefat" value="<?php if ( isset ( $prfx_stored_meta['portfolio-link-title'] ) ) echo $prfx_stored_meta['portfolio-link-title'][0]; ?>" placeholder="Button Title" />

        <input type="text" name="portfolio-link" id="heading" class="widefat" value="<?php if ( isset ( $prfx_stored_meta['portfolio-link'] ) ) echo $prfx_stored_meta['portfolio-link'][0]; ?>" placeholder="Button Link" style="margin-top: 15px" />
    </div>

    <?php
}

/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function themetim_portfolio_save_meta_box( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'portfolio-heading' ] ) ) {
        update_post_meta( $post_id, 'portfolio-heading', sanitize_text_field( $_POST[ 'portfolio-heading' ] ) );
    }

    if( isset( $_POST[ 'portfolio-text' ] ) ) {
        update_post_meta( $post_id, 'portfolio-text', sanitize_text_field( $_POST[ 'portfolio-text' ] ) );
    }
    if( isset( $_POST[ 'portfolio-link' ] ) ) {
        update_post_meta( $post_id, 'portfolio-link', sanitize_text_field( $_POST[ 'portfolio-link' ] ) );
    }
    if( isset( $_POST[ 'portfolio-link-title' ] ) ) {
        update_post_meta( $post_id, 'portfolio-link-title', sanitize_text_field( $_POST[ 'portfolio-link-title' ] ) );
    }
    // Retrieves the stored value from the database
    $meta_value = get_post_meta( get_the_ID(), 'portfolio-heading', true );
    $meta_value .= get_post_meta( get_the_ID(), 'portfolio-text', true );
    $meta_value .= get_post_meta( get_the_ID(), 'portfolio-link', true );
    $meta_value .= get_post_meta( get_the_ID(), 'portfolio-link-title', true );

    // Checks and displays the retrieved value
    if( !empty( $meta_value ) ) {
        echo $meta_value;
    }
}
add_action( 'save_post', 'themetim_portfolio_save_meta_box' );