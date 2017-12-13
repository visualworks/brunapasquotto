<?php
$bg_image = $bg_color = $bg_image_repeat = $font_color = $padding = $margin_bottom= $css = $title = $id_album = '';
extract(shortcode_atts(array(
    'css' 			=> '',
    'title' 		=> '',
    'id_album'		=> '',
), $atts));
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$css_class .=" description about-single-album col-md-12 col-sm-12 col-xs-12";
$args = array(
	'post_type' => 'album',
	'posts_per_page' => 1,
	'post__in' => array($id_album),
);
$postType = new WP_Query( $args);
?>
<div class="<?php echo esc_attr($css_class)?>">
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="list-albums">
			<ul class="list-feature col-md-12 col-xs-12 col-sm-12">
			    <?php
			    if ($postType->have_posts()) {
			      while ($postType->have_posts()) {
			        $postType->the_post();
			        $year 			= get_post_meta(get_the_ID(), '_beautheme_year',TRUE);
			        $app_link 		= get_post_meta(get_the_ID(), '_beautheme_app_store', TRUE);
			        $google_link 	= get_post_meta(get_the_ID(), '_beautheme_google_play', TRUE);
			        $link_post 		= get_post_permalink();
			        $title_album 	= get_the_title();
			        $url 			= get_post_meta( get_the_ID(), 'url', true );
	       			$image 	   	 	= get_the_post_thumbnail(get_the_ID(), 'medium');
	       			if ($image =="") {
	       				$image = '<img src="http://placehold.it/270x270">';
	       			}
				?>
					<li class="col-md-12 col-xs-12 col-sm-12 explan-view">
						<div class="album-icon">
							<span class="thumbs-album">
								<a href="<?php echo esc_url($link_post)?>"><?php printf('%s', $image)?></a>
								<a href="<?php echo esc_url($link_post)?>"><span class="beau-plus"><i class="fa fa-plus"></i></span></a>
								<span class="app-store">
									<a href="<?php echo esc_attr($app_link)?>">
										<img alt="<?php esc_html_e('App Store','hugo')?>" src="<?php echo BEAU_ASSET_IMG?>app-store.png">
									</a>
								</span>
								<span class="google-play">
									<a href="<?php echo esc_url($google_link)?>">
										<img alt="<?php esc_html_e('Google Play','hugo')?>" src="<?php echo BEAU_ASSET_IMG?>google-play.png">
									</a>
								</span>
							</span>
							<span class="disk alway-show"></span>
						</div>
					</li>
				<?php  }
				}?>

			</ul>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12 description-single">
		<h2><?php printf('%s', $title)?></h2>
		<div class="desc-single"><p><?php echo wpb_js_remove_wpautop($content)?></p></div>
	</div>
</div>
<?php wp_reset_postdata();?>