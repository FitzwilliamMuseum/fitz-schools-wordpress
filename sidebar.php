<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dbstarter-theme
 */

if ( ! is_active_sidebar( 'page-sidebar' ) ) {
	return;
}
?>

<div id="page-sidebar" class="column is-3-desktop is-4-tablet sidebar widget-area" role="complementary">
	<?php dynamic_sidebar( 'page-sidebar' ); ?>
</div>
