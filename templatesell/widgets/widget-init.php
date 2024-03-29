<?php

if ( ! function_exists( 'peruse_load_widgets' ) ) :

    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function peruse_load_widgets() {

        // Highlight Post.
        register_widget( 'Peruse_Featured_Post' );

        // Author Widget.
        register_widget( 'Peruse_Author_Widget' );
		
		// Social Widget.
        register_widget( 'Peruse_Social_Widget' );

        // Tabbed Widget.
        register_widget( 'Peruse_Tabbed' );
    }
endif;
add_action( 'widgets_init', 'peruse_load_widgets' );


