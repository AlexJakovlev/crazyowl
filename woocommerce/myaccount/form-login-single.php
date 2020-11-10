<?php

do_action( 'woocommerce_before_customer_login_form' );
?>
<div class="login-wrapper">

<h2><?php esc_html_e( 'Login', 'woocommerce' ); ?></h2>

<form class="login__form woocommerce-form woocommerce-form-login login" method="post">

    <?php do_action( 'woocommerce_login_form_start' ); ?>
   <?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>
     <p class="login__link">
       <span>Have no account?</span>
       <a href="/index.php/my-account/?action=register" class="login__link-href"> register </a>
     </p>
   <?php endif; ?>

    <p class="login__input-wrapper">
        <input type="text" class="login__input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
        <label for="username" class="login__input-label"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
    </p>
    <p class="login__input-wrapper">
        <input class="login__input-text" type="password" name="password" id="password" autocomplete="current-password" />
        <label for="password" class="login__input-label"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
    </p>

    <?php do_action( 'woocommerce_login_form' ); ?>

    <p class="login__link login__link_checkbox">
        <label class="login__link-label_checkbox">
          <input class="login__link-input_checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" />
          <span class="login__link-text_checkbox"><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
        </label>
    </p>
	  <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
    <button type="submit" class="login__btn btn btn-sm btn-danger" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
    <p class="login__link">
        <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" class="login__link-href">
          <?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?>
        </a>
    </p>

    <?php do_action( 'woocommerce_login_form_end' ); ?>

</form>

</div>