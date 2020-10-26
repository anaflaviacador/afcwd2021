<?php 
echo '<!--[if lt IE 9]><script src="//cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script><![endif]-->';
echo '<meta http-equiv="Content-Type" content="text/html; image/svg+xml; charset='.get_bloginfo('charset').' ">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">';
echo '<meta name="theme-color" content="#6A607C" />';
echo '<meta name="msapplication-navbutton-color" content="#6A607C">';

$url = get_bloginfo('url');
$nome = get_bloginfo('name');
$descricao = get_bloginfo('description');
$tema = get_template_directory_uri();

echo '<meta property="og:site_name" content="'.$nome.'">';

//////////////// perfis
echo '<meta property="fb:admins" content="100001760930781">';
echo '<meta property="article:author" content="https://www.facebook.com/anaflaviacador">';
echo '<meta property="article:publisher" content="https://www.facebook.com/anaflaviacador">';
echo '<meta property="fb:profile_id" content="100001760930781">';  
echo '<meta property="fb:app_id" content="256251604417279">';

// logo
echo '<meta itemprop="logo" content="'.$tema.'/screenshot.png">';


//////////////// definir metatags se eh home ou outras pags
if(is_home() || is_front_page()) {

    echo '<meta name="description" content="'.$descricao.'">';
    echo '<meta itemprop="description" content="'.$descricao.'">';
    echo '<meta property="og:type" content="website">';
    echo '<meta property="og:title" content="'.$nome.'">';
    echo '<meta property="og:url" content="'.$url.'">';
    echo '<meta property="og:description" content="'.$descricao.'">';

    echo '<meta property="og:image" content="'.$tema.'/screenshot.png">';

    echo '<meta name="twitter:domain" content="'.$url.'">';
    echo '<meta name="twitter:card" content="'.$descricao.'">';
    echo '<meta name="twitter:description" content="'.$descricao.'">';
    echo '<meta name="twitter:url" content="'.$url.'">';
    echo '<meta name="twitter:title" content="'.$nome.'">';
    echo '<meta name="twitter:image" content="'.$tema.'/screenshot.png">';

    echo '<meta itemprop="url" content="'.$url.'">';
    echo '<link rel="canonical" href="'.$url.'">';
    echo '<meta property="og:url" content="'.$url.'">';


} elseif(is_post_type_archive('etheme_portfolio')) { 

    echo '<meta name="description" content="Conheça meus projetos de web design realizados em Wordpress">';
    echo '<meta property="og:type" content="website">';
    echo '<meta property="og:title" content="Portfolio - '.$nome.'">';
    echo '<meta property="og:url" content="https://afcweb.design/projetos/">';
    echo '<meta property="og:description" content="Conheça meus projetos de web design realizados em Wordpress">';

    echo '<meta name="twitter:domain" content="https://afcweb.design/projetos/">';
    echo '<meta name="twitter:card" content="Conheça meus projetos de web design realizados em Wordpress">';
    echo '<meta name="twitter:description" content="Conheça meus projetos de web design realizados em Wordpress">';
    echo '<meta name="twitter:url" content="https://afcweb.design/projetos/">';
    echo '<meta name="twitter:title" content="Portfolio - '.$nome.'">';

    echo '<meta property="og:image" content="'.$tema.'/screenshot.png">';
    echo '<meta name="twitter:image" content="'.$tema.'/screenshot.png">';
    echo '<meta itemprop="image" content="'.$tema.'/screenshot.png">';

    echo '<meta itemprop="url" content="https://afcweb.design/projetos/">';
    echo '<link rel="canonical" href="https://afcweb.design/projetos/">';
    echo '<meta property="og:url" content="https://afcweb.design/projetos/"> ';
   
} elseif(is_search()) {

    echo '<meta name="description" content="Busca por: '.get_search_query().'">';
    echo '<meta itemprop="description" content="Busca por: '.get_search_query().'">';
    echo '<meta property="og:type" content="website">';
    echo '<meta property="og:title" content="Busca por: '.get_search_query().'">';
    echo '<meta property="og:url" content="'.$url.'/?s='.get_search_query().'">';
    echo '<meta property="og:description" content="Busca por: '.get_search_query().'">';

    echo '<meta property="og:image" content="'.$tema.'/screenshot.png">';

    echo '<meta name="twitter:domain" content="'.$url.'/?s='.get_search_query().'">';
    echo '<meta name="twitter:card" content="Busca por: '.get_search_query().'">';
    echo '<meta name="twitter:description" content="Busca por: '.get_search_query().'">';
    echo '<meta name="twitter:url" content="'.$url.'/?s='.get_search_query().'">';
    echo '<meta name="twitter:title" content="Busca por: '.get_search_query().'">';
    echo '<meta name="twitter:image" content="'.$tema.'/screenshot.png">';

    echo '<meta itemprop="url" content="'.$url.'/?s='.get_search_query().'">';
    echo '<link rel="canonical" href="'.$url.'/?s='.get_search_query().'">';
    echo '<meta property="og:url" content="'.$url.'/?s='.get_search_query().'">';

} elseif(is_singular('')) {

    echo '<meta property="og:title" content="'; echo single_post_title(); echo '">';
    echo '<meta name="twitter:title" content="'; echo single_post_title(); echo '">';
    echo '<meta itemprop="name" content="'; echo single_post_title(); echo '">';

    echo '<meta property="og:description" content="'; echo afc_get_excerpt(''); echo '">';
    echo '<meta name="description" content="'; echo afc_get_excerpt(''); echo '">';
    echo '<meta itemprop="description" content="'; echo afc_get_excerpt(''); echo '">';
    echo '<meta name="twitter:description" content="'; echo afc_get_excerpt(''); echo '">';
    echo '<meta name="twitter:card" content="'; echo afc_get_excerpt(''); echo '">';

    echo '<meta property="article:published_time" content="'.get_the_time('c').'">';

    echo '<meta name="twitter:domain" content="'.$url.'">';
    echo '<meta name="twitter:url" content="'.get_the_permalink().'">';

    echo '<meta property="og:url" content="'.get_the_permalink().'">';
    echo '<meta name="twitter:url" content="'.get_the_permalink().'">';
    echo '<meta itemprop="url" content="'.get_the_permalink().'">';
    echo '<link rel="canonical" href="'.get_the_permalink().'">';

    echo '<meta property="og:type" content="article">';
    echo '<meta property="article:published_time" content="'.get_the_time('Y-m-d h:i').'">';

        if (is_singular('post')) {
            $category = get_the_category(); if($category[0]) { echo '<meta property="article:section" content="'.$category[0]->cat_name.'">';} 
            $posttags = get_the_tags(); if ($posttags) { echo '<meta property="article:tag" content="'; foreach($posttags as $tag) : echo $tag->name . ','; endforeach; echo '">'; }            
        }

        echo '<meta property="article:author" content="https://www.facebook.com/anaflaviacador">';
        echo '<meta property="article:publisher" content="https://www.facebook.com/anaflaviacador">';

        global $post;
        if ( ! has_post_thumbnail( $post->ID ) ) {
            echo '<meta property="og:image" content="'.$tema.'/screenshot.png">';
            echo '<meta name="twitter:image" content="'.$tema.'/screenshot.png">';
            echo '<meta itemprop="image" content="'.$tema.'/screenshot.png">';
        } else {
            echo '<meta property="og:image" content="'.afc_thumb('full').'">';
            echo '<meta name="twitter:image" content="'.afc_thumb('full').'">';
            echo '<meta itemprop="image" content="'.afc_thumb('full').'">';
        }
}

