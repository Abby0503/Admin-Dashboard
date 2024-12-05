<?php
session_start();

// Dummy user data
$users = [
    'seller1' => ['password' => 'password123', 'role' => 'seller'],
    'admin1' => ['password' => 'adminpass', 'role' => 'admin'],
];

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role']; // Role is based on the button clicked

    // Authenticate user
    if (isset($users[$username]) && $users[$username]['password'] === $password && $users[$username]['role'] === $role) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        // Redirect based on role
        if ($role === 'seller') {
            header('Location: seller_dashboard.php');
        } else {
            header('Location: home.php');
        }
        exit();
    } else {
        $error = "Invalid username, password, or role!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Base Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        /* Login Container */
        .login-container {
            width: 350px;
            margin: 100px auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .error {
            color: #d9534f;
            font-size: 14px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            text-align: left;
        }

        input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        /* Button Styles */
        .button-group button {
            width: 48%;
            padding: 10px;
            background: #28a745;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin: 5px 1%;
        }

        .button-group button:hover {
            background: #218838;
        }

        .admin-btn {
            background: #007bff;
        }

        .admin-btn:hover {
            background: #0056b3;
        }

        /* Back Button */
        .back-button {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #ffffff;
            background: #6c757d;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
        }

        .back-button:hover {
            background: #5a6268;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>

        <!-- Error Message -->
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>

        <!-- Login Form -->
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>

            <!-- Buttons -->
            <div class="button-group">
                <button type="submit" name="role" value="seller" class="seller-btn">Login as Seller</button>
                <button type="submit" name="role" value="admin" class="admin-btn">Login as Admin</button>
            </div>
        </form>

        <!-- Back to Dashboard Button -->
        <a href="homee.php" class="back-button">Back to Dashboard</a>
    </div>
</body>
</html>
