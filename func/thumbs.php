<?php

// thumbnails
add_theme_support( 'post-thumbnails' ); 


// ========================================//
// THUMBS CHAMADAS
// ========================================//
function afc_thumb($size) {
  global $post;
  $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),$size); 
  $url = $thumb['0'];
  echo $url;
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
    echo wp_get_attachment_url( $attachment->ID,$size);
}