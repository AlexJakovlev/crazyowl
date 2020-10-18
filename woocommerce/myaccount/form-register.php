<?php
?>
<h2><?php esc_html_e('Register', 'woocommerce');
 ?></h2>

<form method="post"
      class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?> >
    <div><?php esc_html_e('Register', 'woocommerce');
        ?>
    <?php do_action('woocommerce_register_form_start'); ?>
    <a href="<?php echo esc_url( home_url( '/' ) ) ?>">х</a></div>
    <?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>

        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="reg_username"><?php esc_html_e('Username', 'woocommerce'); ?>&nbsp;<span
                        class="required">*</span></label>
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username"
                   id="reg_username" autocomplete="username"
                   value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
        </p>

    <?php endif; ?>

    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="reg_email"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
        <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email"
               autocomplete="email"
               value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
    </p>

    <?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>

        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="reg_password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span
                        class="required">*</span></label>
            <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password"
                   id="reg_password" autocomplete="new-password"/>
        </p>
        <p class="form-row form-row-wide">
            <label for="reg_password2"><?php _e( 'Повторите Ваш пароль', 'woocommerce' ); ?> <span class="required">*</span></label>
            <input type="password" class="input-text" name="password2" id="reg_password2" value="<?php if ( ! empty( $_POST['password2'] ) ) echo esc_attr( $_POST['password2'] ); ?>" />
        </p>
    <?php
//         поле "Имя"
        $billing_first_name = ! empty( $_POST[ 'billing_first_name' ] ) ? $_POST[ 'billing_first_name' ] : '';
        ?>
        <p class="form-row form-row-first">
            <label for="kind_of_name">Имя <span class="required">*</span></label>
            <input type="text" class="input-text" name="billing_first_name" id="kind_of_name" value="<?php esc_attr( $billing_first_name ) ?>" />
        </p>
        <p class="form-row form-row-first">
            <label for="kind_of_name">Promocode <span class="required">*</span></label>
            <input type="text" class="input-text" name="billing_first_name" id="kind_of_name" value="" />
        </p>
    <?php else : ?>

        <p><?php esc_html_e('A password will be sent to your email address.', 'woocommerce'); ?></p>

    <?php endif; ?>

    <?php do_action('woocommerce_register_form'); ?>

    <p class="woocommerce-form-row form-row">
        <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
        <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit"
                name="register"
                value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button>
    </p>

    <?php do_action('woocommerce_register_form_end'); ?>

</form>


