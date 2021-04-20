<?php get_header(); 
$urlHome = esc_url(home_url('/'));
$urlTema = get_template_directory_uri();

$webp = strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' );
$extensao = 'png';
$extensao2 = 'jpg';
if( $webp == true ) {$extensao = 'webp'; $extensao2 = 'webp';}

// ========================================//
// CHAMADA PRINCIPAL
// ========================================// 
echo '<section id="chamada-principal" aria-label="Área de apresentação da empresa, com imagem de fundo fotografada por cima de uma mulher em uma escrivaninha de frente a uma tela de notebook trabalhando" style="background-image: url('.$urlTema.'/img/foto-oficial.'.$extensao2.');">';
	echo '<div class="gradiente" aria-hidden="true"></div>';

	// titulo da pagina inicial
	echo '<h1 class="h1-home" data-aos="fade-down">';
		echo 'Tire o seu projeto do papel e <br>tenha &nbsp;';
		echo '<span class="foco" id="foco-frase" aria-label="o site, o blog ou a loja virtual">o site</span>';
		echo ' que você <br>sempre sonhou.';
	echo '</h1>';


	echo '<div class="container">';

		// apresentacao
		echo '<div class="apresentacao" data-aos="fade-right" data-aos-delay="400">';
				echo '<a href="'.$urlHome.'sobre" title="Conheça a designer" class="foto">';
					echo '<picture role="img" aria-label="Mulher morena por volta de 30 anos, de cabelos escuros até altura dos ombros sorrindo para câmera, vestida com um vestido bege de alças finas">';

					// telas dekstop
				    echo '<source type="image/'.$extensao.'" srcset="'.$urlTema.'/img/anaflaviacador-150.'.$extensao.'" media="(min-width: 991px) and (-webkit-min-device-pixel-ratio: 1) and (max-resolution: 191dpi)">';
				    echo '<source type="image/'.$extensao.'" srcset="'.$urlTema.'/img/anaflaviacador-300.'.$extensao.'" media="(min-width: 991px) and (-webkit-min-device-pixel-ratio: 2) and (min-resolution: 192dpi)">';

				    // tablets
				    echo '<source type="image/'.$extensao.'" srcset="'.$urlTema.'/img/anaflaviacador-250.'.$extensao.'" media="(min-width: 681px) and (max-width: 990px) and (-webkit-min-device-pixel-ratio: 1) and (max-resolution: 191dpi)">';
				    echo '<source type="image/'.$extensao.'" srcset="'.$urlTema.'/img/anaflaviacador-500.'.$extensao.'" media="(min-width: 681px) and (max-width: 990px) and (-webkit-min-device-pixel-ratio: 2) and (min-resolution: 192dpi)">';
				    
				    // celulares
				    echo '<source type="image/'.$extensao.'" srcset="'.$urlTema.'/img/anaflaviacador-200.'.$extensao.'" media="(max-width: 680px) and (-webkit-min-device-pixel-ratio: 1) and (max-resolution: 191dpi)">';
				    echo '<source type="image/'.$extensao.'" srcset="'.$urlTema.'/img/anaflaviacador-400.'.$extensao.'" media="(max-width: 680px) and (-webkit-min-device-pixel-ratio: 2) and (min-resolution: 192dpi)">';
				    
				    // fallback
				    echo '<img data-pin-nopin="true" srcset="'.$urlTema.'/img/anaflaviacador-300.png" alt="Ana Flávia Cador - AFC Web Design">';
				echo '</picture>';
				echo '<h2 lang="en" class="ola cursivo">hello</h2>';
			echo '</a>';

			echo '<summary>';
				echo '<p>Aqui é a Ana, a designer que toca o studio <span class="afc">'; get_template_part('img/afc'); echo '.</span> Desde 2007 realizo sonhos de <em>empreendedoras</em>, <em>influencers</em> e <em>blogueiras</em> projetando sites, lojas virtuais, blogs e ferramentas através de um  <strong class="rosa">design único</strong>, <strong class="verde">inteligente</strong>, com <strong class="roxo">personalidade</strong> e <strong class="bege">propósito</strong>.</p>';
				echo '<p><a href="'.$urlHome.'servicos" class="button pequeno">Conheça meu trabalho</a></p>';
			echo '</summary>';
		echo '</div>';



		// mockup
		echo '<div class="mockup" data-aos="fade-left" data-aos-delay="200">';
			echo '<picture role="img" aria-label="Tela de vários dispositivos demonstrando projeto de webiste responsivo">';

			    echo '<source type="image/png" srcset="'.$urlTema.'/img/mockup1.png" media="(-webkit-min-device-pixel-ratio: 1) and (max-resolution: 191dpi)">';
			    echo '<source type="image/png" srcset="'.$urlTema.'/img/mockup1@2x.png" media="(-webkit-min-device-pixel-ratio: 2) and (min-resolution: 192dpi)">';
			    echo '<img data-pin-nopin="true" srcset="'.$urlTema.'/img/mockup1.png" alt="Tela de vários dispositivos demonstrando projeto de webiste responsivo">';
			echo '</picture>';
			echo '<a href="https://afcweb.design/projetos/" class="ver">Ver mais projetos como esse</a>';
		echo '</div>';

	echo '</div>';

