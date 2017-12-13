<?php
//Some custom field for post and books
if( !function_exists( 'register_field_group' ) ) {
    if (file_exists(BEAU_PLUGIN_DIR. '/libs/advanced-custom-fields/acf.php')) {
        require_once(BEAU_PLUGIN_DIR. '/libs/advanced-custom-fields/acf.php');
    }
}

//Repeater album media
if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_album-media',
        'title' => __('Album media','beautheme'),
        'fields' => array (
            array (
                'key' => 'field_media_item',
                'label' => __('Media item','beautheme'),
                'name' => '
                `',
                'type' => 'repeater',
                'instructions' => __('You can chose your media in here','beautheme'),
                'required' => 1,
                'sub_fields' => array (
                    array (
                        'key' => 'field_media_title',
                        'label' => __('Media title','beautheme'),
                        'name' => 'media_title',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_media_file',
                        'label' => __('Media file','beautheme'),
                        'name' => 'media_file',
                        'type' => 'file',
                        'column_width' => '',
                        'save_format' => 'url',
                        'library' => 'all',
                    ),
                    array (
                        'key' => 'field_media_article',
                        'label' => __('Article','beautheme'),
                        'name' => 'media_article',
                        'type' => 'text',
                        'column_width' => '',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                ),
                'row_min' => '',
                'row_limit' => '',
                'layout' => 'table',
                'button_label' => __('Add Row','beautheme'),
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'album',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}
?>