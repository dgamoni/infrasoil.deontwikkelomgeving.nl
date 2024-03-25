<?php



add_action( 'wp_ajax_get_firms_places', 'get_firms_places' );
add_action( 'wp_ajax_nopriv_get_firms_places', 'get_firms_places' );

function get_firms_places() {

	$term_id = $_POST['term_id'];

	$args = array(
		'post_type'      => 'portfolio',
		'posts_per_page' => - 1
	);

	// if ( $term_id ) {
	// 	$args['tax_query'] = array(
	// 		array(
	// 			'taxonomy' => 'regions',
	// 			'field'    => 'id',
	// 			'terms'    => array( $term_id )
	// 		)
	// 	);
	// }

	$the_query = new WP_Query( $args );
	while ( $the_query->have_posts() ) : $the_query->the_post();
		$google_coordinats = get_field( 'infrasoil_project_location_1', get_the_ID() );
		//$arr               = explode( ',', $google_coordinats );
		$lat               = $google_coordinats['lat'];
		$lng               = $google_coordinats['lng'];

		$excerpt = get_the_excerpt();
		$img = get_the_post_thumbnail( get_the_ID(), array(130,130) );
		$link = get_post_permalink( get_the_ID() );
		$infrasoil_project_rate = get_field( 'infrasoil_project_rate', get_the_ID() );
		if($infrasoil_project_rate) {
			$infrasoil_bigproject = 'infrasoil_bigproject';
		} else {
			$infrasoil_bigproject = '';
		}

		// $args_tax = array(
		// 	'taxonomy' => 'project_expertises',
		// 	'hide_empty' => false,
		// );
		//$terms = get_terms( $args_tax );
		$term_list = wp_get_post_terms( get_the_ID(), 'project_expertises', array("fields" => "names"));
		$project_expertises = '<ul class="expertlist">';
		$project_expertises .= '<p class="expertlist_tile">Expertises</p>';
		foreach ($term_list as $key => $term) { 
			$project_expertises .= '<li>'.$term.'</li>';
		}
		$project_expertises .= '</ul>';

		if($lat && $lng) {
			$res[] = array(
				get_the_title(),
				$lat,
				$lng,
				'<span class="gmap_point"></span>',
				'<a id="hook" class="infowin_link" href="'.$link.'">
					<div class="infowin">
						<div class="infowin_img_wrap '.$infrasoil_bigproject.'">
							<span class="infowin_img">'.$img.'</span>
							<p class="infowin_title">'.get_the_title().'</p>
							<p class="infowin_excerpt">'.$excerpt.'</p>
						</div>
						<div class="infowin_text_wrap">
							<p class="infowin_expertises">'.$project_expertises.'</p>
						</div>
					</div>
				</a>',
				$infrasoil_project_rate
			);
		}
	endwhile;
	wp_reset_query();
	echo json_encode( $res );
	exit;

} 

add_action( 'wp_ajax_get_results_map', 'get_results_map' );
add_action( 'wp_ajax_nopriv_get_results_map', 'get_results_map' );
	function get_results_map()
	{
		
		//$this->hard_remove_filters();
		if((isset($_GET['sfid']))&&(isset($_GET['sf_action'])))
		{
			//get_form
			
			$sf_action = esc_attr($_GET['sf_action']);
			
			if((esc_attr($_GET['sfid'])!="")&&(($sf_action=="get_results")||($sf_action=="get_form")))
			{
				global $searchandfilter;
				
				$sfid = (int)($_GET['sfid']);
				$sf_inst = $searchandfilter->get($sfid);
				
				
				if($sf_action=="get_results")
				{
					if($sf_inst->settings("display_results_as")=="shortcode")
					{
						$results = array();
						
						$results['form'] = $this->display_shortcode->display_shortcode(array("id" => $sfid));
						$results['results'] = $sf_inst->query()->the_results();
						
						echo json_encode($results);
						exit;
					}
				}
				else if($sf_action=="get_form")
				{
					$results = array();					
					$results['form'] = $this->display_shortcode->display_shortcode(array("id" => $sfid));
					
					echo json_encode($results);
					exit;
				}
				
			}
		}
		
	}