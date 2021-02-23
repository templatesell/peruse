<?php 
/*Extra Options*/

        $wp_customize->add_section( 'peruse_extra_options', array(
            'priority'       => 20,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Breadcrumb Settings', 'peruse' ),
            'panel'          => 'peruse_panel',
        ) );



        /*Breadcrumb Enable*/
        $wp_customize->add_setting( 'peruse_options[peruse-extra-breadcrumb]', array(
            'capability'        => 'edit_theme_options',
            'transport' => 'refresh',
            'default'           => $default['peruse-extra-breadcrumb'],
            'sanitize_callback' => 'peruse_sanitize_checkbox'
        ) );

        $wp_customize->add_control( 'peruse_options[peruse-extra-breadcrumb]', array(
            'label'     => __( 'Enable Breadcrumb', 'peruse' ),
            'description' => __( 'Breadcrumb will appear on all pages except home page. More settings will be on the premium version.', 'peruse' ),
            'section'   => 'peruse_extra_options',
            'settings'  => 'peruse_options[peruse-extra-breadcrumb]',
            'type'      => 'checkbox',
            'priority'  => 15,
        ) );

/*Select the breadcrumb from plugins or themes.*/
$wp_customize->add_setting('peruse_options[peruse-breadcrumb-selection-option]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['peruse-breadcrumb-selection-option'],
    'sanitize_callback' => 'peruse_sanitize_select'
));

$wp_customize->add_control('peruse_options[peruse-breadcrumb-selection-option]', array(
    'choices' => array(
        'theme-breadcrumb' => __('Theme Breadcrumb', 'peruse'),
        'yoast-breadcrumb' => __('Yoast SEO Breadcrumb', 'peruse'),
        'navxt-breadcrumb' => __('NavXT Breadcrumb', 'peruse'),    
    ),
    'label' => __('Select the Breadcrumb', 'peruse'),
    'description' => __('After enable the breadcrumb, you need to install Yoast SEO, Rank Math or Breadcrumb NavXT plugin for added breadcrumb option.', 'peruse'),
    'section' => 'peruse_extra_options',
    'settings' => 'peruse_options[peruse-breadcrumb-selection-option]',
    'type' => 'select',
    'priority' => 15,
));