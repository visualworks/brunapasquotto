<?php
if ('WPBakeryShortCode_Be_gallery') {
    add_action( 'vc_before_init', 'beau_Gallery_list', 999999);
    function beau_Gallery_list() {
        $beau_perpage_arr['Show All'] = -1;
        for($i=1; $i<=50; $i++){
            $beau_perpage_arr[$i] = $i;
        }
        vc_map( array(
          "name" => esc_html__( "Gallery","hugo" ),
              "base" => "be_gallery",
              'weight' => 98,
              'category' => __( 'Beau Theme', 'hugo' ),
              'description' => esc_html__( 'This section contain gallery type', 'hugo' ),
              "params" => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Section title', 'hugo' ),
                    'param_name' => 'title',
                    'description' => esc_html__( 'The title of section only show on lis tags type.', 'hugo' )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Gallery type', 'hugo' ),
                    'param_name' => 'gallery_type',
                    'value' => array(
                        'Slide with square item'    =>'square',
                        'Slide with rectangle item' =>'rectangle',
                        'List horizontal'           =>'horizontal',
                    ),
                    'admin_label' => true,
                    'description' => esc_html__( 'Default footer with widgets.', 'hugo' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Type to show', 'hugo' ),
                    'param_name' => 'type_show',
                    'value' => array(
                        'All'=>'all',
                        'Images'=>'image',
                        'Videos'=>'video',
                    ),
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
            ),
        ) );
    }
    class WPBakeryShortCode_Be_gallery extends WPBakeryShortCode {}
}
?>