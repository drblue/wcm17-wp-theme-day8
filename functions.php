<?php

require("bs4Navwalker.php");

function mbt_register_menus() {
	// this function registers menus
	register_nav_menus([
		'primary_menu' => 'Huvudmeny',
	]);
}
add_action('init', 'mbt_register_menus');

function mbt_styles() {
	wp_enqueue_style('mbt-styles', get_stylesheet_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'mbt_styles');

function mbt_setup() {
	add_theme_support('post-thumbnails');

	// add some image sizes specific to our theme
	add_image_size('post-featured-image', 2560, 500, true);
}
add_action('after_setup_theme', 'mbt_setup');
