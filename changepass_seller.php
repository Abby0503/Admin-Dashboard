<?php
session_start();

// Check if the user is logged in as a seller
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'seller') {
    header('Location: seller_dashboard.php');
    exit();
}

// Function to change password
function changePassword($oldPassword, $newPassword) {
    try {
        // Create a database connection
        $pdo = new PDO('mysql:host=localhost;dbname=your_database', 'your_username', 'your_password');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Assume user ID is stored in session
        $userId = $_SESSION['user_id'];
        
        // Query to get the current password from the database
        $stmt = $pdo->prepare("SELECT password FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        $currentPassword = $stmt->fetchColumn();

        // Verify old password using password_verify (if hashed passwords are used)
        if (password_verify($oldPassword, $currentPassword)) {
            // Hash the new password before saving it
            $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Update the new password in the database
            $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
            return $stmt->execute([$newHashedPassword, $userId]);
        } else {
            return false; // Old password does not match
        }
    } catch (PDOException $e) {
        // Handle database connection error
        return false;
    }
}

// Handle password change request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate the new password and confirmation
    if ($newPassword !== $confirmPassword) {
        $error = "Passwords do not match!";
    } elseif (strlen($newPassword) < 8) {
        $error = "New password must be at least 8 characters long.";
    } else {
        // Attempt to change the password
        if (changePassword($oldPassword, $newPassword)) {
            $success = "Password changed successfully!";
        } else {
            $error = "Failed to change password. Please check your old password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings - Seller Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #e9ecef;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }

        .error {
            color: #dc3545;
            margin-bottom: 15px;
        }

        .success {
            color: #28a745;
            margin-bottom: 15px;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            z-index: 10;
            transition: all 0.3s ease;
        }

        .sidebar h2 {
            color: #f8f9fa;
            margin-bottom: 20px;
            font-size: 1.5rem;
            text-align: center;
            width: 100%;
        }

        .sidebar a {
            text-decoration: none;
            color: #adb5bd;
            padding: 15px;
            text-align: left;
            display: block;
            width: 100%;
            font-size: 1rem;
            font-weight: bold;
            border-left: 3px solid transparent;
            transition: all 0.3s ease;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: #007bff;
            color: white;
            border-left: 3px solid #007bff;
        }

        .sidebar .logout-btn {
            margin-top: auto;
            background-color: #dc3545;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .sidebar .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="sidebar">
            <h2>Seller Dashboard</h2>
            <a href="seller_dashboard.php" class="nav-link">Dashboard</a>
            <a href="totaluser_seller.php" class="nav-link">Total Users</a>
            <a href="orderlist_seller.php" class="nav-link">Order List</a>
            <a href="inventory_seller.php" class="nav-link">Inventory</a>
            <a href="accountlist_seller.php" class="nav-link active">Account Settings</a>
            <button class="logout-btn" onclick="logout()">Logout</button>
        </div>

        <!-- Main Content -->
        <div class="container">
            <div class="form-container">
                <h2>Change Password</h2>

                <?php if (isset($error)): ?>
                    <p class="error"><?php echo $error; ?></p>
                <?php elseif (isset($success)): ?>
                    <p class="success"><?php echo $success; ?></p>
                <?php endif; ?>

                <form action="change_password.php" method="POST">
                    <div class="form-group">
                        <label for="oldPassword">Old Password</label>
                        <input type="password" id="oldPassword" name="oldPassword" required>
                    </div>

                    <div class="form-group">
                        <label for="newPassword">New Password</label>
                        <input type="password" id="newPassword" name="newPassword" required>
                    </div>

                    <div class="form-group">
                        <label for="confirmPassword">Confirm New Password</label>
                        <input type="password" id="confirmPassword" name="confirmPassword" required>
                    </div>

                    <div class="form-group">
                        <button type="submit">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function logout() {
            window.location.href = 'homee.php';
        }
    </script>
</body>
</html>
