<?php get_header(); 
		echo '<div class="container" id="pagina-planos">';
			if (have_posts()) { while (have_posts()) : the_post();
				echo '<article>';
						the_content();
				echo '</article>';
			endwhile; }

			$cancela = '<p>Assine e cancele quando quiser!</p>';

			echo '<section class="todos-planos">';

				// ========================================//
				// BASIC
				// ========================================// 
				echo '<div class="plano">';
					echo '<header>';
						echo '<h3>Plano Basic</h3>';
						echo '<time>2h</time>';
						echo '<data><abbr title="BRL">R$</abbr>90<span>/mês</span></data>';
						echo '<p><strong><span><i class="fas fa-heart"></i> ideal para</span></strong><br>sites / blogs simples ou de baixo tráfego<br><br><a href="#basic" class="jump" title="assinar"><i style="font-size: 2em;" class="fal fa-angle-down"></i></a></p>';
					echo '</header>';
					echo '<ul>';
						echo '<p><strong>AÇÕES PREVENTIVAS</strong><em>realizadas e monitoradas semanalmente</em></p>';
						echo '<li>Revisão básica de banco de dados <i class="far fa-info-circle"></i></li>';
						echo '<li>Supervisão de versão de PHP, atualizando-o quando aplicável</li>';
						echo '<li>Atualização de sistema Wordpress e plugins</li>';
						echo '<li>Supervisão de recursos utilizados no plano de hospedagem</li>';

						echo '<p><strong>AÇÕES DE DESIGN</strong><em>realizadas sob solicitação</em></p>';
						echo '<li>Template e-mail marketing <em>(1 por ano)</em></li>';
						echo '<li>Banner mídia social <em>(2 por ano)</em></li>';

						echo '<p><strong>AÇÕES DE CONTEÚDO</strong><em>realizadas sob solicitação</em></p>';
						echo '<li>Diagramação de e-mail marketing <em>(1 por semestre)</em></li>';
					echo '</ul>';
					echo '<footer>';
						echo $cancela;
						echo '<div class="botao"><a href="/" id="basic" class="button medio azul">assinar</a></div>';
					echo '</footer>';
				echo '</div>';




				// ========================================//
				// STANDARD
				// ========================================// 
				echo '<div class="plano">';
					echo '<header>';
						echo '<h3>Plano Standard</h3>';

						echo '<label>+ pedido</label>';

						echo '<time>4h</time>';
						echo '<data><abbr title="BRL">R$</abbr>140<span>/mês</span></data>';
						echo '<p><strong><span><i class="fas fa-heart"></i> ideal para</span></strong><br>sites profissionais, blogs monetizados<br><br><a href="#standard" class="jump" title="assinar"><i style="font-size: 2em;" class="fal fa-angle-down"></i></a></p>';
					echo '</header>';
					echo '<ul>';
						echo '<p><strong>AÇÕES PREVENTIVAS</strong><em>realizadas e monitoradas semanalmente</em></p>';
						echo '<li>Revisão básica de banco de dados</li>';
						echo '<li>Supervisão de versão de PHP, atualizando-o quando aplicável</li>';
						echo '<li>Atualização de sistema Wordpress e plugins</li>';
						echo '<li>Supervisão de recursos utilizados no plano de hospedagem</li>';
						echo '<li>Otimização de banco de dados</li>';

						echo '<p><strong>AÇÕES ISOLADAS</strong><em>realizadas sob solicitação</em></p>';
						echo '<li>Criação de endereço de email e vinculação à Gmail</li>';
						echo '<li>Implementação Cloudflare</li>';
						echo '<li>Configuração de cache</li>';
						echo '<li>Módulos de otimização do php.ini</li>';
						
						echo '<p><strong>AÇÕES CORRETIVAS</strong><em>realizadas semanalmente e/ou sob solicitação</em></p>';
						echo '<li>Supervisão dos logs de erro e alertas PHP, corrigindo-os quando aplicáveis</li>';
						echo '<li>Correção de bugs e má funcionamento de elementos e funcionalidades de layout</li>';
						
						echo '<p><strong>AÇÕES DE DESIGN</strong><em>realizadas sob solicitação</em></p>';
						echo '<li>Template e-mail marketing <em>(2 por ano)</em></li>';
						echo '<li>Banner mídia social <em>(2 por semestre)</em></li>';

						echo '<p><strong>AÇÕES DE CONTEÚDO</strong><em>realizadas sob solicitação</em></p>';
						echo '<li>Diagramação de conteúdo <em>(2 págs por mês)</em></li>';
						echo '<li>Diagramação de e-mail marketing <em>(1 por mês)</em></li>';

					echo '</ul>';

					echo '<footer>';
						echo $cancela;
						echo '<div class="botao"><a href="/" id="standard" class="button medio verde">assinar</a></div>';
					echo '</footer>';
				echo '</div>';



				// ========================================//
				// PREMIUM
				// ========================================// 
				echo '<div class="plano">';
					echo '<header>';
						echo '<h3>Plano Premium</h3>';
						echo '<time>8h</time>';
						echo '<data><abbr title="BRL">R$</abbr>240<span>/mês</span></data>';
						echo '<p><strong><span><i class="fas fa-heart"></i> ideal para</span></strong><br>sites e blogs de alto tráfego, lojas virtuais<br><br><a href="#premium" class="jump" title="assinar"><i style="font-size: 2em;" class="fal fa-angle-down"></i></a></p>';
					echo '</header>';
					echo '<ul>';
						echo '<p><strong>AÇÕES PREVENTIVAS</strong><em>realizadas e monitoradas semanalmente</em></p>';
						echo '<li>Revisão básica de banco de dados</li>';
						echo '<li>Supervisão de versão de PHP, atualizando-o quando aplicável</li>';
						echo '<li>Atualização de sistema Wordpress e plugins</li>';
						echo '<li>Supervisão de recursos utilizados no plano de hospedagem</li>';
						echo '<li>Otimização de banco de dados</li>';
						echo '<li>Supervisão de desempenho de páginas principais</li>';
						echo '<li>Backup manual semanal</li>';
						echo '<li>Supervisão e inserção de módulos de segurança: proteção de arquivos e pastas, prevenção de ataque de força bruta</li>';

						echo '<p><strong>AÇÕES ISOLADAS</strong><em>realizadas sob solicitação</em></p>';
						echo '<li>Criação de endereço de email e vinculação à Gmail</li>';
						echo '<li>Implementação Cloudflare</li>';
						echo '<li>Configuração de cache</li>';
						echo '<li>Módulos de otimização do php.ini</li>';
						echo '<li>Implementação de certificado SSL + adequação de links</li>';
						
						echo '<p><strong>AÇÕES CORRETIVAS</strong><em>realizadas semanalmente e/ou sob solicitação</em></p>';
						echo '<li>Supervisão dos logs de erro e alertas PHP, corrigindo-os quando aplicáveis</li>';
						echo '<li>Correção de bugs e má funcionamento de elementos e funcionalidades de layout</li>';
						echo '<li>Correções visuais de plugins de terceiros quando influenciados em layout</li>';
						echo '<li>Checagem de links internos quebrados</li>';

						echo '<p><strong>AÇÕES DE DESIGN</strong><em>realizadas sob solicitação</em></p>';
						echo '<li>Template e-mail marketing <em>(4 por ano)</em></li>';
						echo '<li>Banner mídia social <em>(2 por mês)</em></li>';

						echo '<p><strong>AÇÕES DE CONTEÚDO</strong><em>realizadas sob solicitação</em></p>';
						echo '<li>Diagramação de conteúdo <em>(4 págs por mês)</em></li>';
						echo '<li>Diagramação de e-mail marketing <em>(2 por mês)</em></li>';
					echo '</ul>';

					echo '<footer>';
						echo $cancela;
						echo '<div class="botao"><a href="/" id="premium" class="button medio">assinar</a></div>';
					echo '</footer>';
				echo '</div>';

			echo '</section>';


			echo '<h2 class="cursivo has-text-align-center">Perguntas frequentes</h2><br>';

			echo '<div class="wp-block-columns abinhas">';

				echo '<div class="wp-block-column">';
					echo '<div class="aba">';
						echo '<div class="aba-titulo">Qual é a vantagem de ter um plano?</div>';
						echo '<div class="aba-conteudo">';
							echo '<p>Com um plano de manutenção adequado, sempre estarei de olho no seu website sem você precisar solicitar. Estarei atualizando, corrigindo e prevenindo diversos probleminhas que costumam se acumular à longo prazo quando não se tem o devido cuidado.</p>';
							echo '<p>Você não precisará mais ter receio de fazer atualizações, otimizações de banco de dados, nem com métodos de segurança &mdash; que são situações que <u>sempre</u> precisamos ficar de olho e realizar periodicamente no site.</p>';
						echo '</div>';
					echo '</div>';
					echo '<div class="aba">';
						echo '<div class="aba-titulo">Como é o sistema de assinatura?</div>';
						echo '<div class="aba-conteudo">';
							echo '<p>Assinatura significa pagamento em recorrência, que é debitado automaticamente no seu <u>cartão de crédito</u> todo dia do mês referente ao dia da sua adesão. Por exemplo, se você fez a assinatura no dia 10, todo dia 10 será cobrado no seu cartão de crédito o valor referente ao plano que você escolheu.</p>';
							echo '<p>Não há cobrança de juros no cartão pois <strong>não é um pagamento parcelado</strong> e pode ser cancelado quando quiser. O gateway de pagamento que o studio usa é o <em>PagSeguro UOL (Pagbank)</em>.</p>';
						echo '</div>';
					echo '</div>';
					echo '<div class="aba">';
						echo '<div class="aba-titulo">É possível ter um plano híbrido?</div>';
						echo '<div class="aba-conteudo">';
							echo '<p>Sim! Se nenhum dos planos acima lhe atende entre em contato comigo que faço um plano que atenda suas necessidades específicas.</p>';
							echo '<p>Mas lembre-se: um plano personalizado tem um custo diferente dos valores apresentados acima e irá depender da quantidade de benefícios requeridos no seu plano personalizado.</p>';
						echo '</div>';
					echo '</div>';
					echo '<div class="aba">';
						echo '<div class="aba-titulo">Preciso ser uma cliente do studio para assinar um plano?</div>';
						echo '<div class="aba-conteudo">';
							echo '<p>Sim! É um pré-requisito para adquirir um plano de manutenção. Diversos benefícios &mdash; como as ações preventivas e corretivas &mdash; só poderão ser aplicados com eficiência se você já faz uso de um projeto que leva a assinatura do studio.</p>';
						echo '</div>';
					echo '</div>';
					echo '<div class="aba">';
						echo '<div class="aba-titulo">É possível escolher outro tipo de periodicidade?</div>';
						echo '<div class="aba-conteudo">';
							echo '<p>Claro! ✨Há também assinaturas trimestrais, com 5% de economia em relação à mensalidade. 😎💸</p>';

							echo '<table class="tabela-planos-trimestrais">';
								echo '<tr>';
									echo '<th>Basic</th>';
									echo '<th>Standard</th>';
									echo '<th>Premium</th>';
								echo '</tr>';
								echo '<tr>';
									echo '<td><strong>R$255 /trimestre</strong><br> <small>aprox. R$85 /mês</small></td>';
									echo '<td><strong>R$400 /trimestre</strong><br> <small>aprox. R$133 /mês</small></td>';
									echo '<td><strong>R$685 /trimestre</strong><br> <small>aprox. R$228 /mês</small></td>';
								echo '</tr>';
								echo '<tr>';
									echo '<td><a href="#" class="button azul medio">assinar</a></td>';
									echo '<td><a href="#" class="button verde medio">assinar</a></td>';
									echo '<td><a href="#" class="button roxo medio">assinar</a></td>';
								echo '</tr>';									
							echo '</table>';

						echo '</div>';
					echo '</div>';

				echo '</div>';


				echo '<div class="wp-block-column">';
					
					echo '<div class="aba">';
						echo '<div class="aba-titulo">Posso cancelar a qualquer momento?</div>';
						echo '<div class="aba-conteudo">';
							echo '<p>Sim! Não há período mínimo de adesão. Entretanto, vale lembrar que os benefícios da assinatura que contém elementos de <em>cota anual</em> serão perdidos caso o cancelamento seja feito em menos de 6 meses após a adesão.</p>';
							echo '<p>Para cancelar é só seguir o passo-a-passo abaixo:</p>';
							echo '<h5>Como cancelar assinatura</h5>';
							echo '<p>';
								echo '<strong>1)</strong> Faça login na sua conta PagSeguro com mesmo email usado na assinatura;<br>';
								echo '<strong>2)</strong> Acessar "Minha Conta" > "Assinaturas", selecionar a assinatura que tem com o studio '.do_shortcode('[afc]').';<br>';
								echo '<strong>3) </strong> Solicitar o cancelamento e confirma-lo na janela que abrirá em seguida.';
							echo '</p>';
							echo '<p>Caso dê algo errado com o seu cancelado, entre em contato diretamente comigo, ok? Não é preciso entrar em contato com a prestadora do cartão nem com o suporte do PagSeguro.</p>';
						echo '</div>';
					echo '</div>';
					echo '<div class="aba">';
						echo '<div class="aba-titulo">Qual é o tipo de hospedagem que se adequa aos planos?</div>';
						echo '<div class="aba-conteudo">';
							echo '<p>Qualquer hospedagem que possua o CPanel como painel de gerenciamento de recursos do servidor que tenha ferramentas de otimização, gerenciamento de versão de PHP e de banco de dados phpMyAdmin.</p>';
							echo '<p>Não sabe se sua hospedagem tem estes recursos? Entre em contato comigo para confirmar!</p>';
						echo '</div>';
					echo '</div>';
					echo '<div class="aba">';
						echo '<div class="aba-titulo">Como os planos são cotados?</div>';
						echo '<div class="aba-conteudo">';
							echo '<p>Os planos são baseados em estimativas de horas de serviço, que vai de 2h até 8h aproximadamente, dependendo do plano.</p>';
							echo '<p>Por ser constante, a hora do serviço tende a ficar mais acessível, com economia de até 50% se comparado a um serviço equivalente <em>(em horas trabalhadas)</em> fora do plano.</p>';
						echo '</div>';
					echo '</div>';
					echo '<div class="aba">';
						echo '<div class="aba-titulo">É possível solicitar algo que não esteja dentro do plano?</div>';
						echo '<div class="aba-conteudo">';
							echo '<p>Sim! Entretanto, pode haver cobrança de hora extra caso exceda o limite de horas do seu plano escolhido ou quando o serviço solicitado não faz parte da mesma categoria dos benefícios incluídos do plano.</p>';
							echo '<p>Serviços de design, alterações significativa de layout ou de construção de novas ferramentas são cobradas separadamente, independente do plano escolhido. São serviços cobrados separadamente, com valor sob consulta, podendo ser pagos em cartão de crédito em até 12x ou por boleto de cobrança.</p>';
						echo '</div>';
					echo '</div>';
					echo '<div class="aba">';
						echo '<div class="aba-titulo">Posso trocar de plano quando quiser?</div>';
						echo '<div class="aba-conteudo">';
							echo '<p>Sim! Basta cancelar sua assinatura atual e aderir a uma nova.</p>';
						echo '</div>';
					echo '</div>';

				echo '</div>';

			echo '</div>';

		echo '</div>';
	
get_footer();