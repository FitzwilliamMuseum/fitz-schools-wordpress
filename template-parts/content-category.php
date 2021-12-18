<?php
/**
* Template part for displaying posts in category
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
				<?php if( get_field('activity_type') ) {
					echo '<span class="tag is-black">' . get_field('activity_type') . '</span>';
				} ?>
			</a>
			<div class="card-content has-background-white">
				<h3 class="h5 has-text-weight-medium"><?php echo get_the_title(); ?></h3>
				<div class="buttons">
					<a href="<?php the_permalink(); ?>" class="button is-dark is-small">View</a>
				</div>
			</div>
		</div>
	</article>
	<!-- #post-<?php the_ID(); ?> -->
</div>
