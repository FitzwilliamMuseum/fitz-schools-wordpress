<?php
/**
* The template for displaying 404 pages (not found)
*
* @link https://codex.wordpress.org/Creating_an_Error_404_Page
*
* @package dbstarter-theme
*/

get_header(); ?>

<main id="main" class="site-main container">
	<section class="section is-mediumn">
		<div class="columns">
			<div class="column is-12">
				<h1>404 Page not found.</h1>
				<br />
				<p><?php esc_html_e( 'It looks like nothing was found at this location, follow the link below to our home page.', 'dbstarter-theme' ); ?></p>
				<br /><br />
				<a href="<?php echo get_site_url(); ?>" class="button is-outlined">Back to home</a>
			</div>
		</div>
	</section>
</main>
<!-- #main -->

<?php
get_footer();
