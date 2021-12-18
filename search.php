<?php
/**
* The template for displaying search results pages
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
*
* @package dbstarter-theme
*/

get_header(); ?>

<main id="main" class="site-main">

	<section class="section is-small has-background-light">
		<div class="container">
			<div class="columns">
				<div class="column">
					<h1>Search results for: <?php echo get_search_query(); ?></h1>
				</div>
			</div>
		</div>
	</section>

	<section class="section">
		<div class="container">
			<div class="columns is-multiline">

				<?php
				if ( have_posts() ) : ?>

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

				/**
				* Run the loop for the search to output the results.
				* If you want to overload this in a child theme then include a file
				* called content-search.php and that will be used instead.
				*/
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

		</div>
	</div>
</section>
</main><!-- #main -->

<?php
get_footer();
