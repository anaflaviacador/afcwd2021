<?php 

add_action('init', 'afc_cpt_dicas', 1);  

function afc_cpt_dicas(){
	$labels = array(
		'name' => _x('Blog', 'post type general name', 'afcwebdesign'),
		'singular_name' => _x('Artigo', 'post type singular name', 'afcwebdesign'),
		'add_new' => _x('Adicionar novo', 'artigo', 'afcwebdesign'),
		'add_new_item' => __('Adicionar novo artigo', 'afcwebdesign'),
		'edit_item' => __('Editar artigo', 'afcwebdesign'),
		'new_item' => __('Novo artigo', 'afcwebdesign'),
		'view_item' => __('Ver artigo', 'afcwebdesign'),
		'search_items' => __('Buscar', 'afcwebdesign'),
		'not_found' =>  __('Nenhum artigo encontrado', 'afcwebdesign'),
		'not_found_in_trash' => __('Nenhum artigo encontrado na lixeira', 'afcwebdesign'),
		'parent_item_colon' => '',
		'menu_name' => 'Studio Blog',
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
		'hierarchical' => true,
		'show_in_rest' => true, //habilita gutenberg
		'menu_icon' => 'dashicons-lightbulb',
		'menu_position' => 5,
		'can_export' => true,
		'exclude_from_search' => false,
		'taxonomies' => array( 'categoria_blog' ),
		'supports' => array('title','editor','thumbnail','excerpt','comments'),
		'rewrite' => array('slug' => 'blog')
	);
	
	register_post_type('afc_blog',$args);
	

    $catArgs = array(
        'name' => _x( 'Assunto', 'taxonomy general name', 'afcwebdesign' ),
        'singular_name' => _x( 'Assunto', 'taxonomy singular name', 'afcwebdesign' ),
        'search_items' =>  __( 'Procurar', 'afcwebdesign' ),
        'all_items' => __( 'Todos os Assuntos', 'afcwebdesign' ),
        'parent_item' => __( 'Assunto principal', 'afcwebdesign' ),
        'parent_item_colon' => __( 'Assunto mãe:', 'afcwebdesign' ),
        'edit_item' => __( 'Editar', 'afcwebdesign' ),
        'update_item' => __( 'Atualizar', 'afcwebdesign' ),
        'add_new_item' => __( 'Adicionar', 'afcwebdesign' ),
        'new_item_name' => __( 'Novo Assunto', 'afcwebdesign' ),
        'menu_name' => 'Categorias'
    );
    register_taxonomy('categoria_blog', array('afc_blog'), array(
        'hierarchical' => true,
        'labels' => $catArgs,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'tudo-sobre' ),
    ));	

}
