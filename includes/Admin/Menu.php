<?php

namespace WPD_Team\Admin;

/**
 * The Main Menu Class
 */
class Menu {
    public function __construct() {

    }

    public function wpd_register_post_type() {

        $args = array(
            'labels'          => [
                'name'               => 'WPD All Team Members',
                'singular_name'      => 'Team',
                'description'        => 'Display team member',
                'menu_name'          => 'WPD Teams',
                'add_new'            => 'Add New Member',
                'add_new_item'       => 'Add New Member',
                'edit_item'          => 'Edit Member',
                'new_item'           => 'New Member',
                'view_item'          => 'View Member',
                'view_items'         => 'View Members',
                'search_items'       => 'Search team member',
                'not_found'          => 'No member found',
                'not_found_in_trash' => 'No member found in trash',
            ],
            'public'          => true,
            'has_archive'     => true,
            'hierarchical'    => true,
            'rewrite'         => array( 'slug' => 'team' ),
            'capability_type' => 'post',
            'menu_position'   => 5,
            'supports'        => array( 'title', 'editor', 'thumbnail' ),
            'menu_icon'       => 'dashicons-admin-users',
            'show_in_rest'    => true,
            'taxonomies'      => array( 'team_category' ),

        );

        register_post_type( 'wpd_team', $args );
    }

    public function wpd_register_taxonomy() {

        $labels = array(
            'name'              => _x( 'Team Categories', 'wpd_team' ),
            'singular_name'     => _x( 'Team Category', 'wpd_team' ),
            'search_items'      => __( 'Search Team Categories', 'wpd_team' ),
            'all_items'         => __( 'All Team Categories', 'wpd_team' ),
            'view_item'         => __( 'View Team Category', 'wpd_team' ),
            'parent_item'       => __( 'Parent Team Category', 'wpd_team' ),
            'parent_item_colon' => __( 'Parent Team Category:', 'wpd_team' ),
            'edit_item'         => __( 'Edit Team Category', 'wpd_team' ),
            'update_item'       => __( 'Update Team Category', 'wpd_team' ),
            'add_new_item'      => __( 'Add New Team Category', 'wpd_team' ),
            'new_item_name'     => __( 'New Team Category Name', 'wpd_team' ),
            'not_found'         => __( 'No Team Categories Found', 'wpd_team' ),
            'back_to_items'     => __( 'Back to Team Categories', 'wpd_team' ),
            'menu_name'         => __( 'Team Categories', 'wpd_team' ),
        );

        $args = array(
            'labels'            => $labels,
            'hierarchical'      => true,
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'team-category' ),
            'show_in_rest'      => true,
        );

        register_taxonomy( 'team_category', array( 'wpd_team' ), $args );
    }

}