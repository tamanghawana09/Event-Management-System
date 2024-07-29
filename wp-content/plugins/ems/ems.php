<?php
    /**
     * Plugin Name: Event Management System
     * Author: Hawana Tamang
     * Description: This is a test event management system
     * Version: 1.0.0
     */

     if(!function_exists('create_ems_cpt')){
        function create_ems_cpt(){
            $labels = array(
                'name' =>_x('Event Management System','Post Type General Name','textdomain'),
                'singular_name' => _x('Event Management System','Post Type Singular Name','textdomain'),
                'menu_name' => __('Event Management System','textdomain'),
                'name_admin_bar'=>__('Event Management System','textdomain'),
                'archives' => __('EMS Archives','textdomain'),
                'attributes' => __('EMS Attributes','textdomain'),
                'parent_item_colon' => __('Parent EMS:','textdomain'),
                'all_items' =>__('All Events','textdomain'),
                'add_new_item' => __('Add New Event','textdomain'),
                'add_new' => __('Add New Event','textdomain'),
                'new_item' => __('New Event','textdomain'),
                'edit_item' => __('Edit Event','textdomain'),
                'update_item' => __('Update Event','textdomain'),
                'view_item' => __('View Event','textdomain'),
                'view_items' => __('View Events','textdomain'),
                'search_items' => __('Search Events','textdomain'),
                'not_found' => __('Not Found','textdomain'),
                'not_found_in_trash' => __('Not found in Trasg','textdomain'),
                'featured_image' => __('Featured Image','textdomain'),
                'set_featured_image' => __('Set featured image','textdomain'),
                'remove_featured_image' => __('Remove featured image','textdomain'),
                'use_featured_image' => __('Use as featured image','textdomain'),
                'insert_into_item' => __('Insert into Event','textdomain'),
                'uploaded_to_this_item' => __('Uploaded to this portfolio','textdomain'),
                'items_list' => __('Events List','textdomain'),
                'items_list_navigation' => __('Events list navigation','textdomain'),
                'filter_items_list' => __('Filter events list','textdomain'),
            );
            $args = array(
                'label' => __('Event Management System','textdomain'),
                'description' => __('Events Custom Post Type','textdomain'),
                'labels' => $labels,
                'supports' => array('title','editor','thumbnail','revisions'),
                'hierarchical' => false,
                'public' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'menu_position' => 5,
                'show_in_admin_bar' =>true,
                'show_in_nav_menus' => true,
                'can_export' => true,
                'has_archive' => true,
                'exclude_from_search' => false,
                'publicly_queryable' =>true,
                'capability_type' => 'post',
            );
            register_post_type('events',$args);
        }

        add_action('init','create_ems_cpt');
     }
    
?>