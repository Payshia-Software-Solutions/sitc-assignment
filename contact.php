<?php
session_start();
$pageName = 'Contact';
$pageId = 5;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'include/header.php'; ?>
</head>

<body>
    <!-- Navigation Bar -->
    <?php include 'include/navbar.php'; ?>

    <!-- Contact Page -->
    <div id="contact" class="page-content active">
        <?php

        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
            echo "<h2 style='text-align:center; color:red;'>Not Authorized. Please <a href='login.php'>login</a>.</h2>";
        } else {
        ?>
            <div class="container">
                <div class="form-container">
                    <h2 class="form-title">Contact Us</h2>
                    <form id="contactForm">
                        <div class="form-group">
                            <label class="form-label" for="contactName">Your Name</label>
                            <input type="text" id="contactName" name="contactName" class="form-input" required
                                value="<?php echo isset($_SESSION['fullname']) ? htmlspecialchars($_SESSION['fullname']) : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="contactEmail">Email Address</label>
                            <input type="email" id="contactEmail" name="contactEmail" class="form-input" required
                                value="<?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?>">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="subject">Subject</label>
                            <select id="subject" name="subject" class="form-select" required>
                                <option value="">Select a subject</option>
                                <option value="technical">Technical Support</option>
                                <option value="academic">Academic Inquiry</option>
                                <option value="general">General Question</option>
                                <option value="feedback">Feedback</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="message">Message</label>
                            <textarea id="message" name="message" class="form-input form-textarea" required
                                placeholder="Please describe your inquiry in detail..."></textarea>
                        </div>
                        <div class="form-group">
                            <button type="button" onclick="CreateContact()" class="btn btn-primary"
                                style="width: 100%;">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php
        }
        ?>


    </div>

    <!-- Footer -->
    <?php include 'include/footer.php'; ?>
    <script src="./assets/scripts.js"></script>
</body>

</html>