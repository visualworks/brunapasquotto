<?php
$disk = hugo_option('hugo-disk');
if ($disk  != NULL) {
?>
<style type="text/css">
    .detail-album .album-icon .disk, .list-albums .list-feature li .album-icon .disk{
        background: url(<?php echo esc_attr($disk['url']);?>)!important;
    }
</style>
<?php
}
?>
<section class="detail-album padding-section">
	<div class="container">
		<?php
			if (have_posts()) : while (have_posts()) : the_post();
		    $termList = get_the_term_list( get_the_ID(), 'album_category','',', ' );
		    $term = explode(',', strip_tags($termList));
		    foreach ($term as $key => $value) {
		    	if ($key==0) {
		    		$cat = ' | '.$value;
		    	}
			}
			if ($termList=='') {
				$cat = '';
			}
			$mediaList 		= get_field('media_item');
			$year 			= get_post_meta(get_the_ID(), '_beautheme_year',TRUE);
	        $app_link 		= get_post_meta(get_the_ID(), '_beautheme_app_store', TRUE);
	        $production		= get_post_meta(get_the_ID(), '_beautheme_production', TRUE);
	        $google_link 	= get_post_meta(get_the_ID(), '_beautheme_google_play', TRUE);
	        $url 			= get_post_meta( get_the_ID(), 'url', true );
   			$link_buy		= get_post_meta(get_the_ID(), '_beautheme_link_to_buy', TRUE);
            $currency       = '$';
            if (function_exists('get_woocommerce_currency_symbol')){
   			  $currency 	= get_woocommerce_currency_symbol();
            }
   			$price 			= get_post_meta(get_the_ID(), '_beautheme_price',TRUE);
		?>
		<div class="description col-md-12 col-sm-12 col-xs-12">
			<h2><?php the_title()?><?php echo esc_html($cat)?></h2>
			<div class="desc-section"><?php the_content()?></div>
		</div>
		<div class="clearfix"></div>
		<div class="detail-album-view col-md-5 col-sm-5 col-xs-12">
			<div class="album-icon">
				<span class="thumbs-album"><a class="click-to-play"><?php echo get_the_post_thumbnail(get_the_ID(), 'medium')?></a>
			 		<a class="click-to-play"><span class="beau-plus"><i class="fa fa-play"></i></span></a>
				</span>
				<span class="disk" id="play-disk"></span>
			</div>
			<div class="clearfix"></div>
			<div class="name-album">
				<?php the_title("<h3>","</h3>", TRUE);?>
				<p>(<?php echo esc_html($year)?> <?php esc_html_e('by','hugo')?> <?php echo esc_html($production)?>)</p>
				<p><?php echo the_excerpt();?></p>
			</div>
			<?php if($link_buy){?>
			<a class="button-buy" href="<?php echo esc_url($link_buy)?>"><?php esc_html_e('Buy','hugo')?> <?php echo esc_html($currency)?>&nbsp;<?php echo esc_html($price)?></a>
			<?php }?>
		</div>
		<div class="col-md-7 col-sm-6 col-xs-12 pull-right">
			<ul class="row beau-listview">
				<?php
				if ($mediaList) {
					foreach ($mediaList as $key => $value) {
					$defaultSong = $value['media_title'];
					$defaultArt  = $value['media_article'];
				?>
				<li>
					<!--Begin-audio-->
					<script type="text/javascript">
						//<![CDATA[
						jQuery(document).ready(function($){
							//Setup and defined a playlist
							"use strict";
							var playEr<?php echo esc_js($key)?> = new jPlayerPlaylist({
								jPlayer: "#beau_player_<?php echo esc_js($key)?>",
								cssSelectorAncestor: "#beau_player_container_<?php echo esc_js($key)?>",

							}, [
									{
										title:"<?php echo esc_js($value['media_title'])?>",
										artist: "<?php echo esc_js($value['media_article'])?>",
										<?php $ext = findExtension($value['media_file']);?>
										<?php	if ($ext=='mp3') {?>
										mp3:"<?php echo esc_js($value['media_file'])?>",
										<?php }?>
										<?php	if ($ext=='ogg') {?>
										oga:"<?php echo esc_js($value['media_file'])?>"
										<?php }?>

									},
							], {
								supplied: "oga, mp3",
								wmode: "window",
								useStateClassSkin: true,
								autoBlur: false,
								smoothPlayBar: true,
								keyEnabled: true
							});
                            //Play next track
                            $('#beau_player_<?php echo esc_js($key)?>').bind($.jPlayer.event.ended, function(event) {
                                 $('#beau_player_<?php echo esc_js($key+1)?>').jPlayer("play");
                            });

						});
						//]]>
					</script>
					<div id="beau_player_<?php echo esc_attr($key)?>" class="jp-jplayer"></div>
					<div id="beau_player_container_<?php echo esc_attr($key)?>" class="jp-audio" role="application" aria-label="media player">
						<div class="jp-type-playlist">
							<div class="jp-gui jp-interface">
								<div class="jp-controls">
									<button class="jp-play" role="button" tabindex="0"></button>
								</div>
								<div class="container-player-view">
									<div class="jp-progress">
										<div class="jp-seek-bar">
											<div class="jp-play-bar"></div>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="jp-current-song pull-left">
										<p class="jp-song-name"><?php echo esc_html($defaultSong)?></p>
										<p class="jp-article-name"><?php echo esc_html($defaultArt)?></p>
									</div>
									<div class="jp-time-holder pull-right">
										<!-- <div class="jp-current-time" role="timer" aria-label="time">&nbsp;/</div> -->
										<div class="jp-duration" role="timer" aria-label="duration"></div>
									</div>
								</div>
						</div>
							<div class="jp-playlist">
								<div class="contain-playlist">
									<ul>
										<li>&nbsp;</li>
									</ul>
								</div>
							</div>
							<div class="jp-no-solution">
								<span><?php esc_html_e('Update Required','hugo')?></span>
								<?php wp_kses(_e('To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.','hugo'), array('a'=>array('href', 'target'))); ?>
							</div>
						</div>
					</div>
					<!--End-audio-->
				</li>
				<?php
					}
				}
				?>
			</ul>
		</div>
		<script type="text/javascript">
			(function($) {
 			"use strict";
				$('.click-to-play .beau-plus').click(function(event) {
					var nowPlaying = "beau_player_container_0";
					if ($('.jp-audio').hasClass('jp-state-playing')) {
						nowPlaying = $('.jp-state-playing').attr('id');
					}
					$('#'+nowPlaying+' .jp-play').click();
				});
				$('.jp-play').click(function (e) {
					$('.jp-audio').click(function(event) {
                        if (event.target.className ==='jp-play') {
                            if ($(this).hasClass('jp-state-playing')) {
                                $('#play-disk').removeClass('fa-spin');
                                $('.beau-plus i').removeClass('fa-pause').addClass('fa-play');
                            }else{
                                $('#play-disk').addClass('fa-spin');
                                $('.beau-plus i').removeClass('fa-play').addClass('fa-pause');
                            }
                        };
					});
				});
			})(jQuery);
		</script>
		</div>
		<?php endwhile; endif?>
	</div>
</section>