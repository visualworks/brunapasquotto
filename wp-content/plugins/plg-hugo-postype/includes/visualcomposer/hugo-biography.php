<?php
if (!class_exists('WPBakeryShortCode_Be_biography')) {
    add_action( 'vc_before_init', 'hugo_Biography', 999999);
    function hugo_Biography() {
      vc_map( array(
          "name" => esc_html__( "Biography","hugo" ),
          "base" => "be_biography",
          'weight' => 95,
          'category' => __( 'Beau Theme', 'hugo' ),
          'description' => esc_html__( 'This section allow you show an image and short paragraph', 'hugo' ),
          "params" => array(
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Section title', 'hugo' ),
              'param_name' => 'title_box',
              'value' => esc_html__('Biography','hugo'),
              'description' => esc_html__( 'The title of section only show on list tags type.', 'hugo' )
            ),
            array(
              'type' => 'attach_image',
              'heading' => __( 'Image', 'bebo' ),
              'param_name' => 'bio_image',
              'value' => '',
              'description' => __( 'Select image from media library.', 'bebo' ),
              // 'group' => __('Author info','bebo'),
            ),
            array(
              'type' => 'textarea_html',
              'holder' => 'div',
              'heading' => esc_html__( 'Description', 'hugo' ),
              'param_name' => 'content',
              'value' => wp_kses(__( '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'hugo' ), array('p'))
            ),

          ),
       ) );
    }
    class WPBakeryShortCode_Be_biography extends WPBakeryShortCode {}
}
?>