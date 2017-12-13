<?php
add_filter( 'cmb_meta_boxes', 'beau_theme_metaboxes' );
function beau_theme_metaboxes( array $meta_boxes ) {

    $prefix = '_beautheme_';

    //With posttype image
    $meta_boxes['image_metabox'] = array(
        'id'         => 'image_metabox',
        'title'      => __( 'Type image', 'beautheme' ),
        'pages'      => array( 'post', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields'     => array(
            array(
                'name' => __( 'Image', 'beautheme' ),
                'desc' => __( 'Upload an image or enter a URL to image.', 'beautheme' ),
                'id'   => $prefix . 'type_image',
                'type' => 'file',
                'allows' => 'url',
            ),
            array(
                'name' => __( 'Show on gallery', 'beautheme' ),
                'desc' => __('If you check it, it will show on gallery page','beautheme'),
                'id'   => $prefix . 'show_gallery',
                'type' => 'checkbox',
            ),
        ),
    );

    //For post type video
    $meta_boxes['video_metabox'] = array(
        'id'         => 'video_metabox',
        'title'      => __( 'Type video', 'beautheme' ),
        'pages'      => array( 'post', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields'     => array(
            array(
                'name' => __( 'Embed', 'beautheme' ),
                'desc' => __('Enter Youtube, Vimeo, Soundcloud, etc URL. See supported services at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.','beautheme'),
                'id'   => $prefix . 'video_embed',
                'type' => 'oembed',
            ),
            array(
                'name' => __( 'Upload file', 'beautheme' ),
                'desc' => __( 'Upload an media file in mp4, ogv/ogg webm or enter a URL to video file.', 'beautheme' ),
                'id'   => $prefix . 'video_file',
                'type' => 'file',
                'allows' => 'url',
            ),
            array(
                'name' => __( 'Show on gallery', 'beautheme' ),
                'desc' => __('If you check it, it will show on gallery page','beautheme'),
                'id'   => $prefix . 'show_gallery',
                'type' => 'checkbox',
            ),
        ),
    );

    //For post type audio
    $meta_boxes['audio_metabox'] = array(
        'id'         => 'audio_metabox',
        'title'      => __( 'Type audio', 'beautheme' ),
        'pages'      => array( 'post', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields'     => array(
            array(
                'name' => __( 'Soud cloud embed', 'beautheme' ),
                'desc' => __('Enter soud cloud url here','beautheme'),
                'id'   => $prefix . 'soud_cloud',
                'type' => 'oembed',
            ),
            array(
                'name' => __( 'Upload file', 'beautheme' ),
                'desc' => __('You can upload file in mp3, oga, ogg file or type your url in here','beautheme'),
                'id'   => $prefix . 'audio_file',
                'type' => 'file',
                'allows' => 'url',
            ),
        ),
    );

    //For post type quote
    $meta_boxes['quote_metabox'] = array(
        'id'         => 'quote_metabox',
        'title'      => __( 'Type quote', 'beautheme' ),
        'pages'      => array( 'post', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields'     => array(
            array(
                'name' => __( 'Quote message', 'beautheme' ),
                'desc' =>'',
                'id'   => $prefix . 'quote_message',
                'type' => 'textarea_small',
            ),
            array(
                'name' => __( 'Quote author', 'beautheme' ),
                'id'   => $prefix . 'quote_author',
                'type' => 'text_small',
            ),
        ),
    );

    //For post type link
    $meta_boxes['link_metabox'] = array(
        'id'         => 'link_metabox',
        'title'      => __( 'Type link', 'beautheme' ),
        'pages'      => array( 'post', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields'     => array(
            array(
                'name' => __( 'Link url', 'beautheme' ),
                'id'   => $prefix . 'link',
                'type' => 'text',
            ),
        ),
    );

    //For post type gallery
    $meta_boxes['gallery_metabox'] = array(
        'id'         => 'gallery_metabox',
        'title'      => __( 'Type gallery', 'beautheme' ),
        'pages'      => array( 'post', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields'     => array(
            array(
                'name'         => __( 'Upload file', 'beautheme' ),
                'desc'         => __( 'Upload or add multiple images/attachments.', 'beautheme' ),
                'id'           => $prefix . 'gallery',
                'type'         => 'file_list',
                'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
            ),
        ),
    );

    //For post type feature post
    $meta_boxes['feature_post_metabox'] = array(
        'id'         => 'feature_metabox',
        'title'      => __( 'Feature news', 'beautheme' ),
        'pages'      => array( 'post', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields'     => array(
            array(
                'name'         => __( 'Feature news', 'beautheme' ),
                'desc'         => __( 'Check it will be show on feature news', 'beautheme' ),
                'id'           => $prefix . 'feature_post',
                'type'         => 'checkbox',
            ),
        ),
    );

    //For post type album
    $meta_boxes['album_metabox'] = array(
        'id'         => 'album_metabox',
        'title'      => __( 'More info', 'beautheme' ),
        'pages'      => array( 'album', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields'     => array(
            array(
                'name'         => __( 'Production', 'beautheme' ),
                'id'           => $prefix . 'production',
                'type'         => 'text',
            ),
            array(
                'name'         => __( 'Year', 'beautheme' ),
                'id'           => $prefix . 'year',
                'type'         => 'text_small',
            ),
            array(
                'name'         => __( 'Show feature', 'beautheme' ),
                'id'           => $prefix . 'feature',
                'desc'         =>__('Check it show playlist on slider homepage','beautheme'),
                'type'         => 'checkbox',
            ),
            array(
                'name'         => __( 'Google play link', 'beautheme' ),
                'id'           => $prefix . 'google_play',
                'type'         => 'text',
                'std'          =>''
            ),
            array(
                'name'         => __( 'Appstore link', 'beautheme' ),
                'id'           => $prefix . 'app_store',
                'type'         => 'text',
                'std'          =>''
            ),
            array(
                'name'         => __( 'Link to buy', 'beautheme' ),
                'id'           => $prefix . 'link_to_buy',
                'type'         => 'text',
                'std'          =>''
            ),
            array(
                'name'         => __( 'Price', 'beautheme' ),
                'id'           => $prefix . 'price',
                'type'         => 'text',
                'std'          =>''
            ),
        ),
    );
    //For post type page
    $meta_boxes['page_metabox'] = array(
        'id'         => 'page_metabox',
        'title'      => __( 'Chose your footer', 'beautheme' ),
        'pages'      => array( 'page','post' ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields'     => array(
            array(
                'name'    => __('Chose your footer','beautheme'),
                'desc'    => __('Select an option','beautheme'),
                'id'      => $prefix . 'footer',
                'type'    => 'select',
                'options' => array(
                    ''   => __( 'Default on Theme option', 'beautheme' ),
                    'footer-single'   => __( 'Footer single column', 'beautheme' ),
                    'footer-content'  => __( 'Footer with widget column', 'beautheme' ),
                ),
                'default' => '',
            ),
        ),
    );


    //For post type page
    $meta_boxes['member_metabox'] = array(
        'id'         => 'member_metabox',
        'title'      => __( 'More info', 'beautheme' ),
        'pages'      => array( 'member', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields'     => array(
            array(
                'name'  => __( 'Link facebook', 'beautheme' ),
                'id'    => $prefix . 'facebook',
                'type'  => 'text',
                'desc'  => __('Your facebook link','beautheme')
            ),
            array(
                'name'  => __( 'Link instagram', 'beautheme' ),
                'id'    => $prefix . 'instagram',
                'type'  => 'text',
                'desc'  => __('Type your link in instagram','beautheme')
            ),
            array(
                'name'  => __( 'Twitter', 'beautheme' ),
                'id'    => $prefix . 'twitter_acc',
                'type'  => 'text',
                'desc'  => __('Your twitter link','beautheme')
            ),
            array(
                'name'  => __( 'Member job', 'beautheme' ),
                'id'    => $prefix . 'member_job',
                'type'  => 'text',
                'desc'  => __('Type your member job','beautheme')
            ),
        ),
    );

    //For post products
    $meta_boxes['products_ticket'] = array(
        'id'         => 'products_isticket',
        'title'      => __( 'Enable ticket', 'beautheme' ),
        'pages'      => array( 'product', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields'     => array(
            array(
                'name'  => __( 'Show on ticket', 'beautheme' ),
                'id'    => $prefix . 'is_ticket',
                'type'  => 'checkbox',
                'desc'  => __('If you check it it will be a ticket and have more attribute, only show on ticket','beautheme')
            ),
        ),
    );

    $meta_boxes['products_metabox'] = array(
        'id'         => 'products_metabox',
        'title'      => __( 'Event ticket info', 'beautheme' ),
        'pages'      => array( 'product', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields'     => array(
            array(
                'name'  => __( 'Address name', 'beautheme' ),
                'id'    => $prefix . 'adress_name',
                'type'  => 'text',
                'class' => 'ticket-attribute',
                'desc'  => __('Address name','beautheme')
            ),
            array(
                'name'  => __( 'Map latitude', 'beautheme' ),
                'id'    => $prefix . 'map_latitude',
                'type'  => 'text_small',
                'desc'  => __('Map latitude, you can get your map latitude & longtidute in <a href="http://latlong.net">http://latlong.net</a> ','beautheme')
            ),
            array(
                'name'  => __( 'Map longtitude', 'beautheme' ),
                'id'    => $prefix . 'map_longitude',
                'type'  => 'text_small',
            ),
            array(
                'name'  => __( 'Contact Email', 'beautheme' ),
                'id'    => $prefix . 'ticket_mail',
                'type'  => 'text',
            ),
            array(
                'name'  => __( 'Contact mobile', 'beautheme' ),
                'id'    => $prefix . 'ticket_mobile',
                'type'  => 'text',
            ),
            array(
                'name'  => __( 'Event on', 'beautheme' ),
                'id'    => $prefix . 'event_on',
                'type'  => 'text_date_timestamp',
                // 'timezone_meta_key' => $prefix . 'timezone',
                // 'date_format' => 'l jS \of F Y',
            ),
            array(
                'name'  => __( 'Hours', 'beautheme' ),
                'id'    => $prefix . 'event_hours',
                'type'  => 'text_time',
            ),
            array(
                'name'  => __( 'Sale on', 'beautheme' ),
                'id'    => $prefix . 'sale_on',
                'type'  => 'text_date',
            ),
            array(
                'name'  => __( 'Cancel', 'beautheme' ),
                'id'    => $prefix . 'cancel',
                'type'  => 'checkbox',
            ),
        ),
    );


    //For post products
    $meta_boxes['products_video'] = array(
        'id'         => 'products_videotrailer',
        'title'      => __( 'Video trailer', 'beautheme' ),
        'pages'      => array( 'product', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields'     => array(
            array(
                'name' => __( 'Url video trailer', 'beautheme' ),
                'desc' => __('Enter youtube url here','beautheme'),
                'id'   => $prefix . 'trailer_video',
                'type' => 'oembed',
            ),
        ),
    );

    // Add other metaboxes as needed
    return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {
    if ( ! class_exists( 'cmb_Meta_Box' ) )
        require_once BEAU_PLUGIN_DIR .'/libs/metaboxes/init.php';

}
