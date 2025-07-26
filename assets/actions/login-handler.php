<?php
session_start();
require_once '../../config/database.php';
header('Content-Type: application/json');

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$response = ['status' => 'error', 'message' => 'Invalid request.'];

// Validation
if (empty($username) || empty($password)) {
    $response['message'] = 'Username and password are required.';
    echo json_encode($response);
    exit;
}

// Prepare SQL
$sql = "SELECT `id`, `fname`, `username`, `phone`, `email`, `password`, `status`, `created_by`, `created_at`
        FROM `users` WHERE username = ? OR email = ?";

if ($stmt = mysqli_prepare($link, $sql)) {
    mysqli_stmt_bind_param($stmt, "ss", $username, $username);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) === 1) {
            // Correct binding order
            mysqli_stmt_bind_result($stmt, $id, $fname, $db_username, $phone, $email, $hashed_password, $status, $created_by, $created_at);

            if (mysqli_stmt_fetch($stmt)) {
                if (password_verify($password, $hashed_password)) {
                    if ($status === 'active') {
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["user_name"] = $db_username;
                        $_SESSION["fullname"] = $fname;
                        $_SESSION["email"] = $email;

                        $response = [
                            'status' => 'success',
                            'message' => 'Login successful.',
                            'user' => [
                                'id' => $id,
                                'fullname' => $fname,
                                'username' => $db_username,
                                'email' => $email
                            ]
                        ];
                    } else {
                        $response['message'] = 'Account is not active.';
                    }
                } else {
                    $response['message'] = 'Invalid password.';
                }
            } else {
                $response['message'] = 'Failed to fetch user data.';
            }
        } else {
            $response['message'] = 'No account found with that username or email.';
        }
    } else {
        $response['message'] = 'Execution failed: ' . mysqli_error($link);
    }

    mysqli_stmt_close($stmt);
} else {
    $response['message'] = 'Database error: ' . mysqli_error($link);
}

mysqli_close($link);
echo json_encode($response);
