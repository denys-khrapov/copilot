<?php
function wpbase_styles_scripts() {

	// styles

	// Font Awesome
	wp_register_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css' );
//	wp_register_style( 'swiper', get_template_directory_uri() . '/css/swiper.css' );

	wp_enqueue_style( 'styles', get_stylesheet_uri(), array( 'font-awesome' ), '' );

	//scripts

	// Fancybox
//	wp_register_style( 'fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css', array(), '' );
//	wp_register_script( 'fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js', array(), '', true );

	// Slick
//	wp_register_style( 'slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', array(), '' );
//	wp_register_script( 'slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js', array( 'jquery' ), '', true );

  // Swiper
	wp_register_style( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
  wp_register_script( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '', true );

	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/main.js', array( 'jquery', 'swiper' ), '', true );
}

add_action( 'wp_enqueue_scripts', 'wpbase_styles_scripts' );