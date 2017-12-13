<?php
$args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'paged' => $paged,
    'posts_per_page' => 2,
    'post__not_in' => array($id_product),
    'meta_query' => array(
        array(
            'key' => '_beautheme_is_ticket',
            'value' => null,
            'compare' => 'NOT EXISTS'
        )
    ),
);
$hugo_products = new WP_Query( $args);
wp_reset_postdata();
global $product;
$shop_page = get_page(get_option('woocommerce_shop_page_id'));
?>
<section class="products-list other-product padding-section">
    <div class="container">
     <div class="description col-md-12 col-sm-12 col-xs-12">
        <h2 class="pull-left"><?php esc_html_e('You may so like','hugo')?></h2>
        </div>
        <div class="products-list-view">
            <?php
            $i = 1;
            if( $hugo_products->have_posts() ) {
                while ($hugo_products->have_posts()) : $hugo_products->the_post();
                $_button_text   = get_post_meta(get_the_ID(), '_button_text', TRUE);
                if (!$_button_text) {
                    $_button_text = esc_html__("Add to cart","hugo");
                }
                $image =  get_the_post_thumbnail( get_the_ID(),'shop_single');

                $class_extra = "small-product";
            ?>

            <div class="product-item col-xs-12 <?php echo esc_attr($class_extra);?>">
                <?php if ( $product->is_on_sale() ) : ?>
                <?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . __( 'Sale!', 'woocommerce' ) . '</span>', $post, $product ); ?>
                <?php endif; ?>

                <div class="product-info">
                    <div class="product-title"><a href="<?php esc_attr(the_permalink())?>"><?php the_title();?></a></div>
                    <div class="product-price">
                    <?php echo $product->get_price_html(); ?>
                    </div>
                    <?php if (get_post_meta(get_the_ID(), '_purchase_note', TRUE)) {?>
                    <div class="product-note">
                    <?php echo get_post_meta(get_the_ID(), '_purchase_note', TRUE); ?></div>
                    <?php } ?>
                    <div class="product-buy">

                    <a href="<?php echo esc_attr($shop_page ->post_name); ?>/?add-to-cart=<?php echo get_the_ID();?>" rel="nofollow" data-product_id="<?php echo get_the_ID();?>" data-product_sku="" data-quantity="1" class="button b-button beau-button"><?php echo esc_html($_button_text); ?></a>

                    </div>
                </div><!--End .product-info-->
                <div class="product-image">
                    <a href="<?php esc_attr(the_permalink())?>"><?php printf('%s',$image); ?></a>
                </div><!--product-image-->
            </div><!--End product-item-->
             <?php
                endwhile;
              }
            ?>
        </div><!--.products-list-view-->
    </div><!--End container-->
</section><!--End products-list-->