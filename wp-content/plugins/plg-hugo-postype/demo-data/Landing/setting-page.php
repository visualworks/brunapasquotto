<?php
/**
 * Set front, blog page , menu
 */
function setting_page(){
    $page_setting = array(
        'front' => 'Home landing',
        'blog'  => ''
    );
    // menu array : menu_location => menu name
    $menu_setting = array(
        'main-menu'     => 'Main Menu',
        'mobile-menu'   => '',
        'small-menu'    => '',
    );
    return array(
        'page_setting' => $page_setting,
        'menu_setting' => $menu_setting
    );
}
