<?php

/**
 * Plugin Name: Taxonomy Plugin
 * Author: Hawana Tamang
 * Description: This is a taxonomy plugin
 * Version: 1.0.0
 */


if (!function_exists('create_event_taxonomy')) {
    function create_event_taxonomy()
    {
        $labels = array(
            'name' => _x('Event Categories', 'Taxonomy General Name', 'textdomain'),
            'singular_name' => _x('Event Category', 'Taxonomy Singular Name', 'textdomain'),
            'menu_name' => _x('Event Categories', 'textdomain'),
            'all_items' => _x('All Categories', 'textdomain'),
            'parent_items' => _x('Parent Category', 'textdomain'),
            'parent_item_colon' => __('Parent Category:', 'textdomain'),
            'new_item_name' => __('New Category Name', 'textdomain'),
            'add_new_item' => __('Add New Category', 'textdomain'),
            'edit_item' => __('Edit Category', 'textdomain'),
            'update_item' => __('Update Category', 'textdomain'),
            'view_item' => __('View Category', 'textdomain'),
            'separate_items_with_commas' => __('Separate categories with commas', 'textdomain'),
            'add_or_remove_items' => __('Add or remove categories', 'textdomain'),
            'choose_from_most_used' => __('Choose from the most used', 'textdomain'),
            'popular_items' => __('Popular Categories', 'textdomain'),
            'search_items' => __('Search Categories', 'textdomain'),
            'not_found' => __('Not Found', 'textdomain'),
            'no_terms' => __('No categories', 'textdomain'),
            'items_list' => __('Categories List', 'textdomain'),
            'items_list_navigation' => __('Categories list navigation', 'textdomain'),
        );
        $args = array(
            'labels' => $labels,
            'hierarchical' => true,
            'public' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => false,
            'show_tagcloud' => false,
        );
        register_taxonomy('event_category', array('event'), $args);
    }
    add_action('init', 'create_event_taxonomy', 0);
}
