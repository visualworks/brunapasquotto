<?php
$title_section = $instagram_user = $content = $perpage =$masonry_layout = '';
extract(shortcode_atts(array(
    'title_section' => '',
    'instagram_user' =>'',
    'content' =>'',
    'perpage' =>'10',
    'masonry_layout' => 0,
), $atts));
if (function_exists('beau_instagram_image')) {
    $instag = beau_instagram_image($instagram_user, $perpage);
}else{
    $instag = array();
}
?>
<div class="hugo-author-instagram">
    <div class="title-instagram"><i class="fa fa-instagram"></i><?php echo esc_html($title_section)?></div><!--End title-instagram-->
    <div class="list-image-instagram">
        <?php
            if (count($instag) > 0) {
                foreach ($instag as $key => $value) {
        ?>
                <span class="insta-image"><a href="<?php echo esc_url($value['link_to']);?>" target="_blank"><img src="<?php echo esc_url($value['link']);?>" alt="<?php printf('Taken by %s', $instagram_user);?>"></a></span>
        <?php
                }
            }else{
                esc_html_e('No image found','hugo');
            }
        ?>
    </div><!--End list-image-instagram-->
</div><!--End landing-author-instagram-->
<?php if ($masonry_layout): ?>
<script>
(function($) {
    "use strict";
    $(window).load(function() {
      $('.list-image-instagram').isotope({
        itemSelector: '.insta-image',
        masonry: {
        }
      });
     });
})(jQuery);
</script>
<?php endif ?>