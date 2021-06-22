<?php get_header(); if (is_user_logged_in()) {
		
echo '<article class="container" id="pagina-briefing">';

	do_action( 'woocommerce_account_navigation' );


	$user = wp_get_current_user(); 
	$cliente = $user->user_firstname;
	$userid = $user->ID;
	$tembriefing = count_user_posts( $userid , 'af_entry' );
	$urlsite = get_bloginfo('url');

	if ($tembriefing >= 1){
		echo '<blockquote style="border:0;background:var(--cor-negacao);color:white; width:100%;font-size:.8em;">';
		echo '<p class="has-text-align-center">Você já tem briefing preenchido, '.$cliente.'! <a href="'.$urlsite.'/wp-admin/edit.php?s&post_status=publish&post_type=af_entry&author='.$userid.'&action=-1&m=0&entry_form=form_5cc98ff56cee8&filter_action=Filtrar&paged=1&action2=-1" target="_blank" style="color:white;text-decoration:underline"><strong>Clique aqui para editar</strong></a> caso não esteja solicitando mais de um projeto.</p>';
		echo '</blockquote>';
	}
		

	if (have_posts()) {
		while (have_posts()) : the_post();

			echo '<article class="sidebar">';
				echo '<h5 class="cursivo saudacoes">Oi, '.$cliente.'!</h5>';
				the_content(); 
			echo '</article>';
		endwhile;
	}		
	
	echo do_shortcode('[advanced_form form="form_5cc98ff56cee8" ajax="0"]');

echo '</article>';		
	
} get_footer();