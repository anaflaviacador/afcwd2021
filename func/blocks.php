<?php

// ========================================//
// HABILITANDO GUTENBERG
// ========================================//
// add_theme_support( 'align-full' );
// add_theme_support( 'align-wide' );
add_theme_support( 'editor-styles' );
add_theme_support( 'responsive-embeds' );
add_editor_style( 'css/gutenberg.css' );
add_theme_support('editor-font-sizes', array());
add_theme_support('disable-custom-colors');
add_theme_support('disable-custom-gradients');   

add_theme_support('editor-gradient-presets', array() );
add_theme_support(
  'editor-color-palette',
  array(
	array( 'name'  => __( 'Texto', 'afcwebdesign' ), 'slug'  => 'texto', 'color' => '#555' ),
	array( 'name'  => __( 'Grafite', 'afcwebdesign' ), 'slug'  => 'grafite', 'color' => '#333' ),
	array( 'name'  => __( 'Cinza', 'afcwebdesign' ), 'slug'  => 'cinza', 'color' => '#f5f5f5' ),
	array( 'name'  => __( 'Rosa', 'afcwebdesign' ), 'slug'  => 'rosa', 'color' => '#d19389' ),
	array( 'name'  => __( 'Rosa medio', 'afcwebdesign' ), 'slug'  => 'rosa-medio', 'color' => '#EBB7AF' ),
	array( 'name'  => __( 'Rosa claro', 'afcwebdesign' ), 'slug'  => 'rosa-claro', 'color' => '#FBF6F6' ),
	array( 'name'  => __( 'Roxo', 'afcwebdesign' ), 'slug'  => 'roxo', 'color' => '#a297b3' ),
	array( 'name'  => __( 'Roxo medio', 'afcwebdesign' ), 'slug'  => 'roxo-medio', 'color' => '#D1C8E2' ),
	array( 'name'  => __( 'Roxo claro', 'afcwebdesign' ), 'slug'  => 'roxo-claro', 'color' => '#F7F5FA' ),
	array( 'name'  => __( 'Roxo escuro', 'afcwebdesign' ), 'slug'  => 'roxo-escuro', 'color' => '#564b66' ),
	array( 'name'  => __( 'Verde', 'afcwebdesign' ), 'slug'  => 'verde', 'color' => '#9e9a6f' ),
	array( 'name'  => __( 'Verde medio', 'afcwebdesign' ), 'slug'  => 'verde-medio', 'color' => '#DDDABD' ),
	array( 'name'  => __( 'Verde claro', 'afcwebdesign' ), 'slug'  => 'verde-claro', 'color' => '#F8F8F4' ),
	array( 'name'  => __( 'Bege', 'afcwebdesign' ), 'slug'  => 'bege', 'color' => '#D1A680' ),
	array( 'name'  => __( 'Bege medio', 'afcwebdesign' ), 'slug'  => 'bege-medio', 'color' => '#F6DAC1' ),
	array( 'name'  => __( 'Bege claro', 'afcwebdesign' ), 'slug'  => 'bege-claro', 'color' => '#FDF9F6' ),
	array( 'name'  => __( 'Azul', 'afcwebdesign' ), 'slug'  => 'azul', 'color' => '#8AA8C4' ),
	array( 'name'  => __( 'Azul medio', 'afcwebdesign' ), 'slug'  => 'azul-medio', 'color' => '#CBD9E5' ),
	array( 'name'  => __( 'Azul claro', 'afcwebdesign' ), 'slug'  => 'azul-claro', 'color' => '#F7F9FB' ),
	array( 'name'  => __( 'Azul escuro', 'afcwebdesign' ), 'slug'  => 'azul-escuro', 'color' => '#4e759a' ),
  )
);

// remove padroes de blocos
remove_theme_support('core-block-patterns');

