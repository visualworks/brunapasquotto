<?php
get_header();
get_template_part('selekon/section-default');
?>
<div class="container">
	<?php
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
	?>
</div>
<?php
get_footer();
?>