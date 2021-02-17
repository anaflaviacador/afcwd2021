<?php
$affiliate_id = affwp_get_affiliate_id();
?>
<div id="affwp-affiliate-dashboard-url-generator" class="affwp-tab-content">

	<h4>Informações principais</h4>

	<?php
	/**
	 * Fires at the top of the Affiliate URLs dashboard tab.
	 *
	 * @since 2.0.5
	 *
	 * @param int $affiliate_id Affiliate ID of the currently logged-in affiliate.
	 */
	do_action( 'affwp_affiliate_dashboard_urls_top', $affiliate_id );
	?>

	<p>
		<?php /*if ( 'id' == affwp_get_referral_format() ) : ?>
			<?php printf( __( 'Your affiliate ID is: <strong>%s</strong>', 'affiliate-wp' ), $affiliate_id ); ?>
		<?php elseif ( 'username' == affwp_get_referral_format() ) : ?>
			<?php printf( __( 'Your affiliate username is: <strong>%s</strong>', 'affiliate-wp' ), affwp_get_affiliate_username() ); ?>
		<?php endif;*/ ?>
		<?php printf( __( 'Seu ID de afiliada é: <strong>%s</strong>', 'affiliate-wp' ), $affiliate_id ); ?><br>
		<?php printf( __( 'Seu username é: <strong>%s</strong>', 'affiliate-wp' ), affwp_get_affiliate_username() ); ?><br>
		<?php printf( __( 'Seu link principal é: <strong>%s</strong>', 'affiliate-wp' ), esc_url( urldecode( affwp_get_affiliate_referral_url() ) ) ); ?>
	</p>

	<p>&nbsp;</p>
	<p>&nbsp;</p>

	<?php
	/**
	 * Fires just before the Referral URL Generator.
	 *
	 * @since 2.0.5
	 *
	 * @param int $affiliate_id Affiliate ID of the currently logged-in affiliate.
	 */
	do_action( 'affwp_affiliate_dashboard_urls_before_generator', $affiliate_id );
	?>

	<h4>Gerador de URL</h4>

	<p>Digite qualquer URL daqui do site para gerar seu link direto!</p>
	<p>&nbsp;</p>

	<form id="affwp-generate-ref-url" class="affwp-form" method="get" action="#affwp-generate-ref-url">
		<div class="affwp-wrap affwp-base-url-wrap">
			<label for="affwp-url"><?php _e( 'Page URL', 'affiliate-wp' ); ?></label>
			<input style="margin-top: 5px" type="text" name="url" id="affwp-url" value="<?php echo esc_url( urldecode( affwp_get_affiliate_base_url() ) ); ?>" />
		</div>

		<div class="affwp-wrap affwp-campaign-wrap">
			<label for="affwp-campaign"><?php _e( 'Campaign Name (optional)', 'affiliate-wp' ); ?></label>
			<input style="margin-top: 5px" type="text" name="campaign" id="affwp-campaign" value="" />
		</div>

		<div class="affwp-wrap affwp-referral-url-wrap" <?php if ( ! isset( $_GET['url'] ) ) { echo 'style="display:none;"'; } ?>>
			<label for="affwp-referral-url"><strong>Sua URL está pronta!</strong></label>
			<input style="margin-top: 5px; margin-bottom: 5px;" type="text" id="affwp-referral-url" value="<?php echo esc_url( urldecode( affwp_get_affiliate_referral_url() ) ); ?>" />
			<div class="description" style="font-size: 11px; font-style: italic">Agora copie e compartilhe pelo mundo.</div>
		</div>

		<div class="affwp-referral-url-submit-wrap">
			<input type="hidden" class="affwp-affiliate-id" value="<?php echo esc_attr( urldecode( affwp_get_referral_format_value() ) ); ?>" />
			<input type="hidden" class="affwp-referral-var" value="<?php echo esc_attr( affiliate_wp()->tracking->get_referral_var() ); ?>" />
			<!-- <input type="submit" class="button" value="<?php //_e( 'Generate URL', 'affiliate-wp' ); ?>" /> -->
			<button type="submit" class="button verde">Gerar link</button>
		</div>
	</form>

	<?php
	/**
	 * Fires at the bottom of the Affiliate URLs dashboard tab.
	 *
	 * @since 2.0.5
	 *
	 * @param int $affiliate_id Affiliate ID of the currently logged-in affiliate.
	 */
	do_action( 'affwp_affiliate_dashboard_urls_bottom', $affiliate_id );
	?>

</div>
