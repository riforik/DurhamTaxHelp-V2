<?php

/**
 * Register a custom post type called "location".
 *
 * @see get_post_type_labels() for label keys.
 */
function custom_post_type_init() {
    $labels = array(
        'name'                  => _x( 'Locations', 'Post type general name', 'durhamtaxhelp_v2' ),
        'singular_name'         => _x( 'Location', 'Post type singular name', 'durhamtaxhelp_v2' ),
        'menu_name'             => _x( 'Locations', 'Admin Menu text', 'durhamtaxhelp_v2' ),
        'name_admin_bar'        => _x( 'Location', 'Add New on Toolbar', 'durhamtaxhelp_v2' ),
        'add_new'               => __( 'Add New', 'durhamtaxhelp_v2' ),
        'add_new_item'          => __( 'Add New Location', 'durhamtaxhelp_v2' ),
        'new_item'              => __( 'New Location', 'durhamtaxhelp_v2' ),
        'edit_item'             => __( 'Edit Location', 'durhamtaxhelp_v2' ),
        'view_item'             => __( 'View Location', 'durhamtaxhelp_v2' ),
        'all_items'             => __( 'All Locations', 'durhamtaxhelp_v2' ),
        'search_items'          => __( 'Search Locations', 'durhamtaxhelp_v2' ),
        'parent_item_colon'     => __( 'Parent Locations:', 'durhamtaxhelp_v2' ),
        'not_found'             => __( 'No locations found.', 'durhamtaxhelp_v2' ),
        'not_found_in_trash'    => __( 'No locations found in Trash.', 'durhamtaxhelp_v2' ),
       // 'featured_image'        => _x( 'Location Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'durhamtaxhelp_v2' ),
        //'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'durhamtaxhelp_v2' ),
       // 'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'durhamtaxhelp_v2' ),
       // 'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'durhamtaxhelp_v2' ),
        'archives'              => _x( 'Location archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'durhamtaxhelp_v2' ),
        'insert_into_item'      => _x( 'Insert into location', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'durhamtaxhelp_v2' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this location', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'durhamtaxhelp_v2' ),
        'filter_items_list'     => _x( 'Filter locations list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'durhamtaxhelp_v2' ),
        'items_list_navigation' => _x( 'Locations list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'durhamtaxhelp_v2' ),
        'items_list'            => _x( 'Locations list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'durhamtaxhelp_v2' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'locations' ), // added an s on end of location to make the slug plural
        'capability_type'    => 'post',
        //'has_archive'        => true, we're using a WP query to pull the info in so we can leave has_archive as false
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );
 
    register_post_type( 'location', $args );
}
 
add_action( 'init', 'custom_post_type_init' );