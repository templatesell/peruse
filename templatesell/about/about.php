<?php
/**
 * Added peruse Page.
*/

/**
 * Add a new page under Appearance
 */
function peruse_menu() {
	add_menu_page( __( 'Peruse Options', 'peruse' ), __( 'Peruse Options', 'peruse' ), 'edit_theme_options', 'peruse-theme', 'peruse_page' );
}
add_action( 'admin_menu', 'peruse_menu' );

/**
 * Enqueue styles for the help page.
 */
function peruse_admin_scripts() {
	if(is_admin()){
		wp_enqueue_style( 'peruse-admin-style', get_template_directory_uri() . '/templatesell/about/about.css', array(), '' );
 }
} 
add_action( 'admin_enqueue_scripts', 'peruse_admin_scripts' );

/**
 * Add the theme page
 */
function peruse_page() {
	?>
	<div class="das-wrap">
		<div class="peruse-panel">
			<div class="peruse-logo">
				<img class="ts-logo" src="<?php echo esc_url( get_template_directory_uri() . '/templatesell/about/images/peruse-logo.png' ); ?>" alt="Logo">
			</div>
			<a href="https://www.templatesell.com/item/peruse-plus/" target="_blank" class="btn btn-success pull-right"><?php esc_html_e( 'Upgrade Pro $49', 'peruse' ); ?></a>
			<p>
			<?php esc_html_e( 'A perfect theme for blog and magazine site. With masonry layout and multiple blog page layout, this theme is the awesome and minimal theme.', 'peruse' ); ?></p>
			<a class="btn btn-primary" href="<?php echo esc_url (admin_url( '/customize.php?' ));
				?>"><?php esc_html_e( 'Theme Options - Click Here', 'peruse' ); ?></a>
		</div>

		<div class="peruse-panel">
			<div class="peruse-panel-content">
				<div class="theme-title">
					<h3><?php esc_html_e( 'Looking for theme Documentation?', 'peruse' ); ?></h3>
				</div>
				<a href="http://www.docs.templatesell.net/peruse" target="_blank" class="btn btn-secondary"><?php esc_html_e( 'Documentation - Click Here', 'peruse' ); ?></a>
			</div>
		</div>
		<div class="peruse-panel">
			<div class="peruse-panel-content">
				<div class="theme-title">
					<h3><?php esc_html_e( 'If you like the theme, please leave a review', 'peruse' ); ?></h3>
				</div>
				<a href="https://wordpress.org/support/theme/peruse/reviews/#new-post" target="_blank" class="btn btn-secondary"><?php esc_html_e( 'Rate this theme', 'peruse' ); ?></a>
			</div>
		</div>
	</div>
	<?php
}
