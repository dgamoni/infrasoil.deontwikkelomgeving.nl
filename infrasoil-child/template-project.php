<?php 
/*
Template Name: Project
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

			<main class='template-page content  <?php avia_layout_class( 'content' ); ?> units' <?php avia_markup_helper(array('context' => 'content','post_type'=>'page'));?>>

			<?php //echo do_shortcode('[searchandfilter id="1441" show="results"]'); ?>

                <?php
	                // $avia_config['size'] = avia_layout_class( 'main' , false) == 'fullsize' ? 'entry_without_sidebar' : 'entry_with_sidebar';
	                // get_template_part( 'includes/loop', 'page' );
                ?>

			<div class="flex_column av_one_fourth searchandfilter_sidebar flex_column_div av-zero-column-padding   avia-builder-el-3  el_after_av_three_fourth  avia-builder-el-last  " style="border-radius:0px; ">
				<h3 class="search_filter_title">Project zoeken:</h3>
				<?php echo do_shortcode('[searchandfilter id="1441"]'); ?>
			</div>

			<?php echo do_shortcode('[searchandfilter id="1441" show="results"]'); ?>

			<!--end content-->
			</main>

			<?php
			// $avia_config['currently_viewing'] = 'page';
			// get_sidebar();
			?>

		</div><!--end container-->

	</div><!-- close default .container_wrap element -->



<?php get_footer(); ?>
