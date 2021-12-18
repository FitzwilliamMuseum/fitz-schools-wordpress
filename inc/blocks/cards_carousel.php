<?php
  $heading = get_sub_field('heading');
  $subheading = get_sub_field('subheading');
  $cards = get_sub_field('cards');
  ?>

<section class="section is-small block-type-<?php echo get_row_layout(); ?>">
  <div class="container">
    <?php if( $heading['heading'] ) { ?>
      <div class="columns">
        <div class="column is-6">
          <?php
            echo ( $heading ? '<' . $heading['heading_size'] . '>' . $heading['heading'] . '</' . $heading['heading_size'] . '>' : false);
            echo ( $subheading ? '<p class="subheading">' . $subheading . '</p>' : false );
            ?>
        </div>
      </div>
    <?php } ?>
    <?php
      if( $cards ) {
        echo '<div class="columns is-centered">';
          echo '<div class="column is-12">';
            echo '<div class="columns">';
              echo '<div class="column cards cards-carousel">';
              foreach( $cards as $card ) {
                echo '<div class="card">';
                  if ( $card['image'] ) {
                    echo '<div class="card-image">';
                      echo '<figure class="image">';
                        if( $card['link']['url'] ) {
                          echo '<a href="' . $card['link']['url'] . '">' . wp_get_attachment_image($card['image']['ID'], 'thumbnail') . '</a>';
                        } elseif ( $card['card_type'] === 'video' && $card['video'] ) {
                          echo '<span class="tag is-black">Video</span>';
                          echo '<a href="https://youtu.be/' . $card['video'] . '" data-fancybox="module-cards" data-caption="' . $card['image']['caption'] . '">' . wp_get_attachment_image($card['image']['ID'], 'thumbnail') . '</a>';
                        } elseif ( $card['image'] ) {
                          echo '<a href="' . $card['image']['url'] . '" data-fancybox="module-cards" data-caption="' . $card['image']['caption'] . '">' . wp_get_attachment_image($card['image']['ID'], 'thumbnail') . '</a>';
                        }
                      echo '</figure>';
                    echo '</div>';
                  }
                  echo '<div class="card-content has-background-white">';
                    echo '<div class="content">';
                      echo ( $card['title'] ? '<h4 class="has-text-weight-semibold">' . $card['title'] . '</h4>' : false);
                      echo ( $card['content'] ? '<p>' . $card['content'] . '</p>' : false);
                      echo '<div class="buttons">';
                        if( $card['link']['url'] ) {
                          echo '<a href="' . $card['link']['url'] . '" class="button is-dark is-small has-text-weight-semibold">' . $card['link']['text'] . '</a>';
                        } elseif ( $card['card_type'] === 'image' && $card['image'] ) {
                          echo '<a href="' . $card['image']['url'] . '" class="button is-dark is-small has-text-weight-semibold" data-fancybox="module-cards" data-caption="' . $card['image']['caption'] . '">' . $card['link']['text'] . '</a>';
                        } elseif ( $card['card_type'] === 'video' && $card['video'] ) {
                          echo '<a href="https://youtu.be/' . $card['video'] . '" class="button is-dark is-small has-text-weight-semibold" data-fancybox="module-cards">' . $card['link']['text'] . '</a>';
                        }
                        if ( $card['card_type'] === 'image' && $card['image'] && $card['external'] ) {
                          echo ( $card['image'] ? '<a href="' . wp_get_attachment_image_url($card['image']['ID'], 'full') . '" class="button is-dark is-outlined is-small has-text-weight-semibold" target="_blank"><i class="fas fa-external-link-alt"></i></a>' : '' );
                        } elseif ( $card['card_type'] === 'video' && $card['video'] && $card['external'] ) {
                          echo ( $card['video'] ? '<a href="https://youtu.be/' . $card['video'] . '" class="button is-dark is-outlined is-small has-text-weight-semibold" target="_blank"><i class="fas fa-external-link-alt"></i></a>' : '' );
                        }
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
