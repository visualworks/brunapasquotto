<?php
$themeInfo            =  wp_get_theme();
$themeName            = trim($themeInfo['Title']);
$themeAuthor          = trim($themeInfo['Author']);
$themeAuthor_URI      = trim($themeInfo['Author URI']);
$themeVersion         = trim($themeInfo['Version']);
$textDomain           = 'hugo';

define('BEAU_BASE_URL', get_template_directory_uri());
define('BEAU_BASE', get_template_directory());
define('BEAU_THEME_NAME', $themeName);
define('BEAU_TEXT_DOMAIN', $textDomain);
define('BEAU_THEME_AUTHOR', $themeAuthor);
define('BEAU_THEME_AUTHOR_URI', $themeAuthor_URI);
define('BEAU_THEME_VERSION', $themeVersion);
define('BEAU_IMAGES', BEAU_BASE_URL .'/asset/images/');
define('BEAU_JS', BEAU_BASE_URL .'/asset/js');
define('BEAU_CSS', BEAU_BASE_URL .'/asset/css');
define('PLUGINS_PATH', 'http://plugins.beautheme.com');
define('PLUGINS_PATH_REQUIRE', BEAU_BASE.'/includes/');
define('PLUGINS_PATH_LIBS', BEAU_BASE.'/libs/');
define('BEAU_THEME_DOMAIN','hugo');

//For multiple language
$language_folder = BEAU_BASE .'/languages';
load_theme_textdomain( $textDomain, $language_folder );


if (!class_exists('beau_ThemeFunction')) {
    class beau_ThemeFunction {
        public function __construct(){
            //Get all file php in include folder
            $this -> beau_Get_files();
        }
        //Include php
        public function beau_Get_files(){
            $files = scandir(get_template_directory().'/includes/');
            foreach ($files as $key => $file) {
                if (preg_match("/\.(php)$/", $file)) {
                    require_once(get_template_directory().'/includes/'.$file);
                }
            }
        }
    }
    new beau_ThemeFunction;
}

if ( ! isset( $content_width ) ) $content_width = 900;

function hugo_option($string){
    global $beau_option;
    if (isset($beau_option[$string]) && $beau_option[$string] !=='') {
        return $beau_option[$string];
    }
    return;
}
///Beautheme support
function beau_theme_support() {
    add_theme_support( "nav-menus" );
    add_theme_support( "automatic-feed-links" );
    add_theme_support( "post-thumbnails" );
    add_theme_support( "title-tag" );
    add_theme_support( "custom-header", array());
    add_theme_support( "custom-background", array()) ;
    add_theme_support( 'page-attributes', array());
    add_editor_style();
    set_post_thumbnail_size( 780,400, true );
    add_image_size("small-thumbnail",170,170, true);
    add_image_size("single-ticket",260,375, true);
    add_image_size("classic-thumbnail",360,160, true);
    add_image_size("show-thumbnail",270,150, true);
    add_theme_support( "woocommerce" );
    add_theme_support( "post-formats", array(
         'image', 'video', 'audio',
    ));
}
add_action( 'after_setup_theme', 'beau_theme_support' );


// Register Navigation Menus
function hugo_mainmenu_location() {
    $nav_menus['main-menu'] = __( 'Main menu', 'hugo');
    register_nav_menus( $nav_menus );
}
add_action( 'init', 'hugo_mainmenu_location' );


