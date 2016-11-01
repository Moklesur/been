<?php

/**
 * ThemeTim Typography & Color Settings
 *
 */

function themetim_typography_color($color) {

    wp_enqueue_style(
        'themetim',
        get_template_directory_uri() . '/assets/css/themetim.css'
    );

    $color = '';

    /*
     * General Section
     */
    $body_text_color = get_theme_mod( 'bg_text_color', '#30373b' );
    $body_font_size = get_theme_mod( 'body_font_size', '14' );
    $body_font_family = get_theme_mod( 'body_font_family', 'Open Sans' );

    $color .= "body { color:" . esc_attr($body_text_color) . "; font-size: " . esc_attr($body_font_size) . "px; font-family: ". esc_attr(str_replace('+', ' ', $body_font_family)) ."} ";

    $heading_color = get_theme_mod( 'heading_color', '#30373b' );
    $heading_font_family = get_theme_mod( 'heading_font_family', 'Open Sans' );
    $color .= "h1, h2, h3, h4, h5, h6 { color:" . esc_attr($heading_color) . ";font-family: ". esc_attr(str_replace('+', ' ', $heading_font_family)) ."} ";

    $link_color = get_theme_mod( 'link_color', '#30373b' );
    $color .= ".woocommerce ul.products li.product .price,a,.header-bottom .navbar-default .active a:hover,.header-bottom .navbar-default li> a,.woocommerce div.product .product_title,.woocommerce div.product p.price, .woocommerce div.product span.price,.woocommerce div.product form.cart .variations td.label,.navbar-default .navbar-nav>li>a,.footer-middle .footer-social a:hover{ color:" . esc_attr($link_color) . "} ";

    $link_hover_color = get_theme_mod( 'link_hover_color', '#fa8b6e' );
    $color .= "a:hover,.header-bottom .navbar-default .active a,.header-bottom .navbar-default .active a:hover,.header-bottom .navbar-default li> a:hover ,.navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover,.footer-middle .footer-social a,.woocommerce-MyAccount-navigation .is-active a,.navbar-default .navbar-nav>li>a:focus, .navbar-default .navbar-nav>li>a:hover,.latest-blog-share li a{ color:" . esc_attr($link_hover_color) . "} ";

    /*
     * Header Section
     */
    $header_bg_color = get_theme_mod( 'header_bg_color', 'transparent' );
    $header_text_color = get_theme_mod( 'header_text_color', '#30373b' );
    $color .= ".header { background:" . esc_attr($header_bg_color) . "; color: ". esc_attr($header_text_color) .";} ";

    /*
     * Footer Section
     */
    $footer_bg_color = get_theme_mod( 'footer_bg_color', '#fff' );
    $footer_text_color = get_theme_mod( 'footer_text_color', '#30373b' );
    $color .= ".footer-main { background:" . esc_attr($footer_bg_color) . "; color: ". esc_attr($footer_text_color) .";} ";

    /*
     * Default Button
     */
    $btn_default_bg = get_theme_mod( 'btn_default_bg', '#fa8b6e' );
    $btn_default_text = get_theme_mod( 'btn_default_text', '#fff' );
    $btn_default_border = get_theme_mod( 'btn_default_border', '#fa8b6e' );

    $color .= ".btn-default,.camera_wrap.main-slider .btn, .btn-default.disabled,.woocommerce ul.products li.product .button,.widget-area .search-form .search-submit,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span,.woocommerce div.product form.cart .button,.woocommerce #review_form #respond .form-submit input,.woocommerce input.button , .woocommerce-cart .wc-proceed-to-checkout a.checkout-button,.woocommerce #payment #place_order ,.wpcf7-submit{ background-color:" . esc_attr($btn_default_bg) . "; color: " . esc_attr($btn_default_text) . ";border-color: " . esc_attr($btn_default_border) . "; } ";

    $btn_default_bg_hover = get_theme_mod( 'btn_default_bg_hover', '#30373b' );
    $btn_default_text_hover = get_theme_mod( 'btn_default_text_hover', '#fff' );
    $btn_default_border_hover = get_theme_mod( 'btn_default_border_hover', '#30373b' );

    $color .= ".btn-default.active, .btn-default.focus, .btn-default:active, .btn-default:focus, .btn-default:hover, .open>.dropdown-toggle.btn-default,.woocommerce ul.products li.product .button:hover,.widget-area .search-form .search-submit:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current,.woocommerce div.product form.cart .button:hover ,.woocommerce #review_form #respond .form-submit input:hover,.woocommerce input.button:hover, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover, .woocommerce #payment #place_order:hover,.wpcf7-submit:hover,.camera_wrap.main-slider .btn:hover{ background-color:" . esc_attr($btn_default_bg_hover) . "; color: " . esc_attr($btn_default_text_hover) . ";border-color: " . esc_attr($btn_default_border_hover) . "; } ";

    /*
     * Primary Button
     */
    $btn_primary_bg = get_theme_mod( 'btn_primary_bg', '#30373b' );
    $btn_primary_text = get_theme_mod( 'btn_primary_text', '#fff' );
    $btn_primary_border = get_theme_mod( 'btn_primary_border', '#30373b' );

    $color .= ".btn-primary, .btn-primary.disabled{ background-color:" . esc_attr($btn_primary_bg) . "; color: " . esc_attr($btn_primary_text) . ";border-color: " . esc_attr($btn_primary_border) . "; } ";

    $btn_primary_bg_hover = get_theme_mod( 'btn_primary_bg_hover', '#fa8b6e' );
    $btn_primary_text_hover = get_theme_mod( 'btn_primary_text_hover', '#fff' );
    $btn_primary_border_hover = get_theme_mod( 'btn_primary_border_hover', '#fa8b6e' );

    $color .= ".btn-primary.active, .btn-primary.focus, .btn-primary:active, .btn-primary:focus, .btn-primary:hover, .open>.dropdown-toggle.btn-primary{ background-color:" . esc_attr($btn_primary_bg_hover) . "; color: " . esc_attr($btn_primary_text_hover) . ";border-color: " . esc_attr($btn_primary_border_hover) . "; } ";

    /*
     * Success Button
     */
    $btn_success_bg = get_theme_mod( 'btn_success_bg', '#fff' );
    $btn_success_text = get_theme_mod( 'btn_success_text', '#000' );
    $btn_success_border = get_theme_mod( 'btn_success_border', '#fff' );

    $color .= ".btn-success,.btn-success.disabled{ background-color:" . esc_attr($btn_success_bg) . "; color: " . esc_attr($btn_success_text) . ";border-color: " . esc_attr($btn_success_border) . "; } ";

    $btn_success_bg_hover = get_theme_mod( 'btn_success_bg_hover', '#000' );
    $btn_success_text_hover = get_theme_mod( 'btn_success_text_hover', '#fff' );
    $btn_success_border_hover = get_theme_mod( 'btn_success_border_hover', '#000' );

    $color .= ".btn-success.active, .btn-success.focus, .btn-success:active, .btn-success:focus, .btn-success:hover, .open>.dropdown-toggle.btn-success{ background-color:" . esc_attr($btn_success_bg_hover) . "; color: " . esc_attr($btn_success_text_hover) . ";border-color: " . esc_attr($btn_success_border_hover) . "; } ";

    /*
     * Extra Text Color
     */
    $text_color_1 = get_theme_mod( 'text_color_1', '#000' );
    $text_color_2 = get_theme_mod( 'text_color_2', '#ccc' );

    $color .= ".text-color-1{ color: " . esc_attr($text_color_1) . "; } ";
    $color .= ".text-color-2{ color: " . esc_attr($text_color_2) . "; } ";

    /*
     * Extra Background Color
     */
    $bg_color_1 = get_theme_mod( 'bg_color_1', '#000' );
    $bg_color_2 = get_theme_mod( 'bg_color_2', '#ccc' );

    $color .= ".background-1{ background-color: " . esc_attr($bg_color_1) . "; } ";
    $color .= ".background-1{ background-color: " . esc_attr($bg_color_2) . "; } ";

    /*
     * Section Gap
     */
/*    $section_gap_1 = get_theme_mod( 'section_gap_1', '80' );
    $section_gap_2 = get_theme_mod( 'section_gap_2', '80' );
    $section_gap_3 = get_theme_mod( 'section_gap_3', '50' );
    $section_gap_4 = get_theme_mod( 'section_gap_4', '50' );

    $color .= ".section-gap-1{ padding-top: " . esc_attr($section_gap_1) . "; } ";
    $color .= ".section-gap-2{ padding-bottom: " . esc_attr($section_gap_2) . "; } ";
    $color .= ".section-gap-3{ padding-top: " . esc_attr($section_gap_3) . "; } ";
    $color .= ".section-gap-4{ padding-bottom: " . esc_attr($section_gap_4) . "; } ";*/


    /*
     * ThemeTim Typography & Color Inline
     */

    wp_add_inline_style( 'themetim', $color );
}
add_action( 'wp_enqueue_scripts', 'themetim_typography_color' );