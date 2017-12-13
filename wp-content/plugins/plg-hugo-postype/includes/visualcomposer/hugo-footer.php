<?php
if (!class_exists('WPBakeryShortCode_Be_footer')) {
    add_action( 'vc_before_init', 'beau_Footer', 999999);
    function beau_Footer() {
      vc_map( array(
            "name" => esc_html__( "Footer","hugo" ),
            "base" => "be_footer",
            'weight' => 100,
            'category' => __( 'Beau Theme', 'hugo' ),
            'description' => esc_html__( 'This section contain footer type', 'hugo' ),
            "params" => array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Chose your footer', 'hugo' ),
                'param_name' => 'footer_type',
                'value' => array(
                'With widgets'=>'footer-content',
                'One column'=>'footer-single'
            ),
            'admin_label' => true,
            'description' => esc_html__( 'Default footer with widgets.', 'hugo' ),
            ),
            ),
       ) );
    }
    class WPBakeryShortCode_Be_footer extends WPBakeryShortCode {}
}
?>