<?php
/**
 * View Order
 *
 * Shows the details of a particular order on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/view-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

defined( 'ABSPATH' ) || exit;

$notes = $order->get_customer_order_notes();
?>
<p style="margin-bottom:1em;">
<?php
printf(
	/* translators: 1: order number 2: order date 3: order status */
	esc_html( 'Pedido #%1$s feito em %2$s - %3$s',),
	'<mark class="order-number">' . $order->get_order_number() . '</mark>', // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	'<mark class="order-date">' . date("d/m/Y", strtotime($order->get_date_created())) . '</mark>', // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	'<mark class="order-status"><span class="afc-pedido-status '.$order->get_status().'" style="text-transform:uppercase">' . wc_get_order_status_name( $order->get_status() ) . '</span></mark>' // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
);
$NFSE = get_field('pedido_nfse', $order_id);

$compare_date = strtotime( "2021-11-13" );
$order_date   = strtotime($order->get_date_created());

?>
</p>

<?php 
if ( $order_date >= $compare_date && empty($NFSE['arquivo'] && $NFSE['identificador']) ) { 
	echo '<p style="color:var(--cor-negacao); margin-bottom:3em;"><i class="fal fa-info-circle"></i> <strong>Nota fiscal na fila de emissão.</strong><br><small>Caso tenha urgência na emissão, por favor, entre em contato.</small></p>';
} 


if($NFSE['arquivo'] && $NFSE['identificador']) {
	$CPF = get_post_meta( $order_id, '_billing_cpf', true );
	$CNPJ = get_post_meta( $order_id, '_billing_cnpj', true );
	echo '<section class="woocommerce-order-downloads">';
		echo '<h2>Nota fiscal de serviço eletrônica</h2>';
		echo '<table style="margin-bottom:10px" class="woocommerce-table shop_table shop_table_responsive order_details">';
				echo '<thead>';
					echo '<tr>';
						echo '<th><span class="nobr">Código de verificacao *</span></th>';
						if($CPF || $CNPJ) echo '<th><span class="nobr">Tomador da nota</span></th>';
						echo '<th><span class="nobr">Documento NFSe</span></th>';
					echo '</tr>';
				echo '</thead>';

				echo '<tbody>';
					echo '<tr>';
						echo '<td style="text-transform:uppercase">'.$NFSE['identificador'].'</td>';
						
						if($CPF || $CNPJ) echo '<td style="text-transform:uppercase">'.($CPF ? 'CPF '.$CPF : '').($CNPJ ? 'CNPJ '.$CNPJ : '').'</td>';
						echo '<td><a href="'.esc_url($NFSE['arquivo']).'" class="button azul mini" download><i class="far fa-long-arrow-down" style="font-size: 1.2em; line-height: 0; position: relative; bottom: -1px;" aria-hidden="true"></i> Baixar em .PDF</a></td>';
					echo '</tr>';
				echo '</tbody>';
		echo '</table>';
		echo '<p style="font-size:12px">* NFSe emitida pelo município de Goiânia - GO. Informações sobre autenticidade podem ser obtidas pelo <a href="http://www2.goiania.go.gov.br/sistemas/snfse/asp/snfse00210f0.asp" target="_blank">site da prefeitura</a>.</p>';
	echo '</section>';
} 

 do_action( 'woocommerce_view_order', $order_id );

 if ( $notes ) : ?>
	<section class="woocommerce-order-downloads">
	<h2>Histórico de anotações do pedido</h2>
	<ol class="woocommerce-OrderUpdates commentlist notes" style="border: 1px solid rgba(0,0,0,.1); border-bottom-width: 1px; border-right-width: 2px; border-radius: 5px; margin-bottom: 2em">
		<?php foreach ( $notes as $note ) : ?>
		<li class="woocommerce-OrderUpdate comment note" style="padding: 6px 12px; border-bottom: 1px solid rgba(0,0,0,.1);">
			<div class="woocommerce-OrderUpdate-inner comment_container">
				<div class="woocommerce-OrderUpdate-text comment-text">
					<p class="woocommerce-OrderUpdate-meta meta">Em <?php echo date_i18n( esc_html__( 'd/m/Y, h:ia', 'woocommerce' ), strtotime( $note->comment_date ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
					<div class="woocommerce-OrderUpdate-description description">
						<?php echo wpautop( wptexturize( $note->comment_content ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
		</li>
		<?php endforeach; ?>
	</ol>
	</section>
<?php endif; 

