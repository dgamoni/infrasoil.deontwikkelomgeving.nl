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

add_filter( 'avia_post_nav_settings', 'enfold_customization_same_cat' );
function enfold_customization_same_cat( $s ) {
    $s['same_category'] = true;
  return $s;
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


function add_custom_css(){
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
jQuery( ".button-02" ).click(function() {
    jQuery(".button-02a").show();
  jQuery(".button-02").hide();
  jQuery( "#haalbaarheid-01" ).toggle();
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
 jQuery(".button-001a").hide();
jQuery( ".button-001" ).click(function() {
   jQuery(".button-001a").show();
   jQuery(".button-001").hide();
  jQuery( "#werkveld-01" ).toggle();
});
jQuery( ".button-001a" ).click(function() {
 jQuery( "#werkveld-01" ).hide();
  jQuery(".button-001a").hide();
  jQuery(".button-001").show();
});
jQuery("#werkveld-02").hide();
 jQuery(".button-002a").hide();
jQuery( ".button-002" ).click(function() {
   jQuery(".button-002a").show();
   jQuery(".button-002").hide();
  jQuery( "#werkveld-02" ).toggle();
});
jQuery( ".button-002a" ).click(function() {
 jQuery( "#werkveld-02" ).hide();
   jQuery(".button-002").show();
  jQuery(".button-002a").hide();
});
jQuery("#werkveld-03").hide();
 jQuery(".button-003a").hide();
jQuery( ".button-003" ).click(function() {
   jQuery(".button-003a").show();
   jQuery(".button-003").hide();
  jQuery( "#werkveld-03" ).toggle();
});
jQuery( ".button-003a" ).click(function() {
 jQuery( "#werkveld-03" ).hide();
  jQuery(".button-003a").hide();
  jQuery(".button-003").show();
});
jQuery("#werkveld-04").hide();
 jQuery(".button-004a").hide();
jQuery( ".button-004" ).click(function() {
   jQuery(".button-004a").show();
   jQuery(".button-004").hide();
  jQuery( "#werkveld-04" ).toggle();
});
jQuery( ".button-004a" ).click(function() {
 jQuery( "#werkveld-04" ).hide();
  jQuery(".button-004a").hide();
  jQuery(".button-004").show();
});
jQuery("#werkveld-05").hide();
 jQuery(".button-005a").hide();
jQuery( ".button-005" ).click(function() {
   jQuery(".button-005a").show();
   jQuery(".button-005").hide();
  jQuery( "#werkveld-05" ).toggle();
});
jQuery( ".button-005a" ).click(function() {
 jQuery( "#werkveld-05" ).hide();
  jQuery(".button-005a").hide();
  jQuery(".button-005").show();
});
jQuery("#werkveld-06").hide();
 jQuery(".button-006a").hide();
jQuery( ".button-006" ).click(function() {
   jQuery(".button-006a").show();
   jQuery(".button-006").hide();
  jQuery( "#werkveld-06" ).toggle();
});
jQuery( ".button-006a" ).click(function() {
 jQuery( "#werkveld-06" ).hide();
  jQuery(".button-006a").hide();
  jQuery(".button-006").show();
});
jQuery("#werkveld-07").hide();
 jQuery(".button-007a").hide();
jQuery( ".button-007" ).click(function() {
   jQuery(".button-007a").show();
   jQuery(".button-007").hide();
  jQuery( "#werkveld-07" ).toggle();
});
jQuery( ".button-007a" ).click(function() {
 jQuery( "#werkveld-07" ).hide();
  jQuery(".button-007a").hide();
  jQuery(".button-007").show();
});
jQuery("#werkveld-08").hide();
 jQuery(".button-008a").hide();
jQuery( ".button-008" ).click(function() {
   jQuery(".button-008a").show();
   jQuery(".button-008").hide();
  jQuery( "#werkveld-08" ).toggle();
});
jQuery( ".button-008a" ).click(function() {
 jQuery( "#werkveld-08" ).hide();
  jQuery(".button-008a").hide();
  jQuery(".button-008").show();
});
jQuery("#werkveld-09").hide();
 jQuery(".button-009a").hide();
jQuery( ".button-009" ).click(function() {
   jQuery(".button-009a").show();
   jQuery(".button-009").hide();
  jQuery( "#werkveld-09" ).toggle();
});
jQuery( ".button-009a" ).click(function() {
 jQuery( "#werkveld-09" ).hide();
  jQuery(".button-009a").hide();
  jQuery(".button-009").show();
});
jQuery("#werkveld-10").hide();
 jQuery(".button-010a").hide();
jQuery( ".button-010" ).click(function() {
   jQuery(".button-010a").show();
   jQuery(".button-010").hide();
  jQuery( "#werkveld-10" ).toggle();
});
jQuery( ".button-010a" ).click(function() {
 jQuery( "#werkveld-10" ).hide();
  jQuery(".button-010a").hide();
  jQuery(".button-010").show();
});
jQuery("#werkveld-11").hide();
 jQuery(".button-011a").hide();
jQuery( ".button-011" ).click(function() {
   jQuery(".button-011a").show();
   jQuery(".button-011").hide();
  jQuery( "#werkveld-11" ).toggle();
});
jQuery( ".button-011a" ).click(function() {
 jQuery( "#werkveld-11" ).hide();
  jQuery(".button-011a").hide();
  jQuery(".button-011").show();
});
jQuery("#werkveld-12").hide();
 jQuery(".button-012a").hide();
jQuery( ".button-012" ).click(function() {
   jQuery(".button-012a").show();
   jQuery(".button-012").hide();
  jQuery( "#werkveld-12" ).toggle();
});
jQuery( ".button-012a" ).click(function() {
 jQuery( "#werkveld-12" ).hide();
  jQuery(".button-012a").hide();
  jQuery(".button-012").show();
});
jQuery("#werkveld-13").hide();
 jQuery(".button-013a").hide();
jQuery( ".button-013" ).click(function() {
   jQuery(".button-013a").show();
   jQuery(".button-013").hide();
  jQuery( "#werkveld-13" ).toggle();
});
jQuery( ".button-013a" ).click(function() {
 jQuery( "#werkveld-13" ).hide();
  jQuery(".button-013a").hide();
  jQuery(".button-013").show();
});
jQuery("#werkveld-14").hide();
 jQuery(".button-014a").hide();
jQuery( ".button-014" ).click(function() {
   jQuery(".button-014a").show();
   jQuery(".button-014").hide();
  jQuery( "#werkveld-14" ).toggle();
});
jQuery( ".button-014a" ).click(function() {
 jQuery( "#werkveld-14" ).hide();
  jQuery(".button-014a").hide();
  jQuery(".button-014").show();
});
jQuery("#werkveld-15").hide();
 jQuery(".button-015a").hide();
jQuery( ".button-015" ).click(function() {
   jQuery(".button-015a").show();
   jQuery(".button-015").hide();
  jQuery( "#werkveld-15" ).toggle();
});
jQuery( ".button-015a" ).click(function() {
 jQuery( "#werkveld-15" ).hide();
  jQuery(".button-015a").hide();
  jQuery(".button-015").show();
});
jQuery("#werkveld-16").hide();
 jQuery(".button-016a").hide();
jQuery( ".button-016" ).click(function() {
   jQuery(".button-016a").show();
   jQuery(".button-016").hide();
  jQuery( "#werkveld-16" ).toggle();
});
jQuery( ".button-016a" ).click(function() {
 jQuery( "#werkveld-16" ).hide();
  jQuery(".button-016a").hide();
  jQuery(".button-016").show();
});
jQuery("#werkveld-17").hide();
 jQuery(".button-017a").hide();
jQuery( ".button-017" ).click(function() {
   jQuery(".button-017a").show();
   jQuery(".button-017").hide();
  jQuery( "#werkveld-17" ).toggle();
});
jQuery( ".button-017a" ).click(function() {
 jQuery( "#werkveld-17" ).hide();
  jQuery(".button-017a").hide();
  jQuery(".button-017").show();
});
jQuery("#werkveld-18").hide();
 jQuery(".button-018a").hide();
jQuery( ".button-018" ).click(function() {
   jQuery(".button-018a").show();
   jQuery(".button-018").hide();
  jQuery( "#werkveld-18" ).toggle();
});
jQuery( ".button-018a" ).click(function() {
 jQuery( "#werkveld-18" ).hide();
  jQuery(".button-018a").hide();
  jQuery(".button-018").show();
});
jQuery("#werkveld-19").hide();
 jQuery(".button-019a").hide();
jQuery( ".button-019" ).click(function() {
   jQuery(".button-019a").show();
   jQuery(".button-019").hide();
  jQuery( "#werkveld-19" ).toggle();
});
jQuery( ".button-019a" ).click(function() {
 jQuery( "#werkveld-19" ).hide();
  jQuery(".button-019a").hide();
  jQuery(".button-019").show();
});
jQuery("#werkveld-20").hide();
 jQuery(".button-020a").hide();
jQuery( ".button-020" ).click(function() {
   jQuery(".button-020a").show();
   jQuery(".button-020").hide();
  jQuery( "#werkveld-20" ).toggle();
});
jQuery( ".button-020a" ).click(function() {
 jQuery( "#werkveld-20" ).hide();
  jQuery(".button-020a").hide();
  jQuery(".button-020").show();
});
jQuery("#werkveld-21").hide();
 jQuery(".button-021a").hide();
jQuery( ".button-021" ).click(function() {
   jQuery(".button-021a").show();
   jQuery(".button-021").hide();
  jQuery( "#werkveld-21" ).toggle();
});
jQuery( ".button-021a" ).click(function() {
 jQuery( "#werkveld-21" ).hide();
  jQuery(".button-021a").hide();
  jQuery(".button-021").show();
});
jQuery("#werkveld-22").hide();
 jQuery(".button-022a").hide();
jQuery( ".button-022" ).click(function() {
   jQuery(".button-022a").show();
   jQuery(".button-022").hide();
  jQuery( "#werkveld-22" ).toggle();
});
jQuery( ".button-022a" ).click(function() {
 jQuery( "#werkveld-22" ).hide();
  jQuery(".button-022a").hide();
  jQuery(".button-022").show();
});
jQuery("#werkveld-23").hide();
 jQuery(".button-023a").hide();
jQuery( ".button-023" ).click(function() {
   jQuery(".button-023a").show();
   jQuery(".button-023").hide();
  jQuery( "#werkveld-23" ).toggle();
});
jQuery( ".button-023a" ).click(function() {
 jQuery( "#werkveld-23" ).hide();
  jQuery(".button-023a").hide();
  jQuery(".button-023").show();
});
jQuery("#werkveld-24").hide();
 jQuery(".button-024a").hide();
jQuery( ".button-024" ).click(function() {
   jQuery(".button-024a").show();
   jQuery(".button-024").hide();
  jQuery( "#werkveld-24" ).toggle();
});
jQuery( ".button-024a" ).click(function() {
 jQuery( "#werkveld-24" ).hide();
  jQuery(".button-024a").hide();
  jQuery(".button-024").show();
});
jQuery("#werkveld-25").hide();
 jQuery(".button-025a").hide();
jQuery( ".button-025" ).click(function() {
   jQuery(".button-025a").show();
   jQuery(".button-025").hide();
  jQuery( "#werkveld-25" ).toggle();
});
jQuery( ".button-025a" ).click(function() {
 jQuery( "#werkveld-25" ).hide();
  jQuery(".button-025a").hide();
  jQuery(".button-025").show();
});
jQuery("#werkveld-26").hide();
 jQuery(".button-026a").hide();
jQuery( ".button-026" ).click(function() {
   jQuery(".button-026a").show();
   jQuery(".button-026").hide();
  jQuery( "#werkveld-26" ).toggle();
});
jQuery( ".button-026a" ).click(function() {
 jQuery( "#werkveld-26" ).hide();
  jQuery(".button-026a").hide();
  jQuery(".button-026").show();
});
jQuery("#werkveld-27").hide();
 jQuery(".button-027a").hide();
jQuery( ".button-027" ).click(function() {
   jQuery(".button-027a").show();
   jQuery(".button-027").hide();
  jQuery( "#werkveld-27" ).toggle();
});
jQuery( ".button-027a" ).click(function() {
 jQuery( "#werkveld-27" ).hide();
  jQuery(".button-027a").hide();
  jQuery(".button-027").show();
});
jQuery("#werkveld-28").hide();
 jQuery(".button-028a").hide();
jQuery( ".button-028" ).click(function() {
   jQuery(".button-028a").show();
   jQuery(".button-028").hide();
  jQuery( "#werkveld-28" ).toggle();
});
jQuery( ".button-028a" ).click(function() {
 jQuery( "#werkveld-28" ).hide();
  jQuery(".button-028a").hide();
  jQuery(".button-028").show();
});
jQuery("#werkveld-29").hide();
 jQuery(".button-029a").hide();
jQuery( ".button-029" ).click(function() {
   jQuery(".button-029a").show();
   jQuery(".button-029").hide();
  jQuery( "#werkveld-29" ).toggle();
});
jQuery( ".button-029a" ).click(function() {
 jQuery( "#werkveld-29" ).hide();
  jQuery(".button-029a").hide();
  jQuery(".button-029").show();
});
jQuery("#werkveld-30").hide();
 jQuery(".button-030a").hide();
jQuery( ".button-030" ).click(function() {
   jQuery(".button-030a").show();
   jQuery(".button-030").hide();
  jQuery( "#werkveld-30" ).toggle();
});
jQuery( ".button-030a" ).click(function() {
 jQuery( "#werkveld-30" ).hide();
  jQuery(".button-030a").hide();
  jQuery(".button-030").show();
});
jQuery("#werkveld-31").hide();
 jQuery(".button-031a").hide();
jQuery( ".button-031" ).click(function() {
   jQuery(".button-031a").show();
   jQuery(".button-031").hide();
  jQuery( "#werkveld-31" ).toggle();
});
jQuery( ".button-031a" ).click(function() {
 jQuery( "#werkveld-31" ).hide();
  jQuery(".button-031a").hide();
  jQuery(".button-031").show();
});
jQuery("#werkveld-32").hide();
 jQuery(".button-032a").hide();
jQuery( ".button-032" ).click(function() {
   jQuery(".button-032a").show();
   jQuery(".button-032").hide();
  jQuery( "#werkveld-32" ).toggle();
});
jQuery( ".button-032a" ).click(function() {
 jQuery( "#werkveld-32" ).hide();
  jQuery(".button-032a").hide();
  jQuery(".button-032").show();
});
jQuery("#werkveld-33").hide();
 jQuery(".button-033a").hide();
jQuery( ".button-033" ).click(function() {
   jQuery(".button-033a").show();
   jQuery(".button-033").hide();
  jQuery( "#werkveld-33" ).toggle();
});
jQuery( ".button-033a" ).click(function() {
 jQuery( "#werkveld-33" ).hide();
  jQuery(".button-033a").hide();
  jQuery(".button-033").show();
});
jQuery("#werkveld-34").hide();
 jQuery(".button-034a").hide();
jQuery( ".button-034" ).click(function() {
   jQuery(".button-034a").show();
   jQuery(".button-034").hide();
  jQuery( "#werkveld-34" ).toggle();
});
jQuery( ".button-034a" ).click(function() {
 jQuery( "#werkveld-34" ).hide();
  jQuery(".button-034a").hide();
  jQuery(".button-034").show();
});
});
</script>
<?php
}
add_action('wp_footer', 'add_custom_css');