if (class_exists('Woocommerce')) {
    $loja = wc_get_page_permalink( 'shop' );
    if(is_shop()) {
        echo '<meta property="og:type" content="website">';
        echo '<meta property="og:image" content="'.$tema.'/screenshot.png">';
        echo '<meta itemprop="url" content="'.$loja.'">';
        echo '<link rel="canonical" href="'.$loja.'">';
        echo '<meta property="og:url" content="'.$loja.'">';   
    }
}


//////////////// wp head para itens de plugins
wp_head();

/////////////// favicon
if (has_site_icon()) {
    echo '<link rel="icon" type="image/png" href="'.get_site_icon_url().'?vs=2" />';
    echo '<link rel="icon" type="mage/x-icon" href="'.get_site_icon_url().'?vs=2" />';
    echo '<link rel="apple-touch-icon-precomposed" href='.get_site_icon_url().'?vs=2" />';
    echo '<link rel="shortcut icon" type="image/png" href="'.get_site_icon_url().'?vs=2" />';
    echo '<link rel="shortcut icon" type="mage/x-icon" href="'.get_site_icon_url().'?vs=2" />';
    echo '<meta name="msapplication-TileImage" content="'.get_site_icon_url().'?vs=2" />';   
} else {
    echo '<link rel="shortcut icon" href="https://afcweb.design/wp-content/uploads/2017/12/favicon.png">';
}

////////////// analytics
// echo "<script>var galite = galite || {};galite.UA = 'UA-10144283-7';</script>";