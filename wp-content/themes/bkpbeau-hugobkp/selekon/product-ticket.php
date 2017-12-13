<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo esc_html($google_api_key)?>&sensor=false&libraries=places,geometry&v=3.18"></script>
<section class="news-categories-standard detail-news">
    <div class="container">
        <div class="col-md-8 col-sm-8 col-xs-12">
        <script type="text/javascript">
            google.maps.event.addDomListener(window, 'load', init);
            function init() {
                var mapOptions = {
                    zoom: 16,
                    center: new google.maps.LatLng(<?php echo esc_js($map_lat)?>, <?php echo esc_js($maplong)?>),
                    styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]}]
                };
                var mapElement = document.getElementById('hugo-event-map');
                var map = new google.maps.Map(mapElement, mapOptions);
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(<?php echo esc_attr($map_lat)?>, <?php echo esc_attr($maplong)?>),
                    map: map,
                    icon: "<?php echo esc_js($map_marker_custom)?>",
                    title: '<?php echo esc_js(get_the_title())?>'
                });
            }
        </script>
        <!-- <span class="thumbs"> -->
            <div id="hugo-event-map"></div>
        <!-- </span> -->
        <spam class="author">
            <ul>
                <li><i class="fa fa-user"></i><?php echo get_the_author_link()?></li>
                <li><i class="fa fa-clock-o"></i> <?php echo get_the_date()?></li>
            </ul>
        </spam>
        <span class="excerp-news content-news">
            <h1 class="beau-title"><a href="<?php esc_attr(the_permalink())?>"><?php the_title()?></a></h1>
            <div class="content-post">
                <?php the_content(); ?>
            </div>
            <div class="clearfix"></div>
            <div class="contact-info">
                <h3 class="contact-title"><?php _e('Contact info','hugo')?></h3>
                <?php if ($address): ?>
                <span class="desc"><?php echo esc_html($address)?></span>
                <?php endif ?>
                <ul>
                    <?php if ($mobile): ?>
                    <li><i class="fa fa-phone"></i> <?php echo esc_html($mobile)?></li>
                    <?php endif ?>
                    <?php if ($email): ?>
                    <li><i class="fa fa-envelope"></i> <?php echo esc_html($email)?></li>
                    <?php endif ?>
                </ul>

            </div>
        </span>

        <div class="clearfix"></div>

        <?php get_template_part('selekon/tags-share');?>
        <?php comments_template('comments.php');?>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-12 pull-right hugo-right-cols">
        <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
            <div class="right-widget buyproduct">
                <ul>
                    <li>
                        <?php printf('%s', $image)?>
                        <form class="cart" method="<?php printf('%s', $method);?>" enctype='multipart/form-data' action="<?php echo esc_attr($_product_url)?>">
                            <input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />
                            <button type="submit" class="beau-button"><?php printf('%s', $_button_text);?></button>
                        </form>
                        <?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
                    </li>
                    <li><?php the_title("<h2>","</h2>", TRUE)?></li>
                    <li><i class="fa fa-calendar"></i><?php printf('%s', $event_on)?></li>
                    <li><i class="fa fa-map-marker"></i><span class="addRight"><?php printf('%s', $address)?></span></li>
                </ul>
            </div>

            <?php if($video_trailer !=""){?>
            <div class="right-widget trailler">
                <h2><?php _e('Video trailer','hugo')?></h2>
                <span class="video-trailler">
                <?php
                global $wp_embed;
                printf('%s', $wp_embed->run_shortcode('[embed]'.$video_trailer.'[/embed]'));
                ?>
                </span>
            </div>
            <?php }?>
            <div class="right-widget recent-posts">
                <h2><?php _e('News','hugo')?></h2>
                <?php
                if(is_category() || is_single()){
                  $cat = get_category_by_path(get_query_var('category_name'),false);
                  $current = $cat->cat_ID;
                  $current_name = $cat->cat_name;
                  $current_cat_slug = $cat->slug;
                }
                else{
                    $current = $current_name = $current_cat_slug ='';
                }
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => '3',
                    'paged'             => $paged,
                    'category'          => $current,
                    'category_name'     => $current_name,
                    'orderby'           => 'post_date',
                    'order'             => 'DESC',
                );
                $postType = new WP_Query( $args);
                ?>
                <ul>
                <?php
                if ($postType->have_posts()) {
                    while ($postType->have_posts()) {
                    $postType->the_post();
                    $image          =  get_the_post_thumbnail(get_the_ID(), 'thumbnail');
                    if ($image=="") {
                        $image = '<img src="http://placehold.it/70x70" alt="No image" />';
                    }
                ?>
                    <li>
                        <a class="imgthumb"><?php printf('%s', $image)?></a>
                        <?php the_title( "<h3>", "</h3>", TRUE );?> <a class="read-more" href="<?php echo the_permalink();?>"><?php esc_html_e('Read more >>','hugo')?></a>
                    </li>
                <?php }?>
                </ul>
                <?php }?>
                <?php wp_reset_postdata()?>
            </div>
        </div>
    </div>
</section>