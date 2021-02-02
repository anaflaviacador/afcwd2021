<?php

// ========================================//
// SETUP THEME
// ========================================// 
add_action( 'after_setup_theme', 'afc_setup' );
function afc_setup() {

    // seguranca
    add_filter( 'style_loader_src', 'afc_scripts_remove_versao', 9999 );
    add_filter( 'script_loader_src', 'afc_scripts_remove_versao', 9999 );
    add_filter( 'style_loader_src', 'afc_removequerystring', 10, 2 );
    add_filter( 'script_loader_src', 'afc_removequerystring', 10, 2 );
    add_filter( 'script_loader_tag', 'afc_asyncjs', 10, 2);
    add_filter( 'script_loader_tag', 'afc_noasyncjs', 10, 2);
    add_filter( 'style_loader_tag', 'afc_cssnosync', 10, 4); 
    add_filter( 'xmlrpc_enabled', '__return_false');

    // limpeza
    remove_action( 'wp_head', 'wp_shortlink_wp_head', 10);
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'wp_generator_tag' );
    remove_action( 'wp_head', 'wp_resource_hints', 2);
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'feed_links', 2 );
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    remove_action( 'wp_head', 'rest_output_link_wp_head');
    remove_action( 'wp_head', 'wlwmanifest_link');


    if ( class_exists( 'Jetpack' ) ) { 
      add_filter( 'jetpack_implode_frontend_css', '__return_false' );
      add_action( 'wp_print_styles', 'afc_remove_jetpacks' ); 
      add_filter( 'jetpack_enable_open_graph', '__return_false' );
    }

    // layout
    add_action( 'wp_enqueue_scripts', 'afc_load_styles', 999 );
    add_action( 'wp_head', 'afc_load_scripts_head', 999 );
    add_action( 'wp_footer', 'afc_load_scripts_footer', 999 );
    add_filter( 'excerpt_more', 'afc_excerpt_more' );
    add_filter( 'excerpt_length', 'afc_excerpt_length', 999 );
    add_filter( 'body_class', 'afc_body_class' );

    include_once(get_template_directory().'/func/shortcodes.php' );
    include_once(get_template_directory().'/func/thumbs.php' );
    include_once(get_template_directory().'/func/feed-rss.php' );
    include_once(get_template_directory().'/func/projetos-loop.php' );

    // menus
    register_nav_menus( array( 
      'primary' => __( 'Menu principal'),
      'secondary' => __( 'Menu celular'),
      'footer' => __( 'Menu Rodape'),
    ) );

    // loja
    if (class_exists('Woocommerce')) { 
      add_theme_support( 'woocommerce' );
      include_once(get_template_directory().'/func/loja.php' );
    }     
}

// gutenberg
include_once(get_template_directory().'/func/blocks.php' );

// registra post types
include_once(get_template_directory().'/func/pt_portfolio.php' ); // post type - portfolio
include_once(get_template_directory().'/func/pt_depoimentos.php' ); // post type - depoimentos
include_once(get_template_directory().'/func/pt_dicas.php' ); // post type - studio blog
include_once(get_template_directory().'/func/depoimentos.php' ); // depoimentos



if (class_exists('acf') && class_exists('AF')) { 
  include_once(get_template_directory().'/func/acf-forms.php' );
}

/////////////// AREA CLIENTE
include_once(get_template_directory().'/func/config-cliente.php' );


/////////////// PINTEREST
include_once(get_template_directory().'/func/pinterest.php' );


// ========================================//
// PAGINAS WOOCOMMERCE
// ========================================// 
if (class_exists('Woocommerce')) {
  function afc_woocommerce() {
    // creditos: https://webcraft.tools/create-your-own-conditional-tag/
    // condicional para mostrar algo apenas em paginas woocommerce
    global $woocommerce, $post;
    $response = false;

    if (is_shop() || is_woocommerce() || is_product() || is_product_category() || is_product_tag() || is_cart() || is_checkout() || is_account_page()) {
      $response = true;
    }

    return $response;
  }

  function afc_nao_woocommerce() {
    // creditos: https://webcraft.tools/create-your-own-conditional-tag/
    // condicional para mostrar algo apenas em paginas woocommerce
    global $woocommerce, $page;
    $response = false;

    if (! is_shop() && ! is_woocommerce() && ! is_product() && ! is_product_category() && ! is_product_tag() && ! is_cart() && ! is_checkout() && ! is_account_page()) {
      $response = true;
    }

    return $response;
  }
}


