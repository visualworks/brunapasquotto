<?php
	$terms = wp_get_post_terms( get_the_ID(), 'album_category');
	if ( $terms && ! is_wp_error( $terms ) ){
		$draught_links = array();
		foreach ( $terms as $term ) {
			$draught_links[] = $term->slug;
			break;
		}
		$on_draught = join( ", ", $draught_links );
	}else{
		$on_draught="";
	}
	$currentID = get_the_ID();
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	$args = array(
		'post_type' => 'album',
		'posts_per_page' => '3',
		'post_status' => 'publish',
		'paged' => $paged,
		'post__not_in' => array($currentID),
		'tax_query' => array(
	        array(
	            'taxonomy' => 'album_category',
	            'field' => 'slug',
	            'terms' => $on_draught,
	        ),
	    ),
	);
	$postType = new WP_Query( $args);
	if ($postType->have_posts()) {
?>
<div class="clearfix"></div>
<section class="hugo-related-albums padding-section">
	<div class="feature-albums">
		<div class="container">
			<div class="description col-md-12 col-sm-12 col-xs-12">
				<h2><?php esc_html_e('Related Albums','hugo')?></h2>
			</div>
			<div class="list-albums">
				<ul class="list-feature col-md-12 col-xs-12 col-sm-12">
					<?php
					while ($postType->have_posts()) {
						$postType->the_post();
						$year 			= get_post_meta(get_the_ID(), '_beautheme_year',TRUE);
				        $app_link 		= get_post_meta(get_the_ID(), '_beautheme_app_store', TRUE);
				        $google_link 	= get_post_meta(get_the_ID(), '_beautheme_google_play', TRUE);
				        $url 			= get_post_meta( get_the_ID(), 'url', true );
					?>
					<li class="col-md-4 col-sm-4 col-xs-12">
						<div class="album-icon">
							<span class="thumbs-album">
								<a href="<?php the_permalink();?>"><?php echo get_the_post_thumbnail(get_the_ID(), 'medium');?></a>
								<a href="<?php the_permalink();?>"><span class="beau-plus"><i class="fa fa-plus"></i></span></a>
								<span class="app-store">
									<a href="<?php echo esc_url($app_link)?>">
										<img alt="<?php esc_html_e('App Store','hugo')?>" src="<?php echo BEAU_ASSET_IMG ?>app-store.png">
									</a>
								</span>
								<span class="google-play">
									<a href="<?php echo esc_url($google_link)?>">
										<img alt="<?php esc_html_e('Google Play','hugo')?>" src="<?php echo BEAU_ASSET_IMG ?>google-play.png">
									</a>
								</span>
							</span>
							<span class="disk"></span>
						</div>
						<div class="name">
							<?php the_title( "<h3>", "</h3>", TRUE);?>
							<?php if($year !=""){?>
							<p>(<?php echo esc_html($year)?>)</p>
							<?php }?>
						</div>
					</li>
					<?php }?>
				</ul>
			</div>

		</div>
    </div>
</section>
<?php }?>
<?php wp_reset_postdata()?>