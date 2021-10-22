<?php /* Template Name: Simples */
 
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

$urlHome = esc_url(home_url('/'));
$mostraprodutos = get_field('mostrar_produtos');

echo '<header id="cabecalho" style="box-shadow: none">';

	echo '<nav class="menu-site" aria-label="Navegação principal do site">';
		echo '<ul id="navegacao" role="navigation">';

			echo '<li id="menu-item-2706" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-2706">';
				echo '<a href="'.$urlHome.'" style="transform: none !important; -webkit-transform: none !important;"><span class="descricao" aria-hidden="true" style="transform:none"><span class="slogan">';
					echo 'Linhas de código em poesia</span> por Ana Flávia Cador</span>';
					echo '<span class="nome" style="background-image: url(\''.get_template_directory_uri().'/img/marca-afcwebdesign-splash.svg\')">AFC Web Design</span>';
				echo '</a>';
			echo '</li>';

		echo '</ul>';
	echo '</nav>';

echo '</header>';

echo '<article class="container mini-page-insta post-blog"'.($mostraprodutos ? ' style="min-height: initial; margin-bottom: 2em"' : ' style="min-height: calc(100vh - 283px);"').'>';

echo '<h1 style="font-size:1.65em;text-align:center; margin: 0 0 2em;">'; 
	the_title();
echo '</h1>';

if (have_posts()) {
	while (have_posts()) : the_post();
		the_content();
	endwhile;
}

echo '</article>';

if($mostraprodutos) echo '<div class="container">'.do_shortcode('[products category="addons" columns="3"]').'</div>';

echo '<div class="has-text-align-center" style="margin-top:2em"><a href="'.$urlHome.'" class="button"><i class="far fa-long-arrow-left"></i> Voltar ao site</a></div>';


echo '<footer id="rodape" style="margin-top:5em">';
	echo '<div class="copyright">';
		echo '<div class="container">';
			echo '<div style="width:100%; text-align:center">'.date('Y').' &copy; <strong>AFC Web Design</strong> &nbsp;&nbsp;<img width="16px" src="'.get_template_directory_uri().'/img/flag-brasil.svg" alt="AFC Web Design is a brazilian business" title="AFC Web Design is a brazilian business" style="vertical-align: middle;margin-right: 7px;position: relative;top: -1px;" /> CNPJ 24.014.911/0001-36</div>';
		echo '</div>';
	echo '</div>';
echo '</footer>';

echo '</main>';

wp_footer(); // scripts e tudo mais

echo '</body>';
echo '</html>';