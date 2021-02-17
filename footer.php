<?php  
$urlHome = esc_url(home_url('/'));

// ========================================//
// DEPOIMENTOS
// ========================================// 
// if ((! is_post_type_archive('afc_depoimentos') && ! is_singular('private-page') && ! is_singular('etheme_portfolio') && ! is_page('contato') && ! is_page('briefing') && ! is_page('afiliacao') && ! is_page('planos')) && afc_nao_woocommerce()) {


if (is_front_page() || is_post_type_archive(array('etheme_portfolio')) || is_page(array('servicos','sobre')) || is_singular('afc_blog')) {

	echo '<section id="depoimentos-incriveis" class="no-rodape">';
		echo '<div class="container">';
			echo '<span class="gutter-sizer"></span><span class="grid-sizer"></span>';

			echo '<div class="depoimento"><div class="intro">';
				echo '<h2 class="cursivo assinado">Clientes</h2>';
				echo '<p><strong>Depoimentos</strong> de clientes que tiraram seus projetos do papel e permitiram que o studio <span class="afc">'; echo get_template_part('img/afc'); echo '</span> os tornassem <strong>reais</strong>!</p>';
				echo '<p><a href="'.$urlHome.'depoimentos" class="button verde mini">+ depoimentos</a></p>';
			echo '</div></div>';

			$numDepo = '';
			if (is_front_page()) { $numDepo = 8; } else { $numDepo = 5; }
			afc_depoimentos($numDepo);
		echo '</div>';


		echo '<p data-aos="zoom-in" class="has-text-align-center cta"><a href="'.$urlHome.'contato" class="button rosa medio">Peça seu orçamento</a> <br> <a href="#faq" data-target="#faq" class="abre-modal"><small>Dúvidas? Veja o F.A.Q. do studio.</small></a></p>';
	echo '</section>';
}



// ========================================//
// RODAPE 
// ========================================// 

echo '<footer id="rodape"'.((is_single() && ! is_singular('afc_blog')) || is_page(array('contato','briefing','planos','inscricao-afiliadas')) || (is_archive() && ! is_post_type_archive(array('etheme_portfolio','afc_depoimentos'))) || afc_woocommerce() ? ' style="margin-top:5em;float:left;clear:both;"' : '').'>';
	echo '<nav class="menu-site" aria-label="Navegação do rodapé do site">';
		echo '<ul id="navegacao" role="navigation">';
			afc_menu('footer');
		echo '</ul>';
	echo '</nav>';

	echo '<div class="copyright">';
		echo '<div class="container">';
			echo '<div><img width="16px" src="'.get_stylesheet_directory_uri().'/img/flag-brasil.svg" style="vertical-align: middle;margin-right: 7px;position: relative;top: -1px;" /> <strong>AFC Web Design</strong><span>&nbsp;&nbsp;|</span><a href="#privacidade" data-target="#privacidade" class="abre-modal">Política de Privacidade</a></div>';

			echo '<div>';
				echo '<a target="_blank" title="Instagram" href="https://www.instagram.com/anaflaviacador"><i class="fab fa-instagram" aria-hidden="true"></i></a>';
				echo '<a target="_blank" title="Pinterest" href="https://br.pinterest.com/afcwebdesign"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>';
				echo '<a target="_blank" title="Facebook" href="https://facebook.com/afcweb.design"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>';
				echo '<a target="_blank" title="Whatsapp" href="https://api.whatsapp.com/send?phone=5562996269941"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
echo '</footer>';

echo '</main>';


// politica de privacidade
$politicaID = get_option( 'wp_page_for_privacy_policy' );
echo '<div class="modal" id="privacidade" aria-label="'.get_the_title($politicaID).'">'; 
	$politicaPG = get_post($politicaID);
	echo '<h2 class="has-text-align-center">Política de Privacidade</h2>';
	echo '<article>'.apply_filters('the_content',$politicaPG->post_content).'</article>';
echo '</div>'; 

// perguntas frequentes
echo '<div class="modal" id="faq" aria-label="Perguntas frequentes">';
	echo '<h2 class="has-text-align-center">Perguntas Frequentes</h2>';
	echo '<article>'; get_template_part('modais/faq'); echo '</article>'; 
echo '</div>'; 

if(!is_page('contato') && ! is_page('planos') && ! is_user_logged_in()) {
	get_template_part('inc/popup');
}

get_template_part('inc/whatsapp');

wp_footer(); // scripts e tudo mais

echo '</body>';
echo '</html>';