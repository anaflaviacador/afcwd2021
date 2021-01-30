<?php

function affwp_add_additional_field_to_affiliate_registration_form_cpfcnpj() {

	$errors = affiliate_wp()->register->get_errors();

	if ( ! array_key_exists( 'empty_cpfcnpj', $errors ) ) {
		$cpfcnpj = sanitize_text_field( $_POST['affwp_cpfcnpj_address'] );
	}

	?>
	<p>
		<label for="affwp-cpfcnpj">CPF ou CNPJ</label>
		<input id="affwp-cpfcnpj" type="text" name="affwp_cpfcnpj" value="<?php if ( ! empty( $cpfcnpj ) ) { echo $cpfcnpj; } ?>" title="CPF ou CNPJ" />
		<span>Se você for MEI / PJ, será necessário emitir NFSe para receber as comissões.</span>
	</p>
	<?php
}
add_action( 'affwp_register_fields_before', 'affwp_add_additional_field_to_affiliate_registration_form_cpfcnpj' );

/*
 * Save the BTC address to the affiliate meta after registration
 */
function affwp_save_affiliate_cpfcnpj_address( $affiliate_id, $status, $args ) {

	$cpfcnpj = sanitize_text_field( $_POST['affwp_cpfcnpj'] );

	if ( ! empty( $cpfcnpj ) ) {
		affwp_add_affiliate_meta( $affiliate_id, 'cpfcnpj', $cpfcnpj );
	}

}
add_action( 'affwp_register_user', 'affwp_save_affiliate_cpfcnpj_address', 10, 3 );

/*
 * Make BTC address field required during affiliate registration {Remove if it shouldn't be required}
 */
function affwp_add_cpfcnpj_to_required_fields( $required_fields ) {

	$required_fields['affwp_cpfcnpj'] = array(
		'error_id'      => 'empty_cpfcnpj',
		'error_message' => 'Por favor, informe seu CPF ou CNPJ.',
	);

	return $required_fields;
}
add_filter( 'affwp_register_required_fields', 'affwp_add_cpfcnpj_to_required_fields' );

/*
 * Display the BTC address field in the Profile Settings page in the affiliate dashboard
 */
function affwp_show_cpfcnpj_in_affiliate_dashboard( $affiliate_id, $affiliate_user_id ) {

	$cpfcnpj = affwp_get_affiliate_meta( $affiliate_id, 'cpfcnpj', true );

	?>
	<div class="affwp-wrap affwp-cpfcnpj-wrap">
		<label for="affwp-cpfcnpj"><?php _e( 'Documento CPF ou CNPJ', 'affiliate-wp' ); ?></label>
		<input id="affwp-cpfcnpj" style="margin-top:0; max-width: 320px;" type="text" name="cpfcnpj" value="<?php echo esc_attr( $cpfcnpj ); ?>" />
	</div>

	<?php

}
add_action( 'affwp_affiliate_dashboard_before_submit', 'affwp_show_cpfcnpj_in_affiliate_dashboard', 10, 2 );

/*
 * Update the BTC address field from the Profile Settings page in the affiliate dashboard
 */
function affwp_affiliate_dashboard_update_cpfcnpj( $data ) {

	$affiliate_id = absint( $data['affiliate_id'] );

	if ( ! empty( $data['cpfcnpj'] ) ) {

		$cpfcnpj = sanitize_text_field( $data['cpfcnpj'] );

		affwp_update_affiliate_meta( $affiliate_id, 'cpfcnpj', $cpfcnpj );

	} else {

		affwp_delete_affiliate_meta( $affiliate_id, 'cpfcnpj' );

	}

}
add_action( 'affwp_update_affiliate_profile_settings', 'affwp_affiliate_dashboard_update_cpfcnpj' );

/*
 * Display the BTC address field in the edit affiliate page in the admin dashboard
 */
function affwp_admin_edit_affiliate_extra_fields_cpfcnpj( $affiliate ) {

	$cpfcnpj = affwp_get_affiliate_meta( $affiliate->affiliate_id, 'cpfcnpj', true );
	?>

	<tr class="form-row form-required">

		<th scope="row">
			<label for="payment_email">CPF / CNPJ</label>
		</th>

		<td>
			<input class="regular-text" type="text" name="cpfcnpj" id="cpfcnpj" value="<?php echo esc_attr( $cpfcnpj ); ?>" />
			<p class="description">* Solicitar NFSe para PJs</p>
		</td>

	</tr>

	<?php
}
add_action( 'affwp_edit_affiliate_end', 'affwp_admin_edit_affiliate_extra_fields_cpfcnpj' );

/*
 * Update the affiliate BTC address field from the edit affiliate page in the admin dashboard
 */
function affwp_admin_update_affiliate_cpfcnpj( $affiliate, $updated ) {

	if ( $updated ) {

		$affiliate_id = $affiliate->affiliate_id;

		if ( ! empty( $_POST['cpfcnpj'] ) ) {

			$cpfcnpj = sanitize_text_field( $_POST['cpfcnpj'] );

			affwp_update_affiliate_meta( $affiliate_id, 'cpfcnpj', $cpfcnpj );

		} else {

			affwp_delete_affiliate_meta( $affiliate_id, 'cpfcnpj' );

		}
	}

}
add_action( 'affwp_updated_affiliate', 'affwp_admin_update_affiliate_cpfcnpj', 10, 2 );