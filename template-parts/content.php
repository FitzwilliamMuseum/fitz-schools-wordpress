<?php
/**
* Template part for displaying posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package dbstarter-theme
*/

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>

	<?php if ( has_post_thumbnail() ) {
		echo '<div class="single-post-image">';
		echo the_post_thumbnail();
		echo '</div>';
	} ?>

	<div class="entry-content">
		<?php

		get_template_part( 'template-parts/blocks' );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dbstarter-theme' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
