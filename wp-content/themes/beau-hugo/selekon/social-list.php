<?php
$social_list_arr = hugo_option('show-social-link');
if ($social_list_arr != NULL && is_array($social_list_arr)) {
	foreach($social_list_arr  as $key=> $social){
		if(NULL != hugo_option('hugo-'.$social)){
			echo '<li><a href="'.esc_url(hugo_option('hugo-'.$social)).'" target="_blank"><i class="fa fa-'.esc_attr($social).'"></i></a></li>';
		}
	}
}
?>