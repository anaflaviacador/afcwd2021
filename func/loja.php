<?php
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

add_action('admin_menu', 'afc_admin_menus_woo', 999 );
function afc_admin_menus_woo(){
  remove_menu_page( 'wc_stripe' );
  // add_submenu_page( 'woocommerce', 'Cupons desconto', 'Cupons desconto', 'manage_woocommerce', admin_url( 'edit.php?post_type=shop_coupon' ) );
}

// add_action('admin_head', 'afc_fix_css_admin',999 );
// function afc_fix_css_admin() {
//     echo '<style>';
//       echo '.wrap.woocommerce {padding-top: 60px}';
//     echo '</style>';
// }


// ========================================//
// COOKIES
// ========================================// 
add_filter('wc_session_expiring', 'filter_ExtendSessionExpiring' );
add_filter('wc_session_expiration' , 'filter_ExtendSessionExpired' );
function filter_ExtendSessionExpiring($seconds) { return 60 * 60 * 71; }
function filter_ExtendSessionExpired($seconds) { return 60 * 60 * 72; }

// limpa carrinho
add_action( 'init', 'woocommerce_clear_cart_url' );
function woocommerce_clear_cart_url() {
	if ( isset( $_GET['limpar-carrinho'] ) ) {
		// global $woocommerce;
		// $woocommerce->cart->empty_cart();
        WC()->cart->empty_cart();
	}
}

// ========================================//
// GERAL
// ========================================// 
// remover sugestoes de marketplace
add_filter('woocommerce_allow_marketplace_suggestions', '__return_false');

// remove menu de marketing no painel
add_filter( 'woocommerce_marketing_menu_items', '__return_empty_array' );
add_filter( 'woocommerce_admin_features', 'afc_desabilita_mkt_tab' );
function afc_desabilita_mkt_tab( $features ) {
    $marketing = array_search('marketing', $features);
    unset( $features[$marketing] );
    return $features;
}

// desabilita area de admin bar
add_filter( 'woocommerce_admin_disabled', '__return_true' );

// remove mensagem de conectar no WooCommerce.com
add_filter( 'woocommerce_helper_suppress_admin_notices', '__return_true' );

// Disable Ajax Call from WooCommerce
add_action( 'wp_enqueue_scripts', 'dequeue_woocommerce_cart_fragments', 11); 
function dequeue_woocommerce_cart_fragments() { wp_dequeue_script('wc-cart-fragments'); }

// remover ordem de mostra de produtos em dropdown
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

// remove avaliacoes
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );

// remover width e height attributos de thumbnails
add_filter( 'post_thumbnail_html', 'afc_removedimensoes_thumbnail', 10, 3 );
function afc_removedimensoes_thumbnail( $html, $post_id, $post_image_id ) {
	$html = preg_replace( '/(width|height)=\"\d*\"\s/', '', $html );
	return $html;
}

// retirando titulo da loja principal (home)
add_filter( 'woocommerce_show_page_title', '__return_false' );


// ========================================//
// REDIRECIONAMENTOS
// ========================================// 
function afc_redireciona_qdo_loga( $redirect ) {
    $minhaconta = wc_get_page_permalink( 'myaccount' );
    $checkout = wc_get_page_permalink( 'checkout' );
    $carrinho = wc_get_page_permalink( 'cart' );

    // se eh pag de checkou ou carrinho permanece
    if ($redirect == $checkout || $redirect == $carrinho) {
        return $redirect;

    // se eh outra pagina, vai pra conta de cliente
    } else {
        $redirect = $minhaconta;
        return $redirect;
    }
}
add_filter( 'woocommerce_login_redirect', 'afc_redireciona_qdo_loga', 1100, 2 );    

// redireciona quando sai
add_action('wp_logout','afc_redireciona_qdo_sai');
function afc_redireciona_qdo_sai(){
    wp_redirect( home_url() );
    exit;
}

