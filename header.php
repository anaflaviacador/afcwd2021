<?php 
echo '<!DOCTYPE html>';
echo '<html lang="pt-BR" dir="ltr">';
echo '<head>';
	echo '<title class="notranslate">'; 
		echo wp_title( '|', true, 'right' ); echo get_bloginfo('name');
	echo '</title>';
get_template_part('inc/metatags');
echo '</head>';
echo '<body class="'.join(' ',get_body_class()).'">';
get_template_part('inc/menu','canvas');
echo '<main>';

// $agora = strtotime(date('Y-m-d'));
// $fimBF = strtotime('2021-11-26');
// if($agora <= $fimBF) get_template_part('inc/mensagem-blackfriday');

// mensagens de erro ao logar
if (! is_user_logged_in()) { 
	echo '<div id="afc-msg-login">'; 
		if(class_exists('Woocommerce')) {
			if(!is_cart()) do_action( 'woocommerce_before_customer_login_form' );
		}
	echo '</div>';
}

// ========================================//
// CABECALHO GERAL
// ========================================// 
	echo '<'.(is_front_page() ? 'header' : 'section').' id="cabecalho">';
		echo '<div class="nav-mini container">';
			echo '<div class="menu-mob" aria-label="Menu de navegação. Clique para mostrar.">';
				echo '<a href="#" id="menu-mob" title="Menu de navegação."><i class="fas fa-stream"></i></a>';
			echo '</div>';

			if (class_exists('Woocommerce')) { 
			    if (is_user_logged_in()) {
					$pgAoLogar = wc_get_page_permalink( 'myaccount' );
			    }

				$numItensCarrinho = WC()->cart->get_cart_contents_count();
				$pgCarrinho = wc_get_page_permalink( 'cart' );

				echo '<div class="menu-loja" aria-label="Menu de navegação para clientes do studio.">';
					echo '<a'.(!is_user_logged_in() ? ' href="'.esc_url( wp_login_url( get_permalink() ) ).'" class="conta" title="Logar na conta de cliente"' : ' href="'.$pgAoLogar.'" class="conta" title="Conta de cliente"').'>';
						echo '<i class="fas fa-user-lock"></i><span>';
						if (is_user_logged_in()) { echo ' Conta'; } else { echo ' Logar';}
					echo '</span></a>';

					if ($numItensCarrinho >= 1) {
						echo '<a href="'.$pgCarrinho.'" title="Itens no carrinho" class="carrinho"><i class="fas fa-shopping-cart"></i>';
							echo '<span> '.sprintf( _n( '%d', '%d', $numItensCarrinho ), $numItensCarrinho).'</span>';
						echo '</a>';
					}
				echo '</div>';
			}
		echo '</div>';

		echo '<nav class="menu-site" aria-label="Navegação principal do site">';
			echo '<ul id="navegacao">';
				afc_menu('primary');
			echo '</ul>';
		echo '</nav>';


	echo '</'.(is_front_page() ? 'header' : 'section').'>';


// if (! is_user_logged_in()) { 
// 	echo '<div class="modal pequeno floral" id="login" aria-label="Área de login do cliente">'; get_template_part('modais/login'); echo '</div>';
// }	


// ========================================//
// TITULO DAS PAGINAS
// ========================================// 
global $post;
$ativa_LP = get_field('ativar_lp',$post->ID);

if (! is_front_page() && ! (is_product() && $ativa_LP)) { 
	get_template_part('inc/titulo','paginas');
}
