<?php

//add_filter( 'posts_where', function ( $where, \WP_Query $q ) use ( &$wpdb )
// {
//     if ( true !== $q->get( 'wpse_include_parent' ) )
//         return $where;

//     /**
//      * Get the value passed to from the post parent and validate it
//      * post_parent only accepts an integer value, so we only need to validate
//      * the value as an integer
//      */
//     $post_parent = filter_var( $q->get( 'post_parent' ), FILTER_VALIDATE_INT );
//     if ( !$post_parent )
//         return $where;

//     /**
//      * Lets also include the parent in our query
//      *
//      * Because we have already validated the $post_parent value, we
//      * do not need to use the prepare() method here
//      */
//     $where .= " OR $wpdb->posts.ID = $post_parent";

//     return $where;
// }, 10, 2 );