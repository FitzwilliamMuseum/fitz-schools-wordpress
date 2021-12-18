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

  <section class="section is-small has-background-white">
    <div class="container">
      <div class="columns is-centered">
        <div class="column is-12">
          <?php if ( has_post_thumbnail() ) {
            // echo '<div class="single-post-image">';
            //   echo the_post_thumbnail();
            // echo '</div>';
          } ?>

          <h1><?php echo get_the_title(); ?></h1>
          <!-- <p><?php // echo get_the_date(); ?></p> -->
          <?php
          $content_types = get_object_term_cache( $post->ID, 'content-type' );
          $subjects = get_object_term_cache( $post->ID, 'subject' );
          $ages = get_object_term_cache( $post->ID, 'age' );
          echo '<div class="tags">';
          if( $content_types ) {
            foreach( $content_types as $content_type ) {
              echo '<a href="' . get_site_url() . '/content-type/' . $content_type->slug . '" class="tag is-black">' . $content_type->name . '</a>';
            }
          }
          if( $subjects ) {
            foreach( $subjects as $subject ) {
              echo '<a href="' . get_site_url() . '/subject/' . $subject->slug . '" class="tag is-black">' . $subject->name . '</a>';
            }
          }
          if( $ages ) {
            foreach( $ages as $age ) {
              echo '<a href="' . get_site_url() . '/age/' . $age->slug . '" class="tag is-black">' . $age->name . '</a>';
            }
          }
          if( $tags = get_the_tags() ) {
            foreach( $tags as $tag ) {
              echo '<a href="' . get_site_url() . '/tag/' . $tag->slug . '" class="tag">' . $tag->name . '</a>';
            }
          }
          echo '</div>';
          ?>
        </div>
      </div>
    </div>
  </section>

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
