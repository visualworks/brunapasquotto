<?php
    if ($loop->have_posts()) {
        $i=1;
    while ($loop->have_posts()) {
        $loop->the_post();
        $post_format  = get_post_format();
        $audio        = get_post_meta(get_the_ID(), '_beautheme_soud_cloud',TRUE);
        $audio_file   = get_post_meta(get_the_ID(), '_beautheme_audio_file', TRUE);
        $video        = get_post_meta(get_the_ID(), '_beautheme_video_embed',TRUE);
        $video_file   = get_post_meta(get_the_ID(), '_beautheme_video_file',TRUE);
        $image_file   = get_post_meta(get_the_ID(), '_beautheme_type_image',TRUE);
        global $wp_embed;
        $class        = "beau-gallery-image";
        if ($image=="") {
            $image = '<img src="http://placehold.it/170x170" alt="No image">';
        }
        if ($post_format=='video') {
            $class    = 'beau-gallery-video';
        }
        switch ($post_format) {
            case 'audio':
                if ($audio !="") {
                    $show_view = $wp_embed->run_shortcode('[embed width="780" height="450"]'.$audio.'[/embed]');
                }
            break;

            case 'video':
                if($video_file !=""){
                    if (findExtension($video_file) == 'mp4') {
                        $show_view = do_shortcode('[video width="780" height="440" mp4="'.$video_file.'"] [/video]');
                    }
                }
                if ($video !="") {
                    $show_view = $wp_embed->run_shortcode('[embed width="780" height="450"]'.$video.'[/embed]');
                }
            break;

            default:
                $show_view = '<img src="'.esc_attr($image_file).'" alt="'.get_the_title().'" />';
            break;
        }
    ?>
    <div class="modal fade" id="hugo_modal_<?php echo esc_attr($i)?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg <?php echo esc_attr($class)?>">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="<?php esc_html_e('Close','hugo')?>"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="beau-back" data-current="hugo_modal_<?php echo esc_attr($i)?>" data-next="hugo_modal_<?php echo esc_attr($i-1)?>"></div>
            <div class="beau-next" data-current="hugo_modal_<?php echo esc_attr($i)?>"  data-next="hugo_modal_<?php echo esc_attr($i+1)?>"></div>
            <?php printf('%s', $show_view);?>
            <?php if ($post_format !="video") {?>
            <?php the_title( '<h4><span class="beau-arrg"></span>', "</h4>", TRUE );?>
            <?php }?>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>
    <script>
        (function($) {
            "use strict";
            $('#hugo_modal_<?php echo esc_js($i) ?>').on('hidden.bs.modal', function () {
                $("#hugo_modal_<?php echo esc_js($i) ?> iframe").attr("src", $("#hugo_modal_<?php echo esc_js($i) ?> iframe").attr("src"));
            })
        })(jQuery);
    </script>
<?php
    $i++;
    }
}
?>