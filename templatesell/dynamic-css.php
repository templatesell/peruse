<?php
/**
 * Dynamic css
 *
 * @since Peruse 1.0.0
 *
 * @param null
 * @return null
 *
 */
if (!function_exists('peruse_dynamic_css')) :

    function peruse_dynamic_css()
    {
        global $peruse_theme_options;

        /* Color Options Options */
        $peruse_primary_color = sanitize_hex_color( $peruse_theme_options['peruse_primary_color'] );

        if ( null === $peruse_primary_color ) {
            $peruse_defaults      = peruse_default_theme_options_values();
            $peruse_primary_color = $peruse_defaults['peruse_primary_color'];
        }
        $peruse_logo_width              = absint($peruse_theme_options['peruse_logo_width_option']);

        $peruse_header_overlay  = esc_attr($peruse_theme_options['peruse_slider_overlay_color']);
        $peruse_header_transparent  = esc_attr($peruse_theme_options['peruse_slider_overlay_transparent']);
        $peruse_header_min_height              = absint($peruse_theme_options['peruse_header_image_height']);


        $custom_css = '';

        /*
         * Every accent-coloured surface in the stylesheet, repainted from one
         * generated map. The three hand-written blocks this replaced named 60
         * of the 138 selectors that use the default accent, so more than half
         * the theme stayed #0017ff whatever the user chose - blockquote marks,
         * every comment link hover and focus, checked radios and checkboxes,
         * pagination hovers, the 404 page's links, widget titles, and the
         * whole text-widget form.
         */
        if ( null !== $peruse_primary_color ) {
            foreach ( peruse_accent_selectors() as $peruse_property => $peruse_list ) {
                $custom_css .= sprintf(
                    '%1$s { %2$s: %3$s; }',
                    implode( ', ', $peruse_list ),
                    $peruse_property,
                    $peruse_primary_color
                );
            }
        }

        //Logo Width
        if (!empty($peruse_logo_width)) {
            $custom_css .= "
            .header-1 .head_one .logo{ 
                max-width : ". $peruse_logo_width."px; 
            }";
        }

         //Header Overlay
        if (!empty($peruse_header_overlay)) {
            $custom_css .= "
            .header-image:before { 
                background-color : ". $peruse_header_overlay."; 
            }";
        }

        //Header Tranparent
        if (!empty($peruse_header_transparent)) {
            $custom_css .= "
            .header-image:before { 
                opacity : ". $peruse_header_transparent."; 
            }";
        }

        //Header Min Height
        if (!empty($peruse_header_min_height)) {
            $custom_css .= "
            .header-1 .header-image .head_one { 
                min-height : ". $peruse_header_min_height."px; 
            }";
        }

        wp_add_inline_style('peruse-style', $custom_css);
    }
endif;
add_action('wp_enqueue_scripts', 'peruse_dynamic_css', 99);