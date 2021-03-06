<?php
	session_start();
	if(!isset($_SESSION['login'])) { header('location: login.php'); }

	include __DIR__ . '/../includes/DatabaseConnection.php';
	include __DIR__ . '/../classes/DatabaseTable.php';
	include __DIR__ . '/../classes/Template.php';

	$db = new DatabaseTable($pdo, 'scout', 'scoutid');
	$scouts = $db->findAll('lastname');
	$total = $db->total();

	$data = array(
		'title' => 'All Scouts',
		'scouts' => $scouts,
		'total' => $total
	);

	$view = new Template('scouts.html.php', $data);
	echo $view->render();