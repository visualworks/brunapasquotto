<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if( !class_exists( 'ReduxFramewrk' ) ) {
        if (file_exists( BEAU_PLUGIN_DIR. '/libs/ReduxCore/framework.php')) {
            require_once( BEAU_PLUGIN_DIR. '/libs/ReduxCore/framework.php' );
        }
    }
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    $archive_page = $mailchimp_list = $custom_header = $custom_footer ="";

    //Columns
    $beau_column = array();
    for($i=1; $i<=6; $i++){
        $beau_column[$i] = $i;
    }

    $custom_header = array(
        'default'           => 'Default',
        'menu-humberger'    => 'Humberger',
    );

    //Archive
    $archive_page = array(
        'postcatstandard' => __('Full page with title and description','hugo'),
        'postcattags'     => __('Layout with sidebar','hugo'),
    );

    //Beau perpage
    $beau_perpage = array('-1'=>'Show all');
    for($i=1; $i<=50; $i++){
        $beau_perpage[$i] = $i;
    }
    // Footer columns
    $footer_columns = array(
        '12' => __('One column','hugo'),
        '2'  => __('Two columns','hugo'),
        '3'  => __('Three columns','hugo'),
        '4'  => __('Four columns','hugo'),
        '5'  => __('Five columns','hugo'),
        '6'  => __('Six columns','hugo'),
    );

    // 404 Page
    $notfound_page = array(
        'section-404'   => __('Type one with 404 image','hugo'),
        'section-404-1' => __('Type 2 only search box','hugo'),
    );

    //Style Array
    $style_array = array(
        ''              => __('Light','hugo'),
        'classic.css'   => __('Classic','hugo'),
        'dark.css'      => __('Dark','hugo'),
        'formal.css'    => __('Formal','hugo'),
        'pastel.css'    => __('Pastel','hugo'),
        'dj.css'        => __('DJ','hugo'),
        'hiphop.css'    => __('Hip hop','hugo')
    );

    // Sidebar list
    $sidebar_list = array(
        '1'  => __('One widget','hugo'),
        '2'  => __('Two widgets','hugo'),
        '3'  => __('Three widgets','hugo'),
        '4'  => __('Four widgets','hugo'),
        '5'  => __('Five widgets','hugo'),
        '6'  => __('Six widgets','hugo'),
        '7'  => __('Sevent widgets','hugo'),
        '8'  => __('Eight widgets','hugo'),
        '9'  => __('Nine widgets','hugo'),
        '10' => __('Ten widgets','hugo'),
    );

    // Social list
    $social_list = array(
        'facebook'      => 'Facebook',
        'twitter'       => 'Twitter',
        'google-plus'   => 'Google Plus',
        'youtube'       => 'Youtube',
        'pinterest'     => 'Pinterest',
        'linkedin'      => 'Linked in',
        'instagram'     => 'Instagram',
        'github'        => 'GitHub',
        'behance'       => 'Behance',
        'tumblr'        => 'Tumblr',
        'soundcloud'    => 'Sound cloud',
        'dribbble'      => 'Dribbble',
        'rss'           => 'Rss',
    );

    //Custom footer
    $custom_footer = array(
        'footer-single'     => __('One column','hugo'),
        'footer-content'    => __('With widget','hugo'),
    );

    //Get all page
    $allPage = array();
    $args = array(
        'sort_order' => 'asc',
        'sort_column' => 'post_title',
        'post_type' => 'page',
        'post_status' => 'publish'
    );
    $pages = get_pages($args);
    wp_reset_postdata();
    foreach ($pages as $page) {
        $allPage[$page->post_name] = $page->post_title;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "beau_option";


    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'submenu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => false,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'beau-theme-setting' ),
        'page_title'           => __( 'Theme Options', 'beau-theme-setting' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.beautheme.com/hugo/',
        'title' => __( 'Documentation','hugo' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'http://support.beautheme.com/',
        'title' => __( 'Support Team','hugo' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/beautheme',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/Beauthemes',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://behance.net/beautheme',
        'title' => 'Find us on behance',
        'icon'  => 'el el-behance'
    );
    $args['share_icons'][] = array(
        'url'   => 'https://dribbble.com/beauvn',
        'title' => 'Find us on dribbble',
        'icon'  => 'el el-dribbble'
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        //$args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>','hugo' ), $v );
    } else {
        //$args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>','hugo' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p>Thanks for used our theme <a href="http://beautheme.com" target="_blank  ">Beau Theme</a>.</p>','hugo' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1','hugo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>','hugo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2','hugo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>','hugo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>','hugo' );
    Redux::setHelpSidebar( $opt_name, $content );



    // -> START General option
    Redux::setSection( $opt_name, array(
        'title'            => __( 'General setting','hugo' ),
        'id'               => 'general',
        'desc'             => __( 'These are something setting for all page!','hugo' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-cogs',
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'General options','hugo' ),
        'id'               => 'general-options',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'hugo-favicon',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Upload favicon', 'hugo' ),
                'compiler' => 'true',
                'subtitle' => __( 'Upload any image using the WordPress native uploader', 'hugo' ),
            ),
            array(
                'id'       => 'hugo-logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Upload logo', 'hugo' ),
                'compiler' => 'true',
                'subtitle' => __( 'Upload any image using the WordPress native uploader', 'hugo' ),
            ),
            array(
                'id'       => 'hugo-disk',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Upload disk image', 'hugo' ),
                'compiler' => 'true',
                'subtitle' => __( 'Upload any image using for album page 270x270', 'hugo' ),
            ),
            array(
                'id'       => 'hugo-style',
                'type'     => 'select',
                'title'    => __( 'Theme Stylesheet', 'hugo' ),
                'subtitle' => __( 'Select your themes with our style defined.', 'hugo' ),
                'options'  => $style_array,
                'default'  => '',
            ),
            array(
                'id'       => 'hugo-notfound',
                'type'     => 'select',
                'title'    => __( '404 page style', 'hugo' ),
                'subtitle' => __( 'Chose your 404 style.', 'hugo' ),
                'options'  => $notfound_page,
            ),
            array(
                'id'       => 'admin-email',
                'type'     => 'text',
                'title'    => __( 'Admin email', 'hugo' ),
                'placeholder'=>'support@beautheme.com'
            ),

            array(
                'id'       => 'custom_sidebar',
                'type'     => 'checkbox',
                'title'    => __( 'Enable custom sidebar', 'hugo' ),
                'subtitle' => __( 'If checked this you will have some widgets place for custom', 'hugo' ),
                'default'  => 0,
            ),

            array(
                'id'       => 'sidebar_numbers',
                'type'     => 'select',
                'multi'    => false,
                'title'    => __( 'Your widget on sidebar', 'hugo' ),
                'subtitle' => __( 'Select number sidebar you want', 'hugo' ),
                'options'  => $sidebar_list,
                'default'  => '1',
            ),
            array(
                'id'       => 'your-google-api',
                'type'     => 'text',
                'title'    => __( 'Your google map API', 'hugo' ),
                'value'    => '',
                'desc'     => __( 'You can change to your google map API', 'hugo' )
            ),
            array(
                'id'       => 'your-map-marker',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Your custom map marker', 'hugo' ),
                'compiler' => 'true',
                'desc'     => __( 'Small icon on your event map', 'hugo' )
            ),
            // array(
            //     'id'       => 'show-social-link',
            //     'type'     => 'select',
            //     'multi'    => true,
            //     'title'    => __( 'Social to show', 'hugo' ),
            //     'subtitle' => __( 'Select your social link you want to show', 'hugo' ),
            //     'desc'     => __( 'Chose your social you want to show in your website.', 'hugo' ),
            //     //Must provide key => value pairs for radio options
            //     'options'  => $social_list,
            //     'default'  => ''
            // ),
            array(
                'id'       => 'comming-date',
                'type'     => 'date',
                'title'    => __( 'Date coming soon', 'hugo' ),
                'subtitle' => __( 'Chose date to website online', 'beautehme' ),
                'desc'     => __( 'This data is default in page coming soon, you can custom when create page comming soon', 'beautehme' )
            ),

        )
    ) );
    // -> START blog option
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Shop setting','hugo' ),
        'id'               => 'shop',
        'customizer_width' => '500px',
        'icon'             => 'el el-shopping-cart',
    ) );
    // Chon kieu trang archive
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Page shop options','hugo' ),
        'id'               => 'shop-options',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'style-shop',
                'type'     => 'select',
                'title'    => __( 'Chose perpage','hugo' ),
                'subtitle' => __( 'Chose perpage display','hugo' ),
                'options'  => $beau_perpage,
            ),

        )
    ) );

    // -> START blog option
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Blog setting','hugo' ),
        'id'               => 'blog',
        'customizer_width' => '500px',
        'icon'             => 'el el-blogger',
    ) );

