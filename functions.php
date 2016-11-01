<?php
/**
 * ThemeTim WordPress Framework functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ThemeTim_WordPress_Framework
 */

if ( ! function_exists( 'themetim_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function themetim_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on ThemeTim WordPress Framework, use a find and replace
	 * to change 'themetim' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'themetim', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'themetim' ),
		'footer-1' => esc_html__( 'Footer 1', 'themetim' ),
		'footer-2' => esc_html__( 'Footer 2', 'themetim' ),
		'footer-3' => esc_html__( 'Footer 3', 'themetim' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'themetim_custom_background_args', array(
		'default-color' => '000',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'themetim_setup' );

/**
 * @param $classes
 * @return array
 * Add Body Class for Animation
 */
function themetim_body_class($classes) {
	$classes[] = 'animsition';
	return $classes;
}

add_filter('body_class', 'themetim_body_class');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function themetim_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'themetim' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'themetim' ),
		'before_widget' => '<section id="%1$s" class="widget themetim-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Blog & Article', 'themetim' ),
		'id'            => 'blog-article',
		'description'   => esc_html__( 'Blog & Article', 'themetim' ),
		'before_widget' => '<section id="%1$s" class="widget themetim-widget %2$s blog-article">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Shop & Product Page', 'themetim' ),
		'id'            => 'shop-product',
		'description'   => esc_html__( 'Widget For Shop & Product Pages', 'themetim' ),
		'before_widget' => '<section id="%1$s" class="widget themetim-widget %2$s shop-widget">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'themetim_widgets_init' );

/**
 * Enqueue scripts and styles.
 * fonts.googleapis.com/css?family=Open+Sans:400,600
 */
function themetim_scripts() {
	wp_enqueue_style( 'themetim-body-fonts', '//fonts.googleapis.com/css?family=' . esc_attr(get_theme_mod('body_font_family','Open+Sans').":".get_theme_mod('body_font_weight','300,400')) );
	wp_enqueue_style( 'themetim-heading-fonts', '//fonts.googleapis.com/css?family=' . esc_attr(get_theme_mod('heading_font_family','Open+Sans').":".get_theme_mod('heading_font_weight','400,700')) );
	wp_enqueue_style( 'themetim-animate', get_template_directory_uri() . '/assets/css/animate.min.css', array(), '3.5.1' );
	wp_enqueue_style( 'themetim-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.5.0' );
	wp_enqueue_style( 'themetim-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.6' );
	wp_enqueue_style( 'themetim-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css', array(), '2.4.0' );
	wp_enqueue_style( 'themetim-camera', get_template_directory_uri() . '/assets/css/camera.css', array(), '1.3.4' );
	wp_enqueue_style( 'themetim-animsition', get_template_directory_uri() . '/assets/css/animsition.min.css', array(), '4.0.2' );
	wp_enqueue_style( 'themetim-style', get_stylesheet_uri() );
	wp_enqueue_style( 'themetim-themetim', get_template_directory_uri() . '/assets/css/themetim.css', array(), '1.0' );
	wp_enqueue_script( 'themetim-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '3.3.6', true );
	wp_enqueue_style( 'themetim-mobile', get_template_directory_uri() . '/assets/css/mobile.css', array(), '1.0' );
	wp_enqueue_script( 'themetim-mobile-customized', get_template_directory_uri() . '/assets/js/jquery.mobile.customized.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'themetim-easing', get_template_directory_uri() . '/assets/js/jquery.easing.1.3.js', array(), '1.3', true );
	wp_enqueue_script( 'themetim-camera', get_template_directory_uri() . '/assets/js/camera.min.js', array(), '1.3.4', true );
	wp_enqueue_script( 'themetim-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), '2.4.0', false );
	wp_enqueue_script( 'themetim-mousewheel', get_template_directory_uri() . '/assets/js/jquery.mousewheel.min.js', array(), '3.1.13', true );
	wp_enqueue_script( 'themetim-smoothscroll', get_template_directory_uri() . '/assets/js/jquery.simplr.smoothscroll.min.js', array(), '1.0.1', true );
	wp_enqueue_script( 'themetim-animsition', get_template_directory_uri() . '/assets/js/animsition.min.js', array(), '4.0.2', true );
	wp_enqueue_script( 'themetim-script', get_template_directory_uri() . '/assets/js/script.js', array(), '1.0.0', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'themetim_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/**
 * ThemeTim Post Type
 */
require get_template_directory() . '/inc/post-type.php';

/**
 * ThemeTim Typography, Color
 */
require get_template_directory() . '/inc/typography.php';

/**
 * woocommerce support
 */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

/**
 * ThemeTim Typography, Color
 */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';


if ( class_exists( 'WooCommerce' ) ) {
/**
 * ThemeTim Post Type
 */
	require get_template_directory() . '/inc/woo-hook.php';

	/**
	 * ThemeTim widget
	 */
	require get_template_directory() . '/inc/widget/widget-setting.php';
}
/**
 * ThemeTim Theme Functions
 */
require get_template_directory() . '/inc/theme-functions.php';

/**
 * ThemeTim the excerpt length
 */
function themetim_excerpt_length( $excerpt_length ) {
	$excerpt = get_theme_mod('excerpt_lenght', '60');
	return $excerpt;
}
add_filter( 'excerpt_length', 'themetim_excerpt_length', 999 );

/**
 * ThemeTim Remove srcset
 */
add_filter( 'max_srcset_image_width', create_function( '', 'return 1;' ) );

/**
 *TGM Plugin activation.
 */
require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'themetim_active_plugins' );
function themetim_active_plugins() {
	$plugins = array(
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		array(
			'name'      => 'WooCommerce',
			'slug'      => 'woocommerce',
			'required'  => true,
		),
		array(
			'name'      => 'Page Builder by SiteOrigin',
			'slug'      => 'siteorigin-panels',
			'required'  => true,
		),
		array(
			'name'      => 'YITH WooCommerce Compare',
			'slug'      => 'yith-woocommerce-compare',
			'required'  => true,
		),
		array(
			'name'      => 'YITH WooCommerce Quick View',
			'slug'      => 'yith-woocommerce-quick-view',
			'required'  => true,
		),
		array(
			'name'      => 'Yoast SEO',
			'slug'      => 'wordpress-seo',
			'required'  => false,
		),
		array(
			'name'      => 'WP Construction Mode',
			'slug'      => 'wp-construction-mode',
			'required'  => false,
		),
	);
	tgmpa( $plugins );

}