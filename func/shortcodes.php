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


/////////////////////////////// FAQ
function afc_shortcode_faq( $atts, $content = null ) {
    ob_start();
    get_template_part('modais/faq');
    $output = ob_get_clean();
    return $output;
}
add_shortcode('faq','afc_shortcode_faq');

function afc_shortcode_affiliadas_faq( $atts, $content = null ) {
    ob_start();
    get_template_part('inc/afiliadas-faq');
    $output = ob_get_clean();
    return $output;
}
add_shortcode('aff-faq','afc_shortcode_affiliadas_faq');


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


// ========================================//
// ICONE
// ========================================// 
function afc_shortcode_icone($atts, $content = null) {
    extract(shortcode_atts(array(
        "nome" => '',
        "prefixo" => '',
        "tamanho" => '',
        "cor" => '',
    ), $atts));
    ob_start();

    echo '<i class="'.$prefixo.' fa-'.$nome.'" style="font-size:'.($tamanho ? $tamanho : '1').'em;'.($cor ? 'color: var(--cor-'.$cor.');' : '').'" aria-hidden="true"></i>';

    $output = ob_get_clean();
    return $output;

} add_shortcode('icone','afc_shortcode_icone');

function afc_shortcode_marca($atts, $content = null) {
    extract(shortcode_atts(array(
        "nome" => '',
        "tamanho" => '',
    ), $atts));
    ob_start();

    echo '<i class="fab fa-'.$nome.'" style="font-size:'.($tamanho ? $tamanho : '1').'em" aria-hidden="true"></i>';

    $output = ob_get_clean();
    return $output;

} add_shortcode('marca','afc_shortcode_marca');



// ========================================//
// SHORTCODE ON FIELDS
// ========================================//     
// codigo acf que permite que funcione o shortcode
if(!function_exists('afc_text_area_shortcode')) {function afc_text_area_shortcode($value, $post_id, $field) {
  if (is_admin()) return $value;
  return do_shortcode($value);
}}
if(class_exists('acf')) {
    add_filter('acf/load_value/type=textarea', 'afc_text_area_shortcode', 10, 3);
    add_filter('acf/format_value/type=text', 'afc_text_area_shortcode', 10, 3);
}


// ========================================//
// PARA BLOG
// ========================================// 
function afc_posts_blog($atts, $content = null) {
    extract(shortcode_atts(array(
        "posts" => '',
    ), $atts));
    ob_start();

    $ids = explode(',',$posts);

    $args = array('post_type' => 'afc_blog', 'post__in' => $ids);
    $relacionados = new WP_Query($args);

    if ( $relacionados->have_posts() ) { 
        if($relacionados->post_count !== 1) echo '<div><h4 class="cursivo">leitura complementar</h4></div>';
        echo '<div'.($relacionados->post_count === 1 ? ' style="margin-top: 2em;"' : '').' class="relacionados interno lista-artigos num-'.$relacionados->post_count.'">';
        while ( $relacionados->have_posts() ) : $relacionados->the_post(); 
            echo '<div class="item-post-grid">';
                get_template_part('inc/blog-grid');
            echo '</div>';
        endwhile;
        echo '</div>';
    } wp_reset_query();

    $output = ob_get_clean();
    return $output;

} add_shortcode('vertb','afc_posts_blog');



/**
 * Custom shortcode to display WPForms form entries in table view.
 *
 * Basic usage: [wpforms_entries_table id="FORMID"].
 * 
 * Possible shortcode attributes:
 * id (required)  Form ID of which to show entries.
 * user           User ID, or "current" to default to current logged in user.
 * fields         Comma separated list of form field IDs.
 * number         Number of entries to show, defaults to 30.
 * 
 * @link https://wpforms.com/developers/how-to-display-form-entries/
 *
 * Realtime counts could be delayed due to any caching setup on the site
 *
 * @param array $atts Shortcode attributes.
 * 
 * @return string
 */
