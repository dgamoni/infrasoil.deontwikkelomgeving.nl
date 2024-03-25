<?php

class Biq_Project_Title extends WP_Widget {

	/** constructor */
	function __construct() {

		parent::WP_Widget( false, $name = __( 'Titel groot project', TEXTDOMAIN ) );

	}

	/** @see WP_Widget::widget */
	function widget( $args, $instance ) {

		extract( $args );

		// $content = $instance['content'];
		// $link = $instance['link'];

		?>
		<?php 
		$theid = get_the_ID();
		$title = get_the_title($theid);
		$infrasoil_project_location_2 = get_field('infrasoil_project_location_2', $theid);
		$infrasoil_project_date_start = get_field('infrasoil_project_date_start', $theid);
		$infrasoil_project_date_finish = get_field('infrasoil_project_date_finish', $theid);
		?>
		<div class="widget biq_project_tile">
			<h2><?php echo $title; ?></h2>​
			<strong><em><?php echo $infrasoil_project_location_2; ?></em></strong>​<br>
			Uitvoering: <?php echo $infrasoil_project_date_start.' - '.$infrasoil_project_date_finish; ?>
		</div>
		<?php
	}


	/** @see WP_Widget::update */
	// function update( $new_instance, $old_instance ) {

	// 	$instance = $old_instance;

	// 	$instance['content'] = $new_instance['content'];
	// 	$instance['link'] = $new_instance['link'];

	// 	return $instance;
	// }

	/** @see WP_Widget::form */
	function form( $instance ) {

		/**
		 * Set Default Value for widget form
		 */


	}
}

add_action( 'widgets_init', create_function( '', 'return register_widget("Biq_Project_Title");' ) );