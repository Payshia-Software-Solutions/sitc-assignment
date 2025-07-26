<?php
session_start();
$pageName = 'Profile';
$pageId = 4;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'include/header.php'; ?>
</head>

<body>
    <?php include 'include/navbar.php'; ?>


    <!-- Profile Page -->
    <div id="profile" class="page-content active">
        <?php

        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
            echo "<h2 style='text-align:center; color:red;'>Not Authorized. Please <a href='login.php'>login</a>.</h2>";
        } else {
        ?>
            <div class="container" id="profileInfo"></div>
        <?php
        }
        ?>
    </div>

    <?php include 'include/footer.php'; ?>
    <script src="./assets/scripts.js"></script>
    <script>
        // Load full HTML content via AJAX
        fetch('assets/actions/get-profile.php')
            .then(response => response.text())
            .then(html => {
                document.getElementById('profileInfo').innerHTML = html;
            })
            .catch(error => {
                document.getElementById('profileInfo').innerHTML = '<p style="color:red;">Error loading profile.</p>';
                console.error('Error:', error);
            });
    </script>
</body>

</html>