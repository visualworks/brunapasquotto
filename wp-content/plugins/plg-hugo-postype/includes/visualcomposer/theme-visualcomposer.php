<?php
if(!class_exists('WPBakeryShortCode')) return;
$beau_perpage_global= "";
$beau_perpage_global['Show All'] = -1;
for($i=1; $i<=50; $i++){
  $beau_perpage_global[] = $i;
}

//List feature albums
$args = array(
  'post_type' => 'album',
  'post_status' => 'publish',
);
$listFeature = new WP_Query( $args);
$lisAlbum_golbal = array();
if ($listFeature->have_posts()) {
  while ($listFeature->have_posts()) {
    $listFeature->the_post();
      $lisAlbum_golbal[get_the_title()]  = get_the_ID();
  }
}
wp_reset_postdata();

$args=array(
  'post_type'       => 'product',
  'post_status'     => 'publish',
  'posts_per_page'  => -1,
);
$listTicket_global=array();
$getTicket = new WP_Query($args);
if ($getTicket->have_posts()) {
  while ($getTicket->have_posts()) {
      $getTicket->the_post();
      $listTicket_global[get_the_title()]  = get_the_ID();
  }
}
wp_reset_postdata();


$GLOBALS['beau_arrTitle_listal'] = $lisAlbum_golbal;
$GLOBALS['listTicket']           = $listTicket_global;
$GLOBALS['beau_perpage_arr']     = $beau_perpage_global;

//Add more container
add_action( 'vc_before_init', 'beau_containerCenter', 999999);
function beau_containerCenter(){
  if(function_exists('vc_add_param')){
    vc_add_param('vc_row',array(
        'type' => 'dropdown',
        'heading' => __( 'Row stretch', 'hugo' ),
        'param_name' => 'full_width',
        'value' => array(
          __( 'Default', 'hugo' ) => '',
          __( 'Stretch row', 'hugo' ) => 'stretch_row',
          __( 'Stretch row and content', 'hugo' ) => 'stretch_row_content',
          __( 'Stretch row and content (no paddings)', 'hugo' ) => 'stretch_row_content_no_spaces',
          __( 'Stretch row and content (no paddings content in center)', 'hugo' ) => 'stretch_row_content_no_spaces_content',
        ),
        'description' => __( 'Select stretching options for row and content (Note: stretched may not work properly if parent container has "overflow: hidden" CSS property).', 'hugo' )
      )
    );

  }
}

