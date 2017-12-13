<section class="product-single">
    <div class="container">
    <?php
    global $product;
     $attachment_ids = $product->get_gallery_attachment_ids();
     $id_product = $product->id;
     $pr_instock = get_post_meta($id_product, '_stock_status', TRUE );
     $_button_text   = get_post_meta($id_product, '_button_text', TRUE);
    if (!$_button_text) {
        $_button_text =  esc_html__('Add to cart','hugo');
    }
    $method = 'get';
    if (!$_product_url) {
        $_product_url = $woocommerce->cart->get_cart_url();
        $method = 'post';
    }
    ?>
    <div class="image-product pull-left col-md-7 col-sm-7 col-xs-12">
        <?php if ( has_post_thumbnail() ) : ?>
        <div class="img-gallery">
           <?php do_action('woocommerce_product_thumbnails'); ?>
        </div>
        <div class="main-thumbnail">
           <div class="images">
            <a itemprop="image" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" class="zoom" rel="thumbnails" title="<?php echo get_the_title( get_post_thumbnail_id() ); ?>"><?php echo get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) ) ?></a>
            </div>
        </div><!--End .main-thumbnail-->
        <?php else : ?>
        <img src="<?php echo woocommerce_placeholder_img_src(); ?>" alt="Placeholder" />
        <?php endif; ?>
    </div><!--End image-product-->
    <div class="info-product col-md-5 col-sm-5 col-xs-12 pull-right">
        <div class="title-product-view">
            <?php echo woocommerce_template_single_title(); ?>
            <?php if ( $product->is_on_sale() ) : ?>
            <?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . __( 'Sale!', 'hugo' ) . '</span>', $post, $product ); ?>
            <?php endif; ?>
        </div>
        <div class="more-info">
            <span class="price-rate">
                <span class="price">
                    <?php  echo woocommerce_template_single_price();?>
                </span>

                <span class="ratting">
                    <?php echo woocommerce_template_single_rating();?>
                </span>

            </span>
            <span class="short-desc">
                <?php echo woocommerce_template_single_excerpt();?>
            </span>
            <span class="more-version">

            </span>
            <span class="instock">
                <?php if ($pr_instock == "instock"): ?>
                    <strong><i class="fa fa-check-circle"></i>&nbsp;<?php esc_html_e('Instock','hugo')?></strong>
                <?php endif ?>
                <?php if (!$pr_instock == "instock"): ?>
                    <strong><i class="fa fa-ban"></i>&nbsp;<?php esc_html_e('Outstock','hugo')?></strong>
                <?php endif ?>
            </span>


            <span class="buy-button">
            <?php echo woocommerce_template_single_add_to_cart();?>
                <?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
            </span>
        </div>
    </div><!--End .info-product-->
</div>
</section><!--End .product-single-->
<?php include_once(get_template_directory()."/selekon/solike-product.php" ); ?>
