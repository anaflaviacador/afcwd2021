<?php get_header(); 
$urlTema = get_template_directory_uri();
$urlHome = esc_url(home_url('/'));

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
				echo '<img data-pin-nopin="true" src="'.$urlTema.'/img/wordpress-logo.svg" width="230px" alt="Logo do Wordpress">';
			echo '</figure>';

			echo '<div class="desc wp">Plataforma usada na criação de websites e blogs</div>';
			
			echo '<figure class="woo">';
				echo '<img data-pin-nopin="true" src="'.$urlTema.'/img/woocommerce-logo.svg" width="210px" alt="Logo do Woocomerce">';
			echo '</figure>';

			echo '<div class="desc woo">Tecnologia utilizada para criação de lojas virtuais no Wordpress</div>';
		echo '</div>';
	echo '</section>';


	echo '<section id="lista-servicos">';
		// echo '<h2 class="cursivo assinado" style="line-height: .3">serviços</h2>';
		echo '<ul>';

			echo '<li class="roxo" data-aos="fade-up">';
				echo '<header><i class="icone fal fa-bezier-curve"></i>';
				echo '<h3 class="marca-dagua">Design <span aria-hidden="true">layout</span></h3></header>';
					echo '<p>Projeto de layout para websites, lojas virtuais, blogs, media kits, peças gráficas e templates para mídias sociais.</p>';
				// echo '<footer><a href="'.$urlHome.'projetos" class="button pequeno">ver trabalhos</a></footer>';
			echo '</li>';

			echo '<li class="azul" data-aos="fade-up" data-aos-delay="150">';
				echo '<header><i class="icone fal fa-code"></i>';
				echo '<h3 class="marca-dagua">Programação <span aria-hidden="true">desenvolvimento</span></h3></header>';
					echo '<p>Programação para plataforma Wordpress (back-end) ou em linguagem estática (front-end).</p>';
				// echo '<footer><a href="'.$urlHome.'projetos" class="button pequeno azul">ver trabalhos</a></footer>';
			echo '</li>';

			echo '<li class="verde" data-aos="fade-up" data-aos-delay="250">';
				echo '<header><i class="icone fab fa-wordpress"></i>';
				echo '<h3 class="marca-dagua">Manutenção <span aria-hidden="true">suporte e auxílio</span></h3></header>';
					echo '<p>Manutenção mensal e assistência ilimitada para clientes da casa durante o uso de um produto '.do_shortcode('[afc]').'.</p>';
				echo '<footer><a href="'.$urlHome.'servicos/planos" class="button pequeno verde">ver planos</a></footer>';
			echo '</li>';

			// echo '<li class="roxo" data-aos="fade-up" data-aos-delay="350">';
			// 	echo '<header><i class="icone fal fa-chart-line"></i>';
			// 	echo '<h3 class="marca-dagua">Otimização <span aria-hidden="true">mehorias</span></h3></header>';
			// 		echo '<p>Análise de layout e sistema Wordpress, com proposta de correções e melhorias para máximo desempenho possível em velocidade e motores de busca</p>';
			// echo '</li>';

			// echo '<li class="bege" data-aos="fade-up" data-aos-delay="450">';
			// 	echo '<header><i class="icone fal fa-palette"></i>';
			// 	echo '<h3 class="marca-dagua">Customização <span aria-hidden="true">personalização</span></h3></header>';
			// 		echo '<p>Instalação de templates Wordpress com customização de identidade visual e configurações necessárias para funcionar com máximo desempenho.</p>';
			// echo '</li>';

			echo '<li class="bege" data-aos="fade-up" data-aos-delay="350">';
				echo '<header><i class="icone fal fa-wrench"></i>';
				echo '<h3 class="marca-dagua">Ferramentas <span aria-hidden="true">facilidades</span></h3></header>';
					echo '<p>Criação de blocos personalizados para editor Wordpress e ferramentas para auxiliar automação de tarefas.</p>';
				// echo '<footer><a href="'.$urlHome.'contato" title="" class="button pequeno bege">solicite</a></footer>';
			echo '</li>';
		echo '</ul>';
	echo '</section>';

	get_template_part('inc/codigo-autoral');


	$args = array('post_type' => 'etheme_portfolio', 'posts_per_page' => 6);
	$publicacoes = new WP_Query($args);
	if ( $publicacoes->have_posts() ) { $i = 0;
		echo '<section class="container" id="projetos-principais"><h2 class="cursivo assinado">projetos</h2><div class="lista-posts"><ul>';
		while ( $publicacoes->have_posts() ) : $i++; $publicacoes->the_post(); 
			echo '<li itemscope itemtype="http://schema.org/CreativeWork" data-aos="fade-up" class="projeto-'.$i.' mostra-projeto">';
				afc_projeto('large');
			echo '</li>';
		endwhile;
		echo '</ul></div><div class="bt"><a data-aos="fade-up" href="'.$urlHome.'projetos" class="button">ver portfolio</a></div></section>';
	} wp_reset_query();

	echo '<div class="tipos-pagamento">';
		echo '<ul aria-label="Tipos de pagamento">';
			echo '<li data-aos="fade-left">';
				echo '<div class="tipo" aria-hidden="true"><i class="fal fa-credit-card"></i><span>parcele</span></div>';
				echo '<div class="descricao"><p>Parcele seu projeto <strong>em até 12x</strong>* no cartão de crédito.<br><span style="font-size: 12px">* Há cobrança de juros, ok? Solicite uma simulação para seu orçamento.</span></p></div>';
			echo '</li>';
			echo '<li data-aos="fade-right">';
				echo '<div class="descricao"><p>Super <strong>desconto no pagamento à vista</strong>* antecipado por PIX ou boleto. Há também como pagar uma entrada e parcelar o restante!<br><span style="font-size: 12px">*Desconto de até 20% em relação ao parcelamento.</span></p></div>';
				echo '<div class="tipo" aria-hidden="true"><i class="fal fa-sack-dollar"></i><span>poupe</span></div>';
			echo '</li>';
		echo '</ul>';

		// echo '<div class="logos">';
		// 	echo '<img data-pin-nopin="true" data-aos="zoom-out" src="'.$urlTema.'/img/logo-paypal.svg" alt="Aceitamos Paypal">';
		// 	echo '<img data-pin-nopin="true" data-aos="zoom-out" data-aos-delay="150" src="'.$urlTema.'/img/logo-cartoes.svg" alt="Aceitamos cartões de crédito">';
		// 	echo '<img data-pin-nopin="true" data-aos="zoom-out" data-aos-delay="250" src="'.$urlTema.'/img/logo-boleto.svg" alt="Aceitamos pagamentos por boleto bancário">';
		// 	// echo '<img data-pin-nopin="true" data-aos="zoom-out" data-aos-delay="350" src="'.$urlTema.'/img/logo-nu.svg" alt="Aceitamos pagamento por transferência para NuConta">';
		// 	echo '<img data-pin-nopin="true" data-aos="zoom-out" data-aos-delay="350" src="'.$urlTema.'/img/logo-stripe.svg" alt="Aceitamos pagamento por Stripe">';
		// 	echo '<img data-pin-nopin="true" data-aos="zoom-out" data-aos-delay="450" src="'.$urlTema.'/img/logo-pix.svg" alt="Aceitamos pagamento por transferência Pix">';
		// echo '</div>';
	echo '</div>';	

echo '</div>';


get_footer();