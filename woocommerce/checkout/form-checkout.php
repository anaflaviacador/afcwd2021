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
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col2-set" id="customer_details">

			<div class="col-1" style="margin-bottom: 2em;">

				<div style="display:flex;justify-content:space-between;align-items:flex-start;">
					<h3>Pedido</h3>
					<a href="<?php echo wc_get_page_permalink('cart'); ?>" class="button mini"><i class="fa fa-shopping-cart"></i> Rever carrinho</a>
				</div>

				<?php echo wc_get_template( 'checkout/review-order.php' ); ?>

				<?php if (wc_coupons_enabled()): ?>
					<p style="margin: -1em 0 3em; font-size:.9em; color:var(--cor-afirmacao)"><strong><em>Tem cupom de desconto?</em></strong>  <a href="<?php echo wc_get_page_permalink('cart'); ?>" style="color:inherit">Clique aqui e adicione seu cupom no carrinho.</a></p>
				<?php endif; ?>
				

				<?php do_action( 'woocommerce_checkout_billing' ); ?>
				
			</div>

			<div class="col-2">
				<?php get_template_part('inc/aviso-checkout'); ?>

				<?php do_action( 'woocommerce_checkout_shipping' ); ?>

				<h3>Forma de pagamento</h3>
				<?php echo wc_get_template( 'checkout/payment.php' ); ?>

			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>
	


</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
