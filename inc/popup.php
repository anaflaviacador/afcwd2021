<?php

$webp = strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' );
$extensao = 'jpg';
if( $webp !== false ) $extensao = 'webp';

$urlHome = esc_url(home_url('/'));
$urlTema = get_template_directory_uri();

$class = 'com-imagem';
$acao = 'popupTempo';

// $titulo = '<h4 class="cursivo has-text-align-center">Aproveite a oportunidade!</h4>';
$titulo = '<h4 class="cursivo has-text-align-center">Semana Black Friday</h4>';
// $texto = 'Receba novidades e ofertas do studio '.do_shortcode('[afc]').', além de <strong>conteúdos exclusivos</strong>, recheados de dicas sobre <u>design</u>, <u>métodos</u> e <u>ferramentas web</u> para manter a saúde e desempenho do seu site!';
$texto = 'O <strong>Template Aurora está com <span style="color:var(--cor-negacao)">40% OFF</span></strong> na semana da Black Friday <strong style="color:var(--cor-negacao)">+ 10% OFF no carrinho pagando no Pix</strong>! Corre e garanta o seu tema até nessa sexta.';
$cta = '';
// $fundo = 'background: url('.$urlTema.'/img/foto-news.'.$extensao.') no-repeat center top / cover';
$fundo = 'background: url('.$urlTema.'/img/blackfriday.'.$extensao.') no-repeat center top / cover';
$posicao = 'center center / cover';

// if (is_post_type_archive('etheme_portfolio') || is_page('sobre') || is_page('servicos')) {
// 	$titulo = '<h4 class="cursivo has-text-align-center">Hey, espera um pouco!</h4>';
// 	$texto = 'Que tal receber novidades e ofertas do studio '.do_shortcode('[afc]').' por e-mail?<br /><br />Receba <strong>conteúdos exclusivos</strong> com dicas de design, métodos e ferramentas web para manter a saúde e o ótimo desempenho do seu futuro site!';
// }

// if (is_post_type_archive('afc_depoimentos')) {
// 	$fundo = 'background: url('.$urlTema.'/img/foto-depos.'.$extensao.') no-repeat left top / cover';
// 	$titulo = '<h4 class="cursivo has-text-align-center">Faça parte do time!</h4>';
// 	$texto = 'Que tal receber novidades e ofertas do studio '.do_shortcode('[afc]').' como essas clientes? <br /><br />Receba <strong>conteúdos exclusivos</strong> com dicas de design, métodos e ferramentas web para manter a saúde e o ótimo desempenho do seu futuro site!';
// }

// if (is_singular('etheme_portfolio')) {
// 	// $class = '';
// 	$acao = 'popupScroll';
// 	$titulo = '<h4 class="cursivo has-text-align-center">Gostou do meu trabalho?</h4>';
// 	$texto = 'Que tal receber <strong>conteúdos exclusivos</strong>, novidades e ofertas do studio '.do_shortcode('[afc]').' no conforto do seu e-mail?';
// }

// if (is_front_page()) $class = 'news com-imagem';

if (is_page('contato')) $acao = 'popupSaida';
if (is_post_type_archive('etheme_portfolio')) $acao = 'popupScroll';

if (afc_nao_woocommerce()) {
	echo '<div class="modal popup '.$class.'" id="'.$acao.'">';
		echo '<div class="wrap">';
			echo '<div class="area-texto">';
				if($titulo) echo $titulo;

				if($texto) {
					echo '<p class="has-text-align-center">';
						echo $texto;
					echo '</p>';
				}

				
				echo '<p class="has-text-align-center">';
					echo '<a class="button grande" style="background:var(--cor-negacao)!important;" href="https://afcweb.design/blackfriday">Saiba mais</a>';
				echo '</p>';

				echo '<p class="has-text-align-center"><small>Válido até às 23h59 de 26/11. Não há necessidade de cupom!</small></p>';

				// get_template_part('inc/news');

				if($cta) echo $cta;
			echo '</div>';
			echo '<div class="area-img" style="'.$fundo.'"></div>'; 
		echo '</div>';
	echo '</div>';
}