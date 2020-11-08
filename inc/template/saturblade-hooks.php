<?php
add_action('saturblade_before_shop_loop', 'woocommerce_template_loop_product_link_open', 5);
add_action('saturblade_before_shop_loop_item_title', 'saturblade_show_product_images', 10);
add_action('saturblade_before_shop_loop_item_title', 'products_variable_item_part', 15);
add_action('saturblade_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 13);
add_action('saturblade_before_shop_loop_item_title', 'wpspec_show_product_description', 25);
add_action('saturblade_before_shop_loop_item_title', 'saturblade_variable_form_add_to_cart', 27);
add_action('saturblade_before_shop_loop_item_title', 'saturblade_variable_loop_product_btns',30);


add_action('saturblade_product_btns', 'saturblade_loop_add_to_cart', 15);


add_action('saturblade_loop_products_variable_item_part', 'saturblade_template_loop_product_title', 5);
add_action('saturblade_loop_products_variable_item_part', 'woocommerce_template_loop_price', 15);
add_action('saturblade_loop_products_variable_item_part', 'saturblade_show_product_sale_flash', 25);

//add_action('crazyowl_woocomerce_shop_loop', 'woocommerce_template_loop_product_link_open', 5);
//add_action('crazyowl_woocomerce_shop_loop', 'woocommerce_show_product_loop_sale_flash', 10);
//add_action('crazyowl_woocomerce_shop_loop', 'woocommerce_template_loop_product_thumbnail', 15);
//add_action('crazyowl_woocomerce_shop_loop', 'woocommerce_template_loop_rating', 20);
//add_action('crazyowl_woocomerce_shop_loop', 'woocommerce_template_loop_price', 25);
//add_action('crazyowl_woocomerce_shop_loop', 'woocommerce_template_loop_product_title', 30);
//add_action('crazyowl_woocomerce_shop_loop', 'woocommerce_template_loop_product_link_close', 35);
//add_action('crazyowl_woocomerce_shop_loop', 'woocommerce_template_loop_add_to_cart', 45);
//add_action('crazyowl_woocomerce_shop_loop', 'woocommerce_widget_shopping_cart_button_view_cart', 42);
//add_filter('crazyowl_woocomerce_shop_loop', 'crazyowl_woocomerce_shop_loop_show_variation', 37);
//
//add_action('woocommerce_variation_options_pricing', 'crazyowl_field_to_variation', 25, 3);
//
//
//
//add_action('crazyowl_woocomerce_shop_v_loop', 'crazyowl_show_product_images', 15);
//add_action('crazyowl_woocomerce_shop_v_loop', 'crazyowl_show_product_sale_flash', 20);
//add_action('crazyowl_woocomerce_shop_v_loop', 'crazyowl_products__item_part', 25);
////add_action('crazyowl_woocomerce_shop_loop', 'woocommerce_template_single_rating', 35);
//add_filter('crazyowl_woocomerce_shop_v_loop', 'wpspec_show_product_description', 36);
////add_action('crazyowl_woocomerce_shop_loop', 'crazyowl_single_price', 20);
////add_action('crazyowl_woocomerce_shop_loop', 'woocommerce_template_single_excerpt', 55);
//add_action('crazyowl_woocomerce_shop_v_loop', 'woocommerce_widget_shopping_cart_button_view_cart', 70);
//add_action('crazyowl_woocomerce_shop_v_loop', 'crazyowl_archive_single_add_to_cart', 65);
////add_action('crazyowl_woocomerce_shop_v_loop', 'woocommerce_template_loop_add_to_cart', 62);
//add_action('crazyowl_woocomerce_shop_v_loop', 'crazyowl_loop_add_to_cart', 75);
////add_action('crazyowl_woocomerce_shop_loop', 'woocommerce_template_single_sharing', 85);
///