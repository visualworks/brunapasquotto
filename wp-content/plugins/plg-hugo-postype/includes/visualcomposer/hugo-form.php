<?php

if (!class_exists('WPBakeryShortCode_Be_form')) {
    add_action( 'vc_before_init', 'beau_Form', 999999);
    function beau_Form() {
      vc_map( array(
          "name" => esc_html__( "Form contact","hugo" ),
          "base" => "be_form",
          'weight' => 95,
          'category' => __( 'Beau Theme', 'hugo' ),
          'description' => esc_html__( 'This section contain a form for contact', 'hugo' ),
          "params" => array(
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Section title', 'hugo' ),
              'param_name' => 'title',
              '' => esc_html__('Contact us','hugo'),
              'description' => esc_html__( 'The title of section.', 'hugo' )
            ),
            array(
              'type' => 'dropdown',
              'heading' => esc_html__( 'Chose your contact type', 'hugo' ),
              'param_name' => 'form_type',
              'value' => array(
                    'Full page' => 'full',
                    'Half page' => 'half',
                ),
              'admin_label' => true,
              'description' => esc_html__( 'Default full layout.', 'hugo' ),
            ),
            array(
              'type' => 'textarea_html',
              'holder' => 'div',
              'heading' => esc_html__( 'Description', 'hugo' ),
              'param_name' => 'content',
              'value' => wp_kses(__( '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'hugo' ), array('p'))
            ),
          ),
       ));
    }
    class WPBakeryShortCode_Be_form extends WPBakeryShortCode {}
}

?>