<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package dbstarter-theme
 */

get_header(); ?>


<main id="main" class="site-main">
	<?php
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', get_post_type() );

		?>

		<?php
			$post_navigation = get_field('post_navigation');
			if( $post_navigation ) {
				echo '<section class="section">';
					echo '<div class="container">';
						echo '<div class="columns">';
							echo '<div class="column">';
								echo '<nav class="post-navigation">';
									if ( $post_navigation['previous_link'] ) {
										echo '<div class="prev-link">';
											echo '<a href="' . $post_navigation['previous_link']['url'] . '"><i class="fas fa-chevron-left"></i> ' . $post_navigation['previous_link']['title'] . '</a>';
										echo '</div>';
									}
									if ( $post_navigation['next_link'] ) {
										echo '<div class="next-link">';
											echo '<a href="' . $post_navigation['next_link']['url'] . '">' . $post_navigation['next_link']['title'] . ' <i class="fas fa-chevron-right"></i></a>';
										echo '</div>';
									}
								echo '</nav>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</section>';
			}
		?>

		<?php

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>
</main><!-- #main -->


<?php
get_footer();
