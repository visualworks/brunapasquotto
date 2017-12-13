<?php
$video_description = $title_box = $small_image = $big_image = $youtube_url = $vimeo_url = $mp4_url = "";
extract(shortcode_atts(array(
    'title_box'     => '',
    'video_description'     => '',
    'small_image'           => '',
    'big_image'             => '',
    'youtube_url'           => '',
    'vimeo_url'             => '',
    'mp4_url'               => '',
), $atts));

$small_url = wp_get_attachment_image_src( $small_image,'full');
$big_url   = wp_get_attachment_image_src( $big_image,'full');
?>
<div class="book-player-video">
    <div class="video-pause"></div>
    <div id="player-page">
    <?php if ($youtube_url) {
        $youtube_u = 'https://www.youtube.com/embed/'.$youtube_url.'?rel=0&amp;controls=0&amp;showinfo=0';
    ?>
        <iframe id="youtube-video" width="560" height="315" src="<?php printf('%s', $youtube_u);?>" frameborder="0" allowfullscreen="0"></iframe>
    <?php }?>
    <?php if ($vimeo_url) {
            $vimeo_u = 'https://player.vimeo.com/video/'.$vimeo_url;
    ?>
        <iframe id="vimeo-video" src="<?php printf('%s', $vimeo_u)?>" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
    <?php }?>
    <?php if ($mp4_url) {?>
        <video controls id="video-mp4">
          <source src="<?php printf('%s', $mp4_url)?>" type="video/mp4">
          <?php esc_html_e("I'm sorry; your browser doesn't support HTML5 video in WebM with VP8 or MP4 with H.264.",'bebo');?>
        </video>
    <?php }?>
    </div>
    <div class="img-cover-video">
        <img src="<?php printf('%s',$big_url[0])?>" alt="<?php printf('%s',$big_url[1])?>"/>
    </div>
    <div class="container">
        <div class="player-image pull-left col-md-6 col-sm-6 col-xs-12">
            <div class="player-preview">
                <img src="<?php printf('%s', $small_url[0])?>" alt="<?php printf('%s', $small_url[1])?>">
                <span id="click-to-play" class="button-play"></span>
            </div>
        </div><!--End player-image-->
        <div class="desc-book-player animated pull-right col-md-5 col-sm-5 col-xs-12">
            <div class="descbook">
                <span class="title-video">
                    <?php echo esc_html($title_box);?>
                </span>
                <?php printf('%s', $content)?>
            </div>
        </div>
    </div><!--End container-->
</div><!--End book-player-video-->
<script type="text/javascript">

    jQuery(function ($) {
        "use strict";
        var i = null;
        $(".book-player-video").mousemove(function() {
            clearTimeout(i);
            $(".video-pause").show();
            i = setTimeout(function () {
                $(".video-pause").hide();
            }, 3000);
        }).mouseleave(function() {
            clearTimeout(i);
            $(".video-pause").hide();
        });
        $('#click-to-play').click(function(event) {
            $('.player-preview').addClass('animated fadeOutLeft');
            $('.desc-book-player').addClass('animated fadeOutRight');
            $('.img-cover-video').addClass('animated fadeOut');
            $('.book-player-video').addClass('active-video');
            <?php if ($youtube_url) {?>
            $("#youtube-video").fadeIn().attr('src', $("#youtube-video").attr('src') + '&amp;autoplay=1');
            <?php }?>
            <?php if ($vimeo_url) {?>
            $("#vimeo-video").fadeIn().attr('src', $("#vimeo-video").attr('src') + '?autoplay=1');
            <?php }?>
            <?php if ($mp4_url) {?>
            $("#video-mp4").fadeIn().trigger('play');
            <?php }?>
        });
        $('.video-pause').click(function(event) {
            <?php if ($youtube_url) {?>
            $("#youtube-video").fadeOut().attr('src', '<?php printf("%s", $youtube_u)?>');
            <?php }?>
            <?php if ($vimeo_url) {?>
            $("#vimeo-video").attr('src','').attr('src', '<?php printf("%s", $vimeo_u)?>');
            <?php }?>
            <?php if ($mp4_url) {?>
            $("#video-mp4").fadeOut().trigger('pause')
            <?php }?>
            $('.img-cover-video').removeClass('fadeOut').addClass('animated fadeIn');
            $('.player-preview').removeClass('fadeOutLeft').addClass('animated fadeInLeft');
            $('.desc-book-player').removeClass('fadeOutRight').addClass('animated fadeInRight');
            $('.book-player-video').removeClass('active-video');
            return false;
        });
    });
 </script>