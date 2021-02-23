<?php 
/*Logo Section*/
$wp_customize->add_setting( 'peruse_options[peruse_logo_width_option]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['peruse_logo_width_option'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'peruse_options[peruse_logo_width_option]', array(
   'label'     => __( 'Logo Width', 'peruse' ),
   'description' => __('Adjust the logo width. Minimum is 100px and maximum is 700px.', 'peruse'),
   'section'   => 'title_tagline',
   'settings'  => 'peruse_options[peruse_logo_width_option]',
   'type'      => 'range',
   'priority'  => 15,
   'input_attrs' => array(
          'min' => 100,
          'max' => 700,
        ),
) );