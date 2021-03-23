<?php

/*
 * Saturblade functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Saturblade
 */

require_once __DIR__ . '/inc/customizer.php';
require_once __DIR__ . '/inc/function.php';


function saturblade_scripts()
{
    //	Bootstrap
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/inc/bootstrap.min.js',
        array('jquery'), '4.5.2', true);
    wp_enqueue_script('bootstrap-drawer-js', get_template_directory_uri() . '/inc/bootstrap-drawer.min.js',
        array(), '', true);
    wp_enqueue_script('jquery-js', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js',
        array('jquery'), true);
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/inc/bootstrap.min.css',
        array(), '4.5.2', 'all');
    wp_enqueue_style('bootstrap-drawer-css', get_template_directory_uri() . '/inc/bootstrap-drawer.min.css',
        array(), '', 'all');
    // Custom styles
    wp_enqueue_style('saturblade-style', get_stylesheet_uri(), array('google-fonts'),
        filemtime(get_template_directory() . '/style.css'), 'all');
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap');
}

add_action('wp_enqueue_scripts', 'saturblade_scripts');
function saturblade_config()
{
    register_nav_menus(
        array(
            'saturblade_main_menu' => 'Saturblade Main Menu',
            'saturblade_sidebar_menu' => 'Saturblade Sidebar Menu',
            'saturblade_mobi_menu' => 'Saturblade Mobi Menu',
            'saturblade_footer_menu' => 'Saturblade Footer Menu',

        )
    );
    add_theme_support('woocommerce');

    add_image_size('saturblade-slider', 1640, 540, array('center', 'center'));

    if (!isset($content_width)) {
        $content_width = 600;
    }

    add_theme_support( 'customize-selective-refresh-widgets' );
}

add_action('after_setup_theme', 'saturblade_config', 0);

// WooCommerce
function create_custom_account_dashboard()
{
    get_template_part('woocommerce-account-dashboard');
}

add_action('woocommerce_account_dashboard', 'create_custom_account_dashboard');

function my_account_menu_order()
{
    $menuOrder = array(
        'dashboard' => __('My Profile', 'woocommerce'),
        'orders' => __('Orders', 'woocommerce'),
        'customer-logout' => __('Logout', 'woocommerce')
    );
    return $menuOrder;
}
add_filter('woocommerce_account_menu_items', 'my_account_menu_order');

add_action('after_setup_theme', 'woocommerce_support');
function woocommerce_support()
{
    add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar()
{
    show_admin_bar(true);
}

// TODO сайдбары
add_action( 'widgets_init', 'true_register_wp_sidebars' );
function true_register_wp_sidebars() {
    /* В подвале - первый сайдбар */
    register_sidebar(
        array(
            'id' => 'header', // уникальный id
            'name' => 'header', // название сайдбара
            'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
            'before_widget' => '<div id="%1$s" class="side widget %2$s">', // по умолчанию виджеты выводятся <li>-списком
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">', // по умолчанию заголовки виджетов в <h2>
            'after_title' => '</h3>'
        )
    );
    /* В подвале - первый сайдбар */
    register_sidebar(
        array(
            'id' => 'Top-footer', // уникальный id
            'name' => 'TOP footer', // название сайдбара
            'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
            'before_widget' => '<div id="%1$s" class="side widget %2$s">', // по умолчанию виджеты выводятся <li>-списком
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">', // по умолчанию заголовки виджетов в <h2>
            'after_title' => '</h3>'
        )
    );
    /* В подвале - первый сайдбар */
    register_sidebar(
        array(
            'id' => 'footer-1', // уникальный id
            'name' => 'Футер 1', // название сайдбара
            'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
            'before_widget' => '<div id="%1$s" class="side widget %2$s">', // по умолчанию виджеты выводятся <li>-списком
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">', // по умолчанию заголовки виджетов в <h2>
            'after_title' => '</h3>'
        )
    );

    /* В подвале - второй сайдбар */
    register_sidebar(
        array(
            'id' => 'footer-2',
            'name' => 'Футер 2',
            'description' => 'Перетащите сюда виджеты, чтобы добавить их в футер.',
            'before_widget' => '<div id="%1$s" class="foot widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );
    /* В подвале - второй сайдбар */
    register_sidebar(
        array(
            'id' => 'footer-3',
            'name' => 'Футер 3',
            'description' => 'Перетащите сюда виджеты, чтобы добавить их в футер.',
            'before_widget' => '<div id="%1$s" class="foot widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );
}

// TODO fix bug -- вывод в кастомайзере
add_filter('wp_nav_menu_args', function ($args) {
    if (isset($args['walker']) && is_string($args['walker']) && class_exists($args['walker'])) {
        $args['walker'] = new $args['walker'];
    }
    return $args;
}, 1001);