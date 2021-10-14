<?php get_header(); 

$url = home_url(('/'));

		echo '<div class="container" id="pagina-planos">';
			if (have_posts()) { while (have_posts()) : the_post();
				echo '<article>';
						the_content();
				echo '</article>';
			endwhile; }

			$cancela = '<p>* Você pode assinar quando quiser e cancelar quando desejar. Zero fidelidade!</p>';

			get_template_part('inc/emailmkt','planos');



			echo '<div class="wp-block-columns" style="margin-bottom:0">';
				echo '<div class="wp-block-column is-vertically-aligned-center">';
				
					echo '<h4 class="has-text-align-center">Sobre a plataforma</h4>';
					echo '<p class="has-text-align-center">Conheça o <a href="https://sendy.co/?ref=v0hCr" target="_blank" rel="noopener"><u>site oficial do Sendy</u></a>, o software de email marketing auto-hospedado que o studio '.do_shortcode('[afc]').' utiliza! Clique abaixo no link demonstrativo da plataforma para conhecer o painel.</p>';
					echo '<br>';
					echo '<p class="has-text-align-center"><a href="https://sendy.co/demo/login" class="button grafite" target="_blank" rel="nofollow noopener">Ver demo</a></p>';
					echo '<br>';
				echo '</div>';



				echo '<div class="wp-block-column">';
					echo '<figure class="wp-block-image size-large">'; 
						echo '<img loading="lazy" src="https://afcweb.design/wp-content/uploads/2021/10/feature2-1024x638.jpg" style="box-shadow: 0 0 15px rgba(0,0,0,0.15)">';
						
					echo '<figcaption style="font-size:10px">Fonte: https://sendy.co</figcaption></figure>';
				echo '</div>';
			echo '</div>';			


			echo '<section id="lista-servicos">';

				echo '<h3 class="cursivo assinado" style="line-height: .3;z-index:1; position:relative">benefícios</h3>';
				echo '<ul>';

					echo '<li class="roxo" data-aos="fade-up">';
						echo '<header><i class="icone fal fa-reply-all"></i>';
						echo '<h5 class="marca-dagua">Autorespostas e segmentações <span aria-hidden="true">automações</span></h5></header>';
							echo '<p style="font-size:.9em">Mantenha sua audiência conectada atráves de sequências de emails baseadas na data de inscrição ou uma data personalizada, podendo criar automações diferentes para cada segmentação interna de uma lista.</p>';
					echo '</li>';

					echo '<li class="azul" data-aos="fade-up">';
						echo '<header><i class="icone fal fa-rocket-launch"></i>';
						echo '<h5 class="marca-dagua">Leads e listas ilimitadas <span aria-hidden="true">armazenamento livre</span></h5></header>';
							echo '<p style="font-size:.9em">Armazene quantos contatos desejar e crie quantas listas quiser dentro de sua conta sem se preocupar com limite de armazenamento! Os planos são cotados pelos "disparos" (envios), que inclui confirmações e automações.</p>';
					echo '</li>';

					echo '<li class="bege" data-aos="fade-up">';
						echo '<header><i class="icone fal fa-user-shield"></i>';
						echo '<h5 class="marca-dagua">Compatível com LGPD <span aria-hidden="true">proteção de dados</span></h5></header>';
							echo '<p style="font-size:.9em">Opção de checkbox na captura para acordo da política de privacidade; opção de desabilitar rastreamento de dados pessoais das campanhas e envio de emails apenas para leads que aceitaram os termos de política.</p>';
					echo '</li>';

					echo '<li class="verde" data-aos="fade-up">';
						echo '<header><i class="icone fal fa-chart-line"></i>';
						echo '<h5 class="marca-dagua">Relatórios e estatísticas <span aria-hidden="true">de todas as campanhas</span></h5></header>';
							echo '<p style="font-size:.9em">Relatório de listas, campanhas e automações realizadas com índice de taxa de abertura, cliques, taxa de rejeição (bounce), reclamação de spam e cancelamentos de inscrições.</p>';
					echo '</li>';


					echo '<li class="rosa" data-aos="fade-up">';
						echo '<header><i class="icone fal fa-layer-plus"></i>';
						echo '<h5 class="marca-dagua">Campos personalizados <span aria-hidden="true">para listas mais complexas</span></h5></header>';
							echo '<p style="font-size:.9em">Monte listas complexas com vários campos personalizados (baseados em datas ou em texto) para ajudar nas segmentações de suas listas e organização de público.</p>';
					echo '</li>';


					echo '<li class="roxo" data-aos="fade-up">';
						echo '<header><i class="icone fab fa-aws"></i>';
						echo '<h5 class="marca-dagua">Envios pela Amazon <span aria-hidden="true">com boa reputação</span></h5></header>';
							echo '<p style="font-size:.9em">Envie emails com seu endereço personalizado e disparados via <a href="https://aws.amazon.com/pt/ses/" target="_blank" rel="nofollow noopener"><u>Simple Email Service</u></a> da Amazon. Os servidores possuem boa reputação, o que ajuda seus emails não cairem em spam.</p>';
					echo '</li>';

					echo '<li class="azul" data-aos="fade-up">';
						echo '<header><i class="icone fal fa-check-double"></i>';
						echo '<h5 class="marca-dagua">Duplo opt-in e confirmações <span aria-hidden="true">páginas personalizadas</span></h5></header>';
							echo '<p style="font-size:.9em">Confirmação de inscrição simples ou dupla, com opção de adicionar páginas personalizadas de seu site para agradecimentos, recebimento de freebies, cupons de desconto etc.</p>';
					echo '</li>';

					echo '<li class="bege" data-aos="fade-up">';
						echo '<header style="margin-top:-25px">';
						echo '<svg width="150" height="29" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" viewBox="0 0 210 43"><path fill="var(--cor-bege)" fill-rule="nonzero" d="M65.08.69H7.4A6.53 6.53 0 00.74 7.13v22.01c0 3.65 3.05 6.09 6.7 6.09h27.3l12.5 6.95-2.84-6.95h20.68c3.65 0 7.3-2.44 7.3-6.09V7.13c0-3.65-3.65-6.44-7.3-6.44zM29.83 29.52c.05.72-.06 1.36-.35 1.9-.35.65-.87 1-1.53 1.05-.76.06-1.54-.29-2.3-1.07-2.69-2.75-4.83-6.87-6.4-12.34-1.88 3.7-3.27 6.49-4.17 8.34-1.7 3.28-3.16 4.96-4.37 5.04-.78.06-1.45-.6-2.03-2C7.2 26.66 5.61 19.33 3.9 8.47c-.09-.76.06-1.42.46-1.94.41-.55 1.02-.84 1.83-.9 1.48-.12 2.32.58 2.52 2.08.9 6.06 1.88 11.19 2.92 15.39L17.98 11c.58-1.1 1.3-1.68 2.17-1.74 1.28-.09 2.06.72 2.37 2.43a54.35 54.35 0 002.76 9.91c.75-7.36 2.03-12.66 3.82-15.93a2.22 2.22 0 011.91-1.28c.67-.05 1.28.15 1.83.58.55.44.84.99.9 1.65.02.53-.06.96-.3 1.4-1.12 2.08-2.05 5.58-2.8 10.45-.73 4.72-.99 8.4-.81 11.04zm35.95-4.55c-1.74 2.9-4 4.34-6.81 4.34-.5 0-1.02-.05-1.56-.17a6.66 6.66 0 01-4.64-3.36c-.93-1.6-1.4-3.5-1.4-5.74 0-2.98.76-5.7 2.27-8.16 1.77-2.9 4.02-4.35 6.8-4.35.5 0 1.02.06 1.57.17a6.67 6.67 0 014.64 3.37c.92 1.56 1.39 3.44 1.39 5.7 0 2.99-.76 5.7-2.26 8.2zm-18.17 0c-1.74 2.9-4 4.34-6.8 4.34a7.5 7.5 0 01-1.57-.17 6.68 6.68 0 01-4.64-3.36c-.92-1.6-1.39-3.5-1.39-5.74 0-2.98.76-5.7 2.26-8.16 1.77-2.9 4.03-4.35 6.81-4.35.5 0 1.02.06 1.56.17a6.74 6.74 0 014.64 3.37c.93 1.56 1.4 3.44 1.4 5.7 0 2.99-.76 5.7-2.27 8.2zm139.6-14.17a9.82 9.82 0 00-2.9 7.3c0 3.16.96 5.74 2.87 7.68 1.91 1.94 4.4 2.93 7.5 2.93.9 0 1.91-.15 3.01-.47v-4.69c-1 .3-1.88.44-2.63.44a4.74 4.74 0 01-3.68-1.54 6.08 6.08 0 01-1.4-4.2c0-1.65.47-3.01 1.37-4.06a4.34 4.34 0 013.45-1.59c.9 0 1.85.15 2.9.44v-4.7c-.96-.26-2.04-.37-3.16-.37a9.91 9.91 0 00-7.33 2.83zM99.1 7.94c-2.66 0-4.75.9-6.25 2.66-1.5 1.77-2.23 4.26-2.23 7.45 0 3.44.75 6.08 2.23 7.9 1.48 1.83 3.65 2.76 6.49 2.76 2.75 0 4.86-.93 6.34-2.75 1.48-1.83 2.23-4.4 2.23-7.71 0-3.3-.75-5.85-2.26-7.65-1.53-1.77-3.7-2.66-6.54-2.66zm-20.1 2.86a9.82 9.82 0 00-2.9 7.3c0 3.16.96 5.74 2.87 7.68 1.92 1.94 4.4 2.93 7.5 2.93.9 0 1.92-.15 3.02-.47v-4.69c-1.01.3-1.88.44-2.64.44a4.75 4.75 0 01-3.68-1.54 6.08 6.08 0 01-1.38-4.2 6 6 0 011.36-4.06 4.33 4.33 0 013.44-1.59c.9 0 1.86.15 2.9.44v-4.7c-.95-.26-2.03-.37-3.16-.37a9.87 9.87 0 00-7.33 2.83zm83.75 9.62h4.72v-4.08h-4.72v-3.62h5.44v-4.2h-10.77v19.72h10.8v-4.2h-5.47v-3.62zm41.74 3.6v-3.63h4.73v-4.08h-4.73v-3.62h5.48v-4.2H199.2V28.2H210v-4.2h-5.5zm-21.26-6.73c.55-.9.84-1.82.84-2.78 0-1.85-.73-3.33-2.17-4.4-1.45-1.07-3.45-1.62-5.94-1.62h-6.2V28.2h5.33v-8.97h.08l4.32 8.97h5.62l-4.26-8.89a5.28 5.28 0 002.38-2.03zm-36.88-8.8l-1.04 4.43a103.8 103.8 0 00-.75 3.48l-.58 3.07c-.55-3.07-1.3-6.72-2.26-10.98H135l-2.52 19.72h5.04l1.36-13.58 3.45 13.58h3.59l3.27-13.55 1.42 13.55h5.27L153.23 8.5h-6.87zm-24.13 0l-1.04 4.43a103.8 103.8 0 00-.75 3.48l-.58 3.07c-.55-3.07-1.3-6.72-2.26-10.98h-6.72l-2.52 19.72h5.04l1.36-13.58 3.45 13.58h3.59l3.3-13.55 1.42 13.55h5.27L129.13 8.5h-6.9zm-61.26 3.94c-1.05-.2-2.06.37-3.02 1.8a9.36 9.36 0 00-1.73 5.55c0 .84.17 1.74.51 2.64.44 1.13 1.02 1.74 1.72 1.88.72.15 1.5-.17 2.34-.92 1.08-.96 1.8-2.38 2.2-4.3.12-.66.2-1.38.2-2.13a7.4 7.4 0 00-.51-2.64c-.44-1.13-1.02-1.74-1.71-1.88zm-18.17 0c-1.04-.2-2.06.37-3.01 1.8a9.36 9.36 0 00-1.74 5.55c0 .84.18 1.74.53 2.64.43 1.13 1 1.74 1.7 1.88.73.15 1.51-.17 2.35-.92 1.07-.96 1.8-2.38 2.2-4.3.15-.66.2-1.38.2-2.13a7.3 7.3 0 00-.52-2.64c-.43-1.13-1.01-1.74-1.7-1.88zM101.4 23a2.57 2.57 0 01-2.28 1.22c-.93 0-1.63-.4-2.12-1.22-.5-.81-.72-2.43-.72-4.9 0-3.79.95-5.67 2.9-5.67 2.03 0 3.07 1.9 3.07 5.76-.03 2.38-.33 4-.84 4.8zm73.67-6.03v-4.69c1.27.03 2.17.23 2.72.64.56.4.81 1.04.81 1.97 0 1.36-1.19 2.06-3.53 2.08z"/></svg>';
						echo '<h5 class="marca-dagua">Integração com loja virtual <span aria-hidden="true">remarketing woocommerce</span></h5></header>';
							echo '<p style="font-size:.9em">Capture emails de clientes que comprou na sua lojinha, associando produtos a uma ou várias listas para trabalhar com um remarketing e garantir a fidelidade de seu público!</p>';
					echo '</li>';

					echo '<li class="verde" data-aos="fade-up">';
						echo '<header>';
						echo '<svg width="80" height="37" viewBox="0 0 80 37" xmlns="http://www.w3.org/2000/svg" class="css-wowemr-ZapierLogo--brand"><path fill="var(--cor-verde)" fill-rule="evenodd" clip-rule="evenodd" d="M53.9335 4.18463H50.9949L53.0729 2.11208C52.9095 1.88325 52.7272 1.66852 52.5286 1.47051C52.3301 1.2725 52.1154 1.09121 51.8859 0.928209L49.808 3.00076V0.069825C49.5361 0.024372 49.2564 0.000339343 48.972 -0.000183105H48.9662C48.6813 0.000339343 48.4021 0.024372 48.1302 0.069825V3.00076L46.0523 0.928209C45.8228 1.09121 45.6076 1.2725 45.4095 1.47051L45.4085 1.47156C45.21 1.66904 45.0282 1.88325 44.8653 2.11208L46.9433 4.18463H44.0047C44.0047 4.18463 43.9345 4.73477 43.9345 5.01951V5.02316C43.9345 5.30737 43.9586 5.58688 44.0047 5.85856H46.9433L44.8653 7.93059C45.1922 8.38826 45.5934 8.78897 46.0523 9.11446L48.1302 7.0419V9.97284C48.4021 10.0183 48.6807 10.0423 48.9652 10.0429H48.9725C49.2569 10.0423 49.5366 10.0183 49.808 9.97284V7.0419L51.8865 9.11446C52.1154 8.95198 52.3301 8.77017 52.5286 8.57216H52.5292C52.7272 8.37415 52.9095 8.15942 53.0729 7.93059L50.9944 5.85856H53.9335C53.9791 5.58741 54.0032 5.30894 54.0032 5.02473V5.01794C54.0032 4.73373 53.9791 4.45578 53.9335 4.18463ZM58.8497 25.5304C58.0105 24.7441 57.571 23.5038 57.5302 21.8095H68.1148C68.1347 21.588 68.1551 21.3215 68.175 21.0081C68.1955 20.6956 68.206 20.3984 68.206 20.1157C68.206 19.087 68.064 18.1346 67.7811 17.2574C67.4978 16.3802 67.0834 15.6242 66.5381 14.9889C65.9918 14.3536 65.3145 13.8547 64.5058 13.4916C63.697 13.1285 62.7568 12.9467 61.6856 12.9467C60.4316 12.9467 59.3447 13.1635 58.4249 13.5971C57.5051 14.0313 56.7419 14.6159 56.1353 15.3515C55.5292 16.0882 55.0788 16.9549 54.786 17.9528C54.4926 18.9517 54.346 20.0253 54.346 21.1742C54.346 22.3445 54.4979 23.4181 54.8011 24.3961C55.1044 25.3742 55.5848 26.2216 56.2416 26.9373C56.8985 27.6531 57.7329 28.2074 58.7439 28.6008C59.7543 28.9942 60.9674 29.1907 62.3833 29.1907C63.3534 29.1907 64.2376 29.1196 65.0369 28.9791C65.8347 28.8375 66.568 28.6264 67.2353 28.3438C67.2149 27.9201 67.1547 27.4922 67.0536 27.058C66.952 26.6244 66.821 26.2566 66.6591 25.9541C65.3648 26.4582 64.0008 26.7106 62.565 26.7106C60.9271 26.7106 59.6888 26.3167 58.8497 25.5304ZM30.5092 13.3096C30.7109 13.2699 30.9183 13.2396 31.1305 13.2192C31.3431 13.1993 31.56 13.1889 31.7826 13.1889C31.9843 13.1889 32.1969 13.1993 32.4195 13.2192C32.6416 13.2396 32.8543 13.2699 33.0565 13.3096C33.0764 13.3508 33.1021 13.4762 33.1319 13.6883C33.1623 13.8999 33.1927 14.1267 33.2231 14.3686C33.2535 14.6105 33.2838 14.843 33.3142 15.0645C33.3446 15.2865 33.3593 15.4276 33.3593 15.4882C33.5615 15.1653 33.804 14.8529 34.0874 14.5504C34.3702 14.2479 34.7096 13.9752 35.1035 13.7338C35.4975 13.4914 35.9422 13.3002 36.4382 13.1591C36.9327 13.018 37.4837 12.947 38.0908 12.947C39.0002 12.947 39.8445 13.0985 40.6235 13.401C41.4013 13.7035 42.0681 14.1721 42.6244 14.8069C43.1802 15.4427 43.6149 16.2494 43.9287 17.2269C44.2419 18.206 44.3985 19.3595 44.3985 20.6907C44.3985 23.3526 43.6757 25.4351 42.2305 26.9371C40.7843 28.4397 38.7377 29.191 36.0888 29.191C35.6441 29.191 35.1895 29.1607 34.7243 29.1001C34.2586 29.0395 33.8548 28.9585 33.5112 28.8582V35.9666C33.2686 36.0063 33.0109 36.0366 32.738 36.057C32.4651 36.0768 32.2168 36.0873 31.9947 36.0873C31.7721 36.0873 31.5249 36.0768 31.252 36.057C30.9791 36.0366 30.7313 36.0063 30.5092 35.9666V13.3096ZM24.2918 18.6036C24.2918 17.4135 23.9885 16.5869 23.382 16.123C22.7754 15.6596 21.8959 15.4276 20.7435 15.4276C20.0353 15.4276 19.3738 15.4835 18.7572 15.5938C18.1402 15.705 17.5383 15.8508 16.9527 16.0321C16.5682 15.3665 16.3765 14.5708 16.3765 13.6424C17.0632 13.4209 17.8212 13.2495 18.6509 13.1283C19.4796 13.0071 20.2779 12.947 21.0468 12.947C23.0682 12.947 24.605 13.4063 25.6563 14.3232C26.7076 15.2411 27.2335 16.7082 27.2335 18.7243V28.4345C26.5259 28.596 25.6668 28.7621 24.6559 28.9335C23.6444 29.1043 22.613 29.1905 21.5622 29.1905C20.5712 29.1905 19.677 29.1001 18.8782 28.9183C18.0794 28.7365 17.4021 28.445 16.8464 28.0406C16.2901 27.6383 15.8606 27.1232 15.5573 26.4983C15.254 25.8735 15.1026 25.1175 15.1026 24.2293C15.1026 23.3631 15.2791 22.6014 15.6332 21.9457C15.9868 21.2911 16.4671 20.7462 17.0737 20.3125C17.6803 19.8794 18.378 19.556 19.1663 19.3449C19.9552 19.1328 20.7839 19.0268 21.6534 19.0268C22.3003 19.0268 22.8309 19.0425 23.2452 19.0722C23.6596 19.1031 24.0084 19.1381 24.2918 19.1783V18.6036ZM0.666687 28.4045L8.8554 15.6996H1.63731C1.57654 15.3365 1.54616 14.9337 1.54616 14.4896C1.54616 14.0664 1.57654 13.6725 1.63731 13.3094H13.3135L13.4649 13.7033L5.21597 26.438H12.9495C13.0097 26.8419 13.0406 27.2546 13.0406 27.6778C13.0406 28.0822 13.0097 28.4646 12.9495 28.8282H0.818592L0.666687 28.4045ZM23.1394 21.417C23.6046 21.4577 23.9885 21.4974 24.2918 21.5377V26.4685C23.9073 26.5694 23.4679 26.6446 22.9723 26.6948C22.4773 26.746 21.997 26.771 21.5319 26.771C21.1683 26.771 20.7839 26.7512 20.3795 26.7104C19.9751 26.6697 19.6063 26.5589 19.2727 26.3776C18.939 26.1958 18.6609 25.9341 18.4388 25.5908C18.2156 25.2486 18.1051 24.7742 18.1051 24.1692C18.1051 23.222 18.433 22.5162 19.0909 22.0518C19.7472 21.5883 20.7027 21.3559 21.9567 21.3559C22.2799 21.3559 22.6743 21.3768 23.1394 21.417ZM34.6939 26.5892C34.2895 26.5291 33.8946 26.4283 33.5112 26.2867V19.9953C33.5112 19.2284 33.6222 18.5691 33.8454 18.0137C34.0675 17.4594 34.3603 17.0001 34.7243 16.637C35.0884 16.2739 35.5022 16.0017 35.9678 15.821C36.4324 15.6392 36.918 15.5483 37.4235 15.5483C38.7775 15.5483 39.7534 16.0226 40.35 16.9698C40.9461 17.9181 41.2447 19.1986 41.2447 20.8119C41.2447 21.8203 41.1179 22.6922 40.8654 23.4278C40.6124 24.1645 40.2688 24.7742 39.8341 25.258C39.3998 25.7423 38.8792 26.1012 38.2726 26.3321C37.666 26.5641 36.9992 26.6801 36.2711 26.6801C35.6237 26.6801 35.0983 26.6493 34.6939 26.5892ZM48.129 15.6693H46.1574C46.1171 15.5079 46.0867 15.3214 46.0668 15.1098C46.0463 14.8982 46.0364 14.6913 46.0364 14.4896C46.0364 14.2885 46.0463 14.0811 46.0668 13.8695C46.0867 13.6579 46.1171 13.4714 46.1574 13.3094H51.0713V28.8282C50.8481 28.8679 50.6009 28.8977 50.328 28.9181C50.0551 28.9379 49.8068 28.9484 49.5847 28.9484C49.3825 28.9484 49.1447 28.9379 48.8723 28.9181C48.5989 28.8977 48.3511 28.8679 48.129 28.8282V15.6693ZM65.2339 19.5718C65.2339 19.0071 65.1579 18.4679 65.0065 17.9528C64.8546 17.4387 64.632 16.9904 64.3392 16.607C64.0453 16.224 63.6719 15.9163 63.2167 15.6848C62.762 15.4529 62.2209 15.3364 61.5944 15.3364C60.3609 15.3364 59.4159 15.7099 58.7585 16.456C58.1017 17.202 57.7025 18.2407 57.5606 19.5718H65.2339ZM72.1499 13.2192C71.9477 13.2396 71.7351 13.2699 71.513 13.3096V28.8279C71.7555 28.8676 72.0132 28.8979 72.2866 28.9183C72.5595 28.9382 72.8068 28.9486 73.0299 28.9486C73.2515 28.9486 73.4998 28.9382 73.7722 28.9183C74.0451 28.8979 74.2928 28.8676 74.5154 28.8279V21.114C74.5154 20.0659 74.6317 19.2086 74.8643 18.5435C75.0964 17.8779 75.4101 17.3534 75.804 16.9699C76.1984 16.5869 76.6426 16.32 77.1387 16.1685C77.6342 16.0175 78.1549 15.9417 78.7007 15.9417H79.1098C79.2816 15.9417 79.4482 15.9621 79.6105 16.0018C79.6509 15.7604 79.6865 15.5081 79.7169 15.2458C79.7467 14.9841 79.7619 14.7317 79.7619 14.4898C79.7619 14.2678 79.752 14.0562 79.7315 13.8545C79.7116 13.6534 79.6807 13.4611 79.6409 13.2793C79.5199 13.26 79.3722 13.2448 79.2009 13.2344C79.0291 13.2239 78.862 13.2192 78.7007 13.2192C77.6085 13.2192 76.7144 13.4716 76.0167 13.9752C75.3195 14.4794 74.758 15.075 74.3337 15.7604C74.3337 15.4172 74.3028 14.9992 74.2425 14.5045C74.1818 14.0113 74.121 13.6121 74.0608 13.3096C73.8785 13.2699 73.6763 13.2396 73.4542 13.2192C73.2311 13.1994 73.009 13.1889 72.7869 13.1889C72.5643 13.1889 72.3516 13.1994 72.1499 13.2192ZM50.0343 6.08373C50.1589 5.75355 50.2276 5.39671 50.2276 5.02368V5.01898C50.2276 4.64595 50.1589 4.2886 50.0343 3.95893C49.7037 3.83459 49.3455 3.76615 48.9715 3.76615H48.9667C48.5927 3.76615 48.2345 3.83459 47.9034 3.95893C47.7793 4.2886 47.7106 4.64595 47.7101 5.01898V5.02368C47.7106 5.39671 47.7793 5.75407 47.9039 6.08373C48.2345 6.20808 48.5927 6.27652 48.9667 6.27652H48.9715C49.3455 6.27652 49.7037 6.20808 50.0343 6.08373Z"></path></svg>';
						echo '<h5 class="marca-dagua">Integração com Zapier <span aria-hidden="true">automação avançada</span></h5></header>';
							echo '<p style="font-size:.9em">Com acesso a API você poderá associar suas capturas a outros serviços para automatizar suas tarefas com o Zapier, como preencher planilhas, integrar com outras listas e <a href="https://zapier.com/apps/sendy/integrations" target="_blank" rel="nofollow noopener"><u>muito mais</u></a>!</p>';
					echo '</li>';
					



				echo '</ul>';
			echo '</section>';


			

			echo '<h2 class="cursivo has-text-align-center faq-emailmkt" id="faq">Perguntas frequentes</h2><br>';

			get_template_part('inc/emailmkt','faq');

			echo '<p class="has-text-align-center" style="margin-top: 3em; margin-bottom: 20px"><em>Retirou todas as dúvidas?</em><br><a class="button roxo medio jump" href="#assinar">Sim, quero assinar!</a></p>';

			echo '<p class="has-text-align-center" style="font-size:.8em">Se você tem mais alguma dúvida, me chame no whats!</p>';
			

		echo '</div>';
	
get_footer();