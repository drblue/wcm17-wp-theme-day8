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
	wp_enqueue_style('bootstrap4-styles', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
	wp_enqueue_style('mbt-styles', get_stylesheet_directory_uri() . '/style.css');

	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', [], '3.2.1', true);
	wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', ['jquery'], '1.12.9', true);
	wp_enqueue_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', ['jquery', 'popper'], '4.0.0', true);
}
add_action('wp_enqueue_scripts', 'mbt_styles');

function mbt_setup() {
	add_theme_support('post-thumbnails');

	// add some image sizes specific to our theme
	add_image_size('post-featured-image', 2560, 500, true);
}
add_action('after_setup_theme', 'mbt_setup');

function mbt_widgets() {
	// register blog sidebar
	register_sidebar([
		'name'			=> "Sidofält för bloggen",
		'id'			=> 'sidebar_blog',
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
	]);

	// register footer sidebar
	register_sidebar([
		'name'			=> "Sidfots-widgetar",
		'id'			=> 'sidebar_footer',
		'before_widget'	=> '<div id="%1$s" class="widget col %2$s">',
		'after_widget'	=> '</div>',
	]);
}
add_action('widgets_init', 'mbt_widgets');

/* change excerpt length to 20 words */
function mbt_excerpt_length($length) {
	return 20;
}
add_filter('excerpt_length', 'mbt_excerpt_length', 20);

/* change excerpt length to 80 words */
function mbt_excerpt_length_long($length) {
	return 80;
}
add_filter('excerpt_length', 'mbt_excerpt_length_long');

/* add read more link to post excerpts */
function mbt_excerpt_read_more($post) {
	return '... <br /><a href="' . get_permalink($post->ID) . '" class="btn btn-primary">Read more</a>';
}
add_filter('excerpt_more', 'mbt_excerpt_read_more');

/* add bg-dark to body classes if logged in */
function mbt_body_class($classes) {
	if (is_user_logged_in()) {
		$classes[] = 'bg-dark';
		$classes[] = 'text-white';
	}
	return $classes;
}
//add_filter('body_class', 'mbt_body_class');

/* filter content */
function mbt_content($content) {
	$words = ["Lorem", "ipsum", "dolor", "sit", "amet"];

	$replace = [];
	foreach ($words as $word) {
		$wordlength = strlen($word); // calculate length of word
		$replaceword = str_repeat("*", $wordlength); // repeat * for length of word
		$replace[$word] = $replaceword;
	}
	/*
	// shorter version on one line, a.k.a. one-liner
	foreach ($words as $word) {
		$replace[$word] = str_repeat("*", strlen($word)); // repeat * for length of word;
	}
	*/

	// above will generate the following array
	// $replace = [
	// 	'Lorem' => '*****',
	// 	'ipsum' => '*****',
	// 	'dolor' => '*****',
	// 	'sit' => '***',
	// 	'amet' => '****',
	// ];
	
	return str_replace(array_keys($replace), array_values($replace), $content);
}
// add_filter('the_content', 'mbt_content');

function mbt_site_logo() {
	// get logo media id
	$custom_logo_id = get_theme_mod( 'custom_logo' );

	// get URL to logo
	$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

	// do we have a custom logo?
	if (has_custom_logo()) {
		// if so, echo image-tag to logo
		echo '<img src="'. esc_url($logo[0]) .'">';
	} else {
		// if not, echo site name in text
		echo get_bloginfo('name');
	}
}
