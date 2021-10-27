<?php
// global $post;
$referrer = get_permalink($post->ID);

if (is_front_page()) $referrer = 'homepage';
if (is_post_type_archive('etheme_portfolio')) $referrer = 'projetos';
if (is_post_type_archive('afc_depoimentos')) $referrer = 'depoimentos';

echo '<form action="https://mail.afcwebdesign.studio/subscribe" method="POST" target="_blank" accept-charset="utf-8">';
	echo '<label for="name"><input style="margin-top:10px;" type="text" name="name" placeholder="Primeiro nome *" required/><i class="fal fa-lock-alt"></i></label>';
	echo '<label for="email"><input type="email" name="email" placeholder="E-mail favorito *" /><i class="fal fa-envelope"></i></label>';
	echo '<label for="Site"><input style="margin-top:10px;" type="text" name="Site" placeholder="Nome do seu negócio / blog" /><i class="fal fa-home-heart"></i><span>Ex: Blog DecorArt; Silva advogados.</span></label>';
	
	echo '<input type="text" style="display:none;" tabindex="-1" name="origem" id="origem" value="'.$referrer.' form"/>';

	echo '<div style="display:none;"><input type="text" name="hp" id="hp"/></div>';
	echo '<input type="hidden" name="list" value="BH0ACmpWou8929pwTyLi892Y3A"/>';
	echo '<input type="hidden" name="subform" value="yes"/>';
	echo '<button type="submit" name="submit" style="line-height:40px" class="button" id="submit"/>Assinar</button>';
echo '</form>';
// echo '<p class="infospam"><i class="fas fa-lock-alt"></i> Email seguro e protegido contra spam!</p>';
