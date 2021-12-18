<?php
  $heading = get_sub_field('heading');
  $subheading = get_sub_field('subheading');
  $videos = get_sub_field('videos');
  ?>

<section class="section is-small block-type-<?php echo get_row_layout(); ?>">
  <div class="container">
    <?php if( $heading['heading'] || $subheading ) { ?>
    <div class="columns">
      <div class="column is-8">
        <?php
          echo ( $heading ? '<' . $heading['heading_size'] . '>' . $heading['heading'] . '</' . $heading['heading_size'] . '>' : false);
          echo ( $subheading ? '<p class="subheading">' . $subheading . '</p>' : false);
          ?>
      </div>
    </div>
    <?php } ?>
    <div class="columns">
      <?php if ($videos) {
        foreach ($videos as $video) {
          echo '<div class="column">';
            echo $video['video'];
          echo '</div>';
        }
      } ?>
    </div>
  </div>
</section>
