<?php  

echo '<footer id="rodape">';
	echo '<nav class="menu-site" aria-label="Navegação do rodapé do site">';
		echo '<ul id="navegacao" role="navigation">';
			afc_menu('primary');
		echo '</ul>';
	echo '</nav>';

	echo '<div class="copyright">';
		echo '<div class="container">';
			echo '<div>&copy; 2020 - CNPJ 24.014.911/0001-36 &nbsp;|&nbsp; <a href="#">Política de Privacidade</a></div>';
			echo '<div>';
				echo '<a href="https://www.instagram.com/anaflaviacador"><i class="fab fa-instagram"></i></a>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
echo '</footer>';

echo '</main>';

get_template_part('inc/whatsapp');

wp_footer(); // scripts e tudo mais

echo '</body>';
echo '</html>';