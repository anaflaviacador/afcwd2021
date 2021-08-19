<?php get_header(); 

$url = home_url(('/'));

		echo '<div class="container" id="pagina-planos">';
			if (have_posts()) { while (have_posts()) : the_post();
				echo '<article>';
						the_content();

						echo '<p style="margin-top: 2em;">';
							echo '<small style="opacity:0.65; margin-bottom: 8px; display: block; font-style: italic">Informe o seu vínculo com o studio</small>';
							// echo '<label id="troca-cliente" class="cl-switch"><input type="checkbox" checked="checked"><span class="switcher"></span><span class="label">Sou cliente do studio</span></label>';
							echo '<label id="troca-cliente">';
								echo '<input id="input-jacliente" name="radio" type="radio" checked="checked" />';
					            echo '<label for="input-jacliente">Já sou cliente</label>';
					            echo '<input id="input-novocliente" name="radio" type="radio" />';
					            echo '<label for="input-novocliente">Sou nova aqui</label>';
					            echo '<span class="slider"></span>';
							echo '</label>';
						echo '</p>';
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
						echo '<li>Atualização de sistema Wordpress e plugins</li>';
						echo '<li>Supervisão de recursos utilizados no plano de hospedagem <span data-tooltip="Uso do espaço em disco, recurso de CPU, memória etc." aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';


						echo '<p><strong>AÇÕES DE DESIGN</strong><em>realizadas sob solicitação</em></p>';
						echo '<li>Template e-mail marketing <span data-tooltip="Aplicável quando o sistema que você utiliza permite customização." aria-hidden="true"><i class="far fa-info-circle"></i></span> <em>(1 por ano)</em></li>';
						echo '<li>Banner mídia social <span data-tooltip="Produção de peça gráfica avulsa. Não inclui gestão da mídia social." aria-hidden="true"><i class="far fa-info-circle"></i></span> <em>(2 por ano)</em></li>';

						echo '<p><strong>AÇÕES DE CONTEÚDO</strong><em>realizadas sob solicitação</em></p>';
						echo '<li>Diagramação de e-mail marketing <span data-tooltip="Conteúdo enviado previamente pela cliente." aria-hidden="true"><i class="far fa-info-circle"></i></span> <em>(1 por semestre)</em></li>';


						echo '<p style="color:var(--cor-negacao);"><strong>BONUS <i class="fas fa-badge-check" style="color:var(--cor-negacao);"></i></strong></p>';
						echo '<li>Sendy E-mail Marketing <span data-tooltip="Armazenamento ilimitado de leads, listas, autoresponders e segmentações. A cota é atribuída ao disparo de emails por mês." aria-hidden="true"><i class="far fa-info-circle"></i></span> <em>(2mil envios ao mês)</em></li>';
					echo '</ul>';
					echo '<footer id="basic">';
						echo $cancela;
						echo '<div class="botao">';
							echo '<a href="'.$url.'?add-to-cart=5438" data-novo-cliente="'.$url.'?add-to-cart=5492" id="assinar-plano-basic" class="btAssinarPlano button medio azul">assinar!</a>'; 
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
						echo '<li>Revisão de banco de dados <span data-tooltip="Limpeza e exclusão de tabelas não usadas para otimizar o uso do banco de dados." aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
						echo '<li>Supervisão de versão de PHP, atualizando-o quando aplicável</li>';
						echo '<li>Atualização de sistema Wordpress e plugins</li>';
						echo '<li>Supervisão de recursos utilizados no plano de hospedagem <span data-tooltip="Uso do espaço em disco, recurso de CPU, memória etc." aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
						echo '<li>Otimização de banco de dados <span data-tooltip="Promove redução de espaço e aumenta desempenho na leitura dos dados." aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
						echo '<li>Backup completo semanalmente</li>';

						echo '<p><strong>AÇÕES ISOLADAS</strong><em>realizadas sob solicitação</em></p>';
						echo '<li>Criação de endereço de email e vinculação à Gmail</li>';
						echo '<li>Configuração de cache <span data-tooltip="Cache comum, configurado no sistema Wordpress" aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
						echo '<li>Implementação Cloudflare <span data-tooltip="Apontamento de DNS de domínio aos servidores Cloudflare, promove maior desempenho, cache avançado e segurança extra." aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
						echo '<li>Módulos de otimização do php.ini</li>';
						
						echo '<p><strong>AÇÕES CORRETIVAS</strong><em>realizadas semanalmente e/ou sob solicitação</em></p>';
						echo '<li>Supervisão dos logs de erro e alertas PHP, corrigindo-os quando aplicáveis</li>';
						echo '<li>Correção de bugs, mau funcionamento de elementos ou funcionalidades de layout</li>';
						
						echo '<p><strong>AÇÕES DE DESIGN</strong><em>realizadas sob solicitação</em></p>';
						echo '<li>Template e-mail marketing <span data-tooltip="Aplicável quando o sistema que você utiliza permite customização." aria-hidden="true"><i class="far fa-info-circle"></i></span> <em>(2 por ano)</em></li>';
						echo '<li>Banner mídia social <span data-tooltip="Produção de peça gráfica avulsa. Não inclui gestão da mídia social." aria-hidden="true"><i class="far fa-info-circle"></i></span> <em>(2 por semestre)</em></li>';

						echo '<p><strong>AÇÕES DE CONTEÚDO</strong><em>realizadas sob solicitação</em></p>';
						echo '<li>Diagramação de conteúdo <span data-tooltip="Construção de página ou publicação utilizando recursos inclusos do tema em atividade. Conteúdo enviado previamente pela cliente." aria-hidden="true"><i class="far fa-info-circle"></i></span> <em>(2 págs por mês)</em></li>';
						echo '<li>Diagramação de e-mail marketing <span data-tooltip="Conteúdo enviado previamente pela cliente." aria-hidden="true"><i class="far fa-info-circle"></i></span> <em>(1 por mês)</em></li>';

						echo '<p style="color:var(--cor-negacao);"><strong>BONUS <i class="fas fa-badge-check" style="color:var(--cor-negacao);"></i></strong></p>';
						echo '<li>Sendy E-mail Marketing <span data-tooltip="Armazenamento ilimitado de leads, listas, autoresponders e segmentações. A cota é atribuída ao disparo de emails por mês." aria-hidden="true"><i class="far fa-info-circle"></i></span> <em>(10mil envios ao mês)</em></li>';

					echo '</ul>';

					echo '<footer id="standard">';
						echo $cancela;
						echo '<div class="botao">';
							echo '<a href="'.$url.'?add-to-cart=5439" data-novo-cliente="'.$url.'?add-to-cart=5493" id="assinar-plano-standard" class="btAssinarPlano button medio verde">assinar!</a>';
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
						echo '<li>Revisão de banco de dados <span data-tooltip="limpeza e exclusão de tabelas não usadas para otimizar o uso do banco de dados." aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
						echo '<li>Supervisão de versão de PHP, atualizando-o quando aplicável</li>';
						echo '<li>Atualização de sistema Wordpress e plugins</li>';
						echo '<li>Supervisão de recursos utilizados no plano de hospedagem <span data-tooltip="Uso do espaço em disco, recurso de CPU, memória etc." aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
						echo '<li>Otimização de banco de dados <span data-tooltip="Promove redução de espaço e aumenta desempenho na leitura dos dados." aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
						echo '<li>Backup completo diariamente</li>';
						echo '<li>Supervisão de desempenho de páginas principais</li>';
						echo '<li>Supervisão e inserção de módulos de segurança <span data-tooltip="Proteção de arquivos e pastas, prevenção de ataque de força bruta." aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';

						echo '<p><strong>AÇÕES ISOLADAS</strong><em>realizadas sob solicitação</em></p>';
						echo '<li>Criação de endereço de email e vinculação à Gmail</li>';
						echo '<li>Configuração de cache <span data-tooltip="Cache comum, configurado no sistema Wordpress" aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
						echo '<li>Implementação Cloudflare <span data-tooltip="Apontamento de DNS de domínio aos servidores Cloudflare, promove maior desempenho, cache avançado e segurança extra." aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
						echo '<li>Módulos de otimização do php.ini</li>';
						echo '<li>Implementação de certificado SSL <span data-tooltip="Inclui redirecionamento para endereço seguro + adequação de todos os links internos via banco de dados." aria-hidden="true"><i class="far fa-info-circle"></i></span></li>';
						
						echo '<p><strong>AÇÕES CORRETIVAS</strong><em>realizadas semanalmente e/ou sob solicitação</em></p>';
						echo '<li>Supervisão dos logs de erro e alertas PHP, corrigindo-os quando aplicáveis</li>';
						echo '<li>Correção de bugs, mau funcionamento de elementos ou funcionalidades de layout</li>';
						echo '<li>Correções visuais de plugins de terceiros quando influenciados em layout</li>';
						echo '<li>Checagem de links internos quebrados</li>';

						echo '<p><strong>AÇÕES DE DESIGN</strong><em>realizadas sob solicitação</em></p>';
						echo '<li>Template e-mail marketing <span data-tooltip="Aplicável quando o sistema que você utiliza permite customização." aria-hidden="true"><i class="far fa-info-circle"></i></span> <em>(4 por ano)</em></li>';
						echo '<li>Banner mídia social <span data-tooltip="Produção de peça gráfica avulsa. Não inclui gestão da mídia social." aria-hidden="true"><i class="far fa-info-circle"></i></span> <em>(2 por mês)</em></li>';

						echo '<p><strong>AÇÕES DE CONTEÚDO</strong><em>realizadas sob solicitação</em></p>';
						echo '<li>Diagramação de conteúdo <span data-tooltip="Construção de página ou publicação utilizando recursos inclusos do tema em atividade. Conteúdo enviado previamente pela cliente." aria-hidden="true"><i class="far fa-info-circle"></i></span> <em>(4 págs por mês)</em></li>';
						echo '<li>Diagramação de e-mail marketing <span data-tooltip="Conteúdo enviado previamente pela cliente." aria-hidden="true"><i class="far fa-info-circle"></i></span> <em>(2 por mês)</em></li>';

						echo '<p style="color:var(--cor-negacao);"><strong>BONUS <i class="fas fa-badge-check" style="color:var(--cor-negacao);"></i></strong></p>';
						echo '<li>Sendy E-mail Marketing <span data-tooltip="Armazenamento ilimitado de leads, listas, autoresponders e segmentações. A cota é atribuída ao disparo de emails por mês." aria-hidden="true"><i class="far fa-info-circle"></i></span> <em>(50mil envios ao mês)</em></li>';
					echo '</ul>';

					echo '<footer id="premium">';
						echo $cancela;
						echo '<div class="botao">';
							echo '<a href="'.$url.'?add-to-cart=5440" data-novo-cliente="'.$url.'?add-to-cart=5495" id="assinar-plano-premium" class="btAssinarPlano button medio">assinar!</a>'; 
						echo '</div>';
					echo '</footer>';
				echo '</div>';

			echo '</section>';


			echo '<h2 class="cursivo has-text-align-center" id="faq">Perguntas frequentes</h2><br>';

			get_template_part('inc/planos','faq');

		echo '</div>';
	
get_footer();