<?php
// ========================================//
// ESTILO DA PAG DE LOGIN
// ========================================// 
// url da logo
function afc_login_logo_url() { return home_url(); }
add_filter( 'login_headerurl', 'afc_login_logo_url' );

// texto alt da logo
function afc_login_logo_url_title() { return get_bloginfo('name').' - '.get_bloginfo('description'); }
add_filter( 'login_headertitle', 'afc_login_logo_url_title' );

// css
function afc_login_stylesheet() {
    wp_enqueue_style( 'afc-login', get_stylesheet_directory_uri() . '/css/admin.css' );
}
add_action( 'login_enqueue_scripts', 'afc_login_stylesheet' );

// ========================================//
// REGISTRO E POLITICA DE PRIVACIDADE
// credito: https://wpbrigade.com/add-privacy-policy-checkbox-registration-form/
// ========================================// 
// acordo da politica de privacidade e termos
add_action('register_form', 'afc_register_privacidade', 100);
function afc_register_privacidade() {
    $politicapg = get_permalink( get_option( 'wp_page_for_privacy_policy' ) );
    $termosuso = '';
    if (class_exists('Woocommerce')) {
        $terms_id = get_permalink(wc_terms_and_conditions_page_id());
        if ( $terms_id ) $termosuso = ' e <a href="'.esc_url($terms_id).'" target="_blank">termos de uso</a> do site';
    }
    $html = '<label class="termos-e-politica" for="lp_privacy_policy">'; 
        $html .= '<input type="checkbox" name="lp_privacy_policy" id="lp_privacy_policy" class="checkbox" required="required" />';
        $html .= 'Declaro que li e concordo com a <a href="'.$politicapg.'" target="_blank">política de privacidade</a>'.$termosuso.'.';
    $html .= '</label>';
    echo $html;
}


// adiciona a validacao da politica --- a input precisa estar como obrigatoria
add_filter( 'registration_errors', 'afc_register_privacidade_auth', 10, 3 );
function afc_register_privacidade_auth( $errors, $sanitized_user_login, $user_email ) {
  if ( ! isset( $_POST['lp_privacy_policy'] ) ) {
    $errors->add( 'policy_error', "<strong>ATENÇÃO</strong>: Você precisa informar que leu e está de acordo com a política de privacidade e termos de uso!" );
    return $errors;
  }
  return $errors;
}

// e por ultimo, o registro de log da entrada do usuario
add_action( 'user_register', 'afc_register_privacidade_save' );
function afc_register_privacidade_save( $user_id ) {
  if ( isset( $_POST['lp_privacy_policy'] ) )
     update_user_meta( $user_id, 'lp_privacy_policy', $_POST['lp_privacy_policy'] );
}


// ========================================//
// ULTIMO LOGIN DE USUARIO E DIA DE REGISTRO
// login: https://rudrastyh.com/wordpress/sortable-users-last-login-column.html
// registro: https://rudrastyh.com/wordpress/sortable-date-user-registered-column.html
// ========================================// 
// registra data de registro
// add_action('user_register', 'afc_registra_data_user'); 
// function afc_registra_data_user( $user_id ) {    
//   update_user_meta( $user_id, 'registered', time() ); 
// }

// registra ultimo login
add_action( 'wp_login', 'afc_collect_login_timestamp', 10, 2 );
function afc_collect_login_timestamp( $user_login, $user ) {
	update_user_meta( $user->ID, 'last_login', time() );
}


// cria a coluna na dashboard de usuarios
add_filter( 'manage_users_columns', 'afc_user_last_login_column' );
function afc_user_last_login_column( $columns ) {
	$columns['last_login'] = 'Ultimo login'; // column ID / column Title
  $columns['registration_date'] = 'Cadastrou em'; // add new
	return $columns;
}

add_filter( 'manage_users_custom_column', 'afc_last_login_column', 10, 3 ); 
function afc_last_login_column( $output, $column_name, $user_id ){

  $date_format = 'd/m/Y';
  switch ($column_name) {

      case 'last_login' :
        
        $last_login = get_user_meta( $user_id, 'last_login', true );
        $output = $last_login ? date( $date_format, $last_login ) .'<br><small>' . get_time_ago( $last_login ) .'</small>' : '-';
        return $output;

      case 'registration_date' :

        // $data_registro = get_user_meta( $user_id, 'registered', true );
        // $output = $data_registro ? date( $date_format, $data_registro ) : '-';
        $data_registro = get_the_author_meta( 'user_registered', $user_id );
        $strtotime_registro = strtotime($data_registro);
        
        $output = date_i18n($date_format, $strtotime_registro).'<br><small>' . get_time_ago( $strtotime_registro ) .'</small>';

        return $output;
        
        break;

      default:
  }
  return $output;  
 
}


function get_time_ago( $time ) {
    $time_difference = time() - $time;

    if( $time_difference < 3600 ) { return 'Há poucos minutos'; }
    $condition = array( //12 * 30 * 24 * 60 * 60 =>  'ano',
                30 * 24 * 60 * 60       =>  'mese',
                24 * 60 * 60            =>  'dia',
                60 * 60                 =>  'hora',
                //60                      =>  'minuto',
                //1                       =>  'segundo'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' atrás';
        }
    }
}


// adiciona filtragem
add_filter( 'manage_users_sortable_columns', 'afc_sortable_columns' ); 
function afc_sortable_columns( $columns ) {
	return wp_parse_args( array( 'last_login' => 'last_login', 'registration_date' => 'registered' ), $columns );
}

add_action( 'pre_get_users', 'afc_sort_last_login_column' );
function afc_sort_last_login_column( $query ) {
 
	if( !is_admin() ) { return $query; }
 
	$screen = get_current_screen();
 
	if( isset( $screen->id ) && $screen->id !== 'users' ) { return $query; }
 
	if( isset( $_GET[ 'orderby' ] ) && $_GET[ 'orderby' ] == 'last_login' ) {
		$query->query_vars['meta_key'] = 'last_login';
		$query->query_vars['orderby'] = 'meta_value';
	}
 
	return $query;
}
