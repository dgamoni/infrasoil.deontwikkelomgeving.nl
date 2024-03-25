<?php 

// include script and css for product cpt
add_action( 'wp_enqueue_scripts', 'product_scripts_method' ); 
function product_scripts_method() {
	wp_register_script('serach_scripts', CORE_URL . '/js/search.js', array('jquery'), '', true);
	wp_enqueue_script( 'serach_scripts' );
	
	//wp_localize_script( 'product_scripts', 'localize_var', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	// wp_register_style('product_css', CORE_URL .'/css/product.css', array(),null, 'all');
	// wp_enqueue_style('product_css');
} 