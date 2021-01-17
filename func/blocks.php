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
	);
}