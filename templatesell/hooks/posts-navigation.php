<?php
/**
 * Post Navigation Function
 *
 * @since Peruse 1.0.0
 *
 * @param null
 * @return void
 *
 */
if (!function_exists('peruse_posts_navigation')) :
    function peruse_posts_navigation()
    {
        global $peruse_theme_options;
        $peruse_pagination_option = $peruse_theme_options['peruse-pagination-options'];
        if ('numeric' == $peruse_pagination_option) {
            echo "<div class='pagination'>";
                the_posts_pagination();
            echo "</div>";
        } elseif ('ajax' == $peruse_pagination_option) {
            $page_number = get_query_var('paged');
            if ($page_number == 0) {
                $output_page = 2;
            } else {
                $output_page = $page_number + 1;
            }
            echo "<div class='ajax-pagination text-center'><div class='show-more' data-number='esc_attr($output_page)'><i class='fa fa-refresh'></i>" . __('View More', 'peruse') . "</div><div id='free-temp-post'></div></div>";
        } else {
            return false;
        }
    }
endif;
add_action('peruse_action_navigation', 'peruse_posts_navigation', 10);