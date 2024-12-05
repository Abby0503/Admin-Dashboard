<?php
require 'config.php';

if (isset($_GET["token"])) {
    $token = $_GET["token"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE verification_token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $stmt = $conn->prepare("UPDATE users SET email_verified = 1 WHERE verification_token = ?");
        $stmt->bind_param("s", $token);
        if ($stmt->execute()) {
            echo "Email verified successfully!";
        } else {
            echo "Verification failed!";
        }
    } else {
        echo "Invalid verification link.";
    }
}
?>
