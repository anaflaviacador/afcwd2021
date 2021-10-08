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

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
echo '<li>';
	echo '<figure>';
		echo the_post_thumbnail('shop_catalog', array('data-pin-nopin' => 'true'));
	echo '</figure>';

	echo '<div class="dados">';
		do_action( 'woocommerce_before_shop_loop_item' );

		do_action( 'woocommerce_shop_loop_item_title' );
		do_action( 'woocommerce_after_shop_loop_item_title' );

		echo '<div class="resumo">'.get_the_excerpt().'</div>';
	echo '</div>';

	echo '<div class="bt-info-comprar">';
		if($desc_addon) echo '<a href="#produto-'.$produto_id.'" data-target="#produto-'.$produto_id.'" class="abre-modal saiba-mais"><i class="fas fa-info-circle"></i> Saiba mais</a>';
		do_action( 'woocommerce_after_shop_loop_item' );
	echo '</div>';

	if($desc_addon) {
		echo '<div class="modal detalhes-produto" id="produto-'.$produto_id.'">';
			echo '<header>';
				echo '<div class="titulo">';
				do_action( 'woocommerce_before_shop_loop_item' );
				do_action( 'woocommerce_shop_loop_item_title' );
				do_action( 'woocommerce_after_shop_loop_item_title' );
				echo '</div>';

				do_action( 'woocommerce_after_shop_loop_item' );
			echo '</header>';
			
			echo $desc_addon;


			$attachment_ids = $product->get_gallery_image_ids();
			if ( $attachment_ids && $product->get_image_id() ) {
				echo '<div class="galeria"><h3>Veja os prints</h3>';
				foreach ( $attachment_ids as $attachment_id ) {
					$img_full = wp_get_attachment_image_src($attachment_id,'full');
					echo '<a href="'.$img_full['0'].'" target="new">';
						echo wp_get_attachment_image($attachment_id,'thumbnail'); 
					echo '</a>';
				}
				echo '</div>';
			}

		echo '</div>';
	}
echo '</li>';
