<?php

?>
<div class="login-wrapper">
    <h2><?php esc_html_e('Register', 'woocommerce'); ?></h2>

    <form method="post" class="login__form woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?> >
        <div class="login__form-title">
          <?php do_action('woocommerce_before_customer_login_form') ?>
            <?php esc_html_e('Register', 'woocommerce');
            ?>

<!--            <a href="--><?php //echo esc_url(home_url('/')) ?><!--">х</a>-->
        </div>
        <?php do_action('woocommerce_register_form_start'); ?>
        <?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>

        <p class="login__input-wrapper">
            <input type="text" class="login__input-text" name="username"
                   id="reg_username" autocomplete="username"
                   value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
            <label for="reg_username" class="login__input-label"><?php esc_html_e('Username', 'woocommerce'); ?>&nbsp;<span
                        class="required">*</span></label>
        </p>

        <?php endif; ?>

        <p class="login__input-wrapper">
            <input type="email" class="login__input-text" name="email" id="reg_email"
                   autocomplete="email"
                   value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
            <label for="reg_email" class="login__input-label"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span
                        class="required">*</span></label>
        </p>

        <?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>
            <p class="login__input-wrapper">
                <input type="password" class="login__input-text" name="password"
                       id="reg_password" autocomplete="new-password"/>
                <label for="reg_password" class="login__input-label"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span
                            class="required">*</span></label>
            </p>
            <p class="login__input-wrapper">
                <input type="password" class="login__input-text" name="password2" id="reg_password2"
                       value="<?php if (!empty($_POST['password2'])) echo esc_attr($_POST['password2']); ?>"/>
                <label for="reg_password2" class="login__input-label"><?php _e('Повторите Ваш пароль', 'woocommerce'); ?> <span
                            class="required">*</span></label>
            </p>
        <?php
        else : ?>
            <p><?php esc_html_e('A password will be sent to your email address.', 'woocommerce'); ?></p>

        <?php endif; ?>
        <?php
        //         поле "Имя"
        $billing_first_name = !empty($_POST['billing_first_name']) ? $_POST['billing_first_name'] : '';
        ?>
        <p class="login__input-wrapper">
            <input type="text" class="login__input-text" name="kind_of_name" id="kind_of_name"
                   value="<?php esc_attr($billing_first_name) ?>"/>
            <label for="kind_of_name" class="login__input-label">Имя <span class="required">*</span></label>
        </p>
<!--        <p class="login__input-wrapper">-->
<!--            <label for="kind_of_name" class="login__input-label">Promocode<span class="required">*</span></label>-->
<!--            <input type="text" class="login__input-text" name="promocode" id="promocode" value=""/>-->
<!--        </p>-->

	      <?php do_action('woocommerce_register_form'); ?>
	      <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
        <button type="submit" class="login__btn btn btn-sm btn-danger"
                name="register"
                value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button>

        <?php do_action('woocommerce_register_form_end'); ?>

    </form>
</div>