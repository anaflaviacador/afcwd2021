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

echo '<main>';

if (! is_user_logged_in()) { echo '<div id="afc-msg-login">'; do_action( 'woocommerce_before_customer_login_form' ); echo '</div>'; }

	echo '<header id="cabecalho">';
		echo '<div class="nav-mini container">';
			echo '<div>&nbsp;</div>';

			if (class_exists('Woocommerce')) { 
				$pgConta = wc_get_page_permalink( 'myaccount' );
				$numItensCarrinho = WC()->cart->get_cart_contents_count();
				$pgCarrinho = wc_get_page_permalink( 'cart' );
				$pgSair = esc_url(wc_logout_url());

				echo '<div class="menu-loja">';
					echo '<a'.(!is_user_logged_in() ? ' href="#login" class="conta abre-modal" data-target="#login"' : ' href="'.$pgConta.'" class="conta"').'>';
						echo '<i class="fas fa-user-lock"></i><span>';
						if (is_user_logged_in()) { echo ' Meu painel'; } else { echo ' Logar';}
					echo '</span></a>';

					if ($numItensCarrinho >= 1) {
						echo '<a href="'.$pgCarrinho.'" class="carrinho"><i class="fas fa-shopping-cart"></i>';
							echo '<span> '.sprintf( _n( '%d', '%d', $numItensCarrinho ), $numItensCarrinho).'</span>';
						echo '</a>';
					}
				echo '</div>';
			}
		echo '</div>';
	echo '</header>';

if (! is_user_logged_in()) { 
	echo '<div class="modal pequeno floral" id="login">'; get_template_part('modais/login'); echo '</div>';
	do_action( 'woocommerce_after_customer_login_form' );
}	