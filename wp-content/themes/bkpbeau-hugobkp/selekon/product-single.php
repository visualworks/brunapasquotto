<section class="product-single">
    <div class="container">
    <?php
    global $product;
     $attachment_ids = $product->get_gallery_attachment_ids();
     $id_product = $product->id;
     $pr_instock = get_post_meta($id_product, '_stock_status', TRUE );
     $_button_text   = get_post_meta($id_product, '_button_text', TRUE);
    if (!$_button_text) {
        $_button_text =  esc_html__('Buy ticket','hugo');
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
            <h1 class="title-product"><?php the_title();?></h1>
            <?php if ( $product->is_on_sale() ) : ?>
            <?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . __( 'Sale!', 'hugo' ) . '</span>', $post, $product ); ?>
            <?php endif; ?>
        </div>
        <div class="more-info">
            <span class="price-rate">
                <span class="price">
                    <?php echo $product->get_price_html(); ?>
                </span>
                <?php if ( $rating_html = $product->get_rating_html() ) : ?>
                <span class="ratting">
                        <?php echo $rating_html; ?>

                </span>
                <?php endif; ?>
            </span>
            <span class="short-desc">
                <?php the_excerpt();?>
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

               <form class="cart" method="<?php printf('%s', $method);?>" enctype='multipart/form-data' action="<?php echo esc_attr($_product_url)?>">
                    <input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />
                    <span class="quantity-pro">
                        <?php esc_html_e('Qty','hugo');?>:
                        <input type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="input-text qty text" size="4">
                    </span>
                    <button type="submit" class="gradient beau-button btn-buyproduct"><?php printf('%s', $_button_text);?></button>
                </form>
                <?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
            </span>
        </div>
    </div><!--End .info-product-->
</div>
</section><!--End .product-single-->
<?php include_once(get_template_directory()."/selekon/solike-product.php" ); ?>
