<?php
		//generates the html for the sort buttons
function project_sort_buttons($entries, $params)
{
	$params['taxonomy'] = 'project_expertises';


	//get all categories that are actually listed on the page
	$categories = get_categories(array(
		'taxonomy'	=> $params['taxonomy'],
		'hide_empty'=> 0
	));
	//var_dump($entries);

	//$current_page_cats 	= array();
	//$cat_count 			= array();
	//$display_cats 		= is_array($params['categories']) ? $params['categories'] : array_filter(explode(',',$params['categories']));

	// foreach ($entries as $entry)
	// {
	// 	if($current_item_cats = get_the_terms( $entry->ID, $params['taxonomy'] ))
	// 	{
	// 		if(!empty($current_item_cats))
	// 		{
	// 			foreach($current_item_cats as $current_item_cat)
	// 			{
	// 				if(empty($display_cats) || in_array($current_item_cat->term_id, $display_cats))
	// 				{
	// 					$current_page_cats[$current_item_cat->term_id] = $current_item_cat->term_id;

	// 					if(!isset($cat_count[$current_item_cat->term_id] ))
	// 					{
	// 						$cat_count[$current_item_cat->term_id] = 0;
	// 					}

	// 					$cat_count[$current_item_cat->term_id] ++;
	// 				}
	// 			}
	// 		}
	// 	}
	// }

	$output = "<div class='sort_width_container av-sort-all' data-portfolio-id='1' ><div id='js_sort_items' >";
	// $hide 	= count($current_page_cats) <= 1 ? "hidden" : "";


	// $first_item_name = apply_filters('avf_portfolio_sort_first_label', __('All','avia_framework' ), $params);
	// $first_item_html = '<span class="inner_sort_button"><span>'.$first_item_name.'</span><small class="av-cat-count"> '.count($entries).' </small></span>';
	// $output .= apply_filters('avf_portfolio_sort_heading', "", $params);
	
	
	$output .= "<div class='av-current-sort-title'></div>";
	$output .= "<div class='sort_by_cat '>";
	$output .= '<a href="#" data-filter="all_sort" class="all_sort_button active_sort"> '. __('All','avia_framework' ).'</a>';


	foreach($categories as $category)
	{
		// if(in_array($category->term_id, $current_page_cats))
		// {
			//fix for cyrillic, etc. characters - isotope does not support the % char
			$category->category_nicename = str_replace('%', '', $category->category_nicename);

			$output .= 	"<span class='text-sep ".$category->category_nicename."_sort_sep'>/</span>";
			$output .= 		'<a href="#" data-filter="'.$category->category_nicename.'_sort" class="'.$category->category_nicename.'_sort_button" ><span class="inner_sort_button">';
			$output .= 			"<span>".esc_html(trim($category->cat_name))."</span>";
			$output .= 			"<small class='av-cat-count'> ".$cat_count[$category->term_id]." </small></span>";
			$output .= 		"</a>";
		//}
	}

	$output .= "</div></div></div>";

	return $output;
} 


function project_sort_cat_string($the_id)
{
	$sort_classes = "";
	$item_categories = get_the_terms( $the_id, 'project_expertises');

	if(is_object($item_categories) || is_array($item_categories))
	{
		foreach ($item_categories as $cat)
		{
			//fix for cyrillic, etc. characters - isotope does not support the % char
			$cat->slug = str_replace('%', '', $cat->slug);

			$sort_classes .= $cat->slug.'_sort ';
		}
	}

	return $sort_classes;
}