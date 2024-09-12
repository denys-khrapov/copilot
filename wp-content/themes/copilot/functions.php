<?php
/**
 * Functions and definitions
 */

/**
 * Registers widget area.
 */

function custom_widgets_init() {
	register_sidebar(
		array(
			'name' => esc_html__( 'Custom Sidebar', 'wpbase' ),
			'id' => 'custom-sidebar',
			'description' => esc_html__( 'Add widgets here to appear in your footer.', 'wpbase' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'custom_widgets_init' );

// Threaded comment reply styles.
function active_comments() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'active_comments' );

/**
 * Calculates classes for the main <html> element.
 */


include( get_template_directory() . '/includes/classes.php' );
include( get_template_directory() . '/includes/cpt.php' );
include( get_template_directory() . '/includes/customizer.php' );
include( get_template_directory() . '/includes/menus.php' );
include( get_template_directory() . '/includes/thumbnails.php' );
include( get_template_directory() . '/includes/acf.php' );
include( get_template_directory() . '/includes/scripts.php' );
include( get_template_directory() . '/includes/custom-functions.php' );
