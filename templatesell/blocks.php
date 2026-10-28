<?php
/**
 * Block styles and block patterns.
 *
 * @package Peruse
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register the theme's block styles.
 *
 * @return void
 */
function peruse_register_block_styles() {

	register_block_style(
		'core/paragraph',
		array(
			'name'  => 'peruse-lead',
			'label' => __( 'Lead paragraph', 'peruse' ),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'peruse-boxed',
			'label' => __( 'Boxed', 'peruse' ),
		)
	);

	register_block_style(
		'core/list',
		array(
			'name'  => 'peruse-plain-list',
			'label' => __( 'Plain', 'peruse' ),
		)
	);
}
add_action( 'init', 'peruse_register_block_styles' );

/**
 * Register the theme's block patterns.
 *
 * @return void
 */
function peruse_register_block_patterns() {

	if ( ! function_exists( 'register_block_pattern_category' ) ) {
		return;
	}

	register_block_pattern_category(
		'peruse',
		array( 'label' => __( 'Peruse', 'peruse' ) )
	);

	register_block_pattern(
		'peruse/post-intro',
		array(
			'title'      => __( 'Post introduction', 'peruse' ),
			'categories' => array( 'peruse', 'text' ),
			'content'    => '<!-- wp:heading {"level":2} --><h2>'
				. esc_html__( 'A heading to open with', 'peruse' )
				. '</h2><!-- /wp:heading -->'
				. '<!-- wp:paragraph {"className":"is-style-peruse-lead"} --><p class="is-style-peruse-lead">'
				. esc_html__( 'Open the post with a paragraph that says what it is about. This one is set a little larger than the body text so it reads as a standfirst.', 'peruse' )
				. '</p><!-- /wp:paragraph -->',
		)
	);

	register_block_pattern(
		'peruse/quote-and-source',
		array(
			'title'      => __( 'Quote and attribution', 'peruse' ),
			'categories' => array( 'peruse', 'text' ),
			'content'    => '<!-- wp:quote --><blockquote class="wp-block-quote"><p>'
				. esc_html__( 'A sentence worth setting apart from the paragraphs around it.', 'peruse' )
				. '</p><cite>'
				. esc_html__( 'Someone worth quoting', 'peruse' )
				. '</cite></blockquote><!-- /wp:quote -->',
		)
	);

	register_block_pattern(
		'peruse/boxed-note',
		array(
			'title'      => __( 'Boxed note, two columns', 'peruse' ),
			'categories' => array( 'peruse', 'text' ),
			'content'    => '<!-- wp:group {"className":"is-style-peruse-boxed"} --><div class="wp-block-group is-style-peruse-boxed">'
				. '<!-- wp:columns --><div class="wp-block-columns">'
				. '<!-- wp:column --><div class="wp-block-column">'
				. '<!-- wp:heading {"level":3} --><h3>'
				. esc_html__( 'On the left', 'peruse' )
				. '</h3><!-- /wp:heading -->'
				. '<!-- wp:paragraph --><p>'
				. esc_html__( 'A short note, an aside, or a summary of what came before.', 'peruse' )
				. '</p><!-- /wp:paragraph -->'
				. '</div><!-- /wp:column -->'
				. '<!-- wp:column --><div class="wp-block-column">'
				. '<!-- wp:heading {"level":3} --><h3>'
				. esc_html__( 'On the right', 'peruse' )
				. '</h3><!-- /wp:heading -->'
				. '<!-- wp:paragraph --><p>'
				. esc_html__( 'And the other half of the pair, in the same boxed panel.', 'peruse' )
				. '</p><!-- /wp:paragraph -->'
				. '</div><!-- /wp:column -->'
				. '</div><!-- /wp:columns -->'
				. '</div><!-- /wp:group -->',
		)
	);
}
add_action( 'init', 'peruse_register_block_patterns' );
