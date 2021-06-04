<?php

$idpost = get_the_ID();
$titulo = get_the_title();
$permalink = get_the_permalink();
$categorias = get_the_terms($idpost,'categoria_blog');


 echo '<header>';
	 echo the_post_thumbnail('afc_blog_thumb', array('data-pin-nopin' => 'true', 'alt' => $titulo));
 	// echo '<div class="gradiente" aria-hidden="true"></div>';
 	echo '<a href="'.$permalink.'" aria-hidden="true" class="link"></a>';

 	if ($categorias && ! is_wp_error($terms)) {
 		echo '<div class="temas">';
 		foreach($categorias as $categoria) { 
			echo '<a href="'.get_term_link($categoria).'" class="button mini grafite">'.$categoria->name.'</a>';
		}
		echo '</div>';
 	}
 echo '</header>';

 echo '<article>';
 	echo '<h3>'.$titulo.'</h3>';
 	echo '<p>'.strip_tags(get_the_excerpt()).'</p>';
 echo '</article>';

 echo '<footer>';
 	echo '<a href="'.$permalink.'">Ler artigo</a>';
 	echo '<a href="'.$permalink.'" aria-hidden="true" title="Ler artigo"><i class="far fa-long-arrow-right"></i></a>';
 echo '</footer>';
