<?php
// ========================================//
// ATRIBUINDO CONFIGS PARA QUEM É CLIENTE
// ========================================// 
$user = wp_get_current_user();
if ( in_array( 'cliente_vip', (array) $user->roles ) ) {
  // tirar barra de admin
  show_admin_bar(false);

  // atribuindo acoes ao user
  add_action('admin_title' , 'clientevip_dashboard_title' );
  add_action('init', 'clientevip_change_post_object',999 );
  add_action('admin_menu', 'clientevip_admin_menus', 999 );
  add_action('admin_bar_menu', 'clientevip_bar_menus', 999);
  add_action('wp_dashboard_setup', 'clientevip_dashboard_widgets' );
  add_action('admin_head', 'clientevip_css',999 );
  add_filter('manage_af_entry_posts_columns', 'clientevip_columndash', 999); // manage_POST-TYPE
}

// renomeando private-page da area vip para personalizado
if (class_exists('CL_Client_Portal')) {
  add_action('init', 'afc_change_postype_clientportal',999 );
  function afc_change_postype_clientportal() {
      $get_post_type = get_post_type_object('private-page');
      $labels = $get_post_type->labels;
      $labels->name = 'Minha conta';
      $labels->singular_name = 'Minha conta';
  }
  global $CP_Object; // plugin Client Portal
  remove_filter( 'the_content',array($CP_Object,'cp_add_private_page_info'));
}

// ========================================//
// Tirar nome de "Dashboard" para nome de "Area Cliente"
// ========================================// 
function clientevip_dashboard_title( $admin_title ) {
  global $current_screen, $title;
  
  if( $current_screen->id != 'dashboard' ) { return $admin_title; }
  
  $tituloAreaVip = 'Área Cliente'; // titulo no navegador
  $title = $tituloAreaVip; // titulo no painel

  $admin_title = str_replace( __( 'Painel' ) , $tituloAreaVip , $admin_title );

  return $admin_title;
}


// ========================================//
// Renomeando nomes do post type af_entry do form de briefing
// ========================================// 
function clientevip_change_post_object() {
    $get_post_type = get_post_type_object('af_entry');
    $labels = $get_post_type->labels;

    $labels->name = 'Formulários preenchidos';
    $labels->singular_name = 'Formulário Briefing';
    $labels->edit_item = 'Editar formulário de briefing';
    $labels->search_items = 'Procurar formulário';
}


// ========================================//
// limpando painel de controle
// retirando menus e widgets da dashboard
// ========================================// 
function clientevip_admin_menus(){
  global $menu;  
  $current_user = wp_get_current_user();
  $userid = $current_user->ID;

    remove_menu_page( 'tools.php' );
    remove_menu_page( 'edit.php' );
    remove_menu_page( 'jetpack' );
    remove_menu_page( 'options-general.php' );
    remove_menu_page( 'edit.php?post_type=page' );
    remove_menu_page( 'edit.php?post_type=ticket' );
    remove_menu_page( 'edit.php?post_type=etheme_portfolio' );
    remove_menu_page( 'edit.php?post_type=afctutoriais' );
    remove_menu_page( 'edit.php?post_type=af_form' );

    $tembriefing = count_user_posts( $userid , 'af_entry' );

    if ($tembriefing >= 1) {
      add_menu_page('Briefing', 'Editar briefing', 'edit_posts', 'edit.php?post_type=af_entry', '', 'dashicons-edit', 3 ); 
    }

    // renomear menu de dashboard
    foreach( $menu as $key => $menu_setting ) {
      $menu_slug = $menu_setting[2];

      if( empty( $menu_slug ) ) { continue; }
      if( $menu_slug != 'index.php' ) { continue; }
      
      $menu[ $key ][0] = 'Área Cliente';

      break;
    }    
}


function clientevip_bar_menus($wp_admin_bar) { 
    $wp_admin_bar->remove_node('wp-logo');
    $wp_admin_bar->remove_node('comments');
    $wp_admin_bar->remove_node('updates');
    $wp_admin_bar->remove_node('new-content');
    $wp_admin_bar->remove_node('wpseo-menu');
}

