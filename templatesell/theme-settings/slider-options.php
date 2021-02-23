<?php
$GLOBALS['peruse_theme_options'] = peruse_get_options_value();

/*Slider Options*/

$wp_customize->add_section( 'peruse_slider_section', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Slider Settings', 'peruse' ),
   'panel' 		 => 'peruse_panel',
) );


/*Slider Enable Option*/
$wp_customize->add_setting( 'peruse_options[peruse_enable_slider]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['peruse_enable_slider'],
   'sanitize_callback' => 'peruse_sanitize_checkbox'
) );

$wp_customize->add_control(
    'peruse_options[peruse_enable_slider]', 
    array(
       'label'     => __( 'Enable Slider', 'peruse' ),
       'description' => __('You can select the category for the slider below. More Options are available on premium version.', 'peruse'),
       'section'   => 'peruse_slider_section',
       'settings'  => 'peruse_options[peruse_enable_slider]',
        'type'      => 'checkbox',
       'priority'  => 15,
   )
 );    

 /*callback functions slider*/
if ( !function_exists('peruse_slider_active_callback') ) :
  function peruse_slider_active_callback(){
      global $peruse_theme_options;
      $enable_slider =  absint($peruse_theme_options['peruse_enable_slider']);     
      if( 1 == $enable_slider ){
          return true;
      }
      else{
          return false;
      }
  }
endif;    

/*Slider Category Selection*/
$wp_customize->add_setting( 'peruse_options[peruse-select-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['peruse-select-category'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new Peruse_Customize_Category_Dropdown_Control(
        $wp_customize,
        'peruse_options[peruse-select-category]',
        array(
            'label'     => __( 'Select Category For Slider', 'peruse' ),
            'description' => __('Choose one category to show the slider. More settings are in pro version.', 'peruse'),
            'section'   => 'peruse_slider_section',
            'settings'  => 'peruse_options[peruse-select-category]',
            'type'      => 'category_dropdown',
            'priority'  => 15,
            'active_callback'=> 'peruse_slider_active_callback',
        )
    )

);