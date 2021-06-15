<?php
global $product;
$demo_principal = get_field('demo_principal',$product->ID);
$demo_exemplos = get_field('demo_exemplos',$product->ID);
echo '<p class="area-botoes has-text-align-center">';
    if($demo_principal) echo '<a href="'.esc_url($demo_principal['url']).'" target="_blank" rel="noopener" class="button grafite mini">'.esc_html($demo_principal['title']).'</a>';
    if($demo_exemplos && count($demo_exemplos) > 1) echo '<a href="#exemplos-lista" class="button grafite mini abre-modal" data-target="#exemplos-lista">Lista exemplos</a>';
echo '</p>';