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

if (! is_user_logged_in()) { echo '<div id="afc-msg-login">'; do_action( 'woocommerce_before_customer_login_form' ); echo '</div>'; }

	echo '<header id="cabecalho">';
		echo '<div class="nav-mini container">';
			echo '<div class="menu-mob" aria-label="Menu de navegação. Clique para mostrar.">';
				echo '<a href="#" id="menu-mob"><i class="fas fa-stream"></i></a>';
			echo '</div>';

			if (class_exists('Woocommerce')) { 
			    if (is_user_logged_in()) {
					$pgAoLogar = '';
					$pgConta = wc_get_page_permalink( 'myaccount' );
				    $pgAdmin = admin_url();
				    
				    $user = wp_get_current_user();
				    $role = $user->roles[0];
					if( $role == 'administrator' ) {
				        $pgAoLogar = $pgAdmin;
				    } else {
				        $pgAoLogar = $pgConta;
				    }	
			    }

				$numItensCarrinho = WC()->cart->get_cart_contents_count();
				$pgCarrinho = wc_get_page_permalink( 'cart' );
				$pgSair = esc_url(wc_logout_url());

				echo '<div class="menu-loja" aria-label="Menu de navegação para clientes do studio.">';
					echo '<a'.(!is_user_logged_in() ? ' href="#login" class="conta abre-modal" data-target="#login" title="Logar na conta de cliente"' : ' href="'.$pgAoLogar.'" class="conta" title="Conta de cliente"').'>';
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
			echo '<ul id="navegacao" role="navigation">';
				afc_menu('primary');
			echo '</ul>';
		echo '</nav>';
	echo '</header>';

if (! is_user_logged_in()) { 
	echo '<div class="modal pequeno floral" id="login" aria-label="Área de login do cliente">'; get_template_part('modais/login'); echo '</div>';
	do_action( 'woocommerce_after_customer_login_form' );
}	