function clientevip_dashboard_widgets() {
    global $wp_meta_boxes;  
    $current_user = wp_get_current_user();
    $nomecliente = $current_user->display_name;

    // retirar widgets dashboard
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['jetpack_summary_widget']);

    // acrescenta widgets dashboard
    wp_add_dashboard_widget('custom_help_widget', 'Olá, '.$nomecliente.'!', 'custom_dashboard_help');
}

function custom_dashboard_help() {
  $current_user = wp_get_current_user();
  $userid = $current_user->ID;
  $tembriefing = count_user_posts( $userid , 'af_entry' );

  if ($tembriefing == 0) { echo '<p>Você ainda não enviou o seu briefing. <a href="https://afcweb.design/minha-conta/briefing">Preencha-o aqui!</a></p>'; }
  elseif($tembriefing == 1) { 
    echo '<p><strong>Navegue pelo menu ao lado para editar seu formulário de briefing.</strong></p>';
    echo '<p>Você tem 1 briefing preenchido.</p>';
  }
  elseif($tembriefing >= 2) { 
    echo '<p><strong>Navegue pelo menu ao lado para editar seus formulários de briefing.</strong></p>';
    echo '<p>Você tem '.$tembriefing.' briefing preenchidos.</p>';
  }


  echo '<a class="button button-primary" href="'.get_bloginfo('url').'/minha-conta">Voltar ao site</a>';
}


// ========================================//
// CSS da dashboard interna do cliente
// ========================================// 
function clientevip_css() {
    echo '<style>';
      echo '#tinypng_dashboard_widget, #wpseo-dashboard-overview, #post-body-content, .page-title-action, .subsubsub, #slugdiv, #screen-meta-links {display: none;}';
      echo '.manage-column.column-primary {width: 125px}';
      echo '.manage-column.column-editarform {width: 60px}';
      echo '@media (max-width: 782px) { .column-editarform, .manage-column.column-editarform {display: none !important; visibility: hidden; height: 0px !important; padding: 0px !important; margin: 0px !important;} }';
    echo '</style>';
}


// ========================================//
// organizando area de colunas do painel de edicao dos forms
// ========================================// 
function clientevip_columndash($columns) {
    $columns = array(
      'cb' => $columns['cb'],
      'editarform' => __( 'Ação' ),
      'title' => __( 'ID Formulário' ),
      'nomeprojeto' => __( 'Nome' ),
      'tipo' => __( 'Categoria' ),
      'dominio' => __( 'Domínio' ),
      'nfse' => __( 'NFS-e' ),
      // 'date' => __( 'Data' ),
      // 'author' => __( 'Por' ),
    );
    return $columns;  
}

if ( in_array( 'administrator', (array) $user->roles ) ) {
  add_filter('manage_af_entry_posts_columns', 'admin_clientevip_columndash', 999); // manage_POST-TYPE
  function admin_clientevip_columndash($columns) {
      $columns = array(
        'cb' => $columns['cb'],
        // 'editarform' => __( 'Ação' ),
        'title' => __( 'ID Formulário' ),
        'nomeprojeto' => __( 'Nome' ),
        'tipo' => __( 'Categoria' ),
        'dominio' => __( 'Domínio' ),
        'nfse' => __( 'NFS-e' ),
        'date' => __( 'Data' ),
        'author' => __( 'Por' ),
      );
      return $columns;  
  }
}

add_action('manage_af_entry_posts_custom_column', 'clientevip_columndash_content', 10, 2);
function clientevip_columndash_content($column_name) {
    global $post, $page;
    $idpost = $post->ID;

    if ($column_name == 'editarform') {
      echo '<a class="button button-primary" href="'.get_bloginfo('url').'/wp-admin/post.php?post='.$idpost.'&action=edit">Editar</a>';
    }
    if ($column_name == 'nomeprojeto') { echo get_field('bform_nome',$idpost); }
    if ($column_name == 'tipo') { echo get_field('bform_estr',$idpost); }
    if ($column_name == 'dominio') { echo get_field('bform_link',$idpost); }
    if ($column_name == 'nfse') { 
      if (get_field('bform_nfse',$idpost)) {
        echo 'Sim';
      } else { echo '-'; }
    }
}

