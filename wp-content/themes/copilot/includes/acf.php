<?php
function acf_custom_blocks_auto_register() {
  $dir            = get_template_directory() . '/template-parts/acf/';
  $template_files = scandir( $dir );

  foreach ( $template_files as $file ) {
    // Skip non-PHP files and the current/parent directory indicators
    if ( pathinfo( $file, PATHINFO_EXTENSION ) != 'php' ) {
      continue;
    }

    $slug       = pathinfo( $file, PATHINFO_FILENAME );
    $block_name = str_replace( '-', ' ', ucfirst( $slug ) );

    acf_register_block_type( array(
      'name'            => $slug,
      'title'           => __( $block_name ),
      'render_template' => 'template-parts/acf/' . $file,
      'category'        => 'custom',
      'icon'            => 'admin-customizer', // You might want to dynamically set this based on the block or use a default
      'keywords'        => explode( '-', $slug ), // Simple keyword generation from slug
      'render_callback' => 'acf_custom_block_render_callback',
      // Enqueue assets are handled in the render callback to check for file existence
    ) );
  }
}

add_action( 'acf/init', 'acf_custom_blocks_auto_register' );

function acf_custom_block_render_callback( $block ) {
  $slug     = $block['name'];
  $dir_uri  = get_template_directory_uri();
  $dir_path = get_template_directory();
  // Enqueue CSS if it exists
  if ( file_exists( $dir_path . '/css/' . $slug . '.css' ) ) {
    wp_enqueue_style( $slug . '-css', $dir_uri . '/css/' . $slug . '.css', array(), '1.0' );
  }

  // Enqueue JS if it exists
  if ( file_exists( $dir_path . '/js/' . $slug . '.js' ) ) {
    wp_enqueue_script( $slug . '-js', $dir_uri . '/js/' . $slug . '.js', array( 'jquery' ), '1.0', true );
  }

  // Include the block template
  include get_theme_file_path( '/template-parts/' . $slug . '.php' );

}

// Optionally, you can remove the register_custom_block_assets function if it's not used elsewhere,
// as CSS/JS registration and enqueuing are now handled within the render callback.