<?php

/**
 * ThemeTim Widget Settings
 */
if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory() . '/inc/widget/recent-products/recent-products.php';
    require get_template_directory() . '/inc/widget/featured-products/featured-products.php';
    require get_template_directory() . '/inc/widget/product-category/product-category.php';
    require get_template_directory() . '/inc/widget/categories-list/categories-list.php';
    require get_template_directory() . '/inc/widget/sale-products/sale-products.php';
    require get_template_directory() . '/inc/widget/best-selling-products/best-selling-products.php';
    require get_template_directory() . '/inc/widget/top-rated-products/top-rated-products.php';
}
require get_template_directory() . '/inc/widget/recent-blog-news/recent-blog-news.php';
require get_template_directory() . '/inc/widget/testimonial/testimonial.php';
require get_template_directory() . '/inc/widget/brand/brand.php';
require get_template_directory() . '/inc/widget/portfolio/portfolio.php';