// ========================================//
// CUSTOM DASHBOARD ITENS PARA LOGADOS
// ========================================// 
function edit_admin_menus(){
  // global $menu, $submenu;
  // $submenu['edit.php?post_type=private-page'][0][0] = '';

  // remove_menu_page( 'edit.php?post_type=acf-field-group' );
  // remove_menu_page( 'edit-comments.php' );
  // remove_menu_page( 'edit.php?post_type=af_form' );

  add_menu_page('Clientes', 'Clientes', 'manage_options', 'edit.php?post_type=private-page', '', 'dashicons-star-filled', 20 );
  add_submenu_page( 'edit.php?post_type=private-page', 'Paineis', 'Paineis','manage_options', 'edit.php?post_type=private-page');
  add_submenu_page( 'edit.php?post_type=private-page', 'Usuários', 'Usuários', 'manage_options', 'users.php?role=cliente_vip');
  add_submenu_page( 'edit.php?post_type=private-page', 'Briefings', 'Briefings', 'manage_options', 'edit.php?s&post_status=all&post_type=af_entry&action=-1&m=0&entry_form=form_5cc98ff56cee8&filter_action=Filtrar&paged=1&action2=-1');

  add_menu_page('Contatos', 'Contatos', 'manage_options', 'edit.php?s&post_status=all&post_type=af_entry&action=-1&m=0&entry_form=form_5cc611ad7448b&filter_action=Filtrar&paged=1&action2=-1', '', 'dashicons-email', 30 );

}
add_action( 'admin_menu', 'edit_admin_menus', 999 );




// ========================================//
// SCRIPTS E STYLES
// ========================================// 
function afc_load_styles() {  
    // vars
    $urltheme = get_template_directory_uri();
    $urlCDN = '//cdn.jsdelivr.net/npm';

    // layout
    wp_enqueue_style('layout', $urltheme . '/css/layout.css', array(), '', 'all', null); 
    wp_enqueue_style('lazing', $urlCDN . '/aos@2.3.4/dist/aos.css', array(), '', 'all', null);
    
    // jquery
    wp_deregister_script( 'jquery-core' );
    wp_register_script( 'jquery-core', $urlCDN . '/jquery@3.4.1/dist/jquery.min.js', array(), '' );
    wp_deregister_script( 'jquery-migrate' );
    wp_register_script( 'jquery-migrate', $urlCDN . '/jquery-migrate@3.3.1/dist/jquery-migrate.min.js', array(), '' );

    if (is_front_page() || is_post_type_archive('afc_blog')) {
      wp_enqueue_script( 'typewriter', $urlCDN . '/typewriter-effect@2.13.1/dist/core.js', array('jquery-core'), '', true);
    }    

    // scripts
    // wp_enqueue_script( 'ganalytics', $urlCDN . '/ga-lite@2.1.0/dist/ga-lite.min.js', array('jquery-core'), '', false);
    wp_enqueue_script( 'fancybox', $urlCDN . '/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js', array('jquery-core'), '', true);
    wp_enqueue_script( 'lazying', $urlCDN . '/aos@2.3.4/dist/aos.min.js', array('jquery-core'), '', false);
    wp_enqueue_script( 'masonrydepos', $urlCDN . '/masonry-layout@4.2.2/dist/masonry.pkgd.min.js', array('jquery-core'), '', false);
    wp_enqueue_script( 'depoimentos', $urltheme . '/js/depoimentos.js', array('masonrydepos'), '', false);

    // wp_enqueue_script( 'suporte-webp', $urltheme . '/js/webp.js', array(), '', false);

    if (class_exists('Woocommerce')) {
      if(is_checkout()) wp_enqueue_script( 'woo-checkout', $urltheme . '/js/woo-checkout.js', array('jquery-core'), '', true);
    }

    wp_enqueue_script( 'scripts', $urltheme . '/js/scripts.js', array('jquery-core'), '', true);

    if (is_singular('afc_blog')) wp_enqueue_script( 'indice', $urltheme . '/js/indice.js', array('jquery-core'), '', true);
    if (is_page('planos')) wp_enqueue_script( 'planos', $urltheme . '/js/planos.js', array('jquery-core'), '', true);

    // retirando css e js indesejados ou que nao precisam em algumas paginas
    wp_deregister_script( 'comment-reply' );
    wp_deregister_style( 'swpcss' );
    wp_deregister_script( 'swpjs' );
    remove_action('wp_enqueue_scripts', 'add_sendy_scripts'); // retirar scripts do sendy
} 


