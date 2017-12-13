<?php
$title = '';
extract(shortcode_atts(array(
	'title' => '',
), $atts));
global $beau_option;
$date_arr =  explode('/', $beau_option['comming-date']);
$date_come = $date_arr[2].'/'.$date_arr[0].'/'.$date_arr[1];
?>
<div class="comming">
<div class="content-view">
	<div class="container">
	<?php if (!$title == '' || !$content=='') {?>
		<div class="description col-md-12 col-sm-12 col-xs-12">
		<?php if (!$title=='') {?>
			<?php printf('<h2>%s</h2>',$title)?>
		<?php }
		    if (!$content == '') {?>
		      <div class="desc-section"><p><?php echo wpb_js_remove_wpautop($content)?></p></div>
		<?php }?>
		</div>
		<?php }?>

		<div class="next-event in-comming text-white">
			<ul class="next-event-in row">

				<li class="col-md-3 col-sm-3 col-xs-3">
					<h3 id="beau-days">00</h3>
					<p><?php esc_html_e('Days','hugo')?></p>
				</li>

				<li class="col-md-3 col-sm-3 col-xs-3">
					<h3 id="beau-hours">00</h3>
					<p><?php esc_html_e('Hours','hugo')?></p>
				</li>

				<li class="col-md-3 col-sm-3 col-xs-3">
					<h3 id="beau-minutes">00</h3>
					<p><?php esc_html_e('Minutes','hugo')?></p>
				</li>

				<li class="col-md-3 col-sm-3 col-xs-3">
					<h3 id="beau-second">00</h3>
					<p><?php esc_html_e('Seconds','hugo')?></p>
				</li>
			</ul>
		</div>
		<script type="text/javascript">
	      jQuery(function ($) {
 			"use strict";
	        $('.next-event').countdown('<?php echo esc_js($date_come)?>', function(event) {
	          $('#beau-days').html(event.strftime('%D'));
	          $('#beau-hours').html(event.strftime('%H'));
	          $('#beau-minutes').html(event.strftime('%M'));
	          $('#beau-second').html(event.strftime('%S'));
	        });
	      });
	    </script>

		<div id="mc4wp-form-1" class="form mc4wp-form beautheme-form subcribe-form search-form col-md-12 col-sm-12 col-xs-12">
			<form method="post" role="form">
				<input type="email" id="mc4wp_email" name="EMAIL" placeholder="<?php esc_html_e('Your email address','hugo')?>" required="">
				<button type="submit"><i class="fa fa-sign-in"></i></button>
				<input type="text" name="_mc4wp_required_but_not_really" value="" style="display: none !important;">
				<input type="hidden" name="_mc4wp_timestamp" value="<?php echo time();?>">
				<input type="hidden" name="_mc4wp_form_id" value="0">
				<input type="hidden" name="_mc4wp_form_element_id" value="mc4wp-form-1"><input type="hidden" name="_mc4wp_form_submit" value="1">
				<input type="hidden" name="_mc4wp_form_nonce" value="a58adf269e">
			</form>
		</div>

	</div>
</div>
</div>