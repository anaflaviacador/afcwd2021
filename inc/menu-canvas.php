<?php

echo '<div class="canvas" id="canvas-bar"><h2><span aria-hidden="true">Navegue</span>Conheça mais</h2><ul role="navigation">'; afc_menu('secondary'); echo '</ul></div>';

if (class_exists('Woocommerce')) {  
	echo '<div class="canvas" id="canvas-cliente"><h2><span aria-hidden="true">Cliente</span>Minha conta</h2>'; 
		do_action( 'woocommerce_account_navigation' );
	echo '</div>';

	if (class_exists( 'Affiliate_WP' )) {
		$status_afiliado = affwp_get_affiliate_status( affwp_get_affiliate_id() );
		$tabs = affwp_get_affiliate_area_tabs();
		$pgConta = wc_get_page_permalink( 'myaccount' );

		if ( 'active' == $status_afiliado ) {
			echo '<div class="canvas" id="canvas-afiliada"><h2><span aria-hidden="true">Afiliada</span>Minha afiliação</h2>';
				echo '<nav class="woocommerce-MyAccount-navigation">';
					echo '<ul>'; 

						if ( $tabs ) {
							foreach ( $tabs as $tab_slug => $tab_title ) :
								if ( affwp_affiliate_area_show_tab( $tab_slug ) ) {
									if ($tab_slug == 'urls') $tab_title = 'Meu link';
									if ($tab_slug == 'settings') $tab_title = 'Perfil';
									
									echo '<li class="woocommerce-MyAccount-navigation-link--'.$tab_slug.($active_tab == $tab_slug ? ' is-active' : '').'">';
										echo '<a href="'.esc_url( affwp_get_affiliate_area_page_url( $tab_slug ) ).'"><span class="nome">'.$tab_title.'</span></a>';
									echo '</li>';
								}
							endforeach;
						}
					echo '<li class="--voltarpainel"><a href="'.$pgConta.'"><span class="nome">Painel geral</span></a></li>';
					echo '</ul>';
				echo '</nav>';
			echo '</div>';
		}
	}
}