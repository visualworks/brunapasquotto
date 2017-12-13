<section class="feature-news categories-news">
	<div class="container">
		<div class="description">
		<h2>
			<?php
				global $wp_embed;
				if (is_category()) { single_cat_title(); }
				elseif (is_tag()) { ?>  posts tagged "<?php single_tag_title(); ?>" <?php }
				elseif (is_day()) { the_time('F jS, Y'); }
				elseif (is_month()) { the_time('F, Y'); }
				elseif (is_year()) { the_time('Y'); }
				elseif (is_author()) { the_author(); }else{
					esc_html_e('News', 'hugo');
				}
			 ?>
			 <?php
				if (is_category()){
					if (category_description() !="") {
						$class_Tag = "clear-title";
					}
				}elseif (is_tag() || is_day() || is_month() || is_year() || is_author()) {
					$class_Tag = "clear-title";
				}
			?>
		</h2>
		<span class="desc-section <?php echo esc_attr($class_Tag)?>">
			<center>
			<?php
				if (is_category()){
					echo category_description();
					if (category_description() !="") {
						echo '<div class="clear-title"></div>';
					}
				}elseif (is_tag() || is_day() || is_month() || is_year() || is_author()) {
					echo '<div class="clear-title"></div>';
				}
			?>
			</center>
		</span>

		</div>
		<div class="beau-features">
			<?php if ( have_posts()) {?>
			<ul class="feature-list">
			<?php
			$i = $j = $a = $k = 0;
			while ( have_posts() ) : the_post();
		        $post_format  = get_post_format();
		        $audio 		  = get_post_meta(get_the_ID(), '_beautheme_soud_cloud',TRUE);
				$audio_file	  = get_post_meta(get_the_ID(), '_beautheme_audio_file', TRUE);
				$video		  = get_post_meta(get_the_ID(), '_beautheme_video_embed',TRUE);
				$video_file	  = get_post_meta(get_the_ID(), '_beautheme_video_file',TRUE);
				$gallery_item =  get_post_meta(get_the_ID(),'_beautheme_show_gallery',TRUE);
				if ($gallery_item !='on') {
					$size         = 'beau-big';
		            $float        = 'left';
		            $class_image  = 'col-md-8 col-sm-8 col-xs-8';
		            $class_title  = 'col-md-4 col-sm-4 col-xs-4';
		            $k = $k+1;
		            if ($i%3==0) {$j+=1; $k=1;}
		            if ($j%2==0) {
		              switch ($k) {
		                case 1:
		                  $size       	= 'beau-small';
		                  $float      	= 'left';
		                  $class_image  = 'col-md-4 col-sm-4 col-xs-4';
		                  $class_title  = 'col-md-8 col-sm-8 col-xs-8';
		                  break;
		                case 3:
		                  $size       	= 'beau-small';
		                  $float      	= 'left';
		                  $class_image  = 'col-md-4 col-sm-4 col-xs-4';
		                  $class_title  = 'col-md-8 col-sm-8 col-xs-8';
		                  break;
		                default:
		                  $size       	= 'beau-big';
		                  $float      	= 'right';
		                  $class_image  = 'col-md-8 col-sm-8 col-xs-8';
		                  $class_title  = 'col-md-4 col-sm-4 col-xs-4';
		                  break;
		              }
		            }else{
		              switch ($k) {
		                case 2:
		                  $size       	= 'beau-small';
		                  $float      	= 'right';
		                  $class_image  = 'col-md-4 col-sm-4 col-xs-4';
		                  $class_title  = 'col-md-8 col-sm-8 col-xs-8';
		                  break;
		                case 3:
		                  $size       	= 'beau-small';
		                  $float      	= 'right';
		                  $class_image  = 'col-md-4 col-sm-4 col-xs-4';
		                  $class_title  = 'col-md-8 col-sm-8 col-xs-8';
		                  break;
		                default:
		                  $size       	= 'beau-big';
		                  $float      	= 'left';
		                  $class_image  = 'col-md-8 col-sm-8 col-xs-8';
		                  $class_title  = 'col-md-4 col-sm-4 col-xs-4';
		                  break;
		              }
		            }
					if ($size =='beau-big') {
						$image = get_the_post_thumbnail(get_the_ID(), 'medium');
					}else{
						$image = get_the_post_thumbnail(get_the_ID(), 'small-thumbnail');
					}
		            if ($image=="") {
		              if ($size =='beau-big') {
		                $image = '<img src="http://placehold.it/370x370" alt="No image">';
		              }else{
		                $image = '<img src="http://placehold.it/170x170" alt="No image">';
		              }
		            }
		            switch ($post_format) {
						case 'audio':
						if ($audio !="") {
							$show_view = $wp_embed->run_shortcode('[embed]'.$audio.'[/embed]');
						}
						break;
						case 'video':
							$show_view = '<a class="feature-image-news beau-video-item" href="'.get_the_permalink().'">'.$image.'</a>';
						break;

						default:
							$show_view = '<a class="feature-image-news" href="'.get_the_permalink().'">'.$image.'</a>';
						break;
					}
				?>

				<li  id="post-<?php the_ID(); ?>" class="<?php echo esc_attr($size).' '.esc_attr($float)?>">
					<span class="<?php echo esc_attr($class_image)?>">
						<?php printf('%s',$show_view);?>
						<i class="beau-arrow"></i>
					</span>
					<span class="<?php echo esc_attr($class_title)?>">
						<span class="name"><i class="fa fa-user"></i><?php echo get_the_author_link();?></span>
						<a href="<?php the_permalink();?>" class="hugo-title-news"><?php the_title();?></a>
						<span class="time-up"><i class="fa fa-clock-o"></i><?php the_date();?></span>
					</span>
				</li>

			<?php $i++;
				}//End check gallery
				endwhile;
			?>

			</ul>
			<?php }else{?>
			<?php
				if (!is_search()) {
					esc_html_e('No post display!','hugo');
				}else{
			?>
				<div class="beautheme-form no-result search-form col-md-12 col-sm-12 col-xs-12">
					<?php wp_kses(_e('<h2>Nothing Found</h2>','hugo'),array('h2'));?>
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
</section>
<?php wp_reset_postdata()?>
