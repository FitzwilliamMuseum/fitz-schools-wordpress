<?php
/**
* WooCommerce Compatibility File
*
* @link https://woocommerce.com/
*
* @package dbstarter-theme
*/

/**
* Setup
*
*/

// WooCommerce Gallery Support
function theme_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'theme_woocommerce_setup' );

// WooCommerce specific scripts & stylesheets.
function theme_woocommerce_scripts() {
	wp_enqueue_style( 'default-woocommerce-style', get_template_directory_uri() . '/assets/css/woocommerce.css' );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
		font-family: "star";
		src: url("' . $font_path . 'star.eot");
		src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
		url("' . $font_path . 'star.woff") format("woff"),
		url("' . $font_path . 'star.ttf") format("truetype"),
		url("' . $font_path . 'star.svg#star") format("svg");
		font-weight: normal;
		font-style: normal;
	}';

	wp_add_inline_style( 'default-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'theme_woocommerce_scripts' );

// Disable the default WooCommerce stylesheet.
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// Add 'woocommerce-active' class to the body tag.
function theme_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';
	return $classes;
}
add_filter( 'body_class', 'theme_woocommerce_active_body_class' );

/**
* Settings
*
*/

// Products per page.
function theme_woocommerce_products_per_page() {
	return 12;
}
add_filter( 'loop_shop_per_page', 'theme_woocommerce_products_per_page' );

// Product gallery thumnbail columns.
function theme_woocommerce_thumbnail_columns() {
	return 4;
}
add_filter( 'woocommerce_product_thumbnails_columns', 'theme_woocommerce_thumbnail_columns' );

// Default loop columns on product archives.
function theme_woocommerce_loop_columns() {
	return 3;
}
add_filter( 'loop_shop_columns', 'theme_woocommerce_loop_columns' );

// Related Products Args.
function theme_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'theme_woocommerce_related_products_args' );

/**
* Structure
*
*/

// Product Wrapper Open
if ( ! function_exists( 'theme_woocommerce_product_columns_wrapper' ) ) {
	function theme_woocommerce_product_columns_wrapper() {
		$columns = theme_woocommerce_loop_columns();
		echo '<div class="products-wrapper">';
	}
}
add_action( 'woocommerce_before_shop_loop', 'theme_woocommerce_product_columns_wrapper', 40 );

// Product Wrapper Close
if ( ! function_exists( 'theme_woocommerce_product_columns_wrapper_close' ) ) {
	function theme_woocommerce_product_columns_wrapper_close() {
		echo '</div>';
	}
}
add_action( 'woocommerce_after_shop_loop', 'theme_woocommerce_product_columns_wrapper_close', 40 );

// Remove default WooCommerce wrapper.
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

// Before WooCommerce Content
if ( ! function_exists( 'theme_woocommerce_wrapper_before' ) ) {
	function theme_woocommerce_wrapper_before() {
		?>
		<div id="primary" class="content-area">
			<section class="section">
				<main id="main" class="site-main container" role="main">
					<div class="columns">
						<div class="column">
							<?php
						}
					}
					add_action( 'woocommerce_before_main_content', 'theme_woocommerce_wrapper_before' );

					// After WooCommerce Content
					if ( ! function_exists( 'theme_woocommerce_wrapper_after' ) ) {
						function theme_woocommerce_wrapper_after() {
							?>
						</div>
					</div>
				</main><!-- #main -->
			</section>
		</div><!-- #primary -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'theme_woocommerce_wrapper_after' );

// Sidebar
register_sidebar( array(
	'name' => __( 'shop', 'wpb' ),
	'id' => 'shop',
	'description' => __( ' shop ','wpb' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>',
) );
add_action( 'woocommerce_before_shop_loop', 'woocommerce_sidebar', 60 );
function woocommerce_sidebar() {
	if ( is_active_sidebar( 'shop' ) ) :
		echo '<div id="sidebar-shop" class="sidebar shop-sidebar widget-area" role="complementary">';
		dynamic_sidebar( 'shop' );
		echo '</div>';
	endif;
}

// Single Product Overview Open
add_action( 'woocommerce_before_single_product_summary', 'product_overview_start');
function product_overview_start() {
	echo '<section class="product-overview">';
}

// Single Product Overview Close
add_action( 'woocommerce_after_single_product_summary', 'product_overview_end', 5);
function product_overview_end() {
	echo '</section>';
}
