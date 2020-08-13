<?php 

add_action('init', 'afc_cpt_portfolio', 1);  

function afc_cpt_portfolio(){
	$labels = array(
		'name' => _x('Portfolio', 'post type general name', 'afcwebdesign'),
		'singular_name' => _x('Projeto', 'post type singular name', 'afcwebdesign'),
		'add_new' => _x('Add novo', 'projeto', 'afcwebdesign'),
		'add_new_item' => __('Add novo projeto', 'afcwebdesign'),
		'edit_item' => __('Editar projeto', 'afcwebdesign'),
		'new_item' => __('Novo projeto', 'afcwebdesign'),
		'view_item' => __('Ver projeto', 'afcwebdesign'),
		'search_items' => __('Buscar', 'afcwebdesign'),
		'not_found' =>  __('Nenhum projeto encontrado', 'afcwebdesign'),
		'not_found_in_trash' => __('Nenhum projeto encontrado na lixeira', 'afcwebdesign'),
		'parent_item_colon' => '',
		'menu_name' => 'Portfolio'
	
	);
	
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'show_in_rest' => true, //habilita gutenberg
		'menu_icon' => 'dashicons-heart',
		'supports' => array('title','editor','author','thumbnail','excerpt','comments'),
		'rewrite' => array('slug' => 'projetos')
	);
	
	register_post_type('etheme_portfolio',$args);
	
	$labels = array(
		'name' => _x( 'Tags', 'taxonomy general name', 'afcwebdesign' ),
		'singular_name' => _x( 'Tag', 'taxonomy singular name', 'afcwebdesign' ),
		'search_items' =>  __( 'Procurar', 'afcwebdesign' ),
		'all_items' => __( 'Todas as tags', 'afcwebdesign' ),
		'parent_item' => __( 'Tag mãe', 'afcwebdesign' ),
		'parent_item_colon' => __( 'Tag mãe:', 'afcwebdesign' ),
		'edit_item' => __( 'Editar', 'afcwebdesign' ),
		'update_item' => __( 'Atualizar', 'afcwebdesign' ),
		'add_new_item' => __( 'Adicionar', 'afcwebdesign' ),
		'new_item_name' => __( 'Novo nome', 'afcwebdesign' ),
	);
	
	// Custom taxonomy for Project Tags
	register_taxonomy('tag',array('etheme_portfolio'), array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'tag' ),
	));
	
	$labels2 = array(
		'name' => _x( 'Categorias', 'taxonomy general name', 'afcwebdesign' ),
		'singular_name' => _x( 'Categoria', 'taxonomy singular name', 'afcwebdesign' ),
		'search_items' =>  __( 'Procurar', 'afcwebdesign' ),
		'all_items' => __( 'Todas as categorias', 'afcwebdesign' ),
		'parent_item' => __( 'Categoria mãe', 'afcwebdesign' ),
		'parent_item_colon' => __( 'Categoria mãe:', 'afcwebdesign' ),
		'edit_item' => __( 'Editar', 'afcwebdesign' ),
		'update_item' => __( 'Atualizar', 'afcwebdesign' ),
		'add_new_item' => __( 'Adicionar', 'afcwebdesign' ),
		'new_item_name' => __( 'Novo nome', 'afcwebdesign' ),
	);
	
	register_taxonomy('categories',array('etheme_portfolio'), array(
		'hierarchical' => true,
		'labels' => $labels2,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'category' ),
	));

}
