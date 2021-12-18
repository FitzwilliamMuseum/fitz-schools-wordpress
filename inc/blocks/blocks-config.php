<?php

// Product Block - Populate ACF Select
function acf_load_products_select_field_choices( $field ) {
  $field['choices'] = array();

  $args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
  );

  $products = new WP_Query( $args );

  if( $products->have_posts() ) {
    foreach( $products->posts as $product ) {
      $value = $product->ID;
      $label = $product->post_title;
      $field['choices'][ $value ] = $product->post_title;
    }
    $field['choices'][ $value ] = $label;
  }

  wp_reset_postdata();
  // append to choices

  return $field;
}

add_filter('acf/load_field/name=products_select', 'acf_load_products_select_field_choices');
