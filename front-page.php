<?php get_header(); 
$urlHome = esc_url(home_url('/'));
$urlTema = get_template_directory_uri();

// ========================================//
// CHAMADA PRINCIPAL
// ========================================// 
echo '<section id="chamada-principal" aria-label="Área de apresentação da empresa, com imagem de fundo fotografada por cima de uma mulher em uma escrivaninha de frente a uma tela de notebook trabalhando" style="background-image: url('.$urlTema.'/img/foto-oficial.jpg);">';
	echo '<div class="gradiente" aria-hidden="true"></div>';

	// titulo da pagina inicial
	echo '<h1 data-aos="fade-down">';
		echo 'Tire o seu projeto do papel e <br>tenha &nbsp;';
		echo '<span class="foco" id="foco-frase" aria-label="o site, o blog ou a loja virtual"></span>';
		echo ' que você <br>sempre sonhou.';
	echo '</h1>';


	echo '<div class="container">';

		// mockup
		echo '<div class="mockup" data-aos="fade-right" data-aos-delay="200">';
			echo '<picture role="img" aria-label="Tela de vários dispositivos demonstrando projeto de webiste responsivo">';
			    echo '<source srcset="'.$urlTema.'/img/mockup1.png" media="(-webkit-min-device-pixel-ratio: 1) and (max-resolution: 191dpi)">';
			    echo '<source srcset="'.$urlTema.'/img/mockup1@2x.png" media="(-webkit-min-device-pixel-ratio: 2) and (min-resolution: 192dpi)">';
			    echo '<img srcset="'.$urlTema.'/img/mockup1.png">';
			echo '</picture>';
			echo '<a href="/" class="ver">Projeto <strong>A Casa Delas</strong></a>';
		echo '</div>';

		// apresentacao
		echo '<div class="apresentacao" data-aos="fade-left" data-aos-delay="400">';
				echo '<a href="'.$urlHome.'sobre" title="Conheça a designer" class="foto">';
					echo '<picture role="img" aria-label="Mulher morena por volta de 30 anos, de cabelos escuros até altura dos ombros sorrindo para câmera, vestida com um vestido bege de alças finas">';

					// telas dekstop
				    echo '<source srcset="'.$urlTema.'/img/anaflaviacador-150.png" media="(min-width: 991px) and (-webkit-min-device-pixel-ratio: 1) and (max-resolution: 191dpi)">';
				    echo '<source srcset="'.$urlTema.'/img/anaflaviacador-300.png" media="(min-width: 991px) and (-webkit-min-device-pixel-ratio: 2) and (min-resolution: 192dpi)">';

				    // tablets
				    echo '<source srcset="'.$urlTema.'/img/anaflaviacador-250.png" media="(min-width: 681px) and (max-width: 990px) and (-webkit-min-device-pixel-ratio: 1) and (max-resolution: 191dpi)">';
				    echo '<source srcset="'.$urlTema.'/img/anaflaviacador-500.png" media="(min-width: 681px) and (max-width: 990px) and (-webkit-min-device-pixel-ratio: 2) and (min-resolution: 192dpi)">';
				    
				    // celulares
				    echo '<source srcset="'.$urlTema.'/img/anaflaviacador-200.png" media="(max-width: 680px) and (-webkit-min-device-pixel-ratio: 1) and (max-resolution: 191dpi)">';
				    echo '<source srcset="'.$urlTema.'/img/anaflaviacador-400.png" media="(max-width: 680px) and (-webkit-min-device-pixel-ratio: 2) and (min-resolution: 192dpi)">';
				    
				    // fallback
				    echo '<img srcset="'.$urlTema.'/img/anaflaviacador-300.png">';
				echo '</picture>';
				echo '<h2 lang="en" class="ola cursivo">hello</h2>';
			echo '</a>';

			echo '<summary>';
				echo '<p>Aqui é a Ana, a designer que toca o studio <span class="afc">'; echo get_template_part('img/afc'); echo '.</span> Desde 2007 realizo sonhos de <em>blogueiras</em>, <em>influencers</em> e <em>empreendedoras</em> projetando blogs, websites, lojas virtuais e ferramentas através de um  <strong class="rosa">design único</strong>, <strong class="verde">inteligente</strong>, com <strong class="roxo">personalidade</strong> e <strong class="bege">propósito</strong>.</p>';
				echo '<p><a href="'.$urlHome.'servicos" class="button pequeno">Conheça o meu trabalho</a></p>';
			echo '</summary>';
		echo '</div>';
	echo '</div>';

echo '</section>';



// ========================================//
// PROJETOS
// ========================================// 
$tax = array('taxonomy' => 'categories', 'field' => 'slug', 'terms' => 'destaque');
$args = array('post_type' => 'etheme_portfolio', 'order' => 'DESC', 'posts_per_page' => 6, 'tax_query' => array($tax));

$publicacoes = new WP_Query($args);
if ( $publicacoes->have_posts() ) { $i = 0;
	echo '<section class="container" id="projetos-principais"><h2 class="cursivo assinado">Projetos</h2><div class="lista-posts"><ul>';
	while ( $publicacoes->have_posts() ) : $i++; $publicacoes->the_post(); 
		echo '<li itemscope itemtype="http://schema.org/CreativeWork"';
			if ($i == 1 ) { echo ' data-aos="fade-right"';}
			elseif ($i == 2 ) { echo ' data-aos="fade-up"';}
			elseif ($i == 3 ) { echo ' data-aos="fade-left"';}
		echo ' class="projeto-'.$i.' mostra-projeto">';
			afc_projeto('large');
		echo '</li>';
	endwhile;
	echo '</ul></div><div class="bt"><a href="'.$urlHome.'projetos" class="vermais">+ projetos</a></div></section>';
}
	



// ========================================//
// BENEFICIOS
// ========================================//
echo '<section class="container" id="beneficios">';
	echo '<div data-aos="fade-right">';
		echo '<article>';
			echo '<p>O studio faz <strong>projetos completos</strong> de design e programação para <strong>plataforma Wordpress</strong> com <em>código 100% autoral</em>, limpo, acessível, durável e altamente otimizado.</p>';
			echo '<p>São produzidas <strong>ferramentas únicas</strong> para você <strong>automatizar tarefas</strong> em seu site, integrando com redes sociais e montando seu conteúdo com <em>praticidade</em> e <em>agilidade</em>.</p>';
		echo '</article>';
		echo '<h2 class="cursivo">Resultado</h2>';
	echo '</div>';

	echo '<div data-aos="fade-left" data-aos-delay="1200">';
		echo '<h2 class="cursivo">Leveza <span>+ eficiência</span></h2>';
		echo '<article>';
			echo '<p>Com um <em>site rápido e layout amigável</em>, você é <strong>encontrada no Google</strong> com mais facilidade, aumentando as chances de ser mais conhecia e ganhar mais <em>autoridade</em> em seu nicho. Potencialize a <strong>monetização</strong> do seu conteúdo e converta leads em <em>verdadeiros clientes</em> para seu negócio!</p>';
			echo '<p><a href="'.$urlHome.'servicos" class="button">Quero saber mais!</a></p>';
		echo '</article>';
	echo '</div>';
echo '</section>';


	
get_footer();