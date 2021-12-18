<?php

// Creating Post Type
function post_type_modules() {
  register_post_type( 'modules',
  array(
    'labels' => array(
      'name'          => __( 'Modules' ),
      'singular_name' => __( 'Module' ),
      'all_items'     => __( 'All Modules' ),
    ),
    'public'              => true,
    'publicly_queryable'  => true  ,
    'has_archive'         => true,
    // 'rewrite' => array('slug' => 'module'),
    'show_in_rest'        => true,
    'menu_icon'           => 'dashicons-list-view',
    'supports'            => array( 'title', 'editor', 'thumbnail' ),
    'taxonomies'          => array( 'post_tag' ),
    'capability_type'     => 'post',
  )
);
flush_rewrite_rules();
}
add_action( 'init', 'post_type_modules' );

// Fix selected terms hierarchy
function terms_hierarchy($args) {
  if( $args['taxonomy'] == 'key-stage'){
    $args['checked_ontop'] = false;
  }
  return $args;
}
add_filter('wp_terms_checklist_args','terms_hierarchy');

// Adding Post Type to Tags
function modules_tags( $query ) {
  if ( $query->is_tag() && $query->is_main_query() ) {
    $query->set( 'post_type', array( 'post', 'modules' ) );
  }
}
add_action( 'pre_get_posts', 'modules_tags' );
