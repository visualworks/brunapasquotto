<?php
global $beau_option;
if ($beau_option) {
	if (isset($beau_option['show-social-link']) && is_array($beau_option['show-social-link'])) {
		foreach($beau_option['show-social-link'] as $key=> $social){
			if(isset($beau_option['hugo-'.$social])){
				echo '<li><a href="'.esc_url($beau_option['hugo-'.$social]).'" target="_blank"><i class="fa fa-'.esc_attr($social).'"></i></a></li>';
			}
		}
	}
}
?>