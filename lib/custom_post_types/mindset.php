<?php

// Register Custom Post Type
function mindset_post_type() {

   $labels = array(
      'name'                => _x( 'Mindsets', 'Post Type General Name', 'roots' ),
      'singular_name'       => _x( 'Mindset', 'Post Type Singular Name', 'roots' ),
      'menu_name'           => __( 'Mindsets', 'roots' ),
      'parent_item_colon'   => __( 'Parent Mindset:', 'roots' ),
      'all_items'           => __( 'All Mindsets', 'roots' ),
      'view_item'           => __( 'View Mindset', 'roots' ),
      'add_new_item'        => __( 'Add New Mindset', 'roots' ),
      'add_new'             => __( 'Add Mindset', 'roots' ),
      'edit_item'           => __( 'Edit Mindset', 'roots' ),
      'update_item'         => __( 'Update Mindset', 'roots' ),
      'search_items'        => __( 'Search Mindset', 'roots' ),
      'not_found'           => __( 'Not found', 'roots' ),
      'not_found_in_trash'  => __( 'Not found in Trash', 'roots' ),
   );
   $rewrite = array(
      'slug'                => 'mindset',
      'with_front'          => true,
      'pages'               => true,
      'feeds'               => true,
   );
   $args = array(
      'label'               => __( 'mindset', 'roots' ),
      'description'         => __( 'List of mindsets needed to innovate', 'roots' ),
      'labels'              => $labels,
      'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', ),
      'taxonomies'          => array( 'category', 'post_tag' ),
      'hierarchical'        => true,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'menu_position'       => 5,
      'menu_icon'           => 'dashicons-smiley',
      'can_export'          => true,
      'has_archive'         => true,
      'exclude_from_search' => false,
      'publicly_queryable'  => true,
      'rewrite'             => $rewrite,
      'capability_type'     => 'page',
   );
   register_post_type( 'mindset', $args );

}

// Hook into the 'init' action
add_action( 'init', 'mindset_post_type', 3 );
