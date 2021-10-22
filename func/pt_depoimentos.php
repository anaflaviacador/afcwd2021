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

    // Custom taxonomy for Project Tags
    $tags = array(
        'name' => _x( 'Tipo de serviço', 'taxonomy general name', 'afcwebdesign' ),
        'singular_name' => _x( 'Categoria', 'taxonomy singular name', 'afcwebdesign' ),
        'search_items' =>  __( 'Procurar', 'afcwebdesign' ),
        'all_items' => __( 'Todas as categorias', 'afcwebdesign' ),
        'parent_item' => __( 'Categoria principal', 'afcwebdesign' ),
        'parent_item_colon' => __( 'Categoria mãe:', 'afcwebdesign' ),
        'edit_item' => __( 'Editar', 'afcwebdesign' ),
        'update_item' => __( 'Atualizar', 'afcwebdesign' ),
        'add_new_item' => __( 'Adicionar', 'afcwebdesign' ),
        'new_item_name' => __( 'Nova categoria', 'afcwebdesign' ),
        'menu_name' => 'Tipo de serviço'
    );

    register_taxonomy('cat_depo', array('afc_depoimentos'), array(
        'hierarchical' => true,
        'labels' => $tags,
        'show_ui' => true,
        'query_var' => true,
        'show_admin_column' => true,
        'rewrite' => array( 'slug' => 'cat-depo' ),
    ));
}



/**
 * Display a custom taxonomy dropdown in admin
 * @author Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_action('restrict_manage_posts', 'afc_filter_taxonomy_depo');
function afc_filter_taxonomy_depo() {
    global $typenow;
    $post_type = 'afc_depoimentos'; // change to your post type
    $taxonomy  = 'cat_depo'; // change to your taxonomy
    if ($typenow == $post_type) {
        $selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
        $info_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' => sprintf( __( '%s', 'textdomain' ), $info_taxonomy->label ),
            'taxonomy'        => $taxonomy,
            'name'            => $taxonomy,
            'orderby'         => 'name',
            'selected'        => $selected,
            'show_count'      => true,
            'hide_empty'      => true,
        ));
    };
}
/**
 * Filter posts by taxonomy in admin
 * @author  Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_filter('parse_query', 'afc_filter_taxonomy_depo_query');
function afc_filter_taxonomy_depo_query($query) {
    global $pagenow;
    $post_type = 'afc_depoimentos'; // change to your post type
    $taxonomy  = 'cat_depo'; // change to your taxonomy
    $q_vars    = &$query->query_vars;
    if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
        $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
        $q_vars[$taxonomy] = $term->slug;
    }
}

