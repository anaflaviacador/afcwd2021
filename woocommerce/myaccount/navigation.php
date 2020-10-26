<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
do_action( 'woocommerce_before_account_navigation' );
$user = wp_get_current_user(); 
$clienteloja = array('customer','administrator');
$clientevip = array('cliente_vip','administrator');
$username = $user->user_login;
$userid = $user->ID;
$tembriefing = count_user_posts( $userid , 'af_entry' );
$urlsite = get_bloginfo('url');

echo '<nav class="woocommerce-MyAccount-navigation">';
	echo '<div class="menu-cliente"><i class="fas fa-stream"></i> Menu da conta</div>';
	echo '<ul>';
		// if ( array_intersect($clienteloja, $user->roles )) {
		foreach ( wc_get_account_menu_items() as $endpoint => $label ) {
			echo '<li class="'.wc_get_account_menu_item_classes( $endpoint ).'">';
				echo '<a href="'.esc_url( wc_get_account_endpoint_url( $endpoint ) ).'"><span class="nome">'.esc_html( $label ).'</span></a>';
			echo '</li>';
		}
		// } 

		if( array_intersect($clientevip, $user->roles )) {
			echo '<li class="woocommerce-MyAccount-navigation-link--docs'.(is_singular('private-page')?' is-active':'').'">';
		      		echo '<a href="'.$urlsite.'/minha-conta/docs/'.$username.'"><span class="nome">Documentos</span></a>';
		    echo '</li>';
		    
		    if ($tembriefing >= 1){
		    	echo '<li class="woocommerce-MyAccount-navigation-link--briefing">';
					echo '<a href="'.$urlsite.'/wp-admin/edit.php?post_type=af_entry" target="_blank"><span class="nome">Editar briefing</span></a>';
				echo '</li>';
				echo '<li class="woocommerce-MyAccount-navigation-link--briefing-novo'.(is_page('briefing')?' is-active':'').'">';
					echo '<a href="'.$urlsite.'/minha-conta/briefing"><span class="nome">Novo Briefing</span></a>';
				echo '</li>';
		    } else {
		    	echo '<li class="woocommerce-MyAccount-navigation-link--briefing'.(is_page('briefing')?' is-active':'').'">';
					echo '<a href="'.$urlsite.'/minha-conta/briefing"><span class="nome">Briefing</span></a>';
				echo '</li>';
		    }

		}
		echo '<li class="woocommerce-MyAccount-navigation-link--customer-logout">';
			echo '<a href="'.esc_url( wc_logout_url( wc_get_page_permalink( 'myaccount' ) ) ).'"><span class="nome">Sair</span></a>';
		echo '</li>';
	echo '</ul>';
echo '</nav>';

do_action( 'woocommerce_after_account_navigation' );