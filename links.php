<?php /* Template Name: Links */
 
echo '<!DOCTYPE html>';
echo '<html lang="pt-BR" dir="ltr">';
echo '<head>';
	echo '<title class="notranslate">'; 
		echo wp_title( '|', true, 'right' ); echo get_bloginfo('name');
	echo '</title>';
get_template_part('inc/metatags');
echo '</head>';
echo '<body class="'.join(' ',get_body_class()).'">';

echo '<main>';

echo '<header id="cabecalho" style="box-shadow: none">';

	echo '<nav class="menu-site" aria-label="Navegação principal do site">';
		echo '<ul id="navegacao" role="navigation">';

			echo '<li id="menu-item-2706" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-2706">';
				echo '<a href="https://afcweb.design/" style="transform: none !important; -webkit-transform: none !important;"><span class="descricao" aria-hidden="true" style="transform:none"><span class="slogan">';
					echo 'Linhas de código em poesia</span> por Ana Flávia Cador</span>';
					echo '<span class="nome" style="background-image: url(\'https://afcweb.design/wp-content/themes/afcwd2021/img/marca-afcwebdesign-splash.svg\')">AFC Web Design</span>';
				echo '</a>';
			echo '</li>';

		echo '</ul>';
	echo '</nav>';

echo '</header>';

if (have_posts()) {
	echo '<article class="container mini-page-insta">';
	while (have_posts()) : the_post();

		the_content();

		if( have_rows('links') ) { $i = 0;
			while ( have_rows('links') ) : $i++; the_row();
				$link = get_sub_field('link'); $cor = get_sub_field('cor');
				echo '<p style="margin-top: 15px;">';
					echo '<a style="'.($cor ? 'background-color:'.$cor.' !important' : '').'" class="button link-bio" href="'.$link['url'].'" target="'.$link['target'].'">'.$link['title'].'</a>';
				echo '</p>';


				if ($i == 2) {
					echo '<div class="area-news">';
						$urlTema = get_template_directory_uri();
						$webp = strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' );
						$extensao = 'jpg';
						if( $webp == true ) $extensao = 'webp';
						echo '<div class="foto" style="background-image: url('.$urlTema.'/img/foto-oficial.'.$extensao.');"></div>';

						echo '<h2 class="cursivo has-text-align-center">conteúdos exclusivos</h2>';
						echo '<p class="has-text-align-center">dicas sobre design, freebies, métodos e ferramentas web para manter a saúde e o ótimo desempenho do seu site!</p>';

						get_template_part('inc/news');

					echo '</div>';
				}
			endwhile;
		}

	endwhile;
	echo '</article>';
}

echo '<footer id="rodape" style="margin-top:5em">';
	echo '<div class="copyright">';
		echo '<div class="container">';
			echo '<div style="width:100%; text-align:center"><strong>AFC Web Design</strong> - CNPJ 24.014.911/0001-36</div>';
		echo '</div>';
	echo '</div>';
echo '</footer>';

echo '</main>';

wp_footer(); // scripts e tudo mais

echo '</body>';
echo '</html>';