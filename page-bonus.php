<?php get_header(); 


echo '<article class="container">';

if (is_user_logged_in()) {

	do_action( 'woocommerce_account_navigation' );

	$clientevip = array('cliente_vip','administrator');
	$user = wp_get_current_user(); 
	$cliente = $user->user_firstname;
	$userid = $user->ID;

	
	if (have_posts() && array_intersect($clientevip, $user->roles )) {
		while (have_posts()) : the_post();
			echo '<section class="container area-artigo" style="margin-top:0">';
				echo '<div class="colmaior">';

					echo '<blockquote class="roxo" style="margin-bottom:2em; font-size:0.8em">';
						echo '<p style="text-align:center; margin-bottom:10px;">Todos os materiais abaixo são à pronta-instalação via Painel Wordpress, em <strong>formato .zip</strong>. Saiba como instalar e atualizar qualquer plugin manualmente seguindo tutorial abaixo.</p>';
						echo '<p style="margin-bottom:0;text-align:center;">
						<a href="https://afcwebdesign.freshdesk.com/support/solutions/articles/70000255816" target="_blank" rel="noopener" class="button pequeno">Como instalar</a></p>';
					echo '</blockquote>';

					// echo '<hr>';

					the_content();

					
				echo '</div>';

				echo '<aside class="colmenor">';
					echo '<p style="margin-bottom:20px; color:var(--cor-negacao); line-height:1.4">🙋🏻‍♀️ <strong>Primeira coisa, leia aqui com atenção '.$cliente.'!</strong> 👇🏻</p>';
					echo '<p style="font-size:.8em;margin-bottom:10px">Os plugins e materiais ao lado são uma cortesia que o studio fornece apenas clientes que fazem uso de um layout exclusivo! São ferramentas de <em>categoria premium</em> que ajudam o seu site ser mais poderoso do que já é. 💜✨</p>';
					
					echo '<p style="font-size:.8em;margin-bottom:10px">Todos os plugins são adquiridos em nome do studio e se enquadram como <a href="https://www.gnu.org/philosophy/free-sw.pt-br.html" target="_blank" rel="external noopener nofollow">software livre</a>.</p>';
					echo '<p style="font-size:.8em;margin-bottom:10px"><em style="color:var(--cor-negacao)">Embora sejam livres, não são gratuitos</em>. Por ser uma <strong>cortesia</strong>, os plugins ao lado não atualizam automaticamente em seu painel, '.$cliente.'. Para você garantir essa automação, <em style="color:var(--cor-negacao)">o recomendado é comprar o plugin diretamente no site oficial ou de revendedores especializados</em>, indicados pelo ícone <i style="color:var(--cor-roxo);" class="fas fa-link"></i>. Com isso, além de updates automáticos, você garante o privilégio do suporte do desenvolvedor original, que é uma maravilha! 🛠</p>';
					echo '<p style="font-size:.8em;margin-bottom:10px;">Embora essa página seja atualizada com frequência, não há garantia de que todos os plugins vão estar em suas versões mais recentes lançadas. Caso encontre uma versão do seu plugin favorito que precisa do update mais recente, não hesite em me avisar no whatsapp que assim que possível será colocado no acervo!</p>';
					echo '<p style="font-size:.8em;margin-bottom:10px;">Não é ofertado o serviço de update individual em seu site, exceto se for assinante de um <a href="/servicos/planos/">plano recorrente de manutenção</a> que se enquadra no serviço.</p>';
					echo '<p style="font-size:.8em;margin-top:20px;"><a href="/servicos/planos/" class="button afirmacao pequeno">conhecer planos</a></p>';
				echo '</aside>';

			echo '</section>';
		endwhile;

	} else {
		echo '<p style="text-align:center;"><i style="font-size:50px;color:var(--cor-afirmacao)" class="fal fa-star"></i></p>';
		echo '<p style="text-align:center; max-width:700px; margin-left:auto; margin-right:auto">O acervo de materiais pode ser usufruído apenas por clientes que contrataram serviços de design e/ou desenvolvimento<span style="color:var(--cor-negacao)">*</span> do studio '.do_shortcode('[afc]').'</p>'; 
		echo '<p style="text-align:center;">Esse é o seu caso? Entre em contato e solicite seu acesso!</p>';
		echo '<p style="text-align:center;"><a href="https://api.whatsapp.com/send?phone=5562996269941&text=Oi%20Ana!%20Solicito%20meu%20Acesso%20VIP%20para%20o%20acervo%20de%20materiais." target="_blank" rel="noopener" class="button afirmacao">Quero meu acesso Vip</a></p>';
		echo '<p style="font-size:.6em;margin-bottom:10px;line-height:1.3; text-align:center;"><span style="color:var(--cor-negacao)">*</span> Não abrange vendas na loja do studio.</p>';
	}	
	
} else {
	echo '<p style="text-align:center;">Faca seu <strong>login de cliente VIP</strong> para ter acesso ao acervo de materiais.</p>';
	echo '<p style="text-align:center;"><a href="'.esc_url( wp_login_url( get_permalink() ) ).'" rel="noopener" class="button">Acesso Vip</a></p>';
	echo '<div style="height:130px"></div>';
}	

echo '</article>';		
	
get_footer();