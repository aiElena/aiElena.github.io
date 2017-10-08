<?php
function myScripts() {
	wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('bootstrap-skin', get_template_directory_uri() . '/css/bootstrap_skin.css');
	wp_enqueue_style('header', get_template_directory_uri() . '/css/header.css');
	wp_enqueue_script('jquery');	
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js');
}

function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

add_action('wp_enqueue_scripts', 'myScripts');