<?php get_header(); 
$urlHome = esc_url(home_url('/'));

echo '<article class="container" style="max-width: 600px">';
	echo '<p class="has-text-align-center" style="margin: 0">Depoimentos de clientes que tiraram seus projetos do papel e permitiram que o studio '.do_shortcode('[afc]').' os tornassem realidade!</p>';
echo '</article>';

echo '<section id="depoimentos-incriveis" style="padding-top: 1em">';
	echo '<div class="container">';
		echo '<span class="gutter-sizer"></span><span class="grid-sizer"></span>';
		afc_depoimentos(-1);
	echo '</div>';

	echo '<div class="cta">';
		echo '<p class="has-text-align-center" style="line-height: 1.4; margin-bottom: 1em">É cliente ou conhece a qualidade dos meus serviços?<br>Conte sua experiência e junte-se ao time acima! <i class="fas fa-heart" aria-hidden="true" style="color:var(--cor-negacao)"></i></p>';
		echo '<p class="has-text-align-center"><a href="'.$urlHome.'enviar-relato" class="button bege">Enviar depoimento</a></p>';
	echo '</div>';

echo '</section>';
get_footer();