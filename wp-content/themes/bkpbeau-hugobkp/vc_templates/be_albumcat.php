<?php
$css = $title = $album_cat = $band = $show_pagging = $show_button = '';
$perpage  = 4;
extract(shortcode_atts(array(
    'css' 			=> '',
    'title' 		=> '',
	'album_cat' 	=> '',
	'band'			=> '',
	'perpage' 		=> '4',
    'show_pagging'  => '0',
    'show_button'   => '1'
), $atts));
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$page = get_query_var('page') ? get_query_var('page') : 1;
if ($page > $paged) {
	$paged = $page;
}
$args = array(
	'post_type' => 'album',
	'posts_per_page' => $perpage,
	'paged' => $paged,
);
if ($album_cat !="") {
   $args = array(
        'post_type' => 'album',
        'posts_per_page' => $perpage,
        'tax_query' => array(
            array(
                'taxonomy'  => 'album_category',
                'field'     => 'slug',
                'terms'     => $album_cat,
            ),
        ),
        'paged' => $paged,
    );
}
$postType = new WP_Query( $args);
wp_reset_postdata();
global $beau_option;
if (isset($beau_option['hugo-disk']) && !$beau_option['hugo-disk']['url']=='') {
?>
<style type="text/css">
    .list-albums .list-feature li .album-icon .disk{
        background: url(<?php echo esc_attr($beau_option['hugo-disk']['url']);?>)!important;
    }
</style>
<?php
}
?>
<div class="container feature-albums">
	<?php if (!$title == '' || !$content=='') {?>
	  <div class="description col-md-12 col-sm-12 col-xs-12">
	  <?php if (!$title=='') {?>
	    <?php printf('<h2>%s</h2>',  $title)?>
	  <?php }
	  if (!$content == '') {?>
	    <div class="desc-section"><p><?php echo wpb_js_remove_wpautop($content)?></p></div>
	  <?php }?>
	  </div>
	<?php }?>
	<div class="list-albums">
		<ul class="list-feature col-md-12 col-xs-12 col-sm-12">
		    <?php
		    if ($postType->have_posts()) {
                $i=0;
		      while ($postType->have_posts()) {
		        $postType->the_post();
		        $year 			= get_post_meta(get_the_ID(), '_beautheme_year',TRUE);
		        $app_link 		= get_post_meta(get_the_ID(), '_beautheme_app_store', TRUE);
		        $google_link 	= get_post_meta(get_the_ID(), '_beautheme_google_play', TRUE);
		        $link_post 		= get_post_permalink();
		        $title_album 	= get_the_title();
		        $image 			= get_the_post_thumbnail(get_the_ID(), 'medium');
		        $url 			= get_post_meta( get_the_ID(), 'url', true );
       			if ($image =="") {
       				$image = '<img src="http://placehold.it/270x270" alt="No image">';
       			}
			?>
                <?php if ($i%3==0 && $i > 0): ?>
                <li class="clearfix album-cleared"></li>
                <?php endif ?>
				<li class="col-md-4 col-sm-4 col-xs-12">
					<div class="album-icon">
						<span class="thumbs-album">
							<a href="<?php the_permalink();?>"><?php printf('%s', $image)?></a>
							<a href="<?php the_permalink();?>"><span class="beau-plus"><i class="fa fa-plus"></i></span></a>
							<?php if ($app_link && $show_button == 1) {?>
							<span class="app-store">
								<a href="<?php echo esc_url($app_link)?>">
									<img alt="<?php esc_html_e('App Store','hugo')?>" src="<?php echo BEAU_ASSET_IMG?>app-store.png">
								</a>
							</span>
							<?php }?>
							<?php if ($google_link && $show_button == 1) {?>
							<span class="google-play">
								<a href="<?php echo esc_url($google_link)?>">
									<img alt="<?php esc_html_e('Google Play','hugo')?>" src="<?php echo BEAU_ASSET_IMG?>google-play.png">
								</a>
							</span>
							<?php }?>
						</span>
						<span class="disk"></span>
					</div>
					<div class="name">
						<?php the_title("<h3>","</h3>", TRUE); ?>
						<?php if(!empty($year)){?>
							<?php printf('<p>(%s)</p>',  $year)?>
						<?php }?>
					</div>
				</li>
			<?php
                    $i++;
                }
			}?>
		</ul>
		<?php  if ($show_pagging) {
	      echo beau_pagination($postType);
	  	}?>

	</div>
</div>