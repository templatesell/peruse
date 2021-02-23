<?php
/*Blog Page Options*/
$wp_customize->add_section('peruse_blog_page_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Blog Settings', 'peruse'),
    'panel' => 'peruse_panel',
));
/*Blog Page Sidebar Layout*/

$wp_customize->add_setting('peruse_options[peruse-sidebar-blog-page]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['peruse-sidebar-blog-page'],
    'sanitize_callback' => 'peruse_sanitize_select'
));

$wp_customize->add_control( new Peruse_Radio_Image_Control(
        $wp_customize,
    'peruse_options[peruse-sidebar-blog-page]', array(
    'choices' => peruse_blog_sidebar_position_array(),
    'label' => __('Blog and Archive Sidebar', 'peruse'),
    'description' => __('This sidebar will work blog and archive pages.', 'peruse'),
    'section' => 'peruse_blog_page_section',
    'settings' => 'peruse_options[peruse-sidebar-blog-page]',
    'type' => 'select',
    'priority' => 15,
)));


/*Blog Page column number*/
$wp_customize->add_setting('peruse_options[peruse-column-blog-page]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['peruse-column-blog-page'],
    'sanitize_callback' => 'peruse_sanitize_select'
));

$wp_customize->add_control('peruse_options[peruse-column-blog-page]', array(
    'choices' => array(
        'one-column' => __('Single Layout', 'peruse'),
        'masonry-post' => __('Masonry Layout', 'peruse'),
    
    ),
    'label' => __('Blog Layout Options', 'peruse'),
    'description' => __('Change your blog or archive page layout.', 'peruse'),
    'section' => 'peruse_blog_page_section',
    'settings' => 'peruse_options[peruse-column-blog-page]',
    'type' => 'select',
    'priority' => 15,
));


/*Image Layout Options For Blog Page*/
$wp_customize->add_setting('peruse_options[peruse-blog-image-layout]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['peruse-blog-image-layout'],
    'sanitize_callback' => 'peruse_sanitize_select'
));

$wp_customize->add_control('peruse_options[peruse-blog-image-layout]', array(
    'choices' => array(
        'full-image' => __('Full Image', 'peruse'),
        'left-image' => __('Left Image', 'peruse'),
        'right-image' => __('Right Image', 'peruse'),
    
    ),
    'label' => __('Blog Page Layout', 'peruse'),
    'description' => __('This will work only on Full layout Option', 'peruse'),
    'section' => 'peruse_blog_page_section',
    'settings' => 'peruse_options[peruse-blog-image-layout]',
    'type' => 'select',
    'priority' => 15,
));

/*Blog Page Show content from*/
$wp_customize->add_setting('peruse_options[peruse-content-show-from]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['peruse-content-show-from'],
    'sanitize_callback' => 'peruse_sanitize_select'
));

$wp_customize->add_control('peruse_options[peruse-content-show-from]', array(
    'choices' => array(
        'excerpt' => __('Show from Excerpt', 'peruse'),
        'content' => __('Show from Content', 'peruse'),
    ),
    'label' => __('Select Content Display From', 'peruse'),
    'description' => __('You can enable excerpt from Screen Options inside post section of dashboard', 'peruse'),
    'section' => 'peruse_blog_page_section',
    'settings' => 'peruse_options[peruse-content-show-from]',
    'type' => 'select',
    'priority' => 15,
));


/*Blog Page excerpt length*/
$wp_customize->add_setting('peruse_options[peruse-excerpt-length]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['peruse-excerpt-length'],
    'sanitize_callback' => 'absint'

));

$wp_customize->add_control('peruse_options[peruse-excerpt-length]', array(
    'label' => __('Excerpt Length', 'peruse'),
    'description' => __('Enter the number per Words to show the content in blog page.', 'peruse'),
    'section' => 'peruse_blog_page_section',
    'settings' => 'peruse_options[peruse-excerpt-length]',
    'type' => 'number',
    'priority' => 15,
));

/*Blog Page Pagination Options*/
$wp_customize->add_setting('peruse_options[peruse-pagination-options]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['peruse-pagination-options'],
    'sanitize_callback' => 'peruse_sanitize_select'

));

