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
    //TODO --- убрать TIME();
    wp_enqueue_script('my-script', get_template_directory_uri() . '/inc/my_script.js',
        array('jquery'), time(), 'in_footer');
    // Custom styles
    wp_enqueue_style('saturblade-style', get_stylesheet_uri(), array(),
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
            'saturblade_mobi_menu' => 'Saturblade Sidebar Menu'
        )
    );
    add_theme_support('woocommerce');

    add_image_size('saturblade-slider', 1640, 540, array('center', 'center'));

    if (!isset($content_width)) {
        $content_width = 600;
    }
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

function remove_admin_bar()
{
    show_admin_bar(true);
}

add_action('after_setup_theme', 'remove_admin_bar');

//-------------SIDE BAR -----------------
add_action('widgets_init', 'register_my_widgets');
function register_my_widgets()
{
    register_sidebar(array(
        'name' => sprintf(__('Sidebar %d'), 1),
        'id' => "sidebar-1",
        'description' => '',
        'class' => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => "</li>\n",
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => "</h2>\n",
    ));
}

//--------------------------
add_filter('woocommerce_registration_errors', 'saturblade_validate_registration', 1);

function saturblade_validate_registration($errors)
{

//    wc_add_notice( 'Ваш нужно принять политику конфиденциальности.', 'notice' );
    if (strcmp($_POST['password'], $_POST['password2']) !== 0) {
        $errors->add('name_err', '<strong>Ошибка</strong>: Несовпадают пароли');
    }
    return $errors;
}

add_action('woocommerce_created_customer', 'saturblade_register_save_fields', 25);

function saturblade_register_save_fields($user_id)
{
    if (isset($_POST['kind_of_name'])) {
        update_user_meta($user_id, 'first_name', sanitize_text_field($_POST['kind_of_name']));
    }
    if (isset($_POST['promocode'])) {
        update_user_meta($user_id, 'promocode', sanitize_text_field($_POST['promocode']));
    }
}

add_action('after_setup_theme', 'woocommerce_support');
function woocommerce_support()
{
    add_theme_support('woocommerce');
}

add_action('crazyowl_woocomerce_shop_loop', 'woocommerce_template_loop_product_link_open', 5);
add_action('crazyowl_woocomerce_shop_loop', 'woocommerce_show_product_loop_sale_flash', 10);
add_action('crazyowl_woocomerce_shop_loop', 'woocommerce_template_loop_product_thumbnail', 15);
add_action('crazyowl_woocomerce_shop_loop', 'woocommerce_template_loop_rating', 20);
add_action('crazyowl_woocomerce_shop_loop', 'woocommerce_template_loop_price', 25);
add_action('crazyowl_woocomerce_shop_loop', 'woocommerce_template_loop_product_title', 30);
add_action('crazyowl_woocomerce_shop_loop', 'woocommerce_template_loop_product_link_close', 35);
add_action('crazyowl_woocomerce_shop_loop', 'woocommerce_template_loop_add_to_cart', 45);
add_action('crazyowl_woocomerce_shop_loop', 'woocommerce_widget_shopping_cart_button_view_cart', 42);
add_filter('crazyowl_woocomerce_shop_loop', 'crazyowl_woocomerce_shop_loop_show_variation', 37);

add_action('woocommerce_variation_options_pricing', 'crazyowl_field_to_variation', 25, 3);



add_action('crazyowl_woocomerce_shop_v_loop', 'crazyowl_show_product_images', 15);
add_action('crazyowl_woocomerce_shop_v_loop', 'crazyowl_show_product_sale_flash', 20);
add_action('crazyowl_woocomerce_shop_v_loop', 'crazyowl_products__item_part', 25);
//add_action('crazyowl_woocomerce_shop_loop', 'woocommerce_template_single_rating', 35);
add_filter('crazyowl_woocomerce_shop_v_loop', 'wpspec_show_product_description', 36);
//add_action('crazyowl_woocomerce_shop_loop', 'crazyowl_single_price', 20);
//add_action('crazyowl_woocomerce_shop_loop', 'woocommerce_template_single_excerpt', 55);
add_action('crazyowl_woocomerce_shop_v_loop', 'woocommerce_widget_shopping_cart_button_view_cart', 70);
add_action('crazyowl_woocomerce_shop_v_loop', 'crazyowl_archive_single_add_to_cart', 65);
//add_action('crazyowl_woocomerce_shop_v_loop', 'woocommerce_template_loop_add_to_cart', 62);
add_action('crazyowl_woocomerce_shop_v_loop', 'crazyowl_loop_add_to_cart', 75);
//add_action('crazyowl_woocomerce_shop_loop', 'woocommerce_template_single_sharing', 85);



