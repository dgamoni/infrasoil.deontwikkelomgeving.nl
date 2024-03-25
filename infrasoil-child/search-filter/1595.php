<?php
/**
 * Search & Filter Pro 
 *
 * Project Results Template
 * 
 */
?>


	<?php
	global $post;

	//big project
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
			$post_thumbnail = get_the_post_thumbnail( $the_id);
			$term_list = wp_get_post_terms( get_the_ID(), 'project_expertises', array("fields" => "names"));
			//var_dump($term_list);
			//var_dump($post_thumbnail);
			$infrasoil_project_location_1 = get_field('infrasoil_project_location_1',$the_id);
			//var_dump($infrasoil_project_location_1);
			$lat = $infrasoil_project_location_1["lat"];
			$lng = $infrasoil_project_location_1["lng"];
			$results[$the_id]['lat'] = $lat;
			$results[$the_id]['lng'] = $lng;
			//$coord = '<coord class="coordd" data-lat="'.$lat.'" data-lng="'.$lng.'"></coord>';
			//$coord .= '<lng>'.$lng.'</lng>';		
						

			// if($lat && $lng){
			// 	$setmap = '
			// 	<script>
			// 		jQuery(document).ready(function($){
						
						
						
			// 		});
			// 	</script>';
			// }
			//var myLatlng = new google.maps.LatLng('.$Lat.', '.$lng.');

			//$output .= $setmap;
			//$output .= $coord;
			$infrasoil_project_rate = get_field('infrasoil_project_rate', $the_id);
			
			if($infrasoil_project_rate):

				$output .= "<div data-ajax-id='".$the_id."' data-lat='".$lat."' data-lng='".$lng."' class='coord grid-entry flex_column isotope-item all_sort no_margin ".$post_class."  av_one_fourth _av_one_third  default_av_fullwidth'>";
					$output .= "<article class='main_color inner-entry' itemscope='itemscope' itemtype='https://schema.org/CreativeWork'>";
				        //$output .= $infrasoil_project_location_1["lat"];
				        //$output .= $infrasoil_project_location_1["lng"];
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
		//echo json_encode($results);

	}

	//light project
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
			$post_thumbnail = get_the_post_thumbnail( $the_id);
			$term_list = wp_get_post_terms( get_the_ID(), 'project_expertises', array("fields" => "names"));
			//var_dump($term_list);
			//var_dump($post_thumbnail);
			$infrasoil_project_location_1 = get_field('infrasoil_project_location_1',$the_id);
			//var_dump($infrasoil_project_location_1);
			$lat = $infrasoil_project_location_1["lat"];
			$lng = $infrasoil_project_location_1["lng"];
			$results[$the_id]['lat'] = $lat;
			$results[$the_id]['lng'] = $lng;
			//$coord = '<coord class="coordd" data-lat="'.$lat.'" data-lng="'.$lng.'"></coord>';
			//$coord .= '<lng>'.$lng.'</lng>';		
						

			// if($lat && $lng){
			// 	$setmap = '
			// 	<script>
			// 		jQuery(document).ready(function($){
						
						
						
			// 		});
			// 	</script>';
			// }
			//var myLatlng = new google.maps.LatLng('.$Lat.', '.$lng.');

			//$output .= $setmap;
			//$output .= $coord;
			$infrasoil_project_rate = get_field('infrasoil_project_rate', $the_id);
			
			if(!$infrasoil_project_rate):

				$output .= "<div data-ajax-id='".$the_id."' data-lat='".$lat."' data-lng='".$lng."' class='coord grid-entry flex_column isotope-item all_sort no_margin ".$post_class."  av_one_fourth _av_one_third  default_av_fullwidth'>";
					$output .= "<article class='main_color inner-entry' itemscope='itemscope' itemtype='https://schema.org/CreativeWork'>";
				        //$output .= $infrasoil_project_location_1["lat"];
				        //$output .= $infrasoil_project_location_1["lng"];
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
		//echo json_encode($results);

	} else {
		echo "No Results Found";
	}
	?>