$wp_customize->add_control('peruse_options[peruse-pagination-options]', array(
    'choices' => array(
        'numeric' => __('Numeric Pagination', 'peruse'),
        'ajax' => __('Ajax Pagination', 'peruse'),
    ),
    'label' => __('Pagination Types', 'peruse'),
    'description' => __('Choose Required Pagination Type', 'peruse'),
    'section' => 'peruse_blog_page_section',
    'settings' => 'peruse_options[peruse-pagination-options]',
    'type' => 'select',
    'priority' => 15,
));

/*Blog Page read more text*/
$wp_customize->add_setting('peruse_options[peruse-read-more-text]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['peruse-read-more-text'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('peruse_options[peruse-read-more-text]', array(
    'label' => __('Read More Text', 'peruse'),
    'description' => __('Read more text for blog and archive page.', 'peruse'),
    'section' => 'peruse_blog_page_section',
    'settings' => 'peruse_options[peruse-read-more-text]',
    'type' => 'text',
    'priority' => 15,
));

/*Exclude Category in Blog Page*/
$wp_customize->add_setting('peruse_options[peruse-blog-exclude-category]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['peruse-blog-exclude-category'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('peruse_options[peruse-blog-exclude-category]', array(
    'label' => __('Exclude categories in Blog Listing', 'peruse'),
    'description' => __('Enter categories ids with comma separated eg: 2,7,14,47.', 'peruse'),
    'section' => 'peruse_blog_page_section',
    'settings' => 'peruse_options[peruse-blog-exclude-category]',
    'type' => 'text',
    'priority' => 15,
));


/*Social Share in blog page*/
$wp_customize->add_setting('peruse_options[peruse-show-hide-share]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['peruse-show-hide-share'],
    'sanitize_callback' => 'peruse_sanitize_checkbox'
));

$wp_customize->add_control('peruse_options[peruse-show-hide-share]', array(
    'label' => __('Show Social Share', 'peruse'),
    'description' => __('Options to Enable Social Share in blog and archive page.', 'peruse'),
    'section' => 'peruse_blog_page_section',
    'settings' => 'peruse_options[peruse-show-hide-share]',
    'type' => 'checkbox',
    'priority' => 15,
));

/*Category Show hide*/
$wp_customize->add_setting('peruse_options[peruse-show-hide-category]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['peruse-show-hide-category'],
    'sanitize_callback' => 'peruse_sanitize_checkbox'
));

$wp_customize->add_control('peruse_options[peruse-show-hide-category]', array(
    'label' => __('Show Category', 'peruse'),
    'description' => __('Option to hide the category on the blog page.', 'peruse'),
    'section' => 'peruse_blog_page_section',
    'settings' => 'peruse_options[peruse-show-hide-category]',
    'type' => 'checkbox',
    'priority' => 15,
));
/*Date Show hide*/
$wp_customize->add_setting('peruse_options[peruse-show-hide-date]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['peruse-show-hide-date'],
    'sanitize_callback' => 'peruse_sanitize_checkbox'
));

$wp_customize->add_control('peruse_options[peruse-show-hide-date]', array(
    'label' => __('Show Date', 'peruse'),
    'description' => __('Option to hide the date on the blog page.', 'peruse'),
    'section' => 'peruse_blog_page_section',
    'settings' => 'peruse_options[peruse-show-hide-date]',
    'type' => 'checkbox',
    'priority' => 15,
));
/*Author Show hide*/
$wp_customize->add_setting('peruse_options[peruse-show-hide-author]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['peruse-show-hide-author'],
    'sanitize_callback' => 'peruse_sanitize_checkbox'
));

$wp_customize->add_control('peruse_options[peruse-show-hide-author]', array(
    'label' => __('Show Author', 'peruse'),
    'description' => __('Option to hide the author on the blog page.', 'peruse'),
    'section' => 'peruse_blog_page_section',
    'settings' => 'peruse_options[peruse-show-hide-author]',
    'type' => 'checkbox',
    'priority' => 15,
));