//This show albums list in gallery or page style
add_action( 'vc_before_init', 'beau_showAlbums', 999999);
function beau_showAlbums() {
  global $beau_perpage_arr;
  $acatList = array('Show all'=>'');
  $categories = get_terms( 'album_category', array(
    'orderby'    => 'count',
    'hide_empty' => 1,
  ));

  // var_dump($categories);

  if ( ! empty( $categories ) && ! is_wp_error( $categories ) ){
     foreach ( $categories as $cate ) {
        $acatList[$cate->name] =  $cate->slug;
     }
  }
  vc_map( array(
      "name" => esc_html__( "Album list","hugo" ),
      "base" => "be_albumcat",
      'weight' => 91,
      'category' => __( 'Beau Theme', 'hugo' ),
      'description' => esc_html__( 'This section contain list albums', 'hugo' ),
      "params" => array(
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Section title', 'hugo' ),
          'param_name' => 'title',
          'value' => esc_html__('Albums list','hugo'),
          'description' => esc_html__( 'The title of section.', 'hugo' )
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Select Category', 'hugo' ),
          'param_name' => 'album_cat',
          'value' => $acatList,
          'admin_label' => true,
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Perpage', 'hugo' ),
          'param_name' => 'perpage',
          'value' => $beau_perpage_arr,
          'std' => 3,
          'admin_label' => true,
          'description' => esc_html__( 'Select columns count.', 'hugo' )
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Show paging number?', 'hugo' ),
          'param_name' => 'show_pagging',
          'value' => array( 'No' => 0,  'Yes'=>1),
          'admin_label' => true,
          'description' => esc_html__( 'It will show paging number in after.', 'hugo' )
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Show google play & Itune button', 'hugo' ),
          'param_name' => 'show_button',
          'value' => array( 'Yes'=>1, 'No' => 0),
          'admin_label' => true,
          'description' => esc_html__( 'Show or hide google play button or itune button', 'hugo' )
        ),

        array(
          'type' => 'textarea_html',
          'holder' => 'div',
          'heading' => esc_html__( 'Description', 'hugo' ),
          'param_name' => 'content',
          'value' => wp_kses(__( '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'hugo' ),array('p'))
        ),
      ),
   ) );
}
class WPBakeryShortCode_Be_albumcat extends WPBakeryShortCode {}



//show Albums
add_action( 'vc_before_init', 'beau_commingSoon', 999999);
function beau_commingSoon() {
  global $beau_perpage_arr;
   vc_map( array(
      "name" => esc_html__( "Coming soon","hugo" ),
      "base" => "be_commingsoon",
      'weight' => 93,
      'category' => __( 'Beau Theme', 'hugo' ),
      'description' => esc_html__( 'This section contain list albums', 'hugo' ),
      "params" => array(
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Section title', 'hugo' ),
          'param_name' => 'title',
          'value' => esc_html__('Coming soon','hugo'),
          'description' => esc_html__( 'The title of section.', 'hugo' )
        ),
        array(
          'type' => 'textarea_html',
          'holder' => 'div',
          'heading' => esc_html__( 'Description', 'hugo' ),
          'param_name' => 'content',
          'value' => wp_kses(__( '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'hugo' ), array("p"))
        ),
        array(
          'type' => 'date_time',
          'heading' => esc_html__( 'Date coming', 'hugo' ),
          'param_name' => 'time',
          'description' => esc_html__( 'Chose the time you want to online.', 'hugo' )
        ),

      ),
   ) );
}
class WPBakeryShortCode_Be_commingsoon extends WPBakeryShortCode {}

//Show a slider and a feature album
add_action( 'vc_before_init', 'beau_sliderSection', 999999);
function beau_sliderSection() {
  global $beau_arrTitle_listal;
  // var_dump($beau_arrTitle_listal);
  if(function_exists('get_masterslider_names')){
    $master_sliders = get_masterslider_names( false );
  }else{
    $master_sliders = array();
  }

  vc_map( array(
      "name" => esc_html__( "Slider & playlist","hugo" ),
      "base" => "be_slidersection",
      'weight' => 94,
      'category' => __( 'Beau Theme', 'hugo' ),
      'description' => esc_html__( 'This section contain list albums', 'hugo' ),
      "params" => array(
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Select your slider', 'hugo' ),
          'param_name' => 'beau_slider',
          'value' => $master_sliders,
          'std' => 0,
          'admin_label' => true,
          'description' => esc_html__( 'You must create a slider with Master slider.', 'hugo' )
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Select your playlist', 'hugo' ),
          'param_name' => 'beau_playlist',
          'value' => $beau_arrTitle_listal,
          'admin_label' => true,
          'description' => esc_html__( 'You must create a slider with Master slider.', 'hugo' )
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Playlist auto play', 'hugo' ),
          'param_name' => 'playlist_auto',
          'value' => array(
                'No'  =>'0',
                'Yes' =>'1',
            ),
          'admin_label' => true,
          'description' => esc_html__( 'Default not play.', 'hugo' ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Show slide & Playlist', 'hugo' ),
          'param_name' => 'show_all',
          'value' => array('Show all'=>'all','Show only player' => 'player', 'Show only slider'=>'slider'),
          'std' => 0,
          'admin_label' => true,
          'description' => esc_html__( 'You must create a slider with Master slider.', 'hugo' )
        ),
      ),
   ) );
}
class WPBakeryShortCode_Be_slidersection extends WPBakeryShortCode {}

//Show navigation
add_action( 'vc_before_init', 'beau_naviGation', 999999);
function beau_naviGation() {
  $menus = get_registered_nav_menus(true);
  // var_dump($menus);
  vc_map( array(
      "name" => esc_html__( "Navigation","hugo" ),
      "base" => "be_navigation",
      'weight' => 95,
      'category' => __( 'Beau Theme', 'hugo' ),
      'description' => esc_html__( 'This section contain a menu', 'hugo' ),
      "params" => array(
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Select your menu type', 'hugo' ),
          'param_name' => 'navigation_type',
          'value' => array(
                'Default menu'  =>'default-menu',
                'Humberger menu'=>'humberger-menu',
            ),
          'admin_label' => true,
          'description' => esc_html__( 'Chose your menu type.', 'hugo' )
        ),

      ),
   ) );
}
class WPBakeryShortCode_Be_navigation extends WPBakeryShortCode {}


//Member
add_action( 'vc_before_init', 'beau_Member', 999999);
function beau_Member() {
  // var_dump($menus);
  global $beau_perpage_arr;
  vc_map( array(
      "name" => esc_html__( "Members","hugo" ),
      "base" => "be_member",
      'weight' => 97,
      'category' => __( 'Beau Theme', 'hugo' ),
      'description' => esc_html__( 'This section contain member list', 'hugo' ),
      "params" => array(
          array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Section title', 'hugo' ),
            'param_name' => 'title',
            'value'   =>esc_html__('Our members','hugo'),
            'description' => esc_html__( 'The title of section only show on lis tags type.', 'hugo' )
          ),
          array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Show social icon', 'hugo' ),
            'param_name' => 'enable_social',
            'value' => array(
                'Yes' => 1,
                'No' => 0,
            ),
            'admin_label' => true,
          ),
          array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Show member', 'hugo' ),
            'param_name' => 'show_member',
            'value' => array(
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4
            ),
            'std' => 3,
            'admin_label' => true,
          ),
          array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Show bullet', 'hugo' ),
            'param_name' => 'show_bulet',
            'value' => array('Yes'=>'1', 'No'=>'0'),
            'admin_label' => true,
            'description' => esc_html__( 'Default footer with widgets.', 'hugo' ),
          ),
          array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Show items', 'hugo' ),
            'param_name' => 'perpage',
            'value' => $beau_perpage_arr,
            'std' => 24,
            'admin_label' => true,
          ),
          array(
            'type' => 'textarea_html',
            'holder' => 'div',
            'heading' => esc_html__( 'Description', 'hugo' ),
            'param_name' => 'content',
            'value' => esc_html__( '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'hugo' )
          ),
      ),
   ) );
}
class WPBakeryShortCode_Be_member extends WPBakeryShortCode {}

