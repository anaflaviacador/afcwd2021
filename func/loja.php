<?php
// ========================================//
// HABILITA WOO
// ========================================// 
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

add_action('admin_menu', 'afc_admin_menus_woo', 999 );
function afc_admin_menus_woo(){
  remove_menu_page( 'wc_stripe' );
}

// evita conflitos de otimizacao de imagem do plugin TinyPNG
if(class_exists('Tiny_Compress')) add_filter( 'woocommerce_background_image_regeneration', '__return_false' );

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


// remove label de promocao
add_filter('woocommerce_sale_flash', 'afc_remove_selo_promo');
function afc_remove_selo_promo() { return false; }

// ========================================//
// REDIRECIONAMENTOS PARA USER DA LOJA
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

// redireciona direto ao carrinho quando add to cart
add_filter('add_to_cart_redirect', 'afc_cart_redirect');
function afc_cart_redirect() {
    global $woocommerce;
    $redirect_checkout = $woocommerce->cart->get_checkout_url();
    return $redirect_checkout;
}


// ========================================//
// LOOP DE PRODUTOS
// ========================================// 
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );


// ========================================//
// PRODUTO
// ========================================// 
// retirar produtos relacionados
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

// limpa tudo no geral da pag
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
add_filter( 'woocommerce_product_description_heading', '__return_null' );
add_filter( 'woocommerce_product_additional_information_heading', '__return_null' );

add_action( 'woocommerce_single_product_summary', 'custom_button_after_product_summary', 15 );
function custom_button_after_product_summary() {
    global $product;
    $ativa_LP = get_field('ativar_lp');
    $demo_principal = get_field('demo_principal');
    $desc_addon = get_field('descricao_extensao');
    $resumo = get_the_excerpt();

    $bt_text = 'comprar';
    if ( has_term( 'servicos-extras', 'product_cat', $product->id ) ) $bt_text = 'contratar';
    elseif ( has_term( 'planos', 'product_cat', $product->id ) ) $bt_text = 'assinar';

    $addcarrinho = '<a class="button mini bege" href="'.$product->add_to_cart_url().'">'.$bt_text.'</a>';


    if($ativa_LP == false) {
        echo '<p style="margin-top:1em">';
            if($demo_principal) echo '<a class="button mini" href="'.$demo_principal['url'].'" target="_blank" title="'.$demo_principal['title'].'">ver em ação</a>&nbsp;&nbsp;';

            if($desc_addon) {
                if(strlen($desc_addon) >= 1000) echo $addcarrinho;
            } else {
                if(strlen($resumo) >= 1000) echo $addcarrinho;
            }

            
        echo '</p>';
    }
}

// remove area das tabs
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);



// preços "a partir de"
add_filter( 'woocommerce_format_price_range', 'afc_custom_range_price', 10, 3 );
function afc_custom_range_price( $price, $from, $to ) {
    return sprintf( 'A partir de %s', wc_price( $from ) );
}

// texto sobre estoque
add_filter( 'woocommerce_get_availability', 'custom_get_availability', 1, 2);
function custom_get_availability( $availability, $_product ) {
    if ($_product->managing_stock() && $_product->is_in_stock() ) $availability['availability'] = __('Serviço disponível por tempo limitado.');

    if ($_product->managing_stock() && !$_product->is_in_stock() ) $availability['availability'] = __('Serviço esgotado. Já já estará de volta!');
    
    return $availability;
}

