<?php
global $affwp_register_redirect;

affiliate_wp()->register->print_errors();

$errors = affiliate_wp()->register->get_errors();

$required_registration_fields = affiliate_wp()->settings->get( 'required_registration_fields' );

if ( ! is_user_logged_in() && ! empty( $errors ) ) {

	if ( ! array_key_exists( 'empty_name', $errors ) ) {
		$user_name = sanitize_text_field( $_POST['affwp_user_name'] );
	}

	if ( ! array_key_exists( 'empty_username', $errors ) && ! array_key_exists( 'username_unavailable', $errors ) && ! array_key_exists( 'username_invalid', $errors ) ) {
		$user_login = sanitize_text_field( $_POST['affwp_user_login'] );
	}

	if ( ! array_key_exists( 'email_unavailable', $errors ) && ! array_key_exists( 'email_invalid', $errors ) ) {
		$user_email = sanitize_text_field( $_POST['affwp_user_email'] );
	}

	if ( ! array_key_exists( 'payment_email_invalid', $errors ) ) {
		$payment_email = sanitize_text_field( $_POST['affwp_payment_email'] );
	}

	$url    = esc_url( $_POST['affwp_user_url'] );
	$method = sanitize_text_field( $_POST['affwp_promotion_method'] );

}

if ( is_user_logged_in() ) {
	$current_user = wp_get_current_user();
	$user_name    = $current_user->user_firstname . ' ' . $current_user->user_lastname;
	$user_login   = $current_user->user_login;
	$user_email   = $current_user->user_email;
	$url          = $current_user->user_url;

	$disabled = ' disabled="disabled"';
} else {
	$disabled = '';
}

?>

