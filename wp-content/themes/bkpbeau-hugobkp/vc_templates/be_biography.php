<?php
$title_box = $bio_image = $conteqqnt ='';
extract(shortcode_atts(array(
    'title_box'     => '',
    'bio_image'  => '',
    // 'content'       => '',
), $atts));
$image_bio = wp_get_attachment_image_src($bio_image,'full');
?>
<div class="hugo-biography">
    <div class="container">
        <div class="shortcode-avatar col-md-6 col-sm-6 col-xs-12">
            <div class="hugo-main-dj">
                <span class="dj-avatar">
                    <img src="<?php echo esc_url($image_bio[0]);?>" alt="<?php echo esc_attr($title_box,'hugo');?>">
                </span>
            </div><!--End .hugo-main-dj-->
        </div>
        <div class="shortcode-description col-md-6 col-sm-6 col-xs-12">
            <div class="hugo-dj-description">
                <span class="dj-description-title"><?php echo esc_html($title_box);?></span>
                <span>
                    <p><?php printf("%s",$content);?></p>
                </span>
            </div><!--End .hugo-dj-description-->
        </div>
    </div>
</div>