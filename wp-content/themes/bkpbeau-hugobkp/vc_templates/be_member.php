<?php
$title = $description = $show_member = $perpage = $show_bulet = $enable_social = '';
extract(shortcode_atts(array(
    'title'         => '',
    'description'   => '',
    'perpage'       => '9',
    'show_bulet'    => '1',
    'show_member'   => '',
    'enable_social' => '1',
), $atts));
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$args = array(
  'post_type'       => 'member',
  'posts_per_page'  => $perpage,
  'paged' => $paged,
);
$postType = new WP_Query( $args);
wp_reset_postdata();
$randID = rand(999,9999);
?>
<div class="our-member">
  <div class="container">
    <?php if (!$title == '' || !$content=='') {?>
        <div class="description col-md-12 col-sm-12 col-xs-12">
        <?php if (!$title=='') {?>
          <?php printf('<h2>%s</h2>', $title)?>
        <?php }
        if (!$content == '') {?>
          <div class="desc-section"><p><?php echo wpb_js_remove_wpautop($content)?></p></div>
        <?php }?>
        </div>
    <?php }?>
    <div id="member-list-<?php echo esc_attr($randID);?>" class="contain-member">
      <div class="swiper-container">
            <div class="swiper-wrapper">
            <?php
              if ($postType->have_posts()) {
                while ($postType->have_posts()) {
                $postType->the_post();
                $facebook     =  get_post_meta(get_the_ID(), '_beautheme_facebook', TRUE);
                $twitter      =  get_post_meta(get_the_ID(), '_beautheme_twitter_acc', TRUE);
                $instagram    =  get_post_meta(get_the_ID(), '_beautheme_instagram', TRUE);
                $job          =  get_post_meta(get_the_ID(), '_beautheme_member_job', TRUE);
                $image        =  get_the_post_thumbnail(get_the_ID(), 'small-thumbnail');
                if ($image=="") {
                  $image = '<img src="http://placehold.it/170x170">';
                }
                ?>
                <div class="swiper-slide">
                    <div class="avatar">
                    <?php printf('%s', $image)?>
                    <?php if ($enable_social): ?>
                        <ul>
                          <?php if ( $facebook ): ?>
                            <li><a href="<?php echo esc_url($facebook)?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                          <?php endif ?>
                          <?php if ($twitter): ?>
                            <li><a href="<?php echo esc_url($twitter)?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                          <?php endif ?>
                          <?php if ($instagram): ?>
                            <li><a href="<?php echo esc_url($instagram)?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                          <?php endif ?>
                          </ul>
                    <?php endif ?>
                    </div><!--End .avatar-->
                    <div class="info">
                      <?php the_title( '<span class="member-name">', '</span>', TRUE );?>
                      <span class="member-job"><?php echo esc_html($job)?></span>
                    </div>
                  </div>
            <?php  }
            }?>
            </div>
        </div>
        <!-- Add Pagination -->
        <?php if ($show_bulet==1) { ?>
        <div class="member-pagination<?php echo esc_attr($randID)?> paging-slider"></div>
        <?php }?>
        <!-- Member next back -->
        <div class="control-slider left member-button-prev<?php echo esc_attr($randID);?>"><i class="fa fa-arrow-left"></i></div>
        <div class="control-slider right member-button-next<?php echo esc_attr($randID);?>"><i class="fa fa-arrow-right"></i></div>
    </div>
    <script type="text/javascript">
        (function($){
            "use strict";
            ///Member classic
            var meNum = <?php echo esc_js($show_member);?>;
            var meCol = 2;
            // Onre size
             $(window).on("resize", function () {
                //Resize window
                if ($(window).width() < 767) {
                  meNum = 1;
                };
            });
              //Our member slide
            var member = new Swiper('#member-list-<?php echo esc_js($randID);?> .swiper-container', {
                pagination: '.member-pagination<?php echo esc_js($randID)?>',
                slidesPerView: <?php echo esc_js($show_member);?>,
                slidesPerGroup: <?php echo esc_js($show_member);?>,
                slidesPerColumn: 1,
                paginationClickable: true,
                spaceBetween: 0,
                grabCursor:true,
                nextButton:'.member-button-next<?php echo esc_js($randID);?>',
                prevButton:'.member-button-prev<?php echo esc_js($randID);?>',
                breakpoints: {
                    500: {
                        slidesPerView: 1,
                        slidesPerGroup: 1,
                    },
                    640: {
                        slidesPerView: 2,
                        slidesPerGroup: 2,
                    },
                    780: {
                        slidesPerView: 3,
                        slidesPerGroup: 3,
                    }
                }
            });
        })(jQuery)
    </script>
    <style type="text/css">
    .our-member .contain-member .swiper-container .swiper-wrapper .swiper-slide:nth-child(<?php echo esc_attr($show_member);?>n):before{
        border-right: 1px solid #959595;
    }
    </style>
  </div>
</div>
