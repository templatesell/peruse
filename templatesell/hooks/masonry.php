<?php
/**
 * Masonry Start Class and Id functions
 *
 * @since Peruse 1.0.0
 *
 */
if (!function_exists('peruse_masonry_start')) :
    function peruse_masonry_start()
    { ?>
        <div class="masonry-start"><div id="masonry-loop">
        
        <?php
    }
endif;
add_action('peruse_masonry_start_hook', 'peruse_masonry_start', 10, 1);

/**
 * Masonry end Div
 *
 * @since Peruse 1.0.0
 *
 */
if (!function_exists('peruse_masonry_end')) :
    function peruse_masonry_end()
    { ?>
        </div>
        </div>
        
        <?php
    }
endif;
add_action('peruse_masonry_end_hook', 'peruse_masonry_end', 10, 1);