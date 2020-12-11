<?php

$webp = strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' );
$extensao = 'jpg';
if( $webp == true ) $extensao = 'webp';

$urlTema = get_template_directory_uri();
$titulo = '';
$subtitulo = '';


if (is_page()) {
	$titulo = get_the_title();
	$subtitulo = get_field('subtitulo');
}
if (is_page('briefing')) {
	$subtitulo = 'coleta de dados';
}
if (is_404()) { 
	$titulo = 'Página';
	$subtitulo = 'não encontrada';
}
if (is_search()) {
	$titulo = 'Resultados';
	$subtitulo = 'busca';
}

$post_type_obj = get_post_type_object(get_post_type($post));

if (is_post_type_archive('afc_depoimentos')) {
	$titulo = $post_type_obj->labels->name;
	$subtitulo = 'Experiências de clientes'; 
}
if (is_post_type_archive('etheme_portfolio')) {
	$titulo = $post_type_obj->labels->name;
	$subtitulo = 'Projetos realizados'; 
}

if (is_singular('private-page')) {
	$user = wp_get_current_user(); 
	$titulo = 'Documentos';
	$subtitulo = 'arquivos de projeto';
}

if (class_exists('Woocommerce')) { 
	if (is_shop() || is_woocommerce() || is_product() || is_product_category() || is_product_tag()) {
		$titulo = 'Lojinha';
		$subtitulo = 'do studio';
	}
	if (is_cart()) {
		$titulo = 'Carrinho';
		$subtitulo = 'meus produtos';
	}
	if (is_checkout()) {
		$titulo = 'Pagamento';
		$subtitulo = 'falta pouco!';
	}
	if (is_account_page()) {
		$titulo	= 'Conta';
		$subtitulo = 'área cliente';
	}

	$endpoint = WC()->query->get_current_endpoint();

	if (is_wc_endpoint_url( $endpoint )) {

		if('orders' === $endpoint) $titulo = 'Pedidos';
		if('view-order' === $endpoint) $titulo = 'Histórico';
		if('edit-account' === $endpoint) $titulo = 'Editar conta';
		if('downloads' === $endpoint) $titulo = 'Downloads';
		if('view-subscription' === $endpoint) $titulo = 'Assinatura';
	}
}


// titulos de todas as paginas em geral
if (! is_singular('etheme_portfolio')) {
	echo '<header id="titulo-pagina" style="background-image: url('.$urlTema.'/img/foto-oficial.'.$extensao.');">';
		echo '<div class="gradiente" aria-hidden="true"></div>';

		echo '<h1 data-aos="fade-down">'.$titulo.'</h1>';
		if($subtitulo) {echo '<h2 class="cursivo" data-aos="fade-down">'.$subtitulo.'</h2>';}
	echo '</header>';	
}