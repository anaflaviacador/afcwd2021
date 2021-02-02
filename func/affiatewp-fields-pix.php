<?php

function affwp_add_additional_field_to_affiliate_registration_form_pix() {

	$errors = affiliate_wp()->register->get_errors();

	if ( ! array_key_exists( 'empty_pix', $errors ) ) {
		$pix = sanitize_text_field( $_POST['affwp_pix_address'] );
	}

	?>
	<p>
		<label for="affwp-pix">Cadastrar chave PIX <img src="<?php echo get_template_directory_uri(); ?>/img/logo-pix.svg" alt="logo pix banco central" style="height: 26px; vertical-align: middle; position: relative; top: -3px; margin-left: 10px;"></label>
		<input id="affwp-pix" type="text" name="affwp_pix" value="<?php if ( ! empty( $pix ) ) { echo $pix; } ?>" title="Chave PIX" />
		<span>Certifique-se que a chave é valida (de preferência aleatória) e que está registrada na sua conta bancária escolhida para receber seu pagamento.</span>
	</p>
	<?php
}
add_action( 'affwp_register_fields_before', 'affwp_add_additional_field_to_affiliate_registration_form_pix' );

/*
 * Save the BTC address to the affiliate meta after registration
 */
function affwp_save_affiliate_pix_address( $affiliate_id, $status, $args ) {

	$pix = sanitize_text_field( $_POST['affwp_pix'] );

	if ( ! empty( $pix ) ) {
		affwp_add_affiliate_meta( $affiliate_id, 'pix', $pix );
	}

}
add_action( 'affwp_register_user', 'affwp_save_affiliate_pix_address', 10, 3 );

/*
 * Make BTC address field required during affiliate registration {Remove if it shouldn't be required}
 */
function affwp_add_pix_to_required_fields( $required_fields ) {

	$required_fields['affwp_pix'] = array(
		'error_id'      => 'empty_pix',
		'error_message' => 'Por favor, entre com sua chave PIX para facilitar os repasses das comissões!',
	);

	return $required_fields;
}
add_filter( 'affwp_register_required_fields', 'affwp_add_pix_to_required_fields' );

/*
 * Display the BTC address field in the Profile Settings page in the affiliate dashboard
 */
function affwp_show_pix_in_affiliate_dashboard( $affiliate_id, $affiliate_user_id ) {

	$pix = affwp_get_affiliate_meta( $affiliate_id, 'pix', true );

	?>
	<p>&nbsp;</p>
	<div class="affwp-wrap affwp-pix-wrap">
		<label for="affwp-pix"><?php _e( 'Chave PIX criada no seu banco escolhido para recebimento de pagamentos', 'affiliate-wp' ); ?></label>
		<input id="affwp-pix" style="margin-top:0" type="text" name="pix" value="<?php echo esc_attr( $pix ); ?>" />
	</div>

	<?php

}
add_action( 'affwp_affiliate_dashboard_before_submit', 'affwp_show_pix_in_affiliate_dashboard', 10, 2 );

/*
 * Update the BTC address field from the Profile Settings page in the affiliate dashboard
 */
function affwp_affiliate_dashboard_update_pix( $data ) {

	$affiliate_id = absint( $data['affiliate_id'] );

	if ( ! empty( $data['pix'] ) ) {

		$pix = sanitize_text_field( $data['pix'] );

		affwp_update_affiliate_meta( $affiliate_id, 'pix', $pix );

	} else {

		affwp_delete_affiliate_meta( $affiliate_id, 'pix' );

	}

}
add_action( 'affwp_update_affiliate_profile_settings', 'affwp_affiliate_dashboard_update_pix' );

/*
 * Display the BTC address field in the edit affiliate page in the admin dashboard
 */
function affwp_admin_edit_affiliate_extra_fields_pix( $affiliate ) {

	$pix = affwp_get_affiliate_meta( $affiliate->affiliate_id, 'pix', true );
	?>

	<tr class="form-row form-required">

		<th scope="row">
			<label for="payment_email">Chave PIX</label>
		</th>

		<td>
			<input class="regular-text" type="text" name="pix" id="pix" value="<?php echo esc_attr( $pix ); ?>" />
			<p class="description">Chave única para repasses rápidos</p>
		</td>

	</tr>

	<?php
}
add_action( 'affwp_edit_affiliate_end', 'affwp_admin_edit_affiliate_extra_fields_pix', 1 );

/*
 * Update the affiliate BTC address field from the edit affiliate page in the admin dashboard
 */
function affwp_admin_update_affiliate_pix( $affiliate, $updated ) {

	if ( $updated ) {

		$affiliate_id = $affiliate->affiliate_id;

		if ( ! empty( $_POST['pix'] ) ) {

			$pix = sanitize_text_field( $_POST['pix'] );

			affwp_update_affiliate_meta( $affiliate_id, 'pix', $pix );

		} else {

			affwp_delete_affiliate_meta( $affiliate_id, 'pix' );

		}
	}

}
add_action( 'affwp_updated_affiliate', 'affwp_admin_update_affiliate_pix', 10, 2 );