//Section galler


//Footer load
add_action( 'vc_before_init', 'beau_Beforesection', 999999);
function beau_Beforesection() {

  vc_map( array(
      "name" => esc_html__( "Title section","hugo" ),
      "base" => "be_beforesection",
      'weight' => 100,
      'category' => __( 'Beau Theme', 'hugo' ),
      'description' => esc_html__( 'This section contain title and description section', 'hugo' ),
      "params" => array(
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Section title', 'hugo' ),
          'param_name' => 'title',
          'value' =>esc_html__('Section title','hugo'),
          'description' => esc_html__( 'The title of section.', 'hugo' )
        ),
        array(
          'type' => 'textarea_html',
          'holder' => 'div',
          'heading' => esc_html__( 'Description', 'hugo' ),
          'param_name' => 'content',
          'value' => wp_kses(__( '<p>This is simple section description blog for. Lorem ispum dolor </p>', 'hugo' ),array('p'))
        ),
      ),
   ) );
}
class WPBakeryShortCode_Be_beforesection extends WPBakeryShortCode {}



// //Footer load



// Feature album
add_action( 'vc_before_init', 'beau_Singlefeature', 999999);
function beau_Singlefeature() {
  global $beau_arrTitle_listal;
  vc_map( array(
      "name" => esc_html__( "Single feature album","hugo" ),
      "base" => "be_singlefeature",
      'weight' => 100,
      'category' => __( 'Beau Theme', 'hugo' ),
      'description' => esc_html__( 'This section contain a single album', 'hugo' ),
      "params" => array(
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Section title', 'hugo' ),
          'param_name' => 'title',
          'value' =>esc_html__('Most of feature','hugo'),
          'description' => esc_html__( 'The title of section.', 'hugo' )
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Chose your album', 'hugo' ),
          'param_name' => 'id_album',
          'value' => $beau_arrTitle_listal,
          'admin_label' => true,
          'description' => esc_html__( 'Default with a single album.', 'hugo' ),
        ),
        array(
          'type' => 'textarea_html',
          'holder' => 'div',
          'heading' => esc_html__( 'Description', 'hugo' ),
          'param_name' => 'content',
          'value' => wp_kses(__( '<p>This is simple section description blog for. Lorem ispum dolor </p>', 'hugo' ),array('p'))
        ),
      ),
   ) );
}
class WPBakeryShortCode_Be_singlefeature extends WPBakeryShortCode {}

