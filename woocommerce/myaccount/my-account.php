<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
do_action( 'woocommerce_account_navigation' ); ?>

<div class="woocommerce-MyAccount-content">
	<?php
		/**
		 * My Account content.
		 *
		 * @since 2.6.0
		 */
		do_action( 'woocommerce_account_content' );
	?>
</div>

<?php
	if (class_exists('WC_Subscription') && is_account_page() && ! is_wc_endpoint_url()) {		
		if (! has_active_subscription()) {
			echo '<br><br>';
			echo '<h5 class="has-text-align-center">'.do_shortcode('[icone prefixo="fal" nome="envelope" cor="roxo" tamanho="2"]').'<br>Chegou o serviço de email marketing do studio!</h5>';
			echo '<p class="has-text-align-center" style="font-size:.9em">Um serviço exclusivo para clientes '.do_shortcode('[afc]').' engatar suas microempresas e engajar seu público.</p>';
			echo '<br><br>';
			get_template_part('inc/emailmkt','planos');

			echo '<p class="has-text-align-center" style="margin-bottom:10px"></p>';
			echo '<p class="has-text-align-center"><a href="'.esc_url(home_url('/')).'servicos/email-marketing" class="button grafite">Clique aqui e saiba mais</a></p>';
		}
	}