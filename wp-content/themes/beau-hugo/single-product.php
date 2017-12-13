<?php
	get_header();
    $google_api_key     = hugo_option('your-google-api');
    $map_marker_custom  = hugo_option('your-map-marker');
	if ($google_api_key == NULL) {
		$google_api_key   = 'AIzaSyCOeGmyX-gl-BqGDrCvYd1qeEWstO9553Y';
	}
	if ($map_marker_custom == NULL) {
		$map_marker_custom    = BEAU_IMAGES.'/map-marker.png';
	}else{
        $map_marker_custom    = $map_marker_custom ['url'];
    }
?>
<?php if (have_posts()) : while (have_posts()) : the_post();
    $image          = get_the_post_thumbnail(get_the_ID(), 'single-ticket');
    $post_format    = get_post_format();
    $event_on       = get_post_meta(get_the_ID(), '_beautheme_event_on', TRUE);
    $email          = get_post_meta(get_the_ID(), '_beautheme_ticket_mail',TRUE);
    $address        = get_post_meta(get_the_ID(), '_beautheme_adress_name', TRUE);
    $maplong        = get_post_meta(get_the_ID(), '_beautheme_map_longitude',TRUE);
    $map_lat        = get_post_meta(get_the_ID(), '_beautheme_map_latitude',TRUE);
    $mobile         = get_post_meta(get_the_ID(), '_beautheme_ticket_mobile',TRUE);
    $video_trailer  = get_post_meta(get_the_ID(), '_beautheme_trailer_video',TRUE);
    $is_ticket      = get_post_meta(get_the_ID(), '_beautheme_is_ticket',TRUE);
    $_product_url   = get_post_meta(get_the_ID(), '_product_url', TRUE);
    $_button_text   = get_post_meta(get_the_ID(), '_button_text', TRUE);
    if (!$_button_text) {
        $_button_text =  __('Buy ticket','hugo');
    }
    $method = 'get';
    if (!$_product_url) {
        $_product_url = $woocommerce->cart->get_cart_url();
        $method = 'post';
    }
?>
<?php
if ($is_ticket == "on") {
    require_once(get_template_directory().'/selekon/product-ticket.php');
}else{
    require_once(get_template_directory().'/selekon/product-single.php');
}
?>
<?php endwhile; endif?>
<?php get_footer();?>