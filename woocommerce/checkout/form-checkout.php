<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<?php do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<?php if (wc_coupons_enabled()): ?>
<div class="col2-set" id="customer_details">
	<div class="col-1">
		<blockquote class="azul" style="margin-bottom: 2.5em; font-size: .8em;"><p><span style="color:var(--cor-azul-escuro); font-weight:bold"><i class="fal fa-credit-card"></i> Pagará no cartão de crédito?</span> Dê preferência em fechar seu pedido com os <u>dados do titular do cartão</u>, que são: nome completo, CPF/CNPJ e telefone. Qualquer divergência de dados podem ser barrados pelo sistema anti-fraude do Paypal e impedir a conclusão do pedido.</p></blockquote>
		
	</div>

	<div class="col-2">
		<?php wc_get_template_part('checkout/form-coupon');?>
	</div>
</div>
<?php endif; ?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col2-set" id="customer_details">
			<div class="col-1" style="margin-bottom: 2em;">

				<!-- <h3 style="margin-bottom: 10px;">Faturamento</h3> -->

				<?php if (!wc_coupons_enabled()) : get_template_part('inc/aviso-checkout'); endif; ?>
				

				<?php /*if (wc_coupons_enabled()): ?>
					<p style="margin: -1em 0 3em; font-size:.9em; color:var(--cor-afirmacao)"><strong><em>Tem cupom de desconto?</em></strong>  <a href="<?php echo wc_get_page_permalink('cart'); ?>" style="color:inherit">Clique aqui e adicione seu cupom no carrinho.</a></p>
				<?php endif;*/ ?>
				
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>

				<?php get_template_part('inc/aviso-checkout'); ?>
			</div>

			<div class="col-2">

				<div style="display:flex;justify-content:space-between;align-items:flex-start; margin-bottom: 10px;">
					<h3 style="flex-grow:1">Pedido</h3>
					<a href="<?php echo wc_get_page_permalink('cart'); ?>" class="button mini"><i class="fa fa-shopping-cart"></i> &nbsp;carrinho</a>&nbsp;&nbsp;
					<a href="<?php echo wc_get_page_permalink('shop'); ?>" class="button mini">ir à loja</a>
				</div>

				<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
				<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

				<div id="order_review" class="woocommerce-checkout-review-order">
					<?php do_action( 'woocommerce_checkout_order_review' ); ?>
				</div>

				<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>


	<?php endif; ?>
	


</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
