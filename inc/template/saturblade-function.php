<?php

// TODO вывод кол-во товваров в корзине в хедере AJAX
add_filter('woocommerce_add_to_cart_fragments', 'header_add_to_cart_fragment');
function header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    ob_start();
    ?>
    <span class="basket-btn__counter"><?php echo sprintf($woocommerce->cart->cart_contents_count); ?></span>
    <?php
    $fragments['.basket-btn__counter'] = ob_get_clean();
    return $fragments;
}

// TODO валидация регистрациии
add_filter('woocommerce_registration_errors', 'saturblade_validate_registration', 1);
function saturblade_validate_registration($errors)
{

//    wc_add_notice( 'Ваш нужно принять политику конфиденциальности.', 'notice' );
    if (strcmp($_POST['password'], $_POST['password2']) !== 0) {
        $errors->add('name_err', '<strong>Ошибка</strong>: Несовпадают пароли');
    }
    return $errors;
}

// TODO доп поля в ркгистрации
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

// TODO вывод цены мин цены если распродвжа
function my_woocommerce_variable_price_html($price, $product)
{
    if ($product->is_variable()){
    return 'От ' . wc_price($product->get_price());
    }
}

// TODO АРХИВ спец поле в в товаре

////add_filter('woocommerce_variable_price_html', 'my_woocommerce_variable_price_html', 10, 2);
//function wpspec_show_product_description()
//{
//    global $product;
//    echo ' <p class="products__description-text">' . get_the_excerpt() . '</p>';
//
//    echo '<div ><p class="form-field Urgency_field ">
//		<label for="Urgency">This product have requirements</label>
//		<span class="woocommerce-help-tip"></span>
//		<input id="speed-'.$product->get_id().'" type="checkbox" class="checkbox" style="" name="Urgency" id="Urgency" >Срочность выполнения </p></div>';
//
//}


// TODO АДМИНКА доп поля в вариативном товаре

//function crazyowl_field_to_variation($i, $variation_data, $variation)
//{
//
//    woocommerce_wp_text_input(
//        array(
//            'id' => 'speed_field[' . $i . ']',
//            'class' => 'short',
//            'wrapper_class' => 'form-row',
//            'label' => 'Какое-то поле',
//            'value' => get_post_meta($variation->ID, 'speed_field', true)
//        )
//    );
//
//}
//add_action('woocommerce_save_product_variation', 'crazyowl_save_variation', 25, 2);
//
//function crazyowl_save_variation($variation_id, $i)
//{
//
//    if (isset($_POST['speed_field'][$i])) {
//        update_post_meta(
//            $variation_id,
//            'speed_field',
//            sanitize_text_field($_POST['speed_field'][$i])
//        );
//    }
//
//}

// TODO   LOOP  products SHOP

function saturblade_show_product_sale_flash(){
    global $product;
    echo '<span class="products__item-labels">
<span class="products__item-label products__item-label_new">hott</span>
                           <span class="products__item-label products__item-label_new">New</span>';
    if ($product->is_on_sale()) {
        echo   '<span class="products__item-label products__item-label_hot"><i class="far fa-clock"></i></span>';
    }
    echo '</span>';
}


