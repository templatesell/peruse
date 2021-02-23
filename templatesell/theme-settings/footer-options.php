<?php
/*Footer Options*/
$wp_customize->add_section('peruse_footer_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Footer Settings', 'peruse'),
    'panel' => 'peruse_panel',
));


/*Copyright Setting*/
$wp_customize->add_setting('peruse_options[peruse-footer-copyright]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['peruse-footer-copyright'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('peruse_options[peruse-footer-copyright]', array(
    'label' => __('Copyright Text', 'peruse'),
    'description' => __('Enter your own copyright text.', 'peruse'),
    'section' => 'peruse_footer_section',
    'settings' => 'peruse_options[peruse-footer-copyright]',
    'type' => 'text',
    'priority' => 15,
));
