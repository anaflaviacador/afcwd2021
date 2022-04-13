<?php  
$urlHome = esc_url(home_url('/'));
$urlTema = get_template_directory_uri();

// ========================================//
// DEPOIMENTOS
// ========================================// 
// if ((! is_post_type_archive('afc_depoimentos') && ! is_singular('private-page') && ! is_singular('etheme_portfolio') && ! is_page('contato') && ! is_page('briefing') && ! is_page('afiliacao') && ! is_page('planos')) && afc_nao_woocommerce()) {

global $product;
$ativa_LP = get_field('ativar_lp',$product->get_ID());

if (is_front_page() || is_post_type_archive(array('etheme_portfolio')) || (is_singular('product') && $ativa_LP == true) || is_page(array('servicos','sobre')) || is_singular('afc_blog')) {

	echo '<section id="depoimentos-incriveis" class="no-rodape">';
		echo '<div class="container">';
			echo '<span class="gutter-sizer"></span><span class="grid-sizer"></span>';


			echo '<div class="depoimento"><div class="intro">';
				echo '<h2 class="cursivo assinado">Clientes</h2>';
				if (is_singular('product') && $ativa_LP == true) {
					echo '<p><strong>Depoimentos</strong> de quem comprou um tema da loja <span class="afc">'; echo get_template_part('img/afc'); echo '</span></p>';
				} else {
					echo '<p><strong>Depoimentos</strong> de clientes que tiraram seus projetos do papel e permitiram que o studio <span class="afc">'; echo get_template_part('img/afc'); echo '</span> os tornassem <strong>reais</strong>!</p>';
				}
				echo '<p><a href="'.$urlHome.'depoimentos" class="button verde mini">+ depoimentos</a></p>';
			echo '</div></div>';

			$numDepo = '';
			$taxDepo = '';
			if (is_singular('product') && $ativa_LP == true) $taxDepo = 'template-aurora';
			if (is_front_page()) { $numDepo = 8; } else { $numDepo = 5; }
			afc_depoimentos($numDepo,$taxDepo);
		echo '</div>';


		if (!is_singular('product')) echo '<p data-aos="zoom-in" class="has-text-align-center cta"><a href="'.$urlHome.'contato" class="button rosa medio">Peça seu orçamento</a> <br> <a href="#faq" data-target="#faq" class="abre-modal"><small>Dúvidas? Veja o F.A.Q. do studio.</small></a></p>';
	echo '</section>';
}



// ========================================//
// RODAPE 
// ========================================// 
$temaurl = get_stylesheet_directory_uri();

echo '<footer id="rodape"'.(is_front_page() || is_post_type_archive(array('etheme_portfolio','afc_depoimentos')) || (is_singular('product') && $ativa_LP == true) || is_page(array('servicos','sobre')) || is_singular('afc_blog') ? ' style="margin-top:0em;"' : '').'>';
	echo '<nav class="menu-site" aria-label="Navegação do rodapé do site">';
		echo '<ul id="navegacao">';
			afc_menu('footer');
		echo '</ul>';
	echo '</nav>';

	echo '<div class="copyright">';
		echo '<div class="container">';
			echo '<div aria-label="Meios de pagamento aceitos">';
				// echo '<span style="display: inline-block !important;" data-tooltip="Aceitamos pagamentos nacionais e internacionais com cartão de crédito!"><img alt="Bandeiras Master, Visa, Elo, American Express, Hiper, JBC e mais" style="width:auto;height:18px" src="'.$temaurl.'/img/cartoes-juno.svg" /></span>';
				// echo '<span style="display: inline-block !important;" data-tooltip="Pagamentos com Pix são processados na hora!"><img alt="Pix" style="width:auto;height:18px;margin-left:8px;" src="'.$temaurl.'/img/logo-pix-gateway.svg" /></span>';
				// echo '<span style="display: inline-block !important;" data-tooltip="Pagamentos com Boleto são processados em até 1 dia útil."><img alt="Boleto" style="width:auto;height:18px;margin-left:10px;" src="'.$temaurl.'/img/logo-boleto.svg" /></span>';
				// echo '<span style="display: inline-block !important;" data-tooltip="Aceitamos pagamentos internacionais com Paypal!"><img alt="Paypal" style="width:auto;height:18px;margin-left:8px;" src="'.$temaurl.'/img/logo-paypal.svg" /></span>';
				echo '<span style="display: inline-block !important;" data-tooltip="Aceitamos pagamentos nacionais e internacionais!"><img style="width:auto;max-width:100%;height:21px;" src="'.$urlTema.'/img/lp/formas-pgto-dark.svg" alt="Pagamento com cartão de crédito, pix, boleto e paypal.">';
			echo '</div>';

			echo '<div>';
				echo '<a href="https://transparencyreport.google.com/safe-browsing/search?url=afcweb.design" target="_blank" rel="nofollow noopener" data-tooltip="Transações 100% seguras e criptografadas via SSL!" style="display:block"><img style="width:auto;height:35px" src="'.$temaurl.'/img/logo-googlesecurity.svg" alt="Navegação segura do Google" /></a>';
			echo '</div>';
		echo '</div>';

		echo '<div class="container">';
			echo '<div>'.date('Y').' &copy; <strong>Ana Flávia Cador</strong> - Todos os direitos reservados &nbsp;&nbsp;<span> CNPJ 24.014.911/0001-36</span>';
			echo '</div>';

			$politicaID = get_option( 'wp_page_for_privacy_policy' );
			$termsID = wc_terms_and_conditions_page_id();
			echo '<div>';
				echo '<a href="'.get_permalink($politicaID).'">Política de Privacidade</a>';
				if (class_exists('Woocommerce')) echo '&nbsp;&nbsp;& &nbsp;<a href="'.get_permalink($termsID).'">Termos de Uso</a>';
			echo '</div>';

		echo '</div>';

		
	echo '</div>';
echo '</footer>';

echo '</main>';


// perguntas frequentes
echo '<div class="modal" id="faq" aria-label="Perguntas frequentes">';
	echo '<h2 class="has-text-align-center">Perguntas Frequentes</h2>';
	echo '<article>'; get_template_part('modais/faq'); echo '</article>'; 
echo '</div>'; 

// $agora = strtotime(date('Y-m-d'));
// $fimBF = strtotime('2021-11-26');
// if($agora <= $fimBF && !is_user_logged_in()) get_template_part('inc/popup');

get_template_part('inc/whatsapp'); // whats

wp_footer(); // scripts e tudo mais

echo '</body>';
echo '</html>';