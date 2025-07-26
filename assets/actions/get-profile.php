<?php
session_start();
require_once '../../config/database.php';

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    echo "<p style='color:red;'>Not authorized.</p>";
    exit;
}

$user_id = $_SESSION["id"];

$sql = "SELECT fname, username, phone, email, status, created_at FROM users WHERE id = ?";
if ($stmt = mysqli_prepare($link, $sql)) {
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_bind_result($stmt, $fname, $username, $phone, $email, $status, $created_at);
        if (mysqli_stmt_fetch($stmt)) {
?>
            <div class="profile-info">
                <div class="profile-header">
                    <div class="profile-avatar" id="avatar">--</div>
                    <h2 id="name"><?php echo htmlspecialchars($fname); ?></h2>
                    <p id="statusText" style="color: var(--text-secondary);"><?php echo htmlspecialchars($status); ?></p>
                </div>


                <div id="profileData" data-fname="<?php echo htmlspecialchars($fname); ?>">
                    <div class="info-card">
                        <div class="info-label">Full Name</div>
                        <div class="info-value"><?php echo htmlspecialchars($fname); ?></div>
                    </div>
                    <div class="info-card">
                        <div class="info-label">Email</div>
                        <div class="info-value"><?php echo htmlspecialchars($email); ?></div>
                    </div>
                    <div class="info-card">
                        <div class="info-label">Username</div>
                        <div class="info-value"><?php echo htmlspecialchars($username); ?></div>
                    </div>
                    <div class="info-card">
                        <div class="info-label">Phone</div>
                        <div class="info-value"><?php echo htmlspecialchars($phone); ?></div>
                    </div>
                    <div class="info-card">
                        <div class="info-label">Status</div>
                        <div class="info-value" style="color: var(--success-color);"><?php echo htmlspecialchars($status); ?></div>
                    </div>
                    <div class="info-card">
                        <div class="info-label">Registered At</div>
                        <div class="info-value"><?php echo htmlspecialchars($created_at); ?></div>
                    </div>
                </div>
            </div>

            <div class="logout-button-container ">
                <button class="logout-button" onclick="location.href='logout.php'">Logout</button>
            </div>
<?php
        } else {
            echo "<p style='color:red;'>User not found.</p>";
        }
    } else {
        echo "<p style='color:red;'>Query failed.</p>";
    }
    mysqli_stmt_close($stmt);
} else {
    echo "<p style='color:red;'>Database error.</p>";
}
mysqli_close($link);
?>