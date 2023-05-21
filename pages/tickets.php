<?php
	declare(strict_types = 1);

	require_once(__DIR__ . '/../utils/session.php');
	$session = new Session();
	
	require_once(__DIR__ . '/../templates/common.tpl.php');
	require_once(__DIR__ . '/../database/connection.db.php');

	drawHeader($session);
	drawFooter();

	require_once(__DIR__ . '/../database/question.class.php');
	require_once(__DIR__ . '/../database/user.class.php');
	require_once(__DIR__ . '/../database/comments.class.php');
	
	require_once(__DIR__ . '/../templates/question.tpl.php');

	$db = getDatabaseConnection();

	$question = Question::getQuestion($db, intval($_GET['id']));
	$user = User::getUser($db, $question->userId);
	$answers = Comment::getQuestionComments($db, intval($_GET['id']));
	
	drawQuestion($question, $user, $answers, $session);
	
?>
