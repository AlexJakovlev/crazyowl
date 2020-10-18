<?php
if (isset($_GET['action']) == 'register') {
    if ('yes' === get_option('woocommerce_enable_myaccount_registration')) {
        wc_get_template('myaccount/form-register.php');
    }
} else {
    wc_get_template('myaccount/form-login-single.php');
}