// ========================================//
// PRODUTO
// ========================================// 
// // adicionar preco original com preco promocional
// add_filter( 'woocommerce_get_price_html', 'afc_addpromocao', 10, 2 );
// function afc_addpromocao( $price, $product ) {
//     if( $product->is_on_sale())
//         // return $price . sprintf( __('<p>Save %s</p>'), $product->regular_price - $product->sale_price );
//         return '<span class="regular_price">De ' . str_replace( '<ins>', '</span> Por <ins>', $price );
//     else
//         return $price;
// }


// remove botao de add ao carrinho e coloca o link do produto no lugar
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'woocommerce_after_shop_loop_item', 'afcwoo_custom_bt_comprar', 15 );
function afcwoo_custom_bt_comprar() {
    echo '<a href="'.get_permalink().'" class="button rosa pequeno">Ver detalhes</a>';
}

// label de oferta / liquidacao
add_filter( 'woocommerce_sale_flash', 'wc_custom_replace_sale_text' );
function wc_custom_replace_sale_text( $html ) {
	return str_replace( __( 'Sale!', 'woocommerce' ), __( 'Promoção!', 'woocommerce' ), $html );
}

// para produtos gratis
// add_filter( 'woocommerce_get_price_html', 'afcwoo_preco_free', 100, 2 );
// function afcwoo_preco_free( $price, $product ){
//     if ( 0 == $product->get_price() ) {
//         $price = '<span class="woocommerce-Price-amount amount">Grátis!</span>';
//     } 
//     return $price;
// }

// retirar produtos relacionados
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

// limpa tudo da parte de resumo pra inserir conteudo completo
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
add_filter( 'woocommerce_product_description_heading', '__return_null' );
add_filter( 'woocommerce_product_additional_information_heading', '__return_null' );


// remove area das tabs
// remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);


// inserindo descricao abaixo do bt de compra
add_action( 'woocommerce_single_product_summary', 'afcwoo_wrap_description_tab', 60 );
function afcwoo_wrap_description_tab() {
    echo '<div class="loja-wrap-descricao">';
        woocommerce_template_single_add_to_cart();
        echo '<article style="padding: 0">'; the_content(); echo '</article>';
    echo '</div>';
}


// abas 
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );          // Remove the description tab
    unset( $tabs['reviews'] );          // Remove the reviews tab
    // unset( $tabs['additional_information'] );   // Remove the additional information tab

    return $tabs;
}

// remove metabox do resumo do produto - que eh desenecessario
function remove_excerpt_metabox() {
    remove_meta_box( 'postexcerpt','product','normal'); 
}
add_action('add_meta_boxes','remove_excerpt_metabox', 50);

// preços "a partir de"
add_filter( 'woocommerce_format_price_range', 'afc_custom_range_price', 10, 3 );
function afc_custom_range_price( $price, $from, $to ) {
    return sprintf( 'A partir de %s', wc_price( $from ) );
}


// ========================================//
// MINHA CONTA - NAV
// ========================================// 
// customiza os nomes dos menus da conta do usuario
function afcwoo_menu_cliente() {

    $myorder = array(
        'dashboard'          => __( 'Início', 'woocommerce' ),
        'orders'             => __( 'Pedidos', 'woocommerce' ),   
        'downloads'          => __( 'Downloads', 'woocommerce' ),     
        'edit-account'       => __( 'Dados', 'woocommerce' ),
        // 'subscriptions'      => __( 'Plano', 'woocommerce' ),
    );
    return $myorder;

}
add_filter ( 'woocommerce_account_menu_items', 'afcwoo_menu_cliente' );


// ========================================//
// DETECTA SE HA ASSINATURA
// ========================================// 
if (class_exists('WC_Subscription')) {
    function has_active_subscription( $user_id='' ) {
        // When a $user_id is not specified, get the current user Id
        if( '' == $user_id && is_user_logged_in() ) 
            $user_id = get_current_user_id();

        // User not logged in we return false
        if( $user_id == 0 ) 
            return false;

        return wcs_user_has_subscription( $user_id, '', 'active' );
    }
}


// ========================================//
// CARRINHO
// ========================================// 
// tirar mensagem de carrinho
add_filter( 'wc_add_to_cart_message_html', '__return_null' );

