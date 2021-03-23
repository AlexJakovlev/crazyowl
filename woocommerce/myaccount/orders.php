<?php
$args = array(
    'customer_id' => wp_get_current_user()->ID,
    'post_status' => 'cancelled',
    'post_type' => 'shop_order',
    'return' => 'ids',
);
$orders = wc_get_orders($args);
?>
<div class="orders accordion" id="orders-accordion">
    <?php
    foreach ($orders
             as $key => $value) {
        $order = wc_get_order($value);
        ?>
        <div class="order-item">
            <div class="order-item__header" id="order-1" data-toggle="collapse" data-target="#order-content-1"
                 aria-expanded="true" aria-controls="order-content-1">
                <div class="order-item__header-left">
                    <p>Order: #<span><?php print_r($value); ?></span></p>
                    <p>
                        <?php
                        $time = $order->get_date_created();
                        print_r($time);
                        ?>
                    </p>
                </div>
                <p class="order-item__header-right"><?php print_r($order->get_status()); ?></p>
            </div>
            <div id="order-content-1" class="order-item__content collapse show" aria-labelledby="order-1"
                 data-parent="#orders-accordion">
                <ul class="order__products">
                    <?php
                    $order_items = $order->get_items();
                    foreach ($order_items as $item_id => $item_data) {
                        $product_name = $item_data['name'];
                        $product_status = $item_data['status'];
                        print_r($item_data);
                        ?>
                        <li class="order__product-item">
                            <div class="order__product-item-left">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/img/tiger_release_final_20200409_205454.jpg"
                                     class="order__product-item-img" alt="">
                                <div class="order__product-item-left-content">
                                    <p class="order__product-item-title"><?php print_r($product_name) ?></p>
                                    <div class="order__product-item-left-description">
                                        <p class="order__product-item-left-description_warning">
                                            <?php print_r($item_data) ?>
<!--                                            In progress <i class="far fa-clock"></i>-->
                                        </p>
                                        <p>Class: Guardian</p>
                                        <p>
                                            Urgency</p>
                                    </div>
                                </div>
                            </div>
                            <div class="order__product-item-right">
                                <p>EDT: 3-5 Days</p>
                                <p>Order: #0003214B003</p>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <?php
    }
    ?>
</div>