// Chon kieu trang archive
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Blogs options','hugo' ),
        'id'               => 'blog-options',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
             array(
                'id'       => 'archive-page',
                'type'     => 'select',
                'multi'    => false,
                'title'    => __( 'Your archive page', 'hugo' ),
                'subtitle' => __( 'Select your page type', 'hugo' ),
                'options'  => $archive_page,
            ),
            array(
                'id'       => 'single-page',
                'type'     => 'select',
                'title'    => __( 'Chose single type','hugo' ),
                'subtitle' => __( 'Chose your custom single','hugo' ),
                // 'desc'     => __( 'We have ? blog archive type','hugo' ),
                //Must provide key => value pairs for select options
                'options'  => array('detail' => 'Default none sidebar', 'detailsidebar' =>'Content with sidebar'),
            ),
        )
    ) );

//Social setting
// -> START blog option
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Social setting','hugo' ),
        'id'               => 'social',
        'customizer_width' => '500px',
        'icon'             => 'el el-thumbs-up',
    ) );



    Redux::setSection( $opt_name, array(
        'title'            => __( 'Social link','hugo' ),
        'id'               => 'social-link',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'hugo-facebook',
                'type'     => 'text',
                'title'    => __( 'Your facebook url','hugo' ),
            ),
            array(
                'id'       => 'hugo-twitter',
                'type'     => 'text',
                'title'    => __( 'Your twitter url','hugo' ),
            ),
            array(
                'id'       => 'hugo-google-plus',
                'type'     => 'text',
                'title'    => __( 'Your google plus url','hugo' ),
            ),
            array(
                'id'       => 'hugo-pinterest',
                'type'     => 'text',
                'title'    => __( 'Your pinterest url','hugo' ),
            ),
            array(
                'id'       => 'hugo-linkedin',
                'type'     => 'text',
                'title'    => __( 'Your linkedin url','hugo' ),
            ),
            array(
                'id'       => 'hugo-github',
                'type'     => 'text',
                'title'    => __( 'Your github url','hugo' ),
            ),
            array(
                'id'       => 'hugo-behance',
                'type'     => 'text',
                'title'    => __( 'Your behance url','hugo' ),
            ),
            array(
                'id'       => 'hugo-tumblr',
                'type'     => 'text',
                'title'    => __( 'Your tumblr url','hugo' ),
            ),
            array(
                'id'       => 'hugo-soundcloud',
                'type'     => 'text',
                'title'    => __( 'Your soundcloud url','hugo' ),
            ),
            array(
                'id'       => 'hugo-dribbble',
                'type'     => 'text',
                'title'    => __( 'Your dribbble url','hugo' ),
            ),
            array(
                'id'       => 'hugo-instagram',
                'type'     => 'text',
                'title'    => __( 'Your instagram url','hugo' ),
            ),
            array(
                'id'       => 'hugo-youtube',
                'type'     => 'text',
                'title'    => __( 'Your youtube url','hugo' ),
            ),
            array(
                'id'       => 'hugo-rss',
                'type'     => 'text',
                'title'    => __( 'Your rss url','hugo' ),
            ),

        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'            => __( 'Social to show','hugo' ),
        'id'               => 'social-link-show',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'show-social-link',
                'type'     => 'select',
                'multi'    => true,
                'title'    => __( 'Social to show','hugo' ),
                'subtitle' => __( 'Select your social link you want to show','hugo' ),
                'desc'     => __( 'Chose your social you want to show in your website.','hugo' ),
                //Must provide key => value pairs for radio options
                'options'  => $social_list,
                'default'  => ''
            ),

        )
    ) );

    // Redux::setSection( $opt_name, array(
    //     'title'            => __( 'Social API','hugo' ),
    //     'id'               => 'social-api',
    //     'subsection'       => true,
    //     'customizer_width' => '450px',
    //     'fields'           => array(
    //         array(
    //             'id'       => 'twitter-api',
    //             'type'     => 'text',
    //             'title'    => __( 'Your twitter API','hugo' ),
    //         ),
    //         array(
    //             'id'       => 'twitter-user',
    //             'type'     => 'text',
    //             'title'    => __( 'Your twitter user','hugo' ),
    //         ),
    //         array(
    //             'id'       => 'instagram-user',
    //             'type'     => 'text',
    //             'title'    => __( 'Your instagram user','hugo' ),
    //         ),
    //         array(
    //             'id'       => 'facebook-api',
    //             'type'     => 'text',
    //             'title'    => __( 'Your facebook API','hugo' ),
    //         ),
    //         // array(
    //         //     'id'       => 'mailchimp-api',
    //         //     'type'     => 'text',
    //         //     'title'    => __( 'Your mailchimp API','hugo' ),
    //         //     'subtitle' => __( 'You can find your api <a href="http://api.mailchimp.com" target="_blank">here</a>.','hugo' ),
    //         // ),
    //         // array(
    //         //     'id'       => 'mailchimp-group-id',
    //         //     'type'     => 'text',
    //         //     'title'    => __( 'Your mailchimp Group ID','hugo' ),
    //         // ),
    //     )
    // ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Mailchimp API','hugo' ),
        'id'               => 'social-mailchimp',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'mailchimp-api',
                'type'     => 'text',
                'title'    => __( 'Your mailchimp API','hugo' ),
                'subtitle' => __( 'Grab an API Key from <a href="http://admin.mailchimp.com/account/api/" target="_blank">here</a>.','hugo' ),
            ),

             array(
                'id'        => 'mailchimp-groupid',
                'type'      => 'text',
                'title'     => __( 'Your group id','hugo' ),
                'subtitle'  => __( 'Grab your List\'s Unique Id by going <a href="http://admin.mailchimp.com/lists/" target="_blank">here</a>.<br> Click the "settings" link for the list - the Unique Id is at the bottom of that page.','hugo' ),
            ),

        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'            => __( 'Typo setting','hugo' ),
        'id'               => 'typo',
        'customizer_width' => '500px',
        'icon'             => 'el el-font',
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Your custom typo','hugo' ),
        'id'               => 'typo-custom',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'body-text',
                'type'     => 'typography',
                'title'    => __( 'Body Font','hugo' ),
                // 'compiler' => array('body *'),
                'output'   => array('body'),
                'subtitle' => __( 'Specify the body font properties.','hugo' ),
                'google'   => true,
            ),
            array(
                'id'       => 'title-text',
                'type'     => 'typography',
                'title'    => __( 'Title section','hugo' ),
                // 'compiler' => array('body *'),
                'output'   => array('.description h2','.cake-show .c-day .date, .horizontal-item .c-day .date','.music-show .event-info .title-box'),
                'subtitle' => __( 'Specify the section title font properties.','hugo' ),
                'google'   => true,
            ),
            array(
                'id'       => 'button-color',
                'type'     => 'typography',
                'title'    => __( 'Title section','hugo' ),
                // 'compiler' => array('body *'),
                'output'   => array('.description h2'),
                'subtitle' => __( 'Specify the section title font properties.','hugo' ),
                'google'   => true,
            ),
            array(
                'id'       => 'h1-element',
                'type'     => 'typography',
                'title'    => __( 'H1 element','hugo' ),
                'subtitle' => __( 'Specify the h1 font properties.','hugo' ),
                'output'    => array('h1'),
                // 'compiler' => array('h1'),
                'google'   => true,
            ),
            array(
                'id'       => 'h2-element',
                'type'     => 'typography',
                'title'    => __( 'H2 element','hugo' ),
                'subtitle' => __( 'Specify the h2 font properties.','hugo' ),
                'compiler' => array('h2'),
                'output' => array('h2'),
                'google'   => true,
            ),
            array(
                'id'       => 'h3-element',
                'type'     => 'typography',
                'title'    => __( 'H3 element','hugo' ),
                'subtitle' => __( 'Specify the h3 font properties.','hugo' ),
                // 'compiler' => array('h3'),
                'output' => array('h3'),
                'google'   => true,
            ),
            array(
                'id'       => 'h4-element',
                'type'     => 'typography',
                'title'    => __( 'H4 element','hugo' ),
                'subtitle' => __( 'Specify the h4 font properties.','hugo' ),
                // 'compiler' => array('h4'),
                'output'   => array('h4'),
                'google'   => true,
            ),
            array(
                'id'       => 'h5-element',
                'type'     => 'typography',
                'title'    => __( 'H5 element','hugo' ),
                'subtitle' => __( 'Specify the h5 font properties.','hugo' ),
                // 'compiler' => array('h5'),
                'output'   => array('h5'),
                'google'   => true,
            ),
            array(
                'id'       => 'h6-element',
                'type'     => 'typography',
                'title'    => __( 'H6 element','hugo' ),
                'subtitle' => __( 'Specify the h6 font properties.','hugo' ),
                // 'compiler' => array('h6'),
                'output' => array('h6'),
                'google'   => true,
            ),
        )
    ) );



    // Your header and footer custom
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Header & footer','hugo' ),
        'id'               => 'headerfooter',
        'customizer_width' => '500px',
        'icon'             => 'el el-magic',
    ) );

    Redux::setSection( $opt_name, array(
        'title'             => __( 'Custom header','hugo' ),
        'id'                => 'headerfooter-header',
        'subsection'        => true,
        'customizer_width'  => '450px',
        'fields'            => array(
            array(
                'id'       => 'header-type',
                'type'     => 'select',
                'title'    => __( 'Chose your menu type','hugo' ),
                'subtitle' => __( 'This menu default all page','hugo' ),
                'options'  => $custom_header,
            ),
            array(
                'id'       => 'enable-fixed',
                'type'     => 'button_set',
                'title'    => __( 'Enable header fixed','hugo' ),
                'options'  => array(
                    '1'    => 'No',
                    '2'    => 'Yes',
                ),
                'default'  => '2'
            ),
            array(
                'id'        => 'header-text-color',
                'type'      => 'color_rgba',
                'title'     => __( 'Header Text Color','hugo' ),
                'subtitle'  => __( 'Gives you the RGBA color.','hugo' ),
                // 'compiler' => array('.header'),
                'output' => array(
                    'header','header.header-one',
                    'header.header-two'
                ),
                'mode'      => 'color',
                //'validate' => 'colorrgba',
            ),

            array(
                'id'        => 'header-bg',
                'type'      => 'color_rgba',
                'title'     => __( 'Header background Color','hugo' ),
                'subtitle'  => __( 'Gives you the RGBA color.','hugo' ),
                // 'compiler' => array('.header'),
                'output' => array(
                    'header',
                    'header.header-one',
                    'header.header-two',
                ),
                'mode'      => 'background',
                //'validate' => 'colorrgba',
            ),

            array(
                'id'        => 'header-dropdown-color',
                'type'      => 'color_rgba',
                'title'     => __( 'Header dropdown BG Color','hugo' ),
                'subtitle'  => __( 'Gives you the RGBA color.','hugo' ),
                // 'compiler' => array('#main-navigation .menu-item .sub-menu .menu-item', '#main-navigation .menu-item .sub-menu .menu-item:hover', '#main-navigation .menu-item .sub-menu.current-menu-item'),
                'output' => array(
                    '#main-navigation .menu-item .sub-menu .menu-item',
                    '#main-navigation .menu-item .sub-menu .menu-item:hover',
                    '#main-navigation .menu-item .sub-menu.current-menu-item'
                ),
                'mode'      => 'background',
                //'validate' => 'colorrgba',
            ),
            array(
                'id'        => 'header-fixed',
                'type'      => 'button_set',
                'title'     => __( 'Header fixed','hugo' ),
                // 'subtitle' => __( 'No validation can be done on this field type','hugo' ),
                // 'desc'     => __( 'This is the description field, again good for additional info.','hugo' ),
                //Must provide key => value pairs for radio options
                'options'   => array(
                    '1'     => 'No',
                    '2'     => 'Yes',
                ),
                'default'   => '2'
            ),

        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'             => __( 'Custom footer','hugo' ),
        'id'                => 'headerfooter-footer',
        'subsection'        => true,
        'customizer_width'  => '450px',
        'fields'            => array(

            array(
                'id'       => 'footer-columns',
                'type'     => 'select',
                'multi'    => false,
                'title'    => __( 'Your footer column', 'hugo' ),
                'subtitle' => __( 'Select number you want to show column', 'hugo' ),
                //Must provide key => value pairs for radio options
                'options'  => $footer_columns,
                'default'  => '1',
            ),
            array(
                'id'       => 'footer-default',
                'type'     => 'select',
                'multi'    => false,
                'title'    => __( 'Chose your default footer', 'hugo' ),
                'subtitle' => __( 'Select defaulr footer for default page', 'hugo' ),
                //Must provide key => value pairs for radio options
                'options'  =>  $custom_footer,
                'default'  => 'footer-content',
            ),
            array(
                'id'        => 'footer-text',
                'type'      => 'color_rgba',
                'title'     => __( 'Footer Text Color','hugo' ),
                'subtitle'  => __( 'Gives you the RGBA color.','hugo' ),
                // 'compiler' => array('footer'),
                'output'   => array(
                    'footer', 'footer .footer-widget .widget-title',
                    'footer .footer-widget .widget-body .menu li a',
                    'footer .footer-widget .widget-body',
                    '.book-info span.book-name a',
                    'footer .footer-widget .widget-body .book-info .book-price',
                    '.widget-footer .list-social a'
                ),
                'mode'      => 'color',
            ),
            array(
                'id'        => 'footer-bg',
                'type'      => 'color_rgba',
                'title'     => __( 'Footer background Color','hugo' ),
                'subtitle'  => __( 'Gives you the RGBA color.','hugo' ),
                'output'   => array( 'footer' ),
                'mode'      => 'background',
            ),
            array(
                'id'        => 'footer-bottom-bg',
                'type'      => 'color_rgba',
                'title'     => __( 'Footer bottom Color','hugo' ),
                'subtitle'  => __( 'Gives you the RGBA color.','hugo' ),
                // 'compiler' => array('.bottom-footer'),
                'output'   => array( 'footer .bottom-footer' ),
                'mode'      => 'background',
            ),
            array(
                'id'        => 'footer-bottom-text',
                'type'      => 'color_rgba',
                'title'     => __( 'Footer bottom Text Color','hugo' ),
                'subtitle'  => __( 'Gives you the RGBA color.','hugo' ),
                // 'compiler' => array('.bottom-footer'),
                'output'   => array( 'footer .bottom-footer .copyright' ),
                'mode'      => 'color',
            ),
            array(
                'id'       => 'footer-widget-number',
                'type'     => 'select',
                'title'    => __( 'Chose footer columns','hugo' ),
                'subtitle' => __( 'Chose your custom widget number you want to show','hugo' ),
                'options'  => $beau_column,
            ),
            array(
                'id'       => 'enable-gotop',
                'type'     => 'button_set',
                'title'    => __( 'Enable go top button','hugo' ),
                'options'  => array(
                    '1'    => 'No',
                    '2'    => 'Yes',
                ),
                'default'  => '2'
            ),
             array(
                'id'       => 'hugo-footer-text',
                'type'     => 'editor',
                'title'    => __( 'Custom footer','hugo' ),
                'subtitle' => __( 'Use any of the features of WordPress editor inside your panel!','hugo' ),
                'default'  => '&copy; 2015 Hugo music band. All rights reserved. Designed by <a href="http://beautheme.com">BeauTheme</a>',
            ),
        )
    ) );