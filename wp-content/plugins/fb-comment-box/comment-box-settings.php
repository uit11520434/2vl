<?php

/**
 * WordPress settings API demo class
 *
 * @author Tareq Hasan
 */
if ( !class_exists('facebook_comment_box_plugin' ) ):
class facebook_comment_box_plugin {

    private $settings_api;

    function __construct() {
        $this->settings_api = new WeDevs_Settings_API;

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    function admin_menu() {
        add_menu_page( 'Facebook Comment Box Settings', 'FB Comment Box', 'manage_options', 'facebook-comment-box', array($this, 'plugin_page') , 'dashicons-facebook');
    }

    function get_settings_sections() {
        $sections = array(
            array(
                'id' => 'facebook_comment_box_settings',
                'title' => 'Settings',
            ),
            array(
                'id' => 'facebook_comment_box_settings_styles',
                'title' => 'Styles',
            )
        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(
            'facebook_comment_box_settings' => array(
                array(
                    'name'              => 'fb_app_id',
                    'label'             => 'Facebook app id',
                    'desc'              => '<a target="_blank" href="https://developers.facebook.com/apps">Create an App to handle your comments</a> <br> click + Create New App to the top right of the page. <br>Name the App something memorable e.g. "Comments" and give it an app namespace. <br> Once you have it enter it here',
                    'type'              => 'text',
                ),
                array(
                    'name'              => 'fbcb_header_lebel',
                    'label'             => 'Comment Box Header Lebel',
                    'desc'              => 'Comment box header label',
                    'default'           => 'Leave a comment',
                    'type'              => 'text',
                ),
                array(
                    'name'              => 'fbcb_comment_per_page',
                    'label'             => 'Coment per page',
                    'desc'              => 'Insert how many comment you want to see at a time',
                    'type'              => 'text',
                    'default'           => '5'
                ),
                array(
                    'name'              => 'show_in_post',
                    'label'             => 'Show comment box in ',
                    'desc'              => 'Post',
                    'default'           => 'on',
                    'type'              => 'checkbox',
                ),
                array(
                    'name'              => 'show_in_page',
                    'label'             => '',
                    'desc'              => 'Page',
                    'default'           => 'on',
                    'type'              => 'checkbox',
                ),
                array(
                    'name'              => 'fbcb_width',
                    'label'             => 'Comment Box width',
                    'desc'              => 'Put comment box width. You may use <code>px</code>,<code>em</code>,<code>vh</code>,<code>vw</code>,<code>%</code> and other measure unit according to w3c standard. <br>put 100% to make comment box container fullwidth',
                    'type'              => 'text',
                    'default'           => '550px',
                ),
                array(
                    'name'    => 'fbcb_box_align',
                    'label'   => 'Comment box align',
                    'desc'    => 'Select comment box alignment.<br> 
                                    <code>Left</code> - To show comment box in left. <br>
                                    <code>Center</code> - To show comment box in center. <br>
                                    <code>Right</code> - To show comment box in right. <br>
                                 ',
                    'type'    => 'select',
                    'default' => 'left',
                    'options' => array(
                        'left' => 'Left',
                        'center' => 'Center',
                        'right' => 'Right'
                    )
                ),
                array(
                    'name'    => 'fbcb_color_scheme',
                    'label'   => 'Comment box color scheme',
                    'desc'    => 'Select comment color scheme.<br> 
                                    <code>Light</code> - All link color is fb classic blue and text color is black. <br>
                                    <code>Dark</code> - Text color is white. <br>
                                 ',
                    'type'    => 'select',
                    'default' => 'light',
                    'options' => array(
                        'light' => 'Light',
                        'dark' => 'Dark',
                    )
                )
               
            ),
            'facebook_comment_box_settings_styles' => array(
                array(
                    'name'    => 'settings_section_title1',
                    'label'   => 'Comment Box header title',
                ),
                array(
                    'name'    => 'fbcb_header_label_font_size',
                    'label'   => 'Font size',
                    'type'   => 'text',
                    'desc'    => '',
                    'default' => '35px'
                ),
                array(
                    'name'    => 'fbcb_header_label_font_weight',
                    'label'   => 'Font weight',
                    'type'   => 'text',
                    'desc'    => '',
                    'default' => 'bold'
                ),
                array(
                    'name'    => 'fbcb_header_label_font_color',
                    'label'   => 'Font color',
                    'desc'    => '',
                    'type'    => 'color',
                    'default' => '#000'
                ),
                array(
                    'name'    => 'fbcb_header_label_font_align',
                    'label'   => 'Text align',
                    'desc'    => '',
                    'type'    => 'select',
                    'options' =>  array(
                        'left'    => 'Left',
                        'center'  => 'Center',
                        'right'   => 'Right',
                    )
                ),
                array(
                    'name'    => 'settings_section_title2',
                    'label'   => 'Comment Box Container styles',
                ),
                array(
                    'name'    => 'fbcb_box_container_bg',
                    'label'   => 'Background color',
                    'desc'    => '',
                    'type'    => 'color',
                    'default' => '#ddd',
                ),
                array(
                    'name'    => 'fbcb_box_container_padding',
                    'label'   => 'Area padding',
                    'desc'    => '',
                    'type'    => 'text',
                    'default' => '35px',
                ),
                array(
                    'name'    => 'fbcb_box_container_bg_img',
                    'type'    => 'file',
                    'label'   => 'Background image',
                    'options' => array(
                        'button_label' => 'Choose Image'
                    )
                ),
                array(
                    'name'    => 'fbcb_box_container_bg_img_repeat',
                    'type'    => 'select',
                    'label'   => 'Background Repeat',
                    'default' => 'repeat',
                    'options' => array(
                        'no-repeat' => 'No repeat',
                        'repeat' => 'Repeat',
                        'repeat-x' => 'Repeat horizontally',
                        'repeat-y' => 'Repeat vertically',
                    )
                ),
                array(
                    'name'    => 'fbcb_box_container_bg_img_pos',
                    'type'    => 'select',
                    'label'   => 'Background position',
                    'default' => 'top center',
                    'options' => array(
                        'top left' => 'Left',
                        'top center' => 'Center',
                        'top right' => 'Right'
                    )
                ),
                array(
                    'name'    => 'fbcb_box_container_bg_img_attachment',
                    'type'    => 'select',
                    'label'   => 'Background attachment',
                    'default' => 'scroll',
                    'options' => array(
                        'scroll' => 'Scroll',
                        'fixed' => 'Fixed',
                    )
                ),
                array(
                    'name'    => 'fbcb_box_container_bg_size',
                    'type'    => 'select',
                    'label'   => 'Background size',
                    'default' => 'auto',
                    'options' => array(
                        'auto'  => 'Auto',
                        'cover' => 'Cover'
                    )
                ),
                array(
                    'name'    => 'settings_section_title3',
                    'label'   => 'Comment Box Styles',
                ),
                array(
                    'name'    => 'fbcb_box_padding',
                    'label'   => 'Area Padding',
                    'desc'    => '',
                    'type'    => 'text',
                    'default' => '15px',
                ),
                array(
                    'name'    => 'fbcb_box_bg',
                    'label'   => 'Background color',
                    'desc'    => '',
                    'type'    => 'color',
                    'default' => '#fff',
                ),
                array(
                    'name'    => 'fbcb_box_bg_img',
                    'type'    => 'file',
                    'label'   => 'Background image',
                    'options' => array(
                        'button_label' => 'Choose Image'
                    )
                ),
                array(
                    'name'    => 'fbcb_box_bg_img_repeat',
                    'type'    => 'select',
                    'label'   => 'Background Repeat',
                    'default' => 'repeat',
                    'options' => array(
                        'no-repeat' => 'No repeat',
                        'repeat'    => 'Repeat',
                        'repeat-x'  => 'Repeat horizontally',
                        'repeat-y'  => 'Repeat vertically',
                    )
                ),
                array(
                    'name'    => 'fbcb_box_bg_img_pos',
                    'type'    => 'select',
                    'label'   => 'Background position',
                    'default' => 'top center',
                    'options' => array(
                        'top left' => 'Left',
                        'top center' => 'Center',
                        'top right' => 'Right'
                    )
                ),
                array(
                    'name'    => 'fbcb_box_bg_img_attachment',
                    'type'    => 'select',
                    'label'   => 'Background attachment',
                    'default' => 'scroll',
                    'options' => array(
                        'scroll' => 'Scroll',
                        'fixed' => 'Fixed',
                    )
                ),
                array(
                    'name'    => 'fbcb_box_bg_size',
                    'type'    => 'select',
                    'label'   => 'Background size',
                    'default' => 'auto',
                    'options' => array(
                        'auto' => 'Auto',
                        'cover' => 'Cover'
                    )
                ),
            )
        
        );

        return $settings_fields;
    }

    function plugin_page() {
        echo '<div class="wrap"><h1 style="font-weight:bold">Facebook Comment Box plugin</h1><br><p class="description">By <a href="http://www.facebook.com/rayhan095" target="_blank">King Rayhan</a></p>';

        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();

        echo '</div>';
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

}
endif;


/**
    * Get the value of a settings field
    *
    * @param string $option settings field name
    * @param string $section the section name this field belongs to
    * @param string $default default text if it's not found
    * @return mixed
    */
    function fbcb_option( $option, $section, $default = '' ) {
     
        $options = get_option( $section );
     
        if ( isset( $options[$option] ) ) {
            return $options[$option];
        }
     
        return $default;
    }