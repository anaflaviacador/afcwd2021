<?php get_header(); 
$urlHome = esc_url(home_url('/'));
$urlTema = get_template_directory_uri();

echo '<section class="container" id="lista-projetos">';

		echo '<article>';
			echo '<p>O studio faz <strong>projetos completos</strong> de design e programação para <strong>plataforma Wordpress</strong> com <em>código 100% autoral</em>, limpo, acessível, durável e altamente otimizado.</p>';
		echo '</article>';

	if (have_posts()) { $i = 0; 
		echo '<div class="projetos-afc">';
		while (have_posts()) : $i++; the_post();

			$timer = ($i / 4) * 100;

			echo '<div itemscope itemtype="http://schema.org/CreativeWork"';
			echo ' class="projeto-'.$i.($i == 1 || $i == 8 || $i == 15 || $i == 25 ? ' maior' : ' menor').' mostra-projeto" data-aos="fade-up" data-aos-delay="'.$timer.'">';
				
				if ($i == 1 || $i == 8 || $i == 15 || $i == 25) { 
					afc_projeto('large',200);
				} else { 
					afc_projeto('medium');
				}

			echo '</div>';			

			if ($i == 5) {

				get_template_part('inc/codigo-autoral');

				
			} elseif ($i == 12) {

				echo '<section class="chamada-orcamento">';
					echo '<div class="wrap" data-aos="fade-left" data-aos-delay="'.$timer.'">';
						echo '<h2 class="verde marca-dagua">Gostou do que viu? <span aria-hidden="true">Peça seu orçamento</span></h2>';
						echo '<p><strong>Faça sua cotação</strong> e comece o planejamento de seu projeto hoje mesmo!</p>';
						echo '<p><a href="'.$urlHome.'contato" class="button verde medio">Pedir orçamento</a></p>';
					echo '</div>';
				echo '</section>';
				
			} 

		endwhile;
		echo '</div>';
	}
echo '</section>';
get_footer();