<?php
  $heading = get_sub_field('heading');
  $subheading = get_sub_field('subheading');
  $link = get_sub_field('link');
  $modules = get_sub_field('modules');
  ?>

<section class="section is-small block-type-<?php echo get_row_layout(); ?>">
  <div class="container">
    <?php if( $heading['heading'] || $subheading ) { ?>
    <div class="columns is-centered has-text-centered">
      <div class="column">
        <?php
          echo ( $heading ? '<' . $heading['heading_size'] . '>' . $heading['heading'] . '</' . $heading['heading_size'] . '>' : false);
          echo ( $subheading ? '<p class="subheading">' . $subheading . '</p>' : false);
          echo ( $link ? '<a href="' . $link . '" class="button is-black mt-3">View All</a>' : false);
          ?>
      </div>
    </div>
    <?php } ?>
    <?php
      if( $modules ) {
        echo '<div class="columns is-centered">';
          echo '<div class="column is-12">';
            echo '<div class="columns">';
              echo '<div class="column cards cards-carousel">';
              foreach( $modules as $module ) {
                echo '<div class="card">';
                  if( has_post_thumbnail($module->ID) ) {
                    echo '<div class="card-image">';
                      echo '<figure class="image">';
                        echo '<a href="' . get_the_permalink($module->ID) . '">' . get_the_post_thumbnail($module->ID, 'thumbnail') . '</a>';
                      echo '</figure>';
                    echo '</div>';
                  }
                  echo '<div class="card-content has-background-white">';
                    echo '<div class="content">';
                      echo '<h4>' . $module->post_title . '</h4>';
                      echo '<div class="buttons">';
                        echo '<a href="' . get_the_permalink($module->ID) . '" class="button is-dark is-small has-text-weight-semibold">View</a>';
                      echo '</div>';
                    echo '</div>';
                  echo '</div>';
                echo '</div>';
              }
              echo '</div>';
            echo '</div>';
          echo '</div>';
        echo '</div>';
      }
      ?>
  </div>
</section>