// colocar scripts assincronos
function afc_asyncjs($tag, $handle) {
   $scripts_to_async = array('fancybox','scripts','indice','planos');
   foreach($scripts_to_async as $async_script) {
      if ($async_script === $handle) {
         return str_replace(' src', ' async src', $tag);
      }
   }
   return $tag;
}

// nao rodar SCRIPT de forma assincrona no LS Cache
function afc_noasyncjs($tag, $handle) {
   $scripts_to_noasync = array('typewriter', 'lazying','masonrydepos','depoimentos');
   foreach($scripts_to_noasync as $async_script) {
      if ($async_script === $handle) {
         return str_replace(' src', ' data-no-async="1" src', $tag);
      }
   }
   return $tag;
}


// nao rodar CSS de forma assincrona no LS Cache
function afc_cssnosync($tag, $handle) {
   $styles_preload = array('layout');
   foreach($styles_preload as $style_preloaded) {
      if ($style_preloaded === $handle) {
         return str_replace('/>', 'data-no-async="1">', $tag);
      }
   }
   return $tag;
}


function afc_load_scripts_head() {
  // SCRIPTS QUE NAO RODA PARA ADMIN
  $user = wp_get_current_user();
  if (!in_array( 'administrator', (array) $user->roles ) ) {

    ////////////// ANALYTICS
    echo '<script async src="https://www.googletagmanager.com/gtag/js?id=UA-10144283-7"></script>';
    echo '<script>window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag(\'js\', new Date()); gtag(\'config\', \'UA-10144283-7\');</script>';

    ////////////// Facebook Pixel Code
    echo '<script>!function(f,b,e,v,n,t,s) {if(f.fbq)return;n=f.fbq=function(){n.callMethod? n.callMethod.apply(n,arguments):n.queue.push(arguments)}; if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version=\'2.0\'; n.queue=[];t=b.createElement(e);t.async=!0; t.src=v;s=b.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s)}(window, document,\'script\', \'https://connect.facebook.net/en_US/fbevents.js\'); fbq(\'init\', \'1002685960227949\'); fbq(\'track\', \'PageView\');</script><noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=1002685960227949&ev=PageView&noscript=1"/></noscript>';

    // rastreia paginas de forma geral
    if (is_front_page() || (is_single() && ! is_singular('afc_blog'))) echo '<script>fbq(\'track\', \'ViewContent\');</script>';

    // rastreia quem acessou a home
    if (is_front_page()) echo '<script>fbq(\'trackCustom\', \'Home\');</script>';

    // rastreia quem leu artigo do blog
    if (is_singular('afc_blog')) echo '<script>fbq(\'trackCustom\', \'PostBlogView\');</script>';

    // rastreia quem buscou entrar em contato
    if (is_page('contato')) echo '<script>fbq(\'track\', \'Contact\');</script>';

    // rastreia quem quis assinar um plano
    if (is_page('planos')) {
        echo '<script>';
            echo 'var planoBasic = document.getElementById(\'assinar-plano-basic\');';
            echo 'var planoStandard = document.getElementById(\'assinar-plano-standard\');';
            echo 'var planoPremium = document.getElementById(\'assinar-plano-premium\');';
            echo 'planoBasic.addEventListener(\'click\', function() { fbq(\'track\', \'Subscribe\', {value: \'90.00\', currency: \'BRL\'}); }, false);';
            echo 'planoStandard.addEventListener(\'click\', function() { fbq(\'track\', \'Subscribe\', {value: \'140.00\', currency: \'BRL\'}); }, false);';
            echo 'planoPremium.addEventListener(\'click\', function() { fbq(\'track\', \'Subscribe\', {value: \'240.00\', currency: \'BRL\'}); }, false);';
            echo 'fbq(\'trackCustom\', \'PlanosAFC\');';
        echo '</script>';        
    }

    // rastreia visualizacoes na loja
    if (class_exists('Woocommerce')) {
      if(is_shop()) echo '<script>fbq(\'trackCustom\', \'ShopView\');</script>';
      if(is_product()) echo '<script>fbq(\'trackCustom\', \'ProdutoView\');</script>';
      if(is_cart()) echo '<script>fbq(\'track\', \'AddToCart\');</script>';
      if(is_checkout()) echo '<script>fbq(\'track\', \'AddPaymentInfo\');</script>';
      if(is_wc_endpoint_url( 'order-received' )) echo '<script>fbq(\'track\', \'Purchase\');</script>'; 
    }
  }
}


