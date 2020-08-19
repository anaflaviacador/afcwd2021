<?php

function afc_depoimentos($num = '') {
	$args = array('post_type' => 'afc_depoimentos', 'orderby' => 'RAND', 'posts_per_page' => $num);
	$depo = new WP_Query($args);

	if ( $depo->have_posts() ) { $i = 0;
		while ( $depo->have_posts() ) : $i++; $depo->the_post(); 
			$timer = $i * 2;
			$nome = get_the_title();
			$projeto = get_field('projeto');

			echo '<li class="projeto-'.$i.'" data-aos="fade-up" data-aos-delay="'.$timer.'00">';
				echo '<header>';
					if (has_post_thumbnail()) {
						echo '<figure><img src="'; afc_thumb('thumbnail');  echo '" alt="'.$nome.'"></figure>';
					}

					echo '<h2 class="cursivo">'.$nome.'</h2>';
					if($projeto){
						echo '<h3>Projeto <a href="'.get_the_permalink($projeto).'">'.get_the_title($projeto).'</a></h3>';
					}
				echo '</header>';
				echo strip_tags(get_the_content());
			echo '</li>';
		endwhile;
	}
}