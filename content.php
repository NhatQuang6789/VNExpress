<?php
	$link = $_POST["link"];
	$data = file_get_contents($link);
	$pattern = '#<section\sclass="sidebar_1">(.*)</section>#imsU';
	preg_match($pattern, $data, $result);

	$title = '#<h1.*>(.*)</h1>#imsU';
	preg_match($title, $result[0], $_content);

	$description = '#class="description">(.*)</p>#imsU';
	preg_match($description, $result[0], $__content);

	$content = '#<article.*>(.*)</article>#imsU';
	preg_match($content, $result[0], $___content);	
	
	echo $html = "<div class='header_title'>".$_content[1]."</div>";
	echo $html = "<div class='header_description'>".$__content[1]."</div>";
	echo $html = "<div class='header_content'>".$___content[1]."</div>";
	
	

	

?>