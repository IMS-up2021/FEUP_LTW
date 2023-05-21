<?php

	declare(strict_types=1);

	require_once('../database/connection.db.php');
	require_once(__DIR__ . '/../utils/session.php');
	$session = new Session();

	$db = getDatabaseConnection();
		

	require_once(__DIR__ . '/../templates/common.tpl.php');

	drawHeader($session);
	drawLogo();

	// Used just to check all users/debugging

	// $stmt = $db->prepare('SELECT * FROM USER');
	// $stmt->execute();
	// $users = $stmt->fetchAll();

	// echo '<h1> Users </h1>';

	// foreach( $users as $user) {
	// 	echo '<h2>' . $user['name'] . '</h2>';
	// 	echo '<p>' . $user['username'] . '</p>';
	// 	echo '<p>' . $user['email'] . '</p>';
	// 	echo '<p>' . $user['password'] . '</p>';
	//   }

	$stmt = $db->prepare('SELECT * FROM DEPARTMENT');
	$stmt->execute();
	$departments = $stmt->fetchAll();

	?>	
	<!DOCTYPE html>
	<html lang="en-US">  
		<body>
			<div id="menu">
				<?php
				echo '<h2> Departments </h2>';

				foreach( $departments as $department) {
					echo '<h3>ID: ' . $department['id'] . '</h3>';
					echo '<p>Name: ' . $department['name'] . '</p>';
				}
				?>
			</div>
		</body>	
	
<?php	
	drawFooter();
	drawFAQ();

	$stmt = $db->prepare('SELECT t.id, t.title, t.description, t.date, t.status, t.creator_id, t.department_id, d.name AS department_name FROM Ticket t JOIN Department d ON t.department_id = d.id');
	$stmt->execute();
	$tickets = $stmt->fetchAll();

	echo '<h1>Tickets</h1>';
	
	foreach ($tickets as $ticket) {
		echo '<h1>ID: ' . $ticket['id'] . '</h1>';
		echo '<p>Title: ' . $ticket['title'] . '</p>';
		echo '<p>Description: ' . $ticket['description'] . '</p>';
		echo '<p>Date: ' . $ticket['date'] . '</p>';
		echo '<p>Status: ' . $ticket['status'] . '</p>';
		echo '<p>Creator: ' . $ticket['creator_id'] . '</p>';
		echo '<p>Department: ' . $ticket['department_name'] . '</p>';
	}

	//deletes all tickets from user 5

	// $stmt = $db->prepare('DELETE FROM TICKET WHERE creator_id = 5');
	// $stmt->execute();
	// $departments = $stmt->fetchAll();

?>
