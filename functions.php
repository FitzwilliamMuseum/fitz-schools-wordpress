<?php
/**
 * dbstarter-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dbstarter-theme
 */

if ( ! function_exists( 'dbstarter_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function dbstarter_theme_setup() {

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

    // Add featured image sizes
    add_image_size( 'featured-large', 640, 294, true ); // width, height, crop
    add_image_size( 'featured-small', 320, 147, true );

    // Add other useful image sizes for use through Add Media modal
    add_image_size( 'large_image', 1800 );
    add_image_size( 'medium_image', 1400 );
    add_image_size( 'small_image', 1000 );

    // Register the three useful image sizes for use in Add Media modal
    add_filter( 'image_size_names_choose', 'wpshout_custom_sizes' );
    function wpshout_custom_sizes( $sizes ) {
        return array_merge( $sizes, array(
            'medium-width' => __( 'Medium Width' ),
            'medium-height' => __( 'Medium Height' ),
            'medium-something' => __( 'Medium Something' ),
        ) );
    }

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Primary', 'db-theme' ),
		) );

		// Bulmapress navigation
		function bulmapress_navigation() {
	    wp_nav_menu( array(
        'theme_location'    => 'primary-menu',
        'depth'             => 2,
        'fallback_cb'       => 'bulmapress_navwalker::fallback',
        'walker'            => new bulmapress_navwalker(),
        'container' => '%3$s',
        'items_wrap' => '%3$s',
      ) );
		}

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

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
  		'height'      => 250,
  		'width'       => 250,
  		'flex-width'  => true,
  		'flex-height' => true,
		) );
	}
endif;

add_action( 'after_setup_theme', 'dbstarter_theme_setup' );

function footer_logo($wp_customize) {
// add a setting
  $wp_customize->add_setting('footer_logo');
// Add a control to upload the hover logo
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
    'label' => 'Upload Footer Logo',
    'section' => 'title_tagline', //this is the section where the custom-logo from WordPress is
    'settings' => 'footer_logo',
    'priority' => 8 // show it just below the custom-logo
  )));
}

