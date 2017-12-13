<?php

if (!class_exists('WPBakeryShortCode_Be_video')) {
    add_action( 'vc_before_init', 'bebo_Video', 999999);
    function bebo_Video() {
      vc_map( array(
          "name" => __( "Show video", 'hugo' ),
          "base" => "be_video",
          'weight' => 91,
          'description' => esc_html__( 'This section show video', 'hugo' ),
          "params" => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title box', 'hugo' ),
                'param_name' => 'title_box',
                'admin_label' => true,

            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Your youtube video ID', 'hugo' ),
                'param_name' => 'youtube_url',

            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Your vimeo video ID', 'hugo' ),
                'param_name' => 'vimeo_url',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Your mp4 video url', 'hugo' ),
                'param_name' => 'mp4_url',
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Big image', 'hugo' ),
                'param_name' => 'big_image',
                'value' => '',
                'description' => esc_html__( 'Select image from media library.', 'hugo' )
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Small image', 'hugo' ),
                'param_name' => 'small_image',
                'value' => '',
                'description' => esc_html__( 'Select image from media library.', 'hugo' )
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
    class WPBakeryShortCode_Be_video extends WPBakeryShortCode {}
}


?>