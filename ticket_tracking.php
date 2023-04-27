<?php
// Start session
session_start();

// Check if user is logged in as client
if (!isset($_SESSION['client_id'])) {
    header('Location: login.php');
    exit();
}

// Include database connection
require_once('connection.php');

// Get client's submitted tickets from database
$stmt = $pdo->prepare('SELECT * FROM tickets WHERE client_id = ? ORDER BY created_at DESC');
$stmt->execute([$_SESSION['client_id']]);
$tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

