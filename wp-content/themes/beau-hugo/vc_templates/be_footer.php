<?php
$footer_type = 'footer-content';
extract(shortcode_atts(array(
	'footer_type' => 'footer-content',
), $atts));
get_template_part('selekon/'.$footer_type);
?>