// Вывод картинок(и) товара в LOOP'e
function saturblade_show_product_images()
{
    wc_get_template('single-product1/archive-product-image.php');
}
// TODO вывод галереи
function crazyowl_get_gallery_image_html( $attachment_id, $main_image = false ) {
    $flexslider        = (bool) apply_filters( 'woocommerce_single_product_flexslider_enabled', get_theme_support( 'wc-product-gallery-slider' ) );
    $gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
    $thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
    $image_size        = apply_filters( 'woocommerce_gallery_image_size', $flexslider || $main_image ? 'woocommerce_single' : $thumbnail_size );
    $full_size         = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );
    $thumbnail_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
    $full_src          = wp_get_attachment_image_src( $attachment_id, $full_size );
    $alt_text          = trim( wp_strip_all_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) );
    $image             = wp_get_attachment_image(
        $attachment_id,
        $image_size,
        false,
        apply_filters(
            'woocommerce_gallery_image_html_attachment_image_params',
            array(
                'title'                   => _wp_specialchars( get_post_field( 'post_title', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
                'data-caption'            => _wp_specialchars( get_post_field( 'post_excerpt', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
                'data-src'                => esc_url( $full_src[0] ),
                'data-large_image'        => esc_url( $full_src[0] ),
                'data-large_image_width'  => esc_attr( $full_src[1] ),
                'data-large_image_height' => esc_attr( $full_src[2] ),
                'class'                   => esc_attr( $main_image ? 'wp-post-image' : '' ),
            ),
            $attachment_id,
            $image_size,
            $main_image
        )
    );

    return '<div data-thumb="' . esc_url( $thumbnail_src[0] ) . '" data-thumb-alt="' . esc_attr( $alt_text ) . '" class="woocommerce-product-gallery__image products__img"><div class="products__img">' . $image . '</div></div>';
}
function saturblade_single_price()
{
    global $product;
   ?>
<span class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'products__item-price' ) ); ?>"><?php echo $product->get_price(); ?></span>
<?php
//wc_get_template('single-product1/archive-price.php');
}
//function crazy_single_title(){
//    wc_get_template('single-product/archive-title.php');
//
//}
//
//add_action('products__item-part','crazyowl_single_price',10);
//add_action('products__item-part','crazy_single_title',15);
//function crazyowl_products__item_part(){
//    global $product;
//    echo '<div class="products__item-part">';
//    do_action('products__item-part');
//    echo $product->get_type();
//    echo '</div>';
//}
//
//function crazyowl_archive_single_add_to_cart(){
//    global $product;
//
//    // Enqueue variation scripts.
//    wp_enqueue_script( 'wc-add-to-cart-variation' );
//
//    // Get Available variations?
//    $get_variations = count( $product->get_children() ) <= apply_filters( 'woocommerce_ajax_variation_threshold', 30, $product );
//
//    // Load the template.
//    wc_get_template(
//        'single-product/add-to-cart/archive-variable.php',
//        array(
//            'available_variations' => $get_variations ? $product->get_available_variations() : false,
//            'attributes'           => $product->get_variation_attributes(),
//            'selected_attributes'  => $product->get_default_attributes(),
//        )
//    );
//}
//
//function crazyowl_loop_add_to_cart( $args = array() ){
//    global $product;
//
//    if ( $product ) {
//        $defaults = array(
//            'quantity' => 1,
//            'class' => implode(
//                ' ',
//                array_filter(
//                    array(
//                        'button',
//                        'product_type_simple',
//                        $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
//                        $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
//                    )
//                )
//            ),
//            'attributes' => array(
//                'data-product_id' => $product->get_id(),
//                'data-product_sku' => $product->get_sku(),
//                'aria-label' => $product->add_to_cart_description(),
//                'rel' => 'nofollow',
//            ),
//        );
//
//        $args = apply_filters('woocommerce_loop_add_to_cart_args', wp_parse_args($args, $defaults), $product);
//
//        if (isset($args['attributes']['aria-label'])) {
//            $args['attributes']['aria-label'] = wp_strip_all_tags($args['attributes']['aria-label']);
//        }
//
//        wc_get_template('loop/crazyowl-add-to-cart.php', $args);
//    }
//}
//function crazyowl_add_to_cart_url() {
//    global $product;
//    $url = $product->is_purchasable() && $product->is_in_stock() ? remove_query_arg(
//        'added-to-cart',
//        add_query_arg(
//            array(
//                'add-to-cart' => $product->get_id(),
//            ),
//            ( function_exists( 'is_feed' ) && is_feed() ) || ( function_exists( 'is_404' ) && is_404() ) ? $product->get_permalink() : ''
//        )
//    ) : $product->get_permalink();
//    return apply_filters( 'woocommerce_product_add_to_cart_url', $url, $product );
//}
//function crazyowl_dropdown_variation_attribute_options( $args = array() ) {
//    $args = wp_parse_args(
//        apply_filters( 'woocommerce_dropdown_variation_attribute_options_args', $args ),
//        array(
//            'options_meta'     => false,
//            'options'          => false,
//            'attribute'        => false,
//            'product'          => false,
//            'selected'         => false,
//            'name'             => '',
//            'id'               => '',
//            'class'            => '',
//            'show_option_none' => __( 'Choose an option', 'woocommerce' ),
//        )
//    );
//
//    // Get selected value.
//    if ( false === $args['selected'] && $args['attribute'] && $args['product'] instanceof WC_Product ) {
//        $selected_key = 'attribute_' . sanitize_title( $args['attribute'] );
//        // phpcs:disable WordPress.Security.NonceVerification.Recommended
//        $args['selected'] = isset( $_REQUEST[ $selected_key ] ) ? wc_clean( wp_unslash( $_REQUEST[ $selected_key ] ) ) : $args['product']->get_variation_default_attribute( $args['attribute'] );
//        // phpcs:enable WordPress.Security.NonceVerification.Recommended
//    }
//    $option_meta           = $args['options_meta'];
//    $options               = $args['options'];
//    $product               = $args['product'];
//    $attribute             = $args['attribute'];
//    $name                  = $args['name'] ? $args['name'] : 'attribute_' . sanitize_title( $attribute );
//    $id                    = $args['id'] ? $args['id'] : sanitize_title( $attribute );
//    $class                 = $args['class'];
//    $show_option_none      = (bool) $args['show_option_none'];
//    $show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __( 'Choose an option', 'woocommerce' ); // We'll do our best to hide the placeholder, but we'll need to show something when resetting options.
//    $show_check_speed      = 0;
//    $posts = $product->get_visible_children();
//    $option_meta =         array();
//    foreach ($posts as $post ){
//        $c = get_post($post);
//        $d = $c->post_excerpt;
//        $speed_field = get_post_meta($post,'speed_field')[0];
//        $show_check_speed += is_numeric($speed_field) ? 1 : 0;
//        $option_meta[strtolower(str_replace($attribute.': ','',$d))]= array(
//            'speed_field' => $speed_field,
//            'ID' => $post
//        );
//    }
//
//    if ( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) {
//        $attributes = $product->get_variation_attributes();
//        $options    = $attributes[ $attribute ];
//    }
//
//    $html  = '<select id="' .esc_attr(  $id ).'-'. $product->get_id(). '" class="' . esc_attr( $class ) . '" name="' . esc_attr( $name ) . '" data-attribute_name="attribute_' . esc_attr( sanitize_title( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';
//    $html .= '<option value="">' . esc_html( $show_option_none_text ) . '</option>';
//
//    if ( ! empty( $options ) ) {
//        if ( $product && taxonomy_exists( $attribute ) ) {
//            // Get terms if this is a taxonomy - ordered. We need the names too.
//            $terms = wc_get_product_terms(
//                $product->get_id(),
//                $attribute,
//                array(
//                    'fields' => 'all',
//                )
//            );
//
//            foreach ( $terms as $term ) {
//                if ( in_array( $term->slug, $options, true ) ) {
//                    $html .= '<option  value="' .  esc_attr( $term->slug )  . '" ' . selected( sanitize_title( $args['selected'] ), $term->slug, false ) . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name, $term, $attribute, $product ) ).'</option>';
//                }
//
//            }
//        } else {
//
//            foreach ( $options as $option ) {
//                // This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
//                $post_id = $option_meta[$option]['ID'];
//                $post_speed_field = $option_meta[$option]['speed_field'];
//                $post_speed_field = is_numeric($post_speed_field) ? 'data-speed-price='.$post_speed_field : '';
//                $data_ext = 'data-post='.$post_id.' '.$post_speed_field ;
//                $selected = sanitize_title( $args['selected'] ) === $args['selected'] ? selected( $args['selected'], sanitize_title( $option ), false ) : selected( $args['selected'], $option, false );
//                $html    .= '<option '.$data_ext.' value="' . esc_attr( $option ) . '" ' . $selected . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option, null, $attribute, $product ) ) . '</option>';
//            }
//        }
//    }
//
//    $html .= '</select>';
//
//    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
//    echo apply_filters( 'woocommerce_dropdown_variation_attribute_options_html', $html, $args );
//}

//function crazyowl_woocomerce_shop_loop_show_variation()
//{
//    global $product;
//
////    print_r(wp_get_attachment_image_srcset( $variation_id, $image_size ));
//// если товар вариантивный
//    if ($product->is_type('variable')) {
//        //получаем варианты
//        $available_variations = $product->get_available_variations();
//        echo '<select name="" id="product-variable"  data-id="'.$product->get_id().'" class="products__description-select">';
//        foreach ($available_variations as $key => $value) {
//            $attribute = $value['attributes']['attribute_class'];
//            $variation_id = $value['variation_id'];
//            $post_meta = get_post_meta($variation_id);
//
//            //         _price
//            //        _thumbnail_id
//            //        speed_field
//            //       _regular_price
//            $price = $post_meta['_price'][0];
//            $thumbnail_url = get_the_post_thumbnail_url($variation_id);
//            $regular_price = $post_meta['_regular_price'][0];
//            $speed_price = $post_meta['speed_field'][0];
//            $speed_price = $speed_price > 0 ? 'data-speed_price="' . $speed_price . '"' : '';
//
//            echo '<option value="' . $attribute .
//                '" data-id="' . $variation_id . '" ' . $speed_price .
//                ' data-thumbnail="' .$thumbnail_url .
//                '" data-price="' . $price .
//                '" data-regular="' . $regular_price . '" >'
//                . $attribute . ' </option>';
//        }
//        echo '</select>';
//    }
//}