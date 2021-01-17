<?php get_header(); 
echo '<section class="container lista-artigos" style="margin-top: 1em !important">';
	if (have_posts()) { $i = 0; 
		while (have_posts()) : $i++; the_post();
			$timer = ($i / 2) * 100;

			echo '<div class="item-post-grid" data-aos="fade-up" data-aos-delay="'.$timer.'">';
				get_template_part('inc/blog-grid');
			echo '</div>';
		endwhile;
	}
echo '</section>';
get_footer(); 