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

// get parent if only child

	//var_dump($query->posts[0]);
	if ( $query) {
		//$post_arrays = array();
		$parent = array();
		$postarrays = array();
		foreach ($query->posts as $key => $post_array) {
			$post_arrays[$key] = $post_array->ID;
			array_push($postarrays, $post_array->ID);
			if($post_array->post_parent) {
				array_push($parent, $post_array->post_parent);
				array_push($postarrays, $post_array->post_parent);
			}
		}
	}
		//echo 'all';
		//var_dump($post_arrays);
		$parentt = array_unique($parent);
		//echo 'parent';
		//var_dump($parentt);
		$postarrayss = array_unique($postarrays);
		//echo 'all+parent';
		//var_dump($postarrayss);

	$good_parent = array();
	foreach ($parentt as $key => $all_parentt) {
		if (!in_array($all_parentt, $post_arrays)) {
			array_push($good_parent, $all_parentt);
		}
	}
	//echo 'add parent';
	//var_dump($good_parent);

	//if parent
	if ( $query->have_posts() && !empty($good_parent)) {
		$output = "";
		

		$args = array(
			'post_type'      => 'portfolio',
			'posts_per_page' => - 1,
			'post__in'	=> $good_parent
		);

			// var_dump($query->post_count);


			//echo project_sort_buttons($query->post);

		$the_query = new WP_Query( $args );

			$post_loop_count = $the_query->post_count;
			$i = 1;

		while ( $the_query->have_posts() ) : $the_query->the_post();
				setup_postdata( $post );
				//var_dump($post);

				$the_id		= $post->ID;
				$excerpt 	= $post->post_excerpt;
				$title_link = get_post_permalink($the_id);
					$parts = explode( '?', $title_link ); 
					$title_link = $parts[0];
				// var_dump(get_post_permalink($the_id));
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
				//var_dump(get_field('infrasoil_nottoshow',$the_id));

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
				$post_parent = $post->post_parent ? 'projectchild' : '';

				//if($infrasoil_project_rate):

					$output .= "<div data-ajax-id='".$the_id."' data-lat='".$lat."' data-lng='".$lng."' class='coord grid-entry flex_column isotope-item all_sort no_margin ".$post_class." ".project_sort_cat_string($the_id)." ".$post_parent." av_one_fourth _av_one_third  default_av_fullwidth'>";
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

				//endif;

				$i++;
		endwhile;
		wp_reset_query();

			echo $output;
			//echo json_encode($results);
		wp_reset_postdata();
		
	} //end paren

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
					$parts = explode( '?', $title_link ); 
					$title_link = $parts[0];
			$title 		= $post->post_title;
			$parity		= $i % 2 ? 'odd' : 'even';
			$last       = $i == $post_loop_count ? " post-entry-last " : "";
			$post_class = "post-entry post-entry-".$the_id." grid-entry-overview grid-loop-".$post_loop_count." grid-parity-".$parity." ".$last."";
			$img = get_the_post_thumbnail( $the_id, 'portfolio' );
			$infrasoil_project_rate = get_field('infrasoil_project_rate', $the_id);
			$post_parent = $post->post_parent ? 'projectchild' : '';
			
			if($infrasoil_project_rate):
				$count++;
				$output .= "<div data-ajax-id='".$the_id."' class=' grid-entry flex_column isotope-item all_sort no_margin ".$post_class."  av_one_fourth infrasoi_grid_".$count." ".$post_parent." av_one_third_  default_av_fullwidth'>";
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
					$parts = explode( '?', $title_link ); 
					$title_link = $parts[0];
			$title 		= $post->post_title;
			$parity		= $i % 2 ? 'odd' : 'even';
			$last       = $i == $post_loop_count ? " post-entry-last " : "";
			$post_class = "post-entry post-entry-".$the_id." grid-entry-overview grid-loop-".$post_loop_count." grid-parity-".$parity." ".$last."";
			$img = get_the_post_thumbnail( $the_id, 'portfolio' );
			$infrasoil_project_rate = get_field('infrasoil_project_rate', $the_id);
			$post_parent = $post->post_parent ? 'projectchild' : '';
			
			if(!$infrasoil_project_rate):
				$count++;
				$output .= "<div data-ajax-id='".$the_id."' class=' grid-entry flex_column isotope-item all_sort no_margin ".$post_class."  av_one_fourth infrasoi_grid_".$count." ".$post_parent." av_one_third_  default_av_fullwidth'>";
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

	<script>
		jQuery(document).ready(function($){
		    var items = $('.search-filter-results .grid-entry').not('.projectchild');
		    //console.log(items);
		    items.each(function(index, el) {
		        $(this).addClass('element_'+index);
		    });
		});
	</script>

</div>
<!-- <div class="flex_column av_one_fourth  flex_column_div av-zero-column-padding   avia-builder-el-3  el_after_av_three_fourth  avia-builder-el-last  " style="border-radius:0px; ">
	<h2>Project zoeken</h2>
	<?php echo do_shortcode('[searchandfilter id="1441"]'); ?>
</div> -->