<form id="affwp-register-form" class="affwp-form afc-form-afiliada" action="" method="post">
	<?php
	/**
	 * Fires at the top of the affiliate registration templates' form (inside the form element).
	 *
	 * @since 1.0
	 */
	do_action( 'affwp_affiliate_register_form_top' );
	?>

	<fieldset>

		<p>
			<label for="affwp-user-name">Seu nome</label>
			<input id="affwp-user-name" type="text" name="affwp_user_name" value="<?php if( ! empty( $user_name ) ) { echo $user_name; } ?>" title="<?php esc_attr_e( 'Your Name', 'affiliate-wp' ); ?>" <?php echo affwp_required_field_attr( 'your_name' ); ?> />
		</p>

		<?php
		/**
		 * Fires just before the affiliate registration templates' form fields.
		 *
		 * @since 1.0
		 */
		do_action( 'affwp_register_fields_before' );
		?>

		<p>
			<label for="affwp-user-login"><?php _e( 'Username', 'affiliate-wp' ); ?></label>
			<input id="affwp-user-login" required="required" type="text" name="affwp_user_login" maxlength="60" value="<?php if( ! empty( $user_login ) ) { echo $user_login; } ?>" title="<?php esc_attr_e( 'Username', 'affiliate-wp' ); ?>"<?php echo $disabled; ?> />
			<span>Será sua identificação no sistema e poderá ser usado no checkout.</span>
		</p>

		<p>
			<label for="affwp-user-email"><?php _e( 'Account Email', 'affiliate-wp' ); ?></label>
			<input id="affwp-user-email" required="required" type="email" name="affwp_user_email" value="<?php if( ! empty( $user_email ) ) { echo $user_email; } ?>" title="<?php esc_attr_e( 'Email Address', 'affiliate-wp' ); ?>"<?php echo $disabled; ?> />
		</p>

		<?php if ( ! is_user_logged_in() && isset( $required_registration_fields['password'] ) ) : ?>

			<p>
				<label for="affwp-user-pass"><?php _e( 'Password', 'affiliate-wp' ); ?></label>
				<input id="affwp-user-pass" required="required" class="password" type="password" name="affwp_user_pass" />
			</p>

			<p>
				<label for="affwp-user-pass2"><?php _e( 'Confirm Password', 'affiliate-wp' ); ?></label>
				<input id="affwp-user-pass2" required="required" class="password" type="password" name="affwp_user_pass2" />
			</p>

		<?php endif; ?>

		<p>
			<label for="affwp-promotion-method">Como pretende divulgar os produtos do studio?</label>
			<textarea id="affwp-promotion-method" name="affwp_promotion_method" rows="2" cols="30"<?php echo affwp_required_field_attr( 'promotion_method' ); ?>><?php if( ! empty( $method ) ) { echo esc_textarea( $method ); } ?></textarea>
		</p>

		<p>
			<label for="affwp-user-url">Seu site, blog ou mídia social</label>
			<input id="affwp-user-url" type="text" name="affwp_user_url" value="<?php if( ! empty( $url ) ) { echo $url; } ?>" title="<?php esc_attr_e( 'Website URL', 'affiliate-wp' ); ?>" <?php echo affwp_required_field_attr( 'website_url' ); ?> />
			<span>Priorize o endereço do qual você fará maior parte da divulgação.</span>
		</p>


		<?php
		/**
		 * Fires just before the terms of service field within the affiliate registration form template.
		 *
		 * @since 1.0
		 */
		do_action( 'affwp_register_fields_before_tos' );
		?>

		<?php 
			$terms_of_use = affiliate_wp()->settings->get( 'terms_of_use' );
			$politicapg = get_permalink( get_option( 'wp_page_for_privacy_policy' ) );
			if ( ! empty( $terms_of_use ) ) : 
		?>
			<p style="font-size:.9em;line-height: 1.3">
				<label class="affwp-tos" for="affwp-tos">
					<input id="affwp-tos" required="required" type="checkbox" name="affwp_tos"/>
					Declaro que li e concordo com todos os <a href="<?php echo esc_url( get_permalink( $terms_of_use ) ); ?>" target="_blank">termos e condições</a> do programa de afiliadas e da <a href="<?php echo esc_url($politicapg); ?>">política de privacidade</a> de retenção de dados do Studio AFC Web Design.
				</label>
			</p>
		<?php endif; ?>

		<?php if ( affwp_is_recaptcha_enabled() ) :
			affwp_enqueue_script( 'affwp-recaptcha' ); ?>

			<div class="g-recaptcha" data-sitekey="<?php echo esc_attr( affiliate_wp()->settings->get( 'recaptcha_site_key' ) ); ?>"></div>

			<p>
				<input type="hidden" name="g-recaptcha-remoteip" value="<?php echo esc_attr( affiliate_wp()->tracking->get_ip() ); ?>" />
			</p>
		<?php endif; ?>

		<?php
		/**
		 * Fires inside of the affiliate registration form template (inside the form element, prior to the submit button).
		 *
		 * @since 1.0
		 */
		do_action( 'affwp_register_fields_before_submit' );
		?>

		<p>
			<input type="hidden" name="affwp_honeypot" value="" />
			<input type="hidden" name="affwp_redirect" value="<?php echo esc_url( $affwp_register_redirect ); ?>"/>
			<input type="hidden" name="affwp_register_nonce" value="<?php echo wp_create_nonce( 'affwp-register-nonce' ); ?>" />
			<input type="hidden" name="affwp_action" value="affiliate_register" />
			<input class="button" type="submit" value="Enviar pedido de afiliação" />
		</p>

		<?php
		/**
		 * Fires inside of the affiliate registration form template (inside the form element, after the submit button).
		 *
		 * @since 1.0
		 */
		do_action( 'affwp_register_fields_after' );
		?>
	</fieldset>

	<?php
	/**
	 * Fires at the bottom of the affiliate registration form template (inside the form element).
	 *
	 * @since 1.0
	 */
	do_action( 'affwp_affiliate_register_form_bottom' );
	?>
</form>
