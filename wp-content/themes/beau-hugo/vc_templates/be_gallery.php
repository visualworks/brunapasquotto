<?php
$title = $title_align = $perpage = $show_bulet_pagging = $gallery_type = $type_show = $show_pagging = '';
extract(shortcode_atts(array(
    'title'         		=> '',
    'perpage'       		=> '15',
    'show_bulet_pagging'  	=> '1',
    'gallery_type'  		=> 'square', //Or list-grid
    'type_show'  			=> 'all', //Or list-grid
    'title_align'           => 'hugo-center',
    'show_pagging'  		=> 'no',
), $atts));
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$page = get_query_var('page') ? get_query_var('page') : 1;
if ($page > $paged) {
	$paged = $page;
}

if ($type_show=='all') {
	$args = array(
		'post_type' 		=> 'post',
		'posts_per_page' 	=> $perpage,
		'paged' 			=> $paged,
		'post_status' 		=> 'publish',
		'meta_key' 			=> '_beautheme_show_gallery',
		'meta_value' 		=> 'on',
	);
}
if ($type_show=='image') {
	$args = array(
		'post_type' 		=> 'post',
		'posts_per_page' 	=> $perpage,
		'paged' 			=> $paged,
		'post_status' 		=> 'publish',
		'meta_key' 			=> '_beautheme_show_gallery',
		'meta_value' 		=> 'on',
		'tax_query' 		=> array(
	        array(
	            'taxonomy' 	=> 'post_format',
	            'field' 	=> 'slug',
	            'terms' 	=> array( 'post-format-image' )
	        )
	    )
	);
}
if ($type_show=='video') {
	$args = array(
		'post_type' 		=> 'post',
		'posts_per_page' 	=> $perpage,
		'paged' 			=> $paged,
		'post_status' 		=> 'publish',
		'meta_key' 			=> '_beautheme_show_gallery',
		'meta_value' 		=> 'on',
		'tax_query' 		=> array(
	        array(
	            'taxonomy' 	=> 'post_format',
	            'field' 	=> 'slug',
	            'terms' 	=> array( 'post-format-video' )
	        )
	    )
	);
}
if ($gallery_type == 1) {
    $gallery_type = 'square';
}
$loop = new WP_Query( $args);
wp_reset_postdata();
require(get_template_directory().'/selekon/gallery-'.$gallery_type.'.php');
require(get_template_directory().'/selekon/gallery-popup.php');
?>