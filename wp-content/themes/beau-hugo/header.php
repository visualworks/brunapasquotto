<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <!--[if lt IE 9]>
        <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/asset/js/html5.js"></script>
    <![endif]-->
    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <?php
    $favicon = hugo_option('hugo-favicon');
    if ($favicon != NULL) {?>
        <link rel="shortcut icon" href="<?php echo esc_attr($favicon['url']);?>" />
    <?php }?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php get_template_part('selekon/mobile', 'menu');?>
<?php
    $logo = hugo_option('hugo-logo');
    if ($logo != NULL) {
        $logo = $logo['url'];
    }
?>
<section class="navigation">
    <div class="container">
        <div id="logo" class="pull-left">
            <a href="<?php echo esc_url( home_url() )?>"><img src="<?php echo esc_attr($logo)!=""?esc_attr($logo):BEAU_IMAGES.'/logo.png';?>" alt="<?php esc_attr(bloginfo('name'));?>"></a>
        </div>
        <button class="button-humberger-menu open-menu fa fa-bars" id="open-menu"></button>
        <ul class="social hidden-xs pull-right">
            <?php get_template_part('selekon/social-list'); ?>
        </ul>
        <div class="main-desktop-menu-view">
            <?php get_template_part('selekon/main','menu');?>
        </div>
    </div>
</section>