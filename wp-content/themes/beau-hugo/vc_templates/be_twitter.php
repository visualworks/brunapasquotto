<?php
// var_dump($atts);
$name = $auto_play = $twitter_layout = "";
$perpage = 15;
extract(shortcode_atts(array(
    'name'         		=> 'hugo',
    'perpage'           => '15',
    'auto_play'         => '0',
    'twitter_layout'  	=> 'hor',
), $atts));
$idRand = rand(999, 9999);
$classExtr = "twitterlayout-".$twitter_layout;
?>
<div class="container <?php echo esc_attr($classExtr);?>">
    <div class="name-twitter">
    	<span class="logo-twitter">
    		<i class="fa fa-twitter"></i>
    	</span>
    	<p>@<?php echo esc_html($name)?></p>
    </div>
    <div id="twitter-<?php echo esc_attr($idRand);?>" class="twitter-message">
    	<div class="swiper-container">
            <div class="swiper-wrapper">
                <?php $twitterMessage = latest_tweets_render($perpage);
    	        	 foreach ($twitterMessage as $key => $value) {?>
    	        		<div class="swiper-slide">
    		            	<?php printf('%s',$value)?>
    		            </div>
    	        <?php }?>
            </div>
        </div>
    </div>
    <?php if ($twitter_layout == 'hor') {?>
    <div class="clearfix"></div>
    <?php  }?>

    <div id="pagging-<?php echo esc_attr($idRand);?>" class="pagging-twitter"></div>
    <script type="text/javascript">
        (function($){
            'use strict';
            //Twitter message slide
            var twitter_<?php echo esc_js($idRand);?> = new Swiper('#twitter-<?php echo esc_attr($idRand);?> .swiper-container', {
                pagination: '#pagging-<?php echo esc_attr($idRand);?>',
                slidesPerView: 1,
                speed: 1000,
                autoplay: <?php echo esc_js($auto_play);?>,
                slidesPerColumn: 1,
                grabCursor:true,
                delay:200,
                paginationClickable: true,
                <?php if ($twitter_layout == 'hor') {?>
                spaceBetween: 0,
                <?php  }?>
                <?php if ($twitter_layout == 'ver') {?>
                spaceBetween: 20,
                direction: 'vertical',
                <?php  }?>
            });

        })(jQuery)
    </script>
</div>