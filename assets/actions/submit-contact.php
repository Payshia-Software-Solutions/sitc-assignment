<?php
session_start();


require_once '../../config/database.php';
header('Content-Type: application/json');

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');
$created_by = $_SESSION["user_name"] ?? 'guest';

if (!$name || !$email || !$subject || !$message) {
    echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
    exit;
}

$sql = "INSERT INTO contact_messages (name, email, subject, message, created_by) VALUES (?, ?, ?, ?, ?)";
if ($stmt = mysqli_prepare($link, $sql)) {
    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $subject, $message, $created_by);
    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Database error.']);
    }
    mysqli_stmt_close($stmt);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed.']);
}
mysqli_close($link);
