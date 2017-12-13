<?php
if (!class_exists('WPBakeryShortCode_Be_musicshow')) {
    add_action( 'vc_before_init', 'hugo_musicshow', 999999);
    function hugo_musicshow() {
      vc_map( array(
          "name" => esc_html__( "Music show description","hugo" ),
          "base" => "be_musicshow",
          'weight' => 95,
          'category' => __( 'Beau Theme', 'hugo' ),
          'description' => esc_html__( 'This section allow you show a detail music show', 'hugo' ),
          "params" => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title', 'hugo' ),
                'param_name' => 'title_box',
                'value' => esc_html__('Music show','hugo'),
                'group' => esc_html__('General','hugo'),
                'description' => esc_html__( 'The title of section only show on list tags type.', 'hugo' )
            ),
            array(
                'type' => 'attach_image',
                'heading' => __( 'Image', 'hugo' ),
                'param_name' => 'event_image',
                'value' => '',
                'group' => esc_html__('General','hugo'),
                'description' => __( 'Select image from media library.', 'hugo' ),
                // 'group' => __('Author info','hugo'),
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
                'type' => 'textfield',
                'heading' => esc_html__( 'Date from', 'hugo' ),
                'param_name' => 'date_from',
                'value' => 'Oct 6, 2014',
                'group' => esc_html__('Show info','hugo'),
                'description' => esc_html__( 'Date begining event.', 'hugo' )
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Date to', 'hugo' ),
                'param_name' => 'date_to',
                'value' => '27 Jan, 2014',
                'group' => esc_html__('Show info','hugo'),
                'description' => esc_html__( 'Date for finish event.', 'hugo' )
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Address', 'hugo' ),
                'param_name' => 'address',
                'value' => 'National Stadium, Newark, USA',
                'group' => esc_html__('Show info','hugo'),
                'description' => esc_html__( 'Address for this event.', 'hugo' )
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Map link', 'hugo' ),
                'param_name' => 'map_link',
                'value' => '',
                'group' => esc_html__('Show info','hugo'),
                'description' => esc_html__( 'Price for ticket.', 'hugo' )
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Price', 'hugo' ),
                'param_name' => 'price',
                'value' => '',
                'group' => esc_html__('Show info','hugo'),
                'description' => esc_html__( 'Price for ticket.', 'hugo' )
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Link to buy', 'hugo' ),
                'param_name' => 'link_buy',
                'value' => '',
                'group' => esc_html__('Show info','hugo'),
                'description' => esc_html__( 'Link to page buy.', 'hugo' )
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Button text', 'hugo' ),
                'param_name' => 'button_text',
                'value' => '',
                'group' => esc_html__('Show info','hugo'),
                'description' => esc_html__( 'This text on button.', 'hugo' )
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Booking phone', 'hugo' ),
                'param_name' => 'booking_phone',
                'value' => '',
                'group' => esc_html__('Show info','hugo'),
                'description' => esc_html__( 'This phone for contact booking.', 'hugo' )
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Booking email', 'hugo' ),
                'param_name' => 'booking_email',
                'value' => '',
                'group' => esc_html__('Show info','hugo'),
                'description' => esc_html__( 'This email for booking ticket.', 'hugo' )
            ),
          ),
       ) );
    }
    class WPBakeryShortCode_Be_musicshow extends WPBakeryShortCode {}
}
?>