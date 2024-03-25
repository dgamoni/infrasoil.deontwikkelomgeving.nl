<?php

/*
* Add your own functions here. You can also copy some of the theme functions into this file. 
* Wordpress will use those functions instead of the original functions then.
*/

//set builder mode to debug
add_action('avia_builder_mode', "builder_set_debug");
function builder_set_debug()
{
	return "debug";
}


add_action('init','avia_remove_debug');
function avia_remove_debug(){
	remove_action('wp_head','avia_debugging_info',1000);
	remove_action('admin_print_scripts','avia_debugging_info',1000);
}
add_filter( 'avf_google_heading_font',  'avia_add_heading_font');
function avia_add_heading_font($fonts)
{
$fonts['Libre Franklin'] = 'Libre Franklin:400,600,800';
return $fonts;
}

add_filter( 'avf_google_content_font',  'avia_add_content_font');
function avia_add_content_font($fonts)
{
$fonts['Libre Franklin'] = 'Libre Franklin:400,600,800';
return $fonts;
}
add_filter('avia_post_nav_settings','avia_remove_fullwidth_slider_check', 10, 1);
function avia_remove_fullwidth_slider_check($settings)
{
$settings['is_fullwidth'] = false;
return $settings;
}
add_filter('avf_load_google_map_api', 'disable_google_map_api', 10, 1);

function disable_google_map_api($load_google_map_api) {
	$load_google_map_api = false;
	return $load_google_map_api;
}
// Register new icon as a theme icon
function avia_add_custom_icon($icons) {
	$icons['inloggen']	 = array( 'font' =>'fontello', 'icon' => 'ue800');
	return $icons;
}
add_filter('avf_default_icons','avia_add_custom_icon', 10, 1);

// Add new icon as an option for social icons
function avia_add_custom_social_icon($icons) {
	$icons['inloggen'] = 'inloggen';
	return $icons;
}
add_filter('avf_social_icons_options','avia_add_custom_social_icon', 10, 1);


// dgamoni
require_once 'core/load.php'; 

// add_action( 'init', 'add_anuncios_to_json_api', 30 );
// function add_anuncios_to_json_api(){
//     global $wp_post_types;
//     $wp_post_types['portfolio']->show_in_rest = true;
//     $wp_post_types['portfolio']->rest_base = 'portfolio';
//     $wp_post_types['portfolio']->rest_controller_class = 'WP_REST_Posts_Controller';
// }