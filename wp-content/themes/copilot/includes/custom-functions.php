<?php

function mytheme_add_gutenberg_features() {
  add_theme_support( 'editor-styles' );
  add_theme_support( 'wp-block-styles' );
  add_theme_support( 'align-wide' );
  add_theme_support( 'post-thumbnails' );

  add_action( 'after_setup_theme', 'my_theme_setup' );
}

add_action( 'after_setup_theme', 'mytheme_add_gutenberg_features' );

// Theme options function

if ( function_exists( 'acf_add_options_page' ) ) {

  acf_add_options_page( array(
    'page_title' => 'Theme Options',
    'menu_title' => 'Theme Options',
    'menu_slug' => 'theme-options',
    'capability' => 'edit_posts',
    'redirect' => false
  ) );
}