<?php
$affiliate              = affwp_get_affiliate();
$affiliate_id           = $affiliate->affiliate_id;
$affiliate_user_id      = $affiliate->user_id;
$payment_email          = affwp_get_affiliate_payment_email( $affiliate_id );
?>

<div id="affwp-affiliate-dashboard-profile" class="affwp-tab-content">

	<form id="affwp-affiliate-dashboard-profile-form" class="affwp-form" method="post">

		<h4><?php _e( 'Profile Settings', 'affiliate-wp' ); ?></h4>

		<?php if ( affwp_email_referral_notifications( absint( $affiliate_id ) ) ) : ?>			
			<div class="affwp-wrap affwp-send-notifications-wrap">
				<input id="affwp-referral-notifications" type="checkbox" name="referral_notifications" value="1" <?php checked( true, get_user_meta( $affiliate_user_id, 'affwp_referral_notifications', true ) ); ?>/>
				<label for="affwp-referral-notifications">Quero saber de compras bem-sucedidas de minhas referências <em>(link ou citação direta no carrinho)</em>.</label>
			</div>
		<?php endif; ?>

		<?php
		/**
		 * Fires immediately prior to the profile submit button in the affiliate area.
		 *
		 * @since 1.0
		 *
		 * @param int    $affiliate_id      Affiliate ID.
		 * @param string $affiliate_user_id The user of the currently logged-in affiliate.
		 */
		do_action( 'affwp_affiliate_dashboard_before_submit', $affiliate_id, $affiliate_user_id ); ?>


		<div class="affwp-wrap affwp-payment-email-wrap">
			<label for="affwp-payment-email">E-mail paypal <em>(apenas para residentes no exterior)</em></label>
			<input id="affwp-payment-email" type="email" style="margin-top:0; max-width: 320px;" name="payment_email" value="<?php echo esc_attr( $payment_email ); ?>" />
		</div>

		<div class="affwp-save-profile-wrap">
			<input type="hidden" name="affwp_action" value="update_profile_settings" />
			<input type="hidden" name="affiliate_id" value="<?php echo absint( $affiliate_id ); ?>" />
			<input type="submit" class="button" value="Salvar" />
		</div>

	</form>

</div>