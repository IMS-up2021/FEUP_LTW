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

// Get department, subject, and description from form submission
$department = $_POST['department'];
$subject = $_POST['subject'];
$description = $_POST['description'];

// Insert new ticket into database
$stmt = $pdo->prepare('INSERT INTO tickets (client_id, department, subject, description, status, created_at, updated_at) VALUES (?, ?, ?, ?, ?, NOW(), NOW())');
$stmt->execute([$_SESSION['client_id'], $department, $subject, $description, 'open']);

// Redirect to client dashboard
header('Location: dashboard.php');
exit();
?>