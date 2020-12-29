<?php
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

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
function afc_redireciona_qdo_loga( $redirect, $user ) {
    $user = wp_get_current_user();

    $redirect = '';
    $admin = admin_url();
    $minhaconta = wc_get_page_permalink( 'myaccount' );

    if ( isset( $user->roles ) && is_array( $user->roles ) ) {
        if ( in_array( 'administrator', $user->roles ) ) {
            $redirect = $admin;
        } else {
            $redirect = $minhaconta;
        }
    } else {
        $redirect = $minhaconta;
    }

    return $redirect;
}
add_filter( 'woocommerce_login_redirect', 'afc_redireciona_qdo_loga', 10, 3 );    

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
        // 'subscriptions'      => __( 'Meu Plano', 'woocommerce' ),
    );
    return $myorder;
}
add_filter ( 'woocommerce_account_menu_items', 'afcwoo_menu_cliente' );



// ========================================//
// CARRINHO
// ========================================// 
// tirar mensagem de carrinho
add_filter( 'wc_add_to_cart_message_html', '__return_null' );

// retira campo de endereço e restante de campos desnecessarios para compra de item digital
function wpb_custom_billing_fields( $fields) {
	unset($fields['billing_company']);
	unset($fields['billing_address_1']);
	unset($fields['billing_address_2']);
	unset($fields['billing_state']);
	unset($fields['billing_city']);
    unset($fields['billing_phone']);
    unset($fields['billing_number']); // brazilian market
	unset($fields['billing_neighborhood']); // brazilian market
	unset($fields['billing_postcode']);
	unset($fields['billing_country']);

	return $fields;
}
add_filter('woocommerce_billing_fields','wpb_custom_billing_fields');


function custom_override_checkout_fields_ek( $fields ) {
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_state']);
    unset($fields['order']['order_comments'] );
    unset($fields['shipping']['shipping_first_name']);    
    unset($fields['shipping']['shipping_last_name']);  
    unset($fields['shipping']['shipping_company']);
    unset($fields['shipping']['shipping_address_1']);
    unset($fields['shipping']['shipping_address_2']);
    unset($fields['shipping']['shipping_city']);
    unset($fields['shipping']['shipping_postcode']);
    unset($fields['shipping']['shipping_country']);
    unset($fields['shipping']['shipping_state']);

    $fields['billing']['billing_email']['priority'] = 1;

    // $fields['billing']['billing_number']['required'] = false;
    // $fields['billing']['billing_neighborhood']['required'] = false;

    return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields_ek', 99 );

// remove titulo de nota adicional
add_filter( 'woocommerce_enable_order_notes_field', '__return_false', 9999 );

// removendo possiveis itens do lado do checkout de fechar compra
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );



// pgto de boleto
add_filter( 'woocommerce_available_payment_gateways', 'afc_pgto_boleto' );
function afc_pgto_boleto( $gateways ) {
    if ( isset( $gateways['cod'] ) ) $gateways['cod']->icon = get_stylesheet_directory_uri() . '/img/logo-boleto-gateway.svg';
    return $gateways;
}


// botao de pagamento
add_filter( 'woocommerce_order_button_html', 'afc_botao_pagar' );
function afc_botao_pagar( $button_html ) {

    $order_button_text = 'Finalizar pagamento';
    $button_html = '<p class="has-text-align-center" style="width:100%; margin-top:2em"><button type="submit" class="button verde medio" name="woocommerce_checkout_place_order" style="float:none;display:inline-block" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">' . esc_html( $order_button_text ) . '</button></p>';

    return $button_html;
}



// ========================================//
// PEDIDO FINALIZADO
// ========================================// 
// agradecimento
add_filter( 'woocommerce_thankyou_order_received_text', 'misha_thank_you_title', 20, 2 );
function misha_thank_you_title( $thank_you_title, $order ){
    $conta = wc_get_page_permalink('myaccount');
    $loja = wc_get_page_permalink('shop');
    return '<a href="'.esc_url($downloads).'" class="button bege mini">minha conta</a> <a href="'.esc_url($loja).'" class="button mini">voltar à loja</a><br><br><strong>Muito obrigada pela compra, ' . $order->get_billing_first_name() . '!</strong><br>Segue abaixo detalhes do seu pedido.';
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