function beau_hugo_scripts(){
    // Lib jquery
    $enableFixed = hugo_option('enable-fixed');
    wp_enqueue_script('jquery-countdown', BEAU_JS .'/jquery.countdown.js', array('jquery'), '2.7.0', FALSE);
    wp_enqueue_script('jquery-swiper-min', BEAU_JS .'/swiper.min.js', array('jquery'), '3.0.4', FALSE);
    wp_enqueue_script('jquery-bootstrap', BEAU_JS .'/bootstrap.min.js', 'javascript', '1.1', TRUE);
    wp_enqueue_script('jquery-player', BEAU_JS .'/jquery.jplayer.js', array('jquery'), '1.4.2', TRUE);
    wp_enqueue_script('jquery-playlist', BEAU_JS .'/jplayer.playlist.min.js', array('jquery'), '1.4.2', TRUE);
    wp_enqueue_script('jquery-playlist', BEAU_JS .'/jplayer.playlist.min.js', array('jquery'), '1.4.2', TRUE);
    if ( is_single()) {
        wp_enqueue_script('jquery-shareSocial', BEAU_JS .'/jquery.social-share-counter.js', array('jquery'), '1.0', TRUE);
        if (class_exists('beau_Theme_ShareSocialCount')) {
            $obj=new beau_Theme_ShareSocialCount (get_permalink());
            wp_localize_script( 'jquery-shareSocial', 'crestaShare', array( 'GPlusCount' => $obj->get_plusones() ) );
        }
    }
    if ($enableFixed =='2') {
        wp_enqueue_script('jquery-enablesticky', BEAU_JS .'/stick-menu.js', array('jquery'), '1.4.2', TRUE);
    }

    wp_enqueue_script('jquery-hugo', BEAU_JS .'/hugo.js', array('jquery'), BEAU_THEME_VERSION, TRUE);
    wp_enqueue_style('bootstrap', BEAU_CSS .'/bootstrap.css', array(), '3.3.1');
    wp_enqueue_style('font-awesome', BEAU_CSS .'/font-awesome.min.css', array(), '4.3.0');
    wp_enqueue_style('css-swiper', BEAU_CSS .'/swiper.min.css', array(), '3.0.4');
    wp_enqueue_style('css-animate', BEAU_CSS .'/animate.css', array(), '3.0.4');
    //Default, Dark, Formal
    wp_enqueue_style('roboto-condensed', '//fonts.googleapis.com/css?family=Roboto+Condensed:300', array(), BEAU_THEME_VERSION);
    wp_enqueue_style('roboto', '//fonts.googleapis.com/css?family=Roboto:400,300,400italic,700', array(), BEAU_THEME_VERSION);
    wp_enqueue_style('fullpage-style', BEAU_CSS .'/hugo.css', array(), BEAU_THEME_VERSION);
    wp_enqueue_style('default-style', BEAU_BASE_URL .'/style.css', array(), BEAU_THEME_VERSION);

    //Update style for page when change style

    if(hugo_option('hugo-style') != NULL){
        if(hugo_option('hugo-style')=='classic.css'){
            wp_enqueue_style('roboto-slab', '//fonts.googleapis.com/css?family=Roboto+Slab:400,300,700', array(), BEAU_THEME_VERSION);
        }
        if(hugo_option('hugo-style')=='formal.css'){
            wp_enqueue_style('playfair', '//fonts.googleapis.com/css?family=Playfair+Display:400,700,700italic', array(), BEAU_THEME_VERSION);
        }
        if (hugo_option('hugo-style') !="") {
            wp_enqueue_style('hugo-custom-style',BEAU_CSS.'/'.hugo_option('hugo-style'), array(), BEAU_THEME_VERSION);
        }
    }
}

if ( !is_admin() ) {
    add_action( 'wp_enqueue_scripts', 'beau_hugo_scripts' );
}

////Register widget for page
function beau_register_sidebar() {

    $col = hugo_option('footer-columns');
    $sidebarWidgets = "";
    if ($col != NULL) {
        $col    = intval($col);
    }
    if($col==0){
        $col  = 4;
    }
    $custom         = hugo_option('custom_sidebar');
    $sidebarWidgets = intval(hugo_option('sidebar_numbers'));
    $columns        = intval(12/$col);
    //Register to show sidebar on footer
    // Default Sidebar (WP main sidebar)
    if($columns==1){
        register_sidebar(
            array(  // 1
                'name' => __( 'Footer sidebar', 'hugo' ),
                'description' => __( 'This is footer sidebar ', 'hugo' ),
                'id' => 'sidebar-footer-1',
                'before_widget' => '<div class="footer-widget col-md-12 col-sm-12 col-xs-12">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>'
            )
        );
    }else{
        for ($i=1; $i <= $col; $i++) {
            register_sidebar(
                array(
                    'name' =>  sprintf(esc_html__('Footer sidebar %s', 'hugo' ), $i),
                    'id' => 'sidebar-footer-'.$i,
                    'before_widget' => '<div class="footer-widget col-md-'.$columns.' col-sm-'.$columns.' col-xs-12">',
                    'after_widget' => '</div>',
                    'before_title' => '<h3 class="widget-title">',
                    'after_title' => '</h3>'
                )
            );
        }
    }
    //Register sidebar for sidebar right
    if ($sidebarWidgets && $custom) {
        for ($i=1; $i <= $sidebarWidgets; $i++) {
            register_sidebar(
                array(
                    'name' =>  sprintf(esc_html__('Right sidebar %s', 'hugo' ), $i),
                    'id' => 'sidebar-right-'.$i,
                    'before_widget' => '<div class="right-widget col-md-12">',
                    'after_widget' => '</div></div>',
                    'before_title' => '<h2 class="widget-title right-widget-title">',
                    'after_title' => '</h2><div class="right-widget-content">'
                )
            );
        }
    }

}
add_action( 'widgets_init', 'beau_register_sidebar' );


// Numbered Pagination
if ( !function_exists( 'beau_pagination' ) ) {

    function beau_pagination($loop='', $range = 4) {
        global $wp_query;
        if ($loop=="") {
            $loop = $wp_query;
        }
        $big = 999999999; // need an unlikely integer
        $curpage = get_query_var('paged');
        if (!$curpage) {
            $curpage = get_query_var('page');
        }
        $pages = paginate_links( array(
            'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format'    => '?paged=%#%',
            'current'   => max( 1, $curpage ),
            'total'     => $loop->max_num_pages,
            'prev_next' => false,
            'type'      => 'array',
            'prev_next' => TRUE,
            'prev_text' => esc_html__('PREV','hugo'),
            'next_text' => esc_html__('NEXT','hugo'),
        ) );
        if( is_array( $pages ) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo '<div class="pagging"><ul>';
            foreach ( $pages as $page ) {
                echo "<li>$page</li>";
            }
           echo '</ul></div>';
        }
    }

}
?>