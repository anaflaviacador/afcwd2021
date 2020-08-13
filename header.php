<?php 
echo '<!DOCTYPE html>';
echo '<html lang="pt-BR" dir="ltr">';
echo '<head>';
	echo '<title class="notranslate">'; 
		echo wp_title( '|', true, 'right' ); echo get_bloginfo('name');
	echo '</title>';
get_template_part('inc/metatags');
echo '</head>';
echo '<body class="'.join(' ',get_body_class()).'">';

echo '<main>';

	echo '<header id="cabecalho" class="container">';
		echo '<div class="nav-mini">';
			echo '<div>&nbsp;</div>';

			if (class_exists('Woocommerce')) { 
				echo '<div class="menu-loja">';
					echo '<a href="#" class="conta">';
						echo '<i class="fas fa-user-lock"></i><span> Cliente</span>';
					echo '</a>';
					echo '<a href="#" class="carrinho">';
						echo '<i class="fas fa-shopping-cart"></i><span> 1</span>';
					echo '</a>';
				echo '</div>';
			}
		echo '</div>';

		// echo '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab temporibus a perferendis aspernatur necessitatibus tempora est accusantium ut voluptatum voluptatibus.</p>';
	echo '</header>';