function afc_load_scripts_footer() { 
  if(is_singular('etheme_portfolio')) { echo '<script async defer src="//assets.pinterest.com/js/pinit.js"></script>'; }
  if(is_front_page()) {
    echo '<script type="text/javascript" defer data-deferred="1">const instance = new Typewriter(\'#foco-frase\', { strings: [\'o site\',\'a loja\',\'o blog\'],delay: 120,autoStart: true,loop: true});</script>';
  }
  if(is_post_type_archive('afc_blog')) {
    echo '<script type="text/javascript" defer data-deferred="1">const instance = new Typewriter(\'#foco-frase\', { strings: [\'site\',\'e-commerce\',\'blog\'],delay: 120,autoStart: true,loop: true});</script>';
  } 
  if (is_page('planos')) {
  }
  echo '<script type="text/javascript">jQuery(document).ready(function(e){AOS.init({duration:600,easing:"ease-out",once:!0})});</script>';

  // configuracoes da barra de admin, caso exista
  if (is_admin_bar_showing()) {
    echo '<style>';
    echo '#wpadminbar {z-index: 9000; background: var(--cor-roxo-escuro)}';
    echo '@media screen and (max-width: 782px) { html{ margin-top: 0 !important; } body{ margin-top: 46px !important; } }';
    echo '@media screen and (max-width: 600px) { #wpadminbar {position: fixed} }';
    echo '</style>'; 
  }
}


// ========================================//
// RESUMO
// ========================================// 
function afc_excerpt_more( $more ) { return '...'; }
function afc_excerpt_length( $length ) { return 600; }




// ========================================//
// SEGURANCA
// ========================================// 
// remover versão do wp nos scripts 
function afc_scripts_remove_versao( $src ) {
    if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}

// retirar query strings de scripts e css
function afc_removequerystring( $src ) {
 if( strpos( $src, '?ver=' ) )
 $src = remove_query_arg( 'ver', $src );
 return $src;
}


// ========================================//
// MENU
// ========================================// 
remove_filter( 'nav_menu_description', 'strip_tags' );
function afc_menu_html_enabled( $menu_item ) {
    if ( isset( $menu_item->post_type ) ) {
        if ( 'nav_menu_item' == $menu_item->post_type ) {
            $menu_item->description = apply_filters( 'nav_menu_description', $menu_item->post_content );
        }
    }

    return $menu_item;
}
add_filter( 'wp_setup_nav_menu_item', 'afc_menu_html_enabled' );

