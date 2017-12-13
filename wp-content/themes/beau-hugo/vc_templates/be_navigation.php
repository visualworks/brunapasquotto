<?php
$css = $navigation_type ='';
extract(shortcode_atts(array(
    'css' => '',
    'navigation_type' => 'default-menu',
), $atts));
$favicon = $logo = "";
$logo = hugo_option('hugo-logo');
if($logo != NULL){
    $logo = $logo['url'];
}
?>
<?php if ($navigation_type =="default-menu"): ?>
<div class="navigation">
    <div class="container">
        <div id="logo" class="pull-left">
            <a href="<?php echo esc_url(home_url() )?>"><img src="<?php echo esc_attr($logo)!=""?esc_attr($logo):BEAU_IMAGES.'/logo.png';?>" alt="<?php bloginfo('name');?>"></a>
        </div>
        <button class="button-humberger-menu open-menu fa fa-bars" id="open-menu"></button>
        <ul class="social hidden-xs pull-right">
            <?php get_template_part('selekon/social-list'); ?>
        </ul>
        <div class="main-desktop-menu-view">
            <?php get_template_part('selekon/main','menu')?>
        </div>
    </div>
</div>
<?php endif ?>

<?php if ($navigation_type =="humberger-menu"): ?>
<button class="button-humberger-menu btn-show open-menu fa fa-bars" id="open-humberger-menu"></button>
<?php get_template_part('selekon/mobile', 'menu');?>
<?php endif ?>