function crazyowl_field_to_variation($i, $variation_data, $variation)
{

    woocommerce_wp_text_input(
        array(
            'id' => 'speed_field[' . $i . ']',
            'class' => 'short',
            'wrapper_class' => 'form-row',
            'label' => 'Какое-то поле',
            'value' => get_post_meta($variation->ID, 'speed_field', true)
        )
    );

}

add_action('woocommerce_save_product_variation', 'crazyowl_save_variation', 25, 2);

function crazyowl_save_variation($variation_id, $i)
{

    if (isset($_POST['speed_field'][$i])) {
        update_post_meta(
            $variation_id,
            'speed_field',
            sanitize_text_field($_POST['speed_field'][$i])
        );
    }

}


function crazyowl_woocomerce_shop_loop_show_variation()
{
    global $product;

//    print_r(wp_get_attachment_image_srcset( $variation_id, $image_size ));
// если товар вариантивный
    if ($product->is_type('variable')) {
        //получаем варианты
        $available_variations = $product->get_available_variations();
        echo '<select name="" id="product-variable"  data-id="'.$product->get_id().'" class="products__description-select">';
        foreach ($available_variations as $key => $value) {
            $attribute = $value['attributes']['attribute_class'];
            $variation_id = $value['variation_id'];
            $post_meta = get_post_meta($variation_id);

            //         _price
            //        _thumbnail_id
            //        speed_field
            //       _regular_price
            $price = $post_meta['_price'][0];
            $thumbnail_url = get_the_post_thumbnail_url($variation_id);
            $regular_price = $post_meta['_regular_price'][0];
            $speed_price = $post_meta['speed_field'][0];
            $speed_price = $speed_price > 0 ? 'data-speed_price="' . $speed_price . '"' : '';

            echo '<option value="' . $attribute .
                '" data-id="' . $variation_id . '" ' . $speed_price .
                ' data-thumbnail="' .$thumbnail_url .
                '" data-price="' . $price .
                '" data-regular="' . $regular_price . '" >'
                . $attribute . ' </option>';
        }
        echo '</select>';
    }
}



function wpspec_show_product_description()
{
    global $product;
    echo ' <p class="products__description-text">' . get_the_excerpt() . '</p>';

    echo '<div style="display: none"><p class="form-field Urgency_field ">
		<label for="Urgency">This product have requirements</label>
		<span class="woocommerce-help-tip"></span>
		<input id="speed-'.$product->get_id().'" type="checkbox" class="checkbox" style="" name="Urgency" id="Urgency" >Срочность выполнения </p></div>';

}

add_filter('woocommerce_variable_price_html', 'my_woocommerce_variable_price_html', 10, 2);

