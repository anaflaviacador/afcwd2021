<?php

$webp = strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' );
$extensao = 'jpg';
if( $webp !== false ) $extensao = 'webp';

$urlTema = get_template_directory_uri();
$titulo = '';
$subtitulo = '';


// geral
if (is_page() || (is_single() && ! is_singular('afc_blog') )) {
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

// post types
$post_type_obj = get_post_type_object(get_post_type($post));

if (is_post_type_archive('afc_depoimentos')) {
	$titulo = $post_type_obj->labels->name;
	$subtitulo = 'Experiências de clientes'; 
}
if (is_post_type_archive('etheme_portfolio')) {
	$titulo = $post_type_obj->labels->name;
	$subtitulo = 'Projetos realizados'; 
}
if (is_post_type_archive('afc_blog')) {
	$titulo = 'Dicas do Studio';
	$subtitulo = ''; 
}

if (is_tax('categoria_blog')) {
	$term = get_queried_object();
	$titulo = $term->name;
	$subtitulo = 'artigos relacionados';
}


// pagina privada de cliente
if (is_singular('private-page')) {
	$user = wp_get_current_user(); 
	$titulo = 'Documentos';
	$subtitulo = 'arquivos de projeto';
}


// paginas da loja
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

		if(is_wc_endpoint_url( 'order-received' )) {
			$titulo = 'Pedido recebido';
			$subtitulo = 'muito obrigada!';
		}
	}
	if (is_account_page()) {
		$titulo	= 'Minha Conta';
		$subtitulo = 'área de cliente';
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
if (! is_singular('etheme_portfolio') && ! is_post_type_archive('afc_blog') && ! is_singular('afc_blog')) {
	echo '<header id="titulo-pagina" style="background-image: url('.$urlTema.'/img/foto-oficial.'.$extensao.');">';
		echo '<div class="gradiente" aria-hidden="true"></div>';

		echo '<h1 data-aos="fade-down">'.$titulo.'</h1>';
		if($subtitulo) {echo '<h2 class="cursivo" data-aos="fade-down">'.$subtitulo.'</h2>';}
	echo '</header>';	
}


// titulo de paginas com mais enfase - blog
if (is_post_type_archive('afc_blog')) {
echo '<header id="chamada-principal" class="pag-interna-destaque" style="background-image: url('.$urlTema.'/img/foto-oficial.'.$extensao.');">';
	echo '<div class="gradiente" aria-hidden="true"></div>';

	echo '<h1 data-aos="fade-up">'.$titulo.'</h1>';
		if($subtitulo) {echo '<h2 class="cursivo" data-aos="fade-up" data-aos-delay="100"><span>'.$subtitulo.'</span></h2>';}

	echo '<p class="summary has-text-align-center" data-aos="fade-up" data-aos-delay="100">eleve o nível do seu <span id="foco-frase">site</span> com dicas sobre de gestão,<br> ferramentas, produtividade e empreendedorismo digital</p>';
echo '</header>';
}




