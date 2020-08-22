<?php
$urlTema = get_template_directory_uri();
$titulo = '';
$subtitulo = '';

if (is_page()) {
	$titulo = get_the_title();
	$subtitulo = get_field('subtitulo');
}
if (is_404()) { 
	$titulo = 'Página';
	$subtitulo = 'não encontrada';
}
if (is_search()) {
	$titulo = 'Resultados';
	$subtitulo = 'busca';
}
if (is_post_type_archive()) {
	$post_type_obj = get_post_type_object(get_post_type($post));
	$titulo = $post_type_obj->labels->name;

	if (is_post_type_archive('afc_depoimentos')) { $subtitulo = 'Experiências de clientes'; }
	if (is_post_type_archive('etheme_portfolio')) { $subtitulo = 'Projetos realizados'; }
}

// titulos de todas as paginas em geral
if (! is_singular('etheme_portfolio')) {
echo '<header id="titulo-pagina" style="background-image: url('.$urlTema.'/img/foto-oficial.jpg);">';
	echo '<div class="gradiente" aria-hidden="true"></div>';

	echo '<h1 data-aos="fade-down">'.$titulo.'</h1>';
	if($subtitulo) {echo '<h2 class="cursivo" data-aos="fade-down">'.$subtitulo.'</h2>';}
echo '</header>';	
}