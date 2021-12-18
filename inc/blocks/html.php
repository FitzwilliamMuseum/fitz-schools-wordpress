<?php
  $content = get_sub_field('content');
  ?>

<section class="section is-small block-type-<?php echo get_row_layout(); ?>">
  <div class="container">
    <div class="columns is-centered">
      <div class="column">
        <?php echo $content; ?>
      </div>
    </div>
  </div>
</section>
