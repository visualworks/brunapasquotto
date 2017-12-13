<?php
	get_header();
?>
<section class="news-categories-standard detail-news">
	<div class="container">
		<div class="col-md-8 col-sm-8 col-xs-12">
			<?php if (have_posts()) : while (have_posts()) : the_post();
				$image = get_the_post_thumbnail(get_the_ID(), 'large');
				$post_format = get_post_format();
				if ($image=="") {
					$image = '<img src="http://placehold.it/780x400" alt="No image">';
				}
				$audio 			= get_post_meta(get_the_ID(), '_beautheme_soud_cloud',TRUE);
				$audio_file		= get_post_meta(get_the_ID(), '_beautheme_audio_file', TRUE);
				$video			= get_post_meta(get_the_ID(), '_beautheme_video_embed',TRUE);
				$video_file		= get_post_meta(get_the_ID(), '_beautheme_video_file',TRUE);
				switch ($post_format) {
					case 'audio':
						if ($audio !="") {
							$show_view = $wp_embed->run_shortcode('[embed]'.$audio.'[/embed]');
						}else{
							$show_view = $image;
						}
					break;

					case 'video':
						if($video_file !=""){
							$show_view = '<video width="100%" height="400" controls>';
							if (findExtension($video_file) == 'mp4') {
								$show_view = '<source src="'.$video_file.'" type="video/mp4">';
							}
							if (findExtension($video_file) == 'ogg') {
								$show_view = '<source src="'.$video_file.'" type="video/ogg">';
							}
							$show_view = esc_html_e('Your browser does not support the video tag.','hugo').'
							</video>';
						}
						if ($video !="") {
							$show_view = $wp_embed->run_shortcode('[embed]'.$video.'[/embed]');
						}else{
							$show_view = $image;
						}
					break;

					default:
						$show_view = $image;
					break;
				}
			?>
			<?php if ($show_view !="") {?>
				<span class="thumbs">
					<?php printf('%s', $show_view);?>
				</span>
			<?php }else{?>
				<div class="clear-thumbs"></div>
			<?php }?>
			<spam class="author">
				<ul>
					<li><i class="fa fa-user"></i><?php echo get_the_author_link()?></li>
					<li><i class="fa fa-clock-o"></i> <?php echo get_the_date()?></li>
				</ul>
			</spam>
			<span class="excerp-news content-news">
				<h1 class="beau-title"><a href="<?php the_permalink()?>"><?php the_title()?></a></h1>
				<div class="content-post">
					<?php the_content(); ?>
				</div>
			</span>

		<?php endwhile; endif?>
		<div class="clearfix"></div>
		<?php get_template_part('selekon/tags-share');?>
		<?php comments_template();?>
		</div>
		<div class="col-md-3 col-sm-4 col-xs-12 pull-right hugo-right-cols"><?php echo get_sidebar();?></div>
</section>
<?php get_footer();?>