function prefix_nav_description( $item_output, $item, $depth, $args ) {
    if ( !empty( $item->description ) ) {
        $item_output = str_replace( '">' . $args->link_before . $item->title, '">' . $args->link_before . '<span class="descricao" aria-hidden="true">' . $item->description . '</span><span class="nome">' . $item->title, $item_output.'</span>' ); 
    }
 
    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'prefix_nav_description', 10, 4 );

function afc_menu($local) {   
  wp_nav_menu ( array( 
    'theme_location' => $local, 
    'menu' => $local, 
    'container' => '', 
    'container_class' => '', 
    'container_id' => '', 
    'menu_class' => '', 
    'menu_id' => '', 
    'echo' => true, 
    'fallback_cb' => 'wp_page_menu', 
    'link_before' => '',
    'link_after' => '',
    'items_wrap' => '%3$s', 
    'depth' => 0, 
    'walker' => ''
  )); 
}


// ========================================//
// BODY CLASS
// ========================================// 
function afc_body_class($classes) {
  global $post;
  if ( isset( $post ) ) {
    $classes[] = $post->post_type . '-' . $post->post_name;
  }
    return $classes;
}




// ========================================//
// JETPACK
// ========================================// 
////// removendo scripts e css desnecessarios do jetpack
function afc_remove_jetpacks() {
  wp_deregister_style( 'AtD_style' ); // After the Deadline
  wp_deregister_style( 'jetpack_likes' ); // Likes
  wp_deregister_style( 'jetpack_related-posts' ); //Related Posts
  wp_deregister_style( 'jetpack-carousel' ); // Carousel
  wp_deregister_style( 'grunion.css' ); // Grunion contact form
  wp_deregister_style( 'the-neverending-homepage' ); // Infinite Scroll
  wp_deregister_style( 'infinity-twentyten' ); // Infinite Scroll - Twentyten Theme
  wp_deregister_style( 'infinity-twentyeleven' ); // Infinite Scroll - Twentyeleven Theme
  wp_deregister_style( 'infinity-twentytwelve' ); // Infinite Scroll - Twentytwelve Theme
  wp_deregister_style( 'noticons' ); // Notes
  wp_deregister_style( 'post-by-email' ); // Post by Email
  wp_deregister_style( 'publicize' ); // Publicize
  wp_deregister_style( 'sharedaddy' ); // Sharedaddy
  wp_deregister_style( 'sharing' ); // Sharedaddy Sharing
  wp_deregister_style( 'stats_reports_css' ); // Stats
  wp_deregister_style( 'jetpack-widgets' ); // Widgets
  wp_deregister_style( 'jetpack-slideshow' ); // Slideshows
  wp_deregister_style( 'presentations' ); // Presentation shortcode
  wp_deregister_style( 'jetpack-subscriptions' ); // Subscriptions
  wp_deregister_style( 'tiled-gallery' ); // Tiled Galleries
  wp_deregister_style( 'widget-conditions' ); // Widget Visibility
  wp_deregister_style( 'jetpack_display_posts_widget' ); // Display Posts Widget
  wp_deregister_style( 'gravatar-profile-widget' ); // Gravatar Widget
  wp_deregister_style( 'widget-grid-and-list' ); // Top Posts widget
  wp_deregister_style( 'jetpack-widgets' ); // Widgets
  wp_deregister_style( 'simple-payments' ); // simple-payments.css
}



// ========================================//
// DESABILITA EMOJIS
// ========================================// 
function disable_emojis() {
 remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
 remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
 remove_action( 'wp_print_styles', 'print_emoji_styles' );
 remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
 remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
 remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
 remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
 add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
 add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

function disable_emojis_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}

function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
  if ( 'dns-prefetch' == $relation_type ) {
    $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
    $urls = array_diff( $urls, array( $emoji_svg_url ) );
  }
  return $urls;
}

// ========================================//
// AFFILIATE WP
// ========================================// 
if (class_exists( 'Affiliate_WP' )) {
  include_once(get_template_directory().'/func/affiatewp-fields-pix.php' );
  include_once(get_template_directory().'/func/affiatewp-fields-cpfcnpj.php' );
}