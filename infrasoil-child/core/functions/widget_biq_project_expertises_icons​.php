<?php

class Biq_Project_Expertises_Icons extends WP_Widget {

	/** constructor */
	function __construct() {

		parent::WP_Widget( false, $name = __( 'Big Project Expertises icons​', TEXTDOMAIN ) );

	}

	/** @see WP_Widget::widget */
	function widget( $args, $instance ) {

		extract( $args );

		// $content = $instance['content'];
		// $link = $instance['link'];

		?>
		<div class="widget biq_project_expertises_icons">
			<div style="padding-bottom:10px;color:#273756;" class="av-special-heading av-special-heading-h2 custom-color-heading blockquote modern-quote modern-centered  avia-builder-el-14  el_before_av_portfolio  avia-builder-el-no-sibling  ">
				<h1 class="av-special-heading-tag" itemprop="headline">
					<span style="color: #4bb6e8;">WERK</span> VELDEN
				</h1>
			</div>
			<?php 

				$args = array(
					'taxonomy' => 'project_expertises',
					'hide_empty' => false,
				);
				$terms = get_terms( $args );
				//var_dump($terms);

				foreach ($terms as $key => $term) { ?>
					<div class="flex_column av_one_sixth_custom">
						<div class="sprite_big sprite_big-WERKVELDEN-NUMMERING-<?php echo $term->count; ?>"></div>
						<span class="expertises_title"><?php echo $term->name; ?></span>
					</div>
				<?php }
			?>
			
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

add_action( 'widgets_init', create_function( '', 'return register_widget("Biq_Project_Expertises_Icons");' ) );