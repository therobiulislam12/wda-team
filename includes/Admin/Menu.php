<?php

namespace WPD_Team\Admin;

/**
 * The Main Menu Class
 */
class Menu {
    public function __construct() {
        add_action( 'init', array( $this, 'wpd_register_post_type' ) );
    }

    public function wpd_register_post_type() {

        $args = array(
            'labels'          => [
                'name'               => 'WPD All Team Members',
                'singular_name'      => 'WPD Team Member',
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
            'show_in_rest'    => true,
            'hierarchical'    => true,
            'rewrite'         => array( 'slug' => 'team' ),
            'capability_type' => 'post',
            'menu_position'   => 5,
            'supports'        => array( 'title', 'editor', 'thumbnail' ),
            'menu_icon'       => 'dashicons-admin-users',
        );

        register_post_type( 'wpd-team', $args );
    }
}