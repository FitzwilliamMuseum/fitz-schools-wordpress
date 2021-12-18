<?php
  // Image Position
  $image_position = get_sub_field('image_position');
  if ( $image_position == 'left' ) {
    $alignment = 'has-image-left';
  } else {
    $alignment = false;
  }

  $content = get_sub_field('content');
  $image = get_sub_field('image');
  ?>

<section class="section is-small block-type-<?php echo get_row_layout() . ' ' . $alignment; ?>">
  <div class="container">
    <div class="columns is-desktop is-vcentered">
      <?php if( $image ) {
        echo '<div class="column is-6-desktop content-holder">';
          echo '<div class="content">';
            echo $content;
          echo '</div>';
        echo '</div>';
      } ?>
      <?php if( $image ) {
        echo '<div class="column is-6-desktop image-holder">';
          echo '<div class="image">';
            echo wp_get_attachment_image($image['ID'], 'large');
          echo '</div>';
        echo '</div>';
      } ?>
    </div>
  </div>
</section>
