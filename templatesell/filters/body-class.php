<?php
/**
 * Add sidebar class in body
 *
 * @since Peruse 1.0.0
 *
 */

add_filter('body_class', 'peruse_body_class');
function peruse_body_class($classes)
{
    $classes[] = 'at-sticky-sidebar';
    global $peruse_theme_options;
    
    if (is_singular()) {
        $sidebar = $peruse_theme_options['peruse-sidebar-single-page'];
        if ($sidebar == 'single-no-sidebar') {
            $classes[] = 'single-no-sidebar';
        } elseif ($sidebar == 'single-left-sidebar') {
            $classes[] = 'single-left-sidebar';
        } elseif ($sidebar == 'single-middle-column') {
            $classes[] = 'single-middle-column';
        } else {
            $classes[] = 'single-right-sidebar';
        }
    }
    
    $sidebar = $peruse_theme_options['peruse-sidebar-blog-page'];
    if ($sidebar == 'no-sidebar') {
        $classes[] = 'no-sidebar';
    } elseif ($sidebar == 'left-sidebar') {
        $classes[] = 'left-sidebar';
    } elseif ($sidebar == 'middle-column') {
        $classes[] = 'middle-column';
    } else {
        $classes[] = 'right-sidebar';
    }
    return $classes;
}

/**
 * Add layout class in body
 *
 * @since Peruse 1.0.0
 *
 */

add_filter('body_class', 'peruse_layout_body_class');
function peruse_layout_body_class($classes)
{
    global $peruse_theme_options;
    $layout = $peruse_theme_options['peruse-column-blog-page'];
    if ($layout == 'masonry-post') {
        $classes[] = 'masonry-post';
    } else {
        $classes[] = 'one-column';
    }    
    return $classes;
}


/**
 * Filter to hide text Category from category page
 *
 * @since Peruse 1.0.9
 *
 */
add_filter( 'get_the_archive_title', function ( $title ) {
    if( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
});