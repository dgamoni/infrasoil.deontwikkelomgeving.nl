<?php
/**
 * Search & Filter Pro 
 *
 * Project Results Template
 * 
 */
?>

<div class="flex_column av_three_fourth_  flex_column_div av-zero-column-padding first  avia-builder-el-0  el_before_av_one_fourth  avia-builder-el-first  " style="border-radius:0px; ">

	<?php
	global $post;
	$count = 0;
	// out big project
	if ( $query->have_posts() ) {
		$output = "";

		// var_dump($query->post_count);
		$post_loop_count = $query->post_count;
		$i = 1;
		while ($query->have_posts()) {
			$query->the_post();
			//var_dump($post);
			$the_id		= $post->ID;
			$excerpt 	= $post->post_excerpt;
			$title_link = get_post_permalink($the_id);
			$title 		= $post->post_title;
			$parity		= $i % 2 ? 'odd' : 'even';
			$last       = $i == $post_loop_count ? " post-entry-last " : "";
			$post_class = "post-entry post-entry-".$the_id." grid-entry-overview grid-loop-".$post_loop_count." grid-parity-".$parity." ".$last."";
			$img = get_the_post_thumbnail( $the_id, 'portfolio' );
			$infrasoil_project_rate = get_field('infrasoil_project_rate', $the_id);
			
			if($infrasoil_project_rate):
				$count++;
				$output .= "<div data-ajax-id='".$the_id."' class=' grid-entry flex_column isotope-item all_sort no_margin ".$post_class."  av_one_fourth infrasoi_grid_".$count." av_one_third_  default_av_fullwidth'>";
					$output .= "<article class='main_color inner-entry' itemscope='itemscope' itemtype='https://schema.org/CreativeWork'>";
				        
				        $output .= '<a href="'.$title_link.'" title="'.$title.'" data-rel="grid-1" class="grid-image avia-hover-fx" style="height: auto; opacity: 1;">';
				        	$output .= $img;
				        $output .= '</a>';

						$output .= '<div class="grid-content"><div class="avia-arrow"></div>';

		             		$output .= '<header class="entry-content-header">';
		                        $output .= "<h3 class='grid-entry-title entry-title' $markup>";
		                       		$output .= "<a href='".$title_link."' title='".esc_attr(strip_tags($title))."'>".$title."</a>";
		                        $output .= '</h3>';
		                    $output .= '</header>';

					        $output .= "<div class='entry-content-wrapper'>";
			                	$output .= "<div class='grid-entry-excerpt entry-content'>".$excerpt."</div>";
			                $output .= "</div>";

			            $output .= '</div>';

					$output .= '<footer class="entry-footer"></footer>';
					$output .= "</article>";
				$output .= "</div>";
			endif;
			
			$i++;
		}

		echo $output;

	}

	// out light project

	if ( $query->have_posts() ) {
		$output = "";

		// var_dump($query->post_count);
		$post_loop_count = $query->post_count;
		$i = 1;
		while ($query->have_posts()) {
			$query->the_post();
			//var_dump($post);
			$the_id		= $post->ID;
			$excerpt 	= $post->post_excerpt;
			$title_link = get_post_permalink($the_id);
			$title 		= $post->post_title;
			$parity		= $i % 2 ? 'odd' : 'even';
			$last       = $i == $post_loop_count ? " post-entry-last " : "";
			$post_class = "post-entry post-entry-".$the_id." grid-entry-overview grid-loop-".$post_loop_count." grid-parity-".$parity." ".$last."";
			$img = get_the_post_thumbnail( $the_id, 'portfolio' );
			$infrasoil_project_rate = get_field('infrasoil_project_rate', $the_id);
			
			if(!$infrasoil_project_rate):
				$count++;
				$output .= "<div data-ajax-id='".$the_id."' class=' grid-entry flex_column isotope-item all_sort no_margin ".$post_class."  av_one_fourth infrasoi_grid_".$count." av_one_third_  default_av_fullwidth'>";
					$output .= "<article class='main_color inner-entry' itemscope='itemscope' itemtype='https://schema.org/CreativeWork'>";
				        
				        $output .= '<a href="'.$title_link.'" title="'.$title.'" data-rel="grid-1" class="grid-image avia-hover-fx" style="height: auto; opacity: 1;">';
				        	$output .= $img;
				        $output .= '</a>';

						$output .= '<div class="grid-content"><div class="avia-arrow"></div>';

		             		$output .= '<header class="entry-content-header">';
		                        $output .= "<h3 class='grid-entry-title entry-title' $markup>";
		                       		$output .= "<a href='".$title_link."' title='".esc_attr(strip_tags($title))."'>".$title."</a>";
		                        $output .= '</h3>';
		                    $output .= '</header>';

					        $output .= "<div class='entry-content-wrapper'>";
			                	$output .= "<div class='grid-entry-excerpt entry-content'>".$excerpt."</div>";
			                $output .= "</div>";

			            $output .= '</div>';

					$output .= '<footer class="entry-footer"></footer>';
					$output .= "</article>";
				$output .= "</div>";
			endif;

			$i++;
		}

		echo $output;

	} else {
		echo "No Results Found";
	}
	?>

</div>
<!-- <div class="flex_column av_one_fourth  flex_column_div av-zero-column-padding   avia-builder-el-3  el_after_av_three_fourth  avia-builder-el-last  " style="border-radius:0px; ">
	<h2>Project zoeken</h2>
	<?php echo do_shortcode('[searchandfilter id="1441"]'); ?>
</div> -->
