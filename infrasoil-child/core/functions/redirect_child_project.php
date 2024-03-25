<?php
add_action( 'template_redirect', 'wpse_128636_redirect_post' );

function wpse_128636_redirect_post() {
	global $post;
  $queried_post_type = get_query_var('post_type');
  if ( is_single() && 'portfolio' ==  $queried_post_type && !is_child($post->ID) ) {
  	$slug = get_permalink( $post->post_parent );
    wp_redirect( home_url('/project/'.$slug) );
    exit;
  }
}


function is_ancestor($post_id) {
    global $wp_query;
    $ancestors = $wp_query->post->ancestors;
    if ( in_array($post_id, $ancestors) ) {
        $return = true;
    } else {
        $return = false;
    }
    return $return;
}


/**
*   Child page conditional
*   @ Accept's page ID, page slug or page title as parameters
*/
function is_child( $parent = '' ) {
    global $post;

    $parent_obj = get_page( $post->post_parent, ARRAY_A );
    $parent = (string) $parent;
    $parent_array = (array) $parent;

    if ( in_array( (string) $parent_obj['ID'], $parent_array ) ) {
        return true;
    } elseif ( in_array( (string) $parent_obj['post_title'], $parent_array ) ) {
        return true;    
    } elseif ( in_array( (string) $parent_obj['post_name'], $parent_array ) ) {
        return true;
    } else {
        return false;
    }
}