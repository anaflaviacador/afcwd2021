<?php 

add_action('init', 'afc_cpt_depoimentos', 1);  
function afc_cpt_depoimentos(){
	$labels = array(
		'name' => _x('Depoimentos', 'post type general name', 'afcwebdesign'),
		'singular_name' => _x('Depoimento', 'post type singular name', 'afcwebdesign'),
		'add_new' => _x('Add novo', 'depoimento', 'afcwebdesign'),
		'add_new_item' => __('Add novo depoimento', 'afcwebdesign'),
		'edit_item' => __('Editar depoimento', 'afcwebdesign'),
		'new_item' => __('Novo depoimento', 'afcwebdesign'),
		'view_item' => __('Ver depoimento', 'afcwebdesign'),
		'search_items' => __('Buscar', 'afcwebdesign'),
		'not_found' =>  __('Nenhum depoimento encontrado', 'afcwebdesign'),
		'not_found_in_trash' => __('Nenhum depoimento encontrado na lixeira', 'afcwebdesign'),
		'parent_item_colon' => '',
		'menu_name' => 'Depoimentos'
	
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
		'show_in_rest' => false, //habilita gutenberg
		'menu_icon' => 'dashicons-groups',
		'supports' => array('title','editor','thumbnail'),
		'rewrite' => array('slug' => 'depoimentos')
	);
	
	register_post_type('afc_depoimentos',$args);
}
