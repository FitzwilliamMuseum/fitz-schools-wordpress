<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dbstarter-theme
 */

get_header(); ?>

<main id="main" class="site-main">

	<?php
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	if ( has_custom_logo() ) {
		$thumbnail = ( has_post_thumbnail() ? 'style="background-image: url(' . get_the_post_thumbnail_url() . ');"' : '' );
		echo '<section class="section has-background-dark page-hero" ' . $thumbnail . '>';
			echo '<div class="container">';
				echo '<div class="columns">';
					echo '<div class="column">';
						echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '" />';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</section>';
		echo '<section class="section is-small has-background-white">';
			echo '<div class="container">';
				echo '<div class="columns">';
					echo '<div class="column has-text-centered">';
						echo '<h1>'. get_the_title() .'</h1>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</section>';
	}
	?>

	<?php
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', 'page' );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
get_footer();
