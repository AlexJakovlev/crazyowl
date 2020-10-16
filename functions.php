<?php

/*
 * Saturblade functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Saturblade
 */

require_once get_template_directory() . '/inc/customizer.php';

function saturblade_scripts() {
	//	Bootstrap
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/inc/bootstrap.min.js',
        array( 'jquery' ), '4.5.2', true );
	wp_enqueue_script( 'bootstrap-drawer-js', get_template_directory_uri() . '/inc/bootstrap-drawer.min.js',
		array(), '', true );
	wp_enqueue_script( 'jquery-js', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js',
		array( 'jquery' ), true );
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/inc/bootstrap.min.css',
        array(), '4.5.2', 'all' );
	wp_enqueue_style( 'bootstrap-drawer-css', get_template_directory_uri() . '/inc/bootstrap-drawer.min.css',
		array(), '', 'all' );
	// Custom styles
    wp_enqueue_style( 'saturblade-style', get_stylesheet_uri(), array(),
        filemtime( get_template_directory() . '/style.css' ), 'all' );
	// Google Fonts
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap' );
}
add_action( 'wp_enqueue_scripts', 'saturblade_scripts' );

function saturblade_config() {
    register_nav_menus(
        array(
            'saturblade_main_menu' => 'Saturblade Main Menu'
        )
    );
    add_theme_support( 'woocommerce' );

	add_image_size( 'saturblade-slider', 1640, 540, array( 'center', 'center' ));

	if ( ! isset( $content_width ) ) {
		$content_width = 600;
	}
}
add_action( 'after_setup_theme', 'saturblade_config', 0 );

// WooCommerce
function create_custom_account_dashboard() {
	get_template_part('woocommerce-account-dashboard');
}
add_action('woocommerce_account_dashboard', 'create_custom_account_dashboard');

function my_account_menu_order() {
	$menuOrder = array(
		'dashboard'          => __( 'My Profile', 'woocommerce' ),
		'orders'             => __( 'Orders', 'woocommerce' ),
		'customer-logout'    => __( 'Logout', 'woocommerce' )
	);
	return $menuOrder;
}
add_filter ( 'woocommerce_account_menu_items', 'my_account_menu_order' );

function remove_admin_bar() {
	show_admin_bar(true);
}
add_action('after_setup_theme', 'remove_admin_bar');
