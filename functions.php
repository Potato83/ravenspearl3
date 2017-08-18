<?php
/**
 * RavensPearl functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RavensPearl
 */

if( function_exists('acf_add_options_page') ) {

	

	acf_add_options_page('Bios');
	acf_add_options_page('Covers');

	
}

if ( ! function_exists( 'ravenspearl_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ravenspearl_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on RavensPearl, use a find and replace
	 * to change 'ravenspearl' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'ravenspearl', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'ravenspearl' ),
		'secondary' => esc_html__( 'Secondary', 'ravenspearl' ),
		'custom' => esc_html__( 'Custom', 'ravenspearl' ),
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
	add_theme_support( 'custom-background', apply_filters( 'ravenspearl_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'ravenspearl_setup' );

// WooCommerce
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ravenspearl_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ravenspearl_content_width', 640 );
}
add_action( 'after_setup_theme', 'ravenspearl_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ravenspearl_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ravenspearl' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ravenspearl' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ravenspearl_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ravenspearl_scripts() {
	wp_enqueue_style( 'ravenspearl-style', get_stylesheet_uri() );

	wp_enqueue_script( 'ravenspearl-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'ravenspearl-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ravenspearl_scripts' );

add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    // 2.1 +
 
function woo_custom_cart_button_text() {
 
        return __( 'Buy', 'woocommerce' );
 
}

//change return to cart link
function change_return_shop_url() {
    return home_url();  
}
add_filter( 'woocommerce_return_to_shop_redirect', 'change_return_shop_url' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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



/** WooCommerce **/

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<main id="main" class="site-main" role="main">';
}

function my_theme_wrapper_end() {
  echo '</main>';
}

/** CUSTOM WRAPPERS **/

add_action('sam_wrap_before', 'wrap_link_before');

function wrap_link_before() {
	echo '<div class="gallery-thumb covers darken post-link">';
}

add_action('sam_wrap_after', 'wrap_link_after');

function wrap_link_after() {
	echo '</div>title()';
}

/**  BLOG / read more **/
// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more) {
       global $post;
	return ' <a class="moretag" href=" '. get_permalink($post->ID) . '">[...]</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/** Test custom sort by **/
add_filter( 'woocommerce_get_catalog_ordering_args', 'custom_woocommerce_get_catalog_ordering_args' );
function custom_woocommerce_get_catalog_ordering_args( $args ) {
  $orderby_value = isset( $_GET['orderby'] ) ? woocommerce_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
	if ( 'random_list' == $orderby_value ) {
		$args['orderby'] = 'rand';
		$args['order'] = '';
		$args['meta_key'] = '';
	}
	return $args;
}
add_filter( 'woocommerce_default_catalog_orderby_options', 'custom_woocommerce_catalog_orderby' );
add_filter( 'woocommerce_catalog_orderby', 'custom_woocommerce_catalog_orderby' );
function custom_woocommerce_catalog_orderby( $sortby ) {
	$sortby['random_list'] = 'Random0-sammy';
	return $sortby;
}

/** End test **/

/** no comments on media attachments **/
function filter_media_comment_status( $open, $post_id ) {
	$post = get_post( $post_id );
	if( $post->post_type == 'attachment' ) {
		return false;
	}
	return $open;
}
add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );

/** SUBCATS TEST **/

function woocommerce_subcats_from_parentcat_by_ID($parent_cat_ID) {

   $args = array(

       'hierarchical' => 1,

       'show_option_none' => '',

       'hide_empty' => 0,

       'parent' => $parent_cat_ID,

     'taxonomy' => 'product_cat'

   );

$subcats = get_categories($args);

echo '<ul class="wooc_sclist">';

foreach ($subcats as $sc) {

       $link = get_term_link( $sc->slug, $sc->taxonomy );

echo '<li><a href="'. $link .'">'.$sc->name.'</a></li>';

     }

echo '</ul>';

}

function woocommerce_subcats_from_parentcat_by_NAME($parent_cat_NAME) {

$IDbyNAME = get_term_by('name', $parent_cat_NAME, 'product_cat');

$product_cat_ID = $IDbyNAME->term_id;

   $args = array(

       'hierarchical' => 1,

       'show_option_none' => '',

       'hide_empty' => 0,

       'parent' => $product_cat_ID,

       'taxonomy' => 'product_cat'

   );

$subcats = get_categories($args);
$subcats_array = array();


foreach ($subcats as $sc) {

       $link = get_term_link( $sc->slug, $sc->taxonomy );

//echo '<li>'.$sc->name.'</li>';
array_push($subcats_array, $sc->name);


     }

return $subcats_array;

}

/** End Subcats TEST **/
/** For Level 2 SubCats: **/

function woocommerce_subcats_from_parentcat_by_NAME2($parent_cat_NAME) {

$IDbyNAME = get_term_by('name', $parent_cat_NAME, 'product_cat');

$product_cat_ID = $IDbyNAME->term_id;

   $args = array(

       'hierarchical' => 1,

       'show_option_none' => '',

       'hide_empty' => 0,

       'parent' => $product_cat_ID,

       'taxonomy' => 'product_cat'

   );

$subcats = get_categories($args);
$subcats_array = array();


foreach ($subcats as $sc) {

       $link = get_term_link( $sc->slug, $sc->taxonomy );

//echo '<li>'.$sc->name.'</li>';
array_push($subcats_array, $sc->name);


     }

return $subcats_array;

}

