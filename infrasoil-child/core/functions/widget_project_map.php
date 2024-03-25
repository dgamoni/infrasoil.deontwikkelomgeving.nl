<?php

class Project_Mapwidget extends WP_Widget {

	/** constructor */
	function __construct() {

		parent::WP_Widget( false, $name = __( 'Kaart widget', TEXTDOMAIN ) );

	}

	/** @see WP_Widget::widget */
	function widget( $args, $instance ) {

		extract( $args );

		$width = $instance['width'];

		if($width) {
			$width_ = $width;
		} else {
			$width_ ='1220';
		}

		?>
		<div class="flex_column project_mapwidget">
			<div class="g_map_widget _embed-responsive _embed-responsive-4by3">
            <div id="g_map" style="width:<?php echo $width_;?>px; height: 600px;margin: 0px;padding: 0px;"></div>
			</div>
		</div>
		<?php
	}


	/** @see WP_Widget::update */
	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['width'] = $new_instance['width'];
		//$instance['link'] = $new_instance['link'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form( $instance ) {


		$width = $instance['width'];

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'width' ); ?>">Width:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'width' ); ?>"
			       name="<?php echo $this->get_field_name( 'width' ); ?>" type="text" value="<?php echo $width; ?>" />
		</p>

		<?php


	}
}

add_action( 'widgets_init', create_function( '', 'return register_widget("Project_Mapwidget");' ) );