// Twitter message
add_action( 'vc_before_init', 'beau_Twitter', 999999);
function beau_Twitter() {
  global $beau_perpage_arr;
  vc_map( array(
      "name" => esc_html__( "Show twitter message","hugo" ),
      "base" => "be_twitter",
      'weight' => 100,
      'category' => __( 'Beau Theme', 'hugo' ),
      'description' => esc_html__( 'Show your twitter message', 'hugo' ),
      "params" => array(
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Your nick name', 'hugo' ),
          'param_name' => 'name',
          'value' =>esc_html__('hugo','hugo'),
          'description' => esc_html__( 'Your nick name on twitter.', 'hugo' )
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Show items', 'hugo' ),
            'param_name' => 'perpage',
            'value' => $beau_perpage_arr,
            'std' => 24,
            'admin_label' => true,
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Enable auto', 'hugo' ),
            'param_name' => 'auto_play',
            'value' => array(
                "No"  => 0,
                "Yes" =>1,
            ),
            'admin_label' => true,
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Layout', 'hugo' ),
            'param_name' => 'twitter_layout',
            'value' => array(
                "Horizontal" => 'hor',
                "Vertical"   => 'ver',
            ),
            'admin_label' => true,
        ),
      ),
   ) );
}
class WPBakeryShortCode_Be_twitter extends WPBakeryShortCode {}


//Detail album
add_action( 'vc_before_init', 'beau_detailAlbum', 999999);
function beau_detailAlbum() {
  global $beau_perpage_arr, $beau_arrTitle_listal;
  vc_map( array(
      "name" => esc_html__( "Show a detail album","hugo" ),
      "base" => "be_detailalbum",
      'weight' => 100,
      'category' => __( 'Beau Theme', 'hugo' ),
      'description' => esc_html__( 'Show a single album play', 'hugo' ),
      "params" => array(
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Section title', 'hugo' ),
          'param_name' => 'title',
          'value' =>esc_html__('Section title','hugo'),
          'description' => esc_html__( 'The title of section.', 'hugo' )
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Chose your album', 'hugo' ),
          'param_name' => 'id_album',
          'value' => $beau_arrTitle_listal,
          'admin_label' => true,
          'description' => esc_html__( 'Default with a single album.', 'hugo' ),
        ),
        array(
          'type' => 'textarea_html',
          'holder' => 'div',
          'heading' => esc_html__( 'Description', 'hugo' ),
          'param_name' => 'content',
          'value' => wp_kses(__( '<p>This is simple section description blog for. Lorem ispum dolor </p>', 'hugo' ),array('p'))
        ),
      ),
   ) );
}
class WPBakeryShortCode_Be_detailAlbum extends WPBakeryShortCode {}


//Show a video section
add_action( 'vc_before_init', 'beau_PlayaVideo', 999999);
function beau_PlayaVideo() {
  vc_map( array(
      "name" => esc_html__( "Play a video","hugo" ),
      "base" => "be_playavideo",
      'weight' => 100,
      'category' => __( 'Beau Theme', 'hugo' ),
      'description' => esc_html__( 'This section contain title and description section', 'hugo' ),
      "params" => array(
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Section title', 'hugo' ),
          'param_name' => 'title',
          'value' =>esc_html__('Section title','hugo'),
          'description' => esc_html__( 'The title of section.', 'hugo' )
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Link video', 'hugo' ),
          'param_name' => 'link_video',
          // 'value' =>esc_html__('Section title','hugo'),
          'description' => wp_kses(__( 'Enter Youtube, Vimeo etc URL allow embed video. See supported services at <a href="http://codex.wordpress.org/Embeds" target="_blank">http://codex.wordpress.org/Embeds</a>. ', 'hugo' ), array('a'=>array('href', 'target')))
        ),
        array(
          'type' => 'textarea_html',
          'holder' => 'div',
          'heading' => esc_html__( 'Description', 'hugo' ),
          'param_name' => 'content',
          'value' => wp_kses(__( '<p>This is simple section description blog for. Lorem ispum dolor </p>', 'hugo' ),array('p'))
        ),
      ),
   ) );
}
class WPBakeryShortCode_Be_playavideo extends WPBakeryShortCode {}
 ?>