function my_woocommerce_variable_price_html($price, $product)
{
    return 'От &nbsp' . wc_price($product->get_price());
}
//
//
//add_action( 'woocommerce_variation_options_pricing', 'crazyowl_woocomerce_product_cart_Urgency_checkbox',1,3 );
//
//function crazyowl_woocomerce_product_cart_Urgency_checkbox($i, $variation_data, $variation) {
//
//    echo '<div class="option_group">';
//
//    woocommerce_wp_checkbox( array(
//        'id'      => 'Urgency',
//        'value'   => get_post_meta( get_the_ID(), 'Urgency', true ),
//        'label'   => ' Срочность',
//        'description' => 'Есть ли возможность выполнить заказ срочно',
//        'desc_tip' => true
//    ) );
//    woocommerce_wp_text_input(
//        array(
//            'id' => 'speed_field[' . $i . ']',
//            'class' => 'short',
//            'wrapper_class' => 'form-row',
//            'label' => '+ к цене за строчность',
//            'value' => get_post_meta( $variation->ID, 'price_add_speed_field', true )
//        )
//    );
//    echo '</div>';
//
//}
//
//add_action( 'woocommerce_save_product_variation', 'crazyowl_woocomerce_product_save_Urgency_checkbox', 20, 2 );
//
//function crazyowl_woocomerce_product_save_Urgency_checkbox( $id, $post ){
//    update_post_meta( $id, 'Urgency', isset( $_POST[ 'Urgency' ] ) ? 'yes' : 'no' );
//    update_post_meta( $id, 'price_add', isset( $_POST[ 'price_add' ] ) ? $_POST[ 'price_add' ] : 0 );
//}


/////////////////////// TODO   LOOP  products SHOP

//add_filter('woocommerce_sale_flash','item_label');
function crazyowl_show_product_sale_flash(){
global $product;
   echo '<span class="products__item-labels">
                           <span class="products__item-label products__item-label_new">New</span>';
   if ($product->is_on_sale()) {
                         echo   '<span class="products__item-label products__item-label_hot"><i class="far fa-clock"></i></span>';
                        }
                 echo '</span>';
}

function crazyowl_show_product_images()
{
    wc_get_template('single-product/archive-product-image.php');
}

function crazyowl_single_price()
{
    wc_get_template('single-product/archive-price.php');
}
function crazy_single_title(){
    wc_get_template('single-product/archive-title.php');

}

add_action('products__item-part','crazyowl_single_price',10);
add_action('products__item-part','crazy_single_title',15);
function crazyowl_products__item_part(){
    global $product;
    echo '<div class="products__item-part">';
    do_action('products__item-part');
    echo $product->get_type();
    echo '</div>';
}

function crazyowl_archive_single_add_to_cart(){
    global $product;

    // Enqueue variation scripts.
    wp_enqueue_script( 'wc-add-to-cart-variation' );

    // Get Available variations?
    $get_variations = count( $product->get_children() ) <= apply_filters( 'woocommerce_ajax_variation_threshold', 30, $product );

    // Load the template.
    wc_get_template(
        'single-product/add-to-cart/archive-variable.php',
        array(
            'available_variations' => $get_variations ? $product->get_available_variations() : false,
            'attributes'           => $product->get_variation_attributes(),
            'selected_attributes'  => $product->get_default_attributes(),
        )
    );
}

