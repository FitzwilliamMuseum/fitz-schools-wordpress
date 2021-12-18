<?php

/**
* Adds custom classes to the array of body classes.
*
* @param array $classes Classes for the body element.
* @return array
*/
function dbstarter_theme_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'dbstarter_theme_body_classes' );

/**
* Add a pingback url auto-discovery header for singularly identifiable articles.
*/
function dbstarter_theme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'dbstarter_theme_pingback_header' );

// Disable Gutenberg
add_filter('use_block_editor_for_post', '__return_false');

// Remove WP version number
remove_action('wp_head', 'wp_generator');

// Remove [...] from excerpt
function wpdocs_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

// Setting excerpt length
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Removing Span tags from CF7
add_filter('wpcf7_form_elements', function($content) {
	$content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
	return $content;
});

// Removing P tagd from CF7
add_filter('wpcf7_autop_or_not', '__return_false');

// Allow SVG upload
add_filter('upload_mimes', 'add_mime_types');
if (!function_exists('add_mime_types')) {
	function add_mime_types($mimes) {
		if( is_admin() ) {
			$mimes['svg'] = 'image/svg+xml';
		}
		return $mimes;
	}
}

// [button][/button]
function button_shortcode( $atts, $content = null ) {
	$a = shortcode_atts( array(
		'link' => '#',
		'icon' => '',
		'target' => '',
	), $atts );
	return '<a href="' . esc_attr($a['link']) . '" class="button is-black' . esc_attr($a['class']) . '" ' . esc_attr($a['target']) . '><i class="' . esc_attr($a['icon']) . '"></i> &nbsp; ' . $content . '</a>';
}
add_shortcode( 'button', 'button_shortcode' );
