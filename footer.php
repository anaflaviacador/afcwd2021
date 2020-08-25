<?php  
$urlHome = esc_url(home_url('/'));

// ========================================//
// DEPOIMENTOS
// ========================================// 
if (! is_post_type_archive('afc_depoimentos') && ! is_singular('etheme_portfolio') && ! is_page('contato')) {
	echo '<section id="depoimentos-incriveis" class="no-rodape">';
		echo '<div class="container">';
			echo '<span class="gutter-sizer"></span><span class="grid-sizer"></span>';

			echo '<div class="depoimento"><div class="intro">';
				echo '<h2 class="cursivo assinado">Clientes</h2>';
				echo '<p><strong>Depoimentos</strong> de clientes que tiraram seus projetos do papel e permitiram que o studio <span class="afc">'; echo get_template_part('img/afc'); echo '</span> os tornassem <strong>reais</strong>!</p>';
				echo '<p><a href="'.$urlHome.'depoimentos" class="button verde mini">+ depoimentos</a></p>';
			echo '</div></div>';

			$numDepo = '';
			if (is_front_page()) { $numDepo = 8; } else { $numDepo = 3; }
			afc_depoimentos($numDepo);
		echo '</div>';


		echo '<p data-aos="zoom-in" class="has-text-align-center cta"><a href="'.$urlHome.'contato" class="button rosa medio">Peça seu orçamento</a></p>';
	echo '</section>';
}



// ========================================//
// RODAPE 
// ========================================// 

echo '<footer id="rodape"'.(is_post_type_archive('afc_depoimentos') || is_singular('etheme_portfolio') || is_page('contato') ? ' style="margin-top:5em"' : '').'>';
	echo '<nav class="menu-site" aria-label="Navegação do rodapé do site">';
		echo '<ul id="navegacao" role="navigation">';
			afc_menu('primary');
		echo '</ul>';
	echo '</nav>';

	echo '<div class="copyright">';
		echo '<div class="container">';
			echo '<div>&copy; 2020 - CNPJ 24.014.911/0001-36<span>&nbsp;&nbsp;|</span><a href="#privacidade" data-target="#privacidade" class="abre-modal">Política de Privacidade</a></div>';

			echo '<div>';
				echo '<a target="_blank" title="Instagram" href="https://www.instagram.com/anaflaviacador"><i class="fab fa-instagram" aria-hidden="true"></i></a>';
				echo '<a target="_blank" title="Facebook" href="https://facebook.com/afcweb.design"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>';
				echo '<a target="_blank" title="Whatsapp" href="https://api.whatsapp.com/send?phone=5562996269941"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
echo '</footer>';

echo '</main>';


// politica de privacidade
$politicapg = get_option( 'wp_page_for_privacy_policy' );
echo '<div class="modal" id="privacidade" aria-label="'.get_the_title($politicapg).'">'; 
	$mypost = get_post($politicapg);
	echo '<article>'.apply_filters('the_content',$mypost->post_content).'</article>';
echo '</div>'; 


get_template_part('inc/whatsapp');

wp_footer(); // scripts e tudo mais

echo '</body>';
echo '</html>';