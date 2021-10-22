<?php

function afc_depoimentos($num = '', $term = '') {

	if(!empty($term)) {
		$args = array(
			'post_type' => 'afc_depoimentos', 
			'order' => 'DESC', 
			'orderby' => 'rand',
			'posts_per_page' => $num, 
			'tax_query' => array(
				array( 'taxonomy' => 'cat_depo', 'terms' => $term ),
			),
		);
	} else {
		$args = array(
			'post_type' => 'afc_depoimentos', 
			'order' => 'DESC', 
			'orderby' => 'rand',
			'posts_per_page' => $num,
		);
	}

	$depo = new WP_Query($args);

	if ( $depo->have_posts() ) { $i = 0;
		while ( $depo->have_posts() ) : $i++; $depo->the_post(); 
			$timer = ($i / 2) * 100;
			str_replace(".", "", $timer);

			$nome = get_the_title();
			$projeto = get_field('projeto');
			$produto = get_field('tema');
			$site = get_field('dominio');

			$nometema = get_the_title($produto);
			if($produto) $nometema = get_field('nome_produto',$produto);



			echo '<div class="depoimento" data-aos="fade-up" data-aos-delay="'.$timer.'">';
				echo '<div class="wrap">';
					echo '<header>';
						if (has_post_thumbnail()) {
							echo '<figure>';
								echo the_post_thumbnail('thumbnail', array('alt' => 'Depoimento de '.$nome.' para o site AFC Web Design'));
							echo '</figure>';
						}

						echo '<hgroup>';
						echo '<h3 class="cursivo">'.$nome.'</h3>';
							if($projeto){
								echo '<h4>Projeto <a href="'.get_the_permalink($projeto).'" data-tooltip="Ver detalhes do projeto">'.get_the_title($projeto).'</a></h4>';
							} elseif ($produto && !is_product()) {
								echo '<h4><a href="'.get_the_permalink($produto).'" data-tooltip="Ver tema na loja do studio">Template '.$nometema.'</a>'; 
								if($site) echo '&nbsp;&nbsp;<a href="'.esc_url($site).'" target="_blank" rel="nofollow noopener" style="color:var(--cor-roxo)!important;" data-tooltip="Veja em ação nesse site"><i class="fas fa-desktop-alt"></i></a>';
								echo '</h4>';
							}
						echo '</hgroup>';
					echo '</header>';
					echo strip_tags(get_the_content());
				echo '</div>';
			echo '</div>';
		endwhile;
	} wp_reset_query();
}