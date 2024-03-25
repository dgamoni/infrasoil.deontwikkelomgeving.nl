<?php
// Register Custom Taxonomy
function infrasoil_tax_project_expertises() {

	$labels = array(
		'name'                       => _x( 'Expertises', 'Expertises', 'infrasoil' ),
		'singular_name'              => _x( 'Expertises', 'Expertises', 'infrasoil' ),
		'menu_name'                  => __( 'Expertises', 'infrasoil' ),
		'all_items'                  => __( 'All Items', 'infrasoil' ),
		'parent_item'                => __( 'Parent Item', 'infrasoil' ),
		'parent_item_colon'          => __( 'Parent Item:', 'infrasoil' ),
		'new_item_name'              => __( 'New Item Name', 'infrasoil' ),
		'add_new_item'               => __( 'Add New Item', 'infrasoil' ),
		'edit_item'                  => __( 'Edit Item', 'infrasoil' ),
		'update_item'                => __( 'Update Item', 'infrasoil' ),
		'view_item'                  => __( 'View Item', 'infrasoil' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'infrasoil' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'infrasoil' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'infrasoil' ),
		'popular_items'              => __( 'Popular Items', 'infrasoil' ),
		'search_items'               => __( 'Search Items', 'infrasoil' ),
		'not_found'                  => __( 'Not Found', 'infrasoil' ),
		'no_terms'                   => __( 'No items', 'infrasoil' ),
		'items_list'                 => __( 'Items list', 'infrasoil' ),
		'items_list_navigation'      => __( 'Items list navigation', 'infrasoil' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'project_expertises', array( 'portfolio' ), $args );

}
add_action( 'init', 'infrasoil_tax_project_expertises', 0 );

function infrasoil_tax_project_areas() {

	$labels = array(
		'name'                       => _x( 'Werkvelden', 'Werkvelden', 'infrasoil' ),
		'singular_name'              => _x( 'Werkvelden', 'Werkvelden', 'infrasoil' ),
		'menu_name'                  => __( 'Werkvelden', 'infrasoil' ),
		'all_items'                  => __( 'All Items', 'infrasoil' ),
		'parent_item'                => __( 'Parent Item', 'infrasoil' ),
		'parent_item_colon'          => __( 'Parent Item:', 'infrasoil' ),
		'new_item_name'              => __( 'New Item Name', 'infrasoil' ),
		'add_new_item'               => __( 'Add New Item', 'infrasoil' ),
		'edit_item'                  => __( 'Edit Item', 'infrasoil' ),
		'update_item'                => __( 'Update Item', 'infrasoil' ),
		'view_item'                  => __( 'View Item', 'infrasoil' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'infrasoil' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'infrasoil' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'infrasoil' ),
		'popular_items'              => __( 'Popular Items', 'infrasoil' ),
		'search_items'               => __( 'Search Items', 'infrasoil' ),
		'not_found'                  => __( 'Not Found', 'infrasoil' ),
		'no_terms'                   => __( 'No items', 'infrasoil' ),
		'items_list'                 => __( 'Items list', 'infrasoil' ),
		'items_list_navigation'      => __( 'Items list navigation', 'infrasoil' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'project_areas', array( 'portfolio' ), $args );

}
add_action( 'init', 'infrasoil_tax_project_areas', 0 );

