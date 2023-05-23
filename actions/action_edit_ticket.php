<?php
    declare(strict_types = 1);

    require_once(__DIR__ . '/../utils/session.php');
    $session = new Session();
    
    if (!$session->isLoggedIn()) {
        $session->addMessage('error', 'You must be logged in to perform this action');
        die(header('Location: /'));
    }
    
    require_once(__DIR__ . '/../database/connection.db.php');
    require_once(__DIR__ . '/../database/question.class.php');
    
    if (trim($_POST['title']) === '') {
        $session->addMessage('error', 'Question title cannot be empty');
        die(header('Location: ' . $_SERVER['HTTP_REFERER']));
    }
    
    $db = getDatabaseConnection();
    /*
    $ticket = Ticket::createTicket($db, intval($_POST['id']));
    
    if ($ticket) {
        $ticket->title = $_POST['title'];
        $ticket->save($db);
        $session->addMessage('success', 'Question title updated');
        header('Location: ../pages/question.php?id=' . $_POST['id']);
    } else {
        $session->addMessage('error', 'Question does not exist');
        header('Location: ' . $_SERVER);
    }*/
    
?>