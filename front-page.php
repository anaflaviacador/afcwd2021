<?php get_header(); 
$urlTema = get_template_directory_uri();

echo '<section id="chamada-principal" aria-label="Área de apresentação da empresa, com imagem de fundo fotografada por cima de uma mulher em uma escrivaninha de frente a uma tela de notebook trabalhando" style="background-image: url('.$urlTema.'/img/foto-oficial.jpg);">';
	echo '<div class="gradiente" aria-hidden="true"></div>';

	// titulo da pagina inicial
	echo '<h1>';
		echo 'Tire o seu projeto do papel e <br>tenha &nbsp;';
		echo '<span class="foco" id="foco-frase" aria-label="o site, o blog ou a loja virtual"></span>';
		echo ' que você <br>sempre sonhou.';
	echo '</h1>';


	echo '<div class="container">';

		// mockup
		echo '<div class="mockup">';
			echo '<picture role="img" aria-label="Tela de vários dispositivos demonstrando projeto de webiste responsivo">';
			    echo '<source srcset="'.$urlTema.'/img/mockup1.png" media="(-webkit-min-device-pixel-ratio: 1) and (max-resolution: 191dpi)">';
			    echo '<source srcset="'.$urlTema.'/img/mockup1@2x.png" media="(-webkit-min-device-pixel-ratio: 2) and (min-resolution: 192dpi)">';
			    echo '<img srcset="'.$urlTema.'/img/mockup1.png">';
			echo '</picture>';
			echo '<a href="/" class="ver">Projeto <strong>A Casa Delas</strong></a>';
		echo '</div>';

		// apresentacao
		echo '<div class="apresentacao">';
			echo '<a href="/" title="Conheça a designer" class="foto">';
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
				echo '<p>Aqui é a Ana, a designer por trás do studio <span class="afc">'; echo get_template_part('img/afc'); echo '.</span> Desde 2007 realizo sonhos de <em>blogueiras</em>, <em>influencers</em> e <em>empreendedoras</em> projetando blogs, websites, lojas virtuais e ferramentas através de um  <strong class="rosa">design único</strong>, <strong class="verde">inteligente</strong>, com <strong class="roxo">personalidade</strong> e <strong class="bege">propósito</strong>.</p>';
				echo '<p><a href="/" class="button pequeno">Conheça o meu trabalho</a></p>';
			echo '</summary>';
		echo '</div>';
	echo '</div>';

echo '</section>';

		
		// if (have_posts()) {
		// 	while (have_posts()) : the_post();

		// 	endwhile;
		// }
	
get_footer();