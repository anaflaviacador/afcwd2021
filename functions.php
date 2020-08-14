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
    add_filter( 'style_loader_tag', 'afc_cssnosync', 10, 4); 
    // add_filter( 'login_errors', 'no_wordpress_errors' );
    add_filter('xmlrpc_enabled', '__return_false');

    // limpeza
    remove_action( 'wp_head', 'wp_shortlink_wp_head', 10);
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'wp_generator_tag' );
    remove_action( 'wp_head', 'wp_resource_hints', 2);
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'feed_links', 2 );
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    remove_action( 'wp_head', 'rest_output_link_wp_head');
    remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
    remove_action( 'wp_head', 'wlwmanifest_link');


    if ( class_exists( 'Jetpack' ) ) { 
      add_filter( 'jetpack_implode_frontend_css', '__return_false' );
      add_action( 'wp_print_styles', 'afc_remove_jetpacks' ); 
      add_filter( 'jetpack_enable_open_graph', '__return_false' );
    }

    add_action( 'wp_enqueue_scripts', 'afc_load_styles', 999 );
    add_action( 'wp_head', 'afc_load_scripts_head', 999 );
    add_action( 'wp_footer', 'afc_load_scripts_footer', 999 );
    add_filter( 'excerpt_more', 'afc_excerpt_more' );
    add_filter( 'excerpt_length', 'afc_excerpt_length', 999 );
    add_filter( 'body_class', 'afc_body_class' );

    include_once(get_template_directory().'/func/shortcodes.php' );
    include_once(get_template_directory().'/func/thumbs.php' );
    include_once(get_template_directory().'/func/feed-rss.php' );

    // menus
    register_nav_menus( array( 
      'primary' => __( 'Menu principal'),
      'secondary' => __( 'Menu celular'),
    ) );

    // loja
    if (class_exists('Woocommerce')) { 
      add_theme_support( 'woocommerce' );
      include_once(get_template_directory().'/func/loja.php' );
    }    

    // registra portfolio post type
    include_once(get_template_directory().'/func/pt_portfolio.php' ); // post type - portfolio


    // ========================================//
    // HABILITANDO GUTENBERG
    // ========================================//
    add_theme_support( 'align-full' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );
    // add_editor_style( 'css/gutenberg.css' );
    add_theme_support('disable-custom-font-sizes');
    add_theme_support('disable-custom-colors');
    add_theme_support('disable-custom-gradients');    
}
include_once(get_template_directory().'/func/blocks.php' );


if (class_exists('acf') && class_exists('AF')) { 
  include_once(get_template_directory().'/func/acf-forms.php' );
}

/////////////// AREA CLIENTE
include_once(get_template_directory().'/func/config-cliente.php' );

// ========================================//
// CUSTOM DASHBOARD ITENS PARA LOGADOS
// ========================================// 
function edit_admin_menus(){
  // global $menu, $submenu;
  // $submenu['edit.php?post_type=private-page'][0][0] = '';

  // remove_menu_page( 'edit.php?post_type=acf-field-group' );
  remove_menu_page( 'edit-comments.php' );
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
    
    // jquery
    wp_deregister_script( 'jquery-core' );
    wp_register_script( 'jquery-core', $urlCDN . '/jquery@3.4.1/dist/jquery.min.js', array(), '' );
    wp_deregister_script( 'jquery-migrate' );
    wp_register_script( 'jquery-migrate', $urlCDN . '/jquery-migrate@3.3.1/dist/jquery-migrate.min.js', array(), '' );

    // scripts
    wp_enqueue_script('ganalytics', $urlCDN . '/ga-lite@2.1.0/dist/ga-lite.min.js', array(), '', false);
    wp_enqueue_script( 'fancybox', $urlCDN . '/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js', array('jquery-core'), '', true);
    wp_enqueue_script( 'scripts', $urltheme . '/js/scripts.js', array('jquery-core'), '', true);

    // retirando css e js indesejados
    wp_deregister_script( 'comment-reply' );
} 

