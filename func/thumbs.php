<?php

// thumbnails
add_theme_support( 'post-thumbnails' ); 
add_image_size( 'afc_blog_thumb', 366, 200, true );
// add_image_size( 'afc_projeto_mini2x', 530, 399, true );

// add_image_size( 'afc_projeto_medium', 350, 263, true );
// add_image_size( 'afc_projeto_medium2x', 700, 526, true );

// add_image_size( 'afc_projeto_large', 565, 425, true );
// add_image_size( 'afc_projeto_largex', 1130, 850, true );

// ========================================//
// THUMBS CHAMADAS
// ========================================//
function afc_thumb($size) {
  // $webp = strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' );
  // $extensao = 'png';
  // if( $webp == true ) $extensao = 'webp';  

  global $post;
  $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),$size); 
  $url = $thumb['0'];
  return $url;
}


function afc_autothumb($size) {
    $attachment = get_children(
        array(
            'post_parent'    => get_the_ID(),
            'post_type'      => 'attachment',
            'post_mime_type' => 'image',
            'order'          => 'DESC',
            'numberposts'    => 1,
        )
    );
    if ( ! is_array( $attachment ) || empty( $attachment ) ) {
        return;
    }
    $attachment = current( $attachment );
    return wp_get_attachment_url( $attachment->ID,$size);
}

