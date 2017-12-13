<?php
$title = $show_feature = $description = $category = $perpage = $show_pagging = $show_type = $show_sidebar = $category_slug = '';
extract(shortcode_atts(array(
    'title'         => '',
    'description'   => '',
    'category'      => 'no',
    'perpage'       => '15',
    'show_pagging'  => '0',
    'show_type'     => 'list-grid', //Or standard, slide
    'show_sidebar'  => '0',
    'show_feature'  => '',
    'category_slug'     => '',
), $atts));
global $beau_option;
$paged = get_query_var('paged') ? get_query_var('paged') : 1;


if ($show_feature != 'on') {
    $args = array(
        'post_type' => 'post',
        'meta_query' => array(
        array(
          'key' => '_beautheme_show_gallery',
          'value' => null,
          'compare' => 'NOT EXISTS'
        )
      ),
        'category_name' => $category_slug,
        'posts_per_page' => $perpage,
        'paged' => $paged,
    );
}else{
  $args = array(
        'post_type' => 'post',
        'posts_per_page' => $perpage,
        'paged' => $paged,
        'category_name' => $category_slug,
        'meta_query' => array(
        array(
            'key' => '_beautheme_feature_post',
            'value' => 'on',
            'compare' => '='
        ),
        array(
            'key' => '_beautheme_show_gallery',
            'value' => null,
            'compare' => 'NOT EXISTS'
      )
    ),
  );
}

$loop = new WP_Query( $args);
wp_reset_postdata();
include(get_template_directory().'/selekon/post-'.$show_type.'.php');
?>