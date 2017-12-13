<?php
if (!class_exists('WPBakeryShortCode_Be_instagram')) {
    add_action( 'vc_before_init', 'bebo_Instagram', 999999);
    function bebo_Instagram() {
        $beau_perpage_arr['Show All'] = -1;
        for($i=1; $i<=50; $i++){
            $beau_perpage_arr[$i] = $i;
        }
        vc_map( array(
            "name" => __( "Instagram image", 'hugo' ),
            "base" => "be_instagram",
            'weight' => 91,
            'description' => __( 'This section show instagram image in grid', 'hugo' ),
            "params" => array(
                array(
                  'type' => 'textfield',
                  'heading' => __( 'Your text on top', 'hugo' ),
                  'param_name' => 'title_section',
                  'description' => __( 'This author facebook link.', 'hugo' ),
                ),
                array(
                  'type' => 'textfield',
                  'heading' => __( 'Your instagram user', 'hugo' ),
                  'param_name' => 'instagram_user',
                  'description' => __( 'This author facebook link.', 'hugo' ),
                ),
                array(
                  'type' => 'dropdown',
                  'heading' => __( 'Show images', 'hugo' ),
                  'param_name' => 'perpage',
                  'value' => $beau_perpage_arr,
                  'std' => 10,
                  'admin_label' => true,
                  'description' => __( 'Select columns count.', 'hugo' )
                ),
            ),
        ) );
    }
    class WPBakeryShortCode_Be_instagram extends WPBakeryShortCode {}
}
?>