<?php
	get_header();
	global $beau_option;
	$s404 = 'section-404';
	if ($beau_option) {
		if (!$beau_option['hugo-notfound']=="") {
			$s404 = $beau_option['hugo-notfound'];
		}
	}
	get_template_part('selekon/'.$s404);
	get_footer();
?>