function wpf_entries_table( $atts ) {
 
    // Pull ID shortcode attributes.
    $atts = shortcode_atts(
        [
            'id'     => '',
            'user'   => '',
            'fields' => '',
            'number' => '',
        ],
        $atts
    );
 
    // Check for an ID attribute (required) and that WPForms is in fact
    // installed and activated.
    if ( empty( $atts['id'] ) || ! function_exists( 'wpforms' ) ) {
        return;
    }
 
    // Get the form, from the ID provided in the shortcode.
    $form = wpforms()->form->get( absint( $atts['id'] ) );
 
    // If the form doesn't exists, abort.
    if ( empty( $form ) ) {
        return;
    }
 
    // Pull and format the form data out of the form object.
    $form_data = ! empty( $form->post_content ) ? wpforms_decode( $form->post_content ) : '';
 
    // Check to see if we are showing all allowed fields, or only specific ones.
    $form_field_ids = isset( $atts['fields'] ) && $atts['fields'] !== '' ? explode( ',', str_replace( ' ', '', $atts['fields'] ) ) : [];
 
    // Setup the form fields.
    if ( empty( $form_field_ids ) ) {
        $form_fields = $form_data['fields'];
    } else {
        $form_fields = [];
        foreach ( $form_field_ids as $field_id ) {
            if ( isset( $form_data['fields'][ $field_id ] ) ) {
                $form_fields[ $field_id ] = $form_data['fields'][ $field_id ];
            }
        }
    }
 
    if ( empty( $form_fields ) ) {
        return;
    }
 
    // Here we define what the types of form fields we do NOT want to include,
    // instead they should be ignored entirely.
    $form_fields_disallow = apply_filters( 'wpforms_frontend_entries_table_disallow', [ 'divider', 'html', 'pagebreak', 'captcha' ] );
 
    // Loop through all form fields and remove any field types not allowed.
    foreach ( $form_fields as $field_id => $form_field ) {
        if ( in_array( $form_field['type'], $form_fields_disallow, true ) ) {
            unset( $form_fields[ $field_id ] );
        }
    }
 
    $entries_args = [
        'form_id' => absint( $atts['id'] ),
    ];
 
    // Narrow entries by user if user_id shortcode attribute was used.
    if ( ! empty( $atts['user'] ) ) {
        if ( $atts['user'] === 'current' && is_user_logged_in() ) {
            $entries_args['user_id'] = get_current_user_id();
        } else {
            $entries_args['user_id'] = absint( $atts['user'] );
        }
    }
 
    // Number of entries to show. If empty, defaults to 30.
    if ( ! empty( $atts['number'] ) ) {
        $entries_args['number'] = absint( $atts['number'] );
    }
 
    // Get all entries for the form, according to arguments defined.
    // There are many options available to query entries. To see more, check out
    // the get_entries() function inside class-entry.php (https://a.cl.ly/bLuGnkGx).
    $entries = wpforms()->entry->get_entries( $entries_args );
 
    if ( empty( $entries ) ) {
        // return '<p>No entries found.</p>';   
    }
 
    ob_start();
 
    // echo '<table class="wpforms-frontend-entries">';
 
        // echo '<thead><tr>';
 
        //     // Loop through the form data so we can output form field names in
        //     // the table header.
        //     foreach ( $form_fields as $form_field ) {
 
        //         // Output the form field name/label.
        //         echo '<th>';
        //             echo esc_html( sanitize_text_field( $form_field['label'] ) );
        //         echo '</th>';
        //     }
 
        // echo '</tr></thead>';
 
        // echo '<tbody>';
 
            // Now, loop through all the form entries.
            foreach ( $entries as $entry ) {
                echo '<div style="width:100%;height:1px;background:black;display:block;margin:1em 0"></div>';
                // echo '<tr>';
 
                // Entry field values are in JSON, so we need to decode.
                $entry_fields = json_decode( $entry->fields, true );
 
                foreach ( $form_fields as $form_field ) {
                    
                    // echo '<td>';
 
                        foreach ( $entry_fields as $entry_field ) {
                            if ( absint( $entry_field['id'] ) === absint( $form_field['id'] ) ) {

                                // var_dump($entry_field);

                                if(!empty($entry_field['value'])){

                                    echo wp_strip_all_tags($entry_field['name']).':: ';
                                    // echo $entry_field['value'];
                                    echo apply_filters( 'wpforms_html_field_value', wp_strip_all_tags( $entry_field['value'] ), $entry_field, $form_data, 'entry-frontend-table' );

                                echo '<br><br>';}
                                break;
                            }
                        }
 
                    // echo '</td>';
                }
 
                // echo '</tr>';
            }
 
        // echo '</tbody>';
 
    // echo '</table>';
 
    $output = ob_get_clean();
 
    return $output;
}
add_shortcode( 'wpforms_entries_table', 'wpf_entries_table' );