add_action('customize_register', 'footer_logo');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dbstarter_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dbstarter_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'dbstarter_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dbstarter_theme_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Top Bar', 'db-theme' ),
		'id' => 'top-bar',
		'description' => __( ' Top Bar ','db-theme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	register_sidebar( array(
  	'name' => __( 'Footer Top', 'db-theme' ),
  	'id' => 'footer-top',
  	'description' => __( ' Footer Top ','db-theme' ),
  	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  	'after_widget' => '</aside>',
  	'before_title' => '<h4 class="widget-title">',
  	'after_title' => '</h4>',
  ) );
	register_sidebar( array(
  	'name' => __( 'Footer 1', 'db-theme' ),
  	'id' => 'footer-1',
  	'description' => __( ' Footer 1 ','db-theme' ),
  	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  	'after_widget' => '</aside>',
  	'before_title' => '<h4 class="widget-title">',
  	'after_title' => '</h4>',
  ) );
  register_sidebar( array(
  	'name' => __( 'Footer 2', 'db-theme' ),
  	'id' => 'footer-2',
  	'description' => __( ' Footer 2 ','db-theme' ),
  	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  	'after_widget' => '</aside>',
  	'before_title' => '<h4 class="widget-title">',
  	'after_title' => '</h4>',
  ) );
  register_sidebar( array(
  	'name' => __( 'Footer 3', 'db-theme' ),
  	'id' => 'footer-3',
  	'description' => __( ' Footer 3 ','db-theme' ),
  	'before_widget' => '<aside id="%1$s" class="widget  %2$s">',
  	'after_widget' => '</aside>',
  	'before_title' => '<h4 class="widget-title">',
  	'after_title' => '</h4>',
  ) );
  register_sidebar( array(
  	'name' => __( 'Footer 4', 'db-theme' ),
  	'id' => 'footer-4',
  	'description' => __( ' Footer 4 ','db-theme' ),
  	'before_widget' => '<aside id="%1$s" class="widget  %2$s">',
  	'after_widget' => '</aside>',
  	'before_title' => '<h4 class="widget-title">',
  	'after_title' => '</h4>',
  ) );
  register_sidebar( array(
  	'name' => __( 'Footer Bottom', 'db-theme' ),
  	'id' => 'footer-bottom',
  	'description' => __( ' Footer Bottom ','db-theme' ),
  	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  	'after_widget' => '</aside>',
  	'before_title' => '<h4 class="widget-title">',
  	'after_title' => '</h4>',
  ) );
}
add_action( 'widgets_init', 'dbstarter_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dbstarter_theme_scripts() {

  // JQuery
  wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), '20151215', true );

  //Normalize
  wp_enqueue_style( 'dbstarter-theme-normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css', array(), null );

  // Slick Slider CSS
  wp_enqueue_style( 'dbstarter-theme-slick-slider-style', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', array(), null );
  wp_enqueue_script( 'dbstarter-theme-slick-slider', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array(), null, true );

  // Font Awesome
  wp_enqueue_style( 'dbstarter-theme-fontawesome', 'https://use.fontawesome.com/releases/v5.2.0/css/all.css', array(), null );

  // skip-link-focus-fix.js
	wp_enqueue_script( 'dbstarter-theme-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

  // Fancy Box
  wp_enqueue_style( 'fancy-box-style', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css' );
	wp_enqueue_script( 'dbstarter-theme-fancy-box', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js', array(), null, true );

  // Theme
  wp_enqueue_style( 'dbstarter-theme-primary-style', get_template_directory_uri() . '/assets/css/theme.css' );
	wp_enqueue_script( 'dbstarter-theme-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), null, true );

	// Blocks
	wp_enqueue_script( 'dbstarter-blocks-scripts', get_template_directory_uri() . '/assets/js/blocks.js', array(), null, true );

  // Comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

  // Custom Stylesheet
  wp_enqueue_style( 'dbstarter-theme-style', get_stylesheet_uri() );

}
add_action( 'wp_enqueue_scripts', 'dbstarter_theme_scripts', 15 );

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Bulma Navigation
 */
require get_template_directory() . '/inc/bulma-navigation.php';

/**
 * dbstarter Theme Functions
 */
require get_template_directory() . '/inc/theme-functions.php';

/**
 * Modules Post Type
 */
require get_template_directory() . '/inc/modules.php';

/**
 * Blocks Config
 */
require get_template_directory() . '/inc/blocks/blocks-config.php';

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

// Add Media Image Source ID Field
function add_media_image_source_id( $form_fields, $post ) {
  $object_id = get_post_meta($post->ID, 'object_id', true);
  $form_fields['object_id'] = array(
    'label' => 'Object ID',
    'input' => 'text', // you may alos use 'textarea' field
    'value' => $object_id,
  );
  return $form_fields;
}
add_filter('attachment_fields_to_edit', 'add_media_image_source_id', null, 2);

// Save Media Image Source ID Field
function save_media_image_source_id($post, $attachment) {
  if( isset($attachment['object_id']) ){
      update_post_meta($post['ID'], 'object_id', sanitize_text_field( $attachment['object_id'] ) );
  }else{
       delete_post_meta($post['ID'], 'object_id' );
  }
  return $post;
}
add_filter('attachment_fields_to_save', 'save_media_image_source_id', null, 2);

// Add ACF to module filters
$GLOBALS['my_query_filters'] = array(
	'field_612e61aef5258'	=> 'has_video',
);

function fitzwilliam_query_vars( $qvars ) {
    $qvars[] = 'has_video';
    $qvars[] = 'mkeyword';
    return $qvars;
}
add_filter( 'query_vars', 'fitzwilliam_query_vars' );


// action
add_action('pre_get_posts', 'my_pre_get_posts', 10, 1);
function my_pre_get_posts( $query ) {

	// bail early if is in admin
	if( is_admin() ) return;


	// bail early if not main query
	// - allows custom code / plugins to continue working
	//if( !$query->is_main_query() ) return;

	// get meta query
	$meta_query = $query->get('meta_query');

	// loop over filters
	$meta_query = array(
		'relation' => 'AND',
	);

	
	if(get_query_var("has_video") && get_query_var("has_video") == 1){
					
			$meta_query[] = array(
				'key'      => 'has_video',
				'value'    => 1,
				'compare'  => '=',
			);

		$query->set('meta_query', $meta_query);


	}

	$mkeyword = get_query_var("mkeyword");

	if($mkeyword){
				
		$query->set('s', $mkeyword);

	}


	return $query;

}
