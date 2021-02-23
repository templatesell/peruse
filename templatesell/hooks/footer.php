<?php
/**
 * Goto Top functions
 *
 * @since Peruse 1.0.0
 *
 */

if (!function_exists('peruse_go_to_top')) :
    function peruse_go_to_top()
    {
    ?>
            <a id="toTop" class="go-to-top" href="#" title="<?php esc_attr_e('Go to Top', 'peruse'); ?>">
                <i class="fa fa-angle-double-up"></i>
            </a>
<?php
    } endif;
add_action('peruse_go_to_top_hook', 'peruse_go_to_top', 10, 1);