<?php get_header(); 
$urlHome = esc_url(home_url('/'));

$idpost = get_the_ID();
$titulo = get_the_title();
$resumo = strip_tags(get_the_excerpt());
$permalink = get_the_permalink();
$thumbnail = afc_thumb('full');
$categorias = get_the_terms($idpost,'categoria_blog');

$urlTema = get_template_directory_uri();
$webp = strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' );
$png = 'png'; $jpg = 'jpg';
if( $webp == true ) {$png = 'webp'; $jpg = 'webp';}

echo '<header id="chamada-principal" class="pag-interna-destaque singular" style="background-image: url('.$thumbnail.');">';
	echo '<div class="gradiente" aria-hidden="true"></div>';
echo '</header>';
		
if (have_posts()) {
echo '<section class="container area-artigo">';

	echo '<div class="colmaior" data-aos="fade-left">';
	while (have_posts()) : the_post();
		
		echo '<div class="info-post">';

		 	if ($categorias && ! is_wp_error($terms)) {
		 		echo '<div class="temas">';
		 		foreach($categorias as $categoria) { 
					echo '<a href="'.get_term_link($categoria).'" class="button mini">'.$categoria->name.'</a>';
				}
				echo '</div>';
		 	}

			echo '<h1>'.$titulo.'</h1>';
			echo '<p>No ar em <time datetime="'.get_the_time('Y-m-d h:i').'" itemprop="datePublished">'.get_the_time('F \d\e Y').'</time>';
				$u_time = get_the_time('U'); 
				$u_modified_time = get_the_modified_time('U'); 
				if ($u_modified_time >= $u_time + 86400) { 
					$updated_date = get_the_modified_time('M / Y');
					echo ' e atualizado em '. $updated_date;
				} 
			echo '</p>';
		echo '</div>';


		$banner_pinterest = get_field('pinar_post_blog');
		$banner_oculto = get_field('ocultar_pin');
		if ($banner_pinterest && empty($banner_oculto)) {
			echo '<div class="pinar-artigo">';
				echo '<a href="//pinterest.com/pin/create/button/?url='.$permalink.'&media='.esc_url($banner_pinterest['url']).'&description='.$titulopost.' - Studio '.$nomesite.' | '.$resumo.'" data-pin-custom="true" title="">';
					echo '<span><i class="fab fa-pinterest-p" aria-hidden="true"></i> Salve esse post!</span>';
					echo '<img src="'.esc_url($banner_pinterest['sizes']['large']).'" alt="'.$titulopost.' - Studio '.$nomesite.'">';
				echo '</a>';
			echo '</div>';
		}
			
		echo '<article class="post-blog">';
			the_content();
		echo '</article>';

		echo '<footer class="rodape-post" data-aos="fade-up">';
			get_template_part('inc/blog-share');

			echo '<div class="autoria">';
				echo '<figure>';
				    echo '<img data-pin-nopin="true" srcset="'.$urlTema.'/img/anaflaviacador-150.'.$png.'" alt="Ana Flávia Cador - AFC Web Design" aria-label="Mulher morena por volta de 30 anos, de cabelos escuros até altura dos ombros sorrindo para câmera, vestida com um vestido bege de alças finas">';
				echo '</figure>';

				echo '<div class="info">';
					echo '<h5 class="cursivo">Ana Flávia Cador</h5>';
					echo '<p>Idealizadora do studio <span class="afc">'; get_template_part('img/afc'); echo '.</span> Desde 2007 realiza sonhos de <em>empreendedoras</em>, <em>influencers</em> e <em>blogueiras</em> projetando sites, lojas virtuais, blogs e ferramentas através de um  <strong class="rosa">design único</strong>, <strong class="verde">inteligente</strong>, com <strong class="roxo">personalidade</strong> e <strong class="bege">propósito</strong>.</p>';
				echo '</div>';
			echo '</div>';


			$args = array('orderby' => 'RAND', 'post_type' => 'afc_blog', 'posts_per_page' => 3, 'post__not_in' => array($idpost));
			$relacionados = new WP_Query($args);

			if ( $relacionados->have_posts() ) { $i = 0; 
				echo '<div class="relacionados lista-artigos">';
				while ( $relacionados->have_posts() ) : $i++; $relacionados->the_post(); 
					$timer = ($i / 2) * 100;

					echo '<div class="item-post-grid" data-aos="fade-up" data-aos-delay="'.$timer.'">';
						get_template_part('inc/blog-grid');
					echo '</div>';
				endwhile;
				echo '</div>';
			} wp_reset_query();

		echo '</footer>';

		if (comments_open()) {
			// comments_template('', true);
			echo '<div id="disqus_thread"></div>';
			$diqus_shortname = 'afcwebdesign'; 
			global $post;					
			echo '<script>';
				echo 'var disqus_config = function () {';
					echo 'this.page.url = \''.$permalink.'\';';
					echo 'this.page.identifier = \''.$idpost.' '.$post->guid.'\';';
				echo '};';
				echo '(function() { var d = document, s = d.createElement(\'script\'); s.src = \'https://'.$diqus_shortname.'.disqus.com/embed.js\'; s.setAttribute(\'data-timestamp\', +new Date()); (d.head || d.body).appendChild(s); })();';
			echo '</script>';
		}
	endwhile;
	echo '</div>';

	echo '<aside class="colmenor">';
		echo '<div id="indice-post"><div class="wrap">';
			echo '<div class="titulo"><i class="fas fa-stream" aria-hidden="true"></i> Índice</div>';
			echo '<ul></ul>';
		echo '</div></div>';

		get_template_part('inc/blog-share');

	echo '</aside>';

echo '</section>';
}

get_footer();