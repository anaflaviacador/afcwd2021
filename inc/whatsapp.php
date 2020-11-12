<?php
$urlTema = get_template_directory_uri();
$webp = strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' );
$extensao = 'png';
if( $webp == true ) $extensao = 'webp';


echo '<div id="afc_btwhats">';
	echo '<button></button>';

	echo '<div class="afc_btwhats_box">';
		echo '<div class="foto" style="background-image: url('.$urlTema.'/img/anaflaviacador-150.'.$extensao.');">';
			echo '<img src="'.$urlTema.'/img/anaflaviacador-150.'.$extensao.'">';
			echo '<div class="status on" id="afc_btwhats_status"></div>';
		echo '</div>';

		echo '<div class="afc_btwhats_box_saudacoes" id="afc_btwhats_box_saudacoes"></div>';
		echo '<p class="afc_btwhats_box_chamada" id="afc_btwhats_box_chamada"></p>';
		
		echo '<div class="afc_btwhats_box_form">';
			echo '<input type="text" id="afc_btwhats_box_form_escrever" maxlength="60" placeholder="Fale comigo e tire suas dúvidas">';
			echo '<a href="" target="_blank" id="afc_btwhats_box_form_mandar">&nbsp;</a>';
		echo '</div>';
		
		echo '<div class="afc_btwhats_box_horario">Atendimento: 14h às 17h, de seg à sexta</div>';
	echo '</div>';
echo '</div>';