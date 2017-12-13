<?php
get_header();
if (is_home()) {
    $beau_archive =  hugo_option('archive-page');
    if ($beau_archive == NULL) {$beau_archive = "postcatstandard";}
	get_template_part('selekon/section-'.$beau_archive);
}else{
	get_template_part('selekon/section-default');
}
get_footer();
?>