<?php

echo '<div class="canvas" id="canvas-bar"><h2><span aria-hidden="true">Navegue</span>Conheça mais</h2><ul role="navigation">'; afc_menu('secondary'); echo '</ul></div>';

if (class_exists('Woocommerce')) {  
	echo '<div class="canvas" id="canvas-cliente"><h2><span aria-hidden="true">Cliente</span>Minha conta</h2>'; 
		do_action( 'woocommerce_account_navigation' );
	echo '</div>';
}