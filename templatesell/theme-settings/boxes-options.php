<?php
$GLOBALS['peruse_theme_options'] = peruse_get_options_value();

/*Promo Section Options*/

$wp_customize->add_section( 'peruse_promo_section', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Boxes Below Slider Settings', 'peruse' ),
    'panel'          => 'peruse_panel',
) );

/*callback functions boxes*/
if ( !function_exists('peruse_promo_active_callback') ) :
        function peruse_promo_active_callback(){
        global $peruse_theme_options;
        $enable_promo = absint($peruse_theme_options['peruse_enable_promo']);
        if( 1 == $enable_promo ){
            return true;
        }
        else{
            return false;
        }
    }
endif;

/*Boxes Enable Option*/
$wp_customize->add_setting( 'peruse_options[peruse_enable_promo]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['peruse_enable_promo'],
    'sanitize_callback' => 'peruse_sanitize_checkbox'
) );

$wp_customize->add_control( 'peruse_options[peruse_enable_promo]', array(
    'label'     => __( 'Enable Boxes', 'peruse' ),
    'description' => __('Enable and select the category to show the boxes below slider.', 'peruse'),
    'section'   => 'peruse_promo_section',
    'settings'  => 'peruse_options[peruse_enable_promo]',
    'type'      => 'checkbox',
    'priority'  => 5,

) );

/*Promo Category Selection*/
$wp_customize->add_setting( 'peruse_options[peruse-promo-select-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['peruse-promo-select-category'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new Peruse_Customize_Category_Dropdown_Control(
        $wp_customize,
        'peruse_options[peruse-promo-select-category]',
        array(
            'label'     => __( 'Category For Boxes', 'peruse' ),
            'description' => __('From the dropdown select the category for the boxes. Category having post will display in below boxes section.', 'peruse'),
            'section'   => 'peruse_promo_section',
            'settings'  => 'peruse_options[peruse-promo-select-category]',
            'type'      => 'category_dropdown',
            'priority'  => 5,
            'active_callback'=>'peruse_promo_active_callback'
        )
    )
);