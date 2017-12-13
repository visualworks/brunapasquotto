<?php
if ($type_show !="all") {
    $class_type = " class_type_single";
}else{
    $class_type="";
}

if ($show_bulet_pagging) {
    $classGal   = 'image-gallery-view contain-gallery';
    $containNer = 'swiper-container';
    $swpperWrap = 'swiper-wrapper';
}else{
    $classGal   = 'list-Media-view list-contain';
    $containNer = 'gallery-container';
    $swpperWrap = 'gallery-wrapper';
}
if ($gallery_type == 0) {
    $idGale = 'classic-gallery';
}else{
    $idGale = 'normal-gallery';
    $classGal .=' normal-gallery'.$class_type;
}
$randID = rand(999,9999);
?>
<div class="gallery">
    <div class="container">
        <div class="description col-md-12 col-sm-12 col-xs-12">
            <h2><?php echo esc_html($title)?></h2>
            <?php if ($show_bulet_pagging): ?>
            <?php if($type_show == 'all'){?>
                <ul class="gallery-category beautheme_galcat">
                    <li id="beau-photo"><?php esc_html_e('Photos','hugo')?></li>
                    <li id="beau-videos"><?php esc_html_e('Videos','hugo')?></li>
                </ul>
                <script>
                    (function($) {
                        "use strict";
                        $('.beautheme_galcat li').click(function() {
                            $('.swiper-slide').removeClass('swip_active');
                            $('.beautheme_galcat li').removeClass('active');
                            $(this).addClass('active');
                            var toCl = $(this).attr('id');
                            if (toCl==='beau-photo') {
                                $('.beau-video').addClass('swip_active');
                            }
                            if (toCl==='beau-videos') {
                                $('.beau-image').addClass('swip_active');
                            }
                        });
                        //Tap out fillter
                        $(document).on('click touchstart tab', function (e) {
                            if ($(e.target).closest(".beau-video").length === 0 || $(e.target).closest(".beau-image").length === 0 ) {
                                $(this).removeClass('swip_active');
                            }
                        });

                        $(window).on('scroll', function(){
                            $('.contain-gallery .swiper-slide').removeClass('swip_active');
                            $('.beautheme_galcat li').removeClass('active');
                        });
                    })(jQuery);
                </script>
            <?php }?>
            <?php endif ?>
        </div>
        <div id="gallery-<?php echo esc_attr($randID);?>" class="<?php echo esc_attr($idGale)?> <?php echo esc_attr($classGal)?>">
            <div class="<?php echo esc_attr($containNer)?>">
                <div class="<?php echo esc_attr($swpperWrap)?>">
                    <?php
                        if ($loop->have_posts()) {
                        $i=1;
                        while ($loop->have_posts()) {
                            $loop->the_post();
                            $post_format  =  get_post_format();
                            $image        =  get_the_post_thumbnail(get_the_ID(), 'small-thumbnail');
                            $class        = "beau-image";
                            if ($image=="") {
                                $image = '<img src="http://placehold.it/170x170" alt="No image" />';
                            }
                            if ($post_format=='video') {
                                $class    = 'beau-video';
                                $plus     = 'fa-play';
                            }else{
                                $plus     = 'fa-plus';
                            }
                            $classLast="";
                            if ($i>2) {
                                if ($i%6==0) {
                                    $classLast = " last";
                                }
                            }
                        ?>
                        <div class="swiper-slide<?php echo esc_html($classLast)?> <?php echo esc_attr($class)?> <?php echo esc_attr($post_format)?>">
                            <a class="link-<?php echo  esc_html($class)?>" data-toggle="modal" data-target="#hugo_modal_<?php echo esc_attr($i) ?>"><span class="beau-plus"><i class="fa <?php echo esc_attr($plus)?>"></i></span></a>
                            <a class="link-<?php echo esc_html($class)?>" data-toggle="modal" data-target="#hugo_modal_<?php echo esc_attr($i) ?>"><?php printf('%s', $image)?></a>
                        </div>
                        <!-- Modal -->
                    <?php
                        $i++;
                        }
                    }
                    ?>
                </div>
            </div>
            <!-- Add Pagination -->
            <?php if ($show_bulet_pagging == 1) {?>
            <div class="gallery-pagination<?php echo esc_attr($randID);?> paging-slider"></div>
            <?php }?>
            <?php if ($show_bulet_pagging == 0) {
                echo  beau_pagination($loop);
            }?>
        </div>
    </div>
</div>
<script>
    (function($){
        "use strict";
        //Setup swipper gallery
        var galleryImage<?php echo esc_js($randID);?> = new Swiper('#gallery-<?php echo esc_attr($randID);?> .swiper-container', {
            pagination: '.gallery-pagination<?php echo esc_attr($randID);?>',
            slidesPerView: 6,
            slidesPerColumn: 2,
            spaceBetween: 30,
            slidesPerGroup: 6,
            paginationClickable: true,
            grabCursor:true,
            breakpoints: {
                500: {
                    slidesPerView: 2,
                    slidesPerColumn: 2,
                    spaceBetween: 30,
                    slidesPerGroup: 2,
                },
                640: {
                  slidesPerView: 3,
                    slidesPerColumn: 2,
                    spaceBetween: 30,
                    slidesPerGroup: 3,
                },
                780: {
                    slidesPerView: 4,
                    slidesPerColumn: 2,
                    spaceBetween: 30,
                    slidesPerGroup: 4,
                }
            }
      });
    })(jQuery)
</script>