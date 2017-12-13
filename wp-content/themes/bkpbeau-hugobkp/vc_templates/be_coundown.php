<?php
$title_box = $event_time =  $address_time = '';
extract(shortcode_atts(array(
    'title_box'     => '',
    'event_time'    => '',
    'address_time'  => '',
), $atts));

?>
<div class="next-event">
  <ul class="next-event-in row">
    <li class="col-md-4  col-sm-4 col-xs-12">
      <h3 class="pull-left"><?php echo esc_html($title_box    );?>:</h3>
      <p class="pull-left"><i class="fa fa-clock-o"></i>
      <?php echo esc_html($address_time);?> </p>
    </li>
    <li class="col-md-2 col-sm-2 col-xs-3">
      <h3 id="beau-days">00</h3>
      <p><?php esc_html_e('Days','hugo')?></p>
    </li>
    <li class="col-md-2 col-sm-2 col-xs-3">
      <h3 id="beau-hours">00</h3>
      <p><?php esc_html_e('Hours','hugo')?></p>
    </li>
    <li class="col-md-2 col-sm-2 col-xs-3">
      <h3 id="beau-minutes">00</h3>
      <p><?php esc_html_e('Minutes','hugo')?></p>
    </li>
    <li class="col-md-2 col-sm-2 col-xs-3">
      <h3 id="beau-second">00</h3>
      <p><?php esc_html_e('Seconds','hugo')?></p>
    </li>
  </ul>
  <script type="text/javascript">
  (function($) {
    "use strict";
        $('.next-event').countdown('<?php echo esc_js($event_time)?>', function(event) {
        $('#beau-days').html(event.strftime('%D'));
        $('#beau-hours').html(event.strftime('%H'));
        $('#beau-minutes').html(event.strftime('%M'));
        $('#beau-second').html(event.strftime('%S'));
    });
  })(jQuery);
  </script>
</div>