<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
$produto_id = get_the_ID();
$desc_addon = get_field('descricao_extensao');
$nomeproduto = get_field('nome_produto');

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
echo '<li>';
	echo '<figure>';
		echo '<a href="'.get_the_permalink( $produto_id ).'">';
		echo the_post_thumbnail('shop_catalog', array('data-pin-nopin' => 'true'));
		echo '</a>';
	echo '</figure>';

	echo '<div class="dados">';
		do_action( 'woocommerce_before_shop_loop_item' );

		if($nomeproduto) echo '<h2 class="woocommerce-loop-product__title">'.$nomeproduto.'</h2>';
		else do_action( 'woocommerce_shop_loop_item_title' );

		do_action( 'woocommerce_after_shop_loop_item_title' );

		echo '<div class="resumo">'.get_the_excerpt().'</div>';
	echo '</div>';

	echo '<div class="bt-info-comprar">';
		if($desc_addon) echo '<a href="#produto-'.$produto_id.'" data-target="#produto-'.$produto_id.'" class="abre-modal saiba-mais"><i class="fas fa-info-circle"></i> Saiba mais</a>';
		do_action( 'woocommerce_after_shop_loop_item' );
	echo '</div>';

	if($desc_addon) {
		echo '<div class="modal detalhes-produto" id="produto-'.$produto_id.'">';
			echo '<header style="padding:10px">';
				echo '<div class="titulo">';
				do_action( 'woocommerce_before_shop_loop_item' );
				do_action( 'woocommerce_shop_loop_item_title' );
				do_action( 'woocommerce_after_shop_loop_item_title' );
				echo '</div>';
				do_action( 'woocommerce_after_shop_loop_item' );
			echo '</header>';

				$attachment_ids = $product->get_gallery_image_ids();
				if ( $attachment_ids && $product->get_image_id() ) {
					echo '<div class="galeria" style="padding:10px"><h3>Veja os prints</h3>';
					foreach ( $attachment_ids as $attachment_id ) {
						$img_full = wp_get_attachment_image_src($attachment_id,'full');
						echo '<a href="'.$img_full['0'].'" class="afczoom" target="new">';
							echo wp_get_attachment_image($attachment_id,'thumbnail'); 
						echo '</a>';
					}
					echo '</div>';
				}

				$demo_principal = get_field('demo_principal');
				if($demo_principal) echo '<p style="padding:10px"><a class="button azul mini" href="'.$demo_principal['url'].'" target="_blank" title="'.$demo_principal['title'].'">ver em ação</a></p>';
			
			echo '<article>'.$desc_addon.'</article>';
		echo '</div>';
	}
echo '</li>';