// retira campo de endereço e restante de campos desnecessarios para compra de item digital
function custom_override_checkout_fields_ek( $fields ) {
    // credito: https://rudrastyh.com/woocommerce/reorder-checkout-fields.html

    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_phone']);
    unset($fields['billing']['billing_neighborhood']);
    // unset($fields['billing']['billing_country']);

    $fields['billing']['billing_email']['priority'] = 21;
    $fields['billing']['billing_email']['class'] = array( 'afc-form-row-first' );

    $fields['billing']['billing_cpf']['class'] = array( 'afc-form-row-last' );

    $fields['billing']['billing_number']['placeholder'] = 'Insira S/N se não houver';

    return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields_ek' );

add_filter('woocommerce_default_address_fields', 'override_default_address_checkout_fields', 20, 1);
function override_default_address_checkout_fields( $fields ) {
    $fields['address_1']['placeholder'] = 'Rua / avenida (não precisa de complemento ou bairro)';
    // $fields['postcode']['label'] = 'CEP / Postcode / ZIP';
    return $fields;
}



// adiciona nota dentro dos fields de checkout
add_action( 'woocommerce_form_field_country','afc_checkout_field_alerta_pais', 10, 4 );
function afc_checkout_field_alerta_pais( $field, $key ){
    if ( is_checkout() && ( $key == 'billing_country') ) {
        $field .= '<p class="form-row form-row-wide" style="font-size: 12px; margin: 0 0 11px 0 !important; float: left; line-height: 1.5; clear: both;"><span style="color:var(--cor-negacao)">Obs:</span> Selecionar o país determinará suas opções de pagamento.</p>';
    }
    return $field;
}
// add_action( 'woocommerce_form_field_text','afc_checkout_field_alerta_endereco', 10, 2 );
// function afc_checkout_field_alerta_endereco( $field, $key ){
//     if ( is_checkout() && ( $key == 'billing_address_1') ) {
//         $field .= '<p class="form-row form-row-wide" style="font-size: 12px; width: 100%; margin: -7px 0 11px 0 !important; float: left; line-height: 1.5; clear: both;">Não precisa ter bairro e complemento. Só o logradouro é o suficiente. ;&#41;</p>';
//     }
//     return $field;
// }
    


// remove titulo de nota adicional
add_filter( 'woocommerce_enable_order_notes_field', '__return_false', 9999 );

// removendo possiveis itens do lado do checkout de fechar compra
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );

// imagens de formas de pagamentos
add_filter( 'woocommerce_available_payment_gateways', 'afc_logos_pgto' );
function afc_logos_pgto( $gateways ) {
    if ( isset( $gateways['paghiper_billet'] ) ) $gateways['paghiper_billet']->icon = get_stylesheet_directory_uri() . '/img/logo-boleto-gateway.svg';
    if ( isset( $gateways['paghiper_pix'] ) ) $gateways['paghiper_pix']->icon = get_stylesheet_directory_uri() . '/img/logo-pix-gateway.svg';
    if ( isset( $gateways['juno-credit-card'] ) ) $gateways['juno-credit-card']->icon = get_stylesheet_directory_uri() . '/img/flag-brasil.svg';

        return $gateways;
}

add_filter( 'woocommerce_paypal_icon', 'afc_logos_pgto_pp' ); 
function afc_logos_pgto_pp() { return get_stylesheet_directory_uri() . '/img/logo-paypal-gateway.svg'; }

if (class_exists('WC_Gateway_Stripe')) {
    add_filter( 'wc_stripe_payment_icons', 'afc_logos_pgto_stripe' );
    function afc_logos_pgto_stripe( $icons ) {
        // var_dump( $icons ); // to show all possible icons to change.
        $icons['visa'] = '<img width="20px" src="'.get_stylesheet_directory_uri() . '/img/flag-globe.svg" />';
        $icons['amex'] = ''; $icons['mastercard'] = ''; $icons['discover'] = ''; $icons['diners'] = ''; $icons['jcb'] = ''; $icons['alipay'] = ''; $icons['wechat'] = ''; $icons['bancontact'] = ''; $icons['ideal'] = ''; $icons['p24'] = ''; $icons['giropay'] = ''; $icons['eps'] = ''; $icons['multibanco'] = ''; $icons['sofort'] = ''; $icons['sepa'] = '';

        return $icons;
    }    
}



