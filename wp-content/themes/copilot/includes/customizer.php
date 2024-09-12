<?php
// Customizer
/*
 * Switch default core markup for search form, comment form, and comments
 * to output valid HTML5.
 */
add_theme_support(
  'html5',
  array(
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    'style',
    'script',
    'navigation-widgets',
  )
);

/*
 * Add support for core custom logo.
 *
 * @link https://codex.wordpress.org/Theme_Logo
 */
$logo_width = 300;
$logo_height = 100;

add_theme_support(
  'custom-logo',
  array(
    'height' => $logo_height,
    'width' => $logo_width,
    'flex-width' => true,
    'flex-height' => true,
    'unlink-homepage-logo' => false,
  )
);
function wpbase_customizer( $wp_customize ) {
  // Footer options
  $wp_customize->add_section( 'wpbase_theme_footer', array(
    'title'    => __( 'Footer', 'wpbase' ),
    'priority' => 100,
  ) );


  // Footer logo
  $wp_customize->add_setting( 'footer_logo' );

  $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'footer_logo', array(
    'label'     => __( 'Footer logo', 'wpbase' ),
    'section'   => 'wpbase_theme_footer',
    'mime_type' => 'image',
  ) ) );

  // Footer mobile logo
  $wp_customize->add_setting( 'footer_mobile_logo' );

  $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'footer_mobile_logo', array(
    'label'     => __( 'Footer mobile logo', 'wpbase' ),
    'section'   => 'wpbase_theme_footer',
    'mime_type' => 'image',
  ) ) );
}

add_action( 'customize_register', 'wpbase_customizer' );