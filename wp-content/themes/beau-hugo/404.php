<?php
	get_header();
    $s404 = hugo_option('hugo-notfound');
    if ($s404 == NULL) {
        $s404 = 'section-404';
    }
	get_template_part('selekon/'.$s404);
	get_footer();
?>
