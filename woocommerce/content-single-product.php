<?php defined( 'ABSPATH' ) || exit;
global $product;

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

$ativa_LP = get_field('ativar_lp');
if($ativa_LP == true) {

$urlHome = esc_url(home_url('/'));
$urlTema = get_template_directory_uri();

$webp = strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' );
$extensao = 'jpg';
if( $webp !== false ) $extensao = 'webp';	

// ========================================//
// LANDING PAGE
// ========================================// 
$demo_principal = get_field('demo_principal');
$demo_exemplos = get_field('demo_exemplos');
$nomeproduto = get_field('nome_produto');

// notificacoes
echo '<div class="afc-woo-notices-lp header">';
do_action( 'woocommerce_before_single_product' );
echo '</div>';

// layout
if(have_rows('produto_lp') ) { 
	while ( have_rows('produto_lp') ) : the_row();

	$n = get_row_index();

	/////////////// BLOCO DE FUNDO ESCURO
	if( get_row_layout() == 'bg_escuro_mockup' ) {
		$espaco = get_sub_field('espaco');
		$id_imgfundo = get_sub_field('imagem_fundo');
		$imgfundo = $urlTema.'/img/foto-oficial.'.$extensao;
		if(!empty($id_imgfundo)) $imgfundo = $id_imgfundo['url'];

		$inverter = get_sub_field('inverter'); // inverter bloco - midia primeiro
		$titulosessao = get_sub_field('titulo');
		$tag = 'h2';
		if($n == '1') $tag = 'h1';

		$descricao = get_sub_field('descricao'); $beneficios = get_sub_field('lista_beneficios');
		$botao_venda = get_sub_field('botao'); $mostra_demos = get_sub_field('mostrar_demos');
		$mockup = get_sub_field('mockup'); $ipad = get_sub_field('ipad');
		$midia = get_sub_field('midia'); $capa = get_sub_field('capa');
		$video = get_sub_field('video');

		$tour = get_sub_field('tour'); $tour_video = get_sub_field('video_youtube');

		echo '<section class="afclp-bg-escuro '.$mockup.($inverter ? ' inverter' : '').($espaco ? ' espaco' : '').'">';
			echo '<div class="foto" style="background-image: url('.$imgfundo.');"></div>';

			//// descricao
			echo '<div class="descricao" data-aos="fade-'.($inverter ? 'left' : 'right').'">';
				echo '<'.$tag.' class="titulo desk">'.wp_kses_post($titulosessao).'</'.$tag.'>';

				if($descricao) echo wp_kses_post($descricao);

				if($beneficios && have_rows('lista_beneficios') ) { $i = 0;
					echo '<ul class="lista-beneficios">';
					while ( have_rows('lista_beneficios') ) : $i++; the_row();
						$icone = get_sub_field('icone');
						$titulobe = get_sub_field('titulo'); $subtitulo = get_sub_field('subtitulo');

						$timer = ($i / 2) * 100;

						echo '<li data-aos="fade-left" data-aos-delay="'.$timer.'">';
							if($icone) echo '<i class="'.esc_html($icone).'"></i>';
							if($titulobe) echo '<span>'.esc_html( $titulobe ).($subtitulo ? ' <small>'.esc_html( $subtitulo ).'</small>' : '').'</span>';
						echo '</li>';
					endwhile;
					echo '</ul>';
				}

				if($botao_venda) {
					if($botao_venda['nome'] || $botao_venda['classe']) echo '<p class="area-botao has-text-align-center" data-aos="zoom-in" data-aos-delay="250"><a href="#comprar" class="jump button '.($botao_venda['classe'] ? $botao_venda['classe'] : 'roxo medio').'">'.($botao_venda['nome'] ? $botao_venda['nome'] : 'Quero comprar!').'</a></p>';
				}

				$termsID = wc_terms_and_conditions_page_id();
				if($tour && !empty($tour_video)) echo '<p class="termos">Há emissão de nota fiscal! Leia os <a href="'.get_the_permalink($termsID).'" target="_blank">termos de uso</a> para saber detalhes. Caso tenha alguma dúvida, conheça o <a class="jump" href="#faq">F.A.Q do tema</a>.</p>';

			echo '</div>';

			//// mockup
			echo '<div class="ilustracao" data-aos="fade-'.($inverter ? 'right' : 'left').'" aria-label="Imagem ilustrativa de captura de tela">';
				echo '<h2 class="titulo mob">'.wp_kses_post($titulosessao).'</h2>';

				if($mostra_demos && $demo_principal) get_template_part('inc/produtolp','demos');

				echo '<div class="mockup'.($mockup == 'macbook' ? ' down' : '').'">';
					echo '<img src="'.$urlTema.'/img/lp/mockup-'.$mockup.($mockup == 'ipad' && !empty($ipad) ? '-'.$ipad : '').'.png" alt="Mockup - Moldura de captura de tela" class="moldura '.$mockup.'">';

					echo '<div class="captura'.($midia ? ' '.$midia.' ' : '').$mockup.($mockup == 'ipad' && !empty($ipad) ? '-'.$ipad : '').'">';

						$capa_captura = '<img src="'.$capa['url'].'" alt="'.$capa['alt'].'" title="'.$capa['title'].'">';

						if(!empty($capa)) echo $capa_captura;
					
						if($midia == 'video' && !empty($capa) && !empty($video)) {
							echo '<video class="video-captura-lp" width="auto" height="100%" loop autoplay muted playsinline>';
								echo '<source src="'.$video['url'].'" type="video/mp4">';
								echo $capa_captura;
							echo '</video>';

							if($tour && !empty($tour_video)) echo '<div class="indica-tour"><i class="fas fa-play-circle" aria-hidden="true"></i></div>';
						}
					echo '</div>';

					if($tour && !empty($tour_video)) echo '<a title="Iniciar tour" href="'.esc_url($tour_video).'" class="afczoom fazer-tour"></a>';
				echo '</div>';

			echo '</div>';
		echo '</section>';
	}


	/////////////// BLOCO COLNAS INTRO
	if( get_row_layout() == 'colunas_simples' ) {
		$coluna = get_sub_field('coluna');
		$espaco = get_sub_field('espaco');

		if($coluna && count($coluna) >= 1 && have_rows('coluna')) { $i = 0;
			echo '<section class="afclp-colunas-simples num-'.count($coluna).($espaco ? ' espaco' : '').'">';
			while ( have_rows('coluna') ) : $i++; the_row();
				$descricao = get_sub_field('descricao');
				$pgtos = get_sub_field('pgtos');
				$titulo = get_sub_field('titulo');
				$multiplo = ceil($i % 2); $timer = ($i / 2) * 200;
				echo '<div class="item-coluna item-'.$i.'" data-aos="fade-'.($multiplo != 0 ? 'right' : 'left').'" data-aos-delay="'.$timer.'">';
					echo '<header>';
						echo '<h2 class="marca-dagua">'.wp_kses_post($titulo).'</h2>';
					echo '</header>';

					if($descricao) echo wp_kses_post($descricao);

					if($pgtos) echo '<img src="'.$urlTema.'/img/lp/formas-pgto.svg" alt="É aceito pagamento com praticamente todas as bandeiras de cartão de crédito, pix, boleto, picpay, pagseguro e paypal para pagamentos internacionais.">';
				echo '</div>';
			endwhile;
			echo '</section>';
		}

	}	


	/////////////// BLOCO GRANDE DE FUNCOES
	if( get_row_layout() == 'grade_funcoes' ) {
		$funcoes = get_sub_field('funcoes');
		$espaco = get_sub_field('espaco');

		if($funcoes && count($funcoes) >= 1 && have_rows('funcoes')) { $i = 0;
			echo '<section class="afclp-lista-funcoes num-'.count($funcoes).($espaco ? ' espaco' : '').'">';
				echo '<h2 class="marca-dagua has-text-align-center">Funções Principais <span>diferenciais do tema</span></h2>';

				while ( have_rows('funcoes') ) : $i++; the_row();
					$chamada = get_sub_field('chamada'); $descricao = get_sub_field('descricao');
					$capa = get_sub_field('capa'); 
					$timer = ($i / 2) * 100;

					echo '<div class="item-funcao" data-aos="fade-up" data-aos-delay="'.$timer.'">';
						echo '<figure'.(!empty($video) ? ' class="captura-video"' : '').'>';
							
							echo $capa;

							// echo '<div class="indicador"><span>0'.$i.'</span></div>';
						echo '</figure>';

						echo '<article>';

						if($chamada) echo '<h3>'.$chamada.'</h3>';
						if($descricao) echo wp_kses_post($descricao);

						echo '</article>';

					echo '</div>';
				endwhile;
			echo '</section>';
		}

	}



	/////////////// MARCAS
	if( get_row_layout() == 'integracoes_marcas' ) {
		$marcas = get_sub_field('marcas');
		$chamada = get_sub_field('chamada');
		$subchamada = get_sub_field('subchamada');
		$espaco = get_sub_field('espaco');

		if($marcas && count($marcas) >= 1 && have_rows('marcas')) { $i = 0;
			echo '<section class="afclp-lista-marcas'.($espaco ? ' espaco' : '').'">';

				echo '<header>';
					echo '<h2 class="cursivo">'.$chamada.'</h2>';
					if($subchamada) echo wp_kses_post($subchamada);
				echo '</header>';
				
				while ( have_rows('marcas') ) : $i++; the_row();
					$timer = ($i / 2) * 100;
					
					echo get_sub_field('codigo_svg');
				endwhile;

			echo '</section>';
		}

	}



	/////////////// BENEFICIOS
	if( get_row_layout() == 'grade_beneficios' ) {
		$beneficios = get_sub_field('lista_beneficios');
		$espaco = get_sub_field('espaco');

		if($beneficios && count($beneficios) >= 1 && have_rows('lista_beneficios')) { $i = 0;
			echo '<section class="afclp-lista-beneficios'.($espaco ? ' espaco' : '').'">';
				echo '<ul class="num-'.count($beneficios).'">';
				while ( have_rows('lista_beneficios') ) : $i++; the_row();
					$icone = get_sub_field('icone'); $tom = get_sub_field('tom');
					$titulo = get_sub_field('titulo'); $subtitulo = get_sub_field('subtitulo');
					$descricao = get_sub_field('descricao'); $asterisco = get_sub_field('asterisco');
					$botao = get_sub_field('botao');
					$timer = ($i / 2) * 100;

					echo '<li class="'.$tom.'" data-aos="fade-up" data-aos-delay="'.$timer.'">';
						if($icone) echo '<header><i class="icone '.$icone.'"></i>';
						if($titulo) echo '<h3 class="marca-dagua">'.$titulo.($subtitulo ? ' <span aria-hidden="true">'.$subtitulo.'</span>' : '').'</h3></header>';
						if($descricao) echo wp_kses_post($descricao);

						if($botao) echo '<footer><a href="'.$botao['url'].'" class="button pequeno '.$tom.'" target="'.$botao['target'].'">'.$botao['title'].'</a></footer>';
						if($asterisco && empty($botao)) echo '<div class="observacao">'.wp_kses_post($asterisco).'</div>';
					echo '</li>';
					

				endwhile;
				echo '</ul>';
			echo '</section>';
		}
	}




	/////////////// WOO
	if( get_row_layout() == 'addon_woocommerce' ) {
		$espaco = get_sub_field('espaco');

			echo '<section class="afclp-addon-woocommerce-ready'.($espaco ? ' espaco' : '').'">';
			
				$marca = '<svg data-aos="zoom-in" title="Marca Woocommerce" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" viewBox="0 0 210 43"><path fill="var(--cor-roxo)" fill-rule="nonzero" d="M65.08.69H7.4A6.53 6.53 0 00.74 7.13v22.01c0 3.65 3.05 6.09 6.7 6.09h27.3l12.5 6.95-2.84-6.95h20.68c3.65 0 7.3-2.44 7.3-6.09V7.13c0-3.65-3.65-6.44-7.3-6.44zM29.83 29.52c.05.72-.06 1.36-.35 1.9-.35.65-.87 1-1.53 1.05-.76.06-1.54-.29-2.3-1.07-2.69-2.75-4.83-6.87-6.4-12.34-1.88 3.7-3.27 6.49-4.17 8.34-1.7 3.28-3.16 4.96-4.37 5.04-.78.06-1.45-.6-2.03-2C7.2 26.66 5.61 19.33 3.9 8.47c-.09-.76.06-1.42.46-1.94.41-.55 1.02-.84 1.83-.9 1.48-.12 2.32.58 2.52 2.08.9 6.06 1.88 11.19 2.92 15.39L17.98 11c.58-1.1 1.3-1.68 2.17-1.74 1.28-.09 2.06.72 2.37 2.43a54.35 54.35 0 002.76 9.91c.75-7.36 2.03-12.66 3.82-15.93a2.22 2.22 0 011.91-1.28c.67-.05 1.28.15 1.83.58.55.44.84.99.9 1.65.02.53-.06.96-.3 1.4-1.12 2.08-2.05 5.58-2.8 10.45-.73 4.72-.99 8.4-.81 11.04zm35.95-4.55c-1.74 2.9-4 4.34-6.81 4.34-.5 0-1.02-.05-1.56-.17a6.66 6.66 0 01-4.64-3.36c-.93-1.6-1.4-3.5-1.4-5.74 0-2.98.76-5.7 2.27-8.16 1.77-2.9 4.02-4.35 6.8-4.35.5 0 1.02.06 1.57.17a6.67 6.67 0 014.64 3.37c.92 1.56 1.39 3.44 1.39 5.7 0 2.99-.76 5.7-2.26 8.2zm-18.17 0c-1.74 2.9-4 4.34-6.8 4.34a7.5 7.5 0 01-1.57-.17 6.68 6.68 0 01-4.64-3.36c-.92-1.6-1.39-3.5-1.39-5.74 0-2.98.76-5.7 2.26-8.16 1.77-2.9 4.03-4.35 6.81-4.35.5 0 1.02.06 1.56.17a6.74 6.74 0 014.64 3.37c.93 1.56 1.4 3.44 1.4 5.7 0 2.99-.76 5.7-2.27 8.2zm139.6-14.17a9.82 9.82 0 00-2.9 7.3c0 3.16.96 5.74 2.87 7.68 1.91 1.94 4.4 2.93 7.5 2.93.9 0 1.91-.15 3.01-.47v-4.69c-1 .3-1.88.44-2.63.44a4.74 4.74 0 01-3.68-1.54 6.08 6.08 0 01-1.4-4.2c0-1.65.47-3.01 1.37-4.06a4.34 4.34 0 013.45-1.59c.9 0 1.85.15 2.9.44v-4.7c-.96-.26-2.04-.37-3.16-.37a9.91 9.91 0 00-7.33 2.83zM99.1 7.94c-2.66 0-4.75.9-6.25 2.66-1.5 1.77-2.23 4.26-2.23 7.45 0 3.44.75 6.08 2.23 7.9 1.48 1.83 3.65 2.76 6.49 2.76 2.75 0 4.86-.93 6.34-2.75 1.48-1.83 2.23-4.4 2.23-7.71 0-3.3-.75-5.85-2.26-7.65-1.53-1.77-3.7-2.66-6.54-2.66zm-20.1 2.86a9.82 9.82 0 00-2.9 7.3c0 3.16.96 5.74 2.87 7.68 1.92 1.94 4.4 2.93 7.5 2.93.9 0 1.92-.15 3.02-.47v-4.69c-1.01.3-1.88.44-2.64.44a4.75 4.75 0 01-3.68-1.54 6.08 6.08 0 01-1.38-4.2 6 6 0 011.36-4.06 4.33 4.33 0 013.44-1.59c.9 0 1.86.15 2.9.44v-4.7c-.95-.26-2.03-.37-3.16-.37a9.87 9.87 0 00-7.33 2.83zm83.75 9.62h4.72v-4.08h-4.72v-3.62h5.44v-4.2h-10.77v19.72h10.8v-4.2h-5.47v-3.62zm41.74 3.6v-3.63h4.73v-4.08h-4.73v-3.62h5.48v-4.2H199.2V28.2H210v-4.2h-5.5zm-21.26-6.73c.55-.9.84-1.82.84-2.78 0-1.85-.73-3.33-2.17-4.4-1.45-1.07-3.45-1.62-5.94-1.62h-6.2V28.2h5.33v-8.97h.08l4.32 8.97h5.62l-4.26-8.89a5.28 5.28 0 002.38-2.03zm-36.88-8.8l-1.04 4.43a103.8 103.8 0 00-.75 3.48l-.58 3.07c-.55-3.07-1.3-6.72-2.26-10.98H135l-2.52 19.72h5.04l1.36-13.58 3.45 13.58h3.59l3.27-13.55 1.42 13.55h5.27L153.23 8.5h-6.87zm-24.13 0l-1.04 4.43a103.8 103.8 0 00-.75 3.48l-.58 3.07c-.55-3.07-1.3-6.72-2.26-10.98h-6.72l-2.52 19.72h5.04l1.36-13.58 3.45 13.58h3.59l3.3-13.55 1.42 13.55h5.27L129.13 8.5h-6.9zm-61.26 3.94c-1.05-.2-2.06.37-3.02 1.8a9.36 9.36 0 00-1.73 5.55c0 .84.17 1.74.51 2.64.44 1.13 1.02 1.74 1.72 1.88.72.15 1.5-.17 2.34-.92 1.08-.96 1.8-2.38 2.2-4.3.12-.66.2-1.38.2-2.13a7.4 7.4 0 00-.51-2.64c-.44-1.13-1.02-1.74-1.71-1.88zm-18.17 0c-1.04-.2-2.06.37-3.01 1.8a9.36 9.36 0 00-1.74 5.55c0 .84.18 1.74.53 2.64.43 1.13 1 1.74 1.7 1.88.73.15 1.51-.17 2.35-.92 1.07-.96 1.8-2.38 2.2-4.3.15-.66.2-1.38.2-2.13a7.3 7.3 0 00-.52-2.64c-.43-1.13-1.01-1.74-1.7-1.88zM101.4 23a2.57 2.57 0 01-2.28 1.22c-.93 0-1.63-.4-2.12-1.22-.5-.81-.72-2.43-.72-4.9 0-3.79.95-5.67 2.9-5.67 2.03 0 3.07 1.9 3.07 5.76-.03 2.38-.33 4-.84 4.8zm73.67-6.03v-4.69c1.27.03 2.17.23 2.72.64.56.4.81 1.04.81 1.97 0 1.36-1.19 2.06-3.53 2.08z"/></svg>';
				
				echo '<div class="apresenta">';
					echo '<h2>Extensão <span class="hidden">Woocommerce Ready</span>'.$marca.'</h2>';
					echo '<p>Adicione o add-on em seu carrinho e <strong>turbine as funcionalidades do tema Aurora</strong> para vender qualquer produto — físico ou digital!</p>';

					echo '<div class="linha"></div>';
				echo '</div>';

				echo '<div class="lista-funcoes" data-aos="fade-left">';
					echo '<i class="icone fal fa-cart-plus" aria-hidden="true"></i>';
					echo '<p class="has-text-align-center">A extensão <strong><em>Woocommerce Ready</em></strong> vem com as opções:</p>';

					echo '<ul>';
						echo '<li>Widgets na página de produtos</li>';
						echo '<li>Acesso rápido de login via popup</li>';
						echo '<li>Breadcrumb (orientação de navegação)</li>';
						echo '<li>Controle de botão de add ao carrinho</li>';
						echo '<li>Ícone de login e carrinho com nº de itens</li>';
						echo '<li>Controle de produtos relacionados</li>';
						echo '<li>Bloco adicional de produtos no Homepage Builder do tema Aurora</li>';
						echo '<li>Opção geral de ocultar quantidade de estoque em produtos digitais</li>';
						echo '<li>Marcas dos principais gateways de pagamento brasileiros</li>';
						echo '<li>Adição de CPF/CPNJ titular para pagamentos com transferência / depósito bancário</li>';
						
					echo '</ul>';

					echo '<p style="margin-top:10px; font-size:12px;">* requer plugin do Woocommerce e um tema do studio.</p>';
				echo '</div>';
			

			echo '</section>';
		
	}



	/////////////// BLOCO DE VENDA
	if( get_row_layout() == 'bloco_comprar' ) {
		$espaco = get_sub_field('espaco');
		$id_imgfundo = get_sub_field('imagem_fundo');
		$imgfundo = $urlTema.'/img/foto-oficial.'.$extensao;
		if(!empty($id_imgfundo)) $imgfundo = $id_imgfundo['url'];

		$inverter = get_sub_field('inverter'); // inverter bloco - midia primeiro
		$titulosessao = get_sub_field('titulo');

		$descricao = get_sub_field('descricao'); $beneficios = get_sub_field('lista_beneficios');
		$botao_venda = get_sub_field('botao'); $mostra_demos = get_sub_field('mostrar_demos');
		$mockup = get_sub_field('mockup'); $ipad = get_sub_field('ipad');
		$midia = get_sub_field('midia'); $capa = get_sub_field('capa');
		$video = get_sub_field('video');

		get_template_part('inc/produtolp','indicados');

		echo '<section id="comprar" class="afclp-bg-escuro venda '.$mockup.($inverter ? ' inverter' : '').'">';
			echo '<div class="foto" style="background-image: url('.$imgfundo.');"></div>';

			//// descricao
			echo '<div class="descricao" data-aos="fade-'.($inverter ? 'left' : 'right').'">';
				echo '<h2 class="titulo desk">'.wp_kses_post($titulosessao).'</h2>';

				if($descricao) echo wp_kses_post($descricao);

				echo '<div class="wrap-adicionar-carrinho">';
					do_action( 'woocommerce_single_product_summary' );
					do_action( 'woocommerce_after_single_product' );
				echo '</div>'; 

				echo '<script>';
					echo 'jQuery(document).ready(function($) {';
					echo '$(\'p.stock.out-of-stock\').text(\'Serviço esgotado. Já já estará de volta!\');';
					echo '});';
				echo '</script>';

				$termsID = wc_terms_and_conditions_page_id();
				echo '<p class="termos">Há emissão de nota fiscal! Leia os <a href="'.get_the_permalink($termsID).'" target="_blank">termos de uso</a> para saber como funciona a licença e o que entra no suporte. Para demais dúvidas, veja a sessão de <a class="jump" href="#faq">perguntas e respostas</a> do tema.</p>';


			echo '</div>';

			//// mockup
			echo '<div class="ilustracao" data-aos="fade-'.($inverter ? 'right' : 'left').'" aria-label="Imagem ilustrativa de captura de tela">';
				echo '<h2 class="titulo mob">'.wp_kses_post($titulosessao).'</h2>';

				echo '<div class="mockup'.($mockup == 'macbook' ? ' down' : '').'">';
					echo '<img src="'.$urlTema.'/img/lp/mockup-'.$mockup.($mockup == 'ipad' && !empty($ipad) ? '-'.$ipad : '').'.png" alt="Mockup - Moldura de captura de tela" class="moldura '.$mockup.'">';

					echo '<div class="captura'.($midia ? ' '.$midia.' ' : '').$mockup.($mockup == 'ipad' && !empty($ipad) ? '-'.$ipad : '').'">';

						$capa_captura = '<img src="'.$capa['url'].'" alt="'.$capa['alt'].'" title="'.$capa['title'].'">';

						if(!empty($capa)) echo $capa_captura;
					
						if($midia == 'video' && !empty($capa) && !empty($video)) {
							echo '<video class="video-captura-lp" width="auto" height="100%" loop autoplay muted playsinline>';
								echo '<source src="'.$video['url'].'" type="video/mp4">';
								echo $capa_captura;
							echo '</video>';
						}
					echo '</div>';

				echo '</div>';

			echo '</div>';
		echo '</section>';

		echo '<div class="afclp-formas-pgto'.($espaco ? ' espaco' : '').($inverter ? ' inverter' : '').'">';
			echo '<img src="'.$urlTema.'/img/lp/formas-pgto-dark.svg" alt="É aceito pagamento com praticamente todas as bandeiras de cartão de crédito, pix, boleto e paypal para pagamentos internacionais.">';
			echo '<p>Pagamentos nacionais podem ser pagos em até 6x s/juros, boleto ou 10%OFF no Pix. Internacionais são cobradas à vista via Paypal.</p>';
		echo '</div>';

		// echo do_shortcode('[products]');
	}	




endwhile; }

get_template_part('inc/produtolp','faq');

if($demo_exemplos && count($demo_exemplos) > 1) {
	echo '<div class="modal" id="exemplos-lista" aria-label="Exemplos de uso do tema">';
		echo '<h2 class="has-text-align-center cursivo">exemplos de uso</h2>';
		if(have_rows('demo_exemplos')) {
			echo '<p class="has-text-align-center">Navegue pelos links rápidos para ver exemplos específicos do layout.</p>';
			echo '<ul class="demo-lista-exemplos">';
			while ( have_rows('demo_exemplos') ) : the_row();
				$linkex = get_sub_field('link_exemplo');
				echo '<li><a href="'.$linkex['url'].'" target="new" rel="noopener">'.$linkex['title'].'</a></li>';
			endwhile;
			echo '</ul>';
			echo '<p class="has-text-align-center" style="margin-top:2em;font-size:.8em">A maioria dos elementos mencionados acima podem ser combinados entre si para resultar em estrutuas diferentes, tais como: topo, rodapé, orientação da sidebar, ordem dos blocos gutenberg, sessões da home etc.</p>';
		}
	echo '</div>';
}


// ========================================//
// PAG PADRAO DE PRODUTO
// ========================================// 	
} else {
	do_action( 'woocommerce_before_single_product' );
	echo '<div id="product-'.get_the_ID().'"'; wc_product_class( '', $product ); echo '>';
		do_action( 'woocommerce_before_single_product_summary' );
		echo '<div class="summary entry-summary">';
			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);			
			do_action( 'woocommerce_single_product_summary' );
		echo '</div>';
		do_action( 'woocommerce_after_single_product_summary' );
	echo '</div>'; 
	do_action( 'woocommerce_after_single_product' );

	echo '<div class="clear"></div>';
}


