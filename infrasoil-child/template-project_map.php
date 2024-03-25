<?php 
/*
Template Name: Project map
*/

if ( !defined('ABSPATH') ){ die(); }

global $avia_config;

/*
 * get_header is a basic wordpress function, used to retrieve the header.php file in your theme directory.
 */
 get_header();


	 if( get_post_meta(get_the_ID(), 'header', true) != 'no') echo avia_title();
	 
	 do_action( 'ava_after_main_title' );
 ?>

	<div class='container_wrap container_wrap_first main_color <?php avia_layout_class( 'main' ); ?>'>

		<div class='container'>

			<?php if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<p id="breadcrumbs">','</p>');
			} ?>
		
			<main class='template-page content  <?php avia_layout_class( 'content' ); ?> units' <?php avia_markup_helper(array('context' => 'content','post_type'=>'page'));?>>


			<div class="flex_column av_three_fourth searchandfilter_content_map flex_column_div av-zero-column-padding first  avia-builder-el-0  el_before_av_one_fourth  avia-builder-el-first  " style="border-radius:0px; ">

				<div class="gmap _embed-responsive _embed-responsive-4by3">
					<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZxxN1Pd-fnDs7muHZQDc9njhlbrzIA5g&v=3.exp&libraries=places,drawing,geometry"></script> -->
					<div id="g_map" style="width:896px; height: 600px;margin: 0px;padding: 0px;"></div>
				</div>

				<?php //echo do_shortcode('[searchandfilter id="1595" show="results"]'); ?>
			</div>

                <?php
	                // $avia_config['size'] = avia_layout_class( 'main' , false) == 'fullsize' ? 'entry_without_sidebar' : 'entry_with_sidebar';
	                // get_template_part( 'includes/loop', 'page' );
                ?>

			<div class="flex_column av_one_fourth searchandfilter_sidebar flex_column_div av-zero-column-padding   avia-builder-el-3  el_after_av_three_fourth  avia-builder-el-last  " style="border-radius:0px; ">
				<h3 class="search_filter_title">Project zoeken:</h3>
				<?php echo do_shortcode('[searchandfilter id="1595"]'); ?>
			</div>

			<div class="flex_column _av_three_fourth searchandfilter_content_map flex_column_div av-zero-column-padding first  avia-builder-el-0  el_before_av_one_fourth  avia-builder-el-first  " style="border-radius:0px; ">
				<?php echo do_shortcode('[searchandfilter id="1595" show="results"]'); ?>
			</div>

			<!--end content-->
			</main>

			<?php
			// $avia_config['currently_viewing'] = 'page';
			// get_sidebar();
			?>

		</div><!--end container-->

	</div><!-- close default .container_wrap element -->



<?php get_footer(); ?>
