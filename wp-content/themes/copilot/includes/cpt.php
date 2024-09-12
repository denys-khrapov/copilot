<?php
// Custom post types

add_action( 'init', 'init_custom_post_types' );

// Get custom post type labels
function get_custom_post_type_labels( $singular_name = 'Item', $plural_name = 'Items' ) {
	$domain = 'wpbase';

	return array(
		'name' => sprintf( _x( '%s', 'Post type general name', $domain ), $singular_name ),
		'singular_name' => sprintf( _x( '%s', 'Post type singular Name', $domain ), $singular_name ),
		'menu_name' => sprintf( __( '%s', 'Admin Menu text', $domain ), $plural_name ),
		'name_admin_bar' => sprintf( __( '%s', 'Add New on Toolbar', $domain ), $plural_name ),
		'add_new' => sprintf( __( 'Додати запис %s', $domain ), $singular_name ),
		'add_new_item' => sprintf( __( 'Додати запис %s', $domain ), $singular_name ),
		'new_item' => sprintf( __( 'Новий запис %s', $domain ), $singular_name ),
		'edit_item' => sprintf( __( 'Редагувати %s', $domain ), $singular_name ),
		'view_item' => sprintf( __( 'Переглянути  %s', $domain ), $singular_name ),
		'all_items' => sprintf( __( 'Всі %s', $domain ), $plural_name ),
		'search_items' => sprintf( __( 'Шукати %s', $domain ), $plural_name ),
		'parent_item_colon' => sprintf( __( 'Батьківський запис %s', $domain ), $plural_name ),
		'not_found' => sprintf( __( 'Не знайдено %s.', $domain ), $plural_name ),
		'not_found_in_trash' => sprintf( __( '%s не знайдено в Кошику.', $domain ), $plural_name ),
		'update_item' => sprintf( __( 'Оновити %s', $domain ), $singular_name ),
	);
}

function init_custom_post_types() {
	$domain = 'wpbase';

	// Article
//	register_post_type(
//		'article',
//		array(
//			'labels' => get_custom_post_type_labels( __( 'Article', $domain ), __( 'Articles', $domain ) ),
//			'description' => '',
//			'menu_icon' => 'dashicons-sticky',
//			'public' => true,
//			'publicly_queryable' => true,
//			'show_ui' => true,
//			'show_in_menu' => true,
//			'show_in_nav_menus' => true,
//			'show_in_admin_bar' => true,
//			'query_var' => true,
//			'rewrite' => array( 'slug' => 'articles' ),
//			'capability_type' => 'post',
//			'has_archive' => 'articles',
//			'hierarchical' => false,
//			'menu_position' => 20,
//			'supports' => array(
//				'title',
//				'editor',
//				'author',
//				'thumbnail',
//				'excerpt',
//				'custom-fields',
//				'comments',
//				'revisions',
//				'page-attributes',
//			),
//			'exclude_from_search' => false,
//			'show_in_rest' => true,
//			'taxonomies' => array( 'post_tag' ),
//		)
//	);
}