// mensagem de aviso sobre o nao parcelamento para planos recorrentes
add_action('woocommerce_checkout_before_terms_and_conditions', 'afc_mensagem_para_planos', 999);
function afc_mensagem_para_planos() {
    $time = date('d-m-Y');
    $hoje = date("d",strtotime($time));

    // $valorCart = WC()->cart->get_cart_subtotal();

    $cat_check = false;
    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
        $product = $cart_item['data'];
        
        if ( has_term( 'planos', 'product_cat', $product->id ) ) {
            $cat_check = true;

            $recurring_total = 0;

            foreach ( WC()->cart->cart_contents as $item_key => $item ){
                $item_quantity = $item['quantity'];
                $item_monthly_price = $item['data']->subscription_price;
                $item_recurring_total = $item_quantity * $item_monthly_price;
                $recurring_total += $item_recurring_total; 
            }

            echo '<blockquote class="rosa" style="margin-bottom: 3em; border:0; font-size: 0.8em; color:var(--cor-negacao);"><p> <strong>LEMBRE-SE</strong>: Um plano de assinatura não é o mesmo que uma compra parcelada! Isso significa que será debitado no seu cartão <strong>R$'.$recurring_total.' todo dia '.$hoje.' do mês</strong>. Você pode pedir reembolso apenas nos próximos 7 dias. Após este período não haverá devolução, apenas cancelamento de renovação automática, ok? <a href="'.esc_url(home_url('/')).'servicos/planos#faq" target="_blank" style="color:var(--cor-negacao); text-decoration:underline">Saiba mais aqui</a>.</p></blockquote>';
            break;
        }
    }
}


// botao de pagamento
add_filter( 'woocommerce_order_button_html', 'afc_botao_pagar' );
function afc_botao_pagar( $button_html ) {

    $order_button_text = 'Finalizar pagamento';
    $button_html = '<p class="has-text-align-center" style="width:100%; margin-top:2em"><button type="submit" class="button verde medio" name="woocommerce_checkout_place_order" style="float:none;display:inline-block" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">' . esc_html( $order_button_text ) . '</button></p>';

    return $button_html;
}


// function webroom_hide_coupon_field_on_woocommerce_checkout( $enabled ) {
//     if ( is_checkout() ) $enabled = false;
//     return $enabled;
// }
// add_filter( 'woocommerce_coupons_enabled', 'webroom_hide_coupon_field_on_woocommerce_checkout' );
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );

// ========================================//
// ALEGACAO DE NAO REVENDA FORA DO SITE - qdo eh produto digital
// nao visivel para categorias de planos de manutencao
// ========================================// 
add_action( 'woocommerce_review_order_before_submit', 'afcwoo_inserir_politica', 9 );
function afcwoo_inserir_politica() {

    $cat_check = false;
    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
        $product = $cart_item['data'];
        
        if ( !has_term( 'planos', 'product_cat', $product->id ) ) {
            $cat_check = true;

                woocommerce_form_field( 'aceite_extra', array(
                    'type' => 'checkbox',
                    'class' => array('form-row privacy aceite-extra'),
                    'label_class' => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
                    'input_class' => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
                    'required' => true,
                    'label' => '<label style="line-height: initial; display: initial;">Alego que não irei reproduzir o código-fonte, revender ou disponibilizar os produtos do Studio AFC Web Design para terceiros.</label>',
                    )
                );

            break;
        }
    }
}

add_action( 'woocommerce_checkout_process', 'afcwoo_politica_nao_selecionada' );
function afcwoo_politica_nao_selecionada() {
    $cat_check = false;
    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
        $product = $cart_item['data'];
        
        if ( !has_term( 'planos', 'product_cat', $product->id ) ) {
            $cat_check = true;

            if ( ! (int) isset( $_POST['aceite_extra'] ) ) wc_add_notice( __( '<strong>Você precisa alegar que não irá reproduzir, vender ou disponibilizar os produtos do Studio AFC Web Design!</strong>' ), 'error' );
        }
    }
}
     


