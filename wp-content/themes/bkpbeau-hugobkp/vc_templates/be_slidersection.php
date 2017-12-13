<?php
$beau_slider = $beau_playlist = $show_all = $playlist_auto = "";
extract(shortcode_atts(array(
    'beau_slider'   => '',
    'beau_playlist' =>'',
    'show_all'      =>'all',
    'playlist_auto' =>'0',
), $atts));
$feaTureAl = get_post($beau_playlist, ARRAY_A);
if (function_exists('get_field')) {
	$mediaList = get_field('media_item', $beau_playlist);
}else{
	wp_kses(_e('<center>Error: maybe you not active require plugin please active it follow this <a href="/wp-admin/themes.php?page=install-required-plugins">link</a></center>','hugo'), array('center', 'a'=>array('href')));
	die();
}
?>
<div class="top-slider">
<?php if ($show_all=='all' || $show_all == 'slider') {?>
<div id="top-slider">
	<?php
	if ($beau_slider) {
		if (function_exists('masterslider')) {
			masterslider($beau_slider);
		}
	}
	?>
	</div>
<?php }?>
<?php
	if ($show_all=='all' || $show_all == 'player') {
		if ($show_all == 'player') {
			$static = 'beau-static';
		}else{
			$static = '';
		}
?>
	<div class="beau-player <?php echo esc_attr($static)?>">
		<div class="container">
			<!--Begin-audio-->
			<script type="text/javascript">
				//<![CDATA[
				jQuery(function($) {
					"use strict";
					$('.jp-toshow').click(function() {
						if (!$(this).hasClass('active')) {
							$('.jp-playlist').show();
							$(this).addClass('active');
						}else{
							$('.jp-playlist').hide();
							$(this).removeClass('active');
						}
					});

					jQuery("#beau_player").bind(jQuery.jPlayer.event.play, function (event)
					{
					    var current = beauPlaylist.current, playlist = beauPlaylist.playlist;
					    jQuery.each(playlist, function (index, obj){
					        if (index == current){
								$('#jp-song-name').html(obj.title);
								$('#jp-article-name').html(obj.artist);

					        }
					    });
					});

					//Setup and defined a playlist
					var beauPlaylist = new jPlayerPlaylist({
						jPlayer: "#beau_player",
						cssSelectorAncestor: "#beau_player_container",

					}, [
						<?php
						$defaultSong = __('Current song name','hugo');
						$defaultArt  = __('Current article name','hugo');
						if ($mediaList) {
							foreach ($mediaList as $key => $value) {
								if ($key==0) {
									$defaultSong = esc_js($value['media_title']);
									$defaultArt  = esc_js($value['media_article']);
								}
						?>
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
						<?php
							}
						}
						?>
					], {
						supplied: "oga, mp3",
						wmode: "window",
						useStateClassSkin: true,
						autoBlur: false,
						smoothPlayBar: true,
						keyEnabled: true,
                    });
				});
				//]]>
				</script>
				<div id="beau_player" class="jp-jplayer"></div>
				<div id="beau_player_container" class="jp-audio" role="application" aria-label="media player">
					<div class="jp-type-playlist">
						<div class="jp-gui jp-interface">
							<div class="jp-controls">
								<button class="jp-previous" role="button" tabindex="0"></button>
								<button class="jp-play" role="button" tabindex="0"></button>
								<button class="jp-next" role="button" tabindex="0"></button>
							</div>
							<div class="jp-current-song">
								<p id="jp-song-name"><?php echo esc_html($defaultSong)?></p>
								<p id="jp-article-name"><?php echo esc_html($defaultArt)?></p>
							</div>
							<div class="jp-progress">
								<div class="jp-seek-bar">
									<div class="jp-play-bar"></div>
								</div>
							</div>
							<div class="jp-volume-controls">
								<button class="jp-mute" role="button" tabindex="0"></button>
								<button class="jp-volume-max" role="button" tabindex="0"></button>
								<div class="jp-volume-bar">
									<div class="jp-volume-bar-value"></div>
								</div>
							</div>
							<div class="jp-time-holder">
								<div class="jp-current-time" role="timer" aria-label="time">&nbsp;/</div>
								<div class="jp-duration" role="timer" aria-label="duration"></div>
							</div>
							<div class="jp-toggles">
								<button class="jp-repeat" role="button" tabindex="0"></button>
								<button class="jp-shuffle" role="button" tabindex="0"></button>
								<button class="jp-toshow" tabindex="0"></button>
							</div>
						</div>
						<div class="clearfix"></div>
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
		</div>
	</div>
<?php }?>
</div>
<?php wp_reset_postdata();?>