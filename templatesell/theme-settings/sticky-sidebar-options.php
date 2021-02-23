<?php 
/*Sticky Sidebar*/
$wp_customize->add_section( 'peruse_sticky_sidebar', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Sticky Sidebar Settings', 'peruse' ),
   'panel' 		 => 'peruse_panel',
) );

/*Sticky Sidebar Setting*/
$wp_customize->add_setting( 'peruse_options[peruse-enable-sticky-sidebar]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['peruse-enable-sticky-sidebar'],
    'sanitize_callback' => 'peruse_sanitize_checkbox'
) );

$wp_customize->add_control( 'peruse_options[peruse-enable-sticky-sidebar]', array(
    'label'     => __( 'Enable Sticky Sidebar', 'peruse' ),
    'description' => __('Enable and Disable sticky sidebar from this section.', 'peruse'),
    'section'   => 'peruse_sticky_sidebar',
    'settings'  => 'peruse_options[peruse-enable-sticky-sidebar]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );