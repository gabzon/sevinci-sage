<?php
// Register Custom Post Type
function phase_post_type() {

	$labels = array(
		'name'                => _x( 'Phases', 'Post Type General Name', 'roots' ),
		'singular_name'       => _x( 'Phase', 'Post Type Singular Name', 'roots' ),
		'menu_name'           => __( 'Phases', 'roots' ),
		'parent_item_colon'   => __( 'Parent Phase:', 'roots' ),
		'all_items'           => __( 'All Phases', 'roots' ),
		'view_item'           => __( 'View Phase', 'roots' ),
		'add_new_item'        => __( 'Add Phase Item', 'roots' ),
		'add_new'             => __( 'Add New', 'roots' ),
		'edit_item'           => __( 'Edit Phase', 'roots' ),
		'update_item'         => __( 'Update Phase', 'roots' ),
		'search_items'        => __( 'Search Phase', 'roots' ),
		'not_found'           => __( 'Not found', 'roots' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'roots' ),
	);
	$rewrite = array(
		'slug'                => 'phase',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'phase', 'roots' ),
		'description'         => __( 'Phases of any innovation project or business strategy', 'roots' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'page-attributes', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-share-alt',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'phase', $args );

}

// Hook into the 'init' action
add_action( 'init', 'phase_post_type', 2 );
