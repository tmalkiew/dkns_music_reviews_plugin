<?php
/**
 * Plugin Name: Music Reviews Plugin
 * Plugin URI: http://darknessinside.me	
 * Description: This plugin adds CPT (Custom Post Type) of Music Reviews
 * Version: 1.0.0
 * Author: Tom Malkiewicz
 * Author URI: http://darknessinside.me
 * License: GPL2
 * Text Domain: dkns-music-reviews
 * Domain Path: /languages/
 */

//Loading text domain for translations
 function load_dkns_music_reviews_textdomain() {
	load_plugin_textdomain( 'dkns-music-reviews', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}

add_action( 'plugins_loaded', 'load_dkns_music_reviews_textdomain' );
 
// Register Custom Taxonomy Music Genres
function create_music_genres() {
	
	$labels = array(
	'name'                       => _x( 'Music Genres', 'Taxonomy General Name', 'dkns-music-reviews' ),
	'singular_name'              => _x( 'Music Genre', 'Taxonomy Singular Name', 'dkns-music-reviews' ),
	'menu_name'                  => __( 'Music Genres', 'dkns-music-reviews' ),
	'all_items'                  => __( 'All Music Genres', 'dkns-music-reviews' ),
	'parent_item'                => __( 'Parent Music Genre', 'dkns-music-reviews' ),
	'parent_item_colon'          => __( 'Parent Music Genre:', 'dkns-music-reviews' ),
	'new_item_name'              => __( 'New Music Genre', 'dkns-music-reviews' ),
	'add_new_item'               => __( 'Add New Music Genre', 'dkns-music-reviews' ),
	'edit_item'                  => __( 'Edit Music Genre', 'dkns-music-reviews' ),
	'update_item'                => __( 'Update Music Genre', 'dkns-music-reviews' ),
	'view_item'                  => __( 'View Music Genre', 'dkns-music-reviews' ),
	'separate_items_with_commas' => __( 'Separate items with commas', 'dkns-music-reviews' ),
	'add_or_remove_items'        => __( 'Add or remove Music Genres', 'dkns-music-reviews' ),
	'choose_from_most_used'      => __( 'Choose from the most used', 'dkns-music-reviews' ),
	'popular_items'              => __( 'Popular Music Genres', 'dkns-music-reviews' ),
	'search_items'               => __( 'Search Music Genres', 'dkns-music-reviews' ),
	'not_found'                  => __( 'Music Genre Not Found', 'dkns-music-reviews' ),
	);
	$args = array(
	'labels'                     => $labels,
	'hierarchical'               => true,
	'public'                     => true,
	'show_ui'                    => true,
	'show_admin_column'          => true,
	'show_in_nav_menus'          => true,
	'show_tagcloud'              => true,
	);
	register_taxonomy( 'music_genres', array( 'Music Genres' ), $args );
	
}
add_action( 'init', 'create_music_genres', 0 ); 
 
 
 
// Register Custom Post Type
function dkns_create_cpt_music_reviews() {

	$labels = array(
		'name'                => _x( 'Music Reviews', 'Post Type General Name', 'dkns-music-reviews' ),
		'singular_name'       => _x( 'Music Review', 'Post Type Singular Name', 'dkns-music-reviews' ),
		'menu_name'           => __( 'Music Reviews', 'dkns-music-reviews' ),
		'name_admin_bar'      => __( 'Music Reviews', 'dkns-music-reviews' ),
		'parent_item_colon'   => __( 'Parent Item:', 'dkns-music-reviews' ),
		'all_items'           => __( 'All Music Reviews', 'dkns-music-reviews' ),
		'add_new_item'        => __( 'Add New Music Review', 'dkns-music-reviews' ),
		'add_new'             => __( 'Add New', 'dkns-music-reviews' ),
		'new_item'            => __( 'Music Review', 'dkns-music-reviews' ),
		'edit_item'           => __( 'Edit Music Review', 'dkns-music-reviews' ),
		'update_item'         => __( 'Update Music Review', 'dkns-music-reviews' ),
		'view_item'           => __( 'View Music Review', 'dkns-music-reviews' ),
		'search_items'        => __( 'Search Music Review', 'dkns-music-reviews' ),
		'not_found'           => __( 'Music Review Not Found', 'dkns-music-reviews' ),
		'not_found_in_trash'  => __( 'Music Review Not found in Trash', 'dkns-music-reviews' ),
	);
	$args = array(
		'label'               => __( 'Music Review', 'dkns-music-reviews' ),
	'description'         => __( 'Music Reviews', 'dkns-music-reviews' ),
	'labels'              => $labels,
	'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'page-attributes', ),
	'taxonomies'          => array( 'music_genre', 'band' ),
	'hierarchical'        => false,
	'public'              => true,
	'show_ui'             => true,
	'show_in_menu'        => true,
	'menu_position'       => 5,
	'show_in_admin_bar'   => true,
	'show_in_nav_menus'   => true,
	'can_export'          => true,
	'has_archive'         => true,		
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'capability_type'     => 'page',
	);
	register_post_type( 'music_reviews', $args );
	
}
add_action( 'init', 'dkns_create_cpt_music_reviews', 0 );