function crazyowl_loop_add_to_cart( $args = array() ){
    global $product;

    if ( $product ) {
        $defaults = array(
            'quantity' => 1,
            'class' => implode(
                ' ',
                array_filter(
                    array(
                        'button',
                        'product_type_simple',
                        $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                        $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
                    )
                )
            ),
            'attributes' => array(
                'data-product_id' => $product->get_id(),
                'data-product_sku' => $product->get_sku(),
                'aria-label' => $product->add_to_cart_description(),
                'rel' => 'nofollow',
            ),
        );

        $args = apply_filters('woocommerce_loop_add_to_cart_args', wp_parse_args($args, $defaults), $product);

        if (isset($args['attributes']['aria-label'])) {
            $args['attributes']['aria-label'] = wp_strip_all_tags($args['attributes']['aria-label']);
        }

        wc_get_template('loop/crazyowl-add-to-cart.php', $args);
    }
}
function crazyowl_add_to_cart_url() {
    global $product;
    $url = $product->is_purchasable() && $product->is_in_stock() ? remove_query_arg(
        'added-to-cart',
        add_query_arg(
            array(
                'add-to-cart' => $product->get_id(),
            ),
            ( function_exists( 'is_feed' ) && is_feed() ) || ( function_exists( 'is_404' ) && is_404() ) ? $product->get_permalink() : ''
        )
    ) : $product->get_permalink();
    return apply_filters( 'woocommerce_product_add_to_cart_url', $url, $product );
}
function crazyowl_dropdown_variation_attribute_options( $args = array() ) {
    $args = wp_parse_args(
        apply_filters( 'woocommerce_dropdown_variation_attribute_options_args', $args ),
        array(
            'options_meta'     => false,
            'options'          => false,
            'attribute'        => false,
            'product'          => false,
            'selected'         => false,
            'name'             => '',
            'id'               => '',
            'class'            => '',
            'show_option_none' => __( 'Choose an option', 'woocommerce' ),
        )
    );

    // Get selected value.
    if ( false === $args['selected'] && $args['attribute'] && $args['product'] instanceof WC_Product ) {
        $selected_key = 'attribute_' . sanitize_title( $args['attribute'] );
        // phpcs:disable WordPress.Security.NonceVerification.Recommended
        $args['selected'] = isset( $_REQUEST[ $selected_key ] ) ? wc_clean( wp_unslash( $_REQUEST[ $selected_key ] ) ) : $args['product']->get_variation_default_attribute( $args['attribute'] );
        // phpcs:enable WordPress.Security.NonceVerification.Recommended
    }
    $option_meta           = $args['options_meta'];
    $options               = $args['options'];
    $product               = $args['product'];
    $attribute             = $args['attribute'];
    $name                  = $args['name'] ? $args['name'] : 'attribute_' . sanitize_title( $attribute );
    $id                    = $args['id'] ? $args['id'] : sanitize_title( $attribute );
    $class                 = $args['class'];
    $show_option_none      = (bool) $args['show_option_none'];
    $show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __( 'Choose an option', 'woocommerce' ); // We'll do our best to hide the placeholder, but we'll need to show something when resetting options.
    $show_check_speed      = 0;
    $posts = $product->get_visible_children();
    $option_meta =         array();
    foreach ($posts as $post ){
        $c = get_post($post);
        $d = $c->post_excerpt;
        $speed_field = get_post_meta($post,'speed_field')[0];
        $show_check_speed += is_numeric($speed_field) ? 1 : 0;
        $option_meta[strtolower(str_replace($attribute.': ','',$d))]= array(
            'speed_field' => $speed_field,
            'ID' => $post
        );
    }

    if ( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) {
        $attributes = $product->get_variation_attributes();
        $options    = $attributes[ $attribute ];
    }

    $html  = '<select id="' .esc_attr(  $id ).'-'. $product->get_id(). '" class="' . esc_attr( $class ) . '" name="' . esc_attr( $name ) . '" data-attribute_name="attribute_' . esc_attr( sanitize_title( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';
    $html .= '<option value="">' . esc_html( $show_option_none_text ) . '</option>';

    if ( ! empty( $options ) ) {
        if ( $product && taxonomy_exists( $attribute ) ) {
            // Get terms if this is a taxonomy - ordered. We need the names too.
            $terms = wc_get_product_terms(
                $product->get_id(),
                $attribute,
                array(
                    'fields' => 'all',
                )
            );

            foreach ( $terms as $term ) {
                if ( in_array( $term->slug, $options, true ) ) {
                    $html .= '<option  value="' .  esc_attr( $term->slug )  . '" ' . selected( sanitize_title( $args['selected'] ), $term->slug, false ) . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name, $term, $attribute, $product ) ).'</option>';
                }

            }
        } else {

            foreach ( $options as $option ) {
                // This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
                $post_id = $option_meta[$option]['ID'];
                $post_speed_field = $option_meta[$option]['speed_field'];
                $post_speed_field = is_numeric($post_speed_field) ? 'data-speed-price='.$post_speed_field : '';
                $data_ext = 'data-post='.$post_id.' '.$post_speed_field ;
                $selected = sanitize_title( $args['selected'] ) === $args['selected'] ? selected( $args['selected'], sanitize_title( $option ), false ) : selected( $args['selected'], $option, false );
                $html    .= '<option '.$data_ext.' value="' . esc_attr( $option ) . '" ' . $selected . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option, null, $attribute, $product ) ) . '</option>';
            }
        }
    }

    $html .= '</select>';

    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    echo apply_filters( 'woocommerce_dropdown_variation_attribute_options_html', $html, $args );
}
