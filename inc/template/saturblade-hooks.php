<?php

// TODO LOOP variable product

add_action('saturblade_shop_loop_item', 'woocommerce_template_loop_product_link_open', 5);
add_action('saturblade_shop_loop_item', 'saturblade_show_product_images', 10);
add_action('saturblade_shop_loop_item', 'products_variable_item_part', 15);
add_action('saturblade_shop_loop_item', 'woocommerce_template_loop_product_link_close', 13);
add_action('saturblade_shop_loop_item', 'wpspec_show_product_description', 25);
add_action('saturblade_shop_loop_item', 'saturblade_variable_form_add_to_cart', 27);
add_action('saturblade_shop_loop_item', 'saturblade_variable_loop_product_btns',30);

add_action('saturblade_product_btns', 'saturblade_loop_add_to_cart', 15);

add_action('saturblade_loop_products_variable_item_part', 'saturblade_template_loop_product_title', 5);
add_action('saturblade_loop_products_variable_item_part', 'woocommerce_template_loop_price', 15);
add_action('saturblade_loop_products_variable_item_part', 'saturblade_show_product_sale_flash', 25);

// TODO LOOP single product
add_action('saturblade_single_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 5);
add_action('saturblade_single_shop_loop_item_title', 'saturblade_show_product_images',10);
add_action('saturblade_single_shop_loop_item_title', 'products_variable_item_part', 15);
add_action('saturblade_single_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 20);
add_action('saturblade_single_shop_loop_item_title', 'wpspec_show_product_description', 25);
add_action('saturblade_single_shop_loop_item_title', 'saturblade_variable_loop_product_btns',30);

// TODO single product
add_action('saturblade_single_item','woocommerce_show_product_images',5);
add_action('saturblade_single_item','saturblade_show_product_sale_flash',15);

add_action('saturblade_single_product_summary','woocommerce_template_single_title',5);
add_action('saturblade_single_product_summary','woocommerce_template_single_rating',15);
add_action('saturblade_single_product_summary','woocommerce_template_single_price',25);
//add_action('saturblade_single_product_summary','woocommerce_template_single_excerpt',35);
add_action('saturblade_single_product_summary','wpspec_show_product_description',37);
add_action('saturblade_single_product_summary', 'saturblade_variable_form_add_to_cart', 47);
add_action('saturblade_single_product_summary', 'saturblade_variable_loop_product_btns',50);
//add_action('saturblade_single_product_summary','woocommerce_template_single_add_to_cart',45);
//add_action('saturblade_single_product_summary','woocommerce_template_single_meta',55);
//add_action('saturblade_single_product_summary','woocommerce_template_single_sharing',65);


add_action('saturblade_shop_loop_home','woocommerce_template_loop_product_link_open',5);
add_action('saturblade_shop_loop_home','saturblade_show_product_images', 10);
add_action('saturblade_shop_loop_home','products_variable_item_part', 15);
add_action('saturblade_shop_loop_home','woocommerce_template_loop_product_link_close', 13);
//add_action('saturblade_shop_loop_home','woocommerce_template_loop_product_link_open',5);