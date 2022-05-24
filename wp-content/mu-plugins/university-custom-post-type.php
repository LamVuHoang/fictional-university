<?php
function create_post_type()
{
    //=========== EVENT POST TYPE =================
    register_post_type(
        'event',
        [
            'labels' => [
                'name' => 'Event',
                'singular_name' => 'Event',
                'all_items' => 'All Events',
                'view_item' => 'View Event',
                'add_new_item' => 'Add New Event',
                'edit_item' => 'Edit Event',
                'update_item' => 'Update Event',
            ],
            'public' => true,
            'has_archive' => true,
            'show_in_admin_bar' => true,
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-calendar-alt',
            'supports' => ['title', 'author', 'excerpt', 'comments', 'editor', 'custom-fields']
        ]
    );

    //=========== EVENT SUBJECT TYPE =================
    register_post_type(
        'subject',
        [
            'labels' => [
                'name' => 'Subject',
                'singular_name' => 'Subject',
                'all_items' => 'All Subjects',
                'view_item' => 'View Subject',
                'add_new_item' => 'Add New Subject',
                'edit_item' => 'Edit Subject',
                'update_item' => 'Update Subject',
            ],
            'public' => true,
            'has_archive' => true,
            'show_in_admin_bar' => true,
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-book',
            'supports' => ['title', 'author', 'excerpt', 'comments', 'editor', 'custom-fields']
        ]
    );

    //=========== MEMBER SUBJECT TYPE =================
    register_post_type(
        'member',
        [
            'labels' => [
                'name' => 'Member',
                'singular_name' => 'Member',
                'all_items' => 'All Members',
                'view_item' => 'View Member',
                'add_new_item' => 'Add New Member',
                'edit_item' => 'Edit Member',
                'update_item' => 'Update Member',
            ],
            'public' => true,
            'has_archive' => true,
            'show_in_admin_bar' => true,
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-businessman',
            'supports' => ['title', 'author', 'excerpt', 'comments', 'editor', 'custom-fields']
        ]
    );
}
add_action('init', 'create_post_type');
