<?php get_header(); if (is_user_logged_in()) {
		
echo '<article class="container" id="pagina-briefing">';

	do_action( 'woocommerce_account_navigation' );


	$user = wp_get_current_user(); 
	$cliente = $user->user_firstname;
	$userid = $user->ID;
	$tembriefing = count_user_posts( $userid , 'af_entry' );
	$urlsite = get_bloginfo('url');

	$formADICIONAL = '5785'; // local 5835 
	$formBRIEFING = '5786'; // local 5827

	// captura entradas do form de briefin
	$entries = wpforms()->entry->get_entries(['form_id' => $formBRIEFING]);
	
	
	$clienteEnviouForm = false; // declara 1º como false se enviou form
	foreach ($entries as $entry) {
		if ($entry->user_id == $userid) {
			$clienteEnviouForm = true; // consegue ver se o user enviou o form	
			break;
		}
	}

	if($clienteEnviouForm) {	
		// colocar aqui a condicional para qdo cliente ja enviou briefing
			echo '<blockquote style="border:0;background:var(--cor-negacao);color:white; width:100%;font-size:.8em;">';
			echo '<p class="has-text-align-center"><strong>Você já tem um briefing enviado no sistema, '.$cliente.'!</strong><br>Caso não esteja solicitando um novo projeto, <a href="#briefing-adicional" class="abre-modal" data-target="#briefing-adicional"><strong style="color:white;text-decoration:underline">CLIQUE AQUI</strong></a> e acrescente as informações adicionais ao briefing enviado anteriormente.</p>';
			echo '</blockquote>';

			echo '<div class="modal" id="briefing-adicional">';
				echo '<h2 class="has-text-align-center">Informações adicionais</h2>';
				echo '<article><p>Esqueceu de acrescentar algum detalhe no formulário? Não tem problema! Adicione abaixo as informações adicionais a um formulário que você já enviou. Assim, você não precisará preencher tudo novamente. Será mantido tudo em histórico de email e banco de dados. 😉</p>'.do_shortcode('[wpforms id="'.$formADICIONAL.'"]').'</article>'; 
			echo '</div>'; 
	}	

	if (have_posts()) {
		while (have_posts()) : the_post();
			echo '<article class="sidebar">';
				echo '<h5 class="cursivo saudacoes">Oi, '.$cliente.'!</h5>';
				the_content(); 
			echo '</article>';
		endwhile;
	}		
	
	echo '<div class="form-briefing">';
		echo do_shortcode('[wpforms id="'.$formBRIEFING.'" title="false"]');
	echo '</div>';		

echo '</article>';		
	
} get_footer();