<?php
$bg_image = $bg_color = $bg_image_repeat = $font_color = $padding = $margin_bottom= $title = '';
extract(shortcode_atts(array(
    'title' 		=> '',
), $atts));
$css_class ="description col-md-12 col-sm-12 col-xs-12";
?>
<div class="<?php echo esc_attr($css_class)?> padding-section">
	<h2><?php echo esc_html($title)?></h2>
	<div class="desc-section"><p><?php echo wpb_js_remove_wpautop($content)?></p></div>
</div>