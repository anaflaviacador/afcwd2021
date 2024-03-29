<?php

function afc_projeto($thumb = '', $excerpt = '') {
	global $post;
	$permalink = get_the_permalink();
	$title = get_the_title();

	echo '<a href="'.get_the_permalink().'">';
		echo the_post_thumbnail($thumb, array('data-pin-nopin' => 'true', 'alt' => 'Projeto '.$title.', por AFC Web Design'));

		echo '<summary>';
			echo '<div class="categoria">';
				$terms = wp_get_post_terms($post->ID, 'tag');
				if ($terms) {
				  $out = array();
				  foreach ($terms as $term) {
				      $out[] = $term->name;
				  }
				  echo join( ' + ', $out );
				}			
			echo '</div>';
			echo '<h2>'.$title.'</h2>';

			if ($excerpt) {
				echo '<p>'.trim(strip_tags(mb_substr(get_the_excerpt(), 0,$excerpt))).'...</p>';	
			}	

			echo '<span class="conhecer">conhecer projeto</span>';		
		echo '</summary>';
	echo '</a>';	
}