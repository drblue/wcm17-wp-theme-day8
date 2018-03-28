<?php

function mbt_register_menus() {
	// this function registers menus
	register_nav_menus([
		'primary_menu' => 'Huvudmeny',
	]);
}
add_action('init', 'mbt_register_menus');