// ========================================//
// PEDIDO FINALIZADO
// ========================================// 
// agradecimento
add_filter( 'woocommerce_thankyou_order_received_text', 'misha_thank_you_title', 20, 2 );
function misha_thank_you_title( $thank_you_title, $order ){
    $conta = wc_get_page_permalink('myaccount');
    return '<strong>Pedido recebido. Obrigada, '.$order->get_billing_first_name().'!</strong><br>Acesse sua conta para mais detalhes.<br><a href="'.esc_url($conta).'" class="button alt mini" style="margin-top:4px">acessar conta</a>';
}

// organizacao de colunas de download
function filter_woocommerce_account_downloads_columns( $columns ) {
    $columns['download-product'] = __( 'Produto digital adquirido', 'woocommerce');
    $columns['download-remaining'] = __( 'Limite de download', 'woocommerce');
    $columns['download-expires'] = __( 'Baixar até a data', 'woocommerce');
    $columns['download-file'] = __( 'Arquivo(s)', 'woocommerce');
    return $columns;
}
add_filter( 'woocommerce_account_downloads_columns', 'filter_woocommerce_account_downloads_columns', 10, 1 );


// ========================================//
// RETIRA EXCESSO DE CHAMADAS NAS PÁGINAS QUE NAO SAO DE LOJA
// ========================================// 
add_action( 'wp_enqueue_scripts', 'child_manage_woocommerce_styles', 99 );
function child_manage_woocommerce_styles() {
    //remove generator meta tag
    remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
  
    //first check that woo exists to prevent fatal errors
    if ( function_exists( 'is_woocommerce' ) ) {
        //dequeue scripts and styles
        if ( !is_woocommerce() && !is_cart() && !is_checkout() && !is_account_page() && !is_product() && !is_product_category() && !is_shop() ) {
            wp_dequeue_style('woocommerce-general');
            wp_dequeue_style('woocommerce-layout');
            wp_dequeue_style('woocommerce-smallscreen');
            wp_dequeue_style('woocommerce_frontend_styles');
            wp_dequeue_style('woocommerce_fancybox_styles');
            wp_dequeue_style('woocommerce_chosen_styles');
            wp_dequeue_style('woocommerce_prettyPhoto_css');
            wp_dequeue_style('wc-block-style');
            wp_dequeue_script('wc_price_slider');
            wp_dequeue_script('wc-single-product');
            wp_dequeue_script('wc-add-to-cart');
            wp_dequeue_script('wc-checkout');
            wp_dequeue_script('wc-add-to-cart-variation');
            wp_dequeue_script('wc-single-product');
            wp_dequeue_script('wc-cart');
            wp_dequeue_script('wc-cart-fragments');
            wp_dequeue_script('wc-chosen');
            wp_dequeue_script('woocommerce');
            wp_dequeue_script('prettyPhoto');
            wp_dequeue_script('prettyPhoto-init');
            wp_dequeue_script('jquery-blockui');
            wp_dequeue_script('jquery-placeholder');
            wp_dequeue_script('fancybox');
            wp_dequeue_script('jqueryui');
        }
    }
}

// ========================================//
// RETIRA WIDGETS WOO
// ========================================// 
add_action('widgets_init', 'afc_disable_woocommerce_widgets', 99);
function afc_disable_woocommerce_widgets() {
    unregister_widget('WC_Widget_Products');
    unregister_widget('WC_Widget_Product_Categories');
    unregister_widget('WC_Widget_Product_Tag_Cloud');
    unregister_widget('WC_Widget_Cart');
    unregister_widget('WC_Widget_Layered_Nav');
    unregister_widget('WC_Widget_Layered_Nav_Filters');
    unregister_widget('WC_Widget_Price_Filter');
    unregister_widget('WC_Widget_Product_Search');
    unregister_widget('WC_Widget_Recently_Viewed');
    unregister_widget('WC_Widget_Recent_Reviews');
    unregister_widget('WC_Widget_Top_Rated_Products');
    unregister_widget('WC_Widget_Rating_Filter');
}



