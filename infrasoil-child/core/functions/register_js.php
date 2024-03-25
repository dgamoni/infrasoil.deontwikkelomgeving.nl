<?php

// include script and css for product cpt
add_action( 'wp_enqueue_scripts', 'product_scripts_method' );
function product_scripts_method() {
	wp_register_script('search_scripts', CORE_URL . '/js/search.js', array('jquery'), '', true);
	wp_enqueue_script( 'search_scripts' );

	wp_register_script('custom_scripts', CORE_URL . '/js/custom.js', array('jquery'), '', true);
	wp_enqueue_script( 'custom_scripts' );

    wp_localize_script( 'custom_scripts', 'js_url', 
        array( 
            'imgurl' =>  CORE_URL .'/image/'
             )
    );

	//wp_localize_script( 'product_scripts', 'localize_var', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

	// wp_register_style('product_css', CORE_URL .'/css/product.css', array(),null, 'all');
	// wp_enqueue_style('product_css');

	wp_register_style('bootstrap_css', CORE_URL .'/css/bootstrap.min_custom.css', array(),null, 'all');
	wp_enqueue_style('bootstrap_css');


	wp_register_script('snazzy_info_window_js', CORE_URL . '/js/snazzy-info-window.min.js', array('jquery'), '', true);
	wp_enqueue_script( 'snazzy_info_window_js' );

	wp_register_style('snazzy_info_window', CORE_URL .'/css/snazzy-info-window.css', array(),null, 'all');
	wp_enqueue_style('snazzy_info_window');
} 