// bt comprar customizado
add_filter('woocommerce_product_single_add_to_cart_text','afc_custom_add_cart');
function afc_custom_add_cart(){
    global $product;
    $lp = get_field('ativar_lp',$product->ID);
    $nome = get_field('nome_produto',$product->ID);

    if($lp && $nome) {
        return 'Comprar '.$nome.'!';
    } else {

        if ( has_term( 'servicos-extras', 'product_cat', $product->id ) ) return 'Contratar';

        elseif ( has_term( 'planos', 'product_cat', $product->id ) ) return 'Assinar plano';

        return 'Comprar';

        
    }

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
    // unset($fields['billing']['billing_phone']);
    // unset($fields['billing']['billing_neighborhood']);
    // unset($fields['billing']['billing_country']);

    $fields['billing']['billing_neighborhood']['required'] = true;

    $fields['billing']['billing_email']['priority'] = 21;
    $fields['billing']['billing_email']['class'] = array( 'afc-form-row-wide clear' );

    if(is_user_logged_in()) {
        $fields['billing']['billing_email']['label'] = 'E-mail para recebimento dos arquivos';
    } else {
        $fields['billing']['billing_email']['label'] = 'E-mail para conta e recebimento';
    }


    $fields['billing']['billing_address_1']['class'] = array( 'afc-form-row-first' );
    $fields['billing']['billing_number']['class'] = array( 'afc-form-row-last' );
    $fields['billing']['billing_persontype']['class'] = array( 'afc-form-row-first' );
    $fields['billing']['billing_cpf']['class'] = array( 'afc-form-row-last' );
    $fields['billing']['billing_cnpj']['class'] = array( 'afc-form-row-last' );

    $fields['billing']['billing_neighborhood']['class'] = array( 'afc-form-row-wide clear' );

    $fields['billing']['billing_number']['placeholder'] = 'Insira SN se não houver';

    return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields_ek' );

add_filter('woocommerce_default_address_fields', 'override_default_address_checkout_fields', 20, 1);
function override_default_address_checkout_fields( $fields ) {
    $fields['address_1']['placeholder'] = 'Rua / avenida';
    // $fields['postcode']['label'] = 'CEP / Postcode / ZIP';
    return $fields;
}

add_action( 'woocommerce_form_field_tel','afc_checkout_field_alerta_tel', 10, 2 );
function afc_checkout_field_alerta_tel( $field, $key ){
    if ( is_checkout() && ( $key == 'billing_phone') ) {
        $field .= '<p class="form-row form-row-wide" style="font-size: 12px; width: 100%; margin: -7px 0 11px 0 !important; float: left; line-height: 1.5; clear: both;"><span style="color:var(--cor-negacao)">Alerta:</span> caso selecione cartão de crédito, por gentileza, informe o contato que está associado à fatura do cartão utilizado, evitando possíveis bloqueios de pagamento pelo sistema anti-fraude.</p>';
    }
    return $field;
}

// adiciona nota dentro dos fields de checkout
// add_action( 'woocommerce_form_field_country','afc_checkout_field_alerta_pais', 10, 4 );
// function afc_checkout_field_alerta_pais( $field, $key ){
//     if ( is_checkout() && ( $key == 'billing_country') ) {
//         $field .= '<p class="form-row form-row-wide" style="font-size: 12px; margin: 0 0 11px 0 !important; float: left; line-height: 1.5; clear: both;"><span style="color:var(--cor-negacao)">Obs:</span> Selecionar o país determinará suas opções de pagamento.</p>';
//     }
//     return $field;
// }


add_action( 'woocommerce_form_field_email','afc_checkout_field_alerta_email', 10, 2 );
function afc_checkout_field_alerta_email( $field, $key ){
    if ( is_checkout() && ( $key == 'billing_email') && !is_user_logged_in() ) {
        $field .= '<p class="form-row form-row-wide" style="font-size: 12px; width: 100%; margin: -7px 0 11px 0 !important; float: left; line-height: 1.5; clear: both;"><span style="color:var(--cor-negacao)">Obs:</span> Utilize um e-mail que você tenha acesso, pois será por ele que você receberá informações de pedido, arquivos para download, nota fiscal e acesso a área de clientes do site.</p>';
    }
    return $field;
}
    


// mensagens de aviso sobre o nao parcelamento para planos recorrentes, descontos e parcelamentos
add_action( 'woocommerce_review_order_before_payment', 'afc_mensagem_acima_pagamentos' );
function afc_mensagem_acima_pagamentos() {
    $time = date('d-m-Y');
    $hoje = date("d",strtotime($time));
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

            echo '<blockquote class="bege" style="margin-bottom: 3em; font-size: 0.8em;"><p><span style="color:var(--cor-bege);font-weight:bold"><i class="fas fa-info-circle"></i> Lembre-se!</span> <em>Assinar um plano não é o mesmo que parcelar uma compra.</em> Será cobrado do seu cartão <strong style="color:var(--cor-bege);font-weight:bold">R$'.$recurring_total.' sempre no dia '.$hoje.'</strong>, incluindo hoje, e se manterá enquanto sua assinatura estiver ativa. Você pode pedir reembolso apenas nos próximos 7 dias e cancelar a renovação quando quiser, sem tempo mínimo!</p></blockquote>';

            break;

        } else {

            // $valorCart = WC()->cart->get_cart_subtotal();
            $valorCart = WC()->cart->subtotal; // valor sem $

            echo '<blockquote class="verde" style="margin-bottom: 3em; font-size: 0.8em;"><p>';
                echo '<span style="color:var(--cor-verde);font-weight:bold"><i class="fas fa-info-circle"></i> Hey, sunshine!</span>&nbsp;'; 
                if($valorCart < 90 ) echo 'Parcelamos compras acima de R$90 em até 6x sem juros e damos desconto de 10% no Pix para compras acima de R$180!';
                elseif ($valorCart >= 90 && $valorCart < 180) echo 'Damos 10% de desconto no Pix para compras acima de R$180! Você pode parcelar sua compra no cartão de crédito em até 6x sem juros.';
                elseif ($valorCart >= 180) echo '<span style="color:var(--cor-verde)">Pague no cartão em até 6x s/juros ou ganhe 10% OFF no Pix!</span>';
            echo '</p></blockquote>';

        }
    }
 
}


// remove titulo de nota adicional
add_filter( 'woocommerce_enable_order_notes_field', '__return_false', 9999 );

// removendo possiveis itens do lado do checkout de fechar compra
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );

