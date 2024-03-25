<?php
// function modify_portfolio() {
//     if ( post_type_exists( 'portfolio' ) ) {

//         /* Give products hierarchy (for house plans) */
//         global $wp_post_types, $wp_rewrite;
//         $wp_post_types['portfolio']->hierarchical = true;
//         $args = $wp_post_types['portfolio'];
//         $wp_rewrite->add_rewrite_tag("%portfolio%", '(.+?)', $args->query_var ? "{$args->query_var}=" : "post_type=portfolio&name=");
//         add_post_type_support('portfolio','page-attributes');
//     }
// }
// add_action( 'init', 'modify_portfolio', 1 );


add_filter('avf_portfolio_cpt_args', 'avf_portfolio_add_cpt_args', 1);

function avf_portfolio_add_cpt_args($args) {
	$args['hierarchical'] = true;
	$args['supports'] = array('title','thumbnail','excerpt','editor','comments', 'page-attributes');
	return $args;
} 