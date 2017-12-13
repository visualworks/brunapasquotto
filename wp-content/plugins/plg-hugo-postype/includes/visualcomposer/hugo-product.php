<?php
if (!class_exists('WPBakeryShortCode_Be_product')) {
    add_action( 'vc_before_init', 'hugo_product', 999999);
    function hugo_product() {
    $beau_perpage_arr['Show All'] = -1;
    for($i=1; $i<=50; $i++){
        $beau_perpage_arr[$i] = $i;
    }
    vc_map( array(
          "name" => esc_html__( "Product list","hugo" ),
          "base" => "be_product",
          'weight' => 95,
          'category' => __( 'Beau Theme', 'hugo' ),
          'description' => esc_html__( 'This section allow you show list products', 'hugo' ),
          "params" => array(
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Section title', 'hugo' ),
              'param_name' => 'title_box',
              'value' => esc_html__('Product','hugo'),
              'description' => esc_html__( 'The title of section only show on list tags type.', 'hugo' )
            ),
            array(
              'type' => 'dropdown',
              'heading' => esc_html__( 'Perpage', 'hugo' ),
              'param_name' => 'perpage',
              'value' => $beau_perpage_arr,
              'std' => 4,
              'admin_label' => true,
              'description' => esc_html__( 'Select post count.', 'hugo' )
            ),

          ),
       ) );
    }
    class WPBakeryShortCode_Be_product extends WPBakeryShortCode {}
}
?>