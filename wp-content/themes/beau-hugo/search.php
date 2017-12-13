<?php
get_header();
$beau_archive = hugo_option('archive-page');
if($beau_archive==NULL){
	$beau_archive = "postcatstandard";
}
get_template_part('selekon/section-'.$beau_archive);
get_footer();
?>