<?php
    $logo = hugo_option('hugo-logo');
    if($logo == NULL){
	   $logo = BEAU_IMAGES.'/logo.png';
    }else{
       $logo = $logo['url'];
    }
?>
<section class="navigation">
    <div class="container">
        <div id="logo" class="col-md-3 col-sm-3 hidden-xs">
            <a href="<?php echo esc_url(home_url()) ?>"><img src="<?php echo esc_attr($logo)!=""?esc_attr($logo):BEAU_IMAGES.'/logo.png';?>" alt="<?php esc_attr(bloginfo('name' ));?>"></a>
        </div>
        <ul class="social hidden-xs pull-right">
            <?php get_template_part('selekon/social-list'); ?>
        </ul>
        <?php
            wp_nav_menu(array(
                'menu' => 'main-menu',
                'menu_class'      => 'pull-right hidden-sm hidden-xs',
                'menu_id'         => 'main-nav',
                'container'       => '',
            ));
        ?>
    </div>
</section>