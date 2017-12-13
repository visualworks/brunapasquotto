<?php
if (!class_exists('WPBakeryShortCode_Be_post')) {
    add_action( 'vc_before_init', 'beau_showPost', 999999);
    function beau_showPost() {
        $beau_perpage_arr['Show All'] = -1;
        for($i=1; $i<=50; $i++){
            $beau_perpage_arr[$i] = $i;
        }
        $catList = array();
        $categories = get_terms( 'category', array(
            'orderby'    => 'count',
            'hide_empty' => 1,
        ));
        $catList['Show all'] = '';
        if ( ! empty( $categories ) && ! is_wp_error( $categories ) ){
            foreach ( $categories as $cate ) {
                $catList[$cate->name] =  $cate->slug;
            }
        }
        vc_map( array(
          "name" => esc_html__( "List post","hugo" ),
          "base" => "be_post",
          'weight' => 92,
          'category' => __( 'Beau Theme', 'hugo' ),
          'description' => esc_html__( 'This section contain list post', 'hugo' ),
          "params" => array(
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Section title', 'hugo' ),
              'param_name' => 'title',
              'value' => esc_html__('Feature post','hugo'),
              'description' => esc_html__( 'The title of section only show on list tags type.', 'hugo' )
            ),
            array(
              'type' => 'dropdown',
              'heading' => esc_html__( 'Chose your category', 'hugo' ),
              'param_name' => 'category_slug',
              'value' => $catList,
              'admin_label' => true,
              'description' => esc_html__( 'Default footer with widgets.', 'hugo' ),
            ),
            array(
              'type' => 'dropdown',
              'heading' => esc_html__( 'Perpage', 'hugo' ),
              'param_name' => 'perpage',
              'value' => $beau_perpage_arr,
              'std' => 3,
              'admin_label' => true,
              'description' => esc_html__( 'Select post count.', 'hugo' )
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
              'heading' => esc_html__( 'Show feature post?', 'hugo' ),
              'param_name' => 'show_feature',
              'value' => array( 'No' => 'off',  'Yes'=>'on'),
              'admin_label' => true,
              'description' => esc_html__( 'It will only feature post or no', 'hugo' )
            ),
            array(
              'type' => 'dropdown',
              'heading' => esc_html__( 'Show type', 'hugo' ),
              'param_name' => 'show_type',
              'value' => array(
                'Standard'  =>'standard',
                'List tags' =>'list-grid',
                'Slider'    =>'slider'
                ),
              'std' => 'list-grid',
              'admin_label' => true,
              'description' => esc_html__( 'Select type to show.', 'hugo' )
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
    class WPBakeryShortCode_Be_post extends WPBakeryShortCode {}

}
?>