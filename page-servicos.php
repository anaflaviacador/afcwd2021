<?php get_header(); 
$urlTema = get_template_directory_uri();

echo '<div class="container" id="pagina-servicos">';

	echo '<section class="intro">';
		if (have_posts()) {
			echo '<article data-aos="fade-right">';
			while (have_posts()) : the_post();
				the_content();
			endwhile;
			echo '</article>';
		}

		echo '<div class="plataformas" data-aos="fade-left">';
			echo '<figure class="wp">';
				echo '<img src="'.$urlTema.'/img/wordpress-logo.svg" width="230px" alt="Logo do Wordpress">';
			echo '</figure>';

			echo '<div class="desc wp">Plataforma usada na criação de websites e blogs</div>';
			
			echo '<figure class="woo">';
				echo '<img src="'.$urlTema.'/img/woocommerce-logo.svg" width="210px" alt="Logo do Woocomerce">';
			echo '</figure>';

			echo '<div class="desc woo">Tecnologia utilizada para criação de lojas virtuais no Wordpress</div>';
		echo '</div>';
	echo '</section>';

	get_template_part('inc/codigo-autoral');

	echo '<section id="lista-servicos">';
		echo '<h2 class="cursivo assinado" style="line-height: .3">mais<br />serviços</h2>';
		echo '<ul>';
			echo '<li class="azul" data-aos="fade-up">';
				echo '<header><i class="icone fal fa-bezier-curve"></i>';
				echo '<h3 class="marca-dagua">Design <span aria-hidden="true">layout</span></h3></header>';
				// echo '<div>'; 
					echo '<p>Layout para sites, lojas virtuais, blogs e midia-kits, peças gráficas reutilizáveis para redes sociais e filtros Instagram</p>';
				// echo '</div>';
			echo '</li>';
			echo '<li class="verde" data-aos="fade-up" data-aos-delay="150">';
				echo '<header><i class="icone fal fa-code"></i>';
				echo '<h3 class="marca-dagua">Programação <span aria-hidden="true">desenvolvimento</span></h3></header>';
				// echo '<div>'; 
					echo '<p>Programação em linguagem PHP para plataforma Wordpress ou em linguagem estática (HTML / CSS e javaScript)</p>';
				// echo '</div>';
			echo '</li>';
			echo '<li class="rosa" data-aos="fade-up" data-aos-delay="250">';
				echo '<header><i class="icone fab fa-wordpress"></i>';
				echo '<h3 class="marca-dagua">Manutenção <span aria-hidden="true">suporte e auxílio</span></h3></header>';
				// echo '<div>'; 
					echo '<p>Manutenção periódica Wordpress e assistência ilimitada para clientes da casa enquanto fazem uso de um projeto '.do_shortcode('[afc]').'</p>';
				// echo '</div>';
			echo '</li>';
			echo '<li class="roxo" data-aos="fade-up" data-aos-delay="350">';
				echo '<header><i class="icone fal fa-chart-line"></i>';
				echo '<h3 class="marca-dagua">Otimização <span aria-hidden="true">mehorias</span></h3></header>';
				// echo '<div>'; 
					echo '<p>Análise de layout e sistema Wordpress, com proposta de correções e melhorias para máximo desempenho possível em velocidade e motores de busca</p>';
				// echo '</div>';
			echo '</li>';
			echo '<li class="bege" data-aos="fade-up" data-aos-delay="450">';
				echo '<header><i class="icone fal fa-palette"></i>';
				echo '<h3 class="marca-dagua">Customização <span aria-hidden="true">personalização</span></h3></header>';
				// echo '<div>'; 
					echo '<p>Instalação de templates Wordpress com customização de identidade visual e configurações necessárias para funcionar com máximo desempenho.</p>';
				// echo '</div>';
			echo '</li>';
			echo '<li data-aos="fade-up" data-aos-delay="550">';
				echo '<header><i class="icone fal fa-wrench"></i>';
				echo '<h3 class="marca-dagua">Ferramentas <span aria-hidden="true">facilidades</span></h3></header>';
				// echo '<div>'; 
					echo '<p>Criação de Blocos personalizados para criação de conteúdo no editor Wordpress (5.0+), plugins e ferramentas para ajudar na automação de tarefas.</p>';
				// echo '</div>';
			echo '</li>';
		echo '</ul>';
	echo '</section>';


	echo '<div class="tipos-pagamento">';
		echo '<ul aria-label="Tipos de pagamento">';
			echo '<li data-aos="fade-left">';
				echo '<div class="tipo" aria-hidden="true"><i class="fal fa-credit-card"></i><span>parcele</span></div>';
				echo '<div class="descricao"><p>Aceitamos pagamentos <strong>parcelados em até 12x</strong> no cartão de crédito, ou em até <strong>5x sem juros</strong></p></div>';
			echo '</li>';
			echo '<li data-aos="fade-right">';
				echo '<div class="descricao"><p>Ganhe <strong>desconto de 10%</strong> no pagamento à vista antecipado, ou pague uma entrada e parcele o restante no final</p></div>';
				echo '<div class="tipo" aria-hidden="true"><i class="fal fa-sack-dollar"></i><span>poupe</span></div>';
			echo '</li>';
		echo '</ul>';

		echo '<div class="logos">';
			echo '<img data-aos="zoom-out" src="'.$urlTema.'/img/logo-pagseguro.svg" alt="Aceitamos PagSeguro">';
			echo '<img data-aos="zoom-out" data-aos-delay="150" src="'.$urlTema.'/img/logo-boleto.svg" alt="Pagamentos por boleto bancário">';
			echo '<img data-aos="zoom-out" data-aos-delay="250" src="'.$urlTema.'/img/logo-bb.svg" alt="Transferência ou depósito para Banco do Brasil">';
			echo '<img data-aos="zoom-out" data-aos-delay="350" src="'.$urlTema.'/img/logo-nu.svg" alt="Transferência para NuConta">';
		echo '</div>';
	echo '</div>';

echo '</div>';

get_footer();