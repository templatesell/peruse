<?php
$GLOBALS['peruse_theme_options'] = peruse_get_options_value();

/*Single Page Options*/
$wp_customize->add_section('peruse_single_page_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Single Page Settings', 'peruse'),
    'panel' => 'peruse_panel',
));

/*Featured Image Option*/
$wp_customize->add_setting('peruse_options[peruse-single-page-featured-image]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['peruse-single-page-featured-image'],
    'sanitize_callback' => 'peruse_sanitize_checkbox'
));

$wp_customize->add_control('peruse_options[peruse-single-page-featured-image]', array(
    'label' => __('Enable Featured Image on Single Posts', 'peruse'),
    'description' => __('You can hide images on single post from here.', 'peruse'),
    'section' => 'peruse_single_page_section',
    'settings' => 'peruse_options[peruse-single-page-featured-image]',
    'type' => 'checkbox',
    'priority' => 15,
));

/*Single Page Sidebar Layout*/
$wp_customize->add_setting('peruse_options[peruse-sidebar-single-page]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['peruse-sidebar-single-page'],
    'sanitize_callback' => 'peruse_sanitize_select'
));

$wp_customize->add_control( 
    new Peruse_Radio_Image_Control(
        $wp_customize,
    'peruse_options[peruse-sidebar-single-page]', array(
    'choices' => peruse_sidebar_position_array(),
    'label' => __('Select Sidebar', 'peruse'),
    'description' => __('From Appearance > Customize > Widgets and add the widgets on the respected widget areas.', 'peruse'),
    'section' => 'peruse_single_page_section',
    'settings' => 'peruse_options[peruse-sidebar-single-page]',
    'type' => 'select',
    'priority' => 15,
)));

/*Related Post Options*/
$wp_customize->add_setting('peruse_options[peruse-single-page-related-posts]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['peruse-single-page-related-posts'],
    'sanitize_callback' => 'peruse_sanitize_checkbox'
));

$wp_customize->add_control('peruse_options[peruse-single-page-related-posts]', array(
    'label' => __('Related Posts', 'peruse'),
    'description' => __('2 posts of same category will appear.', 'peruse'),
    'section' => 'peruse_single_page_section',
    'settings' => 'peruse_options[peruse-single-page-related-posts]',
    'type' => 'checkbox',
    'priority' => 15,
));


/*callback functions related posts*/
if (!function_exists('peruse_related_post_callback')) :
        function peruse_related_post_callback()
    {
        global $peruse_theme_options;
        $related_posts = absint($peruse_theme_options['peruse-single-page-related-posts']);
        if (1 == $related_posts) {
            return true;
        } else {
            return false;
        }
    }
endif;

/*Related Post Title*/
$wp_customize->add_setting('peruse_options[peruse-single-page-related-posts-title]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['peruse-single-page-related-posts-title'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('peruse_options[peruse-single-page-related-posts-title]', array(
    'label' => __('Related Posts Title', 'peruse'),
    'description' => __('Enter the suitable title.', 'peruse'),
    'section' => 'peruse_single_page_section',
    'settings' => 'peruse_options[peruse-single-page-related-posts-title]',
    'type' => 'text',
    'priority' => 15,
    'active_callback' => 'peruse_related_post_callback'
));

/*Social Share Options*/
$wp_customize->add_setting('peruse_options[peruse-single-social-share]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['peruse-single-social-share'],
    'sanitize_callback' => 'peruse_sanitize_checkbox'
));

$wp_customize->add_control('peruse_options[peruse-single-social-share]', array(
    'label' => __('Social Sharing', 'peruse'),
    'description' => __('Enable Social Sharing on Single Posts.', 'peruse'),
    'section' => 'peruse_single_page_section',
    'settings' => 'peruse_options[peruse-single-social-share]',
    'type' => 'checkbox',
    'priority' => 15,
));

/*Tag Option*/
$wp_customize->add_setting('peruse_options[peruse-single-page-tags-option]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['peruse-single-page-tags-option'],
    'sanitize_callback' => 'peruse_sanitize_checkbox'
));

$wp_customize->add_control('peruse_options[peruse-single-page-tags-option]', array(
    'label' => __('Enable Tags on Single Posts', 'peruse'),
    'description' => __('You can hide tags on single post from here.', 'peruse'),
    'section' => 'peruse_single_page_section',
    'settings' => 'peruse_options[peruse-single-page-tags-option]',
    'type' => 'checkbox',
    'priority' => 15,
));
