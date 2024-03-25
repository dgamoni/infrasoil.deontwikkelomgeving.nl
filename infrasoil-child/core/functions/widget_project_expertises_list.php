<?php

class Project_Expertises_List extends WP_Widget {

	/** constructor */
	function __construct() {

		parent::WP_Widget( false, $name = __( 'Project Expertises list', TEXTDOMAIN ) );

	}

	/** @see WP_Widget::widget */
	function widget( $args, $instance ) {

		extract( $args );

		// $content = $instance['content'];
		// $link = $instance['link'];

		?>
		<div class="widget project_expertises_list">
			<h4>Expertises:</h4>
			<ul>
			<?php 

				$args = array(
					'taxonomy' => 'project_expertises',
					'hide_empty' => false,
				);
				$terms = get_terms( $args );

				$term_list = wp_get_post_terms(get_the_ID(), 'project_expertises', array("fields" => "all"));
				//var_dump($term_list);

				foreach ($term_list as $key => $term) { ?>
					<li><?php echo $term->name; ?></li>
				<?php }
			?>
			</ul>	
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

add_action( 'widgets_init', create_function( '', 'return register_widget("Project_Expertises_List");' ) );