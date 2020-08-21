<?php

// ========================================//
// SHORTCODES - LIMPA
// ========================================// 
function afc_shortcode_paragraph_fix($content) {  
    $array = array (
        '<p>[' => '[',
        ']</p>' => ']',
        ']<br />' => ']'
    );

    $content = strtr($content, $array);

    return $content;
}
add_filter('the_content', 'afc_shortcode_paragraph_fix');



// ========================================//
// SHORTCODES
// ========================================// 
////////////////////////////// VIDEOS
function afc_shortcode_vimeo( $atts, $content = null ) {
    return '<div class="video"><iframe src="//player.vimeo.com/video/'.$content.'?color=d19389&title=0&byline=0&portrait=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div><p>* Todos os vídeo-tutoriais não possuem som e têm a função de ilustrar e complementar o tutorial escrito.</p>';
}
add_shortcode('vimeo','afc_shortcode_vimeo');

function afc_shortcode_youtube( $atts, $content = null ) {
    return '<div class="video"><iframe src="//www.youtube.com/embed/'.$content.'?rel=0" frameborder="0" allowfullscreen></iframe></div>';
}
add_shortcode('youtube','afc_shortcode_youtube');

function afc_shortcode_videofolio( $atts, $content = null ) {
    return '<video class="videofolio" autoplay loop controls="false"><source src="'.$content.'" type="video/mp4" /></video>';
}
add_shortcode('videofolio','afc_shortcode_videofolio');


/////////////////////////////// ASSINATURA
function afc_shortcode_ass( $atts, $content = null ) {
    ob_start();
        echo '<span class="afc">'; 
            get_template_part('img/afc');
        echo '</span>';
    $output = ob_get_clean();
    return $output;
}
add_shortcode('afc','afc_shortcode_ass');


////////////////////////////// COLUNAS
function afc_shortcode_cols($atts, $content = null) {
    return '<div class="colunas">'.do_shortcode($content).'</div>';
}
add_shortcode('col','afc_shortcode_cols');

function afc_shortcode_cols2($atts, $content = null) {
    return '<div class="col-2">'.$content.'</div>';
}
add_shortcode('col-2','afc_shortcode_cols2');

function afc_shortcode_cols3($atts, $content = null) {
    return '<div class="col-3">'.$content.'</div>';
}
add_shortcode('col-3','afc_shortcode_cols3');

function afc_shortcode_cols4($atts, $content = null) {
    return '<div class="col-4">'.$content.'</div>';
}
add_shortcode('col-4','afc_shortcode_cols4');

function afc_shortcode_hr($atts, $content = null) {
    return '<hr class="sem-enfeite">';
}
add_shortcode('hr','afc_shortcode_hr');



////////////////////////////// TABS
function afc_shortcode_tabs($atts, $content = null) {
    extract(shortcode_atts(array(
        "tab1" => '',
        "tab2" => '',
        "tab3" => '',
        "tab4" => '',
        "tab5" => '',
        "tab6" => '',
        "tab7" => ''
    ), $atts));
    ob_start();

    echo '<div class="tabs">';
    if ($tab1) { echo '<div class="tab1 ativo" data-tab="tab-1">'.$tab1.'</div>'; }
    if ($tab2) { echo '<div class="tab2" data-tab="tab-2">'.$tab2.'</div>'; }
    if ($tab3) { echo '<div class="tab3" data-tab="tab-3">'.$tab3.'</div>'; }
    if ($tab4) { echo '<div class="tab4" data-tab="tab-4">'.$tab4.'</div>'; }
    if ($tab5) { echo '<div class="tab5" data-tab="tab-5">'.$tab5.'</div>'; }
    if ($tab6) { echo '<div class="tab6" data-tab="tab-6">'.$tab6.'</div>'; }
    if ($tab7) { echo '<div class="tab7" data-tab="tab-7">'.$tab7.'</div>'; }
    echo "</div>";

    $output = ob_get_clean();
    return $output;

} add_shortcode('tabs','afc_shortcode_tabs');

function afc_shortcode_tabscnt1($atts, $content = null) {
    return '<div id="tab-1" class="tab-content ativo">'.apply_filters('the_content', $content).'</div>';
} add_shortcode('cnttab1','afc_shortcode_tabscnt1');

function afc_shortcode_tabscnt2($atts, $content = null) {
    return '<div id="tab-2" class="tab-content">'.apply_filters('the_content', $content).'</div>';
} add_shortcode('cnttab2','afc_shortcode_tabscnt2');

function afc_shortcode_tabscnt3($atts, $content = null) {
    return '<div id="tab-3" class="tab-content">'.apply_filters('the_content', $content).'</div>';
} add_shortcode('cnttab3','afc_shortcode_tabscnt3');

function afc_shortcode_tabscnt4($atts, $content = null) {
    return '<div id="tab-4" class="tab-content">'.apply_filters('the_content', $content).'</div>';
} add_shortcode('cnttab4','afc_shortcode_tabscnt4');

function afc_shortcode_tabscnt5($atts, $content = null) {
    return '<div id="tab-5" class="tab-content">'.apply_filters('the_content', $content).'</div>';
} add_shortcode('cnttab5','afc_shortcode_tabscnt5');

function afc_shortcode_tabscnt6($atts, $content = null) {
    return '<div id="tab-6" class="tab-content">'.apply_filters('the_content', $content).'</div>';
} add_shortcode('cnttab6','afc_shortcode_tabscnt6');

function afc_shortcode_tabscnt7($atts, $content = null) {
    return '<div id="tab-7" class="tab-content">'.apply_filters('the_content', $content).'</div>';
} add_shortcode('cnttab7','afc_shortcode_tabscnt7');
