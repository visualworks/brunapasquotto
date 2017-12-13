<?php
if (!class_exists('WPBakeryShortCode_Be_coundown')) {
    add_action( 'vc_before_init', 'hugo_Coundown', 999999);
    function hugo_Coundown() {
      vc_map( array(
          "name" => esc_html__( "Coundown time","hugo" ),
          "base" => "be_coundown",
          'weight' => 95,
          'category' => __( 'Beau Theme', 'hugo' ),
          'description' => esc_html__( 'This section allow you show an image and short paragraph', 'hugo' ),
          "params" => array(
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Section title', 'hugo' ),
              'param_name' => 'title_box',
              'admin_label' => true,
              'value' => '',
              'description' => esc_html__( 'This title for comming soon.', 'hugo' )
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Address and time', 'hugo' ),
              'param_name' => 'address_time',
              'admin_label' => true,
              'value' => '',
              'description' => esc_html__( 'This address for event.', 'hugo' )
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Time coundon', 'hugo' ),
              'param_name' => 'event_time',
              'admin_label' => true,
              'value' =>'',
              'description' => esc_html__( 'Fill your date time coundown format mm/dd/YYYY', 'hugo' )
            ),
          ),
       ) );
    }
    class WPBakeryShortCode_Be_coundown extends WPBakeryShortCode {}
}
?>