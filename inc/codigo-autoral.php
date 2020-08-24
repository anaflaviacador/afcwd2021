<?php
$urlHome = esc_url(home_url('/'));
$urlTema = get_template_directory_uri();


echo '<section class="codigo-autoral">';
	echo '<div class="foto" style="background-image: url('.$urlTema.'/img/foto-oficial.jpg);"></div>';
		echo '<h2 class="marca-dagua" data-aos="fade-up">Código autoral <span>O que significa?</span></h2>';
		
		echo '<div data-aos="fade-right">';
			echo '<p>Significa que cada linha de código é escrita <em>especialmente para você e seu público final</em>, seguindo todas diretrizes de identidade visual e as boas práticas de programação + otimização para promover o melhor desempenho possível.</p>';
			echo '<p><strong>ZERO USO DE PAGE BUILDERS!</strong>* <br /> Tudo é produzido nos padrões Wordpress e linguagem PHP, com uso mínimo de plugins, promovendo <u>máxima autonima</u>. <i class="far fa-heart"></i></p>';
			echo '<p><a href="#autoral-vs-pagebuilders" data-target="#autoral-vs-pagebuilders" class="button grafite mini abre-modal" data-aos="zoom-in" data-aos-delay="200">Saiba mais</a></p>';
		echo '</div>';

		echo '<div data-aos="fade-left">';
			echo '<ul class="lista-beneficios">';
				echo '<li data-aos="fade-left" data-aos-delay="200"><i class="far fa-gem"></i> Mais refinado</li>';
				echo '<li data-aos="fade-left" data-aos-delay="250"><i class="far fa-shield-check"></i> Mais seguro e durável</li>';
				echo '<li data-aos="fade-left" data-aos-delay="300"><i class="far fa-stopwatch"></i> Maior desempenho</li>';
				echo '<li data-aos="fade-left" data-aos-delay="350"><i class="far fa-hand-sparkles"></i> Limpo e organizado</li>';
				echo '<li data-aos="fade-left" data-aos-delay="400"><i class="far fa-search-plus"></i> SEO <em>friendly</em></li>';
				echo '<li data-aos="fade-left" data-aos-delay="450"><i class="far fa-tachometer-alt-average"></i> Painel personalizado</li>';
			echo '</ul>';

			echo '<p style="margin-top:2em; text-align:center" data-aos="zoom-in" data-aos-delay="550"><a href="'.$urlHome.'contato" class="button rosa medio">Quero fazer orçamento</a></p>';
		echo '</div>';

		// explicacao do que eh codigo autoral
		echo '<div class="modal" id="autoral-vs-pagebuilders" aria-label="Janela de explicação">'; 
			$idPgPost = 5305;
			$mypost = get_post($idPgPost);
			echo '<h2 class="has-text-align-center">'.get_the_title($idPgPost).'</h2>';
			echo '<article>'.apply_filters('the_content',$mypost->post_content).'</article>';
		echo '</div>';
echo '</section>';