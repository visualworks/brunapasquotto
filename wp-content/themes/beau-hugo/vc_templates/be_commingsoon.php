<?php
$title = '';
extract(shortcode_atts(array(
	'title' => '',
), $atts));
$comming_date =  hugo_option('comming-date');
$date_arr =  explode('/', $comming_date);
$date_come = $date_arr[2].'/'.$date_arr[0].'/'.$date_arr[1];
$randID =  rand(1,999);
?>
<div class="comming">
<div class="content-view">
	<div class="container">
	<?php if (!$title == '' || !$content=='') {?>
		<div class="description col-md-12 col-sm-12 col-xs-12">
		<?php if (!$title=='') {?>
			<?php echo '<h2>'.$title.'</h2>'?>
		<?php }
		    if (!$content == '') {?>
		      <div class="desc-section"><p><?php echo wpb_js_remove_wpautop($content)?></p></div>
		<?php }?>
		</div>
		<?php }?>

		<div class="next-event in-comming text-white" id="countdown-<?php echo esc_attr($randID);?>">
			<ul class="next-event-in row">

				<li class="col-md-3 col-sm-3 col-xs-3">
					<h3 id="beau-days-<?php echo esc_attr($randID);?>">00</h3>
					<p><?php esc_html_e('Days','hugo')?></p>
				</li>

				<li class="col-md-3 col-sm-3 col-xs-3">
					<h3 id="beau-hours-<?php echo esc_attr($randID);?>">00</h3>
					<p><?php esc_html_e('Hours','hugo')?></p>
				</li>

				<li class="col-md-3 col-sm-3 col-xs-3">
					<h3 id="beau-minutes-<?php echo esc_attr($randID);?>">00</h3>
					<p><?php esc_html_e('Minutes','hugo')?></p>
				</li>

				<li class="col-md-3 col-sm-3 col-xs-3">
					<h3 id="beau-second-<?php echo esc_attr($randID);?>">00</h3>
					<p><?php esc_html_e('Seconds','hugo')?></p>
				</li>
			</ul>
		</div>
		<script type="text/javascript">
	      jQuery(function ($) {
 			"use strict";
	        $('#countdown-<?php echo esc_attr($randID);?>').countdown('<?php echo esc_js($date_come)?>', function(event) {
	          $('#beau-days-<?php echo esc_attr($randID);?>').html(event.strftime('%D'));
	          $('#beau-hours-<?php echo esc_attr($randID);?>').html(event.strftime('%H'));
	          $('#beau-minutes-<?php echo esc_attr($randID);?>').html(event.strftime('%M'));
	          $('#beau-second-<?php echo esc_attr($randID);?>').html(event.strftime('%S'));
	        });
	      });
	    </script>

		<div id="mc4wp-form-1" class="form mc4wp-form beautheme-form subcribe-form search-form col-md-12 col-sm-12 col-xs-12">
			<form method="post" role="form">
				<input type="email" id="mc4wp_email" name="EMAIL" placeholder="<?php esc_html_e('Your email address','hugo')?>" required="">
				<button type="submit"><i class="fa fa-sign-in"></i></button>
			</form>
		</div>

	</div>
</div>
</div>