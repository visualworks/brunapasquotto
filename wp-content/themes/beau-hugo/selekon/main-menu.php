<?php
$nav_menu = 'main-menu';
if ( has_nav_menu( $nav_menu ) ) {
    wp_nav_menu(
        array(
            'theme_location' => $nav_menu,
            'depth'          => 3,
            'menu'           => 'main-menu',
            'menu_class'     => 'pull-right hidden-sm hidden-xs',
            'menu_id'        => 'main-nav',
            'container'      => '',
        )
    );
}
?>