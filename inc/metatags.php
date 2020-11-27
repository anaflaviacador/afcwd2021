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

// pinterest
echo '<meta name="p:domain_verify" content="dabe58e86f525dd790cd953954d1b568"/>';
if (! is_singular('etheme_portfolio') ) echo '<meta name="pinterest" content="nopin" description="Visite o Pinterest oficial do studio e salve suas inpirações por lá: https://br.pinterest.com/afcwebdesign" />';

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
    $resumo = wp_strip_all_tags( get_the_excerpt(), true );
    $titulo = get_the_title() .' - '.$nome;

    if (is_singular('etheme_portfolio')) $titulo = get_the_title().' - AFC Web Design | Wordpress Theme Developer';
    
    echo '<meta property="og:title" content="'.$titulo.'">';
    echo '<meta name="twitter:title" content="'.$titulo.'">';
    echo '<meta itemprop="name" content="'.$titulo.'">';

    echo '<meta property="og:description" content="'.$resumo.'">';
    echo '<meta name="description" content="'.$resumo.'">';
    echo '<meta itemprop="description" content="'.$resumo.'">';
    echo '<meta name="twitter:description" content="'.$resumo.'">';
    echo '<meta name="twitter:card" content="'.$resumo.'">';

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

////////////// Facebook Pixel Code
echo '<script>!function(f,b,e,v,n,t,s) {if(f.fbq)return;n=f.fbq=function(){n.callMethod? n.callMethod.apply(n,arguments):n.queue.push(arguments)}; if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version=\'2.0\'; n.queue=[];t=b.createElement(e);t.async=!0; t.src=v;s=b.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s)}(window, document,\'script\', \'https://connect.facebook.net/en_US/fbevents.js\'); fbq(\'init\', \'1002685960227949\'); fbq(\'track\', \'PageView\');</script><noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=1002685960227949&ev=PageView&noscript=1"/></noscript>';

if (is_front_page() || is_singular()) echo '<script>fbq(\'track\', \'ViewContent\');</script>';
if (is_page('contato')) echo '<script>fbq(\'track\', \'Contact\');</script>';
if (is_page('planos')) {
    echo '<script>';
        echo 'var planoBasic = document.getElementById(\'assinar-plano-basic\');';
        echo 'var planoStandard = document.getElementById(\'assinar-plano-standard\');';
        echo 'var planoPremium = document.getElementById(\'assinar-plano-premium\');';
        echo 'planoBasic.addEventListener(\'click\', function() { fbq(\'track\', \'Subscribe\', {value: \'90.00\', currency: \'BRL\'}); }, false);';
        echo 'planoStandard.addEventListener(\'click\', function() { fbq(\'track\', \'Subscribe\', {value: \'140.00\', currency: \'BRL\'}); }, false);';
        echo 'planoPremium.addEventListener(\'click\', function() { fbq(\'track\', \'Subscribe\', {value: \'240.00\', currency: \'BRL\'}); }, false);';
    echo '</script>';        
}

/////////////// Pinterest pixel code
echo '<script>!function(e){if(!window.pintrk){window.pintrk = function () {
window.pintrk.queue.push(Array.prototype.slice.call(arguments))};var n=window.pintrk;n.queue=[],n.version="3.0";var t=document.createElement("script");t.async=!0,t.src=e;var r=document.getElementsByTagName("script")[0]; r.parentNode.insertBefore(t,r)}}("https://s.pinimg.com/ct/core.js"); pintrk(\'load\', \'2614196759086\', {em: \'<user_email_address>\'}); pintrk(\'page\'); pintrk(\'track\', \'pagevisit\');
</script><noscript><img height="1" width="1" style="display:none;" alt="" src="https://ct.pinterest.com/v3/?event=init&tid=2614196759086&pd[em]=<hashed_email_address>&noscript=1" /></noscript>';