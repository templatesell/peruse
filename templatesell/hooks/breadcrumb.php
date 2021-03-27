<?php
/**
 * Functions to manage breadcrumbs
 */
if (!function_exists('peruse_breadcrumb_options')) :
    function peruse_breadcrumb_options()
    {
        global $peruse_theme_options;
        if (1 == $peruse_theme_options['peruse-extra-breadcrumb']) {
            peruse_breadcrumbs();
        }
    }
endif;
add_action('peruse_breadcrumb_options_hook', 'peruse_breadcrumb_options');

/**
 * BreadCrumb Settings
 */
if (!function_exists('peruse_breadcrumbs')):
    function peruse_breadcrumbs()
    {
        global $peruse_theme_options;
        $breadcrumb_from = $peruse_theme_options['peruse-breadcrumb-selection-option'];        
        if ((function_exists('yoast_breadcrumb')) && ($breadcrumb_from == 'yoast-breadcrumb')) {
            yoast_breadcrumb();
        }elseif('rankmath' == $breadcrumb_from && (function_exists('rank_math_the_breadcrumbs'))) {
          rank_math_the_breadcrumbs();
        }elseif ((function_exists('bcn_display')) && ($breadcrumb_from == 'navxt-breadcrumb')) {
            bcn_display();
        }else{

            if (!function_exists('peruse_breadcrumb_trail')) {
                require get_template_directory() . '/templatesell/breadcrumbs/breadcrumbs.php';
            }
            $breadcrumb_args = array(
                'container' => 'div',
                'show_browse' => false
            );        
            peruse_breadcrumb_trail($breadcrumb_args);
        }
    }
endif;
add_action('peruse_breadcrumbs_hook', 'peruse_breadcrumbs');