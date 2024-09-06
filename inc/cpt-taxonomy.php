<?php
function sc_register_custom_post_types() {
    
    // Register Staff CPT
    $labels = array(
        'name'                  => _x( 'Staff', 'post type general name' ),
        'singular_name'         => _x( 'Staff', 'post type singular name'),
        'menu_name'             => _x( 'Staff', 'admin menu' ),
        'name_admin_bar'        => _x( 'Staff', 'add new on admin bar' ),
        'add_new'               => _x( 'Add New', 'staff' ),
        'add_new_item'          => __( 'Add New Staff' ),
        'new_item'              => __( 'New Staff' ),
        'edit_item'             => __( 'Edit Staff' ),
        'view_item'             => __( 'View Staff' ),
        'all_items'             => __( 'All Staff' ),
        'search_items'          => __( 'Search Staff' ),
        'parent_item_colon'     => __( 'Parent Staff:' ),
        'not_found'             => __( 'No staff found.' ),
        'not_found_in_trash'    => __( 'No staff found in Trash.' ),
        'archives'              => __( 'Staff Archives'),
        'insert_into_item'      => __( 'Insert into staff'),
        'uploaded_to_this_item' => __( 'Uploaded to this staff'),
        'filter_item_list'      => __( 'Filter staff list'),
        'items_list_navigation' => __( 'Staff list navigation'),
        'items_list'            => __( 'Staff list'),
        'featured_image'        => __( 'Staff featured image'),
        'set_featured_image'    => __( 'Set staff featured image'),
        'remove_featured_image' => __( 'Remove staff featured image'),
        'use_featured_image'    => __( 'Use as featured image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'staff' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-archive',
        'supports'           => array( 'title' ),
    );

    register_post_type( 'sc-staff', $args );
}
add_action( 'init', 'sc_register_custom_post_types' );

function sc_register_custom_taxonomies () {

    // Add Roles taxonomy
    $labels = array(
        'name'              => _x( 'Roles', 'taxonomy general name' ),
        'singular_name'     => _x( 'Role', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Roles' ),
        'all_items'         => __( 'All Roles' ),
        'parent_item'       => __( 'Parent Role' ),
        'parent_item_colon' => __( 'Parent Role:' ),
        'edit_item'         => __( 'Edit Roles' ),
        'update_item'       => __( 'Update Roles' ),
        'add_new_item'      => __( 'Add New Role' ),
        'new_item_name'     => __( 'New Work Role' ),
        'menu_name'         => __( 'Roles' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'roles' ),
    );

    register_taxonomy( 'sc-roles', array( 'sc-staff' ), $args );
}
add_action( 'init', 'sc_register_custom_taxonomies' );