<?php
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
$valz           = '$';
if (function_exists('get_woocommerce_currency_symbol')) {
    $valz       =  get_woocommerce_currency_symbol();
}
$_button_text   = get_post_meta(get_the_ID(), '_button_text', TRUE);
if (!$_button_text) {
    $_button_text =  esc_html__('Buy ticket','hugo');
}
$button_buy   ='<a href="'.get_the_permalink().'" class="beau-button active">'.$_button_text.'</a>';
if (!$_product_url == '') {
$button_buy   ='<a href="'.$_product_url.'" class="beau-button active" target="_blank">'.$_button_text.'</a>';
}
if ($sale_on) {
$button_buy='<a class="beau-button btn-comming">'.$_button_text.' '.date_i18n( get_option( 'date_format' ), strtotime($sale_on)).' </a>';
}
if ($cancel) {
$button_buy ='<a class="beau-button btn-cancel">'.esc_html__('Cancel','hugo').'</a>';
}
if ($sold_out == 'outofstock') {
$button_buy ='<a class="beau-button btn-soldout">'.esc_html__('Sold out','hugo').'</a>';
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
<li class="row">
    <ul>
        <li class="col-md-2 col-sm-2 col-xs-12">
            <p><?php echo date_i18n('d M',$event_on);?></p>
            <span><?php echo date('Y',$event_on);?></span>
        </li>
        <li class="<?php echo esc_attr($class_extr)?> col-xs-12">
            <?php printf('%s', $image)?>
            <p><a href="<?php echo get_the_permalink()?>"><?php echo get_the_title()?></a></p>
            <span> <i class="fa fa-map-marker"></i><?php printf('%s', $address)?></span>
        </li>
        <li class="<?php echo esc_attr($price_class);?> col-xs-12">
            <?php if ($price) { ?>
            <p><?php printf('%s',$valz)?> <?php printf('%s',$price)?></p>
            <?php }?>
            <span><?php printf('%s',$note)?></span>
        </li>
        <?php if ($enable_buy): ?>
        <li class="col-md-2 col-sm-2 col-xs-12">
            <?php printf('%s',$button_buy)?>
        </li>
    <?php endif ?>
    </ul>
</li>