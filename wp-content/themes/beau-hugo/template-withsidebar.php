<?php
	/*
	* Template Name: Two columns with sidebar
	*/
	get_header();
?>
<div class="container">
	<div class="pull-left col-md-8 col-sm-8 col-xs-12">
	<?php
		while ( have_posts() ) : the_post();
		the_content();
		endwhile;
	?>
	</div>
	<div class="col-md-3 col-sm-4 col-xs-12 pull-right news-categories-standard hugo-right-cols">
		<?php get_sidebar();?>
	</div>
</div>
<?php get_footer();?>