<?php
    require_once(__DIR__ . '/../database/connection.db.php');
	require_once(__DIR__ . '/../utils/session.php');
    require_once(__DIR__ . '/../templates/common.tpl.php');
    require_once(__DIR__ . '/../templates/login.tpl.php');


    $session = new Session();


    $db = getDatabaseConnection();

    drawHeader($session);

    drawLoginForm($session);

    drawFAQ();
    drawFooter();

?>

