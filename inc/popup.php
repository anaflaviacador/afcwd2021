<?php
$urlHome = esc_url(home_url('/'));
$urlTema = get_template_directory_uri();

$class = 'com-imagem';
$acao = 'popupSaida';
$titulo = '<h4 class="cursivo has-text-align-center">Aproveite a oportunidade!</h4>';
$texto = 'Receba novidades e ofertas do studio '.do_shortcode('[afc]').', além de <strong>conteúdos exclusivos</strong>, recheados de dicas sobre <u>design</u>, <u>métodos</u> e <u>ferramentas web</u> para manter a saúde e desempenho do seu site!';
$cta = '';
$fundo = 'background: url('.$urlTema.'/img/foto-news.jpg) no-repeat center top / cover';
$posicao = 'center center / cover';

if (is_post_type_archive('etheme_portfolio') || is_page('sobre') || is_page('servicos')) {
	$titulo = '<h4 class="cursivo has-text-align-center">Hey, espera um pouco!</h4>';
	$texto = 'Enquanto você ainda não <a href="'.$urlHome.'contato">pede seu orçamento</a>, que tal receber novidades e ofertas do studio '.do_shortcode('[afc]').' por e-mail?<br /><br />Receba <strong>conteúdos exclusivos</strong> com dicas de design, métodos e ferramentas web para manter a saúde e o ótimo desempenho do seu futuro site!';
}

if (is_post_type_archive('afc_depoimentos')) {
	$fundo = 'background: url('.$urlTema.'/img/foto-depos.jpg) no-repeat left top / cover';
	$titulo = '<h4 class="cursivo has-text-align-center">Faça parte do time!</h4>';
	$texto = 'Enquanto você ainda não <a href="'.$urlHome.'contato">pede seu orçamento</a>, que tal receber novidades e ofertas do studio '.do_shortcode('[afc]').' como elas? <br /><br />Receba <strong>conteúdos exclusivos</strong> com dicas de design, métodos e ferramentas web para manter a saúde e o ótimo desempenho do seu futuro site!';
}

if (is_singular('etheme_portfolio')) {
	// $class = '';
	$acao = 'popupScroll';
	$titulo = '<h4 class="cursivo has-text-align-center">Gostou do meu trabalho?</h4>';
	$texto = 'Enquanto você ainda não <a href="'.$urlHome.'contato">pede seu orçamento</a>, que tal receber <strong>conteúdos exclusivos</strong>, novidades e ofertas do studio '.do_shortcode('[afc]').' no confordo do seu e-mail?';
}

if (is_front_page()) $class = 'news com-imagem';

echo '<div class="modal popup '.$class.'" id="'.$acao.'">';
	echo '<div class="wrap">';
		echo '<div class="area-texto">';
			if($titulo) echo $titulo;

			if($texto) {
				echo '<p class="has-text-align-center">';
					echo $texto;
				echo '</p>';
			}

			get_template_part('inc/news');

			if($cta) echo $cta;
		echo '</div>';
		echo '<div class="area-img" style="'.$fundo.'"></div>'; 
	echo '</div>';
echo '</div>';