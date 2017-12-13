<?php
	/*
	* Template Name: Two columns with sidebar
	*/
	get_header();
?>
<section class="news-categories-standard">
	<div class="container">
		<div class="pull-left col-md-8 col-sm-8 col-xs-12">
		<?php
			while ( have_posts() ) : the_post();
				the_content();
			endwhile;
		?>
		</div>
		<div class="col-md-3 col-sm-4 col-xs-12 pull-right hugo-right-cols">
			<?php get_sidebar();?>
		</div>
</section>
<?php get_footer();?>