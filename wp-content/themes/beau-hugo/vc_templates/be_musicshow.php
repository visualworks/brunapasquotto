<?php
$title_box = $event_image = $date_from = $date_to = $address = $map_link = $price = $link_buy = $button_text = $booking_phone = $booking_email = '';
extract(shortcode_atts(array(
    'title_box'         => '',
    'event_image'       => '',
    'date_from'         => '',
    'date_to'           => '',
    'address'           => '',
    'map_link'          => '',
    'price'             => '',
    'link_buy'          => '',
    'button_text'       => esc_html__('Buy Ticket','hugo'),
    'booking_phone'     => '',
    'booking_email'     => '',
), $atts));
$music_image = wp_get_attachment_image_src($event_image,'full');
$image = $music_image[0];
if ($image == "") {
    $image = 'http://placehold.it/370x520';
}
?>
<div class="music-show">
    <div class="music-picture col-md-4 col-sm-4 col-xs-12">
        <img src="<?php echo esc_url($image);?>" alt="<?php echo esc_attr($title_box,'hugo');?>">
    </div><!--End .music-picture-->
    <div class="event-info col-md-8 col-sm-8 xol-xs-12">
        <div class="title-box pull-left"><?php echo esc_html($title_box);?></div>
        <div class="clearfix"></div>
        <div class="event-address-date">
            <span><i class="fa fa-clock-o"></i>
                <?php echo esc_html($date_from);?>
            </span>
            <span><i class="fa fa-calendar"></i>
                <?php echo esc_html($date_to);?>
            </span>
            <span>
                <i class="fa fa-map-marker"></i>
                <a href="<?php echo esc_url($map_link);?>"><?php echo esc_html($address);?></a>
            </span>
        </div>
        <div class="price-buy">
            <span class="price"><?php esc_html_e('Price','hugo');?>: <?php echo esc_html($price);?></span>
            <span class="btn-buy pull-right">
                <a class="beau-button gradient b-button active" href="<?php echo esc_html($link_buy);?>"><?php echo esc_html($button_text);?> <i class=
                "fa fa-ticket"></i></a>
            </span>
        </div>
        <div class="content-show">
            <p><?php printf('%s',$content);?></p>
        </div>
        <div class="contact-show">
            <span class="title-contact"><?php esc_html_e('Contact to booking','hugo');?></span>
            <span class="phone">
                <i class="fa fa-phone"></i>
                <?php echo esc_html($booking_phone);?>
            </span>
            <span class="email">
                <i class="fa fa-envelope"></i>
                <?php echo esc_html($booking_email);?>
            </span>
        </div>
    </div><!--End .event-info-->
</div><!--End music-show-->