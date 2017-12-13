<?php
$bg_image = $bg_color = $bg_image_repeat = $font_color = $padding = $margin_bottom = $css = $title = $link_video = '';
extract(shortcode_atts(array(
    'css'       => '',
    'title'     => '',
    'link_video'    => '',
), $atts));
$video =  $link_video;
global $wp_embed;
$show_view = $wp_embed->run_shortcode('[embed width="780" height="440"]'.$video.'[/embed]');
if(findExtension($video) == 'mp4'){
  $show_view = do_shortcode('[video width="780" height="440" mp4="'.$video.'"] [/video]');
}
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$attrModal = 'classPlay'.$css_class.rand(5,999);
$css_class .="description col-md-12 col-sm-12 col-xs-12";
$arrTitle = explode('$', $title);
?>
<div class="video-parallax parallax-middle">
  <h3><?php printf('%s', $arrTitle[0])?><a href="#" data-toggle="modal" data-target="#<?php echo esc_attr($attrModal)?>"><span><i class="fa fa-play"></i></span></a> <?php printf('%s', $arrTitle[1])?></h3>
  <p><?php echo  wpb_js_remove_wpautop($content)?></p>
</div>
<div class="modal fade" id="<?php echo esc_attr($attrModal)?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg beau-gallery-video">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="<?php esc_html_e('Close','hugo')?>"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <?php
        printf('%s', $show_view);
       ?>
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>
<script>
(function($) {
  "use strict";
    $('#<?php echo esc_js($attrModal)?>').on('hidden.bs.modal', function () {
        $("#<?php echo esc_js($attrModal)?> iframe").attr("src", $("#<?php echo esc_js($attrModal)?> iframe").attr("src"));
        $('.mejs-playpause-button').click();
    })
    $('#<?php echo esc_js($attrModal)?>').on('hidden.bs.modal', function () {
        $('.vc_parallax').css('overflow', 'hidden');
    })
    $('#<?php echo esc_js($attrModal)?>').on('show.bs.modal', function () {
        $('.vc_parallax').css('overflow', 'visible');
    })
})(jQuery);
</script>