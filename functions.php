<?php

/*
 * Saturblade functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Saturblade
 */

require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/saturblade_walker_nav_menu.php';
require_once get_template_directory() . '/inc/Widget_Link.php';

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
            'saturblade_main_menu' => 'Saturblade Main Menu',
            'saturblade_sidebar_menu' => 'Saturblade Sidebar Menu',
            'saturblade_mobi_menu' => 'Saturblade Sidebar Menu'
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

//-------------SIDE BAR -----------------
add_action( 'widgets_init', 'register_my_widgets' );
function register_my_widgets(){
    register_sidebar( array(
        'name'          => sprintf(__('Sidebar %d'), 1),
        'id'            => "sidebar-1",
        'description'   => '',
        'class'         => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => "</li>\n",
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => "</h2>\n",
    ) );
}
//--------------------------
add_filter( 'woocommerce_registration_errors', 'saturblade_validate_registration',1  );

function saturblade_validate_registration( $errors ) {

//    wc_add_notice( 'Ваш нужно принять политику конфиденциальности.', 'notice' );
    if ( strcmp( $_POST['password'], $_POST['password2'] ) !== 0 ) {
        $errors->add( 'name_err', '<strong>Ошибка</strong>: Несовпадают пароли' );
    }
    return $errors;
}
add_action( 'woocommerce_created_customer', 'saturblade_register_save_fields', 25 );

function saturblade_register_save_fields( $user_id )
{
    if ( isset( $_POST[ 'kind_of_name' ] ) ) {
        update_user_meta( $user_id, 'first_name', sanitize_text_field( $_POST['kind_of_name'] ) );
    }
    if ( isset( $_POST[ 'promocode' ] ) ) {
        update_user_meta( $user_id, 'promocode', sanitize_text_field( $_POST['promocode'] ) );
    }
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action('crazyowl_woocomerce_shop_loop','woocommerce_template_loop_product_link_open',5);
add_action('crazyowl_woocomerce_shop_loop','woocommerce_show_product_loop_sale_flash',10);
add_action('crazyowl_woocomerce_shop_loop','woocommerce_template_loop_product_thumbnail',15);
add_action('crazyowl_woocomerce_shop_loop','woocommerce_template_loop_rating',20);
add_action('crazyowl_woocomerce_shop_loop','woocommerce_template_loop_price',25);
add_action('crazyowl_woocomerce_shop_loop','woocommerce_template_loop_product_title',30);
add_action('crazyowl_woocomerce_shop_loop','woocommerce_template_loop_product_link_close',35);
add_action('crazyowl_woocomerce_shop_loop','woocommerce_template_loop_add_to_cart',45);
add_action('crazyowl_woocomerce_shop_loop','woocommerce_widget_shopping_cart_button_view_cart',42);
add_filter('crazyowl_woocomerce_shop_loop','crazyowl_woocomerce_shop_loop_show_variation',37);
function crazyowl_woocomerce_shop_loop_show_variation()
{
    global $product;
// если товар вариантивный
    if ($product->is_type('variable')) {
        //получаем варианты

        $available_variations = $product->get_available_variations();
//        print_r($available_variations);
        echo '<select name="" id="" class="products__description-select">';
        foreach ($available_variations as $key => $value) {
        $attribute=$value['attributes']['attribute_class'];
       echo '<option value="'.$attribute.'">'.$attribute.'</option>';
        }
        echo '</select>';
    }
}
add_filter( 'crazyowl_woocomerce_shop_loop', 'wpspec_show_product_description', 36 );

function wpspec_show_product_description() {
    echo ' <p class="products__description-text">' . get_the_excerpt() . '</p>';
    if ((get_post_meta( get_the_ID(), 'Urgency', true ))) {
        echo '<p class="form-field Urgency_field ">
		<label for="Urgency">This product have requirements</label>
		<span class="woocommerce-help-tip"></span>
		<input type="checkbox" class="checkbox" style="" name="Urgency" id="Urgency" >Срочность выполнения </p>';
		}
}

add_filter('woocommerce_variable_price_html', 'my_woocommerce_variable_price_html', 10, 2);

function my_woocommerce_variable_price_html( $price, $product ) {
    return wc_price($product->get_price());
}


add_action( 'woocommerce_product_options_advanced', 'crazyowl_woocomerce_product_cart_Urgency_checkbox',1 );

function crazyowl_woocomerce_product_cart_Urgency_checkbox() {

    echo '<div class="option_group">';

    woocommerce_wp_checkbox( array(
        'id'      => 'Urgency',
        'value'   => get_post_meta( get_the_ID(), 'Urgency', true ),
        'label'   => 'Срочность ',
        'description' => 'Есть ли возможность выполнить заказ срочно',
        'desc_tip' => true
    ) );
    echo '</div>';

}

add_action( 'woocommerce_process_product_meta', 'crazyowl_woocomerce_product_save_Urgency_checkbox', 20, 2 );

function crazyowl_woocomerce_product_save_Urgency_checkbox( $id, $post ){
    update_post_meta( $id, 'Urgency', isset( $_POST[ 'Urgency' ] ) ? 'yes' : 'no' );
}


