<?php

require('simple_html_dom.php');

$url = "http://see.stanford.edu/see/courses.aspx";

// Create DOM from URL or file



function getCourseTitle($html){
	
	global $url;
	$html = file_get_html($url);

	$titles = array();
	
	// Find all images 
	foreach($html->find('span') as $element){ 
		   
		   $title = $element->plaintext;
		  // echo $title; 
		   array_push($titles , $title );
	}
	return $titles;
}

//	echo print_r(getCourseTitle($url));


	function getCourseLinks($html){

	global $url;
	$html = file_get_html($url);
	$links = array();

		// Find all links 
		foreach($html->find('div[id=leftWrapper] > div > a') as $element){
			   
			   //echo $element->href . '<br>';
			   $link = $element->href;
			   array_push($links , $link );

		}
		array_pop($links);
		array_pop($links);
		
		return $links;
	}

//	echo print_r(getCourseLinks($url));
	
	function getCourseDepartments($html){

	global $url;
	$html = file_get_html($url);
	$departments = array();

		// Find all images 
		foreach($html->find('strong[class=courseListDepartment]') as $element){
			   
			   //echo $element->href . '<br>';
			   $department = $element->plaintext;
			   array_push($departments , $department );
		}

		
		return $departments;
	}
	
	//echo print_r(getCourseDepartments($url));

?>