<?php
	require_once('config.php');
	//get title for a specific champion
	$heroes_mapper = new heroes_mapper_web();
	$heroes = $heroes_mapper->load();
	echo '<pre>';
	print_r($heroes['Aatrox']->get('title'));
	echo '</pre>';
?>