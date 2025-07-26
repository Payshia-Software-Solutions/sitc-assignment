<?php
$pageName = 'Register';
$pageId = 2;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'include/header.php'; ?>
</head>

<body>
    <!-- Navigation Bar -->
    <?php include 'include/navbar.php'; ?>

    <!-- Registration Page -->
    <div id="register" class="page-content active">
        <div class="container">
            <div class="form-container">
                <h2 class="form-title">Create Account</h2>
                <form id="registerForm">
                    <div class="form-group">
                        <label class="form-label" for="fullName">Full Name</label>
                        <input type="text" id="fullName" name="fullName" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="studentId">Student ID</label>
                        <input type="text" id="studentId" name="studentId" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <div class="password-container">
                            <input type="password" id="password" name="password" class="form-input" required>
                            <button type="button" class="password-toggle"
                                onclick="togglePassword('password')">👁</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="confirmPassword">Confirm Password</label>
                        <div class="password-container">
                            <input type="password" id="confirmPassword" name="confirmPassword" class="form-input"
                                required>
                            <button type="button" class="password-toggle"
                                onclick="togglePassword('confirmPassword')">👁</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" style="width: 100%;"
                            onclick="CreateAccount()">Create Account</button>
                    </div>
                </form>
                <p style="text-align: center; margin-top: 1rem;">
                    Already have an account? <a href="#" onclick="showPage('login')"
                        style="color: var(--primary-color);">Login here</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'include/footer.php'; ?>
    <script src="./assets/scripts.js"></script>
</body>

</html>