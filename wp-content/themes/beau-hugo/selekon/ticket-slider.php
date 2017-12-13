<?php $idRand = rand(999,9999); ?>
<div class="next-tour nextour-slider">
    <div class="container">
        <div class="description col-md-12 col-sm-12 col-xs-12">
            <?php if (!$title == '' || !$content=='') {?>
                      <div class="description col-md-12 col-sm-12 col-xs-12">
                      <?php if (!$title=='') {?>
                        <h2 class="<?php echo esc_attr($title_align);?>"><?php echo esc_html($title)?></h2>
                      <?php }
                      if (!$content == '') {?>
                        <div class="desc-section"><p><?php echo wpb_js_remove_wpautop($content)?></p></div>
                      <?php }?>
                      </div>
                    <?php }?>
                </div>
                <div id="ticket_swiper_<?php echo esc_html($idRand);?>" class="next-tours swiper-container">
                <ul class="next-tours-items swiper-wrapper">
                    <?php
                    if( $getTicket->have_posts() ) {
                    while ($getTicket->have_posts()) : $getTicket->the_post();
                      $address        =  get_post_meta(get_the_ID(), '_beautheme_adress_name',TRUE);
                      $cancel         =  get_post_meta(get_the_ID(), '_beautheme_cancel',TRUE);
                      $sale_on        =  get_post_meta(get_the_ID(), '_beautheme_sale_on',TRUE);
                      $sold_out       =  get_post_meta(get_the_ID(), '_stock_status',TRUE);
                      $event_hour     =  get_post_meta(get_the_ID(), '_beautheme_event_hours',TRUE);
                      $event_on       =  get_post_meta(get_the_ID(), '_beautheme_event_on', TRUE);
                      $image          =  get_the_post_thumbnail( get_the_ID(), 'thumbnail');
                      $note           =  get_post_meta(get_the_ID(), '_purchase_note', TRUE);
                      $price          =  get_post_meta(get_the_ID(), '_regular_price', TRUE);
                      $_product_url   =  get_post_meta(get_the_ID(), '_product_url', TRUE);
                      $valz           =  get_woocommerce_currency_symbol();
                      $_button_text   = get_post_meta(get_the_ID(), '_button_text', TRUE);
                      if (!$_button_text) {
                        $_button_text =  esc_html__('Buy ticket','hugo');
                      }
                      $button_buy   ='<a href="'.get_the_permalink().'" class="beau-button active">'.$_button_text.'</a>';
                      if (!$_product_url == '') {
                        $button_buy   ='<a href="'.$_product_url.'" class="beau-button active" target="_blank">'.$_button_text.'</a>';
                      }
                      if ($sale_on) {
                        $button_buy='<a class="beau-button btn-comming">'.$_button_text.' '.$sale_on.' </a>';
                      }
                      if ($cancel) {
                        $button_buy ='<a class="beau-button active">'.esc_html__('Cancel','hugo').'</a>';
                      }
                      if ($sold_out == 'outofstock') {
                        $button_buy ='<a class="beau-button active">'.esc_html__('Sold out','hugo').'</a>';
                      }
                      if ($image=="") {
                        $image = '<img src="http://placehold.it/40x40">';
                      }
                      if (!$enable_buy) {
                        $class_extr  = 'col-md-8 col-sm-8';
                        $price_class = 'col-md-2 col-sm-2';
                      }else{
                        $class_extr  = 'col-md-5 col-sm-5';
                        $price_class ='col-md-3 col-sm-3';
                        }
                    ?>

                    <li class="swiper-slide cake-show">
                        <ul>
                            <li class="date-time">
                                <p class="c-day"><span class="date"><?php echo date_i18n('d',strtotime($event_on));?></span> <?php echo date_i18n('M Y',strtotime($event_on));?></span></p>
                            </li>
                            <li class="title-tour">
                                <a href="<?php echo esc_url(get_the_permalink());?>"><?php the_title( '<p>', '</p>', TRUE ); ?></a>
                            </li>
                            <li class="add-tour">
                                <i class="fa fa-map-marker"></i>
                                <span><?php echo esc_html($address);?></span>
                            </li>
                            <li class="ticket-price">
                                <i class="fa fa-ticket"></i>
                                <?php esc_html_e('Ticket price','hugo');?>: <?php if ($price) { ?>
                                    <?php printf('%s',$valz)?> <?php printf('%s',$price)?>
                                <?php }?>
                            </li>
                            <li>
                                <?php printf('%s',$button_buy)?>
                            </li>
                        </ul>
                    </li>

                    <?php
                        endwhile;
                      }
                    ?>
                </ul><!--End next-tours-items swiper-wrapper-->

        </div>
    </div>
    <div class="swiper-scrollbar ticket_scroll ticket_scroll_<?php echo esc_attr($idRand);?>"></div><!-- End .swiper-scrollbar-->

    <script>
        var swiper_<?php echo esc_js($idRand);?> = new Swiper('#ticket_swiper_<?php echo esc_js($idRand);?>', {
            scrollbar: '.ticket_scroll_<?php echo esc_js($idRand);?>',
            scrollbarHide: true,
            slidesPerView: 4,
            scrollbarDraggable: true,
            scrollbarHide: false,
            spaceBetween: 30,
            grabCursor: true,
            breakpoints: {
                500: {
                  slidesPerView: 1,
                  spaceBetweenSlides: 10
                },
                640: {
                  slidesPerView: 2,
                  spaceBetweenSlides: 20
                },
                780: {
                  slidesPerView: 3,
                  spaceBetweenSlides: 30
                }
            }
        });
    </script>
</div>