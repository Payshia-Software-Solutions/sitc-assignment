<?php
$pageName = 'Home';
$pageId = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'include/header.php'; ?>
</head>

<body>
    <!-- Navigation Bar -->
    <?php include 'include/navbar.php'; ?>

    <!-- Home Page -->
    <div id="home" class="page-content active">
        <div class="container">
            <section class="hero">
                <h1>Welcome to StudentHub</h1>
                <p>Your gateway to academic excellence and community connection</p>
                <a href="#" class="btn" onclick="showPage('register')">Get Started</a>
            </section>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-user"></i></div>
                    <h3>Easy Registration</h3>
                    <p>Quick and simple registration process to join our academic community.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-book"></i></div>
                    <h3>Student Profile</h3>
                    <p>Manage your academic information and track your progress seamlessly.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-comments"></i></div>
                    <h3>Contact Support</h3>
                    <p>Get help when you need it with our responsive support system.</p>
                </div>
            </div>

        </div>
    </div>


    <!-- Footer -->
    <?php include 'include/footer.php'; ?>
    <script src="./assets/scripts.js"></script>
</body>

</html>