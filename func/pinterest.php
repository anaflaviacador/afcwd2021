<?php
require_once(get_template_directory().'/func/simple_html_dom.php');

// credito: https://www.gsarigiannidis.gr/adding-a-div-wrapper-to-gutenberg-s-classic-block/
// credito: https://www.benmayersohn.com/2017/12/filter-the-content-in-wordpress-using-an-html-dom-parser/
// https://simplehtmldom.sourceforge.io/
// https://simplehtmldom.sourceforge.io/manual.htm

add_filter( 'render_block', 'afc_pinar_imgs', 10, 2 );
function afc_pinar_imgs( $block_content, $block ) {
	global $post;

	if ($post->post_type == 'etheme_portfolio' && 'core/image' === $block['blockName'] && ! empty( $block_content ) && ! ctype_space( $block_content ) ) {

		$titulopost = get_the_title();
		$nomesite = get_bloginfo('name');
		$resumo = get_the_excerpt();
		$permalink = urlencode(get_permalink());

		$htmlBlock = str_get_html($block['innerHTML']);
		$imgBlock = $htmlBlock->find('img',0);

		$pinButton = '<a class="pin-button" href="//pinterest.com/pin/create/button/?url='.$permalink.'&media='.esc_url($imgBlock->src).'&description='.$titulopost.' - '.$nomesite.' (Wordpress Theme Developer) |  '.$resumo.'" data-pin-custom="true"><i class="fab fa-pinterest-p" aria-hidden="true"></i> Salvar inspiração</a>';

		$block_content = '<div class="pin-button">'. $block_content . $pinButton .'</div>';

	}

	return $block_content;
}