// imagens de formas de pagamentos
add_filter( 'woocommerce_available_payment_gateways', 'afc_logos_pgto' );
function afc_logos_pgto( $gateways ) {
    if ( isset( $gateways['paghiper_billet'] ) ) $gateways['paghiper_billet']->icon = get_stylesheet_directory_uri() . '/img/logo-boleto-gateway.svg';
    if ( isset( $gateways['juno-bank-slip'] ) ) $gateways['juno-bank-slip']->icon = get_stylesheet_directory_uri() . '/img/logo-boleto-gateway.svg';
    if ( isset( $gateways['woo-mercado-pago-ticket'] ) ) $gateways['woo-mercado-pago-ticket']->icon = get_stylesheet_directory_uri() . '/img/logo-boleto-gateway.svg';
    if ( isset( $gateways['paghiper_pix'] ) ) $gateways['paghiper_pix']->icon = get_stylesheet_directory_uri() . '/img/logo-pix-gateway.svg';
    if ( isset( $gateways['juno-pix'] ) ) $gateways['juno-pix']->icon = get_stylesheet_directory_uri() . '/img/logo-pix-gateway.svg';
    if ( isset( $gateways['woo-mercado-pago-pix'] ) ) $gateways['woo-mercado-pago-pix']->icon = get_stylesheet_directory_uri() . '/img/logo-pix-gateway.svg';
    if ( isset( $gateways['juno-credit-card'] ) ) $gateways['juno-credit-card']->icon = get_stylesheet_directory_uri() . '/img/flag-brasil.svg';
    if ( isset( $gateways['pagseguro'] ) ) $gateways['pagseguro']->icon = get_stylesheet_directory_uri() . '/img/logo-pagseguro-gateway.svg';
    // if ( isset( $gateways['paypal-brasil-plus-gateway'] ) ) $gateways['paypal-brasil-plus-gateway']->icon = get_stylesheet_directory_uri() . '/img/flag-globe.svg';

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


// botao de pagamento
add_filter( 'woocommerce_order_button_html', 'afc_botao_pagar' );
function afc_botao_pagar( $button_html ) {

    $order_button_text = 'Finalizar pagamento';
    $button_html = '<p class="has-text-align-center" style="width:100%; margin-top:2em"><button type="submit" class="button afirmacao medio" name="woocommerce_checkout_place_order" style="float:none;display:inline-block" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">' . esc_html( $order_button_text ) . '</button></p>';

    return $button_html;
}

// move cupom de lugar
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
                    'label' => '<label style="line-height: initial; display: initial;">Tenho ciência que minha <span data-tooltip="Licença vitalícia para uso em domínios ilimitados de mesma titularidade + 1 ano de atualizações grátis"><u>licença é instransferível</u></span> e que não posso reproduzir ou distribuir este(s) produto(s) para terceiros.</label>',
                    )
                );

                woocommerce_form_field( 'aceite_extra2', array(
                    'type' => 'checkbox',
                    'class' => array('form-row privacy aceite-extra'),
                    'label_class' => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
                    'input_class' => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
                    'required' => true,
                    'label' => '<label style="line-height: initial; display: initial;">Entendo a <span data-tooltip="Entrega instantânea, considerada de consumo imediato após download."><u>natureza de consumo</u></span> do(s) produto(s) que estou adquirindo e que não tenho direito a <span data-tooltip="O reembolso é possível APENAS se não houver download do produto."><u>reembolso por arrependimento</u></span>.</label>',
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

            if ( ! (int) isset( $_POST['aceite_extra'] ) ) wc_add_notice( __( 'Você precisa alegar que está ciente que sua licença é intransferível e que <strong>não pode reproduzir ou distribuir os produtos do studio</strong> para outras pessoas.' ), 'error' );
            if ( ! (int) isset( $_POST['aceite_extra2'] ) ) wc_add_notice( __( 'Você precisa alegar que está ciente de que <strong>os produtos do studio não entram na categoria da Lei do Arrependimento!</strong>' ), 'error' );
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
    $pedidos = wc_get_account_endpoint_url( 'orders' );
    $downloads = wc_get_account_endpoint_url( 'downloads' );
    return '<strong>Pedido recebido com sucesso! Obrigada, '.$order->get_billing_first_name().'!</strong><br>Acesse seu histórico de pedidos para mais detalhes.<br><a href="'.esc_url($pedidos).'" class="button alt mini" style="margin-top:4px">pedidos</a> &nbsp; <a href="'.esc_url($downloads).'" class="button alt mini" style="margin-top:4px">downloads</a>';
}

// organizacao de colunas de download
function filter_woocommerce_account_downloads_columns( $columns ) {
    $columns['download-product'] = __( 'Produto digital liberado', 'woocommerce');
    // $columns['download-remaining'] = __( 'Nº downloads', 'woocommerce');
    $columns['download-expires'] = __( 'Licença (updates)', 'woocommerce');
    $columns['download-file'] = __( 'Arquivo', 'woocommerce');

    unset($columns['download-remaining']);
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



