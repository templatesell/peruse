<?php
/**
 * Enqueue scripts and styles.
 */
function peruse_scripts() {

	global $peruse_theme_options;

	// Locally hosted webfonts.
	wp_enqueue_style( 'peruse-fonts', get_template_directory_uri() . '/assets/fonts/fonts.css', array(), PERUSE_VERSION );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0' );

	wp_enqueue_style( 'grid-css', get_template_directory_uri() . '/css/bootstrap.css', array(), '4.0.0' );

	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.8.0' );

	wp_enqueue_style( 'offcanvas-style', get_template_directory_uri() . '/assets/css/canvi.css', array(), PERUSE_VERSION );

	$masonry =  esc_attr($peruse_theme_options['peruse-column-blog-page']);
    if( 'masonry-post' == $masonry )  {
    	wp_enqueue_script( 'masonry' );
    	wp_enqueue_script( 'peruse-custom-masonry', get_template_directory_uri() . '/assets/js/custom-masonry.js', array( 'jquery', 'masonry' ), PERUSE_VERSION, true );
   }

   /*Main CSS*/
    wp_enqueue_style( 'peruse-style', get_stylesheet_uri(), array( 'grid-css' ), PERUSE_VERSION );

	/*RTL CSS*/
	wp_style_add_data( 'peruse-style', 'rtl', 'replace' );

 $peruse_pagination_option =  esc_attr($peruse_theme_options['peruse-pagination-options']);
    
    if( 'ajax' == $peruse_pagination_option )  {
    	
    	wp_enqueue_script( 'peruse-custom-pagination', get_template_directory_uri() . '/assets/js/custom-infinte-pagination.js', array( 'jquery' ), PERUSE_VERSION, true );
    }

	wp_enqueue_script( 'peruse-navigation', get_template_directory_uri() . '/js/navigation.js', array(), PERUSE_VERSION, true );

	/*Slick JS*/
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.js', array( 'jquery' ), '1.8.0', true );
    
    /*mmenu JS*/
    $canvi =  absint($peruse_theme_options['peruse_enable_offcanvas']);
    if( 1  == $canvi )  {
        wp_enqueue_script( 'offcanvas-script', get_template_directory_uri() . '/assets/js/canvi.js', array( 'jquery' ), PERUSE_VERSION, true );
        wp_enqueue_script( 'offcanvas-custom', get_template_directory_uri() . '/assets/js/canvi-custom.js', array( 'jquery', 'offcanvas-script' ), PERUSE_VERSION, true );
    }
    
    /*Custom Script JS*/
	wp_enqueue_script( 'peruse-script', get_template_directory_uri() . '/assets/js/script.js', array( 'jquery' ), PERUSE_VERSION, true );
    
	/*Custom Scripts*/
	wp_enqueue_script( 'peruse-custom', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), PERUSE_VERSION, true );
    
	global $wp_query;
    $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    $max_num_pages = $wp_query->max_num_pages;

    wp_localize_script( 'peruse-custom', 'peruse_ajax', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'paged'     => $paged,
        'max_num_pages'      => $max_num_pages,
        'next_posts'      => next_posts( $max_num_pages, false ),
        'show_more'      => __( 'View More', 'peruse' ),
        'no_more_posts'        => __( 'No More', 'peruse' ),
    ));

	wp_enqueue_script( 'peruse-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), PERUSE_VERSION, true );

	/*Sticky Sidebar*/
	global $peruse_theme_options;
	if( 1 == absint($peruse_theme_options['peruse-enable-sticky-sidebar'])) {
		wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array( 'jquery' ), '1.4.0', true );
        wp_enqueue_script( 'peruse-sticky-sidebar', get_template_directory_uri() . '/assets/js/custom-sticky-sidebar.js', array( 'jquery', 'theia-sticky-sidebar' ), PERUSE_VERSION, true );
	}
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script('comment-reply');
    }
}
add_action( 'wp_enqueue_scripts', 'peruse_scripts' );

/**
 * Editor styles.
 *
 * Uses add_editor_style() so the styles reach the editor iframe.
 */
function peruse_editor_styles() {
	add_editor_style( array( 'assets/fonts/fonts.css', 'css/editor-styles.css' ) );
}
add_action( 'after_setup_theme', 'peruse_editor_styles' );

