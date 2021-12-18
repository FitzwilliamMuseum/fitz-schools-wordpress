<?php
/**
* The template for displaying archive pages ===== OLD
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package dbstarter-theme
*/

get_header();

$title = get_queried_object()->name;
$current_term = get_queried_object()->term_id;
$current_name = get_queried_object()->name;
$current_parent = get_queried_object()->parent;
?>

<main id="main" class="site-main">
	<?php
	if ( have_posts() ) : ?>
	<section class="section has-background-light">
		<div class="container">
			<div class="columns">
				<div class="column">
					<h1><?php echo $title; ?></h1>

					<?php echo the_archive_description(); ?>
				</div>
			</div>
		</div>
	</section>

	<section class="section">
		<div class="container">
			<div class="columns is-multiline" id="articles">
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

				/*
				* Include the Post-Format-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Format name) and that will be used instead.
				*/
				get_template_part( 'template-parts/content-category', get_post_format() );

			endwhile; ?>
		</div>
	</div>
</section>

<div class="post-pagination container is-centered" role="navigation" aria-label="pagination">
	<span class="previous"><?php previous_posts_link( 'Previous' ); ?></span>
	<span class="next"><?php next_posts_link( 'Next', '' ); ?></span>
	<?php
	the_posts_pagination( array(
		'screen_reader_text' => ' ',
		'mid_size'  => 1,
		'prev_next'          => false,
		'type' => 'list',
	) );
	?>
</div>

<?php
else :
	get_template_part( 'template-parts/content', 'none' );
endif; ?>

</main><!-- #main -->

<?php
get_footer();
