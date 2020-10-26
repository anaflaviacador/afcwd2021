<?php
get_header(); 

echo '<article class="container" id="pagina-docs">';

if (is_user_logged_in()) do_action( 'woocommerce_account_navigation' );
	

if (have_posts()) { while (have_posts()) : the_post();
	echo '<div class="woocommerce-account">';		
		echo '<div class="woocommerce-MyAccount-content'.(!is_user_logged_in() ? ' sem-permissao' : '').'">';

			the_content();

		echo '</div>';

		if(is_user_logged_in() && is_singular('private-page')) {

			echo '<div class="wrap-arquivos-cliente">';

				$path = get_template_directory_uri().'/img/cliente/ico';

				///////////////// DOCUMENTOS
				echo '<div class="box'.(empty(have_rows('areacliente_docs')) ? ' indisponivel' : '').'">';
					echo '<h3>';
						echo '<img src="'.$path.'-documentos.svg" aria-hidden="true">';
						echo '<span>Documentos <small>Contrato, formulário e nota fiscal</small></span>';
					echo '</h3>';
					if( have_rows('areacliente_docs') ) {
						echo '<ul>';
							while (have_rows('areacliente_docs')) : the_row();
								echo '<li>';
									echo '<a href="'.esc_url(get_sub_field('arquivo')).'" download>';
										echo get_sub_field('nome');
										echo '<span>';
											echo get_sub_field('data');
											if (get_sub_field('nota')) {echo ' - '; echo get_sub_field('nota');}
										echo '</span>';
									echo '</a>';
								echo '</li>';
							endwhile;
						echo '</ul>';
					} else {
						echo '<div class="vazio">Nenhum documento disponível <span>Preencha o briefing para dar entrada no contrato</span></div>';
					}
				echo '</div>';




				///////////////// LAYOUT E DESIGN	
				echo '<div class="box'.(empty(have_rows('areacliente_design')) ? ' indisponivel' : '').'">';
					echo '<h3>';
						echo '<img src="'.$path.'-layout.svg" aria-hidden="true">';
						echo '<span>Design <small>Propostas de layout</small></span>';
					echo '</h3>';
					if( have_rows('areacliente_design') ) {
						echo '<ul>';
							while (have_rows('areacliente_design')) : the_row();
								echo '<li>';
									echo '<a href="'.esc_url(get_sub_field('arquivo')).'" target="_blank">';
										echo get_sub_field('nome');
										echo '<span>';
											echo get_sub_field('data');
											if (get_sub_field('nota')) {echo ' - '; echo get_sub_field('nota');}
										echo '</span>';
									echo '</a>';
								echo '</li>';
							endwhile;
						echo '</ul>';
					} else {
						echo '<div class="vazio">Visualização indisponível<span>Aguarde até finalização desta etapa</span></div>';
					}
				echo '</div>';



				///////////////// ARTES FINAIS
				echo '<div class="box'.(empty(have_rows('areacliente_artes')) ? ' indisponivel' : '').'">';
					echo '<h3>';
						echo '<img src="'.$path.'-artefinal.svg" aria-hidden="true">';
						echo '<span>Artes finais <small>Arquivos de imagem</small></span>';
					echo '</h3>';
					if( have_rows('areacliente_artes') ) {
						echo '<ul>';
							while (have_rows('areacliente_artes')) : the_row();
								echo '<li>';
									echo '<a href="'.esc_url(get_sub_field('arquivo')).'" download>';
										echo get_sub_field('nome');
										echo '<span>';
											echo get_sub_field('data');
											if (get_sub_field('nota')) {echo ' - '; echo get_sub_field('nota');}
										echo '</span>';
									echo '</a>';
								echo '</li>';
							endwhile;
						echo '</ul>';
					} else {
						echo '<div class="vazio">Imagens indisponíveis ou não requisitadas em contrato.</div>';
					}
				echo '</div>';




				///////////////// ZIPS
				echo '<div class="box'.(empty(have_rows('areacliente_zips')) ? ' indisponivel' : '').'">';
					echo '<h3>';
						echo '<img src="'.$path.'-arquivoszip.svg" aria-hidden="true">';
						echo '<span>Compactados <small>Pacotes prontos para instalação</small></span>';
					echo '</h3>';
					if( have_rows('areacliente_zips') ) {
						echo '<ul>';
							while (have_rows('areacliente_zips')) : the_row();
								echo '<li>';
									echo '<a href="'.esc_url(get_sub_field('arquivo')).'" download>';
										echo get_sub_field('nome');
										echo '<span>';
											echo get_sub_field('data');
											if (get_sub_field('nota')) {echo ' - '; echo get_sub_field('nota');}
										echo '</span>';
									echo '</a>';
								echo '</li>';
							endwhile;
						echo '</ul>';
					} else {
						echo '<div class="vazio">Materiais indisponíveis<span>Aguarde até a finalização do projeto</span></div>';
					}
				echo '</div>';


			echo '</div>';
		}

	echo '</div>';
endwhile; }

echo '</article>';


get_footer();