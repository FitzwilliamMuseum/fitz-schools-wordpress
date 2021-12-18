<?php

  $col_one = get_sub_field('column_one');
  $col_two = get_sub_field('column_two');
  ?>

<section class="section is-small block-type-<?php echo get_row_layout(); ?>">
  <div class="container">
    <div class="columns is-centered">
      <div class="column">
        <div class="content">
          <div class="columns is-centered">
            <div class="column is-6">
              <?php echo $col_one; ?>
            </div>
            <div class="column is-6">
              <?php echo $col_two; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
