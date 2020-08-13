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
// PRODUTO
// ========================================// 
// adicionar preco original com preco promocional
add_filter( 'woocommerce_get_price_html', 'afc_addpromocao', 10, 2 );
function afc_addpromocao( $price, $product ) {
    if( $product->is_on_sale())
        // return $price . sprintf( __('<p>Save %s</p>'), $product->regular_price - $product->sale_price );
        return '<span class="regular_price">De ' . str_replace( '<ins>', '</span> Por <ins>', $price );
    else
        return $price;
}


// remove botao de add ao carrinho e coloca o link do produto no lugar
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'woocommerce_after_shop_loop_item', 'afcwoo_custom_bt_comprar', 15 );
function afcwoo_custom_bt_comprar() {
    echo '<a href="'.get_permalink().'" class="button">Ver detalhes</a>';
}

// label de oferta / liquidacao
add_filter( 'woocommerce_sale_flash', 'wc_custom_replace_sale_text' );
function wc_custom_replace_sale_text( $html ) {
	return str_replace( __( 'Sale!', 'woocommerce' ), __( 'Liquidação', 'woocommerce' ), $html );
}

// para produtos gratis
add_filter( 'woocommerce_get_price_html', 'afcwoo_preco_free', 100, 2 );
function afcwoo_preco_free( $price, $product ){
    if ( 0 == $product->get_price() ) {
        $price = '<span class="woocommerce-Price-amount amount">Grátis!</span>';
    } 
    return $price;
}

// retirar produtos relacionados
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


// ========================================//
// PAGAMENTO
// ========================================// 
// adicionando CPF para qdo eh compra por deposito
add_filter('woocommerce_bacs_account_fields', function($fields){
    $fields['titular']=array(
        'label'=>'Titular',
        'value'=>'Ana Flávia F C Oliveira &nbsp;&mdash;&nbsp; CPF: 041.551.991-81'
    );
    return $fields;
});


// ========================================//
// CARRINHO
// ========================================// 
// retira campo de endereço e restante de campos desnecessarios para compra de item digital
function wpb_custom_billing_fields( $fields = array() ) {
	unset($fields['billing_company']);
	unset($fields['billing_address_1']);
	unset($fields['billing_address_2']);
	unset($fields['billing_state']);
	unset($fields['billing_city']);
	unset($fields['billing_phone']);
	unset($fields['billing_postcode']);
	unset($fields['billing_country']);
	return $fields;
}
add_filter('woocommerce_billing_fields','wpb_custom_billing_fields');

function custom_override_checkout_fields_ek( $fields ) {
     unset($fields['billing']['billing_company']);
     unset($fields['billing']['billing_address_1']);
     unset($fields['billing']['billing_postcode']);
     unset($fields['billing']['billing_state']);
     return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields_ek', 99 );


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