<?php
session_start();
$pageName = 'Login';
$pageId = 3;

// Redirect if already logged in
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: profile");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'include/header.php'; ?>
</head>

<body>
    <!-- Navigation Bar -->
    <?php include 'include/navbar.php'; ?>

    <!-- Login Page -->
    <div id="login" class="page-content active">
        <div class="container">
            <div class="form-container">
                <h2 class="form-title">Welcome Back</h2>
                <form id="loginForm">
                    <div class="form-group">
                        <label class="form-label" for="loginEmail">Email Address</label>
                        <input type="email" id="loginEmail" name="loginEmail" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="loginPassword">Password</label>
                        <div class="password-container">
                            <input type="password" id="loginPassword" name="loginPassword" class="form-input" required>
                            <button type="button" class="password-toggle"
                                onclick="togglePassword('loginPassword')">👁</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="display: flex; align-items: center; gap: 0.5rem; color: var(--text-primary);">
                            <input type="checkbox" name="remember"> Remember me
                        </label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>
                    </div>
                    <div id="loginError" style="color: red; text-align: center;"></div>
                </form>
                <p style="text-align: center; margin-top: 1rem;">
                    Don't have an account? <a href="register" onclick="showPage('register')"
                        style="color: var(--primary-color);">Register here</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'include/footer.php'; ?>
    <script src="./assets/scripts.js"></script>
    <script>
        // Handle login with AJAX
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const email = document.getElementById('loginEmail').value.trim();
            const password = document.getElementById('loginPassword').value;

            const formData = new FormData();
            formData.append('username', email);
            formData.append('password', password);

            fetch('assets/actions/login-handler.php', {
                    method: 'POST',
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'success') {
                        window.location.href = 'index.php'; // Redirect on success
                    } else {
                        document.getElementById('loginError').innerText = data.message;
                    }
                })
                .catch(error => {
                    console.error('Login error:', error);
                    document.getElementById('loginError').innerText = 'An error occurred. Please try again.';
                });
        });
    </script>
</body>

</html>