<?php
if (!class_exists('WPBakeryShortCode_Be_nexttours')) {
    add_action( 'vc_before_init', 'beau_nextTours', 999999);
    function beau_nextTours() {
        $beau_perpage_arr['Show All'] = -1;
        for($i=1; $i<=50; $i++){
            $beau_perpage_arr[$i] = $i;
        }
        $args=array(
          'post_type'       => 'product',
          'post_status'     => 'publish',
          'meta_query' => array(
                array(
                    'key' => '_beautheme_is_ticket',
                    'value' => 'on',
                    'compare' => '='
                ),
            ),
          'posts_per_page'  => -1,
        );
        $listTicket['Not show'] = '';
        $getTicket = new WP_Query($args);
        if ($getTicket->have_posts()) {
          while ($getTicket->have_posts()) {
              $getTicket->the_post();
              $listTicket[get_the_title()]  = get_the_ID();
          }
        }
        wp_reset_postdata();
        vc_map( array(
            "name" => esc_html__( "Nextours & Ticket","hugo" ),
            "base" => "be_nexttours",
            'weight' => 96,
            'category' => __( 'Beau Theme', 'hugo' ),
            'description' => esc_html__( 'This section contain products in ticket', 'hugo' ),
            "params" => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Section title', 'hugo' ),
                    'param_name' => 'title',
                    'value' =>esc_html__('Next tours','hugo'),
                    'group' => esc_html__('General','hugo'),
                    'description' => esc_html__( 'The title of section.', 'hugo' )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Chose stype', 'hugo' ),
                    'param_name' => 'shortcode_type',
                    'value' => array(
                        'List vertical'     =>'list',
                        'list horizontal'   =>'horizontal',
                        'Slide horizontal'  =>'slider',
                    ),
                    'std' => 1,
                    'admin_label' => true,
                    'group' => esc_html__('General','hugo'),
                    'description' => esc_html__( 'Show & hide button buy', 'hugo' )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Title show', 'hugo' ),
                    'param_name' => 'title_align',
                    'value' => array(
                        'Title center'  =>'hugo-center',
                        'Title left'    =>'pull-left',
                        'title right'   =>'pull-right',
                    ),
                    'group' => esc_html__('General','hugo'),
                    'admin_label' => true,
                    'description' => esc_html__( 'Default footer with widgets.', 'hugo' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Enable buy button', 'hugo' ),
                    'param_name' => 'enable_buy',
                    'value' => array('Yes'=>1, 'No'=>'0'),
                    'std' => 1,
                    'admin_label' => true,
                    'group' => esc_html__('General','hugo'),
                    'description' => esc_html__( 'Show & hide button buy', 'hugo' )
                ),
                array(
                    'type' => 'textarea_html',
                    'holder' => 'div',
                    'heading' => esc_html__( 'Description', 'hugo' ),
                    'param_name' => 'content',
                    'group' => esc_html__('General','hugo'),
                    'value' => wp_kses(__( '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'hugo' ), array('p'))
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Next tour', 'hugo' ),
                    'param_name' => 'nextid',
                    'value' => $listTicket,
                    'std' => 0,
                    'admin_label' => true,
                    'group' => esc_html__('List Option','hugo'),
                    'description' => esc_html__( 'Default shows numbers of item.', 'hugo' )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Items show', 'hugo' ),
                    'param_name' => 'perpage',
                    'value' => $beau_perpage_arr,
                    'std' => 0,
                    'admin_label' => false,
                    'group' => esc_html__('List Option','hugo'),
                    'description' => esc_html__( 'Default shows numbers of item.', 'hugo' )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Items show more', 'hugo' ),
                    'param_name' => 'load',
                    'value' => $beau_perpage_arr,
                    'std' => 0,
                    'admin_label' => false,
                    'group' => esc_html__('List Option','hugo'),
                    'description' => esc_html__( 'When you click and load more items.', 'hugo' )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Text next event', 'hugo' ),
                    'param_name' => 'text_next_event',
                    'value' => '',
                    'admin_label' => false,
                    'group' => esc_html__('List Option','hugo'),
                    'description' => esc_html__( 'Default show Next event in.', 'hugo' )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Item show', 'hugo' ),
                    'param_name' => 'slide_column',
                    'value' => array(1, 2, 3 ,4 ,5 ,6),
                    'std' => 4,
                    'admin_label' => false,
                    'group' => esc_html__('Slide Option','hugo'),
                    'description' => esc_html__( 'Show & hide button buy', 'hugo' )
                ),
            ),
       ) );
    }
    class WPBakeryShortCode_Be_nexttours extends WPBakeryShortCode {}
}
?>