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

// Activate Custom CSS
add_theme_support('avia_template_builder_custom_css');


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

add_filter('avia_load_shortcodes', 'avia_include_shortcode_template', 15, 1);
function avia_include_shortcode_template($paths)
{
	$template_url = get_stylesheet_directory();
    	array_unshift($paths, $template_url.'/shortcodes/');

	return $paths;
}

function add_custom_cs(){
?>
<script>
jQuery(window).load(function(){
jQuery("#grondexplotatie-01").hide();
  jQuery(".button-01a").hide();
jQuery( ".button-01" ).click(function() {
    jQuery(".button-01a").show();
    jQuery(".button-01").hide();
  jQuery( "#grondexplotatie-01" ).toggle();
});
jQuery( ".button-01a" ).click(function() {
  jQuery("#grondexplotatie-01").hide();
  jQuery(".button-01a").hide();
  jQuery(".button-01").show();
});
  jQuery(".button-02a").hide();
jQuery("#haalbaarheid-01").hide();
jQuery("#haalbaarheid-02").hide();
jQuery("#haalbaarheid-03").hide();
jQuery( ".button-02" ).click(function() {
    jQuery(".button-02a").show();
  jQuery(".button-02").hide();
  jQuery( "#haalbaarheid-01" ).toggle();
  jQuery( "#haalbaarheid-02" ).toggle();
  jQuery( "#haalbaarheid-03" ).toggle();
});
jQuery( ".button-02a" ).click(function() {
  jQuery("#haalbaarheid-01").hide();
jQuery("#haalbaarheid-02").hide();
jQuery("#haalbaarheid-03").hide();
jQuery( ".button-02" ).show();
  jQuery(".button-02a").hide();
});
jQuery("#sloopmanagement-01").hide();
  jQuery(".button-03a").hide();
jQuery( ".button-03" ).click(function() {
    jQuery(".button-03a").show();
    jQuery(".button-03").hide();
  jQuery( "#sloopmanagement-01" ).toggle();
});
jQuery( ".button-03a" ).click(function() {
  jQuery("#sloopmanagement-01").hide();
  jQuery(".button-03a").hide();
  jQuery(".button-03").show();
});
jQuery("#bodemonderzoek-01").hide();
  jQuery(".button-04a").hide();
jQuery( ".button-04" ).click(function() {
    jQuery(".button-04a").show();
    jQuery(".button-04").hide();
  jQuery( "#bodemonderzoek-01" ).toggle();
});
jQuery( ".button-04a" ).click(function() {
  jQuery("#bodemonderzoek-01").hide();
  jQuery(".button-04a").hide();
  jQuery(".button-04").show();
});
jQuery("#bouwrijp-01").hide();
  jQuery(".button-05a").hide();
jQuery( ".button-05" ).click(function() {
    jQuery(".button-05a").show();
    jQuery(".button-05").hide();
  jQuery( "#bouwrijp-01" ).toggle();
});
jQuery( ".button-05a" ).click(function() {
  jQuery("#bouwrijp-01").hide();
  jQuery(".button-05a").hide();
  jQuery(".button-05").show();
});
jQuery("#contractmanagement-01").hide();
  jQuery(".button-06a").hide();
jQuery( ".button-06" ).click(function() {
    jQuery(".button-06a").show();
    jQuery(".button-06").hide();
  jQuery( "#contractmanagement-01" ).toggle();
});
jQuery( ".button-06a" ).click(function() {
  jQuery("#contractmanagement-01").hide();
  jQuery(".button-06a").hide();
  jQuery(".button-06").show();
});
jQuery("#directievoering-01").hide();
  jQuery(".button-07a").hide();
jQuery( ".button-07" ).click(function() {
    jQuery(".button-07a").show();
    jQuery(".button-07").hide();
  jQuery( "#directievoering-01" ).toggle();
});
jQuery( ".button-07a" ).click(function() {
  jQuery("#directievoering-01").hide();
  jQuery(".button-07a").hide();
  jQuery(".button-07").show();
});

jQuery("#detachering-01").hide();
  jQuery(".button-08a").hide();
jQuery( ".button-08" ).click(function() {
    jQuery(".button-08a").show();
    jQuery(".button-08").hide();
  jQuery( "#detachering-01" ).toggle();
});
jQuery( ".button-08a" ).click(function() {
  jQuery("#detachering-01").hide();
  jQuery(".button-08a").hide();
  jQuery(".button-08").show();
});
jQuery("#section-09").hide();
jQuery( ".button-09" ).click(function() {
  jQuery( "#section-09" ).toggle();
});
jQuery("#section-10").hide();
jQuery( ".button-10" ).click(function() {
  jQuery( "#section-10" ).toggle();
});
jQuery("#werkveld-01").hide();
jQuery( ".button-001" ).click(function() {
  jQuery( "#werkveld-01" ).toggle();
});
jQuery("#werkveld-02").hide();
jQuery( ".button-002" ).click(function() {
  jQuery( "#werkveld-02" ).toggle();
});
jQuery("#werkveld-03").hide();
jQuery( ".button-003" ).click(function() {
  jQuery( "#werkveld-03" ).toggle();
});
jQuery("#werkveld-04").hide();
jQuery( ".button-004" ).click(function() {
  jQuery( "#werkveld-04" ).toggle();
});
jQuery("#werkveld-05").hide();
jQuery( ".button-005" ).click(function() {
  jQuery( "#werkveld-05" ).toggle();
});
jQuery("#werkveld-06").hide();
jQuery( ".button-006" ).click(function() {
  jQuery( "#werkveld-06" ).toggle();
});
jQuery("#werkveld-07").hide();
jQuery( ".button-007" ).click(function() {
  jQuery( "#werkveld-07" ).toggle();
});
jQuery("#werkveld-08").hide();
jQuery( ".button-008" ).click(function() {
  jQuery( "#werkveld-08" ).toggle();
});
jQuery("#werkveld-09").hide();
jQuery( ".button-009" ).click(function() {
  jQuery( "#werkveld-09" ).toggle();
});
jQuery("#werkveld-10").hide();
jQuery( ".button-010" ).click(function() {
  jQuery( "#werkveld-10" ).toggle();
});
jQuery("#werkveld-11").hide();
jQuery( ".button-011" ).click(function() {
  jQuery( "#werkveld-11" ).toggle();
});
jQuery("#werkveld-12").hide();
jQuery( ".button-012" ).click(function() {
  jQuery( "#werkveld-12" ).toggle();
});
jQuery("#werkveld-13").hide();
jQuery( ".button-013" ).click(function() {
  jQuery( "#werkveld-13" ).toggle();
});
jQuery("#werkveld-14").hide();
jQuery( ".button-014" ).click(function() {
  jQuery( "#werkveld-14" ).toggle();
});
jQuery("#werkveld-15").hide();
jQuery( ".button-015" ).click(function() {
  jQuery( "#werkveld-15" ).toggle();
});
jQuery("#werkveld-16").hide();
jQuery( ".button-016" ).click(function() {
  jQuery( "#werkveld-16" ).toggle();
});
jQuery("#werkveld-17").hide();
jQuery( ".button-017" ).click(function() {
  jQuery( "#werkveld-17" ).toggle();
});
jQuery("#werkveld-18").hide();
jQuery( ".button-018" ).click(function() {
  jQuery( "#werkveld-18" ).toggle();
});
jQuery("#werkveld-19").hide();
jQuery( ".button-019" ).click(function() {
  jQuery( "#werkveld-19" ).toggle();
});
jQuery("#werkveld-20").hide();
jQuery( ".button-020" ).click(function() {
  jQuery( "#werkveld-20" ).toggle();
});
jQuery("#werkveld-21").hide();
jQuery( ".button-021" ).click(function() {
  jQuery( "#werkveld-21" ).toggle();
});
jQuery("#werkveld-22").hide();
jQuery( ".button-022" ).click(function() {
  jQuery( "#werkveld-22" ).toggle();
});
jQuery("#werkveld-23").hide();
jQuery( ".button-023" ).click(function() {
  jQuery( "#werkveld-23" ).toggle();
});
jQuery("#werkveld-24").hide();
jQuery( ".button-024" ).click(function() {
  jQuery( "#werkveld-24" ).toggle();
});
jQuery("#werkveld-25").hide();
jQuery( ".button-025" ).click(function() {
  jQuery( "#werkveld-25" ).toggle();
});
jQuery("#werkveld-26").hide();
jQuery( ".button-026" ).click(function() {
  jQuery( "#werkveld-26" ).toggle();
});
jQuery("#werkveld-27").hide();
jQuery( ".button-027" ).click(function() {
  jQuery( "#werkveld-27" ).toggle();
});
jQuery("#werkveld-28").hide();
jQuery( ".button-028" ).click(function() {
  jQuery( "#werkveld-28" ).toggle();
});
jQuery("#werkveld-29").hide();
jQuery( ".button-029" ).click(function() {
  jQuery( "#werkveld-29" ).toggle();
});
jQuery("#werkveld-30").hide();
jQuery( ".button-030" ).click(function() {
  jQuery( "#werkveld-30" ).toggle();
});
jQuery("#werkveld-31").hide();
jQuery( ".button-031" ).click(function() {
  jQuery( "#werkveld-31" ).toggle();
});
jQuery("#werkveld-32").hide();
jQuery( ".button-032" ).click(function() {
  jQuery( "#werkveld-32" ).toggle();
});
jQuery("#werkveld-33").hide();
jQuery( ".button-033" ).click(function() {
  jQuery( "#werkveld-33" ).toggle();
});
jQuery("#werkveld-34").hide();
jQuery( ".button-034" ).click(function() {
  jQuery( "#werkveld-34" ).toggle();
});
});
</script>
<?php
}
add_action('wp_footer', 'add_custom_cs');



