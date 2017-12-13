<?php $idRand = rand(999,9999); ?>
<div class="container">

    <?php if (!$title == '' || !$content=='') {?>
        <div class="description col-md-12 col-sm-12 col-xs-12">
        <?php if (!$title=='') {?>
          <?php printf('<h2 class="pull-left">%s</h2>', $title)?>
        <?php }
        if (!$content == '') {?>
          <div class="desc-section"><p><?php echo wpb_js_remove_wpautop($content)?></p></div>
        <?php }?>
        </div>
    <?php }?>
    <div class="clearfix"></div>
    <div class="latest-news">
         <div id="news_slide_<?php echo esc_attr($idRand);?>" class="swiper-container">
            <div class="swiper-wrapper">
            <?php
            if ($loop->have_posts()) {
            while ($loop->have_posts()) {
            $loop->the_post();
            $image  = get_the_post_thumbnail(get_the_ID(), 'small-thumbnail');
            $author =  get_the_author_link();
            $post_format  =  get_post_format();
            $audio        =  get_post_meta(get_the_ID(), '_beautheme_soud_cloud',TRUE);
            $audio_file   =  get_post_meta(get_the_ID(), '_beautheme_audio_file', TRUE);
            $video        =  get_post_meta(get_the_ID(), '_beautheme_video_embed',TRUE);
            $video_file   =  get_post_meta(get_the_ID(), '_beautheme_video_file',TRUE);
            $link_post    = get_the_permalink();
            //Check post type
            global  $wp_embed;
            switch ($post_format) {
                case 'audio':
                if ($audio !="") {
                    $show_view = $wp_embed->run_shortcode('[embed]'.$audio.'[/embed]');
                }
                break;
                case 'video':
                $show_view = '<a class="feature-image-news beau-video-item" href="'.esc_attr($link_post).'">'.$image.'</a>';
                break;

                default:
                    $show_view = '<a class="feature-image-news" href="'.esc_attr($link_post).'">'.$image.'</a>';
                break;
            }
            $image = get_the_post_thumbnail(get_the_ID(), 'large');
            if (!$image) {
                $image ='<img src="http://placehold.it/570x270" alt="No image">';
            }
            ?>
                <div class="swiper-slide items-latest">
                    <span class="img-latest"><?php printf('%s', $image); ?></span>
                    <span class="info-latest">
                        <p class="items-user"><i class="fa fa-user"></i> <?php printf('%s', $author)?></p>
                        <p class="items-title"><a href="<?php echo esc_url(get_the_permalink());?>"><?php the_title();?></a></p>
                        <p class="items-time"><i class="fa fa-clock-o"></i> <?php echo get_the_date()?></p>
                    </span><!--End info-latest-->
                </div><!--End items-latest-->
            <?php
                }
            }
            ?>
            </div>
            <!-- Add Arrows -->

        </div>
        <div class="next-back-button">
            <div class="news_next_<?php echo esc_attr($idRand);?> swiper-button-next">
                <i class="fa fa-chevron-right"></i>
            </div>
            <div class="news_prev_<?php echo esc_attr($idRand);?> swiper-button-prev">
                <i class="fa fa-chevron-left"></i>
            </div>

        </div>


    </div><!--End .latest-news-->
</div><!--End container-->
<script>
    var swiper_<?php echo esc_js($idRand);?> = new Swiper('#news_slide_<?php echo esc_js($idRand);?>', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        slidesPerView:2,
        nextButton: '.news_next_<?php echo esc_attr($idRand);?>',
        prevButton: '.news_prev_<?php echo esc_attr($idRand);?>',
        spaceBetween: 30,
        breakpoints: {
            500: {
              slidesPerView: 1,
              spaceBetweenSlides: 10
            },
        }
    });
</script>