<?php if(have_rows('blocks')):

  while(have_rows('blocks')): the_row();
    get_template_part('inc/blocks/' . get_row_layout());
  endwhile;

  wp_reset_query();
endif; ?>
