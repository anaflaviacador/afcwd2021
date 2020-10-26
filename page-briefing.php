<?php get_header(); if (is_user_logged_in()) {
		
echo '<article class="container" id="pagina-briefing">';

	do_action( 'woocommerce_account_navigation' );
		

	if (have_posts()) {
		while (have_posts()) : the_post();
			$user = wp_get_current_user(); 
			$cliente = $user->user_firstname;

			echo '<article class="sidebar">';
				echo '<h5 class="cursivo saudacoes">Oi, '.$cliente.'!</h5>';
				the_content(); 
			echo '</article>';
		endwhile;
	}		
	
	echo do_shortcode('[advanced_form form="form_5cc98ff56cee8"]');

echo '</article>';		
	
} get_footer();