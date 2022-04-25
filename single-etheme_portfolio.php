<?php get_header(); 
		
if (have_posts()) {
	while (have_posts()) : the_post();

	$imagemExtra = get_field('imagem_extra');
	$titulo = get_the_title();
	$terms = wp_get_post_terms($post->ID, 'tag');

	echo '<header class="info-projeto container">';
		echo '<div class="gradiente"></div>';

		if($imagemExtra){
			echo '<figure data-aos="fade-right">';
				echo '<img src="'.$imagemExtra['sizes']['large'].'" alt="'.$titulo.'" data-pin-nopin="true">';
			echo '</figure>';
		}

		echo '<summary data-aos="fade-left">';
			echo '<hgroup>';
				echo '<h1>'.$titulo.'</h1>';
				if ($terms) { $out = array();
				  echo '<h2 class="cursivo">';
					  foreach ($terms as $term) { $out[] = $term->name; }
					  echo join( ' + ', $out );
				  echo '</h2>';
				}				
			echo '</hgroup>';

			the_excerpt();
		echo '</summary>';
	echo '</header>';


	echo '<article class="detalhes-projeto" data-aos="fade-up">';
		echo '<div class="info">';

			$front = get_field('info_proj_front');
			$back = get_field('info_proj_back');
			$coautoria = get_field('info_proj_coautoria');
			$programacao = get_field('info_proj_programacao');
			$layout = get_field('info_proj_layout');
			$impresso = get_field('info_proj_impresso');
			$ilustracao = get_field('info_proj_ilustracao');
			$idvisual = get_field('info_proj_idvisual');
			$fotografia = get_field('info_proj_fotografia');
			$lettering = get_field('info_proj_lettering');
			$audiovisual = get_field('info_proj_audiovisual');
			$animacao = get_field('info_proj_animacao');
			$online = get_field('info_proj_online');

			echo '<div>';

				if($front || $back || $coautoria || $programacao || $layout || $impresso || $ilustracao || $idvisual || $fotografia || $lettering || $audiovisual || $animacao) {
					echo '<a href="#equipe" data-target="#equipe" class="profissionais abre-modal"><i class="far fa-user-friends" aria-hidden="true"></i> Profissionais envolvidos</a>';	

						echo '<div class="modal medio" id="equipe" aria-label="Lista de profissionais envolvidos">'; 
							echo '<h2>Profissionais envolvidos neste projeto</h2>';
							echo '<article><p>';
								if($front) { echo '<strong>Front end:</strong> '.$front.'<br />';}
								if($back) { echo '<strong>Back-end:</strong> '.$back.'<br />';}
								if($coautoria) { echo '<strong>Co-autoria:</strong> '.$coautoria.'<br />';}
								if($programacao) { echo '<strong>Programação:</strong> '.$programacao.'<br />';}
								if($layout) { echo '<strong>Composição de layout:</strong> '.$layout.'<br />';}
								if($impresso) { echo '<strong>Projeto de papelaria:</strong> '.$impresso.'<br />';}
								if($ilustracao) { echo '<strong>Ilustração:</strong> '.$ilustracao.'<br />';}
								if($idvisual) { echo '<strong>Criação de marca:</strong> '.$idvisual.'<br />';}
								if($fotografia) { echo '<strong>Fotografia:</strong> '.$fotografia.'<br />';}
								if($lettering) { echo '<strong>Lettering:</strong> '.$lettering.'<br />';}
								if($audiovisual) { echo '<strong>Projeto audiovisual:</strong> '.$audiovisual.'<br />';}
								if($animacao) { echo '<strong>Animações:</strong> '.$animacao.'<br />';}
							echo '</p>';

							if ($coautoria || $front || $back) {
								echo '<hr class="simples" />';
							}

							if($coautoria) { echo '<p class="obs"><strong>Co-autoria</strong> significa que a minha tarefa executada neste projeto foi em conjunto com outro profissional, seja nas concepções de ideias ou aplicações práticas.</small>';}
							if($front) { echo '<p class="obs"><strong>Front-end</strong> é apenas a parte visual da fase de programação, responsável pelo  HTML e CSS de um layout. É onde cria-se os estilos e determina a estrutura dos elementos &mdash; enquanto a parte dinâmica, também chamada de back-end, que são as "engrenagens" que faz um layout funcionar e ser compatível à plataforma Wordpress é realizada pelo studio.</small>';}
							if ($back) { echo '<p class="obs"><strong>Back-end</strong> é a parte responsável do código que faz o layout tornar-se um legítimo "tema Wordpress", com todas as funcionalidades rodando em pleno vapor. Utilizando a linguagem de programação PHP, é nesta fase que o layout passa a ser dinâmico e customizável pelo cliente via painel de controle, conectando-se com o servidor e atualizando-se automaticamente na medida que vai se inserindo conteúdo. Quando é assim caso, o studio fica apenas responsável pela programação da parte visual (HTML e CSS), também chamada de front-end, trazendo a base da estrutura dos elementos visuais de um projeto para receber a programação mais avançada posteriormente.</small>';
							}
							echo '</article>';
						echo '</div>';
				}

				echo '<h2 class="cursivo'.($online ? ' ver' : '').'">Mais detalhes</h2>';
			echo '</div>';


			if($online) {echo '<div class="online"><a href="'.$online.'" class="button pequeno" target="_blank" rel="nofollow noopened">ver online</a></div>';}
		echo '</div>';

		the_content();	
	echo '</article>';	

	endwhile;
}
	
// ========================================//
// CHAMADA ORCAMENTO
// ========================================// 
$urlHome = esc_url(home_url('/'));
echo '<section class="chamada-orcamento pag-projeto">';
	echo '<div class="wrap" data-aos="fade-left">';
		echo '<h2 class="rosa marca-dagua">Gostou do que viu? <span aria-hidden="true">Peça seu orçamento</span></h2>';
		echo '<p><strong>Faça sua cotação</strong> e comece o planejamento de seu projeto hoje mesmo!</p>';
		echo '<p><a href="'.$urlHome.'contato" class="button rosa medio">Pedir orçamento</a> <br> <a href="#faq" data-target="#faq" class="abre-modal"><small>Dúvidas? Veja o F.A.Q. do studio.</small></a></p>';
	echo '</div>';
echo '</section>';	



// ========================================//
// PROJETOS
// ========================================// 
$args = array('post_type' => 'etheme_portfolio', 'orderby' => 'rand', 'posts_per_page' => 6);
$publicacoes = new WP_Query($args);
if ( $publicacoes->have_posts() ) { $i = 0;
	echo '<section class="container" id="projetos-principais"><h2 class="cursivo assinado">mais</h2><div class="lista-posts"><ul>';
	while ( $publicacoes->have_posts() ) : $i++; $publicacoes->the_post(); 
		echo '<li itemscope itemtype="http://schema.org/CreativeWork" data-aos="fade-up" class="projeto-'.$i.' mostra-projeto">';
			afc_projeto('large');
		echo '</li>';
	endwhile;
	echo '</ul></div></section>';
	echo '<p>&nbsp;</p>';
} wp_reset_query();

get_footer();