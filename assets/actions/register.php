<?php
require_once '../../config/database.php';
header('Content-Type: application/json');

$fullName   = $_POST['fullName'] ?? '';
$email      = $_POST['email'] ?? '';
$studentId  = $_POST['studentId'] ?? '';
$password   = $_POST['password'] ?? '';

$response = ['status' => 'initial', 'message' => ''];

// Validate required fields
if (empty($fullName) || empty($email) || empty($studentId) || empty($password)) {
    $response = ['status' => 'error', 'message' => 'All fields are required.'];
    echo json_encode($response);
    exit;
}

// Hash password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Optional: Split full name to fname/lname
$fname = $fullName;
$username = $studentId; // Using student ID as username

// Insert into DB
$sql = "INSERT INTO users (fname, username, phone, email, password, status, created_by, created_at)
        VALUES (?, ?, '', ?, ?, 'active', 'self-register', NOW())";

if ($stmt = mysqli_prepare($link, $sql)) {
    mysqli_stmt_bind_param($stmt, "ssss", $fname, $username, $email, $hashedPassword);

    if (mysqli_stmt_execute($stmt)) {
        $response = ['status' => 'success', 'message' => 'User registered successfully.'];
    } else {
        $response = ['status' => 'error', 'message' => 'Database error: ' . mysqli_error($link)];
    }

    mysqli_stmt_close($stmt);
} else {
    $response = ['status' => 'error', 'message' => 'Failed to prepare statement.'];
}

mysqli_close($link);
echo json_encode($response);
