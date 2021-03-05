<?php
/**
 * Peruse Theme Customizer
 *
 * @package Peruse
 */

if ( !function_exists('peruse_default_theme_options_values') ) :

    function peruse_default_theme_options_values() {

        $default_theme_options = array(

            /*Logo Options*/
            'peruse_logo_width_option' => '700',

            /*Top Header*/
            'peruse_enable_top_header'=> 0, 
            'peruse_enable_top_header_social'=> 0,
            'peruse_enable_top_header_menu'=> 0,

            /*Header Image*/
            'peruse_enable_header_image_overlay'=> 0,
            'peruse_slider_overlay_color'=> '#000000',
            'peruse_slider_overlay_transparent'=> '0.1',
            'peruse_header_image_height'=> '100',

            /*Header Options*/
            'peruse_enable_offcanvas'  => 1,
            'peruse_enable_search'  => 1,

            /*Menu Options*/
            'peruse_mobile_menu_text'  => esc_html__('Menu','peruse'),
            'peruse_mobile_menu_option'=> 'menu-text',

            /*Colors Options*/
            'peruse_primary_color'  => '#EF9D87',

            /*Slider Options*/
            'peruse_enable_slider'      => 0,
            'peruse-select-category'    => 0,
    
            /*Boxes Section */
            'peruse_enable_promo'       => 0,
            'peruse-promo-select-category'=> 0,
            
            /*Blog Page*/
            'peruse-sidebar-blog-page' => 'no-sidebar',
            'peruse-column-blog-page'  => 'masonry-post',
            'peruse-blog-image-layout' => 'full-image',
            'peruse-content-show-from' => 'excerpt',
            'peruse-excerpt-length'    => 25,
            'peruse-pagination-options'=> 'numeric',
            'peruse-read-more-text'    => '',
            'peruse-blog-exclude-category'=> '',
            'peruse-show-hide-share'   => 1,
            'peruse-show-hide-category'=> 1,
            'peruse-show-hide-date'=> 1,
            'peruse-show-hide-author'=> 1,

            /*Single Page */
            'peruse-single-page-featured-image' => 1,
            'peruse-single-page-related-posts'  => 1,
            'peruse-single-page-related-posts-title' => esc_html__('You may like','peruse'),
            'peruse-sidebar-single-page'=> 'single-right-sidebar',
            'peruse-single-social-share' => 1,
            'peruse-single-page-tags-option'=>0,

            /*Sticky Sidebar*/
            'peruse-enable-sticky-sidebar' => 0,

            /*Footer Section*/
            'peruse-footer-copyright'  => esc_html__('&#169; All Rights Reserved 2021','peruse'),

            /*Breadcrumb Options*/
            'peruse-extra-breadcrumb' => 1,
            'peruse-breadcrumb-selection-option'=> 'theme-breadcrumb',

        );
return apply_filters( 'peruse_default_theme_options_values', $default_theme_options );
}
endif;
/**
 *  Peruse Theme Options and Settings
 *
 * @since Peruse 1.0.0
 *
 * @param null
 * @return array peruse_get_options_value
 *
 */
if ( !function_exists('peruse_get_options_value') ) :
    function peruse_get_options_value() {
        $peruse_default_theme_options_values = peruse_default_theme_options_values();
        $peruse_get_options_value = get_theme_mod( 'peruse_options');
        if( is_array( $peruse_get_options_value )){
            return array_merge( $peruse_default_theme_options_values, $peruse_get_options_value );
        }
        else{
            return $peruse_default_theme_options_values;
        }
    }
endif;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function peruse_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
    if ( isset( $wp_customize->selective_refresh ) ) {
      $wp_customize->selective_refresh->add_partial( 'blogname', array(
         'selector'        => '.site-title a',
         'render_callback' => 'peruse_customize_partial_blogname',
     ) );
      $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
         'selector'        => '.site-description',
         'render_callback' => 'peruse_customize_partial_blogdescription',
     ) );
  }
  $default = peruse_default_theme_options_values();

  require get_template_directory() . '/templatesell/theme-settings/theme-settings.php';

}
add_action( 'customize_register', 'peruse_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function peruse_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function peruse_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function peruse_customize_preview_js() {
	wp_enqueue_script( 'peruse-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20200412', true );
}
add_action( 'customize_preview_init', 'peruse_customize_preview_js' );

/*
** Customizer Styles
*/
function peruse_panels_css() {
     wp_enqueue_style('peruse-customizer-css', get_template_directory_uri() . '/css/customizer-style.css', array(), '4.5.0');
}
add_action( 'customize_controls_enqueue_scripts', 'peruse_panels_css' );