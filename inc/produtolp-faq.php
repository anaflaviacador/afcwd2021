<?php
global $product;
$nomeproduto = get_field('nome_produto',$product->ID);
$urlTema = get_template_directory_uri();

echo '<h2 class="cursivo has-text-align-center" style="padding-top:40px;margin-top:-40px;" id="faq">Perguntas frequentes</h2>';
	echo '<p class="has-text-align-center" style="margin-bottom:2em">Dúvidas sobre como baixar, compatibilidade, pagamento etc? Veja abaixo.</p>';

echo '<div class="wp-block-columns afclp-faq abinhas">';

	echo '<div class="wp-block-column">';
		echo '<div class="aba" style="margin-top: 20px;">';
			echo '<div class="aba-titulo">É seguro comprar nesse site?</div>';
			echo '<div class="aba-conteudo">';
				echo '<p>Sim, é totalmente seguro! O site do studio possui certificado de segurança SSL da Cloudflare, Inc, de algoritmo de assinatura digital ECDSA com SHA-256 que garante a criptografia de dados entre o acesso do visitante (independente da página) e o servidor do site.</p>';
				echo '<p>O site também utiliza os recursos de segurança da Cloudflare, Inc, da qual armazena nossos DNS e, com isso, consegue fornecer monitoramento contra vulnerabilidades e ameaças cruciais, protegendo a infraestrutura de rede contra ataques de DDoS além do próprio Firewall presente nosso provedor de hospedagem favorito, a <a href="https://cliente.nuvemhospedagem.com.br/aff.php?aff=20" target="_blank" rel="noopener">Nuvem Hospedagem</a>.</p>';
				echo '<p>Os dados bancários dos clientes ficam assegurados e armazenadas nos servidores dos gateways de pagamento que o site utiliza &mdash; Juno Pagamentos, Stripe e Paypal &mdash; com alguns deles utilizando o método de tokenização (impossibilitando a leitura dos dados reais) para facilitar futuras compras dentro do site, como pagamentos recorrentes dos <a href="https://afcweb.design/servicos/planos" target="_blank">planos de manutenção</a>.</p>';
				echo '<p>Saiba mais sobre a segurança do site na nossa <a href="https://afcweb.design/privacidade/#04" target="_blank">Política de Privacidade</a>.</p>';
			echo '</div>';
		echo '</div>';


		echo '<div class="aba">';
			echo '<div class="aba-titulo">Quais são as formas de pagamento aceitas?</div>';
			echo '<div class="aba-conteudo">';
				echo '<p>O studio trabalha com Pix, boleto e cartão de crédito via Paypal.</p>';
				echo '<p>É aceito as principais bandeiras, nacional ou internacional, podendo dividir a compra em até 6x sem juros.</p>';
				echo '<img src="'.$urlTema.'/img/lp/formas-pgto.svg" alt="Meios de pagamento.">';
				echo '<p><strong>Vai pagar com cartão?</strong> <em><u>É imprescindível que o endereço informado no checkout seja verdadeiro</u> e que coincida com os dados da fatura do seu cartão para que o sistema anti-fraude do gateway não bloqueie sua compra, ok?</em></p>';
			echo '</div>';
		echo '</div>';


		echo '<div class="aba">';
			echo '<div class="aba-titulo">O '.$nomeproduto.' vem pronto para SEO e para mídias sociais?</div>';
			echo '<div class="aba-conteudo">';
				echo '<p>Sim! Toda programação do '.$nomeproduto.' foi pensada para ser o mais amigável possível aos motores de busca, informando os dados de forma clara e concisa aos <em>robots</em>. Está incluído todas as metatags de identificação, tanto as clássicas com as do tipo Open Graph (Facebook e plataformas associadas) e Twitter Cards, além de botões de compartilhamento dentro dos artigos de blog.</p>';
				echo '<p>Além disso, você poderá fazer cadastro de metatags adicionais e de confirmação (como do Google, Pixel Facebook e Pinterest), e dentre outros scripts &mdash; dispensando uso de plugins.</p>';
			echo '</div>';
		echo '</div>';

		echo '<div class="aba">';
			echo '<div class="aba-titulo">Meu site vai ficar mais rápido com o '.$nomeproduto.'?</div>';
			echo '<div class="aba-conteudo">';
				echo '<p>O '.$nomeproduto.' foi projetado para ser o mais otimizado possível e exige apenas 2 plugins para seu pleno funcionamento. No site demonstrativo do tema foram feitos testes no <a href="https://gtmetrix.com/reports/aurora.afcwebdesign.studio/dZgBbHMm/" target="_blank">GT Metrix</a> e no <a href="https://tools.pingdom.com/#5e7c387094400000" target="_blank">Pingdom Website Speed Test</a> e foram dadas ótimas notas para performance, estrutura e alta velocidade em abertura de página!</p>';
				echo '<p>Entretanto, é importante entender que a velocidade de um site depende de vários fatores que vão muito além do próprio layout. Exemplo: quantidade de plugins usados e seu nível de requerimento de servidor, saúde do banco de dados, nível de otimização das imagens e seu volume mostrado nas páginas, configurações de cache, versão defasada da plataforma Wordpress, versão de PHP, qualidade e localização, uso de CDN etc.</p>';
				echo '<p>Se não há atenção para nenhum destes fatores, dificilmente o '.$nomeproduto.' será capaz de ajudar significativamente na performance do seu site.</p>';
				echo '<p>Caso você não queira se preocupar com toda essa parte técnica de manter um site e ficar responsável apenas pelo conteúdo, você pode contratar um <a href="https://afcweb.design/servicos/planos" target="_blank">plano de manutenção</a> comigo. 💜 É um serviço totalmente à parte do tema e 100% opcional.</p>';
			echo '</div>';
		echo '</div>';


		echo '<div class="aba">';
			echo '<div class="aba-titulo">O '.$nomeproduto.' funciona no Blogger, Wix ou no Wordpress.com?</div>';
			echo '<div class="aba-conteudo">';
				echo '<p>O '.$nomeproduto.' foi feito exclusivamente para sites na plataforma Wordpress, seja auto hospedados (wordpress.org) ou situados no wordpress.com &mdash; neste último sendo possível apenas para o Plano Negócios. Aproveite e leia o artigo onde <a href="https://afcweb.design/blog/qual-wordpress-utilizar/" target="_blank">explico a diferença entre wordpress.org e .com</a>.</p>';
			echo '</div>';
		echo '</div>';

		echo '<div class="aba">';
			echo '<div class="aba-titulo">O '.$nomeproduto.' é compatível com que versão do Wordpress?</div>';
			echo '<div class="aba-conteudo">';
				echo '<p>O tema '.$nomeproduto.' roda nas versões mais recentes do Wordpress. Foram feitos testes de compatibilidade com ótimos resultados desde a versão 5.6. Mas sua máxima performance é sempre na versão recente da plataforma.</p>';
				echo '<p>Não há garantia alguma que o '.$nomeproduto.' funcione em plataforma de terceiros que utilizam Wordpress como base, como o Showit por exemplo. Todos os testes foram realizados em versões oficiais e baixadas diretamente do Wordpress.org.</p>';
			echo '</div>';
		echo '</div>';

		echo '<div class="aba">';
			echo '<div class="aba-titulo">Qual é o nível de compatibilidade com outros plugins?</div>';
			echo '<div class="aba-conteudo">';
				echo '<p>O '.$nomeproduto.' foi projetado para ser o mais compatível possível com os plugins mais usados, tais como: Elementor, Yoast SEO, Jetpack, Contact Form 7, Disqus, Regenerate Thumbnails, LiteSpeed Cache, e por ai vai!</p>';
				echo '<p>É importante ressaltar que o acervo do Wordpress possui atualmente dezenas de milhares de plugins diferentes, para as mais diversas funções, desenvolvidos por milhares de outros profissionais. Desta forma, não é garantido que todos serão compatíveis com o tema '.$nomeproduto.', principalmente se algum afetar diretamente funções de layout.</p>';
			echo '</div>';
		echo '</div>';

		echo '<div class="aba">';
			echo '<div class="aba-titulo">O que eu recebo ao finalizar minha compra?</div>';
			echo '<div class="aba-conteudo">';
				echo '<p>Você receberá por email o .zip do '.$nomeproduto.' e seu tema filho. Caso opte em adicionar o Add-on Woocommerce Ready, também virá o .zip do mesmo. Todos estes arquivos são prontos para instalação direta pelo painel do Wordpress, não precisando descompactar previamente.</p>';
				echo '<p>Além dos arquivos, você também receberá por email instruções de como fazer a instalação do tema e recomendações de uso.</p>';
				echo '<p>O tempo de recebimento dos produtos levam poucos minutos após a compra quando feita com Pix, cartão de crédito ou Paypal. Pagamento via boleto pode levar até 1 dia útil para recebimento.</p>';
			echo '</div>';
		echo '</div>';

		echo '<div class="aba">';
			echo '<div class="aba-titulo">Eu não recebi o email com os arquivos do '.$nomeproduto.'! E agora?</div>';
			echo '<div class="aba-conteudo">';
				echo '<p>Eu sinto muito por este inconveniente! Primeiramente, cheque sua caixa de spam e lixeira para ver se os emails cairam por lá. Caso contrário, por favor, entre em contato comigo com o nº do seu pedido para que eu possa te ajudar!</p>';
			echo '</div>';
		echo '</div>';

	echo '</div>';

	echo '<div class="wp-block-column">';
	
		echo '<div class="aba" style="margin-top: 20px;">';
			echo '<div class="aba-titulo">O studio oferece reembolso?</div>';
			echo '<div class="aba-conteudo">';
				echo '<p>Pela natureza dos produtos do studio serem arquivos de acesso e consumo imediato, não é oferecida a opção de reembolso <em>caso o produto já tenha sido baixado</em>. Toda vez que um download é feito, fica registrado no seu pedido. Com esse controle, é possível saber quem já "consumiu" o produto.</p>';
				echo '<p>Uma vez que o arquivo tenha sido baixado e encontra-se em algum dispositivo de sua posse, ele pertencerá a você e o terá para sempre, independente de reembolso. É por isso que o studio não faz devolução, pois não há como comprovar que foram excluídas todas as cópias dos arquivos recebidos.</p>';
				echo '<p>Para evitar qualquer constrangimento, por favor, sinta-se livre para entrar em contato pelos canais de suporte do site para sanar todas suas dúvidas antes de realizar sua compra, inclusive visualizar todas as páginas demonstrativas do '.$nomeproduto.' e o nosso tour demonstrado aqui na página.</p>';
				echo '<p>Os canais de suporte são pelo email <a href="mailto:suporte@afcweb.design" target="_blank">suporte@afcweb.design</a> e <a href="https://api.whatsapp.com/send?phone=5562996269941" target="_blank">whatsapp</a>, funcionando de segunda à sexta, das 14h às 17h.</p>';
			echo '</div>';
		echo '</div>';

		echo '<div class="aba">';
			echo '<div class="aba-titulo">O que <em>é coberto</em> pelo suporte?</div>';
			echo '<div class="aba-conteudo">';
				echo '<p>O suporte cobre retirada de dúvidas quanto à instalação e configuração do '.$nomeproduto.' e plugins recomendados oficialmente no instalador de plugins do tema. </p>';
				echo '<p>O suporte também cobre correções de problemas oriundos de qualquer um dos recursos que o tema originalmente fornece, desde que sejam comprovados, incluindo bugs &mdash; o que poderá implicar no lançamento de uma versão do produto para corrigir.</p>';
				echo '<p>O prazo padrão de suporte é de 6 meses, mas quando estendido aumenta para 1 ano e ganha instalação do template, cobrindo toda licença!  Só não há customização, ok?</p>';
				echo '<p>Os canais de suporte são pelo email <a href="mailto:suporte@afcweb.design" target="_blank">suporte@afcweb.design</a> e <a href="https://api.whatsapp.com/send?phone=5562996269941" target="_blank">whatsapp</a>, funcionando de segunda à sexta, das 14h às 17h.</p>';
			echo '</div>';
		echo '</div>';

		echo '<div class="aba">';
			echo '<div class="aba-titulo">O que <em>não é coberto</em> pelo suporte?</div>';
			echo '<div class="aba-conteudo">';
				echo '<p>- Suporte geral à plataforma WordPress ou mal uso da mesma;<br>';
				echo '- Problemas provenientes de edição no código-fonte original do '.$nomeproduto.' ou da extensão para Woocommerce realizados diretamente por você ou outras pessoas;<br>';
				echo '- Incompatibilidade, problemas ou bugs provenientes com plugins de terceiros ou servidor;<br>';
				echo '- Consultoria de design ou inserção de conteúdo, tais como: dicas mudança de identidade visual, inserção ou remoção de textos e elementos, personalizações etc;<br>';
				echo '- Modificações no código-fonte do '.$nomeproduto.' ou da extensão para Woocommerce;<br>';
				echo '- Instalação do template (possível apenas para suporte estendido);<br>';
				echo '- Customização;<br>';
				echo '- Acréscimo de recursos além dos oferecidos originalmente;</p>';
			echo '</div>';
		echo '</div>';

		echo '<div class="aba">';
			echo '<div class="aba-titulo">Aceita pagamento internacional?</div>';
			echo '<div class="aba-conteudo">';
				echo '<p>Sim! Para compras com cartão estrangeiro o studio usa o Stripe (bandeiras visa e master) para compras no cartão e o Paypal para transação entre contas. Para que a transação ocorra com sucesso é preciso que o cartão estrangeiro seja apto à compra internacional, pois a transação é na moeda Real Brasileiro. Infelizmente não é possível parcelar.</p>';

				echo '<p>Vale lembrar que o studio não é responsável por taxas adicionais que podem ser cobradas na fatura de seu cartão, nem tarifas de conversão de moeda.</p>';

				echo '<p><strong>Dica:</strong> se você mora no exterior e tem cartão brasileiro, você poderá parcelar sua compra informando o endereço daqui do Brasil do qual é enviada a fatura do seu cartão. <em>É imprescindível que o endereço informado no checkout seja verdadeiro</em> e que coincida com os dados do cartão para que o sistema anti-fraude do gateway não bloqueie sua compra, ok?</p>';
			echo '</div>';
		echo '</div>';

		echo '<div class="aba">';
			echo '<div class="aba-titulo">O '.$nomeproduto.' vai aumentar minhas visitas automaticamente?</div>';
			echo '<div class="aba-conteudo">';
				echo '<p>O '.$nomeproduto.' pode potencializar a conversão de suas vendas, captura de leads e reter por mais tempo os visitantes em seu blog por conta do seu design e sua performance. Entretanto, ele não é capaz de fazer um milagre sozinho &mdash; nenhum template é capaz de fazer esse papel.<p>';
				echo '<p>Você é 100% responsável pelo sucesso do seu site e do seu negócio. Portanto, escreva um ótimo conteúdo e seja autêntica! O '.$nomeproduto.' só está aqui como uma ferramenta para te ajudar a realizar seus sonhos, combinado? Então, decole! 😍✨</p>';
			echo '</div>';
		echo '</div>';

		echo '<div class="aba">';
			echo '<div class="aba-titulo">Qual são os requisitos de servidor para rodar o '.$nomeproduto.'?</div>';
			echo '<div class="aba-conteudo">';
				echo '<p>O '.$nomeproduto.' roda perfeitamente em servidores de sistema operacional Linux com webserver Apache, LiteSpeed ou Nginx, com versão PHP 7.3 ou superior, sendo a 7.4 a ideal. Não há garantia de que o tema funcione em servidores em condições defasadas ou versões muito antigas de PHP, bem como servidores com sistema operacional Windows e versão inferior à 5.6 da própria plataforma Wordpress.</p>';
				echo '<p>A maioria das empresas de hospedagem mais famosas do mercado oferecem suporte aos requisitos acima em qualquer plano, como  <a href="https://cliente.nuvemhospedagem.com.br/aff.php?aff=20" target="_blank" rel="noopener">Nuvem Hospedagem</a>, Hostgator, Hostinger, GoDaddy, Umbler etc.</p>';
			echo '</div>';
		echo '</div>';

		echo '<div class="aba">';
			echo '<div class="aba-titulo">O '.$nomeproduto.' vai manter meu Wordpress atualizado?</div>';
			echo '<div class="aba-conteudo">';
				echo '<p>Não, pois isso não é o papel de um template. O template apenas aplica o design do site, que é uma pequena parte de todo um sistema bastante complexo que é o Wordpress.</p>';
				echo '<p>Qualquer atualização de sistema, configuração e monitoramento de servidor, instalação de layout, manutenção, gerenciamento do painel de site e todo seu conteúdo fica inteiramente sob sua responsabilidade &mdash; e isso não faz parte do suporte originalmente oferecido em loja, mesmo que ele seja ampliado de 6 meses para 1 ano, ok?</p>';
				echo '<p>Caso você não queira se preocupar com toda essa parte técnica de manter um site e ficar responsável apenas pelo conteúdo, você pode contratar um <a href="https://afcweb.design/servicos/planos" target="_blank">plano de manutenção</a> comigo. 💜 É um serviço totalmente à parte do tema e 100% opcional.</p>';
				echo '<p>Ao adquirir o Aurora, automaticamente você já entra na categoria de cliente vip do studio, <a href="https://afcweb.design/servicos/planos" target="_blank">pagando bem mais barato</a> na assinatura em relação às clientes que não possuem um template do studio.</p>';
			echo '</div>';
		echo '</div>';

		echo '<div class="aba">';
			echo '<div class="aba-titulo">Posso adquirir a extensão para Woocommerce depois?</div>';
			echo '<div class="aba-conteudo">';
				echo '<p>Sim, sem problemas! Entretanto, o valor é diferente quando comprado separadamente, ok? Ele possui um desconto especial quando é adicionado junto com qualquer tema da loja no carrinho.</p>';
			echo '</div>';
		echo '</div>';

		echo '<div class="aba">';
			echo '<div class="aba-titulo">Posso comprar a extensão para Woocommerce sem ter o '.$nomeproduto.'?</div>';
			echo '<div class="aba-conteudo">';
				echo '<p>Não. A extensão Woocommerce ready, assim como qualquer outra extensão vendida dentro do site do studio, são <u>funcionalidades extras aos layouts</u> vendidos por aqui. Mesmo que sua instalação e estrutura seja como qualquer outro plugin Wordpress, dependerá obrigatoriamente de um tema autoral do studio para funcionar. <em>É por isso que não vendemos como "plugin", mas sim como "extensão"!</em></p>';
			echo '</div>';
		echo '</div>';


		

		

		

	echo '</div>';

	echo '<div class="wp-block-column">';		

		echo '<div class="aba" style="margin-top: 20px;">';
			echo '<div class="aba-titulo">O '.$nomeproduto.' funciona no novo editor do Wordpress?</div>';
			echo '<div class="aba-conteudo">';
				echo '<p>O '.$nomeproduto.' foi projetado exclusivamente para o Gutenberg &mdash; então, a resposta é SIM! Todos os blocos originais do Wordpress foram testados e devidamente personalizados para você edite suas publicações com até 95% de fidelidade ao resultado final do post no layout.</p>';
				echo '<p><em>Mas e o editor antigo, Ana?</em> Com o editor clássico entrando em desuso, ele não foi prioridade no desenvolvimento do '.$nomeproduto.'. Vários detalhes de formatação e diagramação mostradas no site de demonstração do tema não são suportadas no editor antigo.</p>';
				echo '<p>Mesmo que seja possível usar o editor clássico no '.$nomeproduto.', <em>fortemente recomendo que você passe a escrever suas novas publicações no novo editor ao adquirir o tema!</em> Publicações já realizadas no editor antigo tendem a permanecer intactas.</p>';
			echo '</div>';
		echo '</div>';


		echo '<div class="aba">';
			echo '<div class="aba-titulo">Quais navegadores são compatíveis?</div>';
			echo '<div class="aba-conteudo">';
				echo '<p>O '.$nomeproduto.' é <em>crossbrowser</em>, o que significa que ele foi projetado para ser compatível com as versões mais atuais dos principais navegadores do mercado. Ele foi testado e aprovado no Google Chrome, Safari, Microsoft Edge, Firefox, Opera e Brave nas versões para desktop e mobile.</p>';
				echo '<p>Navegadores desatualizados ou obsoletos (como o Internet Explorer) podem apresentar problemas de compatibilidade nos elementos de design. O mesmo tipo de problema poderá ocorrer em navegadores para smartphones voltados para restrição de recursos para conexões lentas ou limitação de dados, como Opera Mini e Firefox Focus.</p>';
			echo '</div>';
		echo '</div>';

		echo '<div class="aba">';
			echo '<div class="aba-titulo">O '.$nomeproduto.' funciona em smartphones?</div>';
			echo '<div class="aba-conteudo">';
				echo '<p>O '.$nomeproduto.' é 100% responsivo, <a href="https://search.google.com/test/mobile-friendly?id=rFj6hRJN6JfYqO5WWAS3wA" target="_blank" rel="noopener">comprovado pelo Mobile Friendly Tester</a> do Google! Isso significa que o layout se reajusta lindamente de forma automatica segundo com a tela de qualquer disposito.</p>';
				echo '<p>Aproveite e leia o artigo sobre <a href="https://afcweb.design/blog/quais-as-vantagens-de-ter-um-site-responsivo/" target="_blank">as vantagens de ter um site responsivo</a>!</p>';
			echo '</div>';
		echo '</div>';


		echo '<div class="aba">';
			echo '<div class="aba-titulo">Quais plugins são obrigatórios com o '.$nomeproduto.'?</div>';
			echo '<div class="aba-conteudo">';
				echo '<p>O '.$nomeproduto.' faz questão de apenas 2 plugins para funcionar: o Advanced Custom Fields PRO (carinhosamente chamado de ACF), que é a ferramenta auxiliar para construção de painel de controle personalizado, e sua extensão Image Aspect Ratio Crop (de recorte de imagens).</p>';
				echo '<p>O ACF PRO é um plugin premium, sob licença do studio, que vem incluso no pacote .zip do tema. Não há necessidade de pagar separadamente pelo plugin para você mesma possa ter a licença e garantir atualizações automáticas. Apesar de ser desejável, é totalmente opcional.</p>';
				echo '<p>Sempre que tiver alguma atualização do '.$nomeproduto.', será incluída a última versão do ACF e, assim, você ficará com o plugin atualizado sempre quando possível.</p>';
				echo '<p>Já o plugin Image Aspect Ratio Crop é grátis e pode receber atualizações diretamente pelo core do Wordpress.</p>';
			echo '</div>';
		echo '</div>';

		echo '<div class="aba">';
			echo '<div class="aba-titulo">Como instalo ou atualizo o '.$nomeproduto.'?</div>';
			echo '<div class="aba-conteudo">';
				echo '<p>Entre no seu painel Wordpress, em Aparência > Temas, e clique em "Adicionar novo" e depois em "Enviar tema". Primeiro, você irá enviar .zip do tema principal do '.$nomeproduto.' e depois o tema filho dele. Ative o tema filho e siga com as instruções de instalação dos plugins obrigatórios e o painel "Orientações" para seguir com as personalizações.</p>';
				echo '<p>Esse procedimento de instalar o .zip é exatamente o mesmo para fazer a atualização do tema! O próprio Wordress vai identificar que o tema enviado é mais atual que o existente. Ao mostrar essa identificação, é só confirmar a substituição de seu tema!</p>';
			echo '</div>';
		echo '</div>';

		echo '<div class="aba">';
			echo '<div class="aba-titulo">É possível que meu site "quebre" ao instalar o '.$nomeproduto.'?</div>';
			echo '<div class="aba-conteudo">';
				echo '<p>O Aurora foi projetado para evitar qualquer tipo de perda de conteúdo. Entretanto, se o seu conteúdo atual dependa de funções do tema anterior ou de algum plugin específico, é provavel que você precisa fazer algumas alterações para adequar ao '.$nomeproduto.' recém instalado.</p>';
				echo '<p>Para evitar qualquer tipo de problema de perda de conteúdo, recomendo que ative algum tema padrão do Wordpress, como o Twenty Twienty-one. Se o seu conteúdo ainda estiver por lá, assim será no tema '.$nomeproduto.' também. :)</p>';
			echo '</div>';
		echo '</div>';


		echo '<div class="aba">';
			echo '<div class="aba-titulo">Por quanto tempo terei acesso ao '.$nomeproduto.'?</div>';
			echo '<div class="aba-conteudo">';
				echo '<p>A licença te dá a permissão de usar o '.$nomeproduto.' pra sempre! Entretanto, você poderá baixa-lo por até 1 ano por conta das atualizações. Por isso, sempre ao baixar em sua última versão disponível, guarde os arquivos com segurança no seu computador. Depois do vencimento de 1 ano, não será possível baixar novamente, a não ser que você renove sua licença.</p>';
				echo '<p>A renovação de licença sempre será num valor mais acessível, de 40% a 60% de desconto em relação ao primeiro ano.</p>';
			echo '</div>';
		echo '</div>';

		echo '<div class="aba">';
			echo '<div class="aba-titulo">Posso passar o '.$nomeproduto.' para alguém?</div>';
			echo '<div class="aba-conteudo">';
				echo '<p>A licença é individual e intransferível, ou seja, só você poderá usa-lo e só você poderá ter acesso ao suporte! </p>';
				echo '<p>Se você é um profissional e quer usar o '.$nomeproduto.' no site de uma cliente ou quer instalar no site de uma amiga, a pessoa favorecida deverá comprar o tema separadamente para ter sua própria licença, ok?</p>';
			echo '</div>';
		echo '</div>';

		echo '<div class="aba">';
			echo '<div class="aba-titulo">Posso revender o tema '.$nomeproduto.'?</div>';
			echo '<div class="aba-conteudo">';
				echo '<p>Sim! A revenda que é permitida fica dentro das condições do programa de afiliadas do studio. Você pode ter <strong>até 30% de comissão</strong> em cada venda com seu link exclusivo.</p>';
				echo '<p>Para saber mais, leia os <a href="https://afcweb.design/termos/programa-afiliadas/" target="_blank">termos</a> do programa. Para enviar seu pedido de afiliação, entre com seu login e senha na área de membros do site e clique no botão "Afilie-se".</p>';
			echo '</div>';
		echo '</div>';

		echo '<div class="aba">';
			echo '<div class="aba-titulo">Posso instalar em quantos domínios?</div>';
			echo '<div class="aba-conteudo">';
				echo '<p>Você poderá instalar o '.$nomeproduto.' em quantos domínios quiser desde que você seja titular legal, ou seja, que estão sob sua responsabilidade e em seu CPF/CNPJ.</p>';
			echo '</div>';
		echo '</div>';



	echo '</div>';

echo '</div>';

echo '<p class="has-text-align-center" style="margin-top: 3em; margin-bottom: 20px"><em>Retirou todas as dúvidas?</em><br><a class="button roxo medio jump" href="#comprar">Sim, quero comprar!</a></p>';

echo '<p class="has-text-align-center" style="font-size:.8em">Se você tem mais alguma dúvida, me chame no whats!</p>';
