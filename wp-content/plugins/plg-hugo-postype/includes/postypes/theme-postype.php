<?php
if ( function_exists('add_theme_support') ) {
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'nav_menus' );
    add_theme_support( 'excerpt', array( 'post' ) );
    // add_post_type_support( 'product', 'page-attributes' );
}

if (function_exists('add_post_type_support')) {
    add_post_type_support( 'post', 'excerpt' );
}

if (function_exists('add_action')) {
    add_action('init', 'album_post_type');
    add_action('init', 'member_post_type');
}

// Post type about
function album_post_type()
{
    $labels = array(
        'name' => _x('Album', 'post type general name', 'beautheme'),
        'singular_name' => _x('Album', 'post type singular name', 'beautheme'),
        'add_new' => _x('Add New', 'album', 'beautheme'),
        'add_new_item' => __('Add New album', 'beautheme'),
        'edit_item' => __('Edit album', 'beautheme'),
        'new_item' => __('New album', 'beautheme'),
        'all_items' => __('All album', 'beautheme'),
        'view_item' => __('View album', 'beautheme'),
        'search_items' => __('Search album', 'beautheme'),
        'not_found' =>  __('No partner Found', 'beautheme'),
        'not_found_in_trash' => __('No album Found in Trash', 'beautheme'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_icon' => 'dashicons-album',
        'rewrite' => array('slug' => 'album-music', 'with_front' => false),
        'query_var' => true,
        'show_in_nav_menus'=> false,
        'supports' => array('title', 'thumbnail','editor','page-attributes','excerpt')
    );
    register_post_type( 'album' , $args );
}


function album_taxonomy() {
    register_taxonomy(
        'album_category',
        'album',
        array(
            'hierarchical' => true,
            'label' => __('Music type','beautheme'),
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'album-category',
                'with_front' => false
            )
        )
    );
}
add_action( 'after_setup_theme', 'album_taxonomy');


// Post type member
function member_post_type()
{
    $labels = array(
        'name' => _x('Member', 'post type general name', 'beautheme'),
        'singular_name' => _x('Member', 'post type singular name', 'beautheme'),
        'add_new' => _x('Add New', 'member', 'beautheme'),
        'add_new_item' => __('Add New member', 'beautheme'),
        'edit_item' => __('Edit member', 'beautheme'),
        'new_item' => __('New member', 'beautheme'),
        'all_items' => __('All member', 'beautheme'),
        'view_item' => __('View member', 'beautheme'),
        'search_items' => __('Search member', 'beautheme'),
        'not_found' =>  __('No partner Found', 'beautheme'),
        'not_found_in_trash' => __('No member Found in Trash', 'beautheme'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => false,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_icon' => 'dashicons-businessman',
        'rewrite' => array('slug' => 'member', 'with_front' => false),
        'query_var' => true,
        'show_in_nav_menus'=> false,
        'supports' => array('title', 'thumbnail','page-attributes')
    );
    register_post_type( 'member' , $args );
}


function beau_show_member_image(){
    remove_meta_box( 'postimagediv', 'Members', 'member' );
    add_meta_box('postimagediv', __('Avatar','beautheme'), 'post_thumbnail_meta_box', 'member', 'normal', 'high');
}
add_action('do_meta_boxes','beau_show_member_image');
?>