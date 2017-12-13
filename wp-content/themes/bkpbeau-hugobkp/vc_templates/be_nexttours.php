<?php
$title = $description = $category =  $nextid = $enable_buy = $text_next_event = $shortcode_type = $perpage = $load ='';
extract(shortcode_atts(array(
    'title'         => '',
    'description'   => '',
    'category'      => '',
    'perpage'       => '3',
    'css'           => '',
    'nextid'        => '',
    'shortcode_type'=> 'list',
    'show_cowndown' => '1',
    'enable_buy'    => '1',
    'title_align'   =>'hugo-center',
    'text_next_event' => esc_html__('Next Event In','hugo'),
), $atts));
$args=array(
  'post_type'       => 'product',
  'post_status'     => 'publish',
  'meta_query' => array(
      array(
        'key' => '_beautheme_is_ticket',
        'value' => 'on',
        'compare' => '='
      ),
    ),
  'orderby' => 'menu_order',
  'order'   => 'DESC',
  'posts_per_page'  => $perpage,
);
$getTicket = new WP_Query($args);
wp_reset_postdata();
include_once(get_template_directory().'/selekon/ticket-'.$shortcode_type.'.php');
?>
