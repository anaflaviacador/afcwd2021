<?php  
$urlHome = esc_url(home_url('/'));

// ========================================//
// DEPOIMENTOS
// ========================================// 
if (! is_post_type_archive('afc_depoimentos')) {
	echo '<section id="depoimentos-incriveis" class="no-rodape">';
		echo '<div class="container">';
			echo '<span class="gutter-sizer"></span><span class="grid-sizer"></span>';

			echo '<div class="depoimento"><div class="intro">';
				echo '<h2 class="cursivo assinado">Clientes</h2>';
				echo '<p><strong>Depoimentos</strong> de clientes que tiraram seus projetos do papel e permitiram que o studio <span class="afc">'; echo get_template_part('img/afc'); echo '</span> os tornassem <strong>reais</strong>!</p>';
				echo '<p><a href="'.$urlHome.'experiencias" class="vermais">+ experiências</a></p>';
			echo '</div></div>';

			$numDepo = '';
			if (is_front_page()) { $numDepo = 8; } else { $numDepo = 3; }
			afc_depoimentos($numDepo);
		echo '</div>';
	echo '</section>';
}



// ========================================//
// RODAPE 
// ========================================// 
$politicapg = get_permalink( get_option( 'wp_page_for_privacy_policy' ) );
echo '<footer id="rodape">';
	echo '<nav class="menu-site" aria-label="Navegação do rodapé do site">';
		echo '<ul id="navegacao" role="navigation">';
			afc_menu('primary');
		echo '</ul>';
	echo '</nav>';

	echo '<div class="copyright">';
		echo '<div class="container">';
			echo '<div>&copy; 2020 - CNPJ 24.014.911/0001-36 &nbsp;|&nbsp; <a href="'.$politicapg.'">Política de Privacidade</a></div>';

			echo '<div>';
				echo '<a href="https://www.instagram.com/anaflaviacador"><i class="fab fa-instagram"></i></a>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
echo '</footer>';

echo '</main>';

get_template_part('inc/whatsapp');

wp_footer(); // scripts e tudo mais

echo '</body>';
echo '</html>';