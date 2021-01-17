<?php

$titulo = get_the_title();
$permalink = get_the_permalink();
$banner_pinterest = get_field('pinar_post_blog');

echo '<ul class="share-links" aria-label="Compartilhe a publicação nas redes sociais">';
    echo '<li class="btn-facebook"><a onclick="window.open(this.href,this.target,\'width=570,height=400\');return false;" href="//www.facebook.com/sharer/sharer.php?u='.$permalink.'"><i aria-label="Compartilhar no Facebook" class="fab fa-facebook-f"></i></a></li>';

    echo '<li class="btn-twitter"><a onclick="window.open(this.href,this.target,\'width=570,height=400\');return false;" href="http://twitter.com/share?text='.$titulo.'&url='.$permalink.'&counturl='.$permalink.'"><i aria-label="Compartilhar no Twitter" class="fab fa-twitter"></i></a></li>';

    echo '<li class="btn-linkedin"><a onclick="window.open(this.href,this.target,\'width=570,height=560\');return false;" href="https://www.linkedin.com/shareArticle?mini=true&url='.$permalink.'&title='.$titulo.'&summary='.get_the_excerpt().'&source='.get_bloginfo('url').'"><i aria-label="Compartilhar no Linkedin" class="fab fa-linkedin-in"></i></a></li>';

    echo '<li class="btn-pinterest">';

		if ($banner_pinterest) {
    		echo '<a href="//pinterest.com/pin/create/button/?url='.$permalink.'&media='.esc_url($banner_pinterest['url']).'&description='.$titulopost.' - Studio '.$nomesite.' | '.$resumo.'" data-pin-custom="true"><i aria-label="Compartilhar no Pinterest" class="fab fa-pinterest-p"></i></a>';
    	} else {
    		echo '<a href="//pinterest.com/pin/create/button/?url='.$permalink.'" data-pin-custom="true" data-pin-do="buttonBookmark"><i aria-label="Compartilhar no Pinterest" class="fab fa-pinterest-p"></i></a>';
    	}
	echo '</li>';

    echo '<li class="btn-whatsapp"><a href="whatsapp://send?text='.$permalink.'"><i aria-label="Compartilhar no Whatsapp" class="fab fa-whatsapp"></i></a></li>';

    echo '<li><a href="mailto:?subject='.$titulo.' (de '.get_bloginfo('name').')&amp;body=Veja o link: '.$permalink.'"><i aria-label="Mandar por email" class="fa fa-envelope"></i></a></li>';

echo '</ul>';