<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);

$clienteloja = array('customer','administrator');
$clientevip = array('cliente_vip','administrator');

echo '<article>';

	/* translators: 1: user display name 2: logout url */
	// printf(
	// 	wp_kses( __( '<p>Oi, %1$s, tudo bem? (<a href="%2$s">Sair</a>)</p><br>', 'woocommerce' ), $allowed_html ),
	// 	'<strong>' . esc_html( $current_user->user_firstname ) . '</strong>',
	// 	esc_url( wc_logout_url() )
	// );
	printf(
		wp_kses_post( __( '<h5 class="cursivo has-text-align-center" style="text-transform: none;">Bem-vinda, %1$s</h5><br>', 'woocommerce' ), $allowed_html ),
		 esc_html( $current_user->user_firstname ) 
		// esc_url( wc_logout_url() )
	);


	if ( array_intersect($clienteloja, $current_user->roles )) :
		printf(
		__( '<p>Nesta área você poderá acessar <a href="%1$s">suas compras recentes</a>, gerenciar seus <a href="%2$s">dados pessoais</a>, e <a href="%3$s">baixar seus arquivos</a> adquiridos na loja.</p>'),
		esc_url( wc_get_endpoint_url( 'orders' ) ),
		esc_url( wc_get_endpoint_url( 'edit-account' ) ),
		esc_url( wc_get_endpoint_url( 'downloads' ) )
	); endif;
	if ( array_intersect($clientevip, $current_user->roles )) :
		printf(
		__( '<p>Nesta área privada você poderá poderá editar seu <a href="%2$s">perfil</a> e <a href="%3$s">preencher seu formulário de briefing</a>. No decorrer de nosso projeto estarão anexados neste painel seus <a href="%1$s">principais arquivos para download</a>, como: documento de contrato, artes finais (banners de mídias sociais), o seu tema, nota fiscal etc.</p>'),
		get_home_url() . '/minha-conta/docs/'.$current_user->user_login,
		esc_url( wc_get_endpoint_url( 'edit-account' ) ),
		get_home_url() . '/minha-conta/briefing'
	); 
	endif;
	// echo '<br><hr><p><strong>Mantenha seu Wordpress atualizado!</strong> Ele é uma plataforma de software livre, com diversas pessoas trabalhando incansavelmente para melhorar o sistema com inovações e reforçando a segurança. Um sistema antigo abre portas para vulnerabilidades (ataques de vírus e/ou malwares) além de sobrecarga desnecessária de seu plano de hospedagem. Lembre-se: <em>uma versão nunca é lançada à toa, o que significa que algo não estava ocorrendo bem antes</em>.</p>';

	echo '<br><p class="has-text-align-center">Está a fim de uma manutenção mensal para nunca mais ter dor de cabeça?</p>';
	echo '<p class="has-text-align-center"><a href="https://afcweb.design/servicos/planos" target="_blank" class="button">Ver planos disponíveis</a></p>';


	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
echo '</article>';