echo '</section>';



// ========================================//
// PROJETOS
// ========================================// 
$tax = array('taxonomy' => 'categories', 'field' => 'slug', 'terms' => 'destaque');
$args = array('post_type' => 'etheme_portfolio', 'orderby' => 'rand', 'posts_per_page' => 6, 'tax_query' => array($tax));

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
	echo '</ul></div><div class="bt"><a data-aos="fade-up" href="'.$urlHome.'projetos" class="button verde">ver mais projetos</a></div></section>';
}
	


// ========================================//
// BENEFICIOS
// ========================================//
echo '<section class="container" id="beneficios">';
	echo '<div data-aos="fade-right">';
		echo '<article>';
			echo '<p>O studio faz <strong>projetos completos</strong> de design e programação para <em>sites, lojas virtuais e blogs</em> na <strong>plataforma Wordpress</strong> com código autoral, limpo, durável e altamente otimizado.</p>';
			echo '<p>São produzidas <strong>ferramentas únicas</strong> para você <strong>automatizar tarefas</strong> em seu site, integrando com redes sociais e montando seu conteúdo com <em>praticidade</em> e <em>agilidade</em>.</p>';
		echo '</article>';
		echo '<h2 class="cursivo">Resultado</h2>';
	echo '</div>';

	echo '<div data-aos="fade-left">';
		echo '<h2 class="cursivo">Leveza <span>+ &nbsp;eficiência</span></h2>';
		echo '<article>';
			echo '<p>Com um <em>site rápido e layout amigável</em>, você é <strong>encontrada no Google</strong> com mais facilidade, aumentando as chances de ser mais conhecia e ganhar mais <em>autoridade</em> em seu nicho. Potencialize a <strong>monetização</strong> do seu conteúdo e converta leads em <em>verdadeiros clientes</em> para seu negócio!</p>';
			echo '<p><a href="'.$urlHome.'servicos" class="button">Quero saber mais!</a></p>';
		echo '</article>';
	echo '</div>';
echo '</section>';



// ========================================//
// BLOG
// ========================================// 

$args = array('post_type' => 'afc_blog', 'order' => 'DESC', 'posts_per_page' => 3);

$artigos = new WP_Query($args);
if ( $artigos->have_posts() ) { $i = 0;
	echo '<section class="container" id="area-blog-home" style="padding-top:2em">';
	echo '<h2 class="cursivo assinado" style="margin-bottom: -0.3em; position: relative; z-index:1">Dicas</h2>';
	echo '<div class="lista-artigos" style="width: 100%; clear: both;">';
	while ( $artigos->have_posts() ) : $i++; $artigos->the_post(); 
		echo '<div class="item-post-grid" data-aos="fade-up" data-aos-delay="'.$timer.'">';
			get_template_part('inc/blog-grid');
		echo '</div>';
	endwhile;
	echo '</div>';
	echo '</section>';
}

	
get_footer();