// colocar scripts assincronos
function afc_asyncjs($tag, $handle) {
   $scripts_to_async = array('ganalytics','fancybox','scripts');
   foreach($scripts_to_async as $async_script) {
      if ($async_script === $handle) {
         return str_replace(' src', ' async src', $tag);
      }
   }
   return $tag;
}


// nao rodar de forma assincrona no LS Cache
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
}


function afc_load_scripts_footer() { 
  // if(is_single()) { echo '<script async defer src="//assets.pinterest.com/js/pinit.js"></script>'; }

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
function afc_excerpt_length( $length ) { return 50; }

function afc_get_excerpt($out_excerpt) {
  while (have_posts()):the_post(); 
    $out_excerpt = str_replace(array("\r\n", "\r", "\n"), "", strip_tags(get_the_excerpt())); 
    echo apply_filters("the_excerpt_rss", $out_excerpt); 
  endwhile;
}




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
// RELACIONADOS
// ========================================// 
function afc_relacionados($post_id, $related_count, $args = array()) {

  $args = wp_parse_args( (array) $args, array(
    'orderby' => 'rand',
    'return'  => 'query', // Valid values are: 'query' (WP_Query object), 'array' (the arguments array)
  ) );

  $post_type = get_post_type( $post_id );
  $post      = get_post( $post_id );

  $term_list  = array();
  $query_args = array();
  $tax_query  = array();
  $taxonomies = get_object_taxonomies( $post, 'names' );

  foreach ( $taxonomies as $taxonomy ) {
    $terms = get_the_terms( $post_id, $taxonomy );
    if ( is_array( $terms ) and count( $terms ) > 0 ) {
      $term_list = wp_list_pluck( $terms, 'slug' );
      $term_list = array_values( $term_list );
      if ( ! empty( $term_list ) ) {
        $tax_query['tax_query'][] = array(
          'taxonomy' => $taxonomy,
          'field'    => 'slug',
          'terms'    => $term_list
        );
      }
    }
  }

  if ( count( $taxonomies ) > 1 ) {
    $tax_query['tax_query']['relation'] = 'OR';
  }

  $query_args = array(
    'post_type'      => $post_type,
    'posts_per_page' => $related_count,
    'post_status'    => 'publish',
    'post__not_in'   => array( $post_id ),
    'orderby'        => $args['orderby']
  );

  if ( $args['return'] == 'query' ) {
    return new WP_Query( array_merge( $query_args, $tax_query ) );
  } else {
    return array_merge( $query_args, $tax_query );
  }

}




// ========================================//
// DESABILITAR GUTENBERG
// ========================================// 
function afc_disable_editor( $id = false ) {

    $excluded_templates = array(
      // 'busca-avancada.php'
    );

    $excluded_ids = array(
        get_option( 'page_on_front' )
    );

    if( empty( $id ) )
        return false;

    $id = intval( $id );
    $template = get_page_template_slug( $id );

    return in_array( $id, $excluded_ids ) || in_array( $template, $excluded_templates );
}

//// Disable Gutenberg by template
function afc_disable_gutenberg( $can_edit, $post_type ) {

    if( ! ( is_admin() && !empty( $_GET['post'] ) ) )
        return $can_edit;

    if( afc_disable_editor( $_GET['post'] ) )
        $can_edit = false;

    return $can_edit;

}
add_filter( 'gutenberg_can_edit_post_type', 'afc_disable_gutenberg', 10, 2 );
add_filter( 'use_block_editor_for_post_type', 'afc_disable_gutenberg', 10, 2 );

//// Disable Classic Editor by template
function afc_disable_classic_editor() {

    $screen = get_current_screen();
    if( 'page' !== $screen->id || ! isset( $_GET['post']) )
        return;

    if( afc_disable_editor( $_GET['post'] ) ) {
        remove_post_type_support( 'page', 'editor' );
    }

}
add_action( 'admin_head', 'afc_disable_classic_editor' );





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
// ESCONDE ERROS DE LOGIN
// ========================================// 
function no_wordpress_errors(){ return 'Algo está errado. Tente novamente!'; }