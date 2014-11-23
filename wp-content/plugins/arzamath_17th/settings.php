<?php
if(!class_exists('WP_Plugin_Template_Settings'))
{
    class WP_Plugin_Template_Settings
    {
        /**
         * Construct the plugin object
         */
        public function __construct()
        {
            // register actions
            add_action('admin_init', array(&$this, 'admin_init'));
            add_action('admin_menu', array(&$this, 'add_menu'));
        } // END public function __construct
        /**
         * hook into WP's admin_init action hook
         */
        public function admin_init()
        {
            // register your plugin's settings
            register_setting('wp_plugin_template-group', 'setting_text');
            register_setting('wp_plugin_template-group', 'setting_select');
            // add your settings section
            add_settings_section(
                'wp_plugin_template-section',
                'WP Plugin Template Settings',
                array(&$this, 'settings_section_wp_plugin_template'),
                'wp_plugin_template'
            );
            // add your setting's fields
            add_settings_field(
                'wp_plugin_template-setting_text',
                'Setting TEXT',
                array(&$this, 'settings_field_input_text'),
                'wp_plugin_template',
                'wp_plugin_template-section',
                array(
                    'field' => 'setting_text'
                )
            );
            add_settings_field(
                'wp_plugin_template-setting_select',
                'Setting SELECT',
                array(&$this, 'settings_field_input_select'),
                'wp_plugin_template',
                'wp_plugin_template-section',
                array(
                    'field' => 'setting_select'
                )
            );
            // Possibly do additional admin_init tasks
        } // END public static function activate
        public function settings_section_wp_plugin_template()
        {
            // Think of this as help text for the section.
            echo 'These settings do things for the WP Plugin Template.';
        }
        /**
         * This function provides text inputs for settings fields
         */
        public function settings_field_input_text($args)
        {
            // Get the field name from the $args array
            $field = $args['field'];
            // Get the value of this setting
            $value = get_option($field);
            // echo a proper input type="text"
            echo sprintf('<input type="text" name="%s" id="%s" value="%s" />', $field, $field, $value);
        } // END public function settings_field_input_text($args)
        /**
         * This function provides select for settings fields
         */
        public function settings_field_input_select($args)
        {
            // Get the field name from the $args array
            $field = $args['field'];
            // Get the value of this setting
            $value = get_option($field);
            // echo a proper input type="text"
            echo sprintf('<select name="%s" id="%s" >
                            <option value="1">Аргентина</option>
                            <option value="2">Бразилія</option>
                            <option value="3">Венесуела</option>
                            <option value="4">Гватемала</option>
                          </select>', $field, $field, $value);
        } // END public function settings_field_input_text($args)
        /**
         * add a menu
         */
        public function add_menu()
        {
            // Add a page to manage this plugin's settings
            add_options_page(
                'WP Plugin Template Settings',
                'WP Plugin Template',
                'manage_options',
                'wp_plugin_template',
                array(&$this, 'plugin_settings_page')
            );
        } // END public function add_menu()
        /**
         * Menu Callback
         */
        public function plugin_settings_page()
        {
            if(!current_user_can('manage_options'))
            {
                wp_die(__('You do not have sufficient permissions to access this page.'));
            }
            // Render the settings template
            include(sprintf("%s/templates/settings.php", dirname(__FILE__)));
        } // END public function plugin_settings_page()
    } // END class WP_Plugin_Template_Settings
} // END if(!class_exists('WP_Plugin_Template_Settings'))