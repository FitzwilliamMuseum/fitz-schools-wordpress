<?php

  $heading = get_sub_field('heading');
  $subheading = get_sub_field('subheading');
  $accordion = get_sub_field('accordion');
  ?>

<section class="section is-small block-type-<?php echo get_row_layout(); ?>">
  <div class="container">
    <div class="columns is-centered">
      <div class="column">
        <?php if( $heading['heading'] || $subheading ) { ?>
          <div class="columns">
            <div class="column">
              <?php
                echo ( $heading ? '<' . $heading['heading_size'] . '>' . $heading['heading'] . '</' . $heading['heading_size'] . '>' : false);
                echo ( $subheading ? '<p class="subheading">' . $subheading . '</p>' : false );
                ?>
            </div>
          </div>
        <?php } ?>
        <?php
        if( $accordion ) {
          $acc_count = 0;
          echo '<div class="columns">';
            echo '<div class="column">';
              echo '<div class="accordion">';
                foreach ($accordion as $acc) {
                  echo '<div class="accordion-title has-background-black has-text-white" data-accordion="acc' . $acc_count . '">' . $acc['title'] . '</div>';
                  echo '<div class="accordion-content" id="acc' . $acc_count . '">';
                    foreach ( $acc['content'] as $content ) {
                      if( $content['acf_fc_layout'] === 'text' ) {
                        echo wpautop($content['text']);
                      }
                      if( $content['acf_fc_layout'] === 'text_with_image' ) {
                        echo '<div class="columns is-vcentered accordion-text-with-image image-' . $content['image_position'] . '">';
                          echo '<div class="column is-8">';
                            echo wpautop($content['text']);
                          echo '</div>';
                          echo '<div class="column is-4 image">';
                            echo wp_get_attachment_image($content['image']['ID'], 'full');
                          echo '</div>';
                        echo '</div>';
                      }
                      if( $content['acf_fc_layout'] === 'text_two_column' ) {
                        echo '<div class="columns">';
                          echo '<div class="column is-6">';
                            echo wpautop($content['column_one']);
                          echo '</div>';
                          echo '<div class="column is-6">';
                            echo wpautop($content['column_two']);
                          echo '</div>';
                        echo '</div>';
                      }
                      if( $content['acf_fc_layout'] === 'accordion' ) {
                        $sub_acc_count = 0;
                        echo '<div class="sub-accordion">';
                          foreach ( $content['accordion'] as $sub_acc ) {
                            echo '<div class="sub-accordion-title has-background-black has-text-white" data-accordion="sub-acc' . $sub_acc_count . '">' . $sub_acc['title'] . '</div>';
                            echo '<div class="sub-accordion-content" id="sub-acc' . $sub_acc_count . '">';
                              echo $sub_acc['content'];
                            echo '</div>';
                            $sub_acc_count++;
                          }
                        echo '</div>';
                      }
                    }
                  echo '</div>';
                  $acc_count++;
                }
              echo '</div>';
            echo '</div>';
          echo '</div>';
        }
        ?>
      </div>
    </div>
  </div>
</section>
