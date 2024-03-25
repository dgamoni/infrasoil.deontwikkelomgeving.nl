<?php

class Biq_Project_Areas_Icons extends WP_Widget {

	/** constructor */
	function __construct() {

		parent::WP_Widget( false, $name = __( 'Werkvelden groot project', TEXTDOMAIN ) );

	}

	/** @see WP_Widget::widget */
	function widget( $args, $instance ) {

		extract( $args );

		// $content = $instance['content'];
		// $link = $instance['link'];

		?>
		<div class="widget biq_project_expertises_icons widget_project_areas">
			<div style="padding-bottom:10px;color:#273756;" class="av-special-heading av-special-heading-h2 custom-color-heading blockquote modern-quote modern-centered  avia-builder-el-14  el_before_av_portfolio  avia-builder-el-no-sibling  ">
				<h1 class="av-special-heading-tag" itemprop="headline">
					<span style="color: #4bb6e8;">WERK</span>VELDEN
				</h1>
			</div>
			<?php

				$args = array(
					'taxonomy' => 'project_areas',
					'hide_empty' => false,
					'orderby' => 'term_order'
				);
				//$terms = get_terms( $args );

				$terms = get_the_terms(get_the_id(), 'project_areas' );
				//var_dump($terms);

				foreach ($terms as $key => $term) {
					$infrasoil_expertises_icon = get_field('infrasoil_expertises_icon','project_areas_'.$term->term_id);
					$infrasoil_expertises_link = get_field('infrasoil_expertises_link','project_areas_'.$term->term_id);
					//var_dump($infrasoil_expertises_icon);
					$keys = $key+1;
					//$term->count
					?>
					<div class="flex_column_ av_one_sixth_custom">
						<?php if($infrasoil_expertises_link):
							echo '<a href="'.$infrasoil_expertises_link.'">';
						 endif; ?>
							<div class="sprite_big2 <?php if( !$infrasoil_expertises_icon ): echo 'sprite_big sprite_big-WERKVELDEN-NUMMERING-'.$keys; endif;?>">
								<?php if( $infrasoil_expertises_icon ): ?>
									<img src="<?php echo $infrasoil_expertises_icon; ?>" />
								<?php endif; ?>
							</div>
						<?php if($infrasoil_expertises_link):
							echo '</a>';
						 endif; ?>
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

add_action( 'widgets_init', create_function( '', 'return register_widget("Biq_Project_Areas_Icons");' ) );