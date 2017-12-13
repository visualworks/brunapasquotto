<section class="news-categories-standard">
	<div class="container">
		<div class="col-md-8 col-sm-8 col-xs-12">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php
					if(is_category() || is_single()){
					  $cat = get_category_by_path(get_query_var('category_name'),false);
					  $current = $cat->cat_ID;
					  $current_name = $cat->cat_name;
				      $current_cat_slug = $cat->slug;
					}
					else{
						$current = $current_name = $current_cat_slug ='';
					}
					if (is_tag()) {
						$postTag = get_term_by('slug', get_query_var('tag'), 'post_tag');
						$tagName = $postTag->slug;

						if ($tagName!=NULL) {
							$tags = $postTag->slug;
							$tags_name = $postTag->name;
						}
					}else{
						$tags = $tags_name = '';
					}
				?>
				<?php if ( have_posts()) {?>
				<?php if (is_search()) {
					echo '<h2 class="hugo-title-news">';
					esc_html_e('Search with keywords:','hugo'); printf('%s', $_REQUEST['s']);
					echo '</h2>';
				}?>
				<ul class="list-news">
				<?php
			    while ( have_posts() ) : the_post();
			        $post_format  = get_post_format();
			        $audio 		  = get_post_meta(get_the_ID(), '_beautheme_soud_cloud',TRUE);
					$audio_file	  = get_post_meta(get_the_ID(), '_beautheme_audio_file', TRUE);
					$video		  = get_post_meta(get_the_ID(), '_beautheme_video_embed',TRUE);
					$video_file	  = get_post_meta(get_the_ID(), '_beautheme_video_file',TRUE);
			        $post_format  = get_post_format();
			        $gallery_item =  get_post_meta(get_the_ID(),'_beautheme_show_gallery',TRUE);
					if ($gallery_item !='on') {
				        $image		  = get_the_post_thumbnail(get_the_ID(), 'large');
				        if ($image =='') {
				          $image = '<img alt="'.get_the_title().'" src="http://placehold.it/770x440" alt="No Image">';
				        }
				        global $wp_embed;
							switch ($post_format) {
								case 'audio':
								if ($audio !="") {
									$show_view = $wp_embed->run_shortcode('[embed]'.$audio.'[/embed]');
								}
								break;

								case 'video':
									if($video_file !=""){
										$show_view = '<video width="100%" height="400" controls>';
										if (findExtension($video_file) == 'mp4') {
											$show_view = '<source src="'.esc_attr($video_file).'" type="video/mp4">';
										}
										if (findExtension($video_file) == 'ogg') {
											$show_view = '<source src="'.esc_attr($video_file).'" type="video/ogg">';
										}
										$show_view = __('Your browser does not support the video tag.','hugo').'
										</video>';
									}
									if ($video !="") {
										$show_view = $wp_embed->run_shortcode('[embed]'.$video.'[/embed]');
									}
								break;

								default:
									$show_view = $image;
								break;
							}
					?>
					<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php if ($show_view !="") {?>
							<span class="thumbs">
								<?php printf('%s', $show_view);?>
							</span>
						<?php }else{?>
							<div class="clear-thumbs"></div>
						<?php }?>
						<spam class="author"><i class="fa fa-user"></i> <?php echo get_the_author_link();?> <i class="fa fa-clock-o"></i> <?php the_date()?></spam>
						<span class="excerp-news">
							<a href="<?php the_permalink();?>" class="hugo-title-news"><?php the_title()?></a>
							<p><?php the_excerpt();?></p>
						</span>
						<div class="clearfix"></div>
						<a class="btn-readmore" href="<?php the_permalink();?>"><?php esc_html_e('Read more','hugo')?></a>
					</li>
				<?php
					}//End check gallery item
				endwhile;?>
				</ul>
				<?php }else{?>
				<?php
					if (!is_search()) {
						esc_html_e('No post display!','hugo');
					}else{
				?>
					<div class="beautheme-form no-result search-form col-md-12 col-sm-12 col-xs-12">
						<?php esc_html_e('<h2>Nothing Found</h2>','hugo');?>
						<span class="nothing-found"><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with different keywords.','hugo')?></span>

						<form action="<?php echo esc_url( home_url( '/'  ) ); ?>" method="get" accept-charset="utf-8">
							<input type="text" name="s" placeholder="<?php esc_html_e('Search something...','hugo')?>" autocomplete="off">
							<button type="submit" class="gradient"><i class="fa fa-search"></i></button>
						</form>
					</div>
				<?php
					}
				?>
				<?php }?>
				<div class="clearfix"></div>
				<?php echo beau_pagination($wp_query);?>
			</div>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-12 pull-right">
			<?php get_sidebar();?>
		</div>
	</div>
</section>
<?php wp_reset_postdata()?>