// ========================================//
// HABILITANDO BLOCOS ESPECIFICOS
// ========================================//
add_filter( 'allowed_block_types', 'afc_allowed_block_types' );
function afc_allowed_block_types( $allowed_blocks ) {
 	// lista de blocos: https://rudrastyh.com/gutenberg/remove-default-blocks.html
	return array(
		'core/spacer',
		'core/image',
		'core/paragraph',
		'core/heading',
		'core/list',
		'core/media-text',
		'core/html',
		'core/gallery',
		'core/code',
		'core/cover',
		'core/quote',
		'core/separator',
		'core/shortcode',
		'core/columns',
		'core/more',
	    'core/buttons',
	    'core/group',
	    'core/block',
	    'core/embed',

		// jetpack
		'jetpack/gif',
		'acf/afcblock-bonus',
	);
}


// ========================================//
// CADASTRANHO BLOCOS - ADVANCED CUSTOM FIELDS
// ========================================//
add_action('acf/init', 'afc_register_blocks');
function afc_register_blocks() {
	if( function_exists('acf_register_block_type') ) {
      acf_register_block_type(array(
        'name'            => 'afcblock-bonus',
        'title'           => esc_html__('Plugins','afcwebdesign'),
        'description'     => esc_html__('Bonus para Clientes VIP','afcwebdesign'),
        'mode'            => 'edit',
        'render_callback' => 'afcblock_bonus',
        'category'        => 'widgets',
        'icon'         	  => 'admin-plugins',
        'keywords'        => array( 'plugin','bonus' ),
        'supports' => array( 
          'align' =>  false,
          'mode' => false,
          'multiple' => true,
          'html' => false,
          'anchor' => false,
          'jsx' => false,
         ),
      ));
  }
}

//////////////// bonus
function afcblock_bonus( $block, $content = '', $is_preview = false ) {
	$id = $block['id'];
	$blocoslug = $block['name'];
	$nomebloco = substr($blocoslug, strrpos($blocoslug, "/") + 1);

	$classes = [];
	if( !empty( $block['className'] ) )
	    $classes = array_merge( $classes, explode( ' ', $block['className'] ) );

	$anchor = '';
	if( !empty( $block['anchor'] ) )
		$anchor = ' id="' . sanitize_title( $block['anchor'] ) . '"';
	
	$align = '';
	if( !empty($block['align']) ) {
	    $align = ' align' . $block['align'];
	}

	$nome = get_field('nome');
	$data = get_field('data');
	$versao = get_field('versao');
	$site = get_field('site');
	$fundo = get_field('fundo');
	$imagem = get_field('imagem');
	$svg = get_field('svg');
	$descricao = get_field('descricao');
	$arquivo = get_field('arquivo');
	$cupom = get_field('cupom');

	echo '<div class="item-servico bloco '.join( ' ', $classes ) . '"' . $anchor . ' style="width: 100%; margin-top:1em">';
		echo '<figure style="background:'.$fundo.'">';
		
			if($imagem && empty($svg)) echo '<img src="'.esc_url($imagem).'">';
			if($svg) echo $svg;

			if($cupom) echo '<figcaption><i class="far fa-tags"></i> '.$cupom.'</figcaption>';
		echo '</figure>';

		echo '<aside>';
			echo '<header>';
				echo '<div class="intro">';
				if($versao) echo 'Versão '.$versao;
				if($data) echo '&nbsp;&nbsp;&bull;&nbsp; Em '.$data;
				echo '</div>';
				echo '<h3>'.$nome; 
					if($site) echo '&nbsp;&nbsp;<a href="'.esc_url($site).'" data-tooltip="Visitar site oficial deste plugin" target="_blank" rel="external noopener nofollow"><i style="color:var(--cor-roxo);" class="fas fa-link"></i></a>';
				echo '</h3>';
			echo '</header>';

			if($descricao) echo $descricao;
			if($arquivo) echo '<p style="margin-top:10px;"><a class="button bege pequeno" href="'.esc_url($arquivo).'" download>Baixar plugin</a></p>';
		echo '</aside>';
	echo '</div>';
} 