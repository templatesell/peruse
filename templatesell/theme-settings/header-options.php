<?php
$GLOBALS['peruse_theme_options'] = peruse_get_options_value();

/*Header Options*/
$wp_customize->add_section('peruse_header_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Header Settings', 'peruse'),
    'panel' => 'peruse_panel',
));


/*Header Search Enable Option*/
$wp_customize->add_setting( 'peruse_options[peruse_enable_search]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['peruse_enable_search'],
    'sanitize_callback' => 'peruse_sanitize_checkbox'
) );

$wp_customize->add_control( 'peruse_options[peruse_enable_search]', array(
    'label'     => __( 'Enable Search', 'peruse' ),
    'description' => __('It will help to display the search in Menu.', 'peruse'),
    'section'   => 'peruse_header_section',
    'settings'  => 'peruse_options[peruse_enable_search]',
    'type'      => 'checkbox',
    'priority'  => 5,

) );


/*Header Offcanvas Enable Option*/
$wp_customize->add_setting( 'peruse_options[peruse_enable_offcanvas]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['peruse_enable_offcanvas'],
    'sanitize_callback' => 'peruse_sanitize_checkbox'
) );

$wp_customize->add_control( 'peruse_options[peruse_enable_offcanvas]', array(
    'label'     => __( 'Enable Offcanvas Sidebar', 'peruse' ),
    'description' => __('It will help to display the Offcanvas sidebar in Menu.', 'peruse'),
    'section'   => 'peruse_header_section',
    'settings'  => 'peruse_options[peruse_enable_offcanvas]',
    'type'      => 'checkbox',
    'priority'  => 5,

) );

/*Mobile menu icon option*/
$wp_customize->add_setting('peruse_options[peruse_mobile_menu_option]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['peruse_mobile_menu_option'],
    'sanitize_callback' => 'peruse_sanitize_select'
));

$wp_customize->add_control('peruse_options[peruse_mobile_menu_option]', array(
    'choices' => array(
        'menu-text' => __('Menu Text in Mobile', 'peruse'),
        'menu-icon' => __('Hamberger Menu in Mobile', 'peruse'),
    ),
    'label' => __('Select the Mobile Menu Type', 'peruse'),
    'description' => __('You can either select the text mode or hamberger menu in mobile layout.', 'peruse'),
    'section' => 'peruse_header_section',
    'settings' => 'peruse_options[peruse_mobile_menu_option]',
    'type' => 'select',
    'priority' => 15,
));

/*callback functions mobile menu type*/
if (!function_exists('peruse_mobile_menu_type_callback')) :
    function peruse_mobile_menu_type_callback()
    {
        global $peruse_theme_options;
        $mobile_menu_type = esc_attr($peruse_theme_options['peruse_mobile_menu_option']);
        if ( 'menu-text' == $mobile_menu_type) {
            return true;
        } else {
            return false;
        }
    }
endif;

/*Mobile Menu Text*/
$wp_customize->add_setting( 'peruse_options[peruse_mobile_menu_text]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['peruse_mobile_menu_text'],
    'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( 'peruse_options[peruse_mobile_menu_text]', array(
    'label'     => __( 'Enter the Mobile Menu Text', 'peruse' ),
    'description' => __('In the Mobile view mode, you can see Menu text. Change this text from here. It will only available on the mobile view mode.', 'peruse'),
    'section'   => 'peruse_header_section',
    'settings'  => 'peruse_options[peruse_mobile_menu_text]',
    'type'      => 'text',
    'priority'  => 15,
    'active_callback' => 'peruse_mobile_menu_type_callback',

) );