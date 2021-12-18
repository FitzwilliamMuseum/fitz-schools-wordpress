<?php
/**
* Template part for displaying results in search pages
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package dbstarter-theme
*/

?>

<div class="column is-3">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="card">
			<a href="<?php the_permalink(); ?>" class="card-image">
				<figure class="image">
					<?php the_post_thumbnail('thumbnail'); ?>
				</figure>
			</a>
			<div class="card-content has-background-white">
				<h3 class="h4 has-text-weight-medium"><?php echo get_the_title(); ?></h3>

				<!-- <p class="blog-excerpt"><?php // echo the_excerpt(); ?></p> -->

				<div class="buttons">
					<a href="<?php the_permalink(); ?>" class="button is-dark is-small">View</a>
				</div>
			</div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
</div>
