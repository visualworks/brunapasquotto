<?php
if (!class_exists('WPBakeryShortCode_Be_map')) {
    add_action( 'vc_before_init', 'beau_mapShow', 999999);
    function beau_mapShow() {
        vc_map( array(
          "name" => esc_html__( "Hugo map","hugo" ),
          "base" => "be_map",
          'weight' => 92,
          'category' => __( 'Beau Theme', 'hugo' ),
          'description' => esc_html__( 'This section contain list post', 'hugo' ),
          "params" => array(
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Latitude', 'hugo' ),
              'param_name' => 'latitude',
              'admin_label' => true,
              'value' => '',
              'description' => esc_html__( 'You can find your latitude from http://latlong.net', 'hugo' )
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Longitude', 'hugo' ),
              'param_name' => 'longitude',
              'admin_label' => true,
              'value' => '',
              'description' => esc_html__( 'You can find your longitude from http://latlong.net', 'hugo' )
            ),
            array(
              'type' => 'dropdown',
              'heading' => esc_html__( 'Enable scroll', 'hugo' ),
              'param_name' => 'enable_scroll',
              'value' => array(
                    'No' => 'false',
                    'Yes' =>'true',
                ),
              'admin_label' => true,
              'description' => esc_html__( 'Select post count.', 'hugo' )
            ),
            array(
                'type' => 'attach_image',
                'heading' => __( 'Map marker', 'hugo' ),
                'param_name' => 'hugo_map_marker',
                'value' => '',
                'description' => __( 'Select a small image from media library.', 'bebo' ),
                // 'group' => __('Author info','bebo'),
            ),
          ),
       ) );
    }
    class WPBakeryShortCode_Be_map extends WPBakeryShortCode {}
}
?>