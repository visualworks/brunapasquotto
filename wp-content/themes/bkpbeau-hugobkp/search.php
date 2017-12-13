<?php
get_header();
global $beau_option;
if ($beau_option['archive-page'] !=='') {
	$beau_archive = $beau_option['archive-page'];
}
if($beau_archive==NULL){
	$beau_archive = "postcatstandard";
}
get_template_part('selekon/section-'.$beau_archive);
get_footer();
?>