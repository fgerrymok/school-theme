<?php
function sc_register_custom_post_types() {
    // Register CPT for students
    $labels = array(
        'name'               => _x( 'Students', 'post type general name' ),
        'singular_name'      => _x( 'Student', 'post type singular name'),
        'menu_name'          => _x( 'Students', 'admin menu' ),
        'name_admin_bar'     => _x( 'Student', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'student' ),
        'add_new_item'       => __( 'Add New Student' ),
        'new_item'           => __( 'New Student' ),
        'edit_item'          => __( 'Edit Student' ),
        'view_item'          => __( 'View Student' ),
        'all_items'          => __( 'All Students' ),
        'search_items'       => __( 'Search Students' ),
        'parent_item_colon'  => __( 'Parent Students:' ),
        'not_found'          => __( 'No students found.' ),
        'not_found_in_trash' => __( 'No students found in Trash.' ),
        'archives'           => __( 'Student Archives'),
        'insert_into_item'   => __( 'Insert into student'),
        'uploaded_to_this_item' => __( 'Uploaded to this student'),
        'filter_item_list'   => __( 'Filter students list'),
        'items_list_navigation' => __( 'Students list navigation'),
        'items_list'         => __( 'Students list'),
        'featured_image'     => __( 'Student featured image'),
        'set_featured_image' => __( 'Set student featured image'),
        'remove_featured_image' => __( 'Remove student featured image'),
        'use_featured_image' => __( 'Use as featured image'),
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
        'rewrite'            => array( 'slug' => 'students' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-id',
        'supports'           => array( 'title', 'thumbnail', 'editor' ), // check
        // Adding Block editor
        'template' => array(
            array( 'core/paragraph'),
            array( 'core/button' ),
        ),
        'template_lock'      => 'all'
    );
    register_post_type( 'sc-student', $args );

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

function sc_register_taxonomies() {
    // Add Student Specialty taxonomy
    $labels = array(
        'name'              => _x( 'Student Specialties', 'taxonomy general name' ),
        'singular_name'     => _x( 'Student Specialty', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Student Specialties' ),
        'all_items'         => __( 'All Student Specialty' ),
        'parent_item'       => __( 'Parent Student Specialty' ),
        'parent_item_colon' => __( 'Parent Student Specialty:' ),
        'edit_item'         => __( 'Edit Student Specialty' ),
        'view_item'         => __( 'Vview Student Specialty' ),
        'update_item'       => __( 'Update Student Specialty' ),
        'add_new_item'      => __( 'Add New Student Specialty' ),
        'new_item_name'     => __( 'New Student Specialty Name' ),
        'menu_name'         => __( 'Student Specialty' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'student-specialties' ),
    );
    register_taxonomy( 'sc-student-specialty', array( 'sc-student' ), $args );

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
add_action( 'init', 'sc_register_taxonomies');


function sc_rewrite_flush() {
    sc_register_custom_post_types();
    sc_register_taxonomies();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'sc_rewrite_flush' );