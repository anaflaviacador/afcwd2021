<?php get_header(); 
		
if (have_posts()) {
	echo '<article class="container item-artigo">';
	while (have_posts()) : the_post();
		the_content();
	endwhile;
	echo '</article>';
}

get_footer();