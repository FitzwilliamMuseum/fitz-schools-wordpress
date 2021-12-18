<?php
  $heading = get_sub_field('heading');
  $subheading = get_sub_field('subheading');
  $link = get_sub_field('link');
  $images = get_sub_field('images');
  ?>

<section class="section is-small block-type-<?php echo get_row_layout(); ?>">
  <div class="container">
    <?php if( $heading['heading'] || $subheading ) { ?>
    <div class="columns">
      <div class="column">
        <?php
          echo ( $heading ? '<' . $heading['heading_size'] . '>' . $heading['heading'] . '</' . $heading['heading_size'] . '>' : false);
          echo ( $subheading ? '<p class="subheading">' . $subheading . '</p>' : false);
          echo ( $link ? '<a href="' . $link['url'] . '" class="' . $link['class'] . '">' . $link['text'] . '</a>' : false);
          ?>
      </div>
    </div>
    <?php } ?>
    <div class="columns">
      <div class="column">
        <div class="columns is-centered is-mobile">
          <?php
            if( $images ) {
              foreach ( $images as $image ) {
                echo '<div class="column">';
                  echo wp_get_attachment_image($image['ID'], 'full');
                echo '</div>';
              }
            } ?>
        </div>
      </div>
    </div>
  </div>
</section>
