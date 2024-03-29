<?php
/**
 * Enqueue scripts and styles.
 */
function peruse_scripts() {

	/*google font  */
	global $peruse_theme_options;
    /*body  */
    wp_enqueue_style('peruse-body', '//fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&display=swap', array(), null);
    /*heading  */
    wp_enqueue_style('peruse-heading', '//fonts.googleapis.com/css?family=Josefin+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap', array(), null);
    /*Author signature google font  */
    wp_enqueue_style('peruse-sign', '//fonts.googleapis.com/css?family=Monsieur+La+Doulaise&display=swap', array(), null);
    
	//*Font-Awesome-master*/
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.5.0' );

    wp_enqueue_style( 'grid-css', get_template_directory_uri() . '/css/bootstrap.css', array(), '4.5.0' );
    
    /*Slick CSS*/
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '4.5.0' );
	
    /*mmenu CSS*/
    wp_enqueue_style( 'offcanvas-style', get_template_directory_uri() . '/assets/css/canvi.css', array(), '4.5.0' );

	$masonry =  esc_attr($peruse_theme_options['peruse-column-blog-page']);
    if( 'masonry-post' == $masonry )  {
    	wp_enqueue_script( 'masonry' );
    	wp_enqueue_script( 'peruse-custom-masonry', get_template_directory_uri() . '/assets/js/custom-masonry.js', array('jquery'), '4.6.0' );
   }

   /*Main CSS*/
    wp_enqueue_style( 'peruse-style', get_stylesheet_uri() );

	/*RTL CSS*/
	wp_style_add_data( 'peruse-style', 'rtl', 'replace' );

 $peruse_pagination_option =  esc_attr($peruse_theme_options['peruse-pagination-options']);
    
    if( 'ajax' == $peruse_pagination_option )  {
    	
    	wp_enqueue_script( 'peruse-custom-pagination', get_template_directory_uri() . '/assets/js/custom-infinte-pagination.js', array('jquery'), '4.6.0' );
    }

	wp_enqueue_script( 'peruse-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20200412', true );

	/*Slick JS*/
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.js', array('jquery'), '4.6.0' );
    
    /*mmenu JS*/
    $canvi =  absint($peruse_theme_options['peruse_enable_offcanvas']);
    if( 1  == $canvi )  {
        wp_enqueue_script( 'offcanvas-script', get_template_directory_uri() . '/assets/js/canvi.js', array('jquery'), '4.6.0' );
        wp_enqueue_script( 'offcanvas-custom', get_template_directory_uri() . '/assets/js/canvi-custom.js', array('jquery'), '4.6.0' );
    }
    
    /*Custom Script JS*/
	wp_enqueue_script( 'peruse-script', get_template_directory_uri() . '/assets/js/script.js', array(), '20200412', true );
    
	/*Custom Scripts*/
	wp_enqueue_script( 'peruse-custom', get_template_directory_uri() . '/assets/js/custom.js', array(), '20200412', true );
    
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

	wp_enqueue_script( 'peruse-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20200412', true );

	/*Sticky Sidebar*/
	global $peruse_theme_options;
	if( 1 == absint($peruse_theme_options['peruse-enable-sticky-sidebar'])) {
		wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array(), '20200412', true );
        wp_enqueue_script( 'peruse-sticky-sidebar', get_template_directory_uri() . '/assets/js/custom-sticky-sidebar.js', array(), '20200412', true );
	}
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script('comment-reply');
    }
}
add_action( 'wp_enqueue_scripts', 'peruse_scripts' );

/**
 * Enqueue fonts for the editor style
 */
function peruse_block_styles() {
    wp_enqueue_style( 'peruse-editor-styles', get_theme_file_uri( 'css/editor-styles.css' ) );

    wp_enqueue_style('peruse-editor-body', '//fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&display=swap', array(), null);
    /*heading  */
    wp_enqueue_style('peruse-editor-heading', '//fonts.googleapis.com/css?family=Josefin+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap', array(), null);

    $peruse_custom_css = '
    .edit-post-visual-editor.editor-styles-wrapper{ font-family: Muli;}

    .editor-post-title__block .editor-post-title__input,
    .editor-styles-wrapper h1,
    .editor-styles-wrapper h2,
    .editor-styles-wrapper h3,
    .editor-styles-wrapper h4,
    .editor-styles-wrapper h5,
    .editor-styles-wrapper h6{
        font-family: Josefin Sans;
    }';

    wp_add_inline_style( 'peruse-editor-styles', $peruse_custom_css );
}

add_action( 'enqueue_block_editor_assets', 'peruse_block_styles' );

