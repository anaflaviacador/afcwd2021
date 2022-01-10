<?php get_header(); 

$url = home_url(('/'));

		echo '<div class="container" id="pagina-planos">';
			if (have_posts()) { while (have_posts()) : the_post();
				echo '<article>';
						the_content();

						// echo '<p style="margin-top: 2em;">';
						// 	echo '<small style="opacity:0.65; margin-bottom: 8px; display: block; font-style: italic">Informe o seu vínculo com o studio</small>';
						// 	echo '<label id="troca-cliente">';
						// 		echo '<input id="input-jacliente" name="radio" type="radio" checked="checked" />';
					    //         echo '<label for="input-jacliente">Já sou cliente</label>';
					    //         echo '<input id="input-novocliente" name="radio" type="radio" />';
					    //         echo '<label for="input-novocliente">Sou nova aqui</label>';
					    //         echo '<span class="slider"></span>';
						// 	echo '</label>';
						// echo '</p>';
				echo '</article>';
			endwhile; }

			$cancela = '<p>* Você pode assinar quando quiser e cancelar quando desejar. Zero fidelidade!</p>';

			echo '<section class="todos-planos">';

				// ========================================//
				// BASIC
				// ========================================// 
				echo '<div class="plano">';
					echo '<header>';
						echo '<h3>Plano Basic</h3>';
						echo '<time data-tooltip="Previsão de tempo gasto por mês em ações preventivas.">2h</time>';
						echo '<data><abbr title="BRL">R$</abbr><span class="valor-plano" data-novo-cliente="140">90</span><span class="freq">/mês*</span></data>';
						echo '<p><strong><span><i class="fas fa-heart"></i> ideal para</span></strong><br>sites / blogs simples ou de baixo tráfego<br><br><a href="#basic" class="jump" title="assinar"><i style="font-size: 2em;" class="fal fa-angle-down"></i></a></p>';
					echo '</header>';
					echo '<ul>';
						echo '<p><strong>AÇÕES PREVENTIVAS</strong><em>realizadas e monitoradas semanalmente</em></p>';
						echo '<li>Revisão de banco de dados <span data-tooltip="Limpeza e exclusão de tabelas não usadas para otimizar o uso do banco de dados." aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
						echo '<li>Supervisão de versão de PHP, atualizando-o quando aplicável</li>';
						echo '<li>Supervisão e atualização de sistema CMS Wordpress</li>';
						echo '<li>Supervisão e atualização de plugins auxiliares ao layout de licença lite / free <span data-tooltip="As atualizações dos plugins pro / premium são realizadas apenas se o cliente obter a licença de forma independente" aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
						echo '<li>Supervisão de recursos utilizados no plano de hospedagem <span data-tooltip="Uso do espaço em disco, recurso de CPU, memória etc." aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';


						echo '<p><strong>AÇÕES DE DESIGN</strong><em>realizadas sob solicitação</em></p>';
						echo '<li>Template e-mail mkt <span data-tooltip="Aplicável quando o sistema que você utiliza permite customização." aria-hidden="true"><i class="far fa-info-circle"></i></span> <em>(1 / ano)</em></li>';
						echo '<li>Capa para mídia social <span data-tooltip="Produção de peça gráfica avulsa. Não inclui gestão da mídia social." aria-hidden="true"><i class="far fa-info-circle"></i></span> <em>(2 / ano)</em></li>';

						echo '<p><strong>AÇÕES DE CONTEÚDO</strong><em>realizadas sob solicitação</em></p>';
						echo '<li>Diagramação de e-mail mkt <span data-tooltip="Conteúdo enviado previamente pela cliente." aria-hidden="true"><i class="far fa-info-circle"></i></span> <em>(1 / semestre)</em></li>';


						echo '<p style="color:var(--cor-negacao);"><strong>BONUS <i class="fas fa-badge-check" style="color:var(--cor-negacao);"></i></strong></p>';
						echo '<li>Sendy E-mail Marketing <span data-tooltip="Armazenamento ilimitado de leads, listas, autoresponders e segmentações. A cota é atribuída ao disparo de emails por mês." aria-hidden="true"><i class="far fa-info-circle"></i></span> <em>(2mil envios / mês)</em></li>';
					echo '</ul>';
					echo '<footer id="basic">';
						echo $cancela;
						echo '<div class="botao">';
							echo '<a href="'.$url.'?add-to-cart=5438" id="assinar-plano-basic" class="btAssinarPlano button medio azul">assinar!</a>'; 
						echo '</div>';
					echo '</footer>';
				echo '</div>';




				// ========================================//
				// STANDARD
				// ========================================// 
				echo '<div class="plano">';
					echo '<header>';
						echo '<h3>Plano Standard</h3>';

						echo '<label>+ pedido</label>';

						echo '<time data-tooltip="Previsão de tempo gasto por mês em ações preventivas, isoladas e corretivas.">4h</time>';
						echo '<data><abbr title="BRL">R$</abbr><span class="valor-plano" data-novo-cliente="228">140</span><span class="freq">/mês*</span></data>';
						echo '<p><strong><span><i class="fas fa-heart"></i> ideal para</span></strong><br>sites profissionais, blogs monetizados<br><br><a href="#standard" class="jump" title="assinar"><i style="font-size: 2em;" class="fal fa-angle-down"></i></a></p>';
					echo '</header>';
					echo '<ul>';
						echo '<p><strong>AÇÕES PREVENTIVAS</strong><em>realizadas e monitoradas semanalmente</em></p>';
						echo '<li class="plus">Todas as ações preventivas do plano anterior</li>';

						echo '<li>Supervisão e atualização de plugins premium <span data-tooltip="O studio assume a licença e atualizações dos premiuns fornecidos na implementação de layout" aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';

						echo '<li>Otimização periódica de CMS e banco de dados <span data-tooltip="Promove redução de espaço e aumenta desempenho na leitura dos dados." aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
						echo '<li>Backup completo semanalmente <span data-tooltip="Aplicável apenas se o plano de hospedagem não tem este benefício." aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
						echo '<li>Módulos de otimização do php.ini</li>';

						echo '<p><strong>AÇÕES ISOLADAS</strong><em>realizadas sob solicitação</em></p>';
						echo '<li>Criação de email + apontamentos DKIM e DMARC <span data-tooltip="Configuração adequada para o disparo de emails autenticados pelo seu domínio e mais confiáveis através de configuração SMTP no site" aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
						echo '<li>Configuração de cache <span data-tooltip="Configurado para o CMS Wordpress" aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
						echo '<li>Implementação Cloudflare <span data-tooltip="Apontamento de DNS de domínio aos servidores Cloudflare, promove maior desempenho, cache avançado e segurança extra." aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
						
						echo '<p><strong>AÇÕES CORRETIVAS</strong><em>realizadas semanalmente e/ou sob solicitação</em></p>';
						echo '<li>Supervisão dos logs de erro e alertas PHP de layout</li>';
						echo '<li>Correção de bugs, mau funcionamento de elementos ou funcionalidades de layout</li>';
						
						echo '<p><strong>AÇÕES DE DESIGN</strong><em>realizadas sob solicitação</em></p>';
						
						echo '<li>Template e-mail marketing <em>(2 / ano)</em></li>';
						echo '<li>Capa para mídia social <em>(2 / semestre)</em></li>';

						echo '<li>Edições de <u>baixa</u> complexidade no layout <span data-tooltip="Mudanças finas no design como ajuste de cor, botões, espaçamentos etc" aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
						
						

						echo '<p><strong>AÇÕES DE CONTEÚDO</strong><em>realizadas sob solicitação</em></p>';
						echo '<li>Diagramação de e-mail mkt <em>(1 / mês)</em></li>';
						echo '<li>Diagramação de conteúdo <span data-tooltip="Construção de página ou publicação utilizando recursos inclusos do tema em atividade. Conteúdo enviado previamente pela cliente." aria-hidden="true"><i class="far fa-info-circle"></i></span> <em>(2 pgs / mês)</em></li>';
						

						echo '<p style="color:var(--cor-negacao);"><strong>BONUS <i class="fas fa-badge-check" style="color:var(--cor-negacao);"></i></strong></p>';
						echo '<li>Sendy E-mail Marketing <em>(10mil envios / mês)</em></li>';

					echo '</ul>';

					echo '<footer id="standard">';
						echo $cancela;
						echo '<div class="botao">';
							echo '<a href="'.$url.'?add-to-cart=5439" id="assinar-plano-standard" class="btAssinarPlano button medio verde">assinar!</a>';
						echo '</div>';
					echo '</footer>';
				echo '</div>';



				// ========================================//
				// PREMIUM
				// ========================================// 
				echo '<div class="plano">';
					echo '<header>';
						echo '<h3>Plano Premium</h3>';
						echo '<time data-tooltip="Previsão de tempo gasto por mês em ações preventivas, isoladas e corretivas.">8h</time>';
						echo '<data><abbr title="BRL">R$</abbr><span class="valor-plano" data-novo-cliente="432">240</span><span class="freq">/mês*</span></data>';
						echo '<p><strong><span><i class="fas fa-heart"></i> ideal para</span></strong><br>sites e blogs de alto tráfego, lojas virtuais<br><br><a href="#premium" class="jump" title="assinar"><i style="font-size: 2em;" class="fal fa-angle-down"></i></a></p>';
					echo '</header>';
					echo '<ul>';
						echo '<p><strong>AÇÕES PREVENTIVAS</strong><em>realizadas e monitoradas semanalmente</em></p>';
						echo '<li class="plus">Todas as ações preventivas dos planos anteriores</li>';
						
						echo '<li>Supervisão de desempenho de páginas principais</li>';
						echo '<li>Supervisão e inserção de módulos de segurança <span data-tooltip="Proteção de arquivos e pastas, prevenção de ataque de força bruta, inserção de reCaptcha contra bots" aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';

						echo '<p><strong>AÇÕES ISOLADAS</strong><em>realizadas sob solicitação</em></p>';
						echo '<li class="plus">Todas as ações isoladas dos planos anteriores</li>';
						echo '<li>Implementação de certificado SSL <span data-tooltip="Inclui redirecionamento para endereço seguro + adequação de todos os links internos via banco de dados." aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
						
						echo '<p><strong>AÇÕES CORRETIVAS</strong><em>realizadas semanalmente e/ou sob solicitação</em></p>';
						echo '<li class="plus">Todas as ações corretivas dos planos anteriores</li>';
						echo '<li>Adequações visuais de plugins de terceiros quando influenciados em layout</li>';
						echo '<li>Checagem de links internos quebrados</li>';

						echo '<p><strong>AÇÕES DE DESIGN</strong><em>realizadas sob solicitação</em></p>';

						echo '<li>Template e-mail marketing <em>(4 / ano)</em></li>';
						echo '<li>Capa para mídia social <em>(2 / mês)</em></li>';

						echo '<li>Edições de <u>média</u> complexidade no layout <span data-tooltip="Mudanças que afetam diretamente estrutura como adição de novas sessões, menus, remanejamento de elementos etc" aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';

						echo '<p><strong>AÇÕES DE CONTEÚDO</strong><em>realizadas sob solicitação</em></p>';
						echo '<li>Diagramação de e-mail mkt <em>(2 / mês)</em></li>';
						echo '<li>Diagramação de conteúdo <em>(4 pgs / mês)</em></li>';

						echo '<p style="color:var(--cor-negacao);"><strong>BONUS <i class="fas fa-badge-check" style="color:var(--cor-negacao);"></i></strong></p>';
						echo '<li>Sendy E-mail Marketing <em>(50mil envios / mês)</em></li>';
					echo '</ul>';

					echo '<footer id="premium">';
						echo $cancela;
						echo '<div class="botao">';
							echo '<a href="'.$url.'?add-to-cart=5440" id="assinar-plano-premium" class="btAssinarPlano button medio">assinar!</a>'; 
						echo '</div>';
					echo '</footer>';
				echo '</div>';

			echo '</section>';


			echo '<h2 class="cursivo has-text-align-center faq-planos" id="faq">Perguntas frequentes</h2><br>';

			get_template_part('inc/planos','faq